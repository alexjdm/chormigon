<?php
	require_once('Templates/base.php');	
	
	$UniLongitud 	= $_POST['optradioL'];
	$UniFuerza	 	= $_POST['optradioF'];
	$UniMomento 	= $_POST['optradioM'];
	$UniTension 	= $_POST['optradioT'];
	
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
    <title>Cálculo | Viga Rectángular</title>
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
			$value = 'propmateriales';
			get_sidebar($value); ?>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Propiedades de los Materiales
            <small><?php echo $_POST['str']; ?></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $_POST['str']; ?></a></li>
            <li class="active">Propiedades de los Materiales</li>
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
					<form name="formMateriales" id="formMateriales" class="form-horizontal" method="POST" action="asignarseccion.php">
					  <div class="box-body">
						<label>ACERO</label>
						<div class="form-group">
						  <label for="fy" class="col-sm-2 control-label">fy</label>
						  <div class="col-sm-10">
							<input type="text" class="form-control" name="fy" id="fy" placeholder="<?php echo $UniTension; ?>">
						  </div>
						</div>
						<div class="form-group">
						  <label for="ES" class="col-sm-2 control-label">Es</label>
						  <div class="col-sm-10">
							<input type="text" class="form-control" name="Es" id="Es" placeholder="<?php echo $UniTension; ?>">
						  </div>
						</div>
						<label>HORMIGÓN</label>
						<div class="form-group">
						  <label for="Grado" class="col-sm-2 control-label">Grado</label>
						  <div class="col-sm-10">
							<input type="text" class="form-control" name="Grado" id="Grado" placeholder="Grado">
						  </div>
						</div>
						<div class="form-group">
						  <label for="fc" class="col-sm-2 control-label">fc'</label>
						  <div class="col-sm-10">
							<input type="text" class="form-control" name="fc" id="fc" placeholder="<?php echo $UniTension; ?>">
						  </div>
						</div>
						<div class="form-group">
						  <label for="Ec" class="col-sm-2 control-label">Ec</label>
						  <div class="col-sm-10">
							<input type="text" class="form-control" name="Ec" id="Ec" placeholder="<?php echo $UniTension; ?>">
						  </div>
						</div>
						<input type="hidden" name="str" value="<?php echo $_POST['str']; ?>">
						<input type="hidden" name="nombre" value="<?php echo $_POST['nombre']; ?>">
						<input type="hidden" name="UniLongitud" value="<?php echo $UniLongitud; ?>">
						<input type="hidden" name="UniFuerza" value="<?php echo $UniFuerza; ?>">
						<input type="hidden" name="UniMomento" value="<?php echo $UniMomento; ?>">
						<input type="hidden" name="UniTension" value="<?php echo $UniTension; ?>">
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

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane active" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
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