@livewireScripts
@livewire(\App\Livewire\FcmToken::class)

@livewire('notifications')
@filamentScripts
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>    <script>
    $(function(){  // $(document).ready shorthand
        $('.app').fadeIn('slow');
    });
</script>

<script type="module">
    if(window.localStorage.getItem('theme') && window.localStorage.getItem('theme') === 'dark') {
        document.querySelector('html').classList.add('dark');
        document.querySelector('html').classList.remove('light');
        document.querySelector('.dark-mode-sun').classList.remove('hidden');
        document.querySelector('.dark-mode-moon').classList.add('hidden');
    }
    else if(window.localStorage.getItem('theme') && window.localStorage.getItem('theme') === 'light'){
        document.querySelector('html').classList.remove('dark');
        document.querySelector('html').classList.add('light');
        document.querySelector('.dark-mode-sun').classList.add('hidden');
        document.querySelector('.dark-mode-moon').classList.remove('hidden');
    }
    else {
        try{
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
                const newColorScheme = event.matches ? "dark" : "light";

                if(newColorScheme === 'dark'){
                    document.querySelector('html').classList.remove('dark');
                    document.querySelector('html').classList.add('light');
                    document.querySelector('.dark-mode-moon').classList.remove('hidden');
                    document.querySelector('.dark-mode-sun').classList.add('hidden');

                    window.localStorage.setItem('theme', 'dark');
                }
                else {
                    document.querySelector('html').classList.remove('light');
                    document.querySelector('html').classList.add('dark');
                    document.querySelector('.dark-mode-sun').classList.remove('hidden');
                    document.querySelector('.dark-mode-moon').classList.add('hidden');

                    window.localStorage.setItem('theme', 'light');
                }

            });
        }catch (err){
            document.querySelector('html').classList.remove('dark');
            document.querySelector('html').classList.add('light');
            document.querySelector('.dark-mode-moon').classList.remove('hidden');
            document.querySelector('.dark-mode-sun').classList.add('hidden');

            window.localStorage.setItem('theme', 'dark');
        }
    }
    document.querySelector('button[aria-label="Switch Theme"]').addEventListener('click', function() {
        if(document.querySelector('html').classList.contains('dark')) {
            window.localStorage.setItem('theme', 'light');
            document.querySelector('html').classList.remove('dark');
            document.querySelector('html').classList.add('light');
            document.querySelector('.dark-mode-moon').classList.remove('hidden');
            document.querySelector('.dark-mode-sun').classList.add('hidden');

            window.localStorage.setItem('theme', 'light');

        } else {
            window.localStorage.setItem('theme', 'dark');
            document.querySelector('html').classList.add('dark');
            document.querySelector('html').classList.remove('light');
            document.querySelector('.dark-mode-sun').classList.remove('hidden');
            document.querySelector('.dark-mode-moon').classList.add('hidden');

            window.localStorage.setItem('theme', 'dark');
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


@vite('resources/js/app.js')
@stack('js')
