<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>PHX University - Harris Center - Kiosk</title>
		<meta name="robots" content="noindex, nofollow">
		<meta name="googlebot" content="noindex, nofollow">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans%7COswald&amp;ver=1.0.0" type="text/css" media="all">
		<link rel="stylesheet" href="dist/css/app.css">
	</head>
	<body>
		<div id="app">
			<div class="container">

				<div class="header clearfix">
					<span class="date"><?php echo date( 'l, F j' ); ?></span>
					<span class="weather">Today's Weather: <i class="fa fa-sun-o" aria-hidden="true"></i> <span class="forecast">Sunny and 74 degrees</span></span>
					<a class="logo" href="#">Welcome to The Harris Center</a>
				</div><!-- /header -->

				<div class="content-wrap clearfix">
					<div class="content">
						<div class="interactive-map">
							<h2>Harris Center Interactive Map</h2>
							<img src="dist/img/map.png" alt="Harris Center Map" />
						</div><!-- /interactive-map -->


						<h2>Harris Center Research</h2>
						<div class="posts" :class="{ 'active' : hasPosts }">
							<div class="posts-wrapper clearfix">
								<div v-for="post in posts" :key="post.id" class="post">
									<div class="thumb"><a :href="post.link" target="_blank"><span class="placeholder"></span></a></div>
									<h3 class="title"><a :href="post.link" target="_blank" v-html="post.title.rendered"></a></h3>
								</div>
							</div>
						</div><!-- /posts -->

						<div v-if="! hasPosts" class="loading-posts">
							<i class="fa fa-circle-o-notch fa-spin left" aria-hidden="true"></i> Loading Research...
						</div>
					</div><!-- /content -->

					<div class="sidebar">
						<h2>Harris Center Events</h2>

						<div class="events" :class="{ 'active' : hasEvents }">
							<div class="event-wrapper clearfix">
								<a v-for="event in events" :key="event.id" :href="event.link" target="_blank" class="event">
									<h3 class="event-title"><div v-html="event.title.rendered"></div></h3>
									<span class="event-meta">
										<span class="time">
											<i class="fa fa-clock-o" aria-hidden="true"></i>
											<span class="time-text">{{ event.acf.event_start_time }}</span>
										</span>
										<span class="sep">|</span>
										<span class="location">
											<i class="fa fa-map-marker" aria-hidden="true"></i>
											<span class="location-text">{{ event.location }}</span>
										</span>
									</span>
								</a><!-- /event -->
							</div><!-- /event-wrapper -->
						</div><!-- /events -->

						<div v-if="! hasEvents" class="loading-events">
							<i class="fa fa-circle-o-notch fa-spin left" aria-hidden="true"></i> Loading Events...
						</div><!-- /loading-events -->

					</div><!-- /sidebar -->
				</div><!-- /content-wrap -->

				<div class="footer">&copy; <?php echo date( 'Y' ); ?> PHX University. All rights reserved.</div><!-- /footer -->
			</div><!-- /container -->
		</div><!-- /app -->

		<script type="text/javascript" src="dist/js/app.js"></script>
	</body>
</html>
