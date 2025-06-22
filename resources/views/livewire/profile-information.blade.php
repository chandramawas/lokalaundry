<div class="flex flex-col gap-4 items-center justify-center size-full">
    {{-- Avatar --}}
    <x-ui.user-avatar :avatar="Auth::user()->avatar" :name="Auth::user()->name" size="32" />

    {{-- Information --}}
    <div class="flex flex-col items-center gap-1">
        <h3 class="text-xl font-bold text-primary">{{ Auth::user()->name }}</h3>
        <p class="text-on-surface-variant text-sm">+62 {{ Auth::user()->phone }}</p>
    </div>
</div>