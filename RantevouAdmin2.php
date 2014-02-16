<?php	
	require_once("db_connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="iatrio.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ραντεβού Μήνα</title>
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

<br/>
<h6><span class="style1">Ραντεβού Μήνα</span><br/>

</h6>
<form method="post" action="RantevouMinaAdmin.php">
    
        
           <p><b> Επιλέξετε ειδικότητα ιατρού</b><br/>
             <br/>
             <select name="specialty">
                <option>Pathologist</option>
                <option>Cardiologist</option>	
                <option>Gynecologist</option>	
                <option>Pediatrician</option>
                <option>Oculist</option>	
                <option>Dentist</option>
                <option>Veterinarian</option>
                  </select> 
             <br/> 
             <br/>
           </p>
<div id="button">
          <input type="submit" value="Αναζήτηση">
          </div>

          </form>
          </div>
</body>
</html>
