-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 29, 2017 at 01:57 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `opcs`
--
CREATE DATABASE IF NOT EXISTS `opcs` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `opcs`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adon`
--

CREATE TABLE IF NOT EXISTS `tbl_adon` (
  `adonID` int(11) NOT NULL AUTO_INCREMENT,
  `addOn_name` text,
  `a_images` text,
  `addOn_price` float DEFAULT NULL,
  `addOn_stat` varchar(50) DEFAULT NULL,
  `addOn_catID` int(11) DEFAULT NULL,
  PRIMARY KEY (`adonID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catererclient`
--

CREATE TABLE IF NOT EXISTS `tbl_catererclient` (
  `cc_id` int(11) NOT NULL AUTO_INCREMENT,
  `cater_id` int(11) DEFAULT NULL,
  `client_Id` int(11) DEFAULT NULL,
  `clientCount` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`cc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catererinfo`
--

CREATE TABLE IF NOT EXISTS `tbl_catererinfo` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(70) DEFAULT NULL,
  `c_contact` varchar(50) DEFAULT NULL,
  `c_email` varchar(50) DEFAULT NULL,
  `c_owner` varchar(25) DEFAULT NULL,
  `c_address` varchar(150) DEFAULT NULL,
  `c_status` varchar(20) DEFAULT NULL,
  `c_registration` int(11) DEFAULT NULL,
  `c_services` int(11) DEFAULT NULL,
  `c_avatar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `tbl_catererinfo`
--

