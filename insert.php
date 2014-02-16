<?php	
	require_once("db_connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php

$sql_query="SELECT Date_Time_id,Imerominia_id, Time_id FROM schedule2";
$result=@mysql_query($sql_query);
if (!$result) die("Couldn't run query". mysql_error());


$rows=5840; 
$DateTime=0;
$Imerominia=1;
$Time=0;
$y=16;
for ($k=1;k<=$rows;$k++) 
{	
	$DateTime++; 
	$Time++; 
	if ($DateTime>$y) { 
		$Imerominia=$Imerominia+1;
		$y=$y+16; 
		$Time=1; 
	}

	


$sql_query="INSERT INTO schedule2 (Date_Time_id,Imerominia_id,Time_id) VALUES ($DateTime,$Imerominia,$Time)";
$result=@mysql_query($sql_query);
if (!$result) die("Couldn't run query". mysql_error());

echo $imerominia,$k;


}


?>
</body>
</html>
