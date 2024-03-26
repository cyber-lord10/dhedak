-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2024 at 05:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `extraspareparts.com`
--

-- --------------------------------------------------------

--
-- Table structure for table `advert_documentations`
--

CREATE TABLE `advert_documentations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `advert_documentation_id` int(11) NOT NULL,
  `semantic` varchar(255) NOT NULL,
  `translation` varchar(255) NOT NULL,
  `checked` tinyint(4) NOT NULL DEFAULT 0,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `href` varchar(255) NOT NULL,
  `link_text` varchar(255) NOT NULL,
  `checked` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_id`, `title`, `subtitle`, `text`, `href`, `link_text`, `checked`, `created_at`, `updated_at`) VALUES
(14, 53671, 'sale 15-20% off', 'on everything', 'we offer a <badge>15% discount</badge> to all our customers of single purchase above <badge>$1000</badge> and we even go right up to a <badge>20% discount</badge> for purchases over <badge>$5000</badge>,that\'s to show our appreciation and love for valued customers. the discounts are forever and will never expire.', 'http://127.0.0.1:8000/product', 'shop now', 0, '2024-01-22 09:34:28', '2024-01-22 09:34:28'),
(15, 61113, 'free deliveries', 'worldwide', 'we\'ve been doing <badge>free</badge> deliveries for so many customers of ours for a very <bold>long time</bold>, that\'s ever since our existence in the market, our can see our for your self below, no more <cancel>high cost</cancel> delivery fees for you.', 'http://127.0.0.1:8000/about', 'about us', 0, '2024-01-22 09:57:48', '2024-01-22 10:32:08'),
(16, 67938, 'award offerings', 'regularly', 'we offer awards to the most active customers in our database <italics>(that\'s those whose recorded purchases per week exceed <bold>$2000</bold>)</italics>, those awards entail <badge>gift cards</badge>, <badge>free purchase</badge> to some of products, and others some <badge>job opportunities</badge>, regardless of your <bold>geographical location</bold>.', 'http://127.0.0.1:8000/testimonial', 'our testimonials', 0, '2024-01-22 10:30:42', '2024-01-22 10:30:42');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `product_title` varchar(255) DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `price` int(10) UNSIGNED DEFAULT NULL,
  `product_quantity` int(10) UNSIGNED DEFAULT NULL,
  `total` int(10) UNSIGNED GENERATED ALWAYS AS (`price` * `product_quantity`) STORED,
  `image` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `category` int(255) DEFAULT NULL,
  `checked` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `cart_id`, `name`, `email`, `phone`, `address`, `product_title`, `product_id`, `user_id`, `price`, `product_quantity`, `image`, `description`, `category`, `checked`, `created_at`, `updated_at`) VALUES
(7, 65865, 'Cyber Lord', 'braxtonnzenong@gmail.com', '699596551', 'molyko, house 24', 'autem incididunt lab', 29, '18', 796, 2, '1708206060.png', 'voluptate qui saepe', 39798, 0, '2024-02-21 06:13:53', '2024-02-21 06:13:53'),
(9, 38975, 'admin', 'admin@gmail.com', '7329889327', 'Driveway, house 24', 'ut corrupti rem sun', 33, '17', 256, 2, '1708546661.png', 'commodo est minim ea', 14249, 0, '2024-02-23 18:15:24', '2024-02-23 18:49:56');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `checked` tinyint(4) NOT NULL DEFAULT 0,
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
(16, 7942, 'tires', 0, '2024-02-18 07:13:42', '2024-02-18 07:13:42'),
(20, 14249, 'llll', 0, '2024-02-21 19:16:50', '2024-02-21 19:16:50');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_id` int(11) NOT NULL,
  `info` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `position` tinyint(2) NOT NULL,
  `checked` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `contact_id`, `info`, `value`, `position`, `checked`, `created_at`, `updated_at`) VALUES
(1, 95288, 'address', '28 white tower, broadway new york city, usa', 1, 0, '2024-01-15 08:40:43', '2024-01-20 09:21:47'),
(6, 85832, 'telephone', '+61 4 2345 6789', 3, 0, '2024-01-15 10:35:16', '2024-01-20 09:38:22'),
(7, 45205, 'email', 'extraspareparts@gmail.com', 2, 0, '2024-01-20 09:18:01', '2024-01-20 09:32:32');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
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
(21, '2024_02_21_111022_create_coupons_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `news_letters`
--

CREATE TABLE `news_letters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscriber_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
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
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `position_id` int(11) NOT NULL,
  `position_int` tinyint(4) NOT NULL,
  `position_str` varchar(255) NOT NULL,
  `checked` tinyint(4) NOT NULL DEFAULT 0,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `discount_price` varchar(255) DEFAULT NULL,
  `checked` tinyint(4) NOT NULL DEFAULT 0,
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
(33, 21192, 'ut corrupti rem sun', 'commodo est minim ea', '1708546661.png', 14249, '498', '256', '107', 0, '2024-02-21 19:17:41', '2024-02-21 19:50:41'),
(35, 40030, 'voluptas reprehender', 'aliquid qui non aliq', '1708553326.jpg', 3979, '478', '812', '259', 0, '2024-02-21 21:02:11', '2024-02-21 21:08:46');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3V3tvxmsDFBQKBlVqQkUTINv8MMykn5xEOqc1nu8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiV0hFandTamhPN0FhOTdHRGUxWWRLWWE2T3dUcGtDcDV5bWxZWldrMSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1708863209),
('5bvotFKG0oZt54cYsr3c4ux78j3w2ZVYWFYxJBTe', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOXBYQ1JsZ25VQnhQa2hQcldGcjZqWTFhQ2U2eVh4TnpGY3RIbHh4cCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fX0=', 1708865758);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `testimonial_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'general-images/default.png',
  `testifier_name` varchar(255) NOT NULL,
  `testifier_occupation` varchar(255) NOT NULL,
  `testimonial` longtext NOT NULL DEFAULT '1',
  `position` tinyint(4) NOT NULL,
  `checked` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `testimonial_id`, `image`, `testifier_name`, `testifier_occupation`, `testimonial`, `position`, `checked`, `created_at`, `updated_at`) VALUES
