-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2024 at 08:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_commerce_2024_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `created_by`, `name`, `slug`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 'Heidi Alston', 'heidi-alston', 'Sit ipsum consequat', 'Recusandae Voluptat', 'Cupidatat,do,aute,vo', 1, 0, '2024-03-27 11:35:18', '2024-03-27 11:35:18'),
(2, 1, 'Quentin Zimmerman', 'quentin-zimmerman', 'Blanditiis nulla nem', 'Quam nulla possimus', 'Cumque,perferendis,e', 0, 0, '2024-03-27 11:35:35', '2024-03-27 11:35:35');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_by`, `name`, `slug`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 'Britanney Kerr', 'britanney-kerr', 'Dolores voluptate fu', 'Nobis vel nemo labor', 'Est,praesentium,asp', 0, 1, '2024-03-27 11:24:48', '2024-04-01 13:15:13'),
(2, 1, 'Florence Reeves', 'florence-reeves', 'Commodo velit ad est', 'Tempor consequat Vo', 'Sapiente,voluptate,d', 0, 1, '2024-03-27 11:24:53', '2024-04-01 13:15:11'),
(3, 1, 'Chaim Kirk', 'chaim-kirk', 'Ad consequuntur nihi', 'In est quia dolorem', 'Aut,velit,eaque,sed', 0, 1, '2024-03-27 11:25:01', '2024-04-01 13:15:09'),
(4, 1, 'Electronics', 'electronics', 'Electronics', '<p>Electronics Electronics Electronics Electronics&nbsp;</p>', 'Electronics', 1, 0, '2024-04-01 13:16:54', '2024-04-01 13:16:54'),
(5, 1, 'Clothing', 'clothing', 'Clothing', '<p>Clothing</p>\r\n<p>&nbsp;</p>\r\n<p>Clothing</p>\r\n<p>&nbsp;</p>\r\n<p>Clothing</p>\r\n<p>&nbsp;</p>\r\n<p>Clothing</p>\r\n<p>&nbsp;</p>\r\n<p>Clothing</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 'ClothingClothingClothing', 1, 0, '2024-04-01 13:17:15', '2024-04-01 13:17:15'),
(6, 1, 'Home & Kitchen', 'home-kitchen', 'Home & Kitchen', '<p>Home &amp; Kitchen Home &amp; Kitchen Home &amp; Kitchen&nbsp;</p>', 'Home,&,KitchenHome,&,Kitchen', 1, 0, '2024-04-01 13:17:35', '2024-04-01 13:17:35'),
(7, 1, 'Sports & Outdoors', 'sports-outdoors', 'Sports & Outdoors', '', '', 1, 0, '2024-04-01 13:17:47', '2024-04-01 13:17:47'),
(8, 1, 'Books & Media', 'books-media', 'Books & Media', '', '', 1, 0, '2024-04-01 13:17:58', '2024-04-01 13:17:58');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `color_code` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `created_by`, `name`, `color_code`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 'Black', '#000000', 1, 0, '2024-03-27 12:15:40', '2024-03-27 12:15:40'),
(2, 1, 'Red', '#fa0000', 1, 0, '2024-03-27 12:15:48', '2024-03-27 12:15:48'),
(3, 1, 'Pink', '#e100ff', 1, 0, '2024-03-27 12:16:00', '2024-03-27 12:16:00'),
(4, 1, 'Orange', '#ff5900', 1, 0, '2024-03-27 12:16:12', '2024-03-27 12:16:12');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_26_060657_create_categories_table', 1),
(6, '2024_03_26_164121_create_sub_categories_table', 1),
(7, '2024_03_26_172806_create_products_table', 1),
(8, '2024_03_27_043954_create_brands_table', 1),
(9, '2024_03_27_051100_create_colors_table', 1),
(10, '2024_03_27_184843_create_product_colors_table', 2),
(12, '2024_03_27_195837_create_product_sizes_table', 3),
(13, '2024_03_28_034114_create_product_images_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `new_price` double NOT NULL DEFAULT 0,
  `old_price` double NOT NULL DEFAULT 0,
  `short_description` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `additional_info` text DEFAULT NULL,
  `shipping_returns` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `is_featured` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `created_by`, `category_id`, `sub_category_id`, `brand_id`, `title`, `slug`, `sku`, `new_price`, `old_price`, `short_description`, `description`, `additional_info`, `shipping_returns`, `meta_title`, `meta_description`, `meta_keywords`, `is_featured`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 4, 1, 'Duis deleniti dolore', 'duis-deleniti-dolore', 'SKU-1TSE6AF7', 819, 736, '<p><span style=\"font-size: 24pt;\"><strong>Provident neque vol</strong></span></p>', '<p>Eos commodi quaerat</p>', '<p>Magni dignissimos qu</p>', '<p>In aspernatur sit u</p>', 'In sit ipsum error', '<p>Omnis minima velit n</p>', 'Sint,maiores,quis,al', 0, 1, 0, '2024-03-27 13:16:00', '2024-03-29 13:05:50'),
(2, 1, 2, 3, 1, 'Enim unde id corrup', 'enim-unde-id-corrup', 'SKU-HBH1PWBY', 325, 592, '<p>I am delighted to share that I have recently started a new chapter in my career journey as an Assistant Software Engineer at&nbsp;<a href=\"https://www.linkedin.com/in/ihsaan-chandio-20aa11a5/\" data-entity-type=\"MINI_COMPANY\" data-attribute-index=\"0\" aria-invalid=\"true\">IG-Tech</a>. Joining this esteemed organization represents a significant milestone for me, and I am eager to leverage my skills in software development to contribute to <a href=\"https://www.linkedin.com/in/ihsaan-chandio-20aa11a5/\" data-entity-type=\"MINI_COMPANY\" data-attribute-index=\"0\" aria-invalid=\"true\">IG-Tech</a>\'s mission of delivering exceptional solutions to clients worldwide.</p>', '<p>I am delighted to share that I have recently started a new chapter in my career journey as an Assistant Software Engineer at&nbsp;<a href=\"https://www.linkedin.com/in/ihsaan-chandio-20aa11a5/\" data-entity-type=\"MINI_COMPANY\" data-attribute-index=\"0\" aria-invalid=\"true\">IG-Tech</a>. Joining this esteemed organization represents a significant milestone for me, and I am eager to leverage my skills in software development to contribute to <a href=\"https://www.linkedin.com/in/ihsaan-chandio-20aa11a5/\" data-entity-type=\"MINI_COMPANY\" data-attribute-index=\"0\" aria-invalid=\"true\">IG-Tech</a>\'s mission of delivering exceptional solutions to clients worldwide.&nbsp;</p>', '<p>I am delighted to share that I have recently started a new chapter in my career journey as an Assistant Software Engineer at&nbsp;<a href=\"https://www.linkedin.com/in/ihsaan-chandio-20aa11a5/\" data-entity-type=\"MINI_COMPANY\" data-attribute-index=\"0\" aria-invalid=\"true\">IG-Tech</a>. Joining this esteemed organization represents a significant milestone for me, and I am eager to leverage my skills in software development to contribute to <a href=\"https://www.linkedin.com/in/ihsaan-chandio-20aa11a5/\" data-entity-type=\"MINI_COMPANY\" data-attribute-index=\"0\" aria-invalid=\"true\">IG-Tech</a>\'s mission of delivering exceptional solutions to clients worldwide.&nbsp;</p>', '<p>I am delighted to share that I have recently started a new chapter in my career journey as an Assistant Software Engineer at&nbsp;<a href=\"https://www.linkedin.com/in/ihsaan-chandio-20aa11a5/\" data-entity-type=\"MINI_COMPANY\" data-attribute-index=\"0\" aria-invalid=\"true\">IG-Tech</a>. Joining this esteemed organization represents a significant milestone for me, and I am eager to leverage my skills in software development to contribute to <a href=\"https://www.linkedin.com/in/ihsaan-chandio-20aa11a5/\" data-entity-type=\"MINI_COMPANY\" data-attribute-index=\"0\" aria-invalid=\"true\">IG-Tech</a>\'s mission of delivering exceptional solutions to clients worldwide.&nbsp;</p>', 'Quia aliquid proiden', '<p>I am delighted to share that I have recently started a new chapter in my career journey as an Assistant Software Engineer at&nbsp;<a href=\"https://www.linkedin.com/in/ihsaan-chandio-20aa11a5/\" data-entity-type=\"MINI_COMPANY\" data-attribute-index=\"0\" aria-invalid=\"true\">IG-Tech</a>. Joining this esteemed organization represents a significant milestone for me, and I am eager to leverage my skills in software development to contribute to <a href=\"https://www.linkedin.com/in/ihsaan-chandio-20aa11a5/\" data-entity-type=\"MINI_COMPANY\" data-attribute-index=\"0\" aria-invalid=\"true\">IG-Tech</a>\'s mission of delivering exceptional solutions to clients worldwide.&nbsp;</p>', 'Sit,ea,doloremque,eo', 0, 1, 0, '2024-03-29 13:04:35', '2024-03-29 13:04:35'),
(3, 1, 2, 3, 1, 'Dolor dolor nihil co', 'dolor-dolor-nihil-co', 'SKU-L4IJ9HL4', 3, 345, 'Ut ex cumque ex et e', 'Voluptas aut culpa', 'Officiis repudiandae', 'Veniam rerum placea', 'Consequatur tempore', 'Deserunt fugiat temp', 'Lorem,animi,sint,vi', 0, 1, 0, '2024-03-29 13:16:32', '2024-03-29 13:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(62, 2, 4, '2024-03-29 13:04:35', '2024-03-29 13:04:35'),
(63, 2, 2, '2024-03-29 13:04:35', '2024-03-29 13:04:35'),
(64, 2, 1, '2024-03-29 13:04:35', '2024-03-29 13:04:35'),
(65, 1, 4, '2024-03-29 13:05:50', '2024-03-29 13:05:50'),
(66, 1, 3, '2024-03-29 13:05:50', '2024-03-29 13:05:50'),
(67, 1, 2, '2024-03-29 13:05:50', '2024-03-29 13:05:50'),
(68, 1, 1, '2024-03-29 13:05:50', '2024-03-29 13:05:50'),
(73, 3, 4, '2024-03-29 13:16:49', '2024-03-29 13:16:49'),
(74, 3, 3, '2024-03-29 13:16:49', '2024-03-29 13:16:49'),
(75, 3, 2, '2024-03-29 13:16:49', '2024-03-29 13:16:49'),
(76, 3, 1, '2024-03-29 13:16:49', '2024-03-29 13:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `original_name` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `size` int(10) UNSIGNED DEFAULT NULL,
  `extension` varchar(10) DEFAULT NULL,
  `order_by` int(11) NOT NULL DEFAULT 100,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `name`, `original_name`, `image_path`, `size`, `extension`, `order_by`, `created_at`, `updated_at`) VALUES
(1, 1, '1hi3mx5easx.jpg', '434574249_273709255822675_5816070372229791318_n.jpg', 'uploads/product_images/1hi3mx5easx.jpg', 7990, 'jpg', 2, '2024-03-29 10:58:33', '2024-03-29 11:21:50'),
(2, 1, '1wevfyaar8i.jpg', '434112212_939193480911150_7650590227976624396_n.jpg', 'uploads/product_images/1wevfyaar8i.jpg', 29639, 'jpg', 3, '2024-03-29 10:58:33', '2024-03-29 11:21:50'),
(3, 1, '1tlkwp71aog.jpg', '434190121_272271032633164_199124057549500042_n.jpg', 'uploads/product_images/1tlkwp71aog.jpg', 24013, 'jpg', 1, '2024-03-29 10:58:33', '2024-03-29 11:21:50'),
(4, 1, '1taj2owjrso.jpg', '433677763_939605177536647_417544952410013464_n.jpg', 'uploads/product_images/1taj2owjrso.jpg', 40816, 'jpg', 4, '2024-03-29 10:58:33', '2024-03-29 11:21:48'),
(5, 2, '2mw3a7d7tl4.jpg', '1711575187022-3.jpg', 'uploads/product_images/2mw3a7d7tl4.jpg', 76680, 'jpg', 100, '2024-03-29 13:04:35', '2024-03-29 13:04:35'),
(6, 2, '2zstyd3mgav.jpg', '1711575187608-2.jpg', 'uploads/product_images/2zstyd3mgav.jpg', 93944, 'jpg', 100, '2024-03-29 13:04:35', '2024-03-29 13:04:35'),
(7, 2, '296fsdvzmk2.jpg', '1711575187598-1.jpg', 'uploads/product_images/296fsdvzmk2.jpg', 85342, 'jpg', 100, '2024-03-29 13:04:35', '2024-03-29 13:04:35'),
(8, 3, '3w1vpxlo5fo.jpg', '434150588_912441464224682_9114891679296448938_n.jpg', 'uploads/product_images/3w1vpxlo5fo.jpg', 82896, 'jpg', 100, '2024-03-29 13:16:49', '2024-03-29 13:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(36, 2, 'Clementine Massey', 500.00, '2024-03-29 13:04:35', '2024-03-29 13:04:35'),
(37, 1, 'XLL', 12.00, '2024-03-29 13:05:50', '2024-03-29 13:05:50'),
(38, 1, 'X', 1000.00, '2024-03-29 13:05:50', '2024-03-29 13:05:50'),
(39, 1, 'M', 700.00, '2024-03-29 13:05:50', '2024-03-29 13:05:50'),
(40, 1, 'S', 500.00, '2024-03-29 13:05:50', '2024-03-29 13:05:50'),
(42, 3, 'Stewart Armstrong', 50.00, '2024-03-29 13:16:49', '2024-03-29 13:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `created_by`, `category_id`, `name`, `slug`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'Ivory Ayers', 'ivory-ayers', 'Animi accusamus qui', 'Voluptatem aspernatu', 'Lorem,velit,quis,vo', 0, 1, '2024-03-27 11:25:15', '2024-04-01 13:18:10'),
(2, 1, 3, 'Quintessa Navarro', 'quintessa-navarro', 'Expedita a atque nis', 'Iusto reprehenderit', 'Sed,reprehenderit,e', 0, 1, '2024-03-27 11:25:23', '2024-04-01 13:18:09'),
(3, 1, 2, 'Sybill Hopper', 'sybill-hopper', 'Ducimus iure ut odi', 'Deserunt cillum quis', 'Enim,consectetur,dol', 0, 1, '2024-03-27 11:25:30', '2024-04-01 13:18:07'),
(4, 1, 3, 'Hedwig Little', 'hedwig-little', 'Quam sunt hic labor', 'Ipsa excepturi omni', 'Enim,porro,aut,facil', 0, 1, '2024-03-27 11:25:37', '2024-04-01 13:18:05'),
(5, 1, 4, 'Smartphones', 'smartphones', 'Smartphones', '', '', 1, 0, '2024-04-01 13:18:31', '2024-04-01 13:18:31'),
(6, 1, 4, 'Laptops', 'laptops', 'Laptops', '', '', 1, 0, '2024-04-01 13:18:52', '2024-04-01 13:18:52'),
(7, 1, 4, 'TVs', 'tvs', 'TVs', '', '', 1, 0, '2024-04-01 13:19:04', '2024-04-01 13:19:04'),
(8, 1, 4, 'Cameras', 'cameras', 'Cameras', '', '', 1, 0, '2024-04-01 13:19:16', '2024-04-01 13:19:16'),
(9, 1, 5, 'Shirts', 'shirts', 'Shirts', '', '', 1, 0, '2024-04-01 13:19:40', '2024-04-01 13:19:40'),
(10, 1, 5, 'Pants', 'pants', 'Pants', '', '', 1, 0, '2024-04-01 13:19:52', '2024-04-01 13:19:52'),
(11, 1, 5, 'Jackets', 'jackets', 'Jackets', '', '', 1, 0, '2024-04-01 13:20:06', '2024-04-01 13:20:06'),
(12, 1, 6, 'Furniture', 'furniture', 'Furniture', '', '', 1, 0, '2024-04-01 13:20:26', '2024-04-01 13:20:26'),
(13, 1, 6, 'Kitchen Appliances', 'kitchen-appliances', 'Kitchen Appliances', '', '', 1, 0, '2024-04-01 13:20:37', '2024-04-01 13:20:37'),
(14, 1, 6, 'Home Decor', 'home-decor', 'Home Decor', '', '', 1, 0, '2024-04-01 13:20:49', '2024-04-01 13:20:49'),
(15, 1, 7, 'Fitness Equipment', 'fitness-equipment', 'Fitness Equipment', '', '', 1, 0, '2024-04-01 13:21:10', '2024-04-01 13:21:10'),
(16, 1, 7, 'Outdoor Gear', 'outdoor-gear', 'Outdoor Gear', '', '', 1, 0, '2024-04-01 13:21:25', '2024-04-01 13:21:25'),
(17, 1, 7, 'Sports Apparel', 'sports-apparel', 'Sports Apparel', '', '', 1, 0, '2024-04-01 13:21:39', '2024-04-01 13:21:39'),
(18, 1, 7, 'Camping Gear', 'camping-gear', 'Camping Gear', '', '', 1, 0, '2024-04-01 13:21:55', '2024-04-01 13:21:55'),
(19, 1, 8, 'Fiction', 'fiction', 'Fiction', '', '', 1, 0, '2024-04-01 13:22:06', '2024-04-01 13:22:06'),
(20, 1, 8, 'Non-Fiction', 'non-fiction', 'Non-Fiction', '', '', 1, 0, '2024-04-01 13:22:17', '2024-04-01 13:22:17'),
(21, 1, 8, 'Children\'s Books', 'childrens-books', 'Children\'s Books', '', '', 1, 0, '2024-04-01 13:22:28', '2024-04-01 13:22:28'),
(22, 1, 8, 'Magazines', 'magazines', 'Magazines', '', '', 1, 0, '2024-04-01 13:22:40', '2024-04-01 13:22:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `status`, `is_deleted`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ihsaan Chandio', 'admin@gmail.com', '2024-03-27 11:19:05', '$2y$10$t1KSaZ2Cdt9yiUL2eoDZM.FaBXWMWG89EmM0/sPt1pzNyizJJQfMq', 1, 1, 0, 'd24k14Yaow', '2024-03-27 11:19:05', '2024-03-27 11:19:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
