{{-- Extendemos de la vista maestra --}}
@extends('admin.master')

{{-- Modificamos el valor del yield con nombre title de la vista maestra para asignar un valor --}}
@section('title', 'Agregar Categoría')

@section('breadcrumb')
    <li class="inline-flex items-center">
        <a href="{{ route('admin.categories.index') }}"
            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 ">
            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="ml-3">Categorías</span>
        </a>
    </li>
@endsection

@section('content')
    <div class="flex">
        {{-- Mormulario para crear una nueva categoria --}}
        <div class="w-1/4 p-4 my-2 mx-4 bg-white rounded-lg border border-gray-200 shadow-md ">
            {{-- encabezado --}}
            <div class="flex pb-4">
                <svg class="mr-3 w-10 h-10 text-gray-500 transition duration-75  group-hover:text-gray-900 " fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
                <span class="self-center text-3xl font-semibold whitespace-nowrap ">Agregar Categoría
                </span>
            </div>

            {{-- Cuerpo de la pagina --}}
            {!! Form::open(['route' => 'admin.categories.store', 'class' => 'space-y-6']) !!}
            {{-- Primer grupo --}}
            <div class="flex">
                <div class="p-2 w-full ">
                    {!! Form::label('name', 'Nombre', ['class' => 'block mb-2 text-sm font-medium text-gray-900 ']) !!}
                    {!! Form::text('name', null, ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ', 'placeholder' => 'Nombre de la categoría']) !!}
                </div>
            </div>

            <div class="flex">
                <div class="p-2 w-full">
                    {!! Form::label('module', 'Modulo', ['class' => 'block mb-2 text-sm font-medium text-gray-900 ']) !!}
                    {!! Form::select('module', getModules(), 0, ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ']) !!}
                </div>
            </div>

            <div class="flex justify-end">
                {!! Form::submit('Agregar', ['class' => 'text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300  font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2']) !!}
            </div>
            {!! Form::close() !!}

        </div>

        {{-- Tabla que mostrara la lista de categorias --}}
        <div class="w-full p-4 my-2 mx-4 bg-white rounded-lg border border-gray-200 shadow-md ">
            <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded ">
                <div class="container flex flex-wrap justify-between items-center mx-auto">
                    {{-- encabezado --}}
                    <div class="flex pb-4">
                        <svg class="mr-3 w-9 h-9 text-gray-500 transition duration-75 group-hover:text-gray-900 "
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                            </path>
                        </svg>
                        <span class="self-center text-3xl font-semibold whitespace-nowrap ">Categorías
                        </span>
                    </div>

                    <div class="hidden w-full md:block md:w-auto" id="mobile-menu">
                        <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                            <li>
                                <a href="{{ route('admin.categories.index') }}"
                                    class="block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 "
                                    aria-current="page">Todos</a>
                            </li>
                            @foreach (getModules() as $modulo => $name)
                                <li>
                                    <a href="{{ route('admin.categories.show', $modulo) }}"
                                        class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0"
                                        aria-current="page">{{ $name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </nav>

            {{-- Cuerpo de la pagina --}}
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="inline-block min-w-full align-middle">

                    {{-- Tabla --}}
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200 table-fixed ">
                            <thead class="bg-gray-200 ">
                                <tr>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase ">
                                        ID
                                    </th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase ">
                                        Nombre
                                    </th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase ">
                                        Opciones
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-gray-200 ">
                                @foreach ($categories as $category)
                                    <tr class="hover:bg-gray-100 ">
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap ">
                                            {{ $category->id }}</td>
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap ">
                                            {{ $category->name }}</td>

                                        <td class=" flex py-4 px-6 text-sm font-medium whitespace-nowrap">
                                            <a href="{{ route('admin.categories.edit', $category) }}"
                                                class="px-2 text-blue-600  hover:underline">Editar</a>

                                            <form action="{{ route('admin.categories.destroy', $category) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')

                                                <button type="submit" class="px-2 text-red-600  hover:underline"> Eliminar
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
