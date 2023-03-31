<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Purchase Order</title>
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
                            <h3 class="page-title">Purchase Order</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a> </li>
                                <li class="breadcrumb-item active">Estimates</li>
                            </ul>
                        </div>
                        <div class="col-auto">
                            <a href="<?php echo base_url('admin/add_purchase_order');?>" class="btn btn-primary me-1"> <i class="fas fa-plus"></i> Add Purchase Order </a>
                            <!-- <a class="btn btn-primary filter-btn" href="javascript:void(0);" id="filter_search"> <i class="fas fa-filter"></i> </a> -->
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
                                                <th>Purchase Order#</th>
                                                <th>Vendor Name</th>
                                                <th>Status</th>
                                                <th>Amount</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($purchase_order_list as $il)
                                            {
                                                
                                            
                                            ?>
                                            <tr>
                                                <!-- <td><input type="checkbox" name=""></td> -->

                                                <td><?php echo date('d-M-Y',strtotime($il->order_date));?></td>

                                                <td><?php echo $il->purchase_order;?></td>

                                                <!-- <td><input type="text" name="purchase_order" id="purchase_order" value="<?php echo $il->purchase_order;?>"></td> -->

                                                <td>
                                                    <a href="<?php echo base_url('admin/view_purchase_order/'.$il->id.''); ?>" style="color:blue;"><?php echo $il->company_name;?></a>
                                                </td>

                                                <!-- <td>
                                                    <?php
                                                    $status = $il->status;

                                                    if($status == 'Open')
                                                    {
                                                        echo '<span class="badge bg-info-light">Open</span>';
                                                    }
                                                    if($status == 'Billed')
                                                    {
                                                        echo '<span class="badge bg-success-light">Billed</span>';
                                                    }
                                                    ?>
                                                    
                                                </td> -->
                                                <!-- <span class="badge bg-danger-light"><?php echo $il->status;?></span> -->

                                                <td>
                                                    <?php

                                                    if($il->purchase_order == $il->order_no)
                                                    {
                                                        echo '<span class="badge bg-success-light">Billed</span>';
                                                    }
                                                    else
                                                    {
                                                        echo '<span class="badge bg-info-light">Open</span>';
                                                    }
                                                    ?>
                                                    
                                                </td>

                                                <td>₹<?php echo $il->totalamt;?></td>

                                                <td class="text-end"> 
                                                    <a href="<?php echo base_url('admin/edit_purchase_order/'.$il->id.''); ?>" class="btn btn-sm btn-white text-success me-2"><i class="far fa-edit me-1"></i> </a>

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
         
         //var purchase_order = $('#purchase_order').val();
         //alert(purchase_order);return;

         $('#deleteModal').modal('show');
         $('#btndelete').unbind().click(function(){
              $.ajax({
               type : 'ajax',
               method : 'post',
               url : '<?php echo base_url('admin/delete_purchase_order');?>',
               data : {'id':id},
               async : false,
               dataType : 'json',

               success : function(response)
               {
                 $("#deleteModal").modal('hide');
                 swal('Purchase Order Delete SuccessFully','');
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