INSERT INTO `tbl_catererinfo` (`cid`, `c_name`, `c_contact`, `c_email`, `c_owner`, `c_address`, `c_status`, `c_registration`, `c_services`, `c_avatar`) VALUES
(29, 'Spoon and Fork Catering Services', 'Mobile: 09369420867 / Tel no: 532-7771', 'ncabral@gmail.com', 'Nico Cabral', 'Real St. Tacloban City', 'Register', 29, NULL, 'avatar/b1.jpg'),
(30, 'Juan Catering Services', '09123456789', 'juan@gmail.com', 'Juan Delacruz', 'Paterno St. Tacloban City', 'Register', 30, NULL, 'avatar/a1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catererregistration`
--

CREATE TABLE IF NOT EXISTS `tbl_catererregistration` (
  `c_reg` int(11) NOT NULL AUTO_INCREMENT,
  `c_cid` int(11) DEFAULT NULL,
  `c_regDate` date NOT NULL,
  `c_regStat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`c_reg`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `tbl_catererregistration`
--

INSERT INTO `tbl_catererregistration` (`c_reg`, `c_cid`, `c_regDate`, `c_regStat`) VALUES
(29, 29, '2017-01-20', 'Available'),
(30, 30, '2017-01-06', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catererservices`
--

CREATE TABLE IF NOT EXISTS `tbl_catererservices` (
  `cs_id` int(11) NOT NULL AUTO_INCREMENT,
  `myid` int(11) DEFAULT NULL,
  `c_packno` varchar(50) DEFAULT NULL,
  `c_servicesLocid` int(11) DEFAULT NULL,
  `c_serviceRating` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=114 ;

--
-- Dumping data for table `tbl_catererservices`
--

INSERT INTO `tbl_catererservices` (`cs_id`, `myid`, `c_packno`, `c_servicesLocid`, `c_serviceRating`) VALUES
(84, 29, NULL, 25, NULL),
(91, 29, NULL, 26, NULL),
(92, 29, NULL, 32, NULL),
(93, 30, NULL, 32, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE IF NOT EXISTS `tbl_city` (
  `cityid` int(11) NOT NULL AUTO_INCREMENT,
  `cityname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cityid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`cityid`, `cityname`) VALUES
(1, 'Abuyog'),
(2, 'Biliran'),
(3, 'Dist 1'),
(4, 'Dist 2'),
(5, 'Ormoc'),
(6, 'Eastern Samar'),
(8, 'Northern Samar'),
(9, 'Western Samar'),
(10, 'Southern Samar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cleints`
--

CREATE TABLE IF NOT EXISTS `tbl_cleints` (
  `cleintId` int(11) NOT NULL AUTO_INCREMENT,
  `clientname` varchar(70) DEFAULT NULL,
  `clientaddress` varchar(100) DEFAULT NULL,
  `c_townaddress` varchar(100) DEFAULT NULL,
  `client_contact` varchar(25) DEFAULT NULL,
  `cleintEmail` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cleintId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customereservation`
--

CREATE TABLE IF NOT EXISTS `tbl_customereservation` (
  `cusres_id` int(11) NOT NULL AUTO_INCREMENT,
  `res_price` float DEFAULT NULL,
  `eventname` varchar(150) DEFAULT NULL,
  `people_covered` int(11) DEFAULT NULL,
  `total_res` float DEFAULT NULL,
  `res_name` varchar(150) DEFAULT NULL,
  `re_contact` varchar(150) DEFAULT NULL,
  `res_email` varchar(150) DEFAULT NULL,
  `res_address` text,
  `res_date` varchar(25) DEFAULT NULL,
  `res_time` varchar(150) DEFAULT NULL,
  `res_message` text,
  `res_mycatid` int(11) DEFAULT NULL,
  `res_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cusres_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_foodcovered`
--

CREATE TABLE IF NOT EXISTS `tbl_foodcovered` (
  `foodID` int(11) NOT NULL AUTO_INCREMENT,
  `s_foid` int(11) DEFAULT NULL,
  `f_catid` int(11) DEFAULT NULL,
  `foodcovered` text,
  `fstat` varchar(100) DEFAULT NULL,
  `fpackageno` int(11) DEFAULT NULL,
  `fpackageprice` float DEFAULT NULL,
  PRIMARY KEY (`foodID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=167 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_foodoffered`
--

CREATE TABLE IF NOT EXISTS `tbl_foodoffered` (
  `fo_id` int(11) NOT NULL AUTO_INCREMENT,
  `food_offered` varchar(200) DEFAULT NULL,
  `food_category` varchar(200) DEFAULT NULL,
  `mycaterer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`fo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE IF NOT EXISTS `tbl_message` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `m_from` varchar(100) DEFAULT NULL,
  `m_email` varchar(50) DEFAULT NULL,
  `m_ownername` varchar(50) DEFAULT NULL,
  `m_content` text,
  `m_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `m_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ocasioncat`
--

CREATE TABLE IF NOT EXISTS `tbl_ocasioncat` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `ocassion_name` varchar(100) DEFAULT NULL,
  `description` text,
  `status` varchar(50) DEFAULT NULL,
  `mycid` int(11) DEFAULT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `tbl_ocasioncat`
--

INSERT INTO `tbl_ocasioncat` (`oid`, `ocassion_name`, `description`, `status`, `mycid`) VALUES
(38, 'Birthday Service Packages', 'Celebrate your birthday or debut with out catering services', 'Available', 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE IF NOT EXISTS `tbl_orders` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `catererid` int(11) DEFAULT NULL,
  `order_name` varchar(200) DEFAULT NULL,
  `order_price` varchar(50) DEFAULT NULL,
  `order_qty` int(11) DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `customer_contact` varchar(50) DEFAULT NULL,
  `customer_address` text,
  `customer_message` text,
  `order_date` varchar(20) DEFAULT NULL,
  `order_payment` varchar(100) DEFAULT NULL,
  `order_status` varchar(100) DEFAULT NULL,
  `order_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_payment` (
  `paymentid` int(11) NOT NULL AUTO_INCREMENT,
  `res_id` int(11) DEFAULT NULL,
  `payeename` varchar(100) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `paymentstatus` varchar(100) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`paymentid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pgallery`
--

CREATE TABLE IF NOT EXISTS `tbl_pgallery` (
  `photoid` int(11) NOT NULL AUTO_INCREMENT,
  `c_caterid` int(11) DEFAULT NULL,
  `p_location` text,
  `p_title` text,
  `p_des` text,
  `date_upload` date DEFAULT NULL,
  `p_cat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`photoid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `tbl_pgallery`
--

INSERT INTO `tbl_pgallery` (`photoid`, `c_caterid`, `p_location`, `p_title`, `p_des`, `date_upload`, `p_cat`) VALUES
(26, 29, 'upload/p2.jpg', '', '', '2017-01-29', 'Foods'),
(27, 29, 'upload/p3.jpg', '', '', '2017-01-29', 'Foods'),
(28, 29, 'upload/p4.jpg', '', '', '2017-01-29', 'Foods'),
(29, 29, 'upload/p5.jpg', '', '', '2017-01-29', 'Foods'),
(30, 29, 'upload/p6.jpg', '', '', '2017-01-29', 'Foods');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_price`
--

CREATE TABLE IF NOT EXISTS `tbl_price` (
  `priceid` int(11) NOT NULL AUTO_INCREMENT,
  `p_price` float DEFAULT NULL,
  `mycat_id` int(11) DEFAULT NULL,
  `des` int(11) NOT NULL,
  `minimum` int(11) DEFAULT NULL,
  PRIMARY KEY (`priceid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_regpayment`
--

CREATE TABLE IF NOT EXISTS `tbl_regpayment` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `c-id` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_regpayment`
--

INSERT INTO `tbl_regpayment` (`pid`, `c-id`, `amount`, `date`, `status`) VALUES
(2, 16, 500, '2016-12-08', 'Paid'),
(3, 18, 500, '2016-12-01', 'Paid'),
(4, 19, 500, '2016-12-09', 'Paid'),
(5, 20, 500, '2016-12-05', 'Paid'),
(6, 21, 500, '2016-11-25', 'Paid'),
(7, 22, 500, '2016-11-17', 'Paid'),
(8, 23, 500, '2016-11-14', 'Paid'),
(9, 24, 500, '2016-11-21', 'Paid'),
(10, 24, 500, '2016-12-12', 'Paid'),
(11, 24, 500, '2016-12-12', 'Paid'),
(12, 25, 500, '2016-12-12', 'Paid'),
(13, 25, 500, '2016-12-12', 'Paid'),
(14, 26, 500, '2016-12-13', 'Paid'),
(15, 25, 500, '2016-12-13', 'Paid'),
(16, 27, 500, '2016-12-13', 'Paid'),
(17, 28, 500, '2017-01-01', 'Paid'),
(18, 26, 500, '2016-12-14', 'Paid'),
(19, 29, 500, '2017-01-20', 'Paid'),
(20, 29, 500, '2017-01-20', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservation`
--

CREATE TABLE IF NOT EXISTS `tbl_reservation` (
  `reservationid` int(11) NOT NULL AUTO_INCREMENT,
  `catererid` int(11) DEFAULT NULL,
  `clientname` text,
  `month` int(11) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `address` text,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `res_status` varchar(50) NOT NULL,
  `message` text,
  `servicepackno` int(11) DEFAULT NULL,
  `food_packno` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `ocasion_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`reservationid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resfoodordered`
--

CREATE TABLE IF NOT EXISTS `tbl_resfoodordered` (
  `rfo_id` int(11) NOT NULL AUTO_INCREMENT,
  `custom_resid` int(11) DEFAULT NULL,
  `foodordered` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`rfo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_servicescovered`
--

CREATE TABLE IF NOT EXISTS `tbl_servicescovered` (
  `serviceID` int(11) NOT NULL AUTO_INCREMENT,
  `s_oid` int(11) DEFAULT NULL,
  `catererid` int(11) DEFAULT NULL,
  `covered` text,
  `packageno` int(11) DEFAULT NULL,
  `packageprice` float DEFAULT NULL,
  PRIMARY KEY (`serviceID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=157 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_townloc`
--

CREATE TABLE IF NOT EXISTS `tbl_townloc` (
  `townid` int(11) NOT NULL AUTO_INCREMENT,
  `cityid` int(11) DEFAULT NULL,
  `town` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`townid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=144 ;

--
-- Dumping data for table `tbl_townloc`
--

INSERT INTO `tbl_townloc` (`townid`, `cityid`, `town`) VALUES
(1, 1, 'Bato'),
(2, 1, 'Baybay'),
(3, 1, 'Hilongos'),
(4, 1, 'Hindang'),
(5, 1, 'Inopacan'),
(6, 1, 'Javier'),
(7, 1, 'La paz'),
(8, 1, 'MacArthur'),
(9, 1, 'Mahaplag'),
(10, 1, 'Matalom'),
(11, 1, 'Mayorga'),
(12, 2, 'Almeria'),
(13, 2, 'Biliran'),
(14, 2, 'Cabucgayan'),
(15, 2, 'Caibiran'),
(16, 2, 'Culaba'),
(17, 2, 'Kawayan'),
(18, 2, 'Maripipi'),
(19, 2, 'Naval'),
(20, 3, 'Alang-alang'),
(21, 3, 'Babatngon'),
(22, 3, 'Palo'),
(23, 3, 'San Miguel'),
(24, 3, 'Sta.Fe'),
(25, 3, 'Tacloban'),
(26, 3, 'Tanuan'),
(27, 3, 'Tolosa'),
(28, 4, 'Barugo'),
(29, 4, 'Burauen'),
(30, 4, 'Capoocan'),
(31, 4, 'Carigara'),
(32, 4, 'Dagami'),
(33, 4, 'Dulag'),
(34, 4, 'Jaro'),
(35, 4, 'Julita'),
(36, 4, 'Pastrana'),
(37, 4, 'Tabon-tabon'),
(38, 4, 'Tunga'),
(39, 5, 'Albuera'),
(40, 5, 'Ormoc'),
(41, 5, 'Kananga'),
(42, 5, 'Tabango'),
(43, 5, 'Matagob'),
(44, 5, 'Merida'),
(45, 5, 'Isabel'),
(46, 5, 'Palompon'),
(47, 5, 'Villaba'),
(48, 5, 'Calubian'),
(49, 5, 'Leyte, leyte'),
(50, 5, 'San Isidro'),
(51, 8, 'Allen'),
(52, 8, 'Biri'),
(53, 8, 'Bobon'),
(54, 8, 'Capul'),
(55, 8, 'Catarman'),
(56, 8, 'Catubig'),
(57, 8, 'Gamay'),
(58, 8, 'Las Navas'),
(59, 8, 'Laoang'),
(60, 8, 'Lapineg'),
(61, 8, 'Lavezares'),
(62, 8, 'Lope De Vega'),
(63, 8, 'Mapanas'),
(64, 8, 'Mondragon'),
(65, 8, 'Palapag'),
(66, 8, 'Pambujan'),
(67, 8, 'Rosario'),
(68, 8, 'San Antonio'),
(69, 8, 'San Isidro'),
(70, 8, 'San Jose'),
(71, 8, 'San Roque'),
(72, 8, 'San Vicente'),
(73, 8, 'Silvin Lubos'),
(74, 8, 'Victoria'),
(75, 9, 'Almaqro'),
(76, 9, 'Basey'),
(77, 9, 'Calbayog City'),
(79, 9, 'Calbiga'),
(80, 9, 'Catbalogan'),
(81, 9, 'Daram'),
(82, 9, 'Gandara'),
(83, 9, 'Hinbangan'),
(84, 9, 'Jiabong'),
(85, 9, 'Marabut'),
(86, 9, 'Motiong'),
(87, 9, 'Paranas'),
(88, 9, 'Pagsanjan'),
(89, 9, 'Panibacdao'),
(90, 9, 'San Jorge'),
(91, 9, 'San Jose De Bauan'),
(92, 9, 'San Sebastian'),
(93, 9, 'Sta. Margarita'),
(94, 9, 'Sta. Rita'),
(95, 9, 'Sto. Nino'),
(96, 9, 'Tagapulan'),
(97, 9, 'Talalora'),
(98, 9, 'Tarangan'),
(99, 9, 'Villareal'),
(100, 9, 'Wright (Paranas)'),
(101, 9, 'Zumarraga'),
(102, 6, 'Arteche'),
(103, 6, 'Balangiga'),
(104, 6, 'Balangkayan'),
(105, 6, 'Borongan'),
(106, 6, 'Can - Avid'),
(107, 6, 'Dolores'),
(108, 6, 'Gen. McArhur'),
(109, 6, 'Giporlos'),
(110, 6, 'Guiuan'),
(111, 6, 'Hernani'),
(112, 6, 'Jipapad'),
(113, 6, 'Lawa - an'),
(114, 6, 'Liorente'),
(115, 6, 'Maslog'),
(116, 6, 'Maydolong'),
(117, 6, 'Mercedes'),
(118, 6, 'Oras'),
(119, 6, 'Quinapundan'),
(120, 6, 'Salcedo'),
(121, 6, 'San Julian'),
(122, 6, 'San Plicarpio'),
(123, 6, 'Sulat'),
(124, 6, 'Taft'),
(125, 10, 'Anahawan'),
(126, 10, 'Bomtoc'),
(127, 10, 'Hinunangan'),
(128, 10, 'Hinundayan'),
(129, 10, 'Libagon'),
(130, 10, 'Liloan'),
(131, 10, 'Maasin'),
(132, 10, 'Macrobon'),
(133, 10, 'Malitbog'),
(134, 10, 'Padre Burgos'),
(135, 10, 'Pintuyan'),
(136, 10, 'San Francisco'),
(137, 10, 'San Juan (Cabalian)'),
(138, 10, 'San Ricardo'),
(139, 10, 'Silago'),
(141, 10, 'St. Bernard'),
(142, 10, 'Tomas Oppus'),
(143, 10, 'Sogod');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usernameandpassword`
--

CREATE TABLE IF NOT EXISTS `tbl_usernameandpassword` (
  `uandpid` int(11) NOT NULL AUTO_INCREMENT,
  `catID` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`uandpid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_usernameandpassword`
--

INSERT INTO `tbl_usernameandpassword` (`uandpid`, `catID`, `username`, `password`) VALUES
(2, 29, 'nicocabral', 'adminnico'),
(4, 30, 'juan@gmail.com', 'tl97qjbx');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wtnadmin`
--

CREATE TABLE IF NOT EXISTS `tbl_wtnadmin` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_name` varchar(20) DEFAULT NULL,
  `account_email` varchar(50) DEFAULT NULL,
  `b_day` int(11) DEFAULT NULL,
  `b_month` varchar(20) DEFAULT NULL,
  `b_year` int(11) DEFAULT NULL,
  `contact` varchar(25) DEFAULT NULL,
  `account_username` varchar(50) DEFAULT NULL,
  `account_password` varchar(25) DEFAULT NULL,
  `account_type` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `tbl_wtnadmin`
--

INSERT INTO `tbl_wtnadmin` (`account_id`, `account_name`, `account_email`, `b_day`, `b_month`, `b_year`, `contact`, `account_username`, `account_password`, `account_type`) VALUES
(15, 'Nico Cabral', 'ncabral010694@gmail.com', 6, 'Jan', 1994, '09369420867', 'nicocabral', 'nicocabral', 'admin'),
(32, 'Kristine Aura Anacta', 'k@gmail.com', 17, 'Jan', 1993, '09123445556', 'kristine', 'adminkristine', 'admin'),
(38, 'Wes Dimaculangan', 'wes@gmail.com', 1, 'June', 1995, '09267778787', 'wes12345', '1234567890', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wtnadminavatar`
--

CREATE TABLE IF NOT EXISTS `tbl_wtnadminavatar` (
  `avatar_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) DEFAULT NULL,
  `account_avatar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`avatar_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_wtnadminavatar`
--

INSERT INTO `tbl_wtnadminavatar` (`avatar_id`, `account_id`, `account_avatar`) VALUES
(3, 15, 'avatar/avatar5.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
