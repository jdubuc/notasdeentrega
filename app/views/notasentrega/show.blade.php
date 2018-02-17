@extends ('user/layout')

@section ('title') nota entrega {{ $notaentrega->full_name }} @stop

@section ('content')



<h1><span class="Cbluejeans">Información de nota de entrega </span> </h1> 
	<table class="table table-striped"style=" word-wrap: break-word;">
        <tr>
          <th width="70%">Datos pedido:</th>
          <th>Pantalla:</th>
          <th>Hora:</th> 
          <th>Fecha:</th>
          <th>alerta:</th>                
        </tr>
        <tr>
        <td><p>{{ $notaentrega->datos_pedido }}</p></td>
        <td><p>{{ $notaentrega->pantalla }}</p></td>
        <td><p>{{ $notaentrega->fecha_pedidos }}</p></td>
        <td><p>{{ $notaentrega->hora }} </p></td>
        <td><p>{{ $notaentrega->alerta }}</p></td>

        </tr>
      </table>


<p style="padding:0px 0px 100px 0px;">  
  <a href="{{ route('notaentrega.edit', $notaentrega->id) }}" class="btn btn-primary">
    Editar
  </a>
  {{ Form::model($notaentrega, array('route' => array('notaentregas.destroy', $notaentrega->id), 'method' => 'DELETE'), array('role' => 'form')) }}
  {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
{{ Form::close() }}
</p>



@stop