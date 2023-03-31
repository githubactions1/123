<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>Edit Inventory</title>
      <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/css/select2.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datetimepicker.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">

      <style type="text/css">
        #inventory_form .error{color:red;}
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
               <h3 class="page-title">Edit inventory</h3>
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
               <form method="post" id="inventory_form" action="<?php echo base_url('admin/update_inventory');?>" enctype="multipart/form-data" autocomplete="off" >
                  <input type="hidden" name="inventory_id" id="inventory_id" value="<?php echo $edit_inventory->id; ?>">
                  <div class="row" data-select2-id="6">
                     <div class="col-md-3">
                        <div class="form-group">
                           <label style="color:#f00">Name</label>
                           <div  >
                              <input class="form-control" type="text" name="name" id="name" value="<?php echo $edit_inventory->name; ?>">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group"  >
                           <label style="color:#f00">Unit</label>
                           <select class="form-select" name="unit" id="unit" >
                              <option value="">Select Unit</option>
                              <option value="Box" <?php if($edit_inventory->unit == 'Box'){echo 'selected'; }?>>Box</option>
                              <option value="Cm" <?php if($edit_inventory->unit == 'Cm'){echo 'selected'; }?>>Cm (Centimeter)</option>
                              <option value="Dz" <?php if($edit_inventory->unit == 'Dz'){echo 'selected'; }?>>Dz (Dozen)</option>
                              <option value="Ft" <?php if($edit_inventory->unit == 'Ft'){echo 'selected'; }?>>Ft (Feet)</option>
                              <option value="No" <?php if($edit_inventory->unit == 'No'){echo 'selected'; }?>>No (Number)</option>
                              <option value="M" <?php if($edit_inventory->unit == 'M'){echo 'selected'; }?>>M (meter)</option>
                              <option value="Kg" <?php if($edit_inventory->unit == 'Kg'){echo 'selected'; }?>>Kg (Kilogram)</option>
                              
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group" >
                           <label style="color:#f00"> Type</label>
                           <select class="form-select" name="good_type" id="good_type">
                              <option value="Goods" <?php if($edit_inventory->good_type == 'Goods'){echo 'selected'; }?>>Goods</option>
                              <option value="Service" <?php if($edit_inventory->good_type == 'Goods'){echo 'selected'; }?>>Service</option>
                           </select>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group">
                              <label style="color:#f00">Tax Type</label>
                              <div  >
                                 <select class="form-select" name="tax_type" id="tax_type">
                                    <option value="">Select Tax Type</option>
                                    <option value="Nil Rated" <?php if($edit_inventory->tax_type == 'Nil Rated'){echo 'selected'; }?>>Nil Rated</option>

                                    <option value="Non GST" <?php if($edit_inventory->tax_type == 'Non GST'){echo 'selected'; }?>>Non GST</option>

                                    <option value="Taxable" <?php if($edit_inventory->tax_type == 'Taxable'){echo 'selected'; }?>>Taxable</option>
                                    
                                    <option value="Out of Scope" <?php if($edit_inventory->tax_type == 'Out of Scope'){echo 'selected'; }?>>Out of Scope</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3 instrastate_gst">
                           <div class="form-group">
                              <label>Intrastate GST</label>
                              <div  >
                                 <select class="form-select" name="instrastate_gst" id="instrastate_gst">
                                    <option value="">Select Intrastate GST</option>
                                    <option value="28" <?php if($edit_inventory->instrastate_gst == '28'){echo 'selected'; }?>>GST @ 28% [28]</option>
                                    <option value="18" <?php if($edit_inventory->instrastate_gst == '18'){echo 'selected'; }?>>GST @ 18% [18]</option>
                                    <option value="12" <?php if($edit_inventory->instrastate_gst == '12'){echo 'selected'; }?>>GST @ 12% [12]</option>
                                    <option value="5" <?php if($edit_inventory->instrastate_gst == '5'){echo 'selected'; }?>>GST @ 5% [5]</option>
                                    <option value="0" <?php if($edit_inventory->instrastate_gst == '0'){echo 'selected'; }?>>GST @ 0% [0]</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3 insterstate_gst">
                           <div class="form-group">
                              <label>Interstate GST</label>
                              <div  >
                                 <select class="form-select" name="insterstate_gst" id="insterstate_gst">
                                    <option value="">Select Insterstate GST</option>
                                    <option value="IGST @ 28%[28]" <?php if($edit_inventory->insterstate_gst == 'IGST @ 28%[28]'){echo 'selected'; }?>>IGST @ 28% [28]</option>
                                    <option value="IGST @ 18%[18]" <?php if($edit_inventory->insterstate_gst == 'IGST @ 18%[18]'){echo 'selected'; }?>>IGST @ 18% [18]</option>
                                    <option value="IGST @ 12%[12]" <?php if($edit_inventory->insterstate_gst == 'IGST @ 12%[12]'){echo 'selected'; }?>>IGST @ 12% [12]</option>
                                    <option value="IGST @ 5%[5]" <?php if($edit_inventory->insterstate_gst == 'IGST @ 5%[5]'){echo 'selected'; }?>>IGST @ 5% [5]</option>
                                    <option value="IGST @ 0%[0]" <?php if($edit_inventory->insterstate_gst == 'IGST @ 0%[0]'){echo 'selected'; }?>>IGST @ 0% [0]</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-10 pt11">
                        <div class="row">
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label>HSN </label>
                                 <div  >
                                    <input class="form-control " type="text" name="hsn" id="hsn" value="<?php echo $edit_inventory->hsn; ?>">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label>SKU</label>
                                 <div  >
                                    <input class="form-control " type="text" name="sku" id="sku" value="<?php echo $edit_inventory->sku; ?>">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label>Default Discount (%)
                                 </label>
                                 <div  >
                                    <input class="form-control " type="text" name="default_discount" id="default_discount" value="<?php echo $edit_inventory->default_discount; ?>">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label>Amount Discount (₹)</label>
                                 <div  >
                                    <input class="form-control " type="text" name="amt_discount" id="amt_discount" value="<?php echo $edit_inventory->amt_discount; ?>">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <div class="col-lg-2 pt11">
                        <h5>
                           <?php
                           if($edit_inventory->sales_information == '')
                           {
                              echo '<input type="checkbox" name="sales_information" id="sales_information" value="sales_information" style="vertical-align: middle;"> Sales Information ';
                           }
                           else
                           {
                              echo '<input type="checkbox" name="sales_information" id="sales_information" value="sales_information" style="vertical-align: middle;" checked> Sales Information ';
                           }
                           ?>
                           <!-- <input type="checkbox" name="sales_information" id="sales_information" value="sales_information" style="vertical-align: middle;"> Sales Information  -->
                        </h5>
                     </div>
                     <div class="col-md-3 pt11">
                        <div class="form-group">
                           <label style="color:#f00">Rate</label>
                           <div  >
                              <input class="form-control" type="text" name="sale_rate" id="sale_rate" value="<?php echo $edit_inventory->sale_rate; ?>">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-3 pt11">
                        <div class="form-group">
                           <label style="color:#f00">Sales</label>
                           <div  >
                              <select class="select" name="sales_account" id="sales_account">
                                 <option value="">Select Account</option>
                                 <optgroup label="Income">
                                    <option value="Sales" <?php if($edit_inventory->sales_account == 'Sales'){echo 'selected'; }?>>Sales</option>
                                    <option value="Discount" <?php if($edit_inventory->sales_account == 'Discount'){echo 'selected'; }?>>Discount</option>
                                    <option value="Shipping Charge" <?php if($edit_inventory->sales_account == 'Shipping Charge'){echo 'selected'; }?>>Shipping Charge</option>
                                    <option value="General Income" <?php if($edit_inventory->sales_account == 'General Income'){echo 'selected'; }?>>General Income</option>
                                    <option value="Late Fee Income" <?php if($edit_inventory->sales_account == 'Late Fee Income'){echo 'selected'; }?>>Late Fee Income</option>
                                    <option value="Interest Income" <?php if($edit_inventory->sales_account == 'Interest Income'){echo 'selected'; }?>>Other Charges</option>
                                 </optgroup>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-3 pt11">
                        <div class="form-group">
                           <label>Descirption </label>
                           <div  >
                              <textarea class="form-control" name="sale_description" id="sale_description"><?php echo $edit_inventory->sale_description; ?></textarea>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <div class="col-lg-2 pt11">
                        <h5>
                           <?php
                           if($edit_inventory->purchase_information == '')
                           {
                              echo '<input type="checkbox" style="vertical-align: middle;" name="purchase_information" id="purchase_information" value="purchase_information"> Purchase Information';
                           }
                           else
                           {
                              echo '<input type="checkbox" style="vertical-align: middle;" name="purchase_information" id="purchase_information" value="purchase_information" checked> Purchase Information';
                           }
                           ?>
                           <!-- <input type="checkbox" style="vertical-align: middle;" name="purchase_information" id="purchase_information" value="purchase_information"> Purchase Information -->
                        </h5>
                     </div>
                     <div class="col-md-3 pt11">
                        <div class="form-group">
                           <label style="color:#f00">Rate</label>
                           <div  >
                              <input class="form-control" type="text" name="purchase_rate" id="purchase_rate" value="<?php echo $edit_inventory->purchase_rate; ?>">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-3 pt11">
                        <div class="form-group">
                           <label>Purchase</label>
                           <div  >
                              <select class="select" name="purchase_account" id="purchase_account">
                                 <optgroup label="Expense">
                                    <option value="Bank Fees and Charges" <?php if($edit_inventory->purchase_account == 'Bank Fees and Charges'){echo 'selected'; }?>>Bank Fees and Charges</option>
                                    <option value="Printing and Stationery" <?php if($edit_inventory->purchase_account == 'Printing and Stationery'){echo 'selected'; }?>>Printing and Stationery</option>
                                    <option value="Salaries and Employee Wages" <?php if($edit_inventory->purchase_account == 'Salaries and Employee Wages'){echo 'selected'; }?>>Salaries and Employee Wages</option>
                                    <option value="Meals and Entertainment" <?php if($edit_inventory->purchase_account == 'Meals and Entertainment'){echo 'selected'; }?>>Meals and Entertainment</option>
                                    <option value="Depreciation Expense" <?php if($edit_inventory->purchase_account == 'Depreciation Expense'){echo 'selected'; }?>>Depreciation Expense</option>
                                    <option value="Consultant Expense" <?php if($edit_inventory->purchase_account == 'Consultant Expense'){echo 'selected'; }?>>Consultant Expense</option>
                                    <option value="Repairs and Maintenance" <?php if($edit_inventory->purchase_account == 'Repairs and Maintenance'){echo 'selected'; }?>>Repairs and Maintenance</option>
                                    <option value="Other Expenses" <?php if($edit_inventory->purchase_account == 'Other Expenses'){echo 'selected'; }?>>Other Expenses</option>
                                    <option value="Lodging" <?php if($edit_inventory->purchase_account == 'Lodging'){echo 'selected'; }?>>Lodging</option>
                                    <option value="Bad Debt" <?php if($edit_inventory->purchase_account == 'Bad Debt'){echo 'selected'; }?>>Bad Debt</option>
                                    <option value="Postage" <?php if($edit_inventory->purchase_account == 'Postage'){echo 'selected'; }?>>Postage</option>
                                    <option value="Advertising And Marketing" <?php if($edit_inventory->purchase_account == 'Advertising And Marketing'){echo 'selected'; }?>>Advertising And Marketing</option>
                                    <option value="Credit Card Charges" <?php if($edit_inventory->purchase_account == 'Credit Card Charges'){echo 'selected'; }?>>Credit Card Charges</option>
                                    <option value="Travel Expense" <?php if($edit_inventory->purchase_account == 'Travel Expense'){echo 'selected'; }?>>Travel Expense</option>
                                    <option value="Telephone Expense" <?php if($edit_inventory->purchase_account == 'Telephone Expense'){echo 'selected'; }?>>Telephone Expense</option>
                                    <option value="Automobile Expense" <?php if($edit_inventory->purchase_account == 'Automobile Expense'){echo 'selected'; }?>>Automobile Expense</option>
                                    <option value="IT and Internet Expenses" <?php if($edit_inventory->purchase_account == 'IT and Internet Expenses'){echo 'selected'; }?>>IT and Internet Expenses</option>
                                    <option value="Rent Expense" <?php if($edit_inventory->purchase_account == 'Rent Expense'){echo 'selected'; }?>>Rent Expense</option>
                                    <option value="Janitorial Expense" <?php if($edit_inventory->purchase_account == 'Janitorial Expense'){echo 'selected'; }?>>Janitorial Expense</option>
                                    <option value="Office Supplies" <?php if($edit_inventory->purchase_account == 'Office Supplies'){echo 'selected'; }?>>Office Supplies</option>
                                    <option value="Custom Duty" <?php if($edit_inventory->purchase_account == 'Custom Duty'){echo 'selected'; }?>>Custom Duty</option>
                                    <option value="PETROL EXPENSE" <?php if($edit_inventory->purchase_account == 'PETROL EXPENSE'){echo 'selected'; }?>>PETROL EXPENSE</option>
                                    <option value="COURIER EXPENSE" <?php if($edit_inventory->purchase_account == 'COURIER EXPENSE'){echo 'selected'; }?>>COURIER EXPENSE</option>
                                    <option value="Office Expenses" <?php if($edit_inventory->purchase_account == 'Office Expenses'){echo 'selected'; }?>>Office Expenses</option>
                                    <option value="03 SWAPNIL AGRAWAL" <?php if($edit_inventory->purchase_account == '03 SWAPNIL AGRAWAL'){echo 'selected'; }?>>03 SWAPNIL AGRAWAL</option>
                                    <option value="000003 SWAPNIL AGRAWAL" <?php if($edit_inventory->purchase_account == '000003 SWAPNIL AGRAWAL'){echo 'selected'; }?>>000003 SWAPNIL AGRAWAL</option>
                                    <option value="COMMISION" <?php if($edit_inventory->purchase_account == 'COMMISION'){echo 'selected'; }?>>COMMISION</option>
                                    <option value="LEGAL EXPENSES" <?php if($edit_inventory->purchase_account == 'LEGAL EXPENSES'){echo 'selected'; }?>>LEGAL EXPENSES</option>
                                    <option value="PUNE OFFICE - SOMARWAR PETH" <?php if($edit_inventory->purchase_account == 'PUNE OFFICE - SOMARWAR PETH'){echo 'selected'; }?>>PUNE OFFICE - SOMARWAR PETH</option>
                                    <option value="HEAD OFFICE - PIMPRI" <?php if($edit_inventory->purchase_account == 'HEAD OFFICE - PIMPRI'){echo 'selected'; }?>>HEAD OFFICE - PIMPRI</option>
                                    <option value="INTEREST ON LOAN" <?php if($edit_inventory->purchase_account == 'INTEREST ON LOAN'){echo 'selected'; }?>>INTEREST ON LOAN</option>
                                    <option value="INTEREST ON DELAYED PAYMENT BY CUSTOMER" <?php if($edit_inventory->purchase_account == 'INTEREST ON DELAYED PAYMENT BY CUSTOMER'){echo 'selected'; }?>>INTEREST ON DELAYED PAYMENT BY CUSTOMER</option>
                                    <option value="Maintenance" <?php if($edit_inventory->purchase_account == 'Maintenance'){echo 'selected'; }?>>Maintenance</option>
                                 </optgroup>
                                 <optgroup label="Cost Of Goods Sold">
                                    <option value="Purchase A/c" <?php if($edit_inventory->purchase_account == 'Purchase A/c'){echo 'selected'; }?>>Purchase A/c</option>
                                    <option value="Cost of Goods Sold" <?php if($edit_inventory->purchase_account == 'Cost of Goods Sold'){echo 'selected'; }?>>Cost of Goods Sold</option>
                                    <option value="Cost of Goods Manufactured" <?php if($edit_inventory->purchase_account == 'Cost of Goods Manufactured'){echo 'selected'; }?>>Cost of Goods Manufactured</option>
                                 </optgroup>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-3 pt11">
                        <div class="form-group">
                           <label>Descirption </label>
                           <div  >
                              <textarea class="form-control" name="purchase_description" id="purchase_description"><?php echo $edit_inventory->purchase_description; ?></textarea>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <div class="col-lg-2 pt11">
                        <h5>
                           <?php
                           if($edit_inventory->trackable_item == '')
                           {
                              echo '<input type="checkbox" style="vertical-align: middle;" name="trackable_item" id="trackable_item" value="trackable_item"> Its trackable item';
                           }
                           else
                           {
                              echo '<input type="checkbox" style="vertical-align: middle;" name="trackable_item" id="trackable_item" value="trackable_item" checked> Its trackable item';
                           }
                           ?>
                           <!-- <input type="checkbox" style="vertical-align: middle;" name="trackable_item" id="trackable_item" value="trackable_item"> Its trackable item --> 
                        </h5>
                     </div>
                     <div class="col-lg-9 pt11">
                        <div class="row">
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label style="color:#f00">Opening Stock {Qty.}</label>
                                 <div  >
                                    <input class="form-control" type="text" name="opening_stock" id="opening_stock" value="<?php echo $edit_inventory->opening_stock; ?>">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label style="color:#f00">Opening Rate</label>
                                 <div  >
                                    <input class="form-control" type="text" name="opening_rate" id="opening_rate" value="<?php echo $edit_inventory->opening_rate; ?>">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label style="color:#f00">Stock Account</label>
                                 <div  >
                                    <select class="form-select"  name="stock_account" id="stock_account">
                                       <option value="">Select Account</option>
                                       <optgroup label="Stock">
                                          <option value="Inventory Assets" <?php if($edit_inventory->stock_account == 'Inventory Assets'){echo 'selected'; }?>>Inventory Assets</option>
                                       </optgroup>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label>Godown</label>
                                 <div  >
                                    <select class="form-select" name="godown" id="godown">
                                       <option value="">Select Godown</option>
                                       <?php
                                       foreach ($godown_name as $gn)
                                       {
                                       
                                       ?>
                                       <option value="<?php echo $gn->id;?>" <?php if($edit_inventory->godown == $gn->id){echo 'selected'; }?>><?php echo $gn->name;?></option>
                                       <?php } ?>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row col-sm-6 p-5">
                        <div class="success_message row"></div>
                     </div>
                     <div class="text-end mt-4">
                        <button type="submit" class="btn btn-primary" id="btn_submit" name="btn_submit">Save</button>
                        <a href="<?php echo base_url('admin/inventory_list'); ?>" class="btn btn-primary">Cancel</a>
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
      <script src="<?php echo base_url();?>assets/plugins/moment/moment.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/script.js"></script>

      <script type="text/javascript">
         $(function()
         {
            $('#inventory_form').validate({
            
               rules: {
                  "name": {
                       required: true
                   },
                   "unit": {
                       required: true
                   },
                   "tax_type": {
                       required: true
                   },
                   "hsn": {
                       required: true
                   },
                   "sale_rate": {
                       required: true
                   },
                   "sales_account": {
                       required: true
                   },
                    "purchase_rate": {
                       required: true
                   },
                    "purchase_account": {
                       required: true
                   }
               },
               messages: {
                  "name": {
                       required: 'Name is required'
                   },
                   "unit": {
                       required: 'Unit is required'
                   },
                   "tax_type": {
                       required: 'Tax Type is required'
                   },
                   "hsn": {
                       required: 'HSN is required'
                   },
                   "sale_rate": {
                       required: 'Sales Rate is required'
                   },
                   "sales_account": {
                       required: 'Sales Account is required'
                   },
                   "purchase_rate": {
                       required: 'Purchase Rate is required'
                   },
                   "purchase_account": {
                       required: 'Purchase Rate is required'
                   }
               }
            });
            
            $("#inventory_form").ajaxForm({
            beforeSend: function () {
                $('#btn_submit').prop('disabled',true);
                $('.form_error_msg').html('');
                $('.success_message').html('<br><div class="alert alert-info">Data analyzing...please wait...</div>');
            },
            uploadProgress: function (event, position, total, percentComplete) {
                //albumprogressbar.width(percentComplete + '%');
            },
            beforeSubmit: function () {
                return $("#inventory_form").valid(); // TRUE when form is valid, FALSE will cancel submit
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

      <script type="text/javascript">
         $('#tax_type').change(function()
         {
            $tax_type = $('#tax_type').val();

            if($tax_type == 'Taxable')
            {
               $('.instrastate_gst').show();
               $('.insterstate_gst').show();
            }
            else
            {
               $('.instrastate_gst').hide();
               $('.insterstate_gst').hide();
            }
         });
      </script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
    
      <script src="<?php echo base_url();?>assets/js/malsup-jquery.js"></script>
   </body>
   
</html>