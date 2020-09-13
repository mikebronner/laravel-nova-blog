@extends("layouts.app")

@section("content")
    <div class="mx-auto prose">
        <h1>{{ $blog->title }}</h1>
        <p class="mt-3 max-w-2xl text-xl leading-7 text-gray-500 sm:mt-4">
            {{ $blog->description }}
        </p>
        <div class="mt-12 grid gap-5 mx-auto md:grid-cols-2">

            @foreach ($blog->posts as $post)
                <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                    @if ($post->featured_image)
                        <div class="flex-shrink-0">
                            <img
                                class="h-48 w-full object-cover"
                                src="{{  asset($post->featured_image) }}"
                                alt="{{  asset($post->featured_image_alt) }}"
                            >
                        </div>
                    @endif

                    <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                        <div class="flex-1">

                            @if ($post->category)
                                <p class="mb-2 text-sm leading-5 font-medium text-indigo-600">
                                    <a
                                        href="{{ route("categories.show", $post->category) }}"
                                        class="hover:underline"
                                    >
                                        {{ $post->categoryName }}
                                    </a>
                                </p>
                            @endif

                            <a
                                href="{{ route("posts.show", $post) }}"
                                class="block"
                            >
                                <h3 class="mt-0 text-xl leading-7 font-semibold text-gray-900">
                                    {{ $post->title }}
                                </h3>
                                <p class="mt-3 text-base leading-6 text-gray-500">
                                    {{ $post->excerpt }}
                                </p>
                            </a>
                        </div>
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <a href="{{ route("authors.show", $post->author) }}">
                                    <img
                                        class="h-10 w-10 rounded-full m-0"
                                        src="{{ $post->authorGravatar }}"
                                        alt="{{ $post->authorName }}"
                                    >
                                </a>
                            </div>
                            <div class="ml-3">
                                <p class="m-0 text-sm leading-5 font-medium text-gray-900">
                                    <a
                                        href="{{ route("authors.show", $post->author) }}"
                                        class="hover:underline"
                                    >
                                        {{ $post->authorName }}
                                    </a>
                                </p>
                                <div class="mt-1 flex text-sm leading-5 text-gray-500">
                                    <time datetime="{{ $post->published_at }}">
                                        {{ $post->published_at->format("d M Y") }}
                                    </time>

                                    @if ($post->published_at && $post->readDurationMinutes)
                                        <span class="mx-1">
                                            &middot;
                                        </span>
                                    @endif

                                    <span>
                                        {{ $post->readDurationMinutes }}
                                        min read
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
