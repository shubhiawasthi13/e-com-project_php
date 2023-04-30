-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2023 at 02:33 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_register`
--

CREATE TABLE `admin_register` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_image` varchar(255) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_register`
--

INSERT INTO `admin_register` (`admin_id`, `admin_name`, `admin_email`, `admin_image`, `admin_password`) VALUES
(1, 'shubhi awasthi', 'awasthi@gmail.com', 'image.webp', '$2y$10$vPAYUAIqFW6c5sI2Sg4P1ugOHQJwq1tQ3.MjuugJ6G1UEjN5f.v1K');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'swigy'),
(2, 'Zomato'),
(3, 'Mc Donalds'),
(4, 'Nike'),
(5, 'Flipcart');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Fruits'),
(2, 'Milk Products'),
(3, 'Books'),
(4, 'Vegetables'),
(5, 'Clothes'),
(7, 'Goggles'),
(8, 'shoes');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 1, 733485545, 3, 1, 'pending'),
(2, 1, 1619730695, 4, 1, 'pending'),
(3, 2, 1295787008, 4, 1, 'pending'),
(4, 2, 695489808, 2, 1, 'pending'),
(5, 3, 355522996, 4, 1, 'pending'),
(6, 3, 360731687, 4, 1, 'pending'),
(7, 3, 1614884005, 4, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(2, ' Apples', 'An apple a day keep doctor away. please try it', 'apple,fresh apple', 1, 1, 'th.jpg', 'th (3).jpg', 'th (2).jpg', 200, '2022-11-06 11:07:47', 'true'),
(3, 'Capsicum', 'Capsicum is very good for health. we serve best of ', 'capsicum,green capsicum.red capsicum', 4, 1, 'th (4).jpg', 'Capsicum-KG.jpg', 'th (5).jpg', 150, '2022-10-21 09:32:47', 'true'),
(4, 'Dairy milk', 'Milk is nutirent-rich liquid food', 'dairy milk,fresh mlk', 2, 1, '12000190-big.jpg', 'th (1).jpg', 'th (6).jpg', 250, '2022-10-21 09:39:36', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `users_order`
--

CREATE TABLE `users_order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_order`
--

INSERT INTO `users_order` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(1, 1, 350, 733485545, 2, '2022-11-03 14:37:26', 'Complete'),
(2, 1, 250, 1619730695, 1, '2022-11-03 14:27:42', 'Complete'),
(3, 2, 250, 1295787008, 1, '2022-12-15 12:29:02', 'Complete'),
(4, 2, 200, 695489808, 1, '2022-12-15 12:30:04', 'Complete'),
(5, 2, 0, 422425687, 0, '2022-12-15 12:30:13', 'Complete'),
(6, 3, 450, 355522996, 2, '2023-01-13 14:15:41', 'Complete'),
(7, 3, 450, 360731687, 2, '2023-04-09 14:36:05', 'pending'),
(8, 3, 250, 1614884005, 1, '2023-04-09 14:37:30', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users_payment`
--

CREATE TABLE `users_payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_payment`
--

INSERT INTO `users_payment` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(1, 2, 1619730695, 250, 'Net banking', '2022-11-03 14:27:42'),
(2, 1, 733485545, 350, 'Net banking', '2022-11-03 14:37:26'),
(3, 3, 1295787008, 250, 'Cash on delivery', '2022-12-15 12:29:02'),
(4, 4, 695489808, 200, 'Cash on delivery', '2022-12-15 12:30:04'),
(5, 5, 422425687, 0, 'Cash on delivery', '2022-12-15 12:30:13'),
(6, 6, 355522996, 450, 'Cash on delivery', '2023-01-13 14:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(3, 'shubhi', 'awasthi@gmail.com', '$2y$10$gCoEWg68ma0.8ngl9Ez55uv5aZ9zit9fgPVmd2u0GnobvYvQJc7c2', 'images.png', '::1', 'kanpur', '1122334455'),
(4, 'namita awasthi', 'awasthinamita22@gmail.com', '$2y$10$4kUJKvodKSxJ.Vo0kFY0N.72TASPCgzlXU4qbrq55.4Pb1xzsv54C', '', '::1', 'delhi', '1122334455');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_register`
--
ALTER TABLE `admin_register`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users_order`
--
ALTER TABLE `users_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `users_payment`
--
ALTER TABLE `users_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_register`
--
ALTER TABLE `admin_register`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_order`
--
ALTER TABLE `users_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_payment`
--
ALTER TABLE `users_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
