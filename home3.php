<?php
  if (isset($_POST['send']))
  {
    if (empty($_POST['name']) || empty($_POST['subject'])||empty($_POST['message']) || empty($_POST['email']))
	{
	  ?>
	  
	  <div><?php die("Complete all fields")?></div>
	<?php  
	}
    $to = "watiri.eva92@gmail.com";
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$from = $_POST['email'];
	$headers = "From: $from";
	mail($to,$subject,$message,$headers) or die();;
	
  }
?>

<html>
  <head>
    <title>U-soKo</title>
	<link rel = "stylesheet" type = "text/css" href="css/proj3.css"/>
	<script type = "text/javascript" src="js/jquery.js"></script>
	<script type = "text/javascript" src="js/proj3.js"></script>
  </head>
  <body>
    <div id = "logo">
	  <img src = "images/logo41.png"/>
	</div>
	
    <div class = "navigator">
	
	  <ul>
	    <li>
		  <a href = "#" onclick = "showHome()">
		     <image id = "homenote" src= "images/homenote.png">
			 <span id = "home">Home</span>
		  </a>
		</li>
		<li>
		  <a href = "display.php">
		    <image id = "whitenote" src = "images/whitenote0.png">
		    <span id = "view">View Ads</span>
		   </a>
		</li>
		<li>
		  <a href = "log.php">
		   <image id = "pinknote" src= "images/pinknote.png">
		   <span id = "place">Place Ad</span>
		   </a>
		</li>
	  </ul>
	 </div>
	 
	  
	  
	  <div class = "content">
	    
	    <div id = "frame">
	      <img src = "images/fream.png"/>
		  <span id = "caption">u-soKo</span>
	    </div>   
		<div id = "cnt">
		<span >
		    <p>Hello there! Welcome to U-soKo!</p>
			<p>Log-in, place your ad here :-) </p>
		 </span>
	    </div>
     </div>
	 
	 <div class = "footer">
	  <a href = "#" onclick = "contactus()">
	   <img id = "abtus2" src = "images/abtus.png"/>
	   <span id = "abtus">Contact us</span>
	  </a>
	 </div>
	 <div id = "msg">
	   <fieldset>
	     <span>Got any questions? Write to us!<span>
		 <form method = "post">
		   <table>
		     <tr>
			   <td><input type = "text" name = "name" placeholder = "Your name"></td>
			 </tr>
			 <tr>
			   <td><input type = "text" name = "email" placeholder = "Your Email-Address"></td>
			 </tr>
			  <tr>
			   <td><input type = "text" name = "subject" placeholder = "Message Subject"></td>
			 </tr>
			  <tr>
			   <td><textarea cols = "30" rows ="5" placeholder = "Message" name = "message"></textarea></td>
			 </tr>
			 <tr>
			   <td><input type = "submit" value = "Send Message" name = "send" ></td>
			 </tr>
		   </table>
		   
		 </form>
	  </fieldset>
	 </div>
  </body>
</html>