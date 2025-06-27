<x-layouts.auth title="Masuk">
    {{-- Header --}}
    <h2 class="text-4xl font-bold text-primary">
        Masuk
    </h2>

    {{-- Form --}}
    <form action="" method="post" class="flex flex-col gap-4">
        @csrf
        <div class="flex flex-col gap-4">
            <x-forms.input name="email" type="email" label="Email*" value="{{ old('email') }}"
                placeholder="emailkamu@gmail.com" autofocus />

            <x-forms.input name="password" type="password" label="Kata Sandi*" />

            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="remember" class="rounded border-gray-300">
                    <span>Remember Me</span>
                </label>
                <x-buttons.text-button href="#forgot-password" class="text-primary">
                    Lupa Kata Sandi?
                </x-buttons.text-button>
            </div>
        </div>

        <x-buttons.button type="submit">Masuk</x-buttons.button>
    </form>

    {{-- Other Button --}}
    <p class="text-center text-sm text-on-surface-variant">
        Belum memiliki akun?
        <x-buttons.text-button href="{{ route('register') }}"
            class="text-primary font-medium">Daftar</x-buttons.text-button>
    </p>
</x-layouts.auth>