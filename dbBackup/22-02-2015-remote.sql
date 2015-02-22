-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 22, 2015 at 07:06 PM
-- Server version: 5.5.31
-- PHP Version: 5.4.4-14+deb7u10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `spyoptic`
--

-- --------------------------------------------------------

--
-- Table structure for table `sunglasses`
--

CREATE TABLE IF NOT EXISTS `sunglasses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(100) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `img_path` varchar(200) DEFAULT NULL,
  `mini_img_path` varchar(200) DEFAULT NULL,
  `price` int(4) DEFAULT NULL,
  `thumbnail_img_path` varchar(200) DEFAULT NULL,
  `sort_order` int(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=169 ;

--
-- Dumping data for table `sunglasses`
--

INSERT INTO `sunglasses` (`id`, `model`, `color`, `img_path`, `mini_img_path`, `price`, `thumbnail_img_path`, `sort_order`) VALUES
(27, 'Ken Block Helm', 'green', 'upload/product/_MG_37731.jpg', 'upload/product/mini/_MG_37731.jpg', 180, 'upload/product/thumbnail/_MG_37731.jpg', 10),
(28, 'Ken Block Helm', 'grey spider', 'upload/product/_MG_3779-2.jpg', 'upload/product/mini/_MG_3779-2.jpg', 180, 'upload/product/thumbnail/_MG_3779-2.jpg', 0),
(30, 'Ken Block Helm', 'green spider', 'upload/product/_MG_37481.jpg', 'upload/product/mini/_MG_37481.jpg', 180, 'upload/product/thumbnail/_MG_37481.jpg', 0),
(31, 'Ken Block Helm', 'orange', 'upload/product/_MG_3771-2.jpg', 'upload/product/mini/_MG_3771-2.jpg', 180, 'upload/product/thumbnail/_MG_3771-2.jpg', 0),
(32, 'Ken Block Helm', 'purple', 'upload/product/_MG_37721.jpg', 'upload/product/mini/_MG_37721.jpg', 180, 'upload/product/thumbnail/_MG_37721.jpg', 0),
(33, 'Ken Block Helm', 'black', 'upload/product/_MG_37741.jpg', 'upload/product/mini/_MG_37741.jpg', 180, 'upload/product/thumbnail/_MG_37741.jpg', 0),
(34, 'Ken Block Helm', 'orange-blue', 'upload/product/_MG_3758-3.jpg', 'upload/product/mini/_MG_3758-3.jpg', 180, 'upload/product/thumbnail/_MG_3758-3.jpg', 0),
(35, 'Ken Block Helm', 'leopard', 'upload/product/_MG_37681.jpg', 'upload/product/mini/_MG_37681.jpg', 180, 'upload/product/thumbnail/_MG_37681.jpg', 0),
(36, 'Ken Block Helm', 'yellow', 'upload/product/_MG_37671.jpg', 'upload/product/mini/_MG_37671.jpg', 180, 'upload/product/thumbnail/_MG_37671.jpg', 0),
(37, 'Flynn', 'white-purple', 'upload/product/_MG_3788-2.jpg', 'upload/product/mini/_MG_3788-2.jpg', 280, 'upload/product/thumbnail/_MG_3788-2.jpg', 0),
(38, 'Flynn', 'green', 'upload/product/_MG_3785-2.jpg', 'upload/product/mini/_MG_3785-2.jpg', 280, 'upload/product/thumbnail/_MG_3785-2.jpg', 0),
(39, 'Flynn', 'military 2', 'upload/product/_MG_3787-2.jpg', 'upload/product/mini/_MG_3787-2.jpg', 280, 'upload/product/thumbnail/_MG_3787-2.jpg', 0),
(42, 'Flynn', 'purple-green', 'flynn/4.jpg', 'flynn/h200/4.jpg', 280, 'flynn/h30/4.jpg', 10),
(43, 'Flynn', 'white', 'upload/product/_MG_3799.jpg', 'upload/product/mini/_MG_3799.jpg', 280, 'upload/product/thumbnail/_MG_3799.jpg', 0),
(45, 'Flynn', 'red', 'upload/product/6.jpg', 'upload/product/mini/6.jpg', 280, 'upload/product/thumbnail/6.jpg', 0),
(49, 'Flynn', 'purple', 'flynn/1.jpg', 'flynn/h200/1.jpg', 280, 'flynn/h30/1.jpg', 11),
(50, 'Flynn', 'black', 'flynn/2.jpg', 'flynn/h200/2.jpg', 280, 'flynn/h30/2.jpg', 12),
(53, 'Flynn', 'black-white', 'upload/product/_MG_3789-2.jpg', 'upload/product/mini/_MG_3789-2.jpg', 280, 'upload/product/thumbnail/_MG_3789-2.jpg', 0),
(134, 'Ken Block Helm', 'black_white', 'upload/product/_MG_37501.jpg', 'upload/product/mini/_MG_37501.jpg', 180, 'upload/product/thumbnail/_MG_37501.jpg', 0),
(135, 'Ken Block Helm', 'blue_silver', 'upload/product/_MG_3757-3.jpg', 'upload/product/mini/_MG_3757-3.jpg', 180, 'upload/product/thumbnail/_MG_3757-3.jpg', 0),
(136, 'Ken Block Helm', 'black-orange', 'upload/product/_MG_3765.jpg', 'upload/product/mini/_MG_3765.jpg', 180, 'upload/product/thumbnail/_MG_3765.jpg', 0),
(137, 'Ken Block Helm', 'white_frame', 'upload/product/_MG_3762-21.jpg', 'upload/product/mini/_MG_3762-21.jpg', 180, 'upload/product/thumbnail/_MG_3762-21.jpg', 0),
(138, 'Ken Block Helm', 'grey_spider', 'upload/product/_MG_37761.jpg', 'upload/product/mini/_MG_37761.jpg', 180, 'upload/product/thumbnail/_MG_37761.jpg', 0),
(139, 'Ken Block Helm', 'purple_blue', 'upload/product/_MG_37751.jpg', 'upload/product/mini/_MG_37751.jpg', 180, 'upload/product/thumbnail/_MG_37751.jpg', 0),
(140, 'Ken Block Helm', 'purple_black', 'upload/product/_MG_37781.jpg', 'upload/product/mini/_MG_37781.jpg', 180, 'upload/product/thumbnail/_MG_37781.jpg', 0),
(141, 'Ken Block Helm', 'white', 'upload/product/_MG_3770-2.jpg', 'upload/product/mini/_MG_3770-2.jpg', 180, 'upload/product/thumbnail/_MG_3770-2.jpg', 0),
(142, 'Ken Block Helm', 'orange_blue_(black)', 'upload/product/_MG_3764-2.jpg', 'upload/product/mini/_MG_3764-2.jpg', 180, 'upload/product/thumbnail/_MG_3764-2.jpg', 0),
(143, 'Ken Block Helm', 'purple_grey', 'upload/product/_MG_3780-2.jpg', 'upload/product/mini/_MG_3780-2.jpg', 180, 'upload/product/thumbnail/_MG_3780-2.jpg', 0),
(144, 'Ken Block Helm', 'purple_white', 'upload/product/_MG_37491.jpg', 'upload/product/mini/_MG_37491.jpg', 180, 'upload/product/thumbnail/_MG_37491.jpg', 0),
(145, 'Ken Block Helm', 'blue-ice', 'upload/product/_MG_37631.jpg', 'upload/product/mini/_MG_37631.jpg', 180, 'upload/product/thumbnail/_MG_37631.jpg', -1),
(146, 'Flynn', 'gold', 'upload/product/_MG_3801.jpg', 'upload/product/mini/_MG_3801.jpg', 280, 'upload/product/thumbnail/_MG_3801.jpg', 0),
(147, 'Flynn', 'red-black', 'upload/product/_MG_3782.jpg', 'upload/product/mini/_MG_3782.jpg', 280, 'upload/product/thumbnail/_MG_3782.jpg', 0),
(148, 'Flynn', 'vintage', 'flynn/vintage.jpg', 'flynn/h200/vintage.jpg', 280, 'flynn/h30/vintage.jpg', 14),
(149, 'Flynn', 'military 1', 'upload/product/_MG_3786-2.jpg', 'upload/product/mini/_MG_3786-2.jpg', 280, 'upload/product/thumbnail/_MG_3786-2.jpg', 0),
(150, 'Ken Block Helm', 'reptile', 'upload/product/reptile.jpg', 'upload/product/mini/reptile.jpg', 180, 'upload/product/thumbnail/reptile.jpg', 0),
(151, 'Touring', 'surfer', 'touring/touring-surfer.jpg', 'touring/mini/touring-surfer.jpg', 350, 'touring/thumbnail/touring-surfer.jpg', 0),
(152, 'Touring', 'blue', 'touring/touring-blue.jpg', 'touring/mini/touring-blue.jpg', 350, 'touring/thumbnail/touring-blue.jpg', 0),
(153, 'Touring', 'blue-black', 'touring/touring-blue-black.jpg', 'touring/mini/touring-blue-black.jpg', 350, 'touring/thumbnail/touring-blue-black.jpg', 0),
(154, 'Touring', 'orange', 'touring/touring-orange.jpg', 'touring/mini/touring-orange.jpg', 350, 'touring/thumbnail/touring-orange.jpg', 0),
(155, 'Touring', 'california', 'touring/touring-california.jpg', 'touring/mini/touring-california.jpg', 350, 'touring/thumbnail/touring-california.jpg', 0),
(156, 'Touring', 'green-blue', 'touring/touring-green-blue.jpg', 'touring/mini/touring-green-blue.jpg', 350, 'touring/thumbnail/touring-green-blue.jpg', 0),
(157, 'Touring', 'green-black', 'touring/touring-green-black.jpg', 'touring/mini/touring-green-black.jpg', 350, 'touring/thumbnail/touring-green-black.jpg', 0),
(158, 'Touring', 'white', 'touring/touring-white.jpg', 'touring/mini/touring-white.jpg', 350, 'touring/thumbnail/touring-white.jpg', 0),
(159, 'Touring', 'blue-white', 'touring/touring-blue-white.jpg', 'touring/mini/touring-blue-white.jpg', 350, 'touring/thumbnail/touring-blue-white.jpg', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
