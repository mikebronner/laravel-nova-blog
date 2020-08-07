@extends("layouts.app")

@section("content")
    <div class="relative bg-gray-50 pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
        <div class="absolute inset-0">
            <div class="bg-white h-1/3 sm:h-2/3"></div>
        </div>
        <div class="relative max-w-7xl mx-auto">
            <div class="text-center">
                <h2 class="text-3xl leading-9 tracking-tight font-extrabold text-gray-900 sm:text-4xl sm:leading-10">
                    From the blog
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl leading-7 text-gray-500 sm:mt-4">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed.
                </p>
            </div>
            <div class="mt-12 grid gap-5 max-w-lg mx-auto lg:grid-cols-3 lg:max-w-none">

                @foreach ($posts as $post)
                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                        <div class="flex-shrink-0">
                            <img
                                class="h-48 w-full object-cover"
                                src="{{  asset($post->featured_image) }}"
                                alt="{{  asset($post->featured_image_alt) }}"
                            >
                        </div>
                        <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                            <div class="flex-1">
                                <p class="text-sm leading-5 font-medium text-indigo-600">
                                    <a
                                        href="{{ route("categories.show", $post->category) }}"
                                        class="hover:underline"
                                    >
                                        {{ $post->categoryName }}
                                    </a>
                                </p>
                                <a
                                    href="{{ route("posts.show", $post) }}"
                                    class="block"
                                >
                                    <h3 class="mt-2 text-xl leading-7 font-semibold text-gray-900">
                                        {{ $post->title }}
                                    </h3>
                                    <p class="mt-3 text-base leading-6 text-gray-500">
                                        {{ $post->excerpt }}
                                    </p>
                                </a>
                            </div>
                            <div class="mt-6 flex items-center">
                                <div class="flex-shrink-0">
                                    <a href="{{ route("authors.show", $post->author) }}">
                                        <img
                                            class="h-10 w-10 rounded-full"
                                            src="{{ $post->authorGravatar }}"
                                            alt="{{ $post->authorName }}"
                                        >
                                    </a>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm leading-5 font-medium text-gray-900">
                                        <a
                                            href="{{ route("authors.show", $post->author) }}"
                                            class="hover:underline"
                                        >
                                            {{ $post->authorName }}
                                        </a>
                                    </p>
                                    <div class="flex text-sm leading-5 text-gray-500">
                                        <time datetime="2020-03-16">
                                            {{ $post->published_at }}
                                        </time>
                                        <span class="mx-1">
                                            &middot;
                                        </span>
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
    </div>
@endsection
