@extends('layouts.uno')
@section('titulo')
    Nueva
@endsection
@section('cabecera')
    Crear Película
@endsection
@section('contenido')
    <form name="as" method="POST" action="{{ route('peliculas.update', $pelicula) }}">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="titulo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Título de la
                Película:</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo..."
                value="{{ @old('titulo', $pelicula->titulo) }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('titulo')
                <p class="text-red-700 text-xs italic mt-2">*{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="sinopsis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sinopsis:</label>
            <textarea id="sinopsis" name="sinopsis" placeholder="Sinopsis..."
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 
                dark:border-gray-600 dark:placeholder-gray-400 dark:text-white 
                dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ @old('sinopsis', $pelicula->sinopsis) }}</textarea>
            @error('sinopsis')
                <p class="text-red-700 text-xs italic mt-2">*{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="doblada" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Está doblada?</label>
            <div class="flex mb-4">
                <div class="flex items-center mr-4">
                    <input id="si" type="radio" value="SI" name="doblada" @checked(@old('doblada', $pelicula->doblada) == 'SI')
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="si" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-900">SI</label>
                </div>
                <div class="flex items-center mr-4">
                    <input id="no" type="radio" value="NO" name="doblada" @checked(@old('doblada', $pelicula->doblada) == 'NO')
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="no" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-900">NO</label>
                </div>
            </div>
            @error('doblada')
                <p class="text-red-700 text-xs italic mt-2">*{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="duracion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Duracion de la
                Película (en horas):</label>
            <input type="number" id="duracion" name="duracion" placeholder="Duracion en horas..."
                value="{{ @old('duracion', $pelicula->duracion) }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('duracion')
                <p class="text-red-700 text-xs italic mt-2">*{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="categorias" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoría</label>
            <select id="categorias" name="category_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option>Seleccione una categoría</option>
                @foreach ($categorias as $item)
                    <option value="{{ $item->id }}" @selected(@old('category_id', $pelicula->category_id) == $item->id)>{{ $item->nombre }}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-700 text-xs italic mt-2">*{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-row-reverse">
            <a href="{{ route('peliculas.index') }}"
                class="ml-4 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none 
            focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 
            text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                <i class="fas fa-xmark"> Cancelar</i></a>
            <button type="submit"
                class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none 
            focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 
            text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                <i class="fas fa-edit"></i> Editar</button>
        </div>

    </form>
@endsection
