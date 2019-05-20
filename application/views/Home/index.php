<!-- home -->
<div class="home_ w3layouts">
 <div class="home_grids_w3">
 <?php foreach($posting as $post){ ?>
 	<a href="<?php echo base_url('posting/detail/').$post['slug_post']; ?>">
		<div class="home_main">
			<div style="background: url(<?php echo base_url('uploads/').$post['nama_img']; ?>) center;" class="col-md-6 col-sm-6 col-xs-6 img1 img-grid">
				<div class="img_text_w3ls text-center">
					<h4> <?php echo $post['caption']; ?> </h4>
					<span> </span>
					<p> <?php echo $post['tanggal']; ?> </p>
				</div>
			</div>
		</div>
	</a>
 <?php } ?>
</div>
</div>
<!-- //home -->
<!-- about -->
<div class="clearfix"></div>
<div class="about_agileinfo" id="about">
  <div class="container">
      <h3 class="title">about us</h3>
	  <div class="about_main">
		  <div class="col-md-6 col-sm-6 col-xs-6 about_agileits"></div>
		  <div class="col-md-6 col-sm-6 col-xs-6 about_text_w3l">
		    <h4>Sosial Bencana</h4>
			<P>Perkembangan dalam bidang informasi menuntut
					kemudahan bagi manusia untuk mendapatkan dan
					menyebarkan informasi yang didapatkan. Aplikasi berbasis
					website memberikan kemudahan dalam mengakses informasi
					ataupun memberikan informasi yang dimiliki. Hal ini juga
					dipermudah dengan berkembangnya device untuk mengakses
					informasi yang ada.
					Maka dari itu kami mencoba membuat aplikasi Sosial
					Bencana. Ide pembuatan aplikasi ini adalah, kami ingin
					mempermudah warga Kota Semarang untuk mengetahui
					tempat-tempat yang sering terjadi, dan pengguna juga dapat
					melaporkan kejadian-kejadian bencana alam.
			</P>
		  </div>
		  <div class="clearfix"></div>
	  </div>
  </div>
 </div>
<!-- //about -->
<!-- gallery -->
<div class="gallery_wthree" id="gallery">
 <div class="container">
      <h3 class="title">gallery</h3>
	  <div class="gallery_grid agileits_w3layouts">
	    <div class="col-md-6  col-sm-6 col-xs-6 grid_w3">
			<div class="grid-1">
				<a class="cm-overlay" href="images/2.jpg">
					<img src="images/2.jpg" alt=" " class="img-responsive" />
					 <div class="w3agile-text w3agile-text-smal1">
						<h5>Snap shot</h5>
					</div>
				</a>
			</div>
			 <div class="sub_grid gallery_w3l">
				   <div class="col-md-6 col-sm-6 col-xs-6 grid-1 grid-c grid_w3l">
						<a class="cm-overlay" href="images/14.jpg">
							<img src="images/14.jpg" alt=" " class="img-responsive" />
							<div class="w3agile-text w3agile-text-small">
								<h5>Snap shot</h5>
					        </div>
						</a>
					</div>
				   <div class="col-md-6 col-sm-6 col-xs-6 grid-1 grid-b grid_w3l">
					 	<a class="cm-overlay" href="images/13.jpg">
							<img src="images/13.jpg" alt=" " class="img-responsive" />
							<div class="w3agile-text w3agile-text-smal1">
								<h5>Snap shot</h5>
							</div>
						</a>
					</div>
				   <div class="clearfix"></div>
			 </div>
        </div>
		<div class="col-md-6 col-sm-6 col-xs-6 grid_w3">
		   <div class="sub_grid">
			   <div class="col-md-6 col-sm-6 col-xs-6 grid-1 grid-c grid_w3l">
          			<a class="cm-overlay" href="images/15.jpg">
						<img src="images/15.jpg" alt=" " class="img-responsive" />
						<div class="w3agile-text w3agile-text-small">
							<h5>Snap shot</h5>
						</div>
					</a>
			   </div>
			   <div class="col-md-6 col-sm-6 col-xs-6 grid-1 grid-d grid_w3l">
					<a class="cm-overlay" href="images/16.jpg">
						<img src="images/16.jpg" alt=" " class="img-responsive" />
						<div class="w3agile-text w3agile-text-smal1">
							<h5>Snap shot</h5>
						</div>
					</a>
				</div>
				 <div class="clearfix"></div>
			   </div>
		    <div class="grid-1 grid-2">
				<a class="cm-overlay" href="images/7.jpg">
					<img src="images/7.jpg" alt=" " class="img-responsive" />
					<div class="w3agile-text w3agile-text-smal1">
							<h5>Snap shot</h5>
					</div>
				</a>
		    </div>
		   <div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	  </div>
