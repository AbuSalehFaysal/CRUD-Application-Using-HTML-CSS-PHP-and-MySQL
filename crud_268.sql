-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2019 at 06:08 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_268`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cell` varchar(20) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `uname`, `email`, `cell`, `pass`, `photo`, `status`) VALUES
(1, 'Asraful Haque', 'haq47', 'haq@gmail.com', '01717700811', '$2y$10$U1MfOSd5zTF8qfsDhvAxwOhV.aLuf8KiyGHe0DX0bLwZ9si5k/3w.', '416bc2490f31c6400b7e24370755bd2a.jpg', 'active'),
(2, 'Nayeem', 'nayeem', 'nayeem@gmail.com', '111111', '$2y$10$HVKPqvfgDdcErRpXtYHA.u1diuRH3ALxgGcD/XpbIlpLwuwLfZaLy', '07870e24f4a680316f03855704679574.jpg', 'active'),
(3, 'Abu Al Faisal', 'abu', 'abu@gmail.com', '222222', '$2y$10$GoiZ7Hi8ZQ7cn1y0Jw/pleOsK2RhaTqCpYYkGqSEtURD1COi5CcS6', 'e27f49051e78a0238b3d7a9548c12b7d.jpeg', 'active'),
(4, 'Mazin', 'mazin', 'maazin@gmail.com', '777', '$2y$10$qx991GA7o3t45UnrqetftevaeTxvfUklSmjexKghTk0wHWZXGDxbO', '11bc84da7256307a49a20b432b1e4ad1.jpg', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
