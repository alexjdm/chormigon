<?php session_start();
?>
<html>
<head>

	<title>vigas rect.</title>
</head>

<body>


	<?php

//session_destroy();
	//require('ingreso.php');
	//Aca las variables son llamadas ala sesion
	$_SESSION['b']=$_POST["b"]=30;
	$_SESSION['d']=$_POST["d"]=55;
	$_SESSION['dr']=$_POST["dr"]=5;
	$_SESSION['fc']=$_POST["fc"]=25;
	$_SESSION['fy']=$_POST["fy"]=420;
	$_SESSION['Es']=$_POST["Es"]=210000;
	$_SESSION['Mu']=$_POST["Mu"]=20.1;
	$_SESSION['Vu']=$_POST["Vu"]=10;


	//Declaracion de variables:	
	$b=$_SESSION['b'];
	$d=$_SESSION['d'];
	$dr=$_SESSION['dr'];
	$fc=$_SESSION['fc'];
	$fy=$_SESSION['fy'];
	$Es=$_SESSION['Es'];
	$Mu=$_SESSION['Mu'];
	$Vu=$_SESSION['Vu'];

		//print_r($_SESSION);
	
	$ey=$fy/$Es;
	$_SESSION['ey']=$ey;


		//calculo de armadura mínima

	$Asm=(pow($fc,0.5))*$b*$d/(4*$fy);

	if($Asm<=1.4*$b*$d/$fy){
		$Asm=1.4*$b*$d/$fy;
	}else{
		$Asm=$Asm;
	}





		//Calculo beta

	if($fc<=30){
		$_SESSION['B1']=0.85;
	} elseif($fc>55){
		$_SESSION['B1']=0.65;
	} else {
		$_SESSION['B1']=0.85-0.008*($fc-30);
	}
	$B1=$_SESSION['B1'];



//Calculo Mlim
	$clim=(3/7)*$d;

		//Se hace et= et limite = 0.004 (sección controlada tracción)
	$et=0.004;
	$etlim=$et;

