@extends('layouts.uno')
@section('titulo')
    Películas
@endsection
@section('cabecera')
    Listado Películas
@endsection
@section('contenido')
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <div class="flex flex-row-reverse mb-4">
                        <a href="{{ route('peliculas.create') }}"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fas fa-add"> Nueva Película</i>
                        </a>
                    </div>
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b bg-white font-medium dark:border-neutral-500 dark:bg-neutral-600">
                            <tr>
                                <th scope="col" class="px-6 py-4">Detalle</th>
                                <th scope="col" class="px-6 py-4">Título</th>
                                <th scope="col" class="px-6 py-4">Doblaje</th>
                                <th scope="col" class="px-6 py-4">Categoría</th>
                                <th scope="col" class="px-6 py-4">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peliculas as $item)
                                <tr class="border-b bg-neutral-100 dark:border-neutral-500 dark:bg-neutral-700">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        <a href="{{ route('peliculas.show', $item) }}"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            <i class="fas fa-info"></i>
                                        </a>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->titulo }}</td>
                                    <td @class([
                                        'whitespace-nowrap px-6 py-4',
                                        'text-green-800 font-bold' => $item->doblada == 'SI',
                                        'text-red-800 font-bold' => $item->doblada == 'NO',
                                    ])>{{ $item->doblada }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $item->category->nombre }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <form method="POST" action="{{ route('peliculas.destroy', $item) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('peliculas.edit', $item) }}" 
                                            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                                <i class="fas fa-edit"></i></a>
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $peliculas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @if (session('info'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '{{ session('info') }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
@endsection
