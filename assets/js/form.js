var lgn = document.getElementById("login")
var rgstr = document.getElementById("register")
var btn = document.getElementById("add-color")
var box = document.getElementById("box")

function register(){
    box.style.height = "680px"
    lgn.style.left = "-400px"
    rgstr.style.left = "50px"
    btn.style.left = "120px"
}

function login(){
    box.style.height = "480px"
    lgn.style.left = "50px"
    rgstr.style.left = "450px"
    btn.style.left = "0px"
}
