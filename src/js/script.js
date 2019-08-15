

function activate(element){
  element.classList.toggle("open");
}

function initMobileMenu(selector){

  if(document.querySelector(selector)){

    // variables
    const menuItem = document.querySelector(selector);
    const menuSwitch = menuItem.children[0];
    const allSubSwitches = menuItem.querySelectorAll('.j-sub-trigger');

    menuSwitch.addEventListener("click", function(){
      activate(menuSwitch.parentElement);
    });

    for (let subSwitch of allSubSwitches) {
      subSwitch.addEventListener("click", function(){
        activate(subSwitch.parentElement);
      });
    }

  }

}

// window onload

document.addEventListener("DOMContentLoaded", function() {
  initMobileMenu('.mobile_menu');

  function getScrollbarWidth() {

    // Creating invisible container
    const outer = document.createElement('div');
    outer.style.visibility = 'hidden';
    outer.style.overflow = 'scroll'; // forcing scrollbar to appear
    outer.style.msOverflowStyle = 'scrollbar'; // needed for WinJS apps
    document.body.appendChild(outer);

    // Creating inner element and placing it in the container
    const inner = document.createElement('div');
    outer.appendChild(inner);

    // Calculating difference between container's full width and the child width
    const scrollbarWidth = (outer.offsetWidth - inner.offsetWidth);

    // Removing temporary elements from the DOM
    outer.parentNode.removeChild(outer);

    console.log(scrollbarWidth);

  }

  getScrollbarWidth();




});
