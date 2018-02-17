@extends ('user/layout')

@section ('title') paciente {{ $paciente->full_name }} @stop

@section ('content')

<h2>paciente #{{ $paciente->id }}</h2>

<p>Email: {{ $paciente->correo_electronico }}</p>
<p>nombre:{{ $paciente->nombre }}</p>
<p>apellido:{{ $paciente->apellido }}</p>
<p>telefono:{{ $paciente->telefono }}</p>
<p>cedula:{{ $paciente->cedula }}</p>
<p>procedencia:{{ $paciente->informacion }}</p>
<p>responsable:{{ $paciente->responsable }}</p>
<p>telefono responsable:{{ $paciente->telefono }}</p>
<p>alergias:{{ $paciente->alergias }}</p>
<p>numero expediente:{{ $paciente->num_registro }}</p>

<p>
  <a href="{{ route('user.paciente.edit', $paciente->id) }}" class="btn btn-primary">Editar</a>    
  <a href="{{ route('user.citapaciente.show', $paciente->id) }}" class="btn btn-primary">Historial Médico</a>
</p>


 


@stop