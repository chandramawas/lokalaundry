<div class="flex gap-2 text-on-surface">
    {{-- Avatar --}}
    <div class="h-12 w-12 shrink-0 rounded-full overflow-hidden">
        <img src="https://i.pravatar.cc/150?u={{ $username }}" alt="Avatar">
    </div>

    {{-- Username & Feedback --}}
    <div>
        <p class="font-bold">
            {{ $username }}
            <span class="text-on-surface-variant font-normal text-xs">{{ $createdAt }}</span>
        </p>
        <p class="text-sm text-pretty">{{ $slot }}</p>
    </div>
</div>