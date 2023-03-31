<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>View Invoice</title>
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

        #invoice_pdf
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
                    <div class="col-xl-9">
                        <div class="text-md-end">
                            <div class="btn-group btn-group-sm d-print-none mb-4"> <a href="javascript:window.print()" class="btn btn-white text-black-50"><i class="fa fa-print"></i> Print</a> <button id="download-button" class="btn btn-white text-black-50 shadow-none"><i class="fa fa-download"></i> Download</button> </div>
                        </div>
                        <div class="card">
                            <div class="card-body" id="invoice_pdf">
                                <div class="invoice-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="invoice-logo"> <img src="<?php echo base_url();?>assets/img/logo.png" alt="logo"> </div>
                                        </div>
                                        <div class="col-md-6">
                                            <p class="invoice-details"> 
                                                <strong style="color:#fff; background: ;padding: 5px;width: 100px;">
                                                    <?php

                                                    $date = date('d-m-Y');
                                                    //echo $date;
                                                    $duedt = $edit_invoice->due_date;
                                                    //echo $duedt;

                                                    if($edit_invoice->due_date < $date)
                                                    {
                                                        //$status = 'Partially paid';
                                                        echo '<span class="badge bg-danger-light">Overdue</span>';
                                                    }
                                                    elseif($edit_invoice->payment == NULL)
                                                    {
                                                        echo '<span class="badge bg-info-light">
                                                            Sent
                                                        </span>';
                                                    }

                                                    elseif($edit_invoice->due_amount == $edit_invoice->payment)
                                                    {
                                                        //$status = 'Paid';
                                                        echo '<span class="badge bg-success-light">
                                                            Paid
                                                        </span>';
                                                    }
                                                    elseif($edit_invoice->due_date < $date)
                                                    {
                                                        //$status = 'Partially paid';
                                                        echo '<span class="badge bg-danger-light">Overdue</span>';
                                                    }
                                                    elseif($edit_invoice->due_amount != $edit_invoice->payment)
                                                    {
                                                        //$status = 'Partially paid';
                                                        echo '<span class="badge bg-warning-light">
                                                            Partially paid
                                                        </span>';
                                                    }
                                                    
                                                    ?>
                                                </strong> </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="invoice-item">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="invoice-info"> <strong class="customer-text"><?php echo $company_details->company_name; ?> </strong>
                                                <p class="invoice-details invoice-details-two ">
                                                <p class="invte"><b>HEAD OFFICE:</b> <?php echo $company_details->addressline1; ?></p><br>
                                                <p class="invte"> <b>BRANCH OFFICE:</b> <?php echo $company_details->addressline2; ?></p><br>
                                                <p class="invte"><b>M:</b> <?php echo $company_details->phone; ?></p>
                                                <p class="invte"><b>GSTN:</b> <?php echo $company_details->gstno; ?></p>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="invoice-info invoice-info2"> <strong class="customer-text">TAX INVOICE</strong>
                                                <p class="invoice-details"> <img src="<?php echo base_url(); ?>qr.jpeg"> </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mt-0">
                                <div class="invoice-item" style="padding-top:10px">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="invoice-info">
                                                <p class="invoice-details invoice-details-two">
                                                <p class="invte1"> <b>Invoice Date: <?php echo $edit_invoice->invoice_date;?></b></p>
                                                <p class="invte1">Order No: <?php echo $edit_invoice->order_no;?></p>
                                                <p class="invte1" style="color: red;">Terms: Net 10</p>
                                                <p class="invte1" style="color: red;">Due Date: <?php echo $edit_invoice->due_date;?></p>
                                                <p class="invte1">Place of Supply : <?php echo $edit_invoice->place_of_supply;?></p>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="invoice-info text-md-end">
                                                <p class="invte"> Buyer Details</p>
                                                <h3 style="color:blue;"><?php echo $customer_address->company_name;?></h3>
                                                <p class="invte"><?php echo $customer_address->billing_attention;?>, <br><?php echo $customer_address->billing_street;?>, <br> <?php echo $customer_address->billing_city;?>, <?php echo $customer_address->billing_state;?>, <?php echo $customer_address->billing_pincode;?> </p>
                                                <p class="invte" style="color:blue;padding-top: 5px;padding-bottom: 10px;">GSTN : <?php echo $customer_address->gst_no;?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mt-0">
                                <div class="invoice-item invoice-table-wrap">
                                    <h5 style="text-align: center; padding:13px 6px 3px 0px">Invoice# <?php echo $edit_invoice->invoice_no;?> </h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="invoice-table table table-border mb-0">
                                                    <tbody>
                                                        <tr style="background:#e1e0e0">
                                                            <th class="pcs-itemtable-header" width="2%">Sr.</th>
                                                            <th class="pcs-itemtable-header" width="30%" style="white-space: nowrap;">Item &amp; Description </th>
                                                            <th class="pcs-itemtable-header" width="8%">HSN/SAC</th>
                                                            <th class="pcs-itemtable-header" width="8%">Quantity</th>
                                                            <th class="pcs-itemtable-header" width="8%">Rate</th>
                                                            <th class="pcs-itemtable-header" width="8%">Disc. (₹) </th>
                                                            <th class="pcs-itemtable-header" width="9%"> Tax Amt </th>
                                                            <th class="pcs-itemtable-header" width="8%">Amount</th>
                                                        </tr>

                                                        <?php 
                                                        for ($i=0; $i < count($edit_invoice_entries); $i++) {
                                                        ?>
                                                        <tr>
                                                            <td class="pcs-item-row">1</td>
                                                            
                                                            <td class="pcs-item-row invte"> <?php echo $edit_invoice_entries[$i]->item; ?> <div class="pcs-item-desc" style="white-space: pre-wrap;word-wrap: break-word;"><?php echo $edit_invoice_entries[$i]->description; ?></div>
                                                            </td>
                                                            
                                                            <td class="pcs-item-row"><?php echo $edit_invoice_entries[$i]->hsn; ?></td>

                                                            <td class="pcs-item-row"><input type="text" class="quantity no-outline" name="quantity" id="quantity" value="<?php echo $edit_invoice_entries[$i]->qty; ?>" size="5"> </td>
                                                            
                                                            <td class="pcs-item-row" style="text-align: right;"><?php echo $edit_invoice_entries[$i]->rate; ?> </td>
                                                            
                                                            <td class="pcs-item-row" style="text-align: right;"><?php echo $edit_invoice_entries[$i]->discount; ?></td>
                                                            
                                                            <td class="pcs-item-row" style="text-align: right;" width="9%"><input type="text" name="tax_amt" id="tax_amt" class="tax_amt no-outline" value="<?php echo $edit_invoice_entries[$i]->taxamt; ?>" size="5"></td>
                                                            
                                                            <td class="pcs-item-row" style="text-align: right;"><input type="text" class="amount no-outline" name="amount" id="amount" value="<?php echo $edit_invoice_entries[$i]->total; ?>" size="8"></td>
                                                        </tr>
                                                        <?php } ?>

                                                        <tr>
                                                            <td class="pcs-item-row"></td>

                                                            <td class="pcs-item-row invte"> 
                                                            </td>
                                                            
                                                            <td class="pcs-item-row">Total</td>
                                                            
                                                            <td class="pcs-item-row" style="text-align: right;"><input type="text" class="total_quantity no-outline" name="total_quantity" id="total_quantity" size="5"> </td>
                                                            
                                                            <td class="pcs-item-row" style="text-align: right;"> </td>
                                                            
                                                            <td class="pcs-item-row" style="text-align: right;"></td>
                                                            
                                                            <td class="pcs-item-row" style="text-align: right;" width="9%"><input type="text" class="total_tax_amt no-outline" name="total_tax_amt" id="total_tax_amt" size="5"></td>
                                                            
                                                            <td class="pcs-item-row" style="text-align: right;"><input type="text" class="total_amount no-outline" name="total_amount" id="total_amount" size="8"></td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="invoice-info">
                                            <div class="invoice-info">
                                                <p>Bank Details:</p>
                                                <p class="invte">Account Name: VIGHNAHARTA E COMP INDUSTRIES </p>
                                                <p class="invte">Bank Name: HDFC BANK </p>
                                                <p class="invte">Account Number: 50200065299328 </p>
                                                <p class="invte">IFSC: HDFC0005383</p>
                                                <h6 style="padding:13px 6px 3px 0px">GOOGLE PAY NUMBER :- 8149003401</h6>
                                                <p class="mb-0">
                                                <p class="invte">Terms & Conditions:</p>
                                                <p class="invte">1.SUBJECT TO PUNE JURISDICATION.</p>
                                                <p class="invte">2.NO WARRANTY ON PHYSICAL DAMAGE & BURN PRODUCT.</p>
                                                <p class="invte">3.WARRANTY CLAIM FROM COMPANY SERVICE CENTER AS PER COMPANY T&C.</p>
                                                <p class="invte">4.INTEREST AT 2% P.A WILL BE CHARGED AFTER DUE DATE</p>
                                                <p class="invte">5.ONE TIME CHEQUE BOUNCING CHARGES RS.500/-PER DAY.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="invoice-total-card">
                                            <div class="invoice-total-box">
                                                <div class="invoice-total-inner">
                                                    <p style="padding: 3px;">Sub Total : <span>₹<input type="text" class="total_amount no-outline" name="subtotal" id="subtotal" size="8"></span></p>
                                                    <!-- <p style="padding: 3px;">SGST @ 9.0% : <span>₹6,660.00</span></p>
                                                    <p style="padding: 3px;">CGST @ 9.0% : <span>₹3,300.00</span></p> -->
                                                    <p style="padding: 3px;">Tax Amt : <span>₹ <input type="text" class="total_tax_amt no-outline" name="subtaxamt" id="subtaxamt" size="8"> </span></p>
                                                    <p style="padding: 3px;">Total : <span>₹ <input type="text" class="total no-outline" name="total" id="total" size="8"> </span></p>
                                                </div>
                                                <div class="invoice-total-footer">
                                                    <h4>Balance Due <span>₹<?php echo $edit_invoice->due_amount;?></span></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="invoice-sign text-end py-5"> <img class="img-fluid d-inline-block" src="<?php echo base_url();?>uploads/company/<?php echo $company_details->sign; ?>" alt="sign"> <span class="d-block">Digital Signature</span> </div>

                                <!-- <hr> <br> <br>
                                <table class="invoice-table table table-center mb-0">
                                    <h3>Payments Received</h3>
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Type</th>
                                            <th class="text-end">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>24-11-2022</td>
                                            <td><a href="p-receipt.html">Payment Received</a></td>
                                            <td class="text-end"> ₹ 1,52,200</td>
                                        </tr>
                                    </tbody>
                                </table> -->
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
            $(document).ready(function() 
            {
                var sum = 0;
                $(".quantity").each(function()
                {
                  sum += +this.value;
                });
                //alert(sum);

                $('.total_quantity').val((sum).toFixed(2));

                /*************************************************/

                var sum1 = 0;
                $(".amount").each(function()
                {
                  sum1 += +this.value;
                });
                //alert(sum1);

                $('.total_amount').val((sum1).toFixed(2));

                /*************************************************/

                var sum2 = 0;
                $(".tax_amt").each(function()
                {
                  sum2 += +this.value;
                });
                //alert(sum1);

                $('.total_tax_amt').val((sum2).toFixed(2));

                /*************************************************/

                subtotal = $('#subtotal').val();
                subtaxamt = $('#subtaxamt').val();

                total = parseFloat(subtotal) + parseFloat(subtaxamt); 

                $('.total').val((total).toFixed(2));

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
                const element = document.getElementById('invoice_pdf');
                // Choose the element and save the PDF for your user.
                html2pdf().from(element).save();
            }

            button.addEventListener('click', generatePDF);
        </script>
</body>

</html>