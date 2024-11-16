-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2024 at 12:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `publication_year` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `genre`, `publication_year`, `price`, `created_at`) VALUES
(3, 'IT', 'OUSL', 'FNS', 2006, 250.00, '2024-11-15 19:24:59'),
(4, 'Physical', 'OUSL', 'FNS', 2005, 500.00, '2024-11-15 19:57:51');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `customer_email`, `total_amount`, `order_date`) VALUES
(1, 'Customer Name', 'customer@example.com', 1750.00, '2024-11-15 21:03:46'),
(2, NULL, NULL, 750.00, '2024-11-15 21:40:57'),
(3, 'M.R.H.R.Karunarathna', 'hasa.ict@gmail.com', 250.00, '2024-11-15 21:41:26'),
(4, 'M.R.H.R.Karunarathna', 'typesetting.2004@gmail.com', 1250.00, '2024-11-15 21:42:59'),
(5, 'hasitha r', 'typesetting.2004@gmail.com', 750.00, '2024-11-15 22:01:20'),
(6, 'M.R.H.R.Karunarathna', 'hasa.ict@gmail.com', 250.00, '2024-11-15 22:01:53'),
(7, 'M.R.H.R.Karunarathna', 'hasa.ict@gmail.com', 250.00, '2024-11-15 22:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `book_id`, `quantity`) VALUES
(1, 1, 3, 1),
(2, 1, 4, 3),
(3, 2, 3, 1),
(4, 2, 4, 1),
(5, 3, 3, 1),
(6, 4, 3, 1),
(7, 4, 4, 2),
(8, 5, 3, 1),
(9, 5, 4, 1),
(10, 6, 3, 1),
(11, 7, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `role`, `created_at`) VALUES
(1, 'hasitha', 'typesetting.2003@gmail.com', '0761091696', '$2y$10$8IvYe5MmHxWXo3JBxMDCBOzFR9NLuk.MDd7Hz8ooh7QSptBPExN36', 'admin', '2024-11-10 14:10:13'),
(2, 'M.R.H.R.Karunarathna', 'hasitha.ict@gmail.com', '0761091696', '$2y$10$JHO8XCDD/6Z3MfD5w91wsuAAHRQn50.kfnXNQNMFmHss1MHN7mH3S', 'admin', '2024-11-12 13:32:37'),
(3, 'M.R.H.R.Karunarathna', 'hasa.ict@gmail.com', '0761091696', '$2y$10$jcp5.P3L1yFls7/GEQo7vOoaBO9TOHU1B/2ZXkCes9l91KsJqTgoq', 'user', '2024-11-15 18:47:14'),
(4, 'hasitha r', 'typesetting.2004@gmail.com', '0761091696', '$2y$10$28Cjt8GkbJtp0jrP89w0HeHPi56xvW619ttbLWKz5reh5nR.BTzpS', 'user', '2024-11-15 21:42:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `book_id` (`book_id`);

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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
