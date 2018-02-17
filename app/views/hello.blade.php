<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>ChileImpresores</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="" />
		<link rel="shortcut icon" href="<?php echo asset('assets/images/favicon2.ico'); ?>">
		
		{{ HTML::style('assets/css/demou.css', array('media' => 'screen')) }}
		{{ HTML::style('assets/css/componentu.css', array('media' => 'screen')) }}
		{{ HTML::style('assets/css/defaultmu.css', array('media' => 'screen')) }}
		{{ HTML::style('assets/css/componentmu.css', array('media' => 'screen')) }}
		{{ HTML::style('assets/css/bootstrap.min.css', array('media' => 'screen')) }}

		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		{{ HTML::script('assets/js/modernizr.custom.js') }}
		
	</head>
	<body>
		<?php
	$id = Auth::user()->id;
	$currentuser = User::find($id);
	$user= Auth::user();
	?>
	<img src="<?php echo asset('assets/images/logo22.png'); ?>">
							<div class="container" style="width:100%;">
			<header class="clearfix">
				<span>Notas de Entrega <span class="bp-icon bp-icon-about" data-content="Bienvenido."></span></span>
				<!--<h1>Deploy</h1>
				<nav>
					<a href="http://tympanus.net/Blueprints/SplitLayout/" class="bp-icon bp-icon-prev" data-info="previous Blueprint"><span>Previous Blueprint</span></a>
					<a href="http://tympanus.net/Blueprints/GridGallery/" class="bp-icon bp-icon-next" data-info="next Blueprint"><span>Next Blueprint</span></a>
					<a href="http://tympanus.net/codrops/?p=18521" class="bp-icon bp-icon-drop" data-info="back to the Codrops article"><span>back to the Codrops article</span></a>
					<a href="http://tympanus.net/codrops/category/blueprints/" class="bp-icon bp-icon-archive" data-info="Blueprints archive"><span>Go to the archive</span></a>
				</nav>-->
			</header>	
			<div id="tabs" class="tabs">
				<nav>
					<ul>
						<li><a href="#section-1" class="icon-shop"><span>Notas de Entrega</span></a></li>
						<li><a href="#section-2" class="icon-cup "><span>Pantalla 1</span></a></li>
						<li><a href="#section-3" class="icon-food"><span>Pantalla 2</span></a></li>
						<!-- <li><a href="#section-4" class="icon-lab"><span>Especialidades</span></a></li>
						<li><a href="#section-5" class="icon-truck"><span>About</span></a></li>-->
					</ul>
				</nav>
				<div class="content">
					<section id="section-1">
								<?php
								$notasentrega=DB::table('notasentrega')->orderBy('fecha_pedidos', 'DESC')->get();
								 date_default_timezone_set("America/New_York");
										echo "Fecha: " . date("m/d/Y ");
										echo "hora : " . date("h:i a");

								 
								?>
									<h1>Lista general</h1>
									  <p>
									  	<!--<a href="{{ route('user.citas.create') }}">Crear una nueva cita</a><br>-->
									   <!-- <a href="{{ route('user.citas.create') }}" class="btn btn-primary">Crear una nueva cita</a>-->
									  </p>
									  <table class="table table-striped"style="width: 100%">
									    <tr>
									      <th>Datos pedido:</th>
								          <th>Pantalla:</th>
								          <th style="word-wrap: normal; width:90px;">Hora:</th> 
								          <th>Fecha:</th>
								          <th>Dias:</th>
									      <th style="word-wrap: normal; width:30px;">Cliente:</th> 
									      <th style="word-wrap: normal; width:30px;">Trabajo:</th> 
								          <th>Cantidad:</th>
								          <th>Folio:</th>   
								          <th>alerta:</th>   
									        
									    </tr>
									    @foreach ($notasentrega as $notasentrega)
									    <?php
										$dia=date("d");
										$mes=date("m");
										$ano=date("Y");
										$fechapedido=explode("-", $notasentrega->fecha_pedidos);
										$fecha="$notasentrega->fecha_pedidos";
										$segundos=strtotime($fecha) - strtotime('now');
										$diferencia_dias=intval($segundos/60/60/24);
										if($diferencia_dias>'0'){
											if($diferencia_dias<'5'&& $diferencia_dias>'3'){
												$notasentrega->tipo_alerta='2';
											}
											if($diferencia_dias<='2'){
												$notasentrega->tipo_alerta='3';
											}
								 		?>
									    <tr>
									     	<td><p style="word-wrap: break-word; width:400px;">{{ $notasentrega->datos_pedido }}</p></td>
									        <td><p>{{ $notasentrega->pantalla }}</p></td>
									        <td><p style="word-wrap: normal; width:90px;">{{ $notasentrega->hora }} </p></td>
									        <td><p>{{ $fechapedido['2'] }}-{{ $fechapedido['1'] }}-{{ $fechapedido['0'] }}</p> </td>
									        <td><p>{{ $diferencia_dias }}</p></td>
									        <td><p style="word-wrap: normal; width:30px;">{{ $notasentrega->cliente }}</p></td>
									         <td><p style="word-wrap: normal; width:30px;">{{ $notasentrega->trabajo }}</p></td>
									        <td><p>{{ $notasentrega->cantidad }}</p></td>
									        <td><p style="word-wrap: normal; width:10px;">{{ $notasentrega->folio }}</p></td>
									        
									       
									<!-- pantalla-->
									    	 <td><img id="estado" title="Cita en espera" src="<?php echo asset('assets/images/'. $notasentrega->tipo_alerta .'.gif'); ?>" height="25 px" width="25 px"></td>	
									<!-- pantalla-->
									    	<td>
										        <a href="{{ route('user.notasentrega.show', $notasentrega->id) }}" class="btn btn-info">
										            Ver
										        </a>
										        <a href="{{ route('user.notasentrega.edit', $notasentrega->id) }}" class="btn btn-primary">
										            Editar
										        </a>
										         {{Form::model($user, array('route' => array('user.notasentrega.destroy', $notasentrega->id), 'method' => 'DELETE', 'role' => 'form','style'=>'width: 108px; position:relative; margin-top:5px;')) }}
													 <a >
													        {{ Form::submit('Eliminar', array('class' => 'btn btn-danger ')) }}
													    </a>
													  {{ Form::close() }}
									        </td>
									    </tr>  <?php } ?>
									    @endforeach
									  </table>
					</section>
					<section id="section-2">
								<?php
								$notasentrega=DB::table('notasentrega')->orderBy('fecha_pedidos')->get();
								 
										echo "Fecha: " . date("m/d/Y ");
										echo "hora : " . date("h:i a");
								 
								?>
									<h1>Lista pantalla 1</h1>
									  <p>
									  	<!--<a href="{{ route('user.citas.create') }}">Crear una nueva cita</a><br>-->
									   <!-- <a href="{{ route('user.citas.create') }}" class="btn btn-primary">Crear una nueva cita</a>-->
									  </p>
									  <table class="table table-striped"style="width: 100%">
									    <tr>
									      <th>Datos pedido:</th>
								          <th>Hora:</th> 
								          <th>Fecha:</th>
								          <th>Dias:</th>
									      <th>Cliente:</th> 
									      <th>Trabajo:</th> 
								          <th>Cantidad:</th>
								          <th>Folio:</th>   
								          <th>alerta:</th>  
									    </tr>
									    @foreach ($notasentrega as $notasentrega)
										    <?php
											    if($notasentrega->pantalla=='1'){
												$dia=date("d");
												$mes=date("m");
												$ano=date("Y");
												$fechapedido=explode("-", $notasentrega->fecha_pedidos);
												$fecha="$notasentrega->fecha_pedidos";
												$segundos=strtotime($fecha) - strtotime('now');
												$diferencia_dias=intval($segundos/60/60/24);
												if($diferencia_dias>'0'){
													if($diferencia_dias<'5'&& $diferencia_dias>'3'){
														$notasentrega->tipo_alerta='2';
													}
														if($diferencia_dias<='2'){
															$notasentrega->tipo_alerta='3';
														}
									 		?>
									    <tr>
									       	<td><p style="word-wrap: break-word; width:400px;">{{ $notasentrega->datos_pedido }}</p></td>
									        <td><p>{{ $notasentrega->hora }} </p></td>
									        <td><p>{{ $fechapedido['2'] }}-{{ $fechapedido['1'] }}-{{ $fechapedido['0'] }}</p> </td>
									        <td><p>{{ $diferencia_dias }}</p></td>
									        <td><p style="word-wrap: normal; width:10px;">{{ $notasentrega->cliente }}</p></td>
									         <td><p style="word-wrap: normal; width:10px;">{{ $notasentrega->trabajo }}</p></td>
									        <td><p>{{ $notasentrega->cantidad }}</p></td>
									        <td><p style="word-wrap: normal; width:10px;">{{ $notasentrega->folio }}</p></td>
									       
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
							
							

					</section>
					<section id="section-3">
							<?php
								$notasentrega=DB::table('notasentrega')->orderBy('fecha_pedidos')->get();
								 
										echo "Fecha: " . date("m/d/Y ");
										echo "hora : " . date("h:i a");
								 
								?>
									<h1>Lista pantalla 2</h1>
									  <p>
									  	<!--<a href="{{ route('user.citas.create') }}">Crear una nueva cita</a><br>-->
									   <!-- <a href="{{ route('user.citas.create') }}" class="btn btn-primary">Crear una nueva cita</a>-->
									  </p>
									  <table class="table table-striped"style="width: 100%">
									    <tr>
									      <th>Datos pedido:</th>
								          <th>Hora:</th> 
								          <th>Fecha:</th>
								          <th>Dias:</th>
									      <th>Cliente:</th> 
									      <th>Trabajo:</th> 
								          <th>Cantidad:</th>
								          <th>Folio:</th>   
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
													if($diferencia_dias<'5'&& $diferencia_dias>'3'){
														$notasentrega->tipo_alerta='2';
													}
														if($diferencia_dias<='2'){
															$notasentrega->tipo_alerta='3';
														}
									 		?>
									    <tr>
									       	<td><p style="word-wrap: break-word; width:400px;">{{ $notasentrega->datos_pedido }}</p></td>
									        <td><p>{{ $notasentrega->hora }} </p></td>
									        <td><p>{{ $fechapedido['2'] }}-{{ $fechapedido['1'] }}-{{ $fechapedido['0'] }}</p> </td>
									        <td><p>{{ $diferencia_dias }}</p></td>
									        <td><p style="word-wrap: normal; width:10px;">{{ $notasentrega->cliente }}</p></td>
									        <td><p style="word-wrap: normal; width:10px;">{{ $notasentrega->trabajo }}</p></td>
									        <td><p>{{ $notasentrega->cantidad }}</p></td>
									        <td><p style="word-wrap: normal; width:10px;">{{ $notasentrega->folio }}</p></td>
									       
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
							
					</section>	
					<!-- 
					<section id="section-4">
								
					</section>
					<section id="section-5">
								
					</section>-->
				</div><!-- /content -->
			</div><!-- /tabs -->
			
		</div>
<ul id="cbp-tm-menu" class="cbp-tm-menu">
        <li>
          <a href="/notasdeentrega/public/">Inicio</a>
        </li>
        <!--<li>
          <a href="#">Informacion</a>
          <ul class="cbp-tm-submenu">
            <li><a href="#" class="cbp-tm-icon-archive">Sorrel desert</a></li>
            <li><a href="#" class="cbp-tm-icon-cog">Raisin kakadu</a></li>
            <li><a href="#" class="cbp-tm-icon-location">Plum salsify</a></li>
            <li><a href="#" class="cbp-tm-icon-users">Bok choy celtuce</a></li>
            <li><a href="#" class="cbp-tm-icon-earth">Onion endive</a></li>
            <li><a href="#" class="cbp-tm-icon-location">Bitterleaf</a></li>
            <li><a href="#" class="cbp-tm-icon-mobile">Sea lettuce</a></li>
          </ul>
        </li>
        <li>
          <a href="#">Contacto</a>
          <ul class="cbp-tm-submenu">
            <li><a href="#" class="cbp-tm-icon-archive">Brussels sprout</a></li>
          </ul>
        </li>
        <li>
          <a href="{{ route('user.calendario.show') }}">Calendario</a>
        </li>-->
        <li>
          <a href="{{ route('user.notasentrega.create') }}">Crear nota de entrega</a>
        </li>
        <li>
          <a href="/notasdeentrega/public/notasentrega-csv" >Exportar entradas como CSV</a>
        </li>
         <li>
          <a href="/notasdeentrega/public/logout">Cerrar Sesión</a>
        </li>
      </ul>
		
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
