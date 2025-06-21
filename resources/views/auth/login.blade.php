<x-layouts.auth title="Login">
    {{-- Header --}}
    <div class="flex flex-col gap-2">
        <h2 class="text-2xl font-bold text-primary">
            Login
        </h2>
        <p>Please login before making a booking.</p>
    </div>

    {{-- Form --}}
    <form action="" method="post" class="flex flex-col gap-6">
        @csrf
        <div class="flex flex-col gap-4">
            <x-forms.input name="phone" type="number" label="Phone Number*" prefix="+62" value="{{ old('phone') }}"
                placeholder="81234567890" autofocus />
            <x-forms.input name="password" type="password" label="Password*" />

            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="remember" class="rounded border-gray-300">
                    <span>Remember Me</span>
                </label>
                <x-buttons.text-button href="#forgot-password" class="text-primary">
                    Forgot Password?
                </x-buttons.text-button>
            </div>


        </div>

        {{-- Submit Button --}}
        <x-buttons.button type="submit">Login</x-buttons.button>
    </form>

    {{-- Other Button --}}
    <div class="mt-4 text-center">
        <p class="text-sm text-on-surface-variant">
            Don't have an account?
            <x-buttons.text-button href="{{ route('register') }}"
                class="text-primary font-medium">Register</x-buttons.text-button>
        </p>
    </div>
</x-layouts.auth>