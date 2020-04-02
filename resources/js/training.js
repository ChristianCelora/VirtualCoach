$(document).ready(function(){
   var order = 1;

   $("div#add-exercise").click(function(){
      let row = $("tr#clonable").clone();
      row.removeAttr("id");
      row.find("td.order-col").html(++order)
      row.find("input").val("")
      $("#exercises").append(row);
   });

   $("#form-new-training").click(function(){
      $("#new-training").submit();
   });
});
