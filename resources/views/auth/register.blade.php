@extends('../homepages/base')
@section('ayush')
   <div class="content" style="background-color: #ddd">
       <div class="container">
           <div class="row">
        <div class="col-8">
            <img src="{{ asset('cover/' . 'logo.svg') }}" alt="" class="img-fluid card-img-top shadow-lg mt-2" style="border-radius: 1.5rem;height:500px">
        </div>
               <div class="col-4 ">
                   <x-guest-layout> 
                       <x-auth-card>
                           <x-slot name="logo">
                               <a href="/">
                                   {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
                                   <img src="https://boomi.com/wp-content/uploads/cws-logo.png" alt="" class="my-0 py-0 mx-auto"  style="width:50%">
                                </a>
                           </x-slot>
                   
                           <!-- Session Status -->
                           <x-auth-session-status class="mb-4" :status="session('status')" />
                   
                           <form method="POST" action="{{ route('register') }}">
                            @csrf
                
                            <!-- Name -->
                            <div class="mt-1">
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="mt-1">
                                <x-input-label for="dob" :value="__('DOB')" />
                                <x-text-input id="dob" class="block mt-1 w-full" type="text" name="dob" :value="old('dob')" required autofocus />
                                <x-input-error :messages="$errors->get('dob')" class="mt-2" />
                            </div>
                            <div class="mt-1">
                                <x-input-label for="gender" :value="__('Gender')" />
                                <x-text-input id="gender" class="block mt-1 w-full" type="text" name="gender" :value="old('gender')" required autofocus />
                                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                            </div>
                            <div class="mt-1">
                                <x-input-label for="address" :value="__('Address')" />
                                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus />
                                <x-input-error :messages="$errors->get('address')" class="mt-2" />
                            </div>
                
                            <!-- Email Address -->
                            <div class="mt-1">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                
                            <!-- Password -->
                            <div class="mt-1">
                                <x-input-label for="password" :value="__('Password')" />
                
                                <x-text-input id="password" class="block mt-1 w-full"
                                                type="password"
                                                name="password"
                                                required autocomplete="new-password" />
                
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                
                            <!-- Confirm Password -->
                            <div class="mt-1">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                
                                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                                type="password"
                                                name="password_confirmation" required />
                
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                
                            <div class="flex items-center justify-end mt-1">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a>
                
                                <x-primary-button class="ml-4">
                                    {{ __('Register') }}
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