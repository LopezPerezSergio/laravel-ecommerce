<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>MyCMS | @yield('title')</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <style>
        .wraper {
            min-height: 100vh;
            overflow: hidden;
        }

        .col-1 {
            float: left;
            position: relative;
            width: 15%;
        }

        .col-2 {
            float: left;
            width: 85%;
        }

    </style>

    <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script></head>

<body>
    <div class="wraper">
        <div class="col-1">
            <aside class="min-h-screen shadow-2xl" >@include('admin.sidebar')</aside>
        </div>

        <div class="col-2">
            <nav class="shadow-2xl bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded ">
                <div class="container flex flex-wrap justify-between items-center mx-auto">
                    <a href="{{ route('admin.index') }}" class="flex items-center">
                        <svg class="w-6 h-6 text-gray-500 transition duration-75  group-hover:text-gray-900 "
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                        </svg>
                        <span class="ml-3">Dashboard</span>
                    </a>

                    <div class="flex items-center md:order-2">
                        <button type="button"
                            class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 "
                            id="user-menu-button" aria-expanded="false" type="button" data-dropdown-toggle="dropdown">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full"
                                src="https://www.crearlogogratisonline.com/images/crearlogogratis_1024x1024_01.png"
                                alt="user photo">
                        </button>
                        <!-- Dropdown menu -->
                        <div class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow "
                            id="dropdown">
                            <div class="py-3 px-4">
                                <span class="block text-sm text-gray-900 ">Bonnie Green</span>
                                <span
                                    class="block text-sm font-medium text-gray-500 truncate ">name@flowbite.com</span>
                            </div>
                            <ul class="py-1" aria-labelledby="dropdown">
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 ">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 ">Settings</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 ">Earnings</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 ">Sign
                                        out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <div class="p-4">
                <nav class="shadow-2xl flex py-2 px-5 text-gray-700 bg-gray-50 rounded-lg border border-gray-200 "
                    aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('admin.index') }}"
                                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 ">
                                <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-white"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                    <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                                </svg>
                                <span class="ml-3">Dashboard</span>
                            </a>
                        </li>
                        @section('breadcrumb')
                        @show
                    </ol>
                </nav>
            </div>

            @if (Session::has('message'))
                <div class="container">
                    <div id="alert"
                        class="p-4 m-4  text-sm 
                        @if (Session::get('typealert') == 'info') text-blue-700 bg-blue-100 @endif
                        @if (Session::get('typealert') == 'danger') text-red-700 bg-red-100 @endif
                        @if (Session::get('typealert') == 'success') text-green-700 bg-green-100 @endif
                        @if (Session::get('typealert') == 'warning') text-yellow-700 bg-yellow-100 @endif rounded-lg"
                        role="alert" style="display: none;">

                        <span class="font-medium">{{ Session::get('message') }}</span>

                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li> • {{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <script>
                            $('#alert').slideDown();
                            setTimeout(function() {
                                $('#alert').slideUp();
                            }, 5000);
                        </script>
                    </div>
                </div>
            @endif
            
            @section('content')
            @show
        </div>
    </div>
</body>

</html>
