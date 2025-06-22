<div class="flex flex-col gap-1 w-full">
    @if ($label)
        <label for="{{ $name }}" class="text-on-surface font-medium">{{ $label }}</label>
    @endif

    <input type="file" name="{{ $name }}" id="{{ $name }}" {{ $attributes }}
        class="cursor-pointer file:cursor-pointer w-full rounded-md ring-1 ring-on-surface focus:outline-none focus:ring-2 transition-all bg-white text-on-surface file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:font-semibold file:bg-primary/75 file:text-on-primary hover:file:brightness-110 {{ $class }}">

    @error($name)
        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>