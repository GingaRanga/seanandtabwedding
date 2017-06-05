<?php

	include('php/connection.php');

	if( isset( $_POST["post_submit"] ) ){
		
		//fxn which validates the data
		function validateFormData( $formData ){
			
			$formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
			return $formData;
			
		}
		
		//check to see if inputs are empty
		//create variables with form data
		//wrap data with our fxn
		
		$rsvp = $attend = $name = $email = $guest = $extras = "";
		
		if( !$_POST["formrsvp"] ){
			$formrsvpErr = "Please select yes or no <br>";
		}else{
			$rsvp = validateFormData( $_POST["formrsvp"] );
		}
		
		if( !$_POST["formattend"] ){
			$formattendErr = "Please select yes or no <br>";
		}else{
			$attend = validateFormData( $_POST["formattend"] );
		}
		
		if( !$_POST["formfullname"] ){
			$formnameErr = "Please enter your full name <br>";
		}else{
			$name = validateFormData( $_POST["formfullname"] );
		}
		
		if( !$_POST["formemail"] ){
			$formemailErr = "Please enter your email address <br>";
		}else{
			$email = validateFormData( $_POST["formemail"] );
		}
		
		if( !$_POST["formguestnames"] ){
			$formguestErr = "Please enter the name of all guests in your party as per invitation <br>";
		}else{
			$guest = validateFormData( $_POST["formguestnames"] );
		}
		
		if( !$_POST["formextras"] ){
			$formextrasErr = "Please specify if you have any specific requests or not <br>";
		}else{
			$extras = validateFormData( $_POST["formextras"] );
		}
		
		//check if any of the above fields are empty, then insert query
		if( $rsvp && $attend && $name && $email && $guest ){
			
			//when above verified enter data into database
			$query = "INSERT INTO users (id, formrsvp, formattend, formfullname, formemail, formguestnames, formextras, submit_date) VALUES (NULL, '$rsvp', '$attend', '$name', '$email', '$guest', '$extras', CURRENT_TIMESTAMP)";

			//errors and message output
			if( mysqli_query( $conn, $query ) ){
				
				echo 	"<div style='margin:0;font-size:2em;' class='text-center alert alert-warning alert-dismissible fade in' role='alert'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
								<span style='font-size:2em;' aria-hidden='true'>x</span>
							</button>
							Thank you for your RSVP. We look forward to breaking it down with you on the dance floor!
						</div>";
			
			}else{
				echo "Error: ". $query . "<br>" . mysqli_error($conn);
			}
			
		}
		
	}

	mysqli_close($conn);

?>

<!DOCTYPE html>
<!-- Microdata markup added by Google Structured Data Markup Helper. -->
<html>
<!-- START HEAD SECTION ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --><head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
	<meta property="og:description" content="Sean and Tabitha are getting married!">
	<meta name="description" content="Sean and Tabitha are getting married!">
	<title>Sobey Wedding</title>
	<!-- FAVICON -->
	<link rel="shortcut icon" href="img/icon.png" type="image/png">
	<!-- BOOTSTRAP CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha256-916EbMg70RQy9LHiGkXzG8hSg9EdNy97GazNG/aiY1w=" crossorigin="anonymous" />
	<!-- FACEBOOK GRAPH DATA -->
    <meta property="og:url" content="http://www.soontobesobey.com" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Sobey Wedding Website" />
    <meta property="og:description" content="Sean and Tabitha are getting married" />
    <meta property="og:image" content="http://www.soontobesobey.com/img/gallery/firstyeardate2007.jpg" />
    <meta property="fb:app_id" content="970981369664540"/>
    <meta property="og:site_name" content="Sobey Wedding Website"/>
	<!-- TWITTER SHARE CARD -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@tabithawells" />
    <meta name="twitter:creator" content="@gigglesshitblog" />
    <meta name="twitter:title" content="The Sobey Wedding" />
    <meta name="twitter:description" content="#keepingtabsonsean" />
	<!-- FONT AWESOME -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" integrity="sha256-AIodEDkC8V/bHBkfyxzolUMw57jeQ9CauwhVW6YJ9CA=" crossorigin="anonymous" />
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Tangerine|Tenali+Ramakrishna" rel="stylesheet">
	<!-- ADDTOCALENDAR CSS -->
	<link href="http://addtocalendar.com/atc/1.5/atc-style-blue.css" rel="stylesheet" type="text/css">
	<!-- SLICK CAROUSEL CSS-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css" integrity="sha256-jySGIHdxeqZZvJ9SHgPNjbsBP8roij7/WjgkoGTJICk=" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css" integrity="sha256-WmhCJ8Hu9ZnPRdh14PkGpz4PskespJwN5wwaFOfvgY8=" crossorigin="anonymous" />
	<!-- SWIPER CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.0/css/swiper.min.css" integrity="sha256-qmCTrpLvkz/GexFbP14i9p8vymHbYOEQEZflvEKaXHU=" crossorigin="anonymous" />
	<!-- MAIN CSS -->
	<link href="css/lg.css" rel="stylesheet">
	<link href="css/xs.css" rel="stylesheet" media="screen and (max-width:765px)">
	<link href="css/sm.css" rel="stylesheet" media="screen and (max-width: 945px) and (min-width: 766px)">
	<link href="css/md.css" rel="stylesheet" media="screen and (max-width: 1145px) and (min-width: 946px)">
	<!--
	<link href="css/max666landscape.css" rel="stylesheet" media="screen and (orientation:landscape)">
	-->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<!-- END HEAD SECTION //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<!-- START BODY SECTION ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<body id="page-top" data-spy="scroll" data-target=".navbar" data-offset="25">
	<!-- ADDTOCALENDAR SCRIPT -->
	<script type="text/javascript">
		(function () {
    		if (window.addtocalendar)if(typeof window.addtocalendar.start == "function")return;
            if (window.ifaddtocalendar == undefined) { 
				window.ifaddtocalendar = 1;
				var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
				s.type = 'text/javascript';s.charset = 'UTF-8';s.async = true;
				s.src = ('https:' == window.location.protocol ? 'https' : 'http')+'://addtocalendar.com/atc/1.5/atc.min.js';
			var h = d[g]('body')[0];h.appendChild(s); 
			}
		})();
    </script>

