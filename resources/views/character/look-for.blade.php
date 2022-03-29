@extends('layouts.app')
@section('titulo', 'Buscar personaje')
@section('contenido')
<main class="max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg">
    <section>
        <h3 class="font-bold text-2xl">Buscar personajes</h3>
        <p class="text-gray-600 pt-2">Encuentra tu personaje favorito.</p>
    </section>

    <section class="mt-10">
        <form class="flex flex-col" method="POST" action="{{ route('character.find') }}">
            @csrf
            <div class="mb-6 pt-3 rounded bg-gray-200">
                <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Nombre</label>
                <input required placeholder="Nombre de tu persojaje favorito" type="text" name="name" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-red-600 transition duration-500 px-3 pb-3">
            </div>
            <button class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">
                Buscar
            </button>
        </form>
    </section>
</main>
@endsection
