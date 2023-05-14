-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2023 at 04:18 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courier`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `postal` varchar(100) NOT NULL,
  `county` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `street`, `city`, `code`, `postal`, `county`, `contact`) VALUES
(1, 'Muungano house', 'Ongata rongai', '020', '1245', 'Kajiado', '0918291971'),
(2, 'Old mutual', 'Nairobi', '090', '1200', 'Nairobi', '0718819991'),
(3, 'Joho building', 'Mombasa', '012', '3091', 'Mombasa', '071235617'),
(6, 'Nation House', 'Nairobi', '002', '1200', 'Nairobi', '0978177181'),
(7, 'Cooperative', 'Kahawa', '006', '1300', 'Kiambu', '099019188817'),
(8, 'Stedmark', 'Kerugoya', '097', '10300', 'Kirinyaga', '0718245217'),
(9, 'Dedan kimathi', 'Nyeri', '003', '10400', 'Nyeri', '01342618891'),
(10, 'Ruto phase', 'Nakuru', '091', '1345', 'Nakuru', '07167718818');

-- --------------------------------------------------------

--
-- Table structure for table `parcels`
--

CREATE TABLE `parcels` (
  `parcel_id` int(11) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `saddress` varchar(100) NOT NULL,
  `scontact` varchar(100) NOT NULL,
  `semail` varchar(100) NOT NULL,
  `rname` varchar(100) NOT NULL,
  `raddress` varchar(100) NOT NULL,
  `rcontact` varchar(100) NOT NULL,
  `remail` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `processed_br` varchar(100) NOT NULL,
  `pickup_br` varchar(100) DEFAULT NULL,
  `deliver_loc` varchar(100) DEFAULT NULL,
  `weight` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `length` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `reference_number` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parcels`
--

INSERT INTO `parcels` (`parcel_id`, `sname`, `saddress`, `scontact`, `semail`, `rname`, `raddress`, `rcontact`, `remail`, `type`, `processed_br`, `pickup_br`, `deliver_loc`, `weight`, `height`, `length`, `width`, `price`, `amount`, `reference_number`, `status`, `date_created`) VALUES
(11, 'Marion Nduta', 'Mombasa', '0789563332', '', 'Caleb Munene', 'Nairobi', '07132451516', '', 'Pickup', '012 Mombasa', '090 Nairobi', '', 1, 2, 3, 4, 1200, 1392, '5200521301185', 0, '2023-05-06 00:00:00'),
(13, 'Richard Omondi', 'mombasa', '0789654123', '', 'Mercy Mutira', 'Kajiado', '07132451516', '', 'Deliver', '#', '#', '', 1, 3, 4, 1, 500, 580, '2051042296785', 6, '2023-05-06 00:00:00'),
(14, 'Joe Otieno', 'Nakuru', '0789654123', '', 'Caroline Mbithe', 'Nairobi', '07132451516', '', 'Pickup', '091 Nakuru', '002 Nairobi', '', 20, 10, 12, 4, 800, 928, '1282602680543', 0, '2023-05-06 00:00:00'),
(15, 'Moses Saitoti', 'Mombasa', '0878187888', '', 'Rufus Mutwe', 'Kerugoya', '07132451516', '', 'Pickup', '012 Mombasa', '097 Kerugoya', '', 1, 3, 1, 1, 2000, 2320, '8257442546747', 0, '2023-05-06 00:00:00'),
(16, 'Monicah Mutwiri', 'Nyeri', '0789563332', '', 'Cynthia Kamande', 'Nairobi', '0918181819', '', 'Deliver', '#', '#', 'Westlands', 12, 2, 2, 1, 900, 1044, '3214485871118', 8, '2023-05-06 00:00:00'),
(17, 'Amos Kupe', 'Nairobi', '07765544556', '', 'Daniel Mugi', 'Kajiado', '0918181819', '', 'Pickup', '002 Nairobi', '020 Ongata rongai', '', 100, 12, 12, 12, 400, 464, '9733197416714', 0, '2023-05-06 00:00:00'),
(18, 'Fridah Nyagunde', 'Kahawa', '07765544556', '', 'Mutira Johns', 'Nyeri', '091177771771', '', 'Pickup', '006 Kahawa', '003 Nyeri', '', 10, 2, 12, 12, 690, 800, '577814703849', 0, '2023-05-06 00:00:00'),
(19, 'Christine Mukami', 'Nairobi', '09181288181', '', 'Francis Ndunda', 'Kerugoya', '0918817881', '', 'Deliver', '#', '#', '', 120, 12, 12, 13, 1200, 1392, '2699851918695', 3, '2023-05-06 00:00:00'),
(20, 'Duncun Munde', 'Kajiado', '0566772882', '', 'Clinton Mutahi', 'Kahawa', '09178171616', '', 'Deliver', '#', '#', '', 1, 1, 1, 11, 600, 696, '9936375357159', 1, '2023-05-06 00:00:00'),
(21, 'Joel Mukimo', 'Mombasa', '0789654123', 'joelmukim@gmail.com', 'Daniel Mugi', 'Nairobi', '07132451516', 'silvia@gmail.com', 'Pickup', '012 Mombasa', '002 Nairobi', '', 1, 1, 1, 1, 2000, 2320, '3241201275472', 0, '2023-05-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `role`, `branch`, `date_created`) VALUES
(1, 'Caleb', 'Munene', 'calebkinyuamunene@gmail.com', 'd6a5a657fc70d5870b0484a081f6ca38', 1, '001 Nairobi', '2022-12-28'),
(3, 'Mitchell', 'Rodri', 'mitchell@gmail.com', '25f9e794323b453885f5181f1b624d0b', 2, '020 Ongata rongai', '2023-04-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parcels`
--
ALTER TABLE `parcels`
  ADD PRIMARY KEY (`parcel_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `parcels`
--
ALTER TABLE `parcels`
  MODIFY `parcel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
