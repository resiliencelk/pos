-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 04, 2013 at 04:00 AM
-- Server version: 5.5.33
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `resilie3_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `_transactions`
--

DROP TABLE IF EXISTS `_transactions`;
CREATE TABLE IF NOT EXISTS `_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transactiondate` varchar(12) NOT NULL,
  `description` varchar(500) NOT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `catagory` char(1) DEFAULT NULL,
  `account` char(1) DEFAULT NULL,
  `createddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=210 ;

--
-- Dumping data for table `_transactions`
--

INSERT INTO `_transactions` (`id`, `transactiondate`, `description`, `amount`, `catagory`, `account`, `createddate`) VALUES
(82, '01/08/2013', 'Cash in Hand', 52400.00, '1', '1', '2013-08-16 08:51:05'),
(83, '01/08/2013', 'Office Trip', 6600.00, '2', '1', '2013-08-16 08:51:27'),
(84, '01/08/2013', 'Romision', 50000.00, '2', '2', '2013-08-16 08:52:22'),
(85, '01/08/2013', 'Bank OD', 18000.00, '1', '1', '2013-08-16 08:52:48'),
(86, '01/08/2013', 'bank Service Charge', 500.00, '2', '1', '2013-08-16 08:53:23'),
(87, '02/08/2013', '029070013003', 3375.00, '1', '1', '2013-08-16 08:54:04'),
(88, '02/08/2013', 'Bank OD', 13000.00, '2', '1', '2013-08-16 08:54:30'),
(89, '02/08/2013', 'Food Allowance', 100.00, '2', '1', '2013-08-16 08:54:50'),
(90, '02/08/2013', 'Dhileeban', 1000.00, '2', '1', '2013-08-16 08:55:12'),
(91, '02/08/2013', 'To Tally the amount', 200.00, '2', '1', '2013-08-16 08:55:59'),
(92, '03/08/2013', 'Laptop Balance Payment(Kandavalai)', 12000.00, '1', '1', '2013-08-16 08:56:23'),
(93, '03/08/2013', 'ID Print', 2000.00, '2', '1', '2013-08-16 08:56:46'),
(94, '05/08/2013', 'Janahan Cheque Paid', 20000.00, '1', '1', '2013-08-16 08:57:25'),
(95, '05/08/2013', 'Janahan Cheque Passed', 35000.00, '2', '2', '2013-08-16 08:57:49'),
(96, '05/08/2013', 'Bank OD Received', 3000.00, '1', '1', '2013-08-16 08:58:14'),
(97, '06/08/2013', '06080013001', 66000.00, '1', '1', '2013-08-16 08:58:52'),
(98, '06/08/2013', 'Unity PC- Laptop Banance', 30000.00, '2', '1', '2013-08-16 08:59:18'),
(99, '06/08/2013', 'Micro Center Cheque', 27500.00, '2', '2', '2013-08-16 08:59:38'),
(100, '06/08/2013', 'Micro Center Cheque', 11000.00, '2', '2', '2013-08-16 08:59:56'),
(101, '06/08/2013', 'Kuinston Cheque', 7100.00, '2', '2', '2013-08-16 09:00:14'),
(102, '06/08/2013', 'Janahan Paid', 8600.00, '1', '1', '2013-08-16 09:00:32'),
(103, '06/08/2013', 'Bank OD Received', 7000.00, '1', '1', '2013-08-16 09:00:49'),
(104, '07/08/2013', 'Rajeevan -salary advance', 2000.00, '2', '1', '2013-08-16 09:01:19'),
(105, '07/08/2013', 'Dhileeban-Salary Advance', 2000.00, '2', '1', '2013-08-16 09:01:35'),
(106, '07/08/2013', 'Jalan -Salary Advance', 2000.00, '2', '1', '2013-08-16 09:01:49'),
(107, '07/08/2013', '07080013002', 1000.00, '1', '1', '2013-08-16 09:02:10'),
(108, '07/08/2013', 'Janahan Paid', 6400.00, '1', '1', '2013-08-16 09:02:35'),
(109, '07/08/2013', '0070080013001', 51100.00, '1', '1', '2013-08-16 09:03:13'),
(110, '07/08/2013', '0070080013002', 4250.00, '1', '1', '2013-08-16 09:04:02'),
(111, '07/08/2013', '0070080013003', 1850.00, '1', '1', '2013-08-16 09:04:18'),
(112, '07/08/2013', '0070080013004', 5100.00, '1', '1', '2013-08-16 09:04:34'),
(113, '07/08/2013', '0070080013005', 1000.00, '1', '1', '2013-08-16 09:04:49'),
(114, '07/08/2013', 'Cleaning', 100.00, '2', '1', '2013-08-16 09:05:07'),
(115, '07/08/2013', 'Bank OD Claimed', 6400.00, '2', '1', '2013-08-16 09:05:26'),
(116, '08/08/2013', 'Rent', 30000.00, '2', '1', '2013-08-16 09:20:27'),
(117, '08/08/2013', 'Rajeevan -salary advance', 7000.00, '2', '1', '2013-08-16 09:21:08'),
(118, '08/08/2013', 'Jeyathas - salary Advance', 8000.00, '2', '1', '2013-08-16 09:21:28'),
(119, '08/08/2013', 'Jalan -Salary Advance', 6000.00, '2', '1', '2013-08-16 09:21:54'),
(120, '08/08/2013', 'Subaraj - Salary Advance', 4000.00, '2', '1', '2013-08-16 09:22:24'),
(121, '08/08/2013', 'Rajeevan(PPT Good Transport )', 1000.00, '2', '1', '2013-08-16 09:23:02'),
(122, '08/08/2013', 'Mouse Battery', 40.00, '2', '1', '2013-08-16 09:23:30'),
(123, '08/08/2013', 'Room spray', 275.00, '2', '1', '2013-08-16 09:23:59'),
(124, '08/08/2013', 'Chandramohan (293150)', 14700.00, '1', '2', '2013-08-16 09:27:53'),
(125, '09/08/2013', 'Bank OD Received', 3500.00, '2', '1', '2013-08-16 09:28:57'),
(126, '09/08/2013', 'Cool Drinks', 210.00, '2', '1', '2013-08-16 09:29:21'),
(128, '10/08/2013', 'PPT Transport', 100.00, '2', '1', '2013-08-16 09:30:35'),
(129, '11/08/2013', 'Income', 0.00, '1', '1', '2013-08-16 09:31:54'),
(130, '11/08/2013', 'Expence', 0.00, '2', '1', '2013-08-16 09:32:18'),
(131, '12/08/2013', 'Dhileeban Deposited', 10000.00, '1', '1', '2013-08-16 09:32:56'),
(132, '12/08/2013', 'Unity PC- Laptop Banance', 10000.00, '2', '1', '2013-08-16 09:33:24'),
(133, '12/08/2013', '0120080013001', 3200.00, '1', '1', '2013-08-16 09:34:08'),
(134, '12/08/2013', '0120080013002', 3000.00, '1', '1', '2013-08-16 09:34:32'),
(135, '12/08/2013', 'Kaspersky cheque', 2900.00, '2', '2', '2013-08-16 09:35:00'),
(136, '13/08/2013', '0130080013002', 5000.00, '1', '1', '2013-08-16 09:35:44'),
(137, '13/08/2013', 'Dhileeban Deposited', 3000.00, '1', '1', '2013-08-16 09:36:34'),
(138, '13/08/2013', 'Unity PC- Laptop Banance', 8000.00, '2', '1', '2013-08-16 09:36:55'),
(139, '13/08/2013', 'Bank Penalty (OD)', 14100.00, '2', '1', '2013-08-16 09:37:18'),
(140, '14/08/2013', 'Income', 0.00, '1', '1', '2013-08-16 09:41:53'),
(141, '14/08/2013', 'Petrol', 100.00, '2', '1', '2013-08-16 09:42:09'),
(142, '14/08/2013', 'Sugar', 110.00, '2', '1', '2013-08-16 09:42:27'),
(143, '15/08/2013', 'Jeyathas Deposited', 50.00, '1', '1', '2013-08-16 09:43:36'),
(144, '15/08/213', 'PPT Transport', 150.00, '2', '1', '2013-08-16 09:44:09'),
(145, '15/08/2013', 'RES08151301', 1500.00, '1', '1', '2013-08-16 09:45:03'),
(146, '15/08/2013', 'Asian Travels', 16000.00, '1', '1', '2013-08-16 09:45:32'),
(147, '16/08/2013', 'Rajeevan Deposited', 7500.00, '1', '1', '2013-08-16 09:46:38'),
(149, '16/08/2013', 'Northlead (108798)', 5000.00, '2', '2', '2013-08-16 09:51:49'),
(150, '16/08/2013', 'Praburam - Salary ', 18000.00, '2', '1', '2013-08-16 09:52:42'),
(151, '16/08/2013', 'payment for hari(Domain)', 2000.00, '2', '1', '2013-08-16 09:53:19'),
(152, '16/08/2013', 'RES08161301-card reader', 150.00, '1', '1', '2013-08-16 09:56:37'),
(153, '16/08/2013', 'RES08161301', 1350.00, '1', '1', '2013-08-16 09:57:11'),
(154, '16/08/2013', 'Jeyathas and Jalan (Rajeevan)', 1000.00, '2', '1', '2013-08-16 09:58:01'),
(155, '16/08/2013', 'Jeyathas Widthdrawal', 50.00, '2', '1', '2013-08-16 09:58:51'),
(158, '17/08/2013', 'RES08171301', 1500.00, '1', '1', '2013-08-17 07:18:33'),
(159, '19/08/2013', 'Dhileeban Deposited', 12000.00, '1', '1', '2013-08-19 05:40:52'),
(160, '19/08/2013', 'Micro Center Cheque(108791)', 10500.00, '2', '2', '2013-08-19 05:42:11'),
(161, '19/08/2013', 'Purchased Beats Head set', 1900.00, '2', '1', '2013-08-19 11:10:28'),
(162, '19/08/2013', 'Rajeevan Deposited', 400.00, '1', '1', '2013-08-19 11:10:52'),
(164, '21/08/2013', 'RES08211301', 1000.00, '1', '3', '2013-08-21 06:18:27'),
(165, '21/08/2013', 'Dhileeban', 1000.00, '2', '1', '2013-08-22 05:50:58'),
(166, '22/08/2013', 'RES08221301', 1500.00, '1', '1', '2013-08-22 11:25:32'),
(168, '23/08/2013', 'RES08231301', 150.00, '1', '1', '2013-08-23 19:47:14'),
(169, '23/8/2013', 'Rajeevan(Jeyathas & Jalan)', 1500.00, '2', '1', '2013-08-23 19:49:49'),
(170, '23/08/2013', 'Dhileeban', 10000.00, '1', '1', '2013-08-23 19:50:15'),
(171, '23/08/2013', 'Unity PC - Laptop Balance', 10000.00, '2', '1', '2013-08-23 19:50:50'),
(172, '24/08/2013', 'Dhileeban Widthdraw(cash cheque encashed and paid)', 4000.00, '2', '1', '2013-08-24 17:15:14'),
(173, '27/08/2013', 'Micro center (108787)', 15100.00, '2', '2', '2013-08-28 07:59:43'),
(174, '27/08/2013', 'Bank OD Received', 15100.00, '1', '1', '2013-08-28 08:00:13'),
(175, '28/08/2013', 'RES08281301', 2600.00, '1', '1', '2013-08-29 04:12:54'),
(176, '28/08/2013', 'RES08281302', 1000.00, '1', '1', '2013-08-29 04:15:11'),
(177, '27/08/2013', 'Chandra mohan - cheque', 101500.00, '1', '2', '2013-08-30 02:26:44'),
(178, '27/08/2013', 'JMC - cheque', 1700.00, '1', '2', '2013-08-30 02:27:25'),
(179, '30/08/2013', 'chandra mohan - paid ', 14000.00, '1', '1', '2013-08-30 02:28:28'),
(180, '30/08/2013', 'chandra mohan - cheque', 100000.00, '2', '2', '2013-08-30 02:29:02'),
(181, '28/08/2013', 'Bank OD Settled', 15100.00, '2', '1', '2013-08-30 02:30:27'),
(183, '29/08/2013', 'RES08291301', 1500.00, '1', '1', '2013-08-30 04:04:15'),
(184, '29/08/2013', 'RES08291302', 1000.00, '1', '1', '2013-08-30 04:07:19'),
(188, '30/08/2013', 'RES08301301', 1300.00, '1', '1', '2013-08-30 10:07:02'),
(189, '30/08/2013', 'RES08301302', 1500.00, '1', '1', '2013-08-30 10:11:38'),
(190, '30/08/2013', 'RES08301303', 6000.00, '1', '1', '2013-08-30 10:22:50'),
(191, '28/08/2013', 'Rajeevan Deposited - Transport', 1000.00, '1', '1', '2013-08-30 10:24:25'),
(192, '30/08/2013', 'Rajeevan widthdraw', 1000.00, '2', '1', '2013-08-30 10:24:54'),
(193, '30/08/2013', 'Kovil Archanai', 1600.00, '2', '1', '2013-08-31 17:55:51'),
(194, '30/08/2013', 'Chandramohan', 6000.00, '2', '1', '2013-08-31 17:56:42'),
(195, '02/09/2013', 'RES09021301', 1000.00, '1', '1', '2013-09-02 05:14:03'),
(196, '02/09/2013', 'RES09021302', 1000.00, '1', '3', '2013-09-02 07:24:54'),
(197, '03/09/2013', 'Laptop-balance', 12000.00, '1', '1', '2013-09-03 03:53:12'),
(198, '03/09/2013', 'RES09031301', 700.00, '1', '1', '2013-09-03 07:38:30'),
(200, '02/09/1013', 'Lunch', 200.00, '2', '1', '2013-09-03 09:29:59'),
(201, '03/09/2013', 'Lunch', 180.00, '2', '1', '2013-09-03 09:30:42'),
(205, '04/09/2013', 'Petrol', 100.00, '2', '1', '2013-09-04 09:10:37'),
(206, '04/09/2013', 'Lunch', 200.00, '2', '1', '2013-09-04 09:11:04');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
