{{-- Extendemos de la vista maestra --}}
@extends('admin.master')

{{-- Modificamos el valor del yield con nombre title de la vista maestra para asignar un valor --}}
@section('title', 'Agregar Producto')

@section('breadcrumb')
    <li class="inline-flex items-center">
        <a href="{{ route('admin.products.index') }}"
            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 ">
            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="ml-3">Producto</span>
        </a>
    </li>
    <li class="inline-flex items-center">
        <a href="{{ route('admin.products.create') }}"
            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 ">
            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="ml-3">Agregar Producto</span>
        </a>
    </li>
@endsection

@section('content')
    <div class="p-4 my-1 mx-4 bg-white rounded-lg border border-gray-200  shadow-md">
        {{-- encabezado --}}
        <div class="flex pt-2">

            <svg class="mr-3 w-9 h-9 text-gray-500 transition duration-75 group-hover:text-gray-900 " fill="currentColor"
                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                    clip-rule="evenodd"></path>
            </svg>

            <span class="self-center text-3xl font-semibold whitespace-nowrap ">Agregar Producto
            </span>
        </div>

        {{-- Cuerpo de la pagina --}}
        {!! Form::open(['route' => 'admin.products.store', 'class' => 'space-y-4', 'files' => true]) !!}
        {{-- Primer grupo --}}
        <div class="flex">
            <div class="p-2 w-1/2 ">
                {!! Form::label('name', 'Nombre', ['class' => 'block mb-2 text-sm font-medium text-gray-900 ']) !!}
                {!! Form::text('name', null, ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ', 'placeholder' => 'Nombre del Producto']) !!}
            </div>

            <div class="p-2 w-1/2">
                {!! Form::label('category', 'Categoría', ['class' => 'block mb-2 text-sm font-medium text-gray-900 ']) !!}
                {!! Form::select('category', $categories, 0, ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5']) !!}
            </div>

            <div class="p-2 w-1/2">
                {!! Form::label('img', 'Imagen destacada', ['class' => 'block mb-2 text-sm font-medium text-gray-900 ']) !!}
                {!! Form::file('img', ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2', 'accept' => 'image/*']) !!}
                {{-- <div class="mt-1 text-sm text-gray-500 " id="user_avatar_help">Una imagen es util para
                    identificar el producto.</div> --}}
            </div>

        </div>

        {{-- Segundo grupo --}}
        <div class="flex">
            <div class="p-2 w-1/2">
                {!! Form::label('price', 'Precio', ['class' => 'block mb-2 text-sm font-medium text-gray-900 ']) !!}
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z">
                            </path>
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    {!! Form::number('price', "0.00", ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 ', 'min' => '0.00', 'step' => 'any']) !!}
                </div>
            </div>

            <div class="p-2 w-1/2">
                {!! Form::label('indiscount', '¿En descuento?', ['class' => 'block mb-2 text-sm font-medium text-gray-900 ']) !!}
                {!! Form::select('indiscount', ['0' => 'No', '1' => 'Si'], 0, ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5']) !!}
            </div>

            <div class="p-2 w-1/2">
                {!! Form::label('discount', 'Descuento', ['class' => 'block mb-2 text-sm font-medium text-gray-900 ']) !!}
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none"><svg
                            class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M12 13a1 1 0 100 2h5a1 1 0 001-1V9a1 1 0 10-2 0v2.586l-4.293-4.293a1 1 0 00-1.414 0L8 9.586 3.707 5.293a1 1 0 00-1.414 1.414l5 5a1 1 0 001.414 0L11 9.414 14.586 13H12z"
                                clip-rule="evenodd"></path>
                        </svg> </div>
                    {!! Form::number('discount', "0.00", ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 ', 'min' => '0.00', 'step' => 'any']) !!}
                </div>
            </div>
        </div>

        <div class="w-full">
            {!! Form::label('observations', 'Observaciones', ['class' => 'block mb-2 text-sm font-medium text-gray-900 ']) !!}
            {!! Form::textarea('observations', null, ['rows' => '8', 'class' => 'p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 ', 'placeholder' => 'Observaciones o especificaciones del producto ...']) !!}
        </div>

        <div class="flex justify-end">
            {!! Form::submit('Agregar', ['class' => 'text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2']) !!}
        </div>
        {!! Form::close() !!}

    </div>
@endsection
