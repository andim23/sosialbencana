<div class="navigation">
	<h5 class="title">Navigation</h5>
	<!-- /.title -->
	<ul class="menu js__accordion">
		<li class="">
			<a class="waves-effect" href="<?php echo base_url('admin'); ?>"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Dashboard</span></a>
		</li>
		<li>
			<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-user"></i><span>User</span><span class="menu-arrow fa fa-angle-down"></span></a>
			<ul class="sub-menu js__content">
				<li><a href="<?php echo base_url('admin/user'); ?>">Data</a></li>
				<li><a href="<?php echo base_url('admin/leveluser'); ?>">Level</a></li>
				<li><a href="<?php echo base_url('admin/statususer'); ?>">Status</a></li>
			</ul>
		</li>
	</ul>
</div>