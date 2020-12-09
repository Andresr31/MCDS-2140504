<?php

namespace App\Http\Controllers;

use App\Category;
use App\Exports\CategoryExport;
use App\Http\Requests\CategoryRequest;
use App\Imports\CategoryImport;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category;
        $category->name  = $request->name;
        $category->description= $request->description;
        
        if ($request->hasFile('image')) {
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('imgs'), $file);
            $category->image = 'imgs/'.$file;
        }
        if($category->save()) {
            return redirect('categories')->with('message', 'La Categoria: '.$category->name.' fue Adicionado con Exito!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show')->with('category',$category); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit')->with('category',$category);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->name  = $request->name;
        $category->description= $request->description;
        
        if ($request->hasFile('image')) {
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('imgs'), $file);
            $category->image = 'imgs/'.$file;
        }
        if($category->save()) {
            return redirect('categories')->with('message', 'La Categoria: '.$category->name.' fue Modificado con Exito!');
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
        if($category->delete()) {
            return redirect('categories')->with('message', 'La Categoria: '.$category->name.' fue eliminada con Exito!');
        } 
    }

    ////////// Exportar PDF

    public function pdf() {
        $categories = Category::all();
        $pdf = \PDF::loadView('categories.pdf', compact('categories'));
        return $pdf->download('allcategories.pdf');
    }

    ////////// Exportar EXCEL

    public function excel() {
        
        return \EXCEL::download(new CategoryExport,'allcategories.xlsx');
    }

    ////////// Importar EXCEL

    public function importExcel(Request $request) {

        $file = $request->file('file');
        \EXCEL::import(new CategoryImport, $file);
        return redirect('categories')->with('message', 'Categorias importadas con Exito!');
    }


    public function search(Request $request) {
        $categories = Category::names($request->q)->orderBy('id','ASC')->paginate(10);
        return view('categories.search')->with('categories', $categories);
    }
    
}
