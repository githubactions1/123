<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>Add Properties</title>
      <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/css/select2.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datetimepicker.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">

      <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

      <style type="text/css">
        #properties_form .error{color:red;}
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
               <h3 class="page-title">Add Properties</h3>
               <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="estimates.html">Estimate</a></li>
                  <li class="breadcrumb-item active">Add Estimate</li>
               </ul>
            </div>
         </div>
      </div>
      <div class="row">
      <div class="col-md-12">
         <div class="card" data-select2-id="9">
            <div class="card-body" data-select2-id="8">
               <form method="post" id="properties_form" action="<?php echo base_url('admin/save_properties');?>" enctype="multipart/form-data" autocomplete="off" >
                  
                  <div class="row" data-select2-id="6">
                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Property Name</label>
                           <div  >
                              <input class="form-control" type="text" name="properties_name" id="properties_name" placeholder="Property Name">
                           </div>
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Property Address</label>
                           <div  >
                              <input class="form-control" type="text" name="address" id="address" placeholder="Property Address">
                           </div>
                        </div>
                     </div>

                     <div class="col-md-3">
                        <div class="form-group"  >
                           <label>Category</label>
                           <select class="form-select" name="category" id="category" >
                              <option value="">Select Category</option>
                              <option value="commercial">Commercial</option>
                              <option value="residential">Residential</option>
                              <option value="plotting">Plotting</option>
                              <option value="homeloan">Home Loan</option>
                           </select>
                        </div>
                     </div>

                     <div class="col-md-3">
                        <div class="form-group"  >
                           <label>Sale/Rent</label>
                           <select class="form-select" name="sale_rent" id="sale_rent" >
                              <option value="Sale">Sale</option>
                              <!-- <option value="Rent">Rent</option> -->
                           </select>
                        </div>
                     </div>

                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Image</label>
                           <div  >
                              <input class="form-control" type="file" name="photo" id="photo">
                           </div>
                        </div>
                     </div>

                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Property Image Gallery</label>
                           <div  >
                              <input class="form-control" type="file" name="gallery[]" id="gallery" multiple>
                           </div>
                        </div>
                     </div>

                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Floor Plans</label>
                           <div  >
                              <input class="form-control" type="file" name="floor_plan[]" id="floor_plan" multiple>
                           </div>
                        </div>
                     </div>

                     <div class="col-md-3">
                        <div class="form-group">
                           <label>No of Bedroom</label>
                           <div  >
                              <input class="form-control" type="text" name="noofbedroom" id="noofbedroom" placeholder="No of Bedroom">
                           </div>
                        </div>
                     </div>

                     <div class="col-md-3">
                        <div class="form-group">
                           <label>No of Bathroom</label>
                           <div  >
                              <input class="form-control" type="text" name="noofbathroom" id="noofbathroom" placeholder="No of Bathroom">
                           </div>
                        </div>
                     </div>

                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Sqft</label>
                           <div  >
                              <input class="form-control" type="text" name="sqft" id="sqft" placeholder="Sqft">
                           </div>
                        </div>
                     </div>

                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Garages</label>
                           <div  >
                              <input class="form-control" type="text" name="garages" id="garages" placeholder="Garages">
                           </div>
                        </div>
                     </div>

                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Price</label>
                           <div  >
                              <input class="form-control" type="text" name="price" id="price" placeholder="Price">
                           </div>
                        </div>
                     </div>

                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Video</label>
                           <div  >
                              <input class="form-control" type="text" name="video" id="video" placeholder="Video">
                           </div>
                        </div>
                     </div>

                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Mobile No</label>
                           <div  >
                              <input class="form-control" type="text" name="mobileno" id="mobileno" placeholder="Mobile No">
                           </div>
                        </div>
                     </div>

                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Description</label>
                           <div>
                              <textarea class="form-control" name="description" id="description" rows="20"></textarea>
                           </div>
                        </div>
                     </div>

                     
                     <div class="row col-sm-6 p-5">
                        <div class="success_message row"></div>
                     </div>
                     <div class="text-end mt-4">
                        <button type="submit" class="btn btn-primary" id="btn_submit" name="btn_submit">Save</button>
                        <a href="<?php echo base_url('admin/properties_list'); ?>" class="btn btn-primary">Cancel</a>
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
            $('#properties_form').validate({
            
               rules: {
                  "properties_name": {
                       required: true
                   },
                   "photo": {
                       required: true
                   },
                   "price": {
                       required: true
                   }
               },
               messages: {
                  "properties_name": {
                       required: 'Properties Name is required'
                   },
                   "photo": {
                       required: 'Photo is required'
                   },
                   "price": {
                       required: 'Price is required'
                   }
               }
            });

            $("#properties_form").ajaxForm({
            beforeSend: function () {
                $('#btn_submit').prop('disabled',true);
                $('.form_error_msg').html('');
                $('.success_message').html('<br><div class="alert alert-info">Data analyzing...please wait...</div>');
            },
            uploadProgress: function (event, position, total, percentComplete) {
                //albumprogressbar.width(percentComplete + '%');
            },
            beforeSubmit: function () {
                return $("#properties_form").valid(); // TRUE when form is valid, FALSE will cancel submit
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