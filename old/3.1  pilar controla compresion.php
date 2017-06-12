<?php 
	session_start();
?>
<html>
<head>
	<title>3.1 falla compresion.</title>
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
	$_SESSION['Mu']		= 20;
	$_SESSION['Pu']		= 50;
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
	$PPss = array(); $PPss[0] = 0;
	$Pn = array(); $Pn[0] = 0;
	$Mn = array(); $Mn[0]  =0;
	$c = array(); $c[0]=0;
	$e = array(); $e[0]  =0;
	$Aslinea= array(); 
	
	$Mu=$Mu*100000;
	$Pu=$Pu*1000;

	$Ag = $b*$h;
	$Pt=0.1*$fc*10*$Ag;
	$esol=$Mu/$Pu;
	

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
		echo "<p>rr[$i]=".$rr[$i];
	}
//echo "<p>NN[$n]=".$NN[$n];
	//Factor distribucion acero
	for($i=1; $i<=$n; $i++)
	{
		$kk[$i]=$ss[$i]/$NN[$n];
		echo "<p>kk[$i]=".$kk[$i];
	}

	
	
	$min=1;
	$max=8;
$cmin 	= 1;
$cmax	= 3*$d;

//$c[1]=$cmin;


	//echo "<p>c[1]=".$c[1];
	//for ($j=1; $j<=8; $j++)
	//{	
	
	//$roo[$j] = $j/100;
	//$As 	 = $roo[$j]*$Ag;
	 $ro 	 = 0.01;
do
{
	$As 	 = $ro*$Ag;
	//echo "<p>$As=".$As;

do
{
	for ($i=1; $i<=11; $i++)
	{
	
	//echo "<p>cmin=".$cmin;
	//echo "<p>cmax=".$cmax;

		$paso=($cmax-$cmin)/10;
		if($i==1)
		{
		$c[$i]=$cmin;
		}
		else{
		$c[$i]=$c[$i-1]+ $paso;
		}
		
		$et=($c[$i]-$d)*0.003/$c[$i];	
	//echo "<p><h1>c[$i]=</h1>".$c[$i];
		
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

		
		$a = $B1*$c[$i];
		
				
		//echo "<p>roo[$j]".$roo[$j];
	//	echo "<p>As".$As;
		
		
		for ($u=1; $u<=$n; $u++)
		{
				
			$fs[$u] = 0.003*$Es*10*($c[$i]-$rr[$u])/$c[$i];
			//echo "<p>fsssss[$i]=".$fs[$i];
			
		}
			
			for ($u=1; $u<=$n; $u++)
			{
			//echo "<p>fscc[$i]=".$fs[$i];
			//echo $i;
			if($fs[$u]>$fy*10)	
			{
				$fs[$u]	= $fy*10;
			}
			else if($fs[$u]<-($fy*10))
			{
				$fs[$u]	= -$fy*10;
			}
			else {
				$fs[$u] = $fs[$u];
			}
			
		}
		
	
			for ($u=1; $u<=$n; $u++)
					{
					
						if($rr[$u]<=$c[$i])
						{
							$PP[$u]=($fs[$u]-(0.85*$fc*10))*$As*$kk[$u];
							$MM[$u]=($fs[$u]-(0.85*$fc*10))*$As*$kk[$u]*($h*0.5-$rr[$u]);
						}
						else{
							$PP[$u]=$fs[$u]*$As*$kk[$u];
							$MM[$u]=$fs[$u]*$As*$kk[$u]*($h*0.5-$rr[$u]);			
						}
					}
					
					for ($u=1; $u<=$n; $u++)
					{
					//echo "<p>fs[$u]=".$fs[$u];
					//echo "<p>As]=".$As;
					//echo "<p>MM[$u]=".$MM[$u];
					//echo "<p>PP[$u]=".$PP[$u];
					$PPs[$u]=$PP[$u]+$PPs[$u-1];
					$MMs[$u]=$MM[$u]+ $MMs[$u-1];
				//	echo "<p>PPs[$u]=".$PPs[$u];
						//echo "<p>MMs[$u]=".$MMs[$u];
					}	
			
			 
			
			if($a>$h)
			{$a=$h;
			}
			else{
			$a=$a;
			}
			//echo "<p>PPs[$n]]=".$PPs[$n];
		$Pn[$i] = 0.85*$fc*10*$a*$b+$PPs[$n];
	
		//echo "<p>fii=".$fii;
		//echo "<p>Pn[$i]=".$Pn[$i];
		//echo "<p>Pnsol=".$Pu/$fii ;
	//	echo "<p>c[$i]=".$c[$i];
	//	echo "<p>c[$i-1]=".$c[$i-1];

		
		if($Pu/$fii<=$Pn[$i] &&	$Pu/$fii>=$Pn[$i-1])
		{
		$cmin=$c[$i-1];
		$cmax=$c[$i];
		$Pnn=$Pn[$i];
		$cc=$c[$i];
		break;
		//echo "<p>cmin=".$cmin;
		//echo "<p>cmax=".$cmax;
		}
		else{//echo "<p>acaaaaa=";
		}
		
		
	}//for de c

}
//while(abs($Pnn-$Pu/$fii)>0.0001);
while(abs($cmax-$cmin)>0.0001);

$a = $B1*$cc;
if($a>$h)
{$a=$h;
}
else{
$a=$a;
}
								for ($i=1; $i<=$n; $i++)
								{
									if($rr[$i]<=$cc)
									{
										$PPp[$i]=($fs[$i]-0.85*$fc*10)*$kk[$i];
										$MMp[$i]=($fs[$i]-0.85*$fc*10)*$kk[$i]*($h*0.5-$rr[$i]);
									}
									else{
										$PPp[$i]=$fs[$i]*$kk[$i];
										$MMp[$i]=$fs[$i]*$kk[$i]*($h*0.5-$rr[$i]);			
									}
								//	echo "<p>MMp[$i]=".$MMp[$i];
								}
						                               
								for ($i=1; $i<=$n; $i++)
								{
								$PPss[$i]=$PPp[$i]+$PPss[$i-1];
								$MMss[$i]=$MMp[$i]+$MMss[$i-1];
								
							//	echo "<p>rr[$i]=".$rr[$i];
								}
							//	echo "<p>MMss[$n]=".$MMss[$n];
							//echo "<p>fs[2]=".$fs[2];
							//echo "<p>K2[2]=".$kk[2];
							//echo "<p>r2[2]=".$rr[2];
							//echo "<p>d=".$d;
		
		$Ass=(($Mu/$fii)-0.85*$fc*10*$a*$b*($h*0.5-0.5*$a))/$MMss[$n];
		$ro=$Ass/$Ag;
		$Mnnn	= 0.85*$fc*10*$a*$b*($h*0.5-$a*0.5)+$Ass*$MMss[$n];
		$Pnnn = 0.85*$fc*10*$a*$b+$Ass*$PPss[$n];
		$Mnnnfii	= $fii*(0.85*$fc*10*$a*$b*($h*0.5-$a*0.5)+$Ass*$MMss[$n]);
		$Pnnnfii	= $fii*$Pnnn;
//echo "<p>Ass=".$Ass;
//echo "<p>As=".$As;

if(abs($Ass-$As)>0.0001)
{	
$cmin 	= 1;
$cmax	= 3*$d;
}
else{}


}

while(abs($Ass-$As)>0.0001);



 $fiiPnmax=0.8*$fii*(0.85*$fc*10*($Ag-$Ass)+$fy*10*$Ass);
 echo "<p>fiPnmax=".$fiiPnmax;
 if($Pnnnfii>$fiiPnmax)
 {
 $fii=0.65;
 $Pnnn=$Pu/$fii;
 $Ass=($Pnnn-0.8**0.85*$fc*10*$Ag)/(0.8*($fy*10-0.85*$fc*10));
 $cc= 3*$d;
 $a= $B1*$cc;
 $ro=$Ass/$Ag;

				if($a>$h)
				{$a=$h;
				}
				else{
				$a=$a;
				}
 
 			for ($u=1; $u<=$n; $u++)
			{
			
			$fs[$u] = $fy*10;
			}
	
	 							for ($i=1; $i<=$n; $i++)
								{
									if($rr[$i]<=$cc)
									{
										$MMp[$i]=($fs[$i]-0.85*$fc*10)*$kk[$i]*($h*0.5-$rr[$i]);
									}
									else{
										$MMp[$i]=$fs[$i]*$kk[$i]*($h*0.5-$rr[$i]);			
									}
								
								}
						                               
								for ($i=1; $i<=$n; $i++)
								{
								
								$MMss[$i]=$MMp[$i]+$MMss[$i-1];
								
								}
	
								$Mnnn	= 0.85*$fc*10*$a*$b*($h*0.5-$a*0.5)+$Ass*$MMss[$n];
		$Pnnnfii=$Pnnn*$fii;
		$Mnnnfii=$Mnnn*$fii;
 }

else{



}


//}
	
		echo "<p><h1>RESULTADOS</h1>";
		
		echo "<p>0.1 fc Ag=".$Pt;
	 
		echo "<p>c=".$cc;
		echo "<p>a=".$a;
		echo "<p>B1=".$B1;
		echo "<p>fi=".$fii;
		echo "<p>Ag=".$Ag;
		echo "<p>ro=".$ro;
		echo "<p>Ast=".$Ass;
		
		for($i=1; $i<=$n; $i++)
	{
		$Asss[$i]=$kk[$i]*$Ass;
		echo "<p>As[$i]=".$Asss[$i];
	}
		echo "<p>Mnnn=".$Mnnn;
		
		echo "<p>Pnnn=".$Pnnn;
		echo "<p>Mu=".$Mu;
		echo "<p>Pu=".$Pu;

		echo "<p>Mnfi=".$Mnnnfii;
		echo "<p>Pnfi=".$Pnnnfii;
		
		
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
