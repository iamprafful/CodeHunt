window.addEventListener("load",init,false);
function init()
{
//    "contextmenu": function(e) {
//        console.log("ctx menu button:", e.which);
//
//        // Stop the context menu
//        e.preventprimary();
//        alert('Right Click is disabled');
//    },
//    "mousedown": function(e) { 
//        console.log("normal mouse down:", e.which); 
//    },
//    "mouseup": function(e) { 
//        console.log("normal mouse up:", e.which); 
//    }
document.getElementById('timer').innerHTML =
  00 + ":" + 10;
startTimer();
}
function startTimer() {
  var presentTime = document.getElementById('timer').innerHTML;
  var timeArray = presentTime.split(/[:]+/);
  var m = timeArray[0];
  var s = checkSecond((timeArray[1] - 1));
  if(s==59){m=m-1}
  
  document.getElementById('timer').innerHTML =
    m + ":" + s;
  setTimeout(startTimer, 1000);
    if(m=="0" && s="0")
        {
            alert("time up");
        }
}

function checkSecond(sec) {
  if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
  if (sec < 0) {sec = "59"};
  return sec;
}

    






