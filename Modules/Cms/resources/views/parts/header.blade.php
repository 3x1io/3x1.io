<header data-nosnippet="" class="sticky top-0 z-40 flex-none mx-auto w-full bg-white md:bg-white/90 dark:bg-slate-950 dark:md:bg-slate-950/90 md:backdrop-blur-sm border-b dark:border-b-0">
    <div class="py-3 px-3 mx-auto w-full md:flex md:justify-between max-w-6xl md:px-4">
        <div class="flex justify-between">
            <a class="flex items-center" href="{{ url(app()->getLocale()) }}">
                <span class="self-center ml-2 text-2xl font-extrabold text-gray-900 whitespace-nowrap dark:text-white">
                    🍅
                </span>
            </a>
            <div class="flex items-center md:hidden">
                <button type="button" class="ml-1.5 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 inline-flex items-center transition" aria-label="Toggle Menu" data-toggle-menu="">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 24 24" class="w-6 h-6" astro-icon="tabler:menu">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"></path>
                    </svg>
                </button>
            </div>
        </div>
        <nav class="items-center w-full md:w-auto hidden md:flex text-gray-600 dark:text-slate-200 h-screen md:h-auto" aria-label="Main navigation" id="menu">
            <ul class="flex flex-col pt-8 md:pt-0 md:flex-row md:self-center w-full md:w-auto collapsed text-xl md:text-base">
                @include('cms::parts.menu')
            </ul>
            <div class="md:self-center flex items-center mb-4 md:mb-0 ml-2">
                <div class="hidden items-center md:flex">
                    <button aria-label="Switch Theme" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 inline-flex items-center">
                        <x-icon name="heroicon-s-moon" class="w-5 h-5 dark-mode-moon hidden" />
                        <x-icon name="heroicon-s-sun" class="w-5 h-5 dark-mode-sun hidden" />
                    </button>
                    <a href="{{ app()->getLocale() === 'en' ? url('ar') : url('en') }}" aria-label="Switch Language" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 inline-flex items-center">
                        <x-icon name="heroicon-s-language" class="w-5 h-5" />
                    </a>
                    <a href="{{ url(app()->getLocale() . '/contact') }}" aria-label="Contact" class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 inline-flex items-center">
                        <svg viewBox="0 0 24 24" class="w-5 h-5" astro-icon="tabler:mail">
                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path d="M3 7a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <path d="m3 7 9 6 9-6"></path>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
        </nav>
    </div>
</header>
