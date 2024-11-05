-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 05, 2024 at 08:14 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_designmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL auto_increment,
  `admin_name` varchar(20) NOT NULL,
  `admin_contact` varchar(10) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_password` varchar(10) NOT NULL,
  PRIMARY KEY  (`admin_id`),
  UNIQUE KEY `admin_name` (`admin_name`,`admin_contact`,`admin_email`,`admin_password`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_contact`, `admin_email`, `admin_password`) VALUES
(1, 'Ananya Sunil', '8590636564', 'ananyasunil@gmail.com', '1000'),
(2, 'Busthana Sakeer', '9746659305', 'busthanasakeer@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL auto_increment,
  `customer_id` int(11) NOT NULL,
  `booking_status` int(11) default '0',
  `booking_amount` varchar(50) NOT NULL,
  `booking_date` varchar(50) NOT NULL,
  `shop_id` int(11) NOT NULL,
  PRIMARY KEY  (`booking_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `customer_id`, `booking_status`, `booking_amount`, `booking_date`, `shop_id`) VALUES
(5, 1, 1, '5000.00', '2024-11-02', 0),
(6, 1, 0, '', '2024-11-02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buydesign`
--

CREATE TABLE `tbl_buydesign` (
  `buydesign_id` int(10) NOT NULL auto_increment,
  `shop_id` int(10) NOT NULL,
  `design_id` int(30) NOT NULL,
  `buydesign_date` date NOT NULL,
  PRIMARY KEY  (`buydesign_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_buydesign`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(10) NOT NULL auto_increment,
  `product_id` int(10) NOT NULL,
  `cart_quantity` int(20) NOT NULL,
  `cart_total` int(30) NOT NULL,
  `cart_deliverylocation` varchar(50) NOT NULL,
  `cart_status` varchar(200) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `design_id` int(11) NOT NULL,
  PRIMARY KEY  (`cart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `product_id`, `cart_quantity`, `cart_total`, `cart_deliverylocation`, `cart_status`, `booking_id`, `design_id`) VALUES
(5, 2, 0, 0, '', '1', 5, 0),
(6, 2, 0, 0, '', '', 6, 0),
(7, 5, 0, 0, '', '', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `comment_duedate` int(11) NOT NULL,
  `comment_design` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `design_id` int(11) NOT NULL,
  `shop_id` int(10) NOT NULL,
  `comment_ratingvalue` varchar(255) NOT NULL,
  PRIMARY KEY  (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_comment`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL auto_increment,
  `complaint_date` date NOT NULL,
  `complainttype_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `complaint_reply` varchar(100) NOT NULL,
  `complaint_status` int(100) NOT NULL default '0',
  `booking_id` int(11) NOT NULL,
  `complaint_content` varchar(100) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `designer_id` int(11) NOT NULL,
  PRIMARY KEY  (`complaint_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_complaint`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_complainttype`
--

CREATE TABLE `tbl_complainttype` (
  `complainttype_id` int(11) NOT NULL auto_increment,
  `complainttype_name` varchar(100) NOT NULL,
  PRIMARY KEY  (`complainttype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_complainttype`
--

INSERT INTO `tbl_complainttype` (`complainttype_id`, `complainttype_name`) VALUES
(1, 'Size issue'),
(3, 'Product change'),
(4, 'Colour fade'),
(5, 'Product damage'),
(6, 'Product damage');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(10) NOT NULL auto_increment,
  `customer_name` varchar(50) NOT NULL,
  `customer_gender` varchar(10) NOT NULL,
  `customer_contact` varchar(12) NOT NULL,
  `customer_email` varchar(30) NOT NULL,
  `customer_photo` varchar(200) NOT NULL,
  `customer_proof` varchar(150) NOT NULL,
  `place_id` int(10) NOT NULL,
  `customer_password` varchar(30) NOT NULL,
  PRIMARY KEY  (`customer_id`),
  UNIQUE KEY `customer_name` (`customer_name`,`customer_gender`,`customer_contact`,`customer_email`,`customer_photo`,`customer_proof`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_gender`, `customer_contact`, `customer_email`, `customer_photo`, `customer_proof`, `place_id`, `customer_password`) VALUES
(1, 'Kevin Wilson', 'male', '9876543201', 'kevinwilson@gmail.com', 'Kevin Wilson.jfif', 'Kevin Wilson.jfif', 3, '33333');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_design`
--

CREATE TABLE `tbl_design` (
  `design_id` int(10) NOT NULL auto_increment,
  `design_name` varchar(50) NOT NULL,
  `design_details` varchar(500) NOT NULL,
  `design_photo` varchar(200) NOT NULL,
  `design_rate` varchar(200) NOT NULL,
  `designer_id` int(10) NOT NULL,
  `designtype_id` int(10) NOT NULL,
  PRIMARY KEY  (`design_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_design`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_designcategory`
--

CREATE TABLE `tbl_designcategory` (
  `designcategory_id` int(11) NOT NULL auto_increment,
  `designcategory_name` varchar(30) NOT NULL,
  PRIMARY KEY  (`designcategory_id`),
  UNIQUE KEY `designcategory_name` (`designcategory_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_designcategory`
--

INSERT INTO `tbl_designcategory` (`designcategory_id`, `designcategory_name`) VALUES
(9, 'Anarkali'),
(13, 'Chaniya choli'),
(10, 'Ghagra choli'),
(5, 'Gown'),
(7, 'Kurta'),
(11, 'Lehanga choli'),
(6, 'Salwar Kameez'),
(1, 'Sarees'),
(12, 'Sharara suit'),
(8, 'Sherwani');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_designer`
--

CREATE TABLE `tbl_designer` (
  `designer_id` int(10) NOT NULL auto_increment,
  `designer_name` varchar(50) NOT NULL,
  `designer_gender` varchar(20) NOT NULL,
  `designer_contact` varchar(12) NOT NULL,
  `designer_email` varchar(30) NOT NULL,
  `designer_photo` varchar(200) NOT NULL,
  `designer_proof` varchar(150) NOT NULL,
  `place_id` int(10) NOT NULL,
  `designer_password` varchar(20) NOT NULL,
  `designer_status` int(200) NOT NULL default '0',
  PRIMARY KEY  (`designer_id`),
  UNIQUE KEY `designer_name` (`designer_name`,`designer_gender`,`designer_contact`,`designer_email`,`designer_photo`,`designer_proof`,`designer_password`,`designer_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_designer`
--

INSERT INTO `tbl_designer` (`designer_id`, `designer_name`, `designer_gender`, `designer_contact`, `designer_email`, `designer_photo`, `designer_proof`, `place_id`, `designer_password`, `designer_status`) VALUES
(1, 'Rithu Xavier', 'female', '9987657854', 'rithu@gmail.com', 'Rithu Xavier.jfif', 'Rithu Xavier.jfif', 2, '121212', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_designtype`
--

CREATE TABLE `tbl_designtype` (
  `designtype_id` int(10) NOT NULL auto_increment,
  `designtype_name` varchar(50) NOT NULL,
  `designcategory_id` int(11) NOT NULL,
  PRIMARY KEY  (`designtype_id`),
  UNIQUE KEY `designtype_name` (`designtype_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_designtype`
--

INSERT INTO `tbl_designtype` (`designtype_id`, `designtype_name`, `designcategory_id`) VALUES
(1, 'Silk', 9),
(2, 'Georgette', 9),
(3, 'Net', 9),
(4, 'Crepe', 6),
(5, 'Cotton', 6),
(6, 'Sattin silk', 1),
(7, 'Lycra', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(10) NOT NULL auto_increment,
  `district_name` varchar(30) NOT NULL,
  PRIMARY KEY  (`district_id`),
  UNIQUE KEY `district_name` (`district_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(2, 'Ernakulam'),
(1, 'Idukki'),
(5, 'Kollam'),
(6, 'Palakkad'),
(4, 'Trivandrum'),
(3, 'Wayanad');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_date` date NOT NULL,
  `feedback_content` varchar(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `feedback_id` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`feedback_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_date`, `feedback_content`, `customer_id`, `shop_id`, `feedback_id`) VALUES
('0000-00-00', 'Good', 0, 0, 1),
('0000-00-00', 'Excellent', 0, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(10) NOT NULL auto_increment,
  `place_name` varchar(50) NOT NULL,
  `place_pincode` int(6) NOT NULL,
  `district_id` int(10) NOT NULL,
  PRIMARY KEY  (`place_id`),
  UNIQUE KEY `place_name` (`place_name`),
  UNIQUE KEY `place_pincode` (`place_pincode`,`district_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `place_pincode`, `district_id`) VALUES
(1, 'Muvattupuzha', 686661, 2),
(2, 'Thodupuzha', 685583, 1),
(3, 'Sulthanbatheri', 673591, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL auto_increment,
  `product_name` varchar(11) NOT NULL,
  `product_prize` int(11) NOT NULL,
  `product_image` varchar(11) NOT NULL,
  `product_details` varchar(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `producttype_id` int(10) NOT NULL,
  PRIMARY KEY  (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_prize`, `product_image`, `product_details`, `shop_id`, `producttype_id`) VALUES
(2, 'Kaira', 5000, 'gown.jpg', 'Soft silk m', 1, 14),
(5, 'Sarees coll', 10000, 'Saree.jpg', 'Kanjeepuram', 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productcategory`
--

CREATE TABLE `tbl_productcategory` (
  `productcategory_id` int(10) NOT NULL auto_increment,
  `productcategory_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`productcategory_id`),
  UNIQUE KEY `productcategory_name` (`productcategory_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_productcategory`
--

INSERT INTO `tbl_productcategory` (`productcategory_id`, `productcategory_name`) VALUES
(1, 'Gents'),
(4, 'Ladies');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_producttype`
--

CREATE TABLE `tbl_producttype` (
  `producttype_id` int(10) NOT NULL auto_increment,
  `producttype_name` varchar(50) NOT NULL,
  `productcategory_id` int(30) NOT NULL,
  PRIMARY KEY  (`producttype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_producttype`
--

INSERT INTO `tbl_producttype` (`producttype_id`, `producttype_name`, `productcategory_id`) VALUES
(1, 'Salwar kameez', 1),
(2, 'Sarees', 2),
(9, 'Kurta', 1),
(10, 'Sharara suit', 1),
(11, 'Sarees', 4),
(13, 'Lehanga choli', 4),
(14, 'Gown', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `rating_id` int(11) NOT NULL auto_increment,
  `customer_id` int(11) NOT NULL,
  `rating_value` int(11) NOT NULL,
  `rating_content` varchar(500) NOT NULL,
  `rating_datetime` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `designer_id` int(11) NOT NULL,
  PRIMARY KEY  (`rating_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_rating`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_shop`
--

CREATE TABLE `tbl_shop` (
  `shop_id` int(10) NOT NULL auto_increment,
  `shop_name` varchar(50) NOT NULL,
  `shop_location` varchar(50) NOT NULL,
  `shop_contact` varchar(12) NOT NULL,
  `shop_email` varchar(30) NOT NULL,
  `shop_status` int(200) NOT NULL default '0',
  `place_id` int(10) NOT NULL,
  `shop_password` int(11) NOT NULL,
  `shop_photo` varchar(500) NOT NULL,
  `shop_proof` varchar(500) NOT NULL,
  PRIMARY KEY  (`shop_id`),
  UNIQUE KEY `shop_name` (`shop_name`,`shop_location`,`shop_contact`,`shop_email`,`shop_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_shop`
--

INSERT INTO `tbl_shop` (`shop_id`, `shop_name`, `shop_location`, `shop_contact`, `shop_email`, `shop_status`, `place_id`, `shop_password`, `shop_photo`, `shop_proof`) VALUES
(1, 'Isha Boutique', 'Avoli Junction', '9967564531', 'ishaboutique@gmail.com', 0, 1, 22222, 'Isha Boutique.jfif', 'Isha Boutique.jfif');
