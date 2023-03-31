<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>View vendor</title>
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

        #vendor_pdf
        {
            padding-right: 20px;
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        <?php echo include('header.php'); ?>

        <?php echo include('sidebar.php'); ?>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div id="accordion" class="custom-faq mb-3">
                            <div class="card mb-1">
                                <div class="card-header" id="headingFour">
                                    <h5 class="accordion-faq m-0"> <a class="text-dark collapsed" data-bs-toggle="collapse" href="#collapseFour" aria-expanded="false"> <i class="mdi mdi-help-circle me-1 text-primary"></i> <!-- <?php echo $total_due_amt->billid;?> --> Bill(s) payment pending <!-- <sapn style="float: right;">Total Amount : <?php echo $total_due_amt->due_amount;?></sapn> --></a> </h5>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="collapseFour" data-bs-parent="#accordion" style="">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <?php
                                            if(!empty($total_due_amt->vendor_name))
                                            {

                                            
                                            ?>
                                            <table class="invoice-table table table-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Bill#</th>
                                                        <th>Status</th>
                                                        <th>Amount</th>
                                                        <th >Due Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    

                                                    <?php
                                                    foreach($pending_bill as $cl)
                                                    {
                                                        if($cl->due_amount != $cl->payment)
                                                        {


                                                    ?>
                                                    <tr>
                                                       <td><?php echo $cl->bill_date; ?></td>
                                                       <td><?php echo $cl->bill_no; ?></td>
                                                       <td>
                                                        <?php
                                                        
                                                        $date = date('d-m-Y');
                                                        //echo $date;
                                                        $duedt = $cl->due_date;
                                                        //echo $duedt;

                                                        if($cl->due_date < $date)
                                                        {
                                                            //$status = 'Partially paid';
                                                            echo '<span class="badge bg-danger-light">Overdue</span>';
                                                        }
                                                        elseif($cl->payment == NULL)
                                                        {
                                                            echo '<span class="badge bg-info-light">
                                                                Sent
                                                            </span>';
                                                        }

                                                        elseif($cl->due_amount == $cl->payment)
                                                        {
                                                            //$status = 'Paid';
                                                            echo '<span class="badge bg-success-light">
                                                                Paid
                                                            </span>';
                                                        }
                                                        elseif($cl->due_date < $date)
                                                        {
                                                            //$status = 'Partially paid';
                                                            echo '<span class="badge bg-danger-light">Overdue</span>';
                                                        }
                                                        elseif($cl->due_amount != $cl->payment)
                                                        {
                                                            //$status = 'Partially paid';
                                                            echo '<span class="badge bg-warning-light">
                                                                Partially paid
                                                            </span>';
                                                        }
                                                        ?>
                                                            
                                                        </td>
                                                       <td>₹<?php echo $cl->totalamt; ?></td>
                                                       <td>₹<?php echo $cl->totalamt - $cl->payment; ?></td>
                                                       
                                                    </tr>
                                                    <?php } } ?>
                                                </tbody>
                                            </table>
                                            <?php
                                            }
                                            else
                                            {
                                                echo 'No Bill';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="background:#fff">
                            <ul class="nav nav-tabs nav-tabs-bottom">
                                <li class="nav-item"><a class="nav-link active" href="#bottom-tab1" data-bs-toggle="tab">Statement</a></li>
                                <li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-bs-toggle="tab">Transactions</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane show active" id="bottom-tab1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <select class="form-select">
                                                        <option> This Year</option>
                                                        <option> Today</option>
                                                        <option> This Week</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-md-end">
                                                <div class="btn-group btn-group-sm d-print-none mb-4">
                                                    <a href="javascript:window.print()" class="btn btn-white text-black-50"><i class="fa fa-print"></i> Print</a>
                                                    <button id="download-button" class="btn btn-white text-black-50 shadow-none"><i class="fa fa-download"></i> Download</button>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="card invoice-info-card">
                                        <div class="card-body" id="vendor_pdf">
                                            <div class="invoice-item invoice-item-one">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        
                                                        <div class="invoice-head" style="padding-top: 15px">
                                                            <h2>Vendor Statement for <?php echo $vendor_details->company_name; ?> </h2>
                                                            <p>From 01 Apr 2022 To 31 Mar 2023 </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        
                                                        <div class="invoice-info">
                                                            <h6 class="invoice-name"><?php echo $company_details->company_name; ?></h6>
                                                            <p class="invoice-details"> <b>HEAD OFFICE:</b> <br><?php echo $company_details->addressline1; ?> </p>
                                                            <p class="invoice-details" style="padding-top:5px"> <b>BRANCH OFFICE :</b> <br><?php echo $company_details->addressline2; ?> </p>
                                                            <p class="invoice-details" style="padding-top:5px"> <b>GST:</b> <?php echo $company_details->gstno; ?> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="invoice-item invoice-item-two">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="invoice-info"> <strong class="customer-text-one">Billed To</strong>
                                                            <!-- <h6 class="invoice-name"><?php echo $vendor_details->company_name; ?></h6> -->
                                                            <p class="invoice-details-two">
                                                                <p class=" invte" style="padding-top:5px"> <?php echo $vendor_details->company_name; ?><br><?php echo $vendor_details->billing_attention;?>, <br><?php echo $vendor_details->billing_street;?>, <br> <?php echo $vendor_details->billing_city;?>, <?php echo $vendor_details->billing_state;?>, <?php echo $vendor_details->billing_pincode;?> </p>
                                                            <p class=" invte" style="padding-top:5px"> GST : <?php echo $vendor_details->gst_no;?> </p>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="invoice-info invoice-info2"> <strong class="customer-text-one">Statement of Accounts </strong>
                                                            <p class="invoice-details"> 01 Apr 2022 To 31 Mar 2023 </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="invoice-terms"> </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="invoice-total-card">
                                                        <div class="invoice-total-box">
                                                            <div class="invoice-total-inner">
                                                                <p style="background:#dfdede;padding: 3px;"> Account Summary</p>

                                                                <p style="padding: 3px;">Opening Balance <span><input type="text" class="no-outline" value="₹" size="1" style="text-align:right"><input type="text" class="no-outline" name="opening_bal" id="opening_bal" value="<?php echo $vendor_details->opening_bal; ?>" size="5" style="text-align:left"></span></p>

                                                                <!-- <p style="padding: 3px;">Billed Amount <span><input type="text" class="no-outline" value="₹" size="1" style="text-align:right"> <input type="text" class="no-outline" name="bill_amt" id="bill_amt" value="<?php echo $bill_amt->totalamt; ?>" size="5" style="text-align:left"></span></p>

                                                                <p style="padding: 3px;">Amount Paid <span><input type="text" class="no-outline" value="₹" size="1" style="text-align:right"> <input type="text" class="no-outline" name="paid_amt" id="paid_amt" value="<?php echo $paid_amt->amount_received; ?>" size="5" style="text-align:left"></span></p> -->

                                                                <p style="padding: 3px;">Billed Amount <span><input type="text" class="no-outline" value="₹" size="1" style="text-align:right"> <input type="text" class="no-outline" name="bill_amt" id="bill_amt" value="<?php if(!empty($bill_amt->totalamt)){echo $bill_amt->totalamt;}else{echo '0';} ?>" size="5" style="text-align:left"></span></p>

                                                                <p style="padding: 3px;">Amount Paid <span><input type="text" class="no-outline" value="₹" size="1" style="text-align:right"> <input type="text" class="no-outline" name="paid_amt" id="paid_amt" value="<?php if(!empty($paid_amt->amount_received)){echo $paid_amt->amount_received;}else{echo '0';} ?>" size="5" style="text-align:left"></span></p>
                                                            </div>
                                                            <div class="invoice-total-footer">
                                                                <h4>Balance Due <span><input type="text" class="no-outline" value="₹" size="1" style="text-align:right"> <input type="text" class="no-outline" name="balance_due" id="balance_due" size="5" style="text-align:left"></span></h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <br>
                                            <!-- <div class="table-responsive">
                                                <table class="invoice-table table table-border mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Transactions</th>
                                                            <th>Notes</th>
                                                            <th>Amount</th>
                                                            <th>Payments</th>
                                                            <th>Balance</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>01 Apr 2022 </td>
                                                            <td>Purchase Bill </td>
                                                            <td>12345678 - due on 26/10/2022 <br> Order - EST-V-22-23/2187</td>
                                                            <td> 28.00 </td>
                                                            <td> </td>
                                                            <td> 28.00 </td>
                                                        </tr>
                                                        <tr>
                                                            <td>01 Apr 2022 </td>
                                                            <td>Opening Balance </td>
                                                            <td>NT-1553 - due on 31/10/2022<br> Order - EST-V-22-23/2187</td>
                                                            <td> 28.00 </td>
                                                            <td> </td>
                                                            <td> 28.00 </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="bottom-tab2">

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <select class="form-select" name="transaction" id="transaction">
                                                <option value="bill">Bill</option>
                                                <option value="purchase_order">Purchase Order</option>
                                                <option value="vendor_credit">Vendor Credit</option>
                                                <option value="payment_made">Payment Made</option>
                                                <option value="expense">Expense</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                    <br>

                                    <div class="table-responsive bill">
                                        <table class="invoice-table table table-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Bill#</th>
                                                    <th>Vendor Name</th>
                                                    <th>Status</th>
                                                    <th>Due Date</th>
                                                    <th class="text-end">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($bill_transaction as $it)
                                                {
                                                    
                                                ?>
                                                <tr>
                                                    <td><?php echo $it->bill_date; ?></td>
                                                    <td><a href="<?php echo base_url('admin/edit_invoice/'.$it->id.''); ?>"><?php echo $it->bill_no; ?></a></td>
                                                    <td><?php echo $it->company_name; ?></td>
                                                    <td><?php echo $it->status; ?></td>
                                                    <td><?php echo $it->due_date; ?></td>
                                                    <td class="text-end">₹<?php echo $it->totalamt; ?></td>
                                                </tr>
                                             <?php } ?>
                                            </tbody>
                                        </table>
                                        
                                    </div>

                                    <div class="table-responsive payment_made">
                                        <table class="invoice-table table table-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Reference#</th>
                                                    <th>Vendor Name</th>
                                                    <th>Payment Mode</th>
                                                    <th class="text-end">Paid Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($payment_transaction as $pt)
                                                {
                                                    
                                                ?>
                                                <tr>
                                                    <td><?php echo $pt->date; ?></td>
                                                    <td><?php echo $pt->reference; ?></td>
                                                    <td><a href="<?php echo base_url('admin/edit_payment_made/'.$pt->id.''); ?>"><?php echo $pt->company_name; ?></a></td>
                                                    <td><?php echo $pt->payment_mode; ?></td>
                                                    <td class="text-end">₹<?php echo $pt->amount_received; ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        
                                    </div>

                                    <div class="table-responsive purchase_order">
                                        <table class="invoice-table table table-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Purchase Order#</th>
                                                    <th>Vendor Name</th>
                                                    <th>Status</th>
                                                    <th class="text-end">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <?php
                                                    foreach ($order_transaction as $ct)
                                                    {
                                                        
                                                    ?>
                                                    <td><?php echo $ct->order_date;?></td>
                                                    <td><a href="<?php echo base_url('admin/edit_purchase_order/'.$ct->id.''); ?>"><?php echo $ct->purchase_order;?></a></td>
                                                    <td><?php echo $ct->company_name;?></td>
                                                    <td><?php echo $ct->status;?></td>
                                                    <td class="text-end">₹<?php echo $ct->totalamt;?></td>
                                                    <?php } ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                        
                                    </div>

                                </div>
                            </div>
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
    <script src="<?php echo base_url();?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/script.js"></script>

    <script type="text/javascript">
        $(function()
        {
            $('.bill').show();
            $('.payment_made').hide();
            $('.purchase_order').hide();

            opening_bal = $('#opening_bal').val();
            bill_amt = $('#bill_amt').val();
            paid_amt = $('#paid_amt').val();

            //alert(opening_bal);
            //alert(invoice_amt);
            //alert(paid_amt);

            balance_due = parseFloat(opening_bal) + parseFloat(bill_amt) - parseFloat(paid_amt);
            //alert(balance_due);
            $('#balance_due').val(balance_due);
        });

        $('#transaction').change(function()
        {
            transaction = $('#transaction').val();

            if(transaction == 'bill')
            {
                $('.bill').show();
                $('.payment_made').hide();
                $('.purchase_order').hide();
            }
            if(transaction == 'payment_made')
            {
                $('.payment_made').show();
                $('.bill').hide();
                $('.purchase_order').hide();
            }
            if(transaction == 'purchase_order')
            {
                $('.purchase_order').show();
                $('.bill').hide();
                $('.payment_made').hide();
            }
            if(transaction == 'vendor_credit')
            {
                $('.purchase_order').hide();
                $('.bill').hide();
                $('.payment_made').hide();
            }
            if(transaction == 'expense')
            {
                $('.purchase_order').hide();
                $('.bill').hide();
                $('.payment_made').hide();
            }
        });
    </script>

    <!-- html2pdf CDN link -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    ></script>

    <script>
        const button = document.getElementById('download-button');

        function generatePDF() {
            // Choose the element that your content will be rendered to.
            const element = document.getElementById('vendor_pdf');
            // Choose the element and save the PDF for your user.
            html2pdf().from(element).save();
        }

        button.addEventListener('click', generatePDF);
    </script>
</body>

</html>