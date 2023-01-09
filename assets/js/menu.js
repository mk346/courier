var submenus1 = document.querySelector(".show-1")
var submenus2 = document.querySelector(".show-2")
var submenus3 = document.querySelector(".show-3")
var button1 = document.querySelector(".btn-1")
var button2 = document.querySelector(".btn-2")
var button3 = document.querySelector(".btn-3")
var arrow1 = document.querySelector(".first")
var arrow2 = document.querySelector(".second")
var arrow3 = document.querySelector(".third")

button1.addEventListener("click", function () {
    submenus1.classList.toggle("show")
    arrow1.classList.toggle("rotate")
    
})

button2.addEventListener("click", function () {
    submenus2.classList.toggle("show")
    arrow2.classList.toggle("rotate")
})

button3.addEventListener("click", function () {
    submenus3.classList.toggle("show")
    arrow3.classList.toggle("rotate")
})

