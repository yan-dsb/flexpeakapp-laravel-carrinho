<?php

namespace App;


class Carrinho
{
    public $items = null;
    public $totalQtd =0;
    public $totalPreco = 0;


    public function __construct($oldCart){
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQtd = $oldCart->totalQtd;
            $this->totalPreco = $oldCart->totalPreco;
        }
    }

    public function add($item, $id){
        $storedItem = ['qtd'=> 0, 'preco'=> $item->preco, 'item'=>$item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qtd']++;
        $storedItem['preco'] = $item->preco * $storedItem['qtd'];
        $this->items[$id] = $storedItem;
        $this->totalQtd++;
        $this->totalPreco += $item->preco;
    }
    public function reduzirUm($id){
        $this->items[$id]['qtd']--;
        $this->items[$id]['preco'] -= $this->items[$id]['item']['preco'];
        $this->totalQtd--;
        $this->totalPreco -= $this->items[$id]['item']['preco'];
        if ($this->items[$id]['qtd'] <= 0) {
            unset($this->items[$id]);
        }
    }

    public function removerUm($id){
        $this->totalQtd-= $this->items[$id]['qtd'];
        $this->totalPreco -= $this->items[$id]['preco'];
        unset($this->items[$id]);
    }

}
