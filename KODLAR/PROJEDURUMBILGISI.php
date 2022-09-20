<?php
session_start(); 
$mykullanici=$_SESSION["gsicil_no"];  
//$mykullaniciis=$_SESSION["gsicil_nois"]; 

	$baglanti= mysql_connect("localhost","root","");
   	mysql_select_db("veritabani");
        ?>
<html>
<head> 
	<title>PROJE DURUM BILGISI</title>
</head>
<body style="#FFFFFF">
	<center>
		<form action="" method="POST">
			
			
			<table border="1">
				<tr>
					<td>
						PROJE ADI
                                                
					</td>
                                        <td>
						BASLANGIC
					</td>
                                        <td>
						BÝTÝS
					</td>
                                        <td>
						TAMAMLAMA YUZDESI
					</td>
                                        
                                        <td>
						SORUMLU
					</td>
					
				</tr>
                                <tr>
					<td>
                                                <?php
                                                        $mysonuc=mysql_query("select    *
                                                                              from	proje
                                                                              where	proje_yon='".$mykullanici."'");
                                                        $mysatir=mysql_fetch_array($mysonuc);
                                                        echo $mysatir['proje_ismi'] ;
                                                        ?>
					</td>
                                        <td>
						<?php
                                                     
                                                        echo $mysatir['pbaslangic'] ;
                                                        ?>
					</td>
                                        <td>
						<?php
                                                        
                                                        echo $mysatir['pbitis'] ;
                                                        ?>
					</td>
                                        <td>
						<?php
                                                        
                                                        echo $mysatir['tamamlanmayuz'] ;
                                                        ?>
					</td>
                                        
                                        <td>
						<?php
                                                        $isim=mysql_query("   select    *
                                                                              from	kullanici
                                                                              where	tc_no='".$mysatir['proje_yon']."'");
                                                        $myname=mysql_fetch_array($isim);
                                                        
                                                        
                                                        echo $mysatir['proje_yon']."-".$myname['ad']." ".$myname['soyad'] ;
                                                        ?>
					</td>
					
				</tr>
                                <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
                                <tr>
                                    <td>
						IS PAKET/AKTV ADI
                                                
					</td>
                                        <td>
						BASLANGIC
					</td>
                                        <td>
						BÝTÝS
					</td>
                                        <td>
						TAMAMLAMA YUZDESI
					</td>
                                        
                                        <td>
						SORUMLU
					</td>
                                </tr>
                                
                                                <?php
                                                        $mysonuc2=mysql_query("select    *
                                                                              from	is_paketi
                                                                              where	proje_yont='".$mykullanici."'");
                                                        
                                                        
                                                        while($mysatir2=mysql_fetch_array($mysonuc2))
                                                        {
                                                        echo"<tr>";
                                                        echo "<td>"."<b>".$mysatir2['ispaket_ismi']."</b>"."</td>" ;
                                                        echo "<td>".$mysatir2['isbaslangic']."</td>" ;
                                                        echo "<td>".$mysatir2['isbitis']."</td>" ;
                                                        
                                                        echo "<td>".$mysatir2['tamamlanmayuzis']."</td>" ;
                                                        
                                                        
                                                        
                                                        $isim2=mysql_query("  select    *
                                                                              from	kullanici
                                                                              where	tc_no='".$mysatir2['ispaket_lid']."'");
                                                        $myname2=mysql_fetch_array($isim2);
                                                        
                                                        echo "<td>".$mysatir2['ispaket_lid']."-".$myname2['ad']." ".$myname2['soyad']."</td>" ;
                                                        echo"</tr>";
                                                        
                                                        $mysonuc3=mysql_query("select  *
                                                                              from	aktivite
                                                                              where	ispaket_lidr='".$mysatir2['ispaket_lid']."'");
                                                        while($mysatir3=mysql_fetch_array($mysonuc3))
                                                        {
                                                            echo "<tr>";
                                                            echo "<td>".$mysatir3['aktivite_ismi']."</td>" ;
                                                            echo "<td>".$mysatir3['akbaslangic']."</td>" ;
                                                            echo "<td>".$mysatir3['akbitis']."</td>" ;
                                                        
                                                            echo "<td>".$mysatir3['tamamlanmayuzcal']."</td>" ;
                                                            
                                                            
                                                            
                                                            
                                                            //echo "<td>".number_format($planyuzde,0)."</td>" ;
                                                            
                                                            $isim3=mysql_query("  select    *
                                                                              from	kullanici
                                                                              where	tc_no='".$mysatir3['aktivite_cal']."'");
                                                            $myname3=mysql_fetch_array($isim3);
                                                        
                                                            echo "<td>".$mysatir3['aktivite_cal']."-".$myname3['ad']." ".$myname3['soyad']."</td>" ;
                                                            
                                                            echo "</tr>";
                                                        }
                                                        }
                                                        
                                                        ////////////////////
                                                            $mysonuc4=mysql_query("select    *
                                                                                   from      aktivite
                                                                                   where     proje_yontc='".$mykullanici."'");
                                                        
                                                            $b=0;
                                                            $c=0;
                                                            while($mysatir4=mysql_fetch_array($mysonuc4))
                                                                {
                                                            
                                                            $aktivitebass1 = strtotime($mysatir4['akbaslangic']);
                                                            $aktivitebitt1 = strtotime($mysatir4['akbitis']);
                                                            $date = strtotime(date('Y-m-d'));
      
                                                            $farkak = ($aktivitebitt1-$aktivitebass1) / (3600*24) ;  
                                                            $farkaknow = ($date-$aktivitebass1) / (3600*24)  ;
                                                            if($farkaknow>0)
                                                                if($aktivitebitt1<$date)
                                                                    $farkaknow=$farkak;
                                                            $c+=$farkaknow;
                                                            $b+=$farkak;
                                                             }
                                                            
                                                            $planyuzdeproje=($c/$b)*100;
                                                            
                                                            $mysonuc5=mysql_query("select    BAC
                                                                                   from      proje
                                                                                   where     proje_yon='".$mykullanici."'");
                                                            
                                                            $mysatir5=mysql_fetch_array($mysonuc5);
                                                            $PV= ($mysatir5['BAC']*$planyuzdeproje)/100;
                                                                    
                                                            ///////////////////////////PV=BAC* PLANYUZDEPROJE
                                                            
                                                            $EV= ($mysatir5['BAC']*$mysatir['tamamlanmayuz'])/100;
                                                            
                                                            ////////////////////////// EV= BAC * TAMAMLANMAYUZ
                                                            
                                                            $mysonuc6=mysql_query("select    *
                                                                                   from      aktivite
                                                                                   where     proje_yontc='".$mykullanici."'");
                                                        
                                                            $b=0;
                                                            $c=0;
                                                            while($mysatir6=mysql_fetch_array($mysonuc6))
                                                                {
                                                            
                                                            $aktivitebass1 = strtotime($mysatir6['akbaslangic']);
                                                            $aktivitebitt1 = strtotime($mysatir6['akbitis']);
                                                            $date = strtotime(date('Y-m-d'));
      
                                                            $farkak = ($aktivitebitt1-$aktivitebass1) / (3600*24) ;  
                                                            $farkaknow = ($date-$aktivitebass1) / (3600*24) ;
                                                            
                                                            if($farkaknow>0)
                                                                if($aktivitebitt1<$date)
                                                                    $farkaknow=$farkak;
                                                            $c+=$farkaknow;
                                                            //$b+=$farkak;
                                                            
                                                             }
                                                            
                                                            
                                                            $AC= $c*50;
                                                            
                                                            /////////////////////////////////////////////// AC=( ÞÝM-BAS ) * BÝRÝM MALÝYET
                                                            echo 'CPI='.number_format($EV/$AC,4).'   |    ' ;
                                                            echo 'SPI='.number_format($EV/$PV,4).'   |   ' ;
                                                            echo 'BAC='.$mysatir5['BAC'].'   |   ' ;
                                                            echo 'Planlanan Yuzde='.number_format($planyuzdeproje,0).'   |   ' ;
                                                            echo 'EV='.$EV.'   |   ';
                                                            echo 'PV='.$PV.'   |   ';
                                                            echo 'AC='.$AC;
                                                        ?>
                               
				
			</table>
		
		</form>

</body>
</html>
 