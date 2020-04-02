require('./bootstrap');
require('@fortawesome/fontawesome-free/js/all.js');

$(document).ready(function(){

   $("#navbarDropdownLi .fa-caret-up").hide();

   $("#navbarDropdownLi").click(function(){
      $(this).find(".fa-caret-up").toggle();
      $(this).find(".fa-caret-down").toggle();
      $(this).dropdown('toggle');
   });
});
