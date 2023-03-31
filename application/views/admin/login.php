<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>Login</title>
      <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
   </head>
   <body>
      <div class="main-wrapper login-body">
         <div class="login-wrapper">
            <div class="container">
               <img class="img-fluid logo-dark mb-2" src="<?php echo base_url();?>assets/img/logo.png" alt="Logo">
               <div class="loginbox">
                  <div class="login-right">
                     <div class="login-right-wrap">
                        <h1>Login</h1>
                        <p class="account-subtitle">Access to our dashboard</p>
                        <form action="<?php echo base_url('admin/check_login'); ?>" method="post" id="kt_login_signin_form">
                           <div class="form-group">
                              <label class="form-control-label">Email Address</label>
                              <input type="email" name="email" id="email" class="form-control">
                           </div>
                           <div class="form-group">
                              <label class="form-control-label">Password</label>
                              <div class="pass-group">
                                 <input type="password" name="password" id="password" class="form-control pass-input">
                                 <span class="fas fa-eye toggle-password"></span>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="row">
                                 <div class="col-6">
                                    <div class="custom-control custom-checkbox">
                                       <input type="checkbox" class="custom-control-input" id="cb1">
                                       <label class="custom-control-label" for="cb1">Remember me</label>
                                    </div>
                                 </div>
                                 <div class="col-6 text-end">
                                    <a class="forgot-link" href="forgot-password.html">Forgot Password ?</a>
                                 </div>
                              </div>
                           </div>
                           <div style="text-align: center; " class="success_message "></div>
                           <button class="btn btn-lg btn-block btn-primary w-100" type="submit" name="submit" id="submit">Login</button>
                           <!-- <div class="login-or">
                              <span class="or-line"></span>
                              <span class="span-or">or</span>
                           </div>
                           <div class="social-login mb-3">
                              <span>Login with</span>
                              <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a><a href="#" class="google"><i class="fab fa-google"></i></a>
                           </div> -->
                           <!-- <div class="text-center dont-have">Don't have an account yet? <a href="register.html">Register</a></div> -->
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="<?php echo base_url();?>assets/js/jquery-3.6.0.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/feather.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/script.js"></script>

      <script type="text/javascript">
      $(function()
      {

        $("#kt_login_signin_form").ajaxForm({
            beforeSend: function () {
                $('#submit').prop('disabled',true);
                $('.form_error_msg').html('');
                $('.success_message').html('<br><div class="alert alert-info">Data analyzing...please wait...</div>');
            },
            uploadProgress: function (event, position, total, percentComplete) {
                //albumprogressbar.width(percentComplete + '%');
            },
            beforeSubmit: function () {
                return $("#kt_login_signin_form").valid(); // TRUE when form is valid, FALSE will cancel submit
            },
            complete: function (response) {
                //alert('Your Proposal Id Is'+response.pi);
                //console.log(response);return;
                var temp = JSON.parse(response.responseText);
                console.log(response);
                if (temp.status == 'success') 
                {
                    $('.success_message').show().html(temp.message);
                    setTimeout(function()
                    {
                        window.location.href = temp.redirect;
                    }, 1000);
                }
                else if (temp.status == 'error') 
                {
                    $('#submit').prop('disabled',false);
                    $('.success_message').show().html(temp.message);
                    $.each(temp.errors, function (key, val) {
                        $('.' + key).html(val);
                    });
                }
            }
        });

      });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>

    <script src="<?php echo base_url();?>assets/js/malsup-jquery.js"></script>

   </body>
</html>