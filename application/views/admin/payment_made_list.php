<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Payment Made</title>
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
                        <div class="col">
                            <h3 class="page-title">Payments Made</h3>
                        </div>
                        <div class="col-auto">
                            <a href="<?php echo base_url('admin/add_payment_made');?>" class="btn btn-primary me-1"> <i class="fas fa-plus"></i> Add Payments Made </a>
                            <!-- <a class="btn btn-primary filter-btn" href="javascript:void(0);" id="filter_search"> <i class="fas fa-filter"></i> </a> -->
                        </div>
                    </div>
                </div>
                <div id="filter_inputs" class="card filter-card">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group"> <label>Name</label> <input type="text" class="form-control"> </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group"> <label>Email</label> <input type="text" class="form-control"> </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group"> <label>Phone</label> <input type="text" class="form-control"> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-center table-hover datatable">
                                        <thead class="thead-light">
                                            <tr>
                                                <!-- <th></th> -->
                                                <th>Date</th>
                                                <th>Reference#</th>
                                                <th>Customer Name</th>
                                                <th>Type</th>
                                                <th> Mode</th>
                                                <th>Received Amount</th>
                                                <th>Unused Amount </th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($payment_made_list as $pr)
                                            {
                                                
                                            ?>
                                            <tr>
                                                <!-- <td><input type="checkbox" name=""></td> -->
                                                <td> <?php echo date('d-M-Y',strtotime($pr->date));?> </td>
                                                <td><?php echo $pr->reference;?></td>
                                                <td><a href="<?php echo base_url('admin/view_payment_made/'.$pr->id.''); ?>" ><?php echo $pr->company_name; ?></a></td>
                                                <td>Payment Made</td>
                                                <td><?php echo $pr->payment_mode;?></td>
                                                <td>₹<?php if($pr->total == ''){echo '0.00';}else{echo $pr->total.'.00'; } ?></td>
                                                <td>-</td>
                                                <td class="text-end">
                                                    <a href="<?php echo base_url('admin/edit_payment_made/'.$pr->id.''); ?>" class="btn btn-sm btn-white text-success me-2"><i class="far fa-edit me-1"></i></a>

                                                    <a href="#" data="<?php echo $pr->id; ?>" data-bs-toggle="modal" class="btn btn-sm btn-white text-danger confirm_delete me-2"><i class="far fa-trash-alt me-1"></i></a> </td>
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

    <script data-cfasync="false" src="../../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/feather.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/datatables/datatables.min.js"></script>
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
               url : '<?php echo base_url('admin/delete_payment_made');?>',
               data : {'id':id},
               async : false,
               dataType : 'json',

               success : function(response)
               {
                 $("#deleteModal").modal('hide');
                 swal('Payment Made Delete SuccessFully','');
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