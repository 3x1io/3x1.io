<!doctype html >
<html class="dark motion-safe:scroll-smooth 2xl:text-[20px]" lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    @include('cms::parts.meta')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+AU+VIC+WA+NT+Hand:wght@400..700&family=IBM+Plex+Sans+Arabic:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <style>
        .ibm-plex-sans-arabic-thin {
            font-family: "IBM Plex Sans Arabic", sans-serif;
            font-weight: 100;
            font-style: normal;
        }

        .ibm-plex-sans-arabic-extralight {
            font-family: "IBM Plex Sans Arabic", sans-serif;
            font-weight: 200;
            font-style: normal;
        }

        .ibm-plex-sans-arabic-light {
            font-family: "IBM Plex Sans Arabic", sans-serif;
            font-weight: 300;
            font-style: normal;
        }

        .ibm-plex-sans-arabic-regular {
            font-family: "IBM Plex Sans Arabic", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        .ibm-plex-sans-arabic-medium {
            font-family: "IBM Plex Sans Arabic", sans-serif;
            font-weight: 500;
            font-style: normal;
        }

        .ibm-plex-sans-arabic-semibold {
            font-family: "IBM Plex Sans Arabic", sans-serif;
            font-weight: 600;
            font-style: normal;
        }

        .ibm-plex-sans-arabic-bold {
            font-family: "IBM Plex Sans Arabic", sans-serif;
            font-weight: 700;
            font-style: normal;
        }
    </style>
    @livewireStyles
    @filamentStyles
    @vite('resources/css/app.css')
    @stack('css')
    @include('cms::parts.pwa')
</head>
<body class="antialiased text-gray-900 dark:text-slate-300 tracking-tight bg-white dark:bg-slate-950 ibm-plex-sans-arabic-medium">
    @include('cms::parts.header')
    <main>
        @yield('body')
    </main>

    @include('cms::parts.footer')

    @vite('resources/js/app.js')
    @stack('js')

    <script type="module">
        if(window.localStorage.getItem('theme') === 'dark') {
            document.querySelector('html').classList.add('dark');
            document.querySelector('html').classList.remove('light');
            document.querySelector('.dark-mode-sun').classList.remove('hidden');
            document.querySelector('.dark-mode-moon').classList.add('hidden');
        }
        else {
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
                const newColorScheme = event.matches ? "dark" : "light";

                if(newColorScheme === 'dark'){
                    document.querySelector('html').classList.remove('dark');
                    document.querySelector('html').classList.add('light');
                    document.querySelector('.dark-mode-moon').classList.remove('hidden');
                    document.querySelector('.dark-mode-sun').classList.add('hidden');
                }
                else {
                    document.querySelector('html').classList.remove('light');
                    document.querySelector('html').classList.add('dark');
                    document.querySelector('.dark-mode-sun').classList.remove('hidden');
                    document.querySelector('.dark-mode-moon').classList.add('hidden');
                }

            });

        }
        document.querySelector('button[aria-label="Switch Theme"]').addEventListener('click', function() {
            if(document.querySelector('html').classList.contains('dark')) {
                window.localStorage.setItem('theme', 'light');
                document.querySelector('html').classList.remove('dark');
                document.querySelector('html').classList.add('light');
                document.querySelector('.dark-mode-moon').classList.remove('hidden');
                document.querySelector('.dark-mode-sun').classList.add('hidden');
            } else {
                window.localStorage.setItem('theme', 'dark');
                document.querySelector('html').classList.add('dark');
                document.querySelector('html').classList.remove('light');
                document.querySelector('.dark-mode-sun').classList.remove('hidden');
                document.querySelector('.dark-mode-moon').classList.add('hidden');
            }
        });

        function attachEvent(selector, event, fn) {
            const matches = document.querySelectorAll(selector);
            if (matches?.length > 0) {
                for (const element of matches) {
                    element.addEventListener(event, () => {
                        fn(element);
                    }, false);
                }
            }
        }
        window.onload = () => {
            attachEvent('[data-toggle-menu]', 'click', element => {
                element.classList.toggle('expanded');
                document.body.classList.toggle('overflow-hidden');
                document.getElementById('menu')?.classList.toggle('hidden');
            });

        };
        window.onpageshow = () => {
            const element = document.querySelector('[data-toggle-menu]');
            if (element) {
                element.classList.remove('expanded');
            }
            document.body.classList.remove('overflow-hidden');
            document.getElementById('menu')?.classList.add('hidden');
        };

    </script>

    @livewireScripts
    @livewire(\App\Livewire\FcmToken::class)

    @livewire('notifications')
    @filamentScripts
</body>
</html>
