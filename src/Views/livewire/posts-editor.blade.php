<div class="w-full ml-64 bg-gray-100" x-data="{ settings: false, settingsMeta: false }">
    <div class="relative flex justify-start">
        <div class="flex-1 max-w-4xl min-h-screen px-10 py-8 pl-12 bg-white border-l border-r border-gray-200"
            id="post">
            <input wire:model="post.title" name="title" placeholder="Post Title"
                class="block w-full py-2 mb-4 overflow-visible text-4xl font-bold leading-normal text-black bg-white border border-gray-300 border-none rounded-lg appearance-none focus:outline-none focus:shadow-outline"
                id="title" value="">
            <textarea wire:model="post.body" name="body" placeholder="Post Body"
                class="block w-full h-full py-2 mb-4 overflow-visible text-lg leading-normal text-black bg-white border border-gray-300 border-none rounded-lg appearance-none focus:outline-none focus:shadow-outline"
                id="body" value=""></textarea>

        </div>

        <div class="fixed top-0 right-0 flex pb-2 pl-5 bg-white border-b border-l border-gray-300 rounded-bl-lg">
            <div wire:click="savePost"
                class="flex items-center inline-block mt-1 mr-3 text-sm text-gray-500 underline uppercase cursor-pointer"
                id="save-post">Save</div>
            <div @click="settings=true"
                class="p-2 mt-2 mr-3 bg-gray-200 rounded-full cursor-pointer group hover:bg-gray-300">
                <svg width="20" height="20" class="text-gray-500 fill-current group-hover:text-gray-600"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M19.535 8.427l-2.006-.55c-.296-.696-.422-.992-.697-1.71l1.035-1.816a.607.607 0 00-.106-.76L16.41 2.238a.615.615 0 00-.76-.106l-1.817 1.035c-.697-.296-.992-.422-1.71-.697l-.55-2.006A.653.653 0 0010.961 0H9.039c-.296 0-.549.19-.612.465l-.55 2.006c-.696.296-.992.422-1.71.697L4.35 2.133a.607.607 0 00-.76.106L2.238 3.59a.615.615 0 00-.106.76l1.035 1.817c-.296.697-.422.992-.697 1.71l-2.006.55A.653.653 0 000 9.039v1.922c0 .296.19.549.465.612l2.006.55c.296.696.422.992.697 1.71L2.133 15.65a.607.607 0 00.106.76l1.351 1.352a.615.615 0 00.76.106l1.817-1.035c.697.296.992.422 1.71.697l.55 2.006a.653.653 0 00.612.465h1.922c.296 0 .549-.19.612-.465l.55-2.006c.696-.296.992-.422 1.71-.697l1.816 1.035c.254.148.57.106.76-.106l1.352-1.351a.615.615 0 00.106-.76l-1.035-1.817c.296-.697.422-.992.697-1.71l2.006-.55a.653.653 0 00.465-.612V9.039a.653.653 0 00-.465-.612zM10 14a4 4 0 11-.001-7.999A4 4 0 0110 14z">
                    </path>
                </svg>
            </div>
        </div>

        <div x-show="settings" class="fixed left-0 z-50 w-full min-h-screen transform min-w-screen" x-cloak>
            <div x-show="settings" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" @click="settings=false;settingsMeta=false;"
                class="absolute top-0 left-0 w-full min-h-screen transition-all duration-300 ease-out bg-black bg-opacity-25 min-w-screen">
            </div>
            <div x-show="settings" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="translate-x-full transform" x-transition:enter-end="translate-x-0 transform"
                x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0 transform"
                x-transition:leave-end="translate-x-full transform"
                class="container absolute top-0 right-0 z-40 flex flex-col justify-between h-screen max-w-md overflow-scroll transition duration-300 ease-out transform bg-gray-100 border-l border-gray-200 shadow-2xl">
                <div>
                    <h3 class="inline-block mt-4 ml-6 text-base font-medium text-gray-500">Post Settings</h3>
                    <div @click="settings=false"
                        class="absolute right-0 top-0 text-4xl font-thin text-gray-500 cursor-pointer cursor-pointer h-12 w-12 leading-none flex justify-center items-center pt-1 pr-3.5">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>

                    <div class="p-6">
                        <div class="relative h-56 mb-8 overflow-hidden rounded-lg cursor-pointer">

                            <label
                                class="top-0 left-0 flex flex-col items-center justify-center block w-full h-56 bg-white border border-gray-200 rounded-lg cursor-pointer">
                                <span
                                    class="px-3 py-2 text-xs font-bold text-gray-600 bg-white border border-gray-300 rounded">Upload
                                    Post Image</span>
                            </label>
                            @if ($image || $post->image)
                                <div class="absolute top-0 left-0 z-10 w-full h-full">
                                    @if ($image)
                                        <div wire:click="removeTemporaryImage"
                                            class="absolute top-0 right-0 flex items-center justify-center w-20 h-6 mt-3 mr-3 text-xs font-bold leading-none text-white bg-red-500 rounded-full">
                                            × remove</div>
                                    @endif
                                    @if ($post->image)
                                        <div wire:click="removeImage"
                                            class="absolute top-0 right-0 flex items-center justify-center w-20 h-6 mt-3 mr-3 text-xs font-bold leading-none text-white bg-red-500 rounded-full">
                                            × remove</div>
                                    @endif
                                    <img src="@if ($image) {{ $image->temporaryUrl() }}@elseif($post->image){{ Storage::url($post->image) }} @endif"
                                        class="object-cover w-full h-full bg-gray-200 rounded-lg">
                                </div>
                            @endif
                            <input type="file" wire:model="image"
                                class="absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer">
                        </div>

                        <label class="inline-block mb-3 text-sm font-medium text-gray-600" for="slug">URL</label>
                        <input wire:model="post.slug"
                            class="block w-full px-4 py-2 leading-normal bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:shadow-outline"
                            name="slug" id="slug" placeholder="slug" value="test">

                        <label class="inline-block mt-8 mb-3 text-sm font-medium text-gray-600"
                            for="excerpt">Excerpt</label>
                        <textarea wire:model="post.excerpt"
                            class="block w-full h-24 px-4 py-2 leading-normal bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:shadow-outline"
                            name="excerpt" id="excerpt"></textarea>

                        <div class="mt-6">
                            <label class="inline-block mb-3 text-sm font-medium text-gray-600">Type</label>
                        </div>
                        <div class="relative">
                            <select wire:model="post.type" name="type" id="type"
                                class="block w-full px-4 py-2 leading-normal bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:shadow-outline">
                                <option value="post" selected="">Post</option>
                                <option value="page">Page</option>
                            </select>
                            <div
                                class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z">
                                    </path>
                                </svg>
                            </div>
                        </div>

                        <div class="mt-6">
                            <label class="inline-block mb-3 text-sm font-medium text-gray-600">Status</label>
                        </div>
                        <div class="relative">
                            <select wire:model="post.status" name="status"
                                class="block w-full px-4 py-2 leading-normal bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:shadow-outline">
                                <option value="{{ Foundationapp\Blog\Models\Post::STATUS_DRAFT }}" selected>Draft
                                </option>
                                <option value="{{ Foundationapp\Blog\Models\Post::STATUS_PUBLISHED }}">Published
                                </option>
                            </select>
                            <div
                                class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 pointer-events-none">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z">
                                    </path>
                                </svg>
                            </div>
                        </div>

                        <div class="flex mb-3 mt-8 items-center px-3 py-1.5 rounded bg-gray-200">
                            <input wire:model="post.featured" type="checkbox" name="featured"
                                class="form-checkbox peer">
                            <label
                                class="inline-block ml-2 text-sm font-medium text-gray-500 uppercase peer-checked:text-green-500"
                                for="featured">Featured</label>
                        </div>

                        <div @click="settingsMeta=true"
                            class="flex items-center justify-center px-5 py-4 mt-8 bg-white border rounded-lg cursor-pointer hover:bg-blue-50 open-toggle">
                            <div class="flex flex-col items-start justify-center flex-grow">
                                <p class="font-bold text-gray-800">Meta</p>
                                <p class="text-xs font-medium text-gray-500">Extra Meta Data</p>
                            </div>
                            <svg class="w-6 h-6 text-gray-800 fill-current">
                                <path
                                    d="M11.611,10.049l-4.76-4.873c-0.303-0.31-0.297-0.804,0.012-1.105c0.309-0.304,0.803-0.293,1.105,0.012l5.306,5.433c0.304,0.31,0.296,0.805-0.012,1.105L7.83,15.928c-0.152,0.148-0.35,0.223-0.547,0.223c-0.203,0-0.406-0.08-0.559-0.236c-0.303-0.309-0.295-0.803,0.012-1.104L11.611,10.049z">
                                </path>
                            </svg>
                        </div>

                    </div>
                </div>
                <div class="flex justify-end p-5 text-right" wire:click="delete" id="delete-post">
                    <div class="flex items-center justify-center inline-block text-sm text-red-600 underline cursor-pointer"
                        data-slug="test">
                        <svg width="18" height="19" class="text-red-600 fill-current"
                            xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path
                                    d="M0 6.333c0 .875.733 1.584 1.636 1.584v7.916C1.636 17.583 3.102 19 4.91 19h8.182c1.807 0 3.273-1.418 3.273-3.167V7.917c.903 0 1.636-.71 1.636-1.584V4.75c0-.874-.733-1.583-1.636-1.583H13.09V1.583C13.09.71 12.358 0 11.455 0h-4.91C5.642 0 4.91.709 4.91 1.583v1.584H1.636C.733 3.167 0 3.876 0 4.75v1.583zm14.727 9.5c0 .875-.732 1.584-1.636 1.584H4.909c-.904 0-1.636-.71-1.636-1.584V7.917h11.454v7.916zM6.545 1.583h4.91v1.584h-4.91V1.583zM1.636 4.75h14.728v1.583H1.636V4.75z"
                                    fill-rule="nonzero"></path>
                                <path
                                    d="M6 16c.552 0 1-.392 1-.875v-5.25C7 9.392 6.552 9 6 9s-1 .392-1 .875v5.25c0 .483.448.875 1 .875zM9 16c.552 0 1-.392 1-.875v-5.25C10 9.392 9.552 9 9 9s-1 .392-1 .875v5.25c0 .483.448.875 1 .875zM12 16c.552 0 1-.392 1-.875v-5.25C13 9.392 12.552 9 12 9s-1 .392-1 .875v5.25c0 .483.448.875 1 .875z">
                                </path>
                            </g>
                        </svg>
                        <span class="ml-2">Delete Post</span>
                    </div>
                </div>
            </div>

            <div x-show="settingsMeta" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="translate-x-full transform" x-transition:enter-end="translate-x-0 transform"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="translate-x-0 transform" x-transition:leave-end="translate-x-full transform"
                class="container absolute top-0 right-0 z-40 h-full max-w-md min-h-screen overflow-scroll transition bg-gray-100 border-l border-gray-200 shadow-2xl">

                <div class="flex">
                    <div @click="settingsMeta=false"
                        class="relative z-10 flex items-center justify-center w-16 h-16 text-xl cursor-pointer"
                        data-toggle="meta-sidebar">
                        <svg class="w-6 h-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h3
                        class="absolute flex items-center justify-center w-full h-12 mt-2 text-lg font-bold text-center">
                        Meta data</h3>
                </div>

                <div class="p-6">
                    <label class="inline-block mb-3 text-sm font-medium text-gray-600" for="meta_title">Meta
                        Title</label>
                    <input wire:model="post.meta_title"
                        class="block w-full px-4 py-2 leading-normal bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:shadow-outline"
                        name="meta_title" id="meta_title" value="">

                    <label class="inline-block mt-8 mb-3 text-sm font-medium text-gray-600"
                        for="meta_description">Meta Description</label>
                    <textarea wire:model="post.meta_description"
                        class="block w-full h-24 px-4 py-2 leading-normal bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:shadow-outline"
                        name="meta_description" id="meta_description"></textarea>

                    <label class="inline-block mt-8 mb-3 text-sm font-medium text-gray-600" for="meta_schema">Meta
                        Schema</label>
                    <div class="overflow-hidden border border-gray-300 rounded-lg codeeditor-wrapper">
                        <textarea wire:model="post.meta_schema"
                            class="block w-full h-64 px-4 py-2 leading-normal bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:shadow-outline"
                            name="meta_schema" id="meta_schema" cols="30" rows="10"></textarea>
                    </div>

                    <label class="inline-block mt-8 mb-3 text-sm font-medium text-gray-600" for="meta_data">Extra Meta
                        Data</label>
                    <div class="overflow-hidden border border-gray-300 rounded-lg codeeditor-wrapper">
                        <textarea wire:model="post.meta_data"
                            class="block w-full h-64 px-4 py-2 leading-normal bg-white border border-gray-300 rounded-lg appearance-none focus:outline-none focus:shadow-outline"
                            name="meta_data" id="meta_data" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
