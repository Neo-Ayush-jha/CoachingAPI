@extends('../homepages/base')
@section('ayush')
    <div class="content" style="background-color: #ddd">
        <div class="container">
            @if(session()->has('error'))
    <div class="alert alert-success">
        {{ session()->get('error') }}
    </div>
@endif
            <div class="row">
                <div class="col-8">
                    <img src="{{ asset('cover/' . 'form2.svg') }}" alt="" class="img-fluid card-img-top shadow-lg mt-5"
                        style="border-radius: 1.5rem;height:500px">
                </div>
                <div class="col-4 ">
                    <x-guest-layout>
                        <x-auth-card>
                            <x-slot name="logo">
                                <a href="/">
                                    {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
                                    <img src="https://boomi.com/wp-content/uploads/cws-logo.png" alt=""
                                        class="my-0 py-0 mx-auto" style="width:50%">
                                </a>
                            </x-slot>

                            <!-- Session Status -->
                            <x-auth-session-status class="mb-2" :status="session('status')" />

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <!-- Name -->
                                <div>
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                        :value="old('name')" required autofocus />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <div class="row">
                                    <!-- Email Address -->
                                    <div class="col mt-1">
                                        <x-input-label for="email" :value="__('Email')" />
                                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                            :value="old('email')" required />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>

                                    <!-- contact -->
                                    <div class="col mt-1">
                                        <x-input-label for="contact" :value="__('Contact')" />
                                        <x-text-input id="contact" class="block mt-1 w-full" type="number" name="contact"
                                            :value="old('contact')" required autofocus />
                                        <x-input-error :messages="$errors->get('contact')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- DOB -->
                                    <div class="col-4 mt-2">
                                        <x-input-label for="dob" :value="__('DOB')" />
                                        <x-text-input id="dob" class="block mt-1 w-full" type="date" name="dob"
                                            :value="old('dob')" required autofocus />
                                        <x-input-error :messages="$errors->get('dob')" class="mt-2" />
                                    </div>
                                    <!-- gender -->
                                    <div class="col-8 mx-0 mt-2">
                                        <div class="row">
                                            <div class="form-group col">
                                                <x-input-label for="gender" :value="__('gender')" />
                                                {{-- <label for="">Gender</label> --}}
                                                <div class="mb-1 col px-3 rounded py-1 d-flex border border-1">
                                                    <div class="col ">
                                                        <input type="radio" name="gender" value="male"
                                                            class="me-5 form-check-input ">
                                                        <label for="" class="me-5 form-check-label">Male</label>
                                                    </div>
                                                    <div class="col ">
                                                        <input type="radio" name="gender" value="female"
                                                            class="me-5 form-check-input">
                                                        <label for="" class="me-5 form-check-label">Female</label>
                                                    </div>
                                                    <div class="col ">
                                                        <input type="radio" name="gender" value="other"
                                                            class="me-2 form-check-input ">
                                                        <label for="" class="me-2 form-check-label">Other</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- address -->
                                <div class="mt-1">
                                    <x-input-label for="address" :value="__('Address')" />
                                    <x-text-input id="address" class="block mt-1 w-full" type="text" name="address"
                                        :value="old('address')" required autofocus />
                                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                </div>
                                <div class="row">
                                    <!-- Password -->
                                        <div class="col mt-1">
                                            <x-input-label for="password" :value="__('Password')" />

                                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                                required autocomplete="new-password" />

                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>

                                        <!-- Confirm Password -->
                                        <div class="col mt-1">
                                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                                name="password_confirmation" required />

                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                        </div>
                                </div>
                                {{-- --Captur code--- --}}
                                <div class="captcha_div mt-1">
                                    <div class="g-recaptcha" data-sitekey="{{ env('SITE_KEY') }}"></div>
                                    <input type="hidden" class="hiddenRecaptcha" name="hiddenRecaptcha" id="hiddenRecaptcha">
                                </div>

                                <div class="flex items-center justify-end mt-1">
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        href="{{ route('login') }}">
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
    <script src="https://www.google.com/recaptcha/api.js"></script>
@endsection
