@extends('layouts.app')
@section('titulo', 'Agregar personaje')
@section('contenido')
<div class="container mx-auto px-4">
    @if (count($persons) == 0)
        <main class="max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg">
            <section>
                <h3 class="font-bold text-2xl">Sin resultados</h3>
            </section>
        </main>
    @endif

    <div class="flex flex-wrap items-center lg:justify-between justify-center">
        @foreach ($persons as $ch)
        <div tabindex="0" class="focus:outline-none mx-2 w-72 xl:mb-0 mb-8">
            <div>
                <img alt="person capturing an image" src="{{ $ch['thumbnail']['path'].".".$ch['thumbnail']['extension'] }}" tabindex="0" class="focus:outline-none w-full h-44" />
            </div>
            <div class="bg-white">
                <div class="flex items-center justify-between px-4 pt-4">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" tabindex="0" class="focus:outline-none" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M9 4h6a2 2 0 0 1 2 2v14l-5-3l-5 3v-14a2 2 0 0 1 2 -2"></path>
                        </svg>
                    </div>
                    <div class="bg-yellow-200 py-1.5 px-6 rounded-full">
                        <p tabindex="0" class="focus:outline-none text-xs text-yellow-700">Por: Marvel</p>
                    </div>
                </div>
                <div class="p-4">
                    <div class="flex items-center">
                        <h2 tabindex="0" class="focus:outline-none text-lg font-semibold">{{ $ch['name'] }}</h2>
                        <p tabindex="0" class="focus:outline-none text-xs text-gray-600 pl-5">{{ $ch['modified'] }}</p>
                    </div>
                    <p tabindex="0" class="focus:outline-none text-xs text-gray-600 mt-2">
                        {{ $ch['description'] }}
                    </p>
                    <p tabindex="0" class="focus:outline-none text-xs text-gray-600 mt-2">
                        Puntaje: <b></b>
                    </p>
                    <div class="flex mt-4">
                        <div>
                            <p tabindex="0" class="focus:outline-none text-xs text-white px-2 bg-green-800 py-1">
                                <a href="{{ route('character.store',$ch['id']) }}">Agregar</a>
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between py-4">
                        <h2 tabindex="0" class="focus:outline-none text-indigo-700 text-xs font-semibold">
                            <a target="_blank" href="{{ $ch['urls'][0]['url'] }}">Mas detalles en Marvel.com</a>
                        </h2>
                        <h3 tabindex="0" class="focus:outline-none text-indigo-700 text-xl font-semibold"></h3>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
