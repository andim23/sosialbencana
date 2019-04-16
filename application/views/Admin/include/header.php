<a href="<?php echo base_url('admin'); ?>" class="logo"><i class="ico mdi mdi-cube-outline"></i><?php echo SITE_NAME; ?></a>
<button type="button" class="button-close fa fa-times js__menu_close"></button>
<div class="user">
    <a href="#" class="avatar"><img src="<?php echo base_url('asset/img/sosial/avatar.png') ?>" alt=""><span class="status online"></span></a>
    <h5 class="name"><a href="#"><?php echo $this->session->userdata('username'); ?></a></h5>
    <h5 class="position"><?php echo $this->session->userdata('level'); ?></h5>
    <!-- /.name -->
    <div class="control-wrap js__drop_down">
        <i class="fa fa-caret-down js__drop_down_button"></i>
        <div class="control-list">
            <div class="control-item"><a href="profile.html"><i class="fa fa-user"></i> Profile</a></div>
            <div class="control-item"><a href="#"><i class="fa fa-gear"></i> Settings</a></div>
            <div class="control-item"><a href="#"><i class="fa fa-sign-out"></i> Log out</a></div>
        </div>
        <!-- /.control-list -->
    </div>
    <!-- /.control-wrap -->
</div>
<!-- /.user -->