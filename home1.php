<html>
  <head>
    <title>U-soKo</title>
	 <link rel = "stylesheet" type = "text/css" href="css/proj.css"/>
	 <script type = "text/javascript" src="js/jquery.js"></script>
	 <script type = "text/javascript" src="js/proj.js"></script>
  </head>
  <body id = "adbody">
    <div class = "logo">
      <img id = "lg" src = "images/logo.png" height =  "100" width = "90">
	  U-soKo
	</div>
	<div id = "menu">
	    <button id = "home">Home</button>
		<button id = "vad" onclick  >View ads</button>
		   <ul id = "submenu">
		     <li>Phones</li>
		     <li>Room Ads</li>
		     <li>Laptops</li>
		     <li>Jobs</li>
			 </ul>
		
		<button id = "cont" onclick =  "peek();">Contact us </button>
		   <div id = "contact">
		     <form name = "msg" id = "smsg">
			    <p><h3>Contact information</h3></p>
				<p>We are located in Manhattan NY, 3rd Avenue opposite the StarBucks Coffee Shop :-) </p>
				<p>Phone Number: +234 7888344</p>
			    <table>
				  <tr>
				     <td>Name:</td>
				  </tr>
				   <tr>
				     <td><input type = "text"></td>
				  </tr>
				  <tr>
				     <td>Email address:</td>
				  </tr>
				   <tr>
				     <td><input type = "text"></td>
				  </tr>
				  <tr>
				     <td>Subject:</td>
				  </tr>
				  <tr>
				     <td><input type = "text"></td>
				  </tr>
				  <tr>
				     <td>Message:</td>
				  </tr>
				  <tr>
				   <td> <textarea></textarea>
				  </tr>
				  <tr>
				     <td><input type = "submit" value = "send"></td>
				  </tr>
				</table>
			 </form>
		   </div>
		<button class = "aus" id = "us" >About Us</button>
	 </div>
  </body>
</html>