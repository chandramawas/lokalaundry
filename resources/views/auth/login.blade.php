<x-layouts.auth title="Masuk">
    {{-- Header --}}
    <div class="flex flex-col gap-2">
        <h2 class="text-4xl font-bold text-primary">
            Masuk
        </h2>
    </div>

    {{-- Form --}}
    <form action="" method="post" class="flex flex-col gap-6">
        @csrf
        <div class="flex flex-col gap-4">
            <x-forms.input name="phone" type="number" label="Nomor Telepon*" prefix="+62" value="{{ old('phone') }}"
                placeholder="81234567890" autofocus />
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

        {{-- Submit Button --}}
        <x-buttons.button type="submit">Masuk</x-buttons.button>
    </form>

    {{-- Other Button --}}
    <div class="mt-4 text-center">
        <p class="text-sm text-on-surface-variant">
            Belum memiliki akun?
            <x-buttons.text-button href="{{ route('register') }}"
                class="text-primary font-medium">Daftar</x-buttons.text-button>
        </p>
    </div>
</x-layouts.auth>