<!-- START HERO SECTION ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<span itemscope itemtype="http://schema.org/Event"><header class="hero-bg text-center">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1 itemprop="name" class="hero-text">Sean &amp; Tabitha</h1>
					<a class="hero-btn" href="#"><button type="button" class="btn" data-toggle="modal" data-target="#myModal">RSVP</button></a>
				</div>
			</div>
		</div>
	</header>
<!-- END HERO SECTION //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<!-- START NAV SECTION /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<nav id="mainNav" class="navbar navbar-default" data-spy="affix" data-offset-top="681" role="navigation">
    	<div class="container-fluid">
     		<div class="navbar-header page-scroll">
        		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
         		</button>
     		</div>
      		<div class="collapse navbar-collapse">
        		<a class="navbar-brand page-scroll" href="#page-top">Sean &amp; Tabitha</a>
				<ul class="nav navbar-nav navbar-right">
					<li class="hidden"><a class="page-scroll" href="#page-top"></a></li>
					<li><a id="section1" class="page-scroll" href="#countdown">Tick Tock</a></li>
					<li><a id="section2" class="page-scroll" href="#resort">Venue</a></li>
					<li><a id="section3" class="page-scroll" href="#fyi">FYI</a></li>
					<li><a id="section4" class="page-scroll" href="#portfolio">The Squad</a></li>
					<li><a id="section5" class="page-scroll" href="#story">Our Story</a></li>
					<li><a id="section6" class="page-scroll" href="#gallery">Moments</a></li>
					<li><a id="section7" class="page-scroll" href="#registry">Registry</a></li>
				</ul>
			</div>
		</div>
	</nav>
