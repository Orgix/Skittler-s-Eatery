/*Targeting divs*/
const column1 = document.getElementById('col_1');
const column2 = document.getElementById('col_2');
const collapse1 = document.getElementById('collapseOne');
const collapse2 = document.getElementById('collapseTwo');

let container = document.getElementsByClassName('parallaxContainer')[0];


/*boolean for avoiding perfoming multiple copyContent() and unnecessary class add/remove. Mainly for the resize event*/
let hasContent = false;
let addedParallax = true;
let hasResizedToMd = false;

/*pixel limit that will be useful in the events*/
const limit = 768;
const parPath = phpPath;
/*Returns browser's innerWidth value. Useful for checking*/
const getWindowWidth = () => window.innerWidth


/*removing element function*/
const deleteElem = el =>{
 console.log(el);
 el.remove();
 console.log(el);
}

deleteElem(document.getElementById('path'))
/*Simple function to copy the content from the targeted elements to another set of targeted elements*/
const copyContent = () =>{
  let content = [column1.innerHTML, column2.innerHTML];

  collapse1.innerHTML = content[0];
  collapse2.innerHTML = content[1];
  hasContent = true;

}

const toggleBooleans = () => {
  hasResizedToMd = !hasResizedToMd
  addedParallax = !addedParallax
}

const addParallax = () => {

  container.classList.remove("medium-below")
  container.childNodes[1].setAttribute("data-parallax","scroll")
  container.childNodes[1].setAttribute("data-image-src","../"+parPath+"/img5.jpg");
  toggleBooleans();
}

const removeParallax = () =>{

  container.classList.add("medium-below");
  container.childNodes[1].removeAttribute("data-parallax");
  container.childNodes[1].removeAttribute("data-image-src");
  toggleBooleans();
}

/*Verify breakpoint*/
const breakpointVerification = ()=> getWindowWidth() <= limit ? true : false;


/*Events for footer accordion and parallax container*/
window.addEventListener("load",()=>{
  if(breakpointVerification()) {
    copyContent();
    removeParallax();
  }
});

window.addEventListener("resize",()=>{
    if(breakpointVerification()) {
      if(!hasContent){
        copyContent();
      }
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
