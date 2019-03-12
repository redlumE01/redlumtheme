// polyfills

if (window.NodeList && !NodeList.prototype.forEach) {
  NodeList.prototype.forEach = function(callback, thisArg) {
    thisArg = thisArg || window;
    for (var i = 0; i < this.length; i++) {
      callback.call(thisArg, this[i], i, this);
    }
  };
}

// window onload

document.addEventListener("DOMContentLoaded", function() {
  redlum_mob_menu();
});

function redlum_mob_menu() {
  let mob_button = document.querySelector(".mobile_menu"),
      mob_menu = document.querySelector(".mobmenu"),
      mobclose_menu = document.querySelector(".mobile_close"),
      mobsub = document.querySelectorAll(".j-mob01-trigger"),
      mainSection = document.querySelector(".site-main");

  mob_button.addEventListener("click", open_menu);
  mobclose_menu.addEventListener("click", close_menu);
  mainSection.addEventListener("click", menu_check);

  mobsub.forEach(function(item) {
    item.addEventListener("click", open_mob01sub);
  });

  function open_menu() {
    mob_menu.classList.remove("lslideout");
    this.classList.toggle("fadeout");
    mobclose_menu.classList.toggle("fadein");
    mob_menu.classList.toggle("lslidein");
  }

  function close_menu() {
    mob_menu.classList.toggle("lslideout");
    mob_menu.classList.toggle("lslidein");
    mobclose_menu.classList.toggle("fadein");
    mob_button.classList.toggle("fadeout");
    mob_button.classList.toggle("fadein");
  }

  // opens submenus

  function open_mob01sub() {
    let mobsub = this.nextElementSibling;
    this.classList.toggle("open");
    mobsub.classList.toggle("dropdown");
  }

  // close by main element
  function menu_check() {if (document.querySelector('.mobmenu.lslidein') !== null) {close_menu();}}

}
