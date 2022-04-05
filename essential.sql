-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2022 at 03:23 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `essential`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `banner_name` varchar(30) NOT NULL,
  `banner_image` varchar(255) NOT NULL DEFAULT 'banners.jpg',
  `banner_size` varchar(30) NOT NULL,
  `banner_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `banner_name`, `banner_image`, `banner_size`, `banner_timestamp`) VALUES
(1, 'banner 1', 'default-1.jpg', '', '2022-04-05 12:25:51'),
(2, 'banner 2', 'defualt-1.jpg', '', '2022-04-05 12:26:17'),
(3, 'banner 3', 'default-2.jpg', '', '2022-03-07 14:23:42'),
(4, 'banner 4', 'default-2.jpg', '', '2022-03-07 14:24:01'),
(5, 'banner 5', 'default-2.jpg', '', '2022-03-07 14:24:28'),
(6, 'banner 6', 'default-3.jpg', '', '2022-03-07 14:25:40'),
(7, 'banner 7', 'default-4.jpg', '', '2022-03-07 14:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL,
  `inventory_product_id` int(11) NOT NULL,
  `inventory_value` int(4) NOT NULL DEFAULT 1,
  `inventory_value_prev` int(4) NOT NULL DEFAULT 0,
  `inventory_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `orders_firstname` varchar(20) NOT NULL,
  `orders_surname` varchar(20) NOT NULL,
  `orders_email` varchar(255) NOT NULL,
  `orders_phone` varchar(11) NOT NULL,
  `orders_address` varchar(255) NOT NULL,
  `orders_city` varchar(30) NOT NULL,
  `orders_name` varchar(30) NOT NULL,
  `orders_price` varchar(11) NOT NULL,
  `orders_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `orders_reference` varchar(10) NOT NULL,
  `orders_status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `products_id` int(11) NOT NULL,
  `products_name` varchar(30) NOT NULL,
  `products_price` varchar(11) NOT NULL,
  `products_sales_price` varchar(10) NOT NULL,
  `products_sub_categories` int(10) NOT NULL,
  `products_promo` varchar(20) NOT NULL DEFAULT '0',
  `products_deals` varchar(20) NOT NULL DEFAULT '0',
  `products_new_arrivals` varchar(20) NOT NULL DEFAULT '0',
  `products_best_sellers` varchar(20) NOT NULL DEFAULT '0',
  `products_popular` varchar(20) NOT NULL DEFAULT '0',
  `products_short_description` varchar(255) NOT NULL,
  `products_long_description` text NOT NULL,
  `products_image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `products_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `real_sub_categories` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products_categories`
--

CREATE TABLE `products_categories` (
  `products_categories_id` int(11) NOT NULL,
  `products_categories_name` varchar(20) NOT NULL,
  `products_categories_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shop_slider_banner`
--

CREATE TABLE `shop_slider_banner` (
  `shop_slider_id` int(11) NOT NULL,
  `shop_slider_name` varchar(10) NOT NULL,
  `shop_slider_image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `shop_slider_size` varchar(8) NOT NULL DEFAULT '870x399',
  `shop_slider_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_slider_banner`
--

INSERT INTO `shop_slider_banner` (`shop_slider_id`, `shop_slider_name`, `shop_slider_image`, `shop_slider_size`, `shop_slider_timestamp`) VALUES
(1, 'slider 1', 'default.jpg', '870x399', '2022-03-25 11:49:41'),
(2, 'slider 2', 'default.jpg', '870x399', '2022-03-25 11:50:07');

-- --------------------------------------------------------

--
-- Table structure for table `slider_banner`
--

CREATE TABLE `slider_banner` (
  `slider_id` int(11) NOT NULL,
  `slider_banner_name` varchar(20) NOT NULL,
  `slider_banner_image` varchar(255) NOT NULL DEFAULT 'slide-1.jpg',
  `slider_banner_size` varchar(255) NOT NULL DEFAULT '1230 by 425',
  `slider_banner_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider_banner`
--

INSERT INTO `slider_banner` (`slider_id`, `slider_banner_name`, `slider_banner_image`, `slider_banner_size`, `slider_banner_timestamp`) VALUES
(1, 'Slider banner 1', 'default.jpg', '1230 by 425', '2022-04-05 12:05:15'),
(2, 'Slider banner 2', 'default.jpg', '1230 by 425', '2022-04-05 12:05:22'),
(3, 'Slider banner 3', 'default.jpg', '1230 by 425', '2022-04-05 12:05:29');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id_sub_categories` int(11) NOT NULL,
  `id_categories` int(11) NOT NULL,
  `sub_categories_name` varchar(30) NOT NULL,
  `sub_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `top_banner`
--

CREATE TABLE `top_banner` (
  `top_banner_id` int(11) NOT NULL,
  `top_banner_name` varchar(255) NOT NULL DEFAULT 'top-banner',
  `top_banner_image` varchar(255) NOT NULL,
  `top_banner_size` varchar(10) NOT NULL DEFAULT '1200x80',
  `top_banner_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cookies_session` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `active`, `email`, `password`, `cookies_session`, `timestamp`) VALUES
(1, 1, 'test@gmail.com', 'password', 'beb5844fc6bc2a5f0fc0c7dff3394a0a', '2022-03-30 13:49:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_id`);

--
-- Indexes for table `products_categories`
--
ALTER TABLE `products_categories`
  ADD PRIMARY KEY (`products_categories_id`);

--
-- Indexes for table `shop_slider_banner`
--
ALTER TABLE `shop_slider_banner`
  ADD PRIMARY KEY (`shop_slider_id`);

--
-- Indexes for table `slider_banner`
--
ALTER TABLE `slider_banner`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id_sub_categories`);

--
-- Indexes for table `top_banner`
--
ALTER TABLE `top_banner`
  ADD PRIMARY KEY (`top_banner_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products_categories`
--
ALTER TABLE `products_categories`
  MODIFY `products_categories_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop_slider_banner`
--
ALTER TABLE `shop_slider_banner`
  MODIFY `shop_slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slider_banner`
--
ALTER TABLE `slider_banner`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id_sub_categories` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `top_banner`
--
ALTER TABLE `top_banner`
  MODIFY `top_banner_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
