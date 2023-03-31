<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>View Payment Received </title>
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
</head>

<body>
    <div class="main-wrapper">
        <?php echo include('header.php'); ?>

        <?php echo include('sidebar.php'); ?>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-7">
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title"><a href="<?php echo base_url('admin/payment_received_list'); ?>" style="margin-right: 10px;float: left;"><img src="<?php echo base_url();?>assets/img/back.jpg" class=""></a> </h3>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="invoice-item">
                                    <div class="invoice-item">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="invoice-info"> <strong class="customer-text"><?php echo $company_details->company_name; ?> </strong>
                                                    <p class="invoice-details invoice-details-two ">
                                                    <p class="invte"><b>HEAD OFFICE:</b> <?php echo $company_details->addressline1; ?></p>
                                                    <p class="invte"> <b>BRANCH OFFICE:</b> <?php echo $company_details->addressline2; ?></p>
                                                    <p class="invte"><b>M:</b> <?php echo $company_details->phone; ?></p>
                                                    <p class="invte"><b>GSTN:</b> <?php echo $company_details->gstno; ?></p>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="invoice-info invoice-info2"> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="invoice-item invoice-table-wrap">
                                        <h5 style="text-align: center; padding:13px 6px 3px 0px">Payment Receipt </h5>
                                        <div class="row prcipt">
                                            <div class="col-md-4">
                                                <h3>Payment Date </h3>
                                                <h3>Reference Number </h3>
                                                <h3>Payment Mode </h3>
                                                <h3>Cheque No. </h3>
                                                <h3>Deposit To </h3>
                                            </div>
                                            <div class="col-md-4">
                                                <h3>
                                                    <?php
                                                    if($view_payment_received->date =='')
                                                    {
                                                        echo '-';
                                                    }
                                                    else
                                                    {
                                                        echo $view_payment_received->date;
                                                    }
                                                    ?>

                                                </h3>

                                                <h3>
                                                    <?php
                                                    if($view_payment_received->reference =='')
                                                    {
                                                        echo '-';
                                                    }
                                                    else
                                                    {
                                                        echo $view_payment_received->reference;
                                                    }
                                                    ?>
                                                </h3>
                                                <h3>
                                                    <?php
                                                    if($view_payment_received->payment_mode =='')
                                                    {
                                                        echo '-';
                                                    }
                                                    else
                                                    {
                                                        echo $view_payment_received->payment_mode;
                                                    }
                                                    ?>
                                                </h3>
                                                <h3>
                                                    <?php
                                                    if($view_payment_received->cheque_no =='')
                                                    {
                                                        echo '-';
                                                    }
                                                    else
                                                    {
                                                        echo $view_payment_received->cheque_no;
                                                    }
                                                    ?>
                                                </h3>
                                                <h3>
                                                    <?php
                                                    if($view_payment_received->deposit =='')
                                                    {
                                                        echo '-';
                                                    }
                                                    else
                                                    {
                                                        echo $view_payment_received->bank_name;
                                                    }
                                                    ?>
                                                </h3>
                                            </div>
                                            <div class="col-md-4 boxx">
                                                <h5>Amount Received</h5>
                                                <h2>₹ <?php if($view_payment_received->total == ''){echo '0.00';}else{echo $view_payment_received->total; } ?></h2>
                                            </div>
                                        </div>
                                    </div> <br>
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="invoice-info">
                                                <div class="invoice-info">
                                                    <p>Bill To :</p>
                                                    <p class="invte"><?php echo $view_payment_received->name;?> </p>
                                                    <p class="invte"><?php echo $view_payment_received->billing_attention;?>, <br><?php echo $view_payment_received->billing_street;?>, <br> <?php echo $view_payment_received->billing_city;?>, <?php echo $view_payment_received->billing_state;?>, <?php echo $view_payment_received->billing_pincode;?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6"> </div>
                                        </p>
                                    </div> <br>
                                    <hr> <br>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <table class="invoice-table table table-center mb-0">
                                    <h3>Payment for </h3>
                                    <thead>
                                        <tr>
                                            <th>Invoice Number </th>
                                            <th>Invoice Date </th>
                                            <th class="text-end">Invoice Amount </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($view_payment_received_entries as $vpr)
                                        {
                                            
                                        ?>
                                        <tr>
                                            <td><?php echo $vpr->invoiceno; ?> </td>
                                            <td><?php echo $vpr->invoicedate; ?></td>
                                            <td class="text-end"> ₹ <?php echo $vpr->invoiceamount; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table> <br>
                                <p>Notes : </p> <br>
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
    <script src="<?php echo base_url();?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/script.js"></script>
</body>

</html>