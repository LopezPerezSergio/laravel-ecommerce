{{-- Extendemos de la vista maestra --}}
@extends('admin.master')

{{-- Modificamos el valor del yield con nombre title de la vista maestra para asignar un valor --}}
@section('title', 'Productos')

@section('breadcrumb')
    <li class="inline-flex items-center">
        <a href="{{ route('admin.products.index') }}"
            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 ">
            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="ml-3">Productos</span>
        </a>
    </li>
@endsection

@section('content')
    <div class="p-4 my-2 mx-4 bg-white rounded-lg border border-gray-200 shadow-md " style="height: 37rem">
        {{-- encabezado --}}
        <div class="flex pb-4">

            <svg class="mr-3 w-9 h-9 text-gray-500 transition duration-75 group-hover:text-gray-900" fill="currentColor"
                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                    clip-rule="evenodd"></path>
            </svg>

            <span class="self-center text-3xl font-semibold whitespace-nowrap">Productos </span>
        </div>

        {{-- Cuerpo de la pagina --}}
        <div class="overflow-auto sm:rounded-lg" style="height: 31rem">
            <div class="inline-block min-w-full align-middle">
                {{-- busqueda --}}
                <div class="flex">
                    <div class="p-4">
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative mt-1">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 " fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" id="table-search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 pl-10 p-2.5 "
                                placeholder="Search for items">
                        </div>
                    </div>

                    <a href="{{ route('admin.products.create') }}" class="p-5"><button type="button"
                            class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Agregar</button>
                    </a>
                </div>
            </div>

            <div class=" bg-white">
                <div class="max-w-2xl py-2 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                    <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                        @foreach ($products as $product)
                            <div class="group relative rounded-md bg-gray-100">
                                <div
                                    class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                                    <img src="{{ Storage::url($product->image) }}"
                                        alt="Front of men&#039;s Basic Tee in black."
                                        class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                                </div>
                                <div class="m-2 flex justify-between">
                                    <div>
                                        <h3 class="text-sm text-gray-700">
                                            <a href="#">
                                                <span aria-hidden="true" class="absolute inset-0"></span>
                                                {{ $product->name }}
                                            </a>
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-500">{{ substr($product->observations, 0, 20) }}
                                        </p>
                                    </div>
                                    <p class="text-sm font-medium text-gray-900">${{ $product->price }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection
