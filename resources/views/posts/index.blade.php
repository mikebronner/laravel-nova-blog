@extends("layouts.app")

@section("content")
    <div class="relative bg-gray-50 pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
        <div class="absolute inset-0">
            <div class="bg-white h-1/3 sm:h-2/3"></div>
        </div>
        <div class="relative max-w-7xl mx-auto">
            <div class="text-center">
                <h2 class="text-3xl leading-9 tracking-tight font-extrabold text-gray-900 sm:text-4xl sm:leading-10">
                    Blog Posts
                </h2>
            </div>
            <x-laravel-nova-blog-posts>

                @foreach ($posts as $post)
                    <x-laravel-nova-blog-post
                        :post="$post"
                    ></x-laravel-nova-blog-post>
                @endforeach

            </x-laravel-nova-blog-posts>
        </div>
    </div>
@endsection
