/////////////////////////////////////////////////////////////////////     SCROLLMAGIC INIT     ///////////////////////////////////////////////////////


	
/////////////////////////////////////////////////////////////////////     PIN     ////////////////////////////////////////////////////////////////////


	
/////////////////////////////////////////////////////////////////////     PARALLAX     ///////////////////////////////////////////////////////////////
	

	
/////////////////////////////////////////////////////////////////////     FADE     ///////////////////////////////////////////////////////////////////	


/////////////////////////////////////////////////////////////////////     CLOCK     //////////////////////////////////////////////////////////////////

//COUNTDOWN CLOCK
function getTimeRemaining(endtime) {
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor((t / 1000) % 60);
  var minutes = Math.floor((t / 1000 / 60) % 60);
  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
  var days = Math.floor(t / (1000 * 60 * 60 * 24));
  return {
    'total': t,
    'days': days,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}

function initializeClock(id, endtime, message) {
  var clock = document.getElementById(id);
  var daysSpan = clock.querySelector('.days');
  var hoursSpan = clock.querySelector('.hours');
  var minutesSpan = clock.querySelector('.minutes');
  var secondsSpan = clock.querySelector('.seconds');

  function updateClock() {
    var t = getTimeRemaining(endtime);

    daysSpan.innerHTML = t.days;
    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

    if (t.total <= 0) {
      clearInterval(timeinterval);
			document.getElementById(id).innerHTML = message;
    }
  }

  updateClock();
  var timeinterval = setInterval(updateClock, 1000);
}

var deadline = 'September 09 2017 16:00:00 GMT-0300';

initializeClock('clockdiv', deadline, '<div style="background:#33B89B;color:#fff;" class="alert alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span style="color:#000;" aria-hidden="true">×</span></button><h4 style="font-size:2em;margin-bottom:0;">Congratulations Mr. and Mrs. Sobey!</h4></div>');
