-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 19, 2024 at 09:39 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lightpsy_extraspareparts.com`
--

-- --------------------------------------------------------

--
-- Table structure for table `advert_documentations`
--

CREATE TABLE `advert_documentations` (
  `id` bigint UNSIGNED NOT NULL,
  `advert_documentation_id` int NOT NULL,
  `semantic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `translation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checked` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advert_documentations`
--

INSERT INTO `advert_documentations` (`id`, `advert_documentation_id`, `semantic`, `translation`, `checked`, `created_at`, `updated_at`) VALUES
(1, 35773, '<badge> Badge </badge>', '<span class=\'badge badge-danger text-shadow-none\'>Badge</span>', 0, '2024-02-17 18:45:53', '2024-02-17 18:45:53'),
(3, 75774, '<bold> Bold </bold>', '<span class=\'fw-bolder\'>Bold</span>', 0, '2024-02-17 19:22:45', '2024-02-17 19:22:45'),
(4, 13084, '<red> Red </red>', '<span class=\'text-danger\'>Red</span>', 0, '2024-02-17 19:27:14', '2024-02-17 19:27:14'),
(5, 47325, '<underline> Underlined </underline>', '<span class=\'underline\'>Underlined</span>', 0, '2024-02-17 19:31:10', '2024-02-17 19:31:10'),
(6, 97921, '<overline> Overlined </overline>', '<span class=\'overline\'>Overlined</span>', 0, '2024-02-17 19:33:25', '2024-02-17 19:33:25'),
(7, 95264, '<cancel> Cancelled </cancel>', '<span class=\'cancel\'>Cancelled</span>', 0, '2024-02-17 19:37:59', '2024-02-17 19:37:59'),
(8, 92933, '<italics> Italics </italics>', '<i>Italics</i>', 0, '2024-02-17 19:40:11', '2024-02-17 19:40:11');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `banner_id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `href` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checked` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_id`, `title`, `subtitle`, `text`, `href`, `link_text`, `checked`, `created_at`, `updated_at`) VALUES
(14, 53671, 'sale 15-20% off', 'on everything', 'we offer a <badge>15% discount</badge> to all our customers of single purchase above <badge>$1000</badge> and we even go right up to a <badge>20% discount</badge> for purchases over <badge>$5000</badge>,that\'s to show our appreciation and love for valued customers. the discounts are forever and will never expire.', '/product', 'shop now', 0, '2024-01-22 09:34:28', '2024-03-14 12:33:29'),
(15, 61113, 'free deliveries', 'worldwide', 'we\'ve been doing <badge>free</badge> deliveries for so many customers of ours for a very <bold>long time</bold>, that\'s ever since our existence in the market, our can see our for your self below, no more <cancel>high cost</cancel> delivery fees for you.', '/about', 'about us', 0, '2024-01-22 09:57:48', '2024-03-14 12:34:11'),
(16, 67938, 'award offerings', 'regularly', 'we offer awards to the most active customers in our database <italics>(that\'s those whose recorded purchases per week exceed <bold>$2000</bold>)</italics>, those awards entail <badge>gift cards</badge>, <badge>free purchase</badge> to some of products, and others some <badge>job opportunities</badge>, regardless of your <bold>geographical location</bold>.', '/testimonial', 'our testimonials', 0, '2024-01-22 10:30:42', '2024-03-14 12:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `cart_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int UNSIGNED DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int UNSIGNED DEFAULT NULL,
  `product_quantity` int UNSIGNED DEFAULT NULL,
  `total` int UNSIGNED GENERATED ALWAYS AS ((`price` * `product_quantity`)) STORED,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `category` int DEFAULT NULL,
  `checked` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `cart_id`, `name`, `email`, `phone`, `address`, `product_title`, `product_id`, `user_id`, `price`, `product_quantity`, `image`, `description`, `category`, `checked`, `created_at`, `updated_at`) VALUES
