<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>View Inventory</title>
      <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/fontawesome.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/all.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/css/select2.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datetimepicker.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
   </head>
   <body>
      <div class="main-wrapper">
         <?php echo include('header.php'); ?>

         <?php echo include('sidebar.php'); ?>

         <div class="page-wrapper">
            <div class="content container-fluid">
               <div class="row justify-content-center">
                  <div class="col-xl-10">
                      <div class="text-md-end">
                        <div class="btn-group btn-group-sm d-print-none mb-4">
                           <a href="<?php echo base_url('admin/edit_inventory/'.$edit_inventory->id.''); ?>" class="btn btn-white text-black-50 shadow-none"><i class="fa fa-edit"></i>  Edit Item </a>
                           <a href="#" class="btn btn-primary shadow-none" data-bs-toggle="modal" data-bs-target="#add_items"><i class="fa fa-plus"></i> Add Adjustment</a>
                        </div>
                     </div>
                     <div class="modal custom-modal fade bank-details" id="add_items" role="dialog">
                        <div class="modal-dialog   modal-lg">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <div class="form-header text-start mb-0">
                                    <h6 class="mb-0">Add Adjustment </h6>
                                 </div>
                                 <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 <div class="bank-inner-details">
                                    <div class="row">
                                       <div class="col-lg-6 col-md-6">
                                          <div class="form-group">
                                             <div class="row">
                                                <div class="col-lg-4"><label>Item</label></div>
                                                <div class="col-lg-8" style="text-align: left; font-size: 14px;"> <span class="text-muted">4226 - 1 PORT POE EXTENDER</span>
                                                </div>
                                                <div class="row">
                                                   <div class="col-lg-4"><label style="font-size:11px;padding-bottom: 5px;">Adjustment Type
                                                      </label>
                                                   </div>
                                                   <div class="col-lg-8">
                                                      <select name="adjustmenttype"   class="form-control  " ng-change="typeChanged()" ng-model="adjustment.adjustment_type"  >
                                                         <option value="increase_qty" selected="selected">Increase quantity</option>
                                                         <option value="decrease_qty">Decrease quantity</option>
                                                         <option value="value">Revalution</option>
                                                      </select>
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-lg-4"><label>
                                                      Date
                                                      </label>
                                                   </div>
                                                   <div class="col-lg-8">
                                                      <input class="form-control datetimepicker" type="text" placeholder="15/02/2022">
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-lg-6 col-md-6">
                                          <div class="form-group">
                                             <div class="row">
                                                <div class="row">
                                                   <div class="col-lg-4"><label style="color: red;">Qty Today</label></div>
                                                   <div class="col-lg-8" style="text-align: left; font-size: 14px;">  
                                                      <input class="form-control  " type="text" placeholder=" ">
                                                      +
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-lg-4"><label>Adjustment
                                                      </label>
                                                   </div>
                                                   <div class="col-lg-8">
                                                      <input class="form-control  " type="text" placeholder=" ">
                                                      =
                                                   </div>
                                                </div>
                                                <div class="row">
                                                   <div class="col-lg-4"><label>New qty on hand
                                                      </label>
                                                   </div>
                                                   <div class="col-lg-8">
                                                      <input type="text" class="form-control" placeholder=" ">
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <hr>
                                       <div class="row">
                                          <div class="col-lg-12">
                                             <div class="row">
                                                <div class="col-lg-4"><label>Adjustment Account
                                                   </label>
                                                </div>
                                                <div class="col-lg-8">
                                                   <select name="adjustmenttype"   class="form-control  " ng-change="typeChanged()" ng-model="adjustment.adjustment_type"  >
                                                      <option value="increase_qty" selected="selected">Cost of Goods of Sold</option>
                                                   </select>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-md-12">
                                             <grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none;" class="cGcvT"></grammarly-extension>
                                             <grammarly-extension data-grammarly-shadow-root="true" style="mix-blend-mode: darken; position: absolute; top: 0px; left: 0px; pointer-events: none;" class="cGcvT"></grammarly-extension>
                                             <div class="form-group">
                                                <p> Notes </p>
                                                <div> <textarea name="notes" rows="2" class="form-control ng-pristine ng-valid ng-empty ng-touched" ng-model="salesPayment.notes" spellcheck="false" style="">                            </textarea> </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="modal-footer">
                                          <div class="bank-details-btn">
                                             <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn bank-cancel-btn me-2">Cancel</a>
                                             <a href="javascript:void(0);" class="btn bank-save-btn">Save Item</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-md-12">
                           <div class="card bg-white">
                              <div class="card-header">
                                 <h5 class="card-title"><?php echo $edit_inventory->name;?></h5>
                              </div>
                              <div class="card-body">
                                 <ul class="nav nav-tabs nav-tabs-solid">
                                    <li class="nav-item"><a class="nav-link active" href="#bottom-tab1" data-bs-toggle="tab">Overview</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-bs-toggle="tab">Sales</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#bottom-tab3" data-bs-toggle="tab">Purchase</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#bottom-tab4" data-bs-toggle="tab">Manufacturing</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#bottom-tab5" data-bs-toggle="tab">Adjustment</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#bottom-tab6" data-bs-toggle="tab">Godown</a></li>
                                 </ul>
                                 <div class="tab-content ">
                                    <div class="tab-pane  active show mylab"  id="bottom-tab1">
                                       <div class="row" ng-if="item.sales">
                                          <div class="col-md-12"> <b>Basic Information</b> </div>
                                       </div>
                                       <div class="row">
                                          <div class="col-md-8 col-sm-8 col-xs-12">
                                             <div class="form-group row"> 
                                                <label class="col-md-4 col-sm-4 col-xs-4 ml-10 control-label">Unit</label>
                                                <label class="col-md-6 col-sm-6 col-xs-6 control-label"><?php echo $edit_inventory->unit;?></label>
                                             </div>
                                             <div class="form-group row">
                                                <label class="col-md-4 col-sm-4 col-xs-4 ml-10 control-label">Type</label> 
                                                <label class="col-md-6 col-sm-6 col-xs-6 control-label"><?php echo $edit_inventory->good_type;?></label>
                                             </div>
                                             <!---->
                                             <div class="form-group row" ng-if="gstEnabled &amp;&amp; item.type == 'Goods'">
                                                <label class="col-md-4 col-sm-4 col-xs-4 ml-10 control-label">HSN</label>
                                                <label class="col-md-6 col-sm-6 col-xs-6 control-label"><?php echo $edit_inventory->hsn;?></label> 
                                             </div>
                                             <!----> <!----> <!----> <!---->
                                             <div class="form-group row" ng-if="inventoryPreference.EnableSku == 1"> <label class="col-md-4 col-sm-4 col-xs-4 ml-10 control-label">SKU</label>
                                                <label class="col-md-6 col-sm-6 col-xs-6 control-label"><?php echo $edit_inventory->sku;?></label>
                                             </div>
                                             <!----> <!----> <!----> <!----> <!---->
                                             <div class="form-group row" ng-if="gstEnabled">
                                                <label class="col-md-4 col-sm-4 col-xs-4 ml-10 control-label">Tax Type</label>
                                                <label class="col-md-6 col-sm-6 col-xs-6 control-label"><?php echo $edit_inventory->tax_type;?></label>
                                             </div>
                                             <!----> <!---->
                                             <div class="form-group row" ng-if="gstEnabled &amp;&amp; item.gst.rate == 1"> 
                                                <label class="col-md-4 col-sm-4 col-xs-4 ml-10 control-label"> Intrastate GST</label>
                                                <label class="col-md-6 col-sm-6 col-xs-6 control-label"><?php echo $edit_inventory->instrastate_gst;?></label> 
                                             </div>
                                             <!----> <!---->
                                             <div class="form-group row" ng-if="gstEnabled &amp;&amp; item.gst.rate == 1"> 
                                                <label class="col-md-4 col-sm-4 col-xs-4 ml-10 control-label"> Interstate GST</label>
                                                <label class="col-md-6 col-sm-6 col-xs-6 control-label"><?php echo $edit_inventory->insterstate_gst;?></label>
                                             </div>
                                             <!----> <!---->
                                             <div class="form-group row" ng-if="item.is_trackable"> 
                                                <label class="col-md-4 col-sm-4 col-xs-4 ml-10 control-label"> Inventory Asset Account</label> 
                                                <label class="col-md-6 col-sm-6 col-xs-6 control-label"><?php echo $edit_inventory->stock_account;?></label>
                                             </div>
                                             <!----> 
                                          </div>
                                          <!---->
                                          <div class="col-md-offset-1 col-md-3 col-sm-4 col-xs-6" ng-show="item.is_trackable">
                                             <div class="form-group row highlight">
                                                <div class="col-md-12 head text-center"> Opening Stock </div>
                                                <div class="col-md-12 sub-head text-center"><?php echo $edit_inventory->opening_stock;?></div>
                                             </div>
                                             <br> 
                                             <!-- <div class="form-group row highlight">
                                                <div class="col-md-12 head text-center"> Available </div>
                                                <div class="col-md-12 sub-head text-center"><?php echo $view_inventory_purchase->qty - $view_inventory_sales->qty;?></div>
                                             </div> -->

                                             <div class="form-group row highlight">
                                                <div class="col-md-12 head text-center"> Available </div>
                                                <div class="col-md-12 sub-head text-center">
                                                   <?php
                                                      echo $available_purchase_qty->qty - $available_sales_qty->qty;
                                                   ?>
                                                 
                                              </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row" ng-if="item.sales">
                                          <br>
                                          <div class="col-md-12"> <b>Sales Information</b> </div>
                                       </div>
                                       <div class="row" ng-if="item.sales">
                                          <div class="col-md-8 col-sm-8 col-xs-12">
                                             <div class="form-group row"> <label class="col-md-4 col-sm-4 col-xs-4 ml-10 control-label">Account</label> <label class="col-md-6 col-sm-6 col-xs-6 control-label"><?php echo $edit_inventory->sales_account;?></label> </div>
                                             <div class="form-group row"> <label class="col-md-4 col-sm-4 col-xs-4 ml-10 control-label">Rate</label> <label class="col-md-6 col-sm-6 col-xs-6 control-label"><?php echo $edit_inventory->sale_rate;?></label> </div>
                                             
                                          </div>
                                       </div>
                                       <div class="row" ng-if="item.purchase">
                                          <br>
                                          <div class="col-md-12"> <b>Purchase Information</b> </div>
                                       </div>
                                       <div class="row" ng-if="item.purchase">
                                          <div class="col-md-8 col-sm-8 col-xs-12">
                                             <div class="form-group row"> <label class="col-md-4 col-sm-4 col-xs-4 ml-10 control-label">Account</label> <label class="col-md-6 col-sm-6 col-xs-6 control-label"><?php echo $edit_inventory->purchase_account;?></label> </div>
                                             <div class="form-group row"> <label class="col-md-4 col-sm-4 col-xs-4 ml-10 control-label">Rate</label> <label class="col-md-6 col-sm-6 col-xs-6 control-label"><?php echo $edit_inventory->purchase_rate;?></label> </div>

                                          </div>
                                       </div>
                                    </div>
                                    <div class="tab-pane" id="bottom-tab2">
                                       <table class="invoice-table table table-center mb-0">
                                          <thead>
                                             <tr>
                                                <th>Date</th>
                                                <th>Voucher </th>
                                                <th>Voucher No</th>
                                                <th>Customer</th>
                                                <th>Quantity</th>
                                                <th>Unit</th>
                                                <th>Rate</th>
                                                <th class="text-end">Discount</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php foreach ($view_inventory_sales as $vis)
                                             {
                                                // code...
                                             
                                             ?>
                                             <tr>
                                                <td><?php echo $vis->invoice_date; ?></td>
                                                <td>Invoice</td>
                                                <td> <a href="<?php echo base_url('admin/edit_invoice/'.$vis->invoiceid.''); ?>"><?php echo $vis->invoice_no; ?></a></td>
                                                <td><?php echo $vis->name; ?></td>
                                                <td><?php echo $vis->qty; ?></td>
                                                <td>NOS</td>
                                                <td><?php echo $vis->rate; ?></td>
                                                <td class="text-end"><?php echo $vis->discount; ?></td>
                                             </tr>
                                             <?php } ?>
                                             
                                          </tbody>
                                       </table>
                                    </div>
                                    <div class="tab-pane" id="bottom-tab3">
                                       <table class="invoice-table table table-center mb-0">
                                          <thead>
                                             <tr>
                                                <th>Date</th>
                                                <th>Voucher </th>
                                                <th>Voucher No</th>
                                                <th>Vendor</th>
                                                <th>Quantity</th>
                                                <th>Unit</th>
                                                <th class="text-end">Rate</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <?php foreach ($view_inventory_purchase as $vip)
                                             {
                                                // code...
                                             
                                             ?>
                                             <tr>
                                                <td><?php echo $vip->bill_date; ?></td>
                                                <td>Bill</td>
                                                <td> <a href="<?php echo base_url('admin/edit_bill/'.$vip->billid.''); ?>"><?php echo $vip->bill_no; ?></a> </td>
                                                <td><?php echo $vip->company_name; ?></td>
                                                <td><?php echo $vip->qty; ?></td>
                                                <td>NOS</td>
                                                <td class="text-end"><?php echo $vip->rate; ?></td>
                                             </tr>
                                             <?php } ?>
                                          </tbody>
                                       </table>
                                    </div>
                                    <div class="tab-pane" id="bottom-tab4">
                                       <table class="table table-center table-hover ">
                                          <thead class="thead-light">
                                             <tr>
                                                <th>Date</th>
                                                <th>Production Type</th>
                                                <th>Voucher No</th>
                                                <th>Title</th>
                                                <th>Quantity</th>
                                                <th> Price </th>
                                                <th> Total </th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                <td>16 Nov 2020</td>
                                                <td><a href="#">    source</a></td>
                                                <td>1801 </td>
                                                <td>-</td>
                                                <td>5.0000  </td>
                                                <td>2005.0000  </td>
                                                <td>3005.0000  </td>
                                             </tr>
                                             <tr>
                                                <td>16 Nov 2020</td>
                                                <td><a href="#">        destination</a></td>
                                                <td>1801 </td>
                                                <td>-</td>
                                                <td>5.0000  </td>
                                                <td>2005.0000  </td>
                                                <td>3005.0000  </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                    <div class="tab-pane" id="bottom-tab5">
                                       <table class="invoice-table table table-center mb-0">
                                          <thead>
                                             <tr>
                                                <th>Date</th>
                                                <th>Note</th>
                                                <th>Type</th>
                                                <th>Adjustment
                                                </th>
                                                <th class="text-end">action</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                <td>24-11-2022</td>
                                                <td><a href="" data-bs-toggle="modal" data-bs-target="#add_items">test</a></td>
                                                <td> Increse QTY </td>
                                                <td>1</td>
                                                <td class="text-end"><a href="javascript:void(0);" class="btn btn-sm btn-white text-danger me-2"><i class="far fa-trash-alt me-1"></i></a></td>
                                             </tr>
                                             <tr>
                                                <td>24-11-2022</td>
                                                <td><a href="" data-bs-toggle="modal" data-bs-target="#add_items">test</a></td>
                                                <td> Increse QTY </td>
                                                <td>1</td>
                                                <td class="text-end"><a href="javascript:void(0);" class="btn btn-sm btn-white text-danger me-2"><i class="far fa-trash-alt me-1"></i></a></td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>

                                    <div class="tab-pane" id="bottom-tab6">
                                       <table   class="invoice-table table table-border">
                                          <thead>
                                             <tr>
                                                <th>Godown</th>
                                                <th>Quantity</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <!---->
                                             <tr ng-repeat="history in itemGodowns track by $index" class="cursor-pointer" ng-click="goToView(history)">
                                                <td>Main Location</td>
                                                <td>10</td>
                                             </tr>
                                             <!---->
                                             <tr ng-repeat="history in itemGodowns track by $index" class="cursor-pointer" ng-click="goToView(history)">
                                                <td>PUNE 1</td>
                                                <td>5</td>
                                             </tr>
                                             <!----> 
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

            </div>
         </div>
      </div>

         </div>
      </div>
      </div>
      </div>
      <script src="<?php echo base_url();?>assets/js/jquery-3.6.0.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/feather.min.js"></script>
      <script src="<?php echo base_url();?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
      <script src="<?php echo base_url();?>assets/plugins/select2/js/select2.min.js"></script>
      <script src="<?php echo base_url();?>assets/plugins/moment/moment.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script>
      <script src="<?php echo base_url();?>assets/js/script.js"></script>
   </body>
</html>