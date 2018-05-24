<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Reserva;
use Carbon\Carbon;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reserva = Reserva::orderby('id', 'desc')->get();
        

        return view('home', compact('reserva'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data_original = str_replace("/", "-", $request->input('data'));
        $data = date('Y-m-d', strtotime($data_original));
        $hora = $request->input('hora');
        $array[] = ['Data' => $data ." $hora"];

        
        
        DB::table('reservas')->insert(
            [
            
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'telefone' => $request->input('telefone'),
            'data' => $data,
            'qtde' => $request->input('qtde'),
            'created_at' => Carbon::now()
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        
        $tt = $id[0] .$id[1];
        
        $reservas = Reserva::find($id);
        $reservas->status = '1';
        $reservas->save();
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
