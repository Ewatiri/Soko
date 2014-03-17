<?php
  session_start();
?>
<html>
  <head>
    <title>u-soKo Admin</title>
	<style type = "text/css">
	  @font-face {
      font-family: Dancing Script;
      src: url("fonts/DancingScript-Regular.ttf");
	  }
	  *{
	  font-family: Dancing Script;
	  font-size: 30px;
	  }
	  #log{
	  background:#404040;
	  width: 700px;
	  height: 400px;
	  border-color: red;
	  border: 3px solid;
	  margin-left: 400px;
	  margin-top: 150px;
	  color: #ffffff;
	  }
	  #msg2{
	  color: red;
	  }
	  #log2{
	  margin-left: 250px;
	  }
	</style>
	<script type = "text/javascript" src="js/jquery2.js"></script>
	<script type = "text/javascript" src="js/admin.js"></script>
  </head>
  <body>
    <div id = "log">
	  <form method = "post" id = "formdata">
	    <div id = "msg2"></div>
	    <table cellpadding ="40">
		  <tr>
		    <td>Id:</td>
			<td><input type = "text" name = "uname"/></td>
		  </tr>
		  <tr>
		    <td>Password:</td>
		    <td><input type = "password" name = "pword"/></td>
		  </tr>
		 </table>
	  </form>
	   <input id = "log2" type = "submit" name = "subm" value = "Login"  onclick = "checkUser();"/>
    </div>	
  </body>
</html>
