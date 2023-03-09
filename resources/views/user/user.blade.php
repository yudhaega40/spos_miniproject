<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('User') }}
            </h2>
            @if(Auth::user()->role == 2 || Auth::user()->role == 3)
            <a href="{{ route('new_user') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fa-solid fa-plus"></i> New User
            </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('user_red'))
                <div class="bg-red-100 mb-4 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('user_red') }}</span>
                </div>
            @endif
            <div class="inline-flex flex flex-row mb-4 justify-end w-full">
                <input class="shadow-sm inline-block border-0 appearance-none" type="text" id="search" name="search" placeholder="Search user..">
                <button class="shadow-sm inline-block font-normal text-md text-white px-2 bg-blue-500 hover:bg-blue-700" id="search_button" name="search_button"> Search </button>
            </div>
            @if(count($user) === 0)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <p class="font-normal text-lg"> User tidak ditemukan </p>
                    </div>
                </div>
            @else
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 overflow-auto">
                    <table class="w-full lg:table-fixed border-collapse border border-slate-400 break-words">
                        <thead>
                            <tr class="bg-slate-300">
                                <th class="border border-slate-400 text-center py-2 lg:w-4/12">Nama</th>
                                <th class="border border-slate-400 text-center py-2 lg:w-5/12">Email</th>
                                <th class="border border-slate-400 text-center py-2 lg:w-1/12">Role</th>
                                @if(Auth::user()->role == 2 || Auth::user()->role == 3)
                                <th class="border border-slate-400 text-center py-2 lg:w-2/12">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $u)
                            <tr>
                                <td class="border border-slate-400 text-center p-2"><a href='/post_by_author/{{$u->id}}' class="font-semibold hover:text-blue-900">{{ $u->name }}</a></td>
                                <td class="border border-slate-400 text-center p-2">{{ $u->email }}</td>
                                <td class="border border-slate-400 text-center p-2">
                                    @if($u->role == 1)
                                        {{ __('Author') }}
                                    @elseif($u->role == 2)
                                        {{ __('Editor') }}
                                    @elseif($u->role == 3)
                                        {{ __('Admin') }}
                                    @endif
                                </td>
                                @if(Auth::user()->role == 2 || Auth::user()->role == 3)
                                <td class="border border-slate-400 text-center p-2"> 
                                    <div class="flex flex-row justify-center"> 
                                        <a href="/edit_user/{{ $u->id }}" class="bg-green-700 hover:bg-green-500 text-white py-1 px-2 mr-2 rounded text-center">
                                            <i class="fa fa-pen-to-square"></i> Edit 
                                        </a>
                                        <form method="GET" action="{{ route('delete_user', $u->id) }}">
                                            @csrf
                                            <button type="submit" class="show_confirm btn bg-red-700 hover:bg-red-500 text-white py-1 px-2 rounded" data-toggle="tooltip" title='Delete'>
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-6">{{ $user->links() }}</div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form =  $(this).closest("form");
        event.preventDefault();
        swal({
            title: `Apakah anda yakin ingin menghapus user ini?`,
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

    $("#search").keyup(function(event) {
      if (event.keyCode === 13) {
        $("#search_button").click();
      }
    });

    $("#search_button").click(function(){
        var input = $("#search").val();
        if(!(input.match(/^\s*$/))){
            window.location.href = "/cari_user/"+input;
        }
    });
</script>
