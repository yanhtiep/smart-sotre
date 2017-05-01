-- phpMyAdmin SQL Dump
-- version 4.4.13.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 01, 2017 at 12:07 AM
-- Server version: 10.0.20-MariaDB
-- PHP Version: 5.6.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertises`
--

CREATE TABLE IF NOT EXISTS `advertises` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ordering` int(11) NOT NULL,
  `num_click` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `advertise_blogs`
--

CREATE TABLE IF NOT EXISTS `advertise_blogs` (
  `id` int(10) unsigned NOT NULL,
  `advertise_id` int(10) unsigned NOT NULL,
  `blog_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE IF NOT EXISTS `attributes` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_default` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_attribute_types`
--

CREATE TABLE IF NOT EXISTS `attribute_attribute_types` (
  `id` int(10) unsigned NOT NULL,
  `is_multi` int(11) NOT NULL,
  `attribute_id` int(10) unsigned NOT NULL,
  `attribute_type_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_attribute_values`
--

CREATE TABLE IF NOT EXISTS `attribute_attribute_values` (
  `id` int(10) unsigned NOT NULL,
  `attribute_id` int(10) unsigned NOT NULL,
  `attribute_value_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_categories`
--

CREATE TABLE IF NOT EXISTS `attribute_categories` (
  `id` int(10) unsigned NOT NULL,
  `attribute_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_types`
--

CREATE TABLE IF NOT EXISTS `attribute_types` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE IF NOT EXISTS `attribute_values` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_default` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `height` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `business_types`
--

CREATE TABLE IF NOT EXISTS `business_types` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `business_types`
--

INSERT INTO `business_types` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'vvvvvvvvvvvvvvvvv', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE IF NOT EXISTS `carts` (
  `id` int(10) unsigned NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  `amount` double NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `stock_id` int(10) unsigned NOT NULL,
  `payment_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `meta_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ordering` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `inherit_attr` int(11) NOT NULL,
  `stock_type_id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `level`, `meta_key`, `ordering`, `status`, `inherit_attr`, `stock_type_id`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(114, 'Man''s Clothing', 'Man''s Clothing', '1491972930.cat4.png', 0, '', 1, 0, 0, 1, 0, '2017-04-11 21:08:39', '2017-04-11 21:55:30', NULL),
(115, 'Women''s Clothing', 'Women''s Clothing', '1491972920.cat4.png', 0, '', 1, 0, 0, 1, 0, '2017-04-11 21:30:31', '2017-04-11 21:55:20', NULL),
(116, 'Computer & Office', 'Computer & Office', 'cat2.png', 0, '', 1, 0, 0, 1, 0, '2017-04-11 21:58:06', '2017-04-11 21:58:06', NULL),
(117, 'Phones & Accessories', 'Phones & Accessories', 'cat1.png', 0, '', 1, 0, 0, 1, 0, '2017-04-11 21:58:29', '2017-04-11 21:58:29', NULL),
(118, 'Jewelry & Watches', 'Jewelry & Watches', 'cat6.png', 0, '', 1, 0, 0, 1, 0, '2017-04-11 21:59:28', '2017-04-11 21:59:28', NULL),
(119, 'Home & Garden, Furniture', 'Home & Garden, Furniture', 'cat8.png', 0, '', 1, 0, 0, 1, 0, '2017-04-11 22:02:26', '2017-04-11 22:02:26', NULL),
(120, 'Sports & Outdoors', 'Sports & Outdoors', 'cat10.png', 0, '', 1, 0, 0, 1, 0, '2017-04-11 23:02:01', '2017-04-11 23:02:01', NULL),
(121, 'Shoes', 'shoes', 'cat5.png', 0, '', 1, 0, 0, 1, 0, '2017-04-11 23:04:58', '2017-04-11 23:04:58', NULL),
(122, 'Women’s', 'Women’s', '', 0, '', 1, 0, 0, 1, 114, '2017-04-11 23:05:55', '2017-04-11 23:05:55', NULL),
(123, 'Man''s ', 'man', '', 0, '', 1, 0, 0, 1, 114, '2017-04-11 23:06:36', '2017-04-11 23:06:36', NULL),
(124, ' Down Coats', 'Down Coats', '', 0, '', 1, 0, 0, 1, 122, '2017-04-11 23:09:59', '2017-04-11 23:12:07', NULL),
(125, ' Parkas', 'Hot Categories\r\n\r\nParkas', '', 0, '', 1, 0, 0, 1, 122, '2017-04-11 23:15:05', '2017-04-11 23:15:05', NULL),
(126, 'Dresses', 'Dresses', '', 0, '', 1, 0, 0, 1, 122, '2017-04-11 23:15:55', '2017-04-11 23:15:55', NULL),
(127, 'Coats & Jackets', 'Coats & Jackets', '', 0, '', 1, 0, 0, 1, 122, '2017-04-11 23:16:50', '2017-04-11 23:16:50', NULL),
(128, 'Blouses & Shirts', 'Blouses & Shirts', '', 0, '', 1, 0, 0, 1, 122, '2017-04-11 23:19:09', '2017-04-11 23:19:09', NULL),
(129, 'Tops & Tees', 'Tops & Tees', '', 0, '', 1, 0, 0, 1, 123, '2017-04-11 23:19:44', '2017-04-11 23:19:44', NULL),
(130, 'Underwear', 'Underwear', '', 0, '', 1, 0, 0, 1, 123, '2017-04-11 23:20:35', '2017-04-11 23:20:35', NULL),
(131, 'Shirts', 'Shirts', '', 0, '', 1, 0, 0, 1, 123, '2017-04-11 23:21:02', '2017-04-11 23:21:02', NULL),
(132, 'Jeans', 'Jeans', '', 0, '', 1, 0, 0, 1, 123, '2017-04-11 23:21:28', '2017-04-11 23:21:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_stocks`
--

CREATE TABLE IF NOT EXISTS `category_stocks` (
  `id` int(10) unsigned NOT NULL,
  `stock_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conditions`
--

CREATE TABLE IF NOT EXISTS `conditions` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `conditions`
--

INSERT INTO `conditions` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'test', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `symbol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ex_rate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `code`, `name`, `symbol`, `ex_rate`, `country`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test', 'aaaaaaaaaaa', 'ssssssssss', 'ccccccccccc', 'phnom penh', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE IF NOT EXISTS `galleries` (
  `id` int(10) unsigned NOT NULL,
  `caption` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `galleryable_id` int(10) unsigned NOT NULL,
  `galleryable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `caption`, `path`, `status`, `created_at`, `updated_at`, `galleryable_id`, `galleryable_type`) VALUES
(119, 'Large-Size-2016-Snow-Winter-Jacket-Women-Fashion-Women-s-90-White-Duck-Down-Jackets-Ultra.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-11 23:36:19', '2017-04-11 23:36:19', 99, ''),
(120, 'Manteau-Femme-Stand-Collar-Slim-Short-White-Duck-Ultra-Light-Down-Jacket-Women-Casual-Padded-Coat.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-11 23:36:19', '2017-04-11 23:36:19', 99, ''),
(121, '2015-Top-Quality-Brand-Ladies-Long-Winter-Autumn-Overcoat-Women-Ultra-Light-90-White-Duck-Down.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-11 23:36:19', '2017-04-11 23:36:19', 99, ''),
(122, '2016-New-Women-Winter-Coat-Ultralight-Slim-90-Duck-Down-Jackets-Plus-Size-Female-Long-Down.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-11 23:36:19', '2017-04-11 23:36:19', 99, ''),
(123, 'New-Autumn-Women-Long-Jackets-Coats-Chic-Collarless-Long-Sleeve-Single-Breasted-Solid-Color-Padded-Coat.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-11 23:36:19', '2017-04-11 23:36:19', 99, ''),
(124, 'MissFoFo-Women-s-font-b-Down-b-font-font-b-Coats-b-font-and-CLJ-Jackets.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-11 23:39:55', '2017-04-11 23:39:55', 100, ''),
(125, 'Elf-SACK-w-oil-painting-lemon-2016-vintage-color-block-decoration-shirt-collar-down-coat-long.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-11 23:39:56', '2017-04-11 23:39:56', 100, ''),
(126, 'NEW-2014-Winter-Women-s-Large-Fur-Collar-White-Duck-Down-Coats-Slim-Thickening-Frozen-Down.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-11 23:39:56', '2017-04-11 23:39:56', 100, ''),
(127, 'ICEbear-2016-New-Women-Winter-Large-Fur-Collar-Hooded-Woman-Slim-Parka-Womens-Jacket-Coats-Thick.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-11 23:44:57', '2017-04-11 23:44:57', 101, ''),
(128, 'New-Womes-s-Coats-Down-Winter-Long-Thick-Black-Solid-Female-Parka-Hooded-Coat-Winter-Coat.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-11 23:44:57', '2017-04-11 23:44:57', 101, ''),
(129, 'MIEGOFCE-Brand-New-2015-High-Quality-Warm-Winter-Jacket-And-Coat-For-Women-And-Young-Girl.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-11 23:47:35', '2017-04-11 23:47:35', 102, ''),
(130, 'New-Coats-Down-Winter-Short-black-Solid-Female-Parka-Hooded-Coat-winter-jacket-women-2016.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-11 23:47:35', '2017-04-11 23:47:35', 102, ''),
(131, 'ICEbear-2016-Slim-Short-Coat-With-Puff-Stand-Collar-Hooded-Wadded-Jacket-Parka-Winter-Coat-Women.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-11 23:47:35', '2017-04-11 23:47:35', 102, ''),
(132, 'ICEbear-2016-New-Brand-Clothing-Women-Spring-Autumn-Silm-Long-Thin-Parka-Jacket-With-Hat-Detachable.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-11 23:49:06', '2017-04-11 23:49:06', 103, ''),
(133, '2017-Women-Warm-Thin-Coats-Women-s-Parka-Jackets-With-Hood-Women-s-Fashion-Jackets-and.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-11 23:49:06', '2017-04-11 23:49:06', 103, ''),
(134, 'ICEbear-2017-Woven-Many-Colors-Women-Coat-font-b-Parkas-b-font-Spring-Autumn-Regular-Warm.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-11 23:49:06', '2017-04-11 23:49:06', 103, ''),
(135, 'BerryGo-Floral-print-halter-chiffon-long-dress-Women-backless-2017-maxi-dresses-vestidos-Sexy-white-split.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-12 02:15:39', '2017-04-12 02:15:39', 104, ''),
(136, '2016-Womens-Summer-Elegant-Beach-Chiffon-Clothing-Ladies-Bohemian-Print-Maxi-Long-Dress-Plus-Size-6XL.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-12 02:15:40', '2017-04-12 02:15:40', 104, ''),
(137, 'Dotfashion-White-Floral-Maxi-font-b-Dress-b-font-Women-Botanical-Print-Button-Up-Ruffle-Summer.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-12 02:15:40', '2017-04-12 02:15:40', 104, ''),
(138, 'Simplee-Boho-style-long-dress-women-Off-shoulder-beach-summer-dress-new-year-Vintage-chifon-white.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-12 02:15:40', '2017-04-12 02:15:40', 104, ''),
(139, 'Summer-Dress-2017-Sexy-Elegant-Party-Bodycon-Club-Off-Shoulder-Dress-Red-Black-Blue-Casual-Vintage.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-12 02:18:22', '2017-04-12 02:18:22', 105, ''),
(140, 'Veri-Gude-Spring-and-Fall-Fashion-Long-Plaid-Shirt-Dress-Long-Sleeve-Women-Cotton-Shirtdress-Free.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-12 02:18:22', '2017-04-12 02:18:22', 105, ''),
(141, 'Simplee-Lace-up-velvet-vintage-women-dress-Backless-short-party-sexy-dress-retro-midi-dress-Pencil.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-12 02:18:23', '2017-04-12 02:18:23', 105, ''),
(142, 'T-O-Women-Summer-Elegant-Vintage-Retro-Deep-V-Back-Sleeveless-Solid-Color-Overall-Ruched-Party.jpg_220x220 (1).jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-12 02:20:54', '2017-04-12 02:20:54', 106, ''),
(143, 'Reaqka-Women-Summer-Dress-2017-New-Fashion-Hollow-Out-Sleeveless-Pencil-Plus-Size-Dress-Knee-Length.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-12 02:20:54', '2017-04-12 02:20:54', 106, ''),
(144, 'BLACK-AND-WHITE-STRIPE-U-WIRE-MIDI-DRESS.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-12 02:20:54', '2017-04-12 02:20:54', 106, ''),
(145, 'BEFORW-Summer-Women-Sexy-Sleeveless-Solid-Color-Slim-Large-Size-Dress-Fashion-Casual-Lace-Plus-Size.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-12 02:20:54', '2017-04-12 02:20:54', 106, ''),
(146, 'Hot-New-2014-Summer-Women-s-Fashion-O-neck-Milk-Silk-Vintage-Print-One-piece-Dress.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-12 02:24:09', '2017-04-12 02:24:09', 107, ''),
(147, 'SheIn-Summer-Short-Dresses-Casual-Womens-New-Arrival-Multicolor-Round-Neck-Floral-Cut-Out-Sleeveless-Shift.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-12 02:24:09', '2017-04-12 02:24:09', 107, ''),
(148, 'Simplee-Apparel-Sexy-off-shoulder-sequin-tassel-summer-dress-2016-beach-party-short-dress-Women-backless.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-12 02:24:09', '2017-04-12 02:24:09', 107, ''),
(149, 'TFGS-2016-New-Design-Design-summer-new-women-shirts-dress-Cat-footprints-pattern-Show-thin-Shirt.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-12 02:24:09', '2017-04-12 02:24:09', 107, ''),
(150, 'Women-Loose-off-the-Shoulder-Plaid-Striped-Blue-Shirts-Top-Casual-Blouses.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-19 20:20:29', '2017-04-19 20:20:29', 108, ''),
(151, 'Dotfashion-Korean-Style-Women-Blue-Embroidered-Striped-Off-The-Shoulder-Knot-Front-Ruffle-Top-With-Patch.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-19 20:20:29', '2017-04-19 20:20:29', 108, ''),
(152, 'Summer-Women-Striped-Blouses-Sexy-Off-Shoulder-Ruffles-Striped-Shirts-Plus-Size-Girls-Fashion-Blusas-Shirts.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-19 20:22:17', '2017-04-19 20:22:17', 109, ''),
(153, 'Boyfriend-Style-Army-Green-Flower-Embroidery-Shirt-2016-Lapel-Long-sleeve-Pockets-Blouse-Tops-Coat-blusas.jpg_220x220.jpg', 'assets/uploads/stocks/alias/', 0, '2017-04-19 20:24:01', '2017-04-19 20:24:01', 110, '');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_10_10_025109_create-profile-table', 1),
('2016_10_10_031905_create-galleries-table', 1),
('2016_10_15_065621_create_socialAccounts_table', 1),
('2016_11_23_010528_create_conditions_table', 1),
('2016_11_23_010624_create_stock_types_table', 1),
('2016_11_23_010724_create_attributes_table', 1),
('2016_11_23_010903_create_attribute_types_table', 1),
('2016_11_23_011030_create_countries_table', 1),
('2016_11_23_011150_create_attribute_values_table', 1),
('2016_11_23_011323_create_business_types_table', 1),
('2016_11_23_011416_create_staff_ranges_table', 1),
('2016_11_23_011503_create_revenue_ranges_table', 1),
('2016_11_23_012053_create_currencies_table', 1),
('2016_11_23_012341_create_stock_uoms_table', 1),
('2016_11_23_012437_create_blogs_table', 1),
('2016_11_23_012623_create_sections_table', 1),
('2016_11_23_013656_create_payments_table', 1),
('2016_11_23_014137_create_stores_table', 1),
('2016_11_23_014333_create_advertises_table', 1),
('2016_11_23_022758_create_categories_table', 1),
('2016_11_23_033141_create_slideshows_table', 1),
('2016_11_23_033240_create_attribute_categories_table', 1),
('2016_11_23_033810_create_attribute_attribute_types_table', 1),
('2016_11_23_034300_create_attribute_attribute_values_table', 1),
('2016_11_23_034503_create_provinces_table', 1),
('2016_11_23_034723_create_shipping_companies_table', 1),
('2016_11_23_035107_create_shipping_province_prices_table', 1),
('2016_11_23_041339_create_stocks_table', 1),
('2016_11_23_042500_create_stock_balances_table', 1),
('2016_11_23_042555_create_stock_moves_table', 1),
('2016_11_23_042719_create_stock_sections_table', 1),
('2016_11_23_042842_create_category_stocks_table', 1),
('2016_11_23_042956_create_carts_table', 1),
('2016_11_23_050106_create_advertise_blogs_table', 1),
('2016_11_23_062939_create_store_users_table', 1),
('2017_02_24_061525_create_tests_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remark` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(10) unsigned NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `google` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `primaryHome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secondaryHome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isComplete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `users_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE IF NOT EXISTS `provinces` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `country_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `revenue_ranges`
--

CREATE TABLE IF NOT EXISTS `revenue_ranges` (
  `id` int(10) unsigned NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `revenue_ranges`
--

INSERT INTO `revenue_ranges` (`id`, `min`, `max`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 10, 20, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `front_page_lavel` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_companies`
--

CREATE TABLE IF NOT EXISTS `shipping_companies` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `office_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `country_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_province_prices`
--

CREATE TABLE IF NOT EXISTS `shipping_province_prices` (
  `id` int(10) unsigned NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `expected_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `handling_time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `to_province_id` int(10) unsigned DEFAULT NULL,
  `from_province_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slideshows`
--

CREATE TABLE IF NOT EXISTS `slideshows` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ordering` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_login`
--

CREATE TABLE IF NOT EXISTS `social_login` (
  `id` int(10) unsigned NOT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `socialID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `users_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff_ranges`
--

CREATE TABLE IF NOT EXISTS `staff_ranges` (
  `id` int(10) unsigned NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staff_ranges`
--

INSERT INTO `staff_ranges` (`id`, `min`, `max`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 10, 20, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE IF NOT EXISTS `stocks` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stock_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quote_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` text COLLATE utf8_unicode_ci NOT NULL,
  `reorder_qty` double NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `review_num` int(11) NOT NULL,
  `rating_num` int(11) NOT NULL,
  `expired_date` date NOT NULL,
  `min_order_allow` double NOT NULL,
  `max_order_allow` double NOT NULL,
  `qty` int(11) NOT NULL,
  `cost` double NOT NULL,
  `discount` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `currency_id` int(10) unsigned NOT NULL,
  `stock_uom_id` int(10) unsigned NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `condition_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `name`, `stock_code`, `quote_code`, `meta_keyword`, `reorder_qty`, `description`, `review_num`, `rating_num`, `expired_date`, `min_order_allow`, `max_order_allow`, `qty`, `cost`, `discount`, `status`, `image`, `category_id`, `currency_id`, `stock_uom_id`, `store_id`, `condition_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(99, ' White Duck Down Coat Stand Collar Warm Slim Zipper Women Fashion Light Down Jacket S-3XL', '123abc', 'abc123', 'gfdfghjhgfds', 5, '2017 Spring 19 Colors New 90% White Duck Down Coat Stand Collar Warm Slim Zipper Women Fashion Light Down Jacket S-3XL', 98765432, 9, '2017-04-12', 2, 5, 2, 19.75, 5, 1, '2016-Winter-New-Eiderdown-Down-Coat-Stand-Collar-Warm-White-duck-Slim-Zipper-Women-Fashion-Down.jpg_220x220.jpg', 124, 1, 1, 1, 1, '2017-04-11 23:36:19', '2017-04-11 23:36:19', NULL),
(100, ' Down Jacket Fashion Coat Women Floral', 'fghhfgh', 'drgdrtthr', 'ygtfsdsdfgh', 4, '2016 Winter Women Long Down Jacket Fashion Coat Women Floral Coats Plus Size ', 987654324, 6, '2017-04-13', 1, 4, 1, 86.25, 0, 1, '2015-Winter-Women-Long-Down-Jacket-Fashion-Coat-Women-Floral-Coats-Plus-Size-White-Duck-Down.jpg_220x220.jpg', 124, 1, 1, 1, 1, '2017-04-11 23:39:55', '2017-04-26 00:38:25', NULL),
(101, 'Plus Size L-5XL Winter Women ', 'khjgfds', 'kjhgfds', 'iuyhgfds', 6, 'Plus Size L-5XL Winter Women ', 98765432, 8, '2017-04-13', 2, 6, 3, 121.6, 30, 1, 'The-old-2016-new-large-size-women-genuine-st-feather-liberal-plus-long-down-jacket-fat.jpg_220x220.jpg', 124, 1, 1, 1, 1, '2017-04-11 23:44:57', '2017-04-11 23:44:57', NULL),
(102, 'Women Coat Jacket Medium Length Woman Parka', 'sdfghjfd', 'hgfdsasdf', 'jhgfdsa', 4, 'Women Coat Jacket Medium Length Woman Parka', 9876543, 9, '2017-04-13', 1, 4, 1, 80.5, 15, 1, 'MIEGOFCE-2016-New-Winter-Collection-Women-Down-Coat-Jacket-Medium-Length-Woman-Down-Parka-with-a.jpg_220x220.jpg', 125, 1, 1, 1, 1, '2017-04-11 23:47:35', '2017-04-11 23:47:35', NULL),
(103, 'Plus size Candy color Slim Cotton coat women Parka 6XL', 'kjhgfds', 'jkhgfds', 'jkhgfdsas', 5, 'Plus size Candy color Slim Cotton coat women Parka 6XL', 987654321, 7, '2017-04-14', 1, 5, 2, 26.33, 5, 1, 'Autumn-winter-jacket-Women-Thick-Hooded-Cotton-Padded-Jacket-Plus-size-Candy-color-Slim-Down-Cotton.jpg_220x220.jpg', 125, 1, 1, 1, 1, '2017-04-11 23:49:05', '2017-04-11 23:49:05', NULL),
(104, 'Simplee Boho style long dress women Off shoulder beach summer dress', 'sdgr5tg45', 'dtrgrthr', 'ert45t45y64y', 4, 'gfththtyhth', 98765432, 9, '2017-04-13', 1, 6, 2, 21.99, 15, 1, 'Simplee-Boho-style-long-dress-women-Off-shoulder-beach-summer-dress-new-year-Vintage-chifon-white.jpg_220x220.jpg', 126, 1, 1, 1, 1, '2017-04-12 02:15:39', '2017-04-12 02:15:39', NULL),
(105, 'ADYCE Summer Runway Dress Women', 'ethgtrh', 'egtryh65hy', 'fdgfyjt', 6, 'ADYCE Summer Runway Dress Women', 98765432, 8, '2017-04-20', 1, 4, 2, 22.15, 5, 1, 'Winter-Runway-Dress-Women-Evening-Bandage-Dress-2017-New-Wine-Red-Plaid-Hollow-out-short-sleeve.jpg_220x220.jpg', 126, 1, 1, 1, 1, '2017-04-12 02:18:22', '2017-04-12 02:18:22', NULL),
(106, 'T''O Women Summer Elegant Vintage Retro Deep ', 'yhthr', 'erryhr65y', 'yujtrgefw', 3, 'T''O Women Summer Elegant Vintage Retro Deep ', 98765432, 9, '2017-04-13', 8, 9, 2, 15.9, 15, 1, 'Simplee-Lace-up-velvet-vintage-women-dress-Backless-short-party-sexy-dress-retro-midi-dress-Pencil.jpg_220x220.jpg', 126, 1, 1, 1, 1, '2017-04-12 02:20:54', '2017-04-12 02:20:54', NULL),
(107, 'AZULINA 2017 Sexy Elegant Summer Princess ', 'gfhfthr', 'thrhr', 'rgtrhr', 3, 'AZULINA 2017 Sexy Elegant Summer Princess ', 98765432, 8, '2017-04-14', 1, 4, 1, 10.72, 30, 1, '2016-Women-Sexy-Cute-Princess-Floral-Lace-Chiffon-Dress-Womens-Spring-Summer-Dress-Noble-Pleated-Black.jpg_220x220.jpg', 126, 1, 1, 1, 1, '2017-04-12 02:24:09', '2017-04-12 02:24:09', NULL),
(108, 'Simplee Casual long sleeve blouse shirt women', '12323sdc', '21dcsdcd', 'fvdfrver', 4, 'Simplee Casual long sleeve blouse shirt women', 98765432, 8, '2017-04-12', 1, 3, 2, 19.99, 5, 1, 'Simplee-Casual-long-sleeve-blouse-shirt-women-tops-Ruffle-white-blouse-chemise-Elastic-cool-blouse-blusas.jpg_220x220.jpg', 128, 1, 1, 1, 1, '2017-04-19 20:20:28', '2017-04-19 20:20:28', NULL),
(109, 'New Sexy V Neck Long Sleeve Shirts ', 'fdve342', '432fefer', 'fdvere', 4, 'New Sexy V Neck Long Sleeve Shirts ', 987654323, 8, '2017-04-18', 2, 4, 2, 14.44, 15, 1, '2017-Ruffles-Striped-Shirts-Summer-Women-Striped-Blouses-Sexy-Off-Shoulder-Plus-Size-Girls-Fashion-Blusas.jpg_220x220.jpg', 128, 1, 1, 1, 1, '2017-04-19 20:22:17', '2017-04-19 20:22:17', NULL),
(110, ' New Summer Casual Women Blouses', 'fvdfv43342', '433fddfv', 'fvdvfr', 4, '2015 New Summer Casual Women Blouses', 2147483647, 9, '2017-04-12', 2, 5, 2, 55.55, 0, 1, 'Women-Autumn-Fashion-Plus-Size-S-5XL-Long-Loose-Cotton-Denim-Blouses-Long-Sleeve-Shirts-Tops.jpg_220x220.jpg', 128, 1, 1, 1, 1, '2017-04-19 20:24:00', '2017-04-27 00:02:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stock_balances`
--

CREATE TABLE IF NOT EXISTS `stock_balances` (
  `id` int(10) unsigned NOT NULL,
  `qty` int(11) NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_moves`
--

CREATE TABLE IF NOT EXISTS `stock_moves` (
  `id` int(10) unsigned NOT NULL,
  `move_date` date NOT NULL,
  `qty` int(11) NOT NULL,
  `oldcost` int(11) NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_properties`
--

CREATE TABLE IF NOT EXISTS `stock_properties` (
  `id` int(11) NOT NULL,
  `stock_id` int(11) unsigned NOT NULL,
  `size` int(11) NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stock_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_sections`
--

CREATE TABLE IF NOT EXISTS `stock_sections` (
  `id` int(10) unsigned NOT NULL,
  `stock_id` int(10) unsigned NOT NULL,
  `section_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_types`
--

CREATE TABLE IF NOT EXISTS `stock_types` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stock_types`
--

INSERT INTO `stock_types` (`id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'test', 'vvvvvvvvvvvv', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stock_uoms`
--

CREATE TABLE IF NOT EXISTS `stock_uoms` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stock_uoms`
--

INSERT INTO `stock_uoms` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test', 'qqqqqqqqqqqqqqqqq', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE IF NOT EXISTS `stores` (
  `id` int(10) unsigned NOT NULL,
  `store_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `office_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slowgan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `businese_cert` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `business_type_id` int(10) unsigned NOT NULL,
  `staff_range_id` int(10) unsigned NOT NULL,
  `revenue_range_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `store_name`, `contact_person`, `contact_tel`, `office_phone`, `website`, `email1`, `email2`, `address`, `slowgan`, `status`, `businese_cert`, `deleted_at`, `created_at`, `updated_at`, `business_type_id`, `staff_range_id`, `revenue_range_id`) VALUES
(1, 'test', 'cccccccccccccc', 'dddddddddddddddd', 'weeeeeeeeeeeeee', 'www.bbngroup.com', 'bb@gmail.com', 'bb1@gmail.com', 'N123', 'ffffffffffffff', 1, 'dddddddddddddddddddd', NULL, NULL, NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `store_users`
--

CREATE TABLE IF NOT EXISTS `store_users` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `store_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE IF NOT EXISTS `tests` (
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `role` enum('customer','seller','moderator','admin') COLLATE utf8_unicode_ci NOT NULL,
  `confirmCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `active`, `role`, `confirmCode`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'admin', 'admin@gmail.com', '$2y$10$ByUGXxrZhCImbxbD/14EY.XhBlv68K9vBw6k8hCxoyuVer1oTeMVm', 1, 'admin', '', NULL, 'o5yMdZs9SIl0KleOqy2S4BMRhZagT5g7Sf7WwJT7374A0WfqpfDMAuwBpiGw', '2017-04-25 21:29:46', '2017-04-27 18:41:18'),
(5, 'Client', 'client@gmail.com', '$2y$10$JsRcoiohPjPmSVS5Kx5N/uIs1Ce29UcUYmJIDOnoaxsrsHSVzDJTW', 0, 'customer', '', NULL, 'UrcndQWDaPbXSFVhvpFqC6kH73lyEwBFVyPC0wUYcB6otnPI1IzZm4jMLpDT', '2017-04-25 21:34:17', '2017-04-27 18:23:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertises`
--
ALTER TABLE `advertises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advertises_store_id_foreign` (`store_id`);

--
-- Indexes for table `advertise_blogs`
--
ALTER TABLE `advertise_blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advertise_blogs_advertise_id_foreign` (`advertise_id`),
  ADD KEY `advertise_blogs_blog_id_foreign` (`blog_id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_attribute_types`
--
ALTER TABLE `attribute_attribute_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_attribute_types_attribute_id_foreign` (`attribute_id`),
  ADD KEY `attribute_attribute_types_attribute_type_id_foreign` (`attribute_type_id`);

--
-- Indexes for table `attribute_attribute_values`
--
ALTER TABLE `attribute_attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_attribute_values_attribute_id_foreign` (`attribute_id`),
  ADD KEY `attribute_attribute_values_attribute_value_id_foreign` (`attribute_value_id`);

--
-- Indexes for table `attribute_categories`
--
ALTER TABLE `attribute_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_categories_attribute_id_foreign` (`attribute_id`),
  ADD KEY `attribute_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `attribute_types`
--
ALTER TABLE `attribute_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_types`
--
ALTER TABLE `business_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_stock_id_foreign` (`stock_id`),
  ADD KEY `carts_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`),
  ADD KEY `categories_stock_type_id_foreign` (`stock_type_id`);

--
-- Indexes for table `category_stocks`
--
ALTER TABLE `category_stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_stocks_stock_id_foreign` (`stock_id`),
  ADD KEY `category_stocks_category_id_foreign` (`category_id`);

--
-- Indexes for table `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_galleryable_id_galleryable_type_index` (`galleryable_id`,`galleryable_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_users_id_foreign` (`users_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provinces_country_id_foreign` (`country_id`);

--
-- Indexes for table `revenue_ranges`
--
ALTER TABLE `revenue_ranges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_companies`
--
ALTER TABLE `shipping_companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipping_companies_country_id_foreign` (`country_id`);

--
-- Indexes for table `shipping_province_prices`
--
ALTER TABLE `shipping_province_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipping_province_prices_to_province_id_foreign` (`to_province_id`),
  ADD KEY `shipping_province_prices_from_province_id_foreign` (`from_province_id`);

--
-- Indexes for table `slideshows`
--
ALTER TABLE `slideshows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slideshows_store_id_foreign` (`store_id`);

--
-- Indexes for table `social_login`
--
ALTER TABLE `social_login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_login_users_id_foreign` (`users_id`);

--
-- Indexes for table `staff_ranges`
--
ALTER TABLE `staff_ranges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_currency_id_foreign` (`currency_id`),
  ADD KEY `stocks_stock_uom_id_foreign` (`stock_uom_id`),
  ADD KEY `stocks_store_id_foreign` (`store_id`),
  ADD KEY `stocks_condition_id_foreign` (`condition_id`);

--
-- Indexes for table `stock_balances`
--
ALTER TABLE `stock_balances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_balances_store_id_foreign` (`store_id`);

--
-- Indexes for table `stock_moves`
--
ALTER TABLE `stock_moves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_moves_store_id_foreign` (`store_id`);

--
-- Indexes for table `stock_sections`
--
ALTER TABLE `stock_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_sections_stock_id_foreign` (`stock_id`),
  ADD KEY `stock_sections_section_id_foreign` (`section_id`);

--
-- Indexes for table `stock_types`
--
ALTER TABLE `stock_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_uoms`
--
ALTER TABLE `stock_uoms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stores_business_type_id_foreign` (`business_type_id`),
  ADD KEY `stores_staff_range_id_foreign` (`staff_range_id`),
  ADD KEY `stores_revenue_range_id_foreign` (`revenue_range_id`);

--
-- Indexes for table `store_users`
--
ALTER TABLE `store_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `store_users_user_id_foreign` (`user_id`),
  ADD KEY `store_users_store_id_foreign` (`store_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertises`
--
ALTER TABLE `advertises`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `advertise_blogs`
--
ALTER TABLE `advertise_blogs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attribute_attribute_types`
--
ALTER TABLE `attribute_attribute_types`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attribute_attribute_values`
--
ALTER TABLE `attribute_attribute_values`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attribute_categories`
--
ALTER TABLE `attribute_categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attribute_types`
--
ALTER TABLE `attribute_types`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `business_types`
--
ALTER TABLE `business_types`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT for table `category_stocks`
--
ALTER TABLE `category_stocks`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `conditions`
--
ALTER TABLE `conditions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=154;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `revenue_ranges`
--
ALTER TABLE `revenue_ranges`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shipping_companies`
--
ALTER TABLE `shipping_companies`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shipping_province_prices`
--
ALTER TABLE `shipping_province_prices`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slideshows`
--
ALTER TABLE `slideshows`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `social_login`
--
ALTER TABLE `social_login`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staff_ranges`
--
ALTER TABLE `staff_ranges`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `stock_balances`
--
ALTER TABLE `stock_balances`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stock_moves`
--
ALTER TABLE `stock_moves`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stock_sections`
--
ALTER TABLE `stock_sections`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stock_types`
--
ALTER TABLE `stock_types`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `stock_uoms`
--
ALTER TABLE `stock_uoms`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `store_users`
--
ALTER TABLE `store_users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertises`
--
ALTER TABLE `advertises`
  ADD CONSTRAINT `advertises_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `advertise_blogs`
--
ALTER TABLE `advertise_blogs`
  ADD CONSTRAINT `advertise_blogs_advertise_id_foreign` FOREIGN KEY (`advertise_id`) REFERENCES `advertises` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `advertise_blogs_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attribute_attribute_types`
--
ALTER TABLE `attribute_attribute_types`
  ADD CONSTRAINT `attribute_attribute_types_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attribute_attribute_types_attribute_type_id_foreign` FOREIGN KEY (`attribute_type_id`) REFERENCES `attribute_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attribute_attribute_values`
--
ALTER TABLE `attribute_attribute_values`
  ADD CONSTRAINT `attribute_attribute_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attribute_attribute_values_attribute_value_id_foreign` FOREIGN KEY (`attribute_value_id`) REFERENCES `attribute_values` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attribute_categories`
--
ALTER TABLE `attribute_categories`
  ADD CONSTRAINT `attribute_categories_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attribute_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_stock_id_foreign` FOREIGN KEY (`stock_id`) REFERENCES `stocks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_stock_type_id_foreign` FOREIGN KEY (`stock_type_id`) REFERENCES `stock_types` (`id`);

--
-- Constraints for table `category_stocks`
--
ALTER TABLE `category_stocks`
  ADD CONSTRAINT `category_stocks_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_stocks_stock_id_foreign` FOREIGN KEY (`stock_id`) REFERENCES `stocks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `provinces`
--
ALTER TABLE `provinces`
  ADD CONSTRAINT `provinces_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shipping_companies`
--
ALTER TABLE `shipping_companies`
  ADD CONSTRAINT `shipping_companies_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shipping_province_prices`
--
ALTER TABLE `shipping_province_prices`
  ADD CONSTRAINT `shipping_province_prices_from_province_id_foreign` FOREIGN KEY (`from_province_id`) REFERENCES `provinces` (`id`),
  ADD CONSTRAINT `shipping_province_prices_to_province_id_foreign` FOREIGN KEY (`to_province_id`) REFERENCES `provinces` (`id`);

--
-- Constraints for table `slideshows`
--
ALTER TABLE `slideshows`
  ADD CONSTRAINT `slideshows_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_login`
--
ALTER TABLE `social_login`
  ADD CONSTRAINT `social_login_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_condition_id_foreign` FOREIGN KEY (`condition_id`) REFERENCES `conditions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stocks_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stocks_stock_uom_id_foreign` FOREIGN KEY (`stock_uom_id`) REFERENCES `stock_uoms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stocks_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stock_balances`
--
ALTER TABLE `stock_balances`
  ADD CONSTRAINT `stock_balances_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stock_moves`
--
ALTER TABLE `stock_moves`
  ADD CONSTRAINT `stock_moves_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stock_sections`
--
ALTER TABLE `stock_sections`
  ADD CONSTRAINT `stock_sections_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stock_sections_stock_id_foreign` FOREIGN KEY (`stock_id`) REFERENCES `stocks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stores`
--
ALTER TABLE `stores`
  ADD CONSTRAINT `stores_business_type_id_foreign` FOREIGN KEY (`business_type_id`) REFERENCES `business_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stores_revenue_range_id_foreign` FOREIGN KEY (`revenue_range_id`) REFERENCES `revenue_ranges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stores_staff_range_id_foreign` FOREIGN KEY (`staff_range_id`) REFERENCES `staff_ranges` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `store_users`
--
ALTER TABLE `store_users`
  ADD CONSTRAINT `store_users_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `store_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
