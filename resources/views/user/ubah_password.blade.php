<x-guest-layout>
    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 mb-1 text-center">
        {{ __('Change Password') }}
    </h1>
    <p class="mb-4 text-center">User: {{$user->name}}</p>
    <form method="POST" action="{{ route('simpan_ubah_password') }}">
        @csrf

        <div>
            <x-input-label for="password" :value="__('Password Baru')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autofocus/>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autofocus/>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <input type="hidden" id="id_user" name="id_user" value="{{ $user->id }}">

        <div class="flex items-center justify-end mt-4">
            <a href="/edit_user/{{ $user->id }}" type="submit" class="show_confirm btn bg-red-700 hover:bg-red-500 text-white py-1 px-2 rounded" data-toggle="tooltip" title='Delete'>
                Cancel
            </a>
            <x-primary-button class="ml-4">
                {{ __('Simpan') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
