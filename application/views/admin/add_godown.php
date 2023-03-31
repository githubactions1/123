<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Add Godown</title>

<link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png">

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">

<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/css/select2.min.css">

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">

<style type="text/css">
  #godown_form .error{color:red;}
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
							<h3 class="page-title">Godown</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?php echo base_url('admin/index');?>">Dashboard</a></li>
								<li class="breadcrumb-item"><a href="<?php echo base_url('admin/customer_list');?>">Customers</a></li>
								<li class="breadcrumb-item active">Add Godown</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<form method="post" id="godown_form" action="<?php echo base_url('admin/save_godown');?>" autocomplete="off">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Name</label>
												<input type="text" name="name" id="name" class="form-control">
											</div>
										</div>

									</div>

									<div class="row col-sm-6 p-5">
					                	<div class="success_message row"></div>
					                </div>

									<div class="text-end mt-4">
										<button type="submit" id="btn_submit" name="btn_submit" class="btn btn-primary">Save</button>
										<a href="<?php echo base_url('admin/godown_list'); ?>" class="btn btn-primary">Cancel</a>
									</div>
								</form>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>


	<script src="<?php echo base_url();?>assets/js/jquery-3.6.0.min.js"></script>

	<script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>

	<script src="<?php echo base_url();?>assets/js/feather.min.js"></script>

	<script src="<?php echo base_url();?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

	<script src="<?php echo base_url();?>assets/plugins/select2/js/select2.min.js"></script>

	<script src="<?php echo base_url();?>assets/js/script.js"></script>

	<script type="text/javascript">
      $(function()
      {
        
        $("#godown_form").ajaxForm({
            beforeSend: function () {
                $('#btn_submit').prop('disabled',true);
                $('.form_error_msg').html('');
                $('.success_message').html('<br><div class="alert alert-info">Data analyzing...please wait...</div>');
            },
            uploadProgress: function (event, position, total, percentComplete) {
                //albumprogressbar.width(percentComplete + '%');
            },
            beforeSubmit: function () {
                return $("#godown_form").valid(); // TRUE when form is valid, FALSE will cancel submit
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
    
</body>


</html>