<div class="grid grid-cols-6 gap-2">
    <div class="col-span-2 size-full flex items-center justify-center">
        <x-icons.washing-machine class="h-auto {{ $width }}" />
    </div>
    <div class="col-span-4 flex flex-col gap-1">
        <h4 class="font-bold">{{ $title }}</h4>
        <p class="text-sm">
            Rp{{ number_format($price ?? 0, 0, ',', '.') }}
        </p>
    </div>
</div>