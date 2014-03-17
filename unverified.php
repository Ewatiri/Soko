<?php
  mysql_connect("localhost","root","root") or die ("Could not connect to the db");
  $connect = mysql_selectdb("usoko") or die ("Db does not exist");
  $query = "SELECT * FROM unverified";
  $rows1 = mysql_query($query) or die("Not selectable");?>
  <div id = "dta">
  <table cellpadding = "30">
	  <tr>
	    <th>Sno</th>
		<th>User Id </th>
		<th>Category</th>
		<th>Ad </th>
		<th>Expiry date</th>
	 </tr>
  <?php while($rt = mysql_fetch_assoc($rows1))
  {
    $sno = $rt['sno'];
	$uid = $rt['userid'];
	$cat = $rt['category'];
	$ad = $rt['ad'];
	$exp = $rt['expiry'];
	?>
	
	
     <tr>	 
	    <td><?php print $sno?></td>
		<td><?php print $uid?></td>
		<td><?php print $cat?></td>
		<td><?php print $ad?></td>
		<td><?php print $exp?></td>
	 </tr>
	</table>
   </div>
  <?php } ?>
<html>
  <head>
    <style type = "text/css">
	@font-face {
    font-family: Schoolbell;
     src: url("../fonts/Schoolbell.ttf");
   }
	 #dta{
	  margin-left: 200px;
	  background:  url("../images/clip2.png");
	  font-family: Schoolbell;
	 }
	</style>
  </head>
  <body>
  </body>
</html>
