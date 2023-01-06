var submenus1 = document.querySelector(".show-1")
var submenus2 = document.querySelector(".show-2")
var submenus3 = document.querySelector(".show-3")
var button1 = document.querySelector(".btn-1")
var button2 = document.querySelector(".btn-2")
var button3 = document.querySelector(".btn-3")

button1.addEventListener("click", function () {
    submenus1.classList.toggle("show")
})

button2.addEventListener("click", function () {
    submenus2.classList.toggle("show")
})

button3.addEventListener("click", function () {
    submenus3.classList.toggle("show")
})

