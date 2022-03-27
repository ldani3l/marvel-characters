@extends('layouts.app')
@section('titulo', 'Login')
@section('contenido')
<main class="max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg">
    <section>
        <h3 class="font-bold text-2xl">Buscar personajes</h3>
        <p class="text-gray-600 pt-2">Ingresa el nombre de tu personaje favorito.</p>
    </section>

    <section class="mt-10">
        <form class="flex flex-col" method="POST" action="{{ route('login.custom') }}">
            @csrf
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Correo</label>
                <input required placeholder="Ingresa aquí tu correo" type="email" name="email" id="email" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-red-600 transition duration-500 px-3 pb-3">
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="password">Contraseña</label>
                <input required placeholder="Ingresa aquí tu contraseña" type="password" name="password" id="password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-red-600 transition duration-500 px-3 pb-3">
            </div>
            <div class="flex justify-end">
                <a href="{{ route('register-user') }}" class="text-sm text-red-600 hover:text-red-700 hover:underline mb-6">Registrarse</a>
            </div>
            <button class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Iniciar Sesión</button>
        </form>
    </section>
</main>
@endsection
