<div>
    <section class="relative w-full h-screen bg-white">
        asdf
        <div class="py-6 mx-auto heading md:py-12 lg:w-10/12 md:text-center">

            <div class="flex items-center justify-center mt-4">
                <h1 class="font-sans text-4xl font-bold heading md:text-6xl md:leading-tight">
                    {{ $post->title }}
                </h1>


                <h2 class="mt-2 text-xl text-gray-600">{{ $post->excerpt }}</h2>
            </div>
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-1/2 mx-auto mt-4">
            @endif

            <div class="flex items-center justify-center mt-4">
                <div class="ml-2">
                    <p class="text-sm text-gray-600">Posted on {{ $post->created_at->format('M d, Y') }}</p>
                </div>
            </div>
            <div class="flex items-center justify-center mt-4">
                <div class="mt-4 text-lg text-gray-600">
                    {!! $post->body !!}
                </div>
            </div>
        </div>
    </section>
</div>
