<div class="group mx-4 border-gray-200 relative border bg-white dark:bg-gray-900 dark:border-slate-800 rounded-xl overflow-hidden">
    <div class="aspect-h-3 aspect-w-4 overflow-hidden bg-gray-100">
        <img alt="{{ $label }}" src="{{ $image }}" class="object-cover object-center">
    </div>
    <div class="p-4">
        <div class="flex items-center justify-between gap-4 text-base font-medium">
            <h3>
                <a href="{{ url(app()->getLocale() .'/'. $url) }}" title="{{ $label }}" aria-label="{{ $label }}" class="font-bold font-display text-xl text-black dark:text-gray-200">
                    <span aria-hidden="true" class="absolute inset-0"></span>
                    {!! $label !!}
                </a>
            </h3>
        </div>
        <p class="mt-1 text-sm text-gray-700 dark:text-gray-200/90">
            {!! $description !!}
        </p>
    </div>
</div>
