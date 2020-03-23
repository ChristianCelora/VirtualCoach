require('./bootstrap');

$(document).ready(function(){

   $("div.home-card").click(function(){
      let url = $(this).data("location");

      if(typeof url !== "undefined"){
         window.location.href = url;
      }
   });
});
