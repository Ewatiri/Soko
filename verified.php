<?php
  ?>
  <table cellpadding = "25" id = "dta1">
	  <tr>
	    <th>Sno</th>
		<th>User Id </th>
		<th>Category</th>
		<th>Ad </th>
		<th>Expiry date</th>
		<th>Verification date</th>
		<th>Select</th>
	 </tr>
	
<?php
  mysql_connect("localhost","root","root") or die ("Could not connect to the db");
  $connect = mysql_selectdb("usoko") or die ("Db does not exist");
  $query = "SELECT * FROM verified";
  $rows1 = mysql_query($query) or die("Not selectable");?>
  
<?php
  while($rt = mysql_fetch_assoc($rows1))
  {
    $sno = $rt['sno'];
	$uid = $rt['userid'];
	$cat = $rt['category'];
	$ad = $rt['ad'];
	$exp = $rt['expiry'];
	$vd = $rt['vday'];
	?>
	<table cellpadding = "30" id = "dta">
	 <tr>	 
	    <td><?php echo $sno?></td>
		<td><?php echo $uid?></td>
		<td><?php echo $cat?></td>
		<td><?php echo $ad?></td>
		<td><?php echo $exp?></td>
		<td><?php echo $vd?></td>
		<td><input type = "radio" name = <?php$sno?> </td>
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
	 #dta1{
	  margin-left: 190px;
	  background:  url("../images/clip2.png");
	  font-family: Schoolbell;
	 }
	</style>
  </head>
  <body>
  
  </body>
</html>
