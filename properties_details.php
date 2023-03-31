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
</head>

<body class="inner-pages listing homepage-1 hd-white">
  <!-- Wrapper -->
  <div id="wrapper">
    <!-- START SECTION HEADINGS -->

    <!-- Header Container -->
    <?php include('header.php'); ?>
    <!-- Header Container / End --> 

    <!-- START SECTION PROPERTIES LISTING -->
    <br><br><br><br>
    <section class="single-proper blog details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 blog-pots">
                    <?php

                    include("db.php");

                    if(isset($_GET['id']))
                    {
                        $properties_id = $_GET['id'];

                        $query = "select * from properties where id = $properties_id";

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
                            $description = $row['description'];
                            $floor_plan = $row['floor_plan'];
                            $video = $row['video'];

                        }
                    }

                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <section class="headings-2 pt-0">
                                <div class="pro-wrapper">
                                    <div class="detail-wrapper-body">
                                        <div class="listing-title-bar">
                                            <h3><?php echo $properties_name; ?><span class="mrg-l-5 category-tag">For <?php echo $sale_rent; ?></span></h3>
                                            <div class="mt-0">
                                                <a href="#listing-location" class="listing-address">
                                                    <i class="fa fa-map-marker pr-2 ti-location-pin mrg-r-5"></i><?php echo $address; ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single detail-wrapper mr-2">
                                        <div class="detail-wrapper-body">
                                            <div class="listing-title-bar">
                                                <h4>₹ <?php echo $price; ?></h4>
                                                <div class="mt-0">
                                                    <a href="#listing-location" class="listing-address">
                                                        <p>₹ <?php echo $sqft; ?>/ sq ft</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- main slider carousel items -->
                            <div id="listingDetailsSlider" class="carousel listing-details-sliders slide mb-30">
                                <h5 class="mb-4">Gallery</h5>
                                <div class="carousel-inner">
                                    <div class="active item carousel-item" data-slide-number="0">
                                        <img src="adminpanel/uploads/properties/<?php echo $photo; ?>" class="img-fluid" alt="slider-listing">
                                    </div>
                                    <?php
                                        
                                    $query1 = "select * from properties_images where properties_id='$properties_id'";

                                    $run_query1 = mysqli_query($con,$query1);
                                    
                                    while($row1 = mysqli_fetch_array($run_query1))
                                    {
                                        $id = $row1['properties_id'];
                                        $gallery = $row1['gallery'];
                                        
                                    ?>
                                    <div class="item carousel-item" data-slide-number="<?php echo $id; ?>">
                                        <img src="adminpanel/uploads/properties/<?php echo $gallery; ?>" class="img-fluid" alt="slider-listing" >
                                    </div>
                                    <?php } ?>

                                    <!-- <div class="active item carousel-item" data-slide-number="0">
                                        <img src="images/single-property/s-1.jpg" class="img-fluid" alt="slider-listing">
                                    </div>
                                    <div class="item carousel-item" data-slide-number="1">
                                        <img src="images/single-property/s-2.jpg" class="img-fluid" alt="slider-listing">
                                    </div>
                                    <div class="item carousel-item" data-slide-number="2">
                                        <img src="images/single-property/s-3.jpg" class="img-fluid" alt="slider-listing">
                                    </div>
                                    <div class="item carousel-item" data-slide-number="4">
                                        <img src="images/single-property/s-4.jpg" class="img-fluid" alt="slider-listing">
                                    </div>
                                    <div class="item carousel-item" data-slide-number="5">
                                        <img src="images/single-property/s-5.jpg" class="img-fluid" alt="slider-listing">
                                    </div> -->

                                    <a class="carousel-control left" href="#listingDetailsSlider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                                    <a class="carousel-control right" href="#listingDetailsSlider" data-slide="next"><i class="fa fa-angle-right"></i></a>

                                </div>
                                <!-- main slider carousel nav controls -->
                                <ul class="carousel-indicators smail-listing list-inline">
                                    <?php
                                        
                                    $query1 = "select * from properties_images where properties_id='$properties_id'";

                                    $run_query1 = mysqli_query($con,$query1);
                                    
                                    while($row1 = mysqli_fetch_array($run_query1))
                                    {
                                        $id = $row1['id'];
                                        $gallery = $row1['gallery'];
                                        
                                    ?>
                                    <li class="list-inline-item active">
                                        <a id="carousel-selector-<?php echo $id; ?>" class="" data-slide-to="0" data-target="#listingDetailsSlider">
                                            <img src="adminpanel/uploads/properties/<?php echo $gallery; ?>" class="img-fluid" alt="listing-small" style="height: 100px !important; width: 200px !important;">
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                                <!-- main slider carousel items -->
                            </div>
                            <div class="blog-info details mb-30">
                                <h5 class="mb-4">Description</h5>
                                <p class="mb-3"><?php echo $description; ?></p>
                            </div>
                        </div>
                    </div>
                    
                    

                    <div class="row">
                        <div class="col-md-12">
                            
                            <!-- main slider carousel items -->
                            <div id="listingDetailsSlider1" class="carousel listing-details-sliders slide mb-30">
                                <h5 class="mb-4">Floor Plan</h5>
                                <div class="carousel-inner">
                                    <div class="active item carousel-item" data-slide-number="0">
                                        <img src="adminpanel/uploads/floor_plan/floor_plan.png" class="img-fluid" alt="slider-listing">
                                    </div>
                                    <?php
                                        
                                    $query1 = "select * from properties_floor_plan where properties_id='$properties_id'";

                                    $run_query1 = mysqli_query($con,$query1);
                                    
                                    while($row1 = mysqli_fetch_array($run_query1))
                                    {
                                        $id = $row1['properties_id'];
                                        $floor_plan = $row1['floor_plan'];
                                        
                                    ?>
                                    <div class="item carousel-item" data-slide-number="<?php echo $id; ?>">
                                        <img src="adminpanel/uploads/floor_plan/<?php echo $floor_plan; ?>" class="img-fluid" alt="slider-listing" >
                                    </div>
                                    <?php } ?>

                                    <a class="carousel-control left" href="#listingDetailsSlider1" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                                    <a class="carousel-control right" href="#listingDetailsSlider1" data-slide="next"><i class="fa fa-angle-right"></i></a>

                                </div>
                                <!-- main slider carousel nav controls -->
                                <ul class="carousel-indicators smail-listing list-inline">
                                    <?php
                                        
                                    $query1 = "select * from properties_floor_plan where properties_id='$properties_id'";

                                    $run_query1 = mysqli_query($con,$query1);
                                    
                                    while($row1 = mysqli_fetch_array($run_query1))
                                    {
                                        $id = $row1['id'];
                                        $floor_plan = $row1['floor_plan'];
                                        
                                    ?>
                                    <li class="list-inline-item active">
                                        <a id="carousel-selector-<?php echo $id; ?>" class="" data-slide-to="0" data-target="#listingDetailsSlider1">
                                            <img src="adminpanel/uploads/floor_plan/<?php echo $floor_plan; ?>" class="img-fluid" alt="listing-small" style="height: 100px !important; width: 200px !important;">
                                        </a>
                                    </li>
                                    <?php } ?>
                                    
                                </ul>
                                <!-- main slider carousel items -->
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            <!-- START SIMILAR PROPERTIES -->
            <!-- <section class="similar-property featured portfolio p-0 bg-white-inner">
                <div class="container">
                    <h5>Similar Properties</h5>
                    <div class="row">
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

                        ?>
                        <div class="item col-lg-4 col-md-4 col-xs-12 landscapes sale">
                            <div class="project-single" data-aos="fade-up">
                                <div class="project-inner project-head">
                                    <div class="homes">

                                        <a href="properties_details.php?id=<?php echo $properties_id; ?>" class="homes-img">
                                            
                                            <div class="homes-tag button alt sale"><?php echo $sale_rent; ?></div>
                                            <img src="adminpanel/uploads/properties/<?php echo $photo; ?>" alt="home-1" class="img-responsive" style="height: 250px !important; width: 450px !important;">
                                        </a>
                                    </div>
                                    
                                </div>
                                
                                <div class="homes-content">
                                    
                                    <h3><a href="properties_details.php?id=<?php echo $properties_id; ?>"><?php echo $properties_name; ?></a></h3>
                                    <p class="homes-address mb-3">
                                        <a href="properties_details.php?id=<?php echo $properties_id; ?>">
                                            <i class="fa fa-map-marker"></i><span><?php echo $address; ?></span>
                                        </a>
                                    </p>
                                    
                                    <ul class="homes-list clearfix pb-3">
                                        <li class="the-icons">
                                            <i class="flaticon-bed mr-2" aria-hidden="true"></i>
                                            <span><?php echo $noofbedroom; ?> Bedrooms</span>
                                        </li>
                                        <li class="the-icons">
                                            <i class="flaticon-bathtub mr-2" aria-hidden="true"></i>
                                            <span><?php echo $noofbathroom; ?> Bathrooms</span>
                                        </li>
                                        <li class="the-icons">
                                            <i class="flaticon-square mr-2" aria-hidden="true"></i>
                                            <span><?php echo $sqft; ?> sq ft</span>
                                        </li>
                                        <li class="the-icons">
                                            <i class="flaticon-car mr-2" aria-hidden="true"></i>
                                            <span><?php echo $garages; ?> Garages</span>
                                        </li>
                                    </ul>
                                    <div class="price-properties footer pt-3 pb-0">
                                      <h3 class="title mt-3"> <a href="properties_details.php?id=<?php echo $properties_id; ?>">₹ <?php echo $price; ?></a> </h3>
                                      <div class="compare"> <a href="#" title="Favorites"> <i class="flaticon-heart"></i> </a> </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        
                    </div>
                </div>
            </section> -->
            <!-- END SIMILAR PROPERTIES -->
        </div>
    </section>
    <!-- END SECTION PROPERTIES LISTING -->

    <!-- START FOOTER -->
    <footer class="first-footer rec-pro">
      <div class="top-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6">
              <div class="netabout"> <a href="index.php" class="logo"> <img src="images/bg/logo_footer.png" alt="netcom"> </a>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum incidunt architecto soluta laboriosam, perspiciatis, aspernatur officiis esse.</p>
              </div>
              <div class="contactus">
                <ul>
                  <li>
                    <div class="info"> <i class="fa fa-map-marker" aria-hidden="true"></i>
                      <p class="in-p">Hyderabad, Telangana 500072</p>
                    </div>
                  </li>
                  <li>
                    <div class="info"> <i class="fa fa-phone" aria-hidden="true"></i>
                      <p class="in-p">+91 9898659865 / 7854206582</p>
                    </div>
                  </li>
                  <li>
                    <div class="info"> <i class="fa fa-envelope" aria-hidden="true"></i>
                      <p class="in-p ti">info@trieproperties.com</p>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="navigation">
                <h3>Navigation</h3>
                <div class="nav-footer">
                  <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Commercial</a></li>
                    <li><a href="#">Residential</a></li>
                    <li class="no-mgb"><a href="#">Plotting</a></li>
                  </ul>
                  <ul class="nav-right">
                    <li><a href="#">NRI Commercial Loans</a></li>
                    <li><a href="#">NRI Residential Loans</a></li>
                    <li><a href="#">Residential Loans</a></li>
                    <li><a href="#">Commercial Loans</a></li>
                    <li class="no-mgb"><a href="#">Contact Us</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="widget">
                <h3>Twitter Feeds</h3>
                <div class="twitter-widget contuct">
                  <div class="twitter-area">
                    <div class="single-item">
                      <div class="icon-holder"> <i class="fa fa-twitter" aria-hidden="true"></i> </div>
                      <div class="text">
                        <h5><a href="#">@trieproperties</a> all share them with me baby said inspet.</h5>
                        <h4>about 5 days ago</h4>
                      </div>
                    </div>
                    <div class="single-item">
                      <div class="icon-holder"> <i class="fa fa-twitter" aria-hidden="true"></i> </div>
                      <div class="text">
                        <h5><a href="#">@trieproperties</a> all share them with me baby said inspet.</h5>
                        <h4>about 5 days ago</h4>
                      </div>
                    </div>
                    <div class="single-item">
                      <div class="icon-holder"> <i class="fa fa-twitter" aria-hidden="true"></i> </div>
                      <div class="text">
                        <h5><a href="#">@trieproperties</a> all share them with me baby said inspet.</h5>
                        <h4>about 5 days ago</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="newsletters">
                <h3>Newsletters</h3>
                <p>Sign Up for Our Newsletter to get Latest Updates and Offers. Subscribe to receive news in your inbox.</p>
              </div>
              <form class="bloq-email mailchimp form-inline" method="post">
                <label for="subscribeEmail" class="error"></label>
                <div class="email">
                  <input type="email" id="subscribeEmail" name="EMAIL" placeholder="Enter Your Email">
                  <input type="submit" value="Subscribe">
                  <p class="subscription-success"></p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="second-footer rec-pro">
        <div class="container-fluid sd-f">
          <p>All Rights Reserved. © 2023 Trie Properties Private Limited</p>
          <ul class="netsocials">
            <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a href="#"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
    <a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a> 
    <!-- END FOOTER --> 

    <!--register form -->
    <div class="login-and-register-form modal">
      <div class="main-overlay"></div>
      <div class="main-register-holder">
        <div class="main-register fl-wrap">
          <div class="close-reg"><i class="fa fa-times"></i></div>
          <h3>Welcome to <span><strong>Trie Properties</strong></span></h3>
          <!-- <div class="soc-log fl-wrap">
            <p>Login</p>
            <a href="#" class="facebook-log"><i class="fa fa-facebook-official"></i>Log in with Facebook</a> <a href="#" class="twitter-log"><i class="fa fa-twitter"></i> Log in with Twitter</a> </div> 
          <div class="log-separator fl-wrap"><span>Or</span></div> -->
          <div id="tabs-container">
            <!-- <ul class="tabs-menu">
              <li class="current"><a href="#tab-1">Login</a></li>
              <li><a href="#tab-2">Register</a></li>
            </ul> -->
            <div class="tab">
              <div id="tab-1" class="tab-contents">
                <div class="custom-form">
                  <form method="post" name="registerform">
                    <label>Mobile No* </label>
                    <input name="mobile" type="text" autocomplete="off" required>
                    <label>OTP * </label>
                    <input name="otp" type="text" >
                    <button type="submit" class="log-submit-btn"><span>Continue</span></button>
                    <div class="clearfix"></div>
                    <!-- <div class="filter-tags">
                      <input id="check-a" type="checkbox" name="check">
                      <label for="check-a">Remember me</label>
                    </div> -->
                  </form>
                  <!-- <div class="lost_password"> <a href="#">Lost Your Password?</a> </div> -->
                </div>
              </div>
              <!-- <div class="tab">
                <div id="tab-2" class="tab-contents">
                  <div class="custom-form">
                    <form method="post" name="registerform" class="main-register-form" id="main-register-form2">
                      <label>First Name * </label>
                      <input name="name" type="text" onClick="this.select()" value="">
                      <label>Second Name *</label>
                      <input name="name2" type="text" onClick="this.select()" value="">
                      <label>Email Address *</label>
                      <input name="email" type="text" onClick="this.select()" value="">
                      <label>Password *</label>
                      <input name="password" type="password" onClick="this.select()" value="">
                      <button type="submit" class="log-submit-btn"><span>Register</span></button>
                    </form>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--register form end --> 

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
  </div>
  <!-- Wrapper / End -->
</body>

<!-- Mirrored from code-theme.com/html/findhouses/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Feb 2023 05:01:09 GMT -->
</html>
