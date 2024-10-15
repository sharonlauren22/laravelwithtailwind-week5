@extends('base.base')

@section('content')
    <div class="container mx-auto">
        <div class="max-w-xl mx-auto py-24">
            <article class="prose lg:prose-xl">
                <a href="{{ route('articles.index') }}">
                    <button type="button"
                        class="inline-flex text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                        <svg class="h-6 w-6 me-2 ms-1 text-gray-800"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M9 13l-4 -4l4 -4m-4 4h11a4 4 0 0 1 0 8h-1" /></svg>
                        Back
                    </button>
                </a>
                <h1>{{ $article->title }}</h1>
                <p>
                    {!! $article->article !!}
                </p>
            </article>
        </div>
    </div>
@endsection
