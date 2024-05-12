-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 05:38 PM
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
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(5) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `product_id` int(5) NOT NULL,
  `quantity` int(5) NOT NULL,
  `total_amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(5) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_table`
--

CREATE TABLE `feedback_table` (
  `id` int(100) NOT NULL,
  `name` varchar(300) NOT NULL,
  `feedback` text NOT NULL,
  `date` int(100) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback_table`
--

INSERT INTO `feedback_table` (`id`, `name`, `feedback`, `date`) VALUES
(11, 'Rhovic', 'Its delicuois sadasdasdasd', 2147483647),
(12, 'Rhovic', 'asdasd', 2147483647),
(13, 'matt', 'WAHAHAHA', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(5) NOT NULL,
  `order_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `payment_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `order_id`, `product_id`, `payment_id`) VALUES
(13, 10, 111, 111);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(5) NOT NULL,
  `category_id` varchar(30) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `productprice` varchar(100) NOT NULL,
  `inventory` varchar(100) NOT NULL,
  `images` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `productname`, `description`, `productprice`, `inventory`, `images`) VALUES
(144, 'Burgers', 'Pattie cheese', 'Yummy', '400', '10', 'images/7fa89c7c17994b25a90b3283d38ae580chickenBurger (1).png'),
(145, 'Wings', 'Chilli Crispy', 'Hot and Crispy!', '290', '10', 'images/908ad166465f99b836c28e6105e7fd42chili (1).png'),
(146, 'Drinks', 'Coke', 'Refreshing!', '50', '10', 'images/2b8b57f62ee37de5fb36c72251280dd1coke (1).png'),
(147, 'Sides', 'Curly Fries', 'Twisty', '70', '10', 'images/7dee54348fbf039feea54b8c5306ca1ecurly (1).png'),
(148, 'Drinks', 'Fanta', 'Orangie', '49', '10', 'images/041473ccc72d0ee3da907bc0af9b88fafanta (1).jpg'),
(149, 'Sides', 'Salty Fries', 'Original Flavour', '65', '10', 'images/fd2cfa6375e3e4c41a5a92cd121dd49bfries (1).png'),
(150, 'Deserts', 'Vanilla ', 'Super Sweet!', '25', '10', 'images/d2ffe48eddccb8f4e7682dd0403a4ab9icecream (1).png'),
(151, 'Deserts', 'Mousse', 'Chocolaty!', '35', '10', 'images/6e1b1db9145af5c69ab4dbbad0b33817mousse (1).png'),
(152, 'Sides', 'Onion Rings', 'Deep it!', '90', '10', 'images/3b788cfcbd7ee4815a58617b58180852onionrings (1).png'),
(153, 'Wings', 'Regular Original Flavor', 'Crunchy and Crispy!', '250', '10', 'images/05ba6300fcdc52fa5c9ec096a79c4629regular (1).jpg'),
(154, 'Wings', 'Super Spicy', 'Hot!', '270', '10', 'images/6c5855a1ce7e150c39514f82d5d22cc7spicy (1).png'),
(155, 'Drinks', 'Sprite', 'Cool!', '51', '10', 'images/bd703a68bb217a6335fa4ea8c44ea818sprite (1).png'),
(156, 'Burgers', 'Vegie Patie', 'Juicylicius!', '420', '10', 'images/0a0185d94acc6e564a3c679860745404sunburger (1).png'),
(157, 'Deserts', 'Tiramisu', 'Sweet and Cold', '109', '10', 'images/b922a859952e6dd4fcc22da20632ba43tiramisu (1).png');

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `order_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `cart_id` int(5) NOT NULL,
  `total_amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`order_id`, `user_id`, `cart_id`, `total_amount`) VALUES
(111, 111, 111, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `email`, `password`) VALUES
(40, 'Sirius_A26', 'asdawed@gmail.com', '$2y$10$yh6qOOPebxa9K9bftXr6oegFgqnE2YvBNPc/a8GgUKgXMZqXBvOly'),
(41, 'Gshock', 'qmmarcelo01@tip.edu.ph', '$2y$10$neg5ufiggs/SUmt4Nva8Aup.4SKRzMBQE9sb2umP7l.YRqInZ1zdm'),
(42, 'ayoko', 'migsmarcelo83@gmail.com', '$2y$10$W9KZtt1mos07Jh9OnKU1WeS4QBLtyoETbCXNFoRShmh/gTvIcP2Oa');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_table`
--
ALTER TABLE `feedback_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_id` (`id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `feedback_table`
--
ALTER TABLE `feedback_table`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
