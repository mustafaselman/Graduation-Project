<?php

    session_start();
    mysql_connect("localhost","root","");
    mysql_select_db("veritabani");
    $mykullanicical=$_SESSION["gsicil_nocal"];               
   
?>
<html>
<head>
	<title>AKTIVITE GUNCELLEME</title> 
</head>
<body style=" background: #FFFFFF">
	<center>
		<form action="" method="POST">
			<div Style="width:800px; height:100px; text-align:center;">
				
				<h3>
					AKTIVITE GUNCELLEME
				</h3>
			</div>
			<table border="1">
				
				
				<tr>
					<td>
						Guncel Tamamlanma Yuzdesi % :
					</td>
                                        
					<td>
						<input type="text" name="guncel">
					</td>
				
                                        <td>
						<input type="submit" name="kayit" value="Güncelle">
                                                <input type="button" name="geri" value="Geri" onClick="window.location.href='http://localhost/CALISAN.php'">
					</td>
				</tr>
				
				
				
			</table>
			
			
		</form>
	</center>
</body>
</html>
 
<?php

    
if(isset($_POST) &&  !empty($_POST["guncel"]) )
{
    
	
    $guncely=$_POST["guncel"];
	
    $sonuc=mysql_query("UPDATE aktivite SET tamamlanmayuzcal=$guncely WHERE aktivite_cal=$mykullanicical");
								
		
		if($sonuc)
			echo "<br>Güncelleme Basarýyla Yapýldý<hr width='270' align='left'>";
		
		else 
                {       echo "Güncelleme Yapýlmadý";
                        
                }
	 
       
    $mysonuc=mysql_query("select     ispaket_lidr
                          from       aktivite
                          where      aktivite_cal='".$mykullanicical."'");
    $mysatir=mysql_fetch_array($mysonuc);
    $a=$mysatir['ispaket_lidr'];
                                                        
    $mysonuc2=mysql_query("select    *
                           from      aktivite
                           where     ispaket_lidr='".$a."'");
                                                        
    $b=0;
    $c=0;
    while($mysatir2=mysql_fetch_array($mysonuc2))
    {
      $aktivitebass1 = strtotime($mysatir2['akbaslangic']);
      $aktivitebitt1 = strtotime($mysatir2['akbitis']);
      
      
      $farkak = ($aktivitebitt1-$aktivitebass1) / (3600*24) ;                                                 
      $c+=($mysatir2['tamamlanmayuzcal']*$farkak) / 100 ;
      $b+=$farkak;
      
    }
                                                            
    $d=($c/$b)*100;
                                                            
    $sonuc2=mysql_query("UPDATE is_paketi SET tamamlanmayuzis=$d WHERE ispaket_lid=$a");
    
    
    $mysonuc3=mysql_query("select    proje_yontc
                          from       aktivite
                          where      aktivite_cal='".$mykullanicical."'");
    $mysatir3=mysql_fetch_array($mysonuc3);
    $a=$mysatir3['proje_yontc'];
                                                        
    $mysonuc4=mysql_query("select    *
                           from      aktivite
                           where     proje_yontc='".$a."'");
                                                        
    $b=0;
    $c=0;
    while($mysatir4=mysql_fetch_array($mysonuc4))
    {
                                                            
      $aktivitebass1 = strtotime($mysatir4['akbaslangic']);
      $aktivitebitt1 = strtotime($mysatir4['akbitis']);
      
      
      $farkak = ($aktivitebitt1-$aktivitebass1) / (3600*24)  ;                                                 
      $c+=($mysatir4['tamamlanmayuzcal']*$farkak) / 100 ;
      $b+=$farkak;
      
    }
                                                            
    $d=($c/$b)*100;
                                                            
    $sonuc3=mysql_query("UPDATE proje SET tamamlanmayuz=$d WHERE proje_yon=$a");
                                                            
}
 

?>
