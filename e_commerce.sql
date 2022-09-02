-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2022 at 12:55 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `Id` bigint(20) UNSIGNED NOT NULL,
  `street` varchar(255) NOT NULL,
  `building` int(3) NOT NULL,
  `floor` int(2) NOT NULL,
  `flat` int(3) NOT NULL,
  `notes` varchar(512) NOT NULL,
  `regoin_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`Id`, `street`, `building`, `floor`, `flat`, `notes`, `regoin_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'المريوطيه ', 10, 5, 25, '', 1, 22, '2022-08-30 10:18:52', NULL),
(2, 'شارع 9', 6, 2, 4, '', 2, 23, '2022-08-30 10:19:26', NULL),
(5, 'faiesl', 11, 15, 120, '', 1, 25, '2022-08-30 10:25:57', NULL),
(6, 'mashel', 6, 5, 25, '', 1, 26, '2022-08-30 10:27:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Id` bigint(20) UNSIGNED NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `gender` text NOT NULL,
  `verification_code` int(6) NOT NULL,
  `expired_at` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=verified\r\n0=not verified',
  `email_verified_at` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(512) NOT NULL,
  `name_en` varchar(512) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1= active\r\n0=not active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name_ar`, `name_en`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ابل', 'apple', 'assets/img/brand-logo/apple.PNG', 1, '2022-08-24 10:28:19', NULL),
(2, 'سامسونج', 'samsung', 'assets/img/brand-logo/samsung.JPG', 1, '2022-08-24 10:29:21', NULL),
(3, 'اوبو', 'oppo', 'assets/img/brand-logo/oppo.PNG', 1, '2022-08-24 10:30:22', NULL),
(4, 'زارا', 'zara', 'assets/img/brand-logo/zara.PNG', 1, '2022-08-27 17:22:40', NULL),
(5, 'اديدس', 'adidas', 'assets/img/brand-logo/adidas.PNG', 1, '2022-08-27 17:24:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `catogries`
--

CREATE TABLE `catogries` (
  `Id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(512) NOT NULL,
  `name_en` varchar(512) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = active\r\n0 = not active',
  `created at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catogries`
--

INSERT INTO `catogries` (`Id`, `name_ar`, `name_en`, `image`, `status`, `created at`, `updated at`) VALUES
(1, 'الكترونيات', 'electronics', 'electronic', 1, '2022-08-24 10:31:58', NULL),
(2, 'سوبر ماركت', 'supermarket', 'supermarket.jpg', 1, '2022-08-27 17:13:43', NULL),
(3, 'ملابس', 'clothes', 'clothes', 1, '2022-08-27 17:14:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1= avalibale\r\n0= out of range',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name_en`, `name_ar`, `status`, `created_at`, `updated_at`) VALUES
(1, 'cairo', 'القاهره', 1, '2022-08-30 10:16:13', NULL),
(2, 'giza', 'جيزه', 1, '2022-08-30 10:16:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` bigint(20) NOT NULL,
  `discount` int(6) NOT NULL,
  `discount_type` varchar(255) NOT NULL,
  `max_discount_value` int(6) NOT NULL,
  `max_usage` int(6) NOT NULL,
  `max_usage_per_user` int(2) NOT NULL,
  `mini_order` int(4) NOT NULL,
  `start_at` datetime NOT NULL,
  `end_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `discount`, `discount_type`, `max_discount_value`, `max_usage`, `max_usage_per_user`, `mini_order`, `start_at`, `end_at`, `created_at`, `updated_at`) VALUES
(1, 100, 20, '20% discount', 200, 10, 1, 4, '2022-08-30 12:20:45', '2022-08-30 12:20:45', '2022-08-30 10:21:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `most_order`
-- (See below for the actual view)
--
CREATE TABLE `most_order` (
`id` bigint(20) unsigned
,`name_ar` varchar(512)
,`name_en` varchar(512)
,`image` varchar(255)
,`quantity` int(3)
,`price` int(6)
,`status` tinyint(1)
,`details_en` varchar(512)
,`details_ar` varchar(512)
,`sub_catogrie_id` bigint(20) unsigned
,`brand_id` bigint(20) unsigned
,`created_at` timestamp
,`updated_at` timestamp
,`product_id` bigint(20) unsigned
,`quantity_sum` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `Id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `discount` int(6) NOT NULL,
  `discount_type` varchar(255) NOT NULL,
  `start_at` datetime NOT NULL,
  `end_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offers_products`
--

CREATE TABLE `offers_products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `offer_id` bigint(20) UNSIGNED NOT NULL,
  `price_after_discount` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_price` int(8) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=pending\r\n0=delevierd',
  `delevierd_at` datetime NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `total_price`, `status`, `delevierd_at`, `address_id`, `coupon_id`, `created_at`, `updated_at`) VALUES
(3, 2000, 1, '2022-08-30 12:21:40', 1, 1, '2022-08-30 10:21:56', NULL),
(4, 1000, 1, '2022-08-30 12:21:58', 2, 1, '2022-08-30 10:22:14', NULL),
(5, 1001, 1, '2022-08-30 12:27:43', 2, 1, '2022-08-30 10:28:14', NULL),
(6, 1000, 1, '2022-08-30 12:28:16', 6, 1, '2022-08-30 10:28:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(3) NOT NULL,
  `price` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`product_id`, `order_id`, `quantity`, `price`) VALUES
(1, 4, 15, 100000),
(2, 3, 12, 22),
(2, 5, 10, 4800),
(3, 6, 20, 3000),
(5, 3, 2, 300),
(5, 5, 2, 5000),
(6, 4, 15, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(512) NOT NULL,
  `name_en` varchar(512) NOT NULL,
  `code` int(11) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `quantity` int(3) NOT NULL,
  `price` int(6) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1= active\r\n0= not active',
  `details_en` varchar(512) NOT NULL,
  `details_ar` varchar(512) NOT NULL,
  `sub_catogrie_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_ar`, `name_en`, `code`, `image`, `quantity`, `price`, `status`, `details_en`, `details_ar`, `sub_catogrie_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(1, 'ايفون 13', 'iphone 13', 2555, 'assets/img/product/iphone13.JPG', 10, 22000, 1, 'ram 256\r\ncolor:blue ', 'ram 256\r\n', 4, 1, '2022-08-24 10:36:13', '2022-09-01 01:23:03'),
(2, 'ابفون 10', 'iphone 10', 2666, 'assets/img/product/iphone10.JPEG', 0, 10000, 1, 'dadasdsdasdasd', 'مبمكبتمشكستكمشستبكمشست', 4, 1, '2022-08-24 12:29:29', NULL),
(3, 'نيشيرت', 't_shirt black', 2145, 'assets/img/product/t_shirt_black.JPEG', 1, 300, 1, 'color : black\r\nsize : large', 'اللون : اسود\r\nمقاس :كبير ', 8, 5, '2022-08-27 17:26:57', NULL),
(5, 'اوبو اف 7', 'oppo f7', 9888, 'assets/img/product/oppof7.JPG', 5, 5000, 1, 'ram 4G\r\nmemory 64G\r\ncolor :red', 'مساحه تخزين 64 جيجا \r\nلون :احمر', 4, 3, '2022-08-28 23:33:30', NULL),
(6, 'تشيرت زار اسود', 'black T_Shirt from zara', 46658, 'assets/img/product/zara_t_shirt.JPG', 10, 350, 1, 'color black \r\nsiza : large\r\nbrand :zara', 'لون : اسود\r\nمقاس : حجم كبير\r\nالماركه : زارا', 8, 4, '2022-08-28 23:40:31', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `products_details`
-- (See below for the actual view)
--
CREATE TABLE `products_details` (
`id` bigint(20) unsigned
,`name_ar` varchar(512)
,`name_en` varchar(512)
,`image` varchar(255)
,`quantity` int(3)
,`price` int(6)
,`status` tinyint(1)
,`details_en` varchar(512)
,`details_ar` varchar(512)
,`sub_catogrie_id` bigint(20) unsigned
,`brand_id` bigint(20) unsigned
,`created_at` timestamp
,`updated_at` timestamp
,`brand_name_en` varchar(512)
,`sub_catogrery_name_en` varchar(512)
,`catogery_name_en` varchar(512)
,`catogery_id` bigint(20) unsigned
,`reviews_created_at` timestamp
,`reviews_count` bigint(21)
,`reviews_averge` decimal(11,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `products_specs`
--

CREATE TABLE `products_specs` (
  `spec_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `regoins`
--

CREATE TABLE `regoins` (
  `Id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1= avalibale\r\n0=out of range',
  `citiy_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regoins`
--

INSERT INTO `regoins` (`Id`, `name_ar`, `name_en`, `status`, `citiy_id`, `created_at`, `updated_at`) VALUES
(1, 'الهرم', 'haram', 1, 2, '2022-08-30 10:17:58', NULL),
(2, 'المعادي', 'maddi', 1, 1, '2022-08-30 10:18:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rate` int(1) NOT NULL DEFAULT 0,
  `comment` varchar(512) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`user_id`, `product_id`, `rate`, `comment`, `created_at`) VALUES
(22, 3, 3, 'bad', '2022-08-28 15:28:17'),
(23, 1, 5, 'good', '2022-08-28 15:45:43'),
(23, 3, 5, 'good', '2022-08-28 15:46:01'),
(22, 3, 3, 'bad', '2022-08-28 19:08:05'),
(22, 2, 5, '', '2022-09-02 21:33:50'),
(22, 1, 3, 'we74', '2022-09-02 21:57:22'),
(22, 6, 4, 'very good', '2022-09-02 22:20:41'),
(22, 6, 4, 'very good', '2022-09-02 22:20:47');

-- --------------------------------------------------------

--
-- Stand-in structure for view `reviews_details`
-- (See below for the actual view)
--
CREATE TABLE `reviews_details` (
`user_id` bigint(20) unsigned
,`product_id` bigint(20) unsigned
,`rate` int(1)
,`comment` varchar(512)
,`created_at` timestamp
,`first_name` text
,`last_name` text
);

-- --------------------------------------------------------

--
-- Table structure for table `specs`
--

CREATE TABLE `specs` (
  `Id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sub_catogries`
--

CREATE TABLE `sub_catogries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(512) NOT NULL,
  `name_en` varchar(512) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=active\r\n0= not active',
  `catogery_id` bigint(20) UNSIGNED NOT NULL,
  `created at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_catogries`
--

INSERT INTO `sub_catogries` (`id`, `name_ar`, `name_en`, `photo`, `status`, `catogery_id`, `created at`, `updated at`) VALUES
(4, 'موبايل', 'mobiles', 'mobiles', 1, 1, '2022-08-24 10:33:45', NULL),
(6, 'تابلت', 'tablets', 'tablets.jpg', 1, 1, '2022-08-27 17:16:07', NULL),
(7, 'تلفزيونات', 'tv', 'tv.jpg', 1, 1, '2022-08-27 17:17:57', NULL),
(8, 'تشيرتات', 't-shirts', 'shirts.jpg', 1, 3, '2022-08-27 17:19:51', NULL),
(9, 'احذيه', 'shoes', 'shoes.jpg', 1, 3, '2022-08-27 17:21:18', NULL),
(10, 'جبنه', 'cheese', 'cheese', 1, 2, '2022-08-27 21:03:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `gender` text NOT NULL,
  `phone` varchar(11) NOT NULL,
  `verification_code` int(4) NOT NULL,
  `expired_at` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0= not active\r\n1=active',
  `verified_at` datetime NOT NULL,
  `user_password` varchar(512) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `email`, `first_name`, `last_name`, `gender`, `phone`, `verification_code`, `expired_at`, `status`, `verified_at`, `user_password`, `photo`, `created_at`, `updated_at`) VALUES
(22, 'ahmedezzat0022@gmail.com', 'ahmed', 'ezzat', 'Male', '1121475666', 43226, '0000-00-00 00:00:00', 0, '2022-08-27 18:53:46', 'Ahmedezzat2312?', NULL, '2022-08-27 16:52:49', '2022-08-27 16:53:46'),
(23, 'bassanttarek2312@gmail.com', 'bassant', 'tarek', 'Male', '1121475655', 56425, '0000-00-00 00:00:00', 0, '2022-08-28 17:38:23', 'Ahmedezzat2312?', NULL, '2022-08-28 15:37:54', '2022-08-28 15:38:23'),
(24, 'ahmedezzat@gmail.com', 'ahmed', 'ezzat', 'Male', '1121452266', 77478, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '$2y$10$qmYjx.Se/2arYKfMK8xGreMCtkmPYuRnT9qY.ZnctnSd.c5q.4dVi', NULL, '2022-08-30 00:59:44', NULL),
(25, 'ahmedhassan@yahoo.com', 'ahmed', 'hasan', 'male', '01121475566', 444458, '2022-08-30 12:24:15', 0, '2022-08-30 12:24:15', 'AAdasddasdsadasdasdasdsa', NULL, '2022-08-30 10:25:24', NULL),
(26, 'mariem@gmail.com', 'mariam', 'ahmed', 'female', '01121575666', 77777, '2022-08-30 12:26:18', 0, '2022-08-30 12:26:18', 'dsadsafxcvxcvcbcb', NULL, '2022-08-30 10:27:01', NULL);

-- --------------------------------------------------------

--
-- Structure for view `most_order`
--
DROP TABLE IF EXISTS `most_order`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `most_order`  AS SELECT `products`.`id` AS `id`, `products`.`name_ar` AS `name_ar`, `products`.`name_en` AS `name_en`, `products`.`image` AS `image`, `products`.`quantity` AS `quantity`, `products`.`price` AS `price`, `products`.`status` AS `status`, `products`.`details_en` AS `details_en`, `products`.`details_ar` AS `details_ar`, `products`.`sub_catogrie_id` AS `sub_catogrie_id`, `products`.`brand_id` AS `brand_id`, `products`.`created_at` AS `created_at`, `products`.`updated_at` AS `updated_at`, `orders_products`.`product_id` AS `product_id`, sum(`orders_products`.`quantity`) AS `quantity_sum` FROM (`products` left join `orders_products` on(`products`.`id` = `orders_products`.`product_id`)) GROUP BY `orders_products`.`product_id` ORDER BY sum(`orders_products`.`quantity`) AS `DESCdesc` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `products_details`
--
DROP TABLE IF EXISTS `products_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `products_details`  AS SELECT `products`.`id` AS `id`, `products`.`name_ar` AS `name_ar`, `products`.`name_en` AS `name_en`, `products`.`image` AS `image`, `products`.`quantity` AS `quantity`, `products`.`price` AS `price`, `products`.`status` AS `status`, `products`.`details_en` AS `details_en`, `products`.`details_ar` AS `details_ar`, `products`.`sub_catogrie_id` AS `sub_catogrie_id`, `products`.`brand_id` AS `brand_id`, `products`.`created_at` AS `created_at`, `products`.`updated_at` AS `updated_at`, `brands`.`name_en` AS `brand_name_en`, `sub_catogries`.`name_en` AS `sub_catogrery_name_en`, `catogries`.`name_en` AS `catogery_name_en`, `catogries`.`Id` AS `catogery_id`, `reviews`.`created_at` AS `reviews_created_at`, count(`reviews`.`product_id`) AS `reviews_count`, if(round(avg(`reviews`.`rate`),0) is null,0,round(avg(`reviews`.`rate`),0)) AS `reviews_averge` FROM ((((`products` left join `brands` on(`brands`.`id` = `products`.`brand_id`)) join `sub_catogries` on(`sub_catogries`.`id` = `products`.`sub_catogrie_id`)) left join `catogries` on(`catogries`.`Id` = `sub_catogries`.`catogery_id`)) left join `reviews` on(`products`.`id` = `reviews`.`product_id`)) GROUP BY `products`.`id``id`  ;

-- --------------------------------------------------------

--
-- Structure for view `reviews_details`
--
DROP TABLE IF EXISTS `reviews_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reviews_details`  AS SELECT `reviews`.`user_id` AS `user_id`, `reviews`.`product_id` AS `product_id`, `reviews`.`rate` AS `rate`, `reviews`.`comment` AS `comment`, `reviews`.`created_at` AS `created_at`, `users`.`first_name` AS `first_name`, `users`.`last_name` AS `last_name` FROM (`reviews` join `users` on(`users`.`Id` = `reviews`.`user_id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`Id`) USING BTREE,
  ADD KEY `id_regoin` (`regoin_id`),
  ADD KEY `id_user` (`user_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `id_product` (`product_id`);

--
-- Indexes for table `catogries`
--
ALTER TABLE `catogries`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `id_product` (`product_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `offers_products`
--
ALTER TABLE `offers_products`
  ADD PRIMARY KEY (`product_id`,`offer_id`),
  ADD KEY `id_offer` (`offer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_coupon` (`coupon_id`),
  ADD KEY `orders_ibfk_2` (`address_id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`product_id`,`order_id`),
  ADD KEY `id_order` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `id_brand` (`brand_id`),
  ADD KEY `id_sub_catogrie` (`sub_catogrie_id`);

--
-- Indexes for table `products_specs`
--
ALTER TABLE `products_specs`
  ADD PRIMARY KEY (`spec_id`,`product_id`),
  ADD KEY `id_product` (`product_id`);

--
-- Indexes for table `regoins`
--
ALTER TABLE `regoins`
  ADD PRIMARY KEY (`Id`) USING BTREE,
  ADD KEY `id_citiy` (`citiy_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD KEY `id_product` (`product_id`),
  ADD KEY `Id_user` (`user_id`);

--
-- Indexes for table `specs`
--
ALTER TABLE `specs`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sub_catogries`
--
ALTER TABLE `sub_catogries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_catogery` (`catogery_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `Id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `Id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `catogries`
--
ALTER TABLE `catogries`
  MODIFY `Id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `Id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `regoins`
--
ALTER TABLE `regoins`
  MODIFY `Id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `specs`
--
ALTER TABLE `specs`
  MODIFY `Id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_catogries`
--
ALTER TABLE `sub_catogries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`regoin_id`) REFERENCES `regoins` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `addresses_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`Id`) ON UPDATE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`Id`) ON UPDATE CASCADE;

--
-- Constraints for table `favourite`
--
ALTER TABLE `favourite`
  ADD CONSTRAINT `favourite_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `favourite_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`Id`) ON UPDATE CASCADE;

--
-- Constraints for table `offers_products`
--
ALTER TABLE `offers_products`
  ADD CONSTRAINT `offers_products_ibfk_1` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `offers_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`Id`) ON UPDATE CASCADE;

--
-- Constraints for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `orders_products_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`sub_catogrie_id`) REFERENCES `sub_catogries` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `products_specs`
--
ALTER TABLE `products_specs`
  ADD CONSTRAINT `products_specs_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `products_specs_ibfk_2` FOREIGN KEY (`spec_id`) REFERENCES `specs` (`Id`) ON UPDATE CASCADE;

--
-- Constraints for table `regoins`
--
ALTER TABLE `regoins`
  ADD CONSTRAINT `regoins_ibfk_1` FOREIGN KEY (`citiy_id`) REFERENCES `cities` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`Id`) ON UPDATE CASCADE;

--
-- Constraints for table `sub_catogries`
--
ALTER TABLE `sub_catogries`
  ADD CONSTRAINT `sub_catogries_ibfk_1` FOREIGN KEY (`catogery_id`) REFERENCES `catogries` (`Id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
