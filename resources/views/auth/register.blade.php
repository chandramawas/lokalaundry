<x-layouts.auth title="Daftar">
    {{-- Header --}}
    <div class="flex flex-col gap-2">
        <h2 class="text-4xl font-bold text-primary">
            Daftar
        </h2>
    </div>

    {{-- Form --}}
    <form action="" method="post" class="flex flex-col gap-6">
        @csrf
        <div class="flex flex-col gap-4">
            {{-- Name --}}
            <x-forms.input name="email" type="email" label="Email*" value="{{ old('email') }}" placeholder="example123@gmail.com"
                autofocus />

            <x-forms.input name="name" type="text" label="Nama*" value="{{ old('name') }}" placeholder="John Doe"
                autofocus />

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
    <div class="mt-4 text-center">
        <p class="text-sm text-on-surface-variant">
            Sudah memiliki akun?
            <x-buttons.text-button href="{{ route('login') }}"
                class="text-primary font-medium">Masuk</x-buttons.text-button>
        </p>
    </div>
</x-layouts.auth>