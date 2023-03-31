-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2023 at 02:27 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trieproperties`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `ifsc_code` varchar(100) NOT NULL,
  `account_no` varchar(50) NOT NULL,
  `account_code` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `show_dashboard` varchar(20) NOT NULL,
  `default_payment_retail_invoice` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `added_by` varchar(15) NOT NULL,
  `added_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `account_name`, `bank_name`, `branch_name`, `ifsc_code`, `account_no`, `account_code`, `description`, `show_dashboard`, `default_payment_retail_invoice`, `status`, `added_by`, `added_at`, `updated_by`, `updated_at`) VALUES
(2, 'Adit Kumar', 'Indian Bank', 'Bandra', '1234567890', '0987654321', 'ABC001', 'DDDDDDDDDD', 'uncheck', 'uncheck', 'Active', '', '2022-11-22 00:00:00', '', '2023-01-20 00:00:00'),
(3, 'Vijay', 'ICICI Bank', 'Bandra', 'QWERTY009856', '65400356879', '', '', 'uncheck', 'uncheck', 'Active', '', '2023-01-30 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bank_loan`
--

CREATE TABLE `bank_loan` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `added_by` varchar(12) NOT NULL,
  `added_at` datetime NOT NULL,
  `updated_by` varchar(12) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank_loan`
--

INSERT INTO `bank_loan` (`id`, `description`, `added_by`, `added_at`, `updated_by`, `updated_at`) VALUES
(2, '<p style=\"line-height: 1;\"><span style=\"font-size: 10pt; font-family: arial, helvetica, sans-serif;\">We make Loan Possible in Just 3 Steps to Provide a Fast, Flexible &amp; Friendly Customer Experenice.</span></p>', '', '2023-03-18 00:00:00', '', '2023-03-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bank_loan_images`
--

CREATE TABLE `bank_loan_images` (
  `id` int(11) NOT NULL,
  `bank_loan_id` varchar(12) NOT NULL,
  `gallery` varchar(500) NOT NULL,
  `added_by` varchar(12) NOT NULL,
  `added_at` datetime NOT NULL,
  `updated_by` varchar(12) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank_loan_images`
--

INSERT INTO `bank_loan_images` (`id`, `bank_loan_id`, `gallery`, `added_by`, `added_at`, `updated_by`, `updated_at`) VALUES
(8, '2', 'kotaklogo.png', '', '2023-03-18 00:00:00', '', '0000-00-00 00:00:00'),
(9, '2', 'hdfclogo.png', '', '2023-03-18 00:00:00', '', '0000-00-00 00:00:00'),
(10, '2', 'icicibanklogo.png', '', '2023-03-18 00:00:00', '', '0000-00-00 00:00:00'),
(11, '2', 'fedelarbanklogo.png', '', '2023-03-18 00:00:00', '', '0000-00-00 00:00:00'),
(12, '2', 'deutchebanklogo.png', '', '2023-03-18 00:00:00', '', '0000-00-00 00:00:00'),
(13, '2', 'bajajfinancelogo.png', '', '2023-03-18 00:00:00', '', '0000-00-00 00:00:00'),
(14, '2', 'citibanklogo.png', '', '2023-03-18 00:00:00', '', '0000-00-00 00:00:00'),
(15, '2', 'idfclogo.png', '', '2023-03-18 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bank_offer`
--

CREATE TABLE `bank_offer` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `interest_rate` varchar(15) NOT NULL,
  `offer` varchar(255) NOT NULL,
  `loan_amount` varchar(15) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `added_by` varchar(12) NOT NULL,
  `added_at` datetime NOT NULL,
  `updated_by` varchar(12) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank_offer`
--

INSERT INTO `bank_offer` (`id`, `bank_name`, `interest_rate`, `offer`, `loan_amount`, `photo`, `added_by`, `added_at`, `updated_by`, `updated_at`) VALUES
(1, 'HDFC Bank', '8', '', '300000', 'hdfclogo.png', '', '2023-03-21 00:00:00', '', '2023-03-22 00:00:00'),
(2, 'ICICI Bank', '9', '2', '5000000', 'icicibanklogo.png', '', '2023-03-21 00:00:00', '', '0000-00-00 00:00:00'),
(3, 'IDFC Bank', '15', 'A', '100000', 'idfclogo.png', '', '2023-03-21 00:00:00', '', '2023-03-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `vendor_name` varchar(15) NOT NULL,
  `bill_date` varchar(15) NOT NULL,
  `due_date` varchar(15) NOT NULL,
  `bill_no` varchar(15) NOT NULL,
  `source_of_supply` varchar(255) NOT NULL,
  `destination_of_supply` varchar(255) NOT NULL,
  `order_no` varchar(15) NOT NULL,
  `item_rate` varchar(255) NOT NULL,
  `due_amount` varchar(12) NOT NULL,
  `subtotal` varchar(15) NOT NULL,
  `total_taxamt` varchar(15) NOT NULL,
  `adjustment` varchar(15) NOT NULL,
  `totalamt` varchar(15) NOT NULL,
  `note` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `added_by` varchar(15) NOT NULL,
  `added_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `vendor_name`, `bill_date`, `due_date`, `bill_no`, `source_of_supply`, `destination_of_supply`, `order_no`, `item_rate`, `due_amount`, `subtotal`, `total_taxamt`, `adjustment`, `totalamt`, `note`, `status`, `added_by`, `added_at`, `updated_by`, `updated_at`) VALUES
(7, '1', '10-02-2023', '12-02-2023', '0001', 'Maharashtra', 'Maharashtra', 'PO-299', 'tax_exclusive', '3.54', '3.00', '0.54', '', '3.54', '', 'Partially paid', '', '2023-02-13 00:00:00', '', '2023-03-01 00:00:00'),
(10, '2', '13-02-2023', '28-02-2023', '0002', 'Maharashtra', 'Maharashtra', 'PO-300', 'tax_exclusive', '5.90', '5.00', '0.9', '', '5.90', '', 'Open', '', '2023-02-13 00:00:00', '', '2023-03-01 00:00:00'),
(11, '3', '13-02-2023', '28-02-2023', '0003', 'Maharashtra', 'Maharashtra', 'PO-0005', 'tax_exclusive', '11.80', '10.00', '1.8', '', '11.80', '', 'Open', '', '2023-02-13 00:00:00', '', '2023-03-01 00:00:00'),
(16, '4', '14-02-2023', '28-02-2023', '00005', 'Maharashtra', 'Maharashtra', '0004', 'tax_exclusive', '11.56', '9.80', '1.76', '', '11.56', '', 'Open', '', '2023-02-14 00:00:00', '', '2023-03-01 00:00:00'),
(17, '4', '15-02-2023', '28-02-2023', '00008', 'Maharashtra', 'Maharashtra', '', 'tax_exclusive', '35.40', '30.00', '5.4', '', '35.40', '', 'Open', '', '2023-02-15 00:00:00', '', '2023-03-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bill_entries`
--

CREATE TABLE `bill_entries` (
  `id` int(11) NOT NULL,
  `billid` varchar(15) NOT NULL,
  `item` text NOT NULL,
  `description` text NOT NULL,
  `hsn` varchar(100) NOT NULL,
  `godown` varchar(255) NOT NULL,
  `qty` varchar(15) NOT NULL,
  `rate` varchar(15) NOT NULL,
  `account` varchar(255) NOT NULL,
  `discount` varchar(15) NOT NULL,
  `taxrate` varchar(15) NOT NULL,
  `taxamt` varchar(15) NOT NULL,
  `total` varchar(15) NOT NULL,
  `added_by` varchar(15) NOT NULL,
  `added_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill_entries`
--

INSERT INTO `bill_entries` (`id`, `billid`, `item`, `description`, `hsn`, `godown`, `qty`, `rate`, `account`, `discount`, `taxrate`, `taxamt`, `total`, `added_by`, `added_at`, `updated_by`, `updated_at`) VALUES
(35, '17', 'laptop', '', '', '4', '1', '30', 'Sales', '', '18', '5.40', '30.00', '', '2023-03-01 00:00:00', '', '0000-00-00 00:00:00'),
(36, '16', 'Ram', 'Purchase Desc', '', '6', '1', '10', 'Sales', '2', '18', '1.76', '9.80', '', '2023-03-01 00:00:00', '', '0000-00-00 00:00:00'),
(37, '11', 'Ram', 'Purchase Desc', '', '6', '1', '10', 'Sales', '0', '18', '1.80', '10.00', '', '2023-03-01 00:00:00', '', '0000-00-00 00:00:00'),
(38, '10', 'Poco Mobile', '', '', '1', '1', '5', 'Sales', '0', '18', '0.90', '5.00', '', '2023-03-01 00:00:00', '', '0000-00-00 00:00:00'),
(39, '7', 'Pendrive Test', 'Purchase', '', '1', '1', '3', 'Sales', '0', '18', '0.54', '3.00', '', '2023-03-01 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `id` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `organization_type` varchar(100) NOT NULL,
  `fiscal_year` varchar(100) NOT NULL,
  `industry` varchar(100) NOT NULL,
  `currency` varchar(15) NOT NULL,
  `addressline1` text NOT NULL,
  `addressline2` text NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `sign` varchar(255) NOT NULL,
  `panno` varchar(15) NOT NULL,
  `tanno` varchar(15) NOT NULL,
  `cinno` varchar(15) NOT NULL,
  `gstno` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `added_by` varchar(15) NOT NULL,
  `added_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`id`, `photo`, `company_name`, `organization_type`, `fiscal_year`, `industry`, `currency`, `addressline1`, `addressline2`, `pincode`, `phone`, `email`, `website`, `sign`, `panno`, `tanno`, `cinno`, `gstno`, `status`, `added_by`, `added_at`, `updated_by`, `updated_at`) VALUES
(1, 'logo.png', 'Olatech Solutions', 'Public Company', 'December-November', 'CA/TAX Consultant', '3776331317685', 'Office no. 310, RUPA SOLITAIRE, Millenium Business Park, Sector 2, Mahape, Navi Mumbai, Maharashtra 400710', 'Olatech Solutions Ltd. 815, 8th Floor, Westport, Pancard Club Road, Baner, Pune – 411045 Maharashtra, India', '400710', '087792 61584', 'info@olatechs.com', 'www.olatechs.com', 'signature.png', 'BDRSA7006H', '', '', '27AZMPA5882H1Z2', 'Active', '', '2022-12-16 00:00:00', '', '2023-03-06 00:00:00'),
(7, 'logo.png', 'Vebbly Inc', 'Proprietor', '', 'Accounting Services', '3776331317685', '', '', '', '', '', '', 'signature.png', '', '', '', '', 'Active', '', '2023-01-13 00:00:00', '', '2023-01-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `salutatior` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `company_name` varchar(500) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `work_phone` varchar(15) NOT NULL,
  `website` varchar(50) NOT NULL,
  `sale_person` varchar(255) NOT NULL,
  `payment_terms` varchar(255) NOT NULL,
  `gst_treatment` varchar(255) NOT NULL,
  `gst_no` varchar(255) NOT NULL,
  `place_of_maharashtra` varchar(255) NOT NULL,
  `opening_bal` varchar(20) NOT NULL,
  `pan_no` varchar(50) NOT NULL,
  `discount` varchar(15) NOT NULL,
  `credit_limit` varchar(15) NOT NULL,
  `billing_attention` text NOT NULL,
  `billing_street` varchar(255) NOT NULL,
  `billing_city` varchar(50) NOT NULL,
  `billing_state` varchar(50) NOT NULL,
  `billing_pincode` varchar(12) NOT NULL,
  `shipping_attention` text NOT NULL,
  `shipping_street` varchar(255) NOT NULL,
  `shipping_city` varchar(50) NOT NULL,
  `shipping_state` varchar(50) NOT NULL,
  `shipping_pincode` varchar(20) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `ifsc_code` varchar(50) NOT NULL,
  `account_no` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL,
  `added_by` varchar(15) NOT NULL,
  `added_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(100) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `salutatior`, `name`, `company_name`, `display_name`, `email`, `phone`, `work_phone`, `website`, `sale_person`, `payment_terms`, `gst_treatment`, `gst_no`, `place_of_maharashtra`, `opening_bal`, `pan_no`, `discount`, `credit_limit`, `billing_attention`, `billing_street`, `billing_city`, `billing_state`, `billing_pincode`, `shipping_attention`, `shipping_street`, `shipping_city`, `shipping_state`, `shipping_pincode`, `bank_name`, `branch_name`, `ifsc_code`, `account_no`, `status`, `added_by`, `added_at`, `updated_by`, `updated_at`) VALUES
(1, 'Mr', 'sidd kumar', 'siddtec work', 'sidd kumar', 'mdalwani72@gmail.com', '9702803745', '', '', '', 'Due on Receipt', 'Unregistered Business', '', '', '100', '', '2', '200', 'Petter Appartment', 'Petter Dias', 'Bandra W', 'Maharashtra', '400050', '', '', '', '', '', '', '', '', '', '', '', '2022-12-15 00:00:00', '', '2023-02-03 00:00:00'),
(2, 'Mr', 'Zoya', 'Clicki', 'Zoya', 'zoya@gmail.com', '7777777777', '022 55667788', 'clicki.com', 'Rahul', 'Due on Receipt', 'Regular', 'ASD09876543JKL', 'Maharashra', '100000', '', '10', '500', 'Petter Appartment', 'Petter Dias', 'Bandra', 'Maharashtra', '400050', 'Victory Block', 'Hill Road', 'Bandra', 'Maharashtra', '400050', 'HDFC', 'Bandra', 'HDFC098765', '6570395199', '', '', '2023-01-12 00:00:00', '', '0000-00-00 00:00:00'),
(3, 'Mr', 'Sameer', 'olx', 'Sameer', 'sameer@gmail.com', '9999999999', '022 88997766', '', '', 'Due on Receipt', 'Unregistered Business', '', '', '0', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-01-20 00:00:00', '', '2023-02-03 00:00:00'),
(4, 'Mr', 'Ashok', 'ASK Solutions', 'Ashok', 'ashok@gmail.com', '8888888888', '', '', 'MD', 'Due on Receipt', 'Unregistered Business', '', 'Maharashtra', '300', 'BXEPA7006G', '', '', 'Zainabia Complex, Royal Garden', 'Near Bilaal Hospital', 'Thane', 'Maharashtra', '400612', '', '', '', '', '', '', '', '', '', '', '', '2023-01-30 00:00:00', '', '0000-00-00 00:00:00'),
(5, 'Mr', 'Vijay', 'TCS', 'Vijay', 'vijay@gmail.com', '7777777777', '', '', '', 'Due on Receipt', 'Regular', '06AAKFD9709P2ZP', 'Maharashtra', '5000', '', '3', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-02-03 00:00:00', '', '0000-00-00 00:00:00'),
(6, 'Mr', 'Yogesh', 'Acme Corporation', 'Yogesh', 'yogesh@gmail.com', '2222222222', '', '', '', 'Due on Receipt', 'Regular', '06AAKFD9709P2ZP', 'Delhi', '3000', '', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-02-03 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `date` varchar(20) NOT NULL,
  `otp` varchar(12) NOT NULL,
  `added_by` varchar(12) NOT NULL,
  `added_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `mobileno`, `date`, `otp`, `added_by`, `added_at`) VALUES
(2, 'Md', 'alwani.m@olatechs.com', '09702803745', '2023', '1234', '', '0000-00-00 00:00:00'),
(3, 'Krishna', 'krishna@olatechs.com', '09820026484', '23-03-2023', '1234', '', '0000-00-00 00:00:00'),
(5, 'Akash', 'akash@olatechs.com', '9594676055', '23-03-2023', '1234', '', '0000-00-00 00:00:00'),
(11, 'krish', 'krish@gmail.com', '9063512827', '23-03-2023', '1234', '', '0000-00-00 00:00:00'),
(12, 'Kumar', 'kumar@gmail.com', '9920151479', '23-03-2023', '1234', '', '0000-00-00 00:00:00'),
(56, 'customers', 'alwani.m@olatechs.com', '122345555', '2023-03-28', '1234', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_challan`
--

CREATE TABLE `delivery_challan` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(15) NOT NULL,
  `challan_date` varchar(15) NOT NULL,
  `challan_type` varchar(15) NOT NULL,
  `challan_no` varchar(15) NOT NULL,
  `place_of_supply` varchar(255) NOT NULL,
  `item_rate` varchar(255) NOT NULL,
  `sales_person` varchar(255) NOT NULL,
  `due_amount` varchar(12) NOT NULL,
  `subtotal` varchar(15) NOT NULL,
  `total_taxamt` varchar(15) NOT NULL,
  `adjustment` varchar(15) NOT NULL,
  `sale_of_good` varchar(15) NOT NULL,
  `totalamt` varchar(15) NOT NULL,
  `note` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `added_by` varchar(15) NOT NULL,
  `added_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_challan`
--

INSERT INTO `delivery_challan` (`id`, `customer_name`, `challan_date`, `challan_type`, `challan_no`, `place_of_supply`, `item_rate`, `sales_person`, `due_amount`, `subtotal`, `total_taxamt`, `adjustment`, `sale_of_good`, `totalamt`, `note`, `status`, `added_by`, `added_at`, `updated_by`, `updated_at`) VALUES
(1, '1', '15-12-2022', 'Others', 'DC/21-22/161', 'Maharashtra', '', '', '5.00', '5.00', '0.9', '0.1', '', '6.00', '', 'Invoiced', '', '2022-12-15 00:00:00', '', '0000-00-00 00:00:00'),
(2, '2', '12-01-2023', 'Job Work', 'DC/21-22/162', 'Maharashtra', '', 'MD', '39.60', '39.60', '7.13', '', '', '46.73', '', 'Sent', '', '2023-01-12 00:00:00', '', '2023-01-16 00:00:00'),
(4, '3', '20-01-2023', 'Others', '003', 'Maharashtra', 'tax_exclusive', '', '159.08', '200.00', '36', '', '', '236.00', '', 'Invoiced', '', '2023-01-20 00:00:00', '', '2023-01-20 00:00:00'),
(5, '4', '30-01-2023', 'Others', '0006', 'Maharashtra', 'tax_exclusive', 'Md', '6.86', '6.86', '1.23', '', '', '8.09', '', 'Invoiced', '', '2023-01-30 00:00:00', '', '0000-00-00 00:00:00'),
(6, '6', '13-02-2023', 'Job Work', '0007', 'Maharashtra', 'tax_exclusive', 'Md', '9.80', '9.80', '1.76', '', '', '11.56', '', 'Sent', '', '2023-02-13 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_challan_entries`
--

CREATE TABLE `delivery_challan_entries` (
  `id` int(11) NOT NULL,
  `deliverychallanid` varchar(15) NOT NULL,
  `item` text NOT NULL,
  `description` text NOT NULL,
  `hsn` varchar(12) NOT NULL,
  `qty` varchar(15) NOT NULL,
  `rate` varchar(15) NOT NULL,
  `account` varchar(255) NOT NULL,
  `discount` varchar(15) NOT NULL,
  `taxrate` varchar(15) NOT NULL,
  `taxamt` varchar(15) NOT NULL,
  `total` varchar(15) NOT NULL,
  `added_by` varchar(15) NOT NULL,
  `added_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_challan_entries`
--

INSERT INTO `delivery_challan_entries` (`id`, `deliverychallanid`, `item`, `description`, `hsn`, `qty`, `rate`, `account`, `discount`, `taxrate`, `taxamt`, `total`, `added_by`, `added_at`, `updated_by`, `updated_at`) VALUES
(1, '1', 'Pendrive Test', 'Sales', '', '1', '5', 'Sales', '0', '18', '0.90', '5', '', '2022-12-15 00:00:00', '', '0000-00-00 00:00:00'),
(3, '2', 'Poco Mobile', '', '', '4', '10', 'Sales', '1', '18', '7.13', '39.60', '', '2023-01-16 00:00:00', '', '0000-00-00 00:00:00'),
(7, '4', 'Mobile', '', '', '1', '100', 'Sales', '0', '18', '18.00', '100.00', '', '2023-01-20 00:00:00', '', '0000-00-00 00:00:00'),
(8, '4', 'Mobile', '', '', '1', '100', 'Sales', '', '18', '18.00', '100.00', '', '2023-01-20 00:00:00', '', '0000-00-00 00:00:00'),
(9, '5', 'Ram', 'Sales Desc', '', '1', '7', 'Sales', '2', '18', '1.23', '6.86', '', '2023-01-30 00:00:00', '', '0000-00-00 00:00:00'),
(10, '6', 'mouse', '', '', '1', '10', 'Sales', '2', '18', '1.76', '9.80', '', '2023-02-13 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `godown`
--

CREATE TABLE `godown` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `available_qty` varchar(50) NOT NULL DEFAULT '0',
  `added_by` varchar(15) NOT NULL,
  `added_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `godown`
--

INSERT INTO `godown` (`id`, `name`, `available_qty`, `added_by`, `added_at`, `updated_by`, `updated_at`) VALUES
(1, 'Main Location', '-1', '', '2022-09-29 00:00:00', '', '0000-00-00 00:00:00'),
(3, 'test location', '110', '', '2023-01-16 00:00:00', '', '0000-00-00 00:00:00'),
(4, 'bhiwandi godown', '280', '', '2023-01-16 00:00:00', '', '2023-01-17 00:00:00'),
(5, 'mahape location', '40', '', '2023-01-18 00:00:00', '', '0000-00-00 00:00:00'),
(6, 'Vashi', '600', '', '2023-01-30 00:00:00', '', '2023-02-28 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `good_type` varchar(255) NOT NULL,
  `tax_type` varchar(50) NOT NULL,
  `instrastate_gst` varchar(100) NOT NULL,
  `insterstate_gst` varchar(100) NOT NULL,
  `hsn` varchar(15) NOT NULL,
  `sku` varchar(15) NOT NULL,
  `default_discount` varchar(15) NOT NULL,
  `amt_discount` varchar(15) NOT NULL,
  `sales_information` varchar(50) NOT NULL,
  `sale_rate` varchar(15) NOT NULL,
  `sales_account` varchar(255) NOT NULL,
  `sale_description` text NOT NULL,
  `purchase_information` varchar(50) NOT NULL,
  `purchase_rate` varchar(255) NOT NULL,
  `purchase_account` varchar(255) NOT NULL,
  `purchase_description` text NOT NULL,
  `trackable_item` varchar(50) NOT NULL,
  `opening_stock` varchar(15) NOT NULL,
  `opening_rate` varchar(15) NOT NULL,
  `stock_account` varchar(50) NOT NULL,
  `godown` varchar(255) NOT NULL,
  `added_by` varchar(15) NOT NULL,
  `added_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` varchar(15) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `name`, `unit`, `good_type`, `tax_type`, `instrastate_gst`, `insterstate_gst`, `hsn`, `sku`, `default_discount`, `amt_discount`, `sales_information`, `sale_rate`, `sales_account`, `sale_description`, `purchase_information`, `purchase_rate`, `purchase_account`, `purchase_description`, `trackable_item`, `opening_stock`, `opening_rate`, `stock_account`, `godown`, `added_by`, `added_at`, `updated_by`, `updated_at`) VALUES
(1, 'Pendrive Test', 'Box', 'Service', 'Taxable', '18', 'IGST @ 18%[18]', '0', '', '0', '', '', '5', 'Sales', 'Sales', '', '3', 'Purchase A/c', 'Purchase', 'trackable_item', '15', '20', 'Inventory Assets', '1', '', '2022-12-15 00:00:00', '', '2023-03-01 00:00:00'),
(2, 'Poco Mobile', 'No', 'Service', 'Taxable', '18', 'IGST @ 18%[18]', 'HSN001', 'SKU001', '1', '', '', '10', 'Sales', '', '', '5', 'Purchase A/c', '', 'trackable_item', '10', '200', 'Inventory Assets', '1', '', '2023-01-12 00:00:00', '', '2023-03-01 00:00:00'),
(5, 'Mobile', 'No', 'Goods', 'Taxable', '18', 'IGST @ 18%[18]', 'HSN', '', '', '', '', '100', 'Sales', '', '', '50', 'Purchase A/c', '', 'trackable_item', '50', '0', 'Inventory Assets', '3', '', '2023-01-17 00:00:00', '', '2023-03-01 00:00:00'),
(21, 'laptop', 'No', 'Service', 'Non GST', '18', 'IGST @ 18%[18]', 'H', '', '', '', '', '50', 'Sales', '', '', '30', 'Purchase A/c', '', 'trackable_item', '110', '600', 'Inventory Assets', '3', '', '2023-01-17 00:00:00', '', '2023-03-01 00:00:00'),
(22, 'Desktop', 'No', 'Goods', 'Nil Rated', '18', 'IGST @ 18%[18]', 'H', '', '', '', '', '50', 'Sales', '', '', '40', 'Purchase A/c', '', 'trackable_item', '30', '50', 'Inventory Assets', '5', '', '2023-01-17 00:00:00', '', '2023-03-02 00:00:00'),
(23, 'T', 'No', 'Service', 'Non GST', '', '', 'J', '', '', '', '', '60', 'Sales', '', '', '50', 'Purchase A/c', '', 'trackable_item', '100', '200', 'Inventory Assets', '4', '', '2023-01-17 00:00:00', '', '2023-03-01 00:00:00'),
(24, 'mouse', 'No', 'Service', 'Taxable', '18', 'IGST @ 18%[18]', '001', '', '2', '', '', '10', 'Sales', '', '', '6', 'Purchase A/c', '', 'trackable_item', '40', '10', 'Inventory Assets', '3', '', '2023-01-18 00:00:00', '', '2023-03-01 00:00:00'),
(28, 'CCTV', 'No', 'Goods', 'Non GST', '18', '', 'H', '', '', '', '', '12', 'Sales', '', '', '10', 'Purchase A/c', '', 'trackable_item', '120', '', '', '5', '', '2023-01-19 00:00:00', '', '2023-03-02 00:00:00'),
(30, 'Ram', 'No', 'Goods', 'Taxable', '18', 'IGST @ 18%[18]', '005', '005', '2', '', '', '7', 'Sales', 'Sales Desc', '', '10', 'Purchase A/c', 'Purchase Desc', 'trackable_item', '600', '20', 'Inventory Assets', '4', '', '2023-01-30 00:00:00', '', '2023-02-28 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(15) NOT NULL,
  `invoice_date` varchar(15) NOT NULL,
  `due_date` varchar(15) NOT NULL,
  `invoice_no` varchar(15) NOT NULL,
  `order_no` varchar(15) NOT NULL,
  `place_of_supply` varchar(255) NOT NULL,
  `item_rate` varchar(255) NOT NULL,
  `sales_person` varchar(255) NOT NULL,
  `due_amount` varchar(12) NOT NULL,
  `subtotal` varchar(15) NOT NULL,
  `total_taxamt` varchar(15) NOT NULL,
  `adjustment` varchar(15) NOT NULL,
  `sale_of_good` varchar(15) NOT NULL,
  `totalamt` varchar(15) NOT NULL,
  `note` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `added_by` varchar(15) NOT NULL,
  `added_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `customer_name`, `invoice_date`, `due_date`, `invoice_no`, `order_no`, `place_of_supply`, `item_rate`, `sales_person`, `due_amount`, `subtotal`, `total_taxamt`, `adjustment`, `sale_of_good`, `totalamt`, `note`, `status`, `added_by`, `added_at`, `updated_by`, `updated_at`) VALUES
(8, '1', '14-02-2023', '28-02-2023', '0001', 'DC/21-22/161', 'Maharashtra', 'tax_exclusive', 'MD', '118', '100.00', '18', '', '', '118', '', 'Sent', '', '2023-02-13 00:00:00', '', '2023-03-01 00:00:00'),
(9, '4', '13-02-2023', '13-02-2023', '0002', '0006', 'Maharashtra', 'tax_exclusive', 'Md', '8.09', '6.86', '1.23', '', '', '8.09', '', 'Sent', '', '2023-02-13 00:00:00', '', '2023-03-01 00:00:00'),
(10, '3', '13-02-2023', '28-02-2023', '0003', '003', 'Maharashtra', 'tax_exclusive', 'Md', '236.00', '200.00', '36', '', '', '236.00', '', 'Sent', '', '2023-02-13 00:00:00', '', '2023-03-01 00:00:00'),
(12, '6', '13-02-2023', '28-02-2023', '0000005', '0007', 'Maharashtra', 'tax_exclusive', 'md', '50.00', '50.00', '0', '', '', '50.00', '', 'Sent', '', '2023-02-14 00:00:00', '', '2023-03-01 00:00:00'),
(13, '1', '14-02-2023', '28-02-2023', '00006', '', 'Goa', 'tax_exclusive', '', '59', '50.00', '9', '', '', '59', '', '', '', '2023-02-14 00:00:00', '', '2023-03-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_entries`
--

CREATE TABLE `invoice_entries` (
  `id` int(11) NOT NULL,
  `invoiceid` varchar(15) NOT NULL,
  `item` text NOT NULL,
  `description` text NOT NULL,
  `hsn` varchar(12) NOT NULL,
  `godown` varchar(255) NOT NULL,
  `qty` varchar(15) NOT NULL,
  `rate` varchar(15) NOT NULL,
  `account` varchar(255) NOT NULL,
  `discount` varchar(15) NOT NULL,
  `taxrate` varchar(15) NOT NULL,
  `taxamt` varchar(15) NOT NULL,
  `total` varchar(15) NOT NULL,
  `added_by` varchar(15) NOT NULL,
  `added_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice_entries`
--

INSERT INTO `invoice_entries` (`id`, `invoiceid`, `item`, `description`, `hsn`, `godown`, `qty`, `rate`, `account`, `discount`, `taxrate`, `taxamt`, `total`, `added_by`, `added_at`, `updated_by`, `updated_at`) VALUES
(39, '10', 'Mobile', '', '', '4', '1', '100', 'Sales', '', '18', '18.00', '100.00', '', '2023-03-01 00:00:00', '', '0000-00-00 00:00:00'),
(40, '10', 'Mobile', '', '', '4', '1', '100', 'Sales', '', '18', '18.00', '100.00', '', '2023-03-01 00:00:00', '', '0000-00-00 00:00:00'),
(41, '12', 'Desktop', '', '', '4', '1', '50', 'Sales', '', '', '0.00', '50.00', '', '2023-03-01 00:00:00', '', '0000-00-00 00:00:00'),
(42, '9', 'Ram', 'Sales Desc', '', '7', '1', '7', 'Sales', '2', '18', '1.23', '6.86', '', '2023-03-01 00:00:00', '', '0000-00-00 00:00:00'),
(43, '13', 'laptop', '', '', '4', '1', '50', 'Sales', '', '18', '9.00', '50.00', '', '2023-03-01 00:00:00', '', '0000-00-00 00:00:00'),
(44, '8', 'Mobile', '', '', '4', '1', '100', 'Sales', '', '18', '18.00', '100.00', '', '2023-03-01 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `loan_form`
--

CREATE TABLE `loan_form` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email_address` varchar(20) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `profession` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `percent` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `added_by` varchar(12) NOT NULL,
  `added_at` datetime NOT NULL,
  `updated_by` varchar(12) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loan_form`
--

INSERT INTO `loan_form` (`id`, `full_name`, `email_address`, `phone_number`, `bank_name`, `profession`, `area`, `percent`, `message`, `added_by`, `added_at`, `updated_by`, `updated_at`) VALUES
(6, 'Akash', 'akash@olatechs.com', '09820026484', 'ICICI Bank', 'Salaried', 'Mumbai', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '', '0000-00-00 00:00:00', '', '2023-03-17 00:00:00'),
(7, 'Rahul', 'rahul@olatechs.com', '09820026484', 'IDFC Bank', 'Self Employed', 'Mumbai', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '', '0000-00-00 00:00:00', '', '2023-03-17 00:00:00'),
(8, 'Krishna', 'support@olatechs.com', '09820026484', 'Kotak Bank', 'Salaried', 'Mumbai', '8', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '', '0000-00-00 00:00:00', '', '2023-03-17 00:00:00'),
(9, 'bank_offer', 'akash@olatechs.com', '9820026484', '', '', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(10, 'bank_offer', 'akash@olatechs.com', '9820026484', '', '', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(11, 'Krishna', 'support@olatechs.com', '9820026484', 'Select Bank', '', '', '', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payment_made`
--

CREATE TABLE `payment_made` (
  `id` int(11) NOT NULL,
  `deposit` varchar(100) NOT NULL,
  `vendor` varchar(255) NOT NULL,
  `date` varchar(15) NOT NULL,
  `payment_mode` varchar(15) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `balance` varchar(15) NOT NULL,
  `amount` varchar(15) NOT NULL,
  `bank_charges` varchar(15) NOT NULL,
  `cheque_no` varchar(15) NOT NULL,
  `cheque_date` varchar(15) NOT NULL,
  `reference` varchar(15) NOT NULL,
  `note` text NOT NULL,
  `total` varchar(15) NOT NULL,
  `amount_received` varchar(15) NOT NULL,
  `amount_used` varchar(15) NOT NULL,
  `amount_excess` varchar(15) NOT NULL,
  `added_by` varchar(15) NOT NULL,
  `added_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_made`
--

INSERT INTO `payment_made` (`id`, `deposit`, `vendor`, `date`, `payment_mode`, `mobile`, `balance`, `amount`, `bank_charges`, `cheque_no`, `cheque_date`, `reference`, `note`, `total`, `amount_received`, `amount_used`, `amount_excess`, `added_by`, `added_at`, `updated_by`, `updated_at`) VALUES
(16, '3', '1', '13-02-2023', 'Others', '09820026484', 'UnChecked', '1', '', '', '', '', '', '1.00', '1.00', '1.00', '', '', '2023-02-13 00:00:00', '', '0000-00-00 00:00:00'),
(17, '3', '2', '13-02-2023', 'Others', '09820026484', 'UnChecked', '4', '', '', '', '', '', '4.00', '4.00', '4.00', '', '', '2023-02-13 00:00:00', '', '0000-00-00 00:00:00'),
(32, '3', '3', '27-02-2023', 'Others', '', 'UnChecked', '11.80', '', '', '', '', '', '11.80', '11.80', '11.80', '', '', '2023-02-27 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payment_made_entries`
--

CREATE TABLE `payment_made_entries` (
  `id` int(11) NOT NULL,
  `payment_made_id` varchar(15) NOT NULL,
  `invoicedate` varchar(15) NOT NULL,
  `invoiceno` varchar(15) NOT NULL,
  `invoiceamount` varchar(15) NOT NULL,
  `dueamount` varchar(15) NOT NULL,
  `payment` varchar(15) NOT NULL,
  `added_by` varchar(15) NOT NULL,
  `added_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_made_entries`
--

INSERT INTO `payment_made_entries` (`id`, `payment_made_id`, `invoicedate`, `invoiceno`, `invoiceamount`, `dueamount`, `payment`, `added_by`, `added_at`, `updated_by`, `updated_at`) VALUES
(15, '16', '10-02-2023', '0001', '3.54', '3.54', '1', '', '2023-02-13 00:00:00', '', '0000-00-00 00:00:00'),
(16, '16', '13-02-2023', '0002', '5.90', '5.9', '4', '', '2023-02-13 00:00:00', '', '0000-00-00 00:00:00'),
(34, '32', '13-02-2023', '0003', '11.80', '11.8', '11.8', '', '2023-02-27 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payment_received`
--

CREATE TABLE `payment_received` (
  `id` int(11) NOT NULL,
  `deposit` varchar(100) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `date` varchar(15) NOT NULL,
  `payment_mode` varchar(15) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `balance` varchar(15) NOT NULL,
  `amount` varchar(15) NOT NULL,
  `bank_charges` varchar(15) NOT NULL,
  `cheque_no` varchar(15) NOT NULL,
  `cheque_date` varchar(15) NOT NULL,
  `reference` varchar(15) NOT NULL,
  `note` text NOT NULL,
  `total` varchar(15) NOT NULL,
  `amount_received` varchar(15) NOT NULL,
  `amount_used` varchar(15) NOT NULL,
  `amount_excess` varchar(15) NOT NULL,
  `added_by` varchar(15) NOT NULL,
  `added_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_received`
--

INSERT INTO `payment_received` (`id`, `deposit`, `customer`, `date`, `payment_mode`, `mobile`, `balance`, `amount`, `bank_charges`, `cheque_no`, `cheque_date`, `reference`, `note`, `total`, `amount_received`, `amount_used`, `amount_excess`, `added_by`, `added_at`, `updated_by`, `updated_at`) VALUES
(43, '3', '4', '13-02-2023', 'Others', '09820026484', 'UnChecked', '8.09', '', '', '', '', '', '8.09', '8.09', '8.09', '', '', '2023-02-13 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payment_received_entries`
--

CREATE TABLE `payment_received_entries` (
  `id` int(11) NOT NULL,
  `payment_received_id` varchar(15) NOT NULL,
  `customername` varchar(255) NOT NULL,
  `invoicedate` varchar(15) NOT NULL,
  `invoiceno` varchar(15) NOT NULL,
  `invoiceamount` varchar(15) NOT NULL,
  `dueamount` varchar(15) NOT NULL,
  `payment` varchar(15) NOT NULL,
  `added_by` varchar(15) NOT NULL,
  `added_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_received_entries`
--

INSERT INTO `payment_received_entries` (`id`, `payment_received_id`, `customername`, `invoicedate`, `invoiceno`, `invoiceamount`, `dueamount`, `payment`, `added_by`, `added_at`, `updated_by`, `updated_at`) VALUES
(71, '43', '', '13-02-2023', '0002', '8.09', '8.09', '8.09', '', '2023-02-13 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `properties_name` text NOT NULL,
  `address` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `sale_rent` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `gallery` varchar(255) NOT NULL,
  `floor_plan` varchar(255) NOT NULL,
  `noofbedroom` varchar(15) NOT NULL,
  `noofbathroom` varchar(15) NOT NULL,
  `sqft` varchar(255) NOT NULL,
  `garages` varchar(14) NOT NULL,
  `price` varchar(50) NOT NULL,
  `video` varchar(255) NOT NULL,
  `mobileno` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `added_by` varchar(15) NOT NULL,
  `added_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `properties_name`, `address`, `category`, `sale_rent`, `photo`, `gallery`, `floor_plan`, `noofbedroom`, `noofbathroom`, `sqft`, `garages`, `price`, `video`, `mobileno`, `description`, `added_by`, `added_at`, `updated_by`, `updated_at`) VALUES
(2, 'Countryside Modern Lake View', 'Road No. 11, Western Hills, High Tension Line, North Hyderabad, Hyderabad', 'plotting', 'Sale', 'gallery_img03.jpg', '', 'floor-plan-1.png', '3', '2', '1050', '2', '60 Lac', '', '09920151479', '<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>\r\n<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>\r\n<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>', '', '2023-03-13 00:00:00', '', '2023-03-17 00:00:00'),
(4, '3BHK In Kukatpally', 'Road No. 11, Western Hills, High Tension Line, North Hyderabad, Hyderabad', 'plotting', 'Sale', 'gallery_img04.jpg', 's-5.jpg, s-4.jpg, s-3.jpg, s-2.jpg, s-1.jpg', 'floor-plan-1.png', '6', '4', '1600', '4', '38.35 L', '', '09920151479', '<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>\r\n<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>\r\n<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>', '', '2023-03-14 00:00:00', '', '2023-03-17 00:00:00'),
(14, '4BHK In Kukatpally', 'Road No. 11, Western Hills, High Tension Line, North Hyderabad, Hyderabad', 'residential', 'Sale', 'gallery_img05.jpg', 's-5.jpg, s-4.jpg, s-3.jpg, s-2.jpg, s-1.jpg', 'floor-plan-1.png', '4', '3', '1200', '3', '45 Lac', '', '09920151479', '<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>\r\n<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>\r\n<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>', '', '2023-03-14 00:00:00', '', '2023-03-17 00:00:00'),
(15, '2BHK Spacious Flat with DECK', 'Road No. 11, Western Hills, High Tension Line, North Hyderabad, Hyderabad', 'residential', 'Rent', 'gallery_img04.jpg', 's-5.jpg, s-4.jpg, s-3.jpg, s-2.jpg, s-1.jpg', 'floor-plan-1.png', '2', '1', '800', '1', '48 Lac', '', '09920151479', '<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>\r\n<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>\r\n<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>', '', '2023-03-14 00:00:00', '', '2023-03-17 00:00:00'),
(16, '2BHK Spacious Flat with DECK', 'Road No. 11, Western Hills, High Tension Line, North Hyderabad, Hyderabad', 'commercial', 'Sale', 'gallery_img03.jpg', '', 'floor-plan-1.png', '3', '2', '500', '1', '46 Lac', '', '09920151479', '<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>\r\n<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>\r\n<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>', '', '2023-03-14 00:00:00', '', '2023-03-17 00:00:00'),
(17, '3 BHK Flat for sale in Bhagya Nagar', 'Road No. 11, Western Hills, High Tension Line, North Hyderabad, Hyderabad', 'commercial', 'Sale', 'gallery_img03.jpg', '', 'floor-plan-1.png', '3', '2', '900', '2', '52 Lac', '', '09920151479', '<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>\r\n<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>\r\n<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>', '', '2023-03-14 00:00:00', '', '2023-03-17 00:00:00'),
(18, '2BHK Spacious Flat with DECK', 'Road No. 11, Western Hills, High Tension Line, North Hyderabad, Hyderabad', 'commercial', 'Rent', 'gallery_img05.jpg', 'plot04.jpg, plot03.jpg, plot02.jpg, plot01.jpg', 'floor-plan-1.png', '2', '2', '600', '1', '30 Lac', '', '09920151479', '<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>\r\n<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>\r\n<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>', '', '2023-03-14 00:00:00', '', '2023-03-17 00:00:00'),
(19, '5BHK Spacious Flat with DECK', 'Road No. 11, Western Hills, High Tension Line, North Hyderabad, Hyderabad', 'residential', 'Sale', 'gallery_img05.jpg', 'comm04.jpg, comm02.jpg, comm03.jpg', 'floor-plan-1.png', '5', '3', '2000', '3', '85 Lac', '', '09920151479', '<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>\r\n<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>\r\n<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>', '', '2023-03-14 00:00:00', '', '2023-03-17 00:00:00'),
(20, '1BHK Spacious Flat with DECK', 'Road No. 11, Western Hills, High Tension Line, North Hyderabad, Hyderabad', 'residential', 'Rent', 'gallery_img03.jpg', 'plot04.jpg, plot03.jpg, plot02.jpg, plot01.jpg', 'floor-plan-1.png', '1', '1', '1', '1', '25 Lac', '', '09920151479', '<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>\r\n<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>\r\n<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>', '', '2023-03-14 00:00:00', '', '2023-03-17 00:00:00'),
(21, '4BHK Spacious Flat with DECK', 'Road No. 11, Western Hills, High Tension Line, North Hyderabad, Hyderabad', 'residential', 'Sale', 'gallery_img04.jpg', 'comm04.jpg, comm02.jpg, comm03.jpg', 'floor-plan-1.png', '3', '3', '1000', '2', '55.60 Lac', '', '09920151479', '<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>\r\n<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>\r\n<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>', '', '2023-03-14 00:00:00', '', '2023-03-17 00:00:00'),
(22, '6BHK Spacious Flat with DECK', 'Road No. 11, Western Hills, High Tension Line, North Hyderabad, Hyderabad', 'residential', 'Rent', 'gallery_img01.jpg', 'plot04.jpg, plot03.jpg, plot02.jpg, plot01.jpg', 'floor-plan-1.png', '6', '6', '1800', '3', '1.20 Cr', '', '09920151479', '<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>\r\n<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>\r\n<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>', '', '2023-03-14 00:00:00', '', '2023-03-17 00:00:00'),
(23, '12BHK Spacious Flat with DECK', 'Road No. 11, Western Hills, High Tension Line, North Hyderabad, Hyderabad', 'commercial', 'Rent', 'gallery_img04.jpg', 'comm04.jpg, comm02.jpg, comm03.jpg', 'floor-plan-1.png', '12', '10', '3000', '8', '3.50 Cr', '', '09920151479', '<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>\r\n<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>\r\n<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>', '', '2023-03-14 00:00:00', '', '2023-03-17 00:00:00'),
(24, '4BHK Spacious Flat with DECK', 'Road No. 11, Western Hills, High Tension Line, North Hyderabad, Hyderabad', 'plotting', 'Sale', 'gallery_img02.jpg', 's-5.jpg, s-4.jpg, s-3.jpg, s-2.jpg', 'floor-plan-1.png', '4', '4', '1200', '3', '1 Cr', '', '09920151479', '<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>\r\n<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>\r\n<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>', '', '2023-03-14 00:00:00', '', '2023-03-17 00:00:00'),
(30, '3BHK Spacious Flat with DECK', 'Road No. 11, Western Hills, High Tension Line, North Hyderabad, Hyderabad', 'commercial', 'Sale', 'bg-home-3.jpg', '', 'floor-plan-1.png', '3', '3', '1300', '1', '36 Lac', '14semTlwyUY', '09920151479', '<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>\r\n<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>\r\n<p class=\"mb-3\" style=\"box-sizing: border-box; margin-top: 0px; line-height: 26px; color: #666666; font-family: Lato, sans-serif; font-size: 15px; margin-bottom: 1rem !important;\">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit, alias fuga aliquam quod tempora a nisi esse magnam nulla quas! Error praesentium, vero dolorum laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum rerum beatae consequatur, totam fugit.</p>', '', '2023-03-16 00:00:00', '', '2023-03-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `properties_floor_plan`
--

CREATE TABLE `properties_floor_plan` (
  `id` int(11) NOT NULL,
  `properties_id` varchar(15) NOT NULL,
  `floor_plan` varchar(255) NOT NULL,
  `added_by` varchar(12) NOT NULL,
  `added_at` datetime NOT NULL,
  `updated_by` varchar(12) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properties_floor_plan`
--

INSERT INTO `properties_floor_plan` (`id`, `properties_id`, `floor_plan`, `added_by`, `added_at`, `updated_by`, `updated_at`) VALUES
(1, '42', 'floor-plan-1.png', '', '2023-03-27 00:00:00', '', '0000-00-00 00:00:00'),
(2, '42', 's-1.jpg', '', '2023-03-27 00:00:00', '', '0000-00-00 00:00:00'),
(4, '42', 's-3.jpg', '', '2023-03-27 00:00:00', '', '0000-00-00 00:00:00'),
(5, '42', 'bg-15.jpg', '', '2023-03-27 00:00:00', '', '0000-00-00 00:00:00'),
(6, '30', 'gallery_img01.jpg', '', '2023-03-27 00:00:00', '', '0000-00-00 00:00:00'),
(7, '30', 'gallery_img02.jpg', '', '2023-03-27 00:00:00', '', '0000-00-00 00:00:00'),
(8, '30', 'gallery_img03.jpg', '', '2023-03-27 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `properties_images`
--

CREATE TABLE `properties_images` (
  `id` int(11) NOT NULL,
  `properties_id` varchar(15) NOT NULL,
  `gallery` varchar(255) NOT NULL,
  `added_by` varchar(15) NOT NULL,
  `added_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properties_images`
--

INSERT INTO `properties_images` (`id`, `properties_id`, `gallery`, `added_by`, `added_at`, `updated_by`, `updated_at`) VALUES
(9, '30', 'gallery_img04.jpg', '', '2023-03-16 00:00:00', '', '0000-00-00 00:00:00'),
(10, '30', 'gallery_img03.jpg', '', '2023-03-16 00:00:00', '', '0000-00-00 00:00:00'),
(11, '30', 'gallery_img02.jpg', '', '2023-03-16 00:00:00', '', '0000-00-00 00:00:00'),
(12, '30', 'gallery_img01.jpg', '', '2023-03-16 00:00:00', '', '0000-00-00 00:00:00'),
(13, '20', 'gallery_img01.jpg', '', '2023-03-17 00:00:00', '', '0000-00-00 00:00:00'),
(14, '20', 'gallery_img02.jpg', '', '2023-03-17 00:00:00', '', '0000-00-00 00:00:00'),
(15, '20', 'gallery_img03.jpg', '', '2023-03-17 00:00:00', '', '0000-00-00 00:00:00'),
(16, '20', 'gallery_img04.jpg', '', '2023-03-17 00:00:00', '', '0000-00-00 00:00:00'),
(17, '20', 'gallery_img05.jpg', '', '2023-03-17 00:00:00', '', '0000-00-00 00:00:00'),
(18, '19', 'gallery_img02.jpg', '', '2023-03-17 00:00:00', '', '0000-00-00 00:00:00'),
(19, '19', 'gallery_img03.jpg', '', '2023-03-17 00:00:00', '', '0000-00-00 00:00:00'),
(20, '19', 'gallery_img04.jpg', '', '2023-03-17 00:00:00', '', '0000-00-00 00:00:00'),
(21, '15', 'gallery_img01.jpg', '', '2023-03-17 00:00:00', '', '0000-00-00 00:00:00'),
(22, '15', 'gallery_img03.jpg', '', '2023-03-17 00:00:00', '', '0000-00-00 00:00:00'),
(23, '15', 'gallery_img04.jpg', '', '2023-03-17 00:00:00', '', '0000-00-00 00:00:00'),
(24, '15', 'gallery_img05.jpg', '', '2023-03-17 00:00:00', '', '0000-00-00 00:00:00'),
(25, '4', 'gallery_img02.jpg', '', '2023-03-17 00:00:00', '', '0000-00-00 00:00:00'),
(26, '4', 'gallery_img03.jpg', '', '2023-03-17 00:00:00', '', '0000-00-00 00:00:00'),
(27, '4', 'gallery_img05.jpg', '', '2023-03-17 00:00:00', '', '0000-00-00 00:00:00'),
(28, '40', 'gallery_img01.jpg', '', '2023-03-27 00:00:00', '', '0000-00-00 00:00:00'),
(29, '40', 'gallery_img02.jpg', '', '2023-03-27 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id` int(11) NOT NULL,
  `vendor_name` varchar(15) NOT NULL,
  `order_date` varchar(15) NOT NULL,
  `delivery_date` varchar(15) NOT NULL,
  `purchase_order` varchar(15) NOT NULL,
  `source_of_supply` varchar(255) NOT NULL,
  `destination_of_supply` varchar(255) NOT NULL,
  `item_rate` varchar(255) NOT NULL,
  `subtotal` varchar(15) NOT NULL,
  `total_taxamt` varchar(15) NOT NULL,
  `adjustment` varchar(15) NOT NULL,
  `totalamt` varchar(15) NOT NULL,
  `note` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `added_by` varchar(15) NOT NULL,
  `added_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`id`, `vendor_name`, `order_date`, `delivery_date`, `purchase_order`, `source_of_supply`, `destination_of_supply`, `item_rate`, `subtotal`, `total_taxamt`, `adjustment`, `totalamt`, `note`, `status`, `added_by`, `added_at`, `updated_by`, `updated_at`) VALUES
(1, '1', '15-12-2022', '31-12-2022', 'PO-299', 'Maharashtra', 'Maharashtra', 'Item Rates Are', '3.00', '0.54', '0.46', '4.00', '', 'Billed', '', '2022-12-15 00:00:00', '', '0000-00-00 00:00:00'),
(2, '2', '12-01-2023', '31-01-2023', 'PO-300', 'Maharashtra', 'Maharashtra', 'Item Rates Are', '5.00', '0.9', '', '5.90', '', 'Billed', '', '2023-01-12 00:00:00', '', '2023-01-16 00:00:00'),
(4, '3', '30-01-2023', '31-01-2023', 'PO-0005', 'Maharashtra', 'Maharashtra', 'tax_exclusive', '10.00', '1.8', '', '11.80', '', 'Billed', '', '2023-01-30 00:00:00', '', '0000-00-00 00:00:00'),
(5, '4', '13-02-2023', '28-02-2023', '0004', 'Maharashtra', 'Maharashtra', 'tax_exclusive', '10.00', '1.8', '', '11.80', '', 'Open', '', '2023-02-13 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_entries`
--

CREATE TABLE `purchase_order_entries` (
  `id` int(11) NOT NULL,
  `purchaseorderid` varchar(15) NOT NULL,
  `item` text NOT NULL,
  `description` text NOT NULL,
  `qty` varchar(15) NOT NULL,
  `rate` varchar(15) NOT NULL,
  `account` varchar(255) NOT NULL,
  `discount` varchar(15) NOT NULL,
  `taxrate` varchar(15) NOT NULL,
  `taxamt` varchar(15) NOT NULL,
  `total` varchar(15) NOT NULL,
  `added_by` varchar(15) NOT NULL,
  `added_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_order_entries`
--

INSERT INTO `purchase_order_entries` (`id`, `purchaseorderid`, `item`, `description`, `qty`, `rate`, `account`, `discount`, `taxrate`, `taxamt`, `total`, `added_by`, `added_at`, `updated_by`, `updated_at`) VALUES
(1, '1', 'Pendrive Test', 'Purchase', '1', '3', 'Purchase A/c', '0', '18', '0.54', '3', '', '2022-12-15 00:00:00', '', '0000-00-00 00:00:00'),
(9, '2', 'Poco Mobile', '', '1', '5', 'Purchase A/c', '0', '18', '0.90', '5', '', '2023-01-16 00:00:00', '', '0000-00-00 00:00:00'),
(11, '4', 'Ram', 'Purchase Desc', '1', '10', 'Purchase A/c', '0', '18', '1.80', '10.00', '', '2023-01-30 00:00:00', '', '0000-00-00 00:00:00'),
(12, '5', 'Ram', 'Purchase Desc', '1', '10', 'Purchase A/c', '0', '18', '1.80', '10.00', '', '2023-02-13 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `register_details`
--

CREATE TABLE `register_details` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `date` varchar(12) NOT NULL,
  `otp` varchar(12) NOT NULL,
  `added_by` varchar(12) NOT NULL,
  `added_at` datetime NOT NULL,
  `updated_by` varchar(12) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register_details`
--

INSERT INTO `register_details` (`id`, `name`, `email`, `mobile`, `date`, `otp`, `added_by`, `added_at`, `updated_by`, `updated_at`) VALUES
(1, 'Md', 'alwani.m@olatechs.com', '09702803745', '2023', '1234', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `slider_name1` varchar(255) NOT NULL,
  `slider_name2` varchar(255) NOT NULL,
  `slider_name3` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `added_by` varchar(15) NOT NULL,
  `added_at` datetime NOT NULL,
  `updated_by` varchar(15) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slider_name1`, `slider_name2`, `slider_name3`, `photo`, `added_by`, `added_at`, `updated_by`, `updated_at`) VALUES
(1, 'Welcome to', 'Trie Properties', 'Find Your Commercial Property', 'bg-15.jpg', '', '2023-03-15 00:00:00', '', '0000-00-00 00:00:00'),
(2, 'We are', 'Specialised', 'For your dream home', 'bg-23.jpg', '', '2023-03-15 00:00:00', '', '0000-00-00 00:00:00'),
(3, 'Best options for', 'Prime Plots', 'Your dream into reality', 'bg-21.jpg', '', '2023-03-15 00:00:00', '', '2023-03-15 00:00:00'),
(4, 'Are you looking for', 'Loans', 'Simple & Easy Loan Process', 'bg-loan.jpg', '', '2023-03-15 00:00:00', '', '2023-03-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'support@olatechs.com', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'saurabh@vighnaharta.net.in', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `primary_contact` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `company_name` varchar(500) NOT NULL,
  `display_name` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `website` varchar(15) NOT NULL,
  `payment_terms` varchar(255) NOT NULL,
  `gst_treatment` varchar(255) NOT NULL,
  `gst_no` varchar(50) NOT NULL,
  `source_of_supply` varchar(255) NOT NULL,
  `opening_bal` varchar(20) NOT NULL,
  `pan_no` varchar(20) NOT NULL,
  `billing_attention` text NOT NULL,
  `billing_street` varchar(255) NOT NULL,
  `billing_city` varchar(100) NOT NULL,
  `billing_state` varchar(100) NOT NULL,
  `billing_pincode` varchar(20) NOT NULL,
  `shipping_attention` text NOT NULL,
  `shipping_street` varchar(255) NOT NULL,
  `shipping_city` varchar(50) NOT NULL,
  `shipping_state` varchar(50) NOT NULL,
  `shipping_pincode` varchar(10) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `ifsc_code` varchar(50) NOT NULL,
  `account_no` varchar(50) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `added_at` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `primary_contact`, `first_name`, `last_name`, `company_name`, `display_name`, `email`, `phone`, `mobile`, `website`, `payment_terms`, `gst_treatment`, `gst_no`, `source_of_supply`, `opening_bal`, `pan_no`, `billing_attention`, `billing_street`, `billing_city`, `billing_state`, `billing_pincode`, `shipping_attention`, `shipping_street`, `shipping_city`, `shipping_state`, `shipping_pincode`, `bank_name`, `branch_name`, `ifsc_code`, `account_no`, `added_by`, `added_at`, `updated_by`, `updated_at`) VALUES
(1, 'Mr', 'Sam', 'Kumar', 'samtech', 'samtech', 'sam@gmail.com', '09820026484', '09820026484', '', 'Due on Receipt', 'Unregistered Business', '', 'Maharashtra', '50', 'ADLPG1234P', 'Peter Appartment', 'Petter Dias', 'Bandra W', 'Maharashtra', '400050', '', '', '', '', '', '', '', '', '', '', '2022-12-15 00:00:00', '', '2023-02-13 00:00:00'),
(2, 'Ms', 'Pinky', 'Kumar', 'Keys', 'Keys', 'pinky@gmail.com', '022 99887766', '8888888888', 'keys.com', 'Due on Receipt', 'Regular', 'QWERTY09876IOP', 'Maharashtra', '200000', 'HKEPA8006G', 'Jevan Appartment', 'Lane No 1', 'Pimri', 'Pune', '400823', 'Shibli Nagar', 'Near HDFC Bank', 'Mahape', 'Maharashtra', '400925', 'ICICI Bank', 'Mahape', 'ZXCVB09876MN', '6504495100', '', '2023-01-12 00:00:00', '', '0000-00-00 00:00:00'),
(3, 'Mr', 'Yogesh', 'Yadav', 'Y & Y Enterprises', 'Y & Y Enterprises', 'yogesh@gmail.com', '', '7777777777', '', 'Due on Receipt', 'Regular', 'ASDF67890HJKL', 'Maharashtra', '500', 'BXEPA7006G', 'A/4, Victory Block', 'Hill Road', 'Bandra', 'Maharashtra', '400050', '', '', '', '', '', '', '', '', '', '', '2023-01-30 00:00:00', '', '0000-00-00 00:00:00'),
(4, 'Mr', 'Vivek', 'oberoi', 'Altra Systems', 'Altra Systems', 'vivek@gmail.com', '2222222222', '09820026484', '', 'Due on Receipt', 'Regular', '07AAGFF2194N1Z1', 'Maharashtra', '200', 'ADLPG1234P', 'Akshya Nagar 1st Block 1st Cross', 'Rammurthy nagar,', 'Bangalore', 'Bangalore', '560016', '', '', '', '', '', '', '', '', '', '', '2023-02-13 00:00:00', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `product_id` varchar(15) NOT NULL,
  `customers_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `product_id`, `customers_id`) VALUES
(33, '16', '09702803745'),
(34, '18', '09702803745'),
(37, '18', '09820026484'),
(38, '30', '9594676055'),
(39, '16', '9594676055'),
(40, '18', '9594676055'),
(42, '23', '09702803745'),
(46, '4', '09702803745'),
(47, '15', '9594676055'),
(49, '20', '9594676055'),
(50, '15', '09702803745'),
(52, '18', '9063512827'),
(53, '18', '9920151479'),
(54, '30', '9920151479'),
(55, '23', '9920151479'),
(56, '16', '9920151479'),
(90, '17', '122345555'),
(91, '16', '122345555'),
(92, '18', '122345555'),
(93, '30', '122345555');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_loan`
--
ALTER TABLE `bank_loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_loan_images`
--
ALTER TABLE `bank_loan_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_offer`
--
ALTER TABLE `bank_offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_entries`
--
ALTER TABLE `bill_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_details`
--
ALTER TABLE `company_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_challan`
--
ALTER TABLE `delivery_challan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_challan_entries`
--
ALTER TABLE `delivery_challan_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `godown`
--
ALTER TABLE `godown`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_entries`
--
ALTER TABLE `invoice_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_form`
--
ALTER TABLE `loan_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_made`
--
ALTER TABLE `payment_made`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_made_entries`
--
ALTER TABLE `payment_made_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_received`
--
ALTER TABLE `payment_received`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_received_entries`
--
ALTER TABLE `payment_received_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties_floor_plan`
--
ALTER TABLE `properties_floor_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties_images`
--
ALTER TABLE `properties_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order_entries`
--
ALTER TABLE `purchase_order_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register_details`
--
ALTER TABLE `register_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bank_loan`
--
ALTER TABLE `bank_loan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bank_loan_images`
--
ALTER TABLE `bank_loan_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bank_offer`
--
ALTER TABLE `bank_offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `bill_entries`
--
ALTER TABLE `bill_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `company_details`
--
ALTER TABLE `company_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `delivery_challan`
--
ALTER TABLE `delivery_challan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `delivery_challan_entries`
--
ALTER TABLE `delivery_challan_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `godown`
--
ALTER TABLE `godown`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `invoice_entries`
--
ALTER TABLE `invoice_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `loan_form`
--
ALTER TABLE `loan_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payment_made`
--
ALTER TABLE `payment_made`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `payment_made_entries`
--
ALTER TABLE `payment_made_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `payment_received`
--
ALTER TABLE `payment_received`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `payment_received_entries`
--
ALTER TABLE `payment_received_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `properties_floor_plan`
--
ALTER TABLE `properties_floor_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `properties_images`
--
ALTER TABLE `properties_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchase_order_entries`
--
ALTER TABLE `purchase_order_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `register_details`
--
ALTER TABLE `register_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
