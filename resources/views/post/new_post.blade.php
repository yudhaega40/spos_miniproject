<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('simpan_new_post') }}" enctype="multipart/form-data">
                        <div class="lg:grid lg:grid-cols-4 lg:gap-4">
                            <div id="form1" class="col-span-3">
                                @csrf

                                <!-- Title -->
                                <div>
                                    <x-input-label for="title" :value="__('Post Title')" />
                                    <input id="title" class="block mt-1 w-full" type="text" name="title" required autofocus/>
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>

                                <!-- Content -->
                                <div class="mt-4">
                                    <x-input-label for="content" :value="__('Post Content')" />
                                    <textarea id="content" class="block mt-1 w-full p-3" rows="15" name="content" required></textarea>
                                    <x-input-error :messages="$errors->get('content')" class="mt-2" />
                                </div>
                            </div>
                            <div id="form2">
                                <!-- Tag -->
                                <div>
                                    <x-input-label for="tag" :value="__('Post Tag')" />
                                    <div class="overflow-y-auto h-32 border-solid border border-slate-500 rounded p-2">
                                        @foreach($tag as $t)
                                        <input type="checkbox" name="tag[]" ig="tag[]" value="{{ $t->id }}">
                                        <label for="tag[]"> {{ $t->name }} </label><br>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Category -->
                                <div class="mt-4">
                                    <x-input-label for="category" :value="__('Post Category')" />
                                    <div class="overflow-y-auto h-32 border-solid border border-slate-500 rounded p-2">
                                        @foreach($category as $c)
                                        <input type="checkbox" name="category[]" ig="category[]" value="{{ $c->id }}">
                                        <label for="category[]"> {{ $c->name }} </label><br>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <x-input-label for="foto" :value="__('Add Photo')" />
                                    <input type="file" id="foto" name="foto" accept="image/png, image/gif, image/jpeg" class="block w-full text-sm text-gray-500 file:py-2 file:px-6 file:rounded file:border-1 file:border-gray-400" />
                                </div>
                                
                                <div class="flex flex-col items-center justify-end mt-4">
                                    <button class="w-full text-center mb-2 bg-slate-800 hover:bg-slate-700 text-white font-bold py-2 rounded-md">
                                        {{ __('Post') }}
                                    </button>
                                    <a href="/post" type="submit" class="text-center w-full btn bg-red-700 hover:bg-red-500 font-bold text-white py-2 rounded-md" data-toggle="tooltip" title='Delete'>
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        <div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
