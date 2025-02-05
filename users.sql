-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2023 at 10:10 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deta`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `verify_status` int(255) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `pass`, `address`, `mobile`, `city`, `dob`, `gender`, `token`, `verify_status`) VALUES
(2, 'Devi Chowdhury', ' Keya', ' devi', 'devichowdhurykeya@gmail.com', '123', 'Mejorthila', '01712345678', 'Sylhet', '2000-11-18', 'Female', '339e9e34e1f59573cf39ba616949fe70', 0),
(3, 'Jafrul Haque', ' Rafi', ' rafibai', 'jafrulhaque99@gmail.com', 'Rafi1', 'Uposhahar', '01797224414', 'Sylhet', '1999-09-10', 'Male', 'c910b500b7b4aa9316b34327db067c25', 1),
(4, 'Abdulalh Al', ' Masrur', ' root12', 'abdullahalmasrur8@gmail.com', 'Abd123!', 'Uposhahar', '01712345678', 'Sylhet', '2000-02-06', 'Male', '383913c0738c0fe8d9d0197052db29db', 1),
(6, 'Adithi', ' Chowdhury', ' Adithi', 'cse_2012020252@lus.ac.bd', 'Adithi!1', 'mejortila', '01704546954', 'Sylhet', '2006-02-05', 'Female', 'ebb2a0629e906d8640c6eeba7c3ec786', 0),
(7, 'Ahsan', ' Tahsin', ' tasfiah22', 'tasfiahahsan@somu.com', 'Somu2$', 'subidbazar', '01772355879', 'Sylhet', '2023-06-25', 'Female', 'ce6e9057b32d09c0e56e1833dc2f8cb0', 0),
(11, 'Arif', ' Xyzzzz', ' xyzzz', 'arif_cse@lus.ac.bd', 'Tasfiah1!', 'pathantula', '01731566789', 'Sylhet', '1995-06-07', 'Male', '51e002ce66d71b28295b374a2c6edc77', 0),
(12, 'Tasfiah', ' Tahsin', ' tarin', 'tasfiahahsan@gmail.com', 'Tasfiahh1!', 'mejortila', '01721566789', 'Khulna', '2000-05-05', 'Female', '9879a5535294dcc061844fa32430aa8f', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
