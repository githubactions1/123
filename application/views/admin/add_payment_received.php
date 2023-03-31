<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Add payment Received</title>
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">

    <style type="text/css">
        .no-outline {
          border-top-style: hidden;
          border-right-style: hidden;
          border-left-style: hidden;
          border-bottom-style: hidden;
          
        }

        .no-outline:focus {
          display: none;
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        <?php echo include('header.php'); ?>

        <?php echo include('sidebar.php'); ?>

        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title"> <a href="<?php echo base_url('admin/payment_received_list');?>" style="margin-right: 10px;"><i class="fa fa-arrow-left" data-bs-toggle="tooltip" title="" data-bs-original-title="Back" aria-label="fa fa-arrow-left"></i></a> Recipt</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="estimates.html">Estimate</a></li>
                                <li class="breadcrumb-item active">Add Estimate</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" data-select2-id="9">
                            <div class="card-body" data-select2-id="8">
                                <form class="paym" method="post" id="payment_received_form" data-select2-id="7">
                                    <div class="row" data-select2-id="6">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label style="color:#f00"> Deposit To </label>
                                                <select class="js-example-basic-single select2" name="deposit" id="deposit">
                                                    <option value="">Search Deposit</option>
                                                    <?php
                                                    foreach ($bank_name as $cn)
                                                    {
                                                   
                                                    ?>
                                                    <option value="<?php echo $cn->id;?>"><?php echo $cn->account_name;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label style="color:#f00"> Customer </label>
                                                <select class="js-example-basic-single select2" name="customer" id="customer">
                                                    <option value="">Search Customer</option>
                                                    <?php
                                                    foreach ($customer_name as $cn)
                                                    {
                                                   
                                                    ?>
                                                    <option value="<?php echo $cn->id;?>"><?php echo $cn->name;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group"> <label style="color:#f00">Date</label>
                                                <div> <input class="form-control datetimepicker" type="text" name="date" id="date" placeholder="15/02/2022"> </div>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Payment Receipt No</label>
                                                <div> <input class="form-control" type="text" name="payment_receipt_no" value="<?php echo $payment_received_id; ?>" id="payment_receipt_no" placeholder="Payment Receipt No"> </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2">
                                            <div class="form-group"> <label>Payment Mode</label>
                                                <div>
                                                    <select class="form-select" name="payment_mode" id="payment_mode">
                                                        <option value="Cash">Cash</option>
                                                        <option value="Cheque">Cheque</option>
                                                        <option value="Credit Card">Credit Card</option>
                                                        <option value="Bank Transfer">Bank Transfer</option>
                                                        <option value="Others">Others</option>
                                                        <option value="Online">Online</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group"> <label style="color:#f00">Mobile</label>
                                                <div> <input class="form-control" type="text" name="mobile" id="mobile" placeholder="Mobile Number"> </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group"> <label>Is Balance Only? </label>
                                                <div> <input type="checkbox" name="balance" id="balance"> </select> </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <hr>
                                        </div>
                                        <div class="row pt11">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label style="color:#f00"> Amount</label>
                                                    <input type="text" name="amount" id="amount" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Bank Charges (If any) </label>
                                                    <input type="text" name="bank_charges" id="bank_charges" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2 cheque_no">
                                                <div class="form-group">
                                                    <label>DD/Cheque No </label>
                                                    <input type="text" name="cheque_no" id="cheque_no" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2 cheque_date">
                                                <div class="form-group">
                                                    <label>DD/Cheque Date</label>
                                                    <input class="form-control datetimepicker" type="text" name="cheque_date" id="cheque_date" placeholder="15/02/2022">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Reference# </label>
                                                    <div>
                                                        <input class="form-control " type="text" name="reference" id="reference">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-lg-12 pt11">
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Customer</th>
                                                        <th>Invoice Number</th>
                                                        <th>Invoice Amount</th>
                                                        <th>Due Amount </th>
                                                        <th>Payment</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="show_tmp_data">
                                                    
                                                </tbody>
                                            </table>
                                            <div class="nobi">
                                                <!-- <h3>There is no Bill Applied For this payment</h3> -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <hr>
                                                </div>
                                                <div class="col-lg-7 col-md-6 pt11">
                                                    <div class="invoice-fields">
                                                        <h4 class="field-title"> Note..</h4> <textarea class="form-control" name="note" id="note"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5 col-md-6 pt11">
                                                    <div class="invoice-total-card">
                                                        <div class="invoice-total-box">
                                                            <div class="invoice-total-inner">

                                                                <div class="row">
                                                                    <div class="col-lg-6"><p>Total </p></div>
                                                                    <div class="col-lg-6 ">
                                                                        <input type="text" class="utrt1" name="total" id="total" readonly>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-lg-6"><p> Amount Received</p></div>
                                                                    <div class="col-lg-6 ">
                                                                        <input type="text" class="utrt1" name="amount_received" id="amount_received" readonly>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-lg-6"><p>Amount Used For Payments</p></div>
                                                                    <div class="col-lg-6 ">
                                                                        <input class="utrt1" type="text" name="amount_used" id="amount_used" >
                                                                    </div>
                                                                </div>

                                                                <div class="invoice-total-footer">
                                                                    <h4>Amount in excess<input class="utrt1" type="text" name="amount_excess" id="amount_excess" readonly></h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="upload-sign">
                                                            <div class="form-group float-end mb-0"> <button class="btn btn-primary" type="submit">Cancle</button> </div>
                                                            <div class="form-group float-end mb-0"> <button class="btn btn-primary" type="submit" id="btn_submit" name="btn_submit">Save </button> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row col-sm-6 p-5">
                                                <div class="success_message row"></div>
                                            </div>
                                </form>
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
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).on('change','#customer',function()
        {
            //alert();return;
            //$('#update').removeAttr('disabled');
            //$('.table-wrap').show();
            var customer = $('#customer').val();
            //alert(customer);
            //alert(divi);return;
            $.ajax({
                type: 'ajax',
                method: 'post',
                url: '<?php echo base_url('admin/get_pending_invoice');?>',
                data: {'customer':customer},
                async: false,
                dataType: 'json',
                success: function(data)
                {
                    //console.log(data);
                    var html='';
                    var i;
                    for(i=0; i<data.length; i++)
                    {
                        totalamt = data[i].totalamt;
                        payments = data[i].payments;
                        dueamount = totalamt-payments; 
                        html+='<tr class="tblro">'+
                              '<td><input class="no-outline" id="invoicedate'+i+'" name= "invoicedate'+i+'" value="'+data[i].invoice_date+'"></td>'+
                              '<td><input class="no-outline" id="customername'+i+'" name= "customername'+i+'" value="'+data[i].customer_name+'"></td>'+
                              '<td><input class="no-outline" id="invoiceno'+i+'" name= "invoiceno'+i+'" value="'+data[i].invoice_no+'"></td>'+
                              '<td><input class="no-outline" id="invoiceamount'+i+'" name= "invoiceamount'+i+'" value="'+data[i].totalamt+'"></td>'+
                              '<td><input class="no-outline" id="dueamount'+i+'" name= "dueamount'+i+'" value="'+dueamount+'" size="8"><span> <a style="color:blue; cursor: pointer;" onclick="dueamt(\''+i+'\');" >(Pay Full)</a></span></td>'+
                              '<td>'+'<input class="payment" name="payment'+i+'" id="payment'+i+'" onkeyup="paymenti(\'payment_'+i+'\');"></td>'+
                              
                            '</tr>';
                    }
                    $('#show_tmp_data').html(html);
                    if(html == '')
                    {
                        $('.nobi').html('There is no Bill Applied For this payment');
                    }
                    else
                    {
                        $('.nobi').html('');
                    }

                    //$('.nobi').html('There is no Bill Applied For this payment');

                },
                error: function(){
                    alert('There is no Bill Applied For this payment');
                    $('.nobi').html('There is no Bill Applied For this payment');
                }

            });
        });

        function paymenti(inputname)
        {
            var sum = 0;
            $(".payment").each(function()
            {
              sum += +this.value;
            });
            //alert(sum);

            $('#total').val((sum).toFixed(2));
            $('#amount_received').val((sum).toFixed(2));
            $('#amount_used').val((sum).toFixed(2));

            
            //alert(inputname);
            input=inputname.split("_");
            id_val= input[1];
            //alert(id_val);

            dueamount = Number($('#dueamount'+id_val).val());
            //alert(dueamount);

            payment = Number($('#payment'+id_val).val());
            //alert(payment);
            //$('#amount').val(payment);
            $('#amount').val(sum);

            if(payment > dueamount)
            {
                $('#payment'+id_val).val('0');
                $('#amount').val('0');
            }

            
        }

        /*$("#btn_submit").on("click",function(e)
        {
            var customer = $("#customer").val();
            var amount= $("#amount").val();

            if(customer == '')
            {
              alert('please Enter Customer')
            }
            else if(amount == '')
            {
              alert('Please Enter Amount')
            }
            else
            {
                //e.preventDefault();
                $('.paym').each(function(i, obj) 
                {
                    //alert(i);

                    var deposit =$("#deposit").val();
                    var customer = $("#customer").val();
                    var date= $("#date").val();
                    var payment_mode= $("#payment_mode").val();
                    var mobile= $("#mobile").val();
                    var balance= $("#balance").val();
                    var amount= $("#amount").val();
                    var bank_charges= $("#bank_charges").val();
                    var cheque_no= $("#cheque_no").val();
                    var cheque_date= $("#cheque_date").val();
                    var reference= $("#reference").val();
                    var note= $("#note").val();
                    var total= $("#total").val();
                    var amount_received= $("#amount_received").val();
                    var amount_used= $("#amount_used").val();
                    var amount_excess= $("#amount_excess").val();

                    if($("#balance").is(':checked'))
                    {
                      var balance = 'Checked';
                    }
                    else
                    {
                      var balance = 'UnChecked';
                      //alert('unchecked');
                    }

                    //console.log(i+" - "+stdid+" - " +stdname+" - " +rno+" - " +tch+" - " +chk+" - " +std_class+" - " +division);

                    $.post('<?php echo base_url('admin/save_payment_received'); ?>',{deposit:deposit,customer:customer,date:date,payment_mode:payment_mode,mobile:mobile,balance:balance,amount:amount,bank_charges:bank_charges,cheque_no:cheque_no,cheque_date:cheque_date,reference:reference,note:note,total:total,amount_received:amount_received,amount_used:amount_used,amount_excess:amount_excess},function(data)
                    {
                      //alert('aaaa'); return;
                    });
                
                
                });

                $('.tblro').each(function(i, obj) 
                {
                    //alert(i);
                    var invoicedate =$("#invoicedate"+i).val();
                    var invoiceno = $('#invoiceno'+i).val();
                    var invoiceamount = $('#invoiceamount'+i).val();
                    var dueamount = $('#dueamount'+i).val();
                    var payment = $('#payment'+i).val();

                    if($("#balance").is(':checked'))
                    {
                      var balance = 'Checked';
                    }
                    else
                    {
                      var balance = 'UnChecked';
                      //alert('unchecked');
                    }

                    //console.log(i+" - "+stdid+" - " +stdname+" - " +rno+" - " +tch+" - " +chk+" - " +std_class+" - " +division);

                    $.post('<?php echo base_url('admin/save_payment_received_entries'); ?>',{invoicedate:invoicedate,invoiceno:invoiceno,invoiceamount:invoiceamount,dueamount:dueamount,payment:payment},function(data)
                    {
                      //alert('aaaa'); return;
                    });
                
                
                });

                //alert('Payment Received SucessFull');

                //$('.success_message').html('<div class="alert alert-info">Data analyzing...please wait...</div>');

            }
        })*/

    </script>

    <script type="text/javascript">

        function dueamt(inputname)
        {
            //alert(inputname);
            i=inputname;
            //alert(i);

            dueamount = $('#dueamount'+i).val();
            //alert(dueamount);

            $('#payment'+i).val(dueamount);

            var sum = 0;
            $(".payment").each(function()
            {
              sum += +this.value;
            });
            //alert(sum);

            $('#amount').val((sum).toFixed(2));
            $('#total').val((sum).toFixed(2));
            $('#amount_received').val((sum).toFixed(2));
            $('#amount_used').val((sum).toFixed(2));
        }
    </script>

    <script type="text/javascript">
        $(function()
        {
            $("#payment_received_form").ajaxForm({
                beforeSend: function () {
                    $('#btn_submit').prop('disabled',true);
                    $('.form_error_msg').html('');
                    //$('.success_message').html('<br><div class="alert alert-info">Data analyzing...please wait...</div>');
                },
                uploadProgress: function (event, position, total, percentComplete) {
                    //albumprogressbar.width(percentComplete + '%');
                },
                beforeSubmit: function () {
                    return $("#payment_received_form").valid(); // TRUE when form is valid, FALSE will cancel submit
                },
                complete: function (response)
                {
                    //alert(response);
                    var customer = $("#customer").val();
                    var amount= $("#amount").val();

                    if(customer == '')
                    {
                      alert('please Enter Customer')
                    }
                    else if(amount == '')
                    {
                      alert('Please Enter Amount')
                    }
                    else
                    {
                        //e.preventDefault();
                        /*$('.paym,.tblro').each(function(i, obj) 
                        {
                            //alert(i);

                            var deposit =$("#deposit").val();
                            var customer = $("#customer").val();
                            var date= $("#date").val();
                            var payment_mode= $("#payment_mode").val();
                            var mobile= $("#mobile").val();
                            var balance= $("#balance").val();
                            var amount= $("#amount").val();
                            var bank_charges= $("#bank_charges").val();
                            var cheque_no= $("#cheque_no").val();
                            var cheque_date= $("#cheque_date").val();
                            var reference= $("#reference").val();
                            var note= $("#note").val();
                            var total= $("#total").val();
                            var amount_received= $("#amount_received").val();
                            var amount_used= $("#amount_used").val();
                            var amount_excess= $("#amount_excess").val();

                            var invoicedate =$("#invoicedate"+i).val();
                            var invoiceno = $('#invoiceno'+i).val();
                            var invoiceamount = $('#invoiceamount'+i).val();
                            var dueamount = $('#dueamount'+i).val();
                            var payment = $('#payment'+i).val();

                            if($("#balance").is(':checked'))
                            {
                              var balance = 'Checked';
                            }
                            else
                            {
                              var balance = 'UnChecked';
                              //alert('unchecked');
                            }

                            //console.log(i+" - "+stdid+" - " +stdname+" - " +rno+" - " +tch+" - " +chk+" - " +std_class+" - " +division);

                            $.post('<?php echo base_url('admin/save_payment_received'); ?>',{deposit:deposit,customer:customer,date:date,payment_mode:payment_mode,mobile:mobile,balance:balance,amount:amount,bank_charges:bank_charges,cheque_no:cheque_no,cheque_date:cheque_date,reference:reference,note:note,total:total,amount_received:amount_received,amount_used:amount_used,amount_excess:amount_excess,invoicedate:invoicedate,invoiceno:invoiceno,invoiceamount:invoiceamount,dueamount:dueamount,payment:payment},function(data)
                            {
                              //alert('aaaa'); return;
                            });
                        
                        
                        });*/

                        $('.paym').each(function(i, obj) 
                        {
                            //alert(i);

                            var deposit =$("#deposit").val();
                            var customer = $("#customer").val();
                            var date= $("#date").val();
                            var payment_mode= $("#payment_mode").val();
                            var mobile= $("#mobile").val();
                            var balance= $("#balance").val();
                            var amount= $("#amount").val();
                            var bank_charges= $("#bank_charges").val();
                            var cheque_no= $("#cheque_no").val();
                            var cheque_date= $("#cheque_date").val();
                            var reference= $("#reference").val();
                            var note= $("#note").val();
                            var total= $("#total").val();
                            var amount_received= $("#amount_received").val();
                            var amount_used= $("#amount_used").val();
                            var amount_excess= $("#amount_excess").val();

                            if($("#balance").is(':checked'))
                            {
                              var balance = 'Checked';
                            }
                            else
                            {
                              var balance = 'UnChecked';
                              //alert('unchecked');
                            }

                            //console.log(i+" - "+stdid+" - " +stdname+" - " +rno+" - " +tch+" - " +chk+" - " +std_class+" - " +division);

                            $.post('<?php echo base_url('admin/save_payment_received'); ?>',{deposit:deposit,customer:customer,date:date,payment_mode:payment_mode,mobile:mobile,balance:balance,amount:amount,bank_charges:bank_charges,cheque_no:cheque_no,cheque_date:cheque_date,reference:reference,note:note,total:total,amount_received:amount_received,amount_used:amount_used,amount_excess:amount_excess},function(data)
                            {
                              //alert('aaaa'); return;
                            });
                        
                        
                        });

                        $('.tblro').each(function(i, obj) 
                        {
                            //alert(i);
                            var invoicedate =$("#invoicedate"+i).val();
                            var customername =$("#customername"+i).val();
                            var invoiceno = $('#invoiceno'+i).val();
                            var invoiceamount = $('#invoiceamount'+i).val();
                            var dueamount = $('#dueamount'+i).val();
                            var payment = $('#payment'+i).val();

                            if($("#balance").is(':checked'))
                            {
                              var balance = 'Checked';
                            }
                            else
                            {
                              var balance = 'UnChecked';
                              //alert('unchecked');
                            }

                            //console.log(i+" - "+stdid+" - " +stdname+" - " +rno+" - " +tch+" - " +chk+" - " +std_class+" - " +division);

                            $.post('<?php echo base_url('admin/save_payment_received_entries'); ?>',{invoicedate:invoicedate,customername:customername,invoiceno:invoiceno,invoiceamount:invoiceamount,dueamount:dueamount,payment:payment},function(data)
                            {
                              //alert('aaaa'); return;
                            });
                        
                        
                        });

                        //alert('Payment Received SucessFull');

                        var temp = 'success';
                        
                        if (temp == 'success') 
                        {
                            //alert('success');
                            $('.success_message').show().html('<div class="alert alert-info"><strong>Payment Received Added Successfully. </strong></div>');
                            setTimeout(function()
                            {
                                window.location.href = '<?php echo base_url('admin/payment_received_list'); ?>';
                            }, 3000);
                        }
                        else if (temp.status == 'error') 
                        {
                            alert('error');
                            $('#btn_submit').prop('disabled',false);
                            $('.success_message').html('');
                            $.each(temp.errors, function (key, val) {
                                $('.' + key).html(val);
                            });
                        }

                    }

                    
                }
            });

            $('.cheque_date').hide();
            $('.cheque_no').hide();
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
        
    <script src="<?php echo base_url();?>assets/js/malsup-jquery.js"></script>

    <script type="text/javascript">
        $("#payment_mode").on("change",function()
        {
            $payment_mode = $('#payment_mode').val();

            if($payment_mode == 'Cheque')
            {
                $('.cheque_no').show();
                $('.cheque_date').show();
            }
            else
            {
                $('.cheque_no').hide();
                $('.cheque_date').hide();
            }
        })
    </script>

</body>

</html>