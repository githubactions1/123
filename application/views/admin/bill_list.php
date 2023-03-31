<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Bill</title>
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datetimepicker.min.css">
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
                        <div class="col">
                            <h3 class="page-title">Bills</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a> </li>
                                <li class="breadcrumb-item active">Estimates</li>
                            </ul>
                        </div>
                        <div class="col-auto">
                            <a href="<?php echo base_url('admin/add_bill');?>" class="btn btn-primary me-1"> <i class="fas fa-plus"></i> Add Bill </a>
                            <!-- <a class="btn btn-primary filter-btn" href="javascript:void(0);" id="filter_search"> <i class="fas fa-filter"></i>
                            </a> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-stripped table-hover datatable">
                                        <thead class="thead-light">
                                            <tr>
                                                <!-- <th></th> -->
                                                <th>Date</th>
                                                <th>Bill#</th>
                                                <th>Order#</th>
                                                <th>Vendor Name</th>
                                                <th>Status</th>
                                                <th>Due Date</th>
                                                <th>Amount</th>
                                                <th>Due Amount</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($bill_list as $il)
                                            {
                                                
                                            
                                            ?>
                                            <tr>
                                                <td><?php echo date('d-M-Y',strtotime($il->bill_date));?></td>

                                                <td><?php echo $il->bill_no;?></td>

                                                <td><?php echo $il->order_no;?></td>

                                                <td>
                                                    
                                                    <a href="<?php echo base_url('admin/view_bill/'.$il->id.''); ?>" class="invoice-link" style="color:blue;"><?php echo $il->company_name;?></a>
                                                </td>

                                                <!-- <td>
                                                    <?php
                                                    if($il->status == 'Paid')
                                                    {
                                                        echo '<span class="badge bg-success-light">Paid</span>';
                                                    }
                                                    
                                                    if($il->status == 'Open')
                                                    {
                                                        //$bill_date = $il->bill_date;
                                                        $due_date = $il->due_date;
                                                        $date = date('d-m-Y');
                                                        //echo $date;

                                                        if($date < $due_date)
                                                        {
                                                            echo '<span class="badge bg-info-light">Open</span>';
                                                        }
                                                        else
                                                        {
                                                            echo '<span class="badge bg-danger-light">Overdue</span>';
                                                        }

                                                        //echo '<span class="badge bg-info-light">Open</span>';
                                                    }
                                                    if($il->status == 'Partially paid')
                                                    {
                                                        echo '<span class="badge bg-warning-light">Partially Paid</span>';
                                                    }
                                                    ?>
                                                    
                                                </td> -->

                                                <td class="text-primary">
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
                                                            Open
                                                        </span>';
                                                    }
                                                    
                                                    elseif($il->due_amount != $il->payment)
                                                    {
                                                        //$status = 'Partially paid';
                                                        echo '<span class="badge bg-warning-light">
                                                            Partially paid
                                                        </span>';
                                                    }
                                                    
                                                    elseif($il->due_amount == $il->payment)
                                                    {
                                                        //$status = 'Paid';
                                                        echo '<span class="badge bg-success-light">
                                                            Paid
                                                        </span>';
                                                    }
                                                    

                                                    
                                                    ?>
                                                </td>

                                                <td class="text-primary"><?php echo date('d-M-Y',strtotime($il->due_date));?></td>

                                                <td>₹<?php echo $il->totalamt;?></td>

                                                <!-- <td class="text-primary">₹<?php echo $il->due_amount;?></td> -->

                                                <td class="text-primary">₹<?php echo $il->totalamt - $il->payment;?></td>

                                                <td class="text-end"> 
                                                    <a href="<?php echo base_url('admin/edit_bill/'.$il->id.''); ?>" class="btn btn-sm btn-white text-success me-2"><i class="far fa-edit me-1"></i> </a>

                                                    <a class="btn btn-sm btn-white text-danger confirm_delete" href="#" data="<?php echo $il->id; ?>" data-bs-toggle="modal" data-bs-target="#delete_paid"><i class="far fa-trash-alt me-1"></i> </a>
                                                </td>
                                            </tr>

                                            <?php } ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="modal custom-modal fade" id="delete_paid" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete Invoice Paid</h3>
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6"> <a href="javascript:void(0);" class="btn btn-primary paid-continue-btn">Delete</a> </div>
                                <div class="col-6"> <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary paid-cancel-btn">Cancel</a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>

    <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
     <div class="modal-dialog modal-top">
        <div class="modal-content">
           <div class="modal-header bg-danger">
              <h4 class="modal-title" id="topModalLabel">Confirm Delete</h4>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <div class="modal-body">
              <h5>Are you sure want to delete this record ?</h5>
           </div>
           <div class="modal-footer">
              <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="btndelete">Delete</button>
           </div>
        </div>
     </div>
    </div>
    
    <script src="<?php echo base_url();?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/feather.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/select2/js/select2.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/datatables/datatables.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/script.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.confirm_delete').click(function()
        {
         var id = $(this).attr('data');
         //alert(id);return;
         $('#deleteModal').modal('show');
         $('#btndelete').unbind().click(function(){
              $.ajax({
               type : 'ajax',
               method : 'post',
               url : '<?php echo base_url('admin/delete_bill');?>',
               data : {'id':id},
               async : false,
               dataType : 'json',

               success : function(response)
               {
                 $("#deleteModal").modal('hide');
                 swal('Bill Delete SuccessFully','');
                 setTimeout(function()
                 {
                     window.location.href = response;
                 }, 3000);
                 
               },

               });
         });

        });
    </script>
</body>

</html>