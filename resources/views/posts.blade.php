@extends('layouts.layout')

@section('content')


    <header class="bg-white shadow">
        <div class="max-w-6xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="md:flex md:items-center md:justify-between">
                <div class="flex-1 min-w-0">
                    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:leading-9 sm:truncate">
                       Posts
                    </h2>
                </div>
            </div>
        </div>
    </header>

    <main class="px-4 sm:px-6 lg:pb-28 lg:px-8">
        <div class="max-w-5xl mx-auto">
            @foreach ($years as $year => $posts)
                <div class="mt-12">
                    <h2 class="text-2xl leading-9 tracking-tight font-extrabold text-gray-900 border-b">
                        {{ $year }}
                    </h2>
                    <div class="mt-2 flex flex-wrap">
                        @foreach ($posts as $post)
                            <div class="mt-4 w-full sm:w-1/2">
                                <a href="/{{ $post->slug }}" class="text-gray-900 font-medium hover:underline">
                                    {{ $post->title }}
                                </a>
                                <div class="text-sm text-gray-500">
                                    Posted {{ $post->published_at->toFormattedDateString() }} by {{ $post->author->name }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </main>


@endsection
