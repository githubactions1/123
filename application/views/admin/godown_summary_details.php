<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>Report - Godown Summary Details
      </title>
      <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datatables/datatables.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">

      <style type="text/css">
        .no-outline {
          border-top-style: hidden;
          border-right-style: hidden;
          border-left-style: hidden;
          border-bottom-style: hidden;
          text-align: right;
          
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
                  <div class="row align-items-center">
                     <div class="col-lg-7">
                        <h3 class="page-title">Godown Summary Details
                           <span  style="font-size: 14px; text-align: right;float: right;"><input type="checkbox" name=""> Show Zero Qty entry
                           </span>
                        </h3>
                     </div>
                     <div class="col-lg-5">
                        <div class=" row">
                           <div class="col-lg-1">
                           </div>
                           <div class="col-lg-4">
                              <select class="form-select">
                                 <option>This Years</option>
                                 <option>Today</option>
                                 <option>This Week</option>
                                 <option>This Month</option>
                                 <option>This Quarter</option>
                                 <option>This Year</option>
                                 <option>Yesterday</option>
                              </select>
                           </div>
                           <div class="col-lg-4">
                              <select class="form-select">
                                 <option value="">Layout</option>
                                 <option value="" selected>General</option>
                                 <option value="">Item with Godown and Batch</option>
                              </select>
                           </div>
                           <div class="col-lg-1">
                              <a href=" " class="btn btn-white text-black-50"><i class="  fa fa-download"></i></a>
                           </div>
                           <div class="col-lg-1">
                              <a href="javascript:window.print()" class="btn btn-white text-black-50"><i class="fa fa-print"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div id="filter_inputs" class="card filter-card">
                  <div class="card-body pb-0">
                     <div class="row">
                        <div class="col-sm-6 col-md-3">
                           <div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                           <div class="form-group">
                              <label>Email</label>
                              <input type="text" class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                           <div class="form-group">
                              <label>Phone</label>
                              <input type="text" class="form-control">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-1"></div>
                  <div class="col-sm-10">
                     <div class="card card-table">
                        <div class="card-body">
                           <div class="rport">
                              <h3><?php echo $company_details->company_name; ?></h3>
                              <h5>Godown Summary
                              </h5>
                              <h5>From 01 Apr 2022  To 31 Mar 2023</h5>
                           </div>
                        </div>
                        <div class="table-responsive">
                           <table class="table table-center table-hover  "  >
                              <thead class="thead-light">
                                 <tr role="row">
                                    <th>Item</th>
                                    <th class="text-end">Qty</th>
                                    <th class="text-end">Rate</th>
                                    <th class="text-end">Amount</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                 foreach ($godown_summary_details as $inv)
                                 {
                                    $qty = $inv->available_qty+$inv->billqty-$inv->invoiceqty;
                                    $rate = $inv->purchase_rate;
                                    
                                 ?>
                                 <tr>
                                    <td > <a href="r-inventory-item-details.html"><?php echo $inv->inventoryname; ?></a> </td>
                                    <td class="text-end"> <input type="text" value="<?php echo $inv->available_qty+$inv->billqty-$inv->invoiceqty; ?>" class="qty no-outline"> </td>
                                    <td class="text-end"> <input type="text" value="<?php echo $rate; ?>" class="rate no-outline"> </td>
                                    <td class="text-end"> <input type="text" value="<?php echo $qty*$rate; ?>" class="amount no-outline"> </td>
                                 </tr>
                                 <?php } ?>
                                 
                                 <tr>
                                    <td> <b>Total </b> </td>
                                    <td class="text-end"><b><input type="text" name="total_qty" id="total_qty" class="no-outline"></b></td>
                                    <td class="text-end"><b><input type="text" name="total_rate" id="total_rate" class="no-outline"></b></td>
                                    <td class="text-end"><b><input type="text" name="total_amount" id="total_amount" class="no-outline"></b></td>
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
      <script data-cfasync="false" src="../../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="<?php echo base_url();?>assets/js/jquery-3.6.0.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/feather.min.js"></script>
      <script src="<?php echo base_url();?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
      <script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="<?php echo base_url();?>assets/plugins/datatables/datatables.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/script.js"></script>

      <script type="text/javascript">
         $(function()
         {
            var sum = 0;
            $(".amount").each(function() {      
              sum += +this.value;
              $('#total_amount').val(sum);
            });

            var sum1 = 0;
            $(".rate").each(function() {      
              sum1 += +this.value;
              $('#total_rate').val(sum1);
            });

            var sum2 = 0;
            $(".qty").each(function() {      
              sum2 += +this.value;
              $('#total_qty').val(sum2);
            });
         })
         
      </script>
   </body>
</html>