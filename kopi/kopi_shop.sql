-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2024 at 08:39 AM
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
(1, 'hot', 'Cappuccino', 'A cappuccino is an espresso-based coffee drink that is traditionally prepared with steamed milk including a layer of milk foam.', 5, 'img/capp.jpg'),
(2, 'cold', 'Americano', 'An Americano is a classic coffee drink made by adding hot water to a shot of espresso.', 7, 'img/americano.jpg'),
(3, 'hot', 'Mocha Latte', 'A mocha latte is a latte with chocolate in it. It is made with espresso, steamed milk, and chocolate syrup. It is often topped with whipped cream and cocoa powder. A mocha latte is a sweet, rich, and creamy coffee drink.', 8, 'img/moclatte.jpg'),
(4, 'cold', 'Espresso ', 'Espresso is a coffee-brewing method in which a small amount of nearly boiling water is forced under pressure through finely ground coffee beans.', 6, 'img/espresso.jpg'),
(5, 'cold', 'Iced Caramel Machiatto', 'This iced caramel macchiato has the perfect balance of coffee, vanilla, milk, and caramel.', 7, 'img/icemacc.jpg'),
(6, 'cold', ' Cold Brew', 'Coffee brewed slowly in cold water is less acidic than hot-brewed. You can use this concentrate straight over ice or microwave half a mug of coffee and then add a half cup of boiling water for quick hot coffee.', 6, 'img/coldbrew.jpg'),
(7, 'hot', 'Latte', 'This popular Italian standby is usually 10-12 ounces in volume and is made of one part espresso to two parts steamed milk with a thin layer of milk foam', 6, 'img/Latte.png'),
(8, 'hot', 'French Press', 'The French press is a simple, elegant, and easy-to-use tool for making a delicious cup of coffee. It works by soaking ground coffee directly in hot water, which you then separate using a plunger.', 9, 'img/french.png'),
(10, 'pastry', 'Croissants', 'A type of puff pastry from France, croissants are a rich, flaky roll named for their distinct crescent shape.', 5, 'img/Croissant.jpg'),
(11, 'pastry', 'Kouign-Amann', 'Kouign-amann is pronounced \"queen-a-mahn\" and wouldn\'t be one of the world\'s greatest pastries if it weren\'t a legendary labor of love. ', 6, 'img/kunaman.jpg'),
(12, 'salad', 'Caesar Salad', 'Caesar Salad is a famous salad believed to be invented by a restaurateur named Cesar Cardini. This salad uses romaine lettuce tossed topped with garlic croutons, parmesan cheese, and a mixture of olive oil, raw egg yolks, and garlic.', 7, 'img/Caesar-Salad-foodiecrush.com-017.jpg'),
(15, 'salad', 'Mediterranean Quinoa Salad', 'This Mediterranean Quinoa Salad is a vibrant and nutritious dish that brings together the flavors of the Mediterranean region in every bite. ', 8, 'img/OIP - Copy.jpg');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
