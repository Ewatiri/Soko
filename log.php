<html>
  <head>
    <title>U-soKo Login</title>
	<link rel = "stylesheet" type = "text/css" href="css/log.css"/>
	<script type = "text/javascript" src="js/jquery2.js"></script>
	<script type = "text/javascript" src="js/log.js"></script>
  </head>
  <body>
    <div id = "logo">
	  <img src = "images/logo41.png"/>
	</div>
	<div class ="navbar">
	  <ul>
	    <a onclick = "peek_panel1();" href = "#">
		  <li>
		    <img src = "images/login.png">
			<span id = "lg">Login</span>
		  </li>
		</a>
		<a onclick = "peek_panel2();" href = "#">
		  <li>
		    <img src = "images/signup.png">
			<span id = "sup">Signup</span>
		  </li>
		  
		</a>
	  </ul>
	</div>
	
	<br/>
		
	<div id = "panel1">
	   <span id = "err"> </span>
	    <form action = "place.php"  id = "log" method = "post" >
            <fieldset class = "theform">		 
	          <table cellpadding =  "15">
	            <legend>Login</legend>
		          <tr>
		    		<td> <label for = "emailadd"> Email Address </label></td>
					<td> <input type = "text" id = "emailaddy" name = "emailadd" placeholder = "Email Address"> </td>
			      </tr>
				  <br/>
				  <tr>
					<td><label for = "pword"> Password </label></td>
					<td><input type = "password" id = "pword" name = "pw" placeholder = "Password"></td>
			      </tr>
			  </table>
	       </fieldset>
		</form>
			<td><input type = "submit" value = "login" name = "btn" id = "login" onclick = "valdat();"></td>			  
	</div>
	
	<div id = "panel2">
	
	 <form name = "udet" action = "log.php" class = "theform" method = "post" id = "uform">
	    <span id = "err1"></span>    
	   <fieldset>
	    <table cellpadding = "15">
	      <legend>Contact Details</legend>
	
		  <tr>
		    <td><label for = "firname">First Name*</label></td>
			<td><input type = "text" name = "firname" id = "fname" placeholder = "First Name"></td>
		  </tr>
		  <tr>
		    <td><label for = "mname">Middle Name*</label></td>
			<td><input type = "text" name = "mname" id = "mname" placeholder = "Middle Name"></td>
		  </tr>
		  <tr>
		    <td><label for = "sname">Surname*</label></td>
			<td><input type = "text" name = "sname" id = "surname" placeholder = "Surname"></td>
		  </tr>
		  <tr>
		    <td><label for = "pword">Password*</label></td>
			<td><input type = "Password" name = "pword" id = "word1" placeholder = "Password"></td>
		  </tr>
		   <tr>
		    <td><label for = "pword2">Confirm Password*</label></td>
			<td><input type = "Password" name = "pword2" id = "word2" placeholder = "Password"></td>
		  </tr>
		  <tr>
		    <td><label for = "eadd">Email Address*</label></td>
			<td><input type = "text" name = "eadd" id = "add" placeholder = "Email Address"></td>
		  </tr>
		  <tr>
		    
		  </tr>
		 </table>
		 
	  </fieldset>
	 </form>
	   <input type ="submit" name = "Register" id = "reg" value = "Register" onclick = "ajaxfunction()"/>
	</div>
			
  </body>
</html>