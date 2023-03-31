<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Add Bill</title>
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/icons/feather/feather.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    <link href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
</head>

<body>
    <div class="main-wrapper">
        <?php echo include('header.php'); ?>

        <?php echo include('sidebar.php'); ?>
        
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header invoices-page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3>Add Bill</h3>
                        </div>
                        <div class="col-auto"> </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card invoices-add-card">
                            <div class="card-body">
                                <form class="invoices-form" method="post" id="bill_form" action="<?php echo base_url('admin/save_bill');?>" enctype="multipart/form-data" autocomplete="off">
                                    <div class="invoices-main-form">
                                        <div class="row">
                                            <div class="col-xl-2 col-md-6 col-sm-12 col-12">
                                                <div class="form-group"> 
                                                    <label style="color:#f00">Vendor Name</label>
                                                    <div>
                                                        <select class="js-example-basic-single select2 " name="vendor_name" id="vendor_name">
                                                            <option value="">Select Vendor </option>
                                                             <?php
                                                             foreach ($vendor_name as $cn)
                                                             {
                                                             
                                                             ?>
                                                             <option value="<?php echo $cn->id; ?>"><?php echo $cn->company_name; ?></option>
                                                             
                                                             <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <div class=" "> 
                                                        <span>
                                                            <label style="color:#f00"> Bill Date</label>
                                                            <input class="form-control datetimepicker" type="text" name="bill_date" id="bill_date" placeholder="15/02/2022">
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <div class=" ">
                                                        <span>
                                                            <label style="color:#f00">Due Date</label>
                                                            <input class="form-control datetimepicker" type="text" name="due_date" id="due_date" placeholder="15/02/2022">
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-xl-2 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label style="color:#f00">Bill #</label>
                                                    <input type="text" class="form-control" name="bill_no" id="bill_no">
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label style="color:#f00">Sourcee of Supply</label>
                                                    <select class="form-control" name="source_of_supply" id="source_of_supply">
                                                        <option value="">State/Province</option>
                                                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                        <option value="Andhra Pradesh (Before Division)">Andhra Pradesh (Before Division)</option>
                                                        <option value="Andhra Pradesh (New)">Andhra Pradesh (New)</option>
                                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                        <option value="Assam">Assam</option>
                                                        <option value="Bihar">Bihar</option>
                                                        <option value="Chandigarh">Chandigarh</option>
                                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                                        <option value="Dadra And Nagar Haveli And Daman And Diu">Dadra And Nagar Haveli And Daman And Diu</option>
                                                        <option value="Daman and Diu">Daman and Diu</option>
                                                        <option value="Delhi">Delhi</option>
                                                        <option value="Goa">Goa</option>
                                                        <option value="Gujarat">Gujarat</option>
                                                        <option value="Haryana">Haryana</option>
                                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                        <option value="Jharkhand">Jharkhand</option>
                                                        <option value="Karnataka">Karnataka</option>
                                                        <option value="Kerala">Kerala</option>
                                                        <option value="Ladakh">Ladakh</option>
                                                        <option value="Lakshadweep">Lakshadweep</option>
                                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                        <option value="Maharashtra">Maharashtra</option>
                                                        <option value="Manipur">Manipur</option>
                                                        <option value="Meghalaya">Meghalaya</option>
                                                        <option value="Mizoram">Mizoram</option>
                                                        <option value="Nagaland">Nagaland</option>
                                                        <option value="Odisha">Odisha</option>
                                                        <option value="Other Territory">Other Territory</option>
                                                        <option value="Puducherry">Puducherry</option>
                                                        <option value="Punjab">Punjab</option>
                                                        <option value="Rajasthan">Rajasthan</option>
                                                        <option value="Sikkim">Sikkim</option>
                                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                                        <option value="Telangana">Telangana</option>
                                                        <option value="Tripura">Tripura</option>
                                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                        <option value="Uttarakhand">Uttarakhand</option>
                                                        <option value="West Bengal">West Bengal</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label style="color:#f00">Destination of Supply </label>
                                                    <select class="form-control" name="destination_of_supply" id="destination_of_supply">
                                                        <option value="">State/Province</option>
                                                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                        <option value="Andhra Pradesh (Before Division)">Andhra Pradesh (Before Division)</option>
                                                        <option value="Andhra Pradesh (New)">Andhra Pradesh (New)</option>
                                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                        <option value="Assam">Assam</option>
                                                        <option value="Bihar">Bihar</option>
                                                        <option value="Chandigarh">Chandigarh</option>
                                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                                        <option value="Dadra And Nagar Haveli And Daman And Diu">Dadra And Nagar Haveli And Daman And Diu</option>
                                                        <option value="Daman and Diu">Daman and Diu</option>
                                                        <option value="Delhi">Delhi</option>
                                                        <option value="Goa">Goa</option>
                                                        <option value="Gujarat">Gujarat</option>
                                                        <option value="Haryana">Haryana</option>
                                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                        <option value="Jharkhand">Jharkhand</option>
                                                        <option value="Karnataka">Karnataka</option>
                                                        <option value="Kerala">Kerala</option>
                                                        <option value="Ladakh">Ladakh</option>
                                                        <option value="Lakshadweep">Lakshadweep</option>
                                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                        <option value="Maharashtra">Maharashtra</option>
                                                        <option value="Manipur">Manipur</option>
                                                        <option value="Meghalaya">Meghalaya</option>
                                                        <option value="Mizoram">Mizoram</option>
                                                        <option value="Nagaland">Nagaland</option>
                                                        <option value="Odisha">Odisha</option>
                                                        <option value="Other Territory">Other Territory</option>
                                                        <option value="Puducherry">Puducherry</option>
                                                        <option value="Punjab">Punjab</option>
                                                        <option value="Rajasthan">Rajasthan</option>
                                                        <option value="Sikkim">Sikkim</option>
                                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                                        <option value="Telangana">Telangana</option>
                                                        <option value="Tripura">Tripura</option>
                                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                        <option value="Uttarakhand">Uttarakhand</option>
                                                        <option value="West Bengal">West Bengal</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label style="color:#f00">Order #</label>
                                                    <input type="text" class="form-control" name="order_no" id="order_no">
                                                </div>
                                            </div>
                                            <div class="col-lg-2 ">
                                                <div class="form-group">
                                                    <label>Item Rates Are </label>
                                                    <select class="form-control" name="item_rate" id="item_rate">
                                                        <option value="tax_exclusive">Tax Exclusive</option>
                                                        <option value="tax_inclusive">Tax Inclusive </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="rowbb">
                                                <div class="invoice-add-table">
                                                    <div class="table-responsive">
                                                        <table class="table table-center add-table-items">
                                                            <thead>
                                                                <tr>
                                                                    <th width="180px">Items</th>
                                                                    <th width="200px">Descriptions </th>
                                                                    <th>Godown</th>
                                                                    <th>Qty</th>
                                                                    <th>Rate</th>
                                                                    <th>Account</th>
                                                                    <th>Disc(%)</th>
                                                                    <th>Tax Rate</th>
                                                                    <th>Tax Amt</th>
                                                                    <th>Total</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <input type="hidden" name="iid[]" class="iid" value="0">
                                                                <tr class="add-row">
                                                                    <td><input type="text" class="form-control" name="item_0" id="item_0" onkeyup="getitemsdetails('item_0','description_0','godown_0','qty_0','rate_0','account_0','discount_0','taxrate_0');" autocomplete="off"> </td>

                                                                    <td><textarea class="form-control" name="description_0" id="description_0" placeholder=" "></textarea></td>

                                                                    <td><input type="text" class="form-control" name="godown_0" id="godown_0"></td>
                                                                    
                                                                    <td><input type="text" class="form-control" name="qty_0" id="qty_0" onkeyup="qty('qty_0')"> </td>
                                                                    
                                                                    <td><input type="text" class="form-control" name="rate_0" id="rate_0" onkeyup="rate('rate_0')"></td>

                                                                    <td><input type="text" class="form-control" name="account_0" id="account_0"></td>
                                                                    
                                                                    <td><input type="text" class="form-control" name="discount_0" id="discount_0" onkeyup="discountamt('discount_0')"></td>

                                                                    <td><input type="text" class="form-control" name="taxrate_0" id="taxrate_0"></td>

                                                                    <td><input type="text" class="form-control taxamt" name="taxamt_0" id="taxamt_0"></td>

                                                                    <td><input type="text" class="form-control totalamt" name="total_0" id="total_0"></td>

                                                                    <td class="add-remove text-end"> <a href="javascript:void(0);" class="add-btn me-2"><i class="fas fa-plus-circle"></i></a> <a href="javascript:void(0);" class="remove-btn"><i class="fe fe-trash-2"></i></a></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-7 col-md-6">
                                                        <!-- <div class="form-group float-end mb-0"> <button class="btn btn-primary" type="submit">Add Item</button> </div> -->
                                                        <div class="invoice-fields">
                                                            <h4 class="field-title">T&C Note..</h4> <br> <textarea class="form-control" name="note"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5 col-md-6">
                                                        <div class="invoice-total-card">
                                                            <h4 class="invoice-total-title">Summary</h4>
                                                            <div class="invoice-total-box">
                                                                <div class="invoice-total-inner">

                                                                    <div class="row">
                                                                        <div class="col-lg-6"><p>Sub Total </p></div>
                                                                        <div class="col-lg-6 ">
                                                                            <input type="text" class="subtotal billamt utrt1" name="subtotal" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-lg-6"><p>Tax Amt</p></div>
                                                                        <div class="col-lg-6 ">
                                                                            <input type="text" class="totaltaxamt billamt utrt1" name="total_taxamt" id="total_taxamt" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-lg-6"><p>Adjustments</p></div>
                                                                        <div class="col-lg-6 ">
                                                                            <input class="billamt utrt1" type="text" name="adjustment" id="adjustment" onkeyup="getbillamt();" >
                                                                        </div>
                                                                    </div>

                                                                    <div class="invoice-total-footer">
                                                                        <h4>Total Amount <input class="finalamt utrt1" type="text" name="totalamt" readonly></h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="upload-sign">
                                                                <div class="form-group float-end mb-0"> <a href="<?php echo base_url('admin/bill_list'); ?>" class="btn btn-primary">Cancel</a> </div>
                                                                <div class="form-group float-end mb-0"> <button class="btn btn-primary" type="submit" id="btn_submit" name="btn_submit">Save</button> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row col-sm-6 p-5">
                                                <div class="success_message row"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal custom-modal fade invoices-preview" id="invoices_preview" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card invoice-info-card">
                                    <div class="card-body pb-0">
                                        <div class="invoice-item invoice-item-one">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="invoice-logo"> <img src="<?php echo base_url();?>assets/img/logo.png" alt="logo"> </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="invoice-info">
                                                        <div class="invoice-head">
                                                            <h2 class="text-primary">Invoice</h2>
                                                            <p>Invoice Number : In983248782</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invoice-item invoice-item-bg">
                                            <div class="invoice-circle-img"> <img src="<?php echo base_url();?>assets/img/invoice-circle1.png" alt="" class="invoice-circle1"> <img src="<?php echo base_url();?>assets/img/invoice-circle2.png" alt="" class="invoice-circle2"> </div>
                                            <div class="row">
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="invoice-info"> <strong class="customer-text-one">Billed to</strong>
                                                        <h6 class="invoice-name">Customer Name</h6>
                                                        <p class="invoice-details invoice-details-two"> 9087484288 <br> Address line 1, <br> Address line 2 <br> Zip code ,City - Country </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="invoice-info"> <strong class="customer-text-one">Invoice From</strong>
                                                        <h6 class="invoice-name">Company Name</h6>
                                                        <p class="invoice-details invoice-details-two"> 9087484288 <br> Address line 1, <br> Address line 2 <br> Zip code ,City - Country </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="invoice-info invoice-info-one border-0">
                                                        <p>Issue Date : 27 Jul 2022</p>
                                                        <p>Due Date : 27 Aug 2022</p>
                                                        <p>Due Amount : $1,54,22 </p>
                                                        <p>Recurring Invoice : 15 Months</p>
                                                        <p class="mb-0">PO Number : 54515454</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invoice-item invoice-table-wrap">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="invoice-table table table-center mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>Description</th>
                                                                    <th>Category</th>
                                                                    <th>Rate/Item</th>
                                                                    <th>Quantity</th>
                                                                    <th>Discount (%)</th>
                                                                    <th class="text-end">Amount</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Dell Laptop</td>
                                                                    <td>Laptop</td>
                                                                    <td>$1,110</td>
                                                                    <th>2</th>
                                                                    <th>2%</th>
                                                                    <td class="text-end">$400</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>HP Laptop</td>
                                                                    <td>Laptop</td>
                                                                    <td>$1,500</td>
                                                                    <th>3</th>
                                                                    <th>6%</th>
                                                                    <td class="text-end">$3,000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Apple Ipad</td>
                                                                    <td>Ipad</td>
                                                                    <td>$11,500</td>
                                                                    <th>1</th>
                                                                    <th>10%</th>
                                                                    <td class="text-end">$11,000</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="invoice-payment-box">
                                                    <h4>Payment Details</h4>
                                                    <div class="payment-details">
                                                        <p>Debit Card XXXXXXXXXXXX-2541 HDFC Bank</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="invoice-total-card">
                                                    <div class="invoice-total-box">
                                                        <div class="invoice-total-inner">
                                                            <p>Taxable <span>$6,660.00</span></p>
                                                            <p>Additional Charges <span>$6,660.00</span></p>
                                                            <p>Discount <span>$3,300.00</span></p>
                                                            <p class="mb-0">Sub total <span>$3,300.00</span></p>
                                                        </div>
                                                        <div class="invoice-total-footer">
                                                            <h4>Total Amount <span>$143,300.00</span></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invoice-sign-box">
                                            <div class="row">
                                                <div class="col-lg-8 col-md-8">
                                                    <div class="invoice-terms">
                                                        <h6>Notes:</h6>
                                                        <p class="mb-0">Enter customer notes or any other details</p>
                                                    </div>
                                                    <div class="invoice-terms mb-0">
                                                        <h6>Terms and Conditions:</h6>
                                                        <p class="mb-0">Enter customer notes or any other details</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="invoice-sign text-end"> <img class="img-fluid d-inline-block" src="<?php echo base_url();?>assets/img/signature.png" alt="sign"> <span class="d-block">Harristemp</span> </div>
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
        <div class="modal custom-modal fade bank-details" id="bank_details" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="form-header text-start mb-0">
                            <h4 class="mb-0">Add Bank Details</h4>
                        </div> <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    </div>
                    <div class="modal-body">
                        <div class="bank-inner-details">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group"> <label>Account Holder Name</label> <input type="text" class="form-control" placeholder="Add Name"> </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group"> <label>Bank name</label> <input type="text" class="form-control" placeholder="Add Bank name"> </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group"> <label>IFSC Code</label> <input type="text" class="form-control"> </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group"> <label>Account Number</label> <input type="text" class="form-control"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="bank-details-btn"> <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn bank-cancel-btn me-2">Cancel</a> <a href="javascript:void(0);" class="btn bank-save-btn">Save Item</a> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal custom-modal fade" id="delete_invoices_details" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete Invoice Details</h3>
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6"> <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary paid-continue-btn">Delete</a> </div>
                                <div class="col-6"> <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary paid-cancel-btn">Cancel</a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal custom-modal fade" id="save_invocies_details" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Save Invoice Details</h3>
                            <p>Are you sure want to save?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6"> <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary paid-continue-btn">Save</a> </div>
                                <div class="col-6"> <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary paid-cancel-btn">Cancel</a> </div>
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
    <script src="<?php echo base_url();?>assets/plugins/select2/js/custom-select.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/script.js"></script>
    
    <script src="https://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>

    <script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>

    <script type="text/javascript">
        $(".add-table-items").on('click','.remove-btn',function()
        {
            $(this).closest('.add-row').remove();

            subtotal();

            getbillamt();

            return false;
        });
        
        var i = 1;
        $(document).on("click",".add-btn",function(){
            var experiencecontent='<tr class="add-row">'+
            '<input type="hidden" name="iid[]" class="iid" value="'+i+'">'+
        '<td>'+
        '<input type="text" name="item_'+i+'" id="item_'+i+'" class="form-control" onkeyup="getitemsdetails(\'item_'+i+'\',\'description_'+i+'\',\'godown_'+i+'\',\'qty_'+i+'\',\'rate_'+i+'\',\'account_'+i+'\',\'discount_'+i+'\',\'taxrate_'+i+'\'); ">'+
        '</td>'+
        '<td>'+
        '<input type="text" name="description_'+i+'" id="description_'+i+'" class="form-control">'+
        '</td>'+
        '<td>'+
        '<input type="text" class="form-control" name="godown_'+i+'" id="godown_'+i+'">'+
        '</td>'+
        '<td>'+
        '<input type="text" class="form-control" name="qty_'+i+'" id="qty_'+i+'" onkeyup="qty(\'qty_'+i+'\');">'+
        '</td>'+
        '<td>'+
        '<input type="text" class="form-control" name="rate_'+i+'" id="rate_'+i+'" onkeyup="rate(\'rate_'+i+'\');">'+
        '</td>'+
        '<td>'+
        '<input type="text" class="form-control" name="account_'+i+'" id="account_'+i+'">'+
        '</td>'+
        '<td>'+
        '<input type="text" class="form-control" name="discount_'+i+'" id="discount_'+i+'" onkeyup="discountamt(\'discount_'+i+'\');">'+
        '</td>'+
        '<td>'+
        '<input type="text" class="form-control" name="taxrate_'+i+'" id="taxrate_'+i+'">'+
        '</td>'+
        '<td>'+
        '<input type="text" class="form-control taxamt" name="taxamt_'+i+'" id="taxamt_'+i+'">'+
        '</td>'+
        '<td>'+
        '<input type="text" class="form-control totalamt" name="total_'+i+'" id="total_'+i+'">'+
        '</td>'+
        '<td class="add-remove text-end">'+
        '<a href="javascript:void(0);" class="add-btn me-2"><i class="fas fa-plus-circle"></i></a> '+
        '<a href="javascript:void(0);" class="remove-btn"><i class="fe fe-trash-2"></i></a>'+
        '</td>'+
        '</tr>';
        i++;
        $(".add-table-items").append(experiencecontent);
        return false;
        });
    </script>

    <script type="text/javascript">
        function getitemsdetails(inputname,description,godown,qty,rate,account,discount,taxrate)
        {
            //alert();return;
            input=inputname.split("_");
            //alert(input);return;

            $('#'+inputname).autocomplete({
                source: function( request, response ) 
                {
                    $.ajax({
                        url : '<?=base_url()?>admin/getitemsdetails ',
                        dataType: "json",
                        type: "POST",
                        data: {
                           name_startsWith: request.term,
                           itemsdetails: input
                        },
                        success: function( data ) {
                           response( $.map( data, function( item ) {
                            var code = item.split("|");
                            //alert(data);
                            return {
                              label: code[0],
                              value: code[0],
                              data : item
                            }
                          }));
                        }
                    });
                },
                autoFocus: true,          
                minLength: 0,
                change: function( event, ui ) {
                if (ui.item == null) {
                }
                },
                select: function( event, ui ) 
                {
                    var names = ui.item.data.split("|");
                    console.log(names)
                    $('#'+inputname).val(names[0]);
                    $('#'+description).val(names[10]);
                    $('#'+godown).val(names[2]);
                    //$('#'+qty).val(names[3]);
                    $('#'+qty).val('1');
                    $('#'+rate).val(names[4]);
                    $('#'+account).val(names[5]);
                    $('#'+discount).val(names[6]);
                    //$('#'+taxrate).val('0');
                    $('#'+taxrate).val(names[7]);
                    
                    discountamt(inputname);

                    subtotal();

                    getbillamt()
                }

            });
        }

        /*function discountamt(inputname)
        {
            //alert(inputname);
            input=inputname.split("_");
            id_val= input[1];
            //alert(id_val);

            item_rate = $('#item_rate').val();
            rate = $('#rate_'+id_val).val();
            discount = $('#discount_'+id_val).val();

            if(item_rate == 'Tax Inclusive')
            {
                var taxrate = $('#taxrate_'+id_val).val();
                //alert(taxrate);
                var inclusive = parseInt(taxrate) + 100;
                //alert(inclusive);
                var taxamt = rate*taxrate/inclusive;
                //alert(taxamt);

                $('#taxamt_'+id_val).val((taxamt).toFixed(2));

                var total = rate-(rate*discount/100);
                var totalamt = total-taxamt;
                $('#total_'+id_val).val((totalamt).toFixed(2));
                
            }
            if(item_rate == 'Tax Exclusive')
            {
                //var discountamt = rate/100;
                //var totalamt = rate-discountamt;
                var totalamt = rate-(rate*discount/100);
                $('#total_'+id_val).val(totalamt);

                var taxrate = $('#taxrate_'+id_val).val();
                var taxamt = rate*taxrate/100;
                //alert(taxamt);

                $('#taxamt_'+id_val).val((taxamt).toFixed(2));
            }
        }

        function qty(inputname)
        {
            input=inputname.split("_");
            id_val= input[1];
            //alert(input);

            var item_rate = $('#item_rate').val();
            var rate = $('#rate_'+id_val).val();
            var discount = $('#discount_'+id_val).val();
            var qty = $('#qty_'+id_val).val();

            if(item_rate == 'Tax Inclusive')
            {
                var taxrate = $('#taxrate_'+id_val).val();
                //alert(taxrate);
                var inclusive = parseInt(taxrate) + 100;
                //alert(inclusive);
                var taxamt = rate*taxrate/inclusive*qty;
                //alert(taxamt);

                $('#taxamt_'+id_val).val((taxamt).toFixed(2));

                var total = rate-(rate*discount/100);
                var totalamt = total-taxamt*qty;
                $('#total_'+id_val).val((totalamt).toFixed(2));
                
            }
            if(item_rate == 'Tax Exclusive')
            {
                var total = rate-(rate*discount/100);
                var totalamt = total*qty;
                //alert(totalamt);

                $('#total_'+id_val).val((totalamt).toFixed(2));

                var taxrate = $('#taxrate_'+id_val).val();
                var taxamt = totalamt*taxrate/100;
                //alert(taxamt);

                $('#taxamt_'+id_val).val((taxamt).toFixed(2));
            }

            

            subtotal();

            getbillamt();
        }*/

        function discountamt(inputname)
        {
            //alert(inputname);
            input=inputname.split("_");
            id_val= input[1];
            //alert(id_val);

            var rate = $('#rate_'+id_val).val();
            var discount = $('#discount_'+id_val).val();
            var qty = $('#qty_'+id_val).val();

            /*//var discountamt = rate/100;
            //var totalamt = rate-discountamt;
            var totalamt = rate-(rate*discount/100);
            $('#total_'+id_val).val(totalamt);

            var taxrate = $('#taxrate_'+id_val).val();
            var taxamt = totalamt*taxrate/100;
            //alert(taxamt);

            $('#taxamt_'+id_val).val((taxamt).toFixed(2));*/

            var item_rate = $('#item_rate').val();

            if(item_rate == 'tax_exclusive')
            {
                var total = rate-(rate*discount/100);
                //alert(totalamt);

                var totalamt = total*qty;
                //alert(totalamt);

                $('#total_'+id_val).val((totalamt).toFixed(2));

                var taxrate = $('#taxrate_'+id_val).val();
                var taxamt = totalamt*taxrate/100;
                //alert(taxamt);

                $('#taxamt_'+id_val).val((taxamt).toFixed(2));
            }

            if(item_rate == 'tax_inclusive')
            {
                var total = rate-(rate*discount/100);
                //alert(totalamt);

                var totalamt = total*qty;
                //alert(totalamt);

                //t = $('#total_'+id_val).val((totalamt).toFixed(2));

                var taxrate = $('#taxrate_'+id_val).val();
                var taxamt = totalamt*taxrate/100;
                //alert(taxamt);

                $('#taxamt_'+id_val).val((taxamt).toFixed(2));

                t = totalamt - taxamt;

                $('#total_'+id_val).val((t).toFixed(2));
            }

            subtotal();

            getbillamt()
        }

        function qty(inputname)
        {
            input=inputname.split("_");
            id_val= input[1];
            //alert(id_val);

            var rate = $('#rate_'+id_val).val();
            var qty = $('#qty_'+id_val).val();
            var discount = $('#discount_'+id_val).val();

            /*//var discountamt = rate/100;
            //var total = rate-discountamt;
            var total = rate-(rate*discount/100);
            var totalamt = total*qty;
            //alert(totalamt);

            $('#total_'+id_val).val((totalamt).toFixed(2));

            var taxrate = $('#taxrate_'+id_val).val();
            var taxamt = totalamt*taxrate/100;
            //alert(taxamt);

            $('#taxamt_'+id_val).val((taxamt).toFixed(2));*/

            var item_rate = $('#item_rate').val();

            if(item_rate == 'tax_exclusive')
            {
                //var discountamt = rate/100;
                //var total = rate-discountamt;
                var total = rate-(rate*discount/100);
                //alert(total);
                var totalamt = total*qty;
                //alert(totalamt);

                $('#total_'+id_val).val((totalamt).toFixed(2));

                var taxrate = $('#taxrate_'+id_val).val();
                var taxamt = totalamt*taxrate/100;
                //alert(taxamt);

                $('#taxamt_'+id_val).val((taxamt).toFixed(2));
            }

            if(item_rate == 'tax_inclusive')
            {
                //var discountamt = rate/100;
                //var total = rate-discountamt;
                var total = rate-(rate*discount/100);
                //alert(total);
                var totalamt = total*qty;
                //alert(totalamt);

                //t = $('#total_'+id_val).val((totalamt).toFixed(2));

                var taxrate = $('#taxrate_'+id_val).val();
                var taxamt = totalamt*taxrate/100;
                //alert(taxamt);

                $('#taxamt_'+id_val).val((taxamt).toFixed(2));

                t = totalamt - taxamt;

                $('#total_'+id_val).val((t).toFixed(2));
            }

            subtotal();

            getbillamt();
        }

        function rate(inputname)
        {
            input=inputname.split("_");
            id_val= input[1];
            //alert(id_val);

            var rate = $('#rate_'+id_val).val();
            var qty = $('#qty_'+id_val).val();
            var discount = $('#discount_'+id_val).val();

            /*//var discountamt = rate/100;
            //var total = rate-discountamt;
            var total = rate-(rate*discount/100);
            var totalamt = total*qty;
            //alert(totalamt);

            $('#total_'+id_val).val((totalamt).toFixed(2));

            var taxrate = $('#taxrate_'+id_val).val();
            var taxamt = totalamt*taxrate/100;
            //alert(taxamt);

            $('#taxamt_'+id_val).val((taxamt).toFixed(2));*/

            var item_rate = $('#item_rate').val();

            if(item_rate == 'tax_exclusive')
            {
                //var discountamt = rate/100;
                //var total = rate-discountamt;
                var total = rate-(rate*discount/100);
                //alert(total);
                var totalamt = total*qty;
                //alert(totalamt);

                $('#total_'+id_val).val((totalamt).toFixed(2));

                var taxrate = $('#taxrate_'+id_val).val();
                var taxamt = totalamt*taxrate/100;
                //alert(taxamt);

                $('#taxamt_'+id_val).val((taxamt).toFixed(2));
            }

            if(item_rate == 'tax_inclusive')
            {
                //var discountamt = rate/100;
                //var total = rate-discountamt;
                var total = rate-(rate*discount/100);
                //alert(total);
                var totalamt = total*qty;
                //alert(totalamt);

                //t = $('#total_'+id_val).val((totalamt).toFixed(2));

                var taxrate = $('#taxrate_'+id_val).val();
                var taxamt = totalamt*taxrate/100;
                //alert(taxamt);

                $('#taxamt_'+id_val).val((taxamt).toFixed(2));

                t = totalamt - taxamt;

                $('#total_'+id_val).val((t).toFixed(2));
            }

            subtotal();

            getbillamt();
        }

        function subtotal()
        {
            var sum = 0;
            $(".totalamt").each(function()
            {
              sum += +this.value;
            });
            //alert(sum);

            $('.subtotal').val((sum).toFixed(2));
            //$('.finalamt').val(parseInt(sum));

            var sum1 = 0;
            $(".taxamt").each(function()
            {
              sum1 += +this.value;
            });

            $('.totaltaxamt').val(sum1);

            finalamt = sum+sum1;
            $('.finalamt').val(finalamt);
        }

        function getbillamt()
        {
            var sum = 0;
            $(".billamt").each(function()
            {
              sum += +this.value;
            });
            //alert(sum);

            $('.finalamt').val((sum).toFixed(2));
        }

        $(document).on('change','#item_rate',function ()
        {
            var item_rate = $(this).val();
            //alert(item_rate);

            for(var i = 0; i < 2; i++)
            {
                //alert(i);

                if(item_rate == 'tax_inclusive')
                {
                    qty('qty_'+i);
                    rate('rate_'+i);
                    discountamt('discount_'+i);
                }

                if(item_rate == 'tax_exclusive')
                {
                    qty('qty_'+i);
                    rate('rate_'+i);
                    discountamt('discount_'+i);
                }
            }

            
        });
    </script>

    <script type="text/javascript">
        $(function()
        {
            $("#bill_form").ajaxForm({
                beforeSend: function () {
                    $('#btn_submit').prop('disabled',true);
                    $('.form_error_msg').html('');
                    $('.success_message').html('<br><div class="alert alert-info">Data analyzing...please wait...</div>');
                },
                uploadProgress: function (event, position, total, percentComplete) {
                    //albumprogressbar.width(percentComplete + '%');
                },
                beforeSubmit: function () {
                    return $("#bill_form").valid(); // TRUE when form is valid, FALSE will cancel submit
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