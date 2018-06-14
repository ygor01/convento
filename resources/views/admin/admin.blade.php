@extends('layouts.app')

<!-- Themify Icons-->
<link rel="stylesheet" href="css/themify-icons.css">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/cropper.min.css') }}">
@section('content')
<style>
    .div-novo-prato{
        
    }
</style>
<div class="container">
    

        
    <div class="gtco-section" id="tt">
            <div class="gtco-container">
                <div class="row">
                    <div class="col-md-8 offset-2 text-center gtco-heading">
                        <h2 class="cursive-font primary-color" data-aos="fade-right" data-aos-easing="ease-in-out" data-aos-anchor-placement="top-bottom" data-aos-once="true" data-aos-duration="600">Cardápio de entrada</h2>
                        <p data-aos="fade-right" data-aos-delay="300" data-aos-easing="ease-in-out" data-aos-anchor-placement="top-bottom" data-aos-once="true" data-aos-duration="400">Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
                    </div>
                </div>
                <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-6" data-aos="zoom-out" data-aos-easing="ease-in-out" data-aos-once="true" data-aos-duration="300">
                                <a href="" data-toggle="modal" data-target="#Modal" class="div-novo-prato-card-item image-popup">
                                    <figure>
                                        <div class="overlay"><i class="ti-plus"></i></div>
                                        <img src="img/img_1.jpg" alt="Image" class="img-responsive">
                                    </figure>
                                    <div class="div-novo-prato-text">
                                        <h2>Cadastrar novo prato</h2>
                                    </div>
                                </a>
                        </div>

                        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" enforceFocus="true" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><i style="font-size: 11pt;" class="ti-angle-double-right"></i> Cadastrar novo prato</h5>
                                    <button type="button" class="close" data-dismiss="modal" >
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body info-modal">
                                            <form method="POST" action="{{url('cadastra_cardapio')}}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                            <input type="file" name="imagem">
                                            <div class="img-container">
                                            <img id="imagem-thumb" src="img/prato.jpg" alt="Picture">
                                            </div>
                                            <input class="form-input" type="text"placeholder="Titulo" name="titulo">
                                            <textarea class="form-textarea" placeholder="Descrição do produto (Ingredientes)" name="descricao"></textarea>
                                            <select class="form-control form-select" name="categoria">
                                                @foreach($cat_cardapio as $cat_cdp)
                                            <option value="{{$cat_cdp->id}}">{{$cat_cdp->nome}}</option>
                                                @endforeach
                                            </select>
                                        <input class="form-input" type="text" placeholder="Valor R$" name="valor">
                                            
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" class="close" data-dismiss="modal" aria-label="Close">Voltar</button>
                                    <input type="hidden" name="id">
                                    <input class="btn btn-primary" type="submit" value="Atualizar">
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                    @foreach($cardapio as $cdp)
                    <div class="col-lg-4 col-md-4 col-sm-6" data-aos="zoom-out" data-aos-easing="ease-in-out" data-aos-once="true" data-aos-duration="300">
                        <a href="" data-toggle="modal" data-target="#Modal{{$cdp->id}}" class="fh5co-card-item image-popup">
                            <figure>
                                <div class="overlay"><i class="ti-pencil-alt"></i></div>
                                    <img src="storage/{{$cdp->imagem}}" alt="Image" class="img-responsive">
                            </figure>
                            <div class="fh5co-text">
                                <h2>{{$cdp->titulo}}</h2>
                                <p>{{$cdp->descricao}}</p>
                                <p><span class="price cursive-font">R${{$cdp->valor}}</span></p>
                            </div>
                        </a>
                    </div>
                    <div class="modal fade" id="Modal{{$cdp->id}}" tabindex="-1" role="dialog" enforceFocus="true" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><i style="font-size: 11pt;" class="ti-angle-double-right"></i> {{$cdp->titulo}}</h5>
                                <button type="button" class="close" data-dismiss="modal" >
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body info-modal">
                                        <form method="POST" action="{{url('atualiza_cardapio')}}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                        <input type="file" name="imagem">
                                        <div class="img-container">
                                        <img id="imagem-thumb" src="storage/{{$cdp->imagem}}" alt="Picture">
                                        </div>
                                        <input class="form-input" type="text" value="{{$cdp->titulo}}" placeholder="Titulo" name="titulo">
                                        <textarea class="form-textarea" placeholder="Descrição do produto (Ingredientes)" name="descricao">{{$cdp->descricao}}</textarea>
                                        <select class="form-control form-select" name="categoria">
                                            
                                            @foreach($cat_cardapio as $cat_cdp)
                                                @if($cdp->categoria_id == $cat_cdp->id)
                                                    <option value="{{$cat_cdp->id}}" selected>{{$cat_cdp->nome}}</option>
                                                @else
                                                    <option value="{{$cat_cdp->id}}">{{$cat_cdp->nome}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    <input class="form-input" type="text" value="{{$cdp->valor}}" placeholder="Valor R$" name="valor">
                                        
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" class="close" data-dismiss="modal" aria-label="Close">Voltar</button>
                                <input type="hidden" name="id" value="{{$cdp->id}}">
                                <input class="btn btn-primary" type="submit" value="Atualizar">
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                    
</div>
<script>
        window.addEventListener('DOMContentLoaded', function () {
          var image = document.getElementById('imagem-thumb');
          var cropBoxData;
          var canvasData;
          var cropper;
    
          $('#modal').on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
              autoCropArea: 0.5,
              ready: function () {
    
                // Strict mode: set crop box data first
                cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
              }
            });
          }).on('hidden.bs.modal', function () {
            cropBoxData = cropper.getCropBoxData();
            canvasData = cropper.getCanvasData();
            cropper.destroy();
          });
        });
      </script>
@endsection
