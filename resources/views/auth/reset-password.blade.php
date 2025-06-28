<x-layouts.auth title="Reset Kata Sandi">
    <h2 class="text-4xl font-bold text-primary">Reset Kata Sandi</h2>

    <form method="POST" action="{{ route('password.update') }}" class="flex flex-col gap-4">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ $email }}">

        <x-forms.input name="password" type="password" label="Kata Sandi Baru*" />
        <x-forms.input name="password_confirmation" type="password" label="Konfirmasi Kata Sandi Baru*" />

        <x-buttons.button type="submit">Reset Password</x-buttons.button>
    </form>
</x-layouts.auth>