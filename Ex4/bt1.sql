-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 19, 2021 lúc 03:37 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bt1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employee`
--

CREATE TABLE `employee` (
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `salary` int(11) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birthday` date NOT NULL,
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `employee`
--

INSERT INTO `employee` (`name`, `description`, `salary`, `gender`, `birthday`, `id`, `created_at`) VALUES
('Nguyen Van Hung', 'nhan vien', 20000000, 0, '0000-00-00', 1, '2021-11-14 04:22:31'),
('Inga Gould', 'Kameko Trujillo', 134353222, 0, '2009-05-22', 2, '2021-11-14 00:00:00'),
('Galvin Russo', 'Suki Smith', 7, 1, '1973-10-05', 3, '2021-11-14 15:49:38'),
('Lillith Crosby', 'Judah Watts', 8, 0, '1975-11-16', 50, '2021-11-19 14:21:52'),
('Damian Palmer', 'Martha Velez', 8, 0, '2009-10-06', 63, '2021-11-19 18:31:23'),
('Chloe Bailey', 'Graham Williams', 1, 0, '1973-03-14', 64, '2021-11-19 18:31:23'),
('Christine Golden', 'Stella Daniels', 8, 0, '2021-09-10', 65, '2021-11-19 18:40:22'),
('Nathaniel Jarvis', 'Noelle Ford', 15, 0, '1997-02-25', 66, '2021-11-19 18:42:02'),
('Nathaniel Jarvis', 'Noelle Ford', 15, 0, '1997-02-25', 67, '2021-11-19 18:42:02');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
