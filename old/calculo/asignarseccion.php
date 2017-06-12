<?php
	require_once('Templates/base.php');	
	
	/*$nombre 	= $_POST['nombre'];
	$AceroFy	= $_POST['fy'];
	$AceroES 	= $_POST['Es'];
	$HormGrado 	= $_POST['Grado'];
	$HormFc 	= $_POST['fc'];
	$HormEc 	= $_POST['Ec']; */
	
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cálculo | Viga T</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<!-- Get version 1.1.0 of Fabric.js from CDN -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.1.0/fabric.all.min.js" ></script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>C</b>L</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Cálculo</b></span>
        </a>
		
		<!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
        </nav>
      
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar Menu -->
          <?php 
			$value = 'asignarseccion';
			get_sidebar($value); ?>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Asignar Sección
            <small><?php echo $_POST['str']; ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $_POST['str']; ?></a></li>
            <li class="active">Asignar Sección</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

			<div class="row">
				<div class="col-md-6">
				  <div class="box box-info">
					<div class="box-header with-border">
					  <h3 class="box-title">Ingresa datos</h3>
					</div><!-- /.box-header -->
					<!-- form start -->
					<form name="formSeccion" id="formSeccion" class="form-horizontal" method="POST" action="cargas.php">
					  <div class="box-body">
						<label>GEOMETRÍA</label>
						<div class="form-group">
						  <label for="b" class="col-sm-2 control-label">b</label>
						  <div class="col-sm-10">
							<input type="text" class="form-control" name="b" id="b" placeholder="cm">
						  </div>
						</div>
						<div class="form-group">
						  <label for="bw" class="col-sm-2 control-label">bw</label>
						  <div class="col-sm-10">
							<input type="text" class="form-control" name="bw" id="bw" placeholder="cm">
						  </div>
						</div>
						<div class="form-group">
						  <label for="h" class="col-sm-2 control-label">h</label>
						  <div class="col-sm-10">
							<input type="text" class="form-control" name="h" id="h" placeholder="cm">
						  </div>
						</div>
						<div class="form-group">
						  <label for="hf" class="col-sm-2 control-label">hf</label>
						  <div class="col-sm-10">
							<input type="text" class="form-control" name="hf" id="hf" placeholder="cm">
						  </div>
						</div>
						<div class="form-group">
						  <label for="r" class="col-sm-2 control-label">r</label>
						  <div class="col-sm-10">
							<input type="text" class="form-control" name="r" id="r" placeholder="cm">
						  </div>
						</div>
						<label>REFUERZOS</label>
						<div class="form-group">
							<label for="optradioR" class="col-sm-2 control-label"></label>
						  <div class="col-sm-10">
								<label class="radio-inline"><input type="radio" name="optradioR" value="1" onclick="muestra_oculta('contenido_a_mostrar','Verificar')" checked>Verificar</label>
								<label class="radio-inline"><input type="radio" name="optradioR" value="2" onclick="muestra_oculta('contenido_a_mostrar','Diseñar')">Diseñar</label>
						  </div>
						</div>
						
						<div id="contenido_a_mostrar">
							<label>Refuerzo transversal</label>
							<div class="form-group">
							  <label for="Av" class="col-sm-2 control-label">Av</label>
							  <div class="col-sm-10">
								<input type="text" class="form-control" name="Av" id="Av" placeholder="cm2">
							  </div>
							</div>
							<label>Distribución refuerzo longitudinal</label>
							<div class="form-group">
							  <label for="n" class="col-sm-2 control-label">n</label>
							  <div class="col-sm-10">
								<input type="text" class="form-control" name="n" id="n" placeholder="">
							  </div>
							</div>
							<div class="form-group">
							  <label for="As1" class="col-sm-2 control-label">As1</label>
							  <div class="col-sm-10">
								<input type="text" class="form-control" name="As1" id="As1" placeholder="cm">
							  </div>
							</div>
							<div class="form-group">
							  <label for="Asn" class="col-sm-2 control-label">Asn</label>
							  <div class="col-sm-10">
								<input type="text" class="form-control" name="Asn" id="Asn" placeholder="cm">
							  </div>
							</div>
							<div class="form-group">
							  <label for="d1" class="col-sm-2 control-label">d1</label>
							  <div class="col-sm-10">
								<input type="text" class="form-control" name="d1" id="d1" placeholder="cm">
							  </div>
							</div>
							<div class="form-group">
							  <label for="dn" class="col-sm-2 control-label">dn</label>
							  <div class="col-sm-10">
								<input type="text" class="form-control" name="dn" id="dn" placeholder="cm">
							  </div>
							</div>
						</div>
						<input type="hidden" name="str" value="<?php echo $_POST['str']; ?>">
						<input type="hidden" name="nombre" value="<?php echo $_POST['nombre']; ?>">
						<input type="hidden" name="UniLongitud" value="<?php echo $UniLongitud; ?>">
						<input type="hidden" name="UniFuerza" value="<?php echo $UniFuerza; ?>">
						<input type="hidden" name="UniMomento" value="<?php echo $UniMomento; ?>">
						<input type="hidden" name="UniTension" value="<?php echo $UniTension; ?>">
						<input type="hidden" name="fy" value="<?php echo $_POST['fy']; ?>">
						<input type="hidden" name="Es" value="<?php echo $_POST['Es']; ?>">
						<input type="hidden" name="Grado" value="<?php echo $_POST['Grado']; ?>">
						<input type="hidden" name="fc" value="<?php echo $_POST['fc']; ?>">
						<input type="hidden" name="Ec" value="<?php echo $_POST['Ec']; ?>">
					  </div><!-- /.box-body -->
					  <div class="box-footer">
						<input type="submit" id="boton" class="btn btn-info pull-right" value="Siguiente">
					  </div><!-- /.box-footer -->
					</form>
				  </div><!-- /.box -->
				</div><!-- /.col (left) -->
				<div class="col-md-6">
					<canvas id="c" class="upper-canvas " width="600" height="500" style="position: absolute; width: 600px; height: 500px; left: 0px; top: 0px; -webkit-user-select: none; cursor: default;"></canvas>
				</div>
			</div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <?php get_footer(); ?>

    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
		 
	<script language="JavaScript">
		function muestra_oculta(id, sdf){
			if (document.getElementById){ //se obtiene el id
				var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
				if(sdf=='Verificar')
				{
					el.style.display = 'block';
				}
				else if (sdf == 'Diseñar')
				{
					el.style.display = 'none';
				}
			}
		}
		window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
			muestra_oculta('contenido_a_mostrar');/* "contenido_a_mostrar" es el nombre que le dimos al DIV */
		}
	</script>
		 
	<script>
	
		// Place script tags at the bottom of the page.
		// That way progressive page rendering and 
		// downloads are not blocked.
	 
		// Run only when HTML is loaded and 
		// DOM properly initialized (courtesy jquery)
		$(function() {
		  var canvas = this.__canvas = new fabric.Canvas('c');
			
			var HH = 100;
			var HV = 250;
			
		  var start2Points = [
			{x: 0, y: 0},
			{x: 0, y: 50},
			{x: 100, y: 50},
			{x: 100, y: 250},
			{x: 150, y: 250},
			{x: 150, y: 50},
			{x: 250, y: 50},
			{x: 250, y: 0}
		  ];
		  
		  var startPoints = [
			{x: 0, y: 0},
			{x: 0, y: 50},
			{x: 100, y: 50},
			{x: 100, y: 150},
			{x: 150, y: 150},
			{x: 150, y: 50},
			{x: 250, y: 50},
			{x: 250, y: 0}
		  ];

		  var clonedStartPoints = startPoints.map(function(o){
			return fabric.util.object.clone(o);
		  });

		  var polygon = new fabric.Polygon(clonedStartPoints, {
			left: 200,
			top: 200,
			fill: 'rgba(42, 44, 44, 0.9)',
			selectable: false
		  });
		  canvas.add(polygon);
		  
		  var circ1 = new fabric.Circle({
			radius: 5, fill: 'white', left: 190, top: 260
		  });
		  canvas.add(circ1);
		  
		  var circ2 = new fabric.Circle({
			radius: 5, fill: 'white', left: 210, top: 260
		  });
		  canvas.add(circ2);
		  
		  var line1 = new fabric.Line([0, 100, 250, 100],{
			left: 200,
			top: 110,
			stroke: 'red'
		  });
		  canvas.add(line1);
		  
		  var line2 = new fabric.Line([0, 100, 0, 150],{
			left: 60,
			top: 150,
			stroke: 'red'
		  });
		  canvas.add(line2);
		  
		  var line3 = new fabric.Line([0, 100, 0, 250],{
			left: 40,
			top: 200,
			stroke: 'red'
		  });
		  canvas.add(line3);
		  
		  var line4 = new fabric.Line([0, 100, 0, 115],{
			left: 240,
			top: 265,
			stroke: 'red'
		  });
		  canvas.add(line4);
		  
		  var line5 = new fabric.Line([100, 220, 150, 220],{
			left: 200,
			top: 285,
			stroke: 'red'
		  });
		  canvas.add(line5);
		  
			canvas.add(new fabric.Text('b', { 
			  fontFamily: 'Delicious_500',
		      fontSize: 12,
			  left: 200, 
			  top: 100 
			}));
			
			canvas.add(new fabric.Text('hf', { 
			  fontFamily: 'Delicious_500',
		      fontSize: 12,
			  left: 50, 
			  top: 150 
			}));
		  
		    canvas.add(new fabric.Text('h', { 
			  fontFamily: 'Delicious_500',
		      fontSize: 12,
			  left: 30, 
			  top: 200 
			}));
			
			canvas.add(new fabric.Text('r', { 
			  fontFamily: 'Delicious_500',
		      fontSize: 12,
			  left: 245, 
			  top: 265 
			}));
			
			canvas.add(new fabric.Text('bw', { 
			  fontFamily: 'Delicious_500',
		      fontSize: 12,
			  left: 200, 
			  top: 295 
			}));

		  function observeBoolean(property) {
			document.getElementById(property).onclick = function() {
			  canvas.item(0)[property] = this.checked;
			  canvas.renderAll();
			};
		  }

		  function observeNumeric(property) {
			document.getElementById(property).onchange = function() {
			  canvas.item(0)[property] = this.value;
			  canvas.renderAll();
			};
		  }

		  function observeOptionsList(property) {
			var list = document.querySelectorAll('#' + property + 
			' [type="checkbox"]');
			for (var i = 0, len = list.length; i < len; i++) {
			  list[i].onchange = function() {
				canvas.item(0)[property](this.name, this.checked);
				canvas.renderAll();
			  };
			};
		  }

		  observeBoolean('hasControls');
		  observeBoolean('hasBorders');
		  observeBoolean('hasRotatingPoint');
		  observeBoolean('visible');
		  observeBoolean('selectable');
		  observeBoolean('evented');
		  observeBoolean('transparentCorners');
		  observeBoolean('centeredScaling');
		  observeBoolean('centeredRotation');

		  observeNumeric('padding');
		  observeNumeric('cornerSize');
		  observeNumeric('rotatingPointOffset');
		  observeNumeric('borderColor');
		  observeNumeric('cornerColor');

		  observeOptionsList('setControlVisible');
		})();
	</script>
	
  </body>
</html>
