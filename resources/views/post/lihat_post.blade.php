<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Detail Post') }} 
            </h2>
            <x-dropdown align="right">
                <x-slot name="trigger">
                    @if(Auth::user()->role == 3 || (Auth::user()->role == 1 && Auth::user()->id == $post->id_user) || (Auth::user()->role == 2 && ($post->id_user != 0 && $post->user->role != 3)))
                    <a href="#" class="transition ease-in-out duration-150"> 
                        <i class="fa-solid fa-ellipsis-vertical"></i> 
                    </a>
                    @endif
                </x-slot>
                <x-slot name="content">
                    @if(Auth::user()->role == 3 || (Auth::user()->role == 2 && ($post->id_user != 0 && $post->user->role != 3)) || (Auth::user()->role == 1 && Auth::user()->id == $post->id_user))
                    <x-dropdown-link href="/edit_post/{{ $post->id }}">
                        <i class="fa fa-pen-to-square"></i> Edit
                    </x-dropdown-link>
                    @endif
                    @if(Auth::user()->role == 3 || (Auth::user()->role == 2 && Auth::user()->id == $post->id_user) || (Auth::user()->role == 1 && Auth::user()->id == $post->id_user))
                    <form method="GET" action="{{ route('delete_post', $post->id) }}">
                        @csrf
                        <x-dropdown-link href="#" class="show_confirm">
                            <i class="fa fa-trash"></i> Delete
                        </x-dropdown-link>
                    </form>
                    @endif
                </x-slot>
            </x-dropdown>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="font-semibold text-5xl text-center break-words">{{ $post->title }}</h1>
                    <div class="flex items-center justify-center">
                        @if ($post->id_user == 0)
                        <p class="font-light text-md text-center text-gray-500 mt-1"> <i class="fa-solid fa-user"></i> Account Deleted </p>
                        @else
                        <p class="font-light text-md text-center text-gray-500 mt-1"><a href='/post_by_author/{{$post->id_user}}' class="hover:text-blue-900"> <i class="fa-solid fa-user"></i> {{ $post->user->name }} 
                            @if($post->user->role == 1)
                                (Author)
                            @elseif($post->user->role == 2)
                                (Editor)
                            @elseif($post->user->role == 3)
                                (Admin)
                            @endif
                        </a></p>
                        @endif
                        <p class="font-light text-md text-center text-gray-500 mt-1 ml-4"><i class="fa-regular fa-clock"></i> {{ $post->created_at->format('d F Y H:i:s') }}</p>
                    </div>
                    
                    @if ($post->photo_dir)
                    <div class="w-full flex justify-center">
                        <img src="{{ asset('storage/' . $post->photo_dir) }}" alt="{{ asset('storage/' . $post->photo_dir) }}" class="object-cover w-full rounded-xl mt-5">  
                    </div>
                    @endif

                    <p class="font-normal text-lg mt-5 break-words whitespace-pre-wrap">{{ $post->content }} </p>

                    <div class="flex flex-row justify-start mt-4">
                        <div>
                            <p class="font-normal text-sm text-white font-bold mt-2 bg-blue-900 px-2 py-1 rounded-2xl">Tags:</p>
                        </div>
                        <div class="flex flex-row flex-wrap">
                        @foreach($post_tag as $pt)
                            <p class="font-normal text-sm text-blue-900 font-bold mt-2 ml-2 border border-blue-900 hover:bg-blue-900 hover:text-white px-2 py-1 rounded-2xl"><a href="/post_by_tag/{{$pt->id}}">{{ $pt->name }}</a></p>
                        @endforeach
                        </div>
                    </div>

                    <div class="flex flex-row justify-start mt-4">
                        <div>
                            <p class="font-normal text-sm text-white font-bold mt-2 bg-green-900 px-2 py-1 rounded-2xl">Kategori:</p>
                        </div>
                        <div class="flex flex-row flex-wrap">
                        @foreach($post_category as $pc)
                            <p class="font-normal text-sm text-green-900 font-bold mt-2 ml-2 border border-green-900 hover:bg-green-900 hover:text-white px-2 py-1 rounded-2xl"><a href="/post_by_category/{{$pc->id}}">{{ $pc->name }}</a></p>
                        @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form =  $(this).closest("form");
        event.preventDefault();
        swal({
            title: `Apakah anda yakin ingin menghapus post ini?`,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
</script>