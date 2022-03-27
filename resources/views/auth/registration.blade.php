@extends('layouts.app')
@section('titulo', 'Register')
@section('contenido')
<main class="max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg">
    <section>
        <h3 class="font-bold text-2xl">Registro</h3>
        <p class="text-gray-600 pt-2">Ingresa tus datos</p>
    </section>
    <section class="mt-10">
        <form class="flex flex-col" action="{{ route('register.custom') }}" method="POST">
            @csrf
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="name">Nombre</label>
                <input type="text" placeholder="Nombre" id="name" name="name" required autofocus
                class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-red-600 transition duration-500 px-3 pb-3">
                @if ($errors->has('name'))
                    <span class="text-red-900">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Correo</label>
                <input type="email" placeholder="Correo" id="email_address" name="email" required autofocus
                class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-red-600 transition duration-500 px-3 pb-3">
                @if ($errors->has('email'))
                <span class="text-red-900">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="password">Contraseña</label>
                <input type="password" placeholder="Contraseña" id="password" name="password" required
                class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-red-600 transition duration-500 px-3 pb-3">
                @if ($errors->has('password'))
                <span class="text-red-900">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="flex justify-end">
                <label><input type="checkbox" name="remember" class="text-sm text-red-600 hover:text-red-700 hover:underline mb-6"> Recordarme</label>
            </div>
            <button class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Registrarme</button>
        </form>
    </section>

</main>
@endsection
<!--
<main class="max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg">
    <section>
        <h3 class="font-bold text-2xl">Welcome to Startup</h3>
        <p class="text-gray-600 pt-2">Sign in to your account.</p>
    </section>

    <section class="mt-10">
        <form class="flex flex-col" method="POST" action="{{ route('login.custom') }}">
            @csrf
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Email</label>
                <input type="email" name="email" id="email" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-red-600 transition duration-500 px-3 pb-3">
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="password">Password</label>
                <input type="password" name="password" id="password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-red-600 transition duration-500 px-3 pb-3">
            </div>
            <div class="flex justify-end">
                <a href="{{ route('register-user') }}" class="text-sm text-red-600 hover:text-red-700 hover:underline mb-6">Register</a>
            </div>
            <button class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Sign In</button>
        </form>
    </section>
</main>
-->
