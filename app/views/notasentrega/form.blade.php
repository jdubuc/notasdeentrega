@extends ('user/layout')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<?php

    if ($notasentrega->exists):
        $form_data = array('route' => array('notasentrega.update', $notasentrega->id), 'method' => 'PATCH');
        $action    = 'Editar';
    else:
        $form_data = array('route' => 'notasentrega.store', 'method' => 'POST');
        $action    = 'Crear';        
    endif;

?>



@section ('title') {{ $action }} Usuarios @stop

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

<h1>{{ $action }} Nota de entrega</h1>

{{ Form::model($notasentrega, $form_data, array('role' => 'form','autocomplete'=>'on')) }}

  @include ('user/errors', array('errors' => $errors))

  <div class="row">
    <div class="form-group col-md-4">
  <span name="User" >Se creara una nota de entrega</span><br>         
  </div>

  <div class="row">
     
    <div class="form-group col-md-4">
      {{ Form::label('numero_expediente_paciente', 'Numero expediente paciente') }}
      {{ Form::text('numero_expediente_paciente', null, array('placeholder' => 'Introduce numero de expediente paciente', 'class' => 'form-control')) }}
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-4">
      {{ Form::label('razon_cita', 'razon cita') }}
      {{ Form::text('razon_cita', null, array('placeholder' => 'Introduce razon de la cita', 'class' => 'form-control')) }}
    </div>
    <div class="form-group col-md-4"> 
        {{ Form::label('hora', 'Hora') }}
        <input type="text" id="timepicker" name="hora" class="form-control timepicker">
      </div>
  </div>

  <div class="row">
    <div class="form-group col-md-4">
        {{ Form::label('fecha_cita', 'Fecha Cita') }}
        {{ Form::input('date','fecha_cita', null, array('placeholder' => 'DD:MM:AA', 'class' => 'form-control')) }}
      </div>
  </div>
 
 {{ Form::hidden('User', $notasentrega->User, array('readonly' )) }}
 {{ Form::button('aceptar', array('type' => 'submit', 'class' => 'btn btn-primary')) }}    
  
{{ Form::close() }}

@if ($action == 'Editar')  
{{ Form::model($notasentrega, array('route' => array('notasentrega.destroy', $notasentrega->id), 'method' => 'DELETE', 'role' => 'form')) }}
  <div class="row">
    <div class="form-group col-md-4">
        {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
    </div>
  </div>
{{ Form::close() }}
@endif

<script type="text/javascript">
  $('.timepicker').wickedpicker({now: '8:30', twentyFour: false, title:'Elige la hora', showSeconds: false});
        //    $('.timepicker-24').wickedpicker({twentyFour: true});     
</script>

@stop