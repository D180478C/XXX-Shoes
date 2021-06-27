-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2021 at 05:05 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2020database`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `shoes_id` int(100) NOT NULL,
  `brand` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`shoes_id`, `brand`) VALUES
(1, 'New Balance'),
(2, 'Nike'),
(3, 'Jordan'),
(4, 'Puma'),
(5, 'Reebok'),
(6, 'Adidas'),
(7, 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `category_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `shoes_img` varchar(255) NOT NULL,
  `shoes_name` varchar(255) NOT NULL,
  `shoes_types` varchar(255) NOT NULL,
  `shoes_size` varchar(10) NOT NULL,
  `colours` varchar(255) NOT NULL,
  `quantity` int(16) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`category_id`, `product_id`, `shoes_img`, `shoes_name`, `shoes_types`, `shoes_size`, `colours`, `quantity`, `price`) VALUES
(5, 1, 'try.jpg', 'try', 'Gym and training', '10', 'red', 999, 20.00),
(1, 2, 'New Balance Free Foam VAADU.jpg', 'New Balance Free Foam VAADU', 'Running', '10', 'black', 34, 235.99),
(2, 3, 'Lebron 13 Akronite.jpg', 'Lebron 13 Akronite', 'Basketball Shoes', '12', 'Black-Purple 12', 50, 568.99),
(6, 4, 'Ultraboost 20.jpg', 'Ultraboost 20', 'Lifestyle', '11', 'Orange', 34, 299.00),
(6, 5, 'Adidas ZX 2K Boost.jpg', 'Adidas ZX 2K Boost', 'Gym and training', '9', 'white-red-blue', 60, 432.99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`shoes_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `shoes_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
