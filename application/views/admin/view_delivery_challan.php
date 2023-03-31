<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>View Delivery Challan</title>
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">

    <style type="text/css">
        #delivery_challan_pdf
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
                            <!-- <div class="btn-group btn-group-sm d-print-none mb-4">
                                <a href="#" class="btn btn-white text-black-50"><i class="fa fa-edit"></i> </a>
                                <a href="#" class="btn btn-white text-black-50"><i class="fa fa-copy"></i> </a>
                                <a href="#" class="btn btn-white text-black-50"><i class="fa fa-link"></i> </a>
                                <a href="javascript:window.print()" class="btn btn-white text-black-50"><i class="fa fa-envelope"></i> </a>
                                <a href="#" class="btn btn-white text-black-50"><i class="fa fa-trash"></i> </a>
                                <a href="" class="btn btn-white text-black-50"><i class="fa fa-print"></i></a>
                                <button id="download-button" class="btn btn-white text-black-50 shadow-none"><i class="fa fa-download"></i> </button>
                                <a href="#" class="btn btn-white text-black-50 shadow-none">E-way Bill </a>
                                <a href="#" class="btn btn-danger shadow-none"> Convert To Invoice</a>
                                <div class="modal custom-modal fade bank-details" id="add_items" role="dialog">
                                    <div class="modal-dialog   modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="form-header text-start mb-0">
                                                    <h6 class="mb-0">Add Payment </h6>
                                                </div> <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="bank-inner-details">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-lg-4"><label>Customer Name</label></div>
                                                                    <div class="col-lg-8" style="text-align: left; font-size: 14px;"> <span>ECO LOGIC TECH SOLUTIONS</span> </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4"><label>Amount </label></div>
                                                                        <div class="col-lg-8"> <input type="text" class="form-control" placeholder="₹ 0000.00"> <label ng-if="salesPayment.totalAmount > 0" style="float: left; padding-top: 5px" class="checkbox   cursor-pointer"> <input type="checkbox" ng-model="salesPayment.toggle" class="ember-view ember-checkbox ng-valid ng-dirty ng-valid-parse ng-touched ng-empty" style=""> Pay full amount (₹ &nbsp;10,207.00) </label> </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4"><label>Bank Charges </label></div>
                                                                        <div class="col-lg-8"> <input type="text" class="form-control" placeholder=" "> </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4"><label>Reference# </label></div>
                                                                        <div class="col-lg-8"> <input type="text" class="form-control" placeholder=" "> </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="row">
                                                                        <div class="col-lg-4"><label style="color: red;">Deposit To</label></div>
                                                                        <div class="col-lg-8" style="text-align: left; font-size: 14px;"> <select class="form-control  ">
                                                                                <optgroup label="Bank">
                                                                                    <option label="patty cash pune" value="object:2865" selected="selected">Patty cash pune</option>
                                                                                    <option label="BANK OF BARODA" value="object:2866">BANK OF BARODA</option>
                                                                                    <option label="TJSB" value="object:2867">TJSB</option>
                                                                                    <option label="SWAPNIL SUNIL AGRAWAL KOTAK" value="object:2868">SWAPNIL SUNIL AGRAWAL KOTAK</option>
                                                                                    <option label="THE SEVA VIKAS CO-OP BANK LTD" value="object:2869">THE SEVA VIKAS CO-OP BANK LTD</option>
                                                                                    <option label="CASH - PTM" value="object:2870">CASH - PTM</option>
                                                                                    <option label="HDFC - 9328" value="object:2871">HDFC - 9328</option>
                                                                                    <option label="JYOTI MAM" value="object:2872">JYOTI MAM</option>
                                                                                    <option label="YES BANK CREDIT CARD - 162177" value="object:2873">YES BANK CREDIT CARD - 162177</option>
                                                                                    <option label="SWAPNIL SIR - HDFC" value="object:2874">SWAPNIL SIR - HDFC</option>
                                                                                </optgroup>
                                                                                <optgroup label="Cash">
                                                                                    <option label="Undeposited Funds" value="object:2875">Undeposited Funds</option>
                                                                                    <option label="Petty Cash" value="object:2876">Petty Cash</option>
                                                                                </optgroup>
                                                                                <optgroup label="Expense">
                                                                                    <option label="Bad Debt" value="object:2877">Bad Debt</option>
                                                                                </optgroup>
                                                                                <optgroup label="Income">
                                                                                    <option label="Discount" value="object:2878">Discount</option>
                                                                                </optgroup>
                                                                            </select> </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4"><label>Payment Mode </label></div>
                                                                        <div class="col-lg-8"> <select name="paymentMode" ng-model="salesPayment.payment_mode" class="form-control ng-pristine ng-not-empty ng-valid ng-valid-required ng-touched" ng-options="paymentMode as paymentMode.name for paymentMode in paymentModes" required="" style="">
                                                                                <option label="Cash" value="object:2883">Cash</option>
                                                                                <option label="Cheque" value="object:2882" selected="selected">Cheque</option>
                                                                                <option label="Credit Card" value="object:2884">Credit Card</option>
                                                                                <option label="Bank Transfer" value="object:2885">Bank Transfer</option>
                                                                                <option label="Others" value="object:2886">Others</option>
                                                                                <option label="Online" value="object:2887">Online</option>
                                                                            </select> </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4"><label>Cheque No </label></div>
                                                                        <div class="col-lg-8"> <input type="text" class="form-control" placeholder=" "> </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4"><label>Cheque Date </label></div>
                                                                        <div class="col-lg-8"> <input class="form-control datetimepicker" type="text" placeholder="15/02/2022"> </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4"><label style="color:red;">Payment Date </label></div>
                                                                        <div class="col-lg-8"> <input class="form-control datetimepicker" type="text" placeholder="15/02/2022"> </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <table class="table" style="margin-top:20px">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="col-md-2">Date</th>
                                                                            <th class="col-md-2">Invoice Number</th>
                                                                            <th class="text-right col-md-3" ng-class="salesPayment.isTaxDeducted ? 'col-md-2': 'col-md-3'">Invoice Amount</th>
                                                                            <th class="text-right col-md-3" ng-class="salesPayment.isTaxDeducted ? 'col-md-2': 'col-md-3'">Due Amount</th>
                                                                            
                                                                            <th class="text-right col-md-2">Payment</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr ng-repeat="invoice in invoiceDetail track by $index">
                                                                            <td class="col-md-2">29 Oct 2022</td>
                                                                            <td class="col-md-2">AGS-V/22-23/3085</td>
                                                                            <td class="text-right col-md-3" ng-class="salesPayment.isTaxDeducted ? 'col-md-2': 'col-md-3'">10207</td>
                                                                            <td class="text-right col-md-3" ng-class="salesPayment.isTaxDeducted ? 'col-md-2': 'col-md-3'">10207</td>
                                                                            
                                                                            <td class="text-right col-md-2"> <span ng-init="invoice.payment=0.00">0</span> </td>
                                                                        </tr>
                                                                        
                                                                        <tr ng-if="invoiceDetail.length>0">
                                                                            <td class="col-md-2" style="padding-top:0"> </td>
                                                                            <td class="col-md-2" style="padding-top:0"> </td>
                                                                            <td ng-class="salesPayment.isTaxDeducted ? 'col-md-2': 'col-md-3'" style="padding-top:0" class="col-md-3"> </td>
                                                                            <td class="text-right col-md-3" ng-class="salesPayment.isTaxDeducted ? 'col-md-2': 'col-md-3'" style="padding-top:0"> Total</td>
                                                                            
                                                                            <td class="col-md-2 text-right">0.00</td>
                                                                        </tr>
                                                                        
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="col-lg-6"></div>
                                                            <div class="col-lg-6">
                                                                <div class="dashed-border alert alert-warning  clearfix">
                                                                    <div class="row"> <span class="col-md-8 text-right">Amount Received :</span>
                                                                        <p class="col-md-4 text-right">0.00</p>
                                                                    </div>
                                                                    <div class="row"> <span class="col-md-8 text-right">Amount used for payments :</span> <span class="col-md-4 text-right">0.00</span> </div>
                                                                    <div class="row"> <span class="col-md-8 text-right">Amount in excess :</span> <span class="col-md-4 text-right">₹&nbsp;0.00</span> </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <div class="col-md-8"> <button type="button" class="btn btn-default" style="overflow: hidden; transform: translateZ(0px);"> <i class="zyr icon-attachment"></i> <input type="file" name="files" ng-model="salesPayment.inputFiles" class="custom-file-input ng-pristine ng-untouched ng-valid ng-empty" multiple="multiple" accept="image/gif,image/jpeg,image/png,image/bmp,application/pdf,application/doc, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document, .csv" maxsize="5000" maxnum="5" base-sixty-four-input=""> </button>
                                                                    <div>
                                                                        <div>
                                                                            <div> <small class="text-muted">You can upload a maximum of 5 files, 5MB in-total</small> </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none;" class="cGcvT"></grammarly-extension>
                                                            <grammarly-extension data-grammarly-shadow-root="true" style="mix-blend-mode: darken; position: absolute; top: 0px; left: 0px; pointer-events: none;" class="cGcvT"></grammarly-extension>
                                                            <div class="form-group">
                                                                <p> Notes </p>
                                                                <div> <textarea name="notes" rows="2" class="form-control ng-pristine ng-valid ng-empty ng-touched" ng-model="salesPayment.notes" spellcheck="false" style="">                            </textarea> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="bank-details-btn"> <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn bank-cancel-btn me-2">Cancel</a> <a href="javascript:void(0);" class="btn bank-save-btn">Save Item</a> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="card">
                                <div class="card-body" id="delivery_challan_pdf">
                                    <div class="invoice-item">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="invoice-logo"> <img src="<?php echo base_url();?>assets/img/logo.png" alt="logo"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="invoice-details"> <strong style="color:#fff; background: green;padding: 5px;width: 100px;"> <?php echo $edit_delivery_challan->status;?> </strong> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="invoice-item">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="invoice-info"> <strong class="customer-text"><?php echo $company_details->company_name; ?> </strong>
                                                    <p class="invoice-details invoice-details-two ">
                                                    <p class="invte"><b>HEAD OFFICE:</b> <?php echo $company_details->addressline1; ?> </p><br>
                                                    <p class="invte"> <b>BRANCH OFFICE:</b> <?php echo $company_details->addressline2; ?> </p>
                                                    <br>
                                                    <p class="invte"><b>M:</b> <?php echo $company_details->phone; ?></p>
                                                    <p class="invte"><b>GSTN:</b> <?php echo $company_details->gstno; ?></p>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="invoice-info invoice-info2"> <strong class="customer-text">Delivery Challan </strong> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-0">
                                    <div class="invoice-item" style="padding-top:10px">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="invoice-info">
                                                    <p class="invoice-details invoice-details-two">
                                                    <p class="invte1"> <b>Challan Date: <?php echo $edit_delivery_challan->challan_date; ?></b></p>
                                                    <p class="invte1">Challan Type : <?php echo $edit_delivery_challan->challan_type; ?></p>
                                                    <p class="invte1">Place of Supply : <?php echo $edit_delivery_challan->place_of_supply; ?></p>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="invoice-info text-md-end">
                                                    <p class="invte"> Buyer Details</p>
                                                    <h3 style="color:blue;"><?php echo $customer_address->company_name;?></h3>
                                                    <p class="invte"><?php echo $customer_address->billing_attention;?>, <br><?php echo $customer_address->billing_street;?>, <br> <?php echo $customer_address->billing_city;?>, <?php echo $customer_address->billing_state;?>, <?php echo $customer_address->billing_pincode;?></p>
                                                    <p class="invte" style="color:blue;padding-top: 5px;padding-bottom: 10px;">GSTN : <?php echo $customer_address->gst_no;?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-0">
                                    <div class="invoice-item invoice-table-wrap">
                                        <h5 style="text-align: center; padding:13px 6px 3px 0px">Delivery Challan# <?php echo $edit_delivery_challan->challan_no;?> </h5>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="invoice-table table table-border mb-0">
                                                        <tbody>
                                                            <tr style="background:#e1e0e0">
                                                                <th class="pcs-itemtable-header" width="2%">Sr.</th>
                                                                <th class="pcs-itemtable-header" width="30%" style="white-space: nowrap;">Item &amp; Description </th>
                                                                <th class="pcs-itemtable-header" width="8%" style="text-align: right;">Quantity</th>
                                                            </tr>
                                                            <?php

                                                            for ($i=0; $i < count($edit_delivery_challan_entries); $i++) {
                                                            ?>

                                                            <tr>
                                                                <td class="pcs-item-row">1</td>
                                                                <td class="pcs-item-row invte"> <?php echo $edit_delivery_challan_entries[$i]->item; ?><div class="pcs-item-desc" style="white-space: pre-wrap;word-wrap: break-word;"><?php echo $edit_delivery_challan_entries[$i]->description; ?></div>
                                                                </td>
                                                                <td class="pcs-item-row total-row" style="text-align: right; border-top: 1px solid #191919; font-weight: bold;"><?php echo $edit_delivery_challan_entries[$i]->qty; ?> <br>Nos</td>
                                                            </tr>
                                                            <?php } ?>
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
                                            <div class="  text-end  ">
                                                <p>For, <?php echo $company_details->company_name; ?> </p> <img class="img-fluid d-inline-block" src="<?php echo base_url();?>uploads/company/<?php echo $company_details->sign; ?>" alt="sign"> <span class="d-block">Authorized Signature </span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
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
                    const element = document.getElementById('delivery_challan_pdf');
                    // Choose the element and save the PDF for your user.
                    html2pdf().from(element).save();
                }

                button.addEventListener('click', generatePDF);
            </script>
</body>

</html>