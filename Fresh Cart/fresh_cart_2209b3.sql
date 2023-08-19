-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2023 at 06:43 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fresh_cart_2209b3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `parent_category`
--

CREATE TABLE `parent_category` (
  `pc_id` int(11) NOT NULL,
  `pc_name` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent_category`
--

INSERT INTO `parent_category` (`pc_id`, `pc_name`, `img`) VALUES
(1, 'Dairy, Bread & Eggs', 'dairy.svg'),
(2, 'Snack & Munchies', 'snacks.svg'),
(3, 'Cold Drinks & Juices', 'wine.svg'),
(4, 'Chicken, Meat & Fish', 'fish.svg'),
(5, 'Fruit & Vegetable', 'fruit.svg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `category` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `weight` decimal(20,2) NOT NULL,
  `code` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `availblity` varchar(20) NOT NULL,
  `unit` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `dimension` varchar(50) NOT NULL,
  `img1` varchar(50) NOT NULL,
  `img2` varchar(50) NOT NULL,
  `img3` varchar(50) NOT NULL,
  `img4` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `category`, `price`, `weight`, `code`, `status`, `availblity`, `unit`, `description`, `created_at`, `dimension`, `img1`, `img2`, `img3`, `img4`) VALUES
(1, 'Chips', 3, 20, '1.00', 'FBB002455', 'Active', 'In Stock', 10, 'anything', '2023-07-14', '1 x 1 x 2', 'product-img-4.jpg', 'product-img-5.jpg', 'product-img-6.jpg', 'product-img-7.jpg'),
(2, 'Milk', 4, 100, '1.00', 'FBB00255', 'Disable', 'In Stock', 5, 'anything', '2023-07-14', '1 x 2 x 3', 'product-img-2.jpg', 'product-img-10.jpg', 'product-img-8.jpg', 'product-img-7.jpg'),
(3, 'Milk', 4, 100, '1.00', 'FBB00255', 'Disable', 'Out Of Stock', 5, 'anything', '2023-07-14', '1 x 2 x 3', 'product-img-2.jpg', 'product-img-10.jpg', 'product-img-8.jpg', 'product-img-7.jpg'),
(4, 'sdfs', 4, 25, '5.00', 'FBB00252', 'Active', '', 1, '', '2023-07-14', '1 x 2 x 3', 'product-img-3.jpg', 'product-img-5.jpg', 'product-img-1.jpg', 'product-img-6.jpg'),
(5, 'dfsd', 6, 3, '1.00', 'FBB002455', 'Active', 'Out Of Stock', 5, '', '2023-07-14', '', 'product-img-5.jpg', 'product-img-6.jpg', 'product-img-7.jpg', 'product-img-8.jpg'),
(6, 'dfsd', 6, 3, '1.00', 'FBB002455', 'Active', 'In Stock', 5, '', '2023-07-14', '', 'product-img-5.jpg', 'product-img-6.jpg', 'product-img-7.jpg', 'product-img-8.jpg'),
(7, 'sadfsa', 4, 25, '0.00', '', 'Active', 'In Stock', 1, '', '2023-07-14', '', 'product-img-5.jpg', 'product-img-6.jpg', 'product-img-7.jpg', 'product-img-8.jpg'),
(8, 'dfdf', 4, 0, '0.00', '', 'Active', 'Out Of Stock', 0, '', '2023-07-14', '', 'product-img-5.jpg', 'product-img-6.jpg', 'product-img-7.jpg', 'product-img-8.jpg'),
(10, 'fgfg', 4, 0, '0.00', '', 'Active', 'Out Of Stock', 0, '', '2023-07-14', '', 'product-img-5.jpg', 'product-img-6.jpg', 'product-img-7.jpg', 'product-img-8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `description`, `img`, `created_at`) VALUES
(1, 'SuperMarket For Fresh Grocery ', 'Introduced a new model for online grocery shopping  and convenient home delivery.', 'slide-1.jpg', '2023-07-26 09:32:05'),
(2, 'Free Shipping on  orders over $100', 'Free Shipping to First-Time Customers Only, After promotions and discounts are applied.             ', 'slider-2.jpg', '2023-07-26 09:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sc_id` int(11) NOT NULL,
  `sc_name` varchar(100) NOT NULL,
  `sc_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sc_id`, `sc_name`, `sc_category`) VALUES
(3, 'Chips & Crisps', 2),
(4, 'Milk', 1),
(5, 'Soft Drink', 3),
(6, 'Fresh Vegetables', 5),
(7, 'Bread', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent_category`
--
ALTER TABLE `parent_category`
  ADD PRIMARY KEY (`pc_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_fk` (`category`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sc_id`),
  ADD KEY `sc_fk` (`sc_category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parent_category`
--
ALTER TABLE `parent_category`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `p_fk` FOREIGN KEY (`category`) REFERENCES `sub_category` (`sc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sc_fk` FOREIGN KEY (`sc_category`) REFERENCES `parent_category` (`pc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
