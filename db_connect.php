<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 

    $hostname_db_connection = "localhost";
	$database_db_connection = "clinic";
	$username_db_connection = "root";
	$password_db_connection = "";
	$db_connection = mysql_pconnect($hostname_db_connection, $username_db_connection, $password_db_connection) or trigger_error(mysql_error(),E_USER_ERROR); 
	mysql_select_db($database_db_connection);
	mysql_set_charset('utf8',$db_connection);
        
?>

