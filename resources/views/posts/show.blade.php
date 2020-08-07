@extends("layouts.app")

@section("content")
    <div class="relative py-16 bg-white overflow-hidden">
        <div class="relative px-4 sm:px-6 lg:px-8">
            <div class="prose prose-lg text-gray-500 mx-auto">
                <h1>
                    {{ $post->title }}
                </h1>
                <p class="text-xl">
                    {{ $post->excerpt }}
                </p>
                {!! $post->message !!}
            </div>
        </div>
    </div>
@endsection
