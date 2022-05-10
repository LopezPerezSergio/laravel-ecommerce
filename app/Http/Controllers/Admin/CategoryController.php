<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id','Desc')->get();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validamos los campos del formulario para que cumplan las restricciones
        $validator = Validator::make(
            $request->all(),
            [
                'name'  => 'required'
            ],
            [
                'name.required' => 'Se requiere de un nombre para la categoría',
            ]
        );

        //si encuentra algun error dentro de las validaciones nos retorna el mensaje y no continua el proceso de registro
        if ($validator->fails()) {
            return  back()
                ->withErrors($validator)
                ->with('message', 'Se ha producido un error!')
                ->with('typealert', 'danger')->withInput();
        }

        //Crea al nuevo usuario para guardarlo en la base de datos
        $category = new Category();
        $category->name     = e($request->input('name'));
        $category->module   = $request->input('module');
        $category->slug     = Str::slug($request->input('name'));

        // si no hay ningun error nos redirige al login para loguearnos
        if ($category->save()) {
            return redirect()->route('admin.categories.show',$category->module) //verificar
                ->with('message', 'La categoría ' . $category->name . ' se ha creado con éxito')
                ->with('typealert', 'success');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::where('module', $id)
            ->orderBy('id', 'Desc')
            ->get();

        return view('admin.categories.show',compact('categories','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //validamos los campos del formulario para que cumplan las restricciones
        $validator = Validator::make(
            $request->all(),
            [
                'name'  => 'required'
            ],
            [
                'name.required' => 'Se requiere de un nombre para la categoría',
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
        $category->name     = e($request->input('name'));
        $category->module   = $request->input('module');
        $category->slug     = Str::slug($request->input('name'));

        // si no hay ningun error nos redirige al login para loguearnos
        if ($category->save()) {
            return redirect()->route('admin.categories.show',$category->module) //verificar
                ->with('message', 'Se ha producido un error!')
                ->with('typealert', 'danger');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $module = $category->module;
        //si encuentra algun error dentro nos retorna el mensaje 
        if ($category->delete()) {
            
            return redirect()->route('admin.categories.index') //verificar
                ->with('message', 'La categoría se ha eliminado con éxito!')
                ->with('typealert', 'success');
        }
        return redirect()->route('admin.categories.index') //verificar
                ->with('message', 'Se ha producido un error!')
                ->with('typealert', 'danger');
    }
}
