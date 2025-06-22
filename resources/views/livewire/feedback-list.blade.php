<div wire:poll.5s class="flex-1 overflow-y-auto pr-2 space-y-4">
    @forelse ($feedbacks as $feedback)
        <x-ui.customer-feedback name="{{ $feedback->user->name }}" avatar="{{ $feedback->user->avatar }}"
            createdAt="{{ $feedback->created_at->diffForHumans() }}">
            {{ $feedback->message }}
        </x-ui.customer-feedback>
    @empty
        <div class="text-center text-sm text-on-surface-variant">
            Tidak ada umpan balik yang tersedia.
        </div>
    @endforelse
</div>