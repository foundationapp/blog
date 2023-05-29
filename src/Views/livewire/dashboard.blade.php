<div>
    <div class="px-10 pb-10 mx-auto lg:max-w-7xl sm:max-w-xl md:max-w-full sm:pb-16">
        <div class="flex flex-col items-center">
            <h1 class="text-3xl font-bold my-4">Your posts</h1>
            <div class="w-full flex justify-between items-center mb-4">
                <div class="flex items-center">
                    <input wire:model="search" type="text"
                        class="w-64 rounded-lg shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        placeholder="Search...">
                    <select wire:model="orderAsc"
                        class="w-32 ml-2 rounded-lg shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="0">Descending</option>
                        <option value="1">Ascending</option>
                    </select>
                    <select wire:model="status"
                        class="w-32 ml-2 rounded-lg shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">All</option>
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
                <a href="{{ route('blog.editor') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Post</a>
            </div>
            <div class="w-full overflow-x-auto">
                <table class="w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Title
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Body
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date Published
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($posts as $post)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $post->title }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ Str::limit($post->body, 50) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $post->created_at->format('d-m-Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('blog.editor', $post->id) }}"
                                        class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <hr class="my-2">
                                    <button wire:click="deletePost({{ $post->id }})"
                                        class="text-red-600 hover:text-red-900 ml-4">Delete</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    No posts found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
