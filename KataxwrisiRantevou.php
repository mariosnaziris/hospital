<?php	
	require_once("db_connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Φόρμα Εγγραφή Ιατρού</title>
</head>

<body>
<?php
			if (!( $database = mysql_connect("localhost","root",""))){

				die("Could not connect to database");

			}

			if (!mysql_select_db("clinic", $database)){

				die("Could not open Mailing List database");
			
			}
			$sql='SELECT Doctor_id FROM doctors INNER JOIN specialty USING ( Doctor_id )WHERE Name_of_specialty="'.$_GET['idsp'].'"';
			$result=@mysql_query($sql);
			echo $sql;
			echo $_POST['value'];
			if (!$result) die("Couldn't run query". mysql_error());

			$clinic1 = mysql_query($sql) or die(mysql_error());
			$row_clinic1 = mysql_fetch_assoc($clinic1);
			echo $row_clinic1['Doctor_id'];
						
			$sql2='INSERT INTO appointment VALUES ('.$_POST['idp'].','.$row_clinic1['Doctor_id'].','.$value.')';
			$result =@mysql_query($sql2);
			echo $sql2;
						
			$query='INSERT INTO availability VALUES ('.$value.','.$row_clinic1['Doctor_id'].','."Appointment".')';
			$result2 =@mysql_query($query);
			echo $query;
				
			?>
</body>
</html>
