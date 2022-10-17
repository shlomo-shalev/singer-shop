-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2020 at 12:03 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `singer_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

USE catalog;

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `visibility` int(11) NOT NULL,
  `is_open` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT IGNORE `categories` (`id`, `title`, `description`, `image`, `url`, `visibility`, `is_open`, `updated_at`, `created_at`) VALUES
(2, 'Songs', 'Songs Rapley wrote during his career, all songs are available for immediate purchase.', '2020.08.06.16.46.08-cUDTl5s-songs.jpg', 'songs', 1, 1, '2020-09-05 10:28:21', '2020-07-06 10:42:33'),
(3, 'Hats', 'Hats with name of Rapley, You can purchase a hat with a photo of Rapley through our customer service.', '2020.09.05.21.28.38-qlWZQZv-claudio-schwarz-purzlbaum-PH8GUKG-Do0-unsplash.jpg', 'hats', 1, 1, '2020-09-05 21:28:44', '2020-07-06 10:47:20'),
(4, 'Shirts', 'T-shirts with a picture of Rapley on which, You can purchase the shirts in one of the range of colors we offer..', '2020.09.06.08.52.59-8Q5TsZX-2020.08.06.16.45.47-CLnXERe-shirts.jpg', 'shirts', 1, 1, '2020-09-06 08:52:59', '2020-07-06 10:56:34'),
(5, 'Demo', '<p style=\"text-align: center; \"><span style=\"background-color: rgb(0, 0, 0);\"><font color=\"#ffffff\">demo</font></span></p>', 'no-image.jpg', 'demo', 0, 0, '2020-09-03 11:23:26', '2020-08-12 10:45:01');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE IF NOT EXISTS `contents` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `cntitle` varchar(255) NOT NULL,
  `cndescription` longtext NOT NULL,
  `visibility` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contents`
--

INSERT IGNORE `contents` (`id`, `menu_id`, `cntitle`, `cndescription`, `visibility`, `updated_at`, `created_at`) VALUES
(1, 5, 'About Rapley', '<p>Raphael is a singer who loves to sing rap, he was born in California and from childhood his parents taught him to play the guitar. Since then to this day Rapley has made many appearances and released over 100 songs he has written.</p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p>', 1, '2020-09-05 09:50:37', '2020-07-21 14:26:51'),
(2, 6, 'Contact', '<p><span style=\"background-color: rgb(255, 0, 0);\"><font color=\"#ffffff\"><b>Business reasons will only be answered:\r\n</b></font></span></p><p><b>Email: <a href=\"mailto:info@rapley.com\" class=\"site-color\">info@rapley.com</a>\r\n</b></p><p><b>Phone: <a href=\"tel:+19453486475\" class=\"site-color\">+19453486475</a></b></p><p><b><br></b></p><p><b><br></b></p><p><b><br></b></p><p><br></p><p><b><br></b></p><p><b><br></b></p><p><b><br></b></p><p><b><br></b></p>', 1, '2020-08-12 14:26:47', '2020-07-21 14:27:08'),
(9, 5, 'Demo To About', '<p><font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">demo</font></p>', 0, '2020-08-03 09:24:13', '2020-08-03 08:38:54'),
(12, 26, 'demo', '<p><b style=\"background-color: rgb(0, 0, 255);\"><font color=\"#ffffff\">demo</font></b></p>', 1, '2020-08-03 14:55:45', '2020-08-03 08:40:35'),
(13, 25, 'hello world', '<h1 style=\"text-align: center; \"><b style=\"background-color: rgb(0, 0, 0);\"><font color=\"#ffffff\">hello world!!!</font></b></h1>', 1, '2020-09-04 21:15:48', '2020-08-03 09:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `visibility` int(11) NOT NULL,
  `is_open` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT IGNORE `menus` (`id`, `link`, `url`, `title`, `visibility`, `is_open`, `updated_at`, `created_at`) VALUES
(5, 'about', 'about', 'about', 1, 1, '2020-09-05 09:49:19', '2020-07-19 17:31:24'),
(6, 'Contact', 'contact', 'Contact', 1, 1, '2020-09-04 19:05:45', '2020-07-19 17:31:54'),
(25, 'demo2', 'demo2', 'demo2', 0, 1, '2020-08-03 09:18:41', '2020-08-03 09:17:12'),
(26, 'demo', 'demo', 'demo', 0, 0, '2020-08-16 14:43:05', '2020-08-03 14:55:35');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `data` text NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT IGNORE `orders` (`id`, `user_id`, `total`, `data`, `updated_at`, `created_at`) VALUES
(1, 16, 30, 'a:1:{i:8;a:6:{s:2:\"id\";i:8;s:4:\"name\";s:14:\"American Style\";s:5:\"price\";d:30;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";a:2:{s:5:\"image\";s:46:\"2020.08.12.10.00.39-XkwKPCF-american-style.jpg\";s:3:\"url\";s:24:\"shop/hats/american-style\";}s:10:\"conditions\";a:0:{}}}', '2020-08-14 19:10:53', '2020-08-14 19:10:53'),
(2, 16, 168, 'a:9:{i:13;a:6:{s:2:\"id\";i:13;s:4:\"name\";s:10:\"Pink Shirt\";s:5:\"price\";d:9;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";a:2:{s:5:\"image\";s:42:\"2020.08.12.10.21.52-PnBQjND-pink-shirt.jpg\";s:3:\"url\";s:22:\"shop/shirts/pink-shirt\";}s:10:\"conditions\";a:0:{}}i:10;a:6:{s:2:\"id\";i:10;s:4:\"name\";s:11:\"White Shirt\";s:5:\"price\";d:5;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";a:2:{s:5:\"image\";s:71:\"2020.08.12.10.21.31-tzcgczW-2020.08.12.10.13.35-o1oWLhf-white-shirt.jpg\";s:3:\"url\";s:23:\"shop/shirts/white-shirt\";}s:10:\"conditions\";a:0:{}}i:11;a:6:{s:2:\"id\";i:11;s:4:\"name\";s:11:\"Black Shirt\";s:5:\"price\";d:7;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";a:2:{s:5:\"image\";s:43:\"2020.08.12.10.21.42-sqQkQfe-black-shirt.jpg\";s:3:\"url\";s:23:\"shop/shirts/black-shirt\";}s:10:\"conditions\";a:0:{}}i:8;a:6:{s:2:\"id\";i:8;s:4:\"name\";s:14:\"American Style\";s:5:\"price\";d:30;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";a:2:{s:5:\"image\";s:46:\"2020.08.12.10.00.39-XkwKPCF-american-style.jpg\";s:3:\"url\";s:24:\"shop/hats/american-style\";}s:10:\"conditions\";a:0:{}}i:9;a:6:{s:2:\"id\";i:9;s:4:\"name\";s:11:\"Cow Boy Hat\";s:5:\"price\";d:12.43;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";a:2:{s:5:\"image\";s:43:\"2020.08.12.10.00.48-THIUroJ-cow-boy-hat.jpg\";s:3:\"url\";s:21:\"shop/hats/cow-boy-hat\";}s:10:\"conditions\";a:0:{}}i:5;a:6:{s:2:\"id\";i:5;s:4:\"name\";s:10:\"Summer Hat\";s:5:\"price\";d:10;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";a:2:{s:5:\"image\";s:42:\"2020.08.12.10.00.28-IN7Z2st-summer-hat.jpg\";s:3:\"url\";s:20:\"shop/hats/summer-hat\";}s:10:\"conditions\";a:0:{}}i:4;a:6:{s:2:\"id\";i:4;s:4:\"name\";s:15:\"A New Adventure\";s:5:\"price\";d:13.56;s:8:\"quantity\";i:2;s:10:\"attributes\";a:2:{s:5:\"image\";s:47:\"2020.08.12.10.21.08-pjl1s2d-a-new-adventure.jpg\";s:3:\"url\";s:26:\"shop/songs/a-new-adventure\";}s:10:\"conditions\";a:0:{}}i:2;a:6:{s:2:\"id\";i:2;s:4:\"name\";s:5:\"Smile\";s:5:\"price\";d:10;s:8:\"quantity\";i:2;s:10:\"attributes\";a:2:{s:5:\"image\";s:37:\"2020.08.12.10.20.49-Zhf80Wq-smile.jpg\";s:3:\"url\";s:16:\"shop/songs/smile\";}s:10:\"conditions\";a:0:{}}i:3;a:6:{s:2:\"id\";i:3;s:4:\"name\";s:11:\"One Morning\";s:5:\"price\";d:15.7;s:8:\"quantity\";i:3;s:10:\"attributes\";a:2:{s:5:\"image\";s:43:\"2020.08.12.10.20.59-Ukwt1Fk-one-morning.jpg\";s:3:\"url\";s:22:\"shop/songs/one-morning\";}s:10:\"conditions\";a:0:{}}}', '2020-08-14 19:12:24', '2020-08-14 19:12:24'),
(3, 4, 270, 'a:3:{i:2;a:6:{s:2:\"id\";i:2;s:4:\"name\";s:5:\"Smile\";s:5:\"price\";d:10;s:8:\"quantity\";s:2:\"10\";s:10:\"attributes\";a:2:{s:5:\"image\";s:37:\"2020.08.12.10.20.49-Zhf80Wq-smile.jpg\";s:3:\"url\";s:16:\"shop/songs/smile\";}s:10:\"conditions\";a:0:{}}i:5;a:6:{s:2:\"id\";i:5;s:4:\"name\";s:10:\"Summer Hat\";s:5:\"price\";d:10;s:8:\"quantity\";s:2:\"10\";s:10:\"attributes\";a:2:{s:5:\"image\";s:42:\"2020.08.12.10.00.28-IN7Z2st-summer-hat.jpg\";s:3:\"url\";s:20:\"shop/hats/summer-hat\";}s:10:\"conditions\";a:0:{}}i:11;a:6:{s:2:\"id\";i:11;s:4:\"name\";s:11:\"Black Shirt\";s:5:\"price\";d:7;s:8:\"quantity\";s:2:\"10\";s:10:\"attributes\";a:2:{s:5:\"image\";s:43:\"2020.08.12.10.21.42-sqQkQfe-black-shirt.jpg\";s:3:\"url\";s:23:\"shop/shirts/black-shirt\";}s:10:\"conditions\";a:0:{}}}', '2020-08-14 19:16:30', '2020-08-14 19:16:30'),
(4, 16, 15, 'a:1:{i:21;a:6:{s:2:\"id\";i:21;s:4:\"name\";s:5:\"demo1\";s:5:\"price\";d:3;s:8:\"quantity\";s:1:\"5\";s:10:\"attributes\";a:2:{s:5:\"image\";s:12:\"no-image.jpg\";s:3:\"url\";s:15:\"shop/demo/demo1\";}s:10:\"conditions\";a:0:{}}}', '2020-08-14 19:28:27', '2020-08-14 19:28:27'),
(5, 4, 511, 'a:6:{i:10;a:6:{s:2:\"id\";i:10;s:4:\"name\";s:11:\"White Shirt\";s:5:\"price\";d:5;s:8:\"quantity\";s:1:\"6\";s:10:\"attributes\";a:2:{s:5:\"image\";s:71:\"2020.08.12.10.21.31-tzcgczW-2020.08.12.10.13.35-o1oWLhf-white-shirt.jpg\";s:3:\"url\";s:23:\"shop/shirts/white-shirt\";}s:10:\"conditions\";a:0:{}}i:13;a:6:{s:2:\"id\";i:13;s:4:\"name\";s:10:\"Pink Shirt\";s:5:\"price\";d:9;s:8:\"quantity\";s:1:\"3\";s:10:\"attributes\";a:2:{s:5:\"image\";s:42:\"2020.08.12.10.21.52-PnBQjND-pink-shirt.jpg\";s:3:\"url\";s:22:\"shop/shirts/pink-shirt\";}s:10:\"conditions\";a:0:{}}i:8;a:6:{s:2:\"id\";i:8;s:4:\"name\";s:14:\"American Style\";s:5:\"price\";d:30;s:8:\"quantity\";s:1:\"3\";s:10:\"attributes\";a:2:{s:5:\"image\";s:46:\"2020.08.12.10.00.39-XkwKPCF-american-style.jpg\";s:3:\"url\";s:24:\"shop/hats/american-style\";}s:10:\"conditions\";a:0:{}}i:5;a:6:{s:2:\"id\";i:5;s:4:\"name\";s:10:\"Summer Hat\";s:5:\"price\";d:10;s:8:\"quantity\";s:1:\"2\";s:10:\"attributes\";a:2:{s:5:\"image\";s:42:\"2020.08.12.10.00.28-IN7Z2st-summer-hat.jpg\";s:3:\"url\";s:20:\"shop/hats/summer-hat\";}s:10:\"conditions\";a:0:{}}i:2;a:6:{s:2:\"id\";i:2;s:4:\"name\";s:5:\"Smile\";s:5:\"price\";d:10;s:8:\"quantity\";s:1:\"3\";s:10:\"attributes\";a:2:{s:5:\"image\";s:37:\"2020.08.12.10.20.49-Zhf80Wq-smile.jpg\";s:3:\"url\";s:16:\"shop/songs/smile\";}s:10:\"conditions\";a:0:{}}i:3;a:6:{s:2:\"id\";i:3;s:4:\"name\";s:11:\"One Morning\";s:5:\"price\";d:15.7;s:8:\"quantity\";s:2:\"20\";s:10:\"attributes\";a:2:{s:5:\"image\";s:43:\"2020.08.12.10.20.59-Ukwt1Fk-one-morning.jpg\";s:3:\"url\";s:22:\"shop/songs/one-morning\";}s:10:\"conditions\";a:0:{}}}', '2020-08-14 19:34:43', '2020-08-14 19:34:43'),
(6, 7, 54, 'a:3:{i:5;a:6:{s:2:\"id\";i:5;s:4:\"name\";s:10:\"Summer Hat\";s:5:\"price\";d:10;s:8:\"quantity\";i:3;s:10:\"attributes\";a:2:{s:5:\"image\";s:42:\"2020.08.12.10.00.28-IN7Z2st-summer-hat.jpg\";s:3:\"url\";s:20:\"shop/hats/summer-hat\";}s:10:\"conditions\";a:0:{}}i:11;a:6:{s:2:\"id\";i:11;s:4:\"name\";s:11:\"Black Shirt\";s:5:\"price\";d:7;s:8:\"quantity\";i:2;s:10:\"attributes\";a:2:{s:5:\"image\";s:43:\"2020.08.12.10.21.42-sqQkQfe-black-shirt.jpg\";s:3:\"url\";s:23:\"shop/shirts/black-shirt\";}s:10:\"conditions\";a:0:{}}i:10;a:6:{s:2:\"id\";i:10;s:4:\"name\";s:11:\"White Shirt\";s:5:\"price\";d:5;s:8:\"quantity\";i:2;s:10:\"attributes\";a:2:{s:5:\"image\";s:71:\"2020.08.12.10.21.31-tzcgczW-2020.08.12.10.13.35-o1oWLhf-white-shirt.jpg\";s:3:\"url\";s:23:\"shop/shirts/white-shirt\";}s:10:\"conditions\";a:0:{}}}', '2020-08-15 14:07:29', '2020-08-15 14:07:29'),
(7, 18, 93, 'a:5:{i:10;a:6:{s:2:\"id\";i:10;s:4:\"name\";s:11:\"White Shirt\";s:5:\"price\";d:5;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";a:2:{s:5:\"image\";s:71:\"2020.08.12.10.21.31-tzcgczW-2020.08.12.10.13.35-o1oWLhf-white-shirt.jpg\";s:3:\"url\";s:23:\"shop/shirts/white-shirt\";}s:10:\"conditions\";a:0:{}}i:9;a:6:{s:2:\"id\";i:9;s:4:\"name\";s:11:\"Cow Boy Hat\";s:5:\"price\";d:12.43;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";a:2:{s:5:\"image\";s:43:\"2020.08.12.10.00.48-THIUroJ-cow-boy-hat.jpg\";s:3:\"url\";s:21:\"shop/hats/cow-boy-hat\";}s:10:\"conditions\";a:0:{}}i:13;a:6:{s:2:\"id\";i:13;s:4:\"name\";s:10:\"Pink Shirt\";s:5:\"price\";d:9;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";a:2:{s:5:\"image\";s:42:\"2020.08.12.10.21.52-PnBQjND-pink-shirt.jpg\";s:3:\"url\";s:22:\"shop/shirts/pink-shirt\";}s:10:\"conditions\";a:0:{}}i:11;a:6:{s:2:\"id\";i:11;s:4:\"name\";s:11:\"Black Shirt\";s:5:\"price\";d:7;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";a:2:{s:5:\"image\";s:43:\"2020.08.12.10.21.42-sqQkQfe-black-shirt.jpg\";s:3:\"url\";s:23:\"shop/shirts/black-shirt\";}s:10:\"conditions\";a:0:{}}i:8;a:6:{s:2:\"id\";i:8;s:4:\"name\";s:14:\"American Style\";s:5:\"price\";d:30;s:8:\"quantity\";i:2;s:10:\"attributes\";a:2:{s:5:\"image\";s:46:\"2020.08.12.10.00.39-XkwKPCF-american-style.jpg\";s:3:\"url\";s:24:\"shop/hats/american-style\";}s:10:\"conditions\";a:0:{}}}', '2020-08-15 21:30:53', '2020-08-15 21:30:53'),
(8, 16, 16, 'a:2:{i:11;a:6:{s:2:\"id\";i:11;s:4:\"name\";s:11:\"Black Shirt\";s:5:\"price\";d:7;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";a:2:{s:5:\"image\";s:43:\"2020.08.12.10.21.42-sqQkQfe-black-shirt.jpg\";s:3:\"url\";s:23:\"shop/shirts/black-shirt\";}s:10:\"conditions\";a:0:{}}i:13;a:6:{s:2:\"id\";i:13;s:4:\"name\";s:10:\"Pink Shirt\";s:5:\"price\";d:9;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";a:2:{s:5:\"image\";s:42:\"2020.08.12.10.21.52-PnBQjND-pink-shirt.jpg\";s:3:\"url\";s:22:\"shop/shirts/pink-shirt\";}s:10:\"conditions\";a:0:{}}}', '2020-08-17 12:50:58', '2020-08-17 12:50:58'),
(9, 19, 157, 'a:3:{i:13;a:6:{s:2:\"id\";i:13;s:4:\"name\";s:10:\"Pink Shirt\";s:5:\"price\";d:9;s:8:\"quantity\";i:4;s:10:\"attributes\";a:2:{s:5:\"image\";s:42:\"2020.08.12.10.21.52-PnBQjND-pink-shirt.jpg\";s:3:\"url\";s:22:\"shop/shirts/pink-shirt\";}s:10:\"conditions\";a:0:{}}i:3;a:6:{s:2:\"id\";i:3;s:4:\"name\";s:11:\"One Morning\";s:5:\"price\";d:15.7;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";a:2:{s:5:\"image\";s:43:\"2020.08.12.10.20.59-Ukwt1Fk-one-morning.jpg\";s:3:\"url\";s:22:\"shop/songs/one-morning\";}s:10:\"conditions\";a:0:{}}i:11;a:6:{s:2:\"id\";i:11;s:4:\"name\";s:11:\"Black Shirt\";s:5:\"price\";d:7;s:8:\"quantity\";s:2:\"15\";s:10:\"attributes\";a:2:{s:5:\"image\";s:43:\"2020.08.12.10.21.42-sqQkQfe-black-shirt.jpg\";s:3:\"url\";s:23:\"shop/shirts/black-shirt\";}s:10:\"conditions\";a:0:{}}}', '2020-08-17 12:52:58', '2020-08-17 12:52:58'),
(10, 20, 72, 'a:3:{i:8;a:6:{s:2:\"id\";i:8;s:4:\"name\";s:14:\"American Style\";s:5:\"price\";d:30;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";a:2:{s:5:\"image\";s:46:\"2020.08.12.10.00.39-XkwKPCF-american-style.jpg\";s:3:\"url\";s:24:\"shop/hats/american-style\";}s:10:\"conditions\";a:0:{}}i:9;a:6:{s:2:\"id\";i:9;s:4:\"name\";s:11:\"Cow Boy Hat\";s:5:\"price\";d:12.43;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";a:2:{s:5:\"image\";s:43:\"2020.08.12.10.00.48-THIUroJ-cow-boy-hat.jpg\";s:3:\"url\";s:21:\"shop/hats/cow-boy-hat\";}s:10:\"conditions\";a:0:{}}i:5;a:6:{s:2:\"id\";i:5;s:4:\"name\";s:10:\"Summer Hat\";s:5:\"price\";d:10;s:8:\"quantity\";i:3;s:10:\"attributes\";a:2:{s:5:\"image\";s:42:\"2020.08.12.10.00.28-IN7Z2st-summer-hat.jpg\";s:3:\"url\";s:20:\"shop/hats/summer-hat\";}s:10:\"conditions\";a:0:{}}}', '2020-08-19 13:10:58', '2020-08-19 13:10:58'),
(11, 20, 12, 'a:2:{i:10;a:6:{s:2:\"id\";i:10;s:4:\"name\";s:11:\"White Shirt\";s:5:\"price\";d:5;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";a:2:{s:5:\"image\";s:71:\"2020.08.12.10.21.31-tzcgczW-2020.08.12.10.13.35-o1oWLhf-white-shirt.jpg\";s:3:\"url\";s:23:\"shop/shirts/white-shirt\";}s:10:\"conditions\";a:0:{}}i:11;a:6:{s:2:\"id\";i:11;s:4:\"name\";s:11:\"Black Shirt\";s:5:\"price\";d:7;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";a:2:{s:5:\"image\";s:43:\"2020.08.12.10.21.42-sqQkQfe-black-shirt.jpg\";s:3:\"url\";s:23:\"shop/shirts/black-shirt\";}s:10:\"conditions\";a:0:{}}}', '2020-08-19 13:11:47', '2020-08-19 13:11:47'),
(12, 25, 52, 'a:3:{i:8;a:6:{s:2:\"id\";i:8;s:4:\"name\";s:14:\"American Style\";s:5:\"price\";d:30;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";a:2:{s:5:\"image\";s:46:\"2020.08.12.10.00.39-XkwKPCF-american-style.jpg\";s:3:\"url\";s:24:\"shop/hats/american-style\";}s:10:\"conditions\";a:0:{}}i:5;a:6:{s:2:\"id\";i:5;s:4:\"name\";s:10:\"Summer Hat\";s:5:\"price\";d:10;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";a:2:{s:5:\"image\";s:42:\"2020.08.12.10.00.28-IN7Z2st-summer-hat.jpg\";s:3:\"url\";s:20:\"shop/hats/summer-hat\";}s:10:\"conditions\";a:0:{}}i:9;a:6:{s:2:\"id\";i:9;s:4:\"name\";s:11:\"Cow Boy Hat\";s:5:\"price\";d:12.43;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";a:2:{s:5:\"image\";s:43:\"2020.08.12.10.00.48-THIUroJ-cow-boy-hat.jpg\";s:3:\"url\";s:21:\"shop/hats/cow-boy-hat\";}s:10:\"conditions\";a:0:{}}}', '2020-08-21 20:37:50', '2020-08-21 20:37:50'),
(13, 1, 54, 'a:3:{i:2;a:6:{s:2:\"id\";i:2;s:4:\"name\";s:5:\"Smile\";s:5:\"price\";d:10;s:8:\"quantity\";s:1:\"4\";s:10:\"attributes\";a:2:{s:5:\"image\";s:37:\"2020.08.12.10.20.49-Zhf80Wq-smile.jpg\";s:3:\"url\";s:16:\"shop/songs/smile\";}s:10:\"conditions\";a:0:{}}i:13;a:6:{s:2:\"id\";i:13;s:4:\"name\";s:10:\"Pink Shirt\";s:5:\"price\";d:9;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";a:2:{s:5:\"image\";s:42:\"2020.08.12.10.21.52-PnBQjND-pink-shirt.jpg\";s:3:\"url\";s:22:\"shop/shirts/pink-shirt\";}s:10:\"conditions\";a:0:{}}i:10;a:6:{s:2:\"id\";i:10;s:4:\"name\";s:11:\"White Shirt\";s:5:\"price\";d:5;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";a:2:{s:5:\"image\";s:71:\"2020.08.12.10.21.31-tzcgczW-2020.08.12.10.13.35-o1oWLhf-white-shirt.jpg\";s:3:\"url\";s:23:\"shop/shirts/white-shirt\";}s:10:\"conditions\";a:0:{}}}', '2020-08-24 11:39:11', '2020-08-24 11:39:11'),
(14, 1, 5, 'a:1:{i:10;a:6:{s:2:\"id\";i:10;s:4:\"name\";s:11:\"White Shirt\";s:5:\"price\";d:5;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";a:2:{s:5:\"image\";s:71:\"2020.08.12.10.21.31-tzcgczW-2020.08.12.10.13.35-o1oWLhf-white-shirt.jpg\";s:3:\"url\";s:23:\"shop/shirts/white-shirt\";}s:10:\"conditions\";a:0:{}}}', '2020-09-01 09:51:28', '2020-09-01 09:51:28'),
(15, 1, 27, 'a:1:{i:13;a:6:{s:2:\"id\";i:13;s:4:\"name\";s:10:\"Pink Shirt\";s:5:\"price\";d:9;s:8:\"quantity\";s:1:\"3\";s:10:\"attributes\";a:2:{s:5:\"image\";s:42:\"2020.08.12.10.21.52-PnBQjND-pink-shirt.jpg\";s:3:\"url\";s:22:\"shop/shirts/pink-shirt\";}s:10:\"conditions\";a:0:{}}}', '2020-09-02 11:11:16', '2020-09-02 11:11:16'),
(16, 20, 85, 'a:3:{i:30;a:6:{s:2:\"id\";i:30;s:4:\"name\";s:15:\"New White Shirt\";s:5:\"price\";d:20;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";a:2:{s:5:\"image\";s:43:\"2020.09.03.11.16.01-3iMFPu8-white-shirt.jpg\";s:3:\"url\";s:27:\"shop/shirts/new-white-shirt\";}s:10:\"conditions\";a:0:{}}i:11;a:6:{s:2:\"id\";i:11;s:4:\"name\";s:11:\"Black Shirt\";s:5:\"price\";d:7;s:8:\"quantity\";i:5;s:10:\"attributes\";a:2:{s:5:\"image\";s:43:\"2020.08.12.10.21.42-sqQkQfe-black-shirt.jpg\";s:3:\"url\";s:23:\"shop/shirts/black-shirt\";}s:10:\"conditions\";a:0:{}}i:28;a:6:{s:2:\"id\";i:28;s:4:\"name\";s:11:\"Normal Sets\";s:5:\"price\";d:10;s:8:\"quantity\";i:3;s:10:\"attributes\";a:2:{s:5:\"image\";s:43:\"2020.09.03.11.01.23-HZcJyVI-normal-sets.jpg\";s:3:\"url\";s:21:\"shop/hats/normal-sets\";}s:10:\"conditions\";a:0:{}}}', '2020-09-05 14:25:30', '2020-09-05 14:25:30'),
(17, 1, 29, 'a:2:{i:30;a:6:{s:2:\"id\";i:30;s:4:\"name\";s:15:\"New White Shirt\";s:5:\"price\";d:20;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";a:2:{s:5:\"image\";s:43:\"2020.09.03.11.16.01-3iMFPu8-white-shirt.jpg\";s:3:\"url\";s:27:\"shop/shirts/new-white-shirt\";}s:10:\"conditions\";a:0:{}}i:13;a:6:{s:2:\"id\";i:13;s:4:\"name\";s:10:\"Pink Shirt\";s:5:\"price\";d:9;s:8:\"quantity\";s:1:\"1\";s:10:\"attributes\";a:2:{s:5:\"image\";s:42:\"2020.08.12.10.21.52-PnBQjND-pink-shirt.jpg\";s:3:\"url\";s:22:\"shop/shirts/pink-shirt\";}s:10:\"conditions\";a:0:{}}}', '2020-09-06 09:12:57', '2020-09-06 09:12:57');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `ptitle` varchar(255) NOT NULL,
  `particle` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `pimage` varchar(255) NOT NULL,
  `purl` varchar(255) NOT NULL,
  `visibility` int(11) NOT NULL,
  `is_open` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT IGNORE `products` (`id`, `categorie_id`, `ptitle`, `particle`, `price`, `pimage`, `purl`, `visibility`, `is_open`, `updated_at`, `created_at`) VALUES
(2, 2, 'Smile', 'The song smile was created following a crisis that Rapley had, Rapley dedicated the song to anyone who feels that something should be encouraged.', '10.00', '2020.08.12.10.20.49-Zhf80Wq-smile.jpg', 'smile', 1, 1, '2020-08-24 10:57:45', '2020-07-07 12:35:55'),
(3, 2, 'One Morning', 'One Morning is a song created when Rapley woke up with motivation and wrote the song.', '15.70', '2020.08.12.10.20.59-Ukwt1Fk-one-morning.jpg', 'one-morning', 1, 1, '2020-09-05 10:49:19', '2020-07-12 08:09:23'),
(4, 2, 'A New Adventure', 'Every day for Raffley is a new adventure and as a result Ruffley wrote a song about it.', '13.56', '2020.08.12.10.21.08-pjl1s2d-a-new-adventure.jpg', 'a-new-adventure', 1, 1, '2020-08-14 18:59:34', '2020-07-12 08:13:57'),
(5, 3, 'Summer Hat', 'A summer hat with Repley\'s name on it.', '10.00', '2020.08.12.10.00.28-IN7Z2st-summer-hat.jpg', 'summer-hat', 1, 1, '2020-08-12 10:00:28', '2020-07-12 08:21:02'),
(8, 3, 'American Style', 'Hat in American style with Rapley\'s name written on it.', '30.00', '2020.08.12.10.00.39-XkwKPCF-american-style.jpg', 'american-style', 1, 1, '2020-08-12 10:00:39', '2020-07-12 08:30:22'),
(9, 3, 'Cow Boy Hat', 'A cowboy hat with Rapley\'s name written on it.', '12.43', '2020.08.12.10.00.48-THIUroJ-cow-boy-hat.jpg', 'cow-boy-hat', 1, 1, '2020-08-12 10:00:48', '2020-07-12 08:40:30'),
(10, 4, 'White Shirt', 'A white shirt with Rapley\'s name written on it.', '5.00', '2020.08.12.10.21.31-tzcgczW-2020.08.12.10.13.35-o1oWLhf-white-shirt.jpg', 'white-shirt', 1, 1, '2020-08-12 10:21:32', '2020-07-12 08:46:13'),
(11, 4, 'Black Shirt', 'A black shirt with Rapley\'s name written on it.', '7.00', '2020.08.12.10.21.42-sqQkQfe-black-shirt.jpg', 'black-shirt', 1, 1, '2020-08-12 10:21:42', '2020-07-12 08:51:10'),
(13, 4, 'Pink Shirt', 'A pink shirt with Rapley\'s name written on it.', '9.00', '2020.08.12.10.21.52-PnBQjND-pink-shirt.jpg', 'pink-shirt', 1, 1, '2020-08-12 10:21:52', '2020-07-12 08:55:25'),
(21, 5, 'Demo1', '<p>ffsdgfg</p>', '3.00', 'no-image.jpg', 'demo1', 0, 1, '2020-09-03 11:23:09', '2020-08-12 10:56:24'),
(28, 3, 'Normal Sets', '<p>A regular hat with the name of the Replay was embedded on it.<br></p>', '10.00', '2020.09.03.11.01.23-HZcJyVI-normal-sets.jpg', 'normal-sets', 1, 1, '2020-09-03 11:20:54', '2020-09-03 11:01:24'),
(29, 2, 'Anyway', '<p>You do not always have to get excited about everything you are told, you will always know how to restrain it.<br></p>', '2.00', '2020.09.03.11.11.10-kPDT3vQ-michael-maasen-bu-6kNWQj6U-unsplash.jpg', 'anyway', 1, 1, '2020-09-03 11:21:08', '2020-09-03 11:11:15'),
(30, 4, 'New White Shirt', '<p>A white shirt with Rapley\'s name written on it.</p>', '20.00', '2020.09.03.11.16.01-3iMFPu8-white-shirt.jpg', 'new-white-shirt', 1, 1, '2020-09-03 11:21:23', '2020-09-03 11:15:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_enter` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT IGNORE `users` (`id`, `name`, `email`, `password`, `is_enter`, `updated_at`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$gokzaXxErHXtCYTzL6P0NeVrwln2rTrE8cOEOz7vQbi2wzHmtov8G', 1, '2020-08-22 18:46:30', '2020-07-14 10:05:43'),
(4, 'Avi', 'avi@gmail.com', '$2y$10$WTdNyQlUl6T8RD7vQkfxxu92OXzZ.1yargDbnVxE0CTt3hbI/b9rq', 1, '2020-09-05 13:00:44', '2020-07-14 16:05:43'),
(7, 'Vered Biton', 'vered@gmail.com', '$2y$10$gokzaXxErHXtCYTzL6P0NeVrwln2rTrE8cOEOz7vQbi2wzHmtov8G', 1, '2020-07-14 16:46:00', '2020-07-14 16:46:00'),
(19, 'joy', 'joy@gmail.com', '$2y$10$l92fgp7mE6wYP.PIsDUb8eOfvxr/MHib7sCvVQbRT8XrUuS/x6yoq', 1, '2020-08-17 12:52:06', '2020-08-17 12:52:06'),
(20, 'viewing', 'view@gmail.com', '$2y$10$keKINkUApGBFxz4aX9rPn.1FZRI1G.Iarul4vr50r0i6ChwS6hEc.', 1, '2020-08-18 15:08:54', '2020-08-18 15:08:54'),
(26, 'blocked', 'blocked@gmail.com', '$2y$10$v0C8cL67l4TrHV6kQ46yDOzYVfJqoPv0qkhS0f22BtOa.xnECJulu', 0, '2020-08-21 21:19:37', '2020-08-21 21:00:33'),
(27, 'Shlomi Lahav', 'shlomil@gmail.com', '$2y$10$MY2vzgwVW6UqIrxfCGrwbOMHq6QApxWkRc0mPLS7cE3vdPEndMtce', 1, '2020-08-21 21:17:30', '2020-08-21 21:04:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE IF NOT EXISTS `user_roles` (
  `uid` int(11) NOT NULL,
  `rid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_roles`
--

INSERT IGNORE `user_roles` (`uid`, `rid`) VALUES
(4, 5),
(7, 5),
(1, 7),
(19, 5),
(20, 6),
(26, 5),
(27, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `purl` (`purl`),
  ADD KEY `categorie_id` (`categorie_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
