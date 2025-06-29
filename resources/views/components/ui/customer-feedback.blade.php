<div class="flex gap-2 text-on-surface items-start">
    {{-- Avatar --}}
    <div class="size-12 shrink-0 rounded-full overflow-hidden border border-primary">
        <x-ui.user-avatar avatar="{{ $avatar }}" :name="$name" />
    </div>

    {{-- Username & Feedback --}}
    <div class="overflow-hidden flex-1">
        <p class="font-bold">
            {{ $name }}
            <span class="text-on-surface-variant font-normal text-xs">{{ $createdAt }}</span>
        </p>
        <p class="text-sm text-pretty break-all">{{ $slot }}</p>
    </div>
</div>