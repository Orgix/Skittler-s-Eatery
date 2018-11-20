/*Targeting divs*/
const column1 = document.getElementById('col_1');
const column2 = document.getElementById('col_2');
const collapse1 = document.getElementById('collapseOne');
const collapse2 = document.getElementById('collapseTwo');

/*boolean for avoiding perfoming multiple copyContent(). Mainly for the resize event*/
let hasContent = false;

/*pixel limit that will be useful in the events*/
const limit = 768;

/*Returns browser's innerWidth value. Useful for checking*/
const getWindowWidth = () =>{
  return window.innerWidth;
}

/*Simple function to copy the content from the targeted elements to another set of targeted elements*/
const copyContent = () =>{
  let content = [column1.innerHTML, column2.innerHTML];

  collapse1.innerHTML = content[0];
  collapse2.innerHTML = content[1];
  hasContent = true;
  console.log("voalah")
}

/*Verify breakpoint*/
const breakpointVerification = ()=>{
  return getWindowWidth() <= limit ? true : false;
}

/*Events for footer accordion*/
window.addEventListener("load",()=>{
  if(breakpointVerification()) copyContent()
});

window.addEventListener("resize",()=>{
  if(!hasContent){
    if(breakpointVerification()) copyContent()
  }
});
