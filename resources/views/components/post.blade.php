<div
    onclick="window.location.href='{{ route("posts.show", $post) }}'"
    class="flex flex-col rounded-lg shadow-lg overflow-hidden cursor-pointer"
>
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
            <p class="text-sm leading-5 font-medium text-indigo-600">

                @if ($post->category)
                    <a
                        href="{{ route("categories.show", $post->category) }}"
                        class="hover:underline"
                    >
                        {{ $post->categoryName }}
                    </a>
                @endif

            </p>
            <h3 class="mt-2 text-xl leading-7 font-semibold text-gray-900">
                {{ $post->title }}
            </h3>
            <p class="mt-3 text-base leading-6 text-gray-500">
                {{ $post->excerpt }}
            </p>
        </div>
        <div class="mt-6 flex items-center">
            <div class="flex-shrink-0">
                <img
                    class="h-10 w-10 rounded-full"
                    src="{{ $post->authorGravatar }}"
                    alt="{{ $post->authorName }}"
                >
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
