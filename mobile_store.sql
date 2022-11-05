-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2018 at 03:46 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ducat`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('admin@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cname`, `image`, `dat`) VALUES
(10, 'Lava', '293002871.jpg', '2018-09-20 13:36:55'),
(11, 'Nokia', '1071218351.jpg', '2018-09-20 13:37:32'),
(12, 'Sumsung', '1804603655.jpg', '2018-09-20 13:40:15'),
(13, 'Motorola', '2051657926.jpg', '2018-09-20 13:40:36'),
(14, 'Apple', '573505652.jpg', '2018-09-20 13:40:49'),
(15, 'LG', '3147294.jpg', '2018-09-20 13:41:10'),
(16, 'Blackberry ', '1962351162.jpg', '2018-09-20 13:41:41');

-- --------------------------------------------------------

--
-- Table structure for table `mobiles`
--

CREATE TABLE `mobiles` (
  `id` int(11) NOT NULL,
  `pid` varchar(255) DEFAULT NULL,
  `cat` varchar(255) DEFAULT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `quan` varchar(255) DEFAULT NULL,
  `disc` varchar(255) DEFAULT NULL,
  `pross` varchar(255) DEFAULT NULL,
  `os` varchar(255) DEFAULT NULL,
  `ram` varchar(255) DEFAULT NULL,
  `rom` varchar(255) DEFAULT NULL,
  `camera` varchar(255) DEFAULT NULL,
  `display` varchar(255) DEFAULT NULL,
  `battery` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `warrenty` varchar(255) DEFAULT NULL,
  `iname` varchar(255) DEFAULT NULL,
  `dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobiles`
--

INSERT INTO `mobiles` (`id`, `pid`, `cat`, `mname`, `price`, `quan`, `disc`, `pross`, `os`, `ram`, `rom`, `camera`, `display`, `battery`, `color`, `warrenty`, `iname`, `dat`) VALUES
(28, 'Mob1003900938', 'Lava', 'Lava Mobile', '6000', '10', '200', 'android', 'android', '2', '2', '6', 'gorila', '18000', 'black', '1', '889562481.jpg', '2018-09-20 13:38:33'),
(29, 'Mob221735237', 'Nokia', 'Nokia 6', '6000', '10', '200', 'core i 10', 'android', '2', '2', '6', 'gorila', '18000', 'black', '1', '1844418706.jpg', '2018-09-20 13:39:44'),
(30, 'Mob1312036677', 'Blackberry ', 'Blackberry', '15000', '2', '10000', 'backberry', 'backberry', '2', '2', '10', 'gorila', '1000', 'black', '2', '1214230205.jpg', '2018-09-20 13:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `tempcart`
--

CREATE TABLE `tempcart` (
  `id` int(11) NOT NULL,
  `sid` varchar(255) NOT NULL,
  `purchase` varchar(255) NOT NULL,
  `pid` varchar(255) NOT NULL,
  `quan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempcart`
--

INSERT INTO `tempcart` (`id`, `sid`, `purchase`, `pid`, `quan`) VALUES
(6, 'oiu440h6k4hr0ul70rn9p781bl', '', 'Mob391905394', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cname` (`cname`);

--
-- Indexes for table `mobiles`
--
ALTER TABLE `mobiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempcart`
--
ALTER TABLE `tempcart`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `mobiles`
--
ALTER TABLE `mobiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tempcart`
--
ALTER TABLE `tempcart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