</div>
</div>
<!-- //gallery -->
<!-- Tooltip -->
<div class="tooltip-content">
	<div class="modal fade features-modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h2 class="modal-title text-center">candid</h2>
				</div>
				<div class="modal-body">
					<img src="images/7.jpg" alt="image">
					<p>Fusce et congue nibh, ut ullamcorper magna. Donec ac massa tincidunt, fringilla sapien vel, tempus massa. Vestibulum felis leo, tincidunt sit amet tristique accumsan. In vitae dapibus metus. Donec nec massa non nulla mattis aliquam egestas et mi.</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- //Tooltip -->
<!-- section -->
<div class="w3layouts-section" id="blog">
	<div class="container">
		<h3 class="title">Let the creativity Begin</h3>
		<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		<a href="#myModal" class="agilebtn" data-toggle="modal" data-target="#myModal"><span>Read More</span></a>
	</div>
</div>
<!-- //section -->
<!--team -->
<div class="team agileits-w3layouts" id="team">
	<div class="container">
		<h3 class="title">Our Team</h3>
		<!-- TEAM 1 -->
		<div class="team-w3ls">
			<div class="col-md-4 col-sm-4 col-xs-4 team-grid w3_agileits">
				<img class="img-w3l t1-wthree img-responsive" src="images/abdiel.png" alt="">
				<h5>Abdiel Reyhan</h5>
				<p>Web Service & Real Time</p>
				<div class="social-icons">
					<ul>
						<li><a href="#" class="fa fa-facebook icon icon-border facebook"> </a></li>
						<li><a href="#" class="fa fa-twitter icon icon-border twitter"> </a></li>
						<li><a href="#" class="fa fa-google-plus icon icon-border googleplus"> </a></li>
					</ul>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-4 team-grid w3_agileits t2">
				<img class="img-w3l t1-wthree img-responsive" src="images/wahyu.png" alt="">
				<h5>Wahyu Rizky</h5>
				<p>Web Service & Real Time</p>
				<div class="social-icons">
					<ul>
						<li><a href="#" class="fa fa-facebook icon icon-border facebook"> </a></li>
						<li><a href="#" class="fa fa-twitter icon icon-border twitter"> </a></li>
						<li><a href="#" class="fa fa-google-plus icon icon-border googleplus"> </a></li>
					</ul>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-4 w3_agileits team-grid">
				<img class="img-w3l t1-wthree img-responsive" src="images/fahmi.png" alt="">
				<h5>Fahmi Anwar</h5>
				<p>Designer Database & Backend Developer</p>
				<div class="social-icons agile">
					<ul>
						<li><a href="#" class="fa fa-facebook icon icon-border facebook"> </a></li>
						<li><a href="#" class="fa fa-twitter icon icon-border twitter"> </a></li>
						<li><a href="#" class="fa fa-google-plus icon icon-border googleplus"> </a></li>
					</ul>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		
		<!-- TEAM 2 -->
		<div class="team-w3ls">
			<div class="col-md-4 col-sm-4 col-xs-4 team-grid w3_agileits">
				<img class="img-w3l t1-wthree img-responsive" src="images/ira.png" alt="">
				<h5>Ira Kusuma</h5>
				<p>Backend Developer</p>
				<div class="social-icons">
					<ul>
						<li><a href="#" class="fa fa-facebook icon icon-border facebook"> </a></li>
						<li><a href="#" class="fa fa-twitter icon icon-border twitter"> </a></li>
						<li><a href="#" class="fa fa-google-plus icon icon-border googleplus"> </a></li>
					</ul>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-4 team-grid w3_agileits t2">
				<img class="img-w3l t1-wthree img-responsive" src="images/fandi.png" alt="">
				<h5>Afandi Maulana</h5>
				<p>Frontend Developer</p>
				<div class="social-icons">
					<ul>
						<li><a href="#" class="fa fa-facebook icon icon-border facebook"> </a></li>
						<li><a href="#" class="fa fa-twitter icon icon-border twitter"> </a></li>
						<li><a href="#" class="fa fa-google-plus icon icon-border googleplus"> </a></li>
					</ul>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-4 w3_agileits team-grid">
				<img class="img-w3l t1-wthree img-responsive" src="images/rusydi.png" alt="">
				<h5>Rusydi Shabri</h5>
				<p>Frontend Developer</p>
				<div class="social-icons agile">
					<ul>
						<li><a href="#" class="fa fa-facebook icon icon-border facebook"> </a></li>
						<li><a href="#" class="fa fa-twitter icon icon-border twitter"> </a></li>
						<li><a href="#" class="fa fa-google-plus icon icon-border googleplus"> </a></li>
					</ul>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!-- //team-->
