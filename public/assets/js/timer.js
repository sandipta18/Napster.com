function countdown() {
  var seconds = 20;

  function tick() {
    var counter = document.getElementById("counter");
    seconds--;
    counter.innerHTML =
      "Reset otp option will appear in " + "0:" + (seconds < 10 ? "0" : "") + String(seconds) + " seconds" ;
    if (seconds > 0) {
      setTimeout(tick, 1000);
    } else {
      counter.style.display = 'none';
      document.getElementById("resend").style.display = "block";

    }
  }
  tick();
}
countdown();
