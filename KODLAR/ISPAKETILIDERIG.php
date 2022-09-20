<html>
<head> 
	<title>IS PAKETI LIDERI GIRISI</title>
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
						<input type="text" name="gsicil_nois">
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

if ((!empty($_POST["gsicil_nois"])) && (!empty($_POST["gsifre"])))
{
	$baglanti= mysql_connect("localhost","root","");
   	mysql_select_db("veritabani");
	
	$mykullaniciis=$_POST["gsicil_nois"];
	$mysifre=$_POST["gsifre"];
	$sql="	select  sifre
			from	kullanici
			where	tc_no='".$mykullaniciis. "' and rutbe='Is Paketi Lideri'";
	$mysonuc=mysql_query($sql,$baglanti);

	if(mysql_num_rows($mysonuc))
	{
		$mysatir=mysql_fetch_row($mysonuc);
		
		if($mysatir[0]==$mysifre)
		{
			$_SESSION["gsicil_nois"]=$mykullaniciis;
			header("Location:ISPAKETILIDERI.php");
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