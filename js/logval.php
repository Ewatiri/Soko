<?php
if (isset($_POST['Register']))
{
  if (empty($_POST['firname']) ||empty($_POST['mname']) || empty($_POST['sname']) || empty($_POST['pword']) || empty($_POST['pword2']) || empty($_POST['eadd']))
  {
     $error = 1;
  }
  
   else
 
     $error = 0;

   echo $error;
  
}

?>