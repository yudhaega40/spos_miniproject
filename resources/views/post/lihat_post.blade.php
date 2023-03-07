<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Post') }}
        </h2> 
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="font-semibold text-5xl text-center">{{ $post->title }}</h1>
                    @if ($post->id_user == 0)
                    <p class="font-light text-md text-center mt-1"> Author: Account Deleted </p>
                    @else
                    <p class="font-light text-md text-center mt-1"> Author: {{ $post->user->name }} 
                        @if($post->user->role == 1)
                            (Author)
                        @elseif($post->user->role == 2)
                            (Editor)
                        @elseif($post->user->role == 3)
                            (Admin)
                        @endif
                    </p>
                    @endif

                    @if ($post->photo_dir)
                        <img src="{{ asset('storage/' . $post->photo_dir) }}" alt="{{ asset('storage/' . $post->photo_dir) }}" class="object-none w-full rounded-xl mt-5">  
                    @endif

                    <p class="font-normal text-lg mt-5 break-words"> {{ $post->content }} </p>

                    <div class="flex flex-row justify-start">
                        <p class="font-normal text-sm text-white font-bold mt-5 bg-blue-900 px-2 py-1 rounded-2xl">Tags:</p>
                        @foreach($post_tag as $pt)
                            <p class="font-normal text-sm text-blue-900 font-bold mt-5 ml-4 border border-blue-900 px-2 py-1 rounded-2xl">{{ $pt->name }}</p>
                        @endforeach
                    </div>

                    <div class="flex flex-row justify-start">
                        <p class="font-normal text-sm text-white font-bold mt-5 bg-green-900 px-2 py-1 rounded-2xl">Kategori:</p>
                        @foreach($post_category as $pc)
                            <p class="font-normal text-sm text-green-900 font-bold mt-5 ml-4 border border-green-900 px-2 py-1 rounded-2xl">{{ $pc->name }}</p>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>