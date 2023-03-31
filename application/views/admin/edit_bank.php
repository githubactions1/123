<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Edit Bank</title>
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
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
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="customers.html">Customers</a></li>
                                <li class="breadcrumb-item active">Add Customers</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-md-6">
                        <div class="card">
                            <form method="post" id="bank_form" action="<?php echo base_url('admin/update_bank');?>">
                                <input type="hidden" name="bank_id" id="bank_id" value="<?php echo $edit_bank->id; ?>">
                                <div class=" " style="padding: 25px;">
                                    <h3 class="page-title">Add Bank Account</h3><br>
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Account Name</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="account_name" id="account_name" value="<?php echo $edit_bank->account_name; ?>" class="form-control" placeholder="Account Name">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">IFSC Code</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="ifsc_code" id="ifsc_code" value="<?php echo $edit_bank->ifsc_code; ?>" class="form-control" placeholder="IFSC Code">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Account No.</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="account_no" id="account_no" value="<?php echo $edit_bank->account_no; ?>" class="form-control" placeholder="Account No.">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Account Code</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="account_code" id="account_code" value="<?php echo $edit_bank->account_code; ?>" class="form-control" placeholder="Account Code">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label"> Bank Name</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="bank_name" id="bank_name" value="<?php echo $edit_bank->bank_name; ?>" class="form-control" placeholder="Bank Name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Branch Name</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="branch_name" id="branch_name" value="<?php echo $edit_bank->branch_name; ?>" class="form-control" placeholder="Branch Name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Descriptions</label>
                                        <div class="col-lg-9">
                                            <textarea name="description" id="description" class="form-control"><?php echo $edit_bank->description; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label"> </label>
                                        <div class="col-lg-9">
                                            <?php
                                            if($edit_bank->show_dashboard == 'check')
                                            {
                                                echo '<input type="checkbox" name="show_dashboard" id="show_dashboard" checked> Show On Dashborad <br>';
                                            }
                                            else
                                            {
                                                echo '<input type="checkbox" name="show_dashboard" id="show_dashboard"> Show On Dashborad <br>';
                                            }
                                            ?>

                                            <?php
                                            if($edit_bank->default_payment_retail_invoice == 'check')
                                            {
                                                echo '<input type="checkbox" name="default_payment_retail_invoice" id="default_payment_retail_invoice" checked> Show Default Payment in Retail Invoice';
                                            }
                                            else
                                            {
                                                echo '<input type="checkbox" name="default_payment_retail_invoice" id="default_payment_retail_invoice"> Show Default Payment in Retail Invoice';
                                            }
                                            ?>
                                            <!-- <input type="checkbox" name="show_dashboard" id="show_dashboard" > Show On Dashborad <br>
                                            <input type="checkbox" name="default_payment_retail_invoice" id="default_payment_retail_invoice"> Show Default Payment in Retail Invoice -->
                                        </div>
                                    </div>

                                    <div class="text-end mt-4">
                                        <button type="submit" id="btn_submit" name="btn_submit" class="btn btn-primary">Save</button>
                                        <button type="submit" class="btn btn-primary">Cancel</button>
                                    </div>
                                    <br>

                                    <div class="row col-sm-8 p-5">
                                        <div class="success_message row"></div>
                                    </div>

                                </div>
                            </form>
                        </div>
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
            $("#bank_form").ajaxForm({
                beforeSend: function () {
                    $('#btn_submit').prop('disabled',true);
                    $('.form_error_msg').html('');
                    $('.success_message').html('<br><div class="alert alert-info">Data analyzing...please wait...</div>');
                },
                uploadProgress: function (event, position, total, percentComplete) {
                    //albumprogressbar.width(percentComplete + '%');
                },
                beforeSubmit: function () {
                    return $("#bank_form").valid(); // TRUE when form is valid, FALSE will cancel submit
                },
                complete: function (response)
                {
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