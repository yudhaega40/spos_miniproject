<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('simpan_edit_post') }}" enctype="multipart/form-data">
                        <div class="lg:grid lg:grid-cols-4 lg:gap-4">
                            <div id="form1" class="col-span-3">
                                @csrf

                                <!-- Title -->
                                <div>
                                    <x-input-label for="title" value="Post Title (Author: {{$author}})" />
                                    <input id="title" class="block mt-1 w-full" type="text" name="title" value="{{$post->title}}" required autofocus/>
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>

                                <!-- Content -->
                                <div class="my-4">
                                    <x-input-label for="content" :value="__('Post Content')" />
                                    <textarea id="content" class="block mt-1 w-full p-3" rows="17" name="content" required>{{$post->content}}</textarea>
                                    <x-input-error :messages="$errors->get('content')" class="mt-2" />
                                </div>
                            </div>
                            <div id="form2">
                                <!-- Tag -->
                                <div>
                                    <x-input-label for="tag" :value="__('Post Tag')" />
                                    <div class="overflow-y-auto h-32 border-solid border border-slate-500 rounded p-2">
                                        @foreach($tag as $t)
                                        <input type="checkbox" name="tag[]" ig="tag[]" value="{{ $t->id }}" <?php if(in_array($t->id, $post_tag)) echo 'checked' ?>>
                                        <label for="tag[]"> {{ $t->name }} </label><br>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Category -->
                                <div class="mt-4">
                                    <x-input-label for="category" :value="__('Post Category')" />
                                    <div class="overflow-y-auto h-32 border-solid border border-slate-500 rounded p-2">
                                        @foreach($category as $c)
                                        <input type="checkbox" name="category[]" ig="category[]" value="{{ $c->id }}" <?php if(in_array($c->id, $post_category)) echo 'checked' ?>>
                                        <label for="category[]"> {{ $c->name }} </label><br>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <x-input-label for="foto" :value="__('Change Photo')" />
                                    <input type="file" id="foto" name="foto" accept="image/png, image/gif, image/jpeg" class="block w-full text-sm text-gray-500 file:py-2 file:px-6 file:rounded file:border-1 file:border-gray-400 cursor-pointer file:cursor-pointer"/>
                                </div>

                                <div class="mt-4">
                                    <input type="checkbox" id="remove_img" name="remove_img"/>
                                    <label for="remove_img"> Remove Photo </label><br>
                                </div>
                                
                                <input type="hidden" id="id_post" name="id_post" value="{{$post->id}}">

                                <div class="flex flex-col items-center justify-end mt-4">
                                    <button class="w-full text-center mb-2 bg-slate-800 hover:bg-slate-700 text-white font-bold py-2 rounded-md">
                                        {{ __('Simpan') }}
                                    </button>
                                    @php
                                    if(str_contains(url()->previous(),"lihat_post")){
                                        $backlink = url()->previous();
                                    }else{
                                        $backlink = '/post';
                                    }
                                    @endphp
                                    <a href="{{$backlink}}" type="submit" class="text-center w-full btn bg-red-700 hover:bg-red-500 font-bold text-white py-2 rounded-md" data-toggle="tooltip" title='Delete'>
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

<script>
    $("#remove_img").click(function() {
        if(this.checked) {
            input = document.getElementById('foto');
            input.value = '';
        }
    });

    $("#foto").change(function (){
       var fileName = $(this).val();
       $("#remove_img").prop( "checked", false );
    });

</script>
