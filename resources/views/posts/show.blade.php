@extends("layouts.app")

@section("content")
    <div>
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

        <div class="pt-8 pb-16">
            <div class="px-4 sm:px-6 lg:px-8">
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
    </div>
@endsection
