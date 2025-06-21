<section id="{{ $id }}" class="max-w-5xl mx-auto px-4 flex flex-col items-center gap-4">
    @if ($title)
        <h2 class="text-2xl font-bold text-primary">
            {{ $title }}
        </h2>
    @endif
    <div class="bg-white w-full p-8 rounded-xl shadow-md">
        {{ $slot }}
    </div>
</section>