$(document).ready(function(){

    $("#login").hide();

    $(".tab-active").on("click", function(){
        $("#login").hide();
        $("#signup").css("background-color", "lightgreen");
        $(".tab-active").css("background-color", "lightgreen");
        $(".tab").css("background-color", "green");
        $("#signup").show();
    })

    $(".tab").on("click", function(){
        $("#login").show();
        $("#login").css("background-color", "lightgreen");
        $(".tab").css("background-color", "lightgreen");
        $(".tab-active").css("background-color", "green");
        $("#signup").hide();
    })

});
