<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>ChileImpresores p2</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="" />
		<meta http-equiv="refresh" content="60">
		<link rel="shortcut icon" href="../favicon.ico">
		
		{{ HTML::style('assets/css/demou.css', array('media' => 'screen')) }}
		{{ HTML::style('assets/css/componentu.css', array('media' => 'screen')) }}
		{{ HTML::style('assets/css/defaultmu.css', array('media' => 'screen')) }}
		{{ HTML::style('assets/css/componentmu.css', array('media' => 'screen')) }}
		{{ HTML::style('assets/css/bootstrap.min.css', array('media' => 'screen')) }}

		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		{{ HTML::script('assets/js/modernizr.custom.js') }}
		<style type="text/css">
		body {
		    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
		    font-size: 21px;
		     font-weight: 900;
		}</style>
	</head>
	<body>
	<img style="width:80px;" src="<?php echo asset('assets/images/logo22.png'); ?>">
							
								<?php
								$notasentrega=DB::table('notasentrega')->orderBy('fecha_pedidos')->get();
								 
										echo "Fecha: " . date("m/d/Y ");
										echo "hora : " . date("h:i a");
								 
								?>
									<h4>Lista pantalla 2</h4>
									  <p>
									  	<!--<a href="{{ route('user.citas.create') }}">Crear una nueva cita</a><br>-->
									   <!-- <a href="{{ route('user.citas.create') }}" class="btn btn-primary">Crear una nueva cita</a>-->
									  </p>
									  <table class="table table-striped"style="width: 100%">
									    <tr>
									      <th style="word-wrap: break-word; width:500px;">Datos pedido:</th>
								          <th>Hora:</th> 
								          <th>Fecha:</th>
								          <th>Dias:</th>
									      <th>Cliente:</th> 
									       <th>Trabajo:</th> 
								          <th>Cantidad:</th>
								          <th style="word-wrap: normal; width:100px;">Folio:</th>   
								          <th>alerta:</th>  
									    </tr>
									    @foreach ($notasentrega as $notasentrega)
										    <?php
											    if($notasentrega->pantalla=='2'){
												$dia=date("d");
												$mes=date("m");
												$ano=date("Y");
												$fechapedido=explode("-", $notasentrega->fecha_pedidos);
												$fecha="$notasentrega->fecha_pedidos";
												$segundos=strtotime($fecha) - strtotime('now');
												$diferencia_dias=intval($segundos/60/60/24);
												if($diferencia_dias>'0'){
													if($diferencia_dias<='3'&& $diferencia_dias>='2'){
														$notasentrega->tipo_alerta='2';
													}
														if($diferencia_dias<='1'){
															$notasentrega->tipo_alerta='3';
														}
									 		?>
									    <tr>
									       	<td><p style="word-wrap: break-word;">{{ $notasentrega->datos_pedido }}</p></td>
									        <td><p>{{ $notasentrega->hora }} </p></td>
									        <td><p>{{ $fechapedido['2'] }}-{{ $fechapedido['1'] }}-{{ $fechapedido['0'] }}</p> </td>
									        <td><p>{{ $diferencia_dias }}</p></td>
									        <td><p style="word-wrap: normal; width:10px;">{{ $notasentrega->cliente }}</p></td>
									        <td><p style="word-wrap: normal; width:10px;">{{ $notasentrega->trabajo }}</p></td>
									        <td><p>{{ $notasentrega->cantidad }}</p></td>
									        <td><p style="word-wrap: normal;">{{ $notasentrega->folio }}</p></td>
									       
									<!-- pantalla-->
									    	 <td><img id="estado" title="Cita en espera" src="<?php echo asset('assets/images/'. $notasentrega->tipo_alerta .'.gif'); ?>" height="25 px" width="25 px"></td>	
									<!-- pantalla
									    	<td>
										        <a href="{{ route('user.notasentrega.show', $notasentrega->id) }}" class="btn btn-info">
										            Ver
										        </a>
										        <a href="{{ route('user.notasentrega.edit', $notasentrega->id) }}" class="btn btn-primary">
										            Editar
										        </a>
										        <a href="{{ route('user.notasentrega.destroy', $notasentrega->id) }}" class="btn btn-danger btn-delete">
										            Cancelar
										        </a>
									        </td>
									    </tr>-->
									    <?php
											} }
										?>
									    @endforeach
									  </table>
				

		
		{{ HTML::script('assets/js/cbpTooltipMenu.min.js') }}
		<script>
			var menu = new cbpTooltipMenu( document.getElementById( 'cbp-tm-menu' ) );
		</script>

	
		{{ HTML::script('assets/js/cbpFWTabs.js') }}
		<script>
			new CBPFWTabs( document.getElementById( 'tabs' ) );
		</script>
	</body>
</html>
