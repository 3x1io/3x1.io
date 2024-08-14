@extends('cms::layouts.app')

@section('title', $portfolio->title)
@section('description', $portfolio->short_description)
@section('keywords', $portfolio->keywords)

@section('body')
    <div class="bg-slate-50 dark:bg-inherit min-h-screen">
        <header class="pt-4">
            <p class="max-w-3xl mx-auto mb-3 text-center text-sm opacity-80">
                <time datetime="{{$portfolio->created_at}}">
                    {{ $portfolio->created_at->diffForHumans() }}
                </time>
            </p>
            <h1 class="px-4 sm:px-6 max-w-3xl mx-auto text-center text-5xl md:text-6xl font-bold leading-tighter tracking-tighter mb-8 font-heading">
                {!! $portfolio->title !!}
            </h1>
            <h2 class="px-4 sm:px-6 mt-[-4px] max-w-3xl mx-auto text-center text-xl md:text-2xl opacity-80">
                {!! $portfolio->short_description !!}
            </h2>
        </header>

        <div class="flex flex-col justify-center items-center py-4">
            <section class="container mx-auto py-6 rounded-lg px-6 sm:px-6 max-w-3xl prose prose-lg lg:prose-xl dark:prose-invert dark:prose-headings:text-slate-300 prose-headings:font-heading prose-headings:leading-tighter prose-headings:tracking-tighter prose-headings:font-bold prose-img:rounded-md prose-img:shadow-lg mt-8 prose-a:text-black/75 dark:prose-a:text-white/90 prose-a:underline prose-a:underline-offset-4 prose-a:decoration-primary-500 hover:prose-a:decoration-primary-600 prose-a:decoration-2 hover:prose-a:decoration-4 hover:prose-a:text-black dark:hover:prose-a:text-white break-words tracking-normal prose-h4:tracking-normal prose-h5:tracking-normal prose-h6:tracking-normal prose-code:before:hidden prose-code:after:hidden markdown-body">
                <div class="flex flex-col justify-center items-center gap-4 mb-4">
                    @foreach($portfolio->getMedia('images') as $image)
                        <img src="{{ $image->getUrl() }}"  class="p-[20px]">
                    @endforeach
                </div>
                {!! str($portfolio->body)->markdown() !!}
            </section>

            <x-cms-social-share />
        </div>
    </div>
@endsection
