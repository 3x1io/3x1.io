<a href="{{ url(app()->getLocale() . '/'. $url) }}" class="flex mx-4 py-6 px-2 sm:p-6 bg-white dark:bg-black/20 sm:rounded-xl shadow-md dark:shadow-lg hover:shadow-xl dark:hover:sm:shadow-indigo-500/20 transition duration-500 dark:sm:border dark:border-slate-800">
    <div class="flex-initial flex-shrink-0 justify-center rtl:ml-2 rtl:sm:ml-3 mr-2 sm:mr-3">
        @if($image)
            <img src="{{ $image }}" width="128" height="128" class="rounded-lg">
        @elseif($icon)
            <div style="width: 128px; height: 128px;" class="flex justify-center items-center flex-col border border-gray-700 rounded-lg">
                <x-icon name="{{ $icon }}" class="w-12 h-12 text-primary-600 dark:text-primary-400" />
            </div>
        @endif
    </div>
    <div class="flex flex-col justify-center my-3 rtl:ml-2 mr-2 sm:mt-[-1px]">
        <div class="mb-0.5 text-2xl sm:text-3xl font-bold">
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
</a>
