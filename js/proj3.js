window.onload = init;
// load images to an array
var captionh = new Array("Hey!",
"Are you tired of placing ads everywhere?",
"Yeah?",
"Well, relax",
"I have news for you",
"Usoko is here to help",
"Place your ad here",
"Sit back and wait for us to do all the work",
"While you wait for the phone to ring",
"I don't know why I'm here :-). Do you?");

var ext = "images/gallery/";
var cur = 0;
var imgsrc = new Array("smile1.jpg","tired.jpg","tired2.jpg",
"relaxdog.jpg","smiledog.jpg","vic.jpg","cat1.jpg","sitback.jpg",
"dog1.jpg","smile2.jpg");

function init(){
setInterval("setImg()",3000);
}
function setImg(){
 fadeImg(-1);
}
function fadeImg( i ){
 if (cur < 3)
     cur += 1;
 if (cur == imgsrc.length)
    cur = 0;
 var loc = ext + imgsrc[cur]	 ;
 var cap = captionh[cur];
 
  $("#frame").css({"background-image":"url("+loc+")",}).fadeIn('slow');
  $("#caption").html(cap).fadeIn('slow');
}

function contactus(){
$(document).ready(function(){
  $("#msg").show();
  $("#cnt").hide();
});
}
function showHome(){
$(document).ready(function(){
  $("#msg").hide();
  $("#cnt").show();
});
}
