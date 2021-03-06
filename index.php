<?php
	error_reporting(0);
	// error_reporting(E_ALL);
	// ini_set('display_errors', '1');
	// ini_set('display_startup_errors', 1);
	require './vendor/autoload.php'; # For Composer
	// die('in the index.php');

	// set_include_path(get_include_path() . PATH_SEPARATOR . './libraries/google-api-php-client/src'); # To get Access Tokens to work
	require_once './application/config.php';

	// Controller
	require './application/controllers/controller.php';
	$controller = new Controller();

	// Google Analytics
	include_once './application/analyticstracking.php';
	echo $google_analytics;

	// Header
	require_once './views/header.php';

	$rows = $controller->getRows(); // rows
	$teamMembers = array();
	$teamName;
	foreach ($rows as $row) {
		$teamMember = array();
		if (is_string($row)) {
			$teamName = $row;
		} else {
			foreach ($row as $key => $value) {
				$teamMember[$key] = $value;
				$teamMember['team name'] = $teamName . ': ';
			}
			$teamMembers[] = $teamMember;
		}

	}
	// echo '<pre>';
	// var_dump($teamMembers);
	// echo '</pre>';

?>

		<!-- Social Like/Follow Buttons -->
		<div class="top-left-social">
			<!-- Facebook Like -->
			<div class="fb-like" data-href="<?php echo FACEBOOK_URL; ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share=""></div>
			<!-- Google+ Plus -->
			<div class="g-follow" data-annotation="bubble" data-height="20" data-href="<?php echo GOOGLE_PLUS_URL; ?>" data-rel="publisher"></div>
			<!-- Twitter Follow -->
			<a href="<?php echo TWITTER_URL; ?>" class="twitter-follow-button" data-show-count="true">Follow @hackingedusf</a>
		</div>

		<div id="blog-switch"></div>
		<div id="body">
			<!-- MAIN IMAGE SECTION -->
			<div id="home" class="headerwrap">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2">
							<img class="marg-top-20 col-xs-12 col-sm-10 col-lg-10 col-sm-offset-1 col-lg-offset-1" alt="HackingEDU hackathon" src="./assets/img/hacklogo-white-no-border.png" alt="">
							<div class="col-lg-10 col-lg-offset-1">
								<h3>SF Bay Area</h3>
								<h2>Invent the Future</h2>
							</div>
							<!-- HACKER APPLICATION -->
							<a class="btn marg-left-6 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-3 col-sm-3 col-xs-12 main-btn apply-btn" href="#apply">Main Application</a>
							<!-- <a type="button" class="btn btn-default" href="#hackerForm" data-toggle="tab">Hacker</a> -->
							<!-- VOLUNTEER APPLICATION -->
							<a class="btn col-lg-3 col-md-3 col-sm-3 col-xs-12 main-btn volunteer-btn" href="#apply">Volunteer</a>
							<!-- SPONSOR APPLICATION -->
							<a class="btn col-lg-3 col-md-3 col-sm-3 col-xs-12 main-btn sponsor-btn sponsor-btn-pad" href="#apply">Sponsor</a>
							<div class="spacer"></div>
						</div>
					</div><!-- row -->
				</div><!-- /container -->
			</div><!-- /headerwrap -->
			<div id="fb-root"></div>

			<!-- ABOUT -->
			<?php require_once './views/about.php'; ?>

			<!-- APPLICATION FORMS -->
			<?php require_once './views/formSignUp.php'; ?>

			<!-- TEAM -->
			<?php require_once './views/team.php'; ?>

			<!-- RULES -->
			<?php require_once './views/rules.php'; ?>

			<!-- SCHEDULE -->
			<?php require_once './views/schedule.php'; ?>

			<!-- CALL TO ACTION -->
			<?php require_once './views/sponsors.php'; ?>
		</div>

		<!-- STAY CONNECTED -->
	    <div class="container">
	    	<div class="row mt marg-btm-3">
	      		<div class="col-lg-8">
		        	<h1>Stay Connected</h1>
		        	<p>Join us on our social networks for all the latest updates, service announcements and more or shoot us an email at <strong><a href="mailto:team@hackingedu.co">team@hackingedu.co</a></strong>.</p>
	      		</div>
	      		<div class="col-lg-4">
	      			<p class="pull-right"><br><a data-toggle="modal" data-target="#contactModal"><button type="button" class="btn btn-green">Contact Us!</button></a></p>
	      		</div>
	    	</div><!-- /row -->
	    </div><!-- /.container -->

		<!-- SOCIAL FOOTER -->
		<section id="contact"></section>
		<div id="sf">
			<div class="container ">
				<div class="row">
					<a href="<?php echo FACEBOOK_URL; ?>" target="rss">
						<div class="col-lg-4 dg">
							<h4 class="ml">FACEBOOK</h4>
							<p class="centered"><i class="fa fa-facebook"></i></p>
							<p class="ml">> Become A Friend</p>
						</div>
					</a>
					<a href="<?php echo TWITTER_URL; ?>" target="rss">
						<div class="col-lg-4 lg">
							<h4 class="ml">TWITTER</h4>
							<p class="centered"><i class="fa fa-twitter"></i></p>
							<p class="ml">> Follow Us</p>
						</div>
					</a>
					<a href="<?php echo GOOGLE_PLUS_URL; ?>" target="rss">
						<div class="col-lg-4 dg">
							<h4 class="ml">GOOGLE +</h4>
							<p class="centered"><i class="fa fa-google-plus"></i></p>
							<p class="ml">> Add Us To Your Circle</p>
						</div>
					</a>
				</div><!-- row -->
			</div><!-- container -->
		</div><!-- Social Footer -->

	    <!-- Contact Form Modal -->
		<?php require_once './views/formContact.php'; ?>
		<!-- Levels of Sponsorship Modal -->
		<?php require_once './views/sponsorshipLevelsModal.php'; ?>
	    <!-- Bootstrap core JavaScript
	    ================================================== -->
	    <!-- Placed at the end of the document so the pages load faster -->
	    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	    <script src="assets/js/jquery.js"></script>
	    <script src="assets/js/bootstrap.min.js"></script>
	    <script src="assets/js/main.js"></script>
		<script src="assets/js/masonry.pkgd.min.js"></script>
		<script src="assets/js/imagesloaded.js"></script>
	    <script src="assets/js/classie.js"></script>
		<script src="assets/js/AnimOnScroll.js"></script>
		<!-- SOCIAL MEDIA BUTTONS @ TOP -->
		<!-- Google+ Plus Button / Follow Button -->
		<script src="https://apis.google.com/js/platform.js" async defer></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<!-- <script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
		<script src="assets/js/bootstrap-image-gallery.min.js"></script>
		<script src="./libraries/flexisel-master/js/jquery.flexisel.js"></script>
		<script src="./libraries/Smooth-Div-Scroll/js/jquery.kinetic.min.js"></script>
		<script src="./libraries/Smooth-Div-Scroll/js/jquery.smoothdivscroll-1.3-min.js"></script>
		<script src="./libraries/Smooth-Div-Scroll/js/jquery.mousewheel.min.js"></script>
		<script src="./libraries/Smooth-Div-Scroll/js/source/jquery.smoothDivScroll-1.3.js"></script>
		<script src="./libraries/Smooth-Div-Scroll/js/source/jquery-ui-1.10.3.custom.js"></script> -->
		<!--  jQuery 1.7+  -->
		<script src="./libraries/owl.carousel/assets/js/jquery-1.9.1.min.js"></script>

		<!-- Include js plugin -->
		<script src="./libraries/owl.carousel/owl-carousel/owl.carousel.js"></script>
		<script>

			// $(function () {
			//     animateOnScroll();
			// });

			// DIRECT TO CORRECT FORM
			$(document).ready(function() {
			    $('.apply-btn').click(function() {
				    $('ul.panel-tabs li.active').removeClass('active');
				    $('ul.panel-tabs li.hackerSignup').addClass('active');
				    $('div.tab-pane.active').removeClass('active');
				    $('div.tab-pane.hackerSignup').addClass('active');
			    });
			    $('.volunteer-btn').click(function() {
			    	$('ul.panel-tabs li.active').removeClass('active');
				    $('ul.panel-tabs li.volunteerSignup').addClass('active');
				    $('div.tab-pane.active').removeClass('active');
				    $('div.tab-pane.volunteerSignup').addClass('active');
			    });
			    $('.sponsor-btn').click(function() {
			    	$('ul.panel-tabs li.active').removeClass('active');
				    $('ul.panel-tabs li.sponsorSignup').addClass('active');
				    $('div.tab-pane.active').removeClass('active');
				    $('div.tab-pane.sponsorSignup').addClass('active');
			    });
			});

			// Remove the Social Links that aren't used for Team Profiles!
			$.fn.exists = function () {
			    return this.length !== 0;
			}
			$(document).ready(function() {
				if ($('a[href*="N/A"]').exists()) { // hiding twitter if they don't have a value
					$('a[href*="N/A"]').addClass('hidden');
				}
				if ($('a[href*=" "]').exists()) { // hiding linkedin if they don't have a value
					$('a[href*=" "]').addClass('hidden');
				};
			});

			// Form Change Business + Technical
			function business () {
				$('input[placeholder="Alexander the Hacker"]').attr("placeholder", "Alexander the Businessman");
				$('input[placeholder="Computer Science"]').attr("placeholder", "Business");
				$('input[placeholder="@your_github_username"]').nextAll().eq(1).text("N/A if not applicable");
			}
			function technical () {
				$('input[placeholder="Alexander the Businessman"]').attr("placeholder", "Alexander the Hacker");
				$('input[placeholder="Business"]').attr("placeholder", "Computer Science");
				$('input[placeholder="@your_github_username"]').nextAll().eq(1).text("required");
			}

			// Animations for the sponsors!
			// $(document).ready(function() {
			// 	$("#owl-example").owlCarousel({
			// 		//Autoplay
			// 	    autoPlay : true,
			// 	    stopOnHover : true,
			// 	    // Navigation
			// 	    navigation : false,

			// 	    //Basic Speeds
			//         slideSpeed : 700,
			//         rewindSpeed : 1000

			// 	});

			// 	$("#owl-example2").owlCarousel({
			// 		//Autoplay
			// 	    autoPlay : true,
			// 	    stopOnHover : true,

			// 	    //Basic Speeds
			//         slideSpeed : 300,
			//         rewindSpeed : 500
			// 	});
			// });

			// -- Bootstrap slider
			$(document).ready(function() {
			  $('#media').carousel({
			    pause: true,
			    interval: false,
			  });
			});

			// Facebook Like Button
			window.fbAsyncInit = function() {
				FB.init({
					appId      : '{your-app-id}',
					xfbml      : true,
					version    : 'v2.0'
				});
			};
			(function(d, s, id){
			var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) {return;}
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/en_US/sdk.js";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
			(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) return;
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));

			// Twitter Follow Button
			!function(d,s,id){
				var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){
					js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);
				}
			}(document, 'script', 'twitter-wjs');


			// ANIMATIONS ON SCROLL
			new AnimOnScroll( document.getElementById( 'grid' ), {
				minDuration : 0.4,
				maxDuration : 0.7,
				viewportFactor : 0.2
			} );
			new AnimOnScroll( document.getElementById( 'process' ), {
				minDuration : 0.4,
				maxDuration : 0.7,
				viewportFactor : 0.2
			} );


		</script>
	</body>
</html>
