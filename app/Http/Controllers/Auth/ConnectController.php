<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ConnectController extends Controller
{
    /* 
     * Constructor que ejecuta el middleware 
     * Ayuda a que una vez logueado ya no puedas ingresar al login o registro
     * Solo nos da acceso a poder cerrar la sesion( Logout ).
    */
    public function __construct()
    {
        $this->middleware('guest')->except(['getLogout']);
    }

    /* 
     * Metodo que nos regresa la vista del login
     */
    public function getLogin()
    {
        return view('Auth.login');
    }

    /* 
     * Metodo nos permitira generar el inicio de sesion de nuestros usuarios
    */
    public function authenticate(Request $request)
    {
        //validamos los campos del formulario para que cumplan las restricciones
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password'  => 'required',
            ],
            [
                'email.required'     => 'Su correo electrónico es requerido',
                'email.email'        => 'Formato de correo electrónico invalido',
                'password.required'  => 'Por favor asigne una contraseña',
            ]
        );

        //si encuentra algun error dentro de las validaciones nos retorna el mensaje y no continua el proceso de registro
        if ($validator->fails()) {
            return  back()
                ->withErrors($validator)
                ->with('message', 'Se ha producido un error!')
                ->with('typealert', 'danger');
        }

        //Validamos si el usuario ingreso loss datos correctos
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')],true)) {
            return redirect()->route('admin.index');
        }

        // Si el usuario no ingreso sus credenciales de forma correcta lanza el mensaje de error
        return  back()
                ->with('message', 'Usuario y/o contraseña incorrectos')
                ->with('typealert', 'danger');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('/');
    }

    /* 
     * Metodo que nos regresa la vista de registro
    */
    public function getRegister()
    {
        return view('Auth.register');
    }

    /* 
     * Metodo para guardar nuevos usuarios
    */
    public function postRegister(Request $request)
    {
        //validamos los campos del formulario para que cumplan las restricciones
        $validator = Validator::make(
            $request->all(),
            [
                'name'  => 'required',
                'email' => 'required|email|unique:App\Models\User,email',
                'password'  => 'required|min:8',
                'cpassword' => 'required|min:8|same:password',
            ],
            [
                'name.required'      => 'Su nombre es requerido',
                'email.required'     => 'Su correo electrónico es requerido',
                'email.email'        => 'Formato de correo electrónico invalido',
                'email.unique'       => 'Ya existe un usuario registrado con este correo electrónico',
                'password.required'  => 'Por favor asigne una contraseña',
                'password.min'       => 'La contraseña debe tener al menos 8 caracteres',
                'cpassword.required' => 'Es necesario confirmar la contraseña',
                'cpassword.min'      => 'Las contraseñas no coinciden',
                'cpassword.same'     => 'Las contraseñas no coincíden',
            ]
        );

        //si encuentra algun error dentro de las validaciones nos retorna el mensaje y no continua el proceso de registro
        if ($validator->fails()) {
            return  back()
                ->withErrors($validator)
                ->with('message', 'Se ha producido un error!')
                ->with('typealert', 'danger');
        }

        //Crea al nuevo usuario para guardarlo en la base de datos
        $user = new User();
        $user->name     = e($request->input('name'));
        $user->email    = e($request->input('email'));
        $user->password = Hash::make($request->input('password')); //Encriptamos la contraseña

        // si no hay ningun error nos redirige al login para loguearnos
        if ($user->save()) {
            return redirect()->route('auth.login')
                ->with('message', 'Usuario creado con éxito, ya puede iniciar sesión')
                ->with('typealert', 'success');
        }
        
        return redirect()->route('welcome');
    }
}
