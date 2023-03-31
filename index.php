<?php
session_start();
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="description">
  <meta name="author" content="">
  <title>Trie Properties</title>
  <!-- FAVICON -->
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="font/flaticon.css">
  <link rel="stylesheet" href="css/fontawesome-all.min.css">
  <link rel="stylesheet" href="css/fontawesome-5-all.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- ARCHIVES CSS -->
  <link rel="stylesheet" href="css/search.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/aos2.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/lightcase.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/menu.css">
  <link rel="stylesheet" href="css/slick.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/maps.css">
  <link rel="stylesheet" id="color" href="css/colors/pink.css">
  <link rel="stylesheet" href="css/plugins.css" />
  <link rel="stylesheet" href="css/style1.css" />

  <style>
    #marquee:hover {color:#17aa5c;}
  </style>
</head>

<body class="homepage-9 hp-6 homepage-1 mh">
  <!-- Wrapper -->
  <div id="wrapper">
    <?php
    include('db.php');
    $customers_id = $_SESSION['mobileno'];
    $query = "select * FROM wishlist JOIN properties ON properties.id = wishlist.product_id where customers_id = '$customers_id' ORDER BY wishlist.product_id ASC";
    //$whish_array = $con->select($query);

    $whish_array = mysqli_query($con,$query);

    $whish_array_pid = array();
    if (! empty($whish_array))
    {
      //print_r('vvvv');exit;
      foreach ($whish_array as $z => $value)
      {
        //print_r($whish_array);exit;
        $whish_array_pid[] = $value['product_id'];
      }
    }
    ?>
    <!-- START SECTION HEADINGS --> 

    <!-- Header Container -->
    <?php include('header.php'); ?>
    <!-- Header Container / End --> 

    <!-- STAR HEADER SEARCH -->
    <header class="header slider-fade small-height-align" data-scroll-index="0">      
      <div class="container-fluid">
          <div class="row">
              <div class="owl-carousel owl-theme width-100">
                  <?php

                  include("db.php");

                  $query = "select * from slider";

                  $run_query = mysqli_query($con,$query);

                  while($row = mysqli_fetch_array($run_query))

                  {
                    $slider_id = $row['id'];
                    $slider_name1 = $row['slider_name1'];
                    $slider_name2 = $row['slider_name2'];
                    $slider_name3 = $row['slider_name3'];
                    $photo = $row['photo'];

                  ?>
                  <div class="text-center item bg-img" data-overlay-dark="4" data-background="adminpanel/uploads/slider/<?php echo $photo; ?>">
                      <div class="absolute-middle-center caption">
                          <div class="overflow-hidden">
                              <h3 class="title-font text-theme-color font-size28 sm-font-size18 no-margin"><?php echo $slider_name1; ?></h3>
                              <h1 class="banner-headline clip text-white"><?php echo $slider_name2; ?></h1>
                              <p> <?php echo $slider_name3; ?> </p>
                              <a href="#commercial" class="btn theme">COMMERCIAL</a>
                              <a href="#residential" class="btn theme">RESIDENTIAL</a>
                              <a href="#plotting" class="btn theme">PLOTTING</a>
                              <a href="#homeloans" class="btn theme">Loans</a>
                          </div>
                      </div>
                  </div>
                  <?php } ?>
                  <!-- <div class="text-center item bg-img" data-overlay-dark="8" data-background="images/bg/bg-h-1.jpg">
                      <div class="absolute-middle-center caption">
                          <div class="overflow-hidden">
                              <h3 class="title-font text-theme-color font-size28 sm-font-size18 no-margin">We are</h3>
                              <h1 class="banner-headline clip text-white">Specialised</h1>
                              <p class="margin-30px-bottom sm-margin-20px-bottom xs-display-none text-white">For your dream home</p>
                              <a href="#commercial" class="btn theme">COMMERCIAL</a>
                              <a href="#residential" class="btn theme">RESIDENTIAL</a>
                              <a href="#plotting" class="btn theme">PLOTTING</a>
                              <a href="#homeloans" class="btn theme">Loans</a>
                          </div>
                      </div>
                  </div>
                  <div class="text-center item bg-img" data-overlay-dark="8" data-background="images/bg/bg-21.jpg">
                      <div class="absolute-middle-center caption">
                          <div class="overflow-hidden">
                              <h3 class="title-font text-theme-color font-size28 sm-font-size18 no-margin">Best options for</h3>
                              <h1 class="banner-headline clip text-white">Prime Plots</h1>
                              <p class="margin-30px-bottom sm-margin-20px-bottom xs-display-none text-white">Your dream into reality</p>
                              <a href="#commercial" class="btn theme">COMMERCIAL</a>
                              <a href="#residential" class="btn theme">RESIDENTIAL</a>
                              <a href="#plotting" class="btn theme">PLOTTING</a>
                              <a href="#homeloans" class="btn theme">Loans</a>
                          </div>
                      </div>
                  </div>
                  <div class="text-center item bg-img" data-overlay-dark="8" data-background="images/bg/bg-loan.jpg">
                      <div class="absolute-middle-center caption">
                          <div class="overflow-hidden">
                              <h3 class="title-font text-theme-color font-size28 sm-font-size18 no-margin">Are you looking for</h3>
                              <h1 class="banner-headline clip text-white">Loans</h1>
                              <p class="margin-30px-bottom sm-margin-20px-bottom xs-display-none text-white">Simple & Easy Loan Process</p>
                              <a href="#commercial" class="btn theme">COMMERCIAL</a>
                              <a href="#residential" class="btn theme">RESIDENTIAL</a>
                              <a href="#plotting" class="btn theme">PLOTTING</a>
                              <a href="#homeloans" class="btn theme">Loans</a>
                          </div>
                      </div>
                  </div> -->

              </div>
          </div>
      </div>
    </header>
    <!-- END HEADER SEARCH --> 

    <!-- START SECTION COMMERCIAL PROPERTIES -->
    <section class="featured portfolio bg-white-2 rec-pro full-l">
      <div class="container-fluid">
        <div class="sec-title">
          <div class="row">
            <div class="item col-xl-4 col-lg-12 col-md-12 col-xs-12 landscapes sale">
              <h2><a id="commercial"></a><span>Commercial </span>Properties</h2>
              <input type="hidden" name="sessionmob" id="sessionmob" value="<?php echo $_SESSION['mobileno']; ?>">
            </div>

            <div class="item col-xl-4 col-lg-12 col-md-12 col-xs-12 ">
              <h3 class="text-right" style="margin-left: 120px;">Apply For:</h3>
            </div>

            <div class="item col-xl-4 col-lg-12 col-md-12 col-xs-12 landscapes sale">
              
              <marquee width="100%" direction="left" height="100px">
                <h3 style="font-weight: bold;"><a href="#homeloans" id="marquee">NRI Commercial Purchase.</a> &nbsp; &nbsp; <a href="#homeloans" id="marquee">NRI Commercial Mortgage.</a></h3>
              </marquee>
            </div>
          </div>
        </div>
        <div class="row portfolio-items">

            <?php

            include("db.php");

            $query = "select * from properties where category = 'commercial'";

            $run_query = mysqli_query($con,$query);

            while($row = mysqli_fetch_array($run_query))

            {
              $properties_id = $row['id'];
              $properties_name = $row['properties_name'];
              $address = $row['address'];
              $category = $row['category'];
              $sale_rent = $row['sale_rent']; 
              $photo = $row['photo'];
              $noofbedroom = $row['noofbedroom'];
              $noofbathroom = $row['noofbathroom'];
              $sqft = $row['sqft'];
              $garages = $row['garages'];
              $price = $row['price'];
              $mobileno = $row['mobileno'];

            ?>

            <div class="item col-xl-6 col-lg-12 col-md-12 col-xs-12 landscapes sale">
              <div class="project-single" data-aos="fade-right">
                <div class="project-inner project-head">
                  <div class="homes"> 
                    <!-- homes img --> 
                    <a href="#" class="homes-img">
                    <!-- <div class="homes-tag button alt featured">Featured</div> -->
                    <div class="homes-tag button alt sale"><?php echo $sale_rent; ?></div>
                    <img src="adminpanel/uploads/properties/<?php echo $photo; ?>" style="height: 300px !important; width: 450px !important;" alt="home-1" class="img-responsive"> </a> </div>
                </div>
                <!-- homes content -->
                <div class="homes-content"> 
                  <!-- homes address -->
                  <h3>
                    <!-- <a href="properties_details.php?id=<?php echo $properties_id; ?>"><?php echo $properties_name; ?></a> -->
                      <?php
                      //print_r($whish_array_pid);exit;
                      if(in_array($properties_id, $whish_array_pid))
                      {

                      ?>
                      <a href="properties_details.php?id=<?php echo $properties_id; ?>"><?php echo $properties_name; ?></a>
                      <?php
                      }
                      else
                      {
                      ?>
                        <a href="#" onclick="addToWishlistview(this)" data-pid="<?php echo $properties_id; ?>" class="modal-open"><?php echo $properties_name; ?></a>

                      <?php } 
                      ?>
                  </h3>
                  <p class="homes-address mb-3"> <a href="properties_details.php?id=<?php echo $properties_id; ?>"> <i class="fa fa-map-marker"></i><span><?php echo $address; ?></span> </a> </p>
                  <p class="homes-address mb-3"> <a href="#"> <i class="fa fa-phone"></i><span><?php echo $mobileno; ?></span> </a> </p>
                  <!-- homes List -->
                  <ul class="homes-list clearfix pb-3">
                    <li class="the-icons"> <i class="flaticon-bed mr-2" aria-hidden="true"></i> <span><?php echo $noofbedroom; ?> Bedrooms</span> </li>
                    <li class="the-icons"> <i class="flaticon-bathtub mr-2" aria-hidden="true"></i> <span><?php echo $noofbathroom; ?> Bathrooms</span> </li>
                    <li class="the-icons"> <i class="flaticon-square mr-2" aria-hidden="true"></i> <span><?php echo $sqft; ?> sq ft</span> </li>
                    <li class="the-icons"> <i class="flaticon-car mr-2" aria-hidden="true"></i> <span><?php echo $garages; ?> Garages</span> </li>
                  </ul>
                  <div class="price-properties footer pt-3 pb-0">
                    <h3 class="title mt-3"> <a href="#">₹ <?php echo $price; ?></a> </h3>
                    <div class="compare">
                      <?php
                      //print_r($whish_array_pid);exit;
                      if(in_array($properties_id, $whish_array_pid))
                      {


                      ?>

                      <a href="#" onclick="removeFromWishlist(this)" data-pid="<?php echo $properties_id; ?>" title="Favorites"> <i class="far fa-trash-alt modal-open"></i> </a>
                      <?php
                      }
                      else
                      {
                      ?>
                        <a href="#" onclick="addToWishlist(this)" data-pid="<?php echo $properties_id; ?>" title="Favorites"> <i class="flaticon-heart modal-open"></i> </a>

                      <?php } 
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php } ?>
          </div>

            
          <div class="bg-all"> <a href="commercial_properties.php" class="btn btn-outline-light">View More</a> </div>
        </div>
    </section>
    <!-- END SECTION COMMERCIAL PROPERTIES --> 

    <!-- START SECTION RESIDENTIAL PROPERTIES -->
    <section class="featured portfolio rec-pro disc">
      <div class="container-fluid">
        <div class="sec-title discover">
          <h2><a id="residential"></a><span>Residential </span>Properties</h2>
        </div>
        <div class="portfolio col-xl-12">
          <div class="slick-lancers">

            <?php

            include("db.php");

            $query = "select * from properties where category = 'residential'";

            $run_query = mysqli_query($con,$query);

            while($row = mysqli_fetch_array($run_query))

            {
              $properties_id = $row['id'];
              $properties_name = $row['properties_name'];
              $address = $row['address'];
              $category = $row['category'];
              $sale_rent = $row['sale_rent']; 
              $photo = $row['photo'];
              $noofbedroom = $row['noofbedroom'];
              $noofbathroom = $row['noofbathroom'];
              $sqft = $row['sqft'];
              $garages = $row['garages'];
              $price = $row['price'];
              $mobileno = $row['mobileno'];

            ?>

            <div class="agents-grid" data-aos="fade-up" data-aos-delay="150">
              <div class="landscapes">

                <div class="project-single">
                  <div class="project-inner project-head">
                    <div class="homes"> 
                      <!-- homes img --> 
                      <a href="#" class="homes-img">
                      <!-- <div class="homes-tag button alt featured">Featured</div> -->
                      <div class="homes-tag button alt sale">For <?php echo $sale_rent; ?></div>
                      <img src="adminpanel/uploads/properties/<?php echo $photo; ?>" style="height: 250px !important; width: 450px !important;" alt="home-1" class="img-responsive"> </a> </div>
                  </div>
                  <!-- homes content -->
                  <div class="homes-content"> 
                    <!-- homes address -->
                    <h3>
                      <!-- <a href="properties_details.php?id=<?php echo $properties_id; ?>"><?php echo $properties_name; ?></a> -->

                      <?php
                      //print_r($whish_array_pid);exit;
                      if(in_array($properties_id, $whish_array_pid))
                      {

                      ?>
                      <a href="properties_details.php?id=<?php echo $properties_id; ?>"><?php echo $properties_name; ?></a>
                      <?php
                      }
                      else
                      {
                      ?>
                        <a href="#" onclick="addToWishlistview(this)" data-pid="<?php echo $properties_id; ?>" class="modal-open"><?php echo $properties_name; ?></a>

                      <?php } 
                      ?>
                    </h3>
                    <p class="homes-address mb-3"> <a href="properties_details.php?id=<?php echo $properties_id; ?>"> <i class="fa fa-map-marker"></i><span><?php echo $address; ?></span> </a> </p>
                    <p class="homes-address mb-3"> <a href="#"> <i class="fa fa-phone"></i><span><?php echo $mobileno; ?></span> </a> </p>
                    <!-- homes List -->
                    <ul class="homes-list clearfix pb-3">
                      <li class="the-icons"> <i class="flaticon-bed mr-2" aria-hidden="true"></i> <span><?php echo $noofbedroom; ?> Bedrooms</span> </li>
                      <li class="the-icons"> <i class="flaticon-bathtub mr-2" aria-hidden="true"></i> <span><?php echo $noofbathroom; ?> Bathrooms</span> </li>
                      <li class="the-icons"> <i class="flaticon-square mr-2" aria-hidden="true"></i> <span><?php echo $sqft; ?> sq ft</span> </li>
                      <li class="the-icons"> <i class="flaticon-car mr-2" aria-hidden="true"></i> <span><?php echo $garages; ?> Garages</span> </li>

                    </ul>
                    <div class="price-properties footer pt-3 pb-0">
                      <h3 class="title mt-3"> <a href="#">₹ <?php echo $price; ?></a> </h3>
                      <div class="compare">
                        <?php
                        //print_r($whish_array_pid);exit;
                        if(in_array($properties_id, $whish_array_pid))
                        {


                        ?>
                        <a href="#" onclick="removeFromWishlist(this)" data-pid="<?php echo $properties_id; ?>" title="Favorites"> <i class="far fa-trash-alt modal-open"></i> </a>
                        <?php
                        }
                        else
                        {
                        ?>
                          <a href="#" onclick="addToWishlist(this)" data-pid="<?php echo $properties_id; ?>" title="Favorites"> <i class="flaticon-heart modal-open"></i> </a>

                        <?php } 
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php } ?>

          </div>
          <br><div class="bg-all"> <a href="residential_properties.php" class="btn btn-outline-light">View More</a> </div>
        </div>
      </div>
    </section>
    <!-- END SECTION RESIDENTIAL PROPERTIES --> 

    <!-- START SECTION PLOTTING -->
    <section class="featured portfolio bg-white-2 rec-pro full-l">
      <div class="container-fluid">
        <div class="sec-title">
          <h2><a id="plotting"></a><span>Plotting </span>Properties</h2>
        </div>
        <div class="row portfolio-items">

          <?php

          include("db.php");

          $query = "select * from properties where category = 'plotting'";

          $run_query = mysqli_query($con,$query);

          while($row = mysqli_fetch_array($run_query))

          {
            $properties_id = $row['id'];
            $properties_name = $row['properties_name'];
            $address = $row['address'];
            $category = $row['category'];
            $sale_rent = $row['sale_rent']; 
            $photo = $row['photo'];
            $noofbedroom = $row['noofbedroom'];
            $noofbathroom = $row['noofbathroom'];
            $sqft = $row['sqft'];
            $garages = $row['garages'];
            $price = $row['price'];
            $mobileno = $row['mobileno'];

          ?>
          <div class="item col-xl-6 col-lg-12 col-md-12 col-xs-12 landscapes sale">
            <div class="project-single" data-aos="fade-right">
              <div class="project-inner project-head">
                <div class="homes"> 
                  <!-- homes img --> 
                  <a href="#" class="homes-img">
                  <!-- <div class="homes-tag button alt featured">Featured</div> -->
                  <div class="homes-tag button alt sale">For <?php echo $sale_rent; ?></div>
                  <img src="adminpanel/uploads/properties/<?php echo $photo; ?>" style="height: 300px !important; width: 450px !important;" alt="home-1" class="img-responsive"> </a> </div>
              </div>
              <!-- homes content -->
              <div class="homes-content"> 
                <!-- homes address -->
                <h3>
                  <!-- <a href="properties_details.php?id=<?php echo $properties_id; ?>"><?php echo $properties_name; ?></a> -->
                  <?php
                  //print_r($whish_array_pid);exit;
                  if(in_array($properties_id, $whish_array_pid))
                  {

                  ?>
                  <a href="properties_details.php?id=<?php echo $properties_id; ?>"><?php echo $properties_name; ?></a>
                  <?php
                  }
                  else
                  {
                  ?>
                    <a href="#" onclick="addToWishlistview(this)" data-pid="<?php echo $properties_id; ?>" class="modal-open"><?php echo $properties_name; ?></a>

                  <?php } 
                  ?>
                </h3>
                <p class="homes-address mb-3"> <a href="properties_details.php?id=<?php echo $properties_id; ?>"> <i class="fa fa-map-marker"></i><span><?php echo $address; ?></span> </a> </p>
                <p class="homes-address mb-3"> <a href="#"> <i class="fa fa-phone"></i><span><?php echo $mobileno; ?></span> </a> </p>
                <!-- homes List -->
                <ul class="homes-list clearfix pb-3">
                  <li class="the-icons"> <i class="flaticon-bed mr-2" aria-hidden="true"></i> <span><?php echo $noofbedroom; ?> Bedrooms</span> </li>
                  <li class="the-icons"> <i class="flaticon-bathtub mr-2" aria-hidden="true"></i> <span><?php echo $noofbathroom; ?> Bathrooms</span> </li>
                  <li class="the-icons"> <i class="flaticon-square mr-2" aria-hidden="true"></i> <span><?php echo $sqft; ?> sq ft</span> </li>
                  <li class="the-icons"> <i class="flaticon-car mr-2" aria-hidden="true"></i> <span><?php echo $garages; ?> Garages</span> </li>
                </ul>
                <div class="price-properties footer pt-3 pb-0">
                  <h3 class="title mt-3"> <a href="#">₹ <?php echo $price; ?></a> </h3>
                  <!-- <div class="compare"> <a href="#" title="Favorites"> <i style="color:red !important" class="flaticon-heart modal-open"></i> </a> </div> -->

                  <div class="compare">
                    <?php
                    //print_r($whish_array_pid);exit;
                    if(in_array($properties_id, $whish_array_pid))
                    {


                    ?>
                    <a href="#" onclick="removeFromWishlist(this)" data-pid="<?php echo $properties_id; ?>" title="Favorites"> <i class="far fa-trash-alt modal-open"></i> </a>
                    <?php
                    }
                    else
                    {
                    ?>
                      <a href="#" onclick="addToWishlist(this)" data-pid="<?php echo $properties_id; ?>" title="Favorites"> <i class="flaticon-heart modal-open"></i> </a>

                    <?php } 
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <?php } ?>
          
        </div>
        <div class="bg-all"> <a href="plotting_properties.php" class="btn btn-outline-light">View More</a> </div>
      </div>
    </section>
    <!-- END SECTION PLOTTING --> 

    <!-- START SECTION  Loans -->
    <section class="featured portfolio rec-pro disc" id="homeloans">
      <div class="container-fluid">
        <div class="sec-title discover">
          <h2><a id="homeloans"></a><span>Home </span>Loans</h2>
        </div>
        <div class="row portfolio-items">
          
          <!-- <div class="item col-xl-4 col-lg-4 col-md-4 col-xs-12 landscapes sale">
            <div class="project-single" data-aos="fade-right">
              <div class="homes-content"> 
                <img src="adminpanel/uploads/bankname.png" alt="home-1" class="img-responsive">
              </div>
            </div>
          </div> -->

          <div class="item col-xl-4 col-lg-4 col-md-4 col-xs-12 landscapes sale">
            <div class="project-single" data-aos="fade-right">
              
              <!-- homes content -->
              <div class="homes-content"> 
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <p style="color:#7bc0a9; margin-bottom: 0px; font-weight: bold; font-size: 18px">LOANS</p>
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-12">
                      <p style=" font-size: 14px; line-height: normal; margin-top: 4px;">We make Loan Possible in Just 3 Steps to Provide a Fast, Flexible & Friendly Customer Experenice.</p>
                    
                  </div>
                  <!-- <div class="col-lg-4 col-md-4 col-sm-12">
                    <img src="adminpanel/uploads/bank_logo/offers.png" >
                  </div> -->

                  <?php
                                        
                  $query = "select * from bank_offer";

                  $run_query = mysqli_query($con,$query);
                  
                  while($row = mysqli_fetch_array($run_query))
                  {
                      $id = $row['id'];
                      $photo = $row['photo'];
                      $offer = $row['offer'];
                      
                  ?>
                  <div class="col-lg-6 col-md-6 col-sm-12 p-2">
                    <div class="card" style="width: 14rem;">
                      <div class="card-body">                                        
                        <?php
                                        
                        if($offer == '')
                        {

                        }
                        else
                        {
                            
                        ?>
                        
                        <div class="offer"> &nbsp; </div>
                        <?php } ?>
                        <img src="adminpanel/uploads/bank_logo/<?php echo $photo; ?>" class="card-img-top" alt="..." style="height: 50px !important; width: 150px !important;">
                      </div>
                    </div>
                  </div>
                  <?php } ?>

                  <!-- <div class="col-lg-6 col-md-6">
                    <div class="card" style="width: 12rem;">
                      <div class="card-body">
                        <img src="adminpanel/uploads/bank_logo/hdfclogo.png" class="card-img-top" alt="...">
                      </div>
                  
                      
                      
                    </div>
                  </div> -->
                  
                </div>
                
              </div>
            </div>
          </div>

          <div class="item col-xl-8 col-lg-8 col-md-8 col-xs-12 landscapes sale">
            <div class="project-single" data-aos="fade-right">
              
              <!-- homes content -->
              <div class="homes-content"> 
                <!-- homes address -->
                <center><h3><a href="#">Inquiry Form</a></h3></center>
                <br>
                <form name="contact_form" id="contact_form" method="post" enctype="multipart/form-data" action="#">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-xs-12">
                        <input type="text" id="full_name" name="full_name" placeholder="Full Name" />
                      </div>

                      <div class="col-lg-6 col-md-6 col-xs-12">
                        <input type="email" id="email_address" name="email_address" placeholder="Email Address"  />
                      </div>

                      <div class="col-lg-6 col-md-6 col-xs-12">
                        <input type="number" id="phone_number" name="phone_number" placeholder="Phone Number" />
                      </div>

                      <div class="col-lg-6 col-md-6 col-xs-12">
                        <select class="form-control" name="bank_name" id="bank_name">
                          <option>Select Bank</option>
                          <?php
                                        
                          $query = "select * from bank_offer";

                          $run_query = mysqli_query($con,$query);
                          
                          while($row = mysqli_fetch_array($run_query))
                          {
                              $id = $row['id'];
                              $bank_name = $row['bank_name'];
                              
                          ?>
                          <option value="HDFC Bank"><?php echo $bank_name;  ?></option>
                          <?php } ?>
                          

                        </select>
                      </div>

                      <div class="col-lg-6 col-md-6 col-xs-12">
                        <select class="form-control" name="profession" id="profession">
                          <option value="">Select Profession</option>
                          <option value="Self Employed">Self Employed</option>
                          <option value="Salaried">Salaried</option>
                          <option value="Bussiness">Bussiness</option>               
                        </select>
                      </div>

                      <div class="col-lg-6 col-md-6 col-xs-12">
                        <input type="text" id="area" name="area" placeholder="Area" />
                      </div>

                      <div class="col-lg-12 col-md-12 col-xs-12">
                        <textarea placeholder="Message" name="message" id="message" rows="2"></textarea>
                      </div>

                    </div>
                    
                  </div>
                  
                  <!-- <select class="form-control" name="bank_name" id="bank_name">
                    <option value="">Select Bank</option>
                    <option value="Allahabad Bank">Allahabad Bank</option>
                    <option value="Andhra Bank">Andhra Bank</option>
                    <option value="Bank of Bahrain and Kuwait">Bank of Bahrain and Kuwait</option>
                    <option value="Bank of Baroda - Corporate Banking">Bank of Baroda - Corporate Banking</option>
                    <option value="Bank of Baroda - Retail Banking">Bank of Baroda - Retail Banking</option>
                    <option value="Bank of India">Bank of India</option>
                    <option value="Bank of Maharashtra">Bank of Maharashtra</option>
                    <option value="Canara Bank">Canara Bank</option>
                    <option value="Central Bank of India">Central Bank of India</option>
                    <option value="City Union Bank">City Union Bank</option>
                    <option value="Corporation Bank">Corporation Bank</option>
                    <option value="Deutsche Bank">Deutsche Bank</option>
                    <option value="Development Credit Bank">Development Credit Bank</option>
                    <option value="Dhanlaxmi Bank">Dhanlaxmi Bank</option>
                    <option value="Federal Bank">Federal Bank</option>
                    <option value="ICICI Bank">ICICI Bank</option>
                    <option value="IDBI Bank">IDBI Bank</option>
                    <option value="Indian Bank">Indian Bank</option>
                    <option value="Indian Overseas Bank">Indian Overseas Bank</option>
                    <option value="IndusInd Bank">IndusInd Bank</option>
                    <option value="ING Vysya Bank">ING Vysya Bank</option>
                    <option value="Jammu and Kashmir Bank">Jammu and Kashmir Bank</option>
                    <option value="Karnataka Bank Ltd">Karnataka Bank Ltd</option>
                    <option value="Karur Vysya Bank">Karur Vysya Bank</option>
                    <option value="Kotak Bank">Kotak Bank</option>
                    <option value="Laxmi Vilas Bank">Laxmi Vilas Bank</option>
                    <option value="Oriental Bank of Commerce<">Oriental Bank of Commerce</option>
                    <option value="Punjab National Bank - Corporate Banking">Punjab National Bank - Corporate Banking</option>
                    <option value="Punjab National Bank - Retail Banking">Punjab National Bank - Retail Banking</option>
                    <option value="Punjab & Sind Bank">Punjab & Sind Bank</option>
                    <option value="Shamrao Vitthal Co-operative Bank">Shamrao Vitthal Co-operative Bank</option>
                    <option value="South Indian Bank">South Indian Bank</option>
                    <option value="State Bank of Bikaner & Jaipur">State Bank of Bikaner & Jaipur</option>
                    <option value="State Bank of Hyderabad">State Bank of Hyderabad</option>
                    <option value="State Bank of India">State Bank of India</option>
                    <option value="State Bank of Mysore">State Bank of Mysore</option>
                    <option value="State Bank of Patiala">State Bank of Patiala</option>
                    <option value="State Bank of Travancore">State Bank of Travancore</option>
                    <option value="Syndicate Bank">Syndicate Bank</option>
                    <option value="Tamilnad Mercantile Bank Ltd">Tamilnad Mercantile Bank Ltd</option>
                    <option value="UCO Bank">UCO Bank</option>
                    <option value="Union Bank of India">Union Bank of India</option>
                    <option value="United Bank of India">United Bank of India</option>
                    <option value="Vijaya Bank">Vijaya Bank</option>
                    <option value="Yes Bank Ltd">Yes Bank Ltd</option>                    
                  </select> -->
                  
                  <input type="submit" name="sendmessage" class="multiple-send-message" value="Submit Request" />
                </form>
              </div>
            </div>
          </div>          
          
        </div>
      </div>
    </section>
    <!-- END SECTION Loans --> 



    <!-- START FOOTER -->
    <?php include('footer.php')?>
    <!-- END FOOTER --> 

    <!--register form -->
    <?php
    if(!isset($_SESSION['mobileno']))
    {

    ?>
    <div class="login-and-register-form modal">
      <div class="main-overlay"></div>
      <div class="main-register-holder">
        <div class="main-register fl-wrap">
          <div class="close-reg"><i class="fa fa-times"></i></div>
          <h3>Welcome to <span><strong>Trie Properties</strong></span></h3>
          
          <div id="tabs-container">
            
            <div class="tab">
              <div id="tab-1" class="tab-contents">
                <div class="custom-form">
                  <form method="post"  name="registerform" id="registerform" action="#">
                    <label>Mobile No* </label>
                    <input name="mobileno" type="text" autocomplete="off" required>
                    <button type="submit" name="register" class="log-submit-btn"><span>Continue</span></button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    }
    else
    {

    }
    ?>
    <!--register form end -->

    <!--OTP form -->
    <?php
    if(!isset($_SESSION['mobileno']))
    {

    ?>
    <div class="login-and-register-form modal-otp">
      <div class="main-overlay"></div>
      <div class="main-register-holder">
        <div class="main-register fl-wrap">
          <div class="close-reg-otp"><i class="fa fa-times"></i></div>
          <h3>Welcome to <span><strong>Trie Properties</strong></span></h3>
          
          <div id="tabs-container">
            
            <div class="tab">
              <div id="tab-1" class="tab-contents">
                <div class="custom-form">
                  <form method="post" name="registerotp" id="registerotp">
                    <label>OTP * </label>
                    <input name="otp" type="text" >
                    <button type="submit" name="registerotp" class="log-submit-btn"><span>Continue</span></button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    }
    else
    {

    }
    ?>
    <!--OTP form end -->

    <!--Details form -->
    <div class="login-and-register-form modal-details">
      <div class="main-overlay"></div>
      <div class="main-register-holder">
        <div class="main-register fl-wrap">
          <div class="close-reg-details"><i class="fa fa-times"></i></div>
          <h3>Welcome to <span><strong>Trie Properties</strong></span></h3>
          
          <div id="tabs-container">
            
            <div class="tab">
              <div id="tab-1" class="tab-contents">
                <div class="custom-form">
                  <form method="post" name="registerdetails" id="registerdetails">
                    <label>Name* </label>
                    <input name="name" type="text" autocomplete="off" required>
                    <label>Email* </label>
                    <input name="email" type="text" autocomplete="off" required>
                    <label>Mobile No* </label>
                    <input name="mobile" type="text" autocomplete="off" required>
                    <label>Book a Visit* </label>
                    <input name="date" type="date" autocomplete="off" required>
                    <label>OTP * </label>
                    <input name="otp" type="text" >
                    <button type="submit" name="registerdetails" class="log-submit-btn"><span>Continue</span></button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Details form end -->

    <!-- START PRELOADER -->
    <div id="preloader">
      <div id="status">
        <div class="status-mes"></div>
      </div>
    </div>
    <!-- END PRELOADER --> 

    <!-- ARCHIVES JS --> 
    <script src="js/jquery-3.5.1.min.js"></script> 
    <script src="js/rangeSlider.js"></script> 
    <script src="js/tether.min.js"></script> 
    <script src="js/moment.js"></script> 
    <script src="js/bootstrap.min.js"></script> 
    <script src="js/mmenu.min.js"></script> 
    <script src="js/mmenu.js"></script> 
    <script src="js/aos.js"></script> 
    <script src="js/aos2.js"></script> 
    <script src="js/animate.js"></script> 
    <script src="js/slick.min.js"></script> 
    <script src="js/fitvids.js"></script> 
    <script src="js/jquery.waypoints.min.js"></script> 
    <script src="js/typed.min.js"></script> 
    <script src="js/jquery.counterup.min.js"></script> 
    <script src="js/imagesloaded.pkgd.min.js"></script> 
    <script src="js/isotope.pkgd.min.js"></script> 
    <script src="js/smooth-scroll.min.js"></script> 
    <script src="js/lightcase.js"></script> 
    <script src="js/search.js"></script> 
    <script src="js/owl.carousel.js"></script> 
    <script src="js/jquery.magnific-popup.min.js"></script> 
    <script src="js/ajaxchimp.min.js"></script> 
    <script src="js/newsletter.js"></script> 
    <script src="js/jquery.form.js"></script> 
    <script src="js/jquery.validate.min.js"></script> 
    <script src="js/searched.js"></script> 
    <script src="js/forms-2.js"></script> 
    <script src="js/map-style2.js"></script> 
    <script src="js/range.js"></script> 
    <script src="js/color-switcher.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $(window).on('scroll load', function() {
            $("#header.cloned #logo img").attr("src", $('#header #logo img').attr('data-sticky-logo'));
        });
    </script>

    <!-- Slider Revolution scripts --> 
    <script src="revolution/js/jquery.themepunch.tools.min.js"></script> 
    <script src="revolution/js/jquery.themepunch.revolution.min.js"></script>

    <script>
        var typed = new Typed('.typed', {
            strings: ["House ^2000", "Apartment ^2000", "Plaza ^4000"],
            smartBackspace: false,
            loop: true,
            showCursor: true,
            cursorChar: "|",
            typeSpeed: 50,
            backSpeed: 30,
            startDelay: 800
        });

    </script>

    <script>
      $('.slick-lancers').slick({
          infinite: false,
          slidesToShow: 4,
          slidesToScroll: 1,
          dots: true,
          arrows: false,
          adaptiveHeight: true,
          responsive: [{
              breakpoint: 1292,
              settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2,
                  dots: true,
                  arrows: false
              }
          }, {
              breakpoint: 993,
              settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2,
                  dots: true,
                  arrows: false
              }
          }, {
              breakpoint: 769,
              settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
                  dots: true,
                  arrows: false
              }
          }]
      });
    </script> 

    <script>
      $('.job_clientSlide').owlCarousel({
            items: 2,
            loop: true,
            margin: 30,
            autoplay: false,
            nav: true,
            smartSpeed: 1000,
            slideSpeed: 1000,
            navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                991: {
                    items: 3
                }
            }
        });
    </script> 

    <script>
        $('.style2').owlCarousel({
            loop: true,
            margin: 0,
            dots: false,
            autoWidth: false,
            autoplay: true,
            autoplayTimeout: 5000,
            responsive: {
                0: {
                    items: 2,
                    margin: 20
                },
                400: {
                    items: 2,
                    margin: 20
                },
                500: {
                    items: 3,
                    margin: 20
                },
                768: {
                    items: 4,
                    margin: 20
                },
                992: {
                    items: 5,
                    margin: 20
                },
                1000: {
                    items: 7,
                    margin: 20
                }
            }
        });
    </script> 

    <script>
        $(".dropdown-filter").on('click', function() {

            $(".explore__form-checkbox-list").toggleClass("filter-block");

        });

    </script> 

    <!-- MAIN JS --> 
    <script src="js/script.js"></script>
    <script src="js/core.min.js"></script>
    <script src="js/main.js"></script>

    <script type="text/javascript">
      $(function()
      {
        $("#contact_form").validate({
          rules: {
            "full_name": {
              required: true
            },
            "email_address": {
              required: true,
              email: true
            },
            "phone_number": {
              required: true,
              minlength:9,
              maxlength:10,
              number: true
            },
            "bank_name": {
              required: true
            }
          },
          messages: {
            "full_name": {
                required: 'Full Name is required'
            },
            "email_address": {
                required: 'Email id is required',
                email: 'Please Enter Valid Email ID'
            },
            "phone_number": {
                required: 'Mobile Number is required',
                minlength: 'Minimum 10 digit Number',
                maxlength: 'Maximum 10 Digit Number',
                number: true
            },
            "bank_name": {
                required: 'Select Bank'
            }
          }
        });
      });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>

    <script type="text/javascript">
      function addToWishlist(obj) 
      {
        var p_id = $(obj).data("pid");
        sessionmob = $('#sessionmob').val();
        //alert(p_id);

        if(sessionmob != '')
        {
          $.ajax({
          url : "add-to-wishlist.php",
          type : "POST",
          data : 'p_id=' + p_id,
          success : function(data) 
          {
            /*$(obj).find("svg").show();
            $(obj).find("img").hide();
            if (data > 0) 
            {
              alert();
            }*/
            
            swal("WOW!","Your Properties Added to Wishlist!","success")
            setTimeout(function()
            {
               window.location.href = 'index.php';
            }, 3000);
            
            
          }
        });
        } 
      }

      function removeFromWishlist(obj) 
      {
        var p_id = $(obj).data("pid");
        //$(obj).find("svg").hide();
        //$(obj).find("img").show();
        $.ajax({
        url : "remove-from-wishlist.php",
        type : "POST",
        data : 'p_id=' + p_id,
        success : function(data) 
        {
          swal("Great!","Your Properties Remove From Wishlist!","success")
          setTimeout(function()
          {
             window.location.href = 'index.php';
          }, 3000);
          /*if (data > 0)
          {
            $(obj).find("svg").show();
            $(obj).find("img").hide();
            markedAsUnchecked($(obj));

            window.location.href = 'index.php';
          }*/
        }
      });
      }

      function addToWishlistview(obj) 
      {
        var p_id = $(obj).data("pid");
        //alert(p_id);return;
        sessionmob = $('#sessionmob').val();

        if(sessionmob != '')
        {
          $.ajax({
          url : "add-to-wishlist.php",
          type : "POST",
          data : 'p_id=' + p_id,
          success : function(data) 
          {
            /*$(obj).find("svg").show();
            $(obj).find("img").hide();
            if (data > 0) 
            {
              alert();
            }*/
            
            swal("WOW!","Your Properties Added to Wishlist!","success")
            setTimeout(function()
            {
               //window.location.href = 'properties_details.php?id=""';
               window.location.href = 'properties_details.php?id='+p_id+'';

            }, 3000);
            
            
          }
        });
        } 
      }
    </script>

  </div>
  <!-- Wrapper / End -->
