document.addEventListener('DOMContentLoaded', ChangeIMG);
function ChangeIMG() {
  var GalleryLinks = document.getElementById('Gallery_Links');
  var Links = GalleryLinks.querySelectorAll('a');

  for (var i = 0; i < Links.length; i++) {
    Links[i].onclick = function() {
      var IMGHref = this.href;
      var GalleryIMG = document.getElementById("GalleryIMG");
      GalleryIMG.src = IMGHref;
      var blockCaption = this.title;
      var blockCaptionParagraph = document.getElementById("Caption");
      blockCaptionParagraph.innerHTML = blockCaption;
      return false;
    }
  }
}