<!-- END NAV SECTION ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<!-- START COUNTDOWN SECTION ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<main id="scroll-wrap" class="scrolling">
	
	<section class="countdown-bg text-center scrolling" id="countdown">
		<div class="container-fluid">
			<div class="row">
				<div id="clock" class="clock col-xs-12">
					<p id="clockdiv">In <span class="days"></span> Days, <span class="hours"></span> Hours, <span class="minutes"></span> Minutes, and <span class="seconds"></span> Seconds;</p>
					
					<script>
						function getTimeRemaining(endtime) {
						  "use strict";	
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
						  "use strict";	
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
					</script>
					
					<p><meta itemprop="startDate" content="2017-09-09">on September 9<sup>th</sup> 2017</p>
					<span>Sean Andrew Sobey &amp; Tabitha Michele Wells</span>
					<p>Will be Husband &amp; Wife!!</p>
					<span><i class="fa fa-venus-mars fa-2x" aria-hidden="true"></i></span><br>
					<span class="addtocalendar atc-style-blue">
						<var class="atc_event">
							<var class="atc_date_start">2017-09-09 03:00:00</var>
							<var class="atc_date_end">2017-09-10 00:00:00</var>
							<var class="atc_timezone">America/Halifax</var>
							<var class="atc_title">Wedding Ceremony &amp; Reception</var>
							<var class="atc_description">Please see website for details &amp; itinerary</var>
							<var class="atc_location">Oceanstone Seaside Resort</var>
							<var class="atc_organizer">The Sobeys</var>
							<var class="atc_organizer_email">tabitha.m.wells@gmail.com</var>
						</var>
   		 			</span>
				</div>
			</div>
		</div>
	</section>
<!-- END COUNTDOWN SECTION /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	
<!-- START RESORT SECTION //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<section class="resort-bg text-center scrolling" id="resort">
		<div class="container-fluid">
			<div itemprop="location" itemscope itemtype="http://schema.org/Place" class="row">
				<div class="col-xs-12">
					<h1 itemprop="name">Oceanstone</h1>
				</div>
				<div class="col-xs-8 col-xs-offset-2 col-md-4 col-md-offset-4 where-wrap">	
					<h2>Where?</h2>
					<p itemprop="address" itemscope itemtype="http://schema.org/PostalAddress"><span itemprop="streetAddress">8650 Peggys Cove Rd</span>,
					<br>
					<span itemprop="addressLocality">Indian Harbour</span>,
					<br>
					<span itemprop="addressRegion">NS</span> <span itemprop="postalCode">B3Z 3P4</span></p>
					<a class="btn" href="https://goo.gl/maps/L8YktnZ22M42">Google Map Link</a>
				</div>
			</div>
		</div>
	</section>
<!-- END RESORT SECTION ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	
<!-- START FYI SECTION /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<section class="fyi-bg scrolling" id="fyi">
		<div class="container-fluid">
			<div class="row">
				<div class="fyi-wrap">
					<h1>For Your Information</h1>
					<div class="col-md-6 col-xs-12 fyi-text">
						<div id="fyi-box-1" class="fyi-box">
							<p>Please come celebrate a weekend away with us! Enjoy a mini getaway at one of Nova Scotia's most beautiful hidden gems! An <span>adult only</span> weekend please! </p>
						</div>
						<div id="fyi-box-3" class="fyi-box">
							<p><span>Accommodations Update:</span>
							We still have a few rooms left if you would like to spend the weekend with us at Oceanstone! </p>
						</div>
						<div id="fyi-box-4" class="fyi-box">
							<p><span>IMPORTANT:</span> If you HAVE spoken to the bride and groom directly and have expressed interest in staying on site, they have reserved a room for you.</p>

							<p>Please call to secure your room with a 25% deposit ASAP.</p>

							<p>If you do not call to confirm your room, and the bride and groom receive interest from other guests that do not yet have a room, you could risk losing your spot. Please mention the last names of yourself or someone in your room as Oceanstone has a list of pre assigned rooms.</p>

							<p>If you HAVE NOT spoken to the bride and groom directly about accommodations and would like to spend the weekend with us, please call Oceanstone ASAP and they will let you know the availability of rooms and assist you to book.</p>

							<p>Reminder: 2 night requirement stay.</p>

							<p>We hope to spend the weekend with all of you!</p>
						</div>
						<div id="fyi-box-5" class="fyi-box">
							<p><span>Friday Sept 8:</span> The party before the party! We will be having a BBQ dinner for all guests on the beach, lawn games and bon fires... a more relaxing night to drink, mingle and get ready for the big day! </p>
						</div>
						<div id="fyi-box-6" class="fyi-box">
							<p><span>Saturday Sept 9:</span> The real party - The Wedding! Ceremony, Cocktail hour complete with hors d'ouvres and then Dinner and Dance at the main lodge. </p>
						</div>
						
					</div>
					<div class="col-md-6 col-xs-12 fyi-promo">
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/haW2qL2YVA8" frameborder="0" allowfullscreen>
							</iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- END FYI SECTION ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->	
<!-- START SQUAD SECTION ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<section class="squad-bg text-center no-padding scrolling" id="portfolio">
		<div class="container-fluid">
			<div class="row no-gutter">

				<div class="col-xs-12">
					<h1>The Bridal Party</h1>
					<h2>In Order of Appearance</h2>
					<h3 class="info-text">( **tap pictures if on touchscreen )</h3>
				</div>

				<div class="col-xs-12 col-md-6 pic" id="pic1">
					<div class="portfolio-box">
						<img class="img-responsive" src="img/caroline.jpg" alt="maid of honour">
						<div onClick="" class="portfolio-box-caption">
							<div class="portfolio-box-caption-content">
								<div class="project-category">
									<h2>Caroline Spindler</h2>	
									<h4>Maid of Honour</h4>
								</div><!-- ./project-category -->
								<div class="project-name">
									Tab and Caroline met in grade 6 on the playground of Gertrude Parker elementary School during lunchtime excel.. Tabitha was attending Smokey Drive and Caroline was attending Gertrude Parker. They would spend lunch hours together until they were reunited in two classes at Leslie Thomas Junior High (Grade 7 band and French immersion). From then on they were known as the "twosome," "school nerds," and "teachers pets." They were inseparable until each went their own path for university. Even though there was distance between them since high school, they remained best friends!
								</div><!-- ./project-name -->
							</div><!-- ./portfolio-box-caption-content -->
						</div><!-- ./portfolio-box-caption -->
					</div><!-- ./portfolio-box -->
				</div><!-- ./col-xs-12 -->
				
				<div class="col-xs-12 col-md-6 pic" id="pic2">
					<div class="portfolio-box">
						<img class="img-responsive" src="img/shayne.jpg" alt="best man">
						<div onClick="" class="portfolio-box-caption">
							<div class="portfolio-box-caption-content">
								<div class="project-category">
									<h2>Shayne Bennett</h2>	
									<h4>Best Man</h4>
								</div><!-- ./project-category -->
								<div class="project-name">
									Sean and Shayne knew each other since the Novice hockey days when they use to shred teams on the ice. Shayne moved from Sackville to Bedford when they were younger and they were on a break for a bit. It was in Grade 12 when they met up again and the bromance continued. Since then they’ve shared many great memories including traveling to Dominican (booked the flight 12 hours before take off), drove to the States (did a nice little 360 going 120 on the highway coming home) and somehow after all the adventures and mischief they’re still alive. They’re the brother that neither one of them had!
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-xs-12 col-md-6 pic" id="pic3">
					<div class="portfolio-box">
						<img class="img-responsive" src="img/emily.jpg" alt="bridesmaid">
						<div onClick="" class="portfolio-box-caption">
							<div class="portfolio-box-caption-content">
								<div class="project-category">
									<h2>Emily Wells</h2>	
									<h4>Bridesmaid</h4>
								</div><!-- ./project-category -->
								<div class="project-name">
									Tabitha has known Emily for 24 years!!... she's her sister! Tab and Em are alike in so many ways. They are both stubborn and even though they clash at times, they would do anything for one another. They also share the love of fashion and shopping. Although Emily is Tabitha's younger sister, Tabitha idolizes Em's style and mimics it on a regular basis! Tab has always been thankful for Em keeping her lookin good!
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-xs-12 col-md-6 pic" id="pic4">
					<div class="portfolio-box">
						<img class="img-responsive" src="img/robbie.jpg" alt="groomsman">
						<div onClick="" class="portfolio-box-caption">
							<div class="portfolio-box-caption-content">
								<div class="project-category">
									<h2>Robbie Anderson</h2>	
									<h4>Groomsman</h4>
								</div><!-- ./project-category -->
								<div class="project-name">
									Sean and Robbie became friends in high school. At a high school dance, Robbie was feeling a lil’ under the weather and got Sean and all the guys busted for drinking. Robbie and Sean are basically the same person, Robbie’s just taller and Sean’s the better looking one. There’s only one other person that shares the love of memes more than Sean and that’s Robbie.
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-xs-12 col-md-6 pic" id="pic5">
					<div class="portfolio-box">
						<img class="img-responsive" src="img/jenn.jpg" alt="bridesmaid">
						<div onClick="" class="portfolio-box-caption">
							<div class="portfolio-box-caption-content">
								<div class="project-category">
									<h2>Jennifer Flynn</h2>	
									<h4>Bridesmaid</h4>
								</div><!-- ./project-category -->
								<div class="project-name">
									Tab and Jenn met in Grade 10 when they were both working at The Chickenburger in Bedford. They clicked immediately and became best friends. Their friendship can best be described as "easy" and "natural." They applied to Nursing School together and spent every moment of the 4 years either as study buddies or party animals. After nursing school Jenn moved to Ontario and they kept in touch as much as possible. In 2016 she then returned home. They picked up right where they left off and have since been planning their weddings together!
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-xs-12 col-md-6 pic" id="pic6">
					<div class="portfolio-box">
						<img class="img-responsive" src="img/josh.jpg" alt="groomsman">
						<div onClick="" class="portfolio-box-caption">
							<div class="portfolio-box-caption-content">
								<div class="project-category">
									<h2>Josh Gillis</h2>	
									<h4>Groomsman</h4>
								</div><!-- ./project-category -->
								<div class="project-name">
									Sean and Josh have known each other since Elementary school. They literally went to school with each other forever. Josh is a Plastic Surgeon so obviously he must have got his smarts from Sean. In the summer months growing up, Sean and Evan basically lived at the Gillis’s. Even though both their schedules are so busy (mostly Josh’s), whenever back together you know a good time will be had!
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-xs-12 col-md-6 pic" id="pic7">
					<div class="portfolio-box">
						<img class="img-responsive" src="img/katie.jpg" alt="bridesmaid">
						<div onClick="" class="portfolio-box-caption">
							<div class="portfolio-box-caption-content">
								<div class="project-category">
									<h2>Katie Marshall</h2>	
									<h4>Bridesmaid</h4>
								</div><!-- ./project-category -->
								<div class="project-name">
									Tabitha knew of Katie in high school... And hated her. Katie's feelings toward Tab were mutual. After Sean and Tab started dating Katie and Tab were kind of forced into a friendship. This was due to Katie's, now husband, and Sean being good friends since elementary school. Katie also ended up in Tabitha's nursing class; they couldn't avoid each other! The inability to avoid each other was the best thing to happen though, because their inevitable friendship became even stronger as the years went on. Now, Tab couldn't imagine Katie not being in her life nor standing at the alter without her!
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-xs-12 col-md-6 pic" id="pic8">
					<div class="portfolio-box">
						<img class="img-responsive" src="img/evan.jpg" alt="groomsman">
						<div onClick="" class="portfolio-box-caption">
							<div class="portfolio-box-caption-content">
								<div class="project-category">
									<h2>Evan Marshall</h2>	
									<h4>Groomsman</h4>
								</div><!-- ./project-category -->
								<div class="project-name">
									Sean has known Evan since Elementary School. Many days growing up were spent shooting some bball outside of Evan’s…well, Evan was mowing the lawn and his friends were playing bball. Lots of decent parties were had at the Marshall residence. Over the years they’ve had some wild adventures including trips to Montreal, Quebec, Maine and St. John’s. They straight thug it everywheres they go earning fame worldwide. Although a lot of their interests are different (Evan prefers men), he’s one of Sean’s closest friends.
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-xs-12 col-md-6 pic" id="pic9">
					<div class="portfolio-box">
						<img class="img-responsive" src="img/tara.jpg" alt="bridesmaid">
						<div class="portfolio-box-caption">
							<div onClick="" class="portfolio-box-caption-content">
								<div class="project-category">
									<h2>Tara Sobey</h2>	
									<h4>Bridesmaid</h4>
								</div><!-- ./project-category -->
								<div class="project-name">
									Tabitha has known Tara for 10 years..  Since she started dating Sean. Tara is Sean's sister! Tara has always welcomed Tab into the family with open arms. Tab loves spending time with Tara, with the Sobey clan, or even a moment with just the two of them. One of the best moments of Tab's life was the time she spent celebrating her and Sean's engagement with Tara! Tab couldn't be more excited to welcome Tara as a sister!
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-xs-12 col-md-6 pic" id="pic10">
					<div class="portfolio-box">
						<img class="img-responsive" src="img/jon.jpg" alt="groomsman">
						<div onClick="" class="portfolio-box-caption">
							<div class="portfolio-box-caption-content">
								<div class="project-category">
									<h2>Jon Banfield</h2>	
									<h4>Groomsman</h4>
								</div><!-- ./project-category -->
								<div class="project-name">
									Sean and Jon became friends in high school and remained boys ever since. Over the years they’ve played many golf rounds together, while Sean takes tips from Jon but unfortunately have never helped out. Even though Jon lives in Calgary now they still keep in touch and always have a great time when they’re back together.
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col-xs-12" id="pic11">
					<div class="portfolio-box">
						<img class="img-responsive" src="img/isla.jpg" alt="flower girl">
						<div onClick="" class="portfolio-box-caption">
							<div class="portfolio-box-caption-content">
								<div class="project-category">
									<h2>Isla Marshall</h2>	
									<h4>Flower Girl</h4>
								</div><!-- ./project-category -->
								<div class="project-name">
									Isla is the daughter of one of the Sobey bridemaids and groomsmen; Katie and Evan. Isla is one heck of a little lady. In her first year of life she received a necessary liver transplant from a piece of her mom's liver and has kicked Biliary Atresia in the ass! She is now thriving and is clearly one of the happiest and most social babies a person could meet.. A true princess to walk down the isle!
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- END SQUAD SECTION /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	
<!-- START DEETS SECTION ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<section class="story-bg text-center scrolling" id="story">
		<div class="container-fluid">
			<div class="row">
				<h1>Our Story</h1>
				<div class="col-xs-12">
					<div class="slider">
					  	<div class="slider-wrap" id="slider-1">
					  		<h3>The Meet</h3>
							It was a good old fashion high school party in 2006. An Open house party. Tab was in grade 12. Somehow word spread to Sean and his friends about this party. Sean is in 2nd year university at this time, and went to this party with hopes of picking up a young'in. Well he did. The drinks were flowing and the romance was growing. They "talked" until the wee hours of this morning. 
				  		</div>
					  	<div class="slider-wrap" id="slider-2">
					  		<h3>The Exchange</h3>
					  		After the party, they exchanged MSN usernames. Sean made Tab wait a couple days before adding her, but ultimately got the courage to ask for her number and then a date. Tab wasn't sure if she'd even hear from Sean again after the party (thought he was a playa). 10 years later... you decide! 
					  	</div>
					  	<div class="slider-wrap" id="slider-3">
					  		<h3>The Proposal - pt.1</h3>
					  		It was 9 years to the day. Celebrating their anniversary at the Hollis Hotel Suite before a dinner reservation at 730pm. Tab was getting ready while Sean was nervously awaiting her to finally be finished. (She's always so quick to get ready). 
					  	</div>
					  	<div class="slider-wrap" id="slider-4">
					  		<h3>The Proposal - pt.2</h3>
					  		When Tab asked if Sean liked her outfit he stated that something was missing and led her down a hallway of rose petals to a heart shape of rose petals where it all went down.
					  	</div>
					  	<div class="slider-wrap" id="slider-5">
					  		<h3>The Proposal - pt.3</h3>
					  		With Ed Sheeran serenading in the background, Sean got down on one knee and FINALLY asked his bride to be! She thought about it for a while but eventually agreed. Shortly after.. Tab was worried they were late for dinner, but Sean had lied as he had dinner booked for 8, not 730pm. 
					  	</div>
					  	<div class="slider-wrap" id="slider-6">
					  		<h3>The Proposal - pt.4</h3>
					  		They popped a bottle of champagne and went to dinner at Story's.  After dinner they face timed friends and family back at the hotel and then celebrated together out in Halifax until 4am.
					  	</div>
					  	<!--
					  	<div class="slider-wrap" id="slider-7">
					  		<img src="img/gallery/engagement.jpg" alt="engagement ring">
					  	</div>
					  	-->
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- END DEETS SECTION /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<!-- START GALLERY SECTION /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<section class="gallery-bg text-center scrolling" id="gallery">
		<div class="container-fluid">
			<div class="row">
				<!-- Swiper -->
				<div class="swiper-container">
					<h1>Moments</h1>
					<div class="swiper-wrapper">
						<div class="swiper-slide">
							<img itemprop="image" src="img/gallery/firstyeardate2007.jpg" alt="first year dating">
							<div class="swiper-text">First year dating, 2007</div>
						</div>
						<div class="swiper-slide">
							<img src="img/gallery/firsttripmexico2008.JPG" alt="first trip together">
							<div class="swiper-text">First trip, Mexico 08'</div>
						</div>
						<div class="swiper-slide">
							<img src="img/gallery/mayanruins2011.JPG" alt="mayan ruins">
							<div class="swiper-text">Mayan ruins, 2011</div>
						</div>
						<div class="swiper-slide">
							<img src="img/gallery/lombardstsanfran.jpg" alt="lombard street san fran">
							<div class="swiper-text">Lombard st. San Fran</div>
						</div>
						<div class="swiper-slide">
							<img src="img/gallery/annualkenjithanksgiv.jpg" alt="annual keji thanksgiving">
							<div class="swiper-text">Annual Keji Thanksgiving</div>
						</div>
						<div class="swiper-slide">
							<img src="img/gallery/bellagiovegas.jpg" alt="bellagio las vegas">
							<div class="swiper-text">Bellagio, Vegas</div>
						</div>
						<div class="swiper-slide">
							<img src="img/gallery/brunelloestatesgolf.jpg" alt="brunello estates golfing">
							<div class="swiper-text">Brunello Estates, golfing</div>
						</div>
						<div class="swiper-slide">
							<img src="img/gallery/candlestickparksanfran.jpg" alt="candlestick park san fran">
							<div class="swiper-text">Candlestick Park, San Fran</div>
						</div>
						<div class="swiper-slide">
							<img src="img/gallery/crabbemountain.jpg" alt="crabbe mtn skiing">
							<div class="swiper-text">Crabbe mtn, skiing</div>
						</div>
						<div class="swiper-slide">
							<img src="img/gallery/dirtynellys.jpg" alt="dirty nellys halifax">
							<div class="swiper-text">Dirty Nellys, Halifax</div>
						</div>
						<div class="swiper-slide">
							<img src="img/gallery/fenwaypark.jpg" alt="fenway park">
							<div class="swiper-text">Fenway Park</div>
						</div>
						<div class="swiper-slide">
							<img src="img/gallery/goldengatesanfran.jpg" alt="golden gate bridge">
							<div class="swiper-text">Golden Gate Bridge</div>
						</div>
						<div class="swiper-slide">
							<img src="img/gallery/grandcanyonarizona.jpg" alt="grand canyon arizona">
							<div class="swiper-text">Grand Canyon, Arizona</div>
						</div>
						<div class="swiper-slide">
							<img src="img/gallery/helicoptervegasstrip.jpg" alt="helicopter vegas strip">
							<div class="swiper-text">Helicopter over Vegas strip</div>
						</div>
						<div class="swiper-slide">
							<img src="img/gallery/mugs.jpg" alt="mean muggin">
							<div class="swiper-text">Mean muggin'</div>
						</div>
						<div class="swiper-slide">
							<img src="img/gallery/newyearseve.jpg" alt="new years eve">
							<div class="swiper-text">New Years Eve</div>
						</div>
						<div class="swiper-slide">
							<img src="img/gallery/ottawa.jpg" alt="ottawa">
							<div class="swiper-text">Ottawa</div>
						</div>
						<div class="swiper-slide">
							<img src="img/gallery/signalhill.jpg" alt="signal hill newfoundland">
							<div class="swiper-text">Signal Hill, Newfoundland</div>
						</div>
						<div class="swiper-slide">
							<img src="img/gallery/stmartinport.jpg" alt="st maarten port">
							<div class="swiper-text">St. Maarten Port</div>
						</div>
						<div class="swiper-slide">
							<img src="img/gallery/turksncaicos.jpg" alt="turks and caicos">
							<div class="swiper-text">Turks and Caicos</div>
						</div>
						<div class="swiper-slide">
							<img src="img/gallery/ziplinepuertorico.jpg" alt="ziplining puerto rico">
							<div class="swiper-text">Ziplining, Puerto Rico</div>
						</div>
					</div>
					<!-- Add Arrows -->
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
				<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2 insta-wrap">
					<h2 id="social-header">Social Media Much?</h2>
					<hr>
                 	<div class="row">
                 		<div id="twitter-link" class="col-xs-12 col-md-6">
							<h3 class="tweet-text">#keepingtabsonsean tweets</h3>
							<p class="tweet-text">Click the twitter icon below to tweet about how awesome this wedding is. Make sure to use the wedding hashtag!</p>
							<ul class="social-link">
								<li class="twitter"><a class="social-link" href="http://twitter.com/home?status=%23keepingtabsonsean%20http%3A%2F%2Fwww%2Esoontobesobey%2Ecom" title="The Sobey Wedding" target="_blank" class="btn btn-twitter"><i class="fa fa-twitter fa-lg" aria-hidden="true"></i></a></li>
							</ul>
						</div>
						<div id="twitter-widget" class="col-xs-12 col-md-6">
							<a class="twitter-timeline"  href="https://twitter.com/hashtag/keepingtabsonsean" data-widget-id="806701425468313600">#keepingtabsonsean Tweets</a>
            				<script>
								!function(d,s,id){
									var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){
										js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);
									}
								}(document,"script","twitter-wjs");
							</script>
						</div>
					</div>
                  	<hr class="insta-sm">	
                  	<div class="row">
                  		<div class="col-xs-12 col-md-6 insta-sm">
							<h3 class="insta-text">#keepingtabsonsean Instagram tags</h3>
							<p class="insta-text">Click the instagram icon below to see all of the pictures snapped at the wedding, using the wedding hashtag!</p>
							<ul class="social-link">
								<li class="instagram"><a href="https://www.instagram.com/tabithamwells/"><i class="fa fa-instagram fa-lg" aria-hidden="true"></i></a></li>
							</ul>
						</div>
						<div id="insta-widget" class="col-xs-12 col-md-6">
							<!-- Instagram SnapWidget -->
							<script src="https://snapwidget.com/js/snapwidget.js"></script>
							<iframe src="https://snapwidget.com/embed/299382" class="snapwidget-widget" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:100%; "></iframe>
						</div>
                  		<div id="insta-link" class="col-xs-12 col-md-6 insta-lg">
							<h3 class="insta-text">#keepingtabsonsean Instagram tags</h3>
							<p class="insta-text">Click the instagram icon below to see all of the pictures snapped at the wedding, using the wedding hashtag!</p>
							<ul class="social-link">
								<li class="instagram"><a href="https://www.instagram.com/tabithamwells/"><i class="fa fa-instagram fa-lg" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section></span>
