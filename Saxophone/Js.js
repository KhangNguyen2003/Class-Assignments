document.addEventListener('DOMContentLoaded', changeImage);
function changeImage() {
  
var Links = document.querySelectorAll('a.PersonLink');
  
for(var i=0; i<Links.length; i++){
  
Links[i].onclick=function() {
var ImgHref = this.href;
var Image = document.getElementById("face");
Image.src = ImgHref;
  
console.log("clicked");
return false;
}  
}
}