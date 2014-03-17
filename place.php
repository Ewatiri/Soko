<?php
 if  (isset($_POST['btn']))
 {
     if (empty($_POST['pw']) || empty($_POST['uname']))
	echo "Error";
	 else
	   $error = false;
 }

?>

<html>
  <head>
    <title>U-soKo</title>
	<link rel = "stylesheet" type = "text/css" href="css/place.css"/>
  </head>
  <body>
    <div id = "logo">
	  <img src = "images/logo41.png"/>
	</div>
	
    <div class = "content">
	  <?php
	  if ($error)
	     "Invalid details" 
	   
	   ?>
	   <form action = "place.php"  id = "log" method = "post" name = "log" >
         <fieldset class = "theform">		 
		    <table cellpadding =  "2">
			<legend>Login</legend>
			 
			  <tr>
			    <td> <label for = "username"> User Name </label></td>
		        <td> <input type = "text" id = "username" name = "uname" placeholder = "Username"> </td>
			   </tr>
			  <br/>
			  <tr>
			    <td><label for = "pword"> Password </label></td>
		        <td><input type = "password" id = "pword" name = "pw" placeholder = "Password"></td>
			  </tr>
			  <tr>
                <td><input type = "submit" value = "login" name = "btn" id = "login"></td>			  
				<td><input type = "submit" value = "Cancel" name = "cancel" id = "cancel"></td>
			  </tr>
			  </table>
			   </fieldset>
		 </form>
	  </div>
  </body>
</html>