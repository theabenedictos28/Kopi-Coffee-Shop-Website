-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2024 at 09:16 AM
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
-- Database: `kopi_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `category`, `name`, `description`, `price`, `image`) VALUES
(34, 'Hot', 'Cappucino', 'A cappuccino is an espresso-based coffee drink that is traditionally prepared with steamed milk including a layer of milk foam.', 5, 'img/capp.jpg'),
(36, 'Cold', 'Americano', 'An Americano is a classic coffee drink made by adding hot water to a shot of espresso. ', 7, 'img/french.png'),
(38, 'Hot', 'Mocha Latte  ', 'A mocha latte is a latte with chocolate in it. It is made with espresso, steamed milk, and chocolate syrup. It is often topped with whipped cream and cocoa powder. A mocha latte is a sweet, rich, and creamy coffee drink.  ', 8, 'img/kape.jpg'),
(42, 'Cold', 'Iced Caramel Machiatto  ', 'This iced caramel macchiato has the perfect balance of coffee, vanilla, milk, and caramel.  ', 7, 'img/coldbrew.jpg'),
(46, 'Cold', 'Cold Brew ', 'Coffee brewed slowly in cold water is less acidic than hot-brewed. You can use this concentrate straight over ice or microwave half a mug of coffee and then add a half cup of boiling water for quick hot coffee.  ', 6, 'img/icemacc.jpg'),
(47, 'Hot', 'Latte', 'This popular Italian standby is usually 10-12 ounces in volume and is made of one part espresso to two parts steamed milk with a thin layer of milk foam  ', 7, 'img/Latte.png'),
(49, 'Pastry', 'Croissants', 'A type of puff pastry from France, croissants are a rich, flaky roll named for their distinct crescent shape. ', 5, 'img/Croissant.jpg'),
(50, 'Pastry', 'Kouign-Amann  ', 'Kouign-amann is pronounced \"queen-a-mahn\" and wouldn\'t be one of the world\'s greatest pastries if it weren\'t a legendary labor of love.  ', 6, 'img/kunaman.jpg'),
(51, 'Salad', 'Caesar Salad ', 'Caesar Salad is a famous salad believed to be invented by a restaurateur named Cesar Cardini. This salad uses romaine lettuce tossed topped with garlic croutons, parmesan cheese, and a mixture of olive oil, raw egg yolks, and garlic. ', 7, 'img/Caesar-Salad-foodiecrush.com-017.jpg'),
(52, 'Salad', 'Mediterranean Quinoa Salad ', 'This Mediterranean Quinoa Salad is a vibrant and nutritious dish that brings together the flavors of the Mediterranean region in every bite.  ', 8, 'img/OIP.jpg'),
(53, 'Hot', 'French Press ', 'The French press is a simple, elegant, and easy-to-use tool for making a delicious cup of coffee. It works by soaking ground coffee directly in hot water, which you then separate using a plunger. ', 8, 'img/moclatte.jpg'),
(54, 'Cold', 'Espresso', 'Espresso is a coffee-brewing method in which a small amount of nearly boiling water is forced under pressure through finely ground coffee beans.  ', 6, 'img/moclatte.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
