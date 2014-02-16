<?php	
	require_once("db_connect.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="iatrio.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ημερολόγιο Ιατρού</title>
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
<?php		
			if (!( $database = mysql_connect("localhost","root",""))){

				die("Could not connect to database");

			}

			if (!mysql_select_db("clinic", $database)){

				die("Could not open Mailing List database");
			
			}	
			if(isset($_POST['delete']) &&  ($_POST['delete']=='Διαγραφή') ){
				foreach($_POST as $key => $value){
					if(strncmp($key,"Time_id_",8)==0){
						$sql='DELETE FROM availability WHERE Doctor_id="'.$_GET['id'].'" AND Date_Time_id="'.$value.'"';	
						$result = mysql_query($sql) or die(mysql_error());
					}
				}
			} 

$sql_query = 'SELECT schedule.Imerominia, hour.Time, availability.Reason,Date_Time_id FROM HOUR INNER JOIN schedule USING ( Time_id ) INNER JOIN availability USING ( Date_Time_id ) WHERE Doctor_id="'.$_GET['id'].'"' ;

$result=@mysql_query($sql_query);

if (!$result) die("Couldn't run query". mysql_error());

$clinic = mysql_query($sql_query) or die(mysql_error());
$row_clinic = mysql_fetch_assoc($clinic);
?>


<br/>
<h6><span class="style1">Ημερολόγιο</span></h6>
<br/>

<form name="form1" method="post" action="Calendar.php?id=<?php echo $_GET['id']; ?>">

<table border="1" align="center">
              <tr>
                
                <td bgcolor='#0099FF'>Ημερομηνία</td>
                <td bgcolor='#0099FF'>Ώρα</td>
                <td bgcolor='#0099FF'>Αιτία</td>
                <td bgcolor='#0099FF'>Διαγραφή</td>
       
                
              </tr>
              <?php do { ?>
                <tr>
                 
                  <td><?php echo $row_clinic['Imerominia']; ?></td>
                  <td><?php echo $row_clinic['Time']; ?></td>
                  <td><?php echo $row_clinic['Reason']; ?></td>
                  <?php if ($row_clinic['Reason']!="Appointment"){?>
                  <td><input name="Time_id_<?php echo $row_clinic['Date_Time_id'] ?>" type="checkbox" id="time_id_<?php echo $row_clinic['Date_Time_id'] ?>" value="<?php echo $row_clinic['Date_Time_id']; ?>"></td>
                  		<?php }?>
                  
              
                </tr>
                <?php } while ($row_clinic = mysql_fetch_assoc($clinic)); ?>
                <td> <input name="delete" type="submit" id="delete" value="Διαγραφή"></td>
</table>
</form>
              

</div>
</body>
</html>
