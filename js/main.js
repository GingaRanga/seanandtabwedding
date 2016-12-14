$(document).ready(function(){ // wait for document ready
	
/////////////////////////////////////////////////////////////////////////     GSAP      //////////////////////////////////////////////////////////////
	
	var text = $('.hero-text'),
		button = $('.hero-btn'),
		//span = $('span'),
		//clock = $('#clockdiv'),
		tl = new TimelineLite();

	tl
		.from(text, 1.5, {autoAlpha: 0})
		//.add('clock')/* animation will play when the timeline playback hits the add label clock */
		.from(button, 1, {autoAlpha: 0}, '-=0.8');/* += creates a delay, -= creates an overlay. If you just put an absolute number the animation will run at tha time (absolute position). */
		//.from(span, 1, {autoAlpha: 0}, 'clock+=3');
	
/////////////////////////////////////////////////////////////////////     SCROLLMAGIC      ///////////////////////////////////////////////////////////
	
	// Init ScrollMagic
	var controller = new ScrollMagic.Controller();
	
	//CLOCK
	var clockTween = new TimelineMax();
	clockTween
		.from('#clock', 1, {autoAlpha: 0})
		;

	var clockScene = new ScrollMagic.Scene({
		triggerElement: '#clockdiv',
		triggerHook: 0.5,
		//duration: '30%'
	})
	.setTween(clockTween)
	.addTo(controller);
	
	//VENUE
	var venueTween = new TimelineMax();
	venueTween
		.from('.where-wrap', 2, {autoAlpha: 0, x: '-150%', ease:Bounce.easeOut})
		;

	var clockScene = new ScrollMagic.Scene({
		triggerElement: '.where-wrap',
		triggerHook: 0.5,
		//duration: '30%'
	})
	.setTween(venueTween)
	.addTo(controller);
	
	//FYI
	var fyiTween = new TimelineMax();
	fyiTween
		.from('.fyi-text', 3, {autoAlpha: 0, x: '-100%', ease:Elastic.easeOut})
		.from('.fyi-promo', 3, {autoAlpha: 0, x: '100%', ease:Elastic.easeOut}, '-=3')
		.from(".fyi-box", 2, {scale:0.5, opacity:0, ease:Elastic.easeOut, force3D:true}, '-=2')
		;

	var fyiScene = new ScrollMagic.Scene({
		triggerElement: '.fyi-text',
		triggerHook: 0.5,
		//duration: '30%'
	})
	.setTween(fyiTween)
	/*
	.addIndicators({
			name: 'fyi scene',
			colorTrigger: 'black',
			colorStart: 'pink',
			colorEnd: 'blue'
	}) // this requires a plugin
	*/
	.addTo(controller);
	
	/*SOCIAL SECTION
	var socialTween = new TimelineMax();
	socialTween
		.from('.insta-wrap', 3, {autoAlpha: 0, y: '50%', ease:Bounce.easeOut})
		.from('#social-link', 0.5, {autoAlpha: 0, x: '50%', ease:Power0.easeOut}, '-=2')
		.from('#twitter-link', 0.5, {autoAlpha: 0, x: '50%', ease:Power0.easeOut}, '-=1.5')
		.from('#twitter-widget', 0.5, {autoAlpha: 0, y: '50%', ease:Power0.easeOut}, '-=1')
		.from('#insta-widget', 0.5, {autoAlpha: 0, x: '50%', ease:Power0.easeOut}, '-=0.5')
		.from('#insta-link', 0.5, {autoAlpha: 0, y: '50%', ease:Power0.easeOut})
		;

	var socialScene = new ScrollMagic.Scene({
		triggerElement: '.insta-wrap',
		triggerHook: 1,
		//duration: '30%'
	})
	.setTween(socialTween)
	.addIndicators({
			name: 'fyi scene',
			colorTrigger: 'black',
			colorStart: 'pink',
			colorEnd: 'blue'
	}) // this requires a plugin
	.addTo(controller);
	*/

});

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
