window.onload = initAll();

var cur = 0;
var imgsrc = new Array ("images/gallery/smile1.jpg","images/gallery/tired2.jpg","images/gallery/tired.jpg");

function initAll()
{
 setInterval("nextSlide()",2000);
}

function nextSlide(){
   slideIn(-1);
}
function slideIn(i)
{
   if(cur < 3)
      cur += 1;
  if (cur == imgsrc.length)
	  cur = 0;
	
  document.getElementById('sld').src = imgsrc[cur];
  document.getElementById('h').innerHTML = cur;
	//document.write(cur);
    //initAll();
}