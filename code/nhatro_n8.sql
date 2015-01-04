-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2014 at 02:54 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `csdl_n8`
--

-- --------------------------------------------------------

--
-- Table structure for table `nhatro`
--

CREATE TABLE IF NOT EXISTS `nhatro` (
  `nhatro_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nhatro_name` varchar(100) NOT NULL,
  `nhatro_type` tinyint(4) NOT NULL COMMENT '1: Cho thue',
  `user_name` varchar(30) NOT NULL,
  `nhatro_dacdiem` varchar(500) DEFAULT NULL,
  `nhatro_mota` varchar(2000) DEFAULT NULL,
  `nhatro_sdt` int(11) unsigned DEFAULT NULL,
  `nhatro_diachi` varchar(100) NOT NULL,
  `nhatro_gia` int(11) unsigned NOT NULL,
  `nhatro_conphong` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0: het phong',
  `nhatro_soluong` int(3) DEFAULT NULL,
  `ngaydang` date NOT NULL COMMENT 'ngay dang bài viet',
  `nhatro_trangthai` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0 - Tin bị kh',
  `nhatro_views` int(5) DEFAULT '0',
  `phuong_id` tinyint(4) DEFAULT NULL,
  `duong_id` tinyint(4) DEFAULT NULL,
  `nhatro_img` varchar(500) DEFAULT NULL,
  `nhatrocol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`nhatro_id`),
  KEY `user_name` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 PACK_KEYS=0 AUTO_INCREMENT=99 ;

--
-- Dumping data for table `nhatro`
--

INSERT INTO `nhatro` (`nhatro_id`, `nhatro_name`, `nhatro_type`, `user_name`, `nhatro_dacdiem`, `nhatro_mota`, `nhatro_sdt`, `nhatro_diachi`, `nhatro_gia`, `nhatro_conphong`, `nhatro_soluong`, `ngaydang`, `nhatro_trangthai`, `nhatro_views`, `phuong_id`, `duong_id`, `nhatro_img`, `nhatrocol`) VALUES
(80, 'Nhà trọ cần thơ', 2, 'admin', ', 1, 7, 8', '<p>phong co gac, thoang mat, tien nghi, khong han che gio mo cua</p>\r\n', 917177445, '2 T', 500000, 1, 1, '2014-04-27', 1, 6, 2, 6, './images/25085827042014nhatro.jpg, , ', NULL),
(81, 'Nha tro Xuan Hong', 2, 'admin', ', 5, 6, 10, 11, 12', '<p>Thoang mat,sach se</p>\r\n', 1234561237, '95/11', 800000, 1, 2, '2014-04-27', 1, 1, 13, 6, './images/21090727042014nhatro1.jpg, , ', NULL),
(82, 'Nhà Trọ Huỳnh Như', 1, 'admin', ', 2, 3, 6, 10, 12, 13', '', 909888999, '123a', 800000, 1, 8, '2014-04-27', 1, 3, 5, 15, './images/59090927042014nhatro12.jpg, , ', NULL),
(83, 'Nhà Trọ Ngọc Nhớ', 2, 'admin', ', 3, 5, 6, 9, 11, 12', '<p>ĐỐI TƯỢNG CHO THU&Ecirc;: NỮ c&oacute; lối sống TR&Aacute;CH NHIỆM, L&Agrave;NH MẠNH, VỆ SINH, ưu ti&ecirc;n người đ&atilde; ra trường v&agrave; c&oacute; việc l&agrave;m!<br />\r\n<br />\r\nG&Iacute;A PH&Ograve;NG: 1 000 000 ~ 1 500 000<br />\r\nBạn n&agrave;o quan t&acirc;m, vui l&ograve;ng li&ecirc;n hệ theo số: 0906 65 65 27 ( Ms.Huỳnh) để biết chi tiết hay đặt lịch xem nh&agrave; nh&eacute;!<br />\r\n<br />\r\nC&aacute;m ơn c&aacute;c bạn đ&atilde; quan t&acirc;m v&agrave; share gi&uacute;p ^^</p>\r\n', 984185123, '306', 1500000, 1, 2, '2014-04-27', 1, 3, 2, 14, './images/00091727042014nhatro2.jpg, ./images/01091727042014nhatro1.jpg, ', NULL),
(85, 'Nhà Trọ Ngọc Hạnh', 1, 'admin', ', 3, 7, 8', '<p>M&igrave;nh Cần 1 nam ở gh&eacute;p quận T&acirc;n Ph&uacute; (gần mũi t&agrave;u &Acirc;u Cơ v&agrave; Lũy B&aacute;n B&iacute;ch)<br />\r\nPh&ograve;ng c&oacute; tủ lạnh, m&aacute;y giặt, Wifi, b&agrave;n ghế tiếp kh&aacute;ch v&agrave; khu vực nấu ăn.<br />\r\n<br />\r\nGi&aacute; ph&ograve;ng l&agrave; 2tr. M&igrave;nh muốn t&igrave;m th&ecirc;m 1 bạn nữa để share, đ&atilde; đi l&agrave;m.<br />\r\n&nbsp;</p>\r\n', 935122, '300', 500000, 1, 5, '2014-04-27', 1, 0, 7, 13, './images/07092827042014images.jpg, , ', NULL),
(86, 'Tường Minh', 1, 'admin', ', 1, 5, 6, 12, 13', '', 98, '133A', 1000000, 1, 10, '2014-04-27', 1, 2, 9, 6, './images/51093127042014nhatro11.jpg, , ', NULL),
(87, 'Binh Minh', 1, 'admin', ', 1, 2, 3, 4, 5', '<p>Nhanh ch&acirc;n l&ecirc;n c&aacute;c bạn sinh vi&ecirc;n, bida Rock chỉ c&ograve;n 6 ph&ograve;ng th&ocirc;i. chỉ 400.000đ/bạn/th&aacute;ng, ở ph&ograve;ng 4 người, 15 m2. Điện 3.000đ/kw, nước x&agrave;i thoải mai, 40.000đ/người/th&aacute;ng, wifi, internet miễn ph&iacute;. LH gấp 0903. 883477</p>\r\n', 7104, '315', 850000, 1, 6, '2014-04-27', 1, 0, 7, 13, './images/07093527042014nhatro4.jpg, , ', NULL),
(88, 'Minh Châu', 2, 'admin', ', 1, 4, 5, 6, 8, 10, 12, 13', '', 91, '135E', 900000, 1, 16, '2014-04-27', 1, 1, 9, 6, './images/33093527042014nhatro13.jpg, , ', NULL),
(89, 'Kim Cuong', 2, 'admin', ', 1, 2, 5, 10, 12, 13', '<p>Hiện nay, kế b&ecirc;n phong tui c&ograve;n 1 ph&ograve;ng trọ rộng r&atilde;i (16m c&oacute; g&aacute;c), ph&ograve;ng trọ tho&aacute;ng m&aacute;t, sạch sẽ, an ninh tuyệt đối, đi về tự do c&oacute; ch&igrave;a kh&oacute;a ri&ecirc;ng gi&aacute; 700k/th&aacute;ng, điện 3,5k. hẻm tổ 2, cầu số 3 v&agrave;o khoảng 200met</p>\r\n', 7103739, ' 325B - 325C ', 500000, 1, 1, '2014-04-27', 1, 1, 2, 13, './images/42094127042014Nha-tromoi.jpg, , ', NULL),
(90, 'Quang Hiếu', 1, 'admin', ', 3, 5, 6, 13', '', 124, '51M1', 900000, 1, 18, '2014-04-27', 1, 0, 2, 1, './images/48094127042014nhatro7.jpg, , ', NULL),
(91, 'Đông Nhi', 1, 'admin', ', 3, 7, 10, 13', '<p>Nh&agrave; trọ đối diện số 11F4/1, hẻm KDC 30, ngang metro, gi&aacute;p khu 2 ĐHCT đường Nguyễn Văn Linh, P. An Kh&aacute;nh , TPCT (đường 91B cũ- chợ 3/2 đi v&agrave;o)<br />\r\nSố ph&ograve;ng: 10, toilet trong<br />\r\nĐối tượng cho thu&ecirc;: Học sinh, sinh vi&ecirc;n<br />\r\nGi&aacute; cho thu&ecirc;: 650.000 đ/th&aacute;ng<br />\r\nDiện t&iacute;ch:khoảng 12m2 + g&aacute;c</p>\r\n', 915, ' 11F4/1, hẻm KDC 30', 1100000, 1, 5, '2014-04-27', 1, 3, 2, 13, './images/390945270420141356972.jpg, , ', NULL),
(93, 'Minh Hằng FC', 2, 'admin', ', 1, 6, 9, 13', '<p>Cho thu&ecirc; nh&agrave; trọ c&oacute; g&aacute;c , nh&agrave; vệ sinh sạch sẽ c&oacute; v&ograve;i hoa sen, trần nh&agrave; c&oacute; la ph&ocirc;ng cao tho&aacute;ng, c&oacute; s&agrave;n nước ri&ecirc;ng trong ph&ograve;ng. Nh&agrave; trọ &iacute;t ph&ograve;ng an to&agrave;n c&oacute; chủ quản l&yacute;. Kh&ocirc;ng quy định giờ giấc đi về.&nbsp;<br />\r\nGi&aacute; cho thu&ecirc;: 800k 1 th&aacute;ng<br />\r\nĐiện: 4000 1 k&yacute;<br />\r\nNước: 6000 1 khối<br />\r\nĐịa chỉ: đường 91b -hẻm li&ecirc;n tổ 11 - khu vực 3 phường An Kh&aacute;nh<br />\r\nĐể biết th&ecirc;m chi tiết xin li&ecirc;n hệ&nbsp;<br />\r\n01669106324 or 01645464339</p>\r\n', 1669106324, '329D/10', 1600000, 1, 1, '2014-04-27', 1, 1, 10, 10, './images/23095127042014phong.jpg, ./images/23095127042014phong1.jpg, ./images/23095127042014phong2.jpg', NULL),
(94, 'Minh Vuong', 2, 'admin', ', 3, 5, 7, 8', '', 98, '115b', 800000, 1, 13, '2014-04-27', 1, 0, 2, 1, './images/541148270420145.JPG, , ', NULL),
(95, 'Tấn Phát', 1, 'admin', ', 1, 3, 5, 6, 7, 8, 13', '', 98997518, '119', 1200000, 1, 20, '2014-04-27', 1, 0, 13, 10, ', , ', NULL),
(96, 'Thanh Nhàn', 1, 'admin', ', 5, 6, 7, 12, 13', '', 123, '113', 600000, 1, 7, '2014-04-27', 1, 0, 5, 6, './images/08115227042014nha-tro1.jpg, , ', NULL),
(97, 'Ngọc Như', 2, 'admin', ', 5, 6, 11, 13', '', 98, '21c/51', 700000, 1, 14, '2014-04-27', 1, 0, 2, 1, './images/33115327042014nhatro14.jpg, , ', NULL),
(98, 'Gia Phúc', 2, 'admin', ', 3, 5, 6, 7, 12, 13', '', 909090990, '218', 800000, 1, 23, '2014-04-27', 1, 0, 2, 1, './images/01115527042014nhatro6.jpg, , ', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nhatro`
--
ALTER TABLE `nhatro`
  ADD CONSTRAINT `user_name` FOREIGN KEY (`user_name`) REFERENCES `users` (`user_name`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
