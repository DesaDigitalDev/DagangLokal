<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <p class="h1 mb-5 text-center">Sign Up</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- role_id -->
        <div class="text-center">
            <input type="radio" value="2" class="btn-check" name="role_id" id="Seller" autocomplete="off">
            <label class="btn btn-secondary" for="Seller">Seller</label>

            <input type="radio" value="3" class="btn-check" name="role_id" id="produser" autocomplete="off">
            <label class="btn btn-secondary" for="produser">Produser</label>
        </div>
        
        <!-- Nik -->
        <div class="mt-4">
            <x-text-input id="nik" class="block mt-1 w-full" type="text" name="nik" :value="old('nik')" required autofocus autocomplete="nik" placeholder="Nik"/>
            <x-input-error :messages="$errors->get('nik')" class="mt-2" />
        </div>

        <!-- Name -->
        <div class="mt-4">
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" placeholder="Email"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" 
                            placeholder="Password"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" 
                            placeholder="Confirm Password"/>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- mobile_number -->
        <div class="mt-4">
            <x-text-input id="mobile_number" class="block mt-1 w-full" type="text" name="mobile_number" :value="old('mobile_number')" required autofocus autocomplete="mobile_number" placeholder="Phone Number"/>
            <x-input-error :messages="$errors->get('mobile_number')" class="mt-2" />
        </div>

        <!-- address -->
        <div class="mt-4">
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" placeholder="Address"/>
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- photos -->
        <div class="mt-4" hidden>
            <x-text-input id="photos" class="block mt-1 w-full" type="text" name="photos" :value="old('photos')" autofocus autocomplete="photos" placeholder="User Roles"/>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
