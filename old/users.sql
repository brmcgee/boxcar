-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 02:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boxcar`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `display_name` varchar(25) NOT NULL,
  `user_password` varchar(25) NOT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp(),
  `avatar` varchar(75) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `display_name`, `user_password`, `reg_date`, `avatar`, `email`) VALUES
(9, 'Guest', 'password', '2024-02-26', 'https://showmelyrics.com/images/nophoto.jpg', 'guest@google.com'),
(34, 'Brian Mc', 'password', '2024-02-26', 'https://www.brmcontractors.net/blog/assets/gallery/brian.jpg', 'brian@gmail.com'),
(35, 'Cricket', 'password', '2024-02-26', 'https://tse3.mm.bing.net/th?id=OIP.s7xRaM1qVH6s9vqPDkT_LQHaGV&pid=Api&P=0&h', 'cricket@gmail.com'),
(36, 'Lady G', 'password', '2024-02-26', 'https://tse3.mm.bing.net/th?id=OIP._bvbgfrgTB4oBTD2PWqk0QHaHa&pid=Api&P=0&h', 'gaga@gmail.com');

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
