<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul class="nav navbar-nav">
                <li class="menu-title"><span>Ola Tech Solution</span></li>

                <!-- <li class="<?php $name = $this->uri->segment(2); if($name == 'dashboard'){echo 'active';}?>">
                    <a href="<?php echo base_url('admin/dashboard'); ?>"><i data-feather="home"></i> <span>Dashboard</span></a>
                </li> -->

                <li class="submenu <?php $name = $this->uri->segment(2); if($name == 'properties_list' || $name == 'add_properties' || $name == 'edit_properties'){echo 'active';}?>">

                    <a href="#">
                        <i data-feather="home"></i> <span > Properties</span> <span class="menu-arrow"></span>
                    </a>

                    <ul style="display: <?php $name = $this->uri->segment(2); if($name == 'properties_list' || $name == 'add_properties' || $name == 'edit_properties'){echo 'block';}?>;">

                        <li class="<?php $name = $this->uri->segment(2); if($name == 'properties_list'){echo 'sactive'; } ?>">

                            <a href="<?php echo base_url('admin/properties_list'); ?>">Properties List</a>

                        </li>

                        <li class="<?php $name = $this->uri->segment(2); if($name == 'add_properties'){echo 'sactive'; } if($name == 'edit_properties'){echo 'sactive'; } ?>">

                            <a href="<?php echo base_url('admin/add_properties'); ?>">Add Properties</a>

                        </li>

                    </ul>

                </li>

                <li class="submenu <?php $name = $this->uri->segment(2); if($name == 'slider_list' || $name == 'add_slider' || $name == 'edit_slider'){echo 'active';}?>">

                    <a href="#">
                        <i data-feather="sliders"></i> <span > Slider</span> <span class="menu-arrow"></span>
                    </a>

                    <ul style="display: <?php $name = $this->uri->segment(2); if($name == 'slider_list' || $name == 'add_slider' || $name == 'edit_slider'){echo 'block';}?>;">

                        <li class="<?php $name = $this->uri->segment(2); if($name == 'slider_list'){echo 'sactive'; } ?>">

                            <a href="<?php echo base_url('admin/slider_list'); ?>">Slider List</a>

                        </li>

                        <li class="<?php $name = $this->uri->segment(2); if($name == 'add_slider'){echo 'sactive'; } if($name == 'edit_slider'){echo 'sactive'; } ?>">

                            <a href="<?php echo base_url('admin/add_slider'); ?>">Add Slider</a>

                        </li>

                    </ul>

                </li>

                <li class="submenu <?php $name = $this->uri->segment(2); if($name == 'loan_list' || $name == 'edit_loan' || $name == 'bank_loan_list'  || $name == 'edit_bank_loan'){echo 'active';}?>">

                    <a href="#">
                        <i data-feather="dollar-sign"></i> <span > Loan</span> <span class="menu-arrow"></span>
                    </a>

                    <ul style="display: <?php $name = $this->uri->segment(2); if($name == 'loan_list' || $name == 'edit_loan' || $name == 'bank_loan_list'  || $name == 'edit_bank_loan'){echo 'block';}?>;">

                        <li class="<?php $name = $this->uri->segment(2); if($name == 'loan_list'){echo 'sactive'; } ?>">

                            <a href="<?php echo base_url('admin/loan_list'); ?>">Loan Inquiry List</a>

                        </li>

                        <!-- <li class="<?php $name = $this->uri->segment(2); if($name == 'bank_loan_list'){echo 'sactive'; } if($name == 'edit_bank_loan'){echo 'sactive'; } ?>">

                            <a href="<?php echo base_url('admin/bank_loan_list'); ?>">Bank Loan List</a>

                        </li> -->

                        <li class="<?php $name = $this->uri->segment(2); if($name == 'bank_offer_list'){echo 'sactive'; } if($name == 'edit_bank_offer'){echo 'sactive'; } ?>">

                            <a href="<?php echo base_url('admin/bank_offer_list'); ?>">Bank Offer List</a>

                        </li>

                    </ul>

                </li>

                <!-- <li>
                    <a href="settings.html"><i data-feather="settings"></i> <span>Settings</span></a>
                </li> -->
            </ul>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>