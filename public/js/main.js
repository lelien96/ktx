$(document).ajaxStart(function(){
    $(".wait").css("display", "block");
 });
$(document).ajaxComplete(function(){
    $(".wait").css("display", "none");
});