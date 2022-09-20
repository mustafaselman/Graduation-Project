<html>
<head> 
	<title>SYS ADMIN GIRISI</title>
</head>
<body style="#FFFFFF">
	<center>
		<form action="" method="POST">
			
			
			<table border="1">
				<tr>
					<td>
						Kullanýcý Adý : 
					</td>
					<td>
						<input type="text" name="gsicil_nosys">
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

if ((!empty($_POST["gsicil_nosys"])) && (!empty($_POST["gsifre"])))
{
	$baglanti= mysql_connect("localhost","root","");
   	mysql_select_db("veritabani");
	
	$mykullanicisys=$_POST["gsicil_nosys"];
	$mysifre=$_POST["gsifre"];
	$sql="	select  sifre
			from	sys_admin
			where	tc_no='".$mykullanicisys. "'";
	$mysonuc=mysql_query($sql,$baglanti);

	if(mysql_num_rows($mysonuc))
	{
		$mysatir=mysql_fetch_row($mysonuc);
		
		if($mysatir[0]==$mysifre)
		{
			$_SESSION["gsicil_nosys"]=$mykullanicisys;
			header("Location:SYS.html");
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