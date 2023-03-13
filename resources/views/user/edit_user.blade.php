<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('simpan_edit') }}">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user->name }}" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email }}" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Role -->
                        <div class="mt-4">
                            <x-input-label for="role" :value="__('Role')" />
                            <select id="role" class="block mt-1 w-full p-2.5 border border-gray-300 text-gray-900 text-sm rounded-lg" name="role" value="{{ $user->role }}" required autocomplete="username" />
                                <option value = "1">Author</option>
                                <option value = "2">Editor</option>
                                <option value = "3">Admin</option>
                            </select>
                            <x-input-error :messages="$errors->get('role')" class="mt-2" />
                        </div>

                        <input type="hidden" id="id_user" name="id_user" value="{{ $user->id }}">

                        <div class="flex items-center justify-end mt-4">
                            <a href="/user" type="submit" class="show_confirm btn bg-red-700 hover:bg-red-500 text-white py-1 px-2 rounded" data-toggle="tooltip" title='Delete'>
                                Cancel
                            </a>
                            <a href="/ubah_password/{{ $user->id }}" class="ml-4 bg-green-700 hover:bg-green-500 text-white py-1 px-2 rounded">
                                Change Password 
                            </a>
                            <x-primary-button class="ml-4">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