//calculo de fii

	if($et<=$ey){
		$fii=0.65;
	}
	elseif($et>=0.005){
		$fii=0.9;
	}
	else{
		$fii=0.65+($et-$ey)*(0.25/(0.005-$ey));;
	}
		$filim=$fii;  // se define fi limite		
		//echo $fii. '<br>';				

	//Momento Limite Nominal	
		$Mlim= $filim*(0.85*$fc*$B1*$clim*$b*($d-0.5*$B1*$clim))*10;
		echo "<p>Mlim=".$Mlim. '<br>'; 
		echo "<p>filim=".$filim. '<br>'; 






		
		$Mu=$Mu*100000; //lo transforma a kg*cm
		//echo $Mu . '<br>';
		
		//$fii=$filim;
	//determinación diseño viga simple o doble	
		if($Mu<=$Mlim){
			$arm='simple';
		}
		else{$arm='doble';}

		echo "<p>primer fi=".$fii. '<br>';
		if($arm=='simple'){
			do{
				$i=1;
				$i=$i+1;
		//$et=$eti;
			echo "<p>fii=".$fii. '<br>';
				$fient=$fii;	
				
				$Mn=$Mu /$fient;

				
				echo "<p>Mni=".$Mn. '<br>';
				echo "<p>fient=".$fient. '<br>';
		//echo $Mn. '<br>';

		//echo'Se desprecia la armadura de compresion para el diseño';

		//$u= pow((1-(2*$Mn)/(0.85*$fc*10*$b*$d*$d)), 0.5);

				$a=$d-$d*pow(1-(2*$Mn/(0.85*$fc*10*$b*$d*$d)),0.5);
		//echo $a. '<br>';
				$et=0.003*(($B1*$d)-$a)/($a);




		//calculo de fii
				echo $et.'<='.$ey.'<br>';
				if($et<=$ey){
					$fii=0.65;
				}
				elseif($et>=0.005){
					$fii=0.9;
				}
				else{
					$fii=0.65+($et-$ey)*(0.25/(0.005-$ey));
				}
		//echo $fii. '<br>';
			
				echo '->'.$fient.'-'.$fii.')>0.0001<br>';
				echo '->'.$et.'-'.$et.')>0.0001<br>';
			}
			
			while(abs($fient-$fii)>0.0001);
			

		}




		//echo $arm. '<br>';

		//echo $fii. '<br>';
		//echo $et. '<br>';
		//echo $u. '<br>';
			//echo $u;
			//echo $Mn. '<br>';


	if($arm=='doble'){
		$a=$B1*$clim;
		$fsc=0.003*$Es*($clim-$dr)/$clim;
		if($fsc<=$fy){
			$fsc=$fsc;
		}
		else{
			$fsc=$fy;
		}
		$As1=0.85*$fc*$b*$a/$fsc;
		$Mn1=$Mu/$filim;
		$Asc=($Mn1-$Mlim)/($fsc*10*($d-$dr));
		$As=$As1+$Asc;
		$fii=$filim;
		$et=$etlim;
		$cuantsc=$Asc/($b*$d);
		echo $cuantsc;
		

	}
	else
	{
		$Asc=0;
		//$Mn=$Mu*100000/$fii;
		//$x=1-2*$Mn/(0.85*$fc*10*$b*$d*$d);
		//$u=pow($x,0.5);
		//$a=$d-($d*$u);
		//$et=0.003*(($B1*$d)-$a)/($a);
		$As=(0.85*$fc*$b*$a)/$fy; //acá calcula As para viga simple

		$cuantsc=$Asc/($b*$d);
		$fsc=0;
		//$cuants=$As/($b*$d);    
	}
		//Compara con armadura minima
	if($As<=$Asm){
		$As=$Asm;
	}else{
		$As=$As;
	}
		//Calculo cuantia
	$cuants=$As/($b*$d);


	if($cuants>0.025){
		$cond='ALERTA!!!!sección insuficiente. Cuantía supera el máximo 0.025 (Cap. 21.3.2.1 ACI318-05)';
	}
	else{
		
		$cond='cuantía menor a 0.025. DISEÑO Ok'; 
		
	}


	$Mn=0.85*10*$fc*$a*$b*($d-0.5*$a)+$Asc*$fy*10*($d-$dr);
	$Mnsol=$Mu/$fii;
	$T=$As*$fy*10;
	$Cc=0.85*10*$fc*$a*$b;

		//echo $As1. '<br>';
		//echo $Asc. '<br>'; 
		//echo $As. '<br>';  
		//echo $B1. '<br>';	
	?>


	B1	   = <?php echo $B1; ?> <br/>
	clim   = <?php echo $clim; ?><br/>
	
	fi 	   = <?php echo $fii; ?> <br/>
	fs'    = <?php echo $fsc; ?> <br/> 
	et     = <?php echo $et; ?> <br/>
	a      = <?php echo $a; ?> <br/>
	As     = <?php echo $As; ?> <br/>
	As'    = <?php echo $Asc; ?> <br/>
	As,min = <?php echo $Asm; ?><br/>
	cuantía (simple)= <?php echo $cuants; ?><br/>
	cuantía (sup.)= <?php echo $cuantsc; ?><br/>

	<?php echo $cond; ?><br/>
	<?php echo "<p>Mlim=". $Mlim; ?> <br/>
	<?php echo "<p>Mnsol=". $Mnsol; ?> <br/>
	<?php echo "<p>Mn=". $Mn; ?> <br/>
	<?php echo "<p>T=". $T; ?> <br/>
	<?php echo "<p>Cc=". $Cc; ?> <br/>
	<?php echo "<p>Armadura=". $arm; ?> <br/>
	<?php echo "<p>Nº iteraciones=". $i; ?> <br/>
</body>

</html>
