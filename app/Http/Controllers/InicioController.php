<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cardapio;

class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cardapio = Cardapio::where('categoria_id', '1')->get();
        return view('inicio', compact('cardapio'));
    }
}
