<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categoria_Cardapio;
use App\Cardapio;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat_cardapio = Categoria_Cardapio::orderby('id', 'ASC')->get();
        $cardapio = Cardapio::get();
        return view('admin/admin', compact('cat_cardapio', 'cardapio'));
    }
    
}
