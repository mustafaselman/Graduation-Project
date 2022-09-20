<?php
session_start();
mysql_connect("localhost","root","");
mysql_select_db("veritabani");
$mykullanici=$_SESSION["gsicil_no"];               
                                                        
                                                
if(isset($_POST)&& !empty($_POST["ispaketilideri"])&& !empty($_POST["ispaketadi"]))
{   


    $ispaketlid=$_POST["ispaketilideri"];
    $ispaketad=$_POST["ispaketadi"];
    //$ispaketbass=$_POST["ispaketbas"];
    //$ispaketbitt=$_POST["ispaketbit"];
        
            
    $sorgu=mysql_query("INSERT INTO `is_paketi`(`ispaket_ismi`,`ispaket_lid`,`proje_yont`)
								VALUES('$ispaketad','$ispaketlid','$mykullanici')");		
				
        
    if($sorgu)
        echo "<br>Ýs Paketi Ve Lideri Basarýyla Atandý.<hr width='270' align='left'>";
    else 
        { 
        echo "Kullanici Kayit Edilemedi.</br>";
	echo "Bilgileri tekrar giriniz";
        }
}

        ?>

<html>
<head>
	<title>IS PAKETI VE LIDERI ATAMA</title> 
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
						Is Paketi Adý :
					</td>
					<td>
						<input type="text" name="ispaketadi">
					</td>
				</tr>
                                <!--
                                <tr>
					<td>
						Is Paketi Baslangic :
					</td>
					<td>
						<input type="date" name="ispaketbas">
					</td>
				</tr>
                                <tr>
					<td>
						Is Paketi Bitis :
					</td>
					<td>
						<input type="date" name="ispaketbit">
					</td>
				</tr>
                                -->
				<tr>
					<td>
						Ýþ Paketi Lideri Ata :
					</td>
					<td>
						<?php
                                                $sorgu2 = mysql_query( "SELECT tc_no FROM kullanici WHERE rutbe='Is Paketi Lideri'" );
                                                echo "<select name = 'ispaketilideri'>"; 
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
                                                <input type="button" name="geri" value="Geri" onClick="window.location.href='http://localhost/PROJEYONETICISI.php'">
					</td>
                                       
				</tr>
				
				
				
			</table>
			
			
		</form>
	</center>
</body>
</html>
 
