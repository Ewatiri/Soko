<?php
 session_start();
 $index = $_SESSION['uid'];
 $error = "";
  if (empty($_GET['type']) || empty($_GET['desc']) || empty($_GET['vdate']) || empty($_GET['addr']))
  {  
    die ("Complete all fields");
  }
  if (substr_count($_GET['vdate'], '/') == 2) {
        list($d, $m, $y) = explode('/', $_GET['vdate']);
        $flag = checkdate($m, $d, sprintf('%04u', $y));
    }
  else
    die("Invalid date format");
   if (($flag))
       die ($flag);
	$now = date('Y-m-d');
   if (strtotime($_GET['vdate']) < strtotime($now))
      die("Invalid validity period");
  
  $desc = htmlspecialchars($_GET['desc']);
  $type = htmlspecialchars($_GET['type']);
  $date = htmlspecialchars($_GET['vdate']);
  $add =  htmlspecialchars($_GET['addr']);
  $len = strlen($desc);
  if ($len > 150)
     die ("Too many chars");
 
  if (!($index))
    die("You must be logged in to place an ad");
	
  //TODO format date
   mysql_connect("localhost","root","root") or die ("Could not connect to the db");
  $connect = mysql_selectdb("usoko") or die ("Db does not exist");
  
  $sel1 = "SELECT * FROM unverified WHERE  userid = '$index'";
  $sel2 = "SELECT * FROM verified WHERE  userid = '$index'";
  
  $rows1 = mysql_query($sel1); 
  $rows2 = mysql_query($sel2); 
  
  $nr1 = mysql_num_rows($rows1);
  $nr2 = mysql_num_rows($rows2);
  
  if ($nr1 != 0)
  {
    while($rt = mysql_fetch_assoc($rows1))
	{
	  if (strcmp(strtolower($desc),strtolower($rt['ad'])) == 0)
	  {
	    die("Ad already exists!");
	  }
	}
  }
  if ($nr2 != 0)
  {
    while($rt = mysql_fetch_assoc($rows2))
	{
	  if (strcmp(strtolower($desc),strtolower($rt['ad'])) == 0)
	  {
	    die("Ad already exists!");
	  }
	}
  }
  
  $query = "INSERT INTO unverified VALUES('','$index','$type','$desc','$add','$date')";
  $ro = mysql_query($query);
  echo "Ad added successfully :-)";
  
?>