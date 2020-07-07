const Banner = document.getElementsByClassName("js-banner-wrap");
var slideIndex = 0;
carousel();
function carousel() {
  let len = Banner.length; 
  for (let i = 0; i < len; i++) {
    Banner[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > len) {slideIndex = 1}
  Banner[slideIndex-1].style.display = "flex";
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
