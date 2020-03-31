require('./bootstrap');

$(document).ready(function(){

   $("div.custom-link").click(function(){
      let url = $(this).data("location");

      if(typeof url !== "undefined"){
         window.location.href = url;
      }
   });

   $("div.custom-collapse").click(function(){
      target = $(this).data("target");
      index = $(this).data("index");
      $(target).collapse("toggle");
      $("#plus-sign-"+index).toggle();
      $("#minus-sign-"+index).toggle();
   });
});
