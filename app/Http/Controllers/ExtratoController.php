<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Collection;

class ExtratoController extends Controller
{
    public function index(){
        $user = auth()->user();

        $inicio = $request->inicio ?? (new \DateTime())->modify('-1 month');
        $inicio = $inicio instanceof \DateTime ? $inicio->format('Y-m-d')
            : \DateTime::createFromFormat('d/m/Y',$inicio)->format('Y-m-d');

        $fim = $request->fim ?? (new \DateTime());
        $fim = $fim instanceof \DateTime ? $fim->format('Y-m-d')
            : \DateTime::createFromFormat('d/m/Y',$fim)->format('Y-m-d');

        $despesas = DB::table('despesas')
            ->selectRaw('despesas.*, categories.name as category_name')
            ->whereNull('despesas.deleted_at')
            ->leftJoin('categories','categories.id','=','despesas.category_id')
            ->whereBetween('despesas.data_lancamento',[$inicio,$fim])
            ->where('despesas.user_id','=',$user->id)

            ->get();

        $receitas = DB::table('receitas')
            ->whereBetween('data_lancamento',[$inicio,$fim])
            ->where('user_id','=',$user->id)
            ->whereNull('deleted_at')
            ->get();


        $total_despesas = $despesas->sum('valor');
        $total_receitas = $receitas->sum('valor');

        return view('Extrato.index', compact('receitas','despesas','total_despesas','total_receitas'));
    }

    public function detalhes(Request $request){
        $user = auth()->user();

        $inicio = $request->inicio ?? (new \DateTime())->modify('-1 month');
        $inicio = $inicio instanceof \DateTime ? $inicio->format('Y-m-d')
            : \DateTime::createFromFormat('d/m/Y',$inicio)->format('Y-m-d');

        $fim = $request->fim ?? (new \DateTime());
        $fim = $fim instanceof \DateTime ? $fim->format('Y-m-d')
            : \DateTime::createFromFormat('d/m/Y',$fim)->format('Y-m-d');

        $despesas = DB::table('despesas')
            ->selectRaw('despesas.*, categories.name as category_name')
            ->whereNull('despesas.deleted_at')
            ->leftJoin('categories','categories.id','=','despesas.category_id')
            ->whereBetween('despesas.data_lancamento',[$inicio,$fim])
            ->where('despesas.user_id','=',$user->id)

            ->get();

        $receitas = DB::table('receitas')
            ->whereBetween('data_lancamento',[$inicio,$fim])
            ->where('user_id','=',$user->id)
            ->whereNull('deleted_at')
            ->get();


        $total_despesas = $despesas->sum('valor');
        $total_receitas = $receitas->sum('valor');

        return view('Extrato.index', compact('receitas','despesas','total_despesas','total_receitas'));
    }
}
