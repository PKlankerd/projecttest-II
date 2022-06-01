-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2022 at 05:48 AM
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
-- Database: `ansell`
--

-- --------------------------------------------------------

--
-- Table structure for table `dipping_lot`
--

CREATE TABLE `dipping_lot` (
  `Binno` int(11) NOT NULL,
  `Productcode` varchar(8) NOT NULL,
  `Productionlot` varchar(11) NOT NULL,
  `SizeHand` varchar(4) NOT NULL,
  `Glovecolor` varchar(10) NOT NULL,
  `MachineRunNo` varchar(15) NOT NULL,
  `TotalGlove` int(5) NOT NULL,
  `Date` date NOT NULL,
  `Operator` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dipping_lot_batch_l`
--

CREATE TABLE `dipping_lot_batch_l` (
  `DippingLot_L` varchar(11) NOT NULL,
  `Batch1` varchar(8) NOT NULL,
  `amt1` varchar(4) NOT NULL,
  `Batch2` varchar(8) NOT NULL,
  `amt2` varchar(4) NOT NULL,
  `Batch3` varchar(8) NOT NULL,
  `amt3` varchar(4) NOT NULL,
  `Batch4` varchar(8) NOT NULL,
  `amt4` varchar(4) NOT NULL,
  `Batch5` varchar(8) NOT NULL,
  `amt5` varchar(4) NOT NULL,
  `Batch6` varchar(8) NOT NULL,
  `amt6` varchar(4) NOT NULL,
  `TotalPcs` int(8) NOT NULL,
  `ProductionLot` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dipping_lot_batch_r`
--

CREATE TABLE `dipping_lot_batch_r` (
  `DippingLot_R` varchar(15) NOT NULL,
  `Batch1` varchar(8) NOT NULL,
  `amt1` varchar(4) NOT NULL,
  `Batch2` varchar(8) NOT NULL,
  `amt2` varchar(4) NOT NULL,
  `Batch3` varchar(8) NOT NULL,
  `amt3` varchar(4) NOT NULL,
  `Batch4` varchar(8) NOT NULL,
  `amt4` varchar(4) NOT NULL,
  `Batch5` varchar(8) NOT NULL,
  `amt5` varchar(4) NOT NULL,
  `Batch6` varchar(8) NOT NULL,
  `amt6` varchar(4) NOT NULL,
  `TotalPcs` int(8) NOT NULL,
  `ProductionLot` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dipping_lot_hand_l`
--

CREATE TABLE `dipping_lot_hand_l` (
  `id` int(11) NOT NULL,
  `DippingLot_L` varchar(15) NOT NULL,
  `ProductionLot` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dipping_lot_hand_r`
--

CREATE TABLE `dipping_lot_hand_r` (
  `id` int(11) NOT NULL,
  `DippingLot_R` varchar(15) NOT NULL,
  `ProductionLot` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `glovecolor`
--

CREATE TABLE `glovecolor` (
  `id` int(8) NOT NULL,
  `color` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `glovecolor`
--

INSERT INTO `glovecolor` (`id`, `color`) VALUES
(2, 'Black'),
(4, 'White'),
(6, 'Blue'),
(33, 'red');

-- --------------------------------------------------------

--
-- Table structure for table `machine`
--

CREATE TABLE `machine` (
  `id` int(11) NOT NULL,
  `machine` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `machine`
--

INSERT INTO `machine` (`id`, `machine`) VALUES
(1, 'S1'),
(2, 'S2'),
(3, '1'),
(4, '2');

-- --------------------------------------------------------

--
-- Table structure for table `processrework`
--

CREATE TABLE `processrework` (
  `id` int(8) NOT NULL,
  `process` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `processrework`
--

INSERT INTO `processrework` (`id`, `process`) VALUES
(1, 'REWORK PROCESS'),
(2, 'PRE-INSPECTION'),
(3, '100%SORTING'),
(4, 'ตัดขอบถุงมือ');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productcode` varchar(20) NOT NULL,
  `productname` varchar(30) NOT NULL,
  `postingdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productcode`, `productname`, `postingdate`) VALUES
('23-345', 'solvex', '2021-12-02 02:30:49'),
('29-845', 'Solvex', '2021-08-26 04:30:31'),
('29-865', 'Solvex', '2021-08-26 04:30:47'),
('34-333', 'Solvex', '2021-11-29 06:22:43'),
('37-155', 'Solvex', '2021-08-26 04:30:55'),
('37-165', 'Solvex', '2021-08-26 04:31:02'),
('45-234', 'AlphaTec', '2021-09-06 02:43:30'),
('58-128', 'Alphatec', '2021-08-26 04:29:32'),
('58-240', 'Alphatec', '2021-08-26 04:28:46'),
('58-270', 'Alphatec', '2021-08-26 04:29:04'),
('58-430', 'Alphatec', '2021-08-26 04:29:25'),
('58-435', 'Alphatec', '2021-08-26 04:27:35'),
('58-530', 'Alphatec', '2021-08-26 04:28:30'),
('58-535', 'Alphatec', '2021-08-26 04:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `shell`
--

CREATE TABLE `shell` (
  `id` int(11) NOT NULL,
  `shell` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shell`
--

INSERT INTO `shell` (`id`, `shell`) VALUES
(1, 'BKK'),
(2, 'Kedah'),
(3, 'other');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `size` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `size`) VALUES
(1, '6L'),
(2, '6R'),
(3, '7L'),
(4, '7R'),
(5, '8L'),
(6, '8R'),
(7, '9L'),
(8, '9R'),
(9, '10L'),
(10, '10R'),
(11, '11L'),
(12, '11R');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dipping_lot`
--
ALTER TABLE `dipping_lot`
  ADD PRIMARY KEY (`Productionlot`);

--
-- Indexes for table `dipping_lot_batch_l`
--
ALTER TABLE `dipping_lot_batch_l`
  ADD PRIMARY KEY (`DippingLot_L`);

--
-- Indexes for table `dipping_lot_batch_r`
--
ALTER TABLE `dipping_lot_batch_r`
  ADD PRIMARY KEY (`DippingLot_R`);

--
-- Indexes for table `dipping_lot_hand_l`
--
ALTER TABLE `dipping_lot_hand_l`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dipping_lot_hand_r`
--
ALTER TABLE `dipping_lot_hand_r`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `glovecolor`
--
ALTER TABLE `glovecolor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machine`
--
ALTER TABLE `machine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `processrework`
--
ALTER TABLE `processrework`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productcode`);

--
-- Indexes for table `shell`
--
ALTER TABLE `shell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dipping_lot_hand_l`
--
ALTER TABLE `dipping_lot_hand_l`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `dipping_lot_hand_r`
--
ALTER TABLE `dipping_lot_hand_r`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `glovecolor`
--
ALTER TABLE `glovecolor`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `machine`
--
ALTER TABLE `machine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `processrework`
--
ALTER TABLE `processrework`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shell`
--
ALTER TABLE `shell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
