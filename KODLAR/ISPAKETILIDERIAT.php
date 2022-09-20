<?php
session_start();
mysql_connect("localhost","root","");
mysql_select_db("veritabani");
//$mykullanici=$_SESSION["gsicil_no"];               
$mykullaniciis=$_SESSION["gsicil_nois"];                                                        
                                                
if(isset($_POST)&& !empty($_POST["calisan"])&& !empty($_POST["aktiviteadi"])&& !empty($_POST["aktivitebas"])&& !empty($_POST["aktivitebit"]))
{   


    $calisann=$_POST["calisan"];
    $aktivitead=$_POST["aktiviteadi"];
    $aktivitebass=$_POST["aktivitebas"];
    $aktivitebitt=$_POST["aktivitebit"];
        
    $aktivitebass1 = strtotime($aktivitebass);
    $aktivitebitt1 = strtotime($aktivitebitt);
   
    $farkak = ($aktivitebitt1-$aktivitebass1) / (3600*24) * 50 ; 
   
    
    
    
    $mysonuc2=mysql_query("select    *
                           from      is_paketi
                           where     ispaket_lid='".$mykullaniciis."'");
    $sorgu2=mysql_fetch_array($mysonuc2);
    
    $py = $sorgu2['proje_yont'];
    $pbas = $sorgu2['isbaslangic'];
    $pis = $sorgu2['ispaket_lid'];
    $pbit = $sorgu2['isbitis'];
    $pmal = $sorgu2['maliyetisp'];
    
    
    $mysonuc3=mysql_query("select    *
                           from      proje
                           where     proje_yon='".$py."'");
    
    $sorgu3=mysql_fetch_array($mysonuc3);
    
    $projebas = $sorgu3['pbaslangic'];
    $projebit = $sorgu3['pbitis'];
   
    
    
    $sorgu=mysql_query("INSERT INTO `aktivite`(`aktivite_ismi`,`aktivite_cal`,`ispaket_lidr`,`proje_yontc`,`akbaslangic`,`akbitis`)
								VALUES('$aktivitead','$calisann','$mykullaniciis','$py','$aktivitebass','$aktivitebitt')");

    
    mysql_query("UPDATE aktivite SET maliyet='$farkak' WHERE aktivite_cal='$calisann'");
    
    
    if($aktivitebass<$pbas || $pbas=='0000-00-00')
    mysql_query("UPDATE is_paketi SET isbaslangic='$aktivitebass' WHERE ispaket_lid=$pis");
    
    if($aktivitebitt>$pbit)
    mysql_query("UPDATE is_paketi SET isbitis='$aktivitebitt' WHERE ispaket_lid=$pis");

    $sql=mysql_query("select    maliyet
			from	aktivite
			where	ispaket_lidr='".$pis."'");
    $mysatirr=0;
        while($mysatir=mysql_fetch_array($sql))
        {
            $mysatirr+=$mysatir['maliyet']; 
        }
    mysql_query("UPDATE is_paketi SET maliyetisp='$mysatirr' WHERE ispaket_lid='$pis'");
    
    mysql_connect("localhost","root","");
    mysql_select_db("veritabani");
    
    $mysonuc2=mysql_query("select    *
                           from      is_paketi
                           where     ispaket_lid='".$mykullaniciis."'");
    $sorgu2=mysql_fetch_array($mysonuc2);
    
    $py = $sorgu2['proje_yont'];
    $pbas = $sorgu2['isbaslangic'];
    $pis = $sorgu2['ispaket_lid'];
    $pbit = $sorgu2['isbitis'];
    $pmal = $sorgu2['maliyetisp'];
    
    $mysonuc3=mysql_query("select    *
                           from      proje
                           where     proje_yon='".$py."'");
    
    $sorgu3=mysql_fetch_array($mysonuc3);
    
    $projebas = $sorgu3['pbaslangic'];
    $projebit = $sorgu3['pbitis'];
    
    if($pbas<$projebas || $projebas=='0000-00-00')
    mysql_query("UPDATE proje SET pbaslangic='$pbas' WHERE proje_yon=$py");
    
    if($pbit>$projebit)
    mysql_query("UPDATE proje SET pbitis='$pbit' WHERE proje_yon=$py");
        
    $sql2=mysql_query("select    maliyetisp
			from	is_paketi
			where	proje_yont='".$py."'");
    $mysatirr2=0;
        while($mysatir2=mysql_fetch_array($sql2))
        {
            $mysatirr2+=$mysatir2['maliyetisp']; 
        }
    mysql_query("UPDATE proje SET BAC='$mysatirr2' WHERE proje_yon='$py' ");
    
    if($sorgu)
        echo "<br>Aktivite ve Calýsan Basarýyla Atandý.<hr width='270' align='left'>";
    else 
        { 
        echo "Kullanici Kayit Edilemedi.</br>";
	echo "Bilgileri tekrar giriniz";
        }
}

        ?>

<html>
<head>
	<title>AKTIVITE VE CALISAN ATAMA</title> 
</head>
<body style=" ">
	<center>
		<form action="" method="POST">
			<div Style="width:800px; height:100px; text-align:center;">
				
				<h3>
					YENI KAYIT
				</h3>
			</div>
			<table border="1">
				
				
				<tr>
					<td>
						Aktivite Adý :
					</td>
					<td>
						<input type="text" name="aktiviteadi">
					</td>
				</tr>
                                <tr>
					<td>
						Aktivite Baslangic :
					</td>
					<td>
						<input type="date" name="aktivitebas">
					</td>
				</tr>
                                <tr>
					<td>
						Aktivite Bitis :
					</td>
					<td>
						<input type="date" name="aktivitebit">
					</td>
				</tr>
				<tr>
					<td>
						Aktivite Çalýþaný Ata :
					</td>
					<td>
						<?php
                                                $sorgu2 = mysql_query( "SELECT tc_no FROM kullanici WHERE rutbe='Calisan'" );
                                                echo "<select name = 'calisan'>"; 
						echo"<option>   </option>";
                                                while( $row = mysql_fetch_array( $sorgu2 ) )
                                                {
                                                    echo "<option> ".$row['tc_no']." </option>";   
                                                }        
                       
                             
                                  ?>
					</td>
				</tr>
				
				<tr>
					<td>

						<input type="submit" name="kayit" value="Ata">
                                                <input type="button" name="geri" value="Geri" onClick="window.location.href='http://localhost/ISPAKETILIDERI.php'">
					</td>
                                       
				</tr>
				
				
				
			</table>
			
			
		</form>
	</center>
</body>
</html>
 
