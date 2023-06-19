$(document).ready(function () {
    //on click signup hide login and show register box
    $("#signup").click(function () {
        $("#first").slideUp("slow", function () {
            $("#second").slideDown("slow");
        })
    })
    // onclick signin hide register and show login box
    $("#sigin").click(function () {
    $("#second").slideUp("slow", function () {
        $("#first").slideDown("slow");
    })
})

    
});