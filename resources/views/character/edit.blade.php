@extends('layouts.app')
@section('titulo', 'Editar mi personaje')
@section('contenido')
<main class="max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg">
    <section>
        <h3 class="font-bold text-2xl">Editar mi personaje</h3>
        <p class="text-gray-600 pt-2">Actualiza la información de tu personaje favorito</p>
        <p class="text-gray-900 pt-2"> {{ $mjs }} </p>
    </section>
    <section class="mt-10">
        <form class="flex flex-col" action="{{ route('character.update',['character' => $character->id]) }}" method="POST">
            @csrf
            @method('put')
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="name">Nombre</label>
                <input type="text" placeholder="Nombre" id="name" name="name" value="{{ $character->name }}" required autofocus
                class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-red-600 transition duration-500 px-3 pb-3">
                @if ($errors->has('name'))
                    <span class="text-red-900">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="description">Descripción</label>
                <input type="text" placeholder="Descripción de tu personaje" name="description" value="{{ $character->description }}" required autofocus
                class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-red-600 transition duration-500 px-3 pb-3">
                @if ($errors->has('description'))
                    <span class="text-red-900">{{ $errors->first('description') }}</span>
                @endif
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="idMarvel">Id Marvel</label>
                <input type="number" placeholder="Id de Marvel" value="{{ $character->idMarvel }}" name="idMarvel" required autofocus
                class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-red-600 transition duration-500 px-3 pb-3">
                @if ($errors->has('idMarvel'))
                    <span class="text-red-900">{{ $errors->first('idMarvel') }}</span>
                @endif
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="resourceURI">URL Perfil Marvel</label>
                <input type="url" placeholder="Url" name="resourceURI" value="{{ $character->resourceURI }}" required autofocus
                class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-red-600 transition duration-500 px-3 pb-3">
                @if ($errors->has('resourceURI'))
                    <span class="text-red-900">{{ $errors->first('resourceURI') }}</span>
                @endif
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="score">Tu calificación</label>
                <input type="number" min="1" max="10" placeholder="Puntaje" value="{{ $character->score }}" name="score" required autofocus
                class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-red-600 transition duration-500 px-3 pb-3">
                @if ($errors->has('score'))
                    <span class="text-red-900">{{ $errors->first('score') }}</span>
                @endif
            </div>
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="urlimg">URL Imagen del personaje</label>
                <input type="url" placeholder="Url de la imagen" name="urlimg" value="{{ $character->urlimg }}" required autofocus
                class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-red-600 transition duration-500 px-3 pb-3">
                @if ($errors->has('urlimg'))
                    <span class="text-red-900">{{ $errors->first('urlimg') }}</span>
                @endif
            </div>

            <button class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">
                Actualizar
            </button>
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
