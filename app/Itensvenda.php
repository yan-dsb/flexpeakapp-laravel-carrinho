<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itensvenda extends Model
{

    protected $fillable = ['quantidade'];
    protected $table = 'itensvenda';
    public function produtos()
    {
        return $this->hasMany('App\Produtos', 'produto_id');
    }
    public function vendas()
    {
        return $this->hasMany('App\Venda', 'venda_id');
    }
}
