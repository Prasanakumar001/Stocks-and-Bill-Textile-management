-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2023 at 11:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penquin`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `sid` int(100) NOT NULL,
  `invoiceno` int(100) NOT NULL,
  `invoicedate` date NOT NULL,
  `grandtotal` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`sid`, `invoiceno`, `invoicedate`, `grandtotal`) VALUES
(1, 1, '2023-08-19', 240.00),
(2, 1, '2023-08-19', 240.00),
(3, 1, '1970-01-01', 4525693.00),
(4, 1, '1970-01-01', 0.00),
(5, 1, '1970-01-01', 429.00),
(6, 1, '1970-01-01', 136.00),
(7, 1, '1970-01-01', 68.00),
(8, 1, '1970-01-01', 68.00),
(9, 1, '1970-01-01', 68.00),
(10, 1, '1970-01-01', 68.00),
(11, 1, '1970-01-01', 68.00),
(12, 1, '1970-01-01', 68.00),
(13, 1, '1970-01-01', 68.00),
(14, 1, '1970-01-01', 68.00),
(15, 1, '1970-01-01', 68.00),
(16, 1, '1970-01-01', 68.00),
(17, 1, '1970-01-01', 68.00),
(18, 1, '1970-01-01', 68.00),
(19, 1, '1970-01-01', 68.00),
(20, 1, '1970-01-01', 68.00),
(21, 1, '1970-01-01', 68.00),
(22, 1, '1970-01-01', 68.00),
(23, 1, '1970-01-01', 68.00),
(24, 1, '1970-01-01', 68.00),
(25, 1, '1970-01-01', 68.00),
(26, 1, '1970-01-01', 68.00),
(27, 1, '1970-01-01', 68.00),
(28, 1, '1970-01-01', 68.00),
(29, 1, '1970-01-01', 68.00),
(30, 1, '1970-01-01', 68.00),
(31, 1, '1970-01-01', 68.00),
(32, 1, '1970-01-01', 68.00),
(33, 1, '1970-01-01', 68.00),
(34, 1, '1970-01-01', 68.00),
(35, 1, '1970-01-01', 68.00),
(36, 1, '1970-01-01', 68.00),
(37, 1, '1970-01-01', 68.00),
(38, 1, '1970-01-01', 68.00),
(39, 1, '1970-01-01', 68.00),
(40, 1, '1970-01-01', 68.00),
(41, 1, '1970-01-01', 68.00),
(42, 1, '1970-01-01', 753.00),
(43, 1, '1970-01-01', 753.00),
(44, 1, '1970-01-01', 753.00),
(45, 1, '1970-01-01', 753.00),
(46, 1, '1970-01-01', 753.00),
(47, 1, '1970-01-01', 753.00),
(48, 1, '1970-01-01', 753.00),
(49, 1, '1970-01-01', 753.00),
(50, 1, '1970-01-01', 753.00),
(51, 1, '1970-01-01', 753.00),
(52, 1, '1970-01-01', 753.00),
(53, 1, '1970-01-01', 753.00),
(54, 1, '1970-01-01', 753.00),
(55, 1, '1970-01-01', 753.00),
(56, 1, '1970-01-01', 753.00),
(57, 1, '1970-01-01', 753.00),
(58, 1, '1970-01-01', 88.00),
(59, 1, '1970-01-01', 88.00),
(60, 1, '1970-01-01', 68.00),
(61, 1, '1970-01-01', 156.00);

-- --------------------------------------------------------

--
-- Table structure for table `invoiceproducts`
--

CREATE TABLE `invoiceproducts` (
  `id` int(100) NOT NULL,
  `sid` int(100) NOT NULL,
  `code` varchar(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `price` int(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `total` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoiceproducts`
--

