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
    <li class="inline-flex items-center">
        <a href="{{ route('admin.categories.edit', $category) }}"
            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 ">
            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="ml-3">Editar {{ $category->name }}</span>
        </a>
    </li>
@endsection

@section('content')
    <div class="flex">
        {{-- Mormulario para crear una nueva categoria --}}
        <div class="w-1/4 p-4 my-2 mx-4 bg-white rounded-lg border border-gray-200 shadow-md ">
            {{-- encabezado --}}
            <div class="flex pb-4">
                <svg class="mr-3 w-10 h-10 text-gray-500 transition duration-75 group-hover:text-gray-900 " fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                        clip-rule="evenodd" />
                </svg>
                <span class="self-center text-3xl font-semibold whitespace-nowrap ">Editar Categoría
                </span>
            </div>

            {{-- Cuerpo de la pagina --}}
            {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'method' => 'put', 'class' => 'space-y-6']) !!}
            {{-- Primer grupo --}}
            <div class="flex">
                <div class="p-2 w-full ">
                    {!! Form::label('name', 'Nombre', ['class' => 'block mb-2 text-sm font-medium text-gray-900 ']) !!}
                    {!! Form::text('name', $category->name, ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ', 'placeholder' => 'Nombre de la categoría']) !!}
                </div>
            </div>

            <div class="flex">
                <div class="p-2 w-full">
                    {!! Form::label('module', 'Modulo', ['class' => 'block mb-2 text-sm font-medium text-gray-900 ']) !!}
                    {!! Form::select('module', getModules(), $category->module, ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5']) !!}
                </div>
            </div>

            <div class="flex justify-end">
                {!! Form::submit('Actualizar', ['class' => 'text-white bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2']) !!}
            </div>
            {!! Form::close() !!}

        </div>
    </div>


@endsection
