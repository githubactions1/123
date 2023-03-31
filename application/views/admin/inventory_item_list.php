<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>Report - Inventory Item List
      </title>
      <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datatables/datatables.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
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
                        <h3 class="page-title">Inventory Item List
                        </h3>
                     </div>
                     <div class="col-lg-5">
                        <div class=" row">
                           <div class="col-lg-1">
                           </div>
                           <div class="col-lg-4">
                              <select class="form-select">
                                 <option value="">Select Inventory type</option>
                                 <option value="">Both</option>
                                 <option value="">Untracked</option>
                                 <option value="">Tracked</option>
                              </select>
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
                           <div class="col-lg-1">
                              <a href="javascript:window.print()" class="btn btn-white text-black-50"><i class="fa fa-print"></i></a>
                           </div>
                           <div class="col-lg-1">
                              <a href=" " class="btn btn-white text-black-50"><i class="  fa fa-download"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               
               <div class="row">
                  <div class="col-sm-12">
                     <div class="card card-table">
                        <div class="card-body">
                           <div class="rport">
                              <h3><?php echo $company_details->company_name; ?></h3>
                              <h5>Inventory Summary
                              </h5>
                              <h5>From 01 Apr 2022  To 31 Mar 2023</h5>
                           </div>
                        </div>
                        <div class="table-responsive">
                           <table class="table table-center table-hover  "  >
                              <thead class="thead-light">
                                 <tr role="row">
                                    <th>Item</th>
                                    <th>Category</th>
                                    <th>Inv. Type</th>
                                    <th>Item Type</th>
                                    <th>HSN/SAC</th>
                                    <th>SKU</th>
                                    <th>Unit</th>
                                    <th>Barcode</th>
                                    <th>Sales Rate</th>
                                    <th>Purchase Rate</th>
                                    <th>Qty</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                 foreach ($inventory_item_list as $inv) {
                                    
                                 ?>
                                 <tr>
                                    <td> <a href="<?php echo base_url('admin/view_inventory/'.$inv->id.''); ?>"> <?php echo $inv->name; ?> </a> </td>
                                    <td></td>
                                    <td>  </td>
                                    <td> <?php echo $inv->good_type; ?> </td>
                                    <td> <?php echo $inv->hsn; ?> </td>
                                    <td> <?php echo $inv->sku; ?> </td>
                                    <td> <?php echo $inv->unit; ?> </td>
                                    <td>  </td>
                                    <td> <?php echo $inv->sale_rate; ?> </td>
                                    <td> <?php echo $inv->purchase_rate; ?> </td>
                                    <td> <?php echo $inv->opening_stock; ?> </td>
                                 </tr>
                                 <?php } ?>
                                 
                                 <tr>
                                    <td><b>Total</b></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><b>₹ 62,504.00</b></td>
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
   </body>
</html>