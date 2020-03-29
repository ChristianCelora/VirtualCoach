require('./bootstrap');

$(document).ready(function(){

   $("div.home-card").click(function(){
      let url = $(this).data("location");

      if(typeof url !== "undefined"){
         window.location.href = url;
      }
   });

   $("div.custom-collapse").click(function(){
      target = $(this).data("target");
      index = $(this).data("index");
      $(target).collapse("toggle");
      console.log(target+" #plus-sign-"+index);
      $("#plus-sign-"+index).toggle();
      $("#minus-sign-"+index).toggle();
   });
});
