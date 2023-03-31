<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>Edit Bank Loan</title>
      <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/css/select2.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datetimepicker.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">

      <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

      <style type="text/css">
        #bank_loan_form .error{color:red;}
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
               <h3 class="page-title">Edit Bank Loan</h3>
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
               <form method="post" id="bank_loan_form" action="<?php echo base_url('admin/update_bank_loan');?>" enctype="multipart/form-data" autocomplete="off">

                  <input type="hidden" name="bank_loan_id" id="bank_loan_id" value="<?php echo $edit_bank_loan->id; ?>">
                  
                  <div class="row" data-select2-id="6">

                     <div class="col-md-12">
                        <div class="form-group">
                           <label>Description</label>
                           <div>
                              <textarea class="form-control" name="description" id="description" rows="10"><?php echo $edit_bank_loan->description;?></textarea>
                           </div>
                        </div>
                     </div>

                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Gallery</label>
                           <div  >
                              <input class="form-control" type="file" name="gallery[]" id="gallery" multiple>
                              <br>
                              <br>
                              <?php
                                    
                              foreach ($edit_bank_loan_images as $pi)
                              {
                                    
                              ?>
                              <br>
                              <img src="<?php echo base_url('uploads/bank_logo/'.$pi->gallery); ?>" style="width: 100px;" height="50"><br><br>

                              <a class="btn btn-primary confirm_delete" href="javascript:;" data="<?php echo $pi->id; ?>">Delete</a>
                              <br>
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                     
                     <div class="row col-sm-6 p-5">
                        <div class="success_message row"></div>
                     </div>
                     <div class="text-end mt-4">
                        <button type="submit" class="btn btn-primary" id="btn_submit" name="btn_submit">Save</button>
                        <a href="<?php echo base_url('admin/bank_loan_list'); ?>" class="btn btn-primary">Cancel</a>
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
            $('#bank_loan_form').validate({
            
               rules: {
                  "description": {
                       required: true
                   }
               },
               messages: {
                  "description": {
                       required: 'Description is required'
                   }
               }
            });

            $("#bank_loan_form").ajaxForm({
            beforeSend: function () {
                $('#btn_submit').prop('disabled',true);
                $('.form_error_msg').html('');
                $('.success_message').html('<br><div class="alert alert-info">Data analyzing...please wait...</div>');
            },
            uploadProgress: function (event, position, total, percentComplete) {
                //albumprogressbar.width(percentComplete + '%');
            },
            beforeSubmit: function () {
                return $("#bank_loan_form").valid(); // TRUE when form is valid, FALSE will cancel submit
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

      <script type="text/javascript">
        $('.confirm_delete').click(function()
        {
         var id = $(this).attr('data');
         //alert(id);return;
         $('#deleteModal').modal('show');
         $('#btndelete').unbind().click(function(){
              $.ajax({
               type : 'ajax',
               method : 'post',
               url : '<?php echo base_url('admin/delete_bank_loan_images');?>',
               data : {'id':id},
               async : false,
               dataType : 'json',

               success : function(response)
               {
                 $("#deleteModal").modal('hide');
                 swal('Bank Logo Delete SuccessFully','');
                 setTimeout(function()
                 {
                     window.location.href = response;
                 }, 3000);
                 
               },

               });
         });

        });
    </script>
   </body>
   
</html>