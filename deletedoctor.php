<?php	
	require_once("db_connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="iatrio.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Διαγραφή Ιατρού</title>
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
			if (!( $database = mysql_connect("localhost","root",""))){

				die("Could not connect to database");

			}

			if (!mysql_select_db("clinic", $database)){

				die("Could not open Mailing List database");
			
			}
			
			
			if(isset($_POST['delete']) &&  ($_POST['delete']=='Διαγραφή') ){
				foreach($_POST as $key => $value){
					if(strncmp($key,"Doctor_id_",10)==0){
						$sql='DELETE FROM doctors WHERE Doctor_id="'.$value.'"';	
						$result =@mysql_query($sql);
						$sql2='DELETE FROM specialty WHERE Doctor_id"'.$value.'"';
						$result =@mysql_query($sql2);
					}
				}
			}


$sql_query = 'SELECT Name,Surname,Specialty,Doctor_id FROM doctors';
$result=@mysql_query($sql_query);

if (!$result) die("Couldn't run query". mysql_error());

$clinic = mysql_query($sql_query) or die(mysql_error());
$row_clinic = mysql_fetch_assoc($clinic);
$count=mysql_num_rows($result);
?>
<br/>
<h6><span class="style1">Διαγραφή Ιατρού</span></h6>
<br/>

<form name="form1" method="post" action="deletedoctor.php">
<table border="1" align="center">
              <tr>
              	<td bgcolor="#0099FF"></td>
                <td bgcolor="#0099FF">Όνομα Ιατρού</td>
                <td bgcolor="#0099FF">Επίθετo Ιατρού</td>
                <td bgcolor="#0099FF">Ειδικότητα</td>
			   	<td bgcolor="#0099FF"> Αρ.Ταυτότηατς</td>
              </tr>
              
             <?php do { ?>
				<tr>
					<td><input name="Doctor_id_<?php echo $row_clinic['Doctor_id'] ?>" type="checkbox" id="Doctor_id_<?php echo $row_clinic['Doctor_id'] ?>" value="<? echo $row_clinic['Doctor_id']; ?>"></td>
             
                
                 <td><?php echo $row_clinic['Name']?></td>
				 <td><?php echo $row_clinic['Surname']?></td>
                  <td><?php echo $row_clinic['Specialty']?></td>
              <td><?php echo $row_clinic['Doctor_id']?></td>
                </tr>
<?php } while ($row_clinic = mysql_fetch_assoc($clinic)); ?>
				<tr>
					<td><input name="delete" type="submit" id="delete" value="Διαγραφή"></td>
				</tr>
				
				</table>
			</form>
		</td>
	</tr>
            
</div>
</body>
</html>