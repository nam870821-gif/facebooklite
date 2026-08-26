-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 20, 2020 lúc 04:42 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `4_facebook`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `photo`
--

CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `uid` varchar(55) NOT NULL,
  `fbid` varchar(100) NOT NULL,
  `img_url` varchar(100) NOT NULL,
  `time` varchar(32) NOT NULL,
  `like` int(11) NOT NULL DEFAULT 0,
  `cmt` int(11) NOT NULL DEFAULT 0,
  `share` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `photo`
--

INSERT INTO `photo` (`id`, `username`, `uid`, `fbid`, `img_url`, `time`, `like`, `cmt`, `share`) VALUES
(59, 'kunloc', '711638124489614', '7471414611187348', 'data/C22333p123123ture.jpg', '1608455779', 0, 0, 0),
(60, 'kunloc', '711638124489614', '3694378827319626', 'data/132342343h.jpg', '1608455779', 0, 0, 0),
(61, 'kunloc', '711638124489614', '1698551864653386', 'data/Saveqweqwollqweqwe.jpg', '1608455779', 0, 0, 0),
(62, 'kunloc', '658859498532826', '7315327522411866', 'data/C22333p123123ture.jpg', '1608455836', 0, 0, 0),
(63, 'kunloc', '658859498532826', '3944227657922694', 'data/132342343h.jpg', '1608455836', 0, 0, 0),
(64, 'kunloc', '658859498532826', '2743862778858441', 'data/Saveqweqwollqweqwe.jpg', '1608455836', 0, 0, 0),
(66, 'kunloc', '194382127636728', '8795685722457257', 'data/asasasdsdaas243234234432.jpg', '1608456233', 0, 0, 0),
(68, 'kunloc', '125238853766234', '4218231552446314', 'data/132342343h.jpg', '1608456848', 0, 0, 0),
(69, 'kunloc', '297654346563226', '7272354478949276', 'data/asasasdsdaas243234234432.jpg', '1608457983', 0, 0, 0),
(70, 'kunloc', '297654346563226', '2964532781397433', 'data/132342343h.jpg', '1608457983', 0, 0, 0),
(71, 'kunloc', '297654346563226', '4714466459875688', 'data/Saveqweqwollqweqwe.jpg', '1608457983', 0, 0, 0),
(72, 'kunloc', '473378548251997', '5572825512216978', 'data/123123sqse2213ewawe.jpg', '1608473417', 0, 0, 0),
(73, 'kunloc', '473378548251997', '7751266338256998', 'data/Captur12312333333e.jpg', '1608473417', 0, 0, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
