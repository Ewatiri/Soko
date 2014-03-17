function checkUser(){
 $.ajax({
    type: "post",
	url:'http://localhost/mystuff/Soko/adminval.php',
	data: $('#formdata').serialize(),
	success:
	  function (data)
	  {
	    if (data == 3)
		{
		  window.location = "adminhome.php";
		}
		else{
	    document.getElementById("msg2").innerHTML = data ;
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



function loadImg (size)
{
  var imgsrc = new Array("bg1.png","bg2.png","bg3.png","bg6.jpg")
  var ext = "images/";
  var img;
  if (size < 50)
  {
    $("#ady").css("margin-left:32px");
	$("#ady").css("margin-top:80px");
	$("#ctc").css("margin-top:175px");
	$("#ctc").css("margin-left:32px");
     return (ext+"bg6.png");
  }
  var l = Math.floor(Math.random() * 5);
  img = ext + imgsrc[l];
  return img;
}