(66, 17734, 'Haka thon', 'hakathon2525@gmail.com', '+1(223)28772', 'north carolina, uSA', 'voluptas reprehender', 35, '32', 812, 6, '1708553326.jpg', 'aliquid qui non aliq', 7942, 0, '2024-03-16 13:38:43', '2024-03-17 02:49:32'),
(68, 81938, 'admin', 'admin@gmail.com', '7329889327', 'Driveway, house 24', 'vero totam cum fugia', 32, '17', 239, 6, '1708546469.png', 'aliquid ullamco atqu', 13507, 0, '2024-03-17 00:35:25', '2024-03-17 02:26:18'),
(69, 12253, 'admin', 'admin@gmail.com', '7329889327', 'Driveway, house 24', 'nostrud aut elit la', 31, '17', 694, 4, '1708531160.png', 'nesciunt est sint', 35133, 0, '2024-03-17 00:35:27', '2024-03-17 01:19:47'),
(70, 92175, 'admin', 'admin@gmail.com', '7329889327', 'Driveway, house 24', 'title', 28, '17', 880, 3, '1707722896.png', 'ullamco eum necessit', 39798, 0, '2024-03-17 00:35:32', '2024-03-17 01:22:06'),
(71, 96441, 'admin', 'admin@gmail.com', '7329889327', 'Driveway, house 24', 'Quis provident sequ', 6, '17', 590, 3, '1705306770.jpg', 'Omnis soluta blandit', 98769, 0, '2024-03-17 00:35:36', '2024-03-17 02:26:52'),
(95, 99981, 'Nzenong Braxton', 'braxtonnzenong@gmail.com', '699596551', 'molyko, house 242', 'voluptas reprehender', 35, '18', 812, 8, '1708553326.jpg', 'aliquid qui non aliq', 7942, 0, '2024-03-17 03:23:05', '2024-03-17 03:29:13'),
(96, 73708, 'Nzenong Braxton', 'braxtonnzenong@gmail.com', '699596551', 'molyko, house 242', 'Ipsum amet proiden', 5, '18', 646, 3, '1705306757.jpg', 'Illum sapiente null', 39798, 0, '2024-03-17 03:23:24', '2024-03-17 03:23:24'),
(97, 74228, 'Nzenong Braxton', 'braxtonnzenong@gmail.com', '699596551', 'molyko, house 242', 'autem incididunt lab', 29, '18', 796, 1, '1708206060.png', 'voluptate qui saepe', 39798, 0, '2024-03-17 03:29:19', '2024-03-17 03:29:19'),
(130, 53051, 'adolf henry', 'adolfhenry100@gmail.com', '+1(334)64792', 'ohi, usa', 'ut corrupti rem sun', 33, '51', 256, 18, '1708546661.png', 'commodo est minim ea', 98769, 0, '2024-03-17 07:18:19', '2024-03-17 07:18:19'),
(131, 5214, 'adolf henry', 'adolfhenry100@gmail.com', '+1(334)64792', 'ohi, usa', 'voluptas reprehender', 35, '51', 812, 21, '1708553326.jpg', 'aliquid qui non aliq', 7942, 0, '2024-03-17 07:18:22', '2024-03-17 07:18:22'),
(132, 41570, 'adolf henry', 'adolfhenry100@gmail.com', '+1(334)64792', 'ohi, usa', 'vero totam cum fugia', 32, '51', 239, 4, '1708546469.png', 'aliquid ullamco atqu', 13507, 0, '2024-03-17 07:18:24', '2024-03-17 07:18:24'),
(133, 81393, 'adolf henry', 'adolfhenry100@gmail.com', '+1(334)64792', 'ohi, usa', 'title', 28, '51', 880, 3, '1707722896.png', 'ullamco eum necessit', 39798, 0, '2024-03-17 07:18:51', '2024-03-17 07:18:51');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` int NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checked` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_id`, `category_name`, `checked`, `created_at`, `updated_at`) VALUES
(1, 98769, 'side mirror', 0, '2024-01-15 07:01:47', '2024-01-15 07:01:47'),
(2, 13507, 'head lamp', 0, '2024-01-15 07:02:08', '2024-01-15 07:02:08'),
(3, 86063, 'wind shield', 0, '2024-01-15 07:02:17', '2024-01-15 07:02:17'),
(4, 39798, 'engine', 0, '2024-01-15 07:02:40', '2024-01-15 07:02:40'),
(13, 3979, 'steering wheel', 0, '2024-02-18 07:12:32', '2024-02-18 07:12:32'),
(14, 35133, 'brake', 0, '2024-02-18 07:12:38', '2024-02-18 07:12:38'),
(15, 11123, 'wheel drums', 0, '2024-02-18 07:13:09', '2024-02-18 07:13:09'),
(16, 7942, 'tires', 0, '2024-02-18 07:13:42', '2024-02-18 07:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `contact_id` int NOT NULL,
  `info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` tinyint NOT NULL,
  `checked` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `contact_id`, `info`, `value`, `position`, `checked`, `created_at`, `updated_at`) VALUES
(1, 95288, 'address', '28 white tower, broadway new york city, usa', 1, 0, '2024-01-15 08:40:43', '2024-01-20 09:21:47'),
(6, 85832, 'telephone', '+61 4 2345 6789', 3, 0, '2024-01-15 10:35:16', '2024-01-20 09:38:22'),
(7, 45205, 'email', 'extraspareparts100@gmail.com', 2, 0, '2024-01-20 09:18:01', '2024-03-14 12:49:25');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `coupon_id` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_id`, `email`, `created_at`, `updated_at`) VALUES
(1, 43889, 'braxtonnzenong@gmail.com', '2024-02-21 10:58:51', '2024-02-21 10:58:51'),
(2, 19700, 'cyber2525@gmail.com', '2024-02-21 11:51:35', '2024-02-21 11:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint UNSIGNED NOT NULL,
  `invoice_id` int UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `items` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_id`, `user_id`, `items`, `total`, `created_at`, `updated_at`) VALUES
(9, 27626, 18, '1 x voluptas reprehender = $659344,, 1 x ut corrupti rem sun = $65536,, 1 x vero totam cum fugia = $57121,, 1 x nostrud aut elit la = $481636', 2001, '2024-03-16 05:31:33', '2024-03-16 05:31:33'),
(10, 66438, 18, '1 x voluptas reprehender = $659344,, 1 x ut corrupti rem sun = $65536,, 1 x autem incididunt lab = $633616,, 1 x title = $774400,, 1 x Irure omnis sit comm = $278784,, 1 x Vero voluptate ab se = $48841', 3493, '2024-03-16 05:49:49', '2024-03-16 05:49:49'),
(11, 27373, 18, '1 x enim amet elit arc = $478864,, 1 x title = $774400,, 1 x nostrud aut elit la = $481636,, 1 x vero totam cum fugia = $57121', 2505, '2024-03-16 08:19:39', '2024-03-16 08:19:39'),
(12, 44014, 18, '1 x autem incididunt lab = $633616,, 1 x enim amet elit arc = $478864', 1488, '2024-03-16 09:00:10', '2024-03-16 09:00:10'),
(13, 21458, 32, '4 x voluptas reprehender = $2637376,, 1 x vero totam cum fugia = $57121', 1051, '2024-03-16 13:37:32', '2024-03-16 13:37:32'),
(14, 43438, 31, '1 x vero totam cum fugia = $57121', 239, '2024-03-16 13:39:17', '2024-03-16 13:39:17'),
(15, 51519, 18, '1 x ut corrupti rem sun = $65536,, 2 x In nulla enim cupida = $729632,, 1 x autem incididunt lab = $633616,, 1 x Ipsum amet proiden = $417316', 2302, '2024-03-17 00:40:06', '2024-03-17 00:40:06'),
(16, 40979, 18, '2 x ut corrupti rem sun = $131072,, 1 x autem incididunt lab = $633616,, 1 x voluptas reprehender = $659344,, 20 x ut corrupti rem sun = $1310720,, 1 x vero totam cum fugia = $57121,, 1 x nostrud aut elit la = $481636,, 1 x Quis provident sequ = $348100,, 1 x Mollitia quia animi = $774400', 4523, '2024-03-17 01:36:05', '2024-03-17 01:36:05'),
(17, 5714, 18, '1 x ut corrupti rem sun = $65536', 256, '2024-03-17 01:39:23', '2024-03-17 01:39:23'),
(18, 97951, 18, '1 x ut corrupti rem sun = $65536', 256, '2024-03-17 01:58:18', '2024-03-17 01:58:18'),
(19, 49070, 18, '1 x voluptas reprehender = $659344', 812, '2024-03-17 01:59:28', '2024-03-17 01:59:28'),
(20, 96287, 18, '<br>1 x voluptas reprehender = $659344', 812, '2024-03-17 02:01:26', '2024-03-19 20:37:58'),
(21, 57780, 18, '<br><br>1 x voluptas reprehender = $659344', 812, '2024-03-17 02:02:22', '2024-03-19 20:29:29'),
(22, 43284, 51, '3 x voluptas reprehender = $1978032,, 10 x ut corrupti rem sun = $655360', 1068, '2024-03-17 04:54:36', '2024-03-17 04:54:36'),
(23, 78967, 51, '3 x voluptas reprehender = $1978032,, 1 x ut corrupti rem sun = $65536,, 1 x Irure omnis sit comm = $278784', 1596, '2024-03-17 05:02:12', '2024-03-17 05:02:12'),
(24, 34997, 51, '4 x voluptas reprehender = $2637376,, 1 x ut corrupti rem sun = $65536', 1068, '2024-03-17 05:07:55', '2024-03-17 05:07:55'),
(25, 18835, 51, '8 x voluptas reprehender = $5274752,, 12 x ut corrupti rem sun = $786432,, 5 x title = $3872000,, 3 x Quis provident sequ = $1044300', 2538, '2024-03-17 06:10:01', '2024-03-17 06:10:01'),
(26, 45697, 51, '19 x voluptas reprehender = $12527536,, 5 x vero totam cum fugia = $285605,, 2 x title = $1548800,, 2 x In nulla enim cupida = $729632', 2535, '2024-03-17 06:23:02', '2024-03-17 06:23:02'),
(27, 36392, 51, '1 x voluptas reprehender = $659344,, 4 x ut corrupti rem sun = $262144,, 7 x vero totam cum fugia = $399847,, 2 x nostrud aut elit la = $963272', 2001, '2024-03-17 06:28:44', '2024-03-17 06:28:44'),
(28, 80413, 51, '1 x voluptas reprehender = <b>$659344</b>,, 3 x ut corrupti rem sun = <b>$196608</b>,, 4 x vero totam cum fugia = <b>$228484</b>,, 4 x nostrud aut elit la = <b>$1926544</b>', 2001, '2024-03-17 06:38:43', '2024-03-17 06:38:43'),
(29, 10515, 51, '1 x 256 = <b>$ut corrupti rem sun</b>,, 1 x 812 = <b>$voluptas reprehender</b>,, 1 x 239 = <b>$vero totam cum fugia</b>,, 3 x 2,082 = <b>$nostrud aut elit la</b>', 2001, '2024-03-17 06:59:29', '2024-03-17 06:59:29'),
(30, 77566, 51, '1 x voluptas reprehender = <b>$812</b>,, 1 x ut corrupti rem sun = <b>$256</b>,, 4 x vero totam cum fugia = <b>$956</b>,, 1 x nostrud aut elit la = <b>$694</b>,, 2 x title = <b>$1,760</b>', 2881, '2024-03-17 07:14:55', '2024-03-17 07:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_12_29_085628_create_sessions_table', 1),
(7, '2023_12_30_101532_create_categories_table', 1),
(8, '2023_12_31_043836_create_products_table', 1),
(9, '2024_01_02_035334_create_carts_table', 1),
(10, '2024_01_09_154124_create_contacts_table', 1),
(11, '2024_01_09_154241_create_testimonials_table', 1),
(12, '2024_01_09_154337_create_banners_table', 1),
(13, '2024_01_26_112920_create_advert_documentations_table', 2),
(18, '2024_02_12_135040_create_positions_table', 3),
(19, '2024_02_21_075403_create_news_letters_table', 4),
(21, '2024_02_21_111022_create_coupons_table', 5),
(23, '2024_03_15_012650_create_invoices_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `news_letters`
--

CREATE TABLE `news_letters` (
  `id` bigint UNSIGNED NOT NULL,
  `subscriber_id` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_letters`
--

INSERT INTO `news_letters` (`id`, `subscriber_id`, `email`, `created_at`, `updated_at`) VALUES
(1, 22127, 'braxtonnzenong@gmail.com', '2024-02-21 07:35:29', '2024-02-21 07:35:29'),
(2, 52126, 'cyberlord2525@gmail.com', '2024-02-21 07:36:21', '2024-02-21 07:36:21'),
(3, 77629, 'jacobbush2525@gmail.com', '2024-02-21 07:37:31', '2024-02-21 07:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$12$yH0exgWYC1LMkfT.3vypaeQu/NlDSmBuPU6KkVIL9ryx15aMcoj4q', '2024-02-16 08:50:02'),
('braxtonnzenong@gmail.com', '$2y$12$IYtXI.Gur7CYDym7c7eVcuowmlbSoTEVPyhg.J0fVkYQs.IIXIE7K', '2024-01-22 11:34:25');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint UNSIGNED NOT NULL,
  `position_id` int NOT NULL,
  `position_int` tinyint NOT NULL,
  `position_str` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checked` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `position_id`, `position_int`, `position_str`, `checked`, `created_at`, `updated_at`) VALUES
(1, 77649, 1, 'first', 0, '2024-02-14 13:31:00', '2024-02-14 13:31:00'),
(2, 1143, 2, 'second', 0, '2024-02-14 13:31:00', '2024-02-14 13:31:00'),
(3, 82133, 3, 'third', 0, '2024-02-14 13:31:00', '2024-02-14 13:31:00'),
(4, 72689, 4, 'fourth', 0, '2024-02-14 13:31:00', '2024-02-14 13:31:00'),
(5, 32858, 5, 'fifth', 0, '2024-02-14 13:31:00', '2024-02-14 13:31:00'),
(6, 75530, 6, 'sixth', 0, '2024-02-14 13:31:00', '2024-02-14 13:31:00'),
(7, 33788, 7, 'seventh', 0, '2024-02-14 13:31:00', '2024-02-14 13:31:00'),
(8, 90376, 8, 'eighth', 0, '2024-02-14 13:31:00', '2024-02-14 13:31:00'),
(9, 15563, 9, 'ninth', 0, '2024-02-14 13:31:00', '2024-02-14 13:31:00'),
(10, 15157, 10, 'tenth', 0, '2024-02-14 13:31:00', '2024-02-14 13:31:00'),
(11, 32058, 11, 'eleventh', 0, '2024-02-14 13:31:00', '2024-02-14 13:31:00'),
(12, 25952, 12, 'twelfth', 0, '2024-02-14 13:31:00', '2024-02-14 13:31:00'),
(13, 36527, 13, 'thirteenth', 0, '2024-02-14 13:31:00', '2024-02-14 13:31:00'),
(14, 38240, 14, 'fourteenth', 0, '2024-02-14 13:31:00', '2024-02-14 13:31:00'),
(15, 62128, 15, 'fifteenth', 0, '2024-02-14 13:31:00', '2024-02-14 13:31:00'),
(16, 22796, 16, 'sixteenth', 0, '2024-02-14 13:31:00', '2024-02-14 13:31:00'),
(17, 85631, 17, 'seventeenth', 0, '2024-02-14 13:31:00', '2024-02-14 13:31:00'),
(18, 24834, 18, 'eighteenth', 0, '2024-02-14 13:31:00', '2024-02-14 13:31:00'),
(19, 48636, 19, 'ninteenth', 0, '2024-02-14 13:31:00', '2024-02-14 13:31:00'),
(20, 37906, 20, 'twentieth', 0, '2024-02-14 13:31:00', '2024-02-14 13:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` int DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checked` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `title`, `description`, `image`, `category`, `quantity`, `price`, `discount_price`, `checked`, `created_at`, `updated_at`) VALUES
(1, 7102, 'Ratione Nam debitis', 'Tempora ullam fugiat', '1705306606.jpg', 86063, '72', '490', '467', 0, '2024-01-15 07:16:46', '2024-02-11 16:25:10'),
(2, 34108, 'Mollitia quia animi', 'Perspiciatis natus', '1705306697.jpg', 39798, '639', '880', '890', 0, '2024-01-15 07:18:17', '2024-02-11 16:25:10'),
(3, 18244, 'Ea et enim nihil atq', 'Omnis numquam velit', '1705306714.jpg', 13507, '856', '12', '301', 0, '2024-01-15 07:18:34', '2024-02-11 16:25:10'),
(4, 55671, 'Vero voluptate ab se', 'Amet iure quia culp', '1705306733.jpg', 39798, '360', '221', '664', 0, '2024-01-15 07:18:53', '2024-02-11 16:25:10'),
(5, 92731, 'Ipsum amet proiden', 'Illum sapiente null', '1705306757.jpg', 39798, '935', '646', '984', 0, '2024-01-15 07:19:17', '2024-02-11 16:25:10'),
(6, 10283, 'Quis provident sequ', 'Omnis soluta blandit', '1705306770.jpg', 98769, '899', '590', '460', 0, '2024-01-15 07:19:30', '2024-02-11 16:25:10'),
(7, 1808, 'Mollitia vero id dol', 'Architecto eos eum n', '1705308468.jpg', 86063, '354', '906', '952', 0, '2024-01-15 07:47:48', '2024-02-11 16:25:10'),
(8, 10784, 'Accusantium exceptur', 'Ipsam non qui et dui', '1705308479.jpg', 13507, '946', '241', '711', 0, '2024-01-15 07:47:59', '2024-02-11 16:25:10'),
(9, 4204, 'In sed sed esse dolo', 'Nostrum minima offic', '1705308488.jpg', 39798, '283', '757', '608', 0, '2024-01-15 07:48:08', '2024-02-11 16:25:10'),
(10, 91750, 'In nulla enim cupida', 'Voluptate incidunt', '1705308499.jpg', 13507, '929', '604', '806', 0, '2024-01-15 07:48:19', '2024-02-11 16:25:10'),
(11, 86421, 'Irure omnis sit comm', 'Esse enim consequat', '1705308510.jpg', 39798, '543', '528', '587', 0, '2024-01-15 07:48:30', '2024-02-11 16:25:10'),
(13, 71232, 'Necessitatibus eaque', 'Omnis architecto lab', '1705308558.jpg', 86063, '236', '139', '261', 0, '2024-01-15 07:49:18', '2024-02-11 16:25:10'),
(19, 50716, 'quis velit assumenda', 'dolorem eveniet imp', '1707669139.png', 39798, '953', '839', '101', 0, '2024-02-11 15:32:19', '2024-02-11 16:25:10'),
(20, 73422, 'quis velit assumenda', 'dolorem eveniet imp', '1707669139.png', 39798, '953', '839', '101', 0, '2024-02-11 15:32:19', '2024-02-11 16:25:10'),
(21, 96435, 'et aspernatur magni', 'amet dolores eum do', '1707670628.png', 39798, '281', '757', '223', 0, '2024-02-11 15:57:08', '2024-02-11 15:57:08'),
(22, 25727, 'iusto tempor minima', 'eiusmod et pariatur', '1707672856.png', 13507, '30', '172', '757', 0, '2024-02-11 16:34:16', '2024-02-11 16:34:16'),
(23, 6798, 'sequi nam laboriosam', 'excepturi nihil inci', '1707673151.png', 98769, '487', '381', '339', 0, '2024-02-11 16:39:11', '2024-02-12 06:10:40'),
(24, 26286, 'enim amet elit arc', 'ut et culpa laborios', '1707673655.png', 98769, '40', '692', '7', 0, '2024-02-11 16:47:35', '2024-02-12 06:10:40'),
(28, 11497, 'title', 'ullamco eum necessit', '1707722896.png', 39798, '47', '880', '268', 0, '2024-02-12 06:28:16', '2024-02-12 06:32:34'),
(29, 27653, 'autem incididunt lab', 'voluptate qui saepe', '1708206060.png', 39798, '467', '796', '348', 0, '2024-02-17 20:41:00', '2024-02-17 20:41:00'),
(31, 90087, 'nostrud aut elit la', 'nesciunt est sint', '1708531160.png', 35133, '507', '694', '388', 0, '2024-02-21 14:59:20', '2024-02-21 15:00:14'),
(32, 30471, 'vero totam cum fugia', 'aliquid ullamco atqu', '1708546469.png', 13507, '141', '239', '740', 0, '2024-02-21 19:14:29', '2024-02-21 19:15:19'),
(33, 21192, 'ut corrupti rem sun', 'commodo est minim ea', '1708546661.png', 98769, '498', '256', '107', 0, '2024-02-21 19:17:41', '2024-03-14 18:25:49'),
(35, 40030, 'voluptas reprehender', 'aliquid qui non aliq', '1708553326.jpg', 7942, '478', '812', '259', 0, '2024-02-21 21:02:11', '2024-03-15 09:15:33');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ExdLBf0vAZ8r7cmx8exQAjpMtpe15gX10Gc8dwF3', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicHlmTTl5OXZvOWZnYXpuUTVYYVlUR0t4ZHV6cUNkN3J6Nk40bGdGbCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9leHRyYXNwYXJlcGFydHMudGVzdCI7fX0=', 1710884350);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint UNSIGNED NOT NULL,
  `testimonial_id` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'general-images/default.png',
  `testifier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `testifier_occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `testimonial` longtext COLLATE utf8mb4_unicode_ci,
  `position` tinyint NOT NULL,
  `checked` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `testimonial_id`, `image`, `testifier_name`, `testifier_occupation`, `testimonial`, `position`, `checked`, `created_at`, `updated_at`) VALUES
(1, 67363763, 'general-images/testimonials/mark_smith.jpg', 'mark smith', 'customer', 'we always have so much admiration, joy, and satisfaction from this ecommerce platform!', 4, 0, NULL, '2024-03-14 12:47:00'),
(23, 99033, 'general-images/testimonials/cecile_kylie.png', 'cecile kylie', 'regular  customer', 'i have been shopping from here for over a decade, never for once have i gotten any disappointment from them, i wish this experience never seizes to exist, much love!', 2, 0, '2024-02-16 05:29:53', '2024-03-14 12:45:28'),
(24, 39373, 'general-images/testimonials/tony_henson.jpg', 'tony henson', 'sales agent', 'we are always glad to serve the society by providing their needs to motor services right at their door steps, i strongly recommend this platform for every car owner, for it has really help a lot, even in my locality.', 3, 0, '2024-02-16 05:30:49', '2024-03-14 12:41:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` tinyint NOT NULL DEFAULT '0',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `made_admin_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `made_master_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checked` tinyint NOT NULL DEFAULT '0',
  `google_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `newsletter_subscription` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `google_id`, `facebook_id`, `github_id`, `twitter_id`, `name`, `google_email`, `facebook_email`, `twitter_email`, `github_email`, `email`, `usertype`, `phone`, `address`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `made_admin_by`, `made_master_by`, `checked`, `google_token`, `facebook_token`, `github_token`, `twitter_token`, `newsletter_subscription`, `created_at`, `updated_at`) VALUES
