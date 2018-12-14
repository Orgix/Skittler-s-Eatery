/*Targeting divs*/

let container = document.getElementsByClassName('welcome-screen')[0];


/*boolean for avoiding perfoming multiple copyContent() and unnecessary class add/remove. Mainly for the resize event*/

let addedParallax = true;
let hasResizedToMd = false;

/*pixel limit that will be useful in the events*/
const limit = 768;

/*Returns browser's innerWidth value. Useful for checking*/
const getWindowWidth = () =>{
  return window.innerWidth;
}

/*Simple function to copy the content from the targeted elements to another set of targeted elements*/
const copyContent = () =>{


}

const toggleBooleans = () => {
  hasResizedToMd = !hasResizedToMd
  addedParallax = !addedParallax
}

const addParallax = () => {

  container.parentNode.classList.remove("medium-below")
  container.setAttribute("data-parallax","scroll")
  container.setAttribute("data-image-src","../img/1-1949-.jpg");
  toggleBooleans();
}

const removeParallax = () =>{

  container.parentNode.classList.add("medium-below");
  container.removeAttribute("data-parallax");
  container.removeAttribute("data-image-src");
  toggleBooleans();
}

/*Verify breakpoint*/
const breakpointVerification = ()=>{
  return getWindowWidth() <= limit ? true : false;
}

/*Events for footer accordion and parallax container*/
window.addEventListener("load",()=>{
  if(breakpointVerification()) {
    removeParallax();
  }
});

window.addEventListener("resize",()=>{
    if(breakpointVerification()) {

      if(!hasResizedToMd){
        removeParallax();
      }
    }
    else{
        if(!addedParallax){
          addParallax();
        }
    }
});
