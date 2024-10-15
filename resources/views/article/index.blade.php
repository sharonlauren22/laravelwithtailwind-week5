@extends('base.base')

@section('content')
    <div class="container mx-auto">

        {{-- Modal --}}
        <div id="comments-modal" class="relative z-10 hidden">
            <!--
                          Background backdrop, show/hide based on modal state.
                      
                          Entering: "ease-out duration-300"
                            From: "opacity-0"
                            To: "opacity-100"
                          Leaving: "ease-in duration-200"
                            From: "opacity-100"
                            To: "opacity-0"
                        -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <!--
                              Modal panel, show/hide based on modal state.
                      
                              Entering: "ease-out duration-300"
                                From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                To: "opacity-100 translate-y-0 sm:scale-100"
                              Leaving: "ease-in duration-200"
                                From: "opacity-100 translate-y-0 sm:scale-100"
                                To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            -->
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                    <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Comments
                                    </h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">Are you sure you want to deactivate your account?
                                            All of your data will be permanently removed. This action cannot be undone.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <button id="close-button" type="button"
                                class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End of Modal --}}

        <div class="max-w-xl mx-auto py-24">
            @if (Session::has('message') && Session::get('alert-class') == 'success')
                <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                    role="alert">
                    {{ Session::get('message') }}
                </div>
            @elseif(Session::has('message') && Session::get('alert-class') == 'failed')
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif
            <a href="{{ route('articles.create') }}">
                <x-button class="mb-3 inline-flex text-sm" color="cyan">
                    <svg class="h-6 w-6 me-2 ms-1 text-orange-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                    </svg>
                    Create Article
                </x-button>
            </a>
            @if ($articles->count() == 0)
                <h4 class="text-2xl text-gray-600 font-extrabold mb-3">No articles</h4>
            @endif
            @foreach ($articles as $item)
                <article class="prose lg:prose-xl py-3">
                    <div class="">
                        <form action="{{ route('articles.destroy', ['article' => $item->id]) }}" method="POST"
                            class="inline-flex no-underline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </form>
                        <a href="{{ route('articles.edit', ['article' => $item->id]) }}" class="no-underline">
                            <button type="button"
                                class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </button>
                        </a>
                        <a href="{{ route('articles.show', ['article' => $item->id]) }}" class="no-underline">
                            <h1>{{ $item->title }}</h1>
                        </a>
                    </div>
                    {{-- command code : ctrl + / --}}
                    {{-- {{ $item->article }} --}}
                    {!! $item->article !!}

                    <div class="">
                        <button class="comment-button" type="button" aria-haspopup="dialog" aria-expanded="false"
                            aria-controls="comments-modal" data-hs-overlay="#comments-modal">
                            <i class="fa fa-comment" aria-hidden="true"></i>
                            {{ $item->number_of_comments() }}
                        </button>
                    </div>
                </article>
            @endforeach
            {{ $articles->links() }}
        </div>
    </div>
@endsection

@section('footer')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.comment-button').on('click', function() {
                $("#comments-modal").show();
            });

            $('#close-button').on('click', function() {
                $("#comments-modal").hide();
            });
        });
    </script>
@endsection
