<?php
  mysql_connect("localhost","root","root") or die ("Could not connect to the db");
  $connect = mysql_selectdb("usoko") or die (mysql_error());
if (!(isset($_GET['filter'])))
{
  $query = "SELECT * FROM verified";
  $rows1 = mysql_query($query) or die("Not selectable");
}
 else if(isset($_GET['filter']) && !(empty($_GET['type'])))
 { 
   $adt = $_GET['type'];
   $query = "SELECT * FROM verified where category = '$adt'";
   $rows1 = mysql_query($query) or die("Not selectable");
   $r = mysql_num_rows($rows1);
 
 }
 else if(isset($_GET['filter']) && (empty($_GET['type'])))
 {
    echo("Select a category");
	exit();
 }
  $i = 0;
  while($rt = mysql_fetch_assoc($rows1))
  {
    $ad = $rt['ad'];
	$contact = $rt['contact'];
	$category = $rt['category'];
	
	 if ($i%3 == 0)
	   $image = "images/bg2.png";
	  else if ($i%3 == 1)
	    $image = "images/bg3.png";
	   else 
	     $image = "images/bg6.jpg";
  ?>
  <div id = "myad">
    <ul>
	   
       <?php echo "<span id = 'ady'>$ad</span>"?><br/>
	   <?php echo "<span id = 'cat'>$category</span>"?><br/>
	   <?php echo "<span id = 'ctc'>Contact: $contact</span>"?>
	   <li>
	   <img src =<?php echo $image?>  width = "250" height ="250" >
	   </li>
	   
	</ul>
  </div>
  <?php 
   $i++;
  }
 

?>

<html>
  <head>
    <title>u-soKo Ads</title>
	<script type = "text/javascript" src="js/jquery2.js"></script>
	<script type = "text/javascript" src="js/admin.js"></script>
	<style type = "text/css">
	  @font-face {
      font-family: JustMeAgainDownHere;
      src: url("fonts/JustMeAgainDownHere.ttf");
	  }
	  *{
	   font-family: JustMeAgainDownHere;
	   font-size: 20px;
	  }
	  body{
	  background: url("images/display.jpg");
	  }
	  #err{
	  color:red;
	  font-size: 40px;
	  margin-left:500px;
	  position:absolute;
	  }
	  #myad{
	   margin-left: 200px;
	   margin-top: 100px;
	   height: 200px;
	   float: left;
	   }
	   #ady{
	   margin-left: 30px;
	   margin-top: 70px;
	   position: absolute;
	   width: 200px;
	   }
	   #cat{
	   position: absolute;
	   margin-left: 18px;
	   margin-top: 150px;
	   }
	   #ctc{
	   position: absolute;
	   margin-left: 18px;
	   margin-top: 200px;
	   }
	   ul{
	   list-style: none;
	   }
	   #logo{
       height: 70px;
       width: 70px;
	   position: absolute;
	   margin-top:0px;
       }
	   #logo img{
       height: 170px;
       width:130px;
       background: none;
      }
	  #user{
	    position: absolute;
		margin-left:240px;
		z-index: 0;
		width: 100%;
		border-bottom: 1px solid;
	  }
	 
  </style>
  </head>
  <body>
    <div id = "logo">
	  <img src = "images/logo41.png"/>
	</div>
	<div id = "user">
	  <form>
	    <table>
		  <tr>
		       <td><select name = "type">
			       <option value = ""></option>
				   <option value = "phone">Phones</option>
				   <option value = "laptop">Laptop</option>
				   <option value = "room">Room</option>
			  </td>
			  <td>
			    <input type = "submit" name = "filter" value = "Filter"/>
			  </td>
		  </tr>
		</table>
	  </form>
	</div>
  </body>
</html>
