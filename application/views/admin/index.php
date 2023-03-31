<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
</head>

<body class="nk-body bg-lighter npc-default has-sidebar no-touch nk-nio-theme">
    <div class="main-wrapper"> <?php echo include('header.php'); ?> <?php echo include('sidebar.php'); ?> <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header"> <span class="dash-widget-icon bg-1"> <i class="fas fa-users"></i> </span>
                                    <div class="dash-count">
                                        <div class="dash-title"> Total Customer </div>
                                        <div class="dash-counts">
                                            <p><?php echo $total_customer; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="progress progress-sm mt-3">
                                    <div class="progress-bar bg-5" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i class="fas fa-arrow-down me-1"></i>1.15%</span> since last week</p> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header"> <span class="dash-widget-icon bg-2"> <i class="fas fa-users"></i> </span>
                                    <div class="dash-count">
                                        <div class="dash-title">Total Vendor</div>
                                        <div class="dash-counts">
                                            <p><?php echo $total_vendor; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="progress progress-sm mt-3">
                                    <div class="progress-bar bg-6" role="progressbar" style="width: 65%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i class="fas fa-arrow-up me-1"></i>2.37%</span> since last week</p> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header"> <span class="dash-widget-icon bg-3"> <i class="fas fa-file-alt"></i> </span>
                                    <div class="dash-count">
                                        <div class="dash-title">Total Invoices</div>
                                        <div class="dash-counts">
                                            <p><?php echo $total_invoice; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="progress progress-sm mt-3">
                                    <div class="progress-bar bg-7" role="progressbar" style="width: 85%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i class="fas fa-arrow-up me-1"></i>3.77%</span> since last week</p> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="dash-widget-header"> <span class="dash-widget-icon bg-4"> <i class="far fa-file"></i> </span>
                                    <div class="dash-count">
                                        <div class="dash-title">Total Bill</div>
                                        <div class="dash-counts">
                                            <p><?php echo $total_bill; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="progress progress-sm mt-3">
                                    <div class="progress-bar bg-8" role="progressbar" style="width: 45%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i class="fas fa-arrow-down me-1"></i>8.68%</span> since last week</p> -->
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title">Recent Invoices</h5>
                                    </div>
                                    <div class="col-auto"> <a href="<?php echo base_url('admin/invoice_list/'); ?>" class="btn-right btn btn-sm btn-outline-primary"> View All </a> </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- <div class="mb-3">
                                    <div class="progress progress-md rounded-pill mb-3">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 47%" aria-valuenow="47" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-auto"> <i class="fas fa-circle text-success me-1"></i> Paid </div>
                                        <div class="col-auto"> <i class="fas fa-circle text-warning me-1"></i> Unpaid </div>
                                        <div class="col-auto"> <i class="fas fa-circle text-danger me-1"></i> Overdue </div>
                                        <div class="col-auto"> <i class="fas fa-circle text-info me-1"></i> Draft </div>
                                    </div>
                                </div> -->
                                <div class="table-responsive">
                                    <table class="table table-stripped table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Customer</th>
                                                <th>Amount</th>
                                                <th>Due Date</th>
                                                <th>Status</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($invoice_list as $il)
                                            {
                                                
                                            
                                            ?>
                                            <tr>

                                                <td>
                                                    <a href="<?php echo base_url('admin/view_invoice/'.$il->id.''); ?>" class="invoice-link" style="color:blue;"><?php echo $il->name;?></a>
                                                </td>

                                                <td class="text-primary">
                                                    ₹<?php echo $il->totalamt - $il->payment;?>
                                                </td>

                                                <td><?php echo date('d-M-Y',strtotime($il->due_date));?></td>

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
                                                            Sent
                                                        </span>';
                                                    }

                                                    elseif($il->due_amount == $il->payment)
                                                    {
                                                        //$status = 'Paid';
                                                        echo '<span class="badge bg-success-light">
                                                            Paid
                                                        </span>';
                                                    }
                                                    elseif($il->due_date < $date)
                                                    {
                                                        //$status = 'Partially paid';
                                                        echo '<span class="badge bg-danger-light">Overdue</span>';
                                                    }
                                                    elseif($il->due_amount != $il->payment)
                                                    {
                                                        //$status = 'Partially paid';
                                                        echo '<span class="badge bg-warning-light">
                                                            Partially paid
                                                        </span>';
                                                    }
                                                    
                                                    ?>
                                                </td>

                                                <td class=""> 
                                                    <a href="<?php echo base_url('admin/edit_invoice/'.$il->id.''); ?>" class="btn btn-sm btn-white text-success me-2"><i class="far fa-eye me-1"></i> </a>
                                                </td>
                                            </tr>

                                            <?php } ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title">Recent Bill</h5>
                                    </div>
                                    <div class="col-auto"> <a href="<?php echo base_url('admin/bill_list/'); ?>" class="btn-right btn btn-sm btn-outline-primary"> View All </a> </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- <div class="mb-3">
                                    <div class="progress progress-md rounded-pill mb-3">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 39%" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 26%" aria-valuenow="26" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-auto"> <i class="fas fa-circle text-success me-1"></i> Sent </div>
                                        <div class="col-auto"> <i class="fas fa-circle text-warning me-1"></i> Draft </div>
                                        <div class="col-auto"> <i class="fas fa-circle text-danger me-1"></i> Expired </div>
                                    </div>
                                </div> -->
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Vendor</th>
                                                <th>Due Date</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            foreach ($bill_list as $il)
                                            {
                                                
                                            
                                            ?>
                                            <tr>
                                                <td>
                                                    <a href="<?php echo base_url('admin/view_bill/'.$il->id.''); ?>" class="invoice-link" style="color:blue;"><?php echo $il->company_name;?></a>
                                                </td>

                                                <td class="text-primary"><?php echo date('d-M-Y',strtotime($il->due_date));?></td>

                                                <td class="text-primary">₹<?php echo $il->totalamt - $il->payment;?></td>

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

                                                <td class="text-end"> 
                                                    <a href="<?php echo base_url('admin/edit_bill/'.$il->id.''); ?>" class="btn btn-sm btn-white text-success me-2"><i class="far fa-eye me-1"></i> </a>

                                                    
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
                <br>

                <div class="row">
                    <div class="col-xl-7 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title">Sales Analytics</h5>
                                    <div class="dropdown"> <button class="btn btn-white btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"> Monthly </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li> <a href="javascript:void(0);" class="dropdown-item">Weekly</a> </li>
                                            <li> <a href="javascript:void(0);" class="dropdown-item">Monthly</a> </li>
                                            <li> <a href="javascript:void(0);" class="dropdown-item">Yearly</a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between flex-wrap flex-md-nowrap">
                                    <div class="w-md-100 d-flex align-items-center mb-3 flex-wrap flex-md-nowrap">
                                        <div> <span>Total Sales</span>
                                            <p class="h3 text-primary me-5">₹ 1000</p>
                                        </div>
                                        <div> <span>Receipts</span>
                                            <p class="h3 text-success me-5">₹ 1000</p>
                                        </div>
                                        <div> <span>Expenses</span>
                                            <p class="h3 text-danger me-5">₹ 300</p>
                                        </div>
                                        <div> <span>Earnings</span>
                                            <p class="h3 text-dark me-5">₹ 700</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="sales_chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title">Invoice Analytics</h5>
                                    <div class="dropdown"> <button class="btn btn-white btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"> Monthly </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li> <a href="javascript:void(0);" class="dropdown-item">Weekly</a> </li>
                                            <li> <a href="javascript:void(0);" class="dropdown-item">Monthly</a> </li>
                                            <li> <a href="javascript:void(0);" class="dropdown-item">Yearly</a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="invoice_chart"></div>
                                <div class="text-center text-muted">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="mt-4">
                                                <p class="mb-2 text-truncate"><i class="fas fa-circle text-primary me-1"></i> Invoiced</p>
                                                <h5>₹2,132</h5>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mt-4">
                                                <p class="mb-2 text-truncate"><i class="fas fa-circle text-success me-1"></i> Received</p>
                                                <h5>₹1,763</h5>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="mt-4">
                                                <p class="mb-2 text-truncate"><i class="fas fa-circle text-danger me-1"></i> Pending</p>
                                                <h5>₹973</h5>
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
    <script src="<?php echo base_url();?>assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/apexchart/chart-data.js"></script>
    <script src="<?php echo base_url();?>assets/js/script.js"></script>
</body>

</html>