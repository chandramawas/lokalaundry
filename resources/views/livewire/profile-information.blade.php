<div class="flex flex-col gap-4 text-center items-center justify-center size-full">
    {{-- Avatar --}}
    <div class="size-32 shrink-0 rounded-full overflow-hidden border border-primary">
        <x-ui.user-avatar :avatar="Auth::user()->avatar" :name="Auth::user()->name" />
    </div>

    {{-- Information --}}
    <div class="flex flex-col items-center gap-1">
        <h3 class="text-xl font-bold text-primary">{{ Auth::user()->name }}</h3>
        <p class="text-on-surface-variant text-sm">{{ Auth::user()->email }}</p>
        <p class="text-on-surface-variant text-sm">+62 {{ Auth::user()->phone }}</p>
    </div>
</div>