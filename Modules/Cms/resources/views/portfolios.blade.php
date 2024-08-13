@extends('cms::layouts.app')

@section('title', trans('cms::messages.portfolio.label'))
@section('description', trans('cms::messages.portfolio.title') . ' ' . trans('cms::messages.portfolio.sub'))


@section('body')
    <div class="bg-slate-50 dark:bg-inherit min-h-screen">
        <section class="container sm:px-6 py-12 sm:py-16 lg:py-20 mx-auto">
            <header>
                <h1 class="text-center text-4xl md:text-6xl font-bold leading-tighter tracking-tighter mb-8 md:mb-16 font-heading">
                    {{ trans('cms::messages.portfolio.title') }}
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-main to-secondary pr-[0.025em] mr-[-0.025em]">
                        {{ trans('cms::messages.portfolio.sub') }}
                    </span>
                </h1>
            </header>
            <section data-nosnippet="" class="mx-auto grid sm:gap-12 grid-cols-1 lg:grid-cols-3 sm:p-1 my-12 dark:text-white">
                @foreach($portfolios as $item)
                    <x-cms-portfolio-card
                        :tags="$item->categories()->pluck('name')->toArray()"
                        image="{{ $item->getFirstMediaUrl('feature_image') }}"
                        url="portfolios/{{ $item->slug }}"
                        icon="heroicon-s-users"
                        label="{{ $item->title }}"
                        description="{{ $item->short_description }}"
                    />
                @endforeach
            </section>

            <div>
                <div class="flex flex-col justify-center items-center">
                    {!! $portfolios->links() !!}
                </div>
            </div>
        </section>
    </div>
@endsection