(1, 67363763, 'general-images/testimonials/mark_kum.jpg', 'mark kum', 'customer', 'We always have so much admiration, joy, and satisfaction from this ecommerce platform!', 4, 0, NULL, '2024-02-18 07:02:54'),
(23, 99033, 'general-images/testimonials/rhonda_bernard.png', 'rhonda bernard', 'mcgowan and howe plc', 'assumenda exercitati', 2, 0, '2024-02-16 05:29:53', '2024-02-18 07:02:54'),
(24, 39373, 'general-images/testimonials/raja_henson.png', 'raja henson', 'hunter burks plc', 'cumque aut ducimus', 3, 0, '2024-02-16 05:30:49', '2024-02-18 07:02:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `github_id` varchar(255) DEFAULT NULL,
  `twitter_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usertype` tinyint(4) NOT NULL DEFAULT 0,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `checked` tinyint(4) NOT NULL DEFAULT 0,
  `google_token` varchar(255) DEFAULT NULL,
  `facebook_token` varchar(255) DEFAULT NULL,
  `github_token` varchar(255) DEFAULT NULL,
  `twitter_token` varchar(255) NOT NULL,
  `newsletter_subscription` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `google_id`, `facebook_id`, `github_id`, `twitter_id`, `name`, `email`, `usertype`, `phone`, `address`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `checked`, `google_token`, `facebook_token`, `github_token`, `twitter_token`, `newsletter_subscription`, `created_at`, `updated_at`) VALUES
