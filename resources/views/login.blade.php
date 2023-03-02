@extends('main')

@section('title')
    Login
@endsection

@section('content')
    <div class="flex items-center justify-center h-screen bg-gray-300">
        <div class ="w-full max-w-sm">
            <form class="bg-white shadow-xl rounded px-8 pt-6 pb-8 mb-4" method="post">
                {{ csrf_field() }}
                <p class="text-center text-2xl mb-2">SILAHKAN LOGIN!</p>
                <input 
                    class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    type="text" 
                    id="email" 
                    name="email" 
                    placeholder="Email" 
                    required autofocus>
                <input 
                    class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="Password" 
                    required autofocus>
                <button type="submit" class="mb-2 bg-blue-500 hover:bg-blue-700 text-white font-bold w-full py-2 px-4 rounded" formaction="/postlogin">Login</button>
            </form>
        </div>
    </div>
    
@endsection