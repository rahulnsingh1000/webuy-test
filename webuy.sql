-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 18, 2021 at 04:02 AM
-- Server version: 5.7.31
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webuy`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Games', 1, '2021-03-17 15:05:06', '2021-03-17 15:05:06'),
(2, 'Movies', 1, '2021-03-17 15:05:15', '2021-03-17 15:05:15'),
(3, 'Electronics', 1, '2021-03-17 15:05:25', '2021-03-17 15:05:25');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(41, '2014_10_12_000000_create_users_table', 1),
(42, '2014_10_12_100000_create_password_resets_table', 1),
(43, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(44, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(45, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(46, '2016_06_01_000004_create_oauth_clients_table', 1),
(47, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(48, '2019_08_19_000000_create_failed_jobs_table', 1),
(49, '2021_03_16_163718_create_products_table', 1),
(50, '2021_03_16_172701_create_categories_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `address` text NOT NULL,
  `current_status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_id`, `product_id`, `quantity`, `price`, `total`, `address`, `current_status`, `created_at`, `updated_at`) VALUES
(1, '1615997029', 2, 3, 1, '500', '500', 'dgfhdsg', 1, '2021-03-17 16:03:49', '2021-03-17 16:03:49'),
(2, '1615997029', 2, 4, 2, '400', '1300', 'dgfhdsg', 1, '2021-03-17 16:03:49', '2021-03-17 16:03:49'),
(3, '1615997993', 2, 3, 1, '500', '500', 'dgfhdsg', 1, '2021-03-17 16:19:53', '2021-03-17 16:19:53'),
(4, '1615997993', 2, 4, 2, '400', '1300', 'dgfhdsg', 1, '2021-03-17 16:19:53', '2021-03-17 16:19:53'),
(5, '1615999827', 2, 3, 1, '500', '500', 'dgfhdsg', 1, '2021-03-17 16:50:27', '2021-03-17 16:50:27'),
(6, '1615999827', 2, 4, 2, '400', '1300', 'dgfhdsg', 1, '2021-03-17 16:50:27', '2021-03-17 16:50:27'),
(7, '1616000012', 2, 3, 1, '500', '500', '801 jai antariksh wqeqweqweqw 4000721 1 ', 1, '2021-03-17 16:53:32', '2021-03-17 16:53:32'),
(8, '1616000012', 2, 4, 2, '400', '1300', '801 jai antariksh wqeqweqweqw 4000721 1 ', 1, '2021-03-17 16:53:32', '2021-03-17 16:53:32'),
(9, '1616000297', 2, 3, 1, '500', '500', '801 jai antariksh wqeqweqweqw 4000721 1 ', 1, '2021-03-17 16:58:17', '2021-03-17 16:58:17'),
(10, '1616000297', 2, 4, 2, '400', '1300', '801 jai antariksh wqeqweqweqw 4000721 1 ', 1, '2021-03-17 16:58:17', '2021-03-17 16:58:17'),
(11, '1616000330', 2, 3, 1, '500', '500', '801 jai antariksh wqeqweqweqw 4000721 1 ', 1, '2021-03-17 16:58:50', '2021-03-17 16:58:50'),
(12, '1616000330', 2, 4, 2, '400', '1300', '801 jai antariksh wqeqweqweqw 4000721 1 ', 1, '2021-03-17 16:58:50', '2021-03-17 16:58:50'),
(13, '1616000336', 2, 3, 1, '500', '500', '801 jai antariksh wqeqweqweqw 4000721 1 ', 1, '2021-03-17 16:58:56', '2021-03-17 16:58:56'),
(14, '1616000336', 2, 4, 2, '400', '1300', '801 jai antariksh wqeqweqweqw 4000721 1 ', 1, '2021-03-17 16:58:56', '2021-03-17 16:58:56'),
(15, '1616000457', 2, 3, 1, '500', '500', '801 jai antariksh wqeqweqweqw 4000721 1 ', 1, '2021-03-17 17:00:57', '2021-03-17 17:00:57'),
(16, '1616000457', 2, 4, 2, '400', '1300', '801 jai antariksh wqeqweqweqw 4000721 1 ', 1, '2021-03-17 17:00:57', '2021-03-17 17:00:57'),
(17, '1616000526', 2, 3, 1, '500', '500', '801 jai antariksh wqeqweqweqw 4000721 1 ', 1, '2021-03-17 17:02:06', '2021-03-17 17:02:06'),
(18, '1616000526', 2, 4, 2, '400', '1300', '801 jai antariksh wqeqweqweqw 4000721 1 ', 1, '2021-03-17 17:02:06', '2021-03-17 17:02:06'),
(19, '1616000645', 2, 3, 1, '500', '500', '801 jai antariksh wqeqweqweqw 4000721 1 ', 1, '2021-03-17 17:04:05', '2021-03-17 17:04:05'),
(20, '1616000645', 2, 4, 2, '400', '1300', '801 jai antariksh wqeqweqweqw 4000721 1 ', 1, '2021-03-17 17:04:05', '2021-03-17 17:04:05'),
(21, '1616000678', 2, 3, 1, '500', '500', '801 jai antariksh wqeqweqweqw 4000721 1 ', 1, '2021-03-17 17:04:38', '2021-03-17 17:04:38'),
(22, '1616000678', 2, 6, 1, '1000', '1500', '801 jai antariksh wqeqweqweqw 4000721 1 ', 1, '2021-03-17 17:04:38', '2021-03-17 17:04:38'),
(23, '1616000678', 2, 1, 1, '1000', '2500', '801 jai antariksh wqeqweqweqw 4000721 1 ', 1, '2021-03-17 17:04:38', '2021-03-17 17:04:38'),
(24, '1616002472', 2, 6, 1, '1000', '1000', 'wqeqw  4000721 1 ', 1, '2021-03-17 17:34:32', '2021-03-17 17:34:32'),
(25, '1616002472', 2, 5, 1, '120', '1120', 'wqeqw  4000721 1 ', 1, '2021-03-17 17:34:32', '2021-03-17 17:34:32');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `category_id`, `description`, `image`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum is simply dummy text of the printing a', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', '1615993723.jpg', '1000.00', '2021-03-17 15:08:43', '2021-03-17 15:12:07'),
(2, 'Contrary to popular belief, Lorem Ipsum is not sim', 1, 'Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum', '1615993981.jpg', '2000.00', '2021-03-17 15:13:01', '2021-03-17 15:13:01'),
(3, 'There are many variations of passages', 2, 'of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of', '1615994113.jpg', '500.00', '2021-03-17 15:15:13', '2021-03-17 15:15:13'),
(4, 'The standard chunk of Lorem Ipsum', 2, 'used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham', '1615994179.jpg', '400.00', '2021-03-17 15:16:19', '2021-03-17 15:16:19'),
(5, 'ection 1.10.32 of \"de Finibus Bonorum et Malorum\",', 2, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis', '1615994255.jpg', '120.00', '2021-03-17 15:17:35', '2021-03-17 15:17:35'),
(6, '1914 translation by H. Rackham', 3, 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings', '1615994303.jpg', '1000.00', '2021-03-17 15:18:23', '2021-03-17 15:18:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `mobile`) VALUES
(1, 'Rahul Singh', 'bcarahul37@gmail.com', NULL, '$2y$10$UYLSDuQjfn7ojaLIup7kcudz7C7wWx8QrUtHjSnqtCcuvgvx151ei', 'admin', 'I1k1yJ4RKWxVH1X7t2D7aGaXOgD94NaO8JiVzPgbN7ijCssXljzAXJorkoss', '2021-03-16 13:01:57', '2021-03-16 13:01:57', NULL),
(2, 'customer', 'customer@gmail.com', NULL, '$2y$10$t0TaYTp0jnTTO5ZlkKkGDurcZpDtrZWW8d1SfCMuA0Pe9m0RFZwr2', 'customer', 'B7wdiqR6o5lOnt4GGuam8weVEkxNTvQTErhBAOQyTEBKnSGVeSGFvSipIsaO', '2021-03-16 22:33:16', '2021-03-16 22:33:16', '9554777894'),
(3, 'Customer2', 'customer2@gmail.com', NULL, '$2y$10$kHHPh.O/Kw400t32IhF0NOOE4sgw7duluxELuYMXITQMLG/eNF8yG', 'customer', NULL, '2021-03-17 17:40:19', '2021-03-17 17:40:19', '9096543234');

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

DROP TABLE IF EXISTS `user_addresses`;
CREATE TABLE IF NOT EXISTS `user_addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `address_line3` varchar(255) DEFAULT NULL,
  `pincode` int(6) NOT NULL,
  `city` int(6) NOT NULL,
  `state` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `user_id`, `address_line1`, `address_line2`, `address_line3`, `pincode`, `city`, `state`, `country`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 'wqeqw', NULL, NULL, 400072, 1, 1, 1, 1, '2021-03-17 17:34:32', '2021-03-17 17:34:32');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
