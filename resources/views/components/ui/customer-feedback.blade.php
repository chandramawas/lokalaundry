<div class="flex gap-2 text-on-surface">
    {{-- Avatar --}}
    <x-ui.user-avatar avatar="{{ $avatar }}" :name="$name" size="12" />

    {{-- Username & Feedback --}}
    <div class="overflow-hidden flex-1">
        <p class="font-bold">
            {{ $name }}
            <span class="text-on-surface-variant font-normal text-xs">{{ $createdAt }}</span>
        </p>
        <p class="text-sm text-pretty break-all">{{ $slot }}</p>
    </div>
</div>