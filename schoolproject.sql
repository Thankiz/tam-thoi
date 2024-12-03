-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 15, 2024 lúc 03:25 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `schoolproject`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admission`
--

CREATE TABLE `admission` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(38) DEFAULT NULL,
  `phone` int(20) DEFAULT NULL,
  `message` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course`
--

CREATE TABLE `course` (
  `id` int(20) NOT NULL,
  `name` varchar(38) DEFAULT NULL,
  `image` varchar(38) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `course`
--

INSERT INTO `course` (`id`, `name`, `image`) VALUES
(1, 'Vật lí 10', 'image/vat_li_10.jpg'),
(2, 'Ngữ văn 12', 'image/ngu_van_12.jpg'),
(3, 'Tiếng anh 11', 'image/tieng_anh_11.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teacher`
--

CREATE TABLE `teacher` (
  `id` int(20) NOT NULL,
  `name` varchar(38) DEFAULT NULL,
  `description` varchar(38) DEFAULT NULL,
  `image` varchar(38) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `description`, `image`) VALUES
(1, 'Dương Văn Hoạt', 'Giáo viên môn tiếng anh', 'image/duong_van_hoat.jpg'),
(2, 'Hoàng Thị Yến', 'Giáo viên môn toán', 'image/hoang_thi_yen.jpg'),
(3, 'Nguyễn Thanh Họa', 'Giáo viên môn tiếng anh', 'image/nguyen_thanh_hoa.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `phone` int(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `term1_score` float DEFAULT NULL,
  `term2_score` float DEFAULT NULL,
  `average_score`float	DEFAULT,
  `usertype` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `phone`, `email`, `usertype`, `password`) VALUES
(1, 'admin', 359956386, 'nguyenbinhduong12102003@gmail.com', 'admin', '123456'),
(27, 'shakil', 856216269, 'nbduong@fpt.edu.vn', 'student', '123456');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
   ADD `average_score` FLOAT GENERATED ALWAYS AS ((`term1_score` + `term2_score`) / 2) STORED;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admission`
--
ALTER TABLE `admission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `course`
--
ALTER TABLE `course`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
