<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>Add Inventory</title>
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
               <h3 class="page-title">Add inventory</h3>
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
               <form method="post" id="inventory_form" action="<?php echo base_url('admin/save_inventory');?>" enctype="multipart/form-data" autocomplete="off" >
                  
                  <div class="row" data-select2-id="6">
                     <div class="col-md-3">
                        <div class="form-group">
                           <label style="color:#f00">Name</label>
                           <div  >
                              <input class="form-control" type="text" name="name" id="name">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group"  >
                           <label style="color:#f00">Unit</label>
                           <select class="form-select" name="unit" id="unit" >
                              <option value="">Select Unit</option>
                              <option value="Box">Box</option>
                              <option value="Cm">Cm (centimeter</option>
                              <option value="Dz">Dz (Dozen)</option>
                              <option value="Ft">Ft (Feet)</option>
                              <option value="No" selected="selected">No (Number)</option>
                              <option value="M">M (Meter)</option>
                              <option value="Kg">Kg (kilograms)</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group" >
                           <label style="color:#f00"> Type</label>
                           <select class="form-select" name="good_type" id="good_type">
                              <option value="Goods">Goods</option>
                              <option value="Service">Services</option>
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
                                    <option value="Nil Rated">Nil Rated</option>
                                    <option value="Non GST">Non GST</option>
                                    <option value="Taxable" selected>Taxable</option>
                                    <option value="Out Of Scope">Out Of Scope</option>
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
                                    <option value="28">GST @ 28% [28]</option>
                                    <option value="18">GST @ 18% [18]</option>
                                    <option value="12">GST @ 12% [12]</option>
                                    <option value="5">GST @ 5% [5]</option>
                                    <option value="0">GST @ 0% [0]</option>
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
                                    <option value="IGST @ 28%[28]">IGST @ 28% [28]</option>
                                    <option value="IGST @ 18%[18]">IGST @ 18% [18]</option>
                                    <option value="IGST @ 12%[12]">IGST @ 12% [12]</option>
                                    <option value="IGST @ 5%[5]">IGST @ 5% [5]</option>
                                    <option value="IGST @ 0%[0]">IGST @ 0% [0]</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-12 pt11">
                        <div class="row">
                           <div class="col-md-2">
                              <div class="form-group">
                                 <label>HSN </label>
                                 <div  >
                                    <input class="form-control " type="text" name="hsn" id="hsn">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-2">
                              <div class="form-group">
                                 <label>SKU</label>
                                 <div  >
                                    <input class="form-control " type="text" name="sku" id="sku">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-2">
                              <div class="form-group">
                                 <label>Default Discount (%)
                                 </label>
                                 <div  >
                                    <input class="form-control " type="text" name="default_discount" id="default_discount">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label>Amount Discount (₹)</label>
                                 <div  >
                                    <input class="form-control " type="text" name="amt_discount" id="amt_discount">
                                 </div>
                              </div>
                           </div>
                           <!-- <div class="col-md-3">
                              <div class="form-group">
                                 <label>File Upload</label>
                                 <div  >
                                    <input class="form-control " type="file" name="amt_discount" id="amt_discount">
                                 </div>
                              </div>
                           </div> -->
                        </div>
                     </div>
                     <hr>
                     <div class="col-lg-3 pt11">
                        <h5><input type="checkbox" name="sales_information" id="sales_information" value="sales_information" style="vertical-align: middle;" checked> Sales Information </h5>
                     </div>
                     <div class="col-md-2 pt11 sales_information">
                        <div class="form-group">
                           <label style="color:#f00">Rate</label>
                           <div  >
                              <input class="form-control" type="text" name="sale_rate" id="sale_rate">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-3 pt11 sales_information">
                        <div class="form-group">
                           <label style="color:#f00">Sales</label>
                           <div  >
                              <select class="select" name="sales_account" id="sales_account">
                                 <option value="">Select Account</option>
                                 <optgroup label="Income">
                                    <option value="Sales" selected="selected">Sales</option>
                                    <option value="Discount">Discount</option>
                                    <option value="Shipping Charge">Shipping Charge</option>
                                    <option value="General Income">General Income</option>
                                    <option value="Interest Income">Interest Income</option>
                                    <option value="Late Fee Income">Late Fee Income</option>
                                    <option value="Interest Income">Other Charges</option>
                                 </optgroup>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-3 pt11 sales_information">
                        <div class="form-group">
                           <label>Descirption </label>
                           <div  >
                              <textarea class="form-control" name="sale_description" id="sale_description"></textarea>
                           </div>
                        </div>
                     </div>
                     <hr>

                     <div class="col-lg-3 pt11">
                        <h5>
                           <input type="checkbox" style="vertical-align: middle;" name="purchase_information" id="purchase_information" value="purchase_information" checked> Purchase Information
                        </h5>
                     </div>
                     <div class="col-md-2 pt11 purchase_information">
                        <div class="form-group">
                           <label style="color:#f00">Rate</label>
                           <div  >
                              <input class="form-control" type="text" name="purchase_rate" id="purchase_rate">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-3 pt11 purchase_information">
                        <div class="form-group">
                           <label>Purchase</label>
                           <div  >
                              <select class="select" name="purchase_account" id="purchase_account">
                                 <optgroup label="Expense">
                                    <option value="Bank Fees and Charges">Bank Fees and Charges</option>
                                    <option value="Printing and Stationery">Printing and Stationery</option>
                                    <option value="Salaries and Employee Wages">Salaries and Employee Wages</option>
                                    <option value="Meals and Entertainment">Meals and Entertainment</option>
                                    <option value="Depreciation Expense">Depreciation Expense</option>
                                    <option value="Consultant Expense">Consultant Expense</option>
                                    <option value="Repairs and Maintenance">Repairs and Maintenance</option>
                                    <option value="Other Expenses">Other Expenses</option>
                                    <option label="" value="Lodging">Lodging</option>
                                    <option value="Bad Debt">Bad Debt</option>
                                    <option value="Postage">Postage</option>
                                    <option value="Advertising And Marketing">Advertising And Marketing</option>
                                    <option value="Credit Card Charges">Credit Card Charges</option>
                                    <option value="Travel Expense">Travel Expense</option>
                                    <option value="Telephone Expense">Telephone Expense</option>
                                    <option value="Automobile Expense">Automobile Expense</option>
                                    <option value="IT and Internet Expenses">IT and Internet Expenses</option>
                                    <option value="Rent Expense">Rent Expense</option>
                                    <option value="Janitorial Expense">Janitorial Expense</option>
                                    <option value="Office Supplies">Office Supplies</option>
                                    <option value="Custom Duty">Custom Duty</option>
                                    <option value="PETROL EXPENSE">PETROL EXPENSE</option>
                                    <option value="COURIER EXPENSE">COURIER EXPENSE</option>
                                    <option value="Office Expenses">Office Expenses</option>
                                    <option value="03 SWAPNIL AGRAWAL">03 SWAPNIL AGRAWAL</option>
                                    <option value="000003 SWAPNIL AGRAWAL">000003 SWAPNIL AGRAWAL</option>
                                    <option value="COMMISION">COMMISION</option>
                                    <option value="LEGAL EXPENSES">LEGAL EXPENSES</option>
                                    <option value="PUNE OFFICE - SOMARWAR PETH">PUNE OFFICE - SOMARWAR PETH</option>
                                    <option value="HEAD OFFICE - PIMPRI">HEAD OFFICE - PIMPRI</option>
                                    <option value="INTEREST ON LOAN">INTEREST ON LOAN</option>
                                    <option value="INTEREST ON DELAYED PAYMENT BY CUSTOMER">INTEREST ON DELAYED PAYMENT BY CUSTOMER</option>
                                    <option value="Maintenance">Maintenance</option>
                                 </optgroup>
                                 <optgroup label="Cost Of Goods Sold">
                                    <option value="Purchase A/c" selected="selected">Purchase A/c</option>
                                    <option value="Cost of Goods Sold">Cost of Goods Sold</option>
                                    <option value="Cost of Goods Manufactured">Cost of Goods Manufactured</option>
                                 </optgroup>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-3 pt11 purchase_information">
                        <div class="form-group">
                           <label>Descirption </label>
                           <div  >
                              <textarea class="form-control" name="purchase_description" id="purchase_description"></textarea>
                           </div>
                        </div>
                     </div>
                     <hr>

                     <div class="col-lg-3 pt11">
                        <h5><input type="checkbox" style="vertical-align: middle;" name="trackable_item" id="trackable_item" value="trackable_item"> Its trackable item </h5>
                     </div>
                     <div class="col-lg-9 pt11 trackable_item">
                        <div class="row">
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label style="color:#f00">Opening Stock {Qty.}</label>
                                 <div  >
                                    <input class="form-control" type="text" name="opening_stock" id="opening_stock">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label style="color:#f00">Opening Rate</label>
                                 <div  >
                                    <input class="form-control" type="text" name="opening_rate" id="opening_rate">
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
                                          <option value="Inventory Assets">Inventory Assets</option>
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
                                       <option value="<?php echo $gn->id;?>"><?php echo $gn->name;?></option>
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

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
    
      <script src="<?php echo base_url();?>assets/js/malsup-jquery.js"></script>

      <script type="text/javascript">
         $(function()
         {
            trackable_item = $('#trackable_item').prop('checked', true);

            if($('#trackable_item').prop('checked', true))
            {
               $('#purchase_information').attr('disabled', 'disabled');
               $('#sales_information').attr('disabled', 'disabled');
               //$("#purchase_information").removeAttr("disabled");
            }

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
         })

         $('#trackable_item').click(function()
         {

            if($(this).prop('checked') == false)
            {
               $("#purchase_information").removeAttr("disabled");
               $("#sales_information").removeAttr("disabled");

               $('.trackable_item').hide();
               $('#trackable_item').prop('checked', false);
            }
            else
            {
               $('#purchase_information').attr('disabled', 'disabled');
               $('#sales_information').attr('disabled', 'disabled');
               $('.trackable_item').show();
            }

            //alert('aaa');
            

         });

         $('#purchase_information').click(function()
         {
            $('.purchase_information').hide();
         });

         $('#sales_information').click(function()
         {
            $('.sales_information').hide();
         });

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
   </body>
   
</html>