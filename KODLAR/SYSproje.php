<?php
mysql_connect("localhost","root","");
mysql_select_db("veritabani");

                        
                                                        
                                                
if(isset($_POST)&& !empty($_POST["projead"])&& !empty($_POST["projeyon"]))
{   


    $ad=$_POST["projead"];
    $yonetici=$_POST["projeyon"];
    //$projebass=$_POST["projebas"];
    //$projebitt=$_POST["projebit"];
        
		$sorgu=mysql_query("INSERT INTO `proje`(`proje_ismi`,`proje_yon`)
								VALUES('$ad','$yonetici')");
                       
    if($sorgu)
		
        echo "<br>Proje ve Proje Yöneticisi Basarý Ile Veritabanina Kayit Edildi.<hr width='270' align='left'>";
                       
    else 
        {
        echo "Proje ve Proje Yöneticisi Kayit Edilemedi.</br>";
	echo "Bilgileri tekrar giriniz";
        }
}

        ?>

<html>
<head>
	<title>PROJE KAYIT</title> 
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
						Proje Adý :
					</td>
					<td>
						<input type="text" name="projead">
					</td>
				</tr>
                                <!--
                                <tr>
					<td>
						Proje Baslangic :
					</td>
					<td>
						<input type="date" name="projebas">
					</td>
				</tr>
                                <tr>
					<td>
						Proje Bitis :
					</td>
					<td>
						<input type="date" name="projebit">
					</td>
				</tr>
				-->
				<tr>
					<td>
						Proje Yönetici Tc No
					</td>
					
                                        <td>
						
                                                <?php
                                                $sorgu2 = mysql_query( "SELECT tc_no FROM kullanici WHERE rutbe='Proje Yoneticisi'" );
                                                echo "<select name = 'projeyon'>"; 
						echo"<option>   </option>";
                                                while( $row = mysql_fetch_array( $sorgu2 ) )
                                                {
                                                    echo "<option> ".$row['tc_no']." </option>";   
                                                }        
                       
                             
                                  ?>
						</select>
					</td>
                                        <td>
						<input type="submit" name="kayit" value="Kayit">
                                                <input type="button" name="geri" value="Geri" onClick="window.location.href='http://localhost/SYS.html'">

					</td>
                                       
				</tr>
				
				
				
			</table>
			
			
		</form>
	</center>
</body>
</html>
 
