-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 29, 2022 at 06:59 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracybr1_betasouk`
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
  `banner_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `banner_name`, `banner_image`, `banner_size`, `banner_timestamp`) VALUES
(1, 'banner 1', 'default-1.jpg', '', '2022-03-16 14:57:12'),
(2, 'banner 2', 'default-1.jpg', '', '2022-03-16 14:57:42'),
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
  `inventory_value` int(4) NOT NULL DEFAULT '1',
  `inventory_value_prev` int(4) NOT NULL DEFAULT '0',
  `inventory_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_id`, `inventory_product_id`, `inventory_value`, `inventory_value_prev`, `inventory_timestamp`) VALUES
(1, 2, 3, 0, '2022-03-25 16:14:52'),
(2, 3, 1, 0, '2022-03-25 17:38:26'),
(3, 5, 2, 0, '2022-03-28 12:30:16'),
(4, 6, 1, 0, '2022-03-28 13:11:52'),
(5, 7, 3, 0, '2022-03-28 13:12:48'),
(6, 8, 10, 0, '2022-03-28 13:13:44'),
(7, 9, 5, 0, '2022-03-28 13:18:17'),
(8, 10, 1, 0, '2022-03-28 13:30:35'),
(9, 11, 1, 0, '2022-03-28 16:09:20'),
(10, 12, 1, 0, '2022-03-28 17:21:32'),
(11, 13, 1, 0, '2022-03-28 17:25:06'),
(12, 14, 1, 0, '2022-03-28 17:25:19'),
(13, 15, 1, 0, '2022-03-28 17:25:31'),
(14, 16, 1, 0, '2022-03-28 17:28:04');

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
  `orders_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `orders_reference` varchar(10) NOT NULL,
  `orders_status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `orders_firstname`, `orders_surname`, `orders_email`, `orders_phone`, `orders_address`, `orders_city`, `orders_name`, `orders_price`, `orders_timestamp`, `orders_reference`, `orders_status`) VALUES
