<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>Report - Invoice Details
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
                        <h3 class="page-title">Invoice Details
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
                              <h5>Invoice Details
                              </h5>
                              <h5>From 01 Apr 2022  To 31 Mar 2023</h5>
                           </div>
                        </div>
                        <div class="table-responsive">
                           <table class="table table-center table-hover  "  >
                              <thead class="thead-light">
                                 <tr role="row">
                                    <th>Status</th>
                                    <th>Invoice Date</th>
                                    <th>Due Date</th>
                                    <th>Invoice No</th>
                                    <th>Order No</th>
                                    <th>Customer Name</th>
                                    <th>Invoice Amount</th>
                                    <th>Balance Due</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                 foreach ($invoice_details as $il) {
                                    
                                 ?>
                                 <tr>
                                    <td>
                                        <?php

                                        $date = date('d-m-Y');
                                        //echo $date;
                                        $duedt = $il->due_date;
                                        //echo $duedt;

                                        if($il->due_date < $date)
                                        {
                                            //$status = 'Partially paid';
                                            echo '<span class="badge bg-danger-light">Overdue</span>';
                                        }
                                        elseif($il->payment == NULL)
                                        {
                                            echo '<span class="badge bg-info-light">
                                                Sent
                                            </span>';
                                        }

                                        elseif($il->due_amount == $il->payment)
                                        {
                                            //$status = 'Paid';
                                            echo '<span class="badge bg-success-light">
                                                Paid
                                            </span>';
                                        }
                                        elseif($il->due_date < $date)
                                        {
                                            //$status = 'Partially paid';
                                            echo '<span class="badge bg-danger-light">Overdue</span>';
                                        }
                                        elseif($il->due_amount != $il->payment)
                                        {
                                            //$status = 'Partially paid';
                                            echo '<span class="badge bg-warning-light">
                                                Partially paid
                                            </span>';
                                        }
                                        
                                        ?>
                                    </td>
                                    <td><?php echo date('d-M-Y',strtotime($il->invoice_date));?></td>
                                    <td><?php echo date('d-M-Y',strtotime($il->due_date));?></td>
                                    <td><?php echo $il->invoice_no;?></td>
                                    <td><?php echo $il->order_no;?></td>
                                    <td><a href="<?php echo base_url('admin/view_invoice/'.$il->id.''); ?>" class="invoice-link" style="color:blue;"><?php echo $il->name;?></a></td>
                                    <td>₹<?php echo $il->totalamt;?></td>
                                    <td>₹<?php echo $il->totalamt - $il->payment;?></td>
                                 </tr>
                                 <?php } ?>
                                 
                                 <tr>
                                    <td><b>Total</b></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><b>₹ 62,504.00</b></td>
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