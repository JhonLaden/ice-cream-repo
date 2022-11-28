-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 11:04 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ice_cream`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `icon`, `quantity`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Dessert', '<i class=\'bx bxs-lemon\'></i>', 13, '#cfdddb', '2022-11-24 07:23:40', '2022-11-24 07:23:40'),
(2, 'Popsicle', '<i class=\'bx bxs-popsicle\'></i>', 16, '#e4cdee', '2022-11-25 22:56:17', '2022-11-25 22:56:17'),
(3, 'Sundae', '<i class=\'bx bxs-sun\'></i>', 14, '#c2dbe9', '2022-11-25 22:56:17', '2022-11-25 22:56:17'),
(4, 'Breakfast', '<i class=\'bx bxs-baguette\' ></i>', 12, '#c9caee', '2022-11-25 22:57:38', '2022-11-25 22:57:38'),
(5, 'Cup', '<i class=\'bx bxs-cylinder\'></i>', 10, '#fac1d9', '2022-11-25 22:57:38', '2022-11-25 22:57:38'),
(6, 'Scoops', '<i class=\'bx bxs-bowl-rice\' ></i>', 12, '#e6dade', '2022-11-25 22:58:22', '2022-11-25 22:58:22'),
(7, 'Bar', '<i class=\'bx bxs-rectangle\' ></i>', 12, '#f0c8cf', '2022-11-25 22:58:22', '2022-11-25 22:58:22'),
(8, 'Cone', '<i class=\'bx bxs-drink\' ></i>', 11, '#c2e9de', '2022-11-25 22:58:48', '2022-11-26 04:37:55');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `category` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `isDeleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `quantity`, `price`, `category`, `created_at`, `updated_at`, `isDeleted`) VALUES
(1, 'Vanilla', 0, 15, 1, '2022-11-24 07:27:35', '2022-11-28 10:09:16', 0),
(2, 'Cookie', 0, 25, 1, '2022-11-24 07:44:25', '2022-11-28 10:09:16', 0),
(3, 'Wallnut', 0, 35, 1, '2022-11-24 07:45:48', '2022-11-28 10:09:16', 0),
(4, 'Strawberry', 0, 25, 1, '2022-11-24 07:47:29', '2022-11-28 10:09:16', 0),
(5, 'Chocolate', 0, 40, 1, '2022-11-24 07:47:29', '2022-11-28 10:09:16', 0),
(6, 'Watermelon', 0, 10, 1, '2022-11-24 07:48:27', '2022-11-28 10:09:16', 0),
(7, 'Coffee', 0, 20, 1, '2022-11-24 07:48:27', '2022-11-28 10:09:16', 0),
(8, 'Caramel', 0, 35, 1, '2022-11-24 07:49:06', '2022-11-28 10:09:16', 0),
(11, 'Popzen', 0, 35, 2, '2022-11-26 03:27:23', '2022-11-28 10:09:16', 0),
(12, 'Chocolate Pop', 0, 50, 2, '2022-11-26 03:27:23', '2022-11-28 10:09:16', 0),
(13, 'Jolly', 0, 25, 2, '2022-11-26 03:29:44', '2022-11-28 10:09:16', 0),
(14, 'Pop Ice', 0, 20, 2, '2022-11-26 03:29:44', '2022-11-28 10:09:16', 0),
(15, 'Blue Pop', 0, 10, 2, '2022-11-26 03:31:52', '2022-11-28 10:09:16', 0),
(16, 'Icy Pole', 0, 20, 2, '2022-11-26 03:31:52', '2022-11-28 10:09:16', 0),
(17, 'Ice Drop', 0, 10, 2, '2022-11-26 03:34:08', '2022-11-28 10:09:16', 0),
(18, 'Melony', 0, 20, 2, '2022-11-26 03:34:08', '2022-11-28 10:09:16', 0),
(19, 'Belly Salty', 0, 50, 3, '2022-11-26 03:36:11', '2022-11-28 10:39:58', 0),
(20, 'Snackers', 0, 60, 3, '2022-11-26 03:36:11', '2022-11-28 10:09:16', 0),
(21, 'Iced Cinamon', 0, 45, 3, '2022-11-26 03:38:00', '2022-11-28 10:09:16', 0),
(22, 'Honey Pretzel', 0, 65, 3, '2022-11-26 03:38:00', '2022-11-28 10:09:16', 0),
(23, 'Trail Mix', 0, 35, 3, '2022-11-26 03:39:06', '2022-11-28 10:09:16', 0),
(24, 'Sundae Brunch', 0, 65, 3, '2022-11-26 03:39:06', '2022-11-28 10:09:16', 0),
(25, 'Crisp Rice', 0, 90, 3, '2022-11-26 03:40:19', '2022-11-28 10:09:16', 0),
(27, 'Coffee & Cream', 0, 25, 4, '2022-11-26 03:43:28', '2022-11-28 10:09:16', 0),
(28, 'Brambleberry', 0, 40, 4, '2022-11-26 03:43:28', '2022-11-28 10:09:16', 0),
(29, 'Cinnamon Roll', 0, 15, 4, '2022-11-26 03:44:46', '2022-11-28 10:09:16', 0),
(30, 'Wildberry', 0, 40, 4, '2022-11-26 03:44:46', '2022-11-28 10:09:16', 0),
(31, 'Maple Soaked', 0, 35, 4, '2022-11-26 03:46:58', '2022-11-28 10:09:16', 0),
(32, 'Butter Cake', 0, 50, 4, '2022-11-26 03:46:58', '2022-11-28 10:09:16', 0),
(33, 'Cereal Milk', 0, 25, 4, '2022-11-26 03:49:57', '2022-11-28 10:09:16', 0),
(34, 'Blueberry Muffin', 0, 65, 4, '2022-11-26 03:49:57', '2022-11-28 10:09:16', 0),
(35, 'Classic Chocolate', 0, 50, 5, '2022-11-26 03:53:16', '2022-11-28 10:09:16', 0),
(36, 'Strawberries Cream', 0, 40, 5, '2022-11-26 03:53:16', '2022-11-28 10:09:16', 0),
(37, 'Berry Cup', 0, 15, 5, '2022-11-26 03:57:39', '2022-11-28 10:39:58', 0),
(38, 'Honey Lavender', 0, 10, 5, '2022-11-26 03:57:39', '2022-11-28 10:09:16', 0),
(39, 'Rose', 0, 25, 5, '2022-11-26 04:00:42', '2022-11-28 10:09:16', 0),
(40, 'Blueberry Pie', 0, 50, 5, '2022-11-26 04:00:42', '2022-11-28 10:09:16', 0),
(41, 'Blackberry', 0, 20, 5, '2022-11-26 04:01:33', '2022-11-28 14:47:12', 0),
(42, 'Mango', 0, 35, 5, '2022-11-26 04:01:33', '2022-11-28 10:09:16', 0),
(43, 'Pineapple', 0, 60, 6, '2022-11-26 04:07:41', '2022-11-28 10:09:16', 0),
(44, 'True Love', 0, 100, 6, '2022-11-26 04:07:41', '2022-11-28 10:09:16', 0),
(45, 'Merry Berry', 0, 40, 6, '2022-11-26 04:26:46', '2022-11-28 10:09:16', 0),
(46, 'Night Mare', 0, 35, 6, '2022-11-26 04:26:46', '2022-11-28 10:09:16', 0),
(47, 'Sunset Glow', 0, 45, 6, '2022-11-26 04:27:45', '2022-11-28 10:09:16', 0),
(48, 'Titanic', 0, 40, 6, '2022-11-26 04:27:45', '2022-11-28 10:09:16', 0),
(49, 'Mocha', 0, 25, 6, '2022-11-26 04:29:52', '2022-11-28 10:09:16', 0),
(50, 'Rocky Road', 0, 35, 6, '2022-11-26 04:29:52', '2022-11-28 10:09:16', 0),
(51, 'Choco Truffle', 0, 50, 7, '2022-11-26 04:33:20', '2022-11-28 10:09:16', 0),
(52, 'Choco Fudge', 0, 40, 7, '2022-11-26 04:33:20', '2022-11-28 10:09:16', 0),
(53, 'Snickers', 0, 15, 7, '2022-11-26 04:35:11', '2022-11-28 10:09:16', 0),
(54, 'Caramel Bar', 0, 40, 7, '2022-11-26 04:35:11', '2022-11-28 14:47:12', 0),
(55, 'Mocha Latte', 0, 25, 7, '2022-11-26 04:36:26', '2022-11-28 10:09:16', 0),
(56, 'Krunch', 0, 35, 7, '2022-11-26 04:36:26', '2022-11-28 10:47:29', 0),
(57, 'Mango Bar', 0, 25, 7, '2022-11-26 04:40:12', '2022-11-28 10:09:16', 0),
(58, 'Peanut Butter', 0, 15, 7, '2022-11-26 04:40:12', '2022-11-28 10:09:16', 0),
(59, 'Espresso', 0, 35, 8, '2022-11-26 04:43:58', '2022-11-28 10:09:16', 0),
(60, 'Berryfruit', 0, 20, 8, '2022-11-26 04:43:58', '2022-11-28 10:09:16', 0),
(61, 'Lime Sherbet', 0, 15, 8, '2022-11-26 04:45:06', '2022-11-28 10:09:16', 0),
(62, 'Dark Chocolate', 0, 50, 8, '2022-11-26 04:45:06', '2022-11-28 10:09:16', 0),
(63, 'Hazelnut', 0, 25, 8, '2022-11-26 04:46:56', '2022-11-28 10:09:16', 0),
(64, 'Chunk Cookie', 0, 40, 8, '2022-11-26 04:46:56', '2022-11-28 10:09:16', 0),
(65, 'Pistachio', 0, 45, 8, '2022-11-26 04:48:38', '2022-11-28 10:09:16', 0),
(66, 'Panna Cotta', 0, 20, 8, '2022-11-26 04:48:38', '2022-11-28 10:09:16', 0),
(75, 'Banana Split', 0, 50, 3, '2022-11-28 10:24:22', '2022-11-28 10:45:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `email` varchar(255) NOT NULL,
  `isDelete` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `password`, `type`, `created_at`, `updated_at`, `email`, `isDelete`) VALUES
(1, 'Jhon Laden', 'Adjaluddin', 'jhon', 'jhon', 'Admin', '2022-11-28 13:22:30', '2022-11-28 14:59:27', 'jhonladen@wmsu.com', 0),
(2, 'Zcsalweemnhar', 'Bandahala', 'zach', 'zach', 'Cashier', '2022-11-28 14:37:46', '2022-11-28 14:37:46', 'zach@wmsu.com', 0),
(6, 'jhon', 'adjaluddin', 'jaydee', 'jaydee', 'jaydee', '2022-11-28 17:39:28', '2022-11-28 17:54:37', 'bg201802674@wmsu.edu.ph', 1),
(7, 'jche', 'mancao', 'che', 'che', 'Admin', '2022-11-28 18:05:14', '2022-11-28 18:05:48', 'bg201802674@wmsu.edu.ph', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category FK` (`category`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `category FK` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