(1, 'Ahmed', 'Olusesi', 'olusesia@gmail.com', '08074574512', 'Ikeja', 'Lagos', 'products', '5000', '2022-03-28 14:24:26', 'AVKZPWPHYW', 0),
(2, 'tobi', 'manu', 'alex@gmail.com', '09099887766', 'mamu golf', 'alaka', 'products', '13000', '2022-03-28 14:40:42', 'B6QLBXOJC8', 1),
(3, 'tee', 'lee', 'test@gmail.com', '09099887766', 'alaka', 'alake', 'products', '13000', '2022-03-28 15:48:24', '9CUR36G12F', 1),
(4, 'ahmed', 'olusesi', 'olusesia@gmail.com', '08074574512', 'ikeja', 'ikeja', 'products', '4000', '2022-03-29 09:26:42', '5CZ5PVGB5G', 0),
(5, 'ahmed', 'olusesi', 'olusesia@gmail.com', '08074574512', 'ikeja', 'ikeja', 'products', '3500', '2022-03-29 09:30:04', '0MQJFDT7O9', 0),
(6, 'Ahmed', 'Olusesi', 'olusesia@gmail.com', '08074574512', 'Ikeja', 'Lagos', 'products', '4600', '2022-03-29 10:16:26', 'XGLO6YU6C9', 0),
(7, 'ahmed', 'olusesi', 'olusesia@gmail.com', '08074574512', 'ikeja', 'lagos', 'products', '7600', '2022-03-29 13:46:05', 'P4RECDATPL', 0),
(8, 'violet', 'violet', 'violetamy49@yahoo.com', '07069066720', 'Ikeja', 'Lagos', 'products', '27500', '2022-03-29 16:26:51', 'A7JR2BB053', 1),
(9, 'ahmed', 'olusesi', 'olusesia@gmail.com', '08074574512', 'Ikeja', 'Lagos', 'products', '9500', '2022-03-29 16:45:50', '38YWE5S4C0', 1),
(10, 'dfdf', 'dfdfd', 'olusesia@gmail.com', '08074574512', 'safasdf', 'asdfsfda', 'products', '13000', '2022-03-29 17:10:18', 'FHDKGH8YP4', 1),
(11, 'sfasf', 'asdfsdf', 'olsdfda.sesi@gmail.com', '08076567890', 'sdfsdf', 'asfasf', 'products', '9500', '2022-03-29 17:41:53', '4MSQXZJDY8', 1),
(12, 'gdgfgfdgf', 'ffhgdfhgfghf', 'olasfsd@yahoo.com', '08076567898', 'dfgdgfg', 'gfhggh', 'products', '9600', '2022-03-29 17:51:22', '4I96R7VXHZ', 0),
(13, 'sddasfsadf', 'asfdsdfa', 'ola.sesi@gmail.com', '09999999999', 'asdfsfd', 'sdfasfsdf', 'products', '9000', '2022-03-29 18:01:05', '8COIGJGAAL', 1),
(14, 'asdfsdf', 'asdfsdf', 'ola.sesi@gmail.com', '09878988888', 'asdfsdf', 'asdfsfd', 'products', '9000', '2022-03-29 18:24:35', 'S70VFZUHX0', 1),
(15, 'fgdhdgdf', 'gfhddhgfh', 'akfsdk@asdfsd.com', '09999999999', 'fgdhfhdgf', 'ffgfhhfh', 'products', '9000', '2022-03-29 18:39:09', '958O0EF3RX', 1),
(16, 'fytffytfyt', 'utuyyu', 'utuytu@gmail.com', '09999999999', 'ututtu', 'yuuytuy', 'products', '9000', '2022-03-29 18:43:30', 'FXSKW8XYME', 1),
(17, 'adsadas', 'sadadsa', 'olusesi@gmail.com', '09999999999', 'sfdsdfsdf', 'sdfsdf', 'products', '9000', '2022-03-29 18:53:38', '3DYVG4ILV5', 1);

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
  `products_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`products_id`, `products_name`, `products_price`, `products_sales_price`, `products_sub_categories`, `products_promo`, `products_deals`, `products_new_arrivals`, `products_best_sellers`, `products_popular`, `products_short_description`, `products_long_description`, `products_image`, `products_timestamp`) VALUES
(8, 'pencil', '3000', '1500', 1, '0', 'Deals of the day', '0', '0', '0', '', '', 'default.jpg', '2022-03-28 13:13:44'),
(13, 'goat', '500', '', 1, '0', 'Deals of the day', '0', '0', '0', '', '', 'default.jpg', '2022-03-28 17:25:06'),
(15, 'pork', '600', '', 1, '0', 'Deals of the day', '0', '0', '0', '', '', 'default.jpg', '2022-03-28 17:25:31'),
(16, 'meat', '4000', '', 1, '0', 'Deals of the day', '0', '0', '0', '', '', 'default.jpg', '2022-03-28 17:28:04');

-- --------------------------------------------------------

--
-- Table structure for table `products_categories`
--

CREATE TABLE `products_categories` (
  `products_categories_id` int(11) NOT NULL,
  `products_categories_name` varchar(20) NOT NULL,
  `products_categories_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_categories`
--

INSERT INTO `products_categories` (`products_categories_id`, `products_categories_name`, `products_categories_timestamp`) VALUES
(1, 'Uncategorized', '2022-03-16 15:07:25'),
(2, 'cloth', '2022-03-28 15:59:40');

-- --------------------------------------------------------

--
-- Table structure for table `shop_slider_banner`
--

CREATE TABLE `shop_slider_banner` (
  `shop_slider_id` int(11) NOT NULL,
  `shop_slider_name` varchar(10) NOT NULL,
  `shop_slider_image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `shop_slider_size` varchar(8) NOT NULL DEFAULT '870x399',
  `shop_slider_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_slider_banner`
--

INSERT INTO `shop_slider_banner` (`shop_slider_id`, `shop_slider_name`, `shop_slider_image`, `shop_slider_size`, `shop_slider_timestamp`) VALUES
(1, 'slider 1', '3fe6b4d92e43544d48020d363edcd72489ae93ca.png', '870x399', '2022-03-25 11:49:41'),
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
  `slider_banner_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider_banner`
--

INSERT INTO `slider_banner` (`slider_id`, `slider_banner_name`, `slider_banner_image`, `slider_banner_size`, `slider_banner_timestamp`) VALUES
(1, 'Slider banner 1', 'fde175f619e77421c3df880f9e427ce3a8d09ab8.png', '1230 by 425', '2022-03-28 16:10:54'),
(2, 'Slider banner 2', 'default.jpg', '1230 by 425', '2022-03-25 14:11:02'),
(3, 'Slider banner 3', 'default.jpg', '1230 by 425', '2022-03-25 14:11:22');

-- --------------------------------------------------------

--
-- Table structure for table `top_banner`
--

CREATE TABLE `top_banner` (
  `top_banner_id` int(11) NOT NULL,
  `top_banner_name` varchar(255) NOT NULL DEFAULT 'top-banner',
  `top_banner_image` varchar(255) NOT NULL,
  `top_banner_size` varchar(10) NOT NULL DEFAULT '1200x80',
  `top_banner_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cookies_session` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `active`, `email`, `password`, `cookies_session`, `timestamp`) VALUES
(1, 1, 'test@gmail.com', 'password', '546b1ead3cbf6e423fef87bff0c575ef', '2022-03-25 17:01:54');

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
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products_categories`
--
ALTER TABLE `products_categories`
  MODIFY `products_categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
