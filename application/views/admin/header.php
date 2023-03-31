<div class="header header-one">

    <div class="header-left header-left-one">
        <a href="<?php echo base_url('admin/index'); ?>" class="logo">
        <img src="<?php echo base_url();?>assets/img/logo.png" alt="Logo">
        </a>
        <a href="<?php echo base_url('admin/index');?>" class="white-logo">
        <img src="<?php echo base_url();?>assets/img/logo-white.png" alt="Logo">
        </a>
        <a href="<?php echo base_url('admin/index');?>" class="logo logo-small">
        <img src="<?php echo base_url();?>assets/img/logo.png" alt="Logo" style="max-height: 10px;">
        </a>
    </div>

    <a href="javascript:void(0);" id="toggle_btn">
        <i class="fas fa-bars"></i>
    </a>

    <a class="mobile_btn" id="mobile_btn">
        <i class="fas fa-bars"></i>
    </a>


    <ul class="nav nav-tabs user-menu">

        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
            <span class="user-img">
            <img src="<?php echo base_url();?>assets/img/profiles/avatar-01.jpg" alt="">
            <span class="status online"></span>
            </span>
            <span><?php echo $this->session->userdata('email'); ?></span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="<?php echo base_url('admin/company_list'); ?>"><i data-feather="user" class="me-1"></i> Profile</a>
                <a class="dropdown-item" href="#"><i data-feather="key" class="me-1"></i> Change Password</a>
                <a class="dropdown-item" href="<?php echo base_url('admin/logout'); ?>"><i data-feather="log-out" class="me-1"></i> Logout</a>
            </div>
        </li>

    </ul>

</div>