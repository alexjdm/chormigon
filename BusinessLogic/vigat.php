<? session_start();
?>
<html>
<head>

<title>Documento sin t&iacute;tulo</title>


<body>

<?php
    //require('ingreso de datos.php');
	//Aca las variables son llamadas ala sesion
    $_SESSION['b']=$_POST["b"]=100;
    $_SESSION['bw']=$_POST["bw"]=30;
    $_SESSION['d']=$_POST["d"]=55;
    $_SESSION['dr']=$_POST["dr"]=10;
    $_SESSION['hf']=$_POST["hf"]=12;
    $_SESSION['fc']=$_POST["fc"]=20;
    $_SESSION['fy']=$_POST["fy"]=420;
    $_SESSION['Es']=$_POST["Es"]=210000;
    $_SESSION['Mu']=$_POST["Mu"]=90;
    $_SESSION['Vu']=$_POST["Vu"]=30;
		
		
	//Declaracion de variables:	
    $b=$_SESSION['b'];
    $bw=$_SESSION['bw'];
    $d=$_SESSION['d'];
    $dr=$_SESSION['dr'];
    $hf=$_SESSION['hf'];
    $fc=$_SESSION['fc'];
    $fy=$_SESSION['fy'];
    $Es=$_SESSION['Es'];
    $Mu=$_SESSION['Mu'];
    $Vu=$_SESSION['Vu'];
		
    $ey=$fy/$Es;
    $_SESSION['ey']=$ey;

    $raiz_fc=pow($fc,0.5);
	
	if($raiz_fc>8.3)
	{
	    trigger_error("Raiz fc' excede 8,3 MPa", E_USER_ERROR);
	}
	
	
	
	
	echo "<p>ey =".$ey;	
	//CALCULO ARMADURA MINIMA
	
	$Asm=0.8*(pow($fc*10,0.5))*$bw*$d/(4*$fy*10);
		//echo "<p>Asmin=".$Asm;
	if($Asm<=14*$bw*$d/($fy*10)){
		$Asm=14*$bw*$d/($fy*10);
		//echo "<p>Asmin refe=".$Asm;
	}else{
		//$Asm=$Asm;
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
    $clim=(3/7)*$d;
    $alim=$B1*$clim;
    echo "<p>alim=".$alim;
    //calculo de Mlim
    if($alim<=$hf){
        $Mlim= 0.85*$fc*$alim*$b*($d-0.5*$alim)*10;
    }
    else{
        $Mlim=0.85*$fc*10*($hf*($b-$bw)*($d-($hf*0.5))+$bw*$alim*($d-($alim*0.5)));
    }
    echo "<p>Momento ultimo =".$Mu;
    echo "<p>Momento limite =".$Mlim;


    $etlim=0.004;
    $et=$etlim;
    echo "<p>etlim=".$etlim;
    //calculo de fient
    if($et<=$ey){
        $fii=0.65;
    }
    elseif($et>=0.005){
        $fii=0.9;
    }
    else{
        $fii=0.65+($et-$ey)*(0.25/(0.005-$ey));
    }
    $filim=$fii;  // se define fi limite
    //echo $fii. '<br>';

    $Mu=$Mu*100000; //lo transforma a kg*cm
    echo "<p>Momento ultimo =".$Mu;



    echo "<p>filim=".$filim;
    $Mnlim=$Mu/$filim;
    echo "<p>Mnlim=".$Mnlim;



    if($Mnlim<=$Mlim){
    $arm='simple';
    echo "<p>DEFINE DISENO VIGA SIMPLE";
    }
    else{
    $arm='doble';

    echo "<p>DEFINE DISENO VIGA DOBLE";
    }


    //DISENO PARA VIGAS CON ARMADURA SIMPLE
    if($arm=='simple'){
        $Asc=0;
        $a=$hf;
        $et=0.003*(($B1*$d)-$a)/$a;

            //calculo fii

        if($et<=$ey){
            $fii=0.65;
        }
        elseif($et>=0.005){
            $fii=0.9;
        }
        else{
            $fii=0.65+($et-$ey)*(0.25/(0.005-$ey));
        }

        $Mn=$Mu/$fii;
        $As=$Mn/($fy*10*($d-0.5*$a));
        $as=$As*$fy*10/(0.85*$fc*10*$b);

        if($as<=$hf){
            $diseno='viga rect';
            echo "<p>ESTAMOS DEFINIENDO VIGA RES SIMPLE";
        }
        else{
            $diseno='viga T';
            echo "<p>DEFINE VIGA T SIMPLE";
        }

    }
    else{}
		
	echo "<p>armadura=".$arm;
		

    if($diseno=='viga rect'){
        //require ('vigas rect.php');

		echo "<p>ESTAMOS EN VIGAS RECT DISENO VIGA SIMPLE";
		
        do{
            $i=1;
            $i=$i+1;
    		//$et=$eti;
			echo "<p>fii=".$fii. '<br>';
            $fient=$fii;
				
            $Mn=$Mu/$fient;

				
            echo "<p>Mni=".$Mn. '<br>';
            echo "<p>fient=".$fient. '<br>';
    		//echo $Mn. '<br>';

	    	//echo'Se desprecia la armadura de compresion para el dise�o';

    		//$u= pow((1-(2*$Mn)/(0.85*$fc*10*$b*$d*$d)), 0.5);

            $a=$d-$d*pow(1-(2*$Mn/(0.85*$fc*10*$b*$d*$d)),0.5);
    		echo $a. '<br>';
            $et=0.003*(($B1*$d)-$a)/($a);

    		//calculo de fii
            echo $et.'<='.$ey.'<br>';
            if($et<=$ey){
                $fii=0.65;
            }
            else if($et>=0.005){
                $fii=0.9;
            }
            else{
                $fii=0.65+($et-$ey)*(0.25/(0.005-$ey));
            }
            //echo $fii. '<br>';
			
            echo '->'.$fient.'-'.$fii.')>0.0001<br>';
            echo '->'.$et.'-'.$et.')>0.0001<br>';
				
			$Asc=0;
			$As=(0.85*$fc*$b*$a)/$fy; //ac� calcula As para viga simple
			$cuantsc=$Asc/($b*$d);
			$fsc=0;
			echo "<p>As viga rec=".$As;
			echo "<p>a viga rec =".$a;			
        }
			
        while(abs($fient-$fii)>0.0001);

		
    }
    else{}
		
    echo "<p>Diseno=".$diseno;
		
    if($diseno=='viga T'){
		$a=$hf;
		echo "<p>ESTAMOS EN VIGAS RECT DISENO VIGA T";
		do{
    		$aent=$a;
	    	$et=0.003*(($B1*$d)-$aent)/$aent;
		    //calculo fii
		
		    if($et<=$ey){
		        $fii=0.65;
	        }
            elseif($et>=0.005){
                $fii=0.9;
            }
            else{
                $fii=0.65+($et-$ey)*(0.25/(0.005-$ey));
            }

		    $Mn=$Mu/$fii;
		
    		$As1=0.85*$fc*($b-$bw)*$hf/$fy;
    		$Mn1= $As1*$fy*10*($d-0.5*$hf);
    		$Mn2=$Mn-$Mn1;
		
	    	$As2=$Mn2/($fy*10*($d-0.5*$aent));
		
		    $a=$As2*$fy/(0.85*$fc*$bw);
		
		}
		
		while(abs($aent-$a)>0.001);
		
		$As= $As1+$As2;
		
    }
    else{}

    //echo "<p>as=".$as;
    echo "<p>armad=".$arm;

    if($arm=='doble'){
        echo "<p>ESTAMOS EN ARMADURA DOBLE";

		$a=$alim;
		$c=$clim;
		$fs=0.003*$Es*($c-$dr)/$c;
		
        if($fs<=$fy){
		 	//$fs=$fs;
        }
        else{
			$fs=$fy;
        }

		$Asc=($Mnlim-$Mlim)/($fs*10*($d-$dr));
		
        if($alim<=$hf){
			$As1=0.85*$fc*$b*$a/$fy;
        }
        else{
			$As1=0.85*$fc*($hf*($b-$bw)+$a*$bw)/$fy;
        }
			
		$As=$As1+$Asc;
		
    }
    else{}

    //echo "<p>Mn-Mlim=".($Mnlim-$Mlim);
    echo "<p>As1=".$As1;
    echo "<p>As2=".$Asc;
    echo "<p>asluis=".$as;
    echo "<p>a=".$a;
    echo "<p>As=".$As;
		
    echo "<p>As'=".$Asc;
?>
</body>


</body>
</html>


 
</body>
</html>
