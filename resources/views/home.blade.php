@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tabela de reserva</div>

                
            </div>
            
            <table id="table" class="table table-bordered table-hover text-center">
                @if($reserva->count() == 0)
                <tr>
                    <td colspan="4">O sistema não possui reservas no momento</td>
                </tr>
                
                    
                @else 

                
                    <thead class="thead-admin-bg">
                        <tr>
                            
                            <th scope="col">Pedido iniciado em:</th>
                            <th scope="col">Nome Completo</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Número</th>
                            <th scope="col">Nº Pessoas</th>
                            <th scope="col">Data da Reserva</th>
                            <th scope="col">Status</th>
                            <th scope="col">Ação</th>
                        </tr>  
                    </thead>
                    
                    <tbody>  
                    
                    @foreach($reserva as $rsv)
                        @php
                            $data = date('d/m/Y', strtotime($rsv->data));
                            $criado_em = date('d/m/Y H:i', strtotime($rsv->created_at));
                        @endphp
                        
                        
                                
                        <tr class="font-table-admin">
                            
                            <td>{{$criado_em}}</td>
                            <td>{{$rsv->nome}}</td>   
                            <td>{{$rsv->email}}</td>
                            <td>{{$rsv->telefone}}</td>   
                            <td>{{$rsv->qtde}}</td> 
                            <td>{{$data}}</td>
                            
                            @if($rsv->status == 0)
                            <td><div class="status-warning">
                            <span>Pendentes</span>
                            </div></td>
                            @elseif($rsv->status == 1)
                            <td><div class="status-success">
                                <span>Confirmado</span>
                                </div></td>
                            @elseif($rsv->status == 2)
                            <td><div class="status-error">
                                <span>Cancelado</span>
                                </div></td>
                            @endif
                            <td>
                                <form method="POST" action="reserva_action_c">
                                        {{ csrf_field() }}
                                <input type="hidden" value="{{$rsv->id}}">
                                    <button title="Confirmar reserva - {{$rsv->id}}" class="btn-action-admin" value="Enviar">
                                        <i class="fas fa-check-circle confirm-icon"></i></button>
                                </form>  
                                <form method="POST" action="reserva_action_e">
                                        {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{$rsv->id}}">
                                    <button title="Cancelar reserva - {{$rsv->id}}" class="btn-action-admin" value="Enviar" type="submit">
                                    <i class="fas fa-times-circle cancel-icon"></i></button>
                                </form>    
                                         
                                                            
                            
                             
                                     
                                
                            </td>
                        </tr> 
                        
                    @endforeach
                    
                    @endif
                </tbody>    
            </table>          
        </div>
    </div>
    
</div>
@endsection
