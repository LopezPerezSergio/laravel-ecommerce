<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','Desc')->paginate(25);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('module', '0')->pluck('name', 'id');
        return view('admin.products.create', compact('categories'));
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
                'name' => 'required|unique:products',
                'img' => 'required|image',
                'price' => 'required',
                'observations' => 'required',
            ],
            [
                'name.required' => 'Se requiere de un nombre para el producto',
                'img.required' => 'Se requiere de una imagen para el producto',
                'img.image' => 'El archivo no es una imagen',
                'price.required' => 'Se requiere de un monto para el producto',
                'observations.required' => 'Se requiere de una observacion para el producto',
            ]
        );

        //si encuentra algun error dentro de las validaciones nos retorna el mensaje y no continua el proceso de registro
        if ($validator->fails()) {
            return  back()
                ->withErrors($validator)
                ->with('message', 'Se ha producido un error!')
                ->with('typealert', 'danger')->withInput();
        }

        //carpeta donde se guardara por fecha las imagenes correspondientes
        $url = Storage::put('products', $request->file('img'));

        $product = new Product();
        
        $product->category_id   = $request->input('category');
        $product->status   = '0';
        $product->name     = e($request->input('name'));
        $product->slug     = Str::slug($request->input('name'));
        $product->image    = $url;
        $product->price    = $request->input('price');
        $product->indiscount = $request->input('indiscount');
        $product->discount = $request->input('discount');
        $product->observations = e($request->input('observations'));


        // si no hay ningun error nos redirige al login para loguearnos
        if ($product->save()) {
            return redirect()->route('admin.products.index', $product->module) //verificar
                ->with('message', 'El producto ' . $request->input('name') . ' se ha creado con éxito')
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
