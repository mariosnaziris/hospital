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
<h6><span class="style1">Κλείσιμο Ραντεβού</span><br/>
     		</h6>
<form method="post" action="EisagwgiRantevou.php?id=<?php echo $_GET['id']; ?>">
     		<p><b>Επιλέξετε το ΧΡΟΝΟ που θέλετε</b></p>
            <p>
          <select name="year">
			<option>2014</option>
            <option>2015</option>
          </select> <br/>             
            <p><br/>
              
             <p><b>Επιλέξετε το ΜΗΝΑ που θέλετε</b></p>
           <p>
          <select name="month">
			<option>01</option>
			<option>02</option>	
			<option>03</option>	
			<option>04</option>	
            <option>05</option>	
            <option>06</option>	
            <option>07</option>	
            <option>08</option>	
             <option>09</option>	
             <option>10</option>	
             <option>11</option>	
             <option>12</option>	
		</select> <br/>            
           <p><br/>
             
              <p><b>Επιλέξετε την ΗΜΕΡΑ που θέλετε</b></p>
        <p>
       
          <select name="imera">
			<option>01</option>
			<option>02</option>	
			<option>03</option>	
			<option>04</option>	
            <option>05</option>	
            <option>06</option>	
            <option>07</option>	
            <option>08</option>	
             <option>09</option>	
             <option>10</option>	
             <option>11</option>	
             <option>12</option>	
             <option>13</option>
             <option>14</option>
             <option>15</option>
             <option>16</option>
             <option>17</option>
             <option>18</option>
             <option>19</option>
             <option>20</option>
             <option>21</option>
             <option>22</option>
             <option>23</option>
             <option>24</option>
             <option>25</option>
             <option>26</option>
             <option>27</option>
             <option>28</option>
             <option>29</option>
             <option>30</option>
             <option>31</option>
		</select> <br/>         
        <p><br/>
          
          
        <p><b> Επιλέξετε ΕΙΔΙΚΟΤΗΤΑ ΙΑΤΡΟΥ</b></p>
            <p>
           <select name="specialty">
			<option>Pathologist</option>
			<option>Cardiologist</option>	
			<option>Gynecologist</option>	
			<option>Pediatrician</option>	
            <option>Dentist</option>
            <option>Oculist</option>		
            <option>Veterinarian</option>	
		</select> <br/> <br/>
           
           <div id="button">
          <input type="submit" value="Κλείσιμο">
          </div>

          </form>
          
</div>
</body>
</html>