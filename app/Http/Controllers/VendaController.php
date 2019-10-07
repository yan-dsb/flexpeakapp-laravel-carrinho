<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Venda;


class VendaController extends Controller
{

    public function relatorio(){
        $itensvenda = DB::table('itensvenda')
                        ->join('vendas', 'vendas.id', '=', 'itensvenda.venda_id')
                        ->join('produtos', 'produtos.id', '=', 'itensvenda.produto_id')
                        ->join('users', 'users.id', '=', 'vendas.user_id')
                        ->orderBy('itensvenda.id', 'asc')
                        ->get();
        
        $relatorio = DB::table('itensvenda')
                        ->select(DB::raw('count(*) as quantidade, sum(produtos.preco) as total'))
                        ->join('vendas', 'vendas.id', '=', 'itensvenda.venda_id')
                        ->join('produtos', 'produtos.id', '=', 'itensvenda.produto_id')
                        ->join('users', 'users.id', '=', 'vendas.user_id')
                        ->whereRaw('month(itensvenda.created_at)')
                        ->get();
        
        return view ('vendas.relatorio', ['itensvenda'=> $itensvenda, 'relatorio'=> $relatorio]);

    }

}
