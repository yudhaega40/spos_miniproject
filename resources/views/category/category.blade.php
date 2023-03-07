<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Category') }}
            </h2>
            <a href="{{ route('new_category') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <i class="fa-solid fa-plus"></i> New Category
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="cell-border stripe" name="tabel_category" id="tabel_category">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1 ?>
                            @foreach ($category as $c)
                            <tr>
                                <td style="text-align: center">{{ $i }}</td>
                                <td style="text-align: center"><a href='/post_by_category/{{$c->id}}' class="font-bold text-blue-500">{{ $c->name }}</a></td>
                                <td style="text-align: center">{{ $c->desc }}</td>
                                <td style="text-align: center">
                                <div class="flex flex-row justify-center"> 
                                    <a href="/edit_category/{{ $c->id }}" class="bg-green-700 hover:bg-green-500 text-white py-1 px-2 mr-2 rounded">
                                        <i class="fa fa-pen-to-square"></i> Edit 
                                    </a>
                                    <form method="GET" action="{{ route('delete_category', $c->id) }}">
                                        @csrf
                                        <button type="submit" class="show_confirm btn bg-red-700 hover:bg-red-500 text-white py-1 px-2 rounded" data-toggle="tooltip" title='Delete'>
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
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
              title: `Apakah anda yakin ingin menghapus kategori ini?`,
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
        $('#tabel_category').DataTable({
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



