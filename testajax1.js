function ajaxfunction(){
 $.ajax({
    type: "post",
	url:'val.php',
	data: $('#uform').serialize(),
	success:
	  function (data)
	  {
        alert(data.responseText);	   
	  }
	 , 
	error: 
	  function (data)
	  {
	  console.log(data);
	    //alert("Hey ");
	  }
   });
}