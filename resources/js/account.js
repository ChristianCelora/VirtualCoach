$(document).ready(function(){

   $("#show-form-new").ready(function(){
      $("#new-physique-data").show();
      $("#show-form-new").hide();
   });

   $("#submit-new-physique").click(function(){
      $("#new-physique-data").submit();
   });
});
