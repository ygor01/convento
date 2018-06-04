<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mesa;

class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mesa = Mesa::where('status', 0)->get();

        return view('inicio', compact('mesa'));
    }
}
