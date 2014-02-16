<%-- 
    Document   : index
    Created on : Jan 29, 2014, 2:47:28 AM
    Author     : NAZOS
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="iatrio.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Σύνδεση</title>
<link rel="shortcut icon" href="images/favicon.ico" />
</head>

<body bgcolor="#6699FF" >


	<form method="post" action="Login">


          <img src="images/logo.jpg" width="418" height="110" />
          
     <h3 align="center">Σύνδεση</h3>
       
<div id="login" align="center">     
	
	<span style= "color:blue">
		Επιλέξετε την ιδιότητα σας
		<br>
	</span>
	
	<input type = "radio" name = "type" value = "Doctor" checked = "check"/>
			Ιατρός
			<input type = "radio" name = "type" value = "Patient"/>   
			Ασθενής
            <input type = "radio" name = "type" value = "Admin"/>   
			Διαχειριστής
			<br><br>
 
      Όνομα Χρήστη
<input type="text" name="username" id="username"><br/><br/>
      Κωδικός Χρήστη
     
        <input type="password" name="password" id="password">
        </label>
      
<div id="button">
          <input type="submit" value="Είσοδος">
</div>
</div>
<br/>
<div id="login" align="center">
Αν δεν είσαστε εγγεγραμμένοι χρήστες πατήστε    
<a href="Register.html">Εγγραφή </a>
</div>
	</form>
</body>
</html>