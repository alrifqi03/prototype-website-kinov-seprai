-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `cart` (`id`, `id_user`, `id_product`, `qty`, `subtotal`) VALUES
(3,	2,	1,	1,	3500000),
(10,	3,	1,	4,	14000000),
(11,	3,	2,	1,	12500000);

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `category` (`id`, `slug`, `title`) VALUES
(1,	'samsung',	'Samsung'),
(2,	'iphone',	'Iphone'),
(3,	'xiaomi',	'Xiaomi'),
(4,	'motorola',	'Motorola');

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `status` enum('waiting','paid','delivered','cancel') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `orders` (`id`, `id_user`, `date`, `invoice`, `total`, `name`, `address`, `phone`, `status`) VALUES
(1,	2,	'2021-06-14',	'220210614103919',	3500000,	'Angin',	'Jalan Terate',	'087832952312',	'delivered'),
(2,	2,	'2021-06-14',	'220210614132047',	12500000,	'Albert',	'Jalan Terate',	'098842318423',	'delivered'),
(3,	3,	'2021-07-13',	'320210713193801',	12500000,	'Albert',	'Jalan Terate',	'087321481223',	'paid'),
(4,	4,	'2021-07-19',	'420210719101159',	3500000,	'Kiki',	'Jalan. Surga No. 10',	'837231212',	'delivered');

DROP TABLE IF EXISTS `orders_confirm`;
CREATE TABLE `orders_confirm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_orders` int(11) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `orders_confirm` (`id`, `id_orders`, `account_name`, `account_number`, `nominal`, `note`, `image`) VALUES
(1,	1,	'Albert Georgius',	'293249223',	3500000,	'Tolong Kirim Secepatnya',	'220210614103919-20210614103958.jpeg'),
(2,	2,	'Albert Georgius',	'2398927792',	12500000,	'Sudah Bayar',	'220210614132047-20210614132128.jpg'),
(3,	3,	'Albert Georgius',	'231332242',	12500000,	'saya sudah bayar',	'320210713193801-20210713193841.png'),
(4,	4,	'Kiki',	'23928133',	3500000,	'Saya Sudah Bayar, Mohon di kirim Yah !',	'420210719101159-20210719101307.png');

DROP TABLE IF EXISTS `orders_detail`;
CREATE TABLE `orders_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_orders` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(4) NOT NULL,
  `subtotal` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `orders_detail` (`id`, `id_orders`, `id_product`, `qty`, `subtotal`) VALUES
(1,	1,	1,	1,	3500000),
(2,	2,	2,	1,	12500000),
(3,	3,	2,	1,	12500000),
(4,	4,	1,	1,	3500000);

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `tokopedia` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `shopee` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `product` (`id`, `id_category`, `slug`, `title`, `description`, `price`, `is_available`, `tokopedia`, `shopee`, `image`) VALUES
(1,	3,	'xiaomi-poco-x3-pro',	'Xiaomi POCO X3 PRO',	'Nama: Xiaomi Poco X3 Pro.\r\nRilis: 20 April 2021.\r\nBerat: 215 gram.\r\nMaterial: Kaca depan Corning Gorilla Glass 6, material plastik di bagian belakang.\r\nJenis dan Ukuran Layar: IPS LCD, 120Hz, HDR10, 450 nits.\r\nResolusi Layar: 1080 x 2400 pixels, 20:9 rati',	3500000,	1,	'https://www.tokopedia.com/',	'https://www.shopee.com/',	'xiaomi-poco-x3-pro-20210614103632.jpg'),
(2,	2,	'iphone-12-pro-max',	'Iphone 12 Pro Max',	'Ukuran layar: 6.7 inci OLED, 2778 x 1284 piksel, 458 ppi.\r\nChipset: Apple A14 Bionic.\r\nOS: iOS 14.1, upgradable to iOS 14.6.\r\nRAM: 6 GB.\r\nMemori internal: 128 GB, 256 GB, 512 GB.\r\nUkuran HP: 160.8 x 78.1 x 7.4 mm.\r\nBerat HP: 228 gram.\r\nKamera depan: 12MP.',	12500000,	1,	'https://www.tokopedia.com/',	'https://www.shopee.com/',	'iphone-12-pro-max-20210614103721.jpg'),
(3,	1,	'samsung-s10',	'Samsung S10',	'Chipset: Exynos 9820 (8 nm) - EMEA/LATAM.\r\nRAM: 8GB.\r\nMemori internal: 128GB.\r\nUkuran HP: 149.9 x 70.4 x 7.8 mm.\r\nBerat HP: 157 gram.\r\nUkuran layar: 6,1 inci.\r\nKamera depan: 10MP.\r\nKamera belakang: 12MP+12MP+16MP.',	11500000,	1,	'https://www.tokopedia.com/',	'https://www.shopee.com/',	'samsung-s10-20210614103801.jpg');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','member') NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`, `is_active`, `image`) VALUES
(1,	'Admin',	'admin@mail.com',	'$2y$10$MgoeVKkiyRaOu0ASMBGaf.7mOlLjfb96iLGvzyafh6/JkE6IWCYiK',	'admin',	1,	NULL),
(2,	'angin',	'angin@gmail.com',	'$2y$10$CN4fvol4MtQAI/8k8mJNj.amjOgTyoQUjoLBpOD2i.Q4USKFOYsdq',	'member',	1,	NULL),
(3,	'admin',	'admin@admin.com',	'$2y$10$UgACgYMVzM2IPnXK7p61k.EMP/6oTSWMDTTMs/AOXhw1EcrYetOxO',	'admin',	1,	NULL),
(4,	'kiki',	'kiki@gmail.com',	'$2y$10$rOGOPwOswPQ8blqNvaoRAuN6pSLxShsGFgEOAQ3Hi67tZNCJERry.',	'member',	1,	NULL);

-- 2021-07-20 06:50:02
