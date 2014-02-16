<?php	
	require_once("db_connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="iatrio.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Αναζήτηση Ραντεβού Ιατρού</title>
<link rel="shortcut icon" href="images/favicon.ico" />

<style type="text/css">
<!--
#site h6 .style1 {
	font-size: medium;
}
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
			$year=$_POST['year'];
			$month=$_POST['month'];
			$imera=$_POST['imera'];
			
			$imerominia=$year."-".$month."-".$imera;
			if (!( $database = mysql_connect("localhost","root",""))){

				die("Could not connect to database");

			}

			if (!mysql_select_db("clinic", $database)){

				die("Could not open Mailing List database");
			
			}
				if(isset($_POST['delete']) &&  ($_POST['delete']=='Διαγραφή') ){
					foreach($_POST as $key => $value){
						if(strncmp($key,"Date_Time_id_",13)==0){
							$sql="DELETE FROM appointment WHERE Date_Time_id=".$value." AND Doctor_id=".$_GET['id'];		
							$result =@mysql_query($sql);
							
							$query='DELETE FROM availability WHERE Date_Time_id="'.$value.'" AND Doctor_id="'.$_GET['id'].'"';
						$result =@mysql_query($query);
						}
					}
				}

$sql_query = 'SELECT Name,Surname,Imerominia,Date_Time_id, Time FROM patients INNER JOIN appointment USING(Patient_id)INNER JOIN schedule USING (Date_Time_id) INNER JOIN hour USING(Time_id) WHERE  Imerominia="'.$imerominia.'" AND Doctor_id="'.$_GET['id'].'" ORDER BY Imerominia,Time';
$result=@mysql_query($sql_query);

if (!$result) die("Couldn't run query". mysql_error());

$clinic = mysql_query($sql_query) or die(mysql_error());
$row_clinic = mysql_fetch_assoc($clinic);
$count=mysql_num_rows($result);
?>

<br/>
<h6><span class="style1">Αναζήτηση Ραντεβού</span></h6>
<br/>

<form name="form1" method="post" action="RantevouSearch.php?id=<?php echo $_GET['id']; ?>">
<table border="1" align="center">
              <tr>
              <td bgcolor="#0099FF"></td>
                <td bgcolor="#0099FF">Όνομα Ασθενή</td>
                <td bgcolor="#0099FF">Επίθετo Ασθενή</td>
                <td bgcolor="#0099FF">Ραντεβού</td>
               
          
              </tr>
             <?php do { ?>
				<tr>
					<td><input name="Date_Time_id_<?php echo $row_clinic['Date_Time_id'] ?>" type="checkbox" id="Date_Time_id_<?php echo $row_clinic['Date_Time_id'] ?>" value="<? echo $row_clinic['Date_Time_id']; ?>"></td>
             
                
                 <td><?php echo $row_clinic['Name']?></td>
				 <td><?php echo $row_clinic['Surname']?></td>
                  <td><?php echo $row_clinic['Imerominia']."  / ".$row_clinic['Time']; ?></a></td>
              
                </tr>
              <?php } while ($row_clinic = mysql_fetch_assoc($clinic)); ?>
				<tr>
					<td><input name="delete" type="submit" id="delete" value="Διαγραφή"></td>
				</tr>
				<?php
				
				?>
				</table>
			</form>
		</td>
	</tr>
            
</div>
</body>
</html>