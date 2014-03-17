<?php
session_start();
  
 
	
		if (empty($_POST['pword']) || empty($_POST['uname']))
		    die ("Invalid credentials");
	
	mysql_connect("localhost","root","root") or die ("Could not connect to the db");
 
	$connect = mysql_selectdb("usoko") or die ("Db does not exist");
 
	$pword = md5(htmlspecialchars($_POST['pword']));
	$username = htmlspecialchars($_POST['uname']);
 
	$query = "SELECT * FROM myadmin WHERE name = '$username' and password = '$pword'";
	$rs = mysql_query($query);
 
	$rows = mysql_num_rows($rs);
	if ($rows != 1)
		die ("<b>You are not an admin</b>".$rows);
    else
	{
	  $_SESSION['admin'] = 1;
	    echo 3;		
	}
  
 

?>