﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="iatrio.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Αρχική Ασθενή</title>
<link rel="shortcut icon" href="images/favicon.ico" />
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
<h7><strong>Καλωσήρθατε στο Ιατρικό Κέντρο Υγείας</strong></h7>
<h5>Επικοινωνία</h5>
  <p><strong>Διεύθυνση:</strong> ΒΟΛΟΣ</p>
  <p><strong>Τηλ.:</strong> 2421012345</p>
  <p><strong>Ηλ. Ταχυδρομείο.:</strong> <a href="mailto:naziris@uth.gr">naziris@uth.gr</a></p>  
  <p align="center"> </p>
	<p align="center"> 
	<p align="center"> 
	<p align="center">
    
   <div class="foto"></div>
<span class="foto"><img src="images/The-Job-of-a-Doctor.jpg" height="161.974" width="272.684" /></span> </div>
</body>
</html>
