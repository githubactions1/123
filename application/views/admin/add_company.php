<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Add Company Details</title>
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
                                <form method="post" id="company_form" action="<?php echo base_url('admin/save_company');?>" enctype="multipart/form-data" autocomplete="">
                                    <div class="row form-group"> <label for="name" class="col-sm-3 col-form-label input-label">Photo</label>
                                        <div class="col-sm-9">
                                            <div class="d-flex align-items-center">
                                                <label class="avatar avatar-xxl profile-cover-avatar m-0" for="photo">
                                                    <img id="avatarImg" class="avatar-img" src="<?php echo base_url();?>assets/img/profiles/avatar-02.jpg" alt="Profile Image">
                                                    <input type="file" name="photo" id="photo"> <span class="avatar-edit"> <i data-feather="edit-2" class="avatar-uploader-icon shadow-soft"></i> </span> 
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="name" class="col-sm-3 col-form-label input-label">Company Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Your Company Name">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label for="email" class="col-sm-3 col-form-label input-label">Organization Type</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="organization_type" id="organization_type">
                                                <option value="Partnership">Partnership</option>
                                                <option value="Proprietor" selected="selected">Proprietor</option>
                                                <option value="LLP">LLP</option>
                                                <option value="Private Limited Company">Private Limited Company</option>
                                                <option value="Public Company">Public Company</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label for="phone" class="col-sm-3 col-form-label input-label">Fiscal Year </label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="fiscal_year" id="fiscal_year">
                                                <option value="">Fiscal Year</option>
                                                <option value="February-January">February-January</option>
                                                <option value="March-February">March-February</option>
                                                <option value="April-March">April-March</option>
                                                <option value="May-April">May-April</option>
                                                <option value="June-May">June-May</option>
                                                <option value="July-June">July-June</option>
                                                <option value="August-July">August-July</option>
                                                <option value="September-August">September-August</option>
                                                <option value="October-September">October-September</option>
                                                <option value="November-October">November-October</option>
                                                <option value="December-November">December-November</option>
                                                <option value="January-December">January-December</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label for="location" class="col-sm-3 col-form-label input-label">Industry</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="industry" id="industry">
                                                <option value="Accounting Services">Accounting Services</option>
                                                <option value="Administrative Services">Administrative Services</option>
                                                <option value="Advertising">Advertising</option>
                                                <option value="Agriculture, Farming, Fishing and Forestry An">Agriculture, Farming, Fishing and Forestry An</option>
                                                <option value="Amusement, Gambling, and Recreation">Amusement, Gambling, and Recreation</option>
                                                <option value="Architectural">Architectural</option>
                                                <option value="CA/TAX Consultant">CA/TAX Consultant</option>
                                                <option value="Charity,Nonprofits and Similar Groups">Charity,Nonprofits and Similar Groups</option>
                                                <option value="Computer Systems Design and Related Services">Computer Systems Design and Related Services</option>
                                                <option value="Construction Land and Property including Mana">Construction Land and Property including Mana</option>
                                                <option value="Creative Design">Creative Design</option>
                                                <option value="Design and Related Services">Design and Related Services</option>
                                                <option value="E-Commerce">E-Commerce</option>
                                                <option value="Engineering">Engineering</option>
                                                <option value="Finance">Finance</option>
                                                <option value="Food &amp;amp; Beverage Establishments">Food &amp;amp; Beverage Establishments</option>
                                                <option value="General Service-Based Business">General Service-Based Business</option>
                                                <option value="Hair Salons, Barbers and Spas">Hair Salons, Barbers and Spas</option>
                                                <option value="Healthcare Services Legal Services">Healthcare Services Legal Services</option>
                                                <option value="Human Resources and Placement Consulting">Human Resources and Placement Consulting</option>
                                                <option value="Insurance">Insurance</option>
                                                <option value="IT &amp;Telecommunications" selected="selected">IT &amp;Telecommunications</option>
                                                <option value="Landscaping and Gardening Services">Landscaping and Gardening Services</option>
                                                <option value="Learning Institutes">Learning Institutes</option>
                                                <option value="Mail Order and Online Educational Services">Mail Order and Online Educational Services</option>
                                                <option value="Manufacturing and Mining">Manufacturing and Mining</option>
                                                <option value="Media and Marketing Services Consulting">Media and Marketing Services Consulting</option>
                                                <option value="Other">Other</option>
                                                <option value="Performing Arts">Performing Arts</option>
                                                <option value="Professional and Technical Services">Professional and Technical Services</option>
                                                <option value="Retail Shops">Retail Shops</option>
                                                <option value="Spectator Sports,and Related Industries">Spectator Sports,and Related Industries</option>
                                                <option value="Transportation and Warehousing">Transportation and Warehousing</option>
                                                <option value="Travel and Tourism Services">Travel and Tourism Services</option>
                                                <option value="Vehicle Sales, Maintenance and Repairs Care G">Vehicle Sales, Maintenance and Repairs Care G</option>
                                                <option value="Wholesale Trade and Distributors">Wholesale Trade and Distributors</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <label for="addressline1" class="col-sm-3 col-form-label input-label">Currency</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="currency" id="currency">
                                                <option label="AED (د.إ) - Dirham" value="3776335350714">AED (د.إ) - Dirham</option>
                                                <option label="AF (؋) - Afghanis" value="3776328765135">AF (؋) - Afghanis</option>
                                                <option label="ALL (Lek) - Leke" value="3776328663033">ALL (Lek) - Leke</option>
                                                <option label="ANG (ƒ) - Guilders" value="3776332849215">ANG (ƒ) - Guilders</option>
                                                <option label="ARS ($) - Pesos" value="3776328816186">ARS ($) - Pesos</option>
                                                <option label="AUD ($) - Dollars" value="3776328918288">AUD ($) - Dollars</option>
                                                <option label="AWG (ƒ) - Guilders" value="3776328867237">AWG (ƒ) - Guilders</option>
                                                <option label="AZ (ман) - New Manats" value="3776328969339">AZ (ман) - New Manats</option>
                                                <option label="BAM (KM) - Convertible Marka" value="3776329377747">BAM (KM) - Convertible Marka</option>
                                                <option label="BBD ($) - Dollars" value="3776329071441">BBD ($) - Dollars</option>
                                                <option label="BG (лв) - Leva" value="3776329479849">BG (лв) - Leva</option>
                                                <option label="BMD ($) - Dollars" value="3776329275645">BMD ($) - Dollars</option>
                                                <option label="BND ($) - Dollars" value="3776329633002">BND ($) - Dollars</option>
                                                <option label="BOB ($b) - Bolivianos" value="3776329326696">BOB ($b) - Bolivianos</option>
                                                <option label="BRL (R$) - Reais" value="3776329530900">BRL (R$) - Reais</option>
                                                <option label="BSD ($) - Dollars" value="3776329020390">BSD ($) - Dollars</option>
                                                <option label="BWP (P) - Pula's" value="3776329428798">BWP (P) - Pula's</option>
                                                <option label="BYR (p.) - Rubles" value="3776329122492">BYR (p.) - Rubles</option>
                                                <option label="BZD (BZ$) - Dollars" value="3776329224594">BZD (BZ$) - Dollars</option>
                                                <option label="CAD ($) - Dollars" value="3776329735104">CAD ($) - Dollars</option>
                                                <option label="CHF (CHF) - Switzerland Francs" value="3776332236603">CHF (CHF) - Switzerland Francs</option>
                                                <option label="CHF (CHF) - Francs" value="3776334380745">CHF (CHF) - Francs</option>
                                                <option label="CLP ($) - Pesos" value="3776329837206">CLP ($) - Pesos</option>
                                                <option label="CNY (¥) - Yuan Renminbi" value="3776329888257">CNY (¥) - Yuan Renminbi</option>
                                                <option label="COP ($) - Pesos" value="3776329939308">COP ($) - Pesos</option>
                                                <option label="CRC (₡) - Colón" value="3776329990359">CRC (₡) - Colón</option>
                                                <option label="CUP (₱) - Pesos" value="3776330092461">CUP (₱) - Pesos</option>
                                                <option label="CZK (Kč) - Koruny" value="3776330194563">CZK (Kč) - Koruny</option>
                                                <option label="DKK (kr) - Kroner" value="3776330245614">DKK (kr) - Kroner</option>
                                                <option label="DOP (RD$) - Pesos" value="3776330296665">DOP (RD$) - Pesos</option>
                                                <option label="EGP (£) - Pounds" value="3776330398767">EGP (£) - Pounds</option>
                                                <option label="EUR (€) - Euro" value="3776329173543">EUR (€) - Euro</option>
                                                <option label="EUR (€) - Euro" value="3776330143512">EUR (€) - Euro</option>
                                                <option label="EUR (€) - Euro" value="3776330551920">EUR (€) - Euro</option>
                                                <option label="EUR (€) - Euro" value="3776330705073">EUR (€) - Euro</option>
                                                <option label="EUR (€) - Euro" value="3776330858226">EUR (€) - Euro</option>
                                                <option label="EUR (€) - Euro" value="3776331062430">EUR (€) - Euro</option>
                                                <option label="EUR (€) - Euro" value="3776331470838">EUR (€) - Euro</option>
                                                <option label="EUR (€) - Euro" value="3776331623991">EUR (€) - Euro</option>
                                                <option label="EUR (€) - Euro" value="3776332338705">EUR (€) - Euro</option>
                                                <option label="EUR (€) - Euro" value="3776332491858">EUR (€) - Euro</option>
                                                <option label="EUR (€) - Euro" value="3776332900266">EUR (€) - Euro</option>
                                                <option label="EUR (€) - Euro" value="3776333972337">EUR (€) - Euro</option>
                                                <option label="EUR (€) - Euro" value="3776334227592">EUR (€) - Euro</option>
                                                <option label="EUR (€) - Euro" value="3776335095459">EUR (€) - Euro</option>
                                                <option label="FJD ($) - Dollars" value="3776330654022">FJD ($) - Dollars</option>
                                                <option label="FKP (£) - Pounds" value="3776330602971">FKP (£) - Pounds</option>
                                                <option label="GBP (£) - Pounds" value="3776329581951">GBP (£) - Pounds</option>
                                                <option label="GBP (£) - Pounds" value="3776330500869">GBP (£) - Pounds</option>
                                                <option label="GBP (£) - Pounds" value="3776334891255">GBP (£) - Pounds</option>
                                                <option label="GGP (£) - Pounds" value="3776330960328">GGP (£) - Pounds</option>
                                                <option label="GHC (¢) - Cedis" value="3776330756124">GHC (¢) - Cedis</option>
                                                <option label="GIP (£) - Pounds" value="3776330807175">GIP (£) - Pounds</option>
                                                <option label="GTQ (Q) - Quetzales" value="3776330909277">GTQ (Q) - Quetzales</option>
                                                <option label="GYD ($) - Dollars" value="3776331011379">GYD ($) - Dollars</option>
                                                <option label="HKD ($) - Dollars" value="3776331164532">HKD ($) - Dollars</option>
                                                <option label="HNL (L) - Lempiras" value="3776331113481">HNL (L) - Lempiras</option>
                                                <option label="HRK (kn) - Kuna" value="3776330041410">HRK (kn) - Kuna</option>
                                                <option label="HUF (Ft) - Forint" value="3776331215583">HUF (Ft) - Forint</option>
                                                <option label="IDR (Rp) - Rupiahs" value="3776331368736">IDR (Rp) - Rupiahs</option>
                                                <option label="ILS (₪) - New Shekels" value="3776331572940">ILS (₪) - New Shekels</option>
                                                <option label="IMP (£) - Pounds" value="3776331521889">IMP (£) - Pounds</option>
                                                <option label="INR (₹) - Rupees" value="3776331317685" selected="selected">INR (₹) - Rupees</option>
                                                <option label="IRR (﷼) - Rials" value="3776331419787">IRR (﷼) - Rials</option>
                                                <option label="ISK (kr) - Kronur" value="3776331266634">ISK (kr) - Kronur</option>
                                                <option label="JEP (£) - Pounds" value="3776331777144">JEP (£) - Pounds</option>
                                                <option label="JMD (J$) - Dollars" value="3776331675042">JMD (J$) - Dollars</option>
                                                <option label="JPY (¥) - Yen" value="3776331726093">JPY (¥) - Yen</option>
                                                <option label="KGS (лв) - Soms" value="3776331981348">KGS (лв) - Soms</option>
                                                <option label="KHR (៛) - Riels" value="3776329684053">KHR (៛) - Riels</option>
                                                <option label="KPW (₩) - Won" value="3776331879246">KPW (₩) - Won</option>
                                                <option label="KPW (₩) - Won" value="3776333104470">KPW (₩) - Won</option>
                                                <option label="KRW (₩) - Won" value="3776331930297">KRW (₩) - Won</option>
                                                <option label="KRW (₩) - Won" value="3776334176541">KRW (₩) - Won</option>
                                                <option label="KYD ($) - Dollars" value="3776329786155">KYD ($) - Dollars</option>
                                                <option label="KZT (лв) - Tenge" value="3776331828195">KZT (лв) - Tenge</option>
                                                <option label="LAK (₭) - Kips" value="3776332032399">LAK (₭) - Kips</option>
                                                <option label="LBP (£) - Pounds" value="3776332134501">LBP (£) - Pounds</option>
                                                <option label="LKR (₨) - Rupees" value="3776334278643">LKR (₨) - Rupees</option>
                                                <option label="LRD ($) - Dollars" value="3776332185552">LRD ($) - Dollars</option>
                                                <option label="LTL (Lt) - Litai" value="3776332287654">LTL (Lt) - Litai</option>
                                                <option label="LVL (Ls) - Lati" value="3776332083450">LVL (Ls) - Lati</option>
                                                <option label="MKD (ден) - Denars" value="3776332389756">MKD (ден) - Denars</option>
                                                <option label="MNT (₮) - Tugriks" value="3776332645011">MNT (₮) - Tugriks</option>
                                                <option label="MUR (₨) - Rupees" value="3776332542909">MUR (₨) - Rupees</option>
                                                <option label="MX ($) - Pesos" value="3776332593960">MX ($) - Pesos</option>
                                                <option label="MYR (RM) - Ringgits" value="3776332440807">MYR (RM) - Ringgits</option>
                                                <option label="MZ (MT) - Meticais" value="3776332696062">MZ (MT) - Meticais</option>
                                                <option label="NAD ($) - Dollars" value="3776332747113">NAD ($) - Dollars</option>
                                                <option label="NG (₦) - Nairas" value="3776333053419">NG (₦) - Nairas</option>
                                                <option label="NIO (C$) - Cordobas" value="3776333002368">NIO (C$) - Cordobas</option>
                                                <option label="NOK (kr) - Krone" value="3776333155521">NOK (kr) - Krone</option>
                                                <option label="NPR (₨) - Rupees" value="3776332798164">NPR (₨) - Rupees</option>
                                                <option label="NZD ($) - Dollars" value="3776332951317">NZD ($) - Dollars</option>
                                                <option label="OMR (﷼) - Rials" value="3776333206572">OMR (﷼) - Rials</option>
                                                <option label="PAB (B/.) - Balboa" value="3776333308674">PAB (B/.) - Balboa</option>
                                                <option label="PE (S/.) - Nuevos Soles" value="3776333410776">PE (S/.) - Nuevos Soles</option>
                                                <option label="PHP (Php) - Pesos" value="3776333461827">PHP (Php) - Pesos</option>
                                                <option label="PKR (₨) - Rupees" value="3776333257623">PKR (₨) - Rupees</option>
                                                <option label="PL (zł) - Zlotych" value="3776333512878">PL (zł) - Zlotych</option>
                                                <option label="PYG (Gs) - Guarani" value="3776333359725">PYG (Gs) - Guarani</option>
                                                <option label="QAR (﷼) - Rials" value="3776333563929">QAR (﷼) - Rials</option>
                                                <option label="RO (lei) - New Lei" value="3776333614980">RO (lei) - New Lei</option>
                                                <option label="RSD (Дин.) - Dinars" value="3776333819184">RSD (Дин.) - Dinars</option>
                                                <option label="RUB (руб) - Rubles" value="3776333666031">RUB (руб) - Rubles</option>
                                                <option label="SAR (﷼) - Riyals" value="3776333768133">SAR (﷼) - Riyals</option>
                                                <option label="SBD ($) - Dollars" value="3776334023388">SBD ($) - Dollars</option>
                                                <option label="SCR (₨) - Rupees" value="3776333870235">SCR (₨) - Rupees</option>
                                                <option label="SEK (kr) - Kronor" value="3776334329694">SEK (kr) - Kronor</option>
                                                <option label="SGD ($) - Dollars" value="3776333921286">SGD ($) - Dollars</option>
                                                <option label="SHP (£) - Pounds" value="3776333717082">SHP (£) - Pounds</option>
                                                <option label="SOS (S) - Shillings" value="3776334074439">SOS (S) - Shillings</option>
                                                <option label="SRD ($) - Dollars" value="3776334431796">SRD ($) - Dollars</option>
                                                <option label="SVC ($) - Colones" value="3776330449818">SVC ($) - Colones</option>
                                                <option label="SYP (£) - Pounds" value="3776334482847">SYP (£) - Pounds</option>
                                                <option label="THB (฿) - Baht" value="3776334584949">THB (฿) - Baht</option>
                                                <option label="TRL (£) - Liras" value="3776334738102">TRL (£) - Liras</option>
                                                <option label="TRY (TL) - Lira" value="3776334687051">TRY (TL) - Lira</option>
                                                <option label="TTD (TT$) - Dollars" value="3776334636000">TTD (TT$) - Dollars</option>
                                                <option label="TVD ($) - Dollars" value="3776334789153">TVD ($) - Dollars</option>
                                                <option label="TWD (NT$) - New Dollars" value="3776334533898">TWD (NT$) - New Dollars</option>
                                                <option label="UAH (₴) - Hryvnia" value="3776334840204">UAH (₴) - Hryvnia</option>
                                                <option label="USD ($) - Dollars" value="3776328714084">USD ($) - Dollars</option>
                                                <option label="USD ($) - Dollars" value="3776334942306">USD ($) - Dollars</option>
                                                <option label="UYU ($U) - Pesos" value="3776334993357">UYU ($U) - Pesos</option>
                                                <option label="UZS (лв) - Sums" value="3776335044408">UZS (лв) - Sums</option>
                                                <option label="VEF (Bs) - Bolivares Fuertes" value="3776335146510">VEF (Bs) - Bolivares Fuertes</option>
                                                <option label="VND (₫) - Dong" value="3776335197561">VND (₫) - Dong</option>
                                                <option label="XCD ($) - Dollars" value="3776330347716">XCD ($) - Dollars</option>
                                                <option label="YER (﷼) - Rials" value="3776335248612">YER (﷼) - Rials</option>
                                                <option label="ZAR (R) - Rand" value="3776334125490">ZAR (R) - Rand</option>
                                                <option label="ZWD (Z$) - Zimbabwe Dollars" value="3776335299663">ZWD (Z$) - Zimbabwe Dollars</option>
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
                                                            <input type="text" class="form-control" name="addressline1" id="addressline1" placeholder="Your Address 1">
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <label for="addressline2" class="col-sm-3 col-form-label input-label">Address line 2 <span class="text-muted">(Optional)</span></label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="addressline2" id="addressline2" placeholder="Your Address 2">
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <label for="pincode" class="col-sm-3 col-form-label input-label">Pincode</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Your Pincode">
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <label for="phone" class="col-sm-3 col-form-label input-label">Phone</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <label for="email" class="col-sm-3 col-form-label input-label">Email</label>
                                                        <div class="col-sm-9">
                                                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <label for="website" class="col-sm-3 col-form-label input-label">Website</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="website" id="website" placeholder="Website">
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <label for="website" class="col-sm-3 col-form-label input-label">Upload Sign</label>
                                                        <div class="col-sm-9">
                                                            <input type="file" class="form-control" name="sign" id="sign" placeholder="Upload Sign">
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <label for="email" class="col-sm-3 col-form-label input-label">Status</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control" name="status" id="status">
                                                                <option value="Active" selected="selected">Active</option>
                                                                <option value="Inactive">Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane " id="bottom-tab2">
                                                    <div class="row form-group">
                                                        <label for="panno" class="col-sm-3 col-form-label input-label">PAN No</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="panno" id="panno" placeholder="PAN No">
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <label for="tanno" class="col-sm-3 col-form-label input-label">TAN No</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="tanno" id="tanno" placeholder="TAN No">
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <label for="cinno" class="col-sm-3 col-form-label input-label">CIN No</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="cinno" id="cinno" placeholder="CIN No">
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <label for="cinno" class="col-sm-3 col-form-label input-label">GST No</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="gstno" id="cinno" placeholder="GST No">
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