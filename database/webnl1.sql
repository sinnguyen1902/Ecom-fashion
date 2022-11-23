-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220810.35f421a69b
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 07:09 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webnl1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminid` int(11) NOT NULL,
  `adminname` varchar(255) NOT NULL,
  `adminemail` varchar(255) NOT NULL,
  `adminuser` varchar(100) NOT NULL,
  `adminpass` varchar(100) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminid`, `adminname`, `adminemail`, `adminuser`, `adminpass`, `level`) VALUES
(2, 'sin', 'sinb1812813@student.ctu.edu.vn', 'sin', '123', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandid` int(11) NOT NULL,
  `brandname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandid`, `brandname`) VALUES
(5, 'SamSung'),
(6, 'Apple'),
(7, 'Dell'),
(8, 'Huawie');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `sidd` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartid`, `productid`, `sidd`, `productname`, `price`, `quantity`, `image`) VALUES
(15, 12, 'bo1t1av69koi5ig35lgfr3kk96', '2', '2', 1, 'e1d927316a.jpg'),
(16, 13, 'bo1t1av69koi5ig35lgfr3kk96', '3', '3', 1, 'f66195aecf.jpg'),
(17, 14, 'bo1t1av69koi5ig35lgfr3kk96', '4', '4', 1, 'b45f66d4fa.jpg'),
(18, 11, 'bo1t1av69koi5ig35lgfr3kk96', '1', '1', 1, '9e2446b323.jpg'),
(19, 14, 'dvigj7jfbhljp6r0msilt2ni30', '4', '4', 1, 'b45f66d4fa.jpg'),
(21, 11, '8enapbpisnuompmsqqq63p153n', '1', '1', 2, '9e2446b323.jpg'),
(22, 12, '8enapbpisnuompmsqqq63p153n', '2', '2', 1, 'e1d927316a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cartegory`
--

CREATE TABLE `tbl_cartegory` (
  `catid` int(11) NOT NULL,
  `catname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cartegory`
--

INSERT INTO `tbl_cartegory` (`catid`, `catname`) VALUES
(9, 'Laptop'),
(10, 'DT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `city`, `zipcode`, `email`, `address`, `country`, `phone`, `password`) VALUES
(1, 'SIN NGUYEN1', 'LONG XUYEN', '90900', 'sinb1812813@student.ctu.edu.vn', 'CHAU THANH', 'null', '0378986231', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `productid`, `productname`, `customer_id`, `quantity`, `price`, `image`, `status`, `date`) VALUES
(8, 14, '4', 1, 3, '12', 'b45f66d4fa.jpg', 2, '2021-12-10 12:42:04'),
(12, 14, '4', 1, 1, '4', 'b45f66d4fa.jpg', 2, '2021-12-11 05:13:45'),
(13, 12, '2', 1, 1, '2', 'e1d927316a.jpg', 2, '2021-12-11 05:18:15'),
(14, 14, '4', 0, 1, '4', 'b45f66d4fa.jpg', 0, '2021-12-11 08:03:24'),
(15, 14, '4', 1, 1, '4', 'b45f66d4fa.jpg', 0, '2021-12-11 08:10:33'),
(16, 11, '1', 0, 2, '2', '9e2446b323.jpg', 0, '2022-10-17 10:11:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productid` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `catid` int(11) NOT NULL,
  `brandid` int(11) NOT NULL,
  `productdesc` text NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productid`, `productname`, `catid`, `brandid`, `productdesc`, `type`, `price`, `image`) VALUES
(11, '1', 10, 8, '<p>1</p>', 1, '1', '9e2446b323.jpg'),
(12, '2', 10, 7, '<p>2</p>', 1, '2', 'e1d927316a.jpg'),
(13, '3', 10, 6, '<p>3</p>', 1, '3', 'f66195aecf.jpg'),
(14, '4', 10, 5, '<p>4</p>', 1, '4', 'b45f66d4fa.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandid`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `tbl_cartegory`
--
ALTER TABLE `tbl_cartegory`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_cartegory`
--
ALTER TABLE `tbl_cartegory`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
