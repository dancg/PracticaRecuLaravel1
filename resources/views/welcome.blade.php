@extends('layouts.uno')
@section('titulo')
    Inicio
@endsection
@section('cabecera')
    Inicio Películas
@endsection
@section('contenido')
    <a href="{{ route('peliculas.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Gestionar Películas</a>
@endsection
