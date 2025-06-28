<x-layouts.auth title="Lupa Kata Sandi">
    <h2 class="text-4xl font-bold text-primary">Lupa Kata Sandi</h2>

    <form method="POST" action="{{ route('password.email') }}" class="flex flex-col gap-4">
        @csrf

        <x-forms.input name="email" type="email" label="Email*" value="{{ old('email') }}"
            placeholder="emailkamu@gmail.com" autofocus />

        <x-buttons.button type="submit">Kirim Link Reset Kata Sandi</x-buttons.button>
    </form>
</x-layouts.auth>