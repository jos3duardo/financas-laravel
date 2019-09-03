<?php

namespace App\Http\Controllers;

use App\Category;
use App\Despesas;
use Illuminate\Http\Request;

class DespesasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $despesas = Despesas::where([
            'user_id' => $user->id
        ])->get();
        return view('Despesas.index', compact('despesas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $categories = Category::where([
            'user_id' => $user->id
        ])->get();

        return view('Despesas.create', compact('categories'));
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
        $data['data_lancamento'] = $this->dateParse($data['data_lancamento']);
        if (Despesas::create($data) ){
            return redirect(route('despesa-index'))->with('success', 'Despesa Criada');
        }
        return redirect(route('despesa-index'))->with('error', 'Não foi possivel criar a despesa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();
        $despesa = Despesas::where([
            'id' => $id,
            'user_id' => $user->id
        ])->first();

        return view('Despesas.show', compact('despesa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = auth()->user();
        $categories = Category::where([
            'user_id' => $user->id
        ])->get();
        $despesa = Despesas::findOrFail($id);
        return view('Despesas.edit', compact('despesa','categories'));
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
        $user = auth()->user();
        $despesa = Despesas::where([
            'id' => $id,
            'user_id' => $user->id
        ])->first();
        $data = $request->all();
        $user = auth()->user();

        $despesa->user_id = $user->id;
        $despesa->name = $data['name'];
        $despesa->valor = $data['valor'];
        $despesa->category_id = $data['category_id'];
        $despesa->data_lancamento = $this->dateParse($data['data_lancamento']);
        if ($despesa->save() ){
            return redirect(route('despesa-index'))->with('success', 'Despesa editada');
        }
        return redirect(route('despesa-index'))->with('error', 'Não foi possivel editar a despesa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = auth()->user();
        $despesa = Despesas::where([
            'id' => $id,
            'user_id' => $user->id
        ])->first();
        if ($despesa->delete()){
            return redirect(route('despesa-index'))->with('error', 'Despesa deletada');
        }
        return redirect(route('despesa-index'))->with('error', 'Não foi possivel deletar a despesa');
    }
}
