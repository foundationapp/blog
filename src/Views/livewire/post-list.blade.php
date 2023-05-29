<div class="relative mx-auto {{ config('blog.styles.container_max_width') }}">
    <div class="px-10 pb-10 mx-auto lg:max-w-7xl sm:max-w-xl md:max-w-full sm:pb-16">
        <div class="grid gap-x-8 gap-y-12 sm:gap-x-12 sm:gap-y-16 md:grid-cols-2 lg:grid-cols-3">

            @foreach ($posts as $post)
                <div class="relative overflow-hidden bg-white border border-gray-100 rounded-lg shadow-sm">
                    <a href="/{{ config('blog.route_prefix', 'blog') }}/{{ $post->slug }}"
                        class="block overflow-hidden group">
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}"
                                class="object-cover w-full h-56 transition-all duration-300 ease-out sm:h-64 group-hover:scale-110"
                                alt="{{ $post->title }}">
                        @else
                            <div
                                class="flex items-center justify-center w-full h-56 transition-all duration-300 ease-out sm:h-64 group-hover:scale-110">
                                <svg class="w-10 h-10 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 13H5v-2h14v2z">
                                    </path>
                                </svg>
                            </div>
                        @endif
                    </a>
                    <div class="relative p-7">
                        <p class="uppercase font-semibold text-xs mb-2.5 text-purple-600">
                            {{ $post->created_at->format('F jS, Y') }}</p>
                        <a href="/{{ config('blog.route_prefix', 'blog') }}/{{ $post->slug }}"
                            class="block mb-3 hover:underline">
                            <h2 class="text-xl font-bold leading-none text-black transition-colors duration-200">
                                {{ $post->title }}</h2>
                        </a>
                        @if ($post->excerpt)
                            <p class="mb-4 text-gray-700">{{ $post->excerpt }}</p>
                        @endif
                        <a href="/{{ config('blog.route_prefix', 'blog') }}/{{ $post->slug }}"
                            class="font-medium underline">Read More</a>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="flex items-center justify-center w-full pt-10 sm:pt-16">
            @if (!$finished)
                <button wire:click="loadMore()"
                    class="inline-flex tracking-wide uppercase text-xs items-center justify-center px-5 py-2.5 font-semibold text-gray-100 hover:text-white bg-gray-800 border border-transparent rounded-md shadow-sm hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">Load
                    More</button>
            @else
                <p class="text-sm text-gray-600">No more posts.</p>
            @endif
        </div>

    </div>
</div>
