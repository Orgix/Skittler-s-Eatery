/*Targeting divs*/


var goTopBtn = document.querySelector('.go_to_top');


/*pixel limit that will be useful in the events*/
const limit = 768;



/*Returns browser's innerWidth value. Useful for checking*/
const getWindowWidth = () =>{
  return window.innerWidth;
}

/*Simple function to copy the content from the targeted elements to another set of targeted elements*/
const copyContent = () =>{


}

/*Verify breakpoint*/
const breakpointVerification = ()=>{
  return getWindowWidth() <= limit ? true : false;
}

const trackScroll= () => {
  let scrolled = window.pageYOffset;
   coords = document.documentElement.clientHeight;

  if (scrolled > coords) {
    goTopBtn.classList.add('back_to_top-show');
  }
  if (scrolled < coords) {
    goTopBtn.classList.remove('back_to_top-show');
  }
}

function backToTop() {
  if (window.pageYOffset > 0) {
    window.scrollBy(0,-70);
    setTimeout(backToTop, 0);
  }
}








window.addEventListener('scroll', trackScroll);
goTopBtn.addEventListener('click', backToTop);
