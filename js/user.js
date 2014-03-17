window.onload = initTabs;
function initTabs(){
$(document).ready(function(){
$("#emailad").hide();
$("#myprofile").hide();
});
}
function showEmail(){
$(document).ready(function(){
$("#emailad").show();
$("#myads").hide();
$("#delete").hide();
$("#myprofile").hide();
});
}
function showProfile(){
$(document).ready(function(){
$("#emailad").hide();
$("#myads").hide();
$("#delete").hide();
$("#myprofile").show();
});
}
function showAds(){
$(document).ready(function(){
$("#emailad").hide();
$("#myads").show();
$("#delete").show();
$("#myprofile").hide();
});
}
function valdat(){
 $.ajax({
    type: "get",
	url:'http://localhost/mystuff/Soko/loguser.php',
	data: $('#newad').serialize(),
	success:
	  function (data)
	  {
	   
         document.getElementById("msg").innerHTML = data ;
	   
	  }
	 , 
	error: 
	  function (data)
	  {
	   console.log(data);
	  }
   });
}

function valdat2(){
 $.ajax({
    type: "post",
	url:'http://localhost/mystuff/Soko/changepass.php',
	data: $('#my').serialize(),
	success:
	  function (data)
	  {
	    document.getElementById("msg2").innerHTML = data ;
	   
	  }
	 , 
	error: 
	  function (data)
	  {
	   console.log(data);
	  }
   });
}

function sendmail(){
 $.ajax({
    type: "post",
	url:'http://localhost/mystuff/Soko/sendemail.php',
	data: $('#smsg').serialize(),
	success:
	  function (data)
	  {
	   
         document.getElementById("msgmy").innerHTML = data ;
	   
	  }
	 , 
	error: 
	  function (data)
	  {
	   console.log(data);
	  }
   });
}