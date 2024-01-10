-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2024 at 12:02 PM
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
-- Database: `plant-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_comment`
--

CREATE TABLE `customer_comment` (
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_comment`
--

INSERT INTO `customer_comment` (`name`, `email`, `comment`) VALUES
('manusha', 'nishadimanusha@gmail.com', 'good this system'),
('manusha', 'nishadimanusha@gmail.com', 'good this system'),
('manusha', 'nishadimanusha@gmail.com', 'good this system'),
('manusha', 'nishadimanusha@gmail.com', 'good this system'),
('manusha', 'nishadimanusha@gmail.com', 'good this system'),
('manusha', 'nishadimanusha@gmail.com', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `customer_feedback`
--

CREATE TABLE `customer_feedback` (
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_feedback`
--

INSERT INTO `customer_feedback` (`name`, `email`, `place`, `message`) VALUES
('nisha', 'nishanusha@gmail.com', 'matara', 'good\r\n'),
('nisha', 'nishanusha@gmail.com', 'matara', 'good'),
('manusha', 'nishadimanusha@gmail.com', 'matara', 'good'),
('manusha', 'nishadimanusha@gmail.com', 'matara', 'good'),
('manusha', 'nishadimanusha@gmail.com', 'matara', 'good'),
('Vihangi', 'ghkgomas@gmail.com', 'matara', 'kkkkkk');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(62, 'Manusha', 'Manusha08', '7b1f6dff14d8c2dfeb7da9487be0612d'),
(67, 'Madushan Chanaka', 'Madushan09', '1a2b8f86b40d6c64215b0c1fce78792e'),
(68, 'Mithila Dilshan', 'Mithila', '4466764fdedd2e8385f06a33aa03c88d'),
(70, 'Vihangi Thenabadu', 'Vihangi', '745860f1c643aa84e8ee18011edb8dda');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(2, 'Medicinal Plants', 'Plant_Category_646.jpg', 'Yes', 'No'),
(3, 'Fruit Plant', 'Plant_Category_79.jpg', 'No', 'Yes'),
(4, 'Flower Plant', 'Plant_Category_649.jpeg', 'Yes', 'Yes'),
(25, 'Fancy Plant', 'Plant_Category_997.jpg', 'Yes', 'Yes'),
(30, 'Vegitable Plant', 'Plant_Category_475.jpeg', 'Yes', 'Yes'),
(36, 'outdoor plant', 'Plant_Category_494.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `plant` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `plant`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(11, 'Rose', 250.00, 3, 750.00, '2023-12-04 07:48:45', 'Ordered', 'Manusha MK', '0762477786', 'nishkm@gmail.com', '26/A, Matara'),
(20, 'Sun flower', 200.00, 2, 400.00, '2023-12-05 05:00:32', 'Delivered', 'EMP_DEPT', '0762477786', 'nishadimanusha@gmail.com', 'kagalle'),
(21, 'Sun flower', 200.00, 3, 600.00, '2023-12-05 05:56:09', 'Cancelled', 'nisha ms', '041256839', 'nishk@gmail.com', 'kagalle'),
(22, 'Fancy Plant', 500.00, 3, 1500.00, '2023-12-05 05:58:48', 'On Delivery', 'manusha manu', '0762477786', 'nishadimanusha@gmail.com', 'kagalle'),
(23, 'Rose', 250.00, 3, 750.00, '2023-12-05 03:08:18', 'Ordered', 'madushan cw', '04257863123', 'nimanusha@gmail.com', 'kagalle'),
(24, 'Sun flower', 200.00, 1, 200.00, '2023-12-06 06:43:31', 'Ordered', 'mithila', '0762477786', 'nishadimanusha@gmail.com', 'kagalle');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_plant`
--

CREATE TABLE `tbl_plant` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_plant`
--

INSERT INTO `tbl_plant` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(16, 'Rose', 'beautifull rose and  it is growth at nuwara eliya', 250.00, 'Plant-Name7782.jpg', 4, 'Yes', 'Yes'),
(17, 'Brinjal', 'Eggplant, also known as eggplant, belongs to the nightshade family.. ', 120.00, 'Plant-Name-5263.jpeg', 30, 'Yes', 'Yes'),
(23, 'Sun flower', 'such a beautiful plant', 200.00, 'Plant-Name-2335.jpg', 4, 'Yes', 'Yes'),
(24, 'Komarika', 'Komarika is useful plant for produce the ayurway products and beauty products.', 750.00, 'Plant-Name-1227.jpeg', 2, 'Yes', 'Yes'),
(27, 'Mango Plant', '', 200.00, 'Plant-Name-2505.png', 3, 'Yes', 'Yes'),
(28, 'Delum plants', '', 250.00, 'Plant-Name-3902.jpg', 3, 'Yes', 'Yes'),
(29, 'Fancy Plant', 'Indian fancy plants', 500.00, 'Plant-Name-5471.jpg', 25, 'Yes', 'Yes'),
(32, 'Centella_asiatica', '', 50.00, 'Plant-Name2025.jpg', 2, 'Yes', 'Yes'),
(34, 'Bigoniya', '', 250.00, 'Plant-Name-4586.jpg', 25, 'Yes', 'Yes'),
(35, 'Bigoniya', '', 250.00, 'Plant-Name7942.jpg', 25, 'Yes', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_plant`
--
ALTER TABLE `tbl_plant`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_plant`
--
ALTER TABLE `tbl_plant`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
