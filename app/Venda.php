<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = 'vendas';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
