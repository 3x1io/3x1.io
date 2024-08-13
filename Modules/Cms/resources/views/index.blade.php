@extends('cms::layouts.app')

@section('body')
    <section >
        <div class="flex md:h-screen max-w-6xl mx-auto px-4 sm:px-6 md:-mt-20" >
            <div class="m-auto py-12 md:py-20" >
                <div class="text-center pb-10 md:pb-16" >
                    <img src="{{ asset('images/fady.jpeg') }}" class="mx-auto m-8 rounded-full" width="144" height="144" >
                    <h1 class="ml6">
                      <span class="text-wrapper">
                        <span class="letters">{{ trans('cms::messages.index.title') }}</span>
                      </span>
                    </h1>

                    <div class="max-w-3xl mx-auto" >
                        <p class="text-xl text-gray-600 mb-8 dark:text-slate-400" >
                            <span class="text-2xl" >
                                {{ trans('cms::messages.index.description') }}
                            </span>
                        </p>
                        <div class="max-w-none px-6 my-2 flex flex-nowrap flex-col sm:flex-row sm:justify-center gap-6" >
                            <div class="flex w-full sm:w-auto" >
                                <x-cms-main-button url="open-source" label="{{ trans('cms::messages.index.actions.open-source') }}" icon="heroicon-s-code-bracket-square" />
                            </div>
                            <div class="flex w-full sm:w-auto" >
                                <x-cms-sub-button url="https://www.github.com/3x1io" :away="true" label="{{ trans('cms::messages.index.actions.github') }}" icon="bxl-github"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('css')
    <style>
        html {
            scroll-padding-top: 80px;
            /* The header has 72px height and we add some padding */
        }
        .background-animate[move] {
            background-size: 400%;
            animation: AnimationName 4s ease infinite
        }

        @keyframes AnimationName {

            0%,
            to {
                background-position: 0% 50%
            }

            50% {
                background-position: 100% 50%
            }
        }
        .ml6 {
            position: relative;
            font-weight: 900;
            font-size: 3.3em;
        }

        .ml6 .text-wrapper {
            position: relative;
            display: inline-block;
            padding-top: 0.2em;
            padding-right: 0.05em;
            padding-bottom: 0.1em;
            overflow: hidden;
        }

        .ml6 .text-wrapper-rtl {
            position: relative;
            display: inline-block;
            padding-top: 0.2em;
            padding-right: 0.1em;
            padding-bottom: 0.05em;
            overflow: hidden;
        }

        .ml6 .letter {
            display: inline-block;
            line-height: 1em;
        }
    </style>
@endpush
