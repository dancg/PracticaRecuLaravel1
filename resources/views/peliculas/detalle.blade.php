@extends('layouts.uno')
@section('titulo')
    Detalle
@endsection
@section('cabecera')
    Detalle de la Película
@endsection
@section('contenido')
    <div
        class="block rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
        <h5 class="text-center mb-2 text-xl font-medium leading-tight text-neutral-800 dark:text-neutral-50">
            {{ $pelicula->titulo }}
        </h5>
        <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
            <span class="font-bold">Sinopsis:</span> {{ $pelicula->sinopsis }}
        </p>
        <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
            <span class="font-bold">Doblada? :</span> <span @class([
                'text-green-800 font-bold' => $pelicula->doblada == 'SI',
                'text-red-800 font-bold' => $pelicula->doblada == 'NO',
            ])>
                {{ $pelicula->doblada }}
            </span>
        </p>
        <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
            <span class="font-bold">Duración:</span> {{ $pelicula->duracion }} horas
        </p>
        <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
            <span class="font-bold">Categoría:</span> {{ $pelicula->category->nombre }}
        </p>
        <a href="{{ route('peliculas.index') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-backward"> Volver</i></a>
    </div>
@endsection