<!-- END GALLERY SECTION ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<!-- START REGISTRY SECTION ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<section class="registry-bg text-center scrolling" id="registry">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2 text-center" id="registry-text">
					<h1>REGISTRY</h1>
					<a href="https://www.bedbathandbeyond.ca/store/giftregistry/view_registry_guest.jsp?pwsToken=&eventType=Wedding&inventoryCallEnabled=true&registryId=544337792&pwsurl="><img class="img-responsive registry-link center-block" src="img/bbb.png" width="50%" alt="bed bath and beyond logo"></a>
					<p class="lead">Tabitha and Sean are registered at Bed Bath and Beyond! Their registry number is <a href="https://www.bedbathandbeyond.ca/store/giftregistry/view_registry_guest.jsp?pwsToken=&eventType=Wedding&inventoryCallEnabled=true&registryId=544337792&pwsurl=" class="registry-link">544337792</a>, or if you need to search by name: Tabitha Wells or Sean Sobey.</p>
					<p class="lead">If you would like to give them a gift for the wedding besides what they have requested on their registry, they would appreciate money to add to their future home fund. Thank you&#33;</p>
				</div>
			</div>
		</div>
	</section>
<!-- END REGISTRY SECTION //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<!-- START FOOTER SECTION //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<footer class="footer-bg text-center scrolling" id="footer">
		<div class="container-fluid">
			<div class="row footer-wrap">
				<div class="col-xs-12">
					This website was designed with <span>love</span>&#44; by <span><a class="link" href="#">Evan Marshall</a></span>. The handsome ginger in the wedding party...
				</div>
				<div class="to-top">
					<a class="navbar navbar-default navbar-fixed-bottom top col-xs-2 col-xs-offset-10" href="#page-top">Back to Top</a>
				</div>
			</div>
		</div>
	</footer>
	
	</main><!-- ./main-wrap -->
