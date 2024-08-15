<div class="flex flex-col justify-start border-b border-gray-200 dark:border-gray-900 py-4">
    <div>
        <a href="{{ $url }}" class="text-main underline font-bold text-lg">
            {{ $label }}
        </a>
        <div class="flex justify-start gap-2 mt-2">
            <div class="font-bold">{{ $meta['lang'] }}</div>
            <div class="font-bold text-2xl" style="line-height: 0.5;">.</div>
            <div class="font-sm flex justify-start gap-2">
                <div class="flex flex-col justify-center items-center">
                    <x-icon name="bx-git-repo-forked" class="w-4 h-4 text-success-500"/>
                </div>
                <div>
                    {{ $meta['issues'] }}
                </div>
            </div>
            <div class="font-bold text-2xl" style="line-height: 0.5;">.</div>
            <div class="font-sm flex justify-start gap-2">
                <div class="flex flex-col justify-center items-center">
                    <x-icon name="bxs-star" class="w-4 h-4 text-warning-500"/>
                </div>
                <div>
                    {{ $meta['starts'] }}
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-start">
        <div class="flex flex-col justify-start">
            <div>
                <p class="text-md">
                    {!! $description !!}
                </p>
            </div>
        </div>
    </div>
</div>
