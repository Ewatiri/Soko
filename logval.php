<?php
session_start();
$error = "";
  if (empty($_POST['firname']) ||empty($_POST['mname']) || empty($_POST['sname']) || empty($_POST['pword']) || empty($_POST['pword2']) || empty($_POST['eadd']))
  {
    die("Incomplete contact details");
  }
  
   else
  {
     $error = 1;

  }  
  if ($_POST['pword'] != $_POST['pword2'])
  {
    die(" The chosen passwords donot match");
	
  }
  else
  {
    $error = 1;
  }
 
 mysql_connect("localhost","root","root") or die ("Could not connect to the db");
 
 $connect = mysql_selectdb("usoko") or die ("Db does not exist");
 
 $email = htmlspecialchars($_POST['eadd']);
 
 $sel = "SELECT * FROM usrs WHERE  email = '$email'";
 $rows = mysql_query($sel);
 $r = mysql_num_rows($rows);
 
 if ($r != 0)
    die(" Email Already exists");
 
 $pass = md5(htmlspecialchars($_POST['pword2']));
 if ($error == 1)	
 {
   $uname = htmlspecialchars($_POST['firname'])." ".htmlspecialchars($_POST['sname']);
   $insert1 = "INSERT INTO usrs VALUES ('','$email','$uname','$pass')";
   $rows2 = mysql_query($insert1);
   
   
  $query = "SELECT * from usrs WHERE email = '$email'";
  $r = mysql_query($query);
  $rows = mysql_num_rows($r);
  if ($rows == 1)
  {
     // store the user name in $_SESSIOn for 'future use'
     $u = "SELECT * FROM usrs WHERE email = '$email'";
	 $username = mysql_query($u);
     $name = mysql_fetch_array($username);
	 $_SESSION['uid'] = $name['userid'];
  }
 }
 echo $error;
 ?>

