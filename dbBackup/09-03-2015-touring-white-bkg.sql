-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 09, 2015 at 06:45 AM
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
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `status`) VALUES
(1, 'test: testValue\n'),
(2, 'test: testValue\n'),
(3, 'test: testValue\n'),
(4, 'test: testValue\n');

-- --------------------------------------------------------

--
-- Table structure for table `people_wearing_glasses`
--

CREATE TABLE IF NOT EXISTS `people_wearing_glasses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_path` varchar(200) DEFAULT NULL,
  `sunglasses_id` int(11) DEFAULT NULL,
  `sort` int(4) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `people_wearing_glasses`
--

INSERT INTO `people_wearing_glasses` (`id`, `img_path`, `sunglasses_id`, `sort`) VALUES
(36, 'peoplePhotos/parks-binding-stickers.jpg', NULL, 100),
(39, 'peoplePhotos/dEnHk4_Dm4M.jpg', NULL, 1),
(42, 'peoplePhotos/Bob2_707x5721.jpg', NULL, 100),
(44, 'peoplePhotos/4D0Xu5KVOQU2.jpg', NULL, 100),
(45, 'peoplePhotos/Bob-Soven-Spy1.jpg', NULL, 100),
(46, 'peoplePhotos/lentes-spy-ken-block-100-originales-caja-funda-pano--8390-MLV20003850295_112013-O1.jpg', NULL, 100),
(47, 'peoplePhotos/tdIAbuq0zfI1.jpg', NULL, 3),
(48, 'peoplePhotos/spy1.jpg', NULL, 2),
(49, 'peoplePhotos/spy2.jpg', NULL, 105),
(50, 'peoplePhotos/spy3.jpg', NULL, 18),
(52, 'peoplePhotos/spy5.jpg', NULL, 101),
(53, 'peoplePhotos/spyR1.jpg', NULL, 17),
(54, 'peoplePhotos/spyR2.jpg', NULL, 20);

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
(27, 'Ken Block Helm', 'green', 'upload/product/_MG_37731.jpg', 'upload/product/mini/_MG_37731.jpg', 200, 'upload/product/thumbnail/_MG_37731.jpg', 10),
(28, 'Ken Block Helm', 'grey spider', 'upload/product/_MG_3779-2.jpg', 'upload/product/mini/_MG_3779-2.jpg', 200, 'upload/product/thumbnail/_MG_3779-2.jpg', 0),
(30, 'Ken Block Helm', 'green spider', 'upload/product/_MG_37481.jpg', 'upload/product/mini/_MG_37481.jpg', 200, 'upload/product/thumbnail/_MG_37481.jpg', 0),
(31, 'Ken Block Helm', 'orange', 'upload/product/_MG_3771-2.jpg', 'upload/product/mini/_MG_3771-2.jpg', 200, 'upload/product/thumbnail/_MG_3771-2.jpg', 0),
(32, 'Ken Block Helm', 'purple', 'upload/product/_MG_37721.jpg', 'upload/product/mini/_MG_37721.jpg', 200, 'upload/product/thumbnail/_MG_37721.jpg', 0),
(33, 'Ken Block Helm', 'black', 'upload/product/_MG_37741.jpg', 'upload/product/mini/_MG_37741.jpg', 200, 'upload/product/thumbnail/_MG_37741.jpg', 0),
(34, 'Ken Block Helm', 'orange-blue', 'upload/product/_MG_3758-3.jpg', 'upload/product/mini/_MG_3758-3.jpg', 200, 'upload/product/thumbnail/_MG_3758-3.jpg', 0),
(35, 'Ken Block Helm', 'leopard', 'upload/product/_MG_37681.jpg', 'upload/product/mini/_MG_37681.jpg', 200, 'upload/product/thumbnail/_MG_37681.jpg', 0),
(36, 'Ken Block Helm', 'yellow', 'upload/product/_MG_37671.jpg', 'upload/product/mini/_MG_37671.jpg', 200, 'upload/product/thumbnail/_MG_37671.jpg', 0),
(37, 'Flynn', 'white-purple', 'upload/product/_MG_3788-2.jpg', 'upload/product/mini/_MG_3788-2.jpg', 300, 'upload/product/thumbnail/_MG_3788-2.jpg', 0),
(38, 'Flynn', 'green', 'upload/product/_MG_3785-2.jpg', 'upload/product/mini/_MG_3785-2.jpg', 300, 'upload/product/thumbnail/_MG_3785-2.jpg', 0),
(39, 'Flynn', 'military 2', 'upload/product/_MG_3787-2.jpg', 'upload/product/mini/_MG_3787-2.jpg', 300, 'upload/product/thumbnail/_MG_3787-2.jpg', 0),
(42, 'Flynn', 'purple-green', 'flynn/4.jpg', 'flynn/h200/4.jpg', 300, 'flynn/h30/4.jpg', 10),
(43, 'Flynn', 'white', 'upload/product/_MG_3799.jpg', 'upload/product/mini/_MG_3799.jpg', 300, 'upload/product/thumbnail/_MG_3799.jpg', 0),
(45, 'Flynn', 'red', 'upload/product/6.jpg', 'upload/product/mini/6.jpg', 300, 'upload/product/thumbnail/6.jpg', 0),
(49, 'Flynn', 'purple', 'flynn/1.jpg', 'flynn/h200/1.jpg', 300, 'flynn/h30/1.jpg', 11),
(50, 'Flynn', 'black', 'flynn/2.jpg', 'flynn/h200/2.jpg', 300, 'flynn/h30/2.jpg', 12),
(53, 'Flynn', 'black-white', 'upload/product/_MG_3789-2.jpg', 'upload/product/mini/_MG_3789-2.jpg', 300, 'upload/product/thumbnail/_MG_3789-2.jpg', 0),
(134, 'Ken Block Helm', 'black_white', 'upload/product/_MG_37501.jpg', 'upload/product/mini/_MG_37501.jpg', 200, 'upload/product/thumbnail/_MG_37501.jpg', 0),
(135, 'Ken Block Helm', 'blue_silver', 'upload/product/_MG_3757-3.jpg', 'upload/product/mini/_MG_3757-3.jpg', 200, 'upload/product/thumbnail/_MG_3757-3.jpg', 0),
(136, 'Ken Block Helm', 'black-orange', 'upload/product/_MG_3765.jpg', 'upload/product/mini/_MG_3765.jpg', 200, 'upload/product/thumbnail/_MG_3765.jpg', 0),
(137, 'Ken Block Helm', 'white_frame', 'upload/product/_MG_3762-21.jpg', 'upload/product/mini/_MG_3762-21.jpg', 200, 'upload/product/thumbnail/_MG_3762-21.jpg', 0),
(138, 'Ken Block Helm', 'grey_spider', 'upload/product/_MG_37761.jpg', 'upload/product/mini/_MG_37761.jpg', 200, 'upload/product/thumbnail/_MG_37761.jpg', 0),
(139, 'Ken Block Helm', 'purple_blue', 'upload/product/_MG_37751.jpg', 'upload/product/mini/_MG_37751.jpg', 200, 'upload/product/thumbnail/_MG_37751.jpg', 0),
(140, 'Ken Block Helm', 'purple_black', 'upload/product/_MG_37781.jpg', 'upload/product/mini/_MG_37781.jpg', 200, 'upload/product/thumbnail/_MG_37781.jpg', 0),
(141, 'Ken Block Helm', 'white', 'upload/product/_MG_3770-2.jpg', 'upload/product/mini/_MG_3770-2.jpg', 200, 'upload/product/thumbnail/_MG_3770-2.jpg', 0),
(142, 'Ken Block Helm', 'orange_blue_(black)', 'upload/product/_MG_3764-2.jpg', 'upload/product/mini/_MG_3764-2.jpg', 200, 'upload/product/thumbnail/_MG_3764-2.jpg', 0),
(143, 'Ken Block Helm', 'purple_grey', 'upload/product/_MG_3780-2.jpg', 'upload/product/mini/_MG_3780-2.jpg', 200, 'upload/product/thumbnail/_MG_3780-2.jpg', 0),
(144, 'Ken Block Helm', 'purple_white', 'upload/product/_MG_37491.jpg', 'upload/product/mini/_MG_37491.jpg', 200, 'upload/product/thumbnail/_MG_37491.jpg', 0),
(145, 'Ken Block Helm', 'blue-ice', 'upload/product/_MG_37631.jpg', 'upload/product/mini/_MG_37631.jpg', 200, 'upload/product/thumbnail/_MG_37631.jpg', -1),
(146, 'Flynn', 'gold', 'upload/product/_MG_3801.jpg', 'upload/product/mini/_MG_3801.jpg', 300, 'upload/product/thumbnail/_MG_3801.jpg', 0),
(147, 'Flynn', 'red-black', 'upload/product/_MG_3782.jpg', 'upload/product/mini/_MG_3782.jpg', 300, 'upload/product/thumbnail/_MG_3782.jpg', 0),
(148, 'Flynn', 'vintage', 'flynn/vintage.jpg', 'flynn/h200/vintage.jpg', 300, 'flynn/h30/vintage.jpg', 14),
(149, 'Flynn', 'military 1', 'upload/product/_MG_3786-2.jpg', 'upload/product/mini/_MG_3786-2.jpg', 300, 'upload/product/thumbnail/_MG_3786-2.jpg', 0),
(150, 'Ken Block Helm', 'reptile', 'upload/product/reptile.jpg', 'upload/product/mini/reptile.jpg', 200, 'upload/product/thumbnail/reptile.jpg', 0),
(151, 'Touring', 'surfer', 'upload/product/Orange_white.jpg', 'upload/product/mini/Orange_white.jpg', 350, 'upload/product/thumbnail/Orange_white.jpg', 0),
(152, 'Touring', 'blue', 'upload/product/Blue-black.jpg', 'upload/product/mini/Blue-black.jpg', 350, 'upload/product/thumbnail/Blue-black.jpg', 0),
(153, 'Touring', 'blue-black', 'upload/product/Blue_wave.jpg', 'upload/product/mini/Blue_wave.jpg', 350, 'upload/product/thumbnail/Blue_wave.jpg', 0),
(154, 'Touring', 'orange', 'upload/product/Orange.jpg', 'upload/product/mini/Orange.jpg', 350, 'upload/product/thumbnail/Orange.jpg', 0),
(155, 'Touring', 'california', 'upload/product/California.jpg', 'upload/product/mini/California.jpg', 350, 'upload/product/thumbnail/California.jpg', 0),
(156, 'Touring', 'green-blue', 'upload/product/Green_blue.jpg', 'upload/product/mini/Green_blue.jpg', 350, 'upload/product/thumbnail/Green_blue.jpg', 0),
(157, 'Touring', 'green-black', 'upload/product/Green_black.jpg', 'upload/product/mini/Green_black.jpg', 350, 'upload/product/thumbnail/Green_black.jpg', 0),
(158, 'Touring', 'white', 'upload/product/snowy.jpg', 'upload/product/mini/snowy.jpg', 350, 'upload/product/thumbnail/snowy.jpg', 0),
(159, 'Touring', 'blue-white', 'upload/product/Black_white.jpg', 'upload/product/mini/Black_white.jpg', 350, 'upload/product/thumbnail/Black_white.jpg', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
