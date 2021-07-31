-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2021 at 09:50 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hasty`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `type`, `mobile`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Umair Riaz', 'umair@gmail.com', 'super admin', '448448', 'admin_615.jpg', NULL, '$2y$10$d1iyyPjgHyIhXOc40DD9zOEPmdL8bSnd7QJ02aG4lwHzmBFFbEjYm', NULL, '2021-04-25 05:19:55', '2021-05-29 14:18:16'),
(2, 'Khurram', 'khurram@gmail.com', 'admin', '03132019924', 'admin_647.jpg', NULL, '$2y$10$0sCvEVyNNjM6MRe/emGlleNR63ExEqiXBi92wFZ13OSCGR5eHJ8q.', NULL, '2021-04-25 05:19:55', '2021-05-30 02:02:49'),
(3, 'Farrukh Riaz', 'farrukh@gmail.com', 'customer', '4211012', NULL, NULL, '$2y$10$JvA3VM5R3JftVJVK.Jxg3uGIuc8chbOpdGVowVhpGIn0wYKdzHiDG', NULL, '2021-04-25 05:19:55', '2021-04-25 05:19:55'),
(4, 'Ahmer Riaz', 'ahmer@gmail.com', 'subscriber', '4211012', NULL, NULL, '$2y$10$n9UjztoI12dKngaqml4qWuJE2ShwcLwTekug576aHnocaqfieqO.i', NULL, '2021-04-25 05:19:56', '2021-04-25 05:19:56');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `status`, `created_at`, `updated_at`, `image`) VALUES
(3, 'Sana Safinas', 0, '2021-06-06 09:20:38', '2021-06-06 09:22:06', 'hastybrand_25.jpg'),
(4, 'Asim Jofa', 0, '2021-06-06 09:20:58', '2021-06-06 09:23:53', 'hastybrand_1966.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) NOT NULL,
  `parent_id` bigint(20) NOT NULL DEFAULT 0,
  `cat_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_disc` double(8,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `section_id`, `parent_id`, `cat_title`, `cat_desc`, `cat_disc`, `image`, `slug`, `meta_title`, `meta_desc`, `meta_key`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'Casual t-shirts', 'Best Casual T-shirts', 0.00, 'no-image.png', 'categories/casual-tshirts', 'Casual Tshirts', 'Best Casual T-shirts', 'Casual Tshirts', 1, '2021-04-25 05:18:17', '2021-06-06 03:08:51'),
(3, 1, 1, 'Formal Shirts', 'wefwefwef', 2.00, 'hasty_1112.jpg', 'men-formal-shirts', 'wewefwef', 'wefwf', 'wefewf', 1, '2021-05-13 00:16:06', '2021-06-06 09:24:17'),
(4, 2, 0, 'Tshirts', 'wfweewf', 2.00, 'hasty_730.jpg', 'women-tshirts', 'Women Tshirts', 'newfowof', 'Tshirts', 1, '2021-05-13 00:17:36', '2021-06-06 09:24:18'),
(7, 1, 0, 'T-shirts', 'Best T-shirts', 2.00, 'hasty_1943.jpg', 'men-tshirts', 'Men T-shirts', 'Men Best T-shirts', 'tshirts', 1, '2021-05-16 06:18:05', '2021-05-29 14:11:47'),
(8, 1, 7, 'Casual T-shirts', 'wefwef', 5.00, 'hasty_380.jpg', 'men-casual-tshirts', 'Casual Tshirts', 'gignigreg', 'casual', 1, '2021-05-16 06:19:16', '2021-05-16 06:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_23_071413_create_admins_table', 1),
(5, '2021_04_23_194117_add_type_column_admins', 1),
(6, '2021_04_24_180120_add_image_column', 1),
(7, '2021_04_24_184217_add_mobile_no_column', 1),
(8, '2021_04_25_095603_create_categories_table', 1),
(9, '2021_04_25_100205_add_section_id_column', 1),
(10, '2021_04_25_100607_add_slug_column', 1),
(11, '2021_04_25_101118_create_sections_table', 1),
(12, '2021_05_13_050122_add_cat_disc_field', 2),
(13, '2021_05_15_154518_create_products_table', 3),
(14, '2021_05_15_160226_add_slug_field', 4),
(16, '2021_05_28_133033_add_size_field', 6),
(17, '2021_05_28_140139_create_product_attributes_table', 7),
(18, '2021_05_30_070739_create_product_images_table', 8),
(19, '2021_05_30_185414_create_product_images', 9),
(20, '2021_06_05_100213_create_brands_table', 10),
(21, '2021_06_06_081126_add_image_field', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `section_id` bigint(20) NOT NULL,
  `product_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_discount` double(8,2) NOT NULL,
  `product_weight` double(8,2) NOT NULL,
  `product_video` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `wash_care` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fabric` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pattern` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sleeve` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occassion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_featured` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `section_id`, `product_title`, `product_sku`, `product_color`, `product_price`, `product_discount`, `product_weight`, `product_video`, `product_image`, `product_desc`, `wash_care`, `fabric`, `pattern`, `sleeve`, `fit`, `occassion`, `slug`, `meta_title`, `meta_keywords`, `meta_desc`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(2, 4, 2, 'Best Formal T-shirts for Women', '9230013', 'red', 80.00, 5.00, 200.00, '', 'no-image.png', 'This is best Formal Tshirts for women', 'Yes Care', 'cotton', 'simple', 'short sleeves', 'loose', 'bussiness formal', 'best-formal-tshirts', 'Best Formal T-shirts for Women', 'Formal', 'Best formal t-shirts for Women', 'yes', 1, NULL, '2021-05-16 03:48:46'),
(3, 4, 2, 'Best Women Casual T-shirt', '11200', 'blue', 190.00, 5.00, 5.50, 'hasty_14.jpg', 'no-image.png', 'wfeweewf', 'efwwef', 'polyester', 'plain', 'half sleeves', 'regular', 'casual', 'women-casual-tshirt', 'Best Women collection', 'wqdwq ewefew', 'fwefw qwdwqd', 'no', 1, '2021-05-23 06:34:28', '2021-05-28 06:15:05'),
(4, 7, 1, 'Men Tops Shirts', '22110', 'yellow', 20.00, 3.00, 5.50, 'hasty_272.jpg', 'hasty_132.jpg', 'fwewf', 'efewe', 'wool', 'plain', 'full sleeves', 'regular', 'casual', 'tops-shirts', 'nwfi', 'nii', 'jweini', 'yes', 1, '2021-05-28 04:04:51', '2021-05-28 04:04:51');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `price` double(8,2) DEFAULT NULL,
  `stock` double(8,2) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `price`, `stock`, `status`, `sku`, `size`, `created_at`, `updated_at`) VALUES
(4, 4, 100.00, 300.00, 1, 'B1201', 'Large', '2021-05-29 09:35:40', '2021-05-29 14:12:13'),
(5, 4, 101.00, 301.00, 1, 'B1202', 'Medium', '2021-05-29 09:35:40', '2021-05-29 14:12:16');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'hasty_989.jpg', 1, '2021-06-05 01:37:55', '2021-06-05 02:59:43'),
(3, 3, 'hasty_cart_46.jpg', 1, '2021-06-05 01:37:55', '2021-06-05 04:29:31');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sec_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sec_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `sec_title`, `sec_desc`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Men', 'Men Clothing', 1, '2021-04-25 05:18:05', '2021-05-29 14:12:03'),
(2, 'Women', 'Women Clothing', 1, '2021-04-25 05:18:06', '2021-05-29 14:12:00'),
(3, 'Kids', 'Kids Clothing', 1, '2021-04-25 05:18:06', '2021-05-29 14:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
