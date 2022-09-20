<html>
<head> 
	<title>CALISAN GIRISI</title>
</head>
<body style="">
	<center>
		<form action="" method="POST">
			
			<b>GIRIS</b>
		
			<table border="1" text-align:center>
				<tr>
					<td>
						Kullanýcý Adý : 
					</td>
					<td>
						<input type="text" name="gsicil_nocal">
					</td>
				</tr>
				<tr>
					<td>
						Sifre : 
					</td>
					<td> 
						<input type="password" name="gsifre">
					</td>
				</tr>
				<tr>
					
					<td> 
						<input type="submit" name="kayit" value="Giris">
					</td>
				</tr>
			</table>
			
		</form>
</body>
</html>
 
<?php
session_start(); 

if ((!empty($_POST["gsicil_nocal"])) && (!empty($_POST["gsifre"])))
{
	$baglanti= mysql_connect("localhost","root","");
   	mysql_select_db("veritabani");
	
	$mykullanicical=$_POST["gsicil_nocal"];
	$mysifre=$_POST["gsifre"];
	$sql="	select  sifre
			from	kullanici
			where	tc_no='".$mykullanicical."' and rutbe='calisan'";
	$mysonuc=mysql_query($sql,$baglanti);

	if(mysql_num_rows($mysonuc))
	{
		$mysatir=mysql_fetch_row($mysonuc);
		
		if($mysatir[0]==$mysifre)
		{
			$_SESSION["gsicil_nocal"]=$mykullanicical;
			header("Location:CALISAN.php");
		}
		else
		{
			echo "Hatali sifre.";
		}
	}		
	else
	{
	    echo "KullaniciBulunamadi.";
	}
}
?>