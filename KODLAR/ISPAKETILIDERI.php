<?php
session_start();
$mykullaniciis=$_SESSION["gsicil_nois"];

	$baglanti= mysql_connect("localhost","root","");
   	mysql_select_db("veritabani");
	
      $sql=mysql_query("select  ispaket_ismi
			from	is_paketi
			where	ispaket_lid='".$mykullaniciis."'");
        
        $mysatir=mysql_fetch_array($sql);
        $mywork=$mysatir['ispaket_ismi'];
       
        
	
?>


<html>
<head>
	<title>IS PAKETI LIDERI</title>
</head>
<body style=" background: #FFFFFF" >
	<center>	
		
		<div Style="width:950px; height:200px;  text-align: center; ">
			<center>
			<div Style="width:200px; height:200px;">
				<table border="1" width="200">
					<tr>
						<td align="center">
							<?php 
                                                        echo $mywork;
                                                        ?>
						</td>
					</tr>
					<tr>
						<td>
							<ul>
								<li><a href="ISPAKETILIDERIAT.php" title="giris">AKTIVITE VE CALISAN ATAMA</a></li>
								<li><a href="ISPAKETDURUMBILGISI.php" title="giris">IS PAKETI DURUM BILGISI</a></li>
							</ul>
                                                        <ul>
								<li><a href="index.html" title="giris">Cýkýs</a></li>
							</ul>
						</td>
					</tr>
				</table>			
			</div>
			</center>
		</div>
	</center>
</body>
</html>