<?php	
	require_once("db_connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="iatrio.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Αλλαγή Ραντεβού Ασθενή</title>
<link rel="shortcut icon" href="images/favicon.ico" />
<style type="text/css">
<!--
.style2 {font-size: medium}
-->
</style>
</head>

<body bgcolor="#6699FF" >

          <img src="images/logo.jpg" width="418" height="110" />
          
<div class="menuback">
  <h4> Μενού</h4>
<div class="firstallpati">
          <li class="first"><a href="ArxikiPatient.php?id=<?php echo $_GET['id']; ?>">Αρχική</a></li>
          <li class="first"><a href="Profile.php?id=<?php echo $_GET['id']; ?>">Προφίλ</a></li>
          <li class="first"><a href="KlisimoRantevou.php?id=<?php echo $_GET['id']; ?>">Κλείσιμο Ραντεβού</a></li>
          <li class="first"><a href="EditRantevou.php?id=<?php echo $_GET['id']; ?>">Αλλαγή Ραντεβού</a></li>
            
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
			if (!( $database = mysql_connect("localhost","root",""))){

				die("Could not connect to database");

			}

			if (!mysql_select_db("clinic", $database)){

				die("Could not open Mailing List database");
			
			}
			if(isset($_POST['edit']) &&  ($_POST['edit']=='Αλλαγή') ){
				foreach($_POST as $key => $value){
					if(strncmp($key,"Date_Time_id_",13)==0){
						$sql='DELETE FROM appointment WHERE Date_Time_id="'.$value.'" AND Patient_id="'.$_GET['id'].'"';	
						$result =@mysql_query($sql);
						
						$query='DELETE FROM availability WHERE Date_Time_id="'.$value.'" AND Patient_id="'.$_GET['id'].'"';
						$result2 =@mysql_query($query);
						
						if($rows==0){
							header("Location: KlisimoRantevou.php?id=".$_GET['id']);
						}
						
						
						
					}
				}
			}

$sql_query = 'SELECT Name,Surname,Specialty,Imerominia,Date_Time_id, Time FROM doctors INNER JOIN appointment USING(Doctor_id)INNER JOIN schedule USING (Date_Time_id) INNER JOIN hour USING(Time_id) WHERE Patient_id="'.$_GET['id'].'" ORDER BY Imerominia,Time';
$result=@mysql_query($sql_query);

if (!$result) die("Couldn't run query". mysql_error());

$clinic = mysql_query($sql_query) or die(mysql_error());
$row_clinic = mysql_fetch_assoc($clinic);
?>


<br/>
<h6><span class="style2">Αλλαγή Ραντεβού</span></h6>
<br/>

<form name="form1" method="post" action="EditRantevou.php?id=<?php echo $_GET['id']; ?>">
<table border="1" align="center">
              <tr>
              	<td bgcolor="#0099FF"></td>
                 <td bgcolor="#0099FF">Όνομα Ιατρού</td>
                <td bgcolor="#0099FF">Επίθετο Ιατρού</td>
                <td bgcolor="#0099FF">Ειδικότητα Ιατρού</td>
                <td bgcolor="#0099FF">Ραντεβού</td>
              </tr>
              
              <?php do { ?>
                <tr>
					<td><input name="Date_Time_id_<?php echo $row_clinic['Date_Time_id'] ?>" type="checkbox" id="Date_Time_id_<?php echo $row_clinic['Date_Time_id'] ?>" value="<? echo $row_clinic['Date_Time_id']; ?>"></td>
                    
                 <td><?php echo $row_clinic['Name']; ?></td>
                  <td><?php echo $row_clinic['Surname']; ?></td>
                  <td><?php echo $row_clinic['Specialty']; ?></td>
                  <td><?php echo $row_clinic['Imerominia']."  / ".$row_clinic['Time']; ?></td>
                  
              
                </tr>
<?php } while ($row_clinic = mysql_fetch_assoc($clinic)); ?>
                <tr>
					<td><input name="edit" type="submit" id="edit" value="Αλλαγή"></td>
				</tr>
</table>
</form>

    
</div>
</body>
</html>
