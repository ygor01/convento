<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use Image;

use DB;

use App\Cardapio;

class AtualizaCardapioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function update(Request $request)
    {

        $array[] = ["Imagem" => $request->file('imagem'), "Titulo" => $request->input('titulo'),         
        "Descricao" => $request->input('descricao'), "Categoria" => $request->input('categoria'), "Valor" => $request->input('valor')];

        $fieldFile = $request->file('imagem');
        //$imageName = time();

        $mime= $fieldFile->getClientOriginalExtension();
        //$imageName = date('d-m-Y H i').".".$mime;
        //$image = Image::make($fieldFile)->crop(350, 350);

        $location = Storage::disk('public')->put('img', $fieldFile);


        $id = $request->input('id');
        $cardapio = Cardapio::find($id);
        DB::table('cardapios')->where('id', $id)->update(
            [
            'imagem' => $location,
            'titulo' => $request->input('titulo'),
            'descricao' => $request->input('descricao'),
            'categoria_id' => $request->input('categoria'),
            'valor' => $request->input('valor')
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
