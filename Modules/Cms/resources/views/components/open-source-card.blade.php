<a href="{{ url(app()->getLocale() . '/'. $url) }}" class="
    flex
    dark:bg-gray-900
    border
    border-gray-200
    dark:border-gray-700
    flex-col
    gap-4
    text-center
    md:text-start
    md:flex-row
    mx-4
    p-6
    bg-white
    rounded-lg
    shadow-sm
    dark:shadow-lg
    hover:shadow-xl
    dark:hover:sm:shadow-indigo-500/20
    transition
    duration-200
">
    <div class="flex flex-col justify-center items-center">
        @if($image)
            <img src="{{ $image }}" class="rounded-lg w-32">
        @elseif($icon)
            <div style="width: 128px; height: 128px;" class="flex justify-center items-center flex-col border border-gray-700 rounded-lg">
                <x-icon name="{{ $icon }}" class="w-12 h-12 text-primary-600 dark:text-primary-400" />
            </div>
        @endif
    </div>
    <div class="flex flex-col justify-center items-center">
        <div class="flex flex-col justify-center sm:justify-start">
            <div class="mb-0.5 text-2xl sm:text-3xl font-bold text-black dark:text-gray-200">
                {!! $label !!}
            </div>
            @if($description)
                <div class=" text-gray-700 dark:text-gray-200/90 text-lg sm:text-xl sm:leading-tight leading-tight">
                    {!! str($description)->limit(75) !!}
                </div>
            @endif
            <div class="flex flex-wrap gap-1.5 mt-3 sm:mt-3 opacity-90">
                @if($tags && count($tags))
                    @foreach($tags as $tag)
                        <span class="text-[10px] inline-flex items-center font-bold leading-sm px-1.5 text-black/70 dark:text-black rounded-lg bg-gray-200/80 dark:bg-gray-200">
                        {{ $tag }}
                    </span>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</a>