INSERT INTO `invoiceproducts` (`id`, `sid`, `code`, `pname`, `price`, `qty`, `total`) VALUES
(1, 1, '1230', 'pakoda', 120, 2, 240.00),
(2, 2, '1230', 'pakoda', 120, 2, 240.00),
(3, 3, '225207248', 'prasana', 225, 1, 225.00),
(4, 3, '1124406811', 'mapi', 68, 66551, 4525468.00),
(5, 4, '1220406812', 'bn nb', 68, 1, 0.00),
(6, 4, '1220406812', 'bn nb', 68, 1, 68.00),
(7, 5, '1220406812', 'bn nb', 68, 1, 68.00),
(8, 5, '1124406811', 'mapi', 68, 1, 68.00),
(9, 5, '225207248', 'prasana', 225, 1, 225.00),
(10, 5, '1124406811', 'mapi', 68, 1, 68.00),
(11, 6, '1124406811', 'mapi', 68, 1, 68.00),
(12, 6, '1220406811', 'bn nb', 68, 1, 68.00),
(13, 7, '1124406562', 'mapi', 68, 1, 68.00),
(14, 8, '1124406562', 'mapi', 68, 1, 68.00),
(15, 9, '1124406562', 'mapi', 68, 1, 68.00),
(16, 10, '1124406562', 'mapi', 68, 1, 68.00),
(17, 11, '1124406562', 'mapi', 68, 1, 68.00),
(18, 12, '1124406562', 'mapi', 68, 1, 68.00),
(19, 13, '1124406562', 'mapi', 68, 1, 68.00),
(20, 14, '1124406562', 'mapi', 68, 1, 68.00),
(21, 15, '1124406562', 'mapi', 68, 1, 68.00),
(22, 16, '1124406562', 'mapi', 68, 1, 68.00),
(23, 17, '1124406562', 'mapi', 68, 1, 68.00),
(24, 18, '1124406562', 'mapi', 68, 1, 68.00),
(25, 19, '1124406562', 'mapi', 68, 1, 68.00),
(26, 20, '1124406562', 'mapi', 68, 1, 68.00),
(27, 21, '1124406562', 'mapi', 68, 1, 68.00),
(28, 22, '1124406562', 'mapi', 68, 1, 68.00),
(29, 23, '1124406562', 'mapi', 68, 1, 68.00),
(30, 24, '1124406562', 'mapi', 68, 1, 68.00),
(31, 25, '1124406562', 'mapi', 68, 1, 68.00),
(32, 26, '1124406562', 'mapi', 68, 1, 68.00),
(33, 27, '1124406562', 'mapi', 68, 1, 68.00),
(34, 28, '1124406562', 'mapi', 68, 1, 68.00),
(35, 29, '1124406562', 'mapi', 68, 1, 68.00),
(36, 30, '1124406562', 'mapi', 68, 1, 68.00),
(37, 31, '1124406562', 'mapi', 68, 1, 68.00),
(38, 32, '1124406811', 'mapi', 68, 1, 68.00),
(39, 33, '1124406811', 'mapi', 68, 1, 68.00),
(40, 34, '1124406811', 'mapi', 68, 1, 68.00),
(41, 35, '1124406811', 'mapi', 68, 1, 68.00),
(42, 36, '1124406811', 'mapi', 68, 1, 68.00),
(43, 37, '1124406811', 'mapi', 68, 1, 68.00),
(44, 38, '1124406811', 'mapi', 68, 1, 68.00),
(45, 39, '1124406811', 'mapi', 68, 1, 68.00),
(46, 40, '1124406811', 'mapi', 68, 1, 68.00),
(47, 41, '1124406811', 'mapi', 68, 1, 68.00),
(48, 42, '1124406811', 'mapi', 68, 1, 685.00),
(49, 42, '1220406812', 'bn nb', 68, 1, 68.00),
(50, 43, '1124406811', 'mapi', 68, 1, 685.00),
(51, 43, '1220406812', 'bn nb', 68, 1, 68.00),
(52, 44, '1124406811', 'mapi', 68, 1, 685.00),
(53, 44, '1220406812', 'bn nb', 68, 1, 68.00),
(54, 45, '1124406811', 'mapi', 68, 1, 685.00),
(55, 45, '1220406812', 'bn nb', 68, 1, 68.00),
(56, 46, '1124406811', 'mapi', 68, 1, 685.00),
(57, 46, '1220406812', 'bn nb', 68, 1, 68.00),
(58, 47, '1124406811', 'mapi', 68, 1, 685.00),
(59, 47, '1220406812', 'bn nb', 68, 1, 68.00),
(60, 48, '1124406811', 'mapi', 68, 1, 685.00),
(61, 48, '1220406812', 'bn nb', 68, 1, 68.00),
(62, 49, '1124406811', 'mapi', 68, 1, 685.00),
(63, 49, '1220406812', 'bn nb', 68, 1, 68.00),
(64, 50, '1124406811', 'mapi', 68, 1, 685.00),
(65, 50, '1220406812', 'bn nb', 68, 1, 68.00),
(66, 51, '1124406811', 'mapi', 68, 1, 685.00),
(67, 51, '1220406812', 'bn nb', 68, 1, 68.00),
(68, 52, '1124406811', 'mapi', 68, 1, 685.00),
(69, 52, '1220406812', 'bn nb', 68, 1, 68.00),
(70, 53, '1124406811', 'mapi', 68, 1, 685.00),
(71, 53, '1220406812', 'bn nb', 68, 1, 68.00),
(72, 54, '1124406811', 'mapi', 68, 1, 685.00),
(73, 54, '1220406812', 'bn nb', 68, 1, 68.00),
(74, 55, '1124406811', 'mapi', 68, 1, 685.00),
(75, 55, '1220406812', 'bn nb', 68, 1, 68.00),
(76, 56, '1124406811', 'mapi', 68, 1, 685.00),
(77, 56, '1220406812', 'bn nb', 68, 1, 68.00),
(78, 57, '1124406811', 'mapi', 68, 1, 685.00),
(79, 57, '1220406812', 'bn nb', 68, 1, 68.00),
(80, 58, '1124406811', 'mapi', 68, 1, 68.00),
(81, 58, '2022543', 'prasana', 20, 1, 20.00),
(82, 58, '', '', 0, 0, 0.00),
(83, 59, '2022543', 'prasana', 20, 1, 20.00),
(84, 60, '1220406812', 'bn nb', 68, 1, 68.00),
(85, 61, '1220406812', 'bn nb', 68, 1, 68.00),
(86, 61, '1220406812', 'bn nb', 68, 1, 68.00),
(87, 61, '2022543', 'prasana', 20, 1, 20.00);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL,
  `size` varchar(255) NOT NULL,
  `baseprice` varchar(255) NOT NULL,
  `sellingprice` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `quantity`, `size`, `baseprice`, `sellingprice`, `code`, `created`) VALUES
(7, 'prasana', 20, 'Large', '205', '225', '225207248', '17,Aug,2023 07:06:30 AM'),
(8, 'prasana', 20, 'Medium', '205', '20', '2022543', '17,Aug,2023 07:06:42 AM'),
(9, 'pokada', 20, 'Medium', '20', '50', '504073', '17,Aug,2023 09:09:28 PM'),
(10, 'updatecheck', 20, '5XL', '20', '40', '[value-7]', '19,Aug,2023 03:21:18 PM'),
(11, 'mapi', 24, 'XL', '20', '68', '1124406811', '19,Aug,2023 03:32:31 PM'),
(12, 'bn nb', 20, 'Large', '20', '68', '1220406812', '19,Aug,2023 03:32:46 PM'),
(13, 'viking ', 100, '90', '135', '177', '1310027017713', '23,Aug,2023 07:08:19 PM');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(100) NOT NULL,
  `productid` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `productid`, `quantity`, `created`) VALUES
(1, 7, 20, '17,Aug,2023 07:44:48 PM'),
(2, 7, 10, '17,Aug,2023 07:53:17 PM'),
(3, 8, 10, '17,Aug,2023 07:53:41 PM'),
(4, 8, 50, '17,Aug,2023 08:42:25 PM'),
(5, 7, 200, '17,Aug,2023 08:42:35 PM'),
(6, 7, 10, '17,Aug,2023 08:44:34 PM'),
(7, 8, 19, '17,Aug,2023 08:45:35 PM'),
(8, 8, 10, '17,Aug,2023 08:46:14 PM'),
(9, 8, 10, '17,Aug,2023 08:49:42 PM'),
(10, 7, 10, '17,Aug,2023 08:52:46 PM'),
(11, 7, 20, '17,Aug,2023 08:55:20 PM'),
(12, 7, 10, '17,Aug,2023 08:59:39 PM'),
(13, 8, 10, '17,Aug,2023 09:03:39 PM'),
(14, 7, 20, '17,Aug,2023 09:04:14 PM'),
(15, 7, 20, '17,Aug,2023 09:04:56 PM'),
(16, 7, 10, '17,Aug,2023 09:06:06 PM'),
(17, 7, 10, '17,Aug,2023 09:08:11 PM'),
(18, 8, 20, '17,Aug,2023 09:08:50 PM'),
(19, 9, 20, '17,Aug,2023 09:09:42 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `invoiceproducts`
--
ALTER TABLE `invoiceproducts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_invoice` (`sid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_productid` (`productid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `sid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `invoiceproducts`
--
ALTER TABLE `invoiceproducts`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoiceproducts`
--
ALTER TABLE `invoiceproducts`
  ADD CONSTRAINT `FK_invoice` FOREIGN KEY (`sid`) REFERENCES `invoice` (`sid`);

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `Fk_productid` FOREIGN KEY (`productid`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
