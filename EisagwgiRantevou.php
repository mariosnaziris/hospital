<?php	
	require_once("db_connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="iatrio.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Κλείσιμο Ραντεβού Ασθενή</title>
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

  
<br/>
<h6><span class="style1">Κλείσιμο Ραντεβού</span></h6>
<br/>


<?php 
			if (!( $database = mysql_connect("localhost","root",""))){

				die("Could not connect to database");

			}

			if (!mysql_select_db("clinic", $database)){

				die("Could not open Mailing List database");
			
			}
  			$idp=$_GET['id'];
				
			if(isset($_POST['register']) &&  ($_POST['register']=='Κλείσιμο') ){
				foreach($_POST as $key => $value){
					if(strncmp($key,"Time_id_",8)==0){
						
						$sql='SELECT Doctor_id FROM doctors INNER JOIN specialty USING ( Doctor_id )WHERE Name_of_specialty="'.$_GET['idsp'].'"';
						$result=@mysql_query($sql);
						
						
						if (!$result) die("Couldn't run query". mysql_error());

						$clinic1 = mysql_query($sql) or die(mysql_error());
						$row_clinic1 = mysql_fetch_assoc($clinic1);
						
					

						
						$sql2='INSERT INTO appointment VALUES ('.$idp.','.$row_clinic1['Doctor_id'].','.$value.')';
						$result2 =@mysql_query($sql2);
					
						
						$query='INSERT INTO availability VALUES ('.$value.','.$row_clinic1['Doctor_id'].','."'Appointment'".')';
						$result3 =@mysql_query($query);
						
						if($rows==0)
								header("Location: Profile.php?id=".$_GET['id']);
						
				
					}
				}
			}else{
			

			$year=$_POST['year'];
			$month=$_POST['month'];
			$imera=$_POST['imera'];
			$specialty=$_POST['specialty'];
			$imerominia=$year."-".$month."-".$imera;
			
			/* if ($imerominia<$today){ ?>
				<script> alert ("Η ημερομηνία που επιλέξατε έχει περάσει"); </script>
                Πατήστε<a href="KlisimoRantevou.php?id=<?php echo $_GET['id']; ?>"> εδώ</a> για να πάτε πίσω
             <?php } else {?>
	<?php */
		$sql_query = 'SELECT DISTINCT Date_Time_id,Time FROM hour INNER JOIN schedule USING(Time_id)  WHERE Imerominia="'.$imerominia.'" AND Time_id NOT IN (SELECT DISTINCT Time_id FROM hour INNER JOIN SCHEDULE USING (Time_id) INNER JOIN AVAILABILITY USING (Date_time_id) INNER JOIN specialty USING (Doctor_id) WHERE Name_of_specialty="'.$specialty.'" AND Imerominia="'.$imerominia.'" ) ORDER BY Time' ;
		
$result=@mysql_query($sql_query);

if (!$result) die("Couldn't run query". mysql_error());

$clinic = mysql_query($sql_query) or die(mysql_error());
$row_clinic = mysql_fetch_assoc($clinic);

$num_rows = mysql_num_rows($clinic);


	
 ?>


<form name="form1" method="post" action="EisagwgiRantevou.php?idsp=<?php echo $_POST['specialty'];?>&id=<?php echo $_GET['id']; ?>">

<table border="1" align="center">
              <tr>
                
                <td bgcolor="#0099FF">Ημερομηνία</td>
                <td bgcolor="#0099FF">Ώρα</td>
       			 <td bgcolor="#0099FF">Κλείσιμο</td>
              </tr>
           <?php do { ?>	
				
                  				<td><?php echo $imerominia; ?></td>
                         		  <td><?php echo $row_clinic['Time']; ?></td>
                                  <td><input name="Time_id_<?php echo $row_clinic['Date_Time_id'] ?>" type="checkbox" id="time_id_<?php echo $row_clinic['Date_Time_id'] ?>" value="<? echo $row_clinic['Date_Time_id']; ?>"></td>
                  
             
                </tr>
               
                <?php } while ($row_clinic = mysql_fetch_assoc($clinic));  ?>
    		
            
            <tr>
					<td><input name="register" type="submit" id="register" value="Κλείσιμο"></td>
				</tr>
				
				</table>
               
			</form>
           <?php } ?>

</div>
</div>
</body>
</html>