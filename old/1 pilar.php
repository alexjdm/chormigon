<?php 
	session_start();
?>
<html>
<head>
	<title>falla traccion.</title>
</head>

<body>


<?php
	//session_destroy();
	//require('ingreso.php');
	
	//Aca las variables son llamadas ala sesion
	$_SESSION['b']		= 30;
	$_SESSION['d']		= 55;
	$_SESSION['h']		= 60;
	$_SESSION['r']		= 5;
	$_SESSION['fc']		= 25;
	$_SESSION['fy']		= 420;
	$_SESSION['Es']		= 210000;
	$_SESSION['Mu']		= 50;
	$_SESSION['Pu']		= 20.1;
	$_SESSION['Vu']		= 10;
	$_SESSION['n']		= 3;
	
	$_SESSION['dd[1]']	= 5;
	$_SESSION['dd[2]']	= 30;
	$_SESSION['dd[3]']	= 55;


	//Declaracion de variables:	
	$b	= $_SESSION['b'];
	$d	= $_SESSION['d'];
	$h	= $_SESSION['h'];
	$r	= $_SESSION['r'];
	$fc	= $_SESSION['fc'];
	$fy	= $_SESSION['fy'];
	$Es	= $_SESSION['Es'];
	$Mu	= $_SESSION['Mu'];
	$Pu	= $_SESSION['Pu'];
	$Vu	= $_SESSION['Vu'];
	$n	= $_SESSION['n'];

	$dd	= array();
	$rr = array();
	$ss = array();  $ss[0] = 0;
	$NN = array();  $NN[0] = 0;
	$kk = array();
	$roo = array();
	$fs = array();
	$PP = array(); 	$PP[0] = 0;
	$MM = array(); 	$MM[0] = 0;
	$MMp = array(); $MMp[0] = 0;
	$PPp = array(); $PPp[0] = 0;
	$PPs = array(); $PPs[0] = 0;
	$MMs = array(); $MMs[0] = 0;
	$MMss = array(); $MMss[0] = 0;
	$Pn = array(); 	$Pn[0] = 0;
	$Mn = array(); 	$Mn[0] = 0;
	
	$Aslinea= array(); 
	
	$Mu  = $Mu*100000;
	$Pu  = $Pu*1000;
	$Mut = $Mu+$Pu*($d-$h*0.5);
	$Ag  = $b*$h;
	$Pt  = 0.1*$fc*10*$Ag;

	if($Pu<=$Pt) { require('2 pilar controla traccion.php'); }
	else 		 { require('3.1 pilar falla compresion.php'); }
	
?>
</html>