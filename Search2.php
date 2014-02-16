<?php	
	require_once("db_connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="iatrio.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Αναζήτηση Ραντεβού</title>
<link rel="shortcut icon" href="images/favicon.ico" />

<style type="text/css">
<!--
.style1 {font-size: medium}
-->
</style>
</head>

<body bgcolor="#6699FF" >

          <img src="images/logo.jpg" width="418" height="110" />
          
<div class="menuback">
  <h4> Μενού</h4>
<div class="firstallboss">
            	<li class="first"><a href="ArxikiAdmin.php">Αρχική</a></li>
            	<li class="first"><a href="KataxwrisiDoctor.html">Καταχώρηση Ιατρού</a></li>
       		    <li class="first"><a href="DeleteDoctor.php">Διαγραφή Ιατρού</a></li>
            	<li class="first"><a href="Register.html">Καταχώρηση Ασθενή</a></li>
            	<li class="first"><a href="RantevouAdmin.php">Ραντεβού Ημέρας</a></li>
             	<li class="first"><a href="RantevouAdmin2.php">Ραντεβού Μήνα</a></li>
              	<li class="first"><a href="CalendarAdmin.php">Ημερολόγιο</a></li>
              	<li class="first"><a href="SearchAdmin.php">Διαμόρφωση Ημερολογίου</a></li>
                <li class="first"><a href="Search.php">Αναζήτηση Ραντεβού</a></li>              
</div>
</div>
<div id="site"> 



<div id="date">
<?php
$today = date("d-m-Y");       
echo $today;
?>
</div>
<?php

			if(isset($_POST['delete']) &&  ($_POST['delete']=='Διαγραφή') ){
				foreach($_POST as $key => $value){
					if(strncmp($key,"Date_Time_id_",13)==0){
					
					
						

						$sql2='DELETE FROM appointment WHERE Date_Time_id="'.$value.'" AND Doctor_id="'.$_GET['id'].'"';	
						$result2 =@mysql_query($sql2);
					
						$query='DELETE FROM availability WHERE Date_Time_id="'.$value.'" AND Doctor_id="'.$_GET['id'].'"';
						$result3 =@mysql_query($query);
						
						 echo "Η διαγραφή σας ήταν επιτυχής!";
					}
				}
			} else { 
								
			$year=$_POST['year'];
			$month=$_POST['month'];
			$imera=$_POST['imera'];
			$sp=$_POST['specialty'];
			$imerominia=$year."-".$month."-".$imera;
			
			$sql='SELECT Doctor_id FROM doctors WHERE Specialty="'.$sp.'"';
			$result1=@mysql_query($sql);

			if (!$result1) die("Couldn't run query". mysql_error());

			$clinic1 = mysql_query($sql) or die(mysql_error());
			$row_clinic1 = mysql_fetch_assoc($clinic1);


$sql_query = 'SELECT Name,Surname,Imerominia,Date_Time_id, Time FROM patients INNER JOIN appointment USING(Patient_id)INNER JOIN schedule USING (Date_Time_id) INNER JOIN hour USING(Time_id) WHERE  Imerominia="'.$imerominia.'" AND Doctor_id="'.$row_clinic1['Doctor_id'].'" ORDER BY Imerominia,Time';
$result=@mysql_query($sql_query);

if (!$result) die("Couldn't run query". mysql_error());

$clinic = mysql_query($sql_query) or die(mysql_error());
$row_clinic = mysql_fetch_assoc($clinic);


?>

<br/>
<h6><span class="style1">Αναζήτηση Ραντεβού</span></h6>
<br/>

<form name="form1" method="post" action="Search2.php?id=<?php echo $row_clilic1['id']; ?>">
<table border="1" align="center">
              <tr>
              <td bgcolor="#0099FF"></td>
                <td bgcolor="#0099FF">Όνομα Ασθενή</td>
                <td bgcolor="#0099FF">Επίθετo Ασθενή</td>
                <td bgcolor="#0099FF">Ραντεβού</td>
                <td bgcolor="#0099FF">Ειδικότητα</td>
          
              </tr>
             <?php do { ?>
				<tr>
					<td><input name="Date_Time_id_<?php echo $row_clinic['Date_Time_id'] ?>" type="checkbox" id="Date_Time_id_<?php echo $row_clinic['Date_Time_id'] ?>" value="<? echo $row_clinic['Date_Time_id']; ?>"></td>
             
                
                 <td><?php echo $row_clinic['Name']?></td>
				 <td><?php echo $row_clinic['Surname']?></td>
                  <td><?php echo $row_clinic['Imerominia']."  / ".$row_clinic['Time']; ?></a></td>
                  <td><?php echo $sp?></td>
              
                </tr>
              <?php } while ($row_clinic = mysql_fetch_assoc($clinic)); ?>
				<tr>
					<td><input name="delete" type="submit" id="delete" value="Διαγραφή"></td>
				</tr>
				
				</table>
			</form>
		</td>
	</tr>
    <?php } ?>
            
</div>
</body>
</html>