<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        if(isset($request['g-recaptcha-response']) && ($request['g-recaptcha-response'] !== null)) {
            $secret = env('SECRET_KEY');
            $response = $request['g-recaptcha-response'];
            $verifyResponse = \file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$response);
            $decodedResponse = \json_decode($verifyResponse);

            if(!$decodedResponse->success) {
                return back()->withInput()->with('error', 'Invalid Captcha');
            }
        }
        else {
            return back()->withInput()->with('error', 'Please fill captcha');
        }
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'contact' => ['required','max:255', 'unique:'.User::class],
        ]);

        $user = User::create([
            'dob'=>$request->dob,
            'gender'=>$request->gender,
            'contact'=>$request->contact,
            'address'=>$request->address,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