(17, '82906', NULL, NULL, NULL, NULL, 'admin', NULL, NULL, NULL, NULL, 'admin@gmail.com', 3, '7329889327', 'Driveway, house 24', NULL, '$2y$12$EHVkBed4DEc6FxroPBYkZOgXG2vUIZA0Y/cKpDhcASt7aelPcodDm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, '2024-01-15 07:00:31', '2024-03-16 19:41:00'),
(18, '18977', '101912322173085169254', NULL, '119799071', NULL, 'Nzenong Braxton', NULL, NULL, NULL, NULL, 'braxtonnzenong@gmail.com', 2, '699596551', 'molyko, house 242', '2024-03-16 19:12:24', '$2y$12$gE8CAbTPVMWfcUzmutmZ9uxosvpytNJxQqgnLdeY2h2ERR7pJAkF6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'ya29.a0AfB_byC0GILOJAGXcivx4_AlcWhR-rh63pK9T9zmY1oLqAuSGaFdK9QNcCCmotnblR9Qzi0xzQLYjKWVJA91rsXi92fqKaGMFuNvj5D0K-yJPGO-ebE6TUz_GFW7HVfacT9xLnm3eAMOwYh24tZZcK6UlExOh7KoLqQaCgYKAWkSARMSFQHGX2MiLaIz0XApbFExCUL4OeMgjA0170', NULL, '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', '', NULL, '2024-01-20 11:58:33', '2024-03-19 20:13:06'),
(31, '18908', NULL, NULL, NULL, NULL, 'extra spare parts', NULL, NULL, NULL, NULL, 'extraspareparts100@gmail.com', 0, '+1(256) 946738', 'ohio, USA', '2024-03-16 13:35:55', '$2y$12$2hiySEe4cc1BGDUqTo1zo.UiJlcM8WXvO2dWtiQf/9E1fx5WH9Mnm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2024-03-16 09:30:01', '2024-03-19 15:25:10'),
(32, '2820', NULL, NULL, NULL, NULL, 'Haka thon', NULL, NULL, NULL, NULL, 'hakathon2525@gmail.com', 0, '+1(223)28772', 'north carolina, uSA', '2024-03-16 13:37:07', '$2y$12$H05X.PQBwKosPM.hGzeqPOrL4Finvh02f..CE7fRlslhKoB2Bjyqm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2024-03-16 13:13:09', '2024-03-19 18:21:48'),
(51, '25595', NULL, NULL, NULL, NULL, 'adolf henry', NULL, NULL, NULL, NULL, 'adolfhenry100@gmail.com', 1, '+1(334)64792', 'ohi, usa', '2024-03-17 04:54:16', '$2y$12$YqyKzyVk6scV5uzyU.kyVeAOImWl.ZT2msWbEeA6MZEbjAWvleY/y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2024-03-17 04:37:44', '2024-03-19 15:25:47'),
(55, '55204', NULL, NULL, NULL, NULL, 'Astra Banks', NULL, NULL, NULL, NULL, 'trial@mailinator.com', 0, '+1 (799) 424-9431', 'Nesciunt facilis la', NULL, '$2y$12$YkvZjkzK1L.0AOZuG8obHOvC2rJpr55s8VX8c51IXu1qtVwHzoYA6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '2024-03-19 14:49:31', '2024-03-19 18:19:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advert_documentations`
--
ALTER TABLE `advert_documentations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `advert_documentation_id` (`advert_documentation_id`),
  ADD UNIQUE KEY `semantic` (`semantic`,`translation`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `banners_banner_id_unique` (`banner_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `carts_cart_id_unique` (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_id_unique` (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contacts_contact_id_unique` (`contact_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_coupon_id_unique` (`coupon_id`),
  ADD UNIQUE KEY `coupons_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_letters`
--
ALTER TABLE `news_letters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_letters_subscriber_id_unique` (`subscriber_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `positions_position_id_unique` (`position_id`),
  ADD UNIQUE KEY `positions_position_int_unique` (`position_int`),
  ADD UNIQUE KEY `positions_position_str_unique` (`position_str`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_product_id_unique` (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `testimonials_testimonial_id_unique` (`testimonial_id`),
  ADD UNIQUE KEY `testifier_name` (`testifier_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `users_user_id_unique` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advert_documentations`
--
ALTER TABLE `advert_documentations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `news_letters`
--
ALTER TABLE `news_letters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
