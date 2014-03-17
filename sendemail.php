<?php
  session_start();
  $userid = $_SESSION['uid'];
  if (empty($_POST['subj']) || empty($_POST['mymsg'])||empty($_POST['adsno']))
     die("Complete the form");
	 
  mysql_connect('localhost','root','root');
  mysql_selectdb("usoko") or die ("Database doesn't exist"); 
  
  $adno = htmlspecialchars($_POST['adsno']);
  $q3 = "SELECT * FROM unverified WHERE sno = '$adno' and userid = $userid";
  $rs2 = mysql_query($q3);
  $ro = mysql_num_rows($rs2);
  if ($ro != 1)
     die("Ad does not exist");
  
  $query = "SELECT * FROM usrs WHERE userid = '$userid'";
  
  
  
  $rs1 = mysql_query($query);
  $name = mysql_fetch_array($rs1);
  $uname = $name['name'];
  $from = $name['email'];
  
  
  $subject = htmlspecialchars($_POST['subj']);
  $message  = htmlspecialchars($_POST['mymsg']);
  
  $q2 = "INSERT INTO messages VALUES ('$adno','$userid','$uname','$message')";
  mysql_query($q2) or die (mysql_error());
  
  echo "Email Sent";
?>