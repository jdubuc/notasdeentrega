@extends ('user/layoutpdf')

@section ('title') pdf  @stop

@section ('content')


<a class="btn btn-info" alt="Click para Imprimir esta página" title="Click para Imprimir esta página" 
href=javascript:window.print();>Imprimir esta página</a>

	<div class="row">
        <div id="chart_div" class="col-xs-4 "></div>
        <div id="chart_div2" class="col-xs-4 "></div>
        <div id="chart_div3" class="col-xs-6 "></div>
        
      </div>


@stop