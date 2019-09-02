<?php

namespace App\Http\Controllers;

use App\Receitas;
use Illuminate\Http\Request;

class ReceitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $receitas = Receitas::where([
            'user_id' => $user->id
        ])->get();

        return view('Receitas.index', compact('receitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Receitas.create');
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
        if (Receitas::create($data) ){
            return redirect(route('receita-index'))->with('success', 'Receita Criada');
        }
        return redirect(route('receita-index'))->with('error', 'Não foi possivel criar a receita');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $receita = Receitas::findOrFail($id);

        return view('Receitas.show', compact('receita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $receita = Receitas::findOrFail($id);
        return view('Receitas.edit', compact('receita'));
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
        $receita = Receitas::findOrFail($id);
        $data = $request->all();
        $user = auth()->user();

        $receita->user_id = $user->id;
        $receita->name = $data['name'];
        $receita->valor = $data['valor'];
        $receita->data_lancamento = $this->dateParse($data['data_lancamento']);
        if ($receita->save() ){
            return redirect(route('receita-index'))->with('success', 'Receita editada');
        }
        return redirect(route('receita-index'))->with('error', 'Não foi possivel editar a receita');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $receita = Receitas::findOrFail($id);
        if ($receita->delete()){
            return redirect(route('receita-index'))->with('status', 'Receita deletada');
        }
        return redirect(route('receita-index'))->with('error', 'Não foi possivel deletar a receita');
    }
}