<!-- END FOOTER SECTION ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<!-- START RSVP FORM & PHP /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content text-center">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h1 class="modal-title" id="myModalLabel">RSVP</h1>
				</div><!-- /.modal-header -->
				<div class="modal-body">
				
				
					<form method="post" action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>">
						<div class="radio">
							<label><h2>Attending Wedding?</h2><br>
								<input  type="radio" name="formrsvp" value="Yes" aria-label="..." checked>Yes, because I'm awesome! <br>
								<input  type="radio" name="formrsvp" value="No" aria-label="...">No, because I wish I was cooler... <br>
							</label>
						</div><!-- /.radio -->
						<hr>
						<div class="radio">
							<label><h2>Are you Attending Friday?</h2><br>
								<input type="radio" value="Yes" name="formattend" aria-label="..." checked>You know it! I will be at the Rehersal Dinner &amp; Beach Party <br>
								<input type="radio" value="No" name="formattend" aria-label="...">Pssh nah! I won't be at the Rehersal Dinner &amp; Beach Party <br>
							</label>
						</div><!-- /.radio -->
						<hr>
						<div class="form-group">
							<label for="formfullname"><h2>Your Full Name</h2></label>
							<input required type="name" name="formfullname" class="form-control" placeholder="Please enter your full name">
						</div><!-- /.form-group -->
						<div class="form-group">
							<label for="formemail"><h2>Your Email</h2></label>
							<input required type="email" name="formemail" class="form-control" placeholder="Please enter your email address">
						</div><!-- /.form-group -->
						<hr>
						<div class="textarea">
							<label><h2>Guest Names:</h2></label>
							  <textarea required name="formguestnames" class="form-control" rows="6" placeholder="Please enter the full name of all guests in your party, as addressed on your invitation..."></textarea>
						</div><!-- /.textarea -->
						<hr>
						<span>**Meal to be served at wedding will be Beef Tenderloin.</span>
						<hr>
						<div class="textarea">
							<label><h2>You Picky or What?</h2></label>
							  <textarea name="formextras" class="form-control" rows="10" placeholder="Please enter any specific information for the bride and groom, such as vegetarian guests, allergies, etc. If info is specific to a guest, please enter their name as well as info..."></textarea>
						</div><!-- /.textarea -->
						<br>
						<button type="submit" value="Submit" name="post_submit" class="btn btn-primary">Submit</button>
						<button type="button" value="Close" name="close" class="btn btn-default" data-dismiss="modal">Close</button>
					</form>
					
					
				</div><!-- /.modal-body -->
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- ./modal -->

