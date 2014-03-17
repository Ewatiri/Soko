<?php
  session_start();
  $_SESSION['user'] = $_POST['emailadd'];
  
$err = "";
 if (empty($_POST['emailadd']) || empty($_POST['pw']))
 {
     die("Incomplete details");
}
// connect to the database
  mysql_connect('localhost','root','root');
  mysql_selectdb("usoko") or die ("Database doesn't exist");
  $email = htmlspecialchars($_POST["emailadd"]);
  // encrypt password
  $pword = md5(htmlspecialchars($_POST["pw"]));
  
 
    
  // verify the user details
  $query = "SELECT * from usrs WHERE email = '$email' and password = '$pword'";
  $r = mysql_query($query);
  $rows = mysql_num_rows($r);
  if ($rows == 1)
  {
     $err = 1;
	 // store the user name in $_SESSIOn for 'future use'
     $u = "SELECT * FROM usrs WHERE email = '$email'";
	 $username = mysql_query($u);
     $name = mysql_fetch_array($username);
	 $_SESSION['uname'] = $name['name'];
	 $_SESSION['uid'] = $name['userid'];
  }
   else 
    $err = 0;
	
  echo $err;
?>
