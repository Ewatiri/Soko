<?php
session_start();
$userid = $_SESSION['uid'];
 if ($_SESSION['admin'] != 1)
     header('Location: adminlog.php');
 if (isset($_GET['logout']) && ($_SESSION['admin'] == 1))
 { 
    session_destroy();
	header('Location: adminlog.php');
 }
?>

<html>
  <head>
    <title>Dashboard</title>
    <style type = "text/css">
	  @font-face {
      font-family: Sweetly Broken;
      src: url("fonts/Sweetly Broken.ttf");
	  }
	  @font-face {
      font-family: Jenna Sue;
      src: url("fonts/JennaSue.ttf");
	  }
	  @font-face {
      font-family: Schoolbell;
      src: url("fonts/Schoolbell.ttf");
	  }
	  
	  body{
	   background:url("images/adminbg.jpg") no-repeat;
	   background-size: cover;
	   font-family: Jenna Sue;
       font-size: 30px;   
	   overflow: auto;
	  }
	  #delerr{
	   color: red;
	  }
	  #u1{
	   position: absolute;
	   font-size: 50px;
	   margin-left: -320px;
	   margin-top: 0px;
	   font-family: Sweetly Broken; 
	   }
	  #u2{
	  margin-top: -110px;
	  
	  }
	  #first{
	  transform: rotate(-15deg);
	  margin-top: -80px;
	  margin-left: -20px;
	  z-index: -9;
	  }
	  #verification{
	   width: 500px;
	   margin-top: 50px;
	   margin-left: 30px;
	   z-index: 10;
	  }
	  input,select{
	  background: transparent;
	  font-family: Jenna Sue;
      font-size: 30px;   
	  }
	  #srchoutpt
	  {
	    font-family:Schoolbell;
	    position: absolute;
		margin-left: 650px;
	    margin-top: -130px;
		font-size: 20px;
       }
	   #reports,#delete{
	   width: 500px;
	   margin-left: 30px;
	   }
	   #reports{
	   position: absolute;
	   }
	   #usrs{
	    margin-left: 750px;
	    margin-top: -200px;
		width: 500px;
		color: blue;
	   }
	   #unv{
	    margin-left: 750px;
	    margin-top: -250px;
	    width: 500px;
		color: blue;
		border: 1px solid;
	   }
	   #unv table{
	    font-size: 30px;
	   }
	   #lg
	   {
	     margin-left: 1250px;
		 margin-top: -55px;
	   }
	</style>
  </head>
  <body>
    <div id = "first">
	  <img id = "u2"src = "images/tp1.png">
	  <span id = "u1">U-soKo Dashboard</span>
	</div>
	<form method = "get" id = "lg">
			<input type = "submit" name = "logout" value = "Logout"/>	
	 </form>
	<div id = "verification">
	  <fieldset>
	    <legend>Verify Ad by SNo</legend>
		<form>
		  <table>
		   <tr>
		    <td><input type = "text" name = "what"></td>
			<td><input type = "submit" name = "srch" value = "Search Ad"></td>
		   </tr>
		  </table>
		</form>
		
		<?php
	 if (!(empty($_GET['what']))){
	     mysql_connect("localhost","root","root") or die ("Could not connect to the db");
 
         $connect = mysql_selectdb("usoko") or die ("Db does not exist");
		 
		 $sno = htmlspecialchars($_GET['what']);
		 $_SESSION['ady'] = $sno;
		 $query = "SELECT * FROM unverified WHERE sno = '$sno'";
		 $qtran = "SELECT * FROM messages WHERE sno = '$sno'";
		 
		 $rs = mysql_query($query);
		 $qrs = mysql_query($qtran);
		 
		 $rows = mysql_num_rows($rs);
		 $qrows = mysql_num_rows($qrs);
		  if ($qrows == 0){
		    $nomsg = "No Message from user";
		  }
		 if ($rows == 0){?>
		     <div id = "errmsg"> <?php  echo "The ad doesn't exist"; ?></div>
		 <?php }
		  else{
		    $rs2 = mysql_fetch_assoc($rs);
			$sno2 = $rs2['sno'];
			$userid = $rs2['userid'];
			$cat = $rs2['category'];
			$ad = $rs2['ad'];
			$exp = $rs2['expiry'];
		    $msgarray = mysql_fetch_assoc($qrs);
			$msg =  $msgarray['message'];
		   ?>
		   <div id = "srchoutpt">
		    <form>
		     <table cellpadding = "20">
			   <tr>
			    <th>SNo.</th>
				<th>UserId</th>
				<th>Category</th>
				<th>Ad</th>
				<th>Expiry Date</th>
			   </tr>
			   <tr>
			     <td><?php echo $sno2?></td>
			     <td><?php echo $userid?></td>
			     <td><?php echo $cat?></td>
			     <td><?php echo $ad?></td>
			     <td><?php echo $exp?></td>
			   </tr>
			   <tr>
			    <td>Message:</td>
			     <td><?php echo $nomsg.$msg?></td>
			   </tr>
			   <tr>
			     <td><input type = "submit" name = "verify" value ="Verify Ad" ></td>
			   </tr>
			 </table>
			 
		   </form>
		  </div>
		<?php }}
		mysql_connect("localhost","root","root") or die ("Could not connect to the db");
 
         $connect = mysql_selectdb("usoko") or die ("Db does not exist");
		 $sno = $_SESSION['ady'];
	       if (isset($_GET['verify']))
		   {
		     $now2 = date('Y-m-d');
			 
			 $query_check = "SELECT * FROM verified WHERE sno = '$sno2'";
			 $rs1 = mysql_query($query_check);
			 $rows11 = mysql_num_rows($rs1);
			 if ($rows11 != 0)
			 { 
			    die("Record Already verified")  ;
			 }
			 else
			 {
			 
			 $query = "SELECT * FROM unverified WHERE sno = '$sno'";
		     $rs = mysql_query($query);
		     $rows = mysql_num_rows($rs);
			 
			 $rs2 = mysql_fetch_assoc($rs);
			  $sno2 = $rs2['sno'];
			  $userid = $rs2['userid'];
			  $cat = $rs2['category'];
			  $ad = $rs2['ad'];
			  $add = $rs2['contact'];
			  $exp = $rs2['expiry'];
			 
			  $insrt = "INSERT INTO verified VALUES ('$sno2','$userid','$cat','$ad','$add','$exp','$now2')"; 
			  $del = "DELETE FROM unverified WHERE sno = '$sno2'";
			  $del2 = "DELETE FROM messages WHERE sno = '$sno2'";
			  mysql_query($insrt) or die (mysql_error());
			  mysql_query($del2) or die (mysql_error());
			  mysql_query($del) or die (mysql_error());
			  echo "Record Verified"; 
			 }
		   } ?>
	  </fieldset>
	</div>
	<div id = "delete">
	    <fieldset>
		 <legend>Delete an ad</legend>
		 <form method = "get">
		  <table>
		    <tr>
			  <td><input type = "text" name = "sad" placeholder = "Search Ad by SNo"></td>
			  <td><select name = "typeof">
			      <option value = ""></option>
				  <option value = "verified">Verified</option>
				  <option value = "unverified">Unverified</option>
				  </select>
			  </td>
			</tr>
			<tr>
			 <td align = "center"><input type = "submit" name = "deletead" value = "Delete"></td>
			</tr>
		  </table>
		 </form>

		<?php
		  if (isset($_GET['deletead']))
		  {
		    if (empty($_GET['typeof']) || empty($_GET['sad']))
			{?>
			   <div id ="delerr"><?php print ("Complete all fields");?> </div>
			   <?php
			    
			}
		   else{	
			$table = $_GET['typeof'];
			$sn = htmlspecialchars($_GET['sad']);
			$query = "SELECT * FROM ".$table." WHERE sno = '$sn'";
			$r = mysql_query($query) or die (mysql_error());
			if (mysql_num_rows($r) == 0)
			{?>
			  <div id = "delerr"><?php echo "The ad doesn't exist check the displayed values";?> </div>
		  <?php
			}
			else
			{
			  $query2 = "DELETE FROM ".$table." WHERE sno = '$sn'";
			  mysql_query($query2) or die(mysql_error());
			  ?>
			  <div id = "delerr"><?php echo "Record deleted";?> </div>
			<?php
			}
		  }
		  }
		?>
	  </fieldset>
	 </div>
	<div id = "reports">
	  <fieldset>
	    <legend>Reports</legend>
	   <form>
		<table>
		 <tr>
		   <td><input type = "submit" name = "users" value = "# of Users"/></td>
		 </tr>
		 
		 <tr>
		   <td><input type = "submit" name = "unverified" value = "Unverified Ads"/></td>
		 </tr>
		 <tr>
		   <td><input type = "submit" name = "verified" value = "Verified Ads"/></td>
		 </tr>
		</table>
	    </form>
	  </fieldset>
	  <?php
	  if (isset($_GET['users']))
	  {
	     mysql_connect("localhost","root","root") or die ("Could not connect to the db");
 
         $connect = mysql_selectdb("usoko") or die ("Db does not exist"); 
		 
		 $q = "SELECT * FROM usrs";
		 $q2 = mysql_query($q);
		 $rows = mysql_num_rows($q2);
		 ?>
		 <div id = "usrs" ><?php echo $rows?> users have registered</div>
		 <?php
		 
	  }
	  if ((isset($_GET['unverified'])) || (isset($_GET['verified'])))
	  {
	     if (isset($_GET['unverified']))
		 {
		     $table = "unverified";
		 }
	     else 
		 {
		   $table = "verified";
		 } 
	     mysql_connect("localhost","root","root") or die ("Could not connect to the db");
 
         $connect = mysql_selectdb("usoko") or die ("Db does not exist"); 
		 
		 $qphones = "SELECT * FROM $table WHERE category = 'phone'";
		 $qroom = "SELECT * FROM $table WHERE category = 'room'";
		 $qlap = "SELECT * FROM $table WHERE category = 'laptop'";
		 
		 $rphones = mysql_query($qphones);
		 $room = mysql_query($qroom) or die(mysql_query());
		 $rlap = mysql_query($qlap);
		 
		 $phones = mysql_num_rows($rphones);
		 $r = mysql_num_rows($room);
		 $lap = mysql_num_rows($rlap);
		 
		 $total = $phones + $r + $lap;?>
		 <div id = "unv" >
		 <table>
		  <tr> <th><?php echo "Summary of the ".$table." ads" ?></th></tr>
		 
		 <tr><td>Phones: <?php  if ($phones != 0){ echo $phones;}else{ echo "No Phone-ads";}?></td></tr>
		 <tr><td>Room: <?php  if ($r != 0){ echo $r;}else{ echo "No Room-ads";}?></td></tr>
		 <tr><td>Laptops: <?php  if ($lap != 0){ echo $lap;}else{ echo "No Laptop-ads";}?></td></tr>
		 <tr><td>Total <?php  if ($total != 0){ echo $total;}else{ echo "No Ads";}?></td></tr>
		 </table>
		 </div>
	 <?php }
	  ?> 
	</div>
  </body>
</html>