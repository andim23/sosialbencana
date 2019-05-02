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
				<li><a href="<?php echo base_url('user'); ?>">Data</a></li>
				<li><a href="<?php echo base_url('level'); ?>">Level</a></li>
				<li><a href="<?php echo base_url('status'); ?>">Status</a></li>
			</ul>
		</li>
		<li class="">
			<a class="waves-effect" href="<?php echo base_url('Admin/post'); ?>"><i class="menu-icon mdi mdi-airballoon"></i><span>Posting</span></a>
		</li>
	</ul>
</div>