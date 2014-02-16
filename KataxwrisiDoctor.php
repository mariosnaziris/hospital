<?php	
	require_once("db_connect.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="iatrio.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Φόρμα Εγγραφή Ιατρού</title>
<link rel="shortcut icon" href="images/favicon.ico" />
</head>
	<body style = "font-family: arial, sans-serif">
		
		<?php			
			extract($_POST);

			if ( (ereg("^[_a-z0-9-]{8,}$",$password))){

			$query="INSERT INTO doctors VALUES ('$fname','$lname','$specialty','$email','$mobphone','$id','$username','$password')";
			$query2="INSERT INTO specialty VALUES ('$specialty','$id')";

			}

			else{
				 print("<p><span style = \"color: red; font-size:2em\">
					WRONG PASSWORD</span><br>
					A valid password must be more than 4 characters
					<span style = \"color:blue\">
					Click the Back button, enter valid password and resubmit<br><br>
					Thank you.</span></p></body></html>");

				die();
			}

			
			if(!($result=mysql_query($query,$database))){
				print("Could not execute query!<br/>");
				die(mysql_error());
			}
			
			if(!($result=mysql_query($query2,$database))){
				print("Could not execute query2!<br/>");
				die(mysql_error());
			}

			

			if ( !$fname || !$lname || !$id || !$email || !$mobphone || !$username ||!$password){

				print("<p><span style = \"color: red; font-size:2em\">
					SOME FIELDS ARE BLANK!</span><br>
					<span style = \"color:blue\">
					Click the Back button, fill all the blank fields<br><br>
					Thank you.</span></p></body></html>");
					
				die();
			}

			if (!ereg("^[6]{1}[9]{1}[0-9]{8}$",$mobphone)){

				print("<p><span style = \"color: red; font-size:2em\">
					INVALID PHONE NUMBER OR MOBILE PHONE NUMBER</span><br>
					A valid phone number must be in the form
				<strong>6912345678</strong><br>
				<span style = \"color:blue\">
				Click the Back button, enter valid phone number and resubmit<br><br>
				Thank you.</span></p></body></html>");

				die();

			}

			if ( (!ereg("^[a-z0-9]+([_\\.-][a-z0-9]+)*" ."@"."([a-z0-9]+([\.-][a-z0-9]+)*)+"."\\.[a-z]{2,}"."$",$email))){
				//or ("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.([a-z]){2,3})$")
				print("<p><span style = \"color: red; font-size:2em\">
					WRONG EMAIL</span><br>
					A valid email must be in the form
					<strong>example@email.com</strong><br>
					<span style = \"color:blue\">
					Click the Back button, enter valid email and resubmit<br><br>
					Thank you.</span></p></body></html>");

				die();

			}

			/*if ( ( !ereg("^[_a-z0-9-]{5}$",$password))){

				print("<p><span style = \"color: red; font-size:2em\">
					WRONG PASSWORD</span><br>
					A valid password must be more than 4 characters
					<span style = \"color:blue\">
					Click the Back button, enter valid password and resubmit<br><br>
					Thank you.</span></p></body></html>");

				die();

			}*/

			


		?>
			

			<strong>Τα δεδομένα που έχετε δώσει είναι:</strong><br>

			<table border = "1" cellpadding = "0" cellspacing = "10">
				<tr>
					<td bgcolor = "#ffffaa">Όνομα</td>
					<td bgcolor = "#ffffaa">Επίθετο</td>
                    <td bgcolor = "#ffffaa">Ειδικότητα</td>
                    <td bgcolor = "#ffffcc">Ηλεκτρονικό Ταχυδρομείο</td>
					<td bgcolor = "#ffffcc">Τηλέφωνο</td>
					<td bgcolor = "#ffffbb">Αρ.Ταυτότητας</td>
					<td bgcolor = "#ffffcc">Όνομα Χρήστη</td>
					<td bgcolor = "#ffffcc">Κωδικός Χρήστη</td>
				</tr>
				<tr>
					<?php


						print("<td>$fname</td>
							<td>$lname</td>
							<td>$specialty</td>
							<td>$email</td>
							<td>$mobphone</td>
							<td>$id</td>
							<td>$username</td>
							<td>$password</td>");
					?>
				</tr>
			</table>
			<br><br><br>

			<b> Παρακαλώ πατήστε <a href="ArxikiAdmin.html" > εδώ</a>	για ανακατεύθυνση </b>
            
	</body>

</html>