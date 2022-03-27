@extends('layouts.app')
@section('titulo', 'Mis personajes')
@section('contenido')
<div class="container mx-auto px-4">
    <div class="grid grid-cols-3 my-10">
        @foreach ($characters as $t)
            <div class="bg-white rounded-lg hover:bg-red-300 border border-gray-200 p-5 m-3">
                <h2 class="font-bold text-lg mb-4">{{ $t->name }}</h2>
                <p class="text-xs">{{ $t->description }}</p>
                <p class="text-xs text-right">{{ $t->comment }}</p>
                <a href="#">Editar</a>
                <a href="#" class="bg-orange-600 text-white p-1 rounded self-end mr-4">Borrar</a>
            </div>
        @endforeach
    </div>
    <div class="mb-10">
        {{ $characters->links() }}
    </div>
</div>
@endsection