<!-- END RSVP FORM & PHP ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	
	<!-- JQUERY -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
	<!-- BOOTSTRAP JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha256-U5ZEeKfGNOja007MMD3YBI0A3OSZOQbeG6z2f2Y0hu8=" crossorigin="anonymous"></script>
	<!-- SCROLLMAGIC AND GSAP JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js" integrity="sha256-NsDsBdeb2dMWTv/D7KDxlizW+Cux9ByyEuCAkQviQVM=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js" integrity="sha256-+bwq8Vn1b2Nz1mF35GyYCR3WP1zNBq6AX9P+rIR/vg8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.min.js" integrity="sha256-/6NS53KuMVgzxQozkNjhDjwcyDmv8Sk52zodr91uoo4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js" integrity="sha256-h8XvjWyCJSpIWTvjHOnvHOoYiYNnSzc2DQb6WZCsDb4=" crossorigin="anonymous"></script>
	<!-- JQUERY EASING -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha256-rD86dXv7/J2SvI9ebmNi5dSuQdvzzrrN2puPca/ILls=" crossorigin="anonymous"></script>
	<!-- MAIN JS -->
	<script src="js/main.js"></script>
	<!-- SLICK CAROUSEL JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js" integrity="sha256-4Cr335oZDYg4Di3OwgUOyqSTri0jUm2+7Gf2kH3zp1I=" crossorigin="anonymous"></script>
	<script src="js/my-slick.js"></script>
	<!-- SWIPER JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.0/js/swiper.min.js" integrity="sha256-mPcYboxAQddS1GRB/EMb+sp0NBVB5oTBwRMv/y5hoOg=" crossorigin="anonymous"></script>
	<!-- SWIPER INIT -->
    <script>
		var swiper = new Swiper('.swiper-container', {
			slidesPerView: 3,
			nextButton: '.swiper-button-next',
        	prevButton: '.swiper-button-prev',
			loop: 'true',
			spaceBetween: 30,
			// Responsive breakpoints
  			breakpoints: {
    			// when window width is <= 990px
    			990: {
      			slidesPerView: 1,
      			spaceBetween: 0
    			},
			}
    	});
    </script>
    
    <!-- Collapse Nav and easing JS -->
    <script>
		(function($) {
			"use strict"; // Start of use strict

			// jQuery for page scrolling feature - requires jQuery Easing plugin
			$('a.page-scroll').bind('click', function(event) {
				var $anchor = $(this);
				$('html, body').stop().animate({
					scrollTop: ($($anchor.attr('href')).offset().top - 50)
				}, 1250, 'easeInOutExpo');
				event.preventDefault();
			});

			// Closes the Responsive Menu on Menu Item Click
			$('.navbar-collapse ul li a').click(function() {
				$('.navbar-toggle:visible').click();
			});

			// Fit Text Plugin for Main Header
			$("h1").fitText(
				1.2, {
					minFontSize: '35px',
					maxFontSize: '65px'
				}
			);

		})(jQuery); // End of use strict
	</script>

</body>
<!-- END BODY SECTION //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

</html>