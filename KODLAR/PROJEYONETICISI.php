<?php
session_start();
$mykullanici=$_SESSION["gsicil_no"];

	$baglanti= mysql_connect("localhost","root","");
   	mysql_select_db("veritabani");
	
      $sql=mysql_query("select  proje_ismi
			from	proje
			where	proje_yon='".$mykullanici."'");
        
        $mysatir=mysql_fetch_array($sql);
        $mywork=$mysatir['proje_ismi'];
       
        
	
?>

<html>
<head>
	<title>PROJE YONETICISI</title>
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
								<li><a href="PROJEYONETICISIAT.php" title="giris">IS PAKETI VE LIDERI ATAMA</a></li>
								<li><a href="PROJEDURUMBILGISI.php" title="giris">PROJE DURUM BILGISI</a></li>
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