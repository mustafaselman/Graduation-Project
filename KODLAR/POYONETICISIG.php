<?php
session_start();
mysql_connect("localhost","root","");
mysql_select_db("veritabani");
                                                    
                                                
if(isset($_POST)&& !empty($_POST["gsicil_no"]))
{   
    $mykullanici2=$_POST["gsicil_no"];

    $mysonuc2=mysql_query("select    proje_yon
                           from	     proje
                           ");
    
    

    while($a=mysql_fetch_array($mysonuc2)){
        if(stristr($mykullanici2,$a['proje_yon'])){
            $mykullanici= $a['proje_yon'];
            
        }
    }
            
    $_SESSION["gsicil_no"]=$mykullanici;
    
    header("Location:PROJEDURUMBILGISI.php");
    
}

        ?>



<html>
<head>
	<title>PROJE SEC</title> 
</head>
<body style=" background #FFFFFF">
	<center>
		<form action="" method="POST">
			<div Style="width:800px; height:100px; text-align:center;">
				
				<h3>
					PO YONETICI BOLUMU
				</h3>
			</div>
			<table border="1">
				
				
				
				
				<tr>
					<td>
						Yönetici Seç
					</td>
					
						<td>
						<?php
                                                
                                                $sorgu2 = mysql_query( "SELECT proje_yon FROM proje" );
                                                echo "<select name = 'gsicil_no'>"; 
						echo"<option>   </option>";
                                                while( $row = mysql_fetch_array( $sorgu2 ) )
                                                {
                                                    
                                                        $isim=mysql_query("   select    *
                                                                              from	kullanici
                                                                              where	tc_no='".$row['proje_yon']."'");
                                                        $myname=mysql_fetch_array($isim);
                                                    
                                                    echo "<option> ".$row['proje_yon']."-".$myname['ad']." ".$myname['soyad']." </option>";   
                                                }        
                       
                                                
                                                ?>
					</td>
					
				</tr>
				<tr>
					
					<td> 
						<input type="submit" name="goruntule" value="Goruntule">
                                                <input type="button" name="geri" value="Cýkýs" onClick="window.location.href='http://localhost/'">
							
							
					</td>
				</tr>
				
				
				
			</table>
			
			
		</form>
	</center>
</body>
</html>
 
