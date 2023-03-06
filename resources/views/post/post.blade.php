<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Post') }}
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
        <input class="rounded mb-4 border-0 w-full appearance-none" type="text" id="search_post" name="search_post" placeholder="Search post by title..">
        @foreach($post as $p)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-semibold text-3xl">{{ $p->title }}</h2>
                    @if ($p->id_user == 0)
                    <p class="font-light text-md"> Author: Account Deleted </p>
                    @else
                    <p class="font-light text-md"> Author: {{ $p->user->name }} 
                        @if($p->user->role == 1)
                            (Author)
                        @elseif($p->user->role == 2)
                            (Editor)
                        @elseif($p->user->role == 3)
                            (Admin)
                        @endif
                    </p>
                    @endif
                    <br>
                    <p class="font-normal text-lg truncate"> {{ $p->content }} </p>
                    <a href="/lihat_post/{{ $p->id }}" class="font-normal text-md text-blue-500"> Read more... </a>
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
</script>
