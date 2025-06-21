<div class="flex flex-col gap-1">
    @if ($label)
        <label for="{{ $name }}" class="text-on-surface font-medium">{{ $label }}</label>
    @endif

    @if ($type === 'textarea')
        <textarea name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder ?? '' }}" rows="{{ $rows }}"
            class="p-2 rounded-md ring-primary ring-1 focus:outline-none focus:ring-2 transition-all text-on-surface resize-none @if($readonly) bg-surface/50 @endif"
            @if ($autofocus) autofocus @endif @if ($readonly) readonly @endif @if ($disabled) disabled
            @endif>{{ old($name, $value) }}</textarea>
    @else
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder ?? '' }}"
            value="{{ old($name, $value) }}"
            class="p-2 rounded-md ring-primary ring-1 focus:outline-none focus:ring-2 transition-all text-on-surface @if($readonly) bg-surface/50 @endif"
            @if ($autofocus) autofocus @endif @if ($readonly) readonly @endif @if ($disabled) disabled @endif>
    @endif
</div>