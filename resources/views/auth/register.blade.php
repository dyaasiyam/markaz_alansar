<form method="POST" action="{{ route('register') }}">
    <input type="hidden" name="guard" value="web">
    @csrf

    <!-- Name -->
    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- number Address -->
    <div class="mt-4">
        <x-input-label for="number" :value="__('number')" />
        <x-text-input id="number" class="form-control" type="tel" name="number" :value="old('number')" required autocomplete="username" />
        <x-input-error :messages="$errors->get('number')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" />

        <x-text-input id="password" class="form-control"
                        type="password"
                        name="password"
                        required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

        <x-text-input id="password_confirmation" class="form-control"
                        type="password"
                        name="password_confirmation" required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ url('/student/login') }}">
            {{ __('Already registered?') }}
        </a>

        <x-primary-button class="btn btn_warning">
            {{ __('Register') }}
        </x-primary-button>
    </div>
</form>
