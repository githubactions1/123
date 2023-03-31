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
    <!-- Header Container -->
    <?php include('header.php'); ?>
    <!-- Header Container / End --> 

    <!-- START SECTION PROPERTIES LISTING -->
    <br><br><br><br>
    <section class="properties-right featured portfolio blog pt-5">
        <div class="container">
            <section class="headings-2 pt-0 pb-55">
                <div class="pro-wrapper">
                    <div class="detail-wrapper-body">
                        <div class="listing-title-bar">
                            <div class="text-heading text-left">
                                <p class="pb-2"><a href="index.php">Home </a> &nbsp;/&nbsp; <span>Listings</span></p>
                            </div>
                            <h3>Plotting Properties</h3>
                            <input type="hidden" name="sessionmob" id="sessionmob" value="<?php echo $_SESSION['mobileno']; ?>">
                        </div>
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-12 col-md-12 blog-pots">
                    <section class="headings-2 pt-0">
                        <div class="pro-wrapper">
                            <div class="detail-wrapper-body">
                                <div class="listing-title-bar">
                                    <div class="text-heading text-left">
                                      <?php

                                      include("db.php");

                                      $query = "select count(*) as count from properties where category = 'plotting'";

                                      $run_query = mysqli_query($con,$query);

                                      while($row = mysqli_fetch_array($run_query))
                                      {
                                          $count = $row['count'];
                                        
                                      }

                                      ?>
                                        <p class="font-weight-bold mb-0 mt-3"><?php echo $count; ?> Search results</p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </section>
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
                          $mobileno = $row['mobileno'];

                        ?>
                        <div class="item col-lg-4 col-md-4 col-xs-12 landscapes sale">
                            <div class="project-single" data-aos="fade-up">
                                <div class="project-inner project-head">
                                    <div class="homes">
                                        <!-- homes img -->
                                        <a href="#" class="homes-img">
                                            <!-- <div class="homes-tag button alt featured">Featured</div> -->
                                            <div class="homes-tag button alt sale"><?php echo $sale_rent; ?></div>
                                            <img src="adminpanel/uploads/properties/<?php echo $photo; ?>" style="height: 250px !important; width: 450px !important;" alt="home-1" class="img-responsive">
                                        </a>
                                    </div>
                                    
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
                                    <p class="homes-address mb-3">
                                        <a href="properties_details.php?id=<?php echo $properties_id; ?>">
                                            <i class="fa fa-map-marker"></i><span><?php echo $address; ?></span>
                                        </a>
                                    </p>
                                    <p class="homes-address mb-3"> <a href="#"> <i class="fa fa-phone"></i><span><?php echo $mobileno; ?></span> </a> </p>
                                    <!-- homes List -->
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
                                      <h3 class="title mt-3"> <a href="#">₹ <?php echo $price; ?></a> </h3>
                                      <!-- <div class="compare"> <a href="#" title="Favorites"> <i class="flaticon-heart"></i> </a> </div> -->

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
                </div>
            </div>
            <!-- <nav aria-label="..." class="agents pt-55">
                <ul class="pagination disabled">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav> -->
        </div>
    </section>
    <!-- END SECTION PROPERTIES LISTING -->

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
      function addToWishlist(obj) 
      {
        var p_id = $(obj).data("pid");
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
               window.location.href = 'plotting_properties.php';
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
             window.location.href = 'plotting_properties.php';
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

  $query = "insert into customers (name,email,mobileno,date,otp) values ('$name','$email','$mobile','$date','$otp')";

  $run_query = mysqli_query($con,$query);

  if($run_query)
  {

    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("WOW!","Details Added Successfully!","success");';
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
