<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        $categories = Category::where([
            'user_id' => $user->id
        ])->get();

        return view('Category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $user = auth()->user();
        $data['user_id'] = $user->id;
        if (Category::create($data) ){
            return redirect(route('category-index'))->with('success', 'Categoria Criada');
        }
        return redirect(route('category-index'))->with('error', 'Não foi possivel criar a categoria');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view('Category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('Category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.••••••••
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        if ($category->save()){
            return redirect(route('category-index'))->with('success', 'Categoria editada');
        }
        return redirect(route('category-index'))->with('error', 'Não foi possivel editar a categoria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if ($category->delete()){
            return redirect(route('category-index'))->with('status', 'Categoria deletada');
        }
        return redirect(route('category-index'))->with('error', 'Não foi possivel deletar a categoria');
    }
}
