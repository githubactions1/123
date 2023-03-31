<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Edit payment Made</title>
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">

    <style type="text/css">
        .no-outline {
          border-top-style: hidden;
          border-right-style: hidden;
          border-left-style: hidden;
          border-bottom-style: hidden;
          
        }

        .no-outline:focus {
          display: none;
        }
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
                            <h3 class="page-title"> <a href="<?php echo base_url('admin/payment_made_list');?>" style="margin-right: 10px;"><i class="fa fa-arrow-left" data-bs-toggle="tooltip" title="" data-bs-original-title="Back" aria-label="fa fa-arrow-left"></i></a> Recipt</h3>
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
                                <form method="post" id="payment_made_form" action="<?php echo base_url('admin/update_payment_made');?>" data-select2-id="7">
                                    <input type="hidden" name="payment_made_id" id="payment_made_id" value="<?php echo $edit_payment_made->id; ?>">
                                    <div class="row" data-select2-id="6">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label style="color:#f00"> Deposit To </label>

                                                <select class="form-select" name="deposit" id="deposit">
                                                    <option value="">Search Deposit</option>
                                                    <?php
                                                    foreach ($bank_name as $cn)
                                                    {
                                                   
                                                    ?>
                                                    <option value="<?php echo $cn->id;?>" <?php if($edit_payment_made->deposit == $cn->id){echo 'selected'; } ?>><?php echo $cn->account_name;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label style="color:#f00"> Vendor </label>
                                                <select class="js-example-basic-single select2" name="vendor" id="vendor" readonly>
                                                    <option value="">Search Vendor</option>
                                                    <?php
                                                    foreach ($vendor_name as $cn)
                                                    {
                                                   
                                                    ?>
                                                    <option value="<?php echo $cn->id;?>" <?php if($edit_payment_made->vendor == $cn->id){echo 'selected'; } ?>><?php echo $cn->company_name;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group"> <label style="color:#f00">Date</label>
                                                <div> <input class="form-control datetimepicker" type="text" name="date" id="date" value="<?php echo $edit_payment_made->date; ?>" placeholder="15/02/2022"> </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2">
                                            <div class="form-group"> <label>Payment Mode</label>
                                                <div>
                                                    <select class="form-select" name="payment_mode" id="payment_mode">
                                                        <option value="Cash" <?php if($edit_payment_made->payment_mode == 'Cash'){echo 'selected'; }?>>Cash</option>
                                                        <option value="Cheque" <?php if($edit_payment_made->payment_mode == 'Cheque'){echo 'selected'; }?>>Cheque</option>
                                                        <option value="Credit Card" <?php if($edit_payment_made->payment_mode == 'Credit Card'){echo 'selected'; }?>>Credit Card</option>
                                                        <option value="Bank Transfer" <?php if($edit_payment_made->payment_mode == 'Bank Transfer'){echo 'selected'; }?>>Bank Transfer</option>
                                                        <option value="Others" <?php if($edit_payment_made->payment_mode == 'Others'){echo 'selected'; }?>>Others</option>
                                                        <option value="Online" <?php if($edit_payment_made->payment_mode == 'Online'){echo 'selected'; }?>>Online</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group"> <label style="color:#f00">Mobile</label>
                                                <div> <input class="form-control" type="text" name="mobile" id="mobile" value="<?php echo $edit_payment_made->mobile; ?>" placeholder="Mobile Number"> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group"> <label>Is Balance Only? </label>
                                                <div>
                                                    <?php
                                                    if($edit_payment_made->balance == 'Checked')
                                                    {
                                                        echo '<input type="checkbox" name="balance" id="balance" checked disabled>';
                                                    }
                                                    else
                                                    {
                                                        echo '<input type="checkbox" name="balance" id="balance" disabled>';
                                                    }
                                                    ?>
                                                    <!-- <input type="checkbox" name="balance" id="balance" checked> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <hr>
                                        </div>
                                        <div class="row pt11">
                                            <div class="col-md-2">
                                                <div class="form-group"> <label style="color:#f00"> Amount</label> <input type="text" name="amount" id="amount" value="<?php echo $edit_payment_made->amount; ?>" class="form-control"> </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group"> <label>Bank Charges (If any) </label> <input type="text" name="bank_charges" id="bank_charges" value="<?php echo $edit_payment_made->bank_charges; ?>" class="form-control"> </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group"> <label>DD/Cheque No </label> <input type="text" name="cheque_no" id="cheque_no" value="<?php echo $edit_payment_made->cheque_no; ?>" class="form-control"> </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group"> <label>DD/Cheque Date</label> <input class="form-control datetimepicker" type="text" name="cheque_date" id="cheque_date" value="<?php echo $edit_payment_made->cheque_date; ?>" placeholder="15/02/2022"> </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group"> <label>Reference# </label>
                                                    <div> <input class="form-control " type="text" name="reference" id="reference" value="<?php echo $edit_payment_made->reference; ?>"> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-lg-12 pt11">
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Bill Number</th>
                                                        <th>Bill Amount</th>
                                                        <th>Due Amount </th>
                                                        <th>Payment</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="show_tmp_data">
                                                    <?php 
                                                    for ($i=0; $i < count($edit_payment_made_entries); $i++) {
                                                    ?>
                                                    <tr class="tblro">
                                                        <input type="hidden" name="iid[]" class="iid" value="<?php echo $i; ?>">
                                                        <input type="hidden" name="payment_made_entries_id" class="payment_made_entries_id" value="<?php echo $edit_payment_made_entries[$i]->id; ?>">
                                                      <td><input class="no-outline" id="invoicedate<?php echo $i;?>" name= "invoicedate<?php echo $i;?>" value="<?php echo $edit_payment_made_entries[$i]->invoicedate; ?>"></td>
                                                      <td><input class="no-outline" id="invoiceno<?php echo $i;?>" name= "invoiceno<?php echo $i;?>" value="<?php echo $edit_payment_made_entries[$i]->invoiceno; ?>"></td>
                                                      <td><input class="no-outline" id="invoiceamount<?php echo $i;?>" name= "invoiceamount<?php echo $i;?>" value="<?php echo $edit_payment_made_entries[$i]->invoiceamount; ?>"></td>
                                                      <td><input class="no-outline" id="dueamount<?php echo $i;?>" name= "dueamount<?php echo $i;?>" value="<?php echo $edit_payment_made_entries[$i]->dueamount; ?>" size="8"><span> <a style="color:blue; cursor: pointer;" onclick="dueamt('<?php echo $i;?>');" >(Pay Full)</a></span></td>
                                                      <td><input class="payment" name="payment<?php echo $i;?>" id="payment<?php echo $i;?>" value="<?php echo $edit_payment_made_entries[$i]->payment; ?>" onkeyup="payment('payment<?php echo $i;?>');"></td>
                                                    </tr>
                                                    <?php } ?>
                                                    
                                                </tbody>
                                            </table>
                                            <div class="nobi">
                                                <!-- <h3>There is no Bill Applied For this payment</h3> -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <hr>
                                                </div>
                                                <div class="col-lg-7 col-md-6 pt11">
                                                    <div class="invoice-fields">
                                                        <h4 class="field-title"> Note..</h4> <textarea class="form-control" name="note" id="note"><?php echo $edit_payment_made->note;?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-6 pt11">
                                                    <div class="invoice-total-card">
                                                        <div class="invoice-total-box">
                                                            <div class="invoice-total-inner">

                                                                <div class="row">
                                                                    <div class="col-lg-6"><p>Total </p></div>
                                                                    <div class="col-lg-6 ">
                                                                        <input type="text" class="utrt1" name="total" id="total" value="<?php echo $edit_payment_made->total;?>" readonly>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-lg-6"><p> Amount Received</p></div>
                                                                    <div class="col-lg-6 ">
                                                                        <input type="text" class="utrt1" name="amount_received" id="amount_received" value="<?php echo $edit_payment_made->amount_received;?>" readonly>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-lg-6"><p>Amount Used For Payments</p></div>
                                                                    <div class="col-lg-6 ">
                                                                        <input class="utrt1" type="text" name="amount_used" id="amount_used" value="<?php echo $edit_payment_made->amount_used;?>">
                                                                    </div>
                                                                </div>

                                                                <div class="invoice-total-footer">
                                                                    <h4>Amount in excess<input class="utrt1" type="text" name="amount_excess" id="amount_excess" value="<?php echo $edit_payment_made->amount_excess;?>" readonly></h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="upload-sign">
                                                            <div class="form-group float-end mb-0"> <button class="btn btn-primary" type="submit">Cancle</button> </div>
                                                            <div class="form-group float-end mb-0"> <button class="btn btn-primary" type="submit" id="btn_submit" name="btn_submit">Save </button> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row col-sm-6 p-5">
                                                <div class="success_message row"></div>
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
                <script src="<?php echo base_url();?>assets/plugins/select2/js/custom-select.js"></script>
                <script src="<?php echo base_url();?>assets/plugins/moment/moment.min.js"></script>
                <script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script>
                <script src="<?php echo base_url();?>assets/js/script.js"></script>

<script type="text/javascript">

    function payment(inputname)
    {
        //alert();
        var sum = 0;
        $(".payment").each(function()
        {
          sum += +this.value;
        });
        //alert(sum);

        $('#total').val((sum).toFixed(2));
        $('#amount_received').val((sum).toFixed(2));
        $('#amount_used').val((sum).toFixed(2));
    }

</script>

<script type="text/javascript">
    $(function()
    {
        $("#payment_made_form").ajaxForm({
        beforeSend: function () {
            $('#btn_submit').prop('disabled',true);
            $('.form_error_msg').html('');
            $('.success_message').html('<br><div class="alert alert-info">Data analyzing...please wait...</div>');
        },
        uploadProgress: function (event, position, total, percentComplete) {
            //albumprogressbar.width(percentComplete + '%');
        },
        beforeSubmit: function () {
            return $("#payment_made_form").valid(); // TRUE when form is valid, FALSE will cancel submit
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

    function dueamt(inputname)
    {
        //alert(inputname);
        i=inputname;
        //alert(i);

        dueamount = $('#dueamount'+i).val();
        //alert(dueamount);

        $('#payment'+i).val(dueamount);

        var sum = 0;
        $(".payment").each(function()
        {
          sum += +this.value;
        });
        //alert(sum);

        $('#total').val((sum).toFixed(2));
        $('#amount_received').val((sum).toFixed(2));
        $('#amount_used').val((sum).toFixed(2));
    }
</script>
</body>

</html>