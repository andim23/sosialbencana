
<div class="agileits_main">
<!-- menu -->
<nav class="navbar navbar-inverse ">
	<div class="container">
    <!-- header -->
    <div class="w3_agile_logo"><h1 class="text-left"><a href="<?php echo base_url() ?>"><?php echo SITE_NAME ?></a></h1></div>
    <!-- //header -->
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
		</button>

  	<div class="collapse navbar-collapse top-nav w3l navbar-right" id="bs-example-navbar-collapse-1">
  		<ul class="nav navbar-nav linkEffects linkHoverEffect_11 custom-menu">
  			<li class="agile_active"><a href="#about"><span>about us</span></a></li>
  			<li><a href="#gallery"><span>gallery </span></a></li>
  			<li><a href="#team" ><span>team</span></a></li>
        <li><a href="<?php echo base_url('home/contact') ?>"><span>Contact</span></a></li>
        <li><a href="<?php echo base_url('home/login') ?>"><i class="fa fa-user"></i></a></li>
  		</ul>
  	</div>
	</div>
</nav>
<!-- //menu -->

<!-- banner -->
<div class="w3_banner">
	<div class="container">
		<div class="slider">
			<div class="callbacks_container">
			   <ul class="rslides callbacks callbacks1" id="slider4">
					<li>
						<div style="background: url(<?php echo base_url('asset/front/images/1.jpg')?>) no-repeat center;" class="banner_text_w3layouts<?php //if($i==1){ echo 'active'; } ?>" >
							<h3>Maur egetire sit tmae.</h3>
							<span> </span>
							<p>Casp Eestibulum </p>
						</div>
					</li>
					 <li>
						<div style="background: url(<?php echo base_url('asset/front/images/1.jpg')?>) no-repeat center;" class="banner_text_w3layouts<?php //if($i==1){ echo 'active'; } ?>" >
							<h3>Eget Integer sit amet.</h3>
							<span> </span>
							<p>Rlua vestibulum </p>
						</div>
					</li>
					 <li>
						<div style="background: url(<?php echo base_url('asset/front/images/1.jpg')?>) no-repeat center;" class="banner_text_w3layouts<?php //if($i==1){ echo 'active'; } ?>" >
							<h3>Amet sitamet tus libe.</h3>
							<span> </span>
							<p>Cras vestibulum </p>
						</div>
					</li>
				</ul>
			</div>
		  <script src="<?php echo base_url() ?>asset/front/js/responsiveslides.min.js"></script>
		  <script>
			// You can also use "$(window).load(function() {"
			$(function () {
			  // Slideshow 4
			  $("#slider4").responsiveSlides({
				auto: true,
				pager:true,
				nav:true,
				speed: 500,
				namespace: "callbacks",
				before: function () {
				  $('.events').append("<li>before event fired.</li>");
				},
				after: function () {
				  $('.events').append("<li>after event fired.</li>");
				}
			  });

			});
		 </script>
	   </div>
	</div>
</div>
  </div>
