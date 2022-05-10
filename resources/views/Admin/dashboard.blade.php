{{-- Extendemos de la vista maestra --}}
@extends('admin.master')

{{-- Modificamos el valor del yield con nombre title de la vista maestra para asignar un valor --}}
@section('title', 'Dashboard')

@section('content')
    <div class="p-4 my-2 mx-4 bg-white rounded-lg border border-gray-200 shadow-md ">
        {{-- encabezado --}}
        <div class="flex pb-4">
            <svg class=" mr-3 w-9 h-9 text-gray-500 transition duration-75 group-hover:text-gray-900 "
                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
            </svg>
            <span class="self-center text-3xl font-semibold whitespace-nowrap">Home </span>
        </div>
        {{-- Cuerpo de la pagina --}}
        <div>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officiis quia perspiciatis suscipit recusandae culpa
            aliquam, non consectetur error nobis, aperiam unde magnam doloremque voluptatem accusantium laudantium quaerat
            ullam harum cupiditate.
        </div>
    </div>
@endsection
