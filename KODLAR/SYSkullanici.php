<html>
<head>
	<title>KULLANICI KAYIT</title> 
</head>
<body style=" background: #FFFFFF">
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
						TC No :
					</td>
					<td>
						<input type="text" name="ktc">
					</td>
				</tr>
				<tr>
					<td>
						Ad :
					</td>
					<td>
						<input type="text" name="kad">
					</td>
				</tr>
				<tr>
					<td>
						Soyad : 
					</td>
					<td> 
						<input type="text" name="ksoyad">
					</td>
				</tr>
                                <tr>
					<td>
						Sifre : 
					</td>
					<td> 
						<input type="password" name="ksifre">
					</td>
				</tr>
				<tr>
					<td>
						Sifre tekrar : 
					</td>
					<td> 
						<input type="password" name="ksifretekrar">
					</td>
				</tr>
				<tr>
					<td>
						Yonetim Kademesi
					</td>
					<td>
						<select name = "ksinif"> 
							<option>   </option>
							<option> PO Yoneticisi </option>
							<option> Proje Yoneticisi </option>
							<option> Is Paketi Lideri </option>
							<option> Calisan </option>
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
 
<?php
if(isset($_POST) && ( !empty($_POST["ktc"])|| !empty($_POST["kad"])|| !empty($_POST["ksoyad"])|| !empty($_POST["ksifre"])|| !empty($_POST["ksifretekrar"])|| !empty($_POST["ksinif"])))
{
    mysql_connect("localhost","root","");
    mysql_select_db("veritabani");
	
    $tc_no=$_POST["ktc"];
	$ad=$_POST["kad"];
    $soyad=$_POST["ksoyad"];
    $rutbe=$_POST["ksinif"];
	$sifre=$_POST["ksifre"];
	$sifretekrar=$_POST["ksifretekrar"];
	
 
	if(!empty($ad) && !empty($soyad) && !empty($tc_no) && !empty($sifre)&& !empty($rutbe)&& !empty($sifretekrar))
	{
		if($sifre==$sifretekrar)
		{
			$sonuc=mysql_query("INSERT INTO `kullanici`(`tc_no`, `sifre`, `ad`, `soyad`, `rutbe`)
								VALUES('$tc_no','$sifre','$ad','$soyad','$rutbe')");
		
			if($sonuc)
				echo "<br>Kullanici Basariyla Veritabanina Kayit Edildi.<hr width='270' align='left'>";
		}
		else 
                {       echo "Kullanici Kayit Edilemedi.";
                        echo "Hatalý Þifre Tekrarý.";
                }
	}
	else 
        {echo "Kullanici Kayit Edilemedi.</br>";
        echo "Lutfen Bilgileri Dogru ve Tam Giriniz .";
        }
}

?>
