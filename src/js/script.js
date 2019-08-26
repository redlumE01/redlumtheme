
function activate(element){
  element.classList.toggle( "open");
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
});
