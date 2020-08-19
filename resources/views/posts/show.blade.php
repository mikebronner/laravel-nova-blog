@extends("layouts.app")

@section("content")
    <div class="relative pt-8 pb-16 bg-white overflow-hidden">
        <div class="relative px-4 sm:px-6 lg:px-8">

            @if ($post->featured_image)
                <div
                    class="mb-12 relative pb-1/2 overflow-hidden rounded-lg"
                >
                    <img
                        class="absolute h-full w-full object-cover"
                        src="{{ asset($post->featured_image) }}"
                    >
                </div>
            @endif

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
