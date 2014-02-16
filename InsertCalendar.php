<?php	
	require_once("db_connect.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="iatrio.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Τοποθετήση Ημερολόγιο Ιατρού</title>
<link rel="shortcut icon" href="images/favicon.ico" />
</head>

<body bgcolor="#6699FF" >

          <img src="images/logo.jpg" width="418" height="110" />
          
<div class="menuback">
  <h4> Μενού</h4>
<div class="firstalldoc">
            <li class="first"><a href="ArxikiDoctor.php?id=<?php echo $_GET['id']; ?>">Αρχική</a></li>
            <li class="first"><a href="Rantevou.php?id=<?php echo $_GET['id']; ?>">Ραντεβού Ημέρας</a></li>
            <li class="first"><a href="Rantevoumina.php?id=<?php echo $_GET['id']; ?>">Ραντεβού Μήνα</a></li>
	    	<li class="first"><a href="Calendar.php?id=<?php echo $_GET['id']; ?>">Ημερολόγιο</a></li>
            <li class="first"><a href="Calendaredit.php?id=<?php echo $_GET['id']; ?>">Διαμόρφωση Ημερολογίου</a></li>
            <li class="first"><a href="RantevouSearchsite.php?id=<?php echo $_GET['id']; ?>">Αναζήτηση Ραντεβού</a></li>
        	
</div>
</div>
          
<div id="site"> 
<div id="date">
<?php
$today = date("d-m-Y");       
echo $today;
?>
</div>
<br/><br/><br/><br/>
<?php 
			if (!( $database = mysql_connect("localhost","root",""))){

				die("Could not connect to database");

			}

			if (!mysql_select_db("clinic", $database)){

				die("Could not open Mailing List database");
			
			}
			$sql='INSERT INTO availability VALUES ('.$_POST['value'].','.$_GET['id'].','.$_POST['Reason'].')';
			$result=@mysql_query($sql);
			echo $sql;
			if (!$result) die("Couldn't run query". mysql_error());

			$clinic = mysql_query($sql) or die(mysql_error());
			$row_clinic = mysql_fetch_assoc($clinic);
?>
</div>
</body>
</html>
