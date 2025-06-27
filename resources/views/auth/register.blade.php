<x-layouts.auth title="Daftar">
    {{-- Header --}}
    <h2 class="text-4xl font-bold text-primary">
        Daftar
    </h2>

    {{-- Form --}}
    <form action="" method="post" class="flex flex-col gap-4">
        @csrf
        <div class="flex flex-col gap-2">
            {{-- Name --}}
            <x-forms.input name="email" type="email" label="Email*" value="{{ old('email') }}"
                placeholder="emailkamu@gmail.com" autofocus />

            <x-forms.input name="name" type="text" label="Nama*" value="{{ old('name') }}" placeholder="John Doe" />

            {{-- Phone Number --}}
            <x-forms.input name="phone" type="number" label="Nomor Telepon*" prefix="+62" value="{{ old('phone') }}"
                placeholder="81234567890" />

            {{-- Password --}}
            <x-forms.input name="password" type="password" label="Kata Sandi*" />

            {{-- Confirm Password --}}
            <x-forms.input name="password_confirmation" type="password" label="Konfirmasi Kata Sandi*" />
        </div>

        {{-- Submit Button --}}
        <x-buttons.button type="submit">Daftar</x-buttons.button>
    </form>

    {{-- Other Button --}}
    <p class="text-sm text-on-surface-variant text-center">
        Sudah memiliki akun?
        <x-buttons.text-button href="{{ route('login') }}"
            class="text-primary font-medium">Masuk</x-buttons.text-button>
    </p>
</x-layouts.auth>