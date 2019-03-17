-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 12, 2018 at 04:01 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u197349189_lri`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `name`, `email`, `contact`, `city`, `comments`) VALUES
(1, 'Nikunj', 'nikunjavaiya31@gmail.com', '9537229859', 'Surat', ''),
(2, 'Nikunj', 'nikunjavaiya31@gmail.com', '9537229859', 'Surat', ''),
(3, 'Dhruv Kumar', 'dhruvdk97122@gmail.com', '+919712233637', 'Surat', ''),
(4, 'Smit Avaiya', 'avaiyasmit11111@gmail.com', '8238477793', 'Surat', 'I Am Student For BBA in Second Year');

-- --------------------------------------------------------

--
-- Table structure for table `biddata`
--

CREATE TABLE `biddata` (
  `id` int(11) NOT NULL,
  `postid` int(10) NOT NULL,
  `biduserid` int(11) NOT NULL,
  `biduser` varchar(255) NOT NULL,
  `phone` double NOT NULL,
  `Address` varchar(255) NOT NULL,
  `biddetails` longtext NOT NULL,
  `bidamount` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `attachment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biddata`
--

INSERT INTO `biddata` (`id`, `postid`, `biduserid`, `biduser`, `phone`, `Address`, `biddetails`, `bidamount`, `profile`, `date`, `attachment`) VALUES
(1, 1, 2, 'Mahi selles', 7359324923, '25,katargam,surat,gujarat,india', 'Available.\r\n3 year warranty.\r\nNew.', 'Rs. 50,000', '', '2018-04-01 11:28:05', '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`) VALUES
(1, ''),
(2, 'CLOTHES'),
(3, 'LAPTOP'),
(4, 'PROPERTIES'),
(5, 'CAR'),
(6, 'FURNITURE'),
(7, 'BIKE'),
(8, 'BOOKS'),
(9, 'SPORTS'),
(10, 'ELECTRONICS'),
(11, 'MOBILE ACESSORIES'),
(12, 'LAPTOP ACESSORIES'),
(13, 'CAR ACCESSORIES'),
(14, 'HOME APPLIANCES'),
(15, 'KITCHEN'),
(16, 'PC'),
(17, 'WASHING MACHINE'),
(18, 'REFRIGERATOR'),
(20, 'LCD/LED'),
(21, 'MOBILE PHONES'),
(22, 'DIAMOND'),
(24, 'WALLET'),
(25, 'KEYCHAIN'),
(26, 'SOLAR'),
(29, 'HEADPHONES');

-- --------------------------------------------------------

--
-- Table structure for table `qrdata`
--

CREATE TABLE `qrdata` (
  `id` int(11) NOT NULL,
  `postedid` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `postedby` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qrdata`
--

INSERT INTO `qrdata` (`id`, `postedid`, `categories`, `postedby`, `title`, `description`, `date`, `city`, `state`, `country`, `image`) VALUES
(1, 1, 'LCD/LED', 'parth avaiya', ' LG 32inch', '3 year warranty \r\nSame day delivery \r\nNew', '2018-04-01 11:23:57', 'SURAT ', 'Gujarat', 'India ', ' '),
(2, 2, 'MOBILE ACESSORIES', 'Mahi selles', 'Xiaomi Redmi 1s Display With Touch Screen Combo', 'My Redmi 1s Display not working. I want to replace. \r\nSubmit a Price with fitting charge.', '2018-04-05 12:15:00', 'SURAT', 'gujarat', 'india', '3385166898.jpg'),
(3, 4, 'CAR', 'Umesh', 'Car', 'Audi . Life time warranty .\r\nMRP : up to 10000000.\r\nWhite.\r\nAny model.\r\nFast delivery.\r\n', '2018-04-05 14:19:02', 'SURAT ', 'gujrat', 'India ', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mobile` double NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL,
  `pincode` int(6) NOT NULL DEFAULT '0',
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `shopname` varchar(255) NOT NULL,
  `addline1` varchar(255) NOT NULL,
  `addline2` varchar(255) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `email`, `password`, `pincode`, `city`, `state`, `country`, `shopname`, `addline1`, `addline2`, `hash`, `active`) VALUES
(1, 'parth avaiya', 8347396865, 'parthavaiya614@gmail.com', '1592f4a6f03dfdf4dca29de2a7874507', 0, 'Surat ', 'Gujarat', 'India ', '', '', '', '4f4adcbf8c6f66dcfc8a3282ac2bf10a', 0),
(2, 'Mahi selles', 7359324923, 'lmavaiya@gmail.com', '641c56ef89790513f4ce1fddf9dea78f', 395004, 'surat', 'gujarat', 'india', 'mahi selles', '25', 'katargam', 'fe7ee8fc1959cc7214fa21c4840dff0a', 0),
(3, 'LALEET', 7874353439, 'lmavaiya73@gmail.com', '641c56ef89790513f4ce1fddf9dea78f', 0, 'Surat', 'GJ', 'INDIA', '', '', '', '6d0f846348a856321729a2f36734d1a7', 0),
(4, 'Umesh', 9727708114, 'Uhavaiya@gmail.com', '77a32bae16afef60fd87ca1639b2a40f', 0, 'Surat ', 'gujrat', 'India ', '', '', '', '979d472a84804b9f647bc185a877a8b5', 0),
(5, 'skumar', 9462696594, 'kumawats3023@gmail.com', '4297f44b13955235245b2497399d7a93', 0, 'surat', 'gujrat', 'india', '', '', '', 'c7e1249ffc03eb9ded908c236bd1996d', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biddata`
--
ALTER TABLE `biddata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qrdata`
--
ALTER TABLE `qrdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `biddata`
--
ALTER TABLE `biddata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `qrdata`
--
ALTER TABLE `qrdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
