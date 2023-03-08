<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Post
                @if(isset($type))
                    @if(isset($author_name))
                        (Author: {{ $author_name->name }})
                    @elseif(isset($tag_name))
                        (Tag: {{ $tag_name->name }})
                    @elseif(isset($category_name))
                        (Category: {{ $category_name->name }})
                    @endif
                @endif
            </h2>
            <a href="{{ route('new_post') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fa-solid fa-plus"></i> New Post
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('post_red'))
            <div class="bg-red-100 mb-4 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('post_red') }}</span>
            </div>
            @endif
            <div class="inline-flex flex flex-row mb-4 justify-end w-full">
                <input class="shadow-sm inline-block border-0 appearance-none" type="text" id="search_post" name="search_post" placeholder="Search post by title..">
                <button class="shadow-sm inline-block font-normal text-md text-white px-2 bg-blue-500 hover:bg-blue-700" id="search_button" name="search_button"> Search </button>
            </div>
            @if(count($post) === 0)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="font-normal text-lg"> Post tidak ditemukan </p>
                </div>
            </div>
            @endif
            @foreach($post as $p)
            <div class="max-w-sm w-full lg:max-w-full lg:flex mb-4">
                @if ($p->photo_dir)
                <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url({{ asset('storage/' . $p->photo_dir) }});background-position: center center;">
                </div>
                @endif
                <div class="bg-white w-full rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                    <div class="mb-8">
                        <div class="text-gray-900 font-bold text-xl mb-2"><a href="/lihat_post/{{ $p->id }}">
                        @if(strlen($p->title) > 100)
                            {{ substr($p->title,0,100)."..." }}
                        @else
                            {{ $p->title }}
                        @endif
                        </a></div>
                        <p class="text-gray-700 text-base">
                        @if(strlen($p->content) > 200)
                            {{ substr($p->content,0,200)."..." }}
                        @else
                            {{ $p->content }}
                        @endif
                        </p>
                        <!-- <a href="/lihat_post/{{ $p->id }}" class="font-normal text-md text-blue-500"> Read more... </a> -->
                    </div>
                    <div class="flex items-center text-sm">
                        @if ($p->id_user == 0)
                        <p class="text-gray-900 leading-none"> Author: Account Deleted </p>
                        @else
                        <p class="text-gray-900 leading-none"><a href='/post_by_author/{{$p->id_user}}' class="font-normal text-blue-500">Author: {{ $p->user->name }} 
                            @if($p->user->role == 1)
                                (Author)
                            @elseif($p->user->role == 2)
                                (Editor)
                            @elseif($p->user->role == 3)
                                (Admin)
                            @endif
                        </a></p>
                        @endif
                    </div>
                    <div class="flex flex-row justify-start mt-4">
                        @if(Auth::user()->role == 3 || (Auth::user()->role == 2 && ($p->id_user != 0 && $p->user->role != 3)) || (Auth::user()->role == 1 && Auth::user()->id == $p->id_user))
                        <a href="/edit_post/{{ $p->id }}" class="font-normal text-md text-white mr-2 px-2 rounded-lg bg-green-700 hover:bg-green-500"> Edit </a>
                        @endif
                        @if(Auth::user()->role == 3 || (Auth::user()->role == 2 && Auth::user()->id == $p->id_user) || (Auth::user()->role == 1 && Auth::user()->id == $p->id_user))
                        <form method="GET" action="{{ route('delete_post', $p->id) }}">
                            @csrf
                            <button type="submit" class="show_confirm font-normal text-md text-white mr-2 px-2 rounded-lg bg-red-700 hover:bg-red-500" data-toggle="tooltip" title='Delete'> Delete </p>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            {{ $post->links() }}
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

    $("#search_post").keyup(function(event) {
      if (event.keyCode === 13) {
        $("#search_button").click();
      }
    });

    $("#search_button").click(function(){
        var input = $("#search_post").val();
        if(input != ""){
            window.location.href = "/cari_post/"+input;
        }
    });
</script>
