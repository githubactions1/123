<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>Add Vendor</title>
      <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/css/select2.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">

      <style type="text/css">
         #vendor_form .error{color:red;}
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
                        <h3 class="page-title">Add New Vendor</h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                           <li class="breadcrumb-item"><a href="customers.html">Vendors</a></li>
                           <li class="breadcrumb-item active">Add Vendors</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <div class="card">
                        <form method="post" id="vendor_form" action="<?php echo base_url('admin/save_vendor');?>" autocomplete="off">
                           <div class="row" style="padding-top: 5px;">
                              <div class="col-lg-6">
                                 <div class="card-body">
                                    
                                       <div class="form-group row">
                                          <label class="col-lg-3 col-form-label">Primary Contact</label>
                                          <div class="col-lg-9">
                                             <div class="row">
                                                <div class="col-lg-4">
                                                   <select class="form-control" name="primary_contact" id="primary_contact">
                                                      <option value="">--Select--</option>
                                                      <option value="Mr">Mr.</option>
                                                      <option value="Mrs">Mrs.</option>
                                                      <option value="Ms">Ms.</option>
                                                      <option value="Miss">Miss.</option>
                                                      <option value="Dr">Dr.</option>
                                                   </select>
                                                </div>
                                                <div class="col-lg-4">
                                                   <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
                                                </div>
                                                <div class="col-lg-4">
                                                   <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label class="col-lg-3 col-form-label">Company Name</label>
                                          <div class="col-lg-9">
                                             <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Company Name" onkeyup="displayname()">
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label class="col-lg-3 col-form-label">Contact Display Name</label>
                                          <div class="col-lg-9">
                                             <input type="text" class="form-control" name="display_name" id="display_name" placeholder="Display Name" readonly>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label class="col-lg-3 col-form-label">Email Address</label>
                                          <div class="col-lg-9">
                                             <input type="email" class="form-control" name="email" id="email">
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label class="col-lg-3 col-form-label">Contact Phone</label>
                                          <div class="col-lg-9">
                                             <div class="row">
                                                <div class="col-lg-6">
                                                   <input type="text" class="form-control" name="phone" id="phone" placeholder="Work Phone">
                                                </div>
                                                <div class="col-lg-6">
                                                   <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile">
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label class="col-lg-3 col-form-label">Website</label>
                                          <div class="col-lg-9">
                                             <input type="text" class="form-control" name="website" id="website" placeholder="Website">
                                          </div>
                                       </div>
                                    
                                 </div>
                              </div>
                              <div class="col-lg-6" style=" border-left: 1px solid #ccc;">
                                 <div class="card-body">
                                    <ul class="nav nav-tabs nav-tabs-bottom">
                                       <li class="nav-item"><a class="nav-link active" href="#bottom-tab1" data-bs-toggle="tab">Other Details
                                          </a>
                                       </li>
                                       <li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-bs-toggle="tab">Address</a></li>
                                       <li class="nav-item"><a class="nav-link" href="#bottom-tab3" data-bs-toggle="tab">Bank Details</a></li>
                                    </ul>
                                    <div class="tab-content">
                                       <div class="tab-pane show active" id="bottom-tab1">
                                          <div class="row">
                                             <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Payment Terms</label>
                                                <div class="col-lg-9">
                                                   <select class="form-control" name="payment_terms" id="payment_terms">
                                                      <option value="Due on Receipt">Due on Receipt</option>
                                                      <option value="Net 10">Net 10</option>
                                                      <option value="Net 15">Net 15</option>
                                                      <option value="Net 20">Net 20</option>
                                                      <option value="Net 30">Net 30</option>
                                                      <option value="Net 45">Net 45</option>
                                                      <option value="Net 60">Net 60</option>
                                                      <option value="Net 90">Net 90</option>
                                                      <option value="Custom">Custom</option>
                                                   </select>
                                                </div>
                                             </div>
                                             <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Gst Treatment</label>
                                                <div class="col-lg-9">
                                                   <select class="form-control" name="gst_treatment" id="gst_treatment" >
                                                      <option value="Unregistered Business">Unregistered Business</option>
                                                      <option value="Regular" selected>Regular</option>
                                                      <option value="Composition">Composition</option>
                                                      <option value="Consumer">Consumer</option>
                                                      <option value="Overseas">Overseas</option>
                                                      <option value="Special Economic Zone">Special Economic Zone</option>
                                                   </select>
                                                </div>
                                             </div>
                                             <div class="form-group row gst_no">
                                                <label class="col-lg-3 col-form-label">GST No.</label>
                                                <div class="col-lg-9">
                                                   <input type="text" class="form-control" name="gst_no" id="gst_no" placeholder="GST No.">
                                                   <a href="#" class="alink">Get Details</a>
                                                </div>
                                             </div>
                                             <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Source Of Supply  </label>
                                                <div class="col-lg-9">
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
                                             <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">opening Balance</label>
                                                <div class="col-lg-9">
                                                   <input type="text" class="form-control" name="opening_bal" id="opening_bal" placeholder="opening Balance">
                                                </div>
                                             </div>
                                             <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">PAN Number</label>
                                                <div class="col-lg-9">
                                                   <input type="text" class="form-control" name="pan_no" id="pan_no" placeholder="PAN Number">
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="tab-pane" id="bottom-tab2">
                                          <div class="row">
                                             <h6>Billing</h6>
                                             <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Attention</label>
                                                <div class="col-lg-9">
                                                   <input type="text" class="form-control" name="billing_attention" id="billing_attention" placeholder="Attention">
                                                </div>
                                             </div>
                                             <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Street</label>
                                                <div class="col-lg-9">
                                                   <input type="text" class="form-control" name="billing_street" id="billing_street" placeholder="Street">
                                                </div>
                                             </div>
                                             <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">City</label>
                                                <div class="col-lg-9">
                                                   <input type="text" class="form-control" name="billing_city" id="billing_city" placeholder="City">
                                                </div>
                                             </div>
                                             <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">State</label>
                                                <div class="col-lg-9">
                                                   <input type="text" class="form-control" name="billing_state" id="billing_state" placeholder="State">
                                                </div>
                                             </div>
                                             <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Pin Code</label>
                                                <div class="col-lg-9">
                                                   <input type="text" class="form-control" name="billing_pincode" id="billing_pincode" placeholder="Pincode">
                                                </div>
                                             </div>
                                             <h6>Shipping</h6>
                                             <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Attention</label>
                                                <div class="col-lg-9">
                                                   <input type="text" class="form-control" name="shipping_attention" id="shipping_attention" placeholder="Attention">
                                                </div>
                                             </div>
                                             <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Street</label>
                                                <div class="col-lg-9">
                                                   <input type="text" class="form-control" name="shipping_street" id="shipping_street" placeholder="Street">
                                                </div>
                                             </div>
                                             <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">City</label>
                                                <div class="col-lg-9">
                                                   <input type="text" class="form-control" name="shipping_city" id="shipping_city" placeholder="City">
                                                </div>
                                             </div>
                                             <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">State</label>
                                                <div class="col-lg-9">
                                                   <input type="text" class="form-control" name="shipping_state" id="shipping_state" placeholder="State">
                                                </div>
                                             </div>
                                             <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Pin Code</label>
                                                <div class="col-lg-9">
                                                   <input type="text" class="form-control" name="shipping_pincode" id="shipping_pincode" placeholder="Pincode">
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="tab-pane" id="bottom-tab3">
                                          <div class="row">
                                             <div class="form-group row">
                                                <label class="col-lg-3 col-form-label"> Bank Name</label>
                                                <div class="col-lg-9">
                                                   <input type="text" class="form-control" name="bank_name" id="bank_name" placeholder="Bank Name">
                                                </div>
                                             </div>
                                             <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Branch Name</label>
                                                <div class="col-lg-9">
                                                   <input type="text" class="form-control" name="branch_name" id="branch_name" placeholder="Branch Name">
                                                </div>
                                             </div>
                                             <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">IFSC Code</label>
                                                <div class="col-lg-9">
                                                   <input type="text" class="form-control" name="ifsc_code" id="ifsc_code" placeholder="IFSC Code">
                                                </div>
                                             </div>
                                             <div class="form-group row">
                                                <label class="col-lg-3 col-form-label">Account No.</label>
                                                <div class="col-lg-9">
                                                   <input type="text" class="form-control" name="account_no" id="account_no" placeholder="Account No.">
                                                </div>
                                             </div>
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
                                 <a href="<?php echo base_url('admin/vendor_list'); ?>" class="btn btn-primary">Cancel</a>
                              </div>
                              <br>
                              </form>
                           </div>
                        </form>
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
            $('#vendor_form').validate({
            
               rules: {
                  "primary_contact": {
                       required: true
                   },
                   "first_name": {
                       required: true
                   },
                   "last_name": {
                       required: true
                   },
                   "company_name": {
                       required: true
                   },
                   "display_name": {
                       required: true
                   },
                    "gst_no": {
                       required: true
                   }
               },
               messages: {
                  "primary_contact": {
                       required: 'Select'
                   },
                   "first_name": {
                       required: 'First Name is required'
                   },
                   "last_name": {
                       required: 'Last Name is required'
                   },
                   "company_name": {
                       required: 'Company Name is required'
                   },
                   "display_name": {
                       required: 'Display Name is required'
                   },
                   "gst_no": {
                       required: 'Gst Number is required'
                   }
               }
            });

            $("#vendor_form").ajaxForm({
               beforeSend: function () {
                   $('#btn_submit').prop('disabled',true);
                   $('.form_error_msg').html('');
                   $('.success_message').html('<br><div class="alert alert-info">Data analyzing...please wait...</div>');
               },
               uploadProgress: function (event, position, total, percentComplete) {
                   //albumprogressbar.width(percentComplete + '%');
               },
               beforeSubmit: function () {
                   return $("#vendor_form").valid(); // TRUE when form is valid, FALSE will cancel submit
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
         function displayname() 
         {
            name = $('#company_name').val();
            $('#display_name').val(name);
            //alert(name);
         }

         $(document).on('change', '#gst_treatment', function(event)
         {
            gst_treatment = $('#gst_treatment').val();


            if(gst_treatment == 'Unregistered Business' || gst_treatment == 'Consumer' || gst_treatment == 'Overseas')
            {
               $('.gst_no').hide();
            }

            if(gst_treatment == 'Regular' || gst_treatment == 'Composition' || gst_treatment == 'Special Economic Zone')
            {
               $('.gst_no').show();
            }
            
         });

      </script>
   </body>
</html>