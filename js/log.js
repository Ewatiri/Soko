function valdat(){
 $.ajax({
    type: "post",
	url:'http://localhost/Stuff/Soko/ulog.php',
	data: $('#log').serialize(),
	success:
	  function (data)
	  {
	   if (data !=1)
	   {
	     if (data == 0)
		   data = "Invalid a/c details";
		
         document.getElementById("err").innerHTML = data ;
	     $("#err").css({"color":"green"});
	   }
	   else if (data == 1){
	    window.location = "userform.php";
	   }
	  }
	 , 
	error: 
	  function (data)
	  {
	   console.log(data);
	  }
   });
}
function ajaxfunction(){
 $.ajax({
    type: "post",
	url:'http://localhost/mystuff/Soko/logval.php',
	data: $('#uform').serialize(),
	success:
	  function (data)
	  {
	   if (data != 1)
	   {
        document.getElementById("err1").innerHTML = data ;
		$("#err1").css({"color":"green"});
	   }
	   else if (data == 1){
	    window.location = "userform.php";
	   }
	  }
	 , 
	error: 
	  function (data)
	  {
	   console.log(data);
	  }
   });
}

function peek_panel1(){
  $(document).ready(function(){
     $("#panel1").slideToggle();
	 $("#panel2").slideUp();
    });
  
}
function peek_panel2(){
  $(document).ready(function(){
     $("#panel2").slideToggle();
	 $("#panel1").slideUp();
    });

}
