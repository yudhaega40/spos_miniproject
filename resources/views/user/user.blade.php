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
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="cell-border stripe" name="tabel_user" id="tabel_user">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1 ?>
                            @foreach ($user as $u)
                            <tr>
                                <td style="text-align: center">{{ $i }}</td>
                                <td style="text-align: center">{{ $u->name }}</td>
                                <td style="text-align: center">{{ $u->email }}</td>
                                <td style="text-align: center">
                                    @if($u->role == 1)
                                        {{ __('Author') }}
                                    @elseif($u->role == 2)
                                        {{ __('Editor') }}
                                    @elseif($u->role == 3)
                                        {{ __('Admin') }}
                                    @endif
                                </td>
                                <td>
                                    @if(Auth::user()->role == 2 || Auth::user()->role == 3)
                                    <div class="flex flex-row justify-center"> 
                                        <a href="/edit_user/{{ $u->id }}" class="bg-green-700 hover:bg-green-500 text-white py-1 px-2 mr-2 rounded">
                                            <i class="fa fa-pen-to-square"></i> Edit 
                                        </a>
                                        <form method="GET" action="{{ route('delete_user', $u->id) }}">
                                            @csrf
                                            <button type="submit" class="show_confirm btn bg-red-700 hover:bg-red-500 text-white py-1 px-2 rounded" data-toggle="tooltip" title='Delete'>
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                    @endif
                                </td>
                            </tr>
                            <?php $i++ ?>
                            @endforeach
                        </tbody>
                    </table>
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
      $(document).ready(function() {
        $('#tabel_user').DataTable({
            // searching:true,
            ordering:false,
            lengthChange:false,
            pageLength:15,
            // "columnDefs": [
            // { "searchable": false, "targets": 7 }
            // ]
        });
    });
</script>
