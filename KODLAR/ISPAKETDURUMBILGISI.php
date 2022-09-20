<?php
session_start(); 
//$mykullanici=$_SESSION["gsicil_no"]; 
$mykullaniciis=$_SESSION["gsicil_nois"]; 

	$baglanti= mysql_connect("localhost","root","");
   	mysql_select_db("veritabani");
        ?>
<html>
<head> 
	<title>ÝS PAKETÝ DURUM BÝLGÝSÝ</title>
</head>
<body style="#FFFFFF">
	<center>
		<form action="" method="POST">
			
			
			<table border="1">
				
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
                                                                              where	ispaket_lid='".$mykullaniciis."'");
                                                        $mysatir2=mysql_fetch_array($mysonuc2);
                                                        
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
                                                            
                                                            $isim3=mysql_query("  select    *
                                                                              from	kullanici
                                                                              where	tc_no='".$mysatir3['aktivite_cal']."'");
                                                            $myname3=mysql_fetch_array($isim3);
                                                        
                                                            echo "<td>".$mysatir3['aktivite_cal']."-".$myname3['ad']." ".$myname3['soyad']."</td>" ;
                                                            
                                                            echo "</tr>";
                                                        }
                                                        
                                                        ?>
                               
				
			</table>
		
		</form>

</body>
</html>
 