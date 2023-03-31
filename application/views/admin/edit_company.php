<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Edit Company Details</title>
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon.png">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
</head>

<body>
    <div class="main-wrapper">
        <?php echo include('header.php'); ?>

        <?php echo include('sidebar.php'); ?>
        <div class="page-wrapper">
            <div class="content container-fluid">
                
                <div class="row">
                    <!-- <div class="col-xl-3 col-md-4">
                        <div class="widget settings-menu">
                            <ul>
                                <li class="nav-item"> <a href="settings.html" class="nav-link active"> <i class="far fa-user"></i> <span>Company Info </span> </a> </li>
                                <li class="nav-item"> <a href="preferences.html" class="nav-link"> <i class="fas fa-cog"></i> <span>Preferences</span> </a> </li>
                                <li class="nav-item"> <a href="tax-types.html" class="nav-link"> <i class="far fa-check-square"></i> <span>Tax Types</span> </a> </li>
                                <li class="nav-item"> <a href="expense-category.html" class="nav-link"> <i class="far fa-list-alt"></i> <span>Expense Category</span> </a> </li>
                                <li class="nav-item"> <a href="notifications.html" class="nav-link"> <i class="far fa-bell"></i> <span>Notifications</span> </a> </li>
                                <li class="nav-item"> <a href="change-password.html" class="nav-link"> <i class="fas fa-unlock-alt"></i> <span>Change Password</span> </a> </li>
                                <li class="nav-item"> <a href="delete-account.html" class="nav-link"> <i class="fas fa-ban"></i> <span>Delete Account</span> </a> </li>
                            </ul>
                        </div>
                    </div> -->
                    <div class="col-xl-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Company Details</h5>
                            </div>
                            <div class="card-body">
                                <form method="post" id="company_form" action="<?php echo base_url('admin/update_company');?>" enctype="multipart/form-data" autocomplete="off">
                                    
                                    <input type="hidden" name="company_id" id="company_id" value="<?php echo $edit_company->id; ?>">

                                    <input type="hidden" name="old_photo" value="<?php echo $edit_company->photo;?>">

                                    <input type="hidden" name="old_sign" value="<?php echo $edit_company->sign;?>">

                                    <div class="row form-group"> <label for="name" class="col-sm-3 col-form-label input-label">Photo</label>
                                        <div class="col-sm-9">
                                            <div class="d-flex align-items-center">
                                                <label class="avatar avatar-xxl profile-cover-avatar m-0" for="photo">
                                                    <img id="avatarImg" class="avatar-img" src="<?php echo base_url();?>uploads/company/<?php echo $edit_company->photo; ?>" alt="Profile Image">
                                                    <input type="file" name="photo" id="photo"> <span class="avatar-edit"> <i data-feather="edit-2" class="avatar-uploader-icon shadow-soft"></i> </span> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="name" class="col-sm-3 col-form-label input-label">Company Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="company_name" id="company_name" value="<?php echo $edit_company->company_name; ?>" placeholder="Your Company Name">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label for="email" class="col-sm-3 col-form-label input-label">Organization Type</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="organization_type" id="organization_type">
                                                <option value="Partnership" <?php if($edit_company->organization_type == 'Partnership'){echo 'selected';} ?>>Partnership</option>
                                                <option value="Proprietor" <?php if($edit_company->organization_type == 'Proprietor'){echo 'selected';} ?>>Proprietor</option>
                                                <option value="LLP" <?php if($edit_company->organization_type == 'LLP'){echo 'selected';} ?>>LLP</option>
                                                <option value="Private Limited Company" <?php if($edit_company->organization_type == 'Private Limited Company'){echo 'selected';} ?>>Private Limited Company</option>
                                                <option value="Public Company" <?php if($edit_company->organization_type == 'Public Company'){echo 'selected';} ?>>Public Company</option>
                                                <option value="Other" <?php if($edit_company->organization_type == 'Other'){echo 'selected';} ?>>Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label for="phone" class="col-sm-3 col-form-label input-label">Fiscal Year </label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="fiscal_year" id="fiscal_year">
                                                <option value="">Fiscal Year</option>
                                                <option value="February-January" <?php if($edit_company->fiscal_year == 'February-January'){echo 'selected';} ?>>February-January</option>
                                                <option value="March-February" <?php if($edit_company->fiscal_year == 'March-February'){echo 'selected';} ?>>March-February</option>
                                                <option value="April-March" <?php if($edit_company->fiscal_year == 'April-March'){echo 'selected';} ?>>April-March</option>
                                                <option value="May-April" <?php if($edit_company->fiscal_year == 'May-April'){echo 'selected';} ?>>May-April</option>
                                                <option value="June-May" <?php if($edit_company->fiscal_year == 'June-May'){echo 'selected';} ?>>June-May</option>
                                                <option value="July-June" <?php if($edit_company->fiscal_year == 'July-June'){echo 'selected';} ?>>July-June</option>
                                                <option value="August-July" <?php if($edit_company->fiscal_year == 'August-July'){echo 'selected';} ?>>August-July</option>
                                                <option value="September-August" <?php if($edit_company->fiscal_year == 'September-August'){echo 'selected';} ?>>September-August</option>
                                                <option value="October-September" <?php if($edit_company->fiscal_year == 'October-September'){echo 'selected';} ?>>October-September</option>
                                                <option value="November-October" <?php if($edit_company->fiscal_year == 'November-October'){echo 'selected';} ?>>November-October</option>
                                                <option value="December-November" <?php if($edit_company->fiscal_year == 'December-November'){echo 'selected';} ?>>December-November</option>
                                                <option value="January-December" <?php if($edit_company->fiscal_year == 'January-December'){echo 'selected';} ?>>January-December</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label for="location" class="col-sm-3 col-form-label input-label">Industry</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="industry" id="industry">
                                                <option value="Accounting Services" <?php if($edit_company->industry == 'Accounting Services'){echo 'selected';} ?>>Accounting Services</option>

                                                <option value="Administrative Services" <?php if($edit_company->industry == 'Administrative Services'){echo 'selected';} ?>>Administrative Services</option>

                                                <option value="Advertising" <?php if($edit_company->industry == 'Advertising'){echo 'selected';} ?>>Advertising</option>

                                                <option value="Agriculture, Farming, Fishing and Forestry An" <?php if($edit_company->industry == 'Agriculture, Farming, Fishing and Forestry An'){echo 'selected';} ?>>Agriculture, Farming, Fishing and Forestry An</option>

                                                <option value="Amusement, Gambling, and Recreation" <?php if($edit_company->industry == 'Amusement, Gambling, and Recreation'){echo 'selected';} ?>>Amusement, Gambling, and Recreation</option>

                                                <option value="Architectural" <?php if($edit_company->industry == 'Architectural'){echo 'selected';} ?>>Architectural</option>

                                                <option value="CA/TAX Consultant" <?php if($edit_company->industry == 'CA/TAX Consultant'){echo 'selected';} ?>>CA/TAX Consultant</option>

                                                <option value="Charity,Nonprofits and Similar Groups" <?php if($edit_company->industry == 'Charity,Nonprofits and Similar Groups'){echo 'selected';} ?>>Charity,Nonprofits and Similar Groups</option>

                                                <option value="Computer Systems Design and Related Services" <?php if($edit_company->industry == 'Computer Systems Design and Related Services'){echo 'selected';} ?>>Computer Systems Design and Related Services</option>

                                                <option value="Construction Land and Property including Mana" <?php if($edit_company->industry == 'Construction Land and Property including Mana'){echo 'selected';} ?>>Construction Land and Property including Mana</option>

                                                <option value="Creative Design" <?php if($edit_company->industry == 'Creative Design'){echo 'selected';} ?>>Creative Design</option>

                                                <option value="Design and Related Services" <?php if($edit_company->industry == 'Design and Related Services'){echo 'selected';} ?>>Design and Related Services</option>

                                                <option value="E-Commerce" <?php if($edit_company->industry == 'E-Commerce'){echo 'selected';} ?>>E-Commerce</option>

                                                <option value="Engineering" <?php if($edit_company->industry == 'Engineering'){echo 'selected';} ?>>Engineering</option>

                                                <option value="Finance" <?php if($edit_company->industry == 'Finance'){echo 'selected';} ?>>Finance</option>

                                                <option value="Food &amp;amp; Beverage Establishments" <?php if($edit_company->industry == 'Food &amp;amp; Beverage Establishments'){echo 'selected';} ?>>Food &amp;amp; Beverage Establishments</option>

                                                <option value="General Service-Based Business" <?php if($edit_company->industry == 'General Service-Based Business'){echo 'selected';} ?>>General Service-Based Business</option>

                                                <option value="Hair Salons, Barbers and Spas" <?php if($edit_company->industry == 'Hair Salons, Barbers and Spas'){echo 'selected';} ?>>Hair Salons, Barbers and Spas</option>

                                                <option value="Healthcare Services Legal Services" <?php if($edit_company->industry == 'Healthcare Services Legal Services'){echo 'selected';} ?>>Healthcare Services Legal Services</option>

                                                <option value="Human Resources and Placement Consulting" <?php if($edit_company->industry == 'Human Resources and Placement Consulting'){echo 'selected';} ?>>Human Resources and Placement Consulting</option>

                                                <option value="Insurance" <?php if($edit_company->industry == 'Insurance'){echo 'selected';} ?>>Insurance</option>

                                                <option value="IT &amp;Telecommunications" <?php if($edit_company->industry == 'IT &amp;Telecommunications'){echo 'selected';} ?>>IT &amp;Telecommunications</option>

                                                <option value="Landscaping and Gardening Services" <?php if($edit_company->industry == 'Landscaping and Gardening Services'){echo 'selected';} ?>>Landscaping and Gardening Services</option>

                                                <option value="Learning Institutes" <?php if($edit_company->industry == 'Learning Institutes'){echo 'selected';} ?>>Learning Institutes</option>

                                                <option value="Mail Order and Online Educational Services" <?php if($edit_company->industry == 'Mail Order and Online Educational Services'){echo 'selected';} ?>>Mail Order and Online Educational Services</option>

                                                <option value="Manufacturing and Mining" <?php if($edit_company->industry == 'Manufacturing and Mining'){echo 'selected';} ?>>Manufacturing and Mining</option>

                                                <option value="Media and Marketing Services Consulting" <?php if($edit_company->industry == 'Media and Marketing Services Consulting'){echo 'selected';} ?>>Media and Marketing Services Consulting</option>

                                                <option value="Other" <?php if($edit_company->industry == 'Other'){echo 'selected';} ?>>Other</option>

                                                <option value="Performing Arts" <?php if($edit_company->industry == 'Performing Arts'){echo 'selected';} ?>>Performing Arts</option>

                                                <option value="Professional and Technical Services" <?php if($edit_company->industry == 'Professional and Technical Services'){echo 'selected';} ?>>Professional and Technical Services</option>

                                                <option value="Retail Shops" <?php if($edit_company->industry == 'Retail Shops'){echo 'selected';} ?>>Retail Shops</option>

                                                <option value="Spectator Sports,and Related Industries" <?php if($edit_company->industry == 'Spectator Sports,and Related Industries'){echo 'selected';} ?>>Spectator Sports,and Related Industries</option>

                                                <option value="Transportation and Warehousing" <?php if($edit_company->industry == 'Transportation and Warehousing'){echo 'selected';} ?>>Transportation and Warehousing</option>

                                                <option value="Travel and Tourism Services" <?php if($edit_company->industry == 'Travel and Tourism Services'){echo 'selected';} ?>>Travel and Tourism Services</option>

                                                <option value="Vehicle Sales, Maintenance and Repairs Care G" <?php if($edit_company->industry == 'Vehicle Sales, Maintenance and Repairs Care G'){echo 'selected';} ?>>Vehicle Sales, Maintenance and Repairs Care G</option>

                                                <option value="Wholesale Trade and Distributors" <?php if($edit_company->industry == 'Wholesale Trade and Distributors'){echo 'selected';} ?>>Wholesale Trade and Distributors</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label for="addressline1" class="col-sm-3 col-form-label input-label">Currency</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="currency" id="currency">
                                                <option label="AED (د.إ) - Dirham" value="3776335350714" <?php if($edit_company->currency == '3776335350714'){echo 'selected';} ?>>AED (د.إ) - Dirham</option>

                                                <option label="AF (؋) - Afghanis" value="3776328765135" <?php if($edit_company->currency == '3776328765135'){echo 'selected';} ?>>AF (؋) - Afghanis</option>

                                                <option label="ALL (Lek) - Leke" value="3776328663033" <?php if($edit_company->currency == '3776328663033'){echo 'selected';} ?>>ALL (Lek) - Leke</option>

                                                <option label="ANG (ƒ) - Guilders" value="3776332849215" <?php if($edit_company->currency == '3776332849215'){echo 'selected';} ?>>ANG (ƒ) - Guilders</option>

                                                <option label="ARS ($) - Pesos" value="3776328816186" <?php if($edit_company->currency == '3776328816186'){echo 'selected';} ?>>ARS ($) - Pesos</option>

                                                <option label="AUD ($) - Dollars" value="3776328918288" <?php if($edit_company->currency == ''){echo 'selected';} ?>>AUD ($) - Dollars</option>

                                                <option label="AWG (ƒ) - Guilders" value="3776328867237" <?php if($edit_company->currency == '3776328867237'){echo 'selected';} ?>>AWG (ƒ) - Guilders</option>

                                                <option label="AZ (ман) - New Manats" value="3776328969339" <?php if($edit_company->currency == '3776328969339'){echo 'selected';} ?>>AZ (ман) - New Manats</option>

                                                <option label="BAM (KM) - Convertible Marka" value="3776329377747" <?php if($edit_company->currency == '3776329377747'){echo 'selected';} ?>>BAM (KM) - Convertible Marka</option>

                                                <option label="BBD ($) - Dollars" value="3776329071441" <?php if($edit_company->currency == '3776329071441'){echo 'selected';} ?>>BBD ($) - Dollars</option>

                                                <option label="BG (лв) - Leva" value="3776329479849" <?php if($edit_company->currency == '3776329479849'){echo 'selected';} ?>>BG (лв) - Leva</option>

                                                <option label="BMD ($) - Dollars" value="3776329275645" <?php if($edit_company->currency == '3776329275645'){echo 'selected';} ?>>BMD ($) - Dollars</option>

                                                <option label="BND ($) - Dollars" value="3776329633002" <?php if($edit_company->currency == '3776329633002'){echo 'selected';} ?>>BND ($) - Dollars</option>

                                                <option label="BOB ($b) - Bolivianos" value="3776329326696" <?php if($edit_company->currency == '3776329326696'){echo 'selected';} ?>>BOB ($b) - Bolivianos</option>

                                                <option label="BRL (R$) - Reais" value="3776329530900" <?php if($edit_company->currency == '3776329530900'){echo 'selected';} ?>>BRL (R$) - Reais</option>

                                                <option label="BSD ($) - Dollars" value="3776329020390" <?php if($edit_company->currency == '3776329020390'){echo 'selected';} ?>>BSD ($) - Dollars</option>

                                                <option label="BWP (P) - Pula's" value="3776329428798" <?php if($edit_company->currency == '3776329428798'){echo 'selected';} ?>>BWP (P) - Pula's</option>

                                                <option label="BYR (p.) - Rubles" value="3776329122492" <?php if($edit_company->currency == '3776329122492'){echo 'selected';} ?>>BYR (p.) - Rubles</option>

                                                <option label="BZD (BZ$) - Dollars" value="3776329224594" <?php if($edit_company->currency == '3776329224594'){echo 'selected';} ?>>BZD (BZ$) - Dollars</option>

                                                <option label="CAD ($) - Dollars" value="3776329735104" <?php if($edit_company->currency == '3776329735104'){echo 'selected';} ?>>CAD ($) - Dollars</option>

                                                <option label="CHF (CHF) - Switzerland Francs" value="3776332236603" <?php if($edit_company->currency == '3776332236603'){echo 'selected';} ?>>CHF (CHF) - Switzerland Francs</option>

                                                <option label="CHF (CHF) - Francs" value="3776334380745" <?php if($edit_company->currency == '3776334380745'){echo 'selected';} ?>>CHF (CHF) - Francs</option>

                                                <option label="CLP ($) - Pesos" value="3776329837206" <?php if($edit_company->currency == '3776329837206'){echo 'selected';} ?>>CLP ($) - Pesos</option>

                                                <option label="CNY (¥) - Yuan Renminbi" value="3776329888257" <?php if($edit_company->currency == '3776329888257'){echo 'selected';} ?>>CNY (¥) - Yuan Renminbi</option>

                                                <option label="COP ($) - Pesos" value="3776329939308" <?php if($edit_company->currency == '3776329939308'){echo 'selected';} ?>>COP ($) - Pesos</option>

                                                <option label="CRC (₡) - Colón" value="3776329990359" <?php if($edit_company->currency == '3776329990359'){echo 'selected';} ?>>CRC (₡) - Colón</option>

                                                <option label="CUP (₱) - Pesos" value="3776330092461" <?php if($edit_company->currency == '3776330092461'){echo 'selected';} ?>>CUP (₱) - Pesos</option>

                                                <option label="CZK (Kč) - Koruny" value="3776330194563" <?php if($edit_company->currency == '3776330194563'){echo 'selected';} ?>>CZK (Kč) - Koruny</option>

                                                <option label="DKK (kr) - Kroner" value="3776330245614" <?php if($edit_company->currency == '3776330245614'){echo 'selected';} ?>>DKK (kr) - Kroner</option>

                                                <option label="DOP (RD$) - Pesos" value="3776330296665" <?php if($edit_company->currency == '3776330296665'){echo 'selected';} ?>>DOP (RD$) - Pesos</option>

                                                <option label="EGP (£) - Pounds" value="3776330398767" <?php if($edit_company->currency == '3776330398767'){echo 'selected';} ?>>EGP (£) - Pounds</option>

                                                <option label="EUR (€) - Euro" value="3776329173543" <?php if($edit_company->currency == '3776329173543'){echo 'selected';} ?>>EUR (€) - Euro</option>

                                                <option label="EUR (€) - Euro" value="3776330143512" <?php if($edit_company->currency == '3776330143512'){echo 'selected';} ?>>EUR (€) - Euro</option>

                                                <option label="EUR (€) - Euro" value="3776330551920" <?php if($edit_company->currency == '3776330551920'){echo 'selected';} ?>>EUR (€) - Euro</option>

                                                <option label="EUR (€) - Euro" value="3776330705073" <?php if($edit_company->currency == '3776330705073'){echo 'selected';} ?>>EUR (€) - Euro</option>

                                                <option label="EUR (€) - Euro" value="3776330858226" <?php if($edit_company->currency == '3776330858226'){echo 'selected';} ?>>EUR (€) - Euro</option>

                                                <option label="EUR (€) - Euro" value="3776331062430" <?php if($edit_company->currency == '3776331062430'){echo 'selected';} ?>>EUR (€) - Euro</option>

                                                <option label="EUR (€) - Euro" value="3776331470838" <?php if($edit_company->currency == '3776331470838'){echo 'selected';} ?>>EUR (€) - Euro</option>

                                                <option label="EUR (€) - Euro" value="3776331623991" <?php if($edit_company->currency == '3776331623991'){echo 'selected';} ?>>EUR (€) - Euro</option>

                                                <option label="EUR (€) - Euro" value="3776332338705" <?php if($edit_company->currency == '3776332338705'){echo 'selected';} ?>>EUR (€) - Euro</option>

                                                <option label="EUR (€) - Euro" value="3776332491858" <?php if($edit_company->currency == '3776332491858'){echo 'selected';} ?>>EUR (€) - Euro</option>

                                                <option label="EUR (€) - Euro" value="3776332900266" <?php if($edit_company->currency == '3776332900266'){echo 'selected';} ?>>EUR (€) - Euro</option>

                                                <option label="EUR (€) - Euro" value="3776333972337" <?php if($edit_company->currency == '3776333972337'){echo 'selected';} ?>>EUR (€) - Euro</option>

                                                <option label="EUR (€) - Euro" value="3776334227592" <?php if($edit_company->currency == '3776334227592'){echo 'selected';} ?>>EUR (€) - Euro</option>

                                                <option label="EUR (€) - Euro" value="3776335095459" <?php if($edit_company->currency == '3776335095459'){echo 'selected';} ?>>EUR (€) - Euro</option>

                                                <option label="FJD ($) - Dollars" value="3776330654022" <?php if($edit_company->currency == '3776330654022'){echo 'selected';} ?>>FJD ($) - Dollars</option>

                                                <option label="FKP (£) - Pounds" value="3776330602971" <?php if($edit_company->currency == '3776330602971'){echo 'selected';} ?>>FKP (£) - Pounds</option>

                                                <option label="GBP (£) - Pounds" value="3776329581951" <?php if($edit_company->currency == '3776329581951'){echo 'selected';} ?>>GBP (£) - Pounds</option>

                                                <option label="GBP (£) - Pounds" value="3776330500869" <?php if($edit_company->currency == '3776330500869'){echo 'selected';} ?>>GBP (£) - Pounds</option>

                                                <option label="GBP (£) - Pounds" value="3776334891255" <?php if($edit_company->currency == '3776334891255'){echo 'selected';} ?>>GBP (£) - Pounds</option>

                                                <option label="GGP (£) - Pounds" value="3776330960328" <?php if($edit_company->currency == '3776330960328'){echo 'selected';} ?>>GGP (£) - Pounds</option>

                                                <option label="GHC (¢) - Cedis" value="3776330756124" <?php if($edit_company->currency == '3776330756124'){echo 'selected';} ?>>GHC (¢) - Cedis</option>

                                                <option label="GIP (£) - Pounds" value="3776330807175" <?php if($edit_company->currency == '3776330807175'){echo 'selected';} ?>>GIP (£) - Pounds</option>

                                                <option label="GTQ (Q) - Quetzales" value="3776330909277" <?php if($edit_company->currency == '3776330909277'){echo 'selected';} ?>>GTQ (Q) - Quetzales</option>

                                                <option label="GYD ($) - Dollars" value="3776331011379" <?php if($edit_company->currency == '3776331011379'){echo 'selected';} ?>>GYD ($) - Dollars</option>

                                                <option label="HKD ($) - Dollars" value="3776331164532" <?php if($edit_company->currency == '3776331164532'){echo 'selected';} ?>>HKD ($) - Dollars</option>

                                                <option label="HNL (L) - Lempiras" value="3776331113481" <?php if($edit_company->currency == '3776331113481'){echo 'selected';} ?>>HNL (L) - Lempiras</option>

                                                <option label="HRK (kn) - Kuna" value="3776330041410" <?php if($edit_company->currency == '3776330041410'){echo 'selected';} ?>>HRK (kn) - Kuna</option>

                                                <option label="HUF (Ft) - Forint" value="3776331215583" <?php if($edit_company->currency == '3776331215583'){echo 'selected';} ?>>HUF (Ft) - Forint</option>

                                                <option label="IDR (Rp) - Rupiahs" value="3776331368736" <?php if($edit_company->currency == '3776331368736'){echo 'selected';} ?>>IDR (Rp) - Rupiahs</option>

                                                <option label="ILS (₪) - New Shekels" value="3776331572940" <?php if($edit_company->currency == '3776331572940'){echo 'selected';} ?>>ILS (₪) - New Shekels</option>

                                                <option label="IMP (£) - Pounds" value="3776331521889" <?php if($edit_company->currency == '3776331521889'){echo 'selected';} ?>>IMP (£) - Pounds</option>

                                                <option label="INR (₹) - Rupees" value="3776331317685" <?php if($edit_company->currency == '3776331317685'){echo 'selected';} ?>>INR (₹) - Rupees</option>

                                                <option label="IRR (﷼) - Rials" value="3776331419787" <?php if($edit_company->currency == '3776331419787'){echo 'selected';} ?>>IRR (﷼) - Rials</option>

                                                <option label="ISK (kr) - Kronur" value="3776331266634" <?php if($edit_company->currency == '3776331266634'){echo 'selected';} ?>>ISK (kr) - Kronur</option>

                                                <option label="JEP (£) - Pounds" value="3776331777144" <?php if($edit_company->currency == '3776331777144'){echo 'selected';} ?>>JEP (£) - Pounds</option>

                                                <option label="JMD (J$) - Dollars" value="3776331675042" <?php if($edit_company->currency == '3776331675042'){echo 'selected';} ?>>JMD (J$) - Dollars</option>

                                                <option label="JPY (¥) - Yen" value="3776331726093" <?php if($edit_company->currency == '3776331726093'){echo 'selected';} ?>>JPY (¥) - Yen</option>

                                                <option label="KGS (лв) - Soms" value="3776331981348" <?php if($edit_company->currency == '3776331981348'){echo 'selected';} ?>>KGS (лв) - Soms</option>

                                                <option label="KHR (៛) - Riels" value="3776329684053" <?php if($edit_company->currency == '3776329684053'){echo 'selected';} ?>>KHR (៛) - Riels</option>

                                                <option label="KPW (₩) - Won" value="3776331879246" <?php if($edit_company->currency == '3776331879246'){echo 'selected';} ?>>KPW (₩) - Won</option>

                                                <option label="KPW (₩) - Won" value="3776333104470" <?php if($edit_company->currency == '3776333104470'){echo 'selected';} ?>>KPW (₩) - Won</option>

                                                <option label="KRW (₩) - Won" value="3776331930297" <?php if($edit_company->currency == '3776331930297'){echo 'selected';} ?>>KRW (₩) - Won</option>

                                                <option label="KRW (₩) - Won" value="3776334176541" <?php if($edit_company->currency == '3776334176541'){echo 'selected';} ?>>KRW (₩) - Won</option>

                                                <option label="KYD ($) - Dollars" value="3776329786155" <?php if($edit_company->currency == '3776329786155'){echo 'selected';} ?>>KYD ($) - Dollars</option>

                                                <option label="KZT (лв) - Tenge" value="3776331828195" <?php if($edit_company->currency == '3776331828195'){echo 'selected';} ?>>KZT (лв) - Tenge</option>

                                                <option label="LAK (₭) - Kips" value="3776332032399" <?php if($edit_company->currency == '3776332032399'){echo 'selected';} ?>>LAK (₭) - Kips</option>

                                                <option label="LBP (£) - Pounds" value="3776332134501" <?php if($edit_company->currency == '3776332134501'){echo 'selected';} ?>>LBP (£) - Pounds</option>

                                                <option label="LKR (₨) - Rupees" value="3776334278643" <?php if($edit_company->currency == '3776334278643'){echo 'selected';} ?>>LKR (₨) - Rupees</option>

                                                <option label="LRD ($) - Dollars" value="3776332185552" <?php if($edit_company->currency == '3776332185552'){echo 'selected';} ?>>LRD ($) - Dollars</option>

                                                <option label="LTL (Lt) - Litai" value="3776332287654" <?php if($edit_company->currency == '3776332287654'){echo 'selected';} ?>>LTL (Lt) - Litai</option>

                                                <option label="LVL (Ls) - Lati" value="3776332083450" <?php if($edit_company->currency == '3776332083450'){echo 'selected';} ?>>LVL (Ls) - Lati</option>

                                                <option label="MKD (ден) - Denars" value="3776332389756" <?php if($edit_company->currency == '3776332389756'){echo 'selected';} ?>>MKD (ден) - Denars</option>

                                                <option label="MNT (₮) - Tugriks" value="3776332645011" <?php if($edit_company->currency == '3776332645011'){echo 'selected';} ?>>MNT (₮) - Tugriks</option>

                                                <option label="MUR (₨) - Rupees" value="3776332542909" <?php if($edit_company->currency == '3776332542909'){echo 'selected';} ?>>MUR (₨) - Rupees</option>

                                                <option label="MX ($) - Pesos" value="3776332593960" <?php if($edit_company->currency == '3776332593960'){echo 'selected';} ?>>MX ($) - Pesos</option>

                                                <option label="MYR (RM) - Ringgits" value="3776332440807" <?php if($edit_company->currency == '3776332440807'){echo 'selected';} ?>>MYR (RM) - Ringgits</option>

                                                <option label="MZ (MT) - Meticais" value="3776332696062" <?php if($edit_company->currency == '3776332696062'){echo 'selected';} ?>>MZ (MT) - Meticais</option>

                                                <option label="NAD ($) - Dollars" value="3776332747113" <?php if($edit_company->currency == '3776332747113'){echo 'selected';} ?>>NAD ($) - Dollars</option>

                                                <option label="NG (₦) - Nairas" value="3776333053419" <?php if($edit_company->currency == '3776333053419'){echo 'selected';} ?>>NG (₦) - Nairas</option>

                                                <option label="NIO (C$) - Cordobas" value="3776333002368" <?php if($edit_company->currency == '3776333002368'){echo 'selected';} ?>>NIO (C$) - Cordobas</option>

                                                <option label="NOK (kr) - Krone" value="3776333155521" <?php if($edit_company->currency == '3776333155521'){echo 'selected';} ?>>NOK (kr) - Krone</option>

                                                <option label="NPR (₨) - Rupees" value="3776332798164" <?php if($edit_company->currency == '3776332798164'){echo 'selected';} ?>>NPR (₨) - Rupees</option>

                                                <option label="NZD ($) - Dollars" value="3776332951317" <?php if($edit_company->currency == '3776332951317'){echo 'selected';} ?>>NZD ($) - Dollars</option>

                                                <option label="OMR (﷼) - Rials" value="3776333206572" <?php if($edit_company->currency == '3776333206572'){echo 'selected';} ?>>OMR (﷼) - Rials</option>

                                                <option label="PAB (B/.) - Balboa" value="3776333308674" <?php if($edit_company->currency == '3776333308674'){echo 'selected';} ?>>PAB (B/.) - Balboa</option>

                                                <option label="PE (S/.) - Nuevos Soles" value="3776333410776" <?php if($edit_company->currency == '3776333410776'){echo 'selected';} ?>>PE (S/.) - Nuevos Soles</option>

                                                <option label="PHP (Php) - Pesos" value="3776333461827" <?php if($edit_company->currency == '3776333410776'){echo 'selected';} ?>>PHP (Php) - Pesos</option>

                                                <option label="PKR (₨) - Rupees" value="3776333257623" <?php if($edit_company->currency == '3776333410776'){echo 'selected';} ?>>PKR (₨) - Rupees</option>

                                                <option label="PL (zł) - Zlotych" value="3776333512878" <?php if($edit_company->currency == '3776333512878'){echo 'selected';} ?>>PL (zł) - Zlotych</option>

                                                <option label="PYG (Gs) - Guarani" value="3776333359725" <?php if($edit_company->currency == '3776333359725'){echo 'selected';} ?>>PYG (Gs) - Guarani</option>

                                                <option label="QAR (﷼) - Rials" value="3776333563929" <?php if($edit_company->currency == '3776333563929'){echo 'selected';} ?>>QAR (﷼) - Rials</option>

                                                <option label="RO (lei) - New Lei" value="3776333614980" <?php if($edit_company->currency == '3776333614980'){echo 'selected';} ?>>RO (lei) - New Lei</option>

                                                <option label="RSD (Дин.) - Dinars" value="3776333819184" <?php if($edit_company->currency == '3776333819184'){echo 'selected';} ?>>RSD (Дин.) - Dinars</option>

                                                <option label="RUB (руб) - Rubles" value="3776333666031" <?php if($edit_company->currency == '3776333666031'){echo 'selected';} ?>>RUB (руб) - Rubles</option>

                                                <option label="SAR (﷼) - Riyals" value="3776333768133" <?php if($edit_company->currency == '3776333768133'){echo 'selected';} ?>>SAR (﷼) - Riyals</option>

                                                <option label="SBD ($) - Dollars" value="3776334023388" <?php if($edit_company->currency == '3776334023388'){echo 'selected';} ?>>SBD ($) - Dollars</option>

                                                <option label="SCR (₨) - Rupees" value="3776333870235" <?php if($edit_company->currency == '3776333870235'){echo 'selected';} ?>>SCR (₨) - Rupees</option>

                                                <option label="SEK (kr) - Kronor" value="3776334329694" <?php if($edit_company->currency == ''){echo 'selected';} ?>>SEK (kr) - Kronor</option>

                                                <option label="SGD ($) - Dollars" value="3776333921286" <?php if($edit_company->currency == '3776333921286'){echo 'selected';} ?>>SGD ($) - Dollars</option>

                                                <option label="SHP (£) - Pounds" value="3776333717082" <?php if($edit_company->currency == '3776333717082'){echo 'selected';} ?>>SHP (£) - Pounds</option>

                                                <option label="SOS (S) - Shillings" value="3776334074439" <?php if($edit_company->currency == '3776334074439'){echo 'selected';} ?>>SOS (S) - Shillings</option>

                                                <option label="SRD ($) - Dollars" value="3776334431796" <?php if($edit_company->currency == '3776334431796'){echo 'selected';} ?>>SRD ($) - Dollars</option>

                                                <option label="SVC ($) - Colones" value="3776330449818" <?php if($edit_company->currency == '3776330449818'){echo 'selected';} ?>>SVC ($) - Colones</option>

                                                <option label="SYP (£) - Pounds" value="3776334482847" <?php if($edit_company->currency == '3776334482847'){echo 'selected';} ?>>SYP (£) - Pounds</option>

                                                <option label="THB (฿) - Baht" value="3776334584949" <?php if($edit_company->currency == '3776334584949'){echo 'selected';} ?>>THB (฿) - Baht</option>

                                                <option label="TRL (£) - Liras" value="3776334738102" <?php if($edit_company->currency == '3776334738102'){echo 'selected';} ?>>TRL (£) - Liras</option>

                                                <option label="TRY (TL) - Lira" value="3776334687051" <?php if($edit_company->currency == '3776334687051'){echo 'selected';} ?>>TRY (TL) - Lira</option>

                                                <option label="TTD (TT$) - Dollars" value="3776334636000" <?php if($edit_company->currency == '3776334636000'){echo 'selected';} ?>>TTD (TT$) - Dollars</option>

                                                <option label="TVD ($) - Dollars" value="3776334789153" <?php if($edit_company->currency == '3776334789153'){echo 'selected';} ?>>TVD ($) - Dollars</option>

                                                <option label="TWD (NT$) - New Dollars" value="3776334533898" <?php if($edit_company->currency == '3776334533898'){echo 'selected';} ?>>TWD (NT$) - New Dollars</option>

                                                <option label="UAH (₴) - Hryvnia" value="3776334840204" <?php if($edit_company->currency == '3776334840204'){echo 'selected';} ?>>UAH (₴) - Hryvnia</option>

                                                <option label="USD ($) - Dollars" value="3776328714084" <?php if($edit_company->currency == '3776328714084'){echo 'selected';} ?>>USD ($) - Dollars</option>

                                                <option label="USD ($) - Dollars" value="3776334942306" <?php if($edit_company->currency == '3776334942306'){echo 'selected';} ?>>USD ($) - Dollars</option>

                                                <option label="UYU ($U) - Pesos" value="3776334993357" <?php if($edit_company->currency == '3776334993357'){echo 'selected';} ?>>UYU ($U) - Pesos</option>

                                                <option label="UZS (лв) - Sums" value="3776335044408" <?php if($edit_company->currency == '3776335044408'){echo 'selected';} ?>>UZS (лв) - Sums</option>

                                                <option label="VEF (Bs) - Bolivares Fuertes" value="3776335146510" <?php if($edit_company->currency == '3776335146510'){echo 'selected';} ?>>VEF (Bs) - Bolivares Fuertes</option>

                                                <option label="VND (₫) - Dong" value="3776335197561" <?php if($edit_company->currency == '3776335197561'){echo 'selected';} ?>>VND (₫) - Dong</option>

                                                <option label="XCD ($) - Dollars" value="3776330347716" <?php if($edit_company->currency == '3776330347716'){echo 'selected';} ?>>XCD ($) - Dollars</option>

                                                <option label="YER (﷼) - Rials" value="3776335248612" <?php if($edit_company->currency == '3776335248612'){echo 'selected';} ?>>YER (﷼) - Rials</option>

                                                <option label="ZAR (R) - Rand" value="3776334125490" <?php if($edit_company->currency == '3776334125490'){echo 'selected';} ?>>ZAR (R) - Rand</option>

                                                <option label="ZWD (Z$) - Zimbabwe Dollars" value="3776335299663" <?php if($edit_company->currency == '3776335299663'){echo 'selected';} ?>>ZWD (Z$) - Zimbabwe Dollars</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div>
                                        <div>
                                            <ul class="nav nav-tabs nav-tabs-bottom">
                                                <li class="nav-item">
                                                    <a class="nav-link active" href="#bottom-tab1" data-bs-toggle="tab">Contact details</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " href="#bottom-tab2" data-bs-toggle="tab">Statutory Info</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active  show" id="bottom-tab1">
                                                    <div class="row form-group">
                                                        <label for="addressline1" class="col-sm-3 col-form-label input-label">Address line 1</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="addressline1" id="addressline1" value="<?php echo $edit_company->addressline1;?>" placeholder="Your Address 1" >
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <label for="addressline2" class="col-sm-3 col-form-label input-label">Address line 2 <span class="text-muted">(Optional)</span></label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="addressline2" id="addressline2" value="<?php echo $edit_company->addressline2;?>" placeholder="Your Address 2">
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <label for="pincode" class="col-sm-3 col-form-label input-label">Pincode</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="pincode" id="pincode" value="<?php echo $edit_company->pincode;?>" placeholder="Your Pincode">
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <label for="phone" class="col-sm-3 col-form-label input-label">Phone</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $edit_company->phone;?>" placeholder="Phone">
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <label for="email" class="col-sm-3 col-form-label input-label">Email</label>
                                                        <div class="col-sm-9">
                                                            <input type="email" class="form-control" name="email" id="email" value="<?php echo $edit_company->email;?>" placeholder="Your Email">
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <label for="website" class="col-sm-3 col-form-label input-label">Website</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="website" id="website" value="<?php echo $edit_company->website;?>" placeholder="Website">
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <label for="sign" class="col-sm-3 col-form-label input-label">Upload Sign</label>
                                                        <div class="col-sm-9">
                                                            <input type="file" name="sign" id="sign">
                                                            <br><br>
                                                            <div class="col-sm-4">
                                                                <img src="<?php echo base_url();?>uploads/company/<?php echo $edit_company->sign; ?>" alt="Signature" height="50" width="30">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <label for="email" class="col-sm-3 col-form-label input-label">Status</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="status" id="status">
                                                                <option value="Active" <?php if($edit_company->status == 'Active'){echo 'selected';}?>>Active</option>
                                                                <option value="Inactive" <?php if($edit_company->status == 'Inactive'){echo 'selected';}?>>Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane " id="bottom-tab2">
                                                    <div class="row form-group">
                                                        <label for="panno" class="col-sm-3 col-form-label input-label">PAN No</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="panno" id="panno" value="<?php echo $edit_company->panno;?>" placeholder="PAN No">
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <label for="tanno" class="col-sm-3 col-form-label input-label">TAN No</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="tanno" id="tanno" value="<?php echo $edit_company->tanno;?>" placeholder="TAN No">
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <label for="cinno" class="col-sm-3 col-form-label input-label">CIN No</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="cinno" id="cinno" value="<?php echo $edit_company->cinno;?>" placeholder="CIN No">
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <label for="cinno" class="col-sm-3 col-form-label input-label">GST No</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="gstno" id="cinno" value="<?php echo $edit_company->gstno;?>" placeholder="GST No">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row col-sm-6 p-5">
                                        <div class="success_message row"></div>
                                    </div>

                                    <div class="text-end">
                                        
                                        <a href="<?php echo base_url('admin/company_list'); ?>" class="btn btn-primary">Cancel</a>

                                        <button type="submit" id="btn_submit" name="btn_submit" class="btn btn-primary" >Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script data-cfasync="false" src="../../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/feather.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/script.js"></script>

    <script type="text/javascript">
        $(function()
        {
            $("#company_form").ajaxForm({
                beforeSend: function () {
                    $('#btn_submit').prop('disabled',true);
                    $('.form_error_msg').html('');
                    $('.success_message').html('<br><div class="alert alert-info">Data analyzing...please wait...</div>');
                },
                uploadProgress: function (event, position, total, percentComplete) {
                    //albumprogressbar.width(percentComplete + '%');
                },
                beforeSubmit: function () {
                    return $("#company_form").valid(); // TRUE when form is valid, FALSE will cancel submit
                },
                complete: function (response)
                {
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