<html>
  <head>
    <link rel = "stylesheet" type = "text/css" href="css/proj2.css"/>
	<script type = "text/javascript" src="js/jquery.js"></script>
	 <script type = "text/javascript" src="js/proj2.js"></script>
	<title>U-soKo</title>
  </head>
  <body>
   <div id = "hi">
    Hey there
   </div>
    <div id = "logo">
	 <img src = "images/logo2.jpg"/>
	</div>
	<div class = "navigator">
     <ul>
	  <li>
	    <a href = "#">
		 <img src = "images/home2.png"/>
		</a>
	  </li>
	  <li>
	    <a href = "#">
		 <img src = "images/view.png"/>
		</a>
	  </li>
	  <li>
	    <a href = "#" onclick = "peek();">
		 <img src = "images/place.png"/>
		</a>
		<p class= "adp">
		  <form id = "placead">
		    <table>
			  <tr>
			    <td>First Name*</td>
				<td><input type = "text"></td>
			  </tr>
			  <tr>
			    <td>Middle Name*</td>
				<td><input type = "text"></td>
			  </tr>
			  <tr>
			    <td>Surname*</td>
				<td><input type = "text"></td>
			  </tr>
			  <tr>
			    <td>E-mail Add*</td>
				<td><input type = "text"></td>
			  </tr>
			  <tr>
			    <td>Ad Category*
				<td><select name= "adcat">
				  <option value = ""> </option>
				  <option value = "phones">Phones</option>
				  <option value = "laptops">Laptops</option>
				  <option value = "jobAd">Jobs</option>
				  <option value = "room">Room</option></select>
				 </td>
			  </tr>
			</table>
		  </form>
		</p>
	  </li>
	  <li>
	    <a href = "#">
		 <img src = "images/contact1.png"/>
		</a>
	  </li>
	  <li>
	    <a href = "#">
		 <img src = "images/us4.png"/>
		</a>
	  </li>
     </ul>	
	</div>
	
  </body>
</html>