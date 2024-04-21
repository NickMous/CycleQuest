<div class="relative flex flex-col {{ $divclass ?? '' }}">
    <div class="relative z-0">
        <x-input {{ $attributes->except(['label', 'supporting_text', 'error', 'divclass']) }} placeholder=" "/>
        <x-label for="{{$name}}" value="{{ $label }}"/>
    </div>
    @if(isset($supporting_text))
    <div class="pt-1 px-4 text-xs tracking-[0.4px]">{{$supporting_text}}</div>
    @endif
    @if($error ?? false)
    <x-input-error for="{{$name}}" class="mt-1"/>
    @endif
</div>
