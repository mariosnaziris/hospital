<?php	
	require_once("db_connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Έλεγχος Κωδικού Ιατρού</title>
</head>

<body>
<?php

			if (!( $database = mysql_connect("localhost","root",""))){

				die("Could not connect to database");

			}

			if (!mysql_select_db("clinic", $database)){

				die("Could not open Mailing List database");
			
			}
			
			
			
				$query = 'SELECT Doctor_id FROM doctors WHERE doctor_id="'.$_POST['doctor_id'].'"';
				
			if(!($result=mysql_query($query,$database))){
				print("Could not execute query!<br/>");
				die(mysql_error());
			}
			$rows=mysql_num_rows($result);
			
			if($rows==0){
				header("Location: Failedid.html");
				}
			else{
				header("Location: ArxikiDoctor.php?id=".$_POST['doctor_id']);
			}
			
?>
</body>
</html>