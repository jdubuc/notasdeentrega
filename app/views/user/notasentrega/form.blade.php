@extends ('user/layout')


<?php

    if ($notasentrega->exists):
        $form_data = array('route' => array('user.notasentrega.update', $notasentrega->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'user.notasentrega.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;

?>


@section ('title') {{ $action }} notasentrega @stop

@if ($errors->any())
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Por favor corrige los siguentes errores:</strong>
      <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
      </ul>
    </div>
  @endif

@section ('content')

<h1>{{ $action }} notasentrega</h1>

{{ Form::model($notasentrega, $form_data, array('role' => 'form')) }}

  @include ('user/errors', array('errors' => $errors))
  <div class="row">
   <div class="form-group col-md-4">
      {{ Form::label('cliente', 'Cliente') }}
      {{ Form::text('cliente', null, array('placeholder' => 'nombre cliente', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('cantidad', 'Cantidad') }}
      {{ Form::text('cantidad', null, array('placeholder' => 'Cantidad', 'class' => 'form-control')) }}
    </div>
    
  </div>
 <div class="row">
   <div class="form-group col-md-4">
      {{ Form::label('Pantalla', 'Pantalla') }}
      {{ Form::text('pantalla', null, array('placeholder' => 'Introduce 1 o 2 dependiendo de que pantalla', 'class' => 'form-control')) }}
    </div>
     <div class="form-group col-md-4">
      {{ Form::label('trabajo', 'Trabajo') }}
      {{ Form::text('trabajo', null, array('placeholder' => 'trabajo', 'class' => 'form-control')) }}
    </div>
  </div>
  <div class="row">
   <div class="form-group col-md-4">
      {{ Form::label('Datos_pedido', 'Datos del pedido') }}
      {{ Form::textarea('datos_pedido', null, array('placeholder' => 'Introduce Datos del pedido', 'class' => 'form-control')) }}
    </div>
     <div class="form-group col-md-4">
      {{ Form::label('folio', 'Folio') }}
      {{ Form::text('folio', null, array('placeholder' => 'folio', 'class' => 'form-control')) }}
    </div>
  </div>
  <div class="row">

    <div class="form-group col-md-4">
       {{ Form::label('fecha_pedidos', 'Fecha pedido') }}
       {{ Form::input('date','fecha_pedidos', null, array('placeholder' => 'DD:MM:AA', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4">
      {{ Form::label('Hora', 'Hora') }}
      {{ Form::text('hora', null, array('placeholder' => 'Introduce la hora tope HH : mm AM', 'class' => 'form-control')) }}
    </div>   
  </div>
  {{ Form::button('aceptar', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
  
{{ Form::close() }}
@if ($action == 'Editar')  
{{ Form::model($notasentrega, array('route' => array('user.notasentrega.destroy', $notasentrega->id), 'method' => 'DELETE', 'role' => 'form')) }}
  <div class="row">
    <div class="form-group col-md-4">
        {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
    </div>
  </div>
{{ Form::close() }}
@endif

@stop