<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>Edit Loan Details</title>
      <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/css/select2.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datetimepicker.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">

      <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

      <style type="text/css">
        #loan_form .error{color:red;}
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
               <h3 class="page-title">Edit Loan Details</h3>
               <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="estimates.html">Estimate</a></li>
                  <li class="breadcrumb-item active">Edit Estimate</li>
               </ul>
            </div>
         </div>
      </div>
      <div class="row">
      <div class="col-md-12">
         <div class="card" data-select2-id="9">
            <div class="card-body" data-select2-id="8">
               <form method="post" id="loan_form" action="<?php echo base_url('admin/update_loan');?>" enctype="multipart/form-data" autocomplete="off">

                  <input type="hidden" name="loan_id" id="loan_id" value="<?php echo $edit_loan->id; ?>">
                  
                  <div class="row" data-select2-id="6">
                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Full Name</label>
                           <div  >
                              <input class="form-control" type="text" name="full_name" id="full_name" value="<?php echo $edit_loan->full_name;?>" placeholder="Full Name">
                           </div>
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Email Address</label>
                           <div  >
                              <input class="form-control" type="text" name="email_address" id="email_address" value="<?php echo $edit_loan->email_address;?>" placeholder="Email Address">
                           </div>
                        </div>
                     </div>

                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Phone Number</label>
                           <div  >
                              <input class="form-control" type="text" name="phone_number" id="phone_number" value="<?php echo $edit_loan->phone_number;?>" placeholder="Phone Number">
                           </div>
                        </div>
                     </div>

                     <div class="col-md-3">
                        <div class="form-group"  >
                           <label>Bank Name</label>
                           <select class="form-select" name="bank_name" id="bank_name" >
                                <option value="">Select Bank</option>
                                <option value="HDFC Bank" <?php if($edit_loan->bank_name =='HDFC Bank'){echo 'selected'; }?>>HDFC Bank</option>
                                <option value="Kotak Bank" <?php if($edit_loan->bank_name =='Kotak Bank'){echo 'selected'; }?>>Kotak Bank</option>
                                <option value="IDFC Bank" <?php if($edit_loan->bank_name =='IDFC Bank'){echo 'selected'; }?>>IDFC Bank</option>
                                <option value="ICICI Bank" <?php if($edit_loan->bank_name =='ICICI Bank'){echo 'selected'; }?>>ICICI Bank</option>
                                <option value="Citi Bank" <?php if($edit_loan->bank_name =='Citi Bank'){echo 'selected'; }?>>Citi Bank</option>
                           </select>
                        </div>
                     </div>

                     <div class="col-md-3">
                        <div class="form-group"  >
                           <label>Profession</label>
                           <select class="form-select" name="profession" id="profession" >
                                <option value="">Select Profession</option>
                                <option value="Self Employed" <?php if($edit_loan->profession =='Self Employed'){echo 'selected'; }?>>Self Employed</option>
                                <option value="Salaried" <?php if($edit_loan->profession =='Salaried'){echo 'selected'; }?>>Salaried</option>
                                <option value="Bussiness" <?php if($edit_loan->profession =='Bussiness'){echo 'selected'; }?>>Bussiness</option> 
                           </select>
                        </div>
                     </div>

                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Area</label>
                           <div  >
                              <input class="form-control" type="text" name="area" id="area" value="<?php echo $edit_loan->area;?>" placeholder="Area">
                           </div>
                        </div>
                     </div>

                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Interest Rate</label>
                           <div  >
                              <input class="form-control" type="text" name="percent" id="percent" value="<?php echo $edit_loan->percent;?>" placeholder="Interest Rate">
                           </div>
                        </div>
                     </div>

                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Message</label>
                           <div>
                              <textarea class="form-control" name="message" id="message"><?php echo $edit_loan->message;?></textarea>
                           </div>
                        </div>
                     </div>
                     
                     <div class="row col-sm-6 p-5">
                        <div class="success_message row"></div>
                     </div>
                     <div class="text-end mt-4">
                        <button type="submit" class="btn btn-primary" id="btn_submit" name="btn_submit">Save</button>
                        <a href="<?php echo base_url('admin/laon_list'); ?>" class="btn btn-primary">Cancel</a>
                     </div>
               </form>
               </div>
            </div>
         </div>
      </div>
      <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
     <div class="modal-dialog modal-top">
        <div class="modal-content">
           <div class="modal-header bg-danger">
              <h4 class="modal-title" id="topModalLabel">Confirm Delete</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <div class="modal-body">
              <h5>Are you sure want to delete this record ?</h5>
           </div>
           <div class="modal-footer">
              <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="btndelete">Delete</button>
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
            /*$('#loan_form').validate({
            
               rules: {
                  "properties_name": {
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
            });*/

            $("#loan_form").ajaxForm({
            beforeSend: function () {
                $('#btn_submit').prop('disabled',true);
                $('.form_error_msg').html('');
                $('.success_message').html('<br><div class="alert alert-info">Data analyzing...please wait...</div>');
            },
            uploadProgress: function (event, position, total, percentComplete) {
                //albumprogressbar.width(percentComplete + '%');
            },
            beforeSubmit: function () {
                return $("#loan_form").valid(); // TRUE when form is valid, FALSE will cancel submit
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

      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   </body>
   
</html>