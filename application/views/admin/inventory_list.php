<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Inventory</title>
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/css/select2.min.css">
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
                            <h3 class="page-title">Product Inventory</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a> </li>
                                <li class="breadcrumb-item active">Product Inventory</li>
                            </ul>
                        </div>
                        <div class="col-auto">
                            <a href="<?php echo base_url('admin/add_inventory');?>" class="btn btn-primary me-1"> <i class="fas fa-plus"></i> Add Inventory </a>
                            <!-- <a class="btn btn-primary filter-btn" href="javascript:void(0);" id="filter_search"> <i class="fas fa-filter"></i> </a> -->
                            <!-- <div class="dropdown dropdown-action"> <a href="#" class="action-icon dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
                                <div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item" href="edit-invoice.html"><i class="far fa-edit me-2"></i>Edit</a> <a class="dropdown-item" href="javascript:void(0);"><i class="far fa-trash-alt me-2"></i>Delete</a> <a class="dropdown-item" href="view-estimate.html"><i class="far fa-eye me-2"></i>View</a> <a class="dropdown-item" href="javascript:void(0);"><i class="far fa-file-alt me-2"></i>Convert to Invoice</a> <a class="dropdown-item" href="javascript:void(0);"><i class="far fa-check-circle me-2"></i>Mark as sent</a> <a class="dropdown-item" href="javascript:void(0);"><i class="far fa-paper-plane me-2"></i>Send Estimate</a> <a class="dropdown-item" href="javascript:void(0);"><i class="far fa-check-circle me-2"></i>Export </a> <a class="dropdown-item" href="javascript:void(0);"><i class="far fa-times-circle me-2"></i>Import</a> </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <!-- <div id="filter_inputs" class="card filter-card">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group"> <label>Product Name</label> <input type="text" class="form-control"> </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Category :</label>
                                    <select class="select">
                                        <option>Select Status</option>
                                        <option value="Draft">Draft</option>
                                        <option value="Sent">Sent</option>
                                        <option value="Viewed">Viewed</option>
                                        <option value="Expired">Expired</option>
                                        <option value="Accepted">Accepted</option>
                                        <option value="Rejected">Rejected</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group"> <label>Product Brand</label> <input type="text" class="form-control"> </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-stripped table-hover datatable">
                                        <thead class="thead-light">
                                            <tr>
                                                <!-- <th></th> -->
                                                <th>Name </th>
                                                <th>Description </th>
                                                <th> HSN/SAC </th>
                                                <th> Sales Rate </th>
                                                <th> Purchase Rate </th>
                                                <th> Stock In Hand </th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($inventory_list as $il)
                                            {
                                                
                                            
                                            ?>
                                            <tr>
                                                <!-- <td><input type="checkbox" name=""></td> -->
                                                <td><a href="<?php echo base_url('admin/view_inventory/'.$il->id.''); ?>" style="color:blue;"> <?php echo $il->name;?></a></td>
                                                <td><?php echo $il->sale_description;?> </td>
                                                <td><?php echo $il->hsn;?></td>
                                                <td>₹<?php echo $il->sale_rate;?></td>
                                                <td>₹<?php echo $il->purchase_rate;?></td>
                                                <!-- <td><span class="badge bg-success-light"><?php echo $il->opening_stock;?></span></td> -->
                                                <td><?php echo $il->opening_stock;?></td>
                                                <td class="text-end">
                                                    <a href="<?php echo base_url('admin/edit_inventory/'.$il->id.''); ?>" class="btn btn-sm btn-white text-success me-2"><i class="far fa-edit me-1"></i> </a>

                                                    <a class="btn btn-sm btn-white text-danger confirm_delete" href="javascript:;" data="<?php echo $il->id; ?>"><i class="far fa-trash-alt me-1"></i> </a>

                                                    <!-- <div class="dropdown dropdown-action">
                                                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="<?php echo base_url('admin/edit_inventory/'.$il->id.''); ?>"><i class="far fa-edit me-2"></i>Edit</a> <a class="dropdown-item confirm_delete" href="javascript:;" data="<?php echo $il->id; ?>"><i class="far fa-trash-alt me-2"></i>Delete</a> <a class="dropdown-item" href="view-estimate.html"><i class="far fa-eye me-2"></i>View</a> <a class="dropdown-item" href="javascript:void(0);"><i class="far fa-file-alt me-2"></i>Convert to Invoice</a> <a class="dropdown-item" href="javascript:void(0);"><i class="far fa-check-circle me-2"></i>Mark as sent</a> <a class="dropdown-item" href="javascript:void(0);"><i class="far fa-paper-plane me-2"></i>Send Estimate</a> <a class="dropdown-item" href="javascript:void(0);"><i class="far fa-check-circle me-2"></i>Mark as Accepted</a> <a class="dropdown-item" href="javascript:void(0);"><i class="far fa-times-circle me-2"></i>Mark as Rejected</a>
                                                        </div>
                                                    </div> -->
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
    <script src="<?php echo base_url();?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/feather.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/select2/js/select2.min.js"></script>
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
               url : '<?php echo base_url('admin/delete_inventory');?>',
               data : {'id':id},
               async : false,
               dataType : 'json',

               success : function(response)
               {
                 $("#deleteModal").modal('hide');
                 swal('Inventory Delete SuccessFully','');
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