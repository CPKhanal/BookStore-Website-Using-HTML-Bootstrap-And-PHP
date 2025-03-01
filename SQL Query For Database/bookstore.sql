-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2025 at 01:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$mBHNyNHdu.t9sdHMLI2Wyu7l93BeUTfPi4OO8smJ1myvgaDCd.xPC');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `message`, `date`) VALUES
(14, 'cp', 'cpkhanal0@gmail.com', 'hi', '2025-02-06 01:41:36'),
(15, 'Hi Boss', 'hi@gmail.com', 'This is test 1 check ing the dashboard\r\n', '2025-02-28 23:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `order_manager`
--

CREATE TABLE `order_manager` (
  `Order_Id` int(100) NOT NULL,
  `Full_Name` text NOT NULL,
  `Phone_No` bigint(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Pay_Mode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_manager`
--

INSERT INTO `order_manager` (`Order_Id`, `Full_Name`, `Phone_No`, `Address`, `Pay_Mode`) VALUES
(7, 'cp', 12, 'dd', 'COD'),
(8, 'cp test', 1234, '12bddbbd', 'COD'),
(9, 'this is test1', 7777777777, 'this is test1', 'COD'),
(10, 'birendra', 111111111, 'abc', 'COD');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`id`, `email`, `name`, `password`, `created_at`) VALUES
(161, 'cp@gmail.com', '', '$2y$10$tEcWnktxeGaxX1ADrA/pOuX6r7euuJpPi0rtyITVowq', '2025-02-06 01:43:29'),
(162, 'cp@gmail.com', '', '$2y$10$3zx/ydU3ALwRBIbcUWEaIupkpHAFYUCc6zGo6GBv/56', '2025-02-06 01:43:36'),
(163, 'cp@gmail.com', '', '$2y$10$P1m.6mh1kCF9yfwxeab5z.0flzhslvpufPqo0vjNxYo', '2025-02-06 01:44:00'),
(164, 'yangyung069@gmail.com', '', '$2y$10$w5z6.FuNF/zjK7vMHgOmpeP8YF3d/fm5p1Ezk40Gwcx', '2025-02-06 01:45:43'),
(165, 'yangyung069@gmail.com', '', '$2y$10$tgpB/pan7pqsvvbWG2msGet8nwN9hQtNEZqdExNXR/5', '2025-02-06 01:46:50'),
(166, 'test1@gmail.com', '', '$2y$10$WjSaV0GP7lH31dDWmpczP.huCwDavfWd2J1JGNFgleW', '2025-02-06 01:47:33'),
(167, 'test1@gmail.com', '', '$2y$10$GdXitzoQmrtZCCA4lsNaDu1gDwMfjiUkA3JpVeNr5Ca', '2025-02-06 02:03:14'),
(168, 'test1@gmail.com', '', '$2y$10$0eZFbY7yCTzG9Au8YuJHse1KLxUuFBNHvIxzC0RyYY2', '2025-02-06 02:03:43'),
(169, 'test1@gmail.com', '', '$2y$10$TuWhNAY5Ji8UqddMdjdiS.PmQO.fm4vKOOF9gucV/ga', '2025-02-06 02:04:07'),
(170, 'test1@gmail.com', '', '$2y$10$Iny83AnTtgnD9tTE8n5jAuK.XA1QQgj9NBlWhMlYEPa', '2025-02-06 02:04:19'),
(171, 'test1@gmail.com', '', '$2y$10$PmsRIiY4yUjA881R9HH3XeBienbcKyX0At2vPxQrlC1', '2025-02-06 02:04:29'),
(172, 'test1@gmail.com', '', '$2y$10$XSc4oInJawjCP1QwS29eV.u7aJO1WWDYaEhLZheO6uC', '2025-02-06 02:08:35'),
(173, 'test1@gmail.com', '', '$2y$10$ani./W55FcAiq6ND1KpaF.T0wcDCVaiekme9OEP1JVj', '2025-02-06 02:29:23'),
(174, 'test1@gmail.com', '', '$2y$10$P5jbemeTq9SMXkC8lARcUub5NXPQviCBi2ZJb5Oy3im', '2025-02-06 02:30:10');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `Order_Id` int(100) NOT NULL,
  `Item_Name` varchar(100) NOT NULL,
  `Price` int(100) NOT NULL,
  `Quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`Order_Id`, `Item_Name`, `Price`, `Quantity`) VALUES
(7, 'Can\'t Hurt Me', 40, 1),
(7, 'Harry Potter', 45, 5),
(7, 'The Psychology of Money', 50, 1),
(8, 'Can\'t Hurt Me', 40, 1),
(8, 'How to Win Friends and Influence People', 55, 1),
(8, 'The Subtle Art of Not Giving a Fuck', 60, 1),
(8, 'The Magic', 60, 1),
(9, 'The Mountain is You', 60, 1),
(9, 'The Power of Discipline', 60, 1),
(10, 'The Courage to be Disliked', 40, 1),
(10, 'The Subtle Art of Not Giving a Fuck', 60, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_manager`
--
ALTER TABLE `order_manager`
  ADD PRIMARY KEY (`Order_Id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_manager`
--
ALTER TABLE `order_manager`
  MODIFY `Order_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