(17, '82906', NULL, NULL, NULL, '', 'admin', 'admin@gmail.com', 2, '7329889327', 'Driveway, house 24', NULL, '$2y$12$EHVkBed4DEc6FxroPBYkZOgXG2vUIZA0Y/cKpDhcASt7aelPcodDm', 'eyJpdiI6ImZENU5hSzVxTHFVUjR5OVMrSE9WSEE9PSIsInZhbHVlIjoiSHUxaTVFNkRNNWlXaVZwS09uSXJpS1luaHRZQ0lwUUlKVTVMT0E1WktqWT0iLCJtYWMiOiI4OGViMTNlZWQ1ODU0NzU1NDk0ZGJhMDBkZWE0NWVlYzQ4MTJjZWMxODBmZGZhYjAxY2M0OWU4NTZjYjNhYzU4IiwidGFnIjoiIn0=', 'eyJpdiI6IkQ4N3pyVm5FTGJVREl3OWZFdzFXR3c9PSIsInZhbHVlIjoiME5wQkwyUlowYTIyOThXZTlHSzc5aGVweklyVUcxVTBRMk10eVJBS2F1WEJDaG5yMEF5bmFnNk9GYlhWbEdJZ1QzQXo5a2RianV6WUU0OWRWMTR4aFRVNFN5bGc3TW5JUzRkRjB2MG92enk3TmlaQUdGU3U3aEhQYlpvOEJ2VDRvb1k0WENXWjQzWGVuNUNpTEJVc2syMkRuTkg5Qmd0c0YxaCszNDJKdmNxcGZ5WnFOZksvaFBXQld5MjN1UzdoMzhFUmcwNWZYNy83T0ZZL3ZYVlVzaEdtQkg4UTJZUzFQK3BGdk5MMFF6YzN1WEg5d0JKUExqMXN6eEhQVElMVms2SXBoUmJkd1FqZ0lzcjQxTVY2SVE9PSIsIm1hYyI6IjhkOGE3ZjM0YjY5MWIyMDRhYTQ1ODZmODdjZmUwYjM5OTk3YzMyNjc3YmUzYjFlYTRiYTBhMDU3ZWYxOTczYTciLCJ0YWciOiIifQ==', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '', NULL, '2024-01-15 07:00:31', '2024-02-23 18:21:58'),
(18, '18977', '101912322173085169254', NULL, '119799071', '', 'Nzenong Braxton', 'braxtonnzenong@gmail.com', 0, '699596551', 'molyko, house 24', NULL, '$2y$12$gE8CAbTPVMWfcUzmutmZ9uxosvpytNJxQqgnLdeY2h2ERR7pJAkF6', NULL, NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a/ACg8ocIkDC--DqyLOs2hYjrtEBCRtIlOQqxftVmabSrQ13y6tw=s96-c', 0, 'ya29.a0AfB_byC0GILOJAGXcivx4_AlcWhR-rh63pK9T9zmY1oLqAuSGaFdK9QNcCCmotnblR9Qzi0xzQLYjKWVJA91rsXi92fqKaGMFuNvj5D0K-yJPGO-ebE6TUz_GFW7HVfacT9xLnm3eAMOwYh24tZZcK6UlExOh7KoLqQaCgYKAWkSARMSFQHGX2MiLaIz0XApbFExCUL4OeMgjA0170', NULL, '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', '', NULL, '2024-01-20 11:58:33', '2024-02-25 11:55:04'),
(22, NULL, '101126556845711775973', NULL, NULL, '', 'extra spareparts', 'extraspareparts100@gmail.com', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'ya29.a0AfB_byDUjcOMOsaQYku0RGgKlj_u_hvYIDOB0joeEc3_5fuA-0tnE_glUfSXJP9fnS9timsmO24kz-DLzjV7G3tNxRW7CRC4aaY3OH6VoxnzespvXxKos0mVXnEvn8idrzRIQv3LsTRsSDJgGjxo1T8NdUCA2Md-2oPIaCgYKAU8SARASFQHGX2Mi_whlWDzoGLjuPoXcDddc5w0171', NULL, NULL, '', NULL, '2024-02-24 11:18:52', '2024-02-24 14:13:51'),
(23, NULL, '115471674120145768189', NULL, NULL, '', 'cyber lord', 'cyberlord2525@gmail.com', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'ya29.a0AfB_byDxTqqwDWNT7wAaB7VYaoygMXRE7zT5zyzjuHmuPeWHJKcpdd6Ny_oWcODdtJNbymiXUpv4xOS_atTesRYgxfUzFrV1hoXK0Qoz_COPUV-Ss_xvho5moyUyTNo4_VAEpuE2CuhfOgYElFFVzf7gXF84Cmbu6QaCgYKAX4SARISFQHGX2MiAFZAizXmIbnXkFWNj8vnYA0169', NULL, NULL, '', NULL, '2024-02-24 11:41:18', '2024-02-24 14:12:15'),
(24, NULL, '110936778395140520626', NULL, NULL, '', 'jack washington', 'jackwashington2525@gmail.com', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a/ACg8ocJj2F7MqdVmRqG0OYso0eRzMxS9i2Jw6xX7rEQtWofG=s96-c', 0, NULL, NULL, NULL, '', NULL, '2024-02-24 12:07:36', '2024-02-24 12:07:36'),
(27, NULL, '113551787314765497144', NULL, NULL, '', 'jacob bush', 'jacobbush2525@gmail.com', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'ya29.a0AfB_byCROhLCohFNO9raMZU-P77Nn7NsA0mmGKjo5kuft_r-JvGr73I3ro9c04s3WBourG1V4slo6fTxaU9VpFUB4MX6JQQ4-PuUSYbCT08DREC4t-l4wjdQ7J7jTUDRm6vWB7iYBlPy-O7aD5g8OiYuVPs_m53ZNAaCgYKAX0SARESFQHGX2MilEFgIN1Xxf9Qc9RVfE7pHA0169', NULL, NULL, '', NULL, '2024-02-24 12:46:07', '2024-02-24 12:46:07'),
(30, NULL, '105768671900768635969', NULL, NULL, '', 'light psychedelics', 'lightpsychedelics@gmail.com', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'ya29.a0AfB_byBRD2DdZFJmLNXeuEiWZ9ujZL-kOhwVZU0j5x9R5w09VH6O_BPEu2EHBsvFlUTMq52jibFsT592wwDvHMH7eVgA-TDn7pTW11SA1-JCyvSsgy5hmie6F_YBd4nfAGOVG8pkFEoviaWOEHRwKelyW1GFw38tewaCgYKAT0SARESFQHGX2MiGxXYIBFrhXPL_s8ozFZQdw0169', NULL, NULL, '', NULL, '2024-02-24 14:00:20', '2024-02-24 14:01:10');

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
  ADD UNIQUE KEY `users_user_id_unique` (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advert_documentations`
--
ALTER TABLE `advert_documentations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `news_letters`
--
ALTER TABLE `news_letters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
