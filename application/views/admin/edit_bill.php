<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Edit Bill</title>
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/icons/feather/feather.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    <link href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
</head>

<body>
    <div class="main-wrapper">
        <?php echo include('header.php'); ?>

        <?php echo include('sidebar.php'); ?>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header invoices-page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3>Update Bill</h3>
                        </div>
                        <div class="col-auto"> </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card invoices-add-card">
                            <div class="card-body">
                                <form class="invoices-form" method="post" id="bill_form" action="<?php echo base_url('admin/update_bill');?>" enctype="multipart/form-data" autocomplete="off">
                                    <input type="hidden" name="bill_id" id="bill_id" value="<?php echo $edit_bill->id; ?>">
                                    <div class="invoices-main-form">
                                        <div class="row">
                                            <div class="col-xl-2 col-md-6 col-sm-12 col-12">
                                                <div class="form-group"> 
                                                    <label style="color:#f00">Vendor Name</label>
                                                    <div>
                                                        <select class="js-example-basic-single select2 " name="vendor_name" id="vendor_name">
                                                            <option value="">Select Vendor </option>
                                                             <?php
                                                             foreach ($vendor_name as $cn)
                                                             {
                                                             
                                                             ?>
                                                             <option value="<?php echo $cn->id; ?>" <?php if($edit_bill->vendor_name == $cn->id){echo 'selected'; } ?>><?php echo $cn->company_name; ?></option>
                                                             
                                                             <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <div class=" "> 
                                                        <span>
                                                            <label style="color:#f00"> Bill Date</label>
                                                            <input class="form-control datetimepicker" type="text" name="bill_date" id="bill_date" value="<?php echo $edit_bill->bill_date;?>" placeholder="15/02/2022">
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <div class=" ">
                                                        <span>
                                                            <label style="color:#f00">Due Date</label>
                                                            <input class="form-control datetimepicker" type="text" name="due_date" id="due_date" value="<?php echo $edit_bill->due_date;?>" placeholder="15/02/2022">
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-xl-2 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label style="color:#f00">Bill #</label>
                                                    <input type="text" class="form-control" name="bill_no" id="bill_no" value="<?php echo $edit_bill->bill_no;?>">
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label style="color:#f00">Source of Supply</label>
                                                    <select class="form-control" name="source_of_supply" id="source_of_supply">
                                                        <option value="">State/Province</option>
                                                        <option value="Andaman and Nicobar Islands" <?php if($edit_bill->source_of_supply == 'Andaman and Nicobar Islands'){ echo 'selected'; }?>>Andaman and Nicobar Islands</option>
                                                        <option value="Andhra Pradesh (Before Division)" <?php if($edit_bill->source_of_supply == 'Andhra Pradesh (Before Division)'){echo 'selected'; }?>>Andhra Pradesh (Before Division)</option>
                                                        <option value="Andhra Pradesh (New)" <?php if($edit_bill->source_of_supply == 'Andhra Pradesh (New)'){echo 'selected'; }?>>Andhra Pradesh (New)</option>
                                                        <option value="Arunachal Pradesh" <?php if($edit_bill->source_of_supply == 'Arunachal Pradesh'){echo 'selected';}?>>Arunachal Pradesh</option>
                                                        <option value="Assam" <?php if($edit_bill->source_of_supply == 'Assam'){echo 'selected';}?>>Assam</option>
                                                        <option value="Bihar" <?php if($edit_bill->source_of_supply == 'Bihar'){echo 'selected';}?>>Bihar</option>
                                                        <option value="Chandigarh" <?php if($edit_bill->source_of_supply == 'Chandigarh'){echo 'selected';}?>>Chandigarh</option>
                                                        <option value="Chhattisgarh" <?php if($edit_bill->source_of_supply == 'Chhattisgarh'){echo 'selected';}?>>Chhattisgarh</option>
                                                        <option value="Dadra And Nagar Haveli And Daman And Diu" <?php if($edit_bill->source_of_supply == 'Dadra And Nagar Haveli And Daman And Diu'){echo 'selected';}?>>Dadra And Nagar Haveli And Daman And Diu</option>
                                                        <option value="Daman and Diu" <?php if($edit_bill->source_of_supply == 'Daman and Diu'){echo 'selected';}?>>Daman and Diu</option>
                                                        <option value="Delhi" <?php if($edit_bill->source_of_supply == 'Delhi'){echo 'selected';}?>>Delhi</option>
                                                        <option value="Goa" <?php if($edit_bill->source_of_supply == 'Goa'){echo 'selected';}?>>Goa</option>
                                                        <option value="Gujarat" <?php if($edit_bill->source_of_supply == 'Gujarat'){echo 'selected';}?>>Gujarat</option>
                                                        <option value="Haryana" <?php if($edit_bill->source_of_supply == 'Haryana'){echo 'selected';}?>>Haryana</option>
                                                        <option value="Himachal Pradesh" <?php if($edit_bill->source_of_supply == 'Himachal Pradesh'){echo 'selected';}?>>Himachal Pradesh</option>
                                                        <option value="Jammu and Kashmir" <?php if($edit_bill->source_of_supply == 'Jammu and Kashmir'){echo 'selected';}?>>Jammu and Kashmir</option>
                                                        <option value="Jharkhand" <?php if($edit_bill->source_of_supply == 'Jharkhand'){echo 'selected';}?>>Jharkhand</option>
                                                        <option value="Karnataka" <?php if($edit_bill->source_of_supply == 'Karnataka'){echo 'selected';}?>>Karnataka</option>
                                                        <option value="Kerala" <?php if($edit_bill->source_of_supply == 'Kerala'){echo 'selected';}?>>Kerala</option>
                                                        <option value="Ladakh" <?php if($edit_bill->source_of_supply == 'Ladakh'){echo 'selected';}?>>Ladakh</option>
                                                        <option value="Lakshadweep" <?php if($edit_bill->source_of_supply == 'Lakshadweep'){echo 'selected';}?>>Lakshadweep</option>
                                                        <option value="Madhya Pradesh" <?php if($edit_bill->source_of_supply == 'Madhya Pradesh'){echo 'selected';}?>>Madhya Pradesh</option>
                                                        <option value="Maharashtra" <?php if($edit_bill->source_of_supply == 'Maharashtra'){echo 'selected';}?>>Maharashtra</option>
                                                        <option value="Manipur" <?php if($edit_bill->source_of_supply == 'Manipur'){echo 'selected';}?>>Manipur</option>
                                                        <option value="Meghalaya" <?php if($edit_bill->source_of_supply == 'Meghalaya'){echo 'selected';}?>>Meghalaya</option>
                                                        <option value="Mizoram" <?php if($edit_bill->source_of_supply == 'Mizoram'){echo 'selected';}?>>Mizoram</option>
                                                        <option value="Nagaland" <?php if($edit_bill->source_of_supply == 'Nagaland'){echo 'selected';}?>>Nagaland</option>
                                                        <option value="Odisha" <?php if($edit_bill->source_of_supply == 'Odisha'){echo 'selected';}?>>Odisha</option>
                                                        <option value="Other Territory" <?php if($edit_bill->source_of_supply == 'Other Territory'){echo 'selected';}?>>Other Territory</option>
                                                        <option value="Puducherry" <?php if($edit_bill->source_of_supply == 'Puducherry'){echo 'selected';}?>>Puducherry</option>
                                                        <option value="Punjab" <?php if($edit_bill->source_of_supply == 'Punjab'){echo 'selected';}?>>Punjab</option>
                                                        <option value="Rajasthan" <?php if($edit_bill->source_of_supply == 'Rajasthan'){echo 'selected';}?>>Rajasthan</option>
                                                        <option value="Sikkim" <?php if($edit_bill->source_of_supply == 'Sikkim'){echo 'selected';}?>>Sikkim</option>
                                                        <option value="Tamil Nadu" <?php if($edit_bill->source_of_supply == 'Tamil Nadu'){echo 'selected';}?>>Tamil Nadu</option>
                                                        <option value="Telangana" <?php if($edit_bill->source_of_supply == 'Telangana'){echo 'selected';}?>>Telangana</option>
                                                        <option value="Tripura" <?php if($edit_bill->source_of_supply == 'Tripura'){echo 'selected';}?>>Tripura</option>
                                                        <option value="Uttar Pradesh" <?php if($edit_bill->source_of_supply == 'Uttar Pradesh'){echo 'selected';}?>>Uttar Pradesh</option>
                                                        <option value="Uttarakhand" <?php if($edit_bill->source_of_supply == 'Uttarakhand'){echo 'selected';}?>>Uttarakhand</option>
                                                        <option value="West Bengal" <?php if($edit_bill->source_of_supply == 'West Bengal'){echo 'selected';}?>>West Bengal</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label style="color:#f00">Destination of Supply </label>
                                                    <select class="form-control" name="destination_of_supply" id="destination_of_supply">
                                                        <option value="">State/Province</option>
                                                        <option value="Andaman and Nicobar Islands" <?php if($edit_bill->destination_of_supply == 'Andaman and Nicobar Islands'){ echo 'selected'; }?>>Andaman and Nicobar Islands</option>
                                                        <option value="Andhra Pradesh (Before Division)" <?php if($edit_bill->destination_of_supply == 'Andhra Pradesh (Before Division)'){echo 'selected'; }?>>Andhra Pradesh (Before Division)</option>
                                                        <option value="Andhra Pradesh (New)" <?php if($edit_bill->destination_of_supply == 'Andhra Pradesh (New)'){echo 'selected'; }?>>Andhra Pradesh (New)</option>
                                                        <option value="Arunachal Pradesh" <?php if($edit_bill->destination_of_supply == 'Arunachal Pradesh'){echo 'selected';}?>>Arunachal Pradesh</option>
                                                        <option value="Assam" <?php if($edit_bill->destination_of_supply == 'Assam'){echo 'selected';}?>>Assam</option>
                                                        <option value="Bihar" <?php if($edit_bill->destination_of_supply == 'Bihar'){echo 'selected';}?>>Bihar</option>
                                                        <option value="Chandigarh" <?php if($edit_bill->destination_of_supply == 'Chandigarh'){echo 'selected';}?>>Chandigarh</option>
                                                        <option value="Chhattisgarh" <?php if($edit_bill->destination_of_supply == 'Chhattisgarh'){echo 'selected';}?>>Chhattisgarh</option>
                                                        <option value="Dadra And Nagar Haveli And Daman And Diu" <?php if($edit_bill->destination_of_supply == 'Dadra And Nagar Haveli And Daman And Diu'){echo 'selected';}?>>Dadra And Nagar Haveli And Daman And Diu</option>
                                                        <option value="Daman and Diu" <?php if($edit_bill->destination_of_supply == 'Daman and Diu'){echo 'selected';}?>>Daman and Diu</option>
                                                        <option value="Delhi" <?php if($edit_bill->destination_of_supply == 'Delhi'){echo 'selected';}?>>Delhi</option>
                                                        <option value="Goa" <?php if($edit_bill->destination_of_supply == 'Goa'){echo 'selected';}?>>Goa</option>
                                                        <option value="Gujarat" <?php if($edit_bill->destination_of_supply == 'Gujarat'){echo 'selected';}?>>Gujarat</option>
                                                        <option value="Haryana" <?php if($edit_bill->destination_of_supply == 'Haryana'){echo 'selected';}?>>Haryana</option>
                                                        <option value="Himachal Pradesh" <?php if($edit_bill->destination_of_supply == 'Himachal Pradesh'){echo 'selected';}?>>Himachal Pradesh</option>
                                                        <option value="Jammu and Kashmir" <?php if($edit_bill->destination_of_supply == 'Jammu and Kashmir'){echo 'selected';}?>>Jammu and Kashmir</option>
                                                        <option value="Jharkhand" <?php if($edit_bill->destination_of_supply == 'Jharkhand'){echo 'selected';}?>>Jharkhand</option>
                                                        <option value="Karnataka" <?php if($edit_bill->destination_of_supply == 'Karnataka'){echo 'selected';}?>>Karnataka</option>
                                                        <option value="Kerala" <?php if($edit_bill->destination_of_supply == 'Kerala'){echo 'selected';}?>>Kerala</option>
                                                        <option value="Ladakh" <?php if($edit_bill->destination_of_supply == 'Ladakh'){echo 'selected';}?>>Ladakh</option>
                                                        <option value="Lakshadweep" <?php if($edit_bill->destination_of_supply == 'Lakshadweep'){echo 'selected';}?>>Lakshadweep</option>
                                                        <option value="Madhya Pradesh" <?php if($edit_bill->destination_of_supply == 'Madhya Pradesh'){echo 'selected';}?>>Madhya Pradesh</option>
                                                        <option value="Maharashtra" <?php if($edit_bill->destination_of_supply == 'Maharashtra'){echo 'selected';}?>>Maharashtra</option>
                                                        <option value="Manipur" <?php if($edit_bill->destination_of_supply == 'Manipur'){echo 'selected';}?>>Manipur</option>
                                                        <option value="Meghalaya" <?php if($edit_bill->destination_of_supply == 'Meghalaya'){echo 'selected';}?>>Meghalaya</option>
                                                        <option value="Mizoram" <?php if($edit_bill->destination_of_supply == 'Mizoram'){echo 'selected';}?>>Mizoram</option>
                                                        <option value="Nagaland" <?php if($edit_bill->destination_of_supply == 'Nagaland'){echo 'selected';}?>>Nagaland</option>
                                                        <option value="Odisha" <?php if($edit_bill->destination_of_supply == 'Odisha'){echo 'selected';}?>>Odisha</option>
                                                        <option value="Other Territory" <?php if($edit_bill->destination_of_supply == 'Other Territory'){echo 'selected';}?>>Other Territory</option>
                                                        <option value="Puducherry" <?php if($edit_bill->destination_of_supply == 'Puducherry'){echo 'selected';}?>>Puducherry</option>
                                                        <option value="Punjab" <?php if($edit_bill->destination_of_supply == 'Punjab'){echo 'selected';}?>>Punjab</option>
                                                        <option value="Rajasthan" <?php if($edit_bill->destination_of_supply == 'Rajasthan'){echo 'selected';}?>>Rajasthan</option>
                                                        <option value="Sikkim" <?php if($edit_bill->destination_of_supply == 'Sikkim'){echo 'selected';}?>>Sikkim</option>
                                                        <option value="Tamil Nadu" <?php if($edit_bill->destination_of_supply == 'Tamil Nadu'){echo 'selected';}?>>Tamil Nadu</option>
                                                        <option value="Telangana" <?php if($edit_bill->destination_of_supply == 'Telangana'){echo 'selected';}?>>Telangana</option>
                                                        <option value="Tripura" <?php if($edit_bill->destination_of_supply == 'Tripura'){echo 'selected';}?>>Tripura</option>
                                                        <option value="Uttar Pradesh" <?php if($edit_bill->destination_of_supply == 'Uttar Pradesh'){echo 'selected';}?>>Uttar Pradesh</option>
                                                        <option value="Uttarakhand" <?php if($edit_bill->destination_of_supply == 'Uttarakhand'){echo 'selected';}?>>Uttarakhand</option>
                                                        <option value="West Bengal" <?php if($edit_bill->destination_of_supply == 'West Bengal'){echo 'selected';}?>>West Bengal</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-md-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label style="color:#f00">Order #</label>
                                                    <input type="text" class="form-control" name="order_no" id="order_no" value="<?php echo $edit_bill->order_no;?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-2 ">
                                                <div class="form-group">
                                                    <label>Item Rates Are </label>
                                                    <select class="form-control" name="item_rate" id="item_rate">
                                                        <option value="tax_exclusive" <?php if($edit_bill->item_rate == 'tax_exclusive'){echo 'selected';}?>>Tax Exclusive</option>
                                                        <option value="tax_inclusive" <?php if($edit_bill->item_rate == 'tax_inclusive'){echo 'selected';}?>>Tax Inclusive </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="rowbb">
                                                <div class="invoice-add-table">
                                                    <div class="table-responsive">
                                                        <table class="table table-center add-table-items">
                                                            <thead>
                                                                <tr>
                                                                    <th></th>
                                                                    <th width="180px">Items</th>
                                                                    <th width="200px">Descriptions </th>
                                                                    <th>Godown</th>
                                                                    <th>Qty</th>
                                                                    <th>Rate</th>
                                                                    <th>Account</th>
                                                                    <th>Disc(%)</th>
                                                                    <th>Tax Rate</th>
                                                                    <th>Tax Amt</th>
                                                                    <th>Total</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php 
                                                                for ($i=0; $i < count($edit_bill_entries); $i++) {
                                                                ?>
                                                                
                                                                <tr class="add-row">
                                                                    <td><input type="hidden" name="iid[]" class="iid" value="<?php echo $i; ?>"></td>
                                                                    <td><input type="text" class="form-control" name="item_<?php echo $i;?>" id="item_<?php echo $i;?>" onkeyup="getitemsdetails('item_<?php echo $i;?>','description_<?php echo $i;?>','godown_<?php echo $i;?>','qty_<?php echo $i;?>','rate_<?php echo $i;?>','account_<?php echo $i;?>','discount_<?php echo $i;?>','taxrate_<?php echo $i;?>');" value="<?php echo $edit_bill_entries[$i]->item; ?>" placeholder=" "> </td>

                                                                    <td><textarea class="form-control" name="description_<?php echo $i;?>" id="description_<?php echo $i;?>" placeholder=" "><?php echo $edit_bill_entries[$i]->description; ?></textarea></td>

                                                                    <td><input type="text" class="form-control" name="godown_<?php echo $i;?>" id="godown_<?php echo $i;?>" value="<?php echo $edit_bill_entries[$i]->godown; ?>"></td>
                                                                    
                                                                    <td><input type="text" class="form-control"name="qty_<?php echo $i;?>" id="qty_<?php echo $i;?>" value="<?php echo $edit_bill_entries[$i]->qty; ?>" onkeyup="qty('qty_<?php echo $i;?>')"> </td>
                                                                    
                                                                    <td><input type="text" class="form-control" name="rate_<?php echo $i;?>" id="rate_<?php echo $i;?>" value="<?php echo $edit_bill_entries[$i]->rate; ?>" onkeyup="rate('rate_<?php echo $i;?>')"></td>

                                                                    <td><input type="text" class="form-control" name="account_<?php echo $i;?>" id="account_<?php echo $i;?>" value="<?php echo $edit_bill_entries[$i]->account; ?>"></td>
                                                                    
                                                                    <td><input type="text" class="form-control" name="discount_<?php echo $i;?>" id="discount_<?php echo $i;?>" value="<?php echo $edit_bill_entries[$i]->discount; ?>" onkeyup="discountamt('discount_<?php echo $i;?>')"></td>

                                                                    <td><input type="text" class="form-control" name="taxrate_<?php echo $i;?>" id="taxrate_<?php echo $i;?>" value="<?php echo $edit_bill_entries[$i]->taxrate; ?>"></td>

                                                                    <td><input type="text" class="form-control taxamt" name="taxamt_<?php echo $i;?>" id="taxamt_<?php echo $i;?>" value="<?php echo $edit_bill_entries[$i]->taxamt; ?>"></td>

                                                                    <td><input type="text" class="form-control totalamt" name="total_<?php echo $i;?>" id="total_<?php echo $i;?>" value="<?php echo $edit_bill_entries[$i]->total; ?>"></td>

                                                                    <td class="add-remove text-end">
                                                                        <a href="javascript:void(0);" class="add-btn me-2"><i class="fas fa-plus-circle"></i></a>

                                                                        <a href="javascript:void(0);" class="remove-btn "><i class="fe fe-trash-2" ></i></a>
                                                                    </td>
                                                                </tr>
                                                                <?php } ?>
                                                                <input type="hidden" id="i_field" value="<?=$i?>">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-7 col-md-6">
                                                        <!-- <div class="form-group float-end mb-0"> <button class="btn btn-primary" type="submit">Add Item</button> </div> -->
                                                        <div class="invoice-fields">
                                                            <h4 class="field-title">T&C Note..</h4> <br> <textarea class="form-control" name="note"><?php echo $edit_bill->note; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5 col-md-6">
                                                        <div class="invoice-total-card">
                                                            <h4 class="invoice-total-title">Summary</h4>
                                                            <div class="invoice-total-box">
                                                                <div class="invoice-total-inner">
                                                                    
                                                                    <div class="row">
                                                                        <div class="col-lg-6"><p>Sub Total </p></div>
                                                                        <div class="col-lg-6 ">
                                                                            <input type="text" class="subtotal billamt utrt1" name="subtotal" value="<?php echo $edit_bill->subtotal; ?>" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-lg-6"><p>Tax Amt</p></div>
                                                                        <div class="col-lg-6 ">
                                                                            <input type="text" class="totaltaxamt billamt utrt1" name="total_taxamt" id="total_taxamt" value="<?php echo $edit_bill->total_taxamt; ?>" readonly>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-lg-6"><p>Adjustments</p></div>
                                                                        <div class="col-lg-6 ">
                                                                            <input class="billamt utrt1" type="text" name="adjustment" id="adjustment" onkeyup="getbillamt();" value="<?php echo $edit_bill->adjustment; ?>">
                                                                        </div>
                                                                    </div>

                                                                    <div class="invoice-total-footer">
                                                                        <h4>Total Amount <input class="finalamt utrt1" type="text" name="totalamt" value="<?php echo $edit_bill->totalamt; ?>" readonly></h4>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            
                                                            <div class="upload-sign">
                                                                <div class="form-group float-end mb-0"> <a href="<?php echo base_url('admin/bill_list'); ?>" class="btn btn-primary">Cancel</a> </div>
                                                                <div class="form-group float-end mb-0"> <button class="btn btn-primary" type="submit" id="btn_submit" name="btn_submit">Save </button> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row col-sm-6 p-5">
                                                <div class="success_message row"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal custom-modal fade invoices-preview" id="invoices_preview" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card invoice-info-card">
                                    <div class="card-body pb-0">
                                        <div class="invoice-item invoice-item-one">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="invoice-logo"> <img src="<?php echo base_url();?>assets/img/logo.png" alt="logo"> </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="invoice-info">
                                                        <div class="invoice-head">
                                                            <h2 class="text-primary">Invoice</h2>
                                                            <p>Invoice Number : In983248782</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invoice-item invoice-item-bg">
                                            <div class="invoice-circle-img"> <img src="<?php echo base_url();?>assets/img/invoice-circle1.png" alt="" class="invoice-circle1"> <img src="<?php echo base_url();?>assets/img/invoice-circle2.png" alt="" class="invoice-circle2"> </div>
                                            <div class="row">
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="invoice-info"> <strong class="customer-text-one">Billed to</strong>
                                                        <h6 class="invoice-name">Customer Name</h6>
                                                        <p class="invoice-details invoice-details-two"> 9087484288 <br> Address line 1, <br> Address line 2 <br> Zip code ,City - Country </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="invoice-info"> <strong class="customer-text-one">Invoice From</strong>
                                                        <h6 class="invoice-name">Company Name</h6>
                                                        <p class="invoice-details invoice-details-two"> 9087484288 <br> Address line 1, <br> Address line 2 <br> Zip code ,City - Country </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="invoice-info invoice-info-one border-0">
                                                        <p>Issue Date : 27 Jul 2022</p>
                                                        <p>Due Date : 27 Aug 2022</p>
                                                        <p>Due Amount : $1,54,22 </p>
                                                        <p>Recurring Invoice : 15 Months</p>
                                                        <p class="mb-0">PO Number : 54515454</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invoice-item invoice-table-wrap">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive">
                                                        <table class="invoice-table table table-center mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>Description</th>
                                                                    <th>Category</th>
                                                                    <th>Rate/Item</th>
                                                                    <th>Quantity</th>
                                                                    <th>Discount (%)</th>
                                                                    <th class="text-end">Amount</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Dell Laptop</td>
                                                                    <td>Laptop</td>
                                                                    <td>$1,110</td>
                                                                    <th>2</th>
                                                                    <th>2%</th>
                                                                    <td class="text-end">$400</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>HP Laptop</td>
                                                                    <td>Laptop</td>
                                                                    <td>$1,500</td>
                                                                    <th>3</th>
                                                                    <th>6%</th>
                                                                    <td class="text-end">$3,000</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Apple Ipad</td>
                                                                    <td>Ipad</td>
                                                                    <td>$11,500</td>
                                                                    <th>1</th>
                                                                    <th>10%</th>
                                                                    <td class="text-end">$11,000</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="invoice-payment-box">
                                                    <h4>Payment Details</h4>
                                                    <div class="payment-details">
                                                        <p>Debit Card XXXXXXXXXXXX-2541 HDFC Bank</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="invoice-total-card">
                                                    <div class="invoice-total-box">
                                                        <div class="invoice-total-inner">
                                                            <p>Taxable <span>$6,660.00</span></p>
                                                            <p>Additional Charges <span>$6,660.00</span></p>
                                                            <p>Discount <span>$3,300.00</span></p>
                                                            <p class="mb-0">Sub total <span>$3,300.00</span></p>
                                                        </div>
                                                        <div class="invoice-total-footer">
                                                            <h4>Total Amount <span>$143,300.00</span></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invoice-sign-box">
                                            <div class="row">
                                                <div class="col-lg-8 col-md-8">
                                                    <div class="invoice-terms">
                                                        <h6>Notes:</h6>
                                                        <p class="mb-0">Enter customer notes or any other details</p>
                                                    </div>
                                                    <div class="invoice-terms mb-0">
                                                        <h6>Terms and Conditions:</h6>
                                                        <p class="mb-0">Enter customer notes or any other details</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="invoice-sign text-end"> <img class="img-fluid d-inline-block" src="<?php echo base_url();?>assets/img/signature.png" alt="sign"> <span class="d-block">Harristemp</span> </div>
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
        <div class="modal custom-modal fade bank-details" id="bank_details" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="form-header text-start mb-0">
                            <h4 class="mb-0">Add Bank Details</h4>
                        </div> <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    </div>
                    <div class="modal-body">
                        <div class="bank-inner-details">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group"> <label>Account Holder Name</label> <input type="text" class="form-control" placeholder="Add Name"> </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group"> <label>Bank name</label> <input type="text" class="form-control" placeholder="Add Bank name"> </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group"> <label>IFSC Code</label> <input type="text" class="form-control"> </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group"> <label>Account Number</label> <input type="text" class="form-control"> </div>
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
        <div class="modal custom-modal fade" id="delete_invoices_details" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Delete Invoice Details</h3>
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6"> <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary paid-continue-btn">Delete</a> </div>
                                <div class="col-6"> <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary paid-cancel-btn">Cancel</a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal custom-modal fade" id="save_invocies_details" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-header">
                            <h3>Save Bill Details</h3>
                            <p>Are you sure want to save?</p>
                        </div>
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6"> <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary paid-continue-btn">Save</a> </div>
                                <div class="col-6"> <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary paid-cancel-btn">Cancel</a> </div>
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
    <script src="<?php echo base_url();?>assets/plugins/select2/js/custom-select.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/script.js"></script>
    
    <script src="https://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>

    <script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>

    <script type="text/javascript">        
        $(document).ready(function()
        {
            i_field=$('#i_field').val();
            var max_fields      = 500;
            var i = i_field;
            var x = 1;

            $(".add-table-items").on('click','.remove-btn',function(e)
            {
                //alert(i);
                e.preventDefault();$(this).closest('.add-row').remove(); x--;

                subtotal();

                getbillamt();

                return false;


            });

            $(document).on("click",".add-btn",function()
            {
                //e.preventDefault();
                if(x < max_fields)
                {
                    x++;
                    var experiencecontent='<tr class="add-row">'+
                    '<td>'+
                    '<input type="hidden" name="iid[]" class="iid" value="'+i+'">'+
                    '</td>'+
                    '<td>'+
                    '<input type="text" name="item_'+i+'" id="item_'+i+'" class="form-control" onkeyup="getitemsdetails(\'item_'+i+'\',\'description_'+i+'\',\'godown_'+i+'\',\'qty_'+i+'\',\'rate_'+i+'\',\'account_'+i+'\',\'discount_'+i+'\',\'taxrate_'+i+'\'); ">'+
                    '</td>'+
                    '<td>'+
                    '<input type="text" name="description_'+i+'" id="description_'+i+'" class="form-control">'+
                    '</td>'+
                    '<td>'+
                    '<input type="text" class="form-control" name="godown_'+i+'" id="godown_'+i+'">'+
                    '</td>'+
                    '<td>'+
                    '<input type="text" class="form-control" name="qty_'+i+'" id="qty_'+i+'" onkeyup="qty(\'qty_'+i+'\');">'+
                    '</td>'+
                    '<td>'+
                    '<input type="text" class="form-control" name="rate_'+i+'" id="rate_'+i+'" onkeyup="rate(\'rate_'+i+'\');">'+
                    '</td>'+
                    '<td>'+
                    '<input type="text" class="form-control" name="account_'+i+'" id="account_'+i+'">'+
                    '</td>'+
                    '<td>'+
                    '<input type="text" class="form-control" name="discount_'+i+'" id="discount_'+i+'" onkeyup="discountamt(\'discount_'+i+'\');">'+
                    '</td>'+
                    '<td>'+
                    '<input type="text" class="form-control" name="taxrate_'+i+'" id="taxrate_'+i+'">'+
                    '</td>'+
                    '<td>'+
                    '<input type="text" class="form-control taxamt" name="taxamt_'+i+'" id="taxamt_'+i+'">'+
                    '</td>'+
                    '<td>'+
                    '<input type="text" class="form-control totalamt" name="total_'+i+'" id="total_'+i+'">'+
                    '</td>'+
                    '<td class="add-remove text-end">'+
                    '<a href="javascript:void(0);" class="add-btn me-2"><i class="fas fa-plus-circle"></i></a> '+
                    '<a href="javascript:void(0);" class="remove-btn"><i class="fe fe-trash-2"></i></a>'+
                    '</td>'+
                    '</tr>';

                    i++;
                }
            
            
                $(".add-table-items").append(experiencecontent);
                return false;
            });
        });
    </script>

    <script type="text/javascript">
        function getitemsdetails(inputname,description,godown,qty,rate,account,discount,taxrate)
        {
            //alert();return;
            input=inputname.split("_");
            //alert(input);return;

            $('#'+inputname).autocomplete({
                source: function( request, response ) 
                {
                    $.ajax({
                        url : '<?=base_url()?>admin/getitemsdetails ',
                        dataType: "json",
                        type: "POST",
                        data: {
                           name_startsWith: request.term,
                           itemsdetails: input
                        },
                        success: function( data ) {
                           response( $.map( data, function( item ) {
                            var code = item.split("|");
                            //alert(data);
                            return {
                              label: code[0],
                              value: code[0],
                              data : item
                            }
                          }));
                        }
                    });
                },
                autoFocus: true,          
                minLength: 0,
                change: function( event, ui ) {
                if (ui.item == null) {
                }
                },
                select: function( event, ui ) 
                {
                    var names = ui.item.data.split("|");
                    console.log(names)
                    $('#'+inputname).val(names[0]);
                    $('#'+description).val(names[1]);
                    $('#'+godown).val(names[2]);
                    //$('#'+qty).val(names[3]);
                    $('#'+qty).val('1');
                    $('#'+rate).val(names[4]);
                    $('#'+account).val(names[5]);
                    $('#'+discount).val(names[6]);
                    $('#'+taxrate).val(names[7]);
                    
                    discountamt(inputname);

                    subtotal();

                    getbillamt();
                }

            });
        }

        /*function discountamt(inputname)
        {
            //alert(inputname);
            input=inputname.split("_");
            id_val= input[1];
            //alert(id_val);

            var rate = $('#rate_'+id_val).val();
            var discount = $('#discount_'+id_val).val();

            //var discountamt = rate/100;
            //var totalamt = rate-discountamt;
            var totalamt = rate-(rate*discount/100);
            $('#total_'+id_val).val(totalamt);

            var taxrate = $('#taxrate_'+id_val).val();
            var taxamt = rate*taxrate/100;
            //alert(taxamt);

            $('#taxamt_'+id_val).val((taxamt).toFixed(2));
        }

        function qty(inputname)
        {
            input=inputname.split("_");
            id_val= input[1];
            //alert(id_val);

            var rate = $('#rate_'+id_val).val();
            var qty = $('#qty_'+id_val).val();
            var discount = $('#discount_'+id_val).val();

            //var discountamt = rate/100;
            //var total = rate-discountamt;
            var total = rate-(rate*discount/100);
            var totalamt = total*qty;
            //alert(totalamt);

            $('#total_'+id_val).val((totalamt).toFixed(2));

            var taxrate = $('#taxrate_'+id_val).val();
            var taxamt = totalamt*taxrate/100;
            //alert(taxamt);

            $('#taxamt_'+id_val).val((taxamt).toFixed(2));

            subtotal();

            getbillamt();
        }

        function rate(inputname)
        {
            input=inputname.split("_");
            id_val= input[1];
            //alert(id_val);

            var rate = $('#rate_'+id_val).val();
            var qty = $('#qty_'+id_val).val();
            var discount = $('#discount_'+id_val).val();

            //var discountamt = rate/100;
            //var total = rate-discountamt;
            var total = rate-(rate*discount/100);
            var totalamt = total*qty;
            //alert(totalamt);

            $('#total_'+id_val).val((totalamt).toFixed(2));

            var taxrate = $('#taxrate_'+id_val).val();
            var taxamt = totalamt*taxrate/100;
            //alert(taxamt);

            $('#taxamt_'+id_val).val((taxamt).toFixed(2));

            subtotal();

            getbillamt();
        }*/

        function discountamt(inputname)
        {
            //alert(inputname);
            input=inputname.split("_");
            id_val= input[1];
            //alert(id_val);

            var rate = $('#rate_'+id_val).val();
            var discount = $('#discount_'+id_val).val();
            var qty = $('#qty_'+id_val).val();

            /*//var discountamt = rate/100;
            //var totalamt = rate-discountamt;
            var totalamt = rate-(rate*discount/100);
            $('#total_'+id_val).val(totalamt);

            var taxrate = $('#taxrate_'+id_val).val();
            var taxamt = totalamt*taxrate/100;
            //alert(taxamt);

            $('#taxamt_'+id_val).val((taxamt).toFixed(2));*/

            var item_rate = $('#item_rate').val();

            if(item_rate == 'tax_exclusive')
            {
                var total = rate-(rate*discount/100);
                //alert(totalamt);

                var totalamt = total*qty;
                //alert(totalamt);

                $('#total_'+id_val).val((totalamt).toFixed(2));

                var taxrate = $('#taxrate_'+id_val).val();
                var taxamt = totalamt*taxrate/100;
                //alert(taxamt);

                $('#taxamt_'+id_val).val((taxamt).toFixed(2));
            }

            if(item_rate == 'tax_inclusive')
            {
                var total = rate-(rate*discount/100);
                //alert(totalamt);

                var totalamt = total*qty;
                //alert(totalamt);

                //t = $('#total_'+id_val).val((totalamt).toFixed(2));

                var taxrate = $('#taxrate_'+id_val).val();
                var taxamt = totalamt*taxrate/100;
                //alert(taxamt);

                $('#taxamt_'+id_val).val((taxamt).toFixed(2));

                t = totalamt - taxamt;

                $('#total_'+id_val).val((t).toFixed(2));
            }

            subtotal();

            getbillamt()
        }

        function qty(inputname)
        {
            input=inputname.split("_");
            id_val= input[1];
            //alert(id_val);

            var rate = $('#rate_'+id_val).val();
            var qty = $('#qty_'+id_val).val();
            var discount = $('#discount_'+id_val).val();

            /*//var discountamt = rate/100;
            //var total = rate-discountamt;
            var total = rate-(rate*discount/100);
            var totalamt = total*qty;
            //alert(totalamt);

            $('#total_'+id_val).val((totalamt).toFixed(2));

            var taxrate = $('#taxrate_'+id_val).val();
            var taxamt = totalamt*taxrate/100;
            //alert(taxamt);

            $('#taxamt_'+id_val).val((taxamt).toFixed(2));*/

            var item_rate = $('#item_rate').val();

            if(item_rate == 'tax_exclusive')
            {
                //var discountamt = rate/100;
                //var total = rate-discountamt;
                var total = rate-(rate*discount/100);
                //alert(total);
                var totalamt = total*qty;
                //alert(totalamt);

                $('#total_'+id_val).val((totalamt).toFixed(2));

                var taxrate = $('#taxrate_'+id_val).val();
                var taxamt = totalamt*taxrate/100;
                //alert(taxamt);

                $('#taxamt_'+id_val).val((taxamt).toFixed(2));
            }

            if(item_rate == 'tax_inclusive')
            {
                //var discountamt = rate/100;
                //var total = rate-discountamt;
                var total = rate-(rate*discount/100);
                //alert(total);
                var totalamt = total*qty;
                //alert(totalamt);

                //t = $('#total_'+id_val).val((totalamt).toFixed(2));

                var taxrate = $('#taxrate_'+id_val).val();
                var taxamt = totalamt*taxrate/100;
                //alert(taxamt);

                $('#taxamt_'+id_val).val((taxamt).toFixed(2));

                t = totalamt - taxamt;

                $('#total_'+id_val).val((t).toFixed(2));
            }

            subtotal();

            getbillamt();
        }

        function rate(inputname)
        {
            input=inputname.split("_");
            id_val= input[1];
            //alert(id_val);

            var rate = $('#rate_'+id_val).val();
            var qty = $('#qty_'+id_val).val();
            var discount = $('#discount_'+id_val).val();

            /*//var discountamt = rate/100;
            //var total = rate-discountamt;
            var total = rate-(rate*discount/100);
            var totalamt = total*qty;
            //alert(totalamt);

            $('#total_'+id_val).val((totalamt).toFixed(2));

            var taxrate = $('#taxrate_'+id_val).val();
            var taxamt = totalamt*taxrate/100;
            //alert(taxamt);

            $('#taxamt_'+id_val).val((taxamt).toFixed(2));*/

            var item_rate = $('#item_rate').val();

            if(item_rate == 'tax_exclusive')
            {
                //var discountamt = rate/100;
                //var total = rate-discountamt;
                var total = rate-(rate*discount/100);
                //alert(total);
                var totalamt = total*qty;
                //alert(totalamt);

                $('#total_'+id_val).val((totalamt).toFixed(2));

                var taxrate = $('#taxrate_'+id_val).val();
                var taxamt = totalamt*taxrate/100;
                //alert(taxamt);

                $('#taxamt_'+id_val).val((taxamt).toFixed(2));
            }

            if(item_rate == 'tax_inclusive')
            {
                //var discountamt = rate/100;
                //var total = rate-discountamt;
                var total = rate-(rate*discount/100);
                //alert(total);
                var totalamt = total*qty;
                //alert(totalamt);

                //t = $('#total_'+id_val).val((totalamt).toFixed(2));

                var taxrate = $('#taxrate_'+id_val).val();
                var taxamt = totalamt*taxrate/100;
                //alert(taxamt);

                $('#taxamt_'+id_val).val((taxamt).toFixed(2));

                t = totalamt - taxamt;

                $('#total_'+id_val).val((t).toFixed(2));
            }

            subtotal();

            getbillamt();
        }

        function subtotal()
        {
            var sum = 0;
            $(".totalamt").each(function()
            {
              sum += +this.value;
            });
            //alert(sum);

            $('.subtotal').val((sum).toFixed(2));
            //$('.finalamt').val(parseInt(sum));

            var sum1 = 0;
            $(".taxamt").each(function()
            {
              sum1 += +this.value;
            });

            $('.totaltaxamt').val(sum1);

            finalamt = sum+sum1;
            $('.finalamt').val(finalamt);
        }

        function getbillamt()
        {
            var sum = 0;
            $(".billamt").each(function()
            {
              sum += +this.value;
            });
            //alert(sum);

            $('.finalamt').val((sum).toFixed(2));
        }

        $(document).on('change','#item_rate',function ()
        {
            var item_rate = $(this).val();
            //alert(item_rate);

            for(var i = 0; i < 2; i++)
            {
                //alert(i);

                if(item_rate == 'tax_inclusive')
                {
                    qty('qty_'+i);
                    rate('rate_'+i);
                    discountamt('discount_'+i);
                }

                if(item_rate == 'tax_exclusive')
                {
                    qty('qty_'+i);
                    rate('rate_'+i);
                    discountamt('discount_'+i);
                }
            }

            
        });
    </script>

    <script type="text/javascript">
         $(function()
         {
            $("#bill_form").ajaxForm({
            beforeSend: function () {
                $('#btn_submit').prop('disabled',true);
                $('.form_error_msg').html('');
                $('.success_message').html('<br><div class="alert alert-info">Data analyzing...please wait...</div>');
            },
            uploadProgress: function (event, position, total, percentComplete) {
                //albumprogressbar.width(percentComplete + '%');
            },
            beforeSubmit: function () {
                return $("#bill_form").valid(); // TRUE when form is valid, FALSE will cancel submit
            },
            complete: function (response) {
                //alert('Your Proposal Id Is'+response.pi);
                //console.log(response);return;
                var temp = JSON.parse(response.responseText);
                //console.log(temp);
                if (temp.status == 'success') 
                {
                    $('.success_message').show().html(temp.message);
                    setTimeout(function()
                    {
                        window.location.href = temp.redirect;
                    }, 3000);
                }
                else if (temp.status == 'error') 
                {
                    $('#btn_submit').prop('disabled',false);
                    $('.success_message').html('');
                    $.each(temp.errors, function (key, val) {
                        $('.' + key).html(val);
                    });
                }
            }
            });
         });
    </script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
    
      <script src="<?php echo base_url();?>assets/js/malsup-jquery.js"></script>
</body>

</html>