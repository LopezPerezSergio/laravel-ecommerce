{{-- Extendemos de la vista maestra --}}
@extends('auth.master')

{{-- Modificamos el valor del yield con nombre title de la vista maestra para asignar un valor --}}
@section('title', 'Login')

@section('content')
    <div class="p-12 w-screen h-screen bg-scroll" style="background-image: url(https://scontent.fmtt1-1.fna.fbcdn.net/v/t39.30808-6/273404943_276166111287357_5593561216678652400_n.jpg?_nc_cat=102&ccb=1-5&_nc_sid=8bfeb9&_nc_eui2=AeE-L-Jd5dxHFZI-RR467SyXlFNTczc-dDKUU1NzNz50MlBscmdaOY5gGVezW9j8C65u5aO6UzKdBlI0xuWpabNr&_nc_ohc=LFKc4Fd4Yz0AX-35RUl&_nc_ht=scontent.fmtt1-1.fna&oh=00_AT8sqVIhqPJDFbnUD6fq6ltS9lLCKdtVw4Q4yTfZrFl5Mw&oe=62644C35)">
        {{-- contenedor del formulario --}}
        <div
            class="shadow-2xl mx-auto px-4 max-w-sm bg-blue-700 rounded-lg border border-gray-200 shadow-md sm:p-6 lg:p-8 dark:bg-gray-800 dark:border-gray-700">
            {{-- Imagen y bienvenida --}}
            <div class="max-w-md w-full space-y-8">
                <div>
                    <div class="mb-4">
                        <a href="/"><img class="mx-auto h-28 w-auto rounded-full"
                                src="https://scontent.fmtt1-1.fna.fbcdn.net/v/t1.6435-9/122956219_2728697490738815_8760930823665949613_n.png?_nc_cat=100&ccb=1-5&_nc_sid=09cbfe&_nc_eui2=AeFZ9sCZ5F1SqJWMTlsovt_rNiDPhUvHfWY2IM-FS8d9ZhCrV1syZ0i6LKZMM5P7uZQnN8goN5SNUT9wOTIEgCBA&_nc_ohc=SjUrXNfnSAQAX8dZHnB&_nc_ht=scontent.fmtt1-1.fna&oh=00_AT_O6xLlEu1u6zziipa83ABq_Gi8b89df1PG5sfoyyixcg&oe=62865A20"
                                alt="Workflow">
                        </a>
                    </div>
                    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900 dark:text-white">Hola! Ya puedes
                        iniciar sesión</h2>
                </div>
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

            {{-- Inicio del formulario --}}
            {!! Form::open(['route' => 'auth.authenticate', 'class' => 'space-y-6']) !!}
            {{-- Primer grupo (email) --}}
            <div>
                {!! Form::label('email', 'Email', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300']) !!}
                {!! Form::email('email', null, ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white', 'placeholder' => 'name@company.com']) !!}
            </div>
            {{-- Segundo grupo (password) --}}
            <div>
                {!! Form::label('password', 'Contraseña', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300']) !!}
                {!! Form::password('password', ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white', 'placeholder' => '••••••••']) !!}
            </div>
            {{-- Tercer grupo, recordarme y olvidar contraseña --}}
            <div class="flex items-start">
                <div class="flex items-start">
                    {!! Form::checkbox('remember', '1', false, ['class' => 'w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800']) !!}
                </div>
                <div class="ml-3 text-sm">
                    {!! Form::label('remember', 'Recordarme', ['class' => 'font-medium text-gray-900 dark:text-gray-300']) !!}
                </div>
                {!! link_to('#', 'Olvidaste tu contraseña?', ['class' => 'ml-auto text-sm text-blue-700 hover:underline dark:text-blue-500']) !!}
            </div>
            {{-- Boton submit --}}
            {!! Form::submit('Iniciar sesión', ['class' => 'w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800']) !!}
            {{-- ultimo grupo (registrarse) --}}
            <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                Aun no estas registrado?
                {!! link_to_route('auth.register', 'Crea tu cuenta ahora!', [], ['class' => 'text-blue-700 hover:underline dark:text-blue-500']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection
