<div class="flex flex-col gap-4 justify-center items-center my-4 p-16">
    <x-icon name="bx-x-circle" class="w-16 h-16 text-danger-500"></x-icon>
    <div>
        <h1 class="text-3xl">
            {{trans('cms::messages.empty.no')}} {{ $name }} {{trans('cms::messages.empty.found')}}
        </h1>
        <p class="text-center text-md text-gray-500 dark:text-gray-400">
            {{trans('cms::messages.empty.description')}} {{ $name }}
        </p>
    </div>
</div>
