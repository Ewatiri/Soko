<?php
  session_start();
  $userid = $_SESSION['uid'];
  if (!($userid)){
     header('Location: log.php');
	 }
  if (isset($_GET['logout']) && $userid)
	 {
	    session_destroy();
		header('Location: log.php');
	 }
?>
<html>
  <head>
    <title>U-soKo</title>
	<link rel = "stylesheet" type = "text/css" href="css/user.css"/>
	<script type = "text/javascript" src="js/jquery2.js"></script>
	<script type = "text/javascript" src="js/user.js"></script>
  </head>
  <body>
    <div id = "logo">
	  <img src = "images/logo41.png"/>
	</div>
	<div id="ddtabs2" class="content">
      <table id = "menu">
        <tr>
		 <td>
		  <a class="current" href="#" onclick = "showAds();">
		  <span>My Ads</span>
		  </a>
		  </td>
		  <td>
		    <a class="" href="#" onclick = "showProfile();">
		    <span>My Profile</span>
		    </a>
		  </td>
		  <td>
		    <a class="" href="#" onclick = "showEmail()">
		    <span>Email Admin</span>
		    </a>
		  </td>
		</tr>
	 </table>
    </div>
 <div id = "all">
  	<div id = "myads">
	  <div id = "create">
	    <fieldset>
		<legend> Create New Ad</legend>
		  <form id = "newad" method = "get">
		    <table cellspacing = "5">
			 <span id = "msg"></span>
		     <tr>
			   <td>Ad Category</td>
			   <td><select name = "type">
			       <option value = ""></option>
				   <option value = "phone">Phones</option>
				   <option value = "laptop">Laptop</option>
				   <option value = "room">Room</option>
			  </td>
			  </tr>
			  <tr>
			    <td>Ad Description:</td>
				<td><textarea placeholder = "Description" name = "desc"  cols = "30"></textarea></td>
				<td>Not more than 100 chars</td>
			  </tr>
			  <tr>
			    <td>Valid till</td>
				<td><input type = "text" placeholder = "Date" name = "vdate"/></td>
			  </tr>
			  <tr>
			    <td>Contact Details</td>
				<td><input type = "text" placeholder = "Phone number/email" name = "addr"/></td>
			  </tr>
		   </table>
		  </form>
		  <input type = "submit" name = "subm" value = "Submit" onclick = "valdat()"/>
		</fieldset>
		
	  </div>
	  <div id = "status">
	    <fieldset>
		  <legend>Unverified Ads</legend>
		  <?php
		    mysql_connect('localhost','root','root');
            mysql_selectdb("usoko") or die ("Database doesn't exist");
			
		    
		    $query = "SELECT * FROM unverified WHERE userid = '$userid'";
			$reply = mysql_query($query);
			$numrows = mysql_num_rows($reply);
			if ($numrows == 0)
			   echo "No Ads";
			else
			{?>
			 <table cellpadding ="20">
			   <tr>
			     <td>Sno</td>
				 <td>Category</td>
				 <td>Ad</td>
			   </tr>
			  <?php
			  while($row = mysql_fetch_assoc($reply))
			  {?>
			    <tr>
				  <td><?php print $row['sno'];?></td>
				  <td><?php print $row['category'];?></td>
				  <td><?php print $row['ad'];?></td>
				</tr>
			  <?php }?>
			 </table>
	        <?php } ?>
		  
		</fieldset>
		<fieldset>
		  <legend>Verified Ads</legend>
		  <?php
		    mysql_connect('localhost','root','root');
            mysql_selectdb("usoko") or die ("Database doesn't exist");
			
		    //$ind = $_SESSION['index'];
			$query = "SELECT * FROM verified WHERE userid = '$userid'";
			$reply = mysql_query($query);
			$numrows = mysql_num_rows($reply);
			if ($numrows == 0)
			   echo "No Ads";
			else
			{?>
			 <table cellpadding = "20">
			   <tr>
			     <td>Sno</td>
				 <td>Category</td>
				 <td>Ad</td>
				 <td>Verification Date</td>
			   </tr>
			  <?php
			  while($row = mysql_fetch_assoc($reply))
			  {?>
			    <tr>
				  <td><?php print $row['sno'];?></td>
				  <td><?php print $row['category'];?></td>
				  <td><?php print $row['ad'];?></td>
				  <td><?php print $row['vdate'];?></td>
				</tr>
			  <?php }?>
			 </table>
	        <?php } ?>
		  
		</fieldset>
	  </div>
	</div>
	<div>
	  <form method = "get">
      <input type = "submit" name = "logout" value = "Logout"/>	
	  </form>
	</div>
	<?php
	  mysql_connect("localhost","root","root") or die ("Could not connect to the db");
      $connect = mysql_selectdb("usoko") or die ("Db does not exist");
	  $sel = "SELECT * FROM usrs WHERE  userid = '$userid'";
	  $q = mysql_query($sel) or die(mysql_error());
	  $n = mysql_fetch_array($q);
	  $myname = $n['name'];
	  $myemail =$n['email'];
	 ?>
	 <div id = "delete">
	    <fieldset>
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
			 <td><input type = "submit" name = "deletead" value = "Delete"></td>
			</tr>
		  </table>
		 </form>
		</fieldset>
		<?php
		  if (isset($_GET['deletead']))
		  {
		    if (empty($_GET['typeof']) || empty($_GET['sad']))
			{?>
			   <div><?php echo "Complete all fields";?> </div>
			   <?php
			     die();
			}
			
			$table = $_GET['typeof'];
			$sn = htmlspecialchars($_GET['sad']);
			$query = "SELECT * FROM ".$table." WHERE userid = '$userid' and sno = '$sn'";
			$r = mysql_query($query) or die (mysql_error());
			if (mysql_num_rows($r) == 0)
			{?>
			  <div id = "delerr"><?php echo "The ad doesn't exist check the displayed values";?> </div>
		  <?php
			}
			else
			{
			  $query2 = "DELETE FROM ".$table." WHERE userid = '$userid' and sno = '$sn'";
			  mysql_query($query2) or die(mysql_error());
			  ?>
			  <div id = "delerr"><?php echo "Record deleted";?> </div>
			<?php
			}
		  }
		?>
	 </div>
	 
	<div id = "myprofile">
	  <fieldset>
	  <form id = "my" method = "post">
	    <legend>My Details</legend>
		<div id = "msg2"></div>
		<table cellpadding = "20">
		  <tr>
		    <th></th>
			<th>Current Details</th>
			<th>Change to</th>
		  </tr>
		  <tr>
		    <td>Name:</td>
			<td><?php print $myname?></td>
		  </tr>
		  <tr>
		    <td>Email Address:</td>
			<td><?php print $myemail?></td>
			<td><input type = "text" name = "changemail"></td>
		  </tr>
		  <tr>
		    <td>Password</td>
			<td>N/A</td>
			<td><input type = "password" name = "changepass"></td>
		  </tr>
		  
		 </table>
	
	   </form>
	   	<input type = "submit" name = "change" value = "Change" onclick = "valdat2()"/>
	 </fieldset>
	 
	</div>
	<div id ="emailad" >
	  <fieldset>
	   <legend>Drop me an email!</legend>
	     <span>Remember to quote the Transaction Reference Number:</span>
	    <form method = "post"id = "smsg">
		 <p id = "msgmy"></p>
		  <table>
		    <tr>
			  <td><input type = "text" placeholder ="Subject" name = "subj"><td>
			  <td><input type = "text" placeholder ="Ad No" name = "adsno"><td>
			 </tr>
			 <tr>
			  <td><textarea placeholder = "Message" cols = "100" rows ="10" name = "mymsg"></textarea><td>
			 </tr>
		   </table>
		</form>
		<input type = "submit" value = "Send Email" onclick = "sendmail()"/>
	  </fieldset>
	</div>
</div>
   </body>
</html>