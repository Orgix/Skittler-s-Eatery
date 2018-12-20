let container = document.getElementsByClassName('welcome-screen')[0];


let addedParallax = true;
let hasResizedToMd = false;

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