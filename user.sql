-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 19, 2021 at 02:50 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gtpt`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` int(11) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Name`, `Username`, `Email`, `Password`, `Role`, `Phone`, `Avatar`) VALUES
(1, '.ad.', '.sd.', '.asd.', '.sf.', 0, '', 'uploads/OIP.jpg'),
(2, '.sf.', '..sd..', '.sdf.', '.sdf.', 0, '', ''),
(3, '.asd.', '..sa..', '.asd.', '.asd.', 0, '', ''),
(4, 'a', 'a', 'a', 'a', 0, '', ''),
(5, 'b', 'b', 'b', '92eb5ffee6ae2fec3ad71c777531578f', 0, '', ''),
(6, '', '', '', '0cc175b9c0f1b6a831c399e269772661', 0, '', ''),
(7, '', 'asd', '', 'd41d8cd98f00b204e9800998ecf8427e', 0, '', ''),
(8, 'tuan', 'tuan', 'tuan@gmail.com', 'feb8dc0697a2e0a947c6e20dc4ec3ebc', 0, '', ''),
(9, 'tuấnd', '  tuan', 'tuan@gmai.com', '06368bca4603d255b6c7355e03e1fe3a', 0, '', ''),
(10, 'tù', 'tuan', 'tuan@gmail.com', '54b6756ace1a55eff508c6a6a19e5cbe', 0, '', ''),
(11, 'aaaaa', 'aaaaa', 'gg@gmail.com', '25f9e794323b453885f5181f1b624d0b', 0, '', 'uploads/OIP.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
