<?php
	    session_start();
		$userid = $_SESSION['uid'];
	    if (empty($_POST['changemail']) && empty($_POST['changepass']))
             die ("Complete at least one data field");
	    mysql_connect("localhost","root","root") or die ("Could not connect to the db");
        $connect = mysql_selectdb("usoko") or die ("Db does not exist");
		$query1 = "SELECT * FROM usrs WHERE userid = '$userid'";
		$rs1 = mysql_query($query1);
		$name = mysql_fetch_array($rs1);
		$dbemail = $name['email']; 
		$dbpassword = $name['password'];
		
		if (empty($_POST['changemail']))
		{
		  $email = $dbemail;
		  $pass = md5(htmlspecialchars($_POST['changepass']));
		}
		else if (empty($_POST['changepass']))
		{
		  $email = htmlspecialchars($_POST['changemail']);
		  $pass = $dbpassword;
		}
		else{
		  $pass = md5(htmlspecialchars($_POST['changepass']));
		  $email = htmlspecialchars($_POST['changemail']);
		}
		 $query2 = "UPDATE usrs SET password = '$pass',email = '$email' WHERE userid = '$userid' ";
		 mysql_query($query2) or die(mysql_error());
	     echo "Profile updated successfully";
?>