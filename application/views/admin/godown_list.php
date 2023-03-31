<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>Godown</title>
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
                        <h3 class="page-title">Godown</h3>
                     </div>
                     <div class="col-auto">
                        <a href="<?php echo base_url('admin/add_godown');?>" class="btn btn-primary me-1">
                           <i class="fas fa-plus"></i> Add Godown
                        </a>
                        <!-- <a class="btn btn-primary filter-btn" href="javascript:void(0);" id="filter_search">
                           <i class="fas fa-filter"></i>
                        </a> -->
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
                  <div class="col-sm-12">
                     <div class="card card-table">
                        <div class="card-body">
                           <div class="table-responsive">
                              <table class="table table-center table-hover datatable">
                                 <thead class="thead-light">
                                    <tr>
                                       <th>Name</th>
                                       <th>Available Qty</th>
                                       <th>Date</th>
                                       <th class="text-end">Actions</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       foreach($godown_list as $cl)
                                       {
                                       
                                       ?>
                                    <tr>
                                       <td><a href="#" style="color:blue;"><?php echo $cl->name; ?></a></td>
                                       <td><?php echo $cl->available_qty+$cl->billqty-$cl->invoiceqty; ?></td>
                                       <td><?php echo date('d-M-Y', strtotime($cl->added_at)); ?></td>
                                       <td class="text-end">
                                          <a href="<?php echo base_url('admin/edit_godown/'.$cl->id.''); ?>" class="btn btn-sm btn-white text-success me-2"><i class="far fa-edit me-1"></i> Edit</a>
                                          <a href="javascript:;" data="<?php echo $cl->id; ?>" class="btn btn-sm btn-white text-danger me-2 confirm_delete"><i class="far fa-trash-alt me-1"></i>Delete</a>
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
      <script data-cfasync="false" src="../../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="<?php echo base_url();?>assets/js/jquery-3.6.0.min.js"></script>
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
                   url : '<?php echo base_url('admin/delete_godown');?>',
                   data : {'id':id},
                   async : false,
                   dataType : 'json',
         
                   success : function(response)
                   {
                     $("#deleteModal").modal('hide');
                     swal('Godown Delete SuccessFully','');
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