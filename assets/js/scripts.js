$(document).ready(function(){

    $("#contactForm").submit(function(e){
        e.preventDefault();
        alert("Message envoyé avec succès 🚀");
    });

});

$(document).ready(function(){

    $("#themeBtn").click(function(){
        $("body").toggleClass("dark-mode");
    });

});