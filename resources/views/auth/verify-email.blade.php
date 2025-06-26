<x-layouts.auth title="Verifikasi Email">
    <div class="flex flex-col gap-8">
        <h2 class="text-4xl font-bold text-primary">
            Verifikasi Email
        </h2>

        <p>
            Kami sudah mengirim link verifikasi ke email kamu. <br>
            Kalau belum menerima, klik tombol di bawah untuk mengirim ulang.
        </p>

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-buttons.button type="submit">Kirim Ulang Email Verifikasi</x-buttons.button>
        </form>
    </div>
</x-layouts.auth>