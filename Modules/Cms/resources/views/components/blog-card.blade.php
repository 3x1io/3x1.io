<li class="mb-10 md:mb-16">
    <article class="max-w-md mx-auto md:max-w-none">
        <div>
            <header>
                <h2 class="text-3xl sm:text-4xl font-bold leading-snug mb-2 font-heading">
                    <a class="hover:underline hover:underline-offset-4 hover:decoration-3" href="{{ url(app()->getLocale() .'/'. $url) }}">
                        {!! $label !!}
                    </a>
                </h2>
            </header>
            @if($description)
                <p class="text-lg sm:text-xl flex-grow mt-2 opacity-80">
                    {!! $description !!}
                </p>
            @endif
            <footer class="mt-4">
                <div>
              <span class="text-gray-500 dark:text-slate-400">
                <time datetime="{{ $date }}">{{ \Illuminate\Support\Carbon::parse($date)->diffForHumans() }}</time></span>
                </div>
            </footer>
        </div>
    </article>
    <style>
        /* Workaround to not add hover underline to the external link symbol */
        article h2 a:hover {
            box-shadow: inset 0 -4px 0 0 currentColor;
            text-decoration: none !important;
        }
    </style>
</li>
