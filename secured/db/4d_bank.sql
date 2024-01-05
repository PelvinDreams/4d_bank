-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2021 at 03:25 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `4d_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(6) NOT NULL,
  `ewallet` varchar(122) COLLATE utf8_unicode_ci NOT NULL,
  `bwallet` varchar(122) COLLATE utf8_unicode_ci NOT NULL,
  `bname` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `acctname` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `acctno` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `ewallet`, `bwallet`, `bname`, `acctname`, `acctno`, `email`, `password`) VALUES
(1, '999999999999', 'fngrkjgmoenflerkgmkthmtylt', 'first', 'hhjjhkjjkjj', '345678908765', 'admin@yourdomain.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `adminmessage`
--

CREATE TABLE `adminmessage` (
  `id` int(100) NOT NULL,
  `account` int(100) NOT NULL,
  `message` longtext NOT NULL,
  `status` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `msgid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `btc`
--

CREATE TABLE `btc` (
  `id` int(11) NOT NULL,
  `btc` double NOT NULL,
  `usd` double NOT NULL,
  `btctnx` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(45) NOT NULL,
  `tnxid` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `btc`
--

INSERT INTO `btc` (`id`, `btc`, `usd`, `btctnx`, `email`, `status`, `tnxid`, `date`) VALUES
(28, 2.6347808995247384, 50000, 'dfhtrjutkyl', 'demo@scriptsdemo.website', 1, 'tnx5fca453179104', '2020-12-04 14:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `account` int(200) NOT NULL,
  `complain` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `account`, `complain`) VALUES
(2, 'Rathod', 'rathoddilip285@gmail.com', 2147483647, 'Case'),
(3, 'Devine', 'admin@yourdomain.com', 2147483647, 'Testing'),
(4, 'MARK CAGE', 'doryolotewo@gmail.com', 2147483647, ''),
(5, '', '', 0, ''),
(6, 'FASUYI BABATUNDE VICTOR', 'fasuyiwebhost@gmail.com', 2147483647, ''),
(7, 'Pankaj Kumar', 'pankajkumarpgi01@gmail.com', 2147483647, 'Please close my account'),
(8, 'zane grant', 'legrandezane591@gmail.com', 2147483647, 'please can u make me a full account with max funds please of the full working version please i need your help also to make shaw a transfer and deposit goes in please or can u help me get it to work please i need your help mate god bless thank u ');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `id` int(11) NOT NULL,
  `account` int(100) NOT NULL,
  `date` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `amount` int(200) NOT NULL,
  `duration` varchar(200) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `loanid` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` int(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`id`, `account`, `date`, `name`, `amount`, `duration`, `reason`, `loanid`, `email`, `status`) VALUES
(64, 2147483647, '03-17-21', 'Harrison Wilfred', 2147483647, '1week', '', 'M9e19CgRD)', 'weme0125@gmail.com', 0),
(65, 2147483647, '03-17-21', 'Harrison Wilfred', 2147483647, '1week', '', 'c)N89bc7[>', 'weme0125@gmail.com', 0),
(67, 2147483647, '03-26-21', 'Seatbooking', 800000, '1week', 'demo', 'Ns6B|Pbdgf', 'pankajkumarpgi01@gmail.com', 1),
(69, 2147483647, '04-08-21', 'MR ZANE.M.GRANT', 50, '1week', 'world vision', '1gj}A3W)hT', 'admin@yourdomain.com', 1),
(70, 2147483647, '04-08-21', 'zane murray grant', 0, '3months', 'oil mine investments ', '7Ss|DTT{)X', 'admin@yourdomain.com', 1),
(71, 2147483647, '04-08-21', 'Robert Owor', 300, '2weeks', 'pay blls', 'd/8CMhhN3g', 'admin@yourdomain.com', 1),
(72, 2147483647, '04-12-21', '', 0, '3months', '', 'gPjWs)hZcS', 'admin@yourdomain.com', 1),
(73, 2147483647, '04-12-21', 'dtgdsgdfd', 100000, '1year', 'test', '16t]5h)[b5', 'admin@yourdomain.com', 1),
(74, 2147483647, '04-14-21', 'Qudus', 200000, '3months', 'Dope king', '9shetbMNRs', 'admin@yourdomain.com', 1),
(75, 2147483647, '04-25-21', 'Gold Plan', 100000, '2weeks', 'To buy digital camera', 'N(Hese[cdT', 'admin@yourdomain.com', 1),
(76, 2147483647, '04-28-21', 'Zane murray ', 0, '1year', 'investment', 'ur6WVV5jeH', 'admin@yourdomain.com', 1),
(77, 2147483647, '04-28-21', 'Zane murray ', 0, '1year', 'investment', 'eQB0BPMh9g', 'admin@yourdomain.com', 1),
(78, 2147483647, '04-28-21', 'z.grant', 14, '1week', 'investments', 'Hg>ee3d{bG', 'admin@yourdomain.com', 1),
(79, 2147483647, '05-04-21', 'Jante baare', 753465, '1week', 'Deda n', 'BV2AQhjN6N', 'admin@yourdomain.com', 1),
(80, 2147483647, '05-04-21', 'test', 2000, '2weeks', 'Goods', ']jJaH(6rCs', 'admin@yourdomain.com', 1),
(81, 2147483647, '05-04-21', 'Ray', 5000, '1week', 'Pay bill', '1s6763CBr5', 'admin@yourdomain.com', 1),
(82, 2147483647, '05-05-21', 'Ray', 5000, '1week', 'Pay bill', '9NjC/{sMj', 'connorsbruce0@gmail.com', 1),
(83, 2147483647, '05-06-21', 'Bruce connors', 7000, '1week', 'Pay bill', 'DBZXH0VS3(', 'connorsbruce0@gmail.com', 1),
(84, 2147483647, '05-12-21', 'Kazeem Oluwaseyi', 1, '1year', 'rr242r', 'ucdM8heV/Z', 'admin@yourdomain.com', 0),
(85, 2147483647, '05-12-21', 'Test', 100, '1week', 'Test', 'U6WTSrsVJ>', 'admin@yourdomain.com', 0),
(86, 2147483647, '05-15-21', 'Alex', 120000, '1year', '', 'RNsB6T9Sh(', 'davistyler997@gmail.com', 1),
(87, 2147483647, '05-15-21', 'Dima', 12000, '1week', '', 'RsW9sjX}gw', 'davistyler997@gmail.com', 1),
(88, 2147483647, '05-18-21', 'Jeyfreen', 1500, '2 semanas', 'Fiesta', '8h5NGw7sh', 'admin@yourdomain.com', 0),
(89, 2147483647, '05-18-21', 'Daniell Viinika', 15075890, '1year', 'flex', 's{PQtCe(3T', 'danielviinika1@gmail.com', 1),
(90, 2147483647, '05-18-21', '', 5000, '1month', 'ghhghh', '8c1{PwXB7a', 'admin@yourdomain.com', 0),
(91, 2147483647, '05-20-21', 'Ð•Ð½Ð¼ Ð¿Ñ€Ñ€Ð½Ðµ Ñ€Ñ€Ð¾Ð»', 1000, '1 Ð½ÐµÐ´ÐµÐ»Ñ', '0', 'QTH]N8ZgBM', 'admin@yourdomain.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `ua` varchar(255) NOT NULL,
  `tm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `md`
--

CREATE TABLE `md` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `account` varchar(200) NOT NULL,
  `cheque` varchar(200) NOT NULL,
  `cid` varchar(200) NOT NULL,
  `status` int(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md`
--

INSERT INTO `md` (`id`, `email`, `account`, `cheque`, `cid`, `status`, `date`) VALUES
(44, 'admin@yourdomain.com', '9694707078', '', 'G76Y052GSS', 1, '2021-04-06 22:44:39'),
(46, 'admin@yourdomain.com', '9694707078', '', '2G5HHJ9G0Y', 1, '2021-04-08 19:29:19'),
(47, 'admin@yourdomain.com', '9694707078', '', '6JH1HGSH85', 1, '2021-04-08 19:58:36'),
(48, 'admin@yourdomain.com', '9694707078', '3d_Bank Demo.html', 'HJHJJ5HGH9', 1, '2021-04-08 19:59:10'),
(51, 'admin@yourdomain.com', '9694707078', '1.zip', '0HJ2SGJG81', 1, '2021-04-26 19:14:06'),
(52, 'admin@yourdomain.com', '9694707078', '1.zip', 'JSY5HHH0SJ', 1, '2021-04-26 19:14:34'),
(53, 'admin@yourdomain.com', '9694707078', '', 'H76HG9H305', 1, '2021-04-28 08:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `messageadmin`
--

CREATE TABLE `messageadmin` (
  `id` int(100) NOT NULL,
  `account` varchar(100) NOT NULL,
  `message` longtext NOT NULL,
  `reply` longtext NOT NULL,
  `msgid` varchar(199) NOT NULL,
  `status` int(10) NOT NULL,
  `astatus` int(23) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messageadmin`
--

INSERT INTO `messageadmin` (`id`, `account`, `message`, `reply`, `msgid`, `status`, `astatus`, `date`) VALUES
(25, '5773001796', 'need cot code', '', 'S>TtB/Mce9', 0, 1, '2021-05-12 19:43:24'),
(28, '2585037296', 'hello daniel says hi', 'hi, what can we do for you today?', 'ZCNs1d}dj7', 0, 1, '2021-05-18 09:20:41'),
(29, '9694707078', 'Admin how far', 'I de o!', 'dsD(td3Q5c', 0, 1, '2021-08-10 00:18:03');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `email`, `message`) VALUES
(1, 'admin@scriptsdemo.website\r\n', 'No news to display now.');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(200) NOT NULL,
  `sname` varchar(200) NOT NULL,
  `apipr` varchar(200) NOT NULL,
  `apipu` varchar(200) NOT NULL,
  `currency` varchar(200) NOT NULL,
  `branch` varchar(200) NOT NULL,
  `bname` varchar(200) NOT NULL,
  `baddress` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `charges` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sname`, `apipr`, `apipu`, `currency`, `branch`, `bname`, `baddress`, `email`, `phone`, `title`, `logo`, `charges`) VALUES
(2, 'scriptsdemo.website', '', '', '$', '', 'Not A Bank', 'dfrhtfh', 'support@scriptsdemo.website', '+1234567899876', 'Welcome to Not A Bank', 'logofooter.png', '20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `id` int(10) NOT NULL,
  `tx_no` varchar(20) NOT NULL,
  `tx_type` varchar(10) NOT NULL,
  `amount` double NOT NULL,
  `date` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `to_accno` varchar(20) NOT NULL,
  `account` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `comments` varchar(200) NOT NULL,
  `charges` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`id`, `tx_no`, `tx_type`, `amount`, `date`, `description`, `to_accno`, `account`, `status`, `comments`, `charges`) VALUES
(759, '10497536', 'credit', 22, '2021/05/03', '', '', '9694707078', 'SUCCESS', '', 0),
(764, '14869257', 'credit', 2000, '2021/05/04', 'Done', '', '9694707078', 'SUCCESS', 'Done', 0),
(765, '61370428', 'credit', 2000, '2021/05/04', 'good', '', '9694707078', 'SUCCESS', 'good', 0),
(766, '37804691', 'credit', 5000, '2021/05/04', 'CASH DEPOSIT', '', '6433399005', 'SUCCESS', 'CASH DEPOSIT', 0),
(767, '59831406', 'debit', 2000, '2021/05/04', 'debit', '', '6433399005', 'SUCCESS', 'debit', 0),
(768, '76192869', 'debit', 5000, '2021/05/04', '', '44566', '9694707078', 'SUCCESS', 'Bill', 0),
(769, '43768070', 'debit', 1000, '2021/05/04', '', 'Ford bank', '9694707078', 'SUCCESS', 'Bill', 0),
(771, '04007076', 'debit', 1000, '2021/05/04', '', '7543333', '9694707078', 'SUCCESS', 'Bill', 0),
(773, '03429753', 'debit', 5000, '2020/05/09', '', '73736363', '8676396347', 'SUCCESSFUL', 'Bill', 0),
(774, '62536007', 'debit', 5000, '2021/05/05', '', '73736363', '8676396347', 'SUCCESS', 'Bill', 0),
(775, '53077013', 'debit', 5000, '2021/05/05', '', '73736363', '8676396347', 'SUCCESS', 'Bill', 0),
(776, '07487269', 'debit', 1000, '2021/05/05', '', '474747474', '8676396347', 'SUCCESS', 'Bill', 0),
(783, '57104629', 'debit', 3000, '1998/05/06', 'test test', '', '5773001796', 'SUCCESS', 'test test', 0),
(784, '92601857', 'credit', 5000, '2021/05/06', 'loan payment', '', '8676396347', 'success', 'loan payment', 0),
(785, '10529478', 'credit', 7000, '2021/05/06', 'loan payment', '', '8676396347', 'success', 'loan payment', 0),
(787, '30006889', 'debit', 7000, '2021/05/06', '', '8484433', '8675306275', 'SUCCESS', 'Project funds', 0),
(788, '87170205', 'debit', 1000, '2021/05/06', '', 'Fff', '9694707078', 'SUCCESS', 'Fff', 0),
(789, '43066155', 'debit', 20000, '2021/05/07', '', '653365433', '9694707078', 'SUCCESS', 'Gift', 0),
(796, '70170378', 'debit', 300, '2021/05/11', '', '', '8778897225', 'SUCCESS', '', 60),
(797, '73083156', 'debit', 1000, '2021/05/11', '', 'jkhjgfdfghjlk gjhkl', '8778897225', 'SUCCESS', 'jhgfghj jkl', 0),
(798, '72938050', 'debit', 1000, '2021/05/12', '', '', '5773001796', 'SUCCESS', 'weweer', 0),
(799, '20133587', 'debit', 1000, '2021/05/12', '', '2067734885', '9694707078', 'SUCCESS', 'Money for medical', 0),
(800, '43932092', 'debit', 5022, '2021/05/13', '', '777777555', '9694707078', 'SUCCESS', 'wdwd', 0),
(801, '03067020', 'debit', 1000, '2021/05/13', '', '1234567', '9694707078', 'SUCCESS', 'pot', 0),
(803, '50964057', 'debit', 184000, '2021/05/15', '', 'ererwr', '5773001796', 'SUCCESS', 'rwerwr', 0),
(804, '05467770', 'debit', 8798, '2021/05/15', '', 'jkgjkgk', '9694707078', 'SUCCESS', 'fafa', 0),
(805, '07496851', 'credit', 2000, '2021/05/15', 'topup', '', '9694707078', 'SUCCESS', 'topup', 0),
(806, '96347081', 'credit', 8000, '2021/05/15', '2nd refund', '', '9694707078', 'SUCCESS', '2nd refund', 0),
(807, '08607489', 'debit', 3000, '2021/05/16', '', '76543456789', '9694707078', 'SUCCESS', 'kjgfv bi uguo', 0),
(808, '88800730', 'debit', 50, '2021/05/16', '', '304164967313', '9694707078', 'SUCCESS', 'Testing', 0),
(809, '03334952', 'debit', 2000, '2021/05/17', '', '3322234424', '9694707078', 'SUCCESS', 'vvvvvvv', 0),
(810, '43075968', 'credit', 1500, '2021/05/18', 'Cheque Deposit', '', '9694707078', 'success', 'Cheque', 0),
(819, '00906756', 'debit', 5000, '2021/05/18', '', '4444', '1878230073', 'SUCCESS', 'EEE', 0),
(821, '76097002', 'debit', 5000, '2021/05/20', '', '34567890', '9694707078', 'SUCCESS', '', 1000),
(822, '91926709', 'debit', 5000, '2021/05/21', '', 'th6tyh', '9694707078', 'SUCCESS', 'rey56yu6', 1000),
(826, '15976003', 'debit', 10000, '2021/05/26', '', 'sdxtg', '9694707078', 'SUCCESS', 'ctyugxrtyfug tyfugui ', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(10) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `is_mobile` tinyint(4) NOT NULL,
  `mobile_hash` text NOT NULL,
  `utype` varchar(10) NOT NULL,
  `pics` varchar(200) NOT NULL,
  `bdate` varchar(100) NOT NULL,
  `acctno` double NOT NULL,
  `active` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `pin` int(20) NOT NULL,
  `session` tinyint(4) NOT NULL,
  `balance` double NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zipcode` varchar(100) NOT NULL,
  `notification` tinyint(4) NOT NULL,
  `nbalance` double NOT NULL,
  `inbalance` double NOT NULL,
  `bname` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `ipn` int(100) NOT NULL,
  `imf` int(100) NOT NULL,
  `cot` int(100) NOT NULL,
  `ssn` varchar(100) NOT NULL,
  `rtn` varchar(200) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `acone` tinyint(4) NOT NULL,
  `actwo` tinyint(4) NOT NULL,
  `acthree` tinyint(4) NOT NULL,
  `rdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `otp_hash` varchar(100) NOT NULL,
  `card` varchar(200) NOT NULL,
  `cardt` varchar(200) NOT NULL,
  `month` int(200) NOT NULL,
  `csv` int(100) NOT NULL,
  `carddate` timestamp NOT NULL DEFAULT current_timestamp(),
  `sstatus` int(11) NOT NULL,
  `yr` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `fname`, `lname`, `pwd`, `email`, `phone`, `gender`, `is_mobile`, `mobile_hash`, `utype`, `pics`, `bdate`, `acctno`, `active`, `status`, `pin`, `session`, `balance`, `address`, `city`, `state`, `zipcode`, `notification`, `nbalance`, `inbalance`, `bname`, `country`, `ipn`, `imf`, `cot`, `ssn`, `rtn`, `ip`, `acone`, `actwo`, `acthree`, `rdate`, `otp_hash`, `card`, `cardt`, `month`, `csv`, `carddate`, `sstatus`, `yr`) VALUES
(266, 'Trial', 'Account', '12345678', 'admin@yourdomain.com', '07060678899', 'Male', 0, '', 'Savings Ac', 'white.png', '08-17-1998', 9694707078, 1, 1, 1111, 0, 14184800.45, '234 street, saint louis street', 'lagos', 'lagos', '234', 0, 0, 0, 'Bank Name', 'Nigeria', 858, 3298, 1760, '2355d34r', '34543466544', '', 1, 0, 0, '2021-01-04 13:55:59', ' ', '4984337579600628', 'Debit Master Card', 12, 7094, '2021-01-04 13:55:59', 1, 24);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_main`
--

CREATE TABLE `ticket_main` (
  `id` int(11) NOT NULL,
  `tid` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `btext` blob DEFAULT NULL,
  `tm` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_reply`
--

CREATE TABLE `ticket_reply` (
  `id` int(11) NOT NULL,
  `tid` varchar(255) NOT NULL,
  `btext` blob DEFAULT NULL,
  `tm` varchar(255) NOT NULL,
  `typ` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminmessage`
--
ALTER TABLE `adminmessage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `btc`
--
ALTER TABLE `btc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `md`
--
ALTER TABLE `md`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messageadmin`
--
ALTER TABLE `messageadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_main`
--
ALTER TABLE `ticket_main`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_reply`
--
ALTER TABLE `ticket_reply`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adminmessage`
--
ALTER TABLE `adminmessage`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `btc`
--
ALTER TABLE `btc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `md`
--
ALTER TABLE `md`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `messageadmin`
--
ALTER TABLE `messageadmin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=827;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=382;

--
-- AUTO_INCREMENT for table `ticket_main`
--
ALTER TABLE `ticket_main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_reply`
--
ALTER TABLE `ticket_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
