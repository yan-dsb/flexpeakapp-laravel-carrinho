<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Carrinho;

use Session;
use Auth;


use App\Venda;
use App\Itensvenda;

class ProdutoController extends Controller
{
    public function shop(){
        $produtos =  Produto::all();
        return view('shop', ['produtos' => $produtos]);
    }
    public function index(){
        $produtos =  Produto::all();
        return view('produtos.index', ['produtos' => $produtos]);
    }
    public function show($id){
        $produto = Produto::findOrFail($id);
        return view('produtos.editar', ['produto'=> $produto]);
    }    
    public function store(Request $request){
        $data = $request->validate([
            'nome' => 'required',
            'imageURL'=> 'required',
            'preco' => 'required'
        ]);
        
        $data['preco'] = floatval($request['preco']); 
            
        Produto::create($data);

        return redirect('produtos');
    }
    public function update(Request $request, $id){
        $produto = Produto::findOrFail($id);

        $data = $request->validate([
            'nome' => 'required',
            'imageURL'=> 'required',
            'preco' => 'required'
        ]);
        
        $data['preco'] = floatval($request['preco']); 

        $produto->update($data);

        return redirect('produtos');
    }
    public function delete($id){

        $produto = Produto::findOrFail($id);
        $produto->delete();

        return redirect('produtos');
    }

    public function getReduzirUm($id){
        $oldCart = Session::has('carrinho') ? Session::get('carrinho') : null;
        $carrinho = new Carrinho($oldCart);
        $carrinho->reduzirUm($id);
        Session::put('carrinho', $carrinho);
        return redirect('/carrinho');
    }
    public function getRemoverUm($id){
        $oldCart = Session::has('carrinho') ? Session::get('carrinho') : null;
        $carrinho = new Carrinho($oldCart);
        $carrinho->removerUm($id);
        Session::put('carrinho', $carrinho);
        return redirect('/carrinho');
    }

    public function getAddToCart(Request $request, $id){
        $produto = Produto::findOrFail($id); 
        $oldCart = Session::has('carrinho') ? Session::get('carrinho') : null;
        $carrinho = new Carrinho($oldCart);
        $carrinho->add($produto, $produto->id);

        $request->session()->put('carrinho', $carrinho);
        return redirect('/');
    }

    public function getCart(){
        if (!Session::has('carrinho')) {
            return view('vendas.carrinho', ['produtos' => null]);
        }
        $oldCart = Session::get('carrinho');
        $carrinho = new Carrinho($oldCart);

        return view ('vendas.carrinho', ['produtos'=> $carrinho->items, 'totalPreco'=>$carrinho->totalPreco]);
    }

    public function finalizarVenda(Request $request){
        if (!Session::has('carrinho')) {
            return redirect ('/');
        }
        if(!Auth::user()){
            return redirect('/login');
        }
        $oldCart = Session::get('carrinho');

        $venda = new Venda();
        $venda->user_id = Auth::user()->id;
        $venda->save();

        

        $carrinho = new Carrinho($oldCart);
            foreach ($carrinho->items as $item) {
                $itensvenda = new Itensvenda();
                $itensvenda->quantidade = $item['qtd'];
                $itensvenda->venda_id = $venda->id;
                $itensvenda->produto_id = $item['item']['id']; 
                $itensvenda->save();   
            }
        
            
        
        Session::forget('carrinho');
        return redirect('/');
    }
}
