<div class="flex flex-col gap-2 items-center text-center">
    {{-- Icon --}}
    <div
        class="w-[5rem] bg-primary text-on-primary inline-flex items-center justify-center p-4 aspect-square rounded-full text-4xl">
        <i class="{{ $icon }}"></i>
    </div>

    {{-- Description --}}
    <div class="flex flex-col">
        <p class="font-bold text-lg">{{ $descDisplay }}</p>
        <p class="text-base">{{ $descBody }}</p>
    </div>
</div>