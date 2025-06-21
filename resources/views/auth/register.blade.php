<x-layouts.auth title="Register">
    {{-- Header --}}
    <div class="flex flex-col gap-2">
        <h2 class="text-2xl font-bold text-primary">
            Register
        </h2>
        <p>Please register before making a booking.</p>
    </div>

    {{-- Form --}}
    <form action="" method="post" class="flex flex-col gap-6">
        @csrf
        <div class="flex flex-col gap-4">
            {{-- Name --}}
            <x-forms.input name="name" type="text" label="Name*" value="{{ old('name') }}" placeholder="John Doe"
                autofocus />

            {{-- Phone Number --}}
            <x-forms.input name="phone" type="number" label="Phone Number*" prefix="+62" value="{{ old('phone') }}"
                placeholder="81234567890" />

            {{-- Password --}}
            <x-forms.input name="password" type="password" label="Password*" />

            {{-- Confirm Password --}}
            <x-forms.input name="password_confirmation" type="password" label="Confirm Password*" />
        </div>

        {{-- Submit Button --}}
        <x-buttons.button type="submit">Register</x-buttons.button>
    </form>

    {{-- Other Button --}}
    <div class="mt-4 text-center">
        <p class="text-sm text-on-surface-variant">
            Already have an account?
            <x-buttons.text-button href="{{ route('login') }}"
                class="text-primary font-medium">Login</x-buttons.text-button>
        </p>
    </div>
</x-layouts.auth>