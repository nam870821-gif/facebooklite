-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th5 08, 2021 lúc 06:53 PM
-- Phiên bản máy phục vụ: 10.2.37-MariaDB-cll-lve
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mfbsin_facebooks`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `317389574998690`
--

CREATE TABLE `317389574998690` (
  `id` int(11) NOT NULL,
  `username` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `317389574998690`
--

INSERT INTO `317389574998690` (`id`, `username`, `fullname`, `text`) VALUES
(1, 'kunloc', '123', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accept`
--

CREATE TABLE `accept` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `uid2` varchar(100) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `accept`
--

INSERT INTO `accept` (`id`, `username`, `uid`, `uid2`, `time`) VALUES
(8, 'kunlocs', '7', '4', '1620444155');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noi_lam_viec` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `noi_o_hien_tai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `fullname` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Người dùng Facebook',
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0123456789',
  `tinh_trang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `avatar` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'data/none.jpg',
  `background` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'img/bg.jpg',
  `followers` int(20) NOT NULL DEFAULT 0,
  `ip` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '182.00.00',
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `veri_code` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '123456',
  `confirm_status` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `trangthai` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal',
  `ngay_tham_gia` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `noi_lam_viec`, `noi_o_hien_tai`, `fullname`, `email`, `phone`, `tinh_trang`, `avatar`, `background`, `followers`, `ip`, `token`, `veri_code`, `confirm_status`, `trangthai`, `ngay_tham_gia`) VALUES
(4, 'Vippro1020', 'd7064224895eb8407299ee7f41923be3', '0', '0', 'La Văn Quân', 'vippro1020@gmail.com', '0888877012', '0', 'data/408091da30297803d0ac97309be34bea.jpg', 'null', 0, '27.71.108.175', 'icdVLgxJGwKANxdghypni8DmPNmbWq', '171261', 'false', '1', '1152421200'),
(3, 'kunloc', '26ab4edaada2feaa5770e9dabfdb088d', 'TP Hồ Chí Minh', 'TP Hồ Chí Minh', 'Nguyễn Thành Lộc', 'best.lee.kunloc@gmail.com', '0907716530', 'Đang tìm hiểu', 'data/9a24cb6cf310e71e21c81b3911e32a8f.jpg', 'null', 999999, '1.53.113.71', 'cs392Z5ViuOmSo7AIhiL1wUOUDRB8c', '436689', 'verify', '1', '1072933200'),
(2, 'gamattrang', 'eda708f11b741b12438e087bbfc62376', '0', '0', 'Nguyễn Phú Hưng', 'phuh0594@gmail.com', '0773373119', '0', 'data/none.jpg', 'null', 0, '171.246.173.95', 'uZ0pgACRBbeQQIuFIthHhm0FoiSf0i', '530683', 'false', 'disabled', '1072933200'),
(6, 'truclinh', 'e42a7a55538886c9be781aff3bb74553', 'Rạch Kiến High School', 'Thành phố Hồ Chí Minh', 'Phạm Ngọc Trúc Linh (Bé ty)', 'lin@gmail.com', '9078678662', 'Độc thân', 'data/7237cc82829bdc3354dbaf52d4f405e9.jpg', 'null', 10032654, '1.53.113.71', 'fQ3Qtal56qwm9OhJrSAakyNyqHXHB8', '101426', 'admin', '1', '1451624400'),
(7, 'kunlocs', 'b844abdf1aa4129c92c4edaf1b0a12f6', 'TP Hồ Chí Minh', 'TP Hồ Chí Minh', 'Hạ lộc', 'nguyenthanhloc.nguyen.100@gmail.com', '09077165301', 'Đang tìm hiểu', 'data/2b2031d8912b6ef5ce6ffb86897dc922.jpg', 'data/6ee929fc5f6c1b1b7ed3f05a1a95cf18.jpeg', 0, '1.53.113.71', 'Bk1wC4paoNihGgRrO5oIfuwQsyI03s', '455583', 'false', '1', '1620444027'),
(8, 'IKẹejeiekeke', 'f07b418f9c63616e5aff912e6f11d67f', '0', '0', 'Jeieieie', 'lekekdke@gmail.com', '6464454545', '0', 'data/none.jpg', 'null', 0, '1.53.113.71', '4ccxHuTVOeg4LDKEzb8CVK4HUeE6ad', '198779', 'false', 'normal', '1620451969');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `anhnoibat`
--

CREATE TABLE `anhnoibat` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `fbid` varchar(100) NOT NULL,
  `anh1` varchar(100) NOT NULL DEFAULT '0',
  `anh2` varchar(100) NOT NULL DEFAULT '0',
  `anh3` varchar(100) NOT NULL DEFAULT '0',
  `time` varchar(30) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `anhnoibat`
--

INSERT INTO `anhnoibat` (`id`, `username`, `fbid`, `anh1`, `anh2`, `anh3`, `time`) VALUES
(1, 'kunloc', '886632725587775', 'data/f2677effc5696ff001c87e6be62829f5.jpg', 'data/f1ccffa90b3e75b29d3c43105bea2ac4.jpg', '0', '1620271636');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `block`
--

CREATE TABLE `block` (
  `id` int(11) NOT NULL,
  `uid` int(55) NOT NULL,
  `time` int(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chatbox`
--

CREATE TABLE `chatbox` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `message` varchar(100) NOT NULL,
  `ip` varchar(32) NOT NULL,
  `location` varchar(32) NOT NULL,
  `time` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chatbox`
--

INSERT INTO `chatbox` (`id`, `username`, `message`, `ip`, `location`, `time`) VALUES
(2, 'kunlocs', '234234234', '1.53.113.71', 'Ho Chi Minh City', '1620444182'),
(3, 'kunloc', '123123', '1.53.113.71', 'Ho Chi Minh City', '1620473805'),
(4, 'kunloc', '43', '1.53.113.71', 'Ho Chi Minh City', '1620473859');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `checkpoint`
--

CREATE TABLE `checkpoint` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `ngaysinh` varchar(55) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `active` varchar(30) NOT NULL,
  `support` varchar(100) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment_post`
--

CREATE TABLE `comment_post` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `text` varchar(100) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `time` varchar(30) NOT NULL,
  `keycode` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comment_post`
--

INSERT INTO `comment_post` (`id`, `username`, `text`, `uid`, `time`, `keycode`) VALUES
(1, 'kunloc', '1312', '177624157398832', '1620357391', 'mjm36f3zc755x4ab99fx'),
(2, 'kunloc', '123', '715284777676498', '1620357873', 'p27x7k1358d6jdy6la39'),
(3, 'kunloc', '123213', '715284777676498', '1620357874', 'l2zc24zmj4kb9k4m8zm4'),
(4, 'kunloc', '2343', '715284777676498', '1620357913', 'yjjff3ap43a69j322mby'),
(5, 'kunloc', '213231', '715284777676498', '1620357962', '85l8ycjxl8baakjk8b11'),
(6, 'kunloc', '123123', '715284777676498', '1620357967', 'z1xkkcpp74c9pm48bd61'),
(7, 'kunloc', '`123312311', '715284777676498', '1620357970', 'kpba5c9c6aa2d87al8p4'),
(8, 'kunloc', '2321', '823784299669491', '1620360772', 'cc78mfk6x58a172lk11k'),
(9, 'kunloc', '23123', '823784299669491', '1620360774', 'y4b5jx81c4j172zm3z5z'),
(10, 'kunloc', '213123', '823784299669491', '1620360804', '1a6dmzz4l33c7fm13k8p'),
(11, 'kunloc', '123123', '823784299669491', '1620360827', 'a3lf1mz6989c8l366k8d'),
(12, 'kunloc', '213123', '823784299669491', '1620360851', 'y6ja11alxb5cay1a2ff9'),
(13, 'kunloc', '23123', '823784299669491', '1620360857', 'y7dyl24bp58lkf8l6abf'),
(14, 'truclinh', 'tym ❤', '799235269194572', '1620443487', 'j9xlmfk55kd78586546d'),
(15, 'Vippro1020', 'like anh ơi', '799235269194572', '1620443488', 'ka5ff1687jcdyzf1yk2x'),
(16, 'Vippro1020', 'anh ơi em cần mua like', '799235269194572', '1620443490', 'y84akla6ll1pkjd1ylmd'),
(17, 'gamattrang', 'rep inbox e', '799235269194572', '1620443491', '1x49kk4768apkxf8z2d6'),
(18, 'Vippro1020', 'idol ❤', '799235269194572', '1620443492', 'c4x1mlbdlb7z65dxa3aa'),
(19, 'gamattrang', 'vip ', '799235269194572', '1620443493', 'f1a4d9dxjya978b36f1a'),
(20, 'kunloc', 'ghê vkl', '799235269194572', '1620443494', 'xclckpc3381d1dydaxax'),
(21, 'kunloc', 'ngầu', '799235269194572', '1620443495', '3bd21ppm76ma86d2c83a'),
(22, 'Vippro1020', 'like anh ơi', '799235269194572', '1620443497', 'adpa5xmfbl841blmjb2b'),
(23, 'truclinh', 'uy tín nha', '799235269194572', '1620443498', 'a8zcj71cpa2z28f42ml1'),
(24, 'kunloc', 'cmt nè', '799235269194572', '1620443499', '97cabzl3694d83fz6x4d'),
(25, 'truclinh', 'tt tốt', '799235269194572', '1620443500', '76a6z3kzd8a5976pyl2c'),
(26, 'Vippro1020', 'Bạn gái tôi rất xấu nhưng được cái kết cấu nó đẹp.Tuy mình không đẹp...nhưng còn lâu mới xấu.', '799235269194572', '1620443503', '8jcz3j39pamzmb65x7jc'),
(27, 'gamattrang', 'Đau đầu vì tiền, điên đầu vì tình, đâm đầu vào tường.', '799235269194572', '1620443504', '1531bd1cfl7634m3mcdp'),
(28, 'kunloc', 'Tôi cao không bằng ai….nhưng được cái nằm xuống thì tôi dài 1m76 ! ', '799235269194572', '1620443505', 'l719lk4cz39a7bj8c7cc'),
(29, 'Vippro1020', 'Đau đầu vì tiền, điên đầu vì tình, đâm đầu vào tường.', '799235269194572', '1620443507', '1ja6m86j479adjm9m9ja'),
(30, 'Vippro1020', 'Xin pr đi ☺', '799235269194572', '1620443508', '81fcbmm1c3674xj18p3f'),
(31, 'gamattrang', 'up', '799235269194572', '1620443509', '8jjly66a3fx1mclyla8d'),
(32, 'truclinh', 'Lộc đẹp trai', '799235269194572', '1620443510', 'x8l2kp1ylaadlyj117f2'),
(33, 'truclinh', 'Xin pr đi ☺', '799235269194572', '1620443513', 'cl4618579cb5bm267xk4'),
(34, 'Vippro1020', 'cmt nè', '799235269194572', '1620443513', '5z4433da1l96z4ly6a8j'),
(35, 'Vippro1020', 'hi pro add me', '799235269194572', '1620443514', 'bmaak6zjpf562a448djc'),
(36, 'Vippro1020', 'add em đi ☺', '799235269194572', '1620443514', '4m1jd8p72mbc825mamd4'),
(37, 'kunloc', 'Xin pr đi ☺', '799235269194572', '1620443515', '752p957aa63ajd9xa72y'),
(38, 'truclinh', 'Đằng sau nụ cười là nước mắt...đằng sau nước mắt là..cá sấu.', '799235269194572', '1620443515', 'ad5157229y5579c3abb6'),
(39, 'Vippro1020', 'Add', '799235269194572', '1620443517', '2644ad8p9kaj3jxa5pk8'),
(40, 'truclinh', 'Dù gái hay trai….cứ lai rai mà đẻ ! ', '799235269194572', '1620443517', 'lpxc24yba7acxyc3maam'),
(41, 'truclinh', 'hi pro ', '799235269194572', '1620443519', '4ap3522a8aaa28a8akka'),
(42, 'truclinh', 'Đau đầu vì tiền, điên đầu vì tình, đâm đầu vào tường.', '799235269194572', '1620443520', 'pjj2xml53522543afkcf'),
(43, 'kunloc', 'Rep ib', '799235269194572', '1620443521', '4aab933b7xp2mlfjbd86'),
(44, 'Vippro1020', 'trả tt nè', '799235269194572', '1620443522', 'z99xba9aj4bb3flm5676'),
(45, 'truclinh', 'vip quá Anh', '799235269194572', '1620443523', 'xz28c396x85c9y15fb61'),
(46, 'Vippro1020', 'add tui đi Lộc', '799235269194572', '1620443525', '9bj4a13d2364f65p4571'),
(47, 'Vippro1020', 'trả tt nè', '799235269194572', '1620443526', 'p32pylc1257xpbzzjb4x'),
(48, 'gamattrang', 'Có khi nào trên đường đời tấp nập, ta vô tình vấp phải sấp đô la?', '799235269194572', '1620443529', 'ax9afa19pdmb2a5lc514'),
(49, 'Vippro1020', 'Trông bạn quen quen, hình như tớ … chưa gặp bao giờ ', '799235269194572', '1620443530', '5a6z8abp9l9y62ydzb7m'),
(50, 'truclinh', 'like', '799235269194572', '1620443531', 'f7a7cx9l32flflykj91f'),
(51, 'kunloc', 'chẩn', '799235269194572', '1620443533', '8z2ckdzka6mybkj1da75'),
(52, 'truclinh', 'add e', '799235269194572', '1620443534', 'ldpxfx12jyacj3fk5m8l'),
(53, 'truclinh', 'Tôi cao không bằng ai….nhưng được cái nằm xuống thì tôi dài 1m76 ! ', '799235269194572', '1620443535', 'yldlbz4x9jcja3z5z411'),
(54, 'kunloc', 'trả tt nè', '799235269194572', '1620443536', 'ab5598yby7za5jpk58fd'),
(55, 'gamattrang', 'Giang hồ hiểm ác anh không sợ, chỉ sợ đường về THẤY bóng em.  ', '799235269194572', '1620443537', 'fzmbc7xzacc85mm44y1d'),
(56, 'gamattrang', 'like anh ơi', '799235269194572', '1620443538', 'b1c7bzdabpb8xd6m9a4k'),
(57, 'kunloc', 'Dù gái hay trai….cứ lai rai mà đẻ ! ', '799235269194572', '1620443541', '3j3zl7lm5j5jp41p9817'),
(58, 'Vippro1020', 'Đau đầu vì tiền, điên đầu vì tình, đâm đầu vào tường.', '799235269194572', '1620443542', 'pm5fj5ay455a6b387z36'),
(59, 'gamattrang', 'Add', '799235269194572', '1620443543', 'am25f83aajc4k6d9ffkp'),
(60, 'Vippro1020', 'vip quá Anh', '799235269194572', '1620443544', 'l8a75l633m88ymd2fa9l'),
(61, 'gamattrang', 'chẩn', '799235269194572', '1620443545', 'ffkaf4586k77j5f35p1b'),
(62, 'kunloc', 'add em đi ☺', '799235269194572', '1620443548', 'p219fx5815x58x2b43zd'),
(63, 'truclinh', 'tương tác', '799235269194572', '1620443549', '7llc8fak581fj25adkaa'),
(64, 'kunloc', 'add em đi ☺', '799235269194572', '1620443550', '9jccka8c13ya44p3mj5a'),
(65, 'truclinh', 'vip vậy', '799235269194572', '1620443552', '68pp5mdmdapl9zaj7244'),
(66, 'truclinh', 'chẩn', '799235269194572', '1620443553', '6f6f82yp2yj4zc1783da'),
(67, 'Vippro1020', 'Giang hồ hiểm ác anh không sợ, chỉ sợ đường về THẤY bóng em.  ', '799235269194572', '1620443555', 'laf2a9da6maa7jfjmfm8'),
(68, 'kunloc', 'ngầu', '799235269194572', '1620443556', '24f9abjaazz797ybadam'),
(69, 'truclinh', 'tym ❤', '799235269194572', '1620443557', '3a65zzb4m34aaa97638y'),
(70, 'truclinh', 'ngầu', '799235269194572', '1620443558', '112cpk5pbb975dafd5b4'),
(71, 'kunloc', 'add 😉', '799235269194572', '1620443560', 'a7lx8jj821amc5bb6cc6'),
(72, 'kunloc', 'add em đi ☺', '799235269194572', '1620443561', 'aaa6axa5848147f56d2a'),
(73, 'gamattrang', 'Bực mình sinh sự...bụng bự sinh con...', '799235269194572', '1620443562', 'c6y7k74ljya1jbz8p3k2'),
(74, 'kunloc', 'Chúng ta yêu súc vật, vì....thịt chúng rất ngon.', '799235269194572', '1620443564', 'xzlx9k756mpjkm952381'),
(75, 'truclinh', 'hi pro ', '799235269194572', '1620443568', '376da9d3z881c12mx16k'),
(76, 'gamattrang', 'Làm con gái phải ngang tàn ngạo ngễ...Sống trên đời phải hóng hách kiêu sa.', '799235269194572', '1620443569', '34b5f2yzppx43a8b832l'),
(77, 'Vippro1020', 'Đằng sau nụ cười là nước mắt...đằng sau nước mắt là..cá sấu.', '799235269194572', '1620443571', '2amj9j9kj4lmkp69y422'),
(78, 'kunloc', 'Đằng sau nụ cười là nước mắt...đằng sau nước mắt là..cá sấu.', '799235269194572', '1620443572', '4b2b941fp5ldylbk93lm'),
(79, 'gamattrang', 'like', '799235269194572', '1620444116', '78d5xf2aj9appyfzc6fd'),
(80, 'Vippro1020', 'uy tín nha', '799235269194572', '1620444117', 'lb6m87lz5mayffcax3b5'),
(81, 'Vippro1020', 'addfr với :v', '565131753321794', '1620444119', 'ydbb9aljakm5jaf5m785'),
(82, 'Vippro1020', 'add e', '565131753321794', '1620444120', 'jcxmbbmpmxcd5adac8pp'),
(83, 'kunloc', 'Có khi nào trên đường đời tấp nập, ta vô tình vấp phải sấp đô la?', '565131753321794', '1620444121', 'xzk7j42cylyff91px6db'),
(84, 'truclinh', 'Add', '565131753321794', '1620444122', '7z929dk1yz4dac41azk6'),
(85, 'kunloc', 'anh ơi em cần mua like', '565131753321794', '1620444124', 'ja2dxd1jd6c3f8kbm77z'),
(86, 'Vippro1020', 'like', '565131753321794', '1620444127', '45mpzyflbd3fb98mfb5c'),
(87, 'kunlocs', 'trả tt nè', '565131753321794', '1620444128', 'l713ad2z1ppy7jkk7zxm'),
(88, 'Vippro1020', 'Đau đầu vì tiền, điên đầu vì tình, đâm đầu vào tường.', '565131753321794', '1620444130', 'xca7y7pjmk3ajka887xx'),
(89, 'kunloc', 'add tui đi Lộc', '565131753321794', '1620444131', 'b655ka27j7pmz4p4xaxb'),
(90, 'kunlocs', 'vip vậy', '565131753321794', '1620444132', 'lpalfml164ambk46ldf7'),
(91, 'kunloc', 'add e với a 😍', '565131753321794', '1620444133', 'ma88ka59a91xff65ppa3'),
(92, 'Vippro1020', 'Hello', '565131753321794', '1620444135', 'kaa52djl2yazza6la6bd'),
(93, 'gamattrang', 'best rồi', '565131753321794', '1620444136', 'aaypzyaj3bjab7a7a19a'),
(94, 'kunlocs', ',,,,,,,,,,,,,,,', '565131753321794', '1620444136', '9k6xpc7xm42x3djlm77m'),
(95, 'Vippro1020', 'add em đi ☺', '565131753321794', '1620444137', '8c5621m756kkf88ab2c8'),
(96, 'Vippro1020', 'cmt nè', '565131753321794', '1620444138', 'pxamk7da7z932dzklzjk'),
(97, 'kunlocs', ',,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,', '565131753321794', '1620444140', '6kc6zp16j1f685kd6ada'),
(98, 'gamattrang', 'Đau đầu vì tiền, điên đầu vì tình, đâm đầu vào tường.', '565131753321794', '1620444142', '1plzxa2blf4xl4xf6bfy'),
(99, 'kunlocs', 'anh ơi em cần mua like', '565131753321794', '1620444143', '4m9dp9kld6dlydy3y7c1'),
(100, 'truclinh', 'ghê vkl', '565131753321794', '1620444145', 'mbx7xxxm5252m1c4y45f'),
(101, 'kunlocs', 'vip vậy', '565131753321794', '1620444146', '1kj342x1pb3b346446yb'),
(102, 'Vippro1020', 'like', '565131753321794', '1620444148', 'fy5j138m58y1ym3ddjyc'),
(103, 'Vippro1020', 'up', '565131753321794', '1620444149', 'dmk6j9aczx15m89j9mpb'),
(104, 'kunloc', 'Kban nha :3', '565131753321794', '1620444151', 'z22d652mmak18fbdj25k'),
(105, 'kunloc', 'addfr với :v', '565131753321794', '1620444152', 'y19yjbpfyaap43x32ca8'),
(106, 'Vippro1020', 'vip ', '565131753321794', '1620444153', 'zljap1axkz187mjfblbp'),
(107, 'gamattrang', 'Fuck', '565131753321794', '1620444157', 'd86bjl8a14l94xb1ap1x'),
(108, 'kunlocs', 'hi pro ', '565131753321794', '1620444158', '595mpx617xb3xm68az79'),
(109, 'kunlocs', 'Add', '565131753321794', '1620444159', '5y6lfbk26kl34j587y2a'),
(110, 'kunloc', 'add 😉', '565131753321794', '1620444161', 'yxz3355ppckplbd5pa7f'),
(111, 'kunlocs', 'like', '565131753321794', '1620444162', '1dx2cmadaa4m6pb87966'),
(112, 'truclinh', 'Đau đầu vì tiền, điên đầu vì tình, đâm đầu vào tường.', '565131753321794', '1620444165', '7px9lj2d3cmkdac2py1x'),
(113, 'gamattrang', 'anh ơi em cần mua like', '565131753321794', '1620444166', 'd9d2bb17xdfjbdf9cjmy'),
(114, 'truclinh', 'Đau đầu vì tiền, điên đầu vì tình, đâm đầu vào tường.', '565131753321794', '1620444167', 'pz5bjbpxxb3ladxda84a'),
(115, 'kunloc', 'Kban nha :3', '565131753321794', '1620444168', '72m1cx5z3fmcm4p99a66'),
(116, 'gamattrang', 'trả tt nè', '565131753321794', '1620444169', 'xaxb6f6f7bdmlb5p31cf'),
(117, 'truclinh', 'Add', '565131753321794', '1620444171', 'k895a94ybkzd922lxxjj'),
(118, 'truclinh', 'like', '565131753321794', '1620444173', '1m6az62p4lc1zfz8ca9z'),
(119, 'truclinh', 'tt nha', '565131753321794', '1620444174', 'c646788f98mz374a2za7'),
(120, 'gamattrang', 'Tiên học lễ hậu học....ăn.', '565131753321794', '1620444175', '33a9ydl2amp865jdjm8k'),
(121, 'Vippro1020', 'rep inbox e', '565131753321794', '1620444176', 'z61b5mj4zm5kpm9ffjbc'),
(122, 'kunloc', 'tt nha', '565131753321794', '1620444178', '218m8ka8bj64z15fy8zc'),
(123, 'truclinh', 'best rồi', '565131753321794', '1620444179', 'axz15c7fzmz9m1jzyy5c'),
(124, 'Vippro1020', 'Rep ib', '565131753321794', '1620444182', 'bxacjxb2aj1x5my74zjz'),
(125, 'gamattrang', 'Đằng sau nụ cười là nước mắt...đằng sau nước mắt là..cá sấu.', '565131753321794', '1620444184', 'zfm1x1l5c38789c9xy61'),
(126, 'kunloc', 'Dù gái hay trai….cứ lai rai mà đẻ ! ', '565131753321794', '1620444186', 'xxaja16k6la51kxa1dpd'),
(127, 'kunloc', 'Đau đầu vì tiền, điên đầu vì tình, đâm đầu vào tường.', '565131753321794', '1620444187', '3ad8a6pza36b2a8xcz3k'),
(128, 'kunlocs', 'Bạn gái tôi rất xấu nhưng được cái kết cấu nó đẹp.Tuy mình không đẹp...nhưng còn lâu mới xấu.', '565131753321794', '1620444188', '8a8b27fc27pzapyayjy3'),
(129, 'gamattrang', 'Đằng sau nụ cười là nước mắt...đằng sau nước mắt là..cá sấu.', '565131753321794', '1620444189', 'pm43zm8jp4d74ll8laym'),
(130, 'kunloc', 'tt', '565131753321794', '1620444191', '2f8xj49pc326a587a5z3'),
(131, 'gamattrang', 'rep inbox e', '565131753321794', '1620444193', 'fa21b86y8kc26m7af63z'),
(132, 'kunlocs', 'add tui đi Lộc', '565131753321794', '1620444194', 'jkaka1b9ll892x7cbp33'),
(133, 'Vippro1020', 'Tiên học lễ hậu học....ăn.', '565131753321794', '1620444195', 'cyj7fzam188j17y3acbc'),
(134, 'kunloc', 'up', '565131753321794', '1620444196', '2aj5jddk5jfbjljad4jy'),
(135, 'truclinh', 'tương tác', '799235269194572', '1620472762', 'mk77acddm44d4md741j1'),
(136, 'truclinh', 'Hello', '799235269194572', '1620472764', '2lf288dxp49b8mkd45ad'),
(137, 'Vippro1020', 'tt tốt', '799235269194572', '1620472769', 'pya35228ak3kkxfp866y'),
(138, 'truclinh', 'uy tín nha', '799235269194572', '1620472770', 'pm65p4byl41ff89jfca8'),
(139, 'gamattrang', 'Có khi nào trên đường đời tấp nập, ta vô tình vấp phải sấp đô la?', '799235269194572', '1620472772', 'kz9xa26c3x37115p5f45'),
(140, 'Vippro1020', 'Có khi nào trên đường đời tấp nập, ta vô tình vấp phải sấp đô la?', '799235269194572', '1620472773', 'l7pf6k2mkb2p2f87f16y'),
(141, 'kunlocs', 'Dù gái hay trai….cứ lai rai mà đẻ ! ', '799235269194572', '1620472774', '93p5z2f2akd4zm613d51'),
(142, 'IKẹejeiekeke', 'Có khi nào trên đường đời tấp nập, ta vô tình vấp phải sấp đô la?', '799235269194572', '1620472778', 'aj19jx89a361fz9bbycc'),
(143, 'gamattrang', 'Bạn gái tôi rất xấu nhưng được cái kết cấu nó đẹp.Tuy mình không đẹp...nhưng còn lâu mới xấu.', '799235269194572', '1620472780', 'jdl19x433kkm6a14132z'),
(144, 'IKẹejeiekeke', 'Tt 😘', '799235269194572', '1620472781', '1aja9lmc88yzfjamc6by');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `uid` varchar(55) NOT NULL,
  `uid2` varchar(55) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `friends`
--

INSERT INTO `friends` (`id`, `username`, `uid`, `uid2`, `time`) VALUES
(4, 'kunloc', '3', '6', '1620393801');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hop_thu_ho_tro`
--

CREATE TABLE `hop_thu_ho_tro` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `uid2` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `type` varchar(32) NOT NULL,
  `tieude` varchar(100) NOT NULL,
  `noidung` varchar(1000) NOT NULL,
  `time` varchar(30) NOT NULL,
  `trangthai` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hop_thu_ho_tro`
--

INSERT INTO `hop_thu_ho_tro` (`id`, `username`, `uid`, `uid2`, `link`, `type`, `tieude`, `noidung`, `time`, `trangthai`) VALUES
(1, 'kunloc', '3', '2', 'https://www.facebook.com/profile.php?id=4', 'Giả mạo người khác', 'Bạn đã báo cáo trang cá nhân mà bạn cho rằng đang giả mạo', 'Chúng tôi đã xem xét trang cá nhân mà bạn bè của bạn báo cáo.<br>\r\n                Chúng tôi nhận thấy người bạn báo cáo đã vi phạm nguyên tắc cộng đồng.<br>\r\n                Người bạn báo cáo sẽ bị xử lý theo nguyên tắc cộng đồng.<br>\r\n                Chúng tôi cảm ơn bạn vì điều này.<br>\r\n                Cảm ơn bạn! <br>\r\n                Đội ngũ Facebook', '1620272874', '1'),
(2, 'kunloc', '3', '6', '213123123', 'Giả mạo người khác', 'Bạn đã báo cáo trang cá nhân mà bạn cho rằng đang giả mạo', 'Chúng tôi đã xem xét trang cá nhân mà bạn bè của bạn báo cáo.<br>\r\n                Chúng tôi nhận thấy người bạn báo cáo đã vi phạm nguyên tắc cộng đồng.<br>\r\n                Người bạn báo cáo sẽ bị xử lý theo nguyên tắc cộng đồng.<br>\r\n                Chúng tôi cảm ơn bạn vì điều này.<br>\r\n                Cảm ơn bạn! <br>\r\n                Đội ngũ Facebook', '1620391685', '1'),
(3, 'kunlocs', '7', '4', 'profile.php?id=4', 'Giả mạo người khác', 'Bạn đã báo cáo trang cá nhân mà bạn cho rằng đang giả mạo', 'Hi Hạ lộc,<br> \r\n                     Chúng tôi sẽ xem xét trang cá nhân mà bạn bè của bạn báo cáo.<br>\r\n                     Lưu ý: Nếu bạn cho rằng nội dung mình nhìn thấy trên trang cá nhân của một người nào đó không nên xuất hiện trên Facebook, hãy nhớ báo cáo nội dung đó (ví dụ: ảnh hoặc video), chứ không phải là toàn bộ trang cá nhân đó.<br>\r\n                     Cảm ơn bạn! <br>\r\n                     Đội ngũ Facebook', '1620444166', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `inbox`
--

CREATE TABLE `inbox` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `text` text NOT NULL,
  `uid` varchar(100) NOT NULL,
  `uid2` varchar(100) NOT NULL,
  `time` int(30) NOT NULL,
  `seen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `inbox`
--

INSERT INTO `inbox` (`id`, `username`, `text`, `uid`, `uid2`, `time`, `seen`) VALUES
(1, 'kunloc', '#xoa', '6', '3', 1620399128, 1),
(2, 'kunloc', '#xoa', '3', '6', 1620399128, 1),
(3, 'kunlocs', '..........', '4', '7', 1620444160, 0),
(4, 'kunlocs', '..........', '7', '4', 1620444160, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lich_su_hoat_dong`
--

CREATE TABLE `lich_su_hoat_dong` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `tieude` varchar(55) NOT NULL,
  `noidung` text NOT NULL,
  `post` varchar(55) NOT NULL,
  `time` varchar(30) NOT NULL,
  `url` varchar(55) NOT NULL,
  `type` varchar(11) NOT NULL,
  `seen` varchar(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lich_su_hoat_dong`
--

INSERT INTO `lich_su_hoat_dong` (`id`, `username`, `uid`, `tieude`, `noidung`, `post`, `time`, `url`, `type`, `seen`) VALUES
(3, 'kunloc', '6', 'xxxxxxxxx', 'Đã gửi cho bạn 1 lời mời kết bạn.', 'null', '1620393161', 'profile.php?id=6', 'add', '1'),
(4, 'lololol', '3', 'NGUYỄN THÀNH LỘC', 'Đã chấp nhận lời mời kết bạn.', 'null', '1620393801', 'profile.php?id=3', 'add', '0'),
(5, '', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '226945695861459', '1620440190', 'story.php?fbid=226945695861459', 'like', '0'),
(6, '', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '981455321311942', '1620440193', 'story.php?fbid=981455321311942', 'like', '0'),
(7, 'kunloc', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '799235269194572', '1620443470', 'story.php?fbid=799235269194572', 'like', '0'),
(8, 'kunloc', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '799235269194572', '1620443471', 'story.php?fbid=799235269194572', 'like', '1'),
(9, 'kunloc', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '799235269194572', '1620443473', 'story.php?fbid=799235269194572', 'like', '1'),
(10, 'kunloc', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '799235269194572', '1620443474', 'story.php?fbid=799235269194572', 'like', '1'),
(11, 'kunloc', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '799235269194572', '1620443475', 'story.php?fbid=799235269194572', 'like', '0'),
(12, 'kunloc', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '799235269194572', '1620443476', 'story.php?fbid=799235269194572', 'like', '0'),
(13, 'kunloc', '2', 'Nguyễn Phú Hưng', 'Đã thích bài viết của bạn.', '799235269194572', '1620443477', 'story.php?fbid=799235269194572', 'like', '0'),
(14, 'kunloc', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '799235269194572', '1620443479', 'story.php?fbid=799235269194572', 'like', '0'),
(15, 'kunloc', '2', 'Nguyễn Phú Hưng', 'Đã thích bài viết của bạn.', '799235269194572', '1620443480', 'story.php?fbid=799235269194572', 'like', '0'),
(16, 'kunloc', '2', 'Nguyễn Phú Hưng', 'Đã thích bài viết của bạn.', '799235269194572', '1620443482', 'story.php?fbid=799235269194572', 'like', '0'),
(17, 'kunloc', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '799235269194572', '1620443483', 'story.php?fbid=799235269194572', 'like', '0'),
(18, 'kunloc', '2', 'Nguyễn Phú Hưng', 'Đã thích bài viết của bạn.', '799235269194572', '1620443484', 'story.php?fbid=799235269194572', 'like', '0'),
(19, 'kunloc', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '799235269194572', '1620443485', 'story.php?fbid=799235269194572', 'like', '1'),
(20, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443487', 'story.php?fbid=799235269194572', 'cmt', '0'),
(21, 'kunloc', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443488', 'story.php?fbid=799235269194572', 'cmt', '1'),
(22, 'kunloc', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443490', 'story.php?fbid=799235269194572', 'cmt', '1'),
(23, 'kunloc', '2', 'Nguyễn Phú Hưng', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443491', 'story.php?fbid=799235269194572', 'cmt', '0'),
(24, 'kunloc', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443492', 'story.php?fbid=799235269194572', 'cmt', '1'),
(25, 'kunloc', '2', 'Nguyễn Phú Hưng', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443493', 'story.php?fbid=799235269194572', 'cmt', '0'),
(26, 'kunloc', '3', 'Nguyễn Thành Lộc', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443494', 'story.php?fbid=799235269194572', 'cmt', '0'),
(27, 'kunloc', '3', 'Nguyễn Thành Lộc', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443495', 'story.php?fbid=799235269194572', 'cmt', '0'),
(28, 'kunloc', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443497', 'story.php?fbid=799235269194572', 'cmt', '1'),
(29, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443498', 'story.php?fbid=799235269194572', 'cmt', '0'),
(30, 'kunloc', '3', 'Nguyễn Thành Lộc', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443499', 'story.php?fbid=799235269194572', 'cmt', '0'),
(31, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443500', 'story.php?fbid=799235269194572', 'cmt', '0'),
(32, 'kunloc', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443503', 'story.php?fbid=799235269194572', 'cmt', '1'),
(33, 'kunloc', '2', 'Nguyễn Phú Hưng', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443504', 'story.php?fbid=799235269194572', 'cmt', '0'),
(34, 'kunloc', '3', 'Nguyễn Thành Lộc', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443505', 'story.php?fbid=799235269194572', 'cmt', '0'),
(35, 'kunloc', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443507', 'story.php?fbid=799235269194572', 'cmt', '1'),
(36, 'kunloc', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443508', 'story.php?fbid=799235269194572', 'cmt', '1'),
(37, 'kunloc', '2', 'Nguyễn Phú Hưng', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443509', 'story.php?fbid=799235269194572', 'cmt', '0'),
(38, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443510', 'story.php?fbid=799235269194572', 'cmt', '0'),
(39, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443513', 'story.php?fbid=799235269194572', 'cmt', '0'),
(40, 'kunloc', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443513', 'story.php?fbid=799235269194572', 'cmt', '1'),
(41, 'kunloc', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443514', 'story.php?fbid=799235269194572', 'cmt', '1'),
(42, 'kunloc', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443514', 'story.php?fbid=799235269194572', 'cmt', '1'),
(43, 'kunloc', '3', 'Nguyễn Thành Lộc', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443515', 'story.php?fbid=799235269194572', 'cmt', '0'),
(44, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443515', 'story.php?fbid=799235269194572', 'cmt', '0'),
(45, 'kunloc', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443517', 'story.php?fbid=799235269194572', 'cmt', '1'),
(46, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443517', 'story.php?fbid=799235269194572', 'cmt', '0'),
(47, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã thích bài viết của bạn.', '799235269194572', '1620443518', 'story.php?fbid=799235269194572', 'like', '0'),
(48, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443519', 'story.php?fbid=799235269194572', 'cmt', '0'),
(49, 'kunloc', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '799235269194572', '1620443519', 'story.php?fbid=799235269194572', 'like', '1'),
(50, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443520', 'story.php?fbid=799235269194572', 'cmt', '0'),
(51, 'kunloc', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '799235269194572', '1620443520', 'story.php?fbid=799235269194572', 'like', '0'),
(52, 'kunloc', '3', 'Nguyễn Thành Lộc', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443521', 'story.php?fbid=799235269194572', 'cmt', '0'),
(53, 'kunloc', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '799235269194572', '1620443521', 'story.php?fbid=799235269194572', 'like', '1'),
(54, 'kunloc', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443522', 'story.php?fbid=799235269194572', 'cmt', '1'),
(55, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã thích bài viết của bạn.', '799235269194572', '1620443523', 'story.php?fbid=799235269194572', 'like', '0'),
(56, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443523', 'story.php?fbid=799235269194572', 'cmt', '0'),
(57, 'kunloc', '2', 'Nguyễn Phú Hưng', 'Đã thích bài viết của bạn.', '799235269194572', '1620443524', 'story.php?fbid=799235269194572', 'like', '0'),
(58, 'kunloc', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443525', 'story.php?fbid=799235269194572', 'cmt', '1'),
(59, 'kunloc', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '799235269194572', '1620443525', 'story.php?fbid=799235269194572', 'like', '1'),
(60, 'kunloc', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443526', 'story.php?fbid=799235269194572', 'cmt', '1'),
(61, 'kunloc', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '799235269194572', '1620443526', 'story.php?fbid=799235269194572', 'like', '0'),
(62, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã thích bài viết của bạn.', '799235269194572', '1620443527', 'story.php?fbid=799235269194572', 'like', '0'),
(63, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã thích bài viết của bạn.', '799235269194572', '1620443528', 'story.php?fbid=799235269194572', 'like', '0'),
(64, 'kunloc', '2', 'Nguyễn Phú Hưng', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443529', 'story.php?fbid=799235269194572', 'cmt', '0'),
(65, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã thích bài viết của bạn.', '799235269194572', '1620443529', 'story.php?fbid=799235269194572', 'like', '0'),
(66, 'kunloc', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443530', 'story.php?fbid=799235269194572', 'cmt', '1'),
(67, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã thích bài viết của bạn.', '799235269194572', '1620443531', 'story.php?fbid=799235269194572', 'like', '0'),
(68, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443531', 'story.php?fbid=799235269194572', 'cmt', '0'),
(69, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã thích bài viết của bạn.', '799235269194572', '1620443532', 'story.php?fbid=799235269194572', 'like', '0'),
(70, 'kunloc', '3', 'Nguyễn Thành Lộc', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443533', 'story.php?fbid=799235269194572', 'cmt', '0'),
(71, 'kunloc', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '799235269194572', '1620443533', 'story.php?fbid=799235269194572', 'like', '0'),
(72, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443534', 'story.php?fbid=799235269194572', 'cmt', '0'),
(73, 'kunloc', '2', 'Nguyễn Phú Hưng', 'Đã thích bài viết của bạn.', '799235269194572', '1620443534', 'story.php?fbid=799235269194572', 'like', '0'),
(74, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443535', 'story.php?fbid=799235269194572', 'cmt', '0'),
(75, 'kunloc', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '799235269194572', '1620443535', 'story.php?fbid=799235269194572', 'like', '1'),
(76, 'kunloc', '3', 'Nguyễn Thành Lộc', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443536', 'story.php?fbid=799235269194572', 'cmt', '0'),
(77, 'kunloc', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '799235269194572', '1620443537', 'story.php?fbid=799235269194572', 'like', '1'),
(78, 'kunloc', '2', 'Nguyễn Phú Hưng', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443537', 'story.php?fbid=799235269194572', 'cmt', '0'),
(79, 'kunloc', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '799235269194572', '1620443538', 'story.php?fbid=799235269194572', 'like', '1'),
(80, 'kunloc', '2', 'Nguyễn Phú Hưng', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443538', 'story.php?fbid=799235269194572', 'cmt', '0'),
(81, 'kunloc', '2', 'Nguyễn Phú Hưng', 'Đã thích bài viết của bạn.', '799235269194572', '1620443539', 'story.php?fbid=799235269194572', 'like', '0'),
(82, 'kunloc', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '799235269194572', '1620443541', 'story.php?fbid=799235269194572', 'like', '1'),
(83, 'kunloc', '3', 'Nguyễn Thành Lộc', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443541', 'story.php?fbid=799235269194572', 'cmt', '0'),
(84, 'kunloc', '2', 'Nguyễn Phú Hưng', 'Đã thích bài viết của bạn.', '799235269194572', '1620443542', 'story.php?fbid=799235269194572', 'like', '0'),
(85, 'kunloc', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443542', 'story.php?fbid=799235269194572', 'cmt', '1'),
(86, 'kunloc', '2', 'Nguyễn Phú Hưng', 'Đã thích bài viết của bạn.', '799235269194572', '1620443543', 'story.php?fbid=799235269194572', 'like', '0'),
(87, 'kunloc', '2', 'Nguyễn Phú Hưng', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443543', 'story.php?fbid=799235269194572', 'cmt', '0'),
(88, 'kunloc', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '799235269194572', '1620443544', 'story.php?fbid=799235269194572', 'like', '1'),
(89, 'kunloc', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443544', 'story.php?fbid=799235269194572', 'cmt', '1'),
(90, 'kunloc', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '799235269194572', '1620443545', 'story.php?fbid=799235269194572', 'like', '0'),
(91, 'kunloc', '2', 'Nguyễn Phú Hưng', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443545', 'story.php?fbid=799235269194572', 'cmt', '0'),
(92, 'kunloc', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '799235269194572', '1620443546', 'story.php?fbid=799235269194572', 'like', '1'),
(93, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã thích bài viết của bạn.', '799235269194572', '1620443548', 'story.php?fbid=799235269194572', 'like', '0'),
(94, 'kunloc', '3', 'Nguyễn Thành Lộc', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443548', 'story.php?fbid=799235269194572', 'cmt', '0'),
(95, 'kunloc', '2', 'Nguyễn Phú Hưng', 'Đã thích bài viết của bạn.', '799235269194572', '1620443549', 'story.php?fbid=799235269194572', 'like', '0'),
(96, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443549', 'story.php?fbid=799235269194572', 'cmt', '0'),
(97, 'kunloc', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '799235269194572', '1620443550', 'story.php?fbid=799235269194572', 'like', '0'),
(98, 'kunloc', '3', 'Nguyễn Thành Lộc', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443550', 'story.php?fbid=799235269194572', 'cmt', '0'),
(99, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã thích bài viết của bạn.', '799235269194572', '1620443551', 'story.php?fbid=799235269194572', 'like', '0'),
(100, 'kunloc', '2', 'Nguyễn Phú Hưng', 'Đã thích bài viết của bạn.', '799235269194572', '1620443552', 'story.php?fbid=799235269194572', 'like', '0'),
(101, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443552', 'story.php?fbid=799235269194572', 'cmt', '0'),
(102, 'kunloc', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '799235269194572', '1620443553', 'story.php?fbid=799235269194572', 'like', '0'),
(103, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443553', 'story.php?fbid=799235269194572', 'cmt', '0'),
(104, 'kunloc', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '799235269194572', '1620443554', 'story.php?fbid=799235269194572', 'like', '1'),
(105, 'kunloc', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443555', 'story.php?fbid=799235269194572', 'cmt', '1'),
(106, 'kunloc', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '799235269194572', '1620443556', 'story.php?fbid=799235269194572', 'like', '1'),
(107, 'kunloc', '3', 'Nguyễn Thành Lộc', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443556', 'story.php?fbid=799235269194572', 'cmt', '0'),
(108, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã thích bài viết của bạn.', '799235269194572', '1620443557', 'story.php?fbid=799235269194572', 'like', '0'),
(109, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443557', 'story.php?fbid=799235269194572', 'cmt', '0'),
(110, 'kunloc', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '799235269194572', '1620443558', 'story.php?fbid=799235269194572', 'like', '1'),
(111, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443558', 'story.php?fbid=799235269194572', 'cmt', '0'),
(112, 'kunloc', '2', 'Nguyễn Phú Hưng', 'Đã thích bài viết của bạn.', '799235269194572', '1620443559', 'story.php?fbid=799235269194572', 'like', '0'),
(113, 'kunloc', '3', 'Nguyễn Thành Lộc', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443560', 'story.php?fbid=799235269194572', 'cmt', '0'),
(114, 'kunloc', '2', 'Nguyễn Phú Hưng', 'Đã thích bài viết của bạn.', '799235269194572', '1620443561', 'story.php?fbid=799235269194572', 'like', '0'),
(115, 'kunloc', '3', 'Nguyễn Thành Lộc', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443561', 'story.php?fbid=799235269194572', 'cmt', '0'),
(116, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã thích bài viết của bạn.', '799235269194572', '1620443562', 'story.php?fbid=799235269194572', 'like', '0'),
(117, 'kunloc', '2', 'Nguyễn Phú Hưng', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443562', 'story.php?fbid=799235269194572', 'cmt', '0'),
(118, 'kunloc', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '799235269194572', '1620443563', 'story.php?fbid=799235269194572', 'like', '0'),
(119, 'kunloc', '3', 'Nguyễn Thành Lộc', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443564', 'story.php?fbid=799235269194572', 'cmt', '0'),
(120, 'kunloc', '2', 'Nguyễn Phú Hưng', 'Đã thích bài viết của bạn.', '799235269194572', '1620443566', 'story.php?fbid=799235269194572', 'like', '0'),
(121, 'kunloc', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '799235269194572', '1620443567', 'story.php?fbid=799235269194572', 'like', '0'),
(122, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443568', 'story.php?fbid=799235269194572', 'cmt', '0'),
(123, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã thích bài viết của bạn.', '799235269194572', '1620443568', 'story.php?fbid=799235269194572', 'like', '0'),
(124, 'kunloc', '2', 'Nguyễn Phú Hưng', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443569', 'story.php?fbid=799235269194572', 'cmt', '0'),
(125, 'kunloc', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '799235269194572', '1620443570', 'story.php?fbid=799235269194572', 'like', '1'),
(126, 'kunloc', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443571', 'story.php?fbid=799235269194572', 'cmt', '1'),
(127, 'kunloc', '2', 'Nguyễn Phú Hưng', 'Đã thích bài viết của bạn.', '799235269194572', '1620443571', 'story.php?fbid=799235269194572', 'like', '0'),
(128, 'kunloc', '3', 'Nguyễn Thành Lộc', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620443572', 'story.php?fbid=799235269194572', 'cmt', '0'),
(129, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã thích bài viết của bạn.', '799235269194572', '1620443572', 'story.php?fbid=799235269194572', 'like', '0'),
(130, 'kunloc', '7', 'Hạ lộc', 'Đã thích bài viết của bạn.', '799235269194572', '1620444109', 'story.php?fbid=799235269194572', 'like', '0'),
(131, 'kunloc', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '799235269194572', '1620444110', 'story.php?fbid=799235269194572', 'like', '0'),
(132, 'kunloc', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '799235269194572', '1620444111', 'story.php?fbid=799235269194572', 'like', '0'),
(133, 'kunlocs', '2', 'Nguyễn Phú Hưng', 'Đã thích bài viết của bạn.', '565131753321794', '1620444112', 'story.php?fbid=565131753321794', 'like', '0'),
(134, 'kunlocs', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '565131753321794', '1620444113', 'story.php?fbid=565131753321794', 'like', '0'),
(135, 'kunlocs', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '565131753321794', '1620444114', 'story.php?fbid=565131753321794', 'like', '0'),
(136, 'kunlocs', '7', 'Hạ lộc', 'Đã thích bài viết của bạn.', '565131753321794', '1620444116', 'story.php?fbid=565131753321794', 'like', '0'),
(137, 'kunloc', '2', 'Nguyễn Phú Hưng', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620444116', 'story.php?fbid=799235269194572', 'cmt', '0'),
(138, 'kunlocs', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã thích bài viết của bạn.', '565131753321794', '1620444117', 'story.php?fbid=565131753321794', 'like', '0'),
(139, 'kunloc', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620444117', 'story.php?fbid=799235269194572', 'cmt', '1'),
(140, 'kunlocs', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '565131753321794', '1620444118', 'story.php?fbid=565131753321794', 'like', '0'),
(141, 'kunlocs', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444119', 'story.php?fbid=565131753321794', 'cmt', '0'),
(142, 'kunlocs', '7', 'Hạ lộc', 'Đã thích bài viết của bạn.', '565131753321794', '1620444119', 'story.php?fbid=565131753321794', 'like', '0'),
(143, 'kunlocs', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444120', 'story.php?fbid=565131753321794', 'cmt', '0'),
(144, 'kunlocs', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '565131753321794', '1620444120', 'story.php?fbid=565131753321794', 'like', '0'),
(145, 'kunlocs', '3', 'Nguyễn Thành Lộc', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444121', 'story.php?fbid=565131753321794', 'cmt', '0'),
(146, 'kunlocs', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '565131753321794', '1620444122', 'story.php?fbid=565131753321794', 'like', '0'),
(147, 'kunlocs', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444122', 'story.php?fbid=565131753321794', 'cmt', '0'),
(148, 'kunlocs', '2', 'Nguyễn Phú Hưng', 'Đã thích bài viết của bạn.', '565131753321794', '1620444123', 'story.php?fbid=565131753321794', 'like', '0'),
(149, 'kunlocs', '3', 'Nguyễn Thành Lộc', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444124', 'story.php?fbid=565131753321794', 'cmt', '0'),
(150, 'kunlocs', '7', 'Hạ lộc', 'Đã thích bài viết của bạn.', '565131753321794', '1620444125', 'story.php?fbid=565131753321794', 'like', '0'),
(151, 'kunlocs', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '565131753321794', '1620444127', 'story.php?fbid=565131753321794', 'like', '0'),
(152, 'kunlocs', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444127', 'story.php?fbid=565131753321794', 'cmt', '0'),
(153, 'kunlocs', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '565131753321794', '1620444128', 'story.php?fbid=565131753321794', 'like', '0'),
(154, 'kunlocs', '7', 'Hạ lộc', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444128', 'story.php?fbid=565131753321794', 'cmt', '0'),
(155, 'kunlocs', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '565131753321794', '1620444129', 'story.php?fbid=565131753321794', 'like', '0'),
(156, 'kunlocs', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444130', 'story.php?fbid=565131753321794', 'cmt', '0'),
(157, 'kunlocs', '2', 'Nguyễn Phú Hưng', 'Đã thích bài viết của bạn.', '565131753321794', '1620444131', 'story.php?fbid=565131753321794', 'like', '0'),
(158, 'kunlocs', '3', 'Nguyễn Thành Lộc', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444131', 'story.php?fbid=565131753321794', 'cmt', '0'),
(159, 'kunlocs', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '565131753321794', '1620444132', 'story.php?fbid=565131753321794', 'like', '0'),
(160, 'kunlocs', '7', 'Hạ lộc', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444132', 'story.php?fbid=565131753321794', 'cmt', '0'),
(161, 'kunlocs', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '565131753321794', '1620444133', 'story.php?fbid=565131753321794', 'like', '0'),
(162, 'kunlocs', '3', 'Nguyễn Thành Lộc', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444133', 'story.php?fbid=565131753321794', 'cmt', '0'),
(163, 'kunlocs', '2', 'Nguyễn Phú Hưng', 'Đã thích bài viết của bạn.', '565131753321794', '1620444135', 'story.php?fbid=565131753321794', 'like', '0'),
(164, 'kunlocs', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444135', 'story.php?fbid=565131753321794', 'cmt', '0'),
(165, 'kunlocs', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '565131753321794', '1620444136', 'story.php?fbid=565131753321794', 'like', '0'),
(166, 'kunlocs', '2', 'Nguyễn Phú Hưng', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444136', 'story.php?fbid=565131753321794', 'cmt', '0'),
(167, 'kunlocs', '7', 'Hạ lộc', 'Vừa bình luận về bài viết của bạn', '565131753321794', '1620444136', 'story.php?fbid=565131753321794', 'cmt', '0'),
(168, 'kunlocs', '2', 'Nguyễn Phú Hưng', 'Đã thích bài viết của bạn.', '565131753321794', '1620444137', 'story.php?fbid=565131753321794', 'like', '0'),
(169, 'kunlocs', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444137', 'story.php?fbid=565131753321794', 'cmt', '0'),
(170, 'kunlocs', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã thích bài viết của bạn.', '565131753321794', '1620444138', 'story.php?fbid=565131753321794', 'like', '0'),
(171, 'kunlocs', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444138', 'story.php?fbid=565131753321794', 'cmt', '0'),
(172, 'kunlocs', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '565131753321794', '1620444139', 'story.php?fbid=565131753321794', 'like', '0'),
(173, 'kunlocs', '7', 'Hạ lộc', 'Vừa bình luận về bài viết của bạn', '565131753321794', '1620444140', 'story.php?fbid=565131753321794', 'cmt', '0'),
(174, 'kunlocs', '2', 'Nguyễn Phú Hưng', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444142', 'story.php?fbid=565131753321794', 'cmt', '0'),
(175, 'kunlocs', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã thích bài viết của bạn.', '565131753321794', '1620444143', 'story.php?fbid=565131753321794', 'like', '0'),
(176, 'kunlocs', '7', 'Hạ lộc', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444143', 'story.php?fbid=565131753321794', 'cmt', '0'),
(177, 'kunlocs', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '565131753321794', '1620444144', 'story.php?fbid=565131753321794', 'like', '0'),
(178, 'kunlocs', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444145', 'story.php?fbid=565131753321794', 'cmt', '0'),
(179, 'kunlocs', '7', 'Hạ lộc', 'Đã thích bài viết của bạn.', '565131753321794', '1620444146', 'story.php?fbid=565131753321794', 'like', '0'),
(180, 'kunlocs', '7', 'Hạ lộc', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444146', 'story.php?fbid=565131753321794', 'cmt', '0'),
(181, 'kunlocs', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '565131753321794', '1620444147', 'story.php?fbid=565131753321794', 'like', '0'),
(182, 'kunlocs', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444148', 'story.php?fbid=565131753321794', 'cmt', '0'),
(183, 'kunlocs', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã thích bài viết của bạn.', '565131753321794', '1620444148', 'story.php?fbid=565131753321794', 'like', '0'),
(184, 'kunlocs', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444149', 'story.php?fbid=565131753321794', 'cmt', '0'),
(185, 'kunlocs', '7', 'Hạ lộc', 'Đã thích bài viết của bạn.', '565131753321794', '1620444150', 'story.php?fbid=565131753321794', 'like', '0'),
(186, 'kunlocs', '3', 'Nguyễn Thành Lộc', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444151', 'story.php?fbid=565131753321794', 'cmt', '0'),
(187, 'kunlocs', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '565131753321794', '1620444151', 'story.php?fbid=565131753321794', 'like', '0'),
(188, 'kunlocs', '3', 'Nguyễn Thành Lộc', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444152', 'story.php?fbid=565131753321794', 'cmt', '0'),
(189, 'kunlocs', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '565131753321794', '1620444152', 'story.php?fbid=565131753321794', 'like', '0'),
(190, 'kunlocs', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444153', 'story.php?fbid=565131753321794', 'cmt', '0'),
(191, 'kunlocs', '7', 'Hạ lộc', 'Đã thích bài viết của bạn.', '565131753321794', '1620444153', 'story.php?fbid=565131753321794', 'like', '0'),
(192, 'kunlocs', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '565131753321794', '1620444154', 'story.php?fbid=565131753321794', 'like', '0'),
(193, 'Vippro1020', '7', 'Hạ lộc', 'Đã gửi cho bạn 1 lời mời kết bạn.', 'null', '1620444155', 'profile.php?id=7', 'add', '0'),
(194, 'kunlocs', '2', 'Nguyễn Phú Hưng', 'Đã thích bài viết của bạn.', '565131753321794', '1620444156', 'story.php?fbid=565131753321794', 'like', '0'),
(195, 'kunlocs', '2', 'Nguyễn Phú Hưng', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444157', 'story.php?fbid=565131753321794', 'cmt', '0'),
(196, 'kunlocs', '2', 'Nguyễn Phú Hưng', 'Đã thích bài viết của bạn.', '565131753321794', '1620444157', 'story.php?fbid=565131753321794', 'like', '0'),
(197, 'kunlocs', '7', 'Hạ lộc', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444158', 'story.php?fbid=565131753321794', 'cmt', '0'),
(198, 'kunlocs', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '565131753321794', '1620444158', 'story.php?fbid=565131753321794', 'like', '0'),
(199, 'kunlocs', '7', 'Hạ lộc', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444159', 'story.php?fbid=565131753321794', 'cmt', '0'),
(200, 'kunlocs', '7', 'Hạ lộc', 'Đã thích bài viết của bạn.', '565131753321794', '1620444159', 'story.php?fbid=565131753321794', 'like', '0'),
(201, 'kunlocs', '3', 'Nguyễn Thành Lộc', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444161', 'story.php?fbid=565131753321794', 'cmt', '0'),
(202, 'kunlocs', '2', 'Nguyễn Phú Hưng', 'Đã thích bài viết của bạn.', '565131753321794', '1620444162', 'story.php?fbid=565131753321794', 'like', '0'),
(203, 'kunlocs', '7', 'Hạ lộc', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444162', 'story.php?fbid=565131753321794', 'cmt', '0'),
(204, 'kunlocs', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã thích bài viết của bạn.', '565131753321794', '1620444163', 'story.php?fbid=565131753321794', 'like', '0'),
(205, 'kunlocs', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '565131753321794', '1620444165', 'story.php?fbid=565131753321794', 'like', '0'),
(206, 'kunlocs', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444165', 'story.php?fbid=565131753321794', 'cmt', '0'),
(207, 'kunlocs', '7', 'Hạ lộc', 'Đã thích bài viết của bạn.', '565131753321794', '1620444166', 'story.php?fbid=565131753321794', 'like', '0'),
(208, 'kunlocs', '2', 'Nguyễn Phú Hưng', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444166', 'story.php?fbid=565131753321794', 'cmt', '0'),
(209, 'kunlocs', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '565131753321794', '1620444167', 'story.php?fbid=565131753321794', 'like', '0'),
(210, 'kunlocs', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444167', 'story.php?fbid=565131753321794', 'cmt', '0'),
(211, 'kunlocs', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '565131753321794', '1620444168', 'story.php?fbid=565131753321794', 'like', '0'),
(212, 'kunlocs', '3', 'Nguyễn Thành Lộc', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444168', 'story.php?fbid=565131753321794', 'cmt', '0'),
(213, 'kunlocs', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '565131753321794', '1620444169', 'story.php?fbid=565131753321794', 'like', '0'),
(214, 'kunlocs', '2', 'Nguyễn Phú Hưng', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444169', 'story.php?fbid=565131753321794', 'cmt', '0'),
(215, 'kunlocs', '2', 'Nguyễn Phú Hưng', 'Đã thích bài viết của bạn.', '565131753321794', '1620444171', 'story.php?fbid=565131753321794', 'like', '0'),
(216, 'kunlocs', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444171', 'story.php?fbid=565131753321794', 'cmt', '0'),
(217, 'kunlocs', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã thích bài viết của bạn.', '565131753321794', '1620444172', 'story.php?fbid=565131753321794', 'like', '0'),
(218, 'kunlocs', '7', 'Hạ lộc', 'Đã thích bài viết của bạn.', '565131753321794', '1620444173', 'story.php?fbid=565131753321794', 'like', '0'),
(219, 'kunlocs', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444173', 'story.php?fbid=565131753321794', 'cmt', '0'),
(220, 'kunlocs', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '565131753321794', '1620444174', 'story.php?fbid=565131753321794', 'like', '0'),
(221, 'kunlocs', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444174', 'story.php?fbid=565131753321794', 'cmt', '0'),
(222, 'kunlocs', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '565131753321794', '1620444175', 'story.php?fbid=565131753321794', 'like', '0'),
(223, 'kunlocs', '2', 'Nguyễn Phú Hưng', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444175', 'story.php?fbid=565131753321794', 'cmt', '0'),
(224, 'kunlocs', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '565131753321794', '1620444176', 'story.php?fbid=565131753321794', 'like', '0'),
(225, 'kunlocs', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444176', 'story.php?fbid=565131753321794', 'cmt', '0'),
(226, '', '7', 'Hạ lộc', 'Đã thích bài viết của bạn.', '226945695861459', '1620444177', 'story.php?fbid=226945695861459', 'like', '0'),
(227, 'kunlocs', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '565131753321794', '1620444178', 'story.php?fbid=565131753321794', 'like', '0'),
(228, 'kunlocs', '3', 'Nguyễn Thành Lộc', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444178', 'story.php?fbid=565131753321794', 'cmt', '0'),
(229, 'kunlocs', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '565131753321794', '1620444179', 'story.php?fbid=565131753321794', 'like', '0'),
(230, 'kunlocs', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444179', 'story.php?fbid=565131753321794', 'cmt', '0'),
(231, 'kunlocs', '2', 'Nguyễn Phú Hưng', 'Đã thích bài viết của bạn.', '565131753321794', '1620444180', 'story.php?fbid=565131753321794', 'like', '0'),
(232, 'kunlocs', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '565131753321794', '1620444181', 'story.php?fbid=565131753321794', 'like', '0'),
(233, 'kunlocs', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444182', 'story.php?fbid=565131753321794', 'cmt', '0'),
(234, 'kunlocs', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '565131753321794', '1620444183', 'story.php?fbid=565131753321794', 'like', '0'),
(235, 'kunlocs', '2', 'Nguyễn Phú Hưng', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444184', 'story.php?fbid=565131753321794', 'cmt', '0'),
(236, 'kunlocs', '7', 'Hạ lộc', 'Đã thích bài viết của bạn.', '565131753321794', '1620444185', 'story.php?fbid=565131753321794', 'like', '0'),
(237, 'kunlocs', '3', 'Nguyễn Thành Lộc', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444186', 'story.php?fbid=565131753321794', 'cmt', '0'),
(238, 'kunlocs', '2', 'Nguyễn Phú Hưng', 'Đã thích bài viết của bạn.', '565131753321794', '1620444186', 'story.php?fbid=565131753321794', 'like', '0'),
(239, 'kunlocs', '3', 'Nguyễn Thành Lộc', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444187', 'story.php?fbid=565131753321794', 'cmt', '0'),
(240, 'kunlocs', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã thích bài viết của bạn.', '565131753321794', '1620444188', 'story.php?fbid=565131753321794', 'like', '0'),
(241, 'kunlocs', '7', 'Hạ lộc', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444188', 'story.php?fbid=565131753321794', 'cmt', '0'),
(242, 'kunlocs', '2', 'Nguyễn Phú Hưng', 'Đã thích bài viết của bạn.', '565131753321794', '1620444189', 'story.php?fbid=565131753321794', 'like', '0'),
(243, 'kunlocs', '2', 'Nguyễn Phú Hưng', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444189', 'story.php?fbid=565131753321794', 'cmt', '0'),
(244, 'kunlocs', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '565131753321794', '1620444190', 'story.php?fbid=565131753321794', 'like', '0'),
(245, 'kunlocs', '3', 'Nguyễn Thành Lộc', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444191', 'story.php?fbid=565131753321794', 'cmt', '0'),
(246, 'kunlocs', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '565131753321794', '1620444191', 'story.php?fbid=565131753321794', 'like', '0'),
(247, 'kunlocs', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã thích bài viết của bạn.', '565131753321794', '1620444192', 'story.php?fbid=565131753321794', 'like', '0'),
(248, 'kunlocs', '2', 'Nguyễn Phú Hưng', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444193', 'story.php?fbid=565131753321794', 'cmt', '0'),
(249, 'kunlocs', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '565131753321794', '1620444193', 'story.php?fbid=565131753321794', 'like', '0'),
(250, 'kunlocs', '7', 'Hạ lộc', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444194', 'story.php?fbid=565131753321794', 'cmt', '0'),
(251, 'kunlocs', '4', 'La Văn Quân', 'Đã thích bài viết của bạn.', '565131753321794', '1620444195', 'story.php?fbid=565131753321794', 'like', '0'),
(252, 'kunlocs', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444195', 'story.php?fbid=565131753321794', 'cmt', '0'),
(253, 'kunlocs', '7', 'Hạ lộc', 'Đã thích bài viết của bạn.', '565131753321794', '1620444196', 'story.php?fbid=565131753321794', 'like', '0'),
(254, 'kunlocs', '3', 'Nguyễn Thành Lộc', 'Đã bình luận về bài viết của bạn.', '565131753321794', '1620444196', 'story.php?fbid=565131753321794', 'cmt', '0'),
(255, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620472762', 'story.php?fbid=799235269194572', 'cmt', '0'),
(256, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620472764', 'story.php?fbid=799235269194572', 'cmt', '0'),
(257, 'kunloc', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620472769', 'story.php?fbid=799235269194572', 'cmt', '0'),
(258, 'kunloc', '6', 'Phạm Ngọc Trúc Linh (Bé ty)', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620472770', 'story.php?fbid=799235269194572', 'cmt', '0'),
(259, 'kunloc', '2', 'Nguyễn Phú Hưng', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620472772', 'story.php?fbid=799235269194572', 'cmt', '0'),
(260, 'kunloc', '4', 'La Văn Quân', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620472773', 'story.php?fbid=799235269194572', 'cmt', '0'),
(261, 'kunloc', '7', 'Hạ lộc', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620472774', 'story.php?fbid=799235269194572', 'cmt', '0'),
(262, 'kunloc', '8', 'Jeieieie', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620472778', 'story.php?fbid=799235269194572', 'cmt', '1'),
(263, 'kunloc', '2', 'Nguyễn Phú Hưng', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620472780', 'story.php?fbid=799235269194572', 'cmt', '0'),
(264, 'kunloc', '8', 'Jeieieie', 'Đã bình luận về bài viết của bạn.', '799235269194572', '1620472781', 'story.php?fbid=799235269194572', 'cmt', '1'),
(265, '', '', '', 'Đã thích bài viết của bạn.', '565131753321794', '1620472789', 'story.php?fbid=565131753321794', 'like', '0'),
(266, '', '', '', 'Đã thích bài viết của bạn.', '565131753321794', '1620472794', 'story.php?fbid=565131753321794', 'like', '0'),
(267, '', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '799235269194572', '1620473491', 'story.php?fbid=799235269194572', 'like', '0'),
(268, '', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '799235269194572', '1620473493', 'story.php?fbid=799235269194572', 'like', '0'),
(269, '', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '566148428918299', '1620473495', 'story.php?fbid=566148428918299', 'like', '0'),
(270, '', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '173536128626855', '1620473496', 'story.php?fbid=173536128626855', 'like', '0'),
(271, '', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '566148428918299', '1620473501', 'story.php?fbid=566148428918299', 'like', '0'),
(272, '', '3', 'Nguyễn Thành Lộc', 'Đã thích bài viết của bạn.', '799235269194572', '1620473645', 'story.php?fbid=799235269194572', 'like', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `log`
--

INSERT INTO `log` (`id`, `username`, `uid`, `type`, `time`) VALUES
(2, 'kunloc', '649569967613332', 'like', 1619190832),
(4, 'kunloc', '272892834791659', 'like', 1619194611),
(6, 'kunloc', '952984625625654', 'like', 1619195381),
(9, 'gamattrang', '272892834791659', 'like', 1620223268),
(13, 'kunloc', '715284777676498', 'like', 1620357876),
(15, 'lololol', '3', 'sub', 1620361579),
(24, 'kunloc', '6', 'sub', 1620391439),
(29, 'kunloc', '6', 'add', 1620393129),
(30, 'lololol', '3', 'add', 1620393161),
(94, 'kunlocs', '565131753321794', 'like', 1620444112),
(95, 'kunlocs', '565131753321794', 'like', 1620444113),
(96, 'kunlocs', '565131753321794', 'like', 1620444114),
(97, 'kunlocs', '565131753321794', 'like', 1620444116),
(98, 'kunlocs', '565131753321794', 'like', 1620444117),
(99, 'kunlocs', '565131753321794', 'like', 1620444118),
(100, 'kunlocs', '565131753321794', 'like', 1620444119),
(101, 'kunlocs', '565131753321794', 'like', 1620444120),
(102, 'kunlocs', '565131753321794', 'like', 1620444122),
(103, 'kunlocs', '565131753321794', 'like', 1620444123),
(104, 'kunlocs', '565131753321794', 'like', 1620444125),
(105, 'kunlocs', '565131753321794', 'like', 1620444127),
(106, 'kunlocs', '565131753321794', 'like', 1620444128),
(107, 'kunlocs', '565131753321794', 'like', 1620444129),
(108, 'kunlocs', '565131753321794', 'like', 1620444131),
(109, 'kunlocs', '565131753321794', 'like', 1620444132),
(110, 'kunlocs', '565131753321794', 'like', 1620444133),
(111, 'kunlocs', '565131753321794', 'like', 1620444135),
(112, 'kunlocs', '565131753321794', 'like', 1620444136),
(113, 'kunlocs', '565131753321794', 'like', 1620444137),
(114, 'kunlocs', '565131753321794', 'like', 1620444138),
(115, 'kunlocs', '565131753321794', 'like', 1620444139),
(116, 'kunlocs', '565131753321794', 'like', 1620444143),
(117, 'kunlocs', '565131753321794', 'like', 1620444144),
(118, 'kunlocs', '565131753321794', 'like', 1620444146),
(119, 'kunlocs', '565131753321794', 'like', 1620444147),
(120, 'kunlocs', '565131753321794', 'like', 1620444148),
(121, 'kunlocs', '565131753321794', 'like', 1620444150),
(122, 'kunlocs', '565131753321794', 'like', 1620444151),
(123, 'kunlocs', '565131753321794', 'like', 1620444152),
(124, 'kunlocs', '565131753321794', 'like', 1620444153),
(125, 'kunlocs', '565131753321794', 'like', 1620444154),
(126, 'kunlocs', '4', 'add', 1620444155),
(127, 'kunlocs', '565131753321794', 'like', 1620444156),
(128, 'kunlocs', '565131753321794', 'like', 1620444157),
(129, 'kunlocs', '565131753321794', 'like', 1620444158),
(130, 'kunlocs', '565131753321794', 'like', 1620444159),
(131, 'kunlocs', '565131753321794', 'like', 1620444162),
(132, 'kunlocs', '565131753321794', 'like', 1620444163),
(133, 'kunlocs', '565131753321794', 'like', 1620444165),
(134, 'kunlocs', '565131753321794', 'like', 1620444166),
(135, 'kunlocs', '565131753321794', 'like', 1620444167),
(136, 'kunlocs', '565131753321794', 'like', 1620444168),
(137, 'kunlocs', '565131753321794', 'like', 1620444169),
(138, 'kunlocs', '565131753321794', 'like', 1620444171),
(139, 'kunlocs', '565131753321794', 'like', 1620444172),
(140, 'kunlocs', '565131753321794', 'like', 1620444173),
(141, 'kunlocs', '565131753321794', 'like', 1620444174),
(142, 'kunlocs', '565131753321794', 'like', 1620444175),
(143, 'kunlocs', '565131753321794', 'like', 1620444176),
(144, 'kunlocs', '226945695861459', 'like', 1620444177),
(145, 'kunlocs', '565131753321794', 'like', 1620444178),
(146, 'kunlocs', '565131753321794', 'like', 1620444179),
(147, 'kunlocs', '565131753321794', 'like', 1620444180),
(148, 'kunlocs', '565131753321794', 'like', 1620444181),
(149, 'kunlocs', '565131753321794', 'like', 1620444183),
(150, 'kunlocs', '565131753321794', 'like', 1620444185),
(151, 'kunlocs', '565131753321794', 'like', 1620444186),
(152, 'kunlocs', '565131753321794', 'like', 1620444188),
(153, 'kunlocs', '565131753321794', 'like', 1620444189),
(154, 'kunlocs', '565131753321794', 'like', 1620444190),
(155, 'kunlocs', '565131753321794', 'like', 1620444191),
(156, 'kunlocs', '565131753321794', 'like', 1620444192),
(157, 'kunlocs', '565131753321794', 'like', 1620444193),
(158, 'kunlocs', '565131753321794', 'like', 1620444195),
(159, 'kunlocs', '565131753321794', 'like', 1620444196),
(161, '', '565131753321794', 'like', 1620472794),
(165, 'kunloc', '173536128626855', 'like', 1620473496),
(166, 'kunloc', '566148428918299', 'like', 1620473501),
(167, 'kunloc', '799235269194572', 'like', 1620473645);

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
(2, 'Vippro1020', '226945695861459', '1488353831175561', 'data/408091da30297803d0ac97309be34bea.jpg', '1620318863', 0, 0, 0),
(5, 'kunloc', '914425518748817', '8994268332161943', 'ád', '1620360248', 0, 0, 0),
(6, 'kunloc', '433946785124781', '2198369613326671', 'ád', '1620360282', 0, 0, 0),
(7, 'kunloc', '866248294179825', '2794972637985372', 'ád', '1620360283', 0, 0, 0),
(8, 'kunloc', '345585619876278', '7684257533824432', 'aaaa', '1620360287', 0, 0, 0),
(9, 'kunloc', '872785896814281', '2888799239476838', 'aaaa', '1620360306', 0, 0, 0),
(10, 'kunloc1', '125315763657542', '5556954368793476', 'data/92b21271ff1f08f6f0cfef028e51fdd2.jpg', '1620361362', 0, 0, 0),
(11, 'lololol', '881652534772984', '9993119277579761', 'data/7237cc82829bdc3354dbaf52d4f405e9.jpg', '1620393707', 0, 0, 0),
(12, 'kunloc', '566148428918299', '3457731341127422', 'data/7140026a0ef9bed93e124aaf9395d85f.jpg', '1620394576', 0, 0, 0),
(16, 'kunloc', '799235269194572', '5496554473194518', 'data/9a24cb6cf310e71e21c81b3911e32a8f.jpg', '1620442803', 0, 0, 0),
(17, 'kunlocs', '565131753321794', '2615729529285412', 'data/2b2031d8912b6ef5ce6ffb86897dc922.jpg', '1620444042', 0, 0, 0),
(18, 'kunlocs', '321284853225487', '3338973494829772', 'data/6ee929fc5f6c1b1b7ed3f05a1a95cf18.jpeg', '1620444085', 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `replay`
--

CREATE TABLE `replay` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `text` varchar(100) NOT NULL,
  `time` int(30) NOT NULL,
  `keycode` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `replay`
--

INSERT INTO `replay` (`id`, `username`, `uid`, `text`, `time`, `keycode`) VALUES
(1, 'hien199a6', '149381382492457', '#kunloc', 1608519799, 'jp87ydaxdz91jy4d3fkm'),
(1000, 'kunloc', '565118145655981', '13243241', 1620220784, '3fxb3jpfck1lal676l9c'),
(1001, 'kunloc', '565118145655981', '345345', 1620220790, '3fxb3jpfck1lal676l9c'),
(1002, 'kunloc', '565118145655981', '123213\\', 1620271166, '3fxb3jpfck1lal676l9c'),
(1003, 'kunloc', '715284777676498', '123123', 1620357949, 'l2zc24zmj4kb9k4m8zm4'),
(1004, 'kunloc', '715284777676498', '3123123', 1620357952, 'yjjff3ap43a69j322mby'),
(1005, 'kunloc', '715284777676498', '11111111', 1620357959, 'p27x7k1358d6jdy6la39'),
(1006, 'kunloc', '823784299669491', '123123', 1620360854, 'cc78mfk6x58a172lk11k'),
(1007, 'kunloc', '823784299669491', '13123', 1620360879, 'y6ja11alxb5cay1a2ff9'),
(1008, 'kunloc', '823784299669491', '1231231232', 1620360882, 'y7dyl24bp58lkf8l6abf');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `uid2` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `time` varchar(30) NOT NULL,
  `lydo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `report`
--

INSERT INTO `report` (`id`, `username`, `uid`, `uid2`, `link`, `time`, `lydo`) VALUES
(1, 'kunloc', '3', '2', 'https://www.facebook.com/profile.php?id=4', '1620272874', 'Giả mạo người khác'),
(2, 'kunloc', '3', '6', '213123123', '1620391685', 'Giả mạo người khác'),
(3, 'kunlocs', '7', '4', 'profile.php?id=4', '1620444166', 'Giả mạo người khác');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `request`
--

CREATE TABLE `request` (
  `id` int(111) NOT NULL,
  `username` varchar(55) NOT NULL,
  `uid` varchar(55) NOT NULL,
  `uid2` varchar(55) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `request`
--

INSERT INTO `request` (`id`, `username`, `uid`, `uid2`, `time`) VALUES
(8, 'kunlocs', '7', '4', '1620444155');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `img_name` varchar(150) NOT NULL DEFAULT '0',
  `size` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `uploads`
--

INSERT INTO `uploads` (`id`, `username`, `img_url`, `img_name`, `size`, `type`) VALUES
(7, 'kunloc', 'data/9a24cb6cf310e71e21c81b3911e32a8f.jpg', '848101eb554d8ee9256fb7bfcbbd188d.jpg', '39728', 'jpg'),
(2, 'Vippro1020', 'data/408091da30297803d0ac97309be34bea.jpg', 'FB_IMG_1619077346134.jpg', '42168', 'jpg'),
(4, 'kunloc1', 'data/92b21271ff1f08f6f0cfef028e51fdd2.jpg', 'erwerwer.jpg', '21812', 'jpg'),
(5, 'lololol', 'data/7237cc82829bdc3354dbaf52d4f405e9.jpg', '134929796_234389231529432_6129939046969391549_n.jpg', '107255', 'jpg'),
(6, 'kunloc', 'data/7140026a0ef9bed93e124aaf9395d85f.jpg', '151388163_2915239258721964_1515772415129274710_o.jpg', '716454', 'jpg'),
(8, 'kunlocs', 'data/2b2031d8912b6ef5ce6ffb86897dc922.jpg', '4a91d506fc7144c7716b9d3166f2c4b6.jpg', '13347', 'jpg'),
(9, 'kunlocs', 'data/6ee929fc5f6c1b1b7ed3f05a1a95cf18.jpeg', '[ Series ] [ MonstaX ] My Type.jpeg', '36242', 'jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_post_feed`
--

CREATE TABLE `user_post_feed` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `text` text NOT NULL,
  `time` varchar(30) NOT NULL DEFAULT '0',
  `trangthai` varchar(11) NOT NULL DEFAULT '0',
  `uid` varchar(100) NOT NULL,
  `like` varchar(100) NOT NULL DEFAULT '0',
  `cmt` varchar(100) NOT NULL DEFAULT '0',
  `share` varchar(100) NOT NULL DEFAULT '0',
  `type` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user_post_feed`
--

INSERT INTO `user_post_feed` (`id`, `username`, `text`, `time`, `trangthai`, `uid`, `like`, `cmt`, `share`, `type`) VALUES
(1, 'kunloc', '1123123', '1620271904', '0', '173536128626855', '1', '0', '0', 'post'),
(3, 'Vippro1020', 'null', '1620318863', '1', '226945695861459', '2', '0', '0', 'avatar'),
(9, 'gamattrang', '<p>...</p>', '1620391245', '1', '981455321311942', '0', '0', '0', 'post'),
(10, 'lololol', 'null', '1620393707', '1', '881652534772984', '0', '0', '0', 'avatar'),
(11, 'kunloc', 'null', '1620394576', '0', '566148428918299', '1', '0', '0', 'avatar'),
(15, 'kunloc', 'null', '1620442803', '1', '799235269194572', '123123126', '32457358', '0', 'avatar'),
(16, 'kunlocs', 'null', '1620444042', '0', '565131753321794', '65', '54', '0', 'avatar'),
(17, 'kunlocs', '<p>alooooo</p>', '1620444058', '0', '845881257531185', '0', '0', '0', 'post'),
(18, 'kunlocs', 'null', '1620444085', '0', '321284853225487', '0', '0', '0', 'background');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_status`
--

CREATE TABLE `user_status` (
  `id` int(11) NOT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(55) NOT NULL,
  `date` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user_status`
--

INSERT INTO `user_status` (`id`, `status`, `username`, `date`) VALUES
(1, '😂😂😂', 'kunloc', '09:03:47'),
(2, 'Ăn món mình mê <br>\nLàm điều mình thích <br>\nLấy người mình yêu <br>\nLàm điều mình muốn', 'lololol', '08:20:12'),
(3, '', 'truclinh', '10:05:09');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `317389574998690`
--
ALTER TABLE `317389574998690`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `accept`
--
ALTER TABLE `accept`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `anhnoibat`
--
ALTER TABLE `anhnoibat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chatbox`
--
ALTER TABLE `chatbox`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `checkpoint`
--
ALTER TABLE `checkpoint`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment_post`
--
ALTER TABLE `comment_post`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hop_thu_ho_tro`
--
ALTER TABLE `hop_thu_ho_tro`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lich_su_hoat_dong`
--
ALTER TABLE `lich_su_hoat_dong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `replay`
--
ALTER TABLE `replay`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_post_feed`
--
ALTER TABLE `user_post_feed`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `317389574998690`
--
ALTER TABLE `317389574998690`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `accept`
--
ALTER TABLE `accept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `anhnoibat`
--
ALTER TABLE `anhnoibat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `chatbox`
--
ALTER TABLE `chatbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `checkpoint`
--
ALTER TABLE `checkpoint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `comment_post`
--
ALTER TABLE `comment_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT cho bảng `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `hop_thu_ho_tro`
--
ALTER TABLE `hop_thu_ho_tro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `lich_su_hoat_dong`
--
ALTER TABLE `lich_su_hoat_dong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT cho bảng `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT cho bảng `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `replay`
--
ALTER TABLE `replay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1009;

--
-- AUTO_INCREMENT cho bảng `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `request`
--
ALTER TABLE `request`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `user_post_feed`
--
ALTER TABLE `user_post_feed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
