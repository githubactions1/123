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

<body class="homepage-9 hp-6 homepage-1 mh">
  <!-- Wrapper -->
  <div id="wrapper">
    <!-- START SECTION HEADINGS --> 

    <!-- Header Container -->
    <?php include('header.php'); ?>
    <!-- Header Container / End --> 

    <!-- START SECTION WISHLIST PROPERTIES -->
    <br><br><br><br>
    <section class="featured portfolio bg-white-2 rec-pro full-l">
      <div class="container-fluid">
        <div class="sec-title" style="margin-top: 50px;">
          <h2><a id="commercial"></a>Wishlist</h2>
        </div>
        <br><br><br>
        <div class="row portfolio-items">

            <?php

            include("db.php");

            $customers_id = $_SESSION['mobileno'];

            $query = "select * FROM wishlist JOIN properties ON properties.id = wishlist.product_id where customers_id = '$customers_id' ORDER BY wishlist.product_id ASC";

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
                    <a href="properties_details.php?id=<?php echo $properties_id; ?>" class="homes-img">
                    <!-- <div class="homes-tag button alt featured">Featured</div> -->
                    <div class="homes-tag button alt sale"><?php echo $sale_rent; ?></div>
                    <img src="adminpanel/uploads/properties/<?php echo $photo; ?>" style="height: 300px !important; width: 450px !important;" alt="home-1" class="img-responsive"> </a> </div>
                </div>
                <!-- homes content -->
                <div class="homes-content"> 
                  <!-- homes address -->
                  <h3><a href="properties_details.php?id=<?php echo $properties_id; ?>"><?php echo $properties_name; ?></a></h3>
                  <p class="homes-address mb-3"> <a href="single-property-1.html"> <i class="fa fa-map-marker"></i><span><?php echo $address; ?></span> </a> </p>
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
                    <div class="compare"> <a href="#" onclick="removeFromWishlist(this)" data-pid="<?php echo $properties_id; ?>" title="Favorites"> <i class="far fa-trash-alt"></i> </a> </div>
                  </div>
                </div>
              </div>
            </div>

            <?php } ?>
          </div>
        </div>
    </section>
    <!-- END SECTION WISHLIST PROPERTIES -->

    <!-- START FOOTER -->
    <?php include('footer.php')?>
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
                    <label>Name* </label>
                    <input name="name" type="text" autocomplete="off" required>
                    <label>Email* </label>
                    <input name="email" type="text" autocomplete="off" required>
                    <label>Mobile No* </label>
                    <input name="mobile" type="text" autocomplete="off" required>
                    <label>Book a Visit* </label>
                    <input name="date" type="text" autocomplete="off" required>
                    <label>OTP * </label>
                    <input name="otp" type="text" >
                    <button type="submit" class="log-submit-btn"><span>Continue</span></button>
                    <div class="clearfix"></div>
                  </form>
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

    <script>
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
           window.location.href = 'wishlist.php';
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
    </script>
  </div>
  <!-- Wrapper / End -->
</body>

<!-- Mirrored from code-theme.com/html/findhouses/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Feb 2023 05:01:09 GMT -->
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

?>
