<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home - My Admin Template</title>
	<?php $this->load->view('Admin/include/css'); ?>
</head>

<body>
<div class="main-menu">
	<header class="header">
		<?php $this->load->view('Admin/include/header'); ?>
	</header>
	<!-- /.header -->
	<div class="content">
        <!-- SIDEBAR -->
        <?php $this->load->view('Admin/include/sidebar'); ?>
        <!-- SIDEBAR -->
	</div>
	<!-- /.content -->
</div>
<!-- /.main-menu -->

<div class="fixed-navbar">
	<!-- <div class="pull-left">
		<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
		<h1 class="page-title">Home</h1>
	</div>
	<div class="pull-right">
		<div class="ico-item">
			<a href="#" class="ico-item mdi mdi-magnify js__toggle_open" data-target="#searchform-header"></a>
			<form action="#" id="searchform-header" class="searchform js__toggle"><input type="search" placeholder="Search..." class="input-search"><button class="mdi mdi-magnify button-search" type="submit"></button></form>
		</div>
		<a href="#" class="ico-item mdi mdi-email notice-alarm js__toggle_open" data-target="#message-popup"></a>
		<a href="#" class="ico-item pulse"><span class="ico-item mdi mdi-bell notice-alarm js__toggle_open" data-target="#notification-popup"></span></a>
		<a href="#" class="ico-item mdi mdi-logout js__logout"></a>
	</div> -->
</div>
<!-- /.fixed-navbar -->

<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-success text-white">
					<div class="statistics-box with-icon">
						<i class="ico small fa fa-diamond"></i>
						<p class="text text-white">SUCCESS</p>
						<h2 class="counter">72943</h2>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-info text-white">
					<div class="statistics-box with-icon">
						<i class="ico small fa fa-download"></i>
						<p class="text text-white">DOWNLOAD</p>
						<h2 class="counter">6382</h2>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-danger text-white">
					<div class="statistics-box with-icon">
						<i class="ico small fa fa-bug"></i>
						<p class="text text-white">FIXED BUG</p>
						<h2 class="counter">12564</h2>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content bg-warning text-white">
					<div class="statistics-box with-icon">
						<i class="ico small fa fa-usd"></i>
						<p class="text text-white">SALES</p>
						<h2 class="counter">2,637</h2>
					</div>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-3 col-md-6 col-xs-12 -->
		</div>
		<!-- .row -->

		<div class="row small-spacing">
			<div class="col-lg-6 col-xs-12">
				<div class="box-content">
					<div id="calendar-widget"></div>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-6 col-xs-12 -->
			<div class="col-lg-6 col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Purchases</h4>
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
						<a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
						<ul class="sub-menu">
							<li><a href="#">Product</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else there</a></li>
							<li class="split"></li>
							<li><a href="#">Separated link</a></li>
						</ul>
						<!-- /.sub-menu -->
					</div>
					<!-- /.dropdown js__dropdown -->
					<div class="table-responsive table-purchases">
						<table class="table table-striped margin-bottom-10">
							<thead>
								<tr>
									<th style="width:40%;">Product</th>
									<th>Price</th>
									<th>Date</th>
									<th>State</th>
									<th style="width:5%;"></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Amaza Themes</td>
									<td>$71</td>
									<td>Nov 12,2016</td>
									<td class="text-success">Completed</td>
									<td><a href="#"><i class="fa fa-plus-circle"></i></a></td>
								</tr>
								<tr>
									<td>Macbook</td>
									<td>$142</td>
									<td>Nov 10,2016</td>
									<td class="text-danger">Cancelled</td>
									<td><a href="#"><i class="fa fa-plus-circle"></i></a></td>
								</tr>
								<tr>
									<td>Samsung TV</td>
									<td>$200</td>
									<td>Nov 01,2016</td>
									<td class="text-warning">Pending</td>
									<td><a href="#"><i class="fa fa-plus-circle"></i></a></td>
								</tr>
								<tr>
									<td>Ninja Admin</td>
									<td>$200</td>
									<td>Oct 28,2016</td>
									<td class="text-warning">Pending</td>
									<td><a href="#"><i class="fa fa-plus-circle"></i></a></td>
								</tr>
								<tr>
									<td>Galaxy Note 5</td>
									<td>$200</td>
									<td>Oct 28,2016</td>
									<td class="text-success">Completed</td>
									<td><a href="#"><i class="fa fa-plus-circle"></i></a></td>
								</tr>
								<tr>
									<td>CleanUp Themes</td>
									<td>$71</td>
									<td>Oct 22,2016</td>
									<td class="text-success">Completed</td>
									<td><a href="#"><i class="fa fa-plus-circle"></i></a></td>
								</tr>
								<tr>
									<td>Facebook WP Plugin</td>
									<td>$10</td>
									<td>Oct 15,2016</td>
									<td class="text-success">Completed</td>
									<td><a href="#"><i class="fa fa-plus-circle"></i></a></td>
								</tr>
								<tr>
									<td>Iphone 7</td>
									<td>$100</td>
									<td>Oct 12,2016</td>
									<td class="text-warning">Pending</td>
									<td><a href="#"><i class="fa fa-plus-circle"></i></a></td>
								</tr>
								<tr>
									<td>Nova House</td>
									<td>$100</td>
									<td>Oct 12,2016</td>
									<td class="text-warning">Pending</td>
									<td><a href="#"><i class="fa fa-plus-circle"></i></a></td>
								</tr>
								<tr>
									<td>Repair Cars</td>
									<td>$35</td>
									<td>Oct 12,2016</td>
									<td class="text-warning">Pending</td>
									<td><a href="#"><i class="fa fa-plus-circle"></i></a></td>
								</tr>
							</tbody>
						</table>
						<!-- /.table -->
					</div>
					<!-- /.table-responsive -->
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-lg-6 col-xs-12 -->
		</div>
		<!-- /.row -->		
		<footer class="footer">
			<?php $this->load->view('Admin/include/footer'); ?>
		</footer>
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->

<!-- JAVASCRIPT -->
<?php $this->load->view('Admin/include/js'); ?>
<!-- JAVASCRIPT -->
</body>
</html>