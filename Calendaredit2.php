<?php	
	require_once("db_connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="iatrio.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Διαμόρφωση Ημερολογίου Ιατρού</title>
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
   		   if(isset($_POST['register']) &&  ($_POST['register']=='Καταχώρηση') ){
				foreach($_POST as $key => $value){
					if(strncmp($key,"Time_id_",8)==0){
							$sql2='INSERT INTO availability VALUES ('.$value.','.$_GET['id'].',"'.$_POST['Reason'].'")';
							$result2=@mysql_query($sql2);
						
							if (!$result2) die("Couldn't run query". mysql_error());
							
							if($rows==0)
								header("Location: Calendar.php?id=".$_GET['id']);
							
							
							
					}
			}
					
}else {
			$year=$_POST['year'];
			$month=$_POST['month'];
			$imera=$_POST['imera'];
		
			$imerominia=$year."-".$month."-".$imera;
			
		$sql_query = 'SELECT DISTINCT Date_Time_id,Time FROM hour INNER JOIN schedule USING(Time_id)  WHERE Imerominia="'.$imerominia.'" AND Time_id NOT IN (SELECT DISTINCT Time_id FROM hour INNER JOIN SCHEDULE USING (Time_id) INNER JOIN AVAILABILITY USING (Date_time_id) INNER JOIN specialty USING (Doctor_id) WHERE Doctor_id="'.$_GET['id'].'" AND Imerominia="'.$imerominia.'" ) ORDER BY Time' ;
		
$result=@mysql_query($sql_query);

if (!$result) die("Couldn't run query". mysql_error());

$clinic = mysql_query($sql_query) or die(mysql_error());
$row_clinic = mysql_fetch_assoc($clinic);
?>
 

<br/>
<h6><span class="style1">Διαμόρφωση Ημερολογίου</span></h6>
<br/>


<form name="form1" method="post" action="Calendaredit2.php?id=<?php echo $_GET['id']; ?>">

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
					<td>
                    <select name="Reason">
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