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
	$PP = array(); $PP[0] = 0;
	$MM = array(); $MM[0] = 0;
	$MMp = array(); $MMp[0] = 0;
	$PPp = array(); $PPp[0] = 0;
	$PPs = array(); $PPs[0] = 0;
	$MMs = array(); $MMs[0] = 0;
	$MMss = array(); $MMss[0] = 0;
	$Pn = array(); $Pn[0] = 0;
	$Mn = array(); $Mn[0] = 0;
	
	$Aslinea = array(); 
	
	$Mu  = $Mu*100000;
	$Pu  = $Pu*1000;
	$Mut = $Mu+$Pu*($d-$h*0.5);
	$Ag  = $b*$h;
	$Pt  = 0.1*$fc*10*$Ag;

	for($i=1; $i<=$n; $i++)
	{
		$dd[$i] = $_SESSION['dd['.$i.']'];
	//	echo "<p>dd[$i]=".$dd[$i];
	}
	
	// Calculo r
	$d		= $h-$r;
	$rr[1] 	= $d;
	//echo "<p>rr[1]=".$d;
	//echo "<p>rr[1]=".$rr[1];
	
	for($i=2; $i<=$n; $i++)
	{
		$rr[$i]	= $h-$dd[$i];
	}

	$ey = $fy/$Es;
	$_SESSION['ey'] = $ey;
	
	//Calculo beta
	if($fc <= 30){
		$_SESSION['B1'] = 0.85;
	} elseif($fc>55){
		$_SESSION['B1'] = 0.65;
	} else {
		$_SESSION['B1'] = 0.85-0.008*($fc-30);
	}
	$B1 = $_SESSION['B1'];
	//echo $B1;
	
	//Distribucion acero
	$ss[1]	= round(($b-2*$r)/15+1);
	//echo $ss[1];
	$ss[$n]	= $ss[1];
	//echo "<p>ss[$n]=".$ss[$n];
	for($i=2; $i<=($n-1); $i++)
	{
		$ss[$i] = 2;
	}

	for($i=1; $i<=$n; $i++)
	{
		$NN[$i] = $ss[$i]+$NN[$i-1];
	//	echo "<p>ss[$i]=".$ss[$i];
		//echo "<p>NN[$i]=".$NN[$i];
	}
	//echo "<p>NN[$n]=".$NN[$n];
	
	//Factor distribucion acero
	for($i=1; $i<=$n; $i++)
	{
		$kk[$i]=$ss[$i]/$NN[$n];
	//	echo "<p>kk[$i]=".$kk[$i];
	}	
	
	$min=1;
	$max=8;

		
	//Calculo Mlim
	$clim 	= (3/7)*$d;
	
	//Se hace et= et limite = 0.004 (sección controlada tracción)
	$et 	= 0.004;
	$etlim	= $et;

	//Calculo de fii
	if($et<=$ey){
		$fii = 0.65;
	}
	elseif($et >= 0.005){
		$fii = 0.9;
	}
	else{
		$fii = 0.65+($et-$ey)*(0.25/(0.005-$ey));
	}

	$filim = $fii;  // se define fi limite		
	//echo $fii. '<br>';				

	$c = $clim;
	$a = $B1*$c;
	
	$fs[1] = 0.003*$Es*10*($d-$c)/$c;
//		echo "<p>fs[1]=".$fs[1];
		
		
	for ($j=1; $j<=8; $j++)
	{	
		$roo[$j] = $j/100;
		$As 	 = $roo[$j]*$Ag;
		//echo "<p>roo[$j]".$roo[$j];
		//	echo "<p>As".$As;	
		
		for ($i=2; $i<=$n; $i++)
		{
			$fs[$i] = 0.003*$Es*10*($c-$rr[$i])/$c;
		}
			
		for ($i=1; $i<=$n; $i++)
		{
			//echo $i;
			if($fs[$i]>$fy*10)	
			{
				$fs[$i]	= $fy*10;
			}
			else if($fs[$i]<-($fy*10))
			{
				$fs[$i]	= -$fy*10;
			}
			else {
				$fs[$i] = $fs[$i];
			}
		//	echo "<p>fs[$i]=".$fs[$i];
		}
		
		for ($i=1; $i<=$n; $i++)
		{
			for ($i=1; $i<=$n; $i++)
			{
				if($rr[$i]<=$c)
				{
					$PP[$i]=($fs[$i]-0.85*$fc*10)*$As*$kk[$i];
					$MM[$i]=($fs[$i]-0.85*$fc*10)*$As*$kk[$i]*($d-$rr[$i]);
				}
				else{
					$PP[$i]=$fs[$i]*$As*$kk[$i];
					$MM[$i]=$fs[$i]*$As*$kk[$i]*($d-$rr[$i]);			
				}
			}
					
			for ($i=1; $i<=$n; $i++)
			{
				$PPs[$i]=$PP[$i]+$PP[$i-1]-2*$PP[1];
				$MMs[$i]=$MM[$i]+ $MM[$i-1];
			}	

			$Pn[$j] = 0.85*$fc*10*$a*$b+$PPs[$n];
			$Mn[$j]	= 0.85*$fc*10*$a*$b*($d-$a*0.5)+$MMs[$n];
			$e[$j] 	= $Mn[$j]/$Pn[$j];
			//echo "<p>Mn[$j]=".$Mn[$j];
			//echo "<p>Pn[$j]=".$Pn[$j];
			
			if($roo[$j]==0.01)
			{
			$Mnmin=$Mn[1];
			$Pnmin=$Pn[1];
			}
			else {}
			
			if($roo[$j]==0.08)
			{
				$Mnmax=$Mn[8];
				$Pnmax=$Pn[8];
			}
			else {}
			
			$Mnfi=$fii*$Mn[$j];
						
			if($Mut>=$fii*$Mn[$j-1] &&$Mut<=$fii*$Mn[$j] )
			{
				$min = $roo[$j-1];
				$max = $roo[$j];			
			}
			else{}
		}
			
	}	

	if ($Mut<=$fii*$Mn[1])
		{
			$arm='minima';
			$ro=0.001;
			$Ass=$ro*$Ag;
			$Mn	= $Mnmin;
			$Mnfii	= $fii*$Mnmin;
			$Pn	= $Pnmin;
			$Pnfii	= $fii*$Pn;		
		}
		else if($Mut>$fii*$Mn[8])
		{
			$arm='insufisiente';
			$ro='insufisiente';
			$Ass='insufisiente';
			$Mn	= 'insufisiente';
			$Mnfii	= 'insufisiente';
			$Pn	= 'insufisiente';
			$Pnfii	= 'insufisiente';
		}
		else{
			$arm='se calcula'; 
					
			for ($i=1; $i<=$n; $i++)
			{
				if($rr[$i]<=$c)
				{
					$PPp[$i]=($fs[$i]-0.85*$fc*10)*$kk[$i];
					$MMp[$i]=($fs[$i]-0.85*$fc*10)*$kk[$i]*($d-$rr[$i]);
				}
				else{
					$PPp[$i]=$fs[$i]*$kk[$i];
					$MMp[$i]=$fs[$i]*$kk[$i]*($d-$rr[$i]);			
				}
				//	echo "<p>MMp[$i]=".$MMp[$i];
			}
 
			for ($i=1; $i<=$n; $i++)
			{
				$PPss[$i]=$PPp[$i]+$PPp[$i-1]-2*$PPp[1];
				$MMss[$i]=$MMp[$i]+$MMp[$i-1];				
				//	echo "<p>rr[$i]=".$rr[$i];
			}
			
			//	echo "<p>MMss[$n]=".$MMss[$n];
			//echo "<p>fs[2]=".$fs[2];
			//echo "<p>K2[2]=".$kk[2];
			//echo "<p>r2[2]=".$rr[2];
			//echo "<p>d=".$d;
			
			$Ass=(($Mut/$fii)-0.85*$fc*10*$a*$b*($d-0.5*$a))/$MMss[$n];
			$ro=$Ass/$Ag;
			$Mn	= 0.85*$fc*10*$a*$b*($d-$a*0.5)+$Ass*$MMss[$n];
			$Pn = 0.85*$fc*10*$a*$b+$Ass*$PPss[$n];
			$Mnfii	= $fii*(0.85*$fc*10*$a*$b*($d-$a*0.5)+$Ass*$MMss[$n]);
			$Pnfii	= $fii*$Pn;		
		}
		
		for($i=1; $i<=$n; $i++)
		{
			$Aslinea[$i] = $Ass*$kk[$i];
		}
		
		echo "<p><h1>RESULTADOS</h1>";
		
		echo "<p>0.1 fc Ag=".$Pt;
		echo "<p>Armadura=".$arm;
		echo "<p>c=".$c;
		echo "<p>a=".$a;
		echo "<p>B1=".$B1;
		echo "<p>fi=".$fii;
		echo "<p>Ag=".$Ag;
		echo "<p>ro=".$ro;
		echo "<p>Ast=".$Ass;
		
		for($i=1; $i<=$n; $i++)
		{
			echo "<p>As[$i]=".$Aslinea[$i];
		}
		echo "<p>Mn=".$Mn;
		echo "<p>Pn=".$Pn;
		echo "<p>Mu=".$Mu;
		echo "<p>Pu=".$Pu;
		echo "<p>Mut=".$Mut;
		echo "<p>Mnfi=".$Mnfii;
		echo "<p>Pnfi=".$Pnfii;
		
		
		//echo "<p>min=".$min;
		//echo "<p>max=".$max;
		//echo "<p>arm=".$arm;
		//echo "<p>Mut=".$Mut;
		//echo "<p>Mnfi=".$Mnfi;
		//echo "<p>Mnmin=".$Mnmin;
		//echo "<p>Pnmin=".$Pnmin;
		//echo "<p>Mnmax=".$Mnmax;
		//echo "<p>Pnmax=".$Pnmax;
?>
</html>