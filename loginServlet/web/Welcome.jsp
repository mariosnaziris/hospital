<%-- 
    Document   : Welcome
    Created on : Jan 29, 2014, 3:35:59 AM
    Author     : NAZOS
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="iatrio.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ραντεβού</title>
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
          <li class="first"><a>Αρχική</a></li>
          <li class="first"><a>Προφίλ</a></li>
          <li class="first"><a>Κλείσιμο Ραντεβού</a></li>
          <li class="first"><a>Αλλαγή Ραντεβού</a></li>
            
</div>
</div>
          
<div id="site"> 
<div id="date">
<script language="javascript">
var d=new Date();
var monthname=new Array("01","02","03","04","05","06","07","08","09","10","11","12");

var TODAY = d.getDate() + "-" +monthname[d.getMonth()]+ "-"+ d.getFullYear();

 document.write(TODAY);
</script>
</div>

<br/>
<h6><span class="style1">Ραντεβού</span></h6>
<br/>

<form method="post">
         	<p>Εισάγετε τον αριθμό ταυτότητας σας</p> <br/>
			<input type="text" name="patient_id" id="patient_id"><br/><br/>
            <div id="button">
          <input type="submit" value="Είσοδος">

          </form>
    
</div>
</body>
</html>
