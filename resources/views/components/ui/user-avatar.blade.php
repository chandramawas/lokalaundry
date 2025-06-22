<div class="size-{{ $size }} rounded-full overflow-hidden border border-primary">
    <img src="{{ $avatar ? asset('storage/' . $avatar) : asset('images/user_avatar_default.jpg') }}" alt="Avatar"
        class="w-full h-full object-cover">
</div>