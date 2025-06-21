<div class="flex flex-col gap-1 w-full" x-data="{ showPassword: false }">
    @if ($label)
        <label for="{{ $name }}" class="text-on-surface font-medium">{{ $label }}</label>
    @endif

    <div class="relative flex items-stretch w-full">
        @if (!empty($prefix))
            <span
                class="inline-flex items-center px-3 text-sm text-on-surface-variant bg-surface ring-1 ring-on-surface rounded-l-md">
                {{ $prefix }}
            </span>
        @endif

        @if ($type === 'textarea')
            <textarea name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder ?? '' }}" rows="{{ $rows ?? 3 }}"
                class="w-full p-2 rounded-md {{ $errors->has($name) ? 'ring-2 ring-red-500' : 'ring-1 ring-on-surface' }} focus:outline-none focus:ring-2 transition-all text-on-surface resize-none @if($readonly) bg-surface/50 @else bg-white @endif"
                @if ($autofocus) autofocus @endif @if ($readonly) readonly @endif @if ($disabled) disabled
                @endif>{{ old($name, $value) }}</textarea>
        @else
            <input :type="showPassword ? 'text' : '{{ $type }}'" name="{{ $name }}" id="{{ $name }}"
                placeholder="{{ $placeholder ?? '' }}" value="{{ old($name, $value) }}"
                class="w-full p-2 @if (!empty($prefix)) rounded-r-md border-l-0 @else rounded-md @endif {{ $errors->has($name) ? 'ring-red-500' : 'ring-on-surface' }} ring-1 focus:outline-none focus:ring-2 transition-all text-on-surface @if($readonly) bg-surface/50 @else bg-white @endif"
                @if ($autofocus) autofocus @endif @if ($readonly) readonly @endif @if ($disabled) disabled @endif>

            @if ($type === 'password')
                <button type="button" @click="showPassword = !showPassword"
                    class="absolute inset-y-0 right-0 p-2 flex items-center text-on-surface-variant hover:text-on-surface text-sm cursor-pointer">
                    <i :class="showPassword ? 'fa-regular fa-eye-slash' : 'fa-regular fa-eye'"></i>
                </button>
            @endif
        @endif
    </div>

    {{-- Error Message --}}
    @error($name)
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>