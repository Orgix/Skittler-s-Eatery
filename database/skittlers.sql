-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2019 at 11:01 PM
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
(22, '1231231231231', '1323213', '321312321312', '1@gmail.com', '$2y$10$SvIQDeJG.wefooVToFceKekS4aiWOQCqbOO8HtRMnTs2rbW.UylVm', 'user', NULL, NULL, '2019-01-17 22:00:12');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `Item_name` varchar(45) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `Description` varchar(150) DEFAULT NULL,
  `Cost` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`Item_name`, `category_id`, `Description`, `Cost`) VALUES
('4 Cheese Pizza', 1, 'Pizza sauce, Gouda, Mozzarella, Edam, Cheddar', 8.2),
('Amstel  330ml', 5, 'Beer', 1.6),
('Amstel  500ml', 5, 'Beer', 2),
('Bacon Cheeseburger', 2, 'Beef patty, Gouda, Bacon, Sesame seed bun, Pickles, Ketchup, Mustard', 4.2),
('BBQ Bacon Burger', 2, 'Beef patty, Special beef patty, BBQ sauce, Lettuce, Fresh tomato, Red onions, Gouda, Mayonnaise, Sesame seed bun, Bacon', 5.1),
('BBQ Chicken Pizza', 1, ' BBQ sauce, Mozzarella, Chicken, Fresh mushrooms', 8.5),
('BBQ Chicken sandwich', 3, ' Mayonnaise, Ketchup, Red onions, Mustard, Black pepper, Butter, Pickles, BBQ sauce, Chicken', 6.8),
('BBQ Sauce', 6, ' BBQ Sauce', 0.78),
('BBQ Wings', 6, 'BBQ Wings', 2.5),
('Beef Bacon Burger', 2, 'Beef patty, Lettuce, Fresh tomato, Mayonnaise, Edam, Mustard', 4.6),
('Buffalo Wings', 6, 'Buffalo Wings', 2.8),
('Caesar\'s Pizza', 1, ' Gouda, Chicken, Bacon, Caesar\'s sauce, Parsley', 8),
('Carbonara', 1, 'White sauce, Bacon, Parsley, Parmesan, Rigatoni pasta', 8.9),
('Cheeseburger', 2, 'Beef patty, Gouda, Sesame seed bun, Pickles, Ketchup, Mustard', 3),
('Chicken & Bacon Pizza', 1, 'Pizza sauce, Chicken, Bacon, Gouda, Fresh tomato, Red onions', 8),
('Chicken Caesar sandwich', 3, ' Caesar\'s sauce, Chicken, Parmesan, Lettuce, Butter', 5.9),
('Chicken Nugget Burger', 2, ' Chicken nugget, Lettuce, Fresh tomato, Grated cheese, Mayonnaise', 4.4),
('Chicken Nugget Sandwich', 3, ' Chicken nugget, Cabbage, Ketchup, Mayonnaise, Fresh tomato', 5.6),
('Chicken Nuggets', 6, 'Chicken Nuggets', 2.2),
('Chicken Parm Sandwich', 3, ' Chicken, Parmesan, Fresh basil, Eggs, Black pepper', 4.7),
('Chicken Salad Sandwich', 3, ' Chicken, Red onions, Mayonnaise, Mustard, Black pepper, Lettuce, Celery stalks', 5),
('Chicken Wings', 6, 'Chicken Wings', 2),
('Chili Burger', 2, 'Beef patty, Lettuce, Fresh tomato, Pickles, BBQ sauce, Cheddar', 4.5),
('Club Sandwich', 3, ' White bread, Mayonnaise, Lettuce, Fresh tomato, Black pepper, Bacon, Sliced turkey', 6.1),
('Coca cola  1,5lt', 5, 'Coca cola', 2),
('Coca cola 330ml', 5, 'Coca cola', 1.1),
('Coca cola 500ml', 5, 'Coca cola', 1.5),
('Cuban Sandwich', 3, ' Cuban bread, Pickles, Sliced ham, Chedar, Mustard', 5.5),
('Dip Sauce', 6, 'Dip Sauce', 0.78),
('Double Hot Beef Burger', 2, 'Beef patty, Special beef patty, Lettuce, Fresh tomato, Red onions, Mayonnaise, Sesame seed bun, Ketchup', 5.4),
('Fanta blue 330ml', 5, 'Fanta', 1.1),
('Fanta blue 500ml', 5, 'Fanta', 1.5),
('Fanta red 330ml', 5, 'Fanta', 1.1),
('Fanta red 500ml', 5, 'Fanta', 1.5),
('Garlic Knots', 6, 'Garlic Knots', 2.5),
('Garlic Sauce', 6, ' Garlic Sauce', 0.7),
('Giant sandwich', 3, ' Mayonnaise, Butter, Bacon, Chedar, Black pepper, Sesame seeds, Eggs, Special bread loaf', 7),
('Golden burger', 2, 'Beef patty, Lettuce, Fresh tomato, Ketchup, Grated cheese, Sesame seed bun', 4),
('Greek Pizza', 1, 'Pizza sauce, Mozzarella, Pepperoni, Feta, Red onions, Fresh tomato, Black olives', 8.5),
('Greek Yogurt Sandwich', 3, ' Eggs, Greek yogurt, Mayonnaise, Fresh tomato, Black pepper, Avocado', 6),
('Green burger', 2, 'Beef patty, Lettuce, Red onions, Pickles, Ketchup, Gouda', 4),
('Ham & Bacon Pizza', 1, 'Pizza sauce, Sliced ham, Bacon, Black olives, Mozzarella', 8.6),
('Hamburger', 2, 'Beef patty, Sesame seed bun, Pickles, Ketchup, Mustard', 3.7),
('Hawaian Pizza', 1, 'Pizza sauce, Sliced ham, Gouda, Pineapple', 7.5),
('Heineken 330ml', 5, 'Beer', 1.6),
('Heineken 500ml', 5, 'Beer', 2),
('Hot Beef Burger', 2, ' Special beef patty, Lettuce, Fresh tomato, Red onions, Mayonnaise, Sesame seed bun, Ketchup', 4.9),
('Hot Beef Burger Jr', 2, ' Special beef patty, Lettuce, Fresh tomato, Red onions, Mayonnaise, Sesame seed bun, Ketchup', 3.8),
('Hot Beef Cheeseburger', 2, ' Special beef patty, Lettuce, Fresh tomato,Red onions, Mayonnaise, Gouda, Sesame seed bun, Ketchup', 5.3),
('Hot Chicken Wing Pizza', 1, ' BBQ sauce, Chicken wings, Mozzarella', 9),
('Mama\'s Pizza', 1, ' Sliced ham, Bacon, Pepperoni, Fresh mushrooms, Green pepper', 8),
('Pizza Margherita', 1, 'Pizza sauce, Mozzarella', 7.5),
('Pizza Pepperoni', 1, 'Pizza sauce, Gouda, Pepperoni', 6.5),
('Rodeo Burger', 2, 'Beef patty, Onion rings, Special beef patty, BBQ sauce, Gouda, Mayonnaise, Sesame seed bun, Bacon', 4.6),
('Sicilian Pizza', 1, 'Pizza sauce, Fresh tomato, Feta, Gouda', 9),
('Simple Pizza', 1, 'Pizza sauce, Gouda, Sliced ham', 6),
('Special Pizza', 1, 'Pizza sauce, Gouda, Pepperoni, Sausage, Sliced ham, Bacon, Fresh mushrooms, Green pepper', 7.5),
('Spicy Italian Pizza', 1, 'Pizza sauce, Mozzarella, Sausage, Pepperoni', 9.5),
('Spicy Pizza', 1, 'Pizza sauce, Mozzarella, Pepperoni, Sausage, Chili pepper', 8.1),
('Sprite 330ml', 5, 'Sprite', 1.1),
('Sprite 500ml', 5, 'Sprite', 1.5),
('Steak Sandwich', 3, ' Mayonnaise, Butter, Steak, Lemon, Black pepper, Green pepper', 5.1),
('Supreme', 1, ' Chicken, Black olives, Pepperoni, Red onions, Green pepper, Red pepper', 8.3),
('Texas BBQ Burger', 2, ' Special beef patty, Lettuce, Fresh tomato, Cheddar, BBQ sauce', 5),
('Tuna Spicy Pizza', 1, 'Pizza sauce, Black olives, Chilli tuna, Black pepper, Mozzarella, Red onions', 7.9),
('Veggie', 1, ' Gouda, Black olives, Fresh tomato, Red onions, Parsley, Fresh mushrooms, Green pepper', 9.9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
