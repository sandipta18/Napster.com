function countdown() {
  var seconds = 59;

  function tick() {
    var counter = document.getElementById("counter");
    seconds--;
    counter.innerHTML =
      "You will be redirected in " + "0:" + (seconds < 10 ? "0" : "") + String(seconds) + " seconds" ;
    if (seconds > 0) {
      setTimeout(tick, 1000);
    } else {
      window.location.href = '/forgot';

    }
  }
  tick();
}
countdown();
