<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use Image;

use DB;

class CadastraCardapioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        
        $fieldFile = $request->file('imagem');
        //$imageName = time();

        $mime= $fieldFile->getClientOriginalExtension();
        //$imageName = date('d-m-Y H i').".".$mime;
        //$image = Image::make($fieldFile)->crop(350, 350);

        $location = Storage::disk('public')->put('img', $fieldFile);

        DB::table('cardapios')->insert(
            [
            'imagem' => $location,
            'titulo' => $request->input('titulo'),
            'descricao' => $request->input('descricao'),
            'categoria_id' => $request->input('categoria'),
            'valor' => $request->input('valor')
            ]
        );


        return redirect()->action('AdminController@index');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

}
