@extends('cms::layouts.app')

@section('title', app()->getLocale() === 'en' ? str(setting('site_name'))->explode('|')[0]??setting('site_name') : str(setting('site_name'))->explode('|')[1]??setting('site_name') . ' | '. trans('cms::messages.blog.label'))
@section('description', trans('cms::messages.blog.title') . ' ' . trans('cms::messages.blog.sub'))

@section('body')
    <div class="bg-slate-50 dark:bg-inherit min-h-screen">
        <section class="container sm:px-6 py-12 sm:py-16 lg:py-20 mx-auto">
            <header>
                <h1 class="text-center text-4xl md:text-6xl font-bold leading-tighter tracking-tighter mb-8 md:mb-16 font-heading">
                    {{ trans('cms::messages.blog.title') }}
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-main to-secondary pr-[0.025em] mr-[-0.025em]">
                        {{ trans('cms::messages.blog.sub') }}
                    </span>
                </h1>
            </header>
            <div class="px-6 sm:px-6 flex flex-col gap-4 mx-auto max-w-xl">
                <ul>
                    @foreach ($posts as $item)
                        <x-cms-blog-card
                            :tags="$item->categories()->pluck('name')->toArray()"
                            image="{{ $item->getFirstMediaUrl('feature_image') }}"
                            url="blog/{{ $item->slug }}"
                            label="{{ $item->title }}"
                            description="{{ $item->short_description }}"
                            date="{{ $item->created_at }}"
                        />
                    @endforeach
                </ul>
            </div>

        </section>

        <div>
            <div class="flex flex-col justify-center items-center">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>
@endsection
