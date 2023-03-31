<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Banking</title>
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
                            <h3 class="page-title">Banking </h3>
                        </div>
                        <div class="col-auto">
                             <a href="<?php echo base_url('admin/add_bank'); ?>" class="btn btn-primary"> <i data-feather="plus-circle"></i> Add Bank Account</a>
                        </div>
                    </div>
                </div>
                <div class="modal custom-modal fade bank-details" id="add_items" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="form-header text-start mb-0">
                                    <h6 class="mb-0">Create New Item</h6>
                                </div> <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                            </div>
                            <div class="modal-body">
                                <div class="bank-inner-details">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group"> <label>Purchase Status </label> <select class="form-select form-control">
                                                    <option>Active</option>
                                                    <option>Hold</option>
                                                </select> </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group"> <label>Payment Status </label> <select class="form-select form-control">
                                                    <option>Paid</option>
                                                    <option>Unpaid</option>
                                                </select> </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group"> <label>Amount </label> <input type="text" class="form-control" placeholder=""> </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group"> <label>Paid </label> <input type="text" class="form-control" placeholder=""> </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group"> <label>Bal. </label> <input type="text" class="form-control" placeholder=""> </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group"> <label>Date</label> <input type="text" class="form-control" placeholder=" "> </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group"> <label>Company Name</label> <input type="text" class="form-control" placeholder=" "> </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group"> <label>Description (Optional) </label> <textarea class="form-control" placeholder="Add item description"></textarea> </div>
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
                                <div class="form-group"> <label>Company Name</label> <input type="text" class="form-control"> </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group"> <label>Amount </label> <input type="text" class="form-control"> </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group"> <label>Status</label> <select class="form-control"> </select> </div>
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
                                                <th>Account Name</th>
                                                <th>Account Code </th>
                                                <th>Account Number</th>
                                                <th> Status</th>
                                                <th>Balance</th>
                                                <th>Reconclle (pending)</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($bank_list as $bl)
                                            {
                                                
                                            ?>
                                            <tr>
                                                <td><a href="#" style="color:blue;"><?php echo $bl->account_name; ?></a></td>
                                                <td><?php echo $bl->account_code; ?></td>
                                                <td><?php echo $bl->account_no; ?></td>
                                                <td>
                                                    <?php
                                                    if($bl->status == 'Active')
                                                    {
                                                        echo '<span class="badge badge-pill bg-success-light">Active</span>';
                                                    }
                                                    else
                                                    {
                                                        echo '<span class="badge badge-pill bg-danger-light">Inactive</span>';
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo $bl->received_total - $bl->made_total; ?></td>
                                                <td>0.00</td>
                                                <td class="text-end">
                                                    <a href="<?php echo base_url('admin/edit_bank/'.$bl->id.''); ?>" class="btn btn-sm btn-white text-success me-2"><i class="far fa-edit me-1"></i> </a>

                                                    <a class="btn btn-sm btn-white text-danger confirm_delete" href="#" data="<?php echo $bl->id; ?>" data-bs-toggle="modal" data-bs-target="#delete_paid"><i class="far fa-trash-alt me-1"></i> </a>
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
               url : '<?php echo base_url('admin/delete_bank');?>',
               data : {'id':id},
               async : false,
               dataType : 'json',

               success : function(response)
               {
                 $("#deleteModal").modal('hide');
                 swal('Bank Delete SuccessFully','');
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