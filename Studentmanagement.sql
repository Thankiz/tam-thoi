-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 09:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(38) DEFAULT NULL,
  `phone` int(20) DEFAULT NULL,
  `term1_score` float DEFAULT NULL,
  `term2_score` float DEFAULT NULL,
  `average_score`float	DEFAULT,
  `message` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(20) NOT NULL,
  `name` varchar(38) DEFAULT NULL,
  `image` varchar(38) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `image`) VALUES
(1, 'Vật lí 10', 'image/vat_li_10.jpg'),
(2, 'Ngữ văn 12', 'image/ngu_van_12.jpg'),
(3, 'Tiếng anh 11', 'image/tieng_anh_11.jpg'),
(11, 'Hóa học', 'image/anh1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(20) NOT NULL,
  `name` varchar(38) DEFAULT NULL,
  `description` varchar(38) DEFAULT NULL,
  `image` varchar(38) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `description`, `image`) VALUES
(1, 'Dương Văn Hoạt', 'Giáo viên môn tiếng anh', 'image/duong_van_hoat.jpg'),
(2, 'Hoàng Thị Yến', 'Giáo viên môn toán', 'image/hoang_thi_yen.jpg'),
(3, 'Nguyễn Thanh Họa', 'Giáo viên môn tiếng anh', 'image/nguyen_thanh_hoa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `phone` int(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `term1_score` FLOAT DEFAULT 0,
  `term2_score` FLOAT DEFAULT 0,
  `usertype` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `phone`, `email`, `usertype`, `password`) VALUES
(1, 'admin', 359956386, 'nguyenbinhduong12102003@gmail.com', 'admin', '123456'),
(28, 'Tong Thuyet', 375163578, 'tongthuyet442@gmail.com', 'student', '123'),
(29, 'thuyet', 375163578, 'thuyettong2003@gmail.com', 'student', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`id`);
 
 


--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`), 
  ADD `average_score` FLOAT GENERATED ALWAYS AS ((`term1_score` + `term2_score`) / 2) STORED;


--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
