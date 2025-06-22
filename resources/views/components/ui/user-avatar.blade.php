@php
    $avatarUrl = $avatar
        ? asset('storage/' . $avatar)
        : 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&background=random&size=150';
@endphp

<div class="size-full">
    <img src="{{ $avatarUrl }}" alt="Avatar" class="w-full h-full object-cover">
</div>