<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria_Cardapio extends Model
{
    protected $table = 'categoria_cardapios';

    protected $fillable = [
        'nome', 'descricao'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];
}
