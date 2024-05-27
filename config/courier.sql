-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 27, 2024 at 10:29 AM
-- Server version: 11.3.2-MariaDB
-- PHP Version: 8.2.12

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
(10, 'Ruto phase', 'Nakuru', '091', '1345', 'Nakuru', '07167718818'),
(11, 'Kajiado north', 'Kajiado town', '071', '1456', 'Kajiado', '0786245123'),
(12, 'Premier plaza', 'Thika', '072', '1260', 'Kiambu', '0912345617'),
(13, 'Mwanzo plaza', 'Nakuru', '073', '8910', 'Nakuru', '0789145123'),
(14, 'Premier plaza', 'Mombasa', '079', '1789', 'Mombasa', '0789134567'),
(15, 'Afya center', 'Embu', '074', '1089', 'Kirinyaga', '0745123098'),
(16, 'Biashara plaza', 'Eldoret', '075', '1245', 'Uasingishu', '08978177181'),
(17, 'Randals plaza', 'Juja', '076', '89011', 'Kiambu', '07819161711'),
(18, 'Kibaki plaza', 'Nanyuki', '077', '01781', 'Nakuru', '0716178191'),
(19, 'Albashir building', 'Isiolo', '078', '56781', 'Isiolo', '0891761661'),
(20, 'Mubarak complex', 'Garissa', '080', '15451', 'Garissa', '0723456123'),
(21, 'St daniel plaza', 'Meru', '081', '90717', 'Meru', '0900122122'),
(22, 'Bruce plaza', 'Namanga', '082', '098181', 'Kajiado', '07123567789');

-- --------------------------------------------------------

--
-- Table structure for table `couriers`
--

CREATE TABLE `couriers` (
  `courier_id` int(11) NOT NULL,
  `driver_name` varchar(100) NOT NULL,
  `vehicle_name` varchar(100) NOT NULL,
  `vehicle_number` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `driver_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password1` varchar(100) NOT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `fname`, `lname`, `email`, `password1`, `reg_date`) VALUES
(1, 'Caleb', 'Munene', 'silvia@gmail.com', 'bbcefbf34cd64dfa58c2eff6b71434c7', '2023-05-20'),
(2, 'John', 'Kunde', 'john@gmail.com', 'ab0f54107310931299e394fc46f7635a', '2023-05-20'),
(3, 'Daniel', 'Munene', 'daniel12@gmail.com', '334a0841e10ec8db5d34a724f97994f4', '2023-06-19'),
(4, 'Test', 'Test1', 'test@gmail.com', 'e316ffac70bb7b5ed2a42427a44e14e8', '2023-06-24');

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
  `charge` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `reference_number` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `status_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parcels`
--

INSERT INTO `parcels` (`parcel_id`, `sname`, `saddress`, `scontact`, `semail`, `rname`, `raddress`, `rcontact`, `remail`, `type`, `processed_br`, `pickup_br`, `deliver_loc`, `weight`, `charge`, `price`, `amount`, `payment`, `reference_number`, `status`, `date_created`, `status_date`) VALUES
(11, 'Marion Nduta', 'Mombasa', '0789563332', '', 'Caleb Munene', 'Nairobi', '07132451516', '', 'Pickup', '012 Mombasa', '090 Nairobi', '', 1, 2, 1200, 1392, 'Paid', '5200521301185', 0, '2023-04-02 12:50:00', '2024-05-23 18:17:29'),
(13, 'Richard Omondi', 'mombasa', '0789654123', '', 'Mercy Mutira', 'Kajiado', '07132451516', '', 'Deliver', '#', '#', '', 1, 3, 500, 580, 'Not Paid', '2051042296785', 6, '2023-04-10 10:30:00', '2024-05-23 18:17:29'),
(14, 'Joe Otieno', 'Nakuru', '0789654123', '', 'Caroline Mbithe', 'Nairobi', '07132451516', '', 'Pickup', '091 Nakuru', '002 Nairobi', '', 20, 10, 800, 928, 'Paid', '1282602680543', 0, '2023-04-17 14:00:00', '2024-05-23 18:17:29'),
(15, 'Moses Saitoti', 'Mombasa', '0878187888', '', 'Rufus Mutwe', 'Kerugoya', '07132451516', '', 'Pickup', '012 Mombasa', '097 Kerugoya', '', 1, 3, 2000, 2320, 'Paid', '8257442546747', 0, '2023-05-06 00:00:00', '2024-05-23 18:17:29'),
(16, 'Monicah Mutwiri', 'Nyeri', '0789563332', '', 'Cynthia Kamande', 'Nairobi', '0918181819', '', 'Deliver', '#', '#', 'Westlands', 12, 2, 900, 1044, 'Paid', '3214485871118', 8, '2023-04-12 01:00:00', '2024-05-23 18:17:29'),
(17, 'Amos Kupe', 'Nairobi', '07765544556', '', 'Daniel Mugi', 'Kajiado', '0918181819', '', 'Pickup', '002 Nairobi', '020 Ongata rongai', '', 100, 12, 400, 464, 'Paid', '9733197416714', 0, '2023-05-06 00:00:00', '2024-05-23 18:17:29'),
(18, 'Fridah Nyagunde', 'Kahawa', '07765544556', '', 'Mutira Johns', 'Nyeri', '091177771771', '', 'Pickup', '006 Kahawa', '003 Nyeri', '', 10, 2, 690, 800, 'Paid', '577814703849', 0, '2023-04-05 08:00:00', '2024-05-23 18:17:29'),
(19, 'Christine Mukami', 'Nairobi', '09181288181', '', 'Francis Ndunda', 'Kerugoya', '0918817881', '', 'Deliver', '#', '#', '', 120, 12, 1200, 1392, 'Paid', '2699851918695', 3, '2023-04-30 09:00:00', '2024-05-23 18:17:29'),
(20, 'Duncun Munde', 'Kajiado', '0566772882', '', 'Clinton Mutahi', 'Kahawa', '09178171616', '', 'Deliver', '#', '#', '', 1, 1, 600, 696, 'Not Paid', '9936375357159', 1, '2023-05-01 03:00:00', '2024-05-23 18:17:29'),
(21, 'Joel Mukimo', 'Mombasa', '0789654123', 'joelmukim@gmail.com', 'Daniel Mugi', 'Nairobi', '07132451516', 'silvia@gmail.com', 'Pickup', '012 Mombasa', '002 Nairobi', '', 1, 1, 2000, 2320, 'Paid', '3241201275472', 0, '2023-05-10 02:00:00', '2024-05-23 18:17:29'),
(28, 'Caleb Munene', 'Nairobi', '097891234', 'calebkinyuamunene@gmail.com', 'Mugo Kirimi', 'Nakuru', '0767543123', 'kinyuamunene554@gmail.com', 'Pickup', '002 Nairobi', '091 Nakuru', '', 2, 500, 10, 592, 'Paid', '2127722780358', 1, '2024-05-22 21:36:32', '2024-05-23 18:17:29'),
(29, 'Peter Mugwanja', 'Mombasa', '0789123456', 'calebkinyuamunene@gmail.com', 'Michael Angaya', 'Nairobi', '07985671616', 'caleb@cortechsystems.com', 'Deliver', '079 Mombasa', '', 'Biashara Street 001', 4, 800, 20, 951, 'Not Paid', '6697298699737', 0, '2024-05-23 15:45:31', '2024-05-23 18:17:29'),
(30, 'Rosinah Cherotich', 'Mombasa', '0789123456', 'calebkinyuamunene@gmail.com', 'Trizer Cherono', 'Nairobi', '07985671616', 'calebkinyuamunene@gmail.com', 'Deliver', '079 Mombasa', '#', 'Biashara Street 001', 4, 800, 20, 1021, 'Not Paid', '5785673692498', 3, '2024-05-23 00:00:00', '2024-05-23 18:17:29'),
(31, 'Esther Pere', 'Thika', '0756123456', 'calebkinyuamunene@gmail.com', 'Ishmael Onditi', 'Nairobi', '0900000000', 'calebkinyuamunene@gmail.com', 'Pickup', '072 Thika', '074 Embu', '', 3, 400, 15, 481, 'Not Paid', '238871839077', 0, '2024-05-23 16:54:05', '2024-05-23 18:17:29'),
(32, 'Thomas Onyango', 'Garissa', '0789123456', 'calebkinyuamunene@gmail.com', 'Mildred Omwamba', 'Nairobi', '0767543123', 'calebkinyuamunene@gmail.com', 'Pickup', '080 Garissa', '002 Nairobi', '', 5, 800, 25, 957, 'Paid', '049288761206', 0, '2024-05-23 17:00:49', '2024-05-23 18:17:29'),
(33, 'Thomas Onyango', 'Garissa', '0789123456', 'calebkinyuamunene@gmail.com', 'Mildred Omwamba', 'Nairobi', '0767543123', 'calebkinyuamunene@gmail.com', 'Pickup', '080 Garissa', '002 Nairobi', '', 5, 800, 25, 957, 'Paid', '8733438311948', 0, '2024-05-23 17:00:57', '2024-05-23 18:17:29'),
(34, 'Daphine Okindo', 'Juja', '0789123456', 'calebkinyuamunene@gmail.com', 'Caleb Munene', 'Nairobi', '0767543123', 'calebkinyuamunene@gmail.com', 'Pickup', '076 Juja', '097 Kerugoya', '', 3, 400, 15, 481, 'Paid', '8644750740972', 0, '2024-05-23 17:02:16', '2024-05-23 18:17:29'),
(35, 'Yvonne Sande', 'Nyeri', '0756123456', 'calebkinyuamunene@gmail.com', 'John Migwi', 'Kerugoya', '0767543123', 'calebkinyuamunene@gmail.com', 'Pickup', '003 Nyeri', '097 Kerugoya', '', 2, 300, 10, 360, 'Paid', '6112728830580', 0, '2024-05-23 17:03:39', '2024-05-23 18:17:29'),
(36, 'David Gitau', 'Isiolo', '0789123456', 'calebkinyuamunene@gmail.com', 'Caleb Munene', 'Nairobi', '0767543123', 'calebkinyuamunene@gmail.com', 'Pickup', '078 Isiolo', '073 Nakuru', '', 6, 500, 30, 615, 'Not Paid', '4721707879223', 0, '2024-05-23 17:04:44', '2024-05-23 18:17:29'),
(37, 'Cynthia Muthoni', 'Nairobi', '0789123456', 'calebkinyuamunene@gmail.com', 'Samson Omollo', 'Isiolo', '0767543123', 'calebkinyuamunene@gmail.com', 'Pickup', '002 Nairobi', '078 Isiolo', '', 3, 1000, 15, 1177, 'Paid', '9430879847897', 0, '2024-05-23 17:05:54', '2024-05-23 18:17:29'),
(38, 'Lenny Mwandiki', 'Nakuru', '0789123456', 'calebkinyuamunene@gmail.com', 'Caleb Munene', 'Nairobi', '0767543123', 'calebkinyuamunene@gmail.com', 'Pickup', '073 Nakuru', '078 Isiolo', '', 2, 500, 10, 592, 'Not Paid', '6358745233737', 0, '2024-05-23 18:24:43', '2024-05-23 00:00:00');

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
(1, 'Caleb', 'Kinyua', 'calebkinyuamunene@gmail.com', 'a838ba88c8a9e2dfe13e3efdbed131fa', 1, '001 Nairobi', '2023-05-14'),
(3, 'Mitchell', 'Rodri', 'mitchell@gmail.com', '25f9e794323b453885f5181f1b624d0b', 2, '020 Ongata rongai', '2023-04-30'),
(4, 'Michael', 'Mutiso', 'michael25@gmail.com', '56cf01f6edfe9598b5e23407fe290990', 2, '006 Kahawa', '2023-05-16'),
(5, 'Musembi', 'Peter', 'peter@gmail.com', '56f323e456d774d93e68442000570af3', 2, '082 Namanga', '2024-05-21'),
(6, 'Fancy', 'Ann', 'ann@gmail.com', 'e8276a984b50d28e9da4c969fd22c955', 2, '077 Nanyuki', '2024-05-21'),
(7, 'Mary', 'Anne', 'anne@gmail.com', 'dd7f84c0fe48965d37aadef3c815137c', 2, '072 Thika', '2024-05-21'),
(8, 'Justus', 'Kimondo', 'kimdondo@gmail.com', 'c6d54956dfe9b862fd0c217a47ddaa65', 2, '097 Kerugoya', '2024-05-21'),
(9, 'Randy', 'Masese', 'masese@gmail.com', 'e7deef6246f998057cc880c0199f5a0d', 2, '073 Nakuru', '2024-05-21'),
(10, 'Laban', 'Karanja', 'karanja@gmail.com', '3f4624f44799d9f63b5aba1d6b824c2f', 2, '073 Nakuru', '2024-05-21'),
(11, 'Linet', 'Kenyatta', 'kenyatta@gmail.com', '4539d8743e1564e3e395f4e7fe3369cf', 2, '090 Nairobi', '2024-05-21'),
(12, 'Kendi', 'Linet', 'linet@gmail.com', 'c9a784a3f0b43c2385e632ccf1d3e7ff', 2, '072 Thika', '2024-05-21'),
(13, 'Shelmith', 'Mwaura', 'mwaura@gmail.com', 'a16f2ea53d9ba681ed56a3da6fc022ce', 2, '020 Ongata rongai', '2024-05-21'),
(14, 'David', 'Gitonga', 'gitonga@gmail.com', 'e2a9930796b00e3c569bb0b205c29607', 2, '082 Namanga', '2024-05-21'),
(15, 'Stephen', 'Kahiu', 'kahiu@gmail.com', 'af7a0a7b5ef62d6b52fad674d40ff55e', 2, '077 Nanyuki', '2024-05-21'),
(16, 'Lenny', 'Mwaniki', 'mwaniki@gmail.com', 'ff5866994d23589d1304221fce6ff259', 2, '079 Mombasa', '2024-05-21'),
(17, 'Sharon', 'Jemutai', 'jemutai@gmail.com', '9abadc5138b001489bb35061ed86febf', 2, '075 Eldoret', '2024-05-21'),
(18, 'Renson', 'Kemboi', 'kemboi@gmail.com', 'c7a3c5bd2cb1d379b84fdef5057ad593', 2, '075 Eldoret', '2024-05-21'),
(19, 'Caleb', 'Ngugi', 'ngugi@gmail.com', 'c273d7379a8ef340b01874f1e9c455e9', 2, '020 Ongata rongai', '2024-05-21'),
(20, 'Sarah', 'Kimani', 'kimani@gmail.com', '6eba7a3c2fbff92427bfb3f41dd4022c', 2, '072 Thika', '2024-05-21'),
(21, 'Jayden', 'Mutahi', 'mutahi@gmail.com', '83d5648c7c1e73338e606a096fa3448b', 2, '003 Nyeri', '2024-05-21'),
(22, 'Jane', 'Mumbi', 'mumbi@gmail.com', '1ccd07d25ca77db28a0d287c67c23d77', 2, '003 Nyeri', '2024-05-21'),
(23, 'Thomas', 'Njenga', 'njenga@gmail.com', '0da21f7bd71a69b8f3cae4d76ad60908', 2, '077 Nanyuki', '2024-05-21'),
(24, 'Victor', 'Kipyegon', 'kipyegon@gmail.com', '6448be2f1ec6648e0e9bac862d0bd3ea', 2, '075 Eldoret', '2024-05-21'),
(25, 'Erick', 'Mureithi', 'mureithi@gmail.com', 'd67633c98caac05072c744a17032122a', 2, '006 Kahawa', '2024-05-21'),
(26, 'Teresia', 'Waithira', 'waithira@gmail.com', 'bf2f0a39d96e42e07322b45d4afc70e7', 2, '076 Juja', '2024-05-21'),
(27, 'Patrick', 'Lolmodon', 'lolmodon@gmail.com', '20af6011b37421e1828f69023e7a977b', 2, '071 Kajiado town', '2024-05-21'),
(28, 'Mellisa', 'Luchuku', 'luchuku@gmail.com', 'f4880fba6ea4d2223d7a40ab1ef7c45a', 2, '072 Thika', '2024-05-21'),
(29, 'Ericah', 'Wambui', 'wambui@gmail.com', '4743556030d962de7b9ca28f2eb2a013', 2, '097 Kerugoya', '2024-05-21'),
(30, 'Jackline', 'Mukami', 'mukami@gmail.com', 'be7f81f7f5f4b551e270109ff86469f1', 2, '090 Nairobi', '2024-05-21'),
(31, 'Margaret', 'Wothaya', 'wothaya@gmail.com', '9c6254ba0e67c537cdac36e864599a02', 2, '003 Nyeri', '2024-05-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `couriers`
--
ALTER TABLE `couriers`
  ADD PRIMARY KEY (`courier_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `couriers`
--
ALTER TABLE `couriers`
  MODIFY `courier_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `parcels`
--
ALTER TABLE `parcels`
  MODIFY `parcel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
