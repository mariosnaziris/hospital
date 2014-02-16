<?php	
	require_once("db_connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="iatrio.css" type="text/css">
<meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
<title>Σύνδεση</title>
<link rel="shortcut icon" href="images/favicon.ico" />
</head>



<body bgcolor="#6699FF" >

		<img src="images/logo.jpg" width="418" height="110" />

		<?php
			if (!( $database = mysql_connect("localhost","root",""))){

				die("Could not connect to database");

			}
			if (!mysql_select_db("clinic", $database)){

				die("Could not open Mailing List database");
			
			}
			if($_POST['type']=='Doctor'){
			
				$query = 'SELECT username, password FROM doctors WHERE username="'.$_POST['username'].'" AND password="'.$_POST['password'].'"';
			if(!($result=mysql_query($query,$database))){
				print("Could not execute query!<br/>");
				die(mysql_error());
			}
			$rows=mysql_num_rows($result);
			
			if($rows==0){
				header("Location: LoginFailed.html");
			}else{
				header("Location: iddoctor.html");
			}
			}
			else if($_POST['type']=='Patient'){

			$query = 'SELECT username, password FROM patients WHERE username="'.$_POST['username'].'" AND password="'.$_POST['password'].'"';
			if(!($result=mysql_query($query,$database))){
				print("Could not execute query!<br/>");
				die(mysql_error());
			}
			$rows=mysql_num_rows($result);
			
			if($rows==0){
				header("Location: LoginFailed.html");
			}else{
				header("Location: idpatient.html");
			}
			}
			else {
			$query = 'SELECT username, password FROM admin WHERE username="'.$_POST['username'].'" AND password="'.$_POST['password'].'"';
			if(!($result=mysql_query($query,$database))){
				print("Could not execute query!<br/>");
				die(mysql_error());
			}
			$rows=mysql_num_rows($result);
			
			if($rows==0){
				header("Location: LoginFailed.html");
			}else{
				header("Location: ArxikiAdmin.php");
			}
			}



		
		?>
</body>
</html>