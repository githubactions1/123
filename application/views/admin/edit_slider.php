<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>Edit Slider</title>
      <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/css/select2.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datetimepicker.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">

      <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

      <style type="text/css">
        #slider_form .error{color:red;}
      </style>

   </head>
   <body>
      <div class="main-wrapper">
      <?php echo include('header.php'); ?>

      <?php echo include('sidebar.php'); ?>

      <div class="page-wrapper">
      <div class="content container-fluid">
      <div class="page-header">
         <div class="row">
            <div class="col-sm-12">
               <h3 class="page-title">Edit Slider</h3>
               
            </div>
         </div>
      </div>
      <div class="row">
      <div class="col-md-12">
         <div class="card" data-select2-id="9">
            <div class="card-body" data-select2-id="8">
               <form method="post" id="slider_form" action="<?php echo base_url('admin/update_slider');?>" enctype="multipart/form-data" autocomplete="off">

                  <input type="hidden" name="slider_id" id="slider_id" value="<?php echo $edit_slider->id; ?>">

                  <input type="hidden" name="old_photo" value="<?php echo $edit_slider->photo;?>">
                  
                  <div class="row" data-select2-id="6">
                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Name 1</label>
                           <div  >
                              <input class="form-control" type="text" name="slider_name1" id="slider_name1" value="<?php echo $edit_slider->slider_name1;?>" placeholder="Slider Name 1">
                           </div>
                        </div>
                     </div>

                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Name 2</label>
                           <div  >
                              <input class="form-control" type="text" name="slider_name2" id="slider_name2" value="<?php echo $edit_slider->slider_name2;?>" placeholder="Slider Name 2">
                           </div>
                        </div>
                     </div>

                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Name 3</label>
                           <div  >
                              <input class="form-control" type="text" name="slider_name3" id="slider_name3" value="<?php echo $edit_slider->slider_name3;?>" placeholder="Slider Name 3">
                           </div>
                        </div>
                     </div>

                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Image</label>
                           <div  >
                              <input class="form-control" type="file" name="photo" id="photo">
                              <br>
                              <br>
                              <img src="<?php echo base_url('uploads/slider/'.$edit_slider->photo); ?>" style="width: 100px;" height="80">
                           </div>
                        </div>
                     </div>

                     
                     <div class="row col-sm-6 p-5">
                        <div class="success_message row"></div>
                     </div>
                     <div class="text-end mt-4">
                        <button type="submit" class="btn btn-primary" id="btn_submit" name="btn_submit">Save</button>
                        <a href="<?php echo base_url('admin/slider_list'); ?>" class="btn btn-primary">Cancel</a>
                     </div>
               </form>
               </div>
            </div>
         </div>
      </div>
      <script src="<?php echo base_url();?>assets/js/jquery-3.6.0.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/feather.min.js"></script>
      <script src="<?php echo base_url();?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
      <script src="<?php echo base_url();?>assets/plugins/select2/js/select2.min.js"></script>
      <script src="<?php echo base_url();?>assets/plugins/moment/moment.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/script.js"></script>

      <script type="text/javascript">
         $(function()
         {
            $('#slider_form').validate({
            
               rules: {
                  "slider_name1": {
                       required: true
                   },
                   "slider_name2": {
                       required: true
                   },
                   "slider_name3": {
                       required: true
                   }
               },
               messages: {
                  "slider_name1": {
                       required: 'Slider Name 1 is required'
                   },
                   "slider_name2": {
                       required: 'Slider Name 2 is required'
                   },
                   "slider_name3": {
                       required: 'Slider Name 3 is required'
                   }
               }
            });

            $("#slider_form").ajaxForm({
            beforeSend: function () {
                $('#btn_submit').prop('disabled',true);
                $('.form_error_msg').html('');
                $('.success_message').html('<br><div class="alert alert-info">Data analyzing...please wait...</div>');
            },
            uploadProgress: function (event, position, total, percentComplete) {
                //albumprogressbar.width(percentComplete + '%');
            },
            beforeSubmit: function () {
                return $("#slider_form").valid(); // TRUE when form is valid, FALSE will cancel submit
            },
            complete: function (response) {
                //alert('Your Proposal Id Is'+response.pi);
                //console.log(response);return;
                var temp = JSON.parse(response.responseText);
                //console.log(temp);
                if (temp.status == 'success') 
                {
                    $('.success_message').show().html(temp.message);
                    setTimeout(function()
                    {
                        window.location.href = temp.redirect;
                    }, 3000);
                }
                else if (temp.status == 'error') 
                {
                    $('#btn_submit').prop('disabled',false);
                    $('.success_message').html('');
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

      <script type="text/javascript">
         tinymce.init({
           selector: 'textarea#description'
         });
      </script>
   </body>
   
</html>