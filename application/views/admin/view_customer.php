<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>View Customer</title>
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

        #customer_pdf
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
                        <div class="accordion custom-accordion" id="custom-accordion-one" style="border-bottom: ">
                            <div class="card mb-1">
                                <div class="card-header" id="headingNine">
                                    <h5 class="accordion-faq m-0 position-relative">
                                        <a class="custom-accordion-title text-reset d-block collapsed" data-bs-toggle="collapse" href="#collapseNine" aria-expanded="false" aria-controls="collapseNine"> <!-- <?php echo $total_due_amt->invoiceid;?> --> Invoices awaiting Payment  <i class="mdi mdi-chevron-down accordion-arrow"></i> 
                                            <!-- <span style="text-align:right; float: right;">
                                                Total Amount : <?php echo $total_due_amt->payment;?>
                                            </span> -->
                                        </a>
                                    </h5>
                                </div>
                                
                                <div id="collapseNine" class="collapse" aria-labelledby="headingFour" data-bs-parent="#custom-accordion-one" style="">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            
                                            <table class="table table-center table-hover datatable">
                                             <thead class="thead-light">
                                                <tr>
                                                   <th>Date</th>
                                                   <th>Invoice#</th>
                                                   <th>Status</th>
                                                   <th>Amount</th>
                                                   <th>Due Amount</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                <?php
                                                foreach($pending_invoice as $cl)
                                                {
                                                    if($cl->due_amount != $cl->payment)
                                                    {


                                                ?>
                                                <tr>
                                                   <td><?php echo $cl->invoice_date; ?></td>
                                                   <td><?php echo $cl->invoice_no; ?></td>
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
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                         
                        </div>
                        <br>
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
                                                        <option>This Quarter</option>
                                                        <option>This Year</option>
                                                        <option>Yesterday</option>
                                                        <option>Previous Week</option>
                                                        <option>Previous Month</option>
                                                        <option>Previous Quarter</option>
                                                        <option>Previous Year</option>
                                                    </select>
                                                </div>

                                                <div class="col-lg-3">
                                                    <select class="form-select">
                                                        <option>General </option>
                                                        <option> General </option>
                                                        <option> Detailed</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-md-end">
                                                <div class="btn-group btn-group-sm d-print-none mb-4"> 
                                                    <a href="javascript:window.print()" class="btn btn-white text-black-50"><i class="fa fa-print"></i> Print</a>
                                                    <button id="download-button" class="btn btn-white text-black-50 shadow-none"><i class="fa fa-download"></i> Download</button>
                                                    <!-- <a href="" class="btn btn-white text-black-50 shadow-none"><i class="fa fa-envelope"></i> </a> --> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card invoice-info-card">

                                        <div class="card-body" id="customer_pdf">
                                            <div class="invoice-item invoice-item-one">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        
                                                        <div class="invoice-head" style="padding-top: 15px">
                                                            <h2>Customer Statement</h2>
                                                            <p><?php echo $customer_details->name; ?> </p>
                                                            <p>From 01 Apr 2022 To 31 Mar 2023 </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        
                                                        <div class="invoice-info">
                                                            <h6 class="invoice-name"><?php echo $company_details->company_name; ?></h6>
                                                            <p class="invoice-details invte"> <b>HEAD OFFICE:</b> <br><?php echo $company_details->addressline1; ?></p>
                                                            <p class="invoice-details invte" style="padding-top:5px"> <b>BRANCH OFFICE:</b> <br><?php echo $company_details->addressline2; ?></p>
                                                            <p class="invoice-details invte" style="padding-top:5px"> <b>GST :</b> <?php echo $company_details->gstno; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="invoice-item invoice-item-two">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="invoice-info"> <strong class="customer-text-one">Billed to</strong>
                                                            <h6 class="invoice-name"><?php echo $customer_details->name; ?></h6>
                                                            <p class=" invoice-details-two">
                                                            <p class=" invte" style="padding-top:5px"> BRANCH OFFICE :<br><?php echo $customer_details->billing_attention;?>, <br><?php echo $customer_details->billing_street;?>, <br> <?php echo $customer_details->billing_city;?>, <?php echo $customer_details->billing_state;?>, <?php echo $customer_details->billing_pincode;?> </p>
                                                            <p class=" invte" style="padding-top:5px"> GST : <?php echo $customer_details->gst_no;?> </p>
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

                                                                <p style="padding: 3px;">Opening Balance <span ><input type="text" class="no-outline" value="₹" size="1" style="text-align:right"> <input type="text" class="no-outline" name="opening_bal" id="opening_bal" value="<?php echo $customer_details->opening_bal; ?>" size="5" style="text-align:left"></span></p>

                                                                <!-- <p style="padding: 3px;">Invoiced Amount <span><input type="text" class="no-outline" value="₹" size="1" style="text-align:right"> <input type="text" class="no-outline" name="invoice_amt" id="invoice_amt" value="<?php echo $invoice_amt->totalamt; ?>" size="5" style="text-align:left"></span></p>

                                                                <p style="padding: 3px;">Amount Paid <span><input type="text" class="no-outline" value="₹" size="1" style="text-align:right"> <input type="text" class="no-outline" name="paid_amt" id="paid_amt" value="<?php echo $paid_amt->amount_received; ?>" size="5" style="text-align:left"></span></p> -->

                                                                <p style="padding: 3px;">Invoiced Amount <span><input type="text" class="no-outline" value="₹" size="1" style="text-align:right"> <input type="text" class="no-outline" name="invoice_amt" id="invoice_amt" value="<?php if(!empty($invoice_amt->totalamt)){echo $invoice_amt->totalamt;}else{echo '0';} ?>" size="5" style="text-align:left"></span></p>

                                                                <p style="padding: 3px;">Amount Paid <span>₹ <input type="text" class="no-outline" name="paid_amt" id="paid_amt" value="<?php if(!empty($paid_amt->amount_received)){echo $paid_amt->amount_received;}else{echo '0';} ?>" size="5" style="text-align:left"></span></p>
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
                                                            <th class="text-end">Balance</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>01 Apr 2022 </td>
                                                            <td>Opening Balance </td>
                                                            <td class="invte">NT-1553 - due on 31/10/2022<br> Order - EST-V-22-23/2187</td>
                                                            <td> 28.00 </td>
                                                            <td> </td>
                                                            <td class="text-end"> 28.00 </td>
                                                        </tr>
                                                        <tr>
                                                            <td>01 Apr 2022 </td>
                                                            <td>Opening Balance </td>
                                                            <td class="invte">NT-1553 - due on 31/10/2022<br> Order - EST-V-22-23/2187</td>
                                                            <td> 28.00 </td>
                                                            <td> </td>
                                                            <td class="text-end"> 28.00 </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td class="text-end">Balance Due ₹ 0.00</td>
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
                                                <option value="invoice">Invoice</option>
                                                <option value="retail_invoice">Retail Invoice</option>
                                                <option value="credit_note">Credit Note</option>
                                                <option value="payment_received">Payment Received</option>
                                                <option value="estimate">Estimate</option>
                                                <option value="delivery_challan">Delivery Challan</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                    <br>
                                    
                                    <div class="table-responsive invoice">
                                        <table class="invoice-table table table-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Invoice#</th>
                                                    <th>Status</th>
                                                    <th>Amount</th>
                                                    <th class="text-end">Due Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($invoice_transaction as $it)
                                                {
                                                    
                                                ?>
                                                <tr>
                                                    <td><?php echo $it->invoice_date; ?></td>
                                                    <td><a href="<?php echo base_url('admin/edit_invoice/'.$it->id.''); ?>"><?php echo $it->invoice_no; ?></a></td>
                                                    <td><?php echo $it->status; ?></td>
                                                    <td>₹<?php echo $it->totalamt; ?></td>
                                                    <td class="text-end">₹<?php echo $it->due_amount; ?></td>
                                                </tr>
                                             <?php } ?>
                                            </tbody>
                                        </table>
                                        
                                    </div>

                                    <div class="table-responsive payment_received">
                                        <table class="invoice-table table table-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Reference#</th>
                                                    <th>Customer Name</th>
                                                    <th>Mode</th>
                                                    <th class="text-end">Received Amount</th>
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
                                                    <td><a href="<?php echo base_url('admin/edit_payment_received/'.$pt->id.''); ?>"><?php echo $pt->name; ?></a></td>
                                                    <td><?php echo $pt->payment_mode; ?></td>
                                                    <td class="text-end">₹<?php echo $pt->amount_received; ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        
                                    </div>

                                    <div class="table-responsive delivery_challan">
                                        <table class="invoice-table table table-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Challan#</th>
                                                    <th>Status</th>
                                                    <th class="text-end">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <?php
                                                    foreach ($challan_transaction as $ct)
                                                    {
                                                        
                                                    ?>
                                                    <td><?php echo $ct->challan_date;?></td>
                                                    <td><a href="<?php echo base_url('admin/edit_delivery_challan/'.$ct->id.''); ?>"><?php echo $ct->challan_no;?></a></td>
                                                    <td><?php echo $ct->status;?></td>
                                                    <td class="text-end">₹<?php echo $ct->totalamt;?></td>
                                                    <?php } ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- <div class="row">
                                            <div class="col-sm-12 col-md-9">
                                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 10 of 10 entries</div>
                                            </div>
                                            <div class="col-sm-12 col-md-3 ">
                                                <div class="dataTables_paginate paging_simple_numbers text-end" id="DataTables_Table_0_paginate">
                                                    <ul class="pagination">
                                                        <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                                        <li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                                        <li class="paginate_button page-item next disabled" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div> -->
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
            $('.invoice').show();
            $('.payment_received').hide();
            $('.delivery_challan').hide();

            opening_bal = $('#opening_bal').val();
            invoice_amt = $('#invoice_amt').val();
            paid_amt = $('#paid_amt').val();

            //alert(opening_bal);
            //alert(invoice_amt);
            //alert(paid_amt);

            balance_due = parseFloat(opening_bal) + parseFloat(invoice_amt) - parseFloat(paid_amt);
            //alert(balance_due);
            $('#balance_due').val(balance_due);
        });

        $('#transaction').change(function()
        {
            transaction = $('#transaction').val();

            if(transaction == 'invoice')
            {
                $('.invoice').show();
                $('.payment_received').hide();
                $('.delivery_challan').hide();
            }
            if(transaction == 'payment_received')
            {
                $('.payment_received').show();
                $('.invoice').hide();
                $('.delivery_challan').hide();
            }
            if(transaction == 'delivery_challan')
            {
                $('.delivery_challan').show();
                $('.invoice').hide();
                $('.payment_received').hide();
            }

            if(transaction == 'retail_invoice')
            {
                $('.delivery_challan').hide();
                $('.invoice').hide();
                $('.payment_received').hide();
            }

            if(transaction == 'estimate')
            {
                $('.delivery_challan').hide();
                $('.invoice').hide();
                $('.payment_received').hide();
            }

            if(transaction == 'credit_note')
            {
                $('.delivery_challan').hide();
                $('.invoice').hide();
                $('.payment_received').hide();
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
            const element = document.getElementById('customer_pdf');
            // Choose the element and save the PDF for your user.
            html2pdf().from(element).save();
        }

        button.addEventListener('click', generatePDF);
    </script>
</body>

</html>