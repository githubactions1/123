<!DOCTYPE html>
<html lang="en">
   
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>Vendor</title>
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
                        <h3 class="page-title">Vendors</h3>
                     </div>
                     <div class="col-auto">
                           <a href="<?php echo base_url('admin/add_vendor'); ?>" class="btn btn-primary me-1" >
                           <i data-feather="plus-circle"></i> Add New Vendor
                           </a>
                     </div>
                  </div>
               </div>
               <div class="modal custom-modal fade bank-details" id="add_items" role="dialog">
                  <div class="modal-dialog modal-dialog-centered modal-lg">
                     <div class="modal-content">
                        <div class="modal-header">
                           <div class="form-header text-start mb-0">
                              <h6 class="mb-0">Create New Item</h6>
                           </div>
                           <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <div class="bank-inner-details">
                              <div class="row">
                                 <form action="#">
                                    <div class="row">
                                       <div class="col-lg-3">
                                          <div class="form-group">
                                             <input type="text" class="form-control" placeholder="Name">
                                          </div>
                                       </div>
                                       <div class="col-lg-3">
                                          <div class="form-group">
                                             <input type="text" class="form-control" placeholder="Company Name">
                                          </div>
                                       </div>
                                       <div class="col-lg-3">
                                          <div class="form-group">
                                             <input type="text" class="form-control" placeholder="Display Name
                                                ">
                                          </div>
                                       </div>
                                       <div class="col-lg-3">
                                          <div class="form-group">
                                             <input type="text" class="form-control" placeholder="Email">
                                          </div>
                                       </div>
                                       <div class="col-lg-3">
                                          <div class="form-group">
                                             <input type="text" class="form-control" placeholder="Phone">
                                          </div>
                                       </div>
                                       <div class="col-lg-3">
                                          <div class="form-group">
                                             <input type="text" class="form-control" placeholder="Website">
                                          </div>
                                       </div>
                                       <div class="col-lg-3">
                                          <div class="form-group">
                                             <input type="text" class="form-control" placeholder="Sales Person
                                                ">
                                          </div>
                                       </div>
                                       <div class="col-lg-3">
                                          <div class="form-group">
                                             <input type="text" class="form-control" placeholder="TCS Purchase Goods
                                                ">
                                          </div>
                                       </div>
                                       <div class="col-lg-12">
                                          <hr>
                                       </div>
                                       <div class="col-lg-12">
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
                                                      <div class="col-lg-3">
                                                         <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Payment Tems
                                                               ">
                                                         </div>
                                                      </div>
                                                      <div class="col-lg-3">
                                                         <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Gst Treatment
                                                               ">
                                                         </div>
                                                      </div>
                                                      <div class="col-lg-3">
                                                         <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="GST No.
                                                               ">
                                                         </div>
                                                      </div>
                                                      <div class="col-lg-3">
                                                         <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Place of Maharashtra
                                                               ">
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="tab-pane" id="bottom-tab2">
                                                   <div class="row">
                                                      <div class="col-lg-3">
                                                         <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Payment Tems
                                                               ">
                                                         </div>
                                                      </div>
                                                      <div class="col-lg-3">
                                                         <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Gst Treatment
                                                               ">
                                                         </div>
                                                      </div>
                                                      <div class="col-lg-3">
                                                         <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="GST No.
                                                               ">
                                                         </div>
                                                      </div>
                                                      <div class="col-lg-3">
                                                         <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Place of Maharashtra
                                                               ">
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="tab-pane" id="bottom-tab3">
                                                   <div class="row">
                                                      <div class="col-lg-3">
                                                         <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Payment Tems
                                                               ">
                                                         </div>
                                                      </div>
                                                      <div class="col-lg-3">
                                                         <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Gst Treatment
                                                               ">
                                                         </div>
                                                      </div>
                                                      <div class="col-lg-3">
                                                         <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="GST No.
                                                               ">
                                                         </div>
                                                      </div>
                                                      <div class="col-lg-3">
                                                         <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Place of Maharashtra
                                                               ">
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="text-end mt-4">
                                          <button type="submit" class="btn btn-primary">Add Vender</button>
                                       </div>
                                 </form>
                                 </div>
                                 </form>
                              </div>
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
                              <label>Company Name</label>
                              <input type="text" class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                           <div class="form-group">
                              <label>Amount </label>
                              <input type="text" class="form-control">
                           </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                           <div class="form-group">
                              <label>Status</label>
                              <select class="form-control">
                              </select>
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
                                       <!-- <th></th> -->
                                       <th>Name</th>
                                       <th>Company Name</th>
                                       <th>Email</th>
                                       <th>Phone</th>
                                       <th>Receivables</th>
                                       <th>Payables</th>
                                       <th class="text-end">Actions</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    foreach($vendor_list as $cl)
                                    {
                                    
                                    ?>
                                    <tr>
                                       <!-- <td><input type="checkbox" name=""></td> -->
                                       <td>
                                          <h2 class="table-avatar">
                                             <a href="<?php echo base_url('admin/view_vendor/'.$cl->id.''); ?>" style="color:blue;"><?php echo $cl->first_name; ?> <?php echo $cl->last_name; ?></a>
                                          </h2>
                                       </td>
                                       <td><?php echo $cl->company_name; ?></td>
                                       <!-- <td><a href="https://dreamguystech.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="3351415a525d595c5b5d405c5d73564b525e435f561d505c5e"><?php echo $cl->email; ?></a></td> -->
                                       <td><?php echo $cl->email; ?></td>
                                       <td><?php echo $cl->mobile; ?></td>
                                       <td>₹00.00</td>
                                       <td>₹<?php echo $cl->opening_bal; ?></td>
                                       <td class="text-end">
                                          <a href="<?php echo base_url('admin/edit_vendor/'.$cl->id.''); ?>" class="btn btn-sm btn-white text-success me-2"><i class="far fa-edit me-1"></i></a>
                                          <a href="javascript:void(0);" data="<?php echo $cl->id; ?>" class="btn btn-sm btn-white text-danger me-2 confirm_delete"><i class="far fa-trash-alt me-1"></i></a>
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
      <script data-cfasync="false" src="../../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js">
         
      </script><script src="<?php echo base_url();?>assets/js/jquery-3.6.0.min.js"></script>
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
                   url : '<?php echo base_url('admin/delete_vendor');?>',
                   data : {'id':id},
                   async : false,
                   dataType : 'json',
         
                   success : function(response)
                   {
                     $("#deleteModal").modal('hide');
                     swal('Vendor Delete SuccessFully','');
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