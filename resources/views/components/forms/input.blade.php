<div class="flex flex-col gap-1 w-full">
    @if ($label)
        <label for="{{ $name }}" class="text-on-surface font-medium">{{ $label }}</label>
    @endif

    <div class="relative flex items-stretch w-full">
        @if (!empty($prefix))
            <span
                class="inline-flex items-center px-3 font-medium text-on-surface bg-surface ring-1 ring-on-surface rounded-l-md">
                {{ $prefix }}
            </span>
        @endif

        {{-- TEXTAREA --}}
        @if ($type === 'textarea')
            <textarea {{ $attributes }} id="{{ $name }}" placeholder="{{ $placeholder ?? '' }}" rows="{{ $rows }}"
                wire:model.defer="{{ $name }}"
                class="{{ $class }} w-full p-2 rounded-md {{ $errors->has($name) ? 'ring-2 ring-red-500' : 'ring-1 ring-on-surface' }} focus:outline-none focus:ring-2 transition-all text-on-surface resize-none @if($readonly) bg-surface/50 @else bg-white @endif"
                @if ($autofocus) autofocus @endif @if ($readonly) readonly @endif @if ($disabled) disabled
                @endif></textarea>

            {{-- PASSWORD --}}
        @elseif ($type === 'password')
            <div x-data="{ showPassword: false }" class="relative w-full">
                <input :type="showPassword ? 'text' : 'password'" wire:model.defer="{{ $name }}" id="{{ $name }}"
                    name="{{ $name }}" placeholder="{{ $placeholder ?? '' }}"
                    class="{{ $class }} w-full p-2 @if (!empty($prefix)) rounded-r-md border-l-0 @else rounded-md @endif {{ $errors->has($name) ? 'ring-2 ring-red-500' : 'ring-on-surface' }} ring-1 focus:outline-none focus:ring-2 transition-all text-on-surface @if($readonly) bg-surface/50 @else bg-white @endif"
                    @if ($autofocus) autofocus @endif @if ($readonly) readonly @endif @if ($disabled) disabled @endif>

                <button type="button" @click="showPassword = !showPassword"
                    class="absolute inset-y-0 right-0 p-2 flex items-center text-on-surface-variant hover:text-on-surface text-sm cursor-pointer">
                    <i :class="showPassword ? 'fa-regular fa-eye-slash' : 'fa-regular fa-eye'"></i>
                </button>
            </div>

            {{-- INPUT BIASA --}}
        @else
            <input type="{{ $type }}" wire:model.defer="{{ $name }}" id="{{ $name }}" name="{{ $name }}"
                placeholder="{{ $placeholder ?? '' }}"
                class="{{ $class }} w-full p-2 @if (!empty($prefix)) rounded-r-md border-l-0 @else rounded-md @endif {{ $errors->has($name) ? 'ring-2 ring-red-500' : 'ring-on-surface' }} ring-1 focus:outline-none focus:ring-2 transition-all text-on-surface @if($readonly) bg-surface/50 @else bg-white @endif"
                @if ($autofocus) autofocus @endif @if ($readonly) readonly @endif @if ($disabled) disabled @endif>
        @endif
    </div>

    {{-- Error Message --}}
    @error($name)
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>