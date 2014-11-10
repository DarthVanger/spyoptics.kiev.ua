-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 10, 2014 at 10:25 PM
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=149 ;

--
-- Dumping data for table `sunglasses`
--

INSERT INTO `sunglasses` (`id`, `model`, `color`, `img_path`, `mini_img_path`, `price`, `thumbnail_img_path`) VALUES
(27, 'Ken Block Helm', 'green', 'upload/product/green4.jpg', 'upload/product/mini/green4.jpg', 150, 'upload/product/thumbnail/green4.jpg'),
(28, 'Ken Block Helm', 'grey spider', 'upload/product/1167381755_063.jpg', 'upload/product/mini/1167381755_063.jpg', 150, 'upload/product/thumbnail/1167381755_063.jpg'),
(30, 'Ken Block Helm', 'green spider', 'kenBlockHelm/1167917392_031.jpg', 'kenBlockHelm/h200/1167917392_031.jpg', 150, 'kenBlockHelm/h30/1167917392_031.jpg'),
(31, 'Ken Block Helm', 'orange', 'kenBlockHelm/1167381745_205.jpg', 'kenBlockHelm/h200/1167381745_205.jpg', 150, 'kenBlockHelm/h30/1167381745_205.jpg'),
(32, 'Ken Block Helm', 'purple', 'kenBlockHelm/1167917397_168.jpg', 'kenBlockHelm/h200/1167917397_168.jpg', 150, 'kenBlockHelm/h30/1167917397_168.jpg'),
(33, 'Ken Block Helm', 'black', 'kenBlockHelm/1167381742_765.jpg', 'kenBlockHelm/h200/1167381742_765.jpg', 150, 'kenBlockHelm/h30/1167381742_765.jpg'),
(34, 'Ken Block Helm', 'orange-blue', 'kenBlockHelm/1167381740_183.jpg', 'kenBlockHelm/h200/1167381740_183.jpg', 150, 'kenBlockHelm/h30/1167381740_183.jpg'),
(35, 'Ken Block Helm', 'leopard', 'upload/product/_MG_37681.JPG', 'upload/product/mini/_MG_37681.JPG', 150, 'upload/product/thumbnail/_MG_37681.JPG'),
(36, 'Ken Block Helm', 'yellow', 'kenBlockHelm/1167381752_141.jpg', 'kenBlockHelm/h200/1167381752_141.jpg', 150, 'kenBlockHelm/h30/1167381752_141.jpg'),
(37, 'Flynn', 'white-purple', 'flynn/3.jpg', 'flynn/h200/3.jpg', 280, 'flynn/h30/3.jpg'),
(38, 'Flynn', 'green', 'flynn/7.jpg', 'flynn/h200/7.jpg', 280, 'flynn/h30/7.jpg'),
(39, 'Flynn', 'military 2', 'flynn/9.jpg', 'flynn/h200/9.jpg', 250, 'flynn/h30/9.jpg'),
(42, 'Flynn', 'purple-green', 'flynn/4.jpg', 'flynn/h200/4.jpg', 280, 'flynn/h30/4.jpg'),
(43, 'Flynn', 'white', 'flynn/5.jpg', 'flynn/h200/5.jpg', 280, 'flynn/h30/5.jpg'),
(45, 'Flynn', 'red', 'flynn/6.jpg', 'flynn/h200/6.jpg', 280, 'flynn/h30/6.jpg'),
(49, 'Flynn', 'purple', 'flynn/1.jpg', 'flynn/h200/1.jpg', 280, 'flynn/h30/1.jpg'),
(50, 'Flynn', 'black', 'flynn/2.jpg', 'flynn/h200/2.jpg', 280, 'flynn/h30/2.jpg'),
(53, 'Flynn', 'military 1', 'flynn/8.jpg', 'flynn/h200/8.jpg', 250, 'flynn/h30/8.jpg'),
(134, 'Ken Block Helm', 'black_white', 'kenBlockHelm2/black_white.jpg', 'kenBlockHelm2/mini/black_white.jpg', 150, 'kenBlockHelm2/thumbnail/black_white.jpg'),
(135, 'Ken Block Helm', 'blue_silver', 'kenBlockHelm2/blue_silver.jpg', 'kenBlockHelm2/mini/blue_silver.jpg', 150, 'kenBlockHelm2/thumbnail/blue_silver.jpg'),
(136, 'Ken Block Helm', 'black-orange', 'kenBlockHelm2/black-orange.jpg', 'kenBlockHelm2/mini/black-orange.jpg', 150, 'kenBlockHelm2/thumbnail/black-orange.jpg'),
(137, 'Ken Block Helm', 'white_frame', 'kenBlockHelm2/white_frame.jpg', 'kenBlockHelm2/mini/white_frame.jpg', 150, 'kenBlockHelm2/thumbnail/white_frame.jpg'),
(138, 'Ken Block Helm', 'grey_spider', 'kenBlockHelm2/grey_spider.jpg', 'kenBlockHelm2/mini/grey_spider.jpg', 150, 'kenBlockHelm2/thumbnail/grey_spider.jpg'),
(139, 'Ken Block Helm', 'purple_blue', 'kenBlockHelm2/purple_blue.jpg', 'kenBlockHelm2/mini/purple_blue.jpg', 150, 'kenBlockHelm2/thumbnail/purple_blue.jpg'),
(140, 'Ken Block Helm', 'purple_black', 'kenBlockHelm2/purple_black.jpg', 'kenBlockHelm2/mini/purple_black.jpg', 150, 'kenBlockHelm2/thumbnail/purple_black.jpg'),
(141, 'Ken Block Helm', 'white', 'kenBlockHelm2/white.jpg', 'kenBlockHelm2/mini/white.jpg', 150, 'kenBlockHelm2/thumbnail/white.jpg'),
(142, 'Ken Block Helm', 'orange_blue_(black)', 'upload/product/orange_blue_(black).jpg', 'upload/product/mini/orange_blue_(black).jpg', 150, 'upload/product/thumbnail/orange_blue_(black).jpg'),
(143, 'Ken Block Helm', 'purple_grey', 'kenBlockHelm2/purple_grey.jpg', 'kenBlockHelm2/mini/purple_grey.jpg', 150, 'kenBlockHelm2/thumbnail/purple_grey.jpg'),
(144, 'Ken Block Helm', 'purple_white', 'kenBlockHelm2/purple_white.jpg', 'kenBlockHelm2/mini/purple_white.jpg', 150, 'kenBlockHelm2/thumbnail/purple_white.jpg'),
(145, 'Ken Block Helm', 'blue-ice', 'kenBlockHelm2/kenblock-blue-ice.jpg', 'kenBlockHelm2/mini/kenblock-blue-ice.jpg', 150, 'kenBlockHelm2/thumbnail/kenblock-blue-ice.jpg'),
(146, 'Flynn', 'gold', 'flynn/gold.jpg', 'flynn/h200/gold.jpg', 280, 'flynn/h30/gold.jpg'),
(147, 'Flynn', 'red-black', 'flynn/red-black.jpg', 'flynn/h200/red-black.jpg', 280, 'flynn/h30/red-black.jpg'),
(148, 'Flynn', 'vintage', 'flynn/vintage.jpg', 'flynn/h200/vintage.jpg', 280, 'flynn/h30/vintage.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
