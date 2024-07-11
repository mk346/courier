var submenus1 = document.querySelector(".show-1")
var submenus2 = document.querySelector(".show-2")
var submenus3 = document.querySelector(".show-3")
var submenus4 = document.querySelector(".show-4")
var button3 = document.querySelector(".btn-3")
var button4 = document.querySelector(".btn-4")
var bars = document.querySelector(".bars")
var arrow4 = document.querySelector(".user-log")
var button1 = document.querySelector(".btn-1")
var button2 = document.querySelector(".btn-2")
var arrow1 = document.querySelector(".first")
var arrow2 = document.querySelector(".second")
var arrow3 = document.querySelector(".third")
var arrow5 = document.querySelector(".fourth")
var usermenu = document.querySelector(".user-menu")
var topNav = document.querySelector(".top-nav")
var sidebar = document.querySelector(".sidebar")
var menus = document.querySelector(".menus")
var formwrapper = document.querySelector(".container-fluid")
var wrapper = document.querySelector(".sub-wrapper2")

button3.addEventListener("click", function () {
    submenus3.classList.toggle("show")
    arrow3.classList.toggle("rotate")
})
button4.addEventListener("click", function () {
    submenus4.classList.toggle("show")
    arrow5.classList.toggle("rotate")
})

arrow4.addEventListener("click", function(){
    usermenu.classList.toggle("show-me")
})

bars.addEventListener("click", function () {
    this.classList.toggle("click")
    topNav.classList.toggle("click")
    sidebar.classList.toggle("hide-menus")
    menus.classList.toggle("hide-menus")
    formwrapper.classList.toggle("click")
    wrapper.classList.toggle("click")
})

button1.addEventListener("click", function () {
    submenus1.classList.toggle("show")
    arrow1.classList.toggle("rotate")
})

button2.addEventListener("click", function () {
    submenus2.classList.toggle("show")
    arrow2.classList.toggle("rotate")
})
