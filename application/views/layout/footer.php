<!-- copy-right -->
<div class="copy-right agileits-w3layouts">
	<div class="container">
		<div class="social-icons agileits">
     		<ul>
				<li><a href="#" class="fa fa-facebook icon icon-border facebook"> </a></li>
				<li><a href="#" class="fa fa-twitter icon icon-border twitter"> </a></li>
				<li><a href="#" class="fa fa-google-plus icon icon-border googleplus"> </a></li>
				<li><a href="#" class="fa fa-dribbble icon icon-border dribbble"> </a></li>
			</ul>
			<div class="clearfix"> </div>
		</div>
		<p>© 2017 candid. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
	</div>
</div>
<!-- //copy-right -->
<!-- Gallery-plugin -->
<script src="<?php echo base_url() ?>asset/front/js/jquery.mobile.custom.min.js"></script>
<script src="<?php echo base_url() ?>asset/front/js/jquery.cm-overlay.js"></script>
		<script>
			$(document).ready(function(){
				$('.cm-overlay').cmOverlay();
			});
		</script>
<!-- //Gallery-plugin -->
<!-- start-smooth-scrolling -->
<script type="text/javascript" src="<?php echo base_url() ?>asset/front/js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>asset/front/js/easing.js"></script>
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){
				event.preventDefault();

		$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
</script>
<script src="<?php echo base_url() ?>asset/front/js/SmoothScroll.min.js"></script>
<!-- //end-smooth-scrolling -->
<!-- smooth-scrolling-of-move-up -->
<script type="text/javascript">
	$(document).ready(function() {
		/*
		var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear'
		};
		*/
		$().UItoTop({ easingType: 'easeOutQuart' });
	});
</script>
<script type="text/javascript" src="<?php echo base_url() ?>asset/front/js/bootstrap.js"></script>
<script src="<?php echo base_url('asset/home/js/sweetalert2.all.min.js'); ?>"></script>
</body>
</html>
