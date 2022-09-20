<?php
session_start();
$mykullanicical=$_SESSION["gsicil_nocal"];

	$baglanti= mysql_connect("localhost","root","");
   	mysql_select_db("veritabani");
	
      $sql=mysql_query("select  aktivite_ismi
			from	aktivite
			where	aktivite_cal='".$mykullanicical."'");
        
        $mysatir=mysql_fetch_array($sql);
        $mywork=$mysatir['aktivite_ismi'];
       
        
	
?>


<html>
<head>
	<title>CALISAN</title>
</head>
<body style="" >
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
								
								<li><a href="AKTIVITEDURUMBILGISI.php" title="giris">AKTIVITE GUNCELLE</a></li>
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