</body>

</html>

<?php

include("db.php");

if(isset($_POST['sendmessage']))
{
  $full_name = $_POST['full_name'];
  $email_address = $_POST['email_address'];
  $phone_number = $_POST['phone_number'];
  $bank_name = $_POST['bank_name'];
  $profession = $_POST['profession'];
  $area = $_POST['area'];
  $message = $_POST['message'];

  $query = "insert into loan_form (full_name,email_address,phone_number,bank_name,profession,area,message) values ('$full_name','$email_address','$phone_number','$bank_name','$profession','$area','$message')";

  $run_query = mysqli_query($con,$query);

  if($run_query)
  {

    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("WOW!","Loan Details Added Successfully!","success");';
    echo '});</script>';
  }
  else
  {

    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("Please try Again!","error");';
    echo '});</script>';

  }
}

if(isset($_POST['register']))
{
  //include("db.php");

  $mobileno = $_POST['mobileno'];
  //print_r($mobileno);exit;
  
  if($mobileno != '')
  {

    $login_query = " select * from customers where mobileno='$mobileno'";
    $run_query = mysqli_query($con,$login_query);
    $check_query = mysqli_num_rows($run_query);

    if($check_query==1)
    {
      
      $_SESSION['mobileno'] = $mobileno;
      echo '<script type="text/javascript">';
      echo '$(".modal-otp").show()';
      echo '</script>';
      exit();
    }
    else
    {
      echo '<script type="text/javascript">';
      echo '$(".modal-details").show()';
      echo '</script>';
      exit();
    }
  }
  
}

if(isset($_POST['registerdetails']))
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $date = $_POST['date'];
  $otp = $_POST['otp'];

  $_SESSION['mobileno'] = $mobile;

  $query = "insert into customers (name,email,mobileno,date,otp) values ('$name','$email','$mobile','$date','$otp')";

  $run_query = mysqli_query($con,$query);

  

  if($run_query)
  {
    /*echo "<script>swal('WOW!','Details Added Successfully!','success').then(okay => {
          if (okay) {
            window.location.href = 'index.php';
          }
        });</script>"; */
    echo "<script>swal('WOW!','Details Added Successfully!','success').then(okay => {
          if (okay) {
            window.location.href = 'index.php';
          }
        });</script>"; 
    
  }
  else
  {

    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("Please try Again!","error");';
    echo '});</script>';

  }
}

?>


