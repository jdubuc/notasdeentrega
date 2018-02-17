@extends ('user/layout')

@section ('title') nota entrega  @stop

@section ('content')



<h1><span class="Cbluejeans">Información de nota de entrega </span> </h1> 
	<table class="table table-striped"style=" word-wrap: break-word;">
        <tr>
          
          <th>Pantalla:</th>
          <th>Hora:</th> 
          <th>Fecha:</th>  
          <th>Cliente:</th> 
          <th>Cantidad:</th>
          <th>Trabajo:</th>
          <th>Folio:</th> 
          <th width="70%">Datos pedido:</th>                
        </tr>
        <tr>
        
        <td><p>{{ $notasentrega->pantalla }}</p></td>
        <td><p style="word-wrap: normal; width:50px;">{{ $notasentrega->hora }} </p></td>
        <td><p style="word-wrap: normal; width:50px;">{{ $notasentrega->fecha_pedidos }}</p></td>
        <td><p style="word-wrap: normal; width:30px;">{{ $notasentrega->cliente }}</p></td>
        <td><p style="word-wrap: normal; width:10px;">{{ $notasentrega->cantidad }}</p></td>
        <td><p style="word-wrap: normal; width:10px;">{{ $notasentrega->trabajo }}</p></td>
        <td><p style="word-wrap: normal; width:60px;">{{ $notasentrega->folio }}</p></td>
        <td><p style="word-wrap: break-word; width:600px;">{{ $notasentrega->datos_pedido }}</p></td>

        </tr>
      </table>


<p style="padding:0px 0px 100px 0px;">  
  <a href="{{ route('notasentrega.edit', $notasentrega->id) }}" class="btn btn-primary">
    Editar
  </a>
 
</p>



@stop