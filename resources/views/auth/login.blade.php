@extends('../homepages/base')
@section('ayush')
   <div class="content" style="background-color: #ddd">
       <div class="container">
           <div class="row">
        <div class="col-md-8 col-sm-2 my-0 py-0">
            {{-- <img src="../../../../../public/cover/logo.svg" alt="" class="img-fluid card-img-top shadow-lg " style="border-radius: 1.5rem"> --}}
            <h1 class="fs-1 text-center py-5">Welcome</h1>
            {{-- C:\Users\lenovo\Desktop\Laravel\API\public\cover\logo.svg
            C:\Users\lenovo\Desktop\Laravel\API\resources\views\auth\login.blade.php --}}
        </div>
               <div class="col-md-4 col-sm-8 my-0 py-0" >
                   <x-guest-layout class="my-0 py-0" > 
                       <x-auth-card class="my-0 py-0">
                           <x-slot name="logo" class="my-0 py-0">
                               <a href="/" class="my-0 py-0">
                                   {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
                                   <img src="https://boomi.com/wp-content/uploads/cws-logo.png" alt="" class="my-0 py-0 mx-auto text-gray-500"  style="width:50%">
                                </a>
                           </x-slot>
                   
                           <!-- Session Status -->
                           <x-auth-session-status class="mb-4" :status="session('status')" />
                   
                           <form method="POST" action="{{ route('login') }}">
                            @csrf
                
                            <!-- Email Address -->
                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                
                            <!-- Password -->
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('Password')" />
                
                                <x-text-input id="password" class="block mt-1 w-full"
                                                type="password"
                                                name="password"
                                                required autocomplete="current-password" />
                
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                
                            <!-- Remember Me -->
                            <div class="block mt-4">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>
                
                            <div class="flex items-center justify-end mt-4">
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                
                                <x-primary-button class="ml-3">
                                    {{ __('Log in') }}
                                </x-primary-button>
                            </div>
                        </form>
                       </x-auth-card>
                   </x-guest-layout>
                   
               </div>
           </div>
       </div>
   </div>
@endsection