$(document).ready(function(){

   $("#start-workout").click(function(){
      $("#step-0").show();
      $("#card-start").hide();
   });

   // $(".next-step").click(function(){
   //    let step = $(this).data("step");
   //    next_step = step + 1;
   //    $("#step-".step).hide();
   //    $("#step-".next_step).show();
   //    startTimer();
   // });

   $(".show-rest").click(function(){
      let step = $(this).data("step");
      $("#step-"+step).hide();
      $("#rest-"+step).show();
      initTimer(step);
      startTimer();
   });

   var isRunning = false;
   var timerTime = 0;
   var elem;

   function initTimer(step){
      elem = $("#timer-"+step);
      if(typeof elem != "undefined"){
         var seconds = elem.data("second");
         timerTime = seconds;
         const min = Math.floor(seconds / 60);
         const sec = seconds % 60;
         printTimer(elem, min, sec);
      }
   }

   function decrementTimer(){
      timerTime--;

      let min = Math.floor(timerTime / 60);
      let sec = timerTime % 60;


      printTimer(elem, min, sec);

      if(timerTime <= 0)
         stopTimer()
   }

   function printTimer(elemn, min, sec){
      if(min < 10){
         min = "0"+min;
      }
      if(sec < 10){
         sec = "0"+sec;
      }
      elem.find(".minutes").html(min);
      elem.find(".seconds").html(sec);
   }

   // function resetTimer(elem, seconds){
   //    timerTime = seconds
   //    const min = Math.floor(timerTime / 60);
   //    const sec = timerTime % 60;
   //    elem.find(".minutes").html(min);
   //    elem.find(".seconds").html(sec);
   // }

   function startTimer() {
       if (isRunning) return;

       isRunning = true;
       interval  = setInterval(decrementTimer, 1000);
   }

   function stopTimer(){
      if (!isRunning) return;

      isRunning = false;
      clearInterval(interval);
   }
});
