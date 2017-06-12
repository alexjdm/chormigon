<?php
	function get_footer(){
		echo'
			<footer class="main-footer">
				<!-- To the right -->
				<div class="pull-right hidden-xs">
				  Developed by <a href="http://www.iongroup.cl/">Ion Group</a>
				</div>
				<!-- Default to the left -->
				<strong>Copyright &copy; 2015 <a href="https://www.uach.cl/">U. Austral de Chile</a>.</strong> All rights reserved.
			</footer>
		';
	}
	
	function get_sidebar($active)
	{		
		echo'
			<ul class="sidebar-menu">
				<li class="header">HEADER</li>
				<!-- Optionally, you can add icons to the links -->
				<li'; if($active=='unidades'){ echo ' class="active"';} echo'><a href="unidades.php"><i class="fa fa-link"></i> <span>Unidades</span></a></li>
				<li'; if($active=='propmateriales'){ echo ' class="active"';} echo'><a href="propmateriales.php"><i class="fa fa-link"></i> <span>Propiedades de los Materiales</span></a></li>
				<li'; if($active=='asignarseccion'){ echo ' class="active"';} echo'><a href="asignarseccion.php"><i class="fa fa-link"></i> <span>Asignar Sección</span></a></li>
				<li'; if($active=='cargas'){ echo ' class="active"';} echo'><a href="cargas.php"><i class="fa fa-link"></i> <span>Cargas</span></a></li>
				<li'; if($active=='resultados'){ echo ' class="active"';} echo'><a href="resultados.php"><i class="fa fa-link"></i> <span>Resultados</span></a></li>
			  </ul><!-- /.sidebar-menu -->
		';		
	}
?>
	