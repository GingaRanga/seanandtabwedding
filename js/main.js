	
	//using javascript
	var hero = document.getElementsByClassName('hero-text');
	
	/*in bracket you have the element, duration, {animation}. the to means we animate to the parameters and from means we animate from. you can have fromto to determine start and end parameters. You can use set method to just set the css values and you remove duration property. autoalpha property fades an element in if you use the from method and set autoalpha at 0. If you set a delay as the duration of the first tween then it will start in sequence*/
	TweenLite.from(hero, 2, {autoAlpha: 0});

	/*ease:Power0.easeNone is the syntax for ease. power can be 0 to 4. instead of easeNone you can do easeIn to add an ease animation. easeIn starts slow and ends fast*/
	


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
