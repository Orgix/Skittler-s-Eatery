-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2019 at 10:05 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skittlers`
--
CREATE DATABASE IF NOT EXISTS `skittlers` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `skittlers`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_row` int(255) NOT NULL,
  `user` int(255) NOT NULL,
  `item_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_row`, `user`, `item_id`) VALUES
(83, 22, 12),
(84, 22, 6),
(85, 21, 15),
(86, 21, 44),
(87, 21, 42);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'Pizza'),
(2, 'Burgers'),
(3, 'Sandwich'),
(4, 'Kebab'),
(5, 'Refreshments'),
(6, 'Extras');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_first_name` varchar(45) DEFAULT NULL,
  `user_last_name` varchar(45) DEFAULT NULL,
  `user_email` varchar(45) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_tel` varchar(45) DEFAULT NULL,
  `user_address` varchar(100) DEFAULT NULL,
  `date_registered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`user_id`, `username`, `user_first_name`, `user_last_name`, `user_email`, `user_password`, `user_role`, `user_tel`, `user_address`, `date_registered`) VALUES
(21, '12324412', 'queryDemon', '123', 'tn3@gmail.com', '$2y$10$YDyp/kXxvBZkbRhYHNwg7edQH5P0oZJgv6.s0/mSqQTtRtWGdZTEi', 'user', NULL, NULL, '2019-01-17 21:57:11'),
(22, 'DisasterBill', 'Basileios', 'Tito', 'basilis2tito2@gmail.com', '$2y$10$SvIQDeJG.wefooVToFceKekS4aiWOQCqbOO8HtRMnTs2rbW.UylVm', 'Admin', NULL, NULL, '2019-01-17 22:00:12'),
(23, 'Orgix', 'Nikolaos', 'Tsoynias', 'tnikos28@gmail.com', '$2y$10$.WTMDcCfmql5Ycm7V1r2M.6GLkEkQ1Ui1tD5aPuv2RY09LeZktlOy', 'Admin', NULL, NULL, '2019-01-20 23:04:58');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(255) NOT NULL,
  `Item_name` varchar(45) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `Description` varchar(150) DEFAULT NULL,
  `Cost` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `Item_name`, `category_id`, `Description`, `Cost`) VALUES
(1, '4 Cheese Pizza', 1, 'Pizza sauce, Gouda, Mozzarella, Edam, Cheddar', 8.2),
(2, 'Amstel  330ml', 5, 'Beer', 1.6),
(3, 'Amstel  500ml', 5, 'Beer', 2),
(4, 'Bacon Cheeseburger', 2, 'Beef patty, Gouda, Bacon, Sesame seed bun, Pickles, Ketchup, Mustard', 4.2),
(5, 'BBQ Bacon Burger', 2, 'Beef patty, Special beef patty, BBQ sauce, Lettuce, Fresh tomato, Red onions, Gouda, Mayonnaise, Sesame seed bun, Bacon', 5.1),
(6, 'BBQ Chicken Pizza', 1, ' BBQ sauce, Mozzarella, Chicken, Fresh mushrooms', 8.5),
(7, 'BBQ Chicken sandwich', 3, ' Mayonnaise, Ketchup, Red onions, Mustard, Black pepper, Butter, Pickles, BBQ sauce, Chicken', 6.8),
(8, 'BBQ Sauce', 6, ' BBQ Sauce', 0.78),
(9, 'BBQ Wings', 6, 'BBQ Wings', 2.5),
(10, 'Beef Bacon Burger', 2, 'Beef patty, Lettuce, Fresh tomato, Mayonnaise, Edam, Mustard', 4.6),
(11, 'Buffalo Wings', 6, 'Buffalo Wings', 2.8),
(12, 'Caesar\'s Pizza', 1, ' Gouda, Chicken, Bacon, Caesar\'s sauce, Parsley', 8),
(13, 'Carbonara', 1, 'White sauce, Bacon, Parsley, Parmesan, Rigatoni pasta', 8.9),
(14, 'Cheeseburger', 2, 'Beef patty, Gouda, Sesame seed bun, Pickles, Ketchup, Mustard', 3),
(15, 'Chicken & Bacon Pizza', 1, 'Pizza sauce, Chicken, Bacon, Gouda, Fresh tomato, Red onions', 8),
(16, 'Chicken Caesar sandwich', 3, ' Caesar\'s sauce, Chicken, Parmesan, Lettuce, Butter', 5.9),
(17, 'Chicken Nugget Burger', 2, ' Chicken nugget, Lettuce, Fresh tomato, Grated cheese, Mayonnaise', 4.4),
(18, 'Chicken Nugget Sandwich', 3, ' Chicken nugget, Cabbage, Ketchup, Mayonnaise, Fresh tomato', 5.6),
(19, 'Chicken Nuggets', 6, 'Chicken Nuggets', 2.2),
(20, 'Chicken Parm Sandwich', 3, ' Chicken, Parmesan, Fresh basil, Eggs, Black pepper', 4.7),
(21, 'Chicken Salad Sandwich', 3, ' Chicken, Red onions, Mayonnaise, Mustard, Black pepper, Lettuce, Celery stalks', 5),
(22, 'Chicken Wings', 6, 'Chicken Wings', 2),
(23, 'Chili Burger', 2, 'Beef patty, Lettuce, Fresh tomato, Pickles, BBQ sauce, Cheddar', 4.5),
(24, 'Club Sandwich', 3, ' White bread, Mayonnaise, Lettuce, Fresh tomato, Black pepper, Bacon, Sliced turkey', 6.1),
(25, 'Coca cola  1,5lt', 5, 'Coca cola', 2),
(26, 'Coca cola 330ml', 5, 'Coca cola', 1.1),
(27, 'Coca cola 500ml', 5, 'Coca cola', 1.5),
(28, 'Cuban Sandwich', 3, ' Cuban bread, Pickles, Sliced ham, Chedar, Mustard', 5.5),
(29, 'Dip Sauce', 6, 'Dip Sauce', 0.78),
(30, 'Double Hot Beef Burger', 2, 'Beef patty, Special beef patty, Lettuce, Fresh tomato, Red onions, Mayonnaise, Sesame seed bun, Ketchup', 5.4),
(31, 'Fanta blue 330ml', 5, 'Fanta', 1.1),
(32, 'Fanta blue 500ml', 5, 'Fanta', 1.5),
(33, 'Fanta red 330ml', 5, 'Fanta', 1.1),
(34, 'Fanta red 500ml', 5, 'Fanta', 1.5),
(35, 'Garlic Knots', 6, 'Garlic Knots', 2.5),
(36, 'Garlic Sauce', 6, ' Garlic Sauce', 0.7),
(37, 'Giant sandwich', 3, ' Mayonnaise, Butter, Bacon, Chedar, Black pepper, Sesame seeds, Eggs, Special bread loaf', 7),
(38, 'Golden burger', 2, 'Beef patty, Lettuce, Fresh tomato, Ketchup, Grated cheese, Sesame seed bun', 4),
(39, 'Greek Pizza', 1, 'Pizza sauce, Mozzarella, Pepperoni, Feta, Red onions, Fresh tomato, Black olives', 8.5),
(40, 'Greek Yogurt Sandwich', 3, ' Eggs, Greek yogurt, Mayonnaise, Fresh tomato, Black pepper, Avocado', 6),
(41, 'Green burger', 2, 'Beef patty, Lettuce, Red onions, Pickles, Ketchup, Gouda', 4),
(42, 'Ham & Bacon Pizza', 1, 'Pizza sauce, Sliced ham, Bacon, Black olives, Mozzarella', 8.6),
(43, 'Hamburger', 2, 'Beef patty, Sesame seed bun, Pickles, Ketchup, Mustard', 3.7),
(44, 'Hawaian Pizza', 1, 'Pizza sauce, Sliced ham, Gouda, Pineapple', 7.5),
(45, 'Heineken 330ml', 5, 'Beer', 1.6),
(46, 'Heineken 500ml', 5, 'Beer', 2),
(47, 'Hot Beef Burger', 2, ' Special beef patty, Lettuce, Fresh tomato, Red onions, Mayonnaise, Sesame seed bun, Ketchup', 4.9),
(48, 'Hot Beef Burger Jr', 2, ' Special beef patty, Lettuce, Fresh tomato, Red onions, Mayonnaise, Sesame seed bun, Ketchup', 3.8),
(49, 'Hot Beef Cheeseburger', 2, ' Special beef patty, Lettuce, Fresh tomato,Red onions, Mayonnaise, Gouda, Sesame seed bun, Ketchup', 5.3),
(50, 'Hot Chicken Wing Pizza', 1, ' BBQ sauce, Chicken wings, Mozzarella', 9),
(51, 'Mama\'s Pizza', 1, ' Sliced ham, Bacon, Pepperoni, Fresh mushrooms, Green pepper', 8),
(52, 'Pizza Margherita', 1, 'Pizza sauce, Mozzarella', 7.5),
(53, 'Pizza Pepperoni', 1, 'Pizza sauce, Gouda, Pepperoni', 6.5),
(54, 'Rodeo Burger', 2, 'Beef patty, Onion rings, Special beef patty, BBQ sauce, Gouda, Mayonnaise, Sesame seed bun, Bacon', 4.6),
(55, 'Sicilian Pizza', 1, 'Pizza sauce, Fresh tomato, Feta, Gouda', 9),
(56, 'Simple Pizza', 1, 'Pizza sauce, Gouda, Sliced ham', 6),
(57, 'Special Pizza', 1, 'Pizza sauce, Gouda, Pepperoni, Sausage, Sliced ham, Bacon, Fresh mushrooms, Green pepper', 7.5),
(58, 'Spicy Italian Pizza', 1, 'Pizza sauce, Mozzarella, Sausage, Pepperoni', 9.5),
(59, 'Spicy Pizza', 1, 'Pizza sauce, Mozzarella, Pepperoni, Sausage, Chili pepper', 8.1),
(60, 'Sprite 330ml', 5, 'Sprite', 1.1),
(61, 'Sprite 500ml', 5, 'Sprite', 1.5),
(62, 'Steak Sandwich', 3, ' Mayonnaise, Butter, Steak, Lemon, Black pepper, Green pepper', 5.1),
(63, 'Supreme', 1, ' Chicken, Black olives, Pepperoni, Red onions, Green pepper, Red pepper', 8.3),
(64, 'Texas BBQ Burger', 2, ' Special beef patty, Lettuce, Fresh tomato, Cheddar, BBQ sauce', 5),
(65, 'Tuna Spicy Pizza', 1, 'Pizza sauce, Black olives, Chilli tuna, Black pepper, Mozzarella, Red onions', 7.9),
(66, 'Veggie', 1, ' Gouda, Black olives, Fresh tomato, Red onions, Parsley, Fresh mushrooms, Green pepper', 9.9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `items_ordered` varchar(5000) NOT NULL,
  `address` varchar(255) NOT NULL,
  `floor` int(3) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `order_status` varchar(10) NOT NULL DEFAULT 'Pending',
  `order_cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `items_ordered`, `address`, `floor`, `telephone`, `comment`, `order_status`, `order_cost`) VALUES
(1, 21, '[\"4 Cheese Pizza\",\"BBQ Chicken Pizza\",\"BBQ Chicken Pizza\",\"4 Cheese Pizza\",\"4 Cheese Pizza\",\"BBQ Chicken Pizza\",\"4 Cheese Pizza\",\"4 Cheese Pizza\",\"BBQ Chicken Pizza\",\"4 Cheese Pizza\"]', 'Kavalas 52', 4, '6978421747', 'I\'d like some extra napkins packed up with my order please. Thanks in advance :)', 'Accepted', 83.2),
(11, 23, '[\"4 Cheese Pizza\",\"BBQ Chicken Pizza\",\"Hawaian Pizza\",\"Sicilian Pizza\"]', 'Karaoli & Dimitrioy 12 ', 1, '6978327321', 'Instead of ringing the bell , kindly call the number inserted in this form', 'Accepted', 33.2),
(12, 22, '[\"Chicken &amp; Bacon Pizza\",\"Chicken &amp; Bacon Pizza\",\"Chicken &amp; Bacon Pizza\",\"Chicken &amp; Bacon Pizza\",\"Chicken &amp; Bacon Pizza\",\"BBQ Chicken Pizza\",\"BBQ Chicken Pizza\",\"BBQ Chicken Pizza\",\"4 Cheese Pizza\",\"4 Cheese Pizza\",\"4 Cheese Pizza\",\"BBQ Chicken Pizza\",\"Caesar\'s Pizza\",\"BBQ Chicken Pizza\",\"4 Cheese Pizza\",\"4 Cheese Pizza\",\"4 Cheese Pizza\",\"4 Cheese Pizza\",\"4 Cheese Pizza\",\"BBQ Chicken Pizza\",\"BBQ Chicken Pizza\",\"Chicken &amp; Bacon Pizza\",\"Chicken &amp; Bacon Pizza\",\"Chicken &amp; Bacon Pizza\",\"Chicken &amp; Bacon Pizza\",\"Chicken &amp; Bacon Pizza\",\"Chicken &amp; Bacon Pizza\",\"4 Cheese Pizza\",\"BBQ Chicken Pizza\",\"Chicken &amp; Bacon Pizza\",\"4 Cheese Pizza\",\"BBQ Chicken Pizza\",\"4 Cheese Pizza\",\"Carbonara\",\"BBQ Chicken Pizza\",\"BBQ Chicken Pizza\",\"BBQ Chicken Pizza\"]', 'Hrakleioy 323', 0, '6984272321', 'Please hurry. Im hungry', 'Pending', 305.1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_row`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_row` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
