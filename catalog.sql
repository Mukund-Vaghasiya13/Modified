-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2024 at 10:04 AM
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
-- Database: `catalog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `image`, `name`) VALUES
(28, '../CatagoeryUplods/360_F_176975606_NENcObythCwyPxA6n5vSKxwc8lVLa3In.jpg', 'Electronics'),
(29, '../CatagoeryUplods/books-1204029_640.jpg', 'Books'),
(30, '../CatagoeryUplods/61ESEPGpJPL._SX679_.jpg', 'watches'),
(34, '../CatagoeryUplods/61eC6QIQ+6L._AC_UL320_.jpg', 'Toys'),
(35, '../CatagoeryUplods/footwear._SS300_QL85_FMpng_.png', 'FootWare'),
(36, '../CatagoeryUplods/71NIJk6HjrL._AC_SR480,570_.jpg', 'Computer Parts');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'pending',
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `status`, `order_date`) VALUES
(1, 3, '999.00', 'pending', '2024-09-24 13:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_name`, `price`) VALUES
(1, 1, 'AirpodMax', '999.00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productimage` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productimage`, `name`, `price`, `category_id`) VALUES
(60, '../uploads/airpods-max-in-black.jpg', 'Apple Airpod Max', '999.00', 28),
(61, '../uploads/iphone15pro.jpeg', 'iPhone15pro', '999.00', 28),
(62, '../uploads/ca1ade8c-5ebb-49d3-8b6d-de87d1353e4f22220640_416x416.jpg', 'Boat', '999.00', 28),
(63, '../uploads/mackbook.jpeg', 'Macbook m3', '999.00', 28),
(64, '../uploads/NeoQled.jpg', 'NeoQLed 8k', '999.00', 28),
(65, '../uploads/samsungm21.jpg', 'Samsungs21', '999.00', 28),
(66, '../uploads/watch.png', 'Watch ultra', '999.00', 28),
(67, '../uploads/31293f45-7c8f-4605-ac1f-6a281802a6e5.__CR0,0,300,300_PT0_SX300_V1___.jpg', 'Ramayan', '10.00', 29),
(68, '../uploads/71D0EwijhNL._AC_UF1000,1000_QL80_.jpg', 'Chanakaya Neeti', '10.00', 29),
(69, '../uploads/81lOhiZO2CL._AC_UF1000,1000_QL80_.jpg', 'The Secret', '10.00', 29),
(70, '../uploads/71KKZlVjbwL._AC_UF1000,1000_QL80_.jpg', 'Wings of Fire', '10.00', 29),
(71, '../uploads/close-up-of-the-bhagavad-gita-BNFTCX.jpg', 'Bhagavad-Gita', '10.00', 29),
(72, '../uploads/61xhX3nzEBL._AC_UF1000,1000_QL80_.jpg', 'Swami Vivekanand', '10.00', 29),
(73, '../uploads/610efca2VyL._AC_UF1000,1000_QL80_.jpg', 'Mahabharat', '50.00', 29),
(74, '../uploads/31PkSJbWV3L.AC_SX250.jpg', 'Fastrack', '10.00', 30),
(75, '../uploads/41NdBBeBgkL.AC_SX250.jpg', 'Fastrack silver', '50.00', 30),
(76, '../uploads/41PZquLBbDL.AC_SX250.jpg', 'Titan', '50.00', 30),
(77, '../uploads/41uhGFB2nPL.AC_SX250.jpg', 'Quartz', '50.00', 30),
(78, '../uploads/51cJGQYfTSL.AC_SX250.jpg', 'Breclet', '10.00', 30),
(79, '../uploads/41bTLf3qy0L.AC_SX250.jpg', 'Rider', '50.00', 34),
(80, '../uploads/41SMFsDvi2L.AC_SX250.jpg', 'Soft Toy', '50.00', 34),
(81, '../uploads/41-3p79ueuL.AC_SX250.jpg', 'Remote Car', '10.00', 34),
(82, '../uploads/41aHnwL-hRL.AC_SX250.jpg', 'Slide', '50.00', 34),
(83, '../uploads/413Ystx8aoL.AC_SX250.jpg', 'Nerf', '50.00', 34),
(84, '../uploads/51pNXXFChqL.AC_SX250.jpg', 'Uno cards', '50.00', 34),
(85, '../uploads/515N2Got1BL.AC_SX250.jpg', 'Gloab', '50.00', 34),
(86, '../uploads/81K562wi+bL._SX522_.jpg', 'Louis Devin', '50.00', 30),
(87, '../uploads/51-CObvtVsL._AC_UL320_.jpg', 'Puma', '50.00', 35),
(88, '../uploads/71Als4wFYJL._AC_UL320_.jpg', 'Sports', '50.00', 35),
(89, '../uploads/61fcVae7y9S._AC_UL320_.jpg', 'Abibas Sport', '99.00', 35),
(90, '../uploads/41035zzA7gL._AC_UL320_.jpg', 'Puma Plain White', '999.00', 35),
(91, '../uploads/GIANNIS+FREAK+6+TB+EP.png', 'Giannis', '50.00', 35),
(92, '../uploads/NIKE+ZOOM+VOMERO+5.png', 'Vomero', '50.00', 35),
(93, '../uploads/NIKE+CORTEZ.png', 'Cortez', '50.00', 35),
(94, '../uploads/51qu8mNXlTL._AC._SR360,460.jpg', 'Type c', '10.00', 36),
(95, '../uploads/61tPYsj5cGL._AC_SR480,570_.jpg', 'Hub 6 in 1', '50.00', 36),
(96, '../uploads/61OmKcFeFkL._AC._SR360,460.jpg', 'Hdmi', '50.00', 36),
(97, '../uploads/51yjnWJ5urL._AC._SR360,460.jpg', 'Logitech', '50.00', 36),
(98, '../uploads/61qm452yy-L._AC._SR360,460.jpg', 'Logitech Mouse', '10.00', 36),
(100, '../uploads/51cBP0cdI-L._AC._SR360,460.jpg', 'sadisk', '50.00', 36),
(101, '../uploads/617EOdxqj9L._AC._SR360,460.jpg', 'hp flash drive', '20.00', 36);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userType` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `userType`, `address`) VALUES
(1, 'mukund', 'mukund', 'admin', 'admin'),
(2, 'abc', 'abc', 'user', 'xyz adress'),
(3, 'test', 'test', 'user', 'test'),
(4, 'samay', 'samay', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
