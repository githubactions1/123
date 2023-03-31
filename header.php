<!-- <?php
session_start();
?> -->
<header id="header-container" class="header head-tr">
  <!-- Header -->
  <div id="header" class="head-tr bottom">
    <div class="container container-header">

      <!-- Left Side Content -->
      <div class="left-side">

      <!-- Logo -->
      <div id="logo"> <a href="index.php"><img src="images/bg/logo_main.png" data-sticky-logo="images/bg/logo_main.png" alt=""></a> </div>

      <!-- Mobile Navigation -->
      <div class="mmenu-trigger">
        <button class="hamburger hamburger--collapse" type="button"> <span class="hamburger-box"> <span class="hamburger-inner"></span> </span> </button>
      </div>

      <!-- Main Navigation -->
      <nav id="navigation" class="style-1 head-tr">
          <div class="offer1"> &nbsp; </div>
        <ul id="responsive">
          <li><a href="about.php">About Us</a> </li>
          <li><a href="#">Properties</a>
            <ul>
              <li><a href="commercial_properties.php">Commercial</a></li>
              <li><a href="residential_properties.php">Residential</a></li>
              <li><a href="plotting_properties.php">Plotting</a></li>
            </ul>
          </li>
          <li><a href="#">Loans</a>
            <ul>
              <li><a href="index.php#homeloans">NRI Commercial Loans</a></li>
              <li><a href="index.php#homeloans">NRI Residential Loans</a></li>
              <li><a href="index.php#homeloans">Residential Loans</a></li>
              <li><a href="index.php#homeloans">Commercial Loans</a></li>
            </ul>
          </li>
          <li><a href="#">Contact</a></li>
        </ul>
      </nav>
      <!-- Main Navigation / End -->
      </div>
      <!-- Left Side Content / End -->

      <!-- Right Side Content / End -->
      <div class="right-side d-none d-none d-lg-none d-xl-flex"> 
        <!-- Header Widget --> 
        
        <!-- Header Widget / End --> 
      </div>
      <!-- Right Side Content / End -->

      <div>
        <div class="header-action-layout1">
          <ul class="action-list" style="list-style: none;">
            <li class="action-item-style wish-btn"> <a href="wishlist.php" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Favourites"> <i class="flaticon-heart icon-round"></i>
              <div class="item-count">
                <?php

                include("db.php");

                $customers_id = $_SESSION['mobileno'];

                $query = "select count(*) as total from wishlist where customers_id = '$customers_id'";

                $run_query = mysqli_query($con,$query);

                $data=mysqli_fetch_assoc($run_query);
                
                echo $data['total'];

                ?>
              </div>
              <span class="tooltip"> Favourites</span> </a> </li>
          </ul>
        </div>
        <!-- <div align="right" style="width:200px;float:right;"><img src="images/header-icon.png"></div> -->
      </div>

    </div>
  </div>
  <!-- Header / End -->

</header>
<div class="clearfix"></div>
