<?php	
	require_once("db_connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="iatrio.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Διαμόρφωση Ημερολογίου</title>
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
<br/><br/>
<?php 
			if (!( $database = mysql_connect("localhost","root",""))){

				die("Could not connect to database");

			}

			if (!mysql_select_db("clinic", $database)){

				die("Could not open Mailing List database");
			
			}
			   if(isset($_POST['register']) &&  ($_POST['register']=='Καταχώρηση') ){
				foreach($_POST as $key => $value){
					if(strncmp($key,"Time_id_",8)==0){
							$sql2='INSERT INTO availability VALUES ('.$value.','.$_GET['id'].',"'.$_POST['Reason'].'")';
							$result2=@mysql_query($sql2);
						
							if (!$result2) die("Couldn't run query". mysql_error());
							
							$query = 'SELECT schedule.Imerominia, hour.Time, availability.Reason,Date_Time_id FROM HOUR INNER JOIN schedule USING ( Time_id ) INNER JOIN availability USING ( Date_Time_id ) WHERE Doctor_id="'.$_GET['id'].'"' ;

$result=@mysql_query($query);

if (!$result) die("Couldn't run query". mysql_error());

$clinic = mysql_query($query) or die(mysql_error());
$row_clinic = mysql_fetch_assoc($clinic);
?>

<br/>
<h6><span class="style1">Διαμόρφωση Ημερολογίου</span></h6>
<br/>


<form name="form1" method="post" action="">

<table border="1" align="center">
              <tr>
                
                <td bgcolor="#0099FF">Ημερομηνία</td>
                <td bgcolor="#0099FF">Ώρα</td>
                <td bgcolor="#0099FF">Αιτία</td>
               
       
                
              </tr>
              <?php do { ?>
                <tr>
                 
                  <td><?php echo $row_clinic['Imerominia']; ?></td>
                  <td><?php echo $row_clinic['Time']; ?></td>
                  <td><?php echo $row_clinic['Reason']; ?></td>
                  		
                  
              
                </tr>
                <?php } while ($row_clinic = mysql_fetch_assoc($clinic)); ?>
              
</table>
</form>
							
							
					<?php 		
					}
					}
					
					}else {
					
			$year=$_POST['year'];
			$month=$_POST['month'];
			$imera=$_POST['imera'];
			$sp=$_POST['specialty'];
			$imerominia=$year."-".$month."-".$imera;
			
			$sql='SELECT Doctor_id FROM doctors WHERE Specialty="'.$sp.'"';
			$result5=@mysql_query($sql);

			if (!$result5) die("Couldn't run query". mysql_error());

			$clinic5 = mysql_query($sql) or die(mysql_error());
			$row_clinic5 = mysql_fetch_assoc($clinic5);
			
		$sql_query = 'SELECT DISTINCT Date_Time_id,Time FROM hour INNER JOIN schedule USING(Time_id)  WHERE Imerominia="'.$imerominia.'" AND Time_id NOT IN (SELECT DISTINCT Time_id FROM hour INNER JOIN SCHEDULE USING (Time_id) INNER JOIN AVAILABILITY USING (Date_time_id) INNER JOIN specialty USING (Doctor_id) WHERE Doctor_id="'.$row_clinic5['Doctor_id'].'" AND Imerominia="'.$imerominia.'" ) ORDER BY Time' ;
		
$result=@mysql_query($sql_query);

if (!$result) die("Couldn't run query". mysql_error());

$clinic = mysql_query($sql_query) or die(mysql_error());
$row_clinic = mysql_fetch_assoc($clinic);



 ?>
 
<form name="form1" method="post" action="RantevouSearchAdmin.php?id=<?php echo $row_clinic5['Doctor_id']; ?>">

<table border="1" align="center">
              <tr>
                
                <td bgcolor="#0099FF">Ημερομηνία</td>
                <td bgcolor="#0099FF">Ώρα</td>
       			 <td bgcolor="#0099FF">Επιλογή</td>
                 <td bgcolor="#0099FF">Αιτία</td>
              </tr>
              
           <?php do { ?>
				<tr>
					
                 
                  <td><?php echo $imerominia; ?></td>
                  
                         		  <td><?php echo $row_clinic['Time']; ?></td>
                                  <td><input name="Time_id_<?php echo $row_clinic['Date_Time_id'] ?>" type="checkbox" id="time_id_<?php echo $row_clinic['Date_Time_id'] ?>" value="<? echo $row_clinic['Date_Time_id']; ?>"></td>
                   
             					 
                
                </tr>
                <?php } while ($row_clinic = mysql_fetch_assoc($clinic)); ?>
    		<tr>
            		<td> </td>
                    <td></td>
                    <td></td>
					<td><select name="Reason">
										<option>Holiday</option>
										<option>Abroad</option>	
										<option>Public Holiday</option>	
										<option>Personal</option>	
                                        </select> <br/> <br/>
                              <input name="register" type="submit" id="register" value="Καταχώρηση"></td>
				</tr>
				
				</table>
               
			</form>
           
		</td>
	</tr>
    <?php }?>
</div>
</body>
</html>