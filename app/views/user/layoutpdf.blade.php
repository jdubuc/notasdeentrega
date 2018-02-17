<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>@yield('title', 'Zitat Bienvenido')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Bootstrap --}}
    {{ HTML::style('assets/css/bootstrap.min.css', array('media' => 'screen')) }}
    {{ HTML::style('assets/css/demou.css', array('media' => 'screen')) }}
    {{ HTML::style('assets/css/componentu.css', array('media' => 'screen')) }}
    {{ HTML::style('assets/css/defaultmu.css', array('media' => 'screen')) }}
    {{ HTML::style('assets/css/componentmu.css', array('media' => 'screen')) }}
    {{ HTML::script('assets/js/modernizr.custom.js') }}
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>



    {{-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --}}
    <!--[if lt IE 9]>
        {{ HTML::script('assets/js/html5shiv.js') }}
        {{ HTML::script('assets/js/respond.min.js') }}
    <![endif]-->

        <script type="text/javascript">

          // Load the Visualization API and the piechart package.
          google.load('visualization', '1.0', {'packages':['corechart']});

          // Set a callback to run when the Google Visualization API is loaded.
          google.setOnLoadCallback(drawChart);

          // Callback that creates and populates a data table,
          // instantiates the pie chart, passes in the data and
          // draws it.
          function drawChart() {
                <?php

                $id = Auth::user()->id;
                $currentuser = User::find($id);
                $user= Auth::user();
  
                $citac= Cita::where('User', '=', $id)->orderBy('fecha_cita')->take(20)->get();
                
                
                $resultcit = count($citac);
                $cita2=0;
                $cita1=0;
                $cita3=0;
                foreach ($citac as $citac){
                  if($citac->estado==1)
                        {$cita1++;}
                  if($citac->estado==2)
                        {$cita2++;}
                  if($citac->estado==3)
                        {$cita3++;}

                }
               
             
                ?>
            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');    
            data.addColumn('number', 'tipo');
            data.addRows([
              ['total de citas', <?php echo $resultcit ?>],
              ['Cancelada', <?php echo $cita3 ?>],
              ['En espera', <?php echo $cita1 ?>],
              ['Realizada', <?php echo $cita2 ?>],
            ]);
            // Create the data table.
            var data2 = new google.visualization.DataTable();
            data2.addColumn('string', 'Topping');
            data2.addColumn('number', 'Slices');
            data2.addRows([
              <?php 
                
              echo '[\'apio\', 3],'
               ?>
              ['Mushrooms', 3],
              ['Onions', 1],
              ['Olives', 15],
              ['Zucchini', 1],
              ['Pepperoni', 2]
            ]);

            var data3 = new google.visualization.DataTable();
            data3.addColumn('string', 'mes');
            data3.addColumn('number', 'Citas');
            data3.addColumn('number', 'Citas Realizadas');
            data3.addRows([
              ['1', 1000, 400],
              ['2', 1170, 460],
              ['3',  860, 580],
              ['4', 1000, 400],
              ['5', 1170, 460],
              ['6',  860, 580],
              ['7', 1000, 400],
              ['8', 1170, 460],
              ['9',  860, 580],
              ['10', 1000, 400],
              ['11', 1170, 460],
              ['12', 1030, 540]
            ]);

            // Set chart options
            var options = {'title':'Citas segun estado',
                           'width':400,
                           'height':300};
            // Set chart options
            var options2 = {'title':'How Much Pizza You Ate Last Night',
                           'width':400,
                           'height':300};
            // Set chart options
            var options3 = {'title':'Citas',
                           'width':500,
                           'height':500};

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
            var chart2 = new google.visualization.PieChart(document.getElementById('chart_div2'));
            chart2.draw(data2, options2);
            var chart3 = new google.visualization.LineChart(document.getElementById('chart_div3'));
            chart3.draw(data3, options3);

          }
        </script>
  </head>
  <body>
    <img src="<?php echo asset('assets/images/zitat.png'); ?>">
    {{-- Wrap all page content here --}}
    <div id="wrap">
      {{-- Begin page content --}}
      <div class="container">
        @yield('content')
      </div>
    </div>


<ul id="cbp-tm-menu" class="cbp-tm-menu">
        <li>
          <a href="#">Inicio</a>
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
        </li>-->
        
        <li>
          <a href="/directoriomedico/public/logout">Cerrar Sesión</a>
        </li>
      </ul>

    {{-- jQuery (necessary for Bootstrap's JavaScript plugins) --}}
    <script src="//code.jquery.com/jquery.js"></script>
    {{-- Include all compiled plugins (below), or include individual files as needed --}}
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    {{ HTML::script('assets/js/admin.js') }}
    <script>
function myFunction() {
    alert("se agrego la relacion creo!");
}
</script>

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