-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2023 at 07:13 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopquanao`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL,
  `json_information` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `is_super_admin` tinyint(1) NOT NULL DEFAULT '0',
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_at` datetime DEFAULT NULL,
  `admin_created_id` bigint(20) UNSIGNED DEFAULT '1',
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'M' COMMENT 'Giới tính M: nam',
  `birthday` date DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `function_id` bigint(20) UNSIGNED DEFAULT NULL,
  `degree_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `avatar`, `role`, `json_information`, `is_super_admin`, `status`, `remember_token`, `login_at`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`, `gender`, `birthday`, `phone`, `address`, `department_id`, `function_id`, `degree_id`) VALUES
(1, 'Thắng Nguyễn', 'huuthangb2k50@gmail.com', '$2y$10$YAZxnGGJPJfmHh.y1L0tv.eZfz9VvqbzH8EKQKx3q6S0FrlXgOUGS', '/themes/frontend/biz9/images/user.png', 1, NULL, 1, 'active', NULL, '2023-04-14 09:43:00', 1, 1, '2021-09-24 01:48:18', '2023-04-14 02:43:00', 'M', NULL, NULL, NULL, 1, NULL, NULL),
(2, 'Admin', 'admin@gmail.com', '$2y$10$A2ZVxBeus6Xo9UcoHdrAKektpW94OFmGr.duSN3ePepBlidSboPNC', NULL, 1, NULL, 1, 'active', NULL, '2023-06-03 14:12:50', 1, 1, '2022-09-23 09:44:45', '2023-06-03 07:12:50', 'M', NULL, NULL, NULL, 1, NULL, NULL),
(3, 'Nguyen Duong', 'duongnt04@gmail.com', '$2y$10$2pZ/j9fodiWd6w1GeeHh/..tWR7ycGS.9BF17VfNFG4Oh/FnuchGW', NULL, 1, NULL, 0, 'active', NULL, '2023-03-10 09:07:50', 1, 1, '2022-10-03 03:29:02', '2023-03-10 02:07:50', 'M', NULL, NULL, NULL, 1, NULL, NULL),
(4, 'Linh Lê', 'linhle@gmail.com', '$2y$10$s72A27skdsUWrN2A7WD53.GER3nPrLoQvxFWlB3f6VEoARFHx5qPq', NULL, 2, NULL, 0, 'active', NULL, NULL, 1, 1, '2022-10-03 03:33:00', '2022-10-03 03:33:00', 'M', NULL, NULL, NULL, 2, NULL, NULL),
(5, 'Hoàng Long', 'haduong@gmail.com', '$2y$10$UjF3ABKSt0uKl4w3fmQ2iO2rdIHItolkLKmKPi4nML4EF6Q/o0V4S', '/public/data/cms-image/huuthangb2k50/a7b75f828ce04da9a9e45cc8e67a2949%20(1).png', 1, NULL, 0, 'active', NULL, NULL, 1, 1, '2022-10-03 03:33:44', '2022-11-28 03:52:05', 'M', NULL, NULL, NULL, 2, NULL, NULL);

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(4, '2021_09_21_090133_create_admins_table', 1),
(5, '2021_09_29_090019_create_tb_options_table', 1),
(6, '2021_09_29_090048_create_tb_logs_table', 1),
(7, '2021_09_29_090107_create_tb_admin_menus_table', 1),
(8, '2021_09_29_090214_create_tb_modules_table', 1),
(9, '2021_09_29_090233_create_tb_module_functions_table', 1),
(10, '2021_09_29_090301_create_tb_roles_table', 1),
(11, '2021_09_29_090402_create_tb_menus_table', 1),
(12, '2021_09_29_090455_create_tb_blocks_table', 1),
(13, '2021_09_29_090509_create_tb_block_contents_table', 1),
(14, '2021_09_29_090709_create_tb_cms_taxonomys_table', 1),
(15, '2021_09_29_090743_create_tb_cms_posts_table', 1),
(16, '2021_10_09_013236_create_tb_pages_table', 1),
(17, '2021_10_26_210129_change_tb_users_table', 1),
(24, '2022_04_25_163138_create_tb_widgets_table', 3),
(25, '2022_04_25_163922_create_tb_components_table', 3),
(26, '2022_04_26_155008_create_tb_widget_configs_table', 4),
(27, '2022_04_26_155035_create_tb_component_configs_table', 4),
(28, '2022_06_02_102255_create_tb_bookings_table', 5),
(29, '2022_02_14_165457_create_tb_contacts_table', 6),
(30, '2022_02_14_170033_create_tb_orders_table', 6),
(31, '2022_02_14_170056_create_tb_order_details_table', 6),
(32, '2022_06_27_162451_create_tb_popups_table', 7),
(33, '2022_08_23_161159_create_tb_affiliates_table', 8),
(34, '2022_08_23_162428_create_tb_affiliates_table', 9),
(35, '2022_08_31_150106_add_column_posts', 10),
(36, '2022_08_31_152204_change_column_posts', 11),
(37, '2022_09_06_105720_change_column_posts_2', 12),
(38, '2022_09_10_103404_create_tb_post_comment_table', 13),
(39, '2022_09_13_095523_change_column_post_comment', 14),
(40, '2022_09_26_153846_created_table_tb_post_history', 15),
(41, '2022_10_07_150551_create_table_royalties', 15),
(42, '2022_10_14_164924_created_table_royalties', 16),
(43, '2022_10_14_165443_create_table_tb_royaltie', 17),
(44, '2022_10_14_175233_create_table_live_reporting', 18),
(45, '2022_10_14_175313_create_table_live_reporting_detail', 18),
(46, '2022_10_24_095513_create_table_online_exchange', 19),
(47, '2022_10_14_175233_create_table_experts', 20),
(48, '2022_10_24_100059_create_table_online_exchange_detail', 20),
(49, '2022_09_06_105720_create_table_resource', 21),
(50, '2022_11_24_141755_create_table_department', 22),
(51, '2022_11_24_141839_create_table_function', 22),
(52, '2022_11_24_141902_create_table_degree', 22),
(53, '2022_11_24_142303_change_column_table_admins', 22),
(54, '2022_11_24_170037_created_table_cms_document', 23),
(55, '2022_11_25_092548_create_table_message', 23),
(56, '2023_01_12_220328_create_table_products', 24);

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
-- Table structure for table `tb_admin_menus`
--

CREATE TABLE `tb_admin_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `is_check` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'deactive',
  `toolbar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_admin_menus`
--

INSERT INTO `tb_admin_menus` (`id`, `parent_id`, `name`, `icon`, `url_link`, `iorder`, `status`, `is_check`, `toolbar`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(3, 10, 'Quản lý người dùng', 'fa fa-user-plus', 'admins', 3, 'deactive', 'deactive', 'deactive', 1, 2, '2021-09-30 00:38:46', '2023-06-03 07:02:54'),
(5, 10, 'Quản lý nhóm quyền', 'fa fa-users', 'roles', 4, 'deactive', 'deactive', 'active', 1, 2, '2021-09-30 02:57:11', '2023-06-03 07:03:00'),
(6, 10, 'Quản lý Menu Admin', 'fa fa-tasks', 'admin_menus', 5, 'active', 'deactive', 'deactive', 1, 1, '2021-09-30 14:41:45', '2022-03-02 12:26:32'),
(10, NULL, 'Quản lý hệ thống', 'fa fa-server', NULL, 99, 'active', 'deactive', 'deactive', 1, 1, '2021-10-01 10:10:06', '2022-03-02 12:35:52'),
(13, NULL, 'Quản lý cấu hình', 'fa fa-home', NULL, 98, 'active', 'deactive', 'deactive', 1, 1, '2021-10-02 03:26:41', '2022-03-02 12:35:45'),
(42, 13, 'Quản lý Menu Website', 'fa fa-bars', 'menus', NULL, 'active', 'deactive', 'deactive', 1, 2, '2022-03-02 11:19:53', '2023-04-28 05:04:05'),
(43, 10, 'Khai báo tham số hệ thống', 'fa fa-wrench', 'options', 99, 'deactive', 'deactive', 'deactive', 1, 2, '2022-03-02 11:20:20', '2023-06-03 07:03:10'),
(44, 13, 'Quản lý hình ảnh hệ thống', 'fa fa-picture-o', 'web_image', NULL, 'active', 'deactive', 'deactive', 1, 1, '2022-03-02 11:23:03', '2022-03-02 12:20:05'),
(45, 13, 'Quản lý thông tin Website', 'fa fa-globe', 'web_information', NULL, 'active', 'deactive', 'deactive', 1, 1, '2022-03-02 11:23:28', '2022-03-02 12:34:25'),
(46, 13, 'Quản lý liên kết MXH', 'fa fa-share-alt-square', 'web_social', NULL, 'active', 'deactive', 'deactive', 1, 1, '2022-03-02 11:23:43', '2022-03-02 12:43:26'),
(51, NULL, 'Quản lý tin', NULL, 'cms_posts', NULL, 'active', 'deactive', NULL, 1, 1, '2022-05-30 01:46:23', '2022-10-26 07:13:15'),
(52, 69, 'Quản lý danh mục / thể loại', 'fa fa-bars', 'cms_taxonomys', 1, 'active', 'deactive', NULL, 1, 1, '2022-05-30 01:46:51', '2023-01-17 07:19:30'),
(53, 51, 'Tin tức', 'fa fa-newspaper-o', 'cms_posts', 1, 'active', 'active', NULL, 1, 1, '2022-05-30 02:56:47', '2023-02-10 07:37:11'),
(55, 51, 'Tin giới thiệu', 'fa fa-twitch', 'introduction', 9, 'deactive', 'deactive', NULL, 1, 1, '2022-05-30 02:57:21', '2023-04-01 04:11:10'),
(58, 13, 'Quản lý mã nhúng CSS - JS', NULL, 'web_source', NULL, 'deactive', 'deactive', NULL, 1, 2, '2022-06-06 19:41:52', '2023-06-03 04:39:04'),
(66, 69, 'Bình luận', 'fa fa-comment', 'comment', 9, 'deactive', 'deactive', NULL, 1, 1, '2022-09-19 04:41:50', '2022-11-28 03:51:08'),
(67, 10, 'Quản lý độc giả', 'fa fa-users', 'users', NULL, 'deactive', 'deactive', NULL, 1, 1, '2022-10-07 04:45:16', '2022-10-28 10:35:37'),
(69, NULL, 'Sản phẩm - Danh mục', 'fa fa-cog', NULL, 1, 'active', 'deactive', NULL, 1, 1, '2022-10-11 07:40:32', '2023-02-10 07:36:50'),
(80, 69, 'Quản lý khối nội dung', 'fa fa-object-group', 'block_contents', 9, 'active', 'deactive', NULL, 1, 1, '2022-10-28 08:47:09', '2023-02-02 10:43:37'),
(84, 69, 'Quản lý sản phẩm', 'fa fa-bitbucket', 'cms_products', NULL, 'active', 'active', NULL, 1, 2, '2023-01-12 15:24:15', '2023-05-10 04:52:34'),
(85, 10, 'Quản lý blocks', NULL, 'blocks', NULL, 'deactive', 'deactive', NULL, 1, 2, '2023-03-31 04:22:37', '2023-06-03 07:02:47'),
(86, 51, 'Đội ngũ bác sĩ', 'fa fa-user-plus', 'profile', NULL, 'deactive', 'deactive', NULL, 1, 2, '2023-03-31 09:35:30', '2023-06-03 04:31:30'),
(87, 51, 'Media', 'fa fa-file-video-o', 'cms_media', NULL, 'deactive', 'deactive', NULL, 2, 2, '2023-04-28 08:56:06', '2023-06-03 04:31:23'),
(88, 51, 'Đặt lịch', 'fa fa-calendar', 'contacts', NULL, 'deactive', 'deactive', NULL, 2, 2, '2023-05-05 03:13:32', '2023-06-03 04:31:18'),
(89, 69, 'Quản lý đơn hàng', NULL, 'order_products', NULL, 'active', 'deactive', NULL, 2, 2, '2023-05-29 04:59:31', '2023-05-29 07:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_blocks`
--

CREATE TABLE `tb_blocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `block_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `is_config` tinyint(1) NOT NULL DEFAULT '1',
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_blocks`
--

INSERT INTO `tb_blocks` (`id`, `name`, `description`, `block_code`, `json_params`, `is_config`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(30, 'Khối nội dung slide', NULL, 'slide', NULL, 1, NULL, 'active', 1, 1, '2023-03-31 04:23:32', '2023-03-31 04:23:32'),
(31, 'Khối nội dung đầu trang', NULL, 'header', NULL, 1, NULL, 'active', 2, 2, '2023-04-28 01:33:50', '2023-04-28 01:40:58'),
(32, 'Khối nội dung dịch vụ nổi bật', NULL, 'service', NULL, 1, NULL, 'active', 2, 2, '2023-04-28 01:34:05', '2023-04-28 01:34:05'),
(33, 'Khối nội dung đội ngũ bác sĩ', NULL, 'doctor', NULL, 1, NULL, 'active', 2, 2, '2023-04-28 01:37:30', '2023-04-28 01:37:30'),
(34, 'Khối nội dung giới thiệu', NULL, 'introduce', NULL, 1, NULL, 'active', 2, 2, '2023-04-28 01:37:53', '2023-04-28 01:37:53'),
(35, 'Khối nội dung video', NULL, 'video', NULL, 1, NULL, 'active', 2, 2, '2023-04-28 01:39:14', '2023-04-28 01:39:14'),
(36, 'Khối nội dung tin tức nổi bật', NULL, 'hot-news', NULL, 1, NULL, 'active', 2, 2, '2023-04-28 01:39:36', '2023-04-28 01:40:17'),
(37, 'Khối nội dung tin tức mới nhất', NULL, 'latest-news', NULL, 1, NULL, 'active', 2, 2, '2023-04-28 01:40:11', '2023-04-28 01:40:11'),
(38, 'khối nội dung chân trang', NULL, 'footer', NULL, 1, NULL, 'active', 2, 2, '2023-04-28 01:40:51', '2023-04-28 01:40:51');

-- --------------------------------------------------------

--
-- Table structure for table `tb_block_contents`
--

CREATE TABLE `tb_block_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brief` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `block_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_link_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `system_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `link_iframe` text COLLATE utf8mb4_unicode_ci,
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_block_contents`
--

INSERT INTO `tb_block_contents` (`id`, `parent_id`, `title`, `brief`, `content`, `block_code`, `json_params`, `image`, `image_background`, `icon`, `url_link`, `url_link_title`, `position`, `system_code`, `iorder`, `status`, `link_iframe`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(109, NULL, 'SLIDE', 'Bao gồm các hình ảnh slide', NULL, 'slide', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'active', NULL, 1, 2, '2023-03-31 04:28:03', '2023-04-28 02:50:04'),
(110, 109, 'Ảnh slide 1', NULL, NULL, 'slide', NULL, '/public/upload/admin/slide1.jpg', '/public/upload/admin/slider3.jpg', NULL, '#', NULL, NULL, NULL, NULL, 'active', NULL, 1, 2, '2023-03-31 04:31:21', '2023-05-10 03:25:57'),
(111, 109, 'Ảnh slide 2', NULL, NULL, 'slide', NULL, '/public/upload/admin/silde2.png', '/public/upload/admin/slider2.jpg', NULL, '#', NULL, NULL, NULL, NULL, 'active', NULL, 1, 2, '2023-03-31 04:31:55', '2023-05-10 03:25:44');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cms_posts`
--

CREATE TABLE `tb_cms_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `taxonomy_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'post',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brief` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'waiting',
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_coppy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_part` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `torder` int(11) DEFAULT '1',
  `iorder` int(11) DEFAULT '1',
  `news_position` int(11) DEFAULT '0',
  `number_like` int(11) DEFAULT NULL,
  `number_comment` int(11) DEFAULT NULL,
  `number_view` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `number_download` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `nhuanbut` int(11) DEFAULT '0',
  `aproved_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `rating` double(18,2) DEFAULT NULL,
  `category` text COLLATE utf8mb4_unicode_ci,
  `cms_tag` text COLLATE utf8mb4_unicode_ci,
  `relation` text COLLATE utf8mb4_unicode_ci,
  `comment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'open',
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(11) DEFAULT NULL COMMENT 'tài khoản người dùng',
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `iframe_video` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_cms_posts`
--

INSERT INTO `tb_cms_posts` (`id`, `taxonomy_id`, `is_type`, `title`, `brief`, `content`, `json_params`, `image`, `image_thumb`, `status`, `author`, `url_coppy`, `url_part`, `torder`, `iorder`, `news_position`, `number_like`, `number_comment`, `number_view`, `number_download`, `nhuanbut`, `aproved_date`, `rating`, `category`, `cms_tag`, `relation`, `comment_status`, `seo_title`, `seo_keyword`, `seo_description`, `user_id`, `admin_updated_id`, `admin_created_id`, `created_at`, `updated_at`, `iframe_video`) VALUES
(695, 70, 'post', 'Đôi Nét Về Thông Tin Showroom Thế Giới Thời Trang Baby', 'Showrooom Thế Giới Thời Trang Baby là viên gạch đầu tiên trong chiến dịch phủ sóng thị trường bán lẻ, sau 3 năm hoạt động trong mảng bỏ sỉ quần áo trẻ em tại Việt Nam', '<p><span style=\"color:rgb(128,0,0);\">❖</span><span style=\"color:rgb(0,0,0);\"> Showrooom </span><a href=\"https://thegioithoitrangbaby.vn/\"><span style=\"color:rgb(0,51,102);\"><strong>Thế Giới Thời Trang Baby Tân Bình</strong></span></a><span style=\"color:rgb(0,0,0);\"> là viên gạch đầu tiên trong chiến dịch phủ sóng thị trường bán lẻ, sau 3 năm hoạt động trong mảng bỏ sỉ quần áo trẻ em tại Việt Nam. Với những gì đã đạt được trong lĩnh vực bán sỉ và niềm tin của hàng triệu khách hàng đã dành cho Thế Giới Thời Trang Baby. Hy vọng với sự ra đời mảng lẻ chúng tôi sẽ mang lại những lợi ích cao nhất dành cho khách hàng.</span></p><figure class=\"image\"><img src=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2018/09/cua-hang-the-gioi-thoi-trang-baby.jpg\" alt=\"\" srcset=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2018/09/cua-hang-the-gioi-thoi-trang-baby.jpg 600w, https://thegioithoitrangbaby.vn/wp-content/uploads/2018/09/cua-hang-the-gioi-thoi-trang-baby-300x169.jpg 300w\" sizes=\"100vw\" width=\"600\"></figure><p style=\"text-align:center;\"><span style=\"color:rgb(0,0,0);\"><i>Một góc tại Showroom Thế Giới Thời Trang Baby Tân Bình</i></span></p><p>&nbsp;</p><p><span style=\"color:rgb(128,0,0);\">❖</span><span style=\"color:rgb(0,0,0);\"> Toạ lạc Showroom Thế Giới Thời Trang Baby nằm tại 126 Trần Văn Quang, P.10, Q.Tân Bình, TP Hồ Chí Minh. Đây là con đường cầu nối giữa 2 tuyến đường trung tâm nhất của quận Tân Bình đó là Âu Cơ và Lạc Long Quân.</span></p><p><span style=\"color:rgb(128,0,0);\">❖</span><span style=\"color:rgb(0,0,0);\"> Showroom Thế Giới Thời Trang Baby có tổng diện tích hơn 100m2, được thiết kế theo phong cách hiện đại đạt chuẩn châu Âu nhằm tạo ra không gian thực nhất giúp cho Quý khách hàng có thể dễ dàng chiêm ngưỡng và lựa chọn cho mình những bộ quần áo đẹp nhất dành cho bé yêu nhà mình.</span></p><p><span style=\"color:rgb(128,0,0);\">❖</span><span style=\"color:rgb(0,0,0);\"> Bên trong Showroom Thế Giới Thời Trang Baby sẽ được trưng bày gần 1000 mẫu mã sản phẩm các loại từ </span><a href=\"https://thegioithoitrangbaby.vn/danh-muc/quan-ao-so-sinh/\"><span style=\"color:rgb(0,51,102);\"><strong>quần áo sơ sinh</strong></span></a><span style=\"color:rgb(0,0,0);\"> (3-6 tháng tuổi) cho đến những mẫu quần áo thời trang dành cho bé từ (1 đến 13 tuổi), cùng với đó là hàng trăm mẫu phụ kiện cực xinh để phối cùng với trang phục cho bé.</span></p><p>&nbsp;</p><blockquote><p><span style=\"color:rgb(0,0,0);\"><i><strong>Thông tin về Công ty Thế Giới Thời Trang Baby</strong></i></span></p><p><span style=\"color:rgb(255,0,0);\"><i>❁</i></span><span style=\"color:rgb(0,0,0);\"><i> Thế Giới thời Trang Baby được thành lập vào 12 tháng 7 năm 2016. Tuy có “tuổi đời” non trẻ nhưng hiện nay đã có hàng triệu trẻ em Việt Nam đang sở hữu những mẫu </i></span><a href=\"https://thegioithoitrangbaby.com/\"><span style=\"color:rgb(0,51,102);\"><i><strong>quần áo trẻ em</strong></i></span></a><span style=\"color:rgb(0,0,0);\"><i>&nbsp;chất lượng từ Thế Giới Thời Trang Baby.</i></span></p><p><span style=\"color:rgb(255,0,0);\"><i>❁</i></span><span style=\"color:rgb(0,0,0);\"><i> Không chỉ là nơi được những khách hàng buôn sỉ, đại lý shop, đại lý bán hàng online,…tin dùng để lấy sỉ. Chúng tôi cũng đang nổi lực để xây dựng và phát triển chuỗi hệ thống cửa hàng quần áo trẻ em AN TOÀN dành cho trẻ em Việt Nam.</i></span></p><p><span style=\"color:rgb(255,0,0);\"><i>❁</i></span><span style=\"color:rgb(0,0,0);\"><i> Hiện tại, chúng tôi đang cung cấp hơn 5 ngàn sản phẩm <strong>AN TOÀN</strong>,<strong> TIỆN ÍCH</strong>, được chứng nhận an toàn cho cho trẻ em, không chỉ giúp bé yêu đẹp mà còn khỏe mạnh.</i></span></p><p><span style=\"color:rgb(255,0,0);\"><i>❁</i></span><span style=\"color:rgb(0,0,0);\"><i> Thế Giới Thời Trang Baby mong muốn sẽ trở thành người bạn đồng hành đáng tin cậy của hàng triệu bà mẹ trẻ năng động trên khắp Việt Nam.</i></span></p><p style=\"text-align:right;\"><span style=\"color:rgb(0,0,0);\"><i>Thế Giới Thời Trang Baby – Nơi Thiên Thần Tỏa Sáng</i></span></p></blockquote>', NULL, 'https://thegioithoitrangbaby.vn/wp-content/uploads/2018/09/cua-hang-the-gioi-thoi-trang-baby.jpg', NULL, 'active', NULL, NULL, 'doi-net-ve-thong-tin-showroom-the-gioi-thoi-trang-baby', 1, 1, 0, NULL, NULL, '9', '0', 0, '2023-05-11 16:10:11', NULL, NULL, NULL, NULL, 'open', NULL, NULL, NULL, NULL, 2, 2, '2023-05-11 09:10:11', '2023-06-03 07:09:46', NULL),
(696, 70, 'post', 'Phương Thức Thanh Toán Và Cách Thức Vận Chuyển Khi Mua Hàng', 'Quý khách hàng mua sản phẩm tại Thế Giới Thời Trang Baby, có thể dễ dàng thanh toán bằng nhiều hình thức khác nhau và đảm bảo thời gian vận chuyển tối ưu nhất dành cho khách hàng.', '<h3><span style=\"color:rgb(0,0,0);\"><strong>Phương thức thanh toán:</strong></span></h3><p><span style=\"color:rgb(0,0,0);\">? Thanh toán trực tiếp: Khi Quý hàng mua tại Showroom có thể thanh toán trực tiếp bằng tiền mặc hoặc thẻ tín dụng.</span></p><p><span style=\"color:rgb(0,0,0);\">? Thanh toán COD: Với những kháhc hàng ở xa mua Online có thể áp dụng chế độ thanh toán COD, chúng tôi sẽ giao hàng và nhận thanh toán khi Quý khách kiểm tra hàng xong.</span></p><p><span style=\"color:rgb(0,0,0);\">? Thánh toán qua hình thức chuyển khoản: Đối với những khách hàng mua hàng Online, thì có thể chuyển khoản qua tài khoản ngân hàng của chúng tôi.</span></p><h3><span style=\"color:rgb(0,0,0);\"><strong>&nbsp;Cách thức vận chuyển:</strong></span></h3><p><span style=\"color:rgb(0,0,0);\">&nbsp;Tất cả các khách hàng khi đặt hàng sẽ được vận chuyển đến tận nhà thông qua hình thức liên kết với các đơn vị giao hàng lớn hiện nay như Bưu điện, ViettelPost, Giaohangnhanh, Giaohangtietkiem,…</span></p><p><span style=\"color:rgb(0,0,0);\">&nbsp;Còn đối với những khách sỉ ở tỉnh, thì chúng tôi sẽ miễn phí vận chuyển hàng đến chành xe gần nhất của Quý khách.</span></p>', NULL, '/public/upload/admin/7-ly-do-nen-chon-the-gioi-thoi-trang-baby-300x168.jpg', NULL, 'active', NULL, NULL, 'phuong-thuc-thanh-toan-va-cach-thuc-van-chuyen-khi-mua-hang', 1, 1, 0, NULL, NULL, '8', '0', 0, '2023-05-11 16:11:55', NULL, NULL, NULL, NULL, 'open', NULL, NULL, NULL, NULL, 2, 2, '2023-05-11 09:11:55', '2023-06-03 07:09:30', NULL),
(697, 70, 'post', '5 Cách Phối Phụ Kiện Cùng Đầm Maxi Cho Bé Gái', 'Mỗi khi đi du lịch cùng với gia đình, nhất là khi đi du lịch tại các vùng biển thì sự lựa chọn đầu tiên của các bà mẹ dành cho con gái chính là những chiếc đầm maxi dịu dàng và thướt tha.', '<p>&nbsp;</p><figure class=\"image\"><img src=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/cach-ket-hop-ph%E1%BB%A5-kien.jpg\" alt=\"\" srcset=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/cach-ket-hop-phụ-kien.jpg 721w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/cach-ket-hop-phụ-kien-300x238.jpg 300w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/cach-ket-hop-phụ-kien-600x475.jpg 600w\" sizes=\"100vw\" width=\"600\"></figure><p style=\"text-align:center;\"><br><i>Đầm Maxi cho bé gái trang phục không thể thiếu trong mùa hè</i></p><p style=\"text-align:justify;\">Việc phối những phụ kiện thời trang với đầm maxi cho bé gái sao cho hợp thời trang và bắt kịp xu hướng không phải là việc mà ai cũng có thể làm được. Tuy nhiên điều đó sẽ trở nên dễ dàng hơn nếu bạn biết và tận dụng những cách sau đây, thì việc phối những món phụ kiện với đầm maxi cho bé gái không còn là điều khó khăn nữa.</p><h2><strong>5 Cách Phối Phụ Kiện Cùng Đầm Maxi Cho Bé Gái</strong></h2><h3><strong>1.Đôi giày sadal</strong></h3><figure class=\"image\"><img src=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/cach-ket-hop-phu-kien.jpg\" alt=\"\" srcset=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/cach-ket-hop-phu-kien.jpg 800w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/cach-ket-hop-phu-kien-150x150.jpg 150w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/cach-ket-hop-phu-kien-300x300.jpg 300w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/cach-ket-hop-phu-kien-768x768.jpg 768w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/cach-ket-hop-phu-kien-600x600.jpg 600w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/cach-ket-hop-phu-kien-100x100.jpg 100w\" sizes=\"100vw\" width=\"500\"></figure><p style=\"text-align:center;\"><br><i>Giày Sadal </i><a href=\"https://thegioithoitrangbaby.vn/danh-muc/phu-kien-cho-be/\"><span style=\"color:rgb(0,51,102);\"><i><strong>phụ kiện cho bé</strong></i></span></a><i> mang đến sự tinh tế</i></p><p>✥ Giày sadal luôn thể hiện sự năng động và hòa nhã của người mặc được biệt những đôi giày sadal là món phụ kiện rất phù hợp với những chiếc đầm maxi mà hầu hết mọi người ai cũng lựa chọn.</p><h4><strong>Với những chiếc đầm maxi ngắn.</strong></h4><p>✥ Những đôi giày sadal dây chiến binh hoặc có đế cao sẽ rất phù với những chiếc đầm maxi ngắn, bởi những loại giày này sẽ tôn lên được vẻ đẹp các tính và thời trang cho bé gái của bạn.</p><p>✥ Tuy nhiên thì bạn đừng nên chọn những đôi giày quá cao hay quá nhiều gây sẽ khiến bé trông già hơn so với độ tuổi và đặc biệt còn rất nguy hiểm cho bé.<br>Với những chiếc đầm maxi dài</p><h4><strong>Với những chiếc đầm maxi dài</strong></h4><p>✥ Những chiếc đầm maxi dài sẽ vô cùng phù hợp với những đôi giày sadal đế bằng, có quai ngang hoặc quai kẹp , sẽ giúp có một vẻ đẹp diệu dàng và trong sáng.</p><p>✥ Các mẹ nên chọn những đôi giày không quá cầu kì và có những chi tiết đơn giản dễ mang khi mang vào bé cảm thấy thoải mái.</p><h3><strong>2. Mũ rộng vành</strong></h3><figure class=\"image\"><img src=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/cach-ket-hop-phu-kien-5.jpg\" alt=\"\" srcset=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/cach-ket-hop-phu-kien-5.jpg 550w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/cach-ket-hop-phu-kien-5-300x218.jpg 300w\" sizes=\"100vw\" width=\"550\"></figure><p style=\"text-align:center;\"><br>Chiếc mũ này là phụ kiện ăn ý với những chiếc váy maxi</p><p>✥ Mũ rộng vành sẽ là sự kết hợp vô cùng tuyệt vời với đầm maxi cho bé gái, không chỉ giúp bé hạn chế được những tia nắng tiếp xúc vào da mà còn giúp chiếc đầm trở nên thời trang và phong cách hơn.</p><p>✥ Các mẹ có thể chọn kiểu dáng của chiếc mũ tùy theo ý thích của mình. Tùy vào hình dáng cơ thể của bé và độ dài của chiếc đầm mà các mẹ chọn lựa sao cho thật phù hợp</p><p>✥ Nếu bé có khuôn mặt và thân hình nhỏ nhắn thì bạn đừng nên chọn những chiếc mũ quá rộng, điều này rất dễ gây vướng víu và khó chịu cho bé, bên cạnh có tổng thể bộ trang phục lại không được hài hòa.</p><p>✥Ngược lại nếu bé có khuôn mặt tròn trịa, mũm mĩm thì bạn nên chọn những chiếc có vành rộng,sẽ giúp khuôn mặt của bé trở nên thon thả hơn.</p><p>✥Vậy nên các mẹ nhớ cân nhắc hình dáng của bé trước khi chọn cho bé một chiếc mũ rộng vành nhé. Nếu làm tốt việc này thì bé của bạn sẽ có một vẻ đẹp vừa yêu kiều vừa tao nhã &nbsp;với chiếc mũ đấy.</p><h3><strong>3 Kính mát</strong></h3><figure class=\"image\"><img src=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/cach-ket-hop-phu-kien-4.jpg\" alt=\"\" srcset=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/cach-ket-hop-phu-kien-4.jpg 640w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/cach-ket-hop-phu-kien-4-150x150.jpg 150w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/cach-ket-hop-phu-kien-4-300x300.jpg 300w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/cach-ket-hop-phu-kien-4-600x600.jpg 600w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/cach-ket-hop-phu-kien-4-100x100.jpg 100w\" sizes=\"100vw\" width=\"500\"></figure><p style=\"text-align:center;\"><i>Kính mát và đầm maxi cũng là cặp đôi hoàn hảo</i></p><p>✥ Kính mát và đầm maxi là cặp đôi hoàn hảo giúp bé thành quý cô đáng yêu và đầy thu hút.</p><p>✥ Chiếc mắt kính còn có tác dụng che bớt những tia nắng mặt trời tiếp xúc vào mắt của bé làm ảnh hưởng tới thị lực của Bé.</p><p>✥ Với những cô bé thì bạn nên chọn gọng mảnh có phần mắt gọn gàng và màu sắc nhẹ nhàng sẽ rất phù hợp và sang trọng.</p><p>✥ Nếu chiếc đầm maxi của bé là màu trắng thì bạn có thể phối với những đôi kính mát tùy màu mà bạn thích.</p><p>✥ Còn đối với những chiếc váy maxi có nhiều màu sắc thì bạn nên chọn cặp kính màu đen hoặc những màu sao cho phù hợp với chiếc váy.</p><h3><strong>4.Vòng cổ</strong></h3><p>✥ Một chiếc vòng cổ sẽ giúp bé gái của bạn che bớt đi khuyết điểm bờ vai và tạo cảm giác mãnh mai cho đôi vai của bé.</p><p>✥ Những chiếc vòng cổ đơn giản, với kích thước nhỏ và mỏng sẽ giúp bé gái của bạn có một vẻ ngoài dịu dàng và đầm thấm</p><p>✥ Còn những chiếc vòng cổ to, cầu&nbsp;kì và nhiều chi tiết sẽ giúp bé có một vẻ ngoài cá tính, năng động và có phần tinh anh.</p><p>✥ Tùy vào có tính và sở thích của mỗi bé mà các mẹ cân nhắc để lựa chọn một vòng cổ phù hợp cho bé của mình nhé.</p><h3><strong>5.Vòng tay</strong></h3><figure class=\"image\"><img src=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/cach-ket-hop-phu-kien-8.jpg\" alt=\"\" srcset=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/cach-ket-hop-phu-kien-8.jpg 730w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/cach-ket-hop-phu-kien-8-300x222.jpg 300w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/cach-ket-hop-phu-kien-8-600x445.jpg 600w\" sizes=\"100vw\" width=\"600\"></figure><p style=\"text-align:center;\"><br><i>Vòng đeo tay sẽ giúp bé trở nên thu hút hơn</i></p><p>✥Vòng tay không thể không nhắc đến trong bài viết của ngày hôm nay, vì những chiếc vòng tay luôn là sự lựa chọn hàng đầu bởi tính đa dạng và lại phù hợp với mọi hoàn cảnh.</p><h4><strong>Với những chiếc </strong><a href=\"https://thegioithoitrangbaby.vn/danh-muc/dam-be-gai/\"><strong>đầm bé gái</strong></a><strong> có tông màu lạnh và đơn điệu</strong></h4><p>✥ Nếu bạn chọn cho bé một chiếc đầm đơn giản và màu sắc không mấy nổi bật mà bạn lại muốn chiếc váy được nổi bật hơn thì những chiếc vòng tay có màu sắc tương phản với màu váy, thiết kế cầu kì và rực rỡ sẽ giúp con của bạn trông nổi bật và thời trang hơn.</p>', NULL, 'https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/cach-ket-hop-phu-kien-2-1024x576.jpg', NULL, 'active', NULL, NULL, '5-cach-phoi-phu-kien-cung-dam-maxi-cho-be-gai', 1, 1, 0, NULL, NULL, '0', '0', 0, '2023-05-11 16:12:46', NULL, NULL, NULL, NULL, 'open', NULL, NULL, NULL, NULL, 2, 2, '2023-05-11 09:12:46', '2023-05-11 09:12:57', NULL),
(698, 70, 'post', 'Top 3 Đầm Phụ Dâu Bé Gái Đẹp Ngất Ngay Trong Ngày Cưới', 'Bạn đang tìm một bộ trang phục cho cô bé phụ dâu của mình? Bạn đang băn khoăn không biết phải lựa chọn trang phục như thế nào? Chọn những chiếc đầm như thế nào vừa phù hợp vừa thời trang?', '<p>Lựa chọn đầm phụ dâu cho bé gái phải cần cân nhắc rất nhiều yếu tố để làm sao cho bé gái của bạn thật xinh xắn và đáng yêu. Nhưng bên cạnh đó cũng phải cho bé gái cảm thấy thật thoải mái và dễ chịu để các bé có thể, thể hiện được vai trò phù dâu của mình trong ngày cưới. Sau đây là&nbsp;Top 3 <a href=\"https://thegioithoitrangbaby.vn/top-3-dam-phu-dau-be-gai-dep-ngat-ngay-trong-ngay-cuoi/\"><span style=\"color:rgb(0,51,102);\"><strong>Đầm Phụ Dâu Bé Gái</strong></span></a> Đẹp Nhất mà các mẹ cần tham khảo để lựa chọn trang phục phù hợp cho bé gái của mình.</p><h3><strong>1 Đầm Bé Gái Thời Trang DA37</strong></h3><p>✥ Đây là chiếc đầm vô cùng phù hợp với mọi hoàn cảnh tuy nhiên còn rất phù hợp để làm phụ dâu trong nữa đấy.</p><p>✥ Có thể nói <a href=\"https://thegioithoitrangbaby.vn/danh-muc/dam-be-gai/\"><span style=\"color:rgb(0,51,102);\"><strong>Đầm Bé Gái</strong></span></a> Thời Trang DA37 là một tuyệt tác vô cùng hoàn hảo cả về kiểu dáng và chất lượng. Là một ứng viên xứng đáng cho vị trí top 3 đầm phụ dâu bé gái đẹp nhất.</p><figure class=\"image\"><img src=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2018/09/dam-be-gai-thoi-trang-da37-e.jpg\" alt=\"\" srcset=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2018/09/dam-be-gai-thoi-trang-da37-e.jpg 700w, https://thegioithoitrangbaby.vn/wp-content/uploads/2018/09/dam-be-gai-thoi-trang-da37-e-247x300.jpg 247w, https://thegioithoitrangbaby.vn/wp-content/uploads/2018/09/dam-be-gai-thoi-trang-da37-e-600x729.jpg 600w\" sizes=\"100vw\" width=\"412\"></figure><p style=\"text-align:center;\"><br><i>Đầm Bé Gái Thời Trang DA37</i></p><h4><strong>Điểm nổi bật ở chất liệu Đầm Bé Gái Thời Trang DA37</strong></h4><p>✥Đầm Bé Gái Thời Trang DA37 được làm từ chất liệu ren, một chất liệu đại diện cho sự sang trọng và quý phái.</p><p>✥Với chất liệu ren này bé của bạn sẽ trở nên vô cùng dịu dàng và thướt tha lại còn rất duyên dáng với vai trò phụ dâu trong ngày cưới.</p><p>✥Bên cạnh đó chiếc đầm còn được phủ lớp vải cotton bên bên trong đây là loại vô cùng thoáng mát và thấm hút mồ cực tốt giúp bé tự tin thể tốt vai trò của mình.</p><p>✥Các đường chỉ may của Đầm Bé Gái Thời Trang DA37 rất chắc chắn nên việc chiếc váy đột nhiên bị bung chỉ, &nbsp;là điều các mẹ không cần phải lo lắng.<br>Cách thiết kế tao nhã nhưng đầy lôi cuốn.</p><h4><strong>Đầm Bé Gái Thời Trang DA37 là một thiết kế đơn giản nhưng lôi cuốn</strong></h4><h4><strong>✥ Tuy đây là một thiết kế đơn giản nhưng lại khiến cho người khác phải nhìn đi nhìn lại nhiều lần.</strong></h4><p>✥Màu trắng xám của chiếc đầm thể hiện sự tinh khôi và thuần khiết, khi khoát lên người bé của bạn sẽ mang một vẻ đẹp vô cùng trong sáng và tinh anh.</p><figure class=\"image\"><img src=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2018/09/dam-be-gai-thoi-trang-da37-f.jpg\" alt=\"\" srcset=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2018/09/dam-be-gai-thoi-trang-da37-f.jpg 800w, https://thegioithoitrangbaby.vn/wp-content/uploads/2018/09/dam-be-gai-thoi-trang-da37-f-150x150.jpg 150w, https://thegioithoitrangbaby.vn/wp-content/uploads/2018/09/dam-be-gai-thoi-trang-da37-f-300x300.jpg 300w, https://thegioithoitrangbaby.vn/wp-content/uploads/2018/09/dam-be-gai-thoi-trang-da37-f-768x768.jpg 768w, https://thegioithoitrangbaby.vn/wp-content/uploads/2018/09/dam-be-gai-thoi-trang-da37-f-600x600.jpg 600w, https://thegioithoitrangbaby.vn/wp-content/uploads/2018/09/dam-be-gai-thoi-trang-da37-f-100x100.jpg 100w\" sizes=\"100vw\" width=\"500\"></figure><p style=\"text-align:center;\"><br><i>Đầm Bé Gái Thời Trang DA37</i></p><p>✥Với những chi tiết hình hoa được thêu nổi trên chiếc đầm đã làm cho chiếc đầm càng trở nên lộng lẫy nhưng lại không quá cầu kì.</p><p>✥ Bên cạnh đó Đầm Bé Gái Thời Trang DA37 còn được nhấn eo một cách kĩ lưỡng tạo độ phồng cho chiếc váy, khi bé của bạn di chuyển sẽ tạo cảm giác rất thước tha và uyển chuyển.</p><p>✥Những điều tinh tế đó sẽ giúp cho bé gái của bạn trở thành một nàng thơ thật sự khi khoác lên mình chiếc Đầm Bé Gái Thời Trang DA37. Vậy thì tại sao các mẹ lại không lựa chọn chiếc đầm này cho bé gái của mình nhỉ!</p><h3><strong>2.Đầm Hoa Dây Bé Gái DA101</strong></h3><p>✥Đây là một chiếc đầm không thể không nhắc đến trong top 3 đầm phụ dâu bé gái đẹp nhất của ngày hôm nay.</p><p>✥Không nhất thiết trang phục phụ dâu phải là màu trắng, chúng ta có thể chọn những màu khác miễn là phù hợp với buổi tiệc.</p><p>✥ Với Đầm Hoa Dây Bé Gái DA101 màu hồng này ắc hẳn đây &nbsp;là một lựa chọn thú vị giúp cho bé gái thật sự tỏa sáng với vai trò là phụ dâu đấy.</p><figure class=\"image\"><img src=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-hoa-day-be-gai-DA101-4.jpg\" alt=\"\" srcset=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-hoa-day-be-gai-DA101-4.jpg 800w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-hoa-day-be-gai-DA101-4-150x150.jpg 150w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-hoa-day-be-gai-DA101-4-300x300.jpg 300w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-hoa-day-be-gai-DA101-4-768x768.jpg 768w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-hoa-day-be-gai-DA101-4-600x600.jpg 600w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-hoa-day-be-gai-DA101-4-100x100.jpg 100w\" sizes=\"100vw\" width=\"500\"></figure><p style=\"text-align:center;\"><br><i>Đầm Hoa Dây Bé Gái DA101</i></p><h4><strong>Điểm thú vị của chiếc</strong></h4><p>✥Chất vải Đầm Hoa Dây Bé Gái DA101 được sử chất liệu mỏng nhẹ đảm bảo thoáng mát, mềm mại và tuyệt đối an toàn cho làn da nhạy cảm của bé.</p><p>✥ Chất liệu ren cũng là chất liệu được lựa chọn nhiều nhất bởi sự quý phái và sang trọng mà nó mang lại.</p><p>✥ phần thân váy được tinh tế xếp ly nhiều nếp bắt từ eo kéo dài đến hết chân váy tạo nên một tầng vải xếp lớp lớp chồng nhau có bồng bềnh, nhẹ nhàng.</p><p>✥ Để tạo sự thông thoáng tuyệt đối cho bé của bạn, chiếc đầm Đầm Hoa Dây Bé Gái DA101 chọn thiết kế cổ tròn và tay sát nách giúp bé luôn có thể dễ dàng thể hiện tốt vai trò là phụ dâu của mình.</p><h4><strong>Vẻ đẹp đến từ các chi tiết</strong></h4><p>✥ Điểm nhấn và cũng là yếu tố đặc biệt nhất của chiếc đầm này chính là những chi tiết hoa rơi thoắt ẩn thoắt hiện được đặc lồng ghép giữa các lớp váy, tạo nên cảm giác vô cùng huyền ảo.</p><figure class=\"image\"><img src=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-hoa-day-be-gai-DA101-5.jpg\" alt=\"\" srcset=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-hoa-day-be-gai-DA101-5.jpg 800w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-hoa-day-be-gai-DA101-5-150x150.jpg 150w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-hoa-day-be-gai-DA101-5-300x300.jpg 300w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-hoa-day-be-gai-DA101-5-768x768.jpg 768w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-hoa-day-be-gai-DA101-5-600x600.jpg 600w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-hoa-day-be-gai-DA101-5-100x100.jpg 100w\" sizes=\"100vw\" width=\"500\"></figure><p style=\"text-align:center;\"><i>Đầm Hoa Dây Bé Gái DA101</i></p><p>✥Các chi tiết hoa vô cùng phù hợp với ngày cưới bởi nó là đại diện cho sự hạnh phúc và bình an.</p><p>✥ Thử tưởng với thông điệp và chiếc đầm này mang lại thì cô dâu,chú rể nào mà không thích chứ, bé của bạn sẽ rất được chú ý cho mà xem.</p><p>✥ Chi tiết ruy băng được gắn sau eo của Đầm Hoa Dây Bé Gái DA101, vừa tạo điểm nhấn cho mặt sau, vừa giúp các mẹ có thể co dãn váy sao cho vừa vặn với bé nhất.</p><p>✥ Đây chắc chắn sẽ là gợi ý vô cùng tốt dành cho các bé và xứng đáng là Top 3 Đầm Phụ Dâu Bé Gái Đẹp Nhất đúng không nào!</p><h3><strong>3.Đầm Dạ Tiệc Sang Trọng DA69</strong></h3><p>✥Đầm Dạ Tiệc Sang Trọng DA69- nghe tên có vẻ như chiếc đầm này chỉ thích hợp cho những buổi tiệc. Không phải thế mà đây sẽ lựa chọn hoàn hảo nhất cho buổi tiệc cưới với vai trò là phụ dâu đấy.</p><figure class=\"image\"><img src=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2019/01/dam-da-hoi-be-gai-da69.jpg\" alt=\"\" srcset=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2019/01/dam-da-hoi-be-gai-da69.jpg 1052w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/01/dam-da-hoi-be-gai-da69-150x150.jpg 150w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/01/dam-da-hoi-be-gai-da69-300x300.jpg 300w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/01/dam-da-hoi-be-gai-da69-768x768.jpg 768w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/01/dam-da-hoi-be-gai-da69-1024x1024.jpg 1024w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/01/dam-da-hoi-be-gai-da69-600x600.jpg 600w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/01/dam-da-hoi-be-gai-da69-100x100.jpg 100w\" sizes=\"100vw\" width=\"500\"></figure><p style=\"text-align:center;\"><br><i>Đầm Dạ Tiệc Sang Trọng DA69</i></p><h4><strong>Điểm thú vị từ chất liệu</strong></h4><p>Chiếc váy có tông màu trắng được Lấy ý tưởng thiết kế từ váy công chúa và pha lẫn chút sự thơ ngây và trong sáng như một thiên thần.</p><p>Vì thế mà khi mặc lên người chiếc đầm này bé của bạn sẽ trông rất nổi bật giữa buổi lễ bởi vẻ đẹp thuần khiết mà nó mang lại.</p><p>Đầm Dạ Tiệc Sang Trọng DA69- được làm từ vải ren một chất liệu thoáng mát vô cùng phù hợp với thời tiết nóng ẩm của nước ta.Với chất liệu này thì bé sẽ vô cùng thoải mái và dễ dịu trong các buổi tiệc cưới ngoài trời hay trong cả trong nhà.</p><h4><strong>Vẻ đẹp đến từ cách thiết kế</strong></h4><p>✥ Đầm Dạ Tiệc Sang Trọng DA69 còn được cổ tròn cùng tay sát nách tạo cho bé một hình ảnh vô cùng sang trọng và quý phái.Bên cạnh đó còn vô cùng thoải mái, dễ chịu, không bị gò bó, bé có thể tự tin làm tốt trách nhiệm của mình.</p><p style=\"text-align:center;\">&nbsp;</p><figure class=\"image\"><img src=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2019/01/dam-da-hoi-be-gai-da69-e.jpg\" alt=\"\" srcset=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2019/01/dam-da-hoi-be-gai-da69-e.jpg 1000w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/01/dam-da-hoi-be-gai-da69-e-150x150.jpg 150w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/01/dam-da-hoi-be-gai-da69-e-300x300.jpg 300w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/01/dam-da-hoi-be-gai-da69-e-768x768.jpg 768w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/01/dam-da-hoi-be-gai-da69-e-600x600.jpg 600w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/01/dam-da-hoi-be-gai-da69-e-100x100.jpg 100w\" sizes=\"100vw\" width=\"500\"></figure><p style=\"text-align:center;\"><br><i>Đầm Dạ Tiệc Sang Trọng DA69</i></p><p>✥ Điểm nhấn quan trọng là phần chiết eo được điểm phối bằng ruy băng bản to kết nổi bật sẽ càng làm tăng thêm phần đáng yêu cho cô công chúa nhỏ của bạn.</p><p>✥Đặc biệt nhất là phần eo được tô điểm thêm họa tiết hoa nổi bật làm điểm nhấn cho cả chiếc đầm giúp bé của bạn càng trở nên xinh đẹp như một nàng công chúa trong truyện cổ tích.</p><p>✥Tất cả những điều trên đã tạo nên một tuyệt tác vô cùng hoàn hảo. Thế mới nói Đầm Dạ Tiệc Sang Trọng DA69 là một lựa chọn vô cùng phù hợp cho bé gái của bạn trong buổi tiệc cưới với vai trò là phụ dâu.</p>', NULL, 'https://thegioithoitrangbaby.vn/wp-content/uploads/2019/01/dam-da-hoi-be-gai-da69.jpg', NULL, 'active', NULL, NULL, 'top-3-dam-phu-dau-be-gai-dep-ngat-ngay-trong-ngay-cuoi', 1, 1, 0, NULL, NULL, '1', '0', 0, '2023-05-11 16:13:37', NULL, NULL, NULL, NULL, 'open', NULL, NULL, NULL, NULL, 2, 2, '2023-05-11 09:13:37', '2023-05-12 01:42:31', NULL),
(699, 70, 'post', 'Top 3 Mẫu Đầm Voan Cho Bé Gái Đẹp Nhất', 'Những chiếc đầm luôn đóng vai trò rất quan trọng trong việc tôn lên vẻ đẹp của các bé . Các mẫu đầm được làm từ các chất liệu khác nhau, như lụa, cotton, đũi,..,', '<h3><strong>1.Đầm Nơ Eo Phối Voan DA104</strong></h3><p><span style=\"color:rgb(255,0,255);\">✥</span> Đầm Nơ Eo Phối Voan DA104 là mẫu đầm voan cho bé gái vô cùng xinh xắn mà <a href=\"https://thegioithoitrangbaby.vn/\"><span style=\"color:rgb(0,51,102);\"><strong>Thế Giới Thời Trang Baby</strong></span></a> muốn gửi tới các gia đình.</p><p><span style=\"color:rgb(255,0,255);\">✥</span> Chắc chắn chiếc đầm Đầm Nơ Eo Phối Voan DA104 &nbsp;sẽ là là một gợi ý vô cùng phù hợp dành cho các bé gái của bạn đây</p><figure class=\"image image-style-align-center\"><img src=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-no-eo-phoi-voan-DA104-1.jpg\" alt=\"\" srcset=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-no-eo-phoi-voan-DA104-1.jpg 750w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-no-eo-phoi-voan-DA104-1-150x150.jpg 150w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-no-eo-phoi-voan-DA104-1-300x300.jpg 300w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-no-eo-phoi-voan-DA104-1-600x600.jpg 600w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-no-eo-phoi-voan-DA104-1-100x100.jpg 100w\" sizes=\"100vw\" width=\"500\"></figure><p style=\"text-align:center;\"><br><i>Đầm Nơ Eo Phối Voan DA104</i></p><p><span style=\"color:rgb(255,0,255);\">✥</span> Đầm Nơ Eo Phối Voan DA104-là một thiết kế hài hòa và đầy tinh tế giữa chất lượng và kiểu dáng.</p><p><span style=\"color:rgb(255,0,255);\">✥</span> Bên cạnh đó chiếc đầm có rất nhiều size, phù hợp với mỗi lứa tuổi để cho các mẹ tha hồ mà lựa chọn kích cỡ phù hợp cho con em của mình.</p><p><span style=\"color:rgb(255,0,255);\">✥</span> &nbsp;Với chất liệu vải voan thích hợp cho thời tiết nóng ẩm của nước ta. Giúp các bé sẽ không bị đổ quá nhiều mồ hôi khi tham gia các hoạt động ngoài trời.</p><p><span style=\"color:rgb(255,0,255);\">✥</span> &nbsp;Đầm Nơ Eo Phối Voan DA104-có màu sắc trắng và họa tiết hình hoa làm chủ đạo phù hợp với mọi màu da của các bé.</p><figure class=\"image\"><img src=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-no-eo-phoi-voan-DA104-4.jpg\" alt=\"\" srcset=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-no-eo-phoi-voan-DA104-4.jpg 750w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-no-eo-phoi-voan-DA104-4-150x150.jpg 150w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-no-eo-phoi-voan-DA104-4-300x300.jpg 300w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-no-eo-phoi-voan-DA104-4-600x600.jpg 600w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-no-eo-phoi-voan-DA104-4-100x100.jpg 100w\" sizes=\"100vw\" width=\"500\"></figure><p style=\"text-align:center;\"><br><i>Đầm Nơ Eo Phối Voan DA104</i></p><p><span style=\"color:rgb(255,0,255);\">✥</span> Trên chiếc đầm còn tô điểm thêm chiếc nơ xanh đen xinh xắn làm điểm nhấn cho chiếc đầm giúp bé có một phong cách thời trang, thời thượng hơn.</p><p><span style=\"color:rgb(255,0,255);\">✥</span>&nbsp;Thêm chân váy được thiết kế xếp ly thêm viền xanh bên dưới tạo cảm giác bồng bềnh và sang trọng. Bé của bạn sẽ đáng yêu và xinh xắn vô cùng. Vậy nên&nbsp;Đầm Nơ Eo Phối Voan DA104 rất xứng đáng nằm trong vị trí top 3 mẫu đầm voan đẹp nhất cho bé gái.</p><h3><strong>2.Váy Voan Mỏng Thêu Dứa Nổi DA96</strong></h3><p><span style=\"color:rgb(255,0,255);\">✥</span> Váy Voan Mỏng Thêu Dứa Nổi DA96 sản phẩm được thiết kế cự kỳ thu hút, tông màu sang trọng, chất voan mềm mịn.</p><p><span style=\"color:rgb(255,0,255);\">✥</span>&nbsp;Đây là một sản phẩm mà các bà mẹ sẽ rất thích phú và vô cùng phù hợp cho các bé gái của bạn đấy.</p><figure class=\"image\"><img src=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/vay-voan-mong-theu-dua-noi-DA96.jpg\" alt=\"\" srcset=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/vay-voan-mong-theu-dua-noi-DA96.jpg 600w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/vay-voan-mong-theu-dua-noi-DA96-150x150.jpg 150w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/vay-voan-mong-theu-dua-noi-DA96-300x300.jpg 300w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/vay-voan-mong-theu-dua-noi-DA96-100x100.jpg 100w\" sizes=\"100vw\" width=\"500\"></figure><p style=\"text-align:center;\"><br><i>Sản phẩm Váy Voan Mỏng Thêu Dứa Nổi DA96</i></p><h4><strong>Điểm đặc biệt của chiếc áo là gì?</strong></h4><p><span style=\"color:rgb(255,0,0);\">♦</span> Váy Voan Mỏng Thêu Dứa Nổi DA96 có chất liệu voan mỏng, thoáng mát, thấm mồ hôi cực kì tốt, giúp các bé thoải mái vui chơi, hay đi tham dự những buổi tiệc tùng mà không có cảm giác khó chịu.</p><p><span style=\"color:rgb(255,0,0);\">♦</span> Màu hồng &nbsp;phấn nhẹ nhàng của chiếc là màu mà đa số các bé gái đều yêu thích, vì thế bé gái của bạn sẽ rất hạnh phúc khi được mẹ tặng cho chiếc đầm này cho mà xem.</p><p><span style=\"color:rgb(255,0,0);\">♦</span> Bên cạnh đó màu hồng còn làm nổi bật lên tông da của bé giúp bé trở nên tỏa sáng hơn khi mặc chiếc váy này.</p><p><span style=\"color:rgb(255,0,0);\">♦</span> Váy Voan Mỏng Thêu Dứa Nổi DA96 còn có những họa tiết dễ thương cùng với những cái nơ được tính trên áo một cách tinh tế &nbsp;giúp các bé trông thật thời trang và năng động.</p><p><span style=\"color:rgb(255,0,0);\">♦</span> Điểm cộng của chiếc váy là tôn lên sự dịu dàng của các đem đến sự hài lòng cho các bà mẹ, và là sự lựa chọn đáng tin cậy dành cho các gia đình.</p><p><span style=\"color:rgb(255,0,0);\">♦</span> Sự giản dị của Váy Voan Mỏng Thêu Dứa Nổi DA96 đã mang đến sự nhã nhặn không cầu kỳ rất thích hợp đi chơi, du lịch ngay cả các bữa tiệc.</p><h3><strong>3.Đầm Bé Gái Tay Cải Kẻ Phối Voan DA105</strong></h3><p><span style=\"color:rgb(255,0,255);\">✥</span> Đầm Bé Gái Tay Cải Kẻ Phối Voan DA105 là sản phẩm và Thế Giới Thời Trang Baby muốn gửi đến các mẹ yêu.</p><p><span style=\"color:rgb(255,0,255);\">✥</span> Đầm Bé Gái Tay Cải Kẻ Phối Voan DA105 là sản phẩm vừa hợp thời trang, vừa hợp túi tiền mà chất lượng lại vô cùng tuyệt&nbsp;vời.</p><figure class=\"image\"><img src=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-be-gai-tay-cai-ke-phoi-voan-DA105-1.jpg\" alt=\"\" srcset=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-be-gai-tay-cai-ke-phoi-voan-DA105-1.jpg 1280w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-be-gai-tay-cai-ke-phoi-voan-DA105-1-150x150.jpg 150w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-be-gai-tay-cai-ke-phoi-voan-DA105-1-300x300.jpg 300w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-be-gai-tay-cai-ke-phoi-voan-DA105-1-768x768.jpg 768w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-be-gai-tay-cai-ke-phoi-voan-DA105-1-1024x1024.jpg 1024w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-be-gai-tay-cai-ke-phoi-voan-DA105-1-600x600.jpg 600w, https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/dam-be-gai-tay-cai-ke-phoi-voan-DA105-1-100x100.jpg 100w\" sizes=\"100vw\" width=\"500\"></figure><p style=\"text-align:center;\"><br><a href=\"https://thegioithoitrangbaby.vn/danh-muc/dam-be-gai/\"><span style=\"color:rgb(0,51,102);\"><i><strong>Đầm Bé Gái</strong></i></span></a><i> Tay Cải Kẻ Phối Voan DA105</i></p><p><span style=\"color:rgb(255,0,255);\">✥</span> Với thiết kế đơn giản, nhẹ nhàng cùng chất liệu voan mịn màng ở chân váy đảm bảo sẽ mang đến cho các bé nhà bạn một tinh thần thoải mái, mát mẻ trong những chuyến du lịch hè nóng bức.</p><p><span style=\"color:rgb(255,0,255);\">✥</span> Phần trên thân áo được thiết kế vô cùng đơn giản nhưng không kém phần năng động, đáng yêu cho các bé gái.</p>', NULL, 'https://thegioithoitrangbaby.vn/wp-content/uploads/2019/04/vay-voan-mong-theu-dua-noi-DA96.jpg', NULL, 'active', NULL, NULL, 'top-3-mau-dam-voan-cho-be-gai-dep-nhat', 1, 1, 0, NULL, NULL, '20', '0', 0, '2023-05-11 16:39:14', NULL, NULL, NULL, NULL, 'open', NULL, NULL, NULL, NULL, 2, 2, '2023-05-11 09:39:14', '2023-06-03 04:29:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_cms_taxonomys`
--

CREATE TABLE `tb_cms_taxonomys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `taxonomy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_part` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brief` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `is_featured` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iorder` int(11) DEFAULT NULL,
  `hienthi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `news_position` int(4) DEFAULT NULL,
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `number_view` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_cms_taxonomys`
--

INSERT INTO `tb_cms_taxonomys` (`id`, `taxonomy`, `parent_id`, `title`, `url_part`, `brief`, `content`, `json_params`, `is_featured`, `iorder`, `hienthi`, `status`, `news_position`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`, `number_view`) VALUES
(70, 'tin-tuc', NULL, 'Tin tức', 'tin-tuc', NULL, NULL, '{\"image\":null,\"image_background\":null,\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '0', NULL, ';;', 'active', NULL, 2, 2, '2023-04-28 07:03:49', '2023-04-28 07:03:49', NULL),
(102, 'san-pham', NULL, 'Khuyến Mãi Tháng 5', 'khuyen-mai-thang-5', NULL, NULL, '{\"image\":\"\\/public\\/upload\\/admin\\/quan-ao-be-trai-dep.jpg\",\"image_background\":null,\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '0', 1, ';;', 'active', 0, 2, 2, '2023-05-10 02:21:28', '2023-05-10 02:21:28', NULL),
(103, 'san-pham', NULL, 'Quần Áo Bé Trai', 'quan-ao-be-trai', NULL, '<h2 style=\"text-align:center;\"><span style=\"color:rgb(40,40,40);\"><strong>Hút Mắt Thời Trang Bé Trai | Quần Áo Bé Trai | Đồ Bé Trai Đẹp Rạng Ngời</strong></span></h2><figure class=\"image\"><img src=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2018/11/quan-ao-be-trai-sanh-dieu-dep-thegioithoitrangbabyvn.png\" alt=\"\"></figure><p><span style=\"color:rgb(40,40,40);\">Đứa bé trai chào đời, niềm vui của cha mẹ , niềm hân hoan của cả dòng họ…..rằng rồi đây sẽ có người nối dõi…..một niềm tin, niềm vui sướng nhen nhóm từ thuở ấy. Rồi những năm tháng sơ sinh, quấy khóc, nuôi con khổ cực từ thuở lọt lòng cho tới lúc lớn. Rồi cũng đến những ngày Tết, ngày giỗ, ba mẹ lại phải lo chuyện ăn mặc, quần áo cho bé trai của mình. Mặc sao cho đẹp, cho trở nên sành điệu.</span></p><h3><strong>Tại sao nên lựa chọn quần áo bé trai sành điệu tại Thế Giới Thời Trang Baby?</strong></h3><p><span style=\"color:rgb(0,132,167);\">✫</span><span style=\"color:rgb(40,40,40);\"> Và không đâu hết, cửa hàng Thế Giới Thời Trang Baby chúng tôi ngoài quần áo bé trai nói chung còn bán rất nhiều loại </span><a href=\"https://thegioithoitrangbaby.vn/danh-muc/quan-ao-be-trai/\"><span style=\"color:rgb(0,51,102);\"><strong>quần áo bé trai sành điệu</strong></span></a><span style=\"color:rgb(40,40,40);\"> khác. Với những bộ cánh ấy, con bạn sẽ được biến hóa…..Không còn là cậu bé lấm lem, hôi sữa, nước mắt nước mũi lòng thòng nữa….mà sẽ là một cậu bé tươm tất, thơm tho, sáng sủa….mà đến bạn cũng không nhận ra…..</span></p><p><span style=\"color:rgb(0,132,167);\">✫</span><span style=\"color:rgb(40,40,40);\"> Chỉ cần đến với cửa hàng thời trang bé trai sành điệu của chúng tôi. Nhưng nếu bạn thiên về kiểu người truyền thống, thích đằm thắm, nhẹ nhàng,….không màu mè, mà vẫn đẹp….Chúng tôi cũng không ngại.</span></p>', '{\"image\":\"\\/public\\/upload\\/admin\\/quan-ao-be-trai-dep.jpg\",\"image_background\":null,\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 'active', 2, ';;', 'active', 1, 2, 2, '2023-05-10 02:22:14', '2023-05-10 10:38:54', NULL),
(104, 'san-pham', NULL, 'Quần Áo Bé Gái', 'quan-ao-be-gai', NULL, '<h2 style=\"text-align:center;\"><span style=\"color:rgb(0,0,0);\"><strong>1000+ Mẫu Thời Trang Bé Gái | Quần Áo Bé Gái | Đồ Cho Bé Gái Đẹp Giá Rẻ</strong></span></h2><figure class=\"image\"><img src=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2018/11/quan-ao-be-gai-de-thuong-thegioithoitrangbabyvn.jpg\" alt=\"\"></figure><p><span style=\"color:rgb(0,0,0);\">Năm cũ sắp qua, năm mới lại về…và còn Tết nữa chứ…Cuộc sống tuy bộn bề, mệt mỏi và áp lực, xin các mẹ đừng quên khoảng thời gian cuối năm này nhé. Chẳng lẽ cứ để con gái yêu của mình lấm lem mãi sao. Ngắm nhìn con tỏa sáng trong bộ </span><a href=\"https://thegioithoitrangbaby.vn/danh-muc/quan-ao-be-gai/\"><span style=\"color:rgb(0,51,102);\"><strong>quần áo bé gái</strong></span></a><span style=\"color:rgb(0,0,0);\"> đẹp mình chọn, vui chơi cùng bạn bè cũng là một niềm hạnh phúc của cha mẹ đấy. Những tia nắng sớm mai kia cũng không thể làm bé yêu của bạn tỏa sáng được…</span></p><h3><span style=\"color:rgb(0,0,0);\"><strong>Làm sao để con yêu tỏa sáng với những bộ đồ quần áo bé gái dễ thương nhất?</strong></span></h3><p><span style=\"color:rgb(0,0,0);\">Bạn muốn tìm được những bộ đồ cho bé gái dễ thương của mình chứ ? Hãy đến với </span><a href=\"https://thegioithoitrangbaby.vn/\"><span style=\"color:rgb(0,51,102);\"><strong>Thế Giới Thời Trang Baby</strong></span></a><span style=\"color:rgb(0,0,0);\">. Với đầy đủ và ngập tràn nhiều loại quần áo cho bé gái, bạn sẽ như được sống lại thời thơ ấu của mình. Đừng để bé phải thiệt thòi nhé…Cửa hàng chúng tôi chuyên bán </span><a href=\"https://thegioithoitrangbaby.com/danh-muc/quan-ao-be-gai\"><span style=\"color:rgb(0,0,0);\"><strong>thời trang bé gái</strong></span></a><span style=\"color:rgb(0,0,0);\"> đẹp giá rẻ…Hàng ẩu, chúng tôi trả lại tiền. Với nguồn hàng cần quen biết, giá cả ở chỗ chúng tôi sẽ thoải mái hơn. Thích hợp nếu bạn là người thường cân nhắc trong chi tiêu, hay vừa trải qua một năm làm ăn không tốt lắm.</span></p><p><span style=\"color:rgb(0,0,0);\">Chúng tôi vẫn có những bộ quần áo cho bé gái giá rẻ nhưng không hề sứt mẻ. Đặc biệt hơn, cửa hàng chúng tôi cũng thường xuyên có những sự kiện khuyến mãi, giảm giá cho các mẹ đấy. Nhanh tay, không lại bay mất. Con chần chờ gì mà không đến ngay với Thế Giới Thời Trang Baby của chúng tôi ngay !!!</span></p>', '{\"image\":\"\\/public\\/upload\\/admin\\/quan-ao-be-gai-dep.jpg\",\"image_background\":null,\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 'deactive', 3, ';;', 'active', 1, 2, 2, '2023-05-10 02:23:11', '2023-05-10 10:40:33', NULL),
(105, 'san-pham', NULL, 'Quần Áo Sơ Sinh', 'quan-ao-so-sinh', NULL, '<h2 style=\"text-align:center;\"><strong>Đồ Sơ Sinh Cho Bé Trọn Gói | Quần Áo Trẻ Sơ Sinh Cao Cấp Đẹp &amp; Giá Rẻ</strong></h2><figure class=\"image\"><img src=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2018/11/do-so-sinh-quan-ao-tre-so-sinh.jpg\" alt=\"\"></figure><p><span style=\"color:rgb(0,0,0);\">Em bé chào đời, biết bao vấn đề phát sinh. Những tháng đầu, bé đái ị suốt ngày, tùy vào điều kiện về kinh tế, thời gian và phương pháp mà mỗi mẹ chọn cho mình từng loại tã cho con của mình. Mà khi các mẹ đã mệt mọi với việc thay tã, giặt bỉm cho bé suốt ngày. Lại còn việc mặc </span><a href=\"https://thegioithoitrangbaby.vn/danh-muc/quan-ao-so-sinh/\"><span style=\"color:rgb(0,51,102);\"><strong>quần áo trẻ sơ sinh</strong></span></a><span style=\"color:rgb(0,0,0);\"> đẹp cho con của mình nữa thì lại làm cho các mẹ đau đầu…hãy đến với thế giới thời trang của chúng tôi.</span></p><h3><span style=\"color:rgb(0,0,0);\"><strong>Để mẹ không còn phải bận tâm cho quần áo sơ sinh với đứa con đầu lòng của mình nữa…</strong></span></h3><p><span style=\"color:rgb(0,0,0);\">Quần áo sơ sinh (hay đồ sơ sinh cho bé) ở Thế Giới Thời Trang Baby làm từ những loại vải cotton đã được lựa chọn kỹ từ các cánh đồng tạo cảm giác mềm mại, dễ chịu, không kích ứng với làn da non nớt của bé. Ở chúng tôi có rất nhiều quần áo trẻ sơ sinh đẹp giá rẻ với đủ loại từ những loại quần ngắn mặc chung với bỉm tới những bộ body chip hoặc body toàn thân với nhiều họa tiết đơn giản mà dễ thương thuận tiện cho mẹ mỗi khi muốn ẵm bé ra ngoài.</span></p><p><span style=\"color:rgb(0,0,0);\">Còn nếu các mẹ muốn mua cho bé những loại đồ sơ sinh cho bé trọn gói cao cấp, thì chúng tôi cũng vẫn có thể làm vừa lòng các mẹ, </span><a href=\"https://thegioithoitrangbaby.vn/\"><span style=\"color:rgb(0,51,102);\"><strong>Thế Giới Thời Trang Baby</strong></span></a><span style=\"color:rgb(0,0,0);\"> mà. Với những loại quần áo sơ sinh cao cấp, như là các loại quần áo trẻ em sơ sinh Hàn Quốc hay Nhật Bản. Hàng ngoại nhưng giá cả cũng phải chăng. Ngoài ra, bên chúng tôi còn có những bộ body dài, giữ ấm tốt cho bé vào những mùa lạnh cuối năm. Vì vậy, còn chờ gì nữa mà hãy liên hệ ngay với Thế Giới Thời Trang Baby của chúng tôi.</span></p>', '{\"image\":\"\\/public\\/upload\\/admin\\/quan-ao-so-sinh-570x420.jpg\",\"image_background\":null,\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 'deactive', 4, ';;', 'active', 1, 2, 2, '2023-05-10 02:24:09', '2023-05-10 10:40:40', NULL),
(106, 'san-pham', NULL, 'Phụ Kiện Cho Bé', 'phu-kien-cho-be', NULL, '<h2 style=\"text-align:center;\"><span style=\"color:rgb(0,0,0);\"><strong>Săn Tìm Các Mẫu Phụ Kiện Cho Bé Đẹp Nhật Hiện Nay</strong></span></h2><figure class=\"image\"><img src=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2018/11/phu-kien-cho-be-thegioi-thoitrangbabyvn.jpg\" alt=\"\"></figure><p><span style=\"color:rgb(0,0,0);\">Xin chào các mẹ, khi bé con nhỏ hoặc chưa định hình được cái đẹp, phải ăn mặc như thế nào thì chính các mẹ chính là người tạo ra diện mạo bên ngoài cho bé yêu của mình. Một bộ quần áo đẹp tất nhiên sẽ giúp cho bé thêm đẹp. Nhưng nếu có thêm những món </span><a href=\"https://thegioithoitrangbaby.vn/danh-muc/phu-kien-cho-be/\"><span style=\"color:rgb(0,51,102);\"><strong>phụ kiện cho bé</strong></span></a><span style=\"color:rgb(0,0,0);\">, cục cưng của bạn sẽ trở nên nổi bật hơn với những điểm nhấn tuy nhỏ nhưng hiệu quả thật to.</span></p><h3><span style=\"color:rgb(0,0,0);\"><strong>Tìm đâu những món phụ kiện cho bé độc, đẹp tạo nên dấu ấn cho con yêu của bạn?</strong></span></h3><p><span style=\"color:rgb(0,0,0);\">Hãy đến ngay với Thế Giới Thời Trang Baby, các mẹ sẽ hài lòng. Với một Thế Giới phụ kiện bé trai lẫn bé gái, chúng tôi sẽ mang đến cho các mẹ nhiều sự lựa chọn nhất có thể. Từ những con thú nhồi bông như gấu Teddy, Hello Kitty, Nhím Hồng,….đến những bộ nơ, băng đô dành cho phụ kiện bé gái màu sắc cho các mẹ chọn để phối đồ cho con yêu của mình.</span></p><p><span style=\"color:rgb(0,0,0);\">Nếu bé yêu của các mẹ đang trong tuổi tập đi, hãy tham khảo những loại giày tập đi ngộ nghĩnh, sắc màu của chúng tôi. Với những đôi giày đáng yêu, bé của các mẹ sẽ hứng thú tập đi hơn đấy. Con chần chờ gì nữa, muốn bé tỏa sáng nổi bật, hãy ghé ngay </span><a href=\"https://thegioithoitrangbaby.vn/\"><span style=\"color:rgb(0,51,102);\"><strong>Thế Giới Thời Trang Baby</strong></span></a><span style=\"color:rgb(0,0,0);\"> của chúng tôi.</span></p>', '{\"image\":\"\\/public\\/upload\\/admin\\/quan-ao-be-gai-dep.jpg\",\"image_background\":null,\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 'deactive', 5, ';;', 'active', 1, 2, 2, '2023-05-10 02:25:22', '2023-05-10 10:40:51', NULL),
(107, 'san-pham', NULL, 'Hàng Mới Về', 'hang-moi-ve', NULL, '<h2 style=\"text-align:center;\"><span style=\"color:rgb(0,0,0);\"><strong>BST Quần Áo Trẻ Em Xuất Khẩu Cao Cấp Đẹp Giá Rẻ Nhất</strong></span></h2><figure class=\"image\"><img src=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2018/11/quan-ao-tre-em-thegioithoitrangbabyvn.jpg\" alt=\"\"></figure><p><span style=\"color:rgb(0,0,0);\">Bé yêu của các mẹ đã bắt đầu lớn rồi. Những bộ quần áo bé mặc bấy lâu nay đã sờn cũ, úa màu, hay đã bị giãn…Các mẹ cần mua quần áo trẻ em mới cho bé nhưng những shop quần áo quen thuộc lại không có loại mà mẹ cần, hoặc đơn giản là bạn muốn thử tìm </span><a href=\"https://thegioithoitrangbaby.vn/danh-muc/quan-ao-tre-em-moi/\"><span style=\"color:rgb(0,51,102);\"><strong>quần áo trẻ em đẹp</strong></span></a><span style=\"color:rgb(0,0,0);\"> tại một cửa hàng mới. Vậy thì các mẹ đã đến đúng nơi rồi đấy.</span></p><h3><span style=\"color:rgb(0,0,0);\"><strong>Thế Giới Thời Trang Baby® – Hệ thống quần áo trẻ em chất nhất Sài Gòn</strong></span></h3><p><span style=\"color:rgb(0,0,0);\">Đến với cửa hàng chúng tôi, các mẹ sẽ được đắm mình trong Thế Giới quần áo trẻ em đẹp với đa dạng các loại, mẫu mã từ những món đồ bộ mặc ở nhà cho đến những mẫu áo dài cách tân, quân Jean rách gối cho các bé mỗi dịp dạo phố, đi lễ, ăn tiệc.</span></p><p><span style=\"color:rgb(0,0,0);\">Như đã giới thiệu bên trên, bên chúng tôi có từ những bộ quần áo trẻ em giá rẻ nhưng chất lượng không hề bị sứt mẻ nếu như các mẹ muốn tiết kiệm chút ít để mua tã sữa cho con….Đến những bộ quần áo trẻ em cao cấp, dành cho những buổi tiệc sang trọng, lễ cưới, hay những dịp hiếm có trong năm.</span></p><p><span style=\"color:rgb(0,0,0);\">Đặc biệt hơn, bên chúng tôi còn có hàng quần áo trẻ em xuất khẩu. Với chất lượng như mơ, trong khi giá thì mỏng như tờ, đáp ứng nhu cầu của các mẹ chuộng hàng vnxk. Vì vậy, hãy đến với cửa hàng </span><a href=\"https://thegioithoitrangbaby.vn/\"><span style=\"color:rgb(0,51,102);\"><strong>Thế Giới Thời Trang Baby</strong></span></a><span style=\"color:rgb(0,0,0);\"> của chúng tôi ngay hôm nay nhá !</span></p>', '{\"image\":\"\\/public\\/upload\\/admin\\/quan-ao-be-trai-dep.jpg\",\"image_background\":null,\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '0', 6, ';;', 'active', 0, 2, 2, '2023-05-10 02:26:09', '2023-05-10 02:26:09', NULL),
(108, 'san-pham', 103, 'Áo Sơ Mi Bé Trai', 'ao-so-mi-be-trai', NULL, '<h2 style=\"text-align:center;\"><span style=\"color:rgb(0,0,0);\"><strong>Sôi Sục Với Các Mẫu Áo Sơ Mi Bé Trai Xuất Khẩu Đẹp Mới Nhất</strong></span></h2><figure class=\"image\"><img src=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2018/11/ao-so-mi-be-trai-xuat-khau-thegioithoitrangbabyvn.png\" alt=\"\"></figure><p><span style=\"color:rgb(0,0,0);\">Những dịp cuối tuần, đi chơi, lễ hay Tết, có bao giờ các mẹ nghĩ tới áo sơ mi cho bé trai yêu của mình không. Trải qua những thăng trầm của lịch sử, chiếc áo sơ mi giờ đây đã là biểu tượng của sự lịch sự…sang trọng…”Đi đám cưới mà mặc áo ba lỗ à” hay “Mày mặc áo thun mà đi phỏng vấn, nhà tuyển dụng nhìn thấy là rớt rồi”…Vì vậy, áo sơ mi thường là sự lựa chọn cho các quý ông trong mỗi dịp quan trọng. Nhưng đấy là khi họ đã lớn. Còn lúc họ còn nhỏ thì có </span><a href=\"https://thegioithoitrangbaby.vn/danh-muc/ao-so-mi-be-trai/\"><span style=\"color:rgb(0,51,102);\"><strong>áo sơ mi bé trai</strong></span></a><span style=\"color:rgb(0,0,0);\"> hay không ?</span></p><h3><span style=\"color:rgb(0,0,0);\"><strong>Làm sao để tìm được những chiếc áo sơ mi bé trai đẹp nhất TP. Hồ Chí Minh ?</strong></span></h3><p><span style=\"color:rgb(0,0,0);\">Đến với </span><a href=\"https://thegioithoitrangbaby.vn/\"><span style=\"color:rgb(0,51,102);\"><strong>Thế Giới Thời Trang Baby</strong></span></a><span style=\"color:rgb(0,0,0);\">, các mẹ sẽ tìm được những chiếc áo sơ mi phù hợp cho con trai yêu của mình trong các dịp lễ Tết, cưới hỏi. Chúng tôi cam kết hàng ở Thế Giới là những chiếc áo sơ mi bé trai xuất khẩu với chất lượng như hàng nhập. Áo sơ mi bé trai ngoài dùng để mặc còn có thể dùng làm phụ kiện áo khoác lúc phối đồ, rất sành điệu và đẹp đấy nhá. Còn nếu các mẹ muốn có một bộ vừa quần vừa áo sơ mi cho bé trai đẹp,…các mẹ đã chọn đúng chỗ rồi đấy.</span></p>', '{\"image\":\"\\/public\\/upload\\/admin\\/quan-ao-be-trai-dep.jpg\",\"image_background\":null,\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '0', 1, ';;', 'active', 1, 2, 2, '2023-05-10 02:26:44', '2023-05-11 01:54:04', NULL),
(109, 'san-pham', 103, 'Áo Thun Bé Trai', 'ao-thun-be-trai', NULL, '<h2 style=\"text-align:center;\"><strong>Áo Phông Bé | Áo Thun Bé Trai Xuất Khẩu Đẹp &amp; Giá Rẻ</strong></h2><figure class=\"image\"><img src=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2018/11/ao-thun-be-trai-xuat-khai-dep-thegioithoitrangbabyvn.jpg\" alt=\"\"></figure><p><span style=\"color:rgb(0,0,0);\">Mùa mưa đã qua, để lại những đợt nắng đã nóng nay còn nóng hơn. Cộng với việc các bé trai hay chơi đùa, chạy nhảy làm bạn thấy mệt mỏi khi quần áo con trai yêu bạn mặc cứ hay hư, rách mỗi lần đi chơi về. Vì vậy, các mẹ nên chọn cho con yêu của mình các loại </span><a href=\"https://thegioithoitrangbaby.vn/danh-muc/ao-thun-be-trai/\"><span style=\"color:rgb(0,51,102);\"><strong>áo thun bé trai</strong></span></a><span style=\"color:rgb(0,0,0);\"> phù hợp nhất.</span></p><h3><span style=\"color:rgb(0,0,0);\"><strong>Biết tìm đâu những địa điểm mua áo thun bé trai đẹp nhất Sài Gòn ?</strong></span></h3><p><span style=\"color:rgb(0,0,0);\">Hãy đến ngay với Thế Giới Thời Trang Baby của chúng tôi. Với những chiếc áo thun bé trai xuất khẩu được may từ những sợi cotton bền và tốt nhất được chắt chiu kỹ trên cánh đồng.</span></p><p><span style=\"color:rgb(0,0,0);\">Theo cách nói của người Ấn Độ, bất cứ điều gì xảy ra thì đó là điều nên xảy ra. Lẽ ra những chiếc áo thun bé trai (áo phông bé trai) này đã được xuất khẩu nhưng vì một lí do tình cờ nào đó nên chúng có thể đến được tay của các mẹ đấy. Và tất nhiên vẫn là hàng xịn nhé. Xịn như vua nhưng giá không hề chua. Những chiếc áo thun bé trai giá rẻ của chúng tôi với khả năng hút ẩm tối đa sẵn sàng để thử thách qua những đợt vui chơi, chạy nhảy của các bé trai. Sẵn sàng để đối phó với những đợt nắng nóng sắp tới. Với độ co giãn tốt nhất, dù bé có mau lớn, những chiếc áo phông cho bé trai của chúng tôi cũng giúp bé mặc được lâu hơn.</span></p><p><span style=\"color:rgb(0,0,0);\">Còn nếu các mẹ hay bé muốn một cái áo để diện cho những ngay lễ, cuối tuần…ngày Tết thì chúng tôi cũng không ngần ngại. Với những chiếc áo thun bé trai đẹp với nhiều kích cỡ, nhiều nguồn hàng khác nhau từ VNXK tới hàng Quảng Châu, các mẹ sẽ ngập tràn trong </span><a href=\"https://thegioithoitrangbaby.vn/\"><span style=\"color:rgb(0,51,102);\"><strong>Thế Giới Thời Trang Baby</strong></span></a><span style=\"color:rgb(0,0,0);\"> của chúng tôi. Nào còn chờ gì nữa!</span></p>', '{\"image\":\"\\/public\\/upload\\/admin\\/quan-ao-be-trai-dep.jpg\",\"image_background\":null,\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '0', 2, ';;', 'active', 1, 2, 2, '2023-05-10 02:27:11', '2023-05-11 01:54:12', NULL),
(110, 'san-pham', 103, 'Áo Khoác Bé Trai', 'ao-khoac-be-trai', NULL, '<h2 style=\"text-align:center;\"><span style=\"color:rgb(0,0,0);\"><strong>Ngất Ngây Với 100+ Áo Khoác Bé Trai Xuất Khẩu (VNXK) Cực Đẹp</strong></span></h2><figure class=\"image\"><img src=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2018/11/ao-khoac-be-trai-vnxk-dep-thegioithoitrangbabyvn.png\" alt=\"\"></figure><p><span style=\"color:rgb(0,0,0);\">Chiếc áo khoác phương đã theo chân người phương Tây cập bến nước Đại Việt vào thế kỉ 19. Đến nay, áo khoác đã trở thành một món đồ phổ biến hàng ngày của mọi người. Tùy vào thời tiết từng miền, mà chiếc áo khoác có độ dày mỏng khác nhau tùy vào mục đích che mưa hay che nắng. Ví như </span><a href=\"https://thegioithoitrangbaby.vn/danh-muc/ao-khoac-be-trai/\"><span style=\"color:rgb(0,51,102);\"><strong>áo khoác bé trai tphcm</strong></span></a><span style=\"color:rgb(0,0,0);\"> sẽ chủ yếu là chống gió, chống nắng nên thường được gọi là áo gió.</span></p><p><span style=\"color:rgb(0,0,0);\">Vào những dịp cuối năm, trời se lạnh, mà chiếc áo khoác của con bạn thì đã cũ. Vì vậy việc sắm một cái áo khoác cho bé trai của bạn là điều cần thiết bây giờ.</span></p><h3><span style=\"color:rgb(0,0,0);\"><strong>Làm thế nào để tìm mua được một chiếc áo khoác bé trai vừa tốt vừa đẹp tại TP. HCM ?</strong></span></h3><p><span style=\"color:rgb(0,0,0);\">Cửa hàng </span><a href=\"https://thegioithoitrangbaby.vn/\"><span style=\"color:rgb(0,51,102);\"><strong>Thế Giới Thời Trang Baby</strong></span></a><span style=\"color:rgb(0,0,0);\"> của chúng tôi sẽ giúp các mẹ có nhiều lựa chọn hơn. Chúng tôi có cả hàng áo khoác bé trai vnxk, hàng ngoại giá nội, nhưng số lượng có hạn thôi nhé. Chiếc áo khoác vào tay các nhà thiết kế ngoài công dụng giữ ấm, chống nắng nay đã trở nên góc cạnh, tinh tế, chi tiết hoa văn hơn. Bên những chiếc áo khoác bé trai xuất khẩu, chúng tôi còn mang đến những chiếc áo khoác bé trai đẹp, sành điệu các bé trai hóa quý ông trong các dịp lễ Tết. Hãy đến ngày với cửa hàng chúng tôi để được tận mắt ngắm nhìn thế giới áo khoác bé trai tốt nhất TP. HCM.</span></p>', '{\"image\":\"\\/public\\/upload\\/admin\\/quan-ao-be-trai-dep.jpg\",\"image_background\":null,\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '0', 3, ';;', 'active', 1, 2, 2, '2023-05-10 02:29:28', '2023-05-11 01:54:18', NULL),
(111, 'san-pham', 104, 'Áo Sơ Mi Bé Gái', 'ao-so-mi-be-gai', NULL, '<h2 style=\"text-align:center;\"><span style=\"color:rgb(0,0,0);\"><strong>Các Mẫu Áo Sơ Mi Cho Bé Gái Đẹp Làm Xao Xuyến Các Bà Mẹ</strong></span></h2><figure class=\"image\"><img src=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2018/11/ao-so-mi-be-gai-dep-nhat-thegioithoitrangbabyvn.png\" alt=\"\"></figure><p><span style=\"color:rgb(0,0,0);\">Với các bé gái, tất nhiên là các mẹ sẽ thường cho các bé mặc váy, mặc đầm…Nhưng nếu một ngày thức dậy, các mẹ đã thấy chán ngán khi cứ phải lặp đi lặp lại hết váy rồi lại đến đầm, muốn đổi gió cho cho con gái yêu nhưng cũng thực chất là cho chính mình thì hãy tham khảo ngay danh mục </span><a href=\"https://thegioithoitrangbaby.vn/danh-muc/ao-so-mi-be-gai/\"><span style=\"color:rgb(0,51,102);\"><strong>áo sơ mi bé gái</strong></span></a><span style=\"color:rgb(0,0,0);\"> của chúng tôi.</span></p><h3><span style=\"color:rgb(0,0,0);\"><strong>Áo sơ mi bé gái đẹp cho con yêu của bạn, tại sao không ?</strong></span></h3><p><span style=\"color:rgb(0,0,0);\">Đâu phải chỉ có bé trai mặc áo sơ mi mới hợp. Chiếc áo sơ mi nam vốn cứng và dày vào tay các nhà thiết kế với chút biến hóa, rung chuyển đã khiến nó trở nên mỏng, mềm mại và uyển chuyển nữ tính hơn. Ngoài ra, với những tông màu sắc nhẹ cùng họa tiết trang trí phong phú càng giúp cho chiếc áo sơ mi cho bé gái thêm đẹp, dịu dàng hơn.</span></p><p><span style=\"color:rgb(0,0,0);\">Thế Giới áo sơ mi bé gái chúng tôi có rất nhiều kiểu dáng thiết kế từ kẻ sọc ca-rô, kiểu cà-vạt…tới hoa lá cành, thoải mái cho các mẹ lựa chọn. Như đoạn nhạc nào cũng cần có đoạn cao trào, như bức tranh nào cũng có trọng tâm, điểm nhấn. Các mẹ hãy cùng đến </span><a href=\"https://thegioithoitrangbaby.vn/\"><span style=\"color:rgb(0,51,102);\"><strong>Thế Giới Thời Trang Baby</strong></span></a><span style=\"color:rgb(0,0,0);\"> khám phá những chiếc áo sơ mi bé gái đẹp của chúng tôi để tạo điểm nhấn cho con gái yêu của mình nhé !</span></p>', '{\"image\":\"\\/public\\/upload\\/admin\\/quan-ao-be-gai-dep.jpg\",\"image_background\":null,\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '0', 1, ';;', 'active', 0, 2, 2, '2023-05-10 02:29:53', '2023-05-10 02:29:53', NULL),
(112, 'san-pham', 104, 'Áo Thun Bé Gái', 'ao-thun-be-gai', NULL, '<h2 style=\"text-align:center;\"><span style=\"color:rgb(0,0,0);\"><strong>Mỏi Mắt Ngắm Áo Phông Bé Gái | Áo Thun Bé Gái Xuất Khẩu&nbsp; Đẹp Mê Ly</strong></span></h2><figure class=\"image\"><img src=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2018/11/ao-thun-be-gai-dep-thegioithoitrangbabyvn.png\" alt=\"\"></figure><p><span style=\"color:rgb(0,0,0);\">Nếu các mẹ đang cùng bé trải qua những ngày nắng oi bức nóng nực thì với chiếc váy hay những chiếc áo dày sẽ khiến cho con bạn mệt mỏi vì bị nóng bức. Vì thế, các mẹ hãy nghĩ ngay đến chiếc áo thun. Những chiếc </span><a href=\"https://thegioithoitrangbaby.vn/danh-muc/ao-thun-be-gai/\"><span style=\"color:rgb(0,51,102);\"><strong>áo thun bé gái</strong></span></a><span style=\"color:rgb(0,0,0);\"> vốn nhỏ gọn, mỏng, hút ẩm, thoáng mát chính là phương án tốt nhất cho bé gái yêu của bạn vào những ngày nắng nóng.</span></p><h3><span style=\"color:rgb(0,0,0);\"><strong>Áo thun cho bé gái năng động trong ngày nắng nóng, tại sao không ?</strong></span></h3><p><span style=\"color:rgb(0,0,0);\">Hoặc nếu con gái yêu của bạn năng động, thích vui đùa, chạy nhảy với bao trẻ khác trong xóm, thì chiếc áo thun cho bé gái (hay áo phông cho bé gái) lại là một lựa chọn cực kỳ hợp lý cho các mẹ trong trường hợp này. Với phần lớn chất liệu làm từ sợi cotton, chiếc áo phông bé gái ở chỗ chúng tôi có độ hút ẩm tốt, co giãn vừa phải, bé sẽ thoải mái vận động mà không cảm thấy vướng víu gì.</span></p><p><span style=\"color:rgb(0,0,0);\">Còn nếu các mẹ muốn sắm cho bé gái yêu của những chiếc áo thun để ra ngoài đi chơi, đi dự tiệc thì cửa hàng chúng tôi cũng có những loại áo thun bé gái xuất khẩu hàng công ty, số lượng thì có hạn nhưng chất lượng thì vô cùng. Với nhiều màu sắc và hoa tiết trang trí phong phú, các mẹ tha hồ lựa chọn. Hãy ghé ngay trang </span><a href=\"https://thegioithoitrangbaby.vn/\"><span style=\"color:rgb(0,51,102);\"><strong>Thế Giới Thời Trang Baby</strong></span></a><span style=\"color:rgb(0,0,0);\">, chúng tôi sẽ hóa thiên thần con gái yêu của các bạn !</span></p>', '{\"image\":\"\\/public\\/upload\\/admin\\/quan-ao-be-gai-dep.jpg\",\"image_background\":null,\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '0', 2, ';;', 'active', 0, 2, 2, '2023-05-10 02:30:18', '2023-05-10 02:30:18', NULL),
(113, 'san-pham', 104, 'Đầm Bé Gái', 'dam-be-gai', NULL, '<h2 style=\"text-align:center;\"><span style=\"color:rgb(0,0,0);\"><strong>Đầm Bé Gái Cao Cấp | Váy Bé Gái Đẹp &amp; Giá Rẻ Nhất Thị Trường</strong></span></h2><figure class=\"image\"><img src=\"https://thegioithoitrangbaby.vn/wp-content/uploads/2018/11/dam-be-gai-dep-gia-re-thegioithoitrangbabyvn.png\" alt=\"\"></figure><p><span style=\"color:rgb(0,0,0);\">Xin chào các mẹ, cuộc sống của các mẹ và bé gái yêu của mình không chỉ có ở nhà. Cuối tuần, các dịp lễ Tết mẹ và bé vẫn ra ngoài, đi chơi hay đi dự tiệc. Những lúc như vậy, những bộ đầm bé gái (hay váy bé gái) là rất cần thiết, chẳng lẽ các mẹ vẫn để bé gái yêu của mình ra ra ngoài với những bộ quần áo đã cũ, lấm lem, úa màu như thường ngày sao ? Hãy để con gái yêu của mình tỏa sáng trong những mẫu </span><a href=\"https://thegioithoitrangbaby.vn/danh-muc/dam-be-gai/\"><span style=\"color:rgb(0,51,102);\"><strong>đầm bé gái đẹp</strong></span></a><span style=\"color:rgb(0,0,0);\"> nhất ở cửa hàng chúng tôi nhé.</span></p><h3><span style=\"color:rgb(0,0,0);\"><strong>Đầm bé gái (váy bé gái) giúp con yêu của mẹ tỏa sáng trong bữa tiệc</strong></span></h3><p><span style=\"color:rgb(0,0,0);\">Đến với Thế Giới Thời Trang Baby đầm bé gái cao cấp của chúng tôi, với nhiều loại thiết kế, mẫu mã đa dạng từ Đông sang Tây đáp ứng mọi nhu cầu của các mẹ. Với những loại váy bé gái đẹp, hàng ngoại giá nội, những bộ đầm của chúng tôi sẽ hóa thiên nga bé gái của bạn trong bữa tiệc hay trong những buổi đi chơi dã ngoại.</span></p><p><span style=\"color:rgb(0,0,0);\">Còn nếu các mẹ muốn những loại váy, đầm nhẹ hơn, chúng tôi cũng không ngần ngại. Chúng tôi cung cấp các loại đầm bé gái giá rẻ (váy bé gái giá rẻ), giúp các mẹ tiết kiệm tiền hơn cho những mua sắm khác của mình, hàng rẻ những không hề tẻ nhạt nhé. Nào, xin mời đến với cửa hàng </span><a href=\"https://thegioithoitrangbaby.vn/\"><span style=\"color:rgb(0,51,102);\"><strong>Thế Giới Thời Trang Baby</strong></span></a><span style=\"color:rgb(0,0,0);\"> của chúng tôi !</span></p>', '{\"image\":\"\\/public\\/upload\\/admin\\/quan-ao-be-gai-dep.jpg\",\"image_background\":null,\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '0', 3, ';;', 'active', 0, 2, 2, '2023-05-10 02:30:47', '2023-05-10 02:30:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_components`
--

CREATE TABLE `tb_components` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `component_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brief` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_components`
--

INSERT INTO `tb_components` (`id`, `component_code`, `parent_id`, `title`, `brief`, `content`, `json_params`, `image`, `image_background`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'menu', NULL, 'Main menu', NULL, NULL, '{\"menu_id\":\"24\"}', NULL, NULL, 1, 'active', 1, 1, '2022-05-04 01:23:05', '2022-08-23 04:01:35'),
(2, 'banner_image', NULL, 'Adv banner', NULL, NULL, NULL, '/data/cms-image/banner/no-banner.jpg', NULL, 2, 'active', 1, 1, '2022-05-04 03:25:30', '2022-05-04 03:25:30'),
(3, 'menu', NULL, 'Primary sidebar', 'Primary sidebar section', NULL, '{\"menu_id\":\"33\"}', NULL, NULL, 3, 'active', 1, 1, '2022-05-19 00:24:44', '2022-05-19 18:38:15'),
(4, 'custom', NULL, 'Footer content', NULL, NULL, NULL, NULL, NULL, 4, 'active', 1, 1, '2022-05-19 08:21:27', '2022-05-19 08:21:27'),
(5, NULL, 2, 'Right banner 1', 'Description to this banner', NULL, '{\"url_link\":\"#\",\"url_link_title\":\"Show now\",\"target\":\"_self\"}', '/data/cms-image/meta-logo-favicon.png', NULL, 5, 'delete', 1, 1, '2022-05-19 21:24:40', '2022-05-19 23:23:36'),
(6, NULL, 2, 'Right banner 1', 'Description to this banner', NULL, '{\"url_link\":\"#\",\"url_link_title\":\"Show now\",\"target\":\"_self\"}', '/data/cms-image/meta-logo-favicon.png', NULL, 1, 'active', 1, 1, '2022-05-19 21:27:07', '2022-05-19 21:27:07'),
(7, NULL, 2, 'Right banner 2', NULL, NULL, '{\"url_link\":\"#\",\"url_link_title\":\"View more\",\"target\":\"_self\"}', '/data/banner/architektura-5.jpg', NULL, 2, 'active', 1, 1, '2022-05-19 23:25:03', '2022-05-19 23:25:03'),
(8, NULL, 2, 'Right banner 3', NULL, NULL, '{\"url_link\":null,\"url_link_title\":null,\"target\":\"_self\"}', '/data/banner/ewx_cslxkaio8su.jpg', NULL, 3, 'active', 1, 1, '2022-05-19 23:27:24', '2022-05-19 23:27:24');

-- --------------------------------------------------------

--
-- Table structure for table `tb_component_configs`
--

CREATE TABLE `tb_component_configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `component_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `is_config` tinyint(1) NOT NULL DEFAULT '1',
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_component_configs`
--

INSERT INTO `tb_component_configs` (`id`, `name`, `description`, `component_code`, `json_params`, `is_config`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'Menu', NULL, 'menu', NULL, 1, 1, 'active', 1, 1, '2022-04-26 02:53:00', '2022-04-26 02:53:00'),
(2, 'Custom', NULL, 'custom', NULL, 1, 2, 'active', 1, 1, '2022-04-26 02:53:17', '2022-04-26 02:53:17'),
(3, 'Banner / Image', NULL, 'banner_image', NULL, 1, 3, 'active', 1, 1, '2022-04-26 02:53:50', '2022-04-26 02:53:50');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contacts`
--

CREATE TABLE `tb_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'contact',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `admin_note` text COLLATE utf8mb4_unicode_ci,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_experts`
--

CREATE TABLE `tb_experts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên chuyên gia',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mô tả',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Ảnh đại diện',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_experts`
--

INSERT INTO `tb_experts` (`id`, `title`, `description`, `image`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(3, 'Vũ Văn Kiên', 'CEO: Công ty TNHH Phần mềm', '/data/avatar/logo.png', 1, 1, '2022-10-24 07:06:54', '2022-10-24 07:06:54'),
(4, 'Nguyễn Trường Giang', 'Chuyên gia tâm lý', '/data/avatar/DSC08910-567-crop-200-112.jpg', 1, 1, '2022-10-24 07:41:57', '2022-10-24 07:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `tb_function`
--

CREATE TABLE `tb_function` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_logs`
--

CREATE TABLE `tb_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `url_referer` text COLLATE utf8mb4_unicode_ci,
  `url` text COLLATE utf8mb4_unicode_ci,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `params` text COLLATE utf8mb4_unicode_ci,
  `logged_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_menus`
--

CREATE TABLE `tb_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `url_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `system_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_menus`
--

INSERT INTO `tb_menus` (`id`, `parent_id`, `name`, `description`, `url_link`, `menu_type`, `system_code`, `json_params`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(45, NULL, 'Menu chính', NULL, NULL, 'header', NULL, NULL, 1, 'active', 2, 2, '2023-04-28 07:16:29', '2023-04-28 07:16:29'),
(46, 45, 'Trang chủ', NULL, '/', NULL, NULL, '{\"icon\":null,\"target\":\"_self\"}', 1, 'active', 2, 2, '2023-04-28 07:16:46', '2023-04-28 07:27:44'),
(47, 45, 'Thông tin cửa hàng', NULL, '/chi-tiet/doi-net-ve-thong-tin-showroom-the-gioi-thoi-trang-baby.html', NULL, NULL, '{\"icon\":null,\"target\":\"_self\"}', 2, 'active', 2, 2, '2023-04-28 07:17:03', '2023-05-12 02:11:48'),
(50, 45, 'Tin tức', NULL, '/tin-tuc/tin-tuc.html', NULL, NULL, '{\"icon\":null,\"target\":\"_self\"}', 3, 'active', 2, 2, '2023-04-28 07:17:51', '2023-05-10 02:08:54'),
(55, 45, 'Thanh toán & vận chuyển', NULL, '/chi-tiet/phuong-thuc-thanh-toan-va-cach-thuc-van-chuyen-khi-mua-hang.html', NULL, NULL, '{\"icon\":null,\"target\":\"_self\"}', 4, 'active', 2, 2, '2023-04-28 07:19:48', '2023-05-12 02:12:05'),
(58, 45, 'Liên hệ', NULL, '/lien-he', NULL, NULL, '{\"icon\":null,\"target\":\"_self\"}', 5, 'active', 2, 2, '2023-04-28 07:21:00', '2023-05-12 03:44:16');

-- --------------------------------------------------------

--
-- Table structure for table `tb_modules`
--

CREATE TABLE `tb_modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_modules`
--

INSERT INTO `tb_modules` (`id`, `module_code`, `name`, `description`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'users', 'Quản lý người dùng', 'Chức năng quản lý người dùng hệ thống website ngoài', 1, 'active', 1, 1, '2021-10-01 05:35:15', '2021-10-01 06:43:20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_module_functions`
--

CREATE TABLE `tb_module_functions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `function_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_module_functions`
--

INSERT INTO `tb_module_functions` (`id`, `module_id`, `function_code`, `name`, `description`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'users.index', 'Xem danh sách', 'Xem danh sách người dùng', 1, 'active', 1, 1, '2021-10-01 09:26:47', '2021-10-01 09:26:47'),
(2, 1, 'users.create', 'Thêm mới', NULL, 2, 'active', 1, 1, '2021-10-01 09:29:02', '2021-10-01 11:42:28');

-- --------------------------------------------------------

--
-- Table structure for table `tb_online_exchange`
--

CREATE TABLE `tb_online_exchange` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `taxonomy_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_part` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brief` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `member` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Thành viên viết bài',
  `manage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Người duyệt',
  `experts` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Chuyên gia',
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'waiting',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_online_exchange`
--

INSERT INTO `tb_online_exchange` (`id`, `taxonomy_id`, `title`, `url_part`, `image`, `image_thumb`, `brief`, `content`, `start_date`, `end_date`, `member`, `manage`, `experts`, `json_params`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 39, 'Giao lưu với các chuyên gia hàng đầu', 'giao-luu-voi-cac-chuyen-gia-hang-dau', NULL, NULL, 'Giao lưu với các chuyên gia hàng đầu', '<p>Giao lưu với các chuyên gia hàng đầu</p>', '2022-10-24 14:36:00', '2022-10-25 20:42:00', ',1,2,', ',4,5,', ',3,4,', '{\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 'active', 1, 1, '2022-10-24 07:36:49', '2022-10-25 01:51:36'),
(2, 39, 'Giao lưu trực tuyến: \"Sẵn sàng Kỳ thi tốt nghiệp THPT năm 2022\"', 'giao-luu-truc-tuyen-san-sang-ky-thi-tot-nghiep-thpt-nam-2022', 'https://photo-cms-giaoducthoidai.zadn.vn/w820/Uploaded/2022/rgtzzn/2022-06-06/san-sang-ky-thi-01.jpg', NULL, '“Sẵn sàng Kỳ thi tốt nghiệp THPT năm 2022” là chủ đề giao lưu trực tuyến trên báo Giáo dục và Thời đại điện tử diễn ra từ 9h30 - 10h30 thứ Ba ngày 7/6.', '<p>Chương trình giao lưu có sự tham gia của 2 khách mời:</p><p><strong>Ông Phùng Quốc Lập, Phó Giám đốc Sở Giáo dục và Đào tạo tỉnh Phú Thọ;</strong></p><p><strong>Thầy Lâm Đức Thành, Hiệu trưởng Trường THPT Bùi Hữu Nghĩa (quận Bình Thuỷ, TP Cần Thơ).</strong></p><p>Kỳ thi tốt nghiệp THPT năm 2022 được tổ chức vào các ngày 7,8/7 và cơ bản giữ ổn định như năm 2021. Theo đó, Bộ Giáo dục và Đào tạo chỉ đạo chung; các tỉnh/thành phố trực thuộc Trung ương chủ trì toàn bộ công tác tổ chức thi tại địa phương bảo đảm an toàn, nghiêm túc, chất lượng. Điểm mới căn bản năm nay là việc tổ chức đăng ký dự thi trực tuyến cho các học sinh lớp 12 năm học 2021-2022.</p><p>Hiện nay, công tác chuẩn bị cho Kỳ thi được triển khai tích cực. Bộ Giáo dục và Đào tạo đã ban hành Hướng dẫn tổ chức Kỳ thi. Ban Chỉ đạo cấp quốc gia và Ban Chỉ đạo cấp tỉnh/thành Kỳ thi tốt nghiệp THPT năm 2022 đã được thành lập. Thủ tướng Chính phủ cũng đã ban hành Chỉ thị tăng cường chỉ đạo, phối hợp tổ chức Kỳ thi tốt nghiệp THPT và tuyển sinh đại học, giáo dục nghề nghiệp năm 2022.</p><p>Trên cơ sở những kinh nghiệm đã đạt được trong việc tổ chức Kỳ thi tốt nghiệp THPT năm 2021 trong bối cảnh dịch Covid-19 diễn biến phức tạp, Bộ Giáo dục và Đào tạo đã ban hành phương án tổ chức thi tốt nghiệp THPT năm 2022 cho các học sinh bị ảnh hưởng bởi dịch Covid-19.</p><p>Theo đó, thí sinh thuộc diện F0 có giấy xác nhận do cơ quan có thẩm quyền cấp sẽ được xét đặc cách tốt nghiệp THPT. Trường hợp có nguyện vọng tham dự Kỳ thi, các thí sinh này phải nộp đơn xin dự thi, cam kết tuân thủ các quy định phòng chống, dịch Covid-19, được cha, mẹ hoặc người giám hộ ký xác nhận đồng ý. Các thí sinh này được Hội đồng thi bố trí dự thi tại các phòng thi riêng đáp ứng yêu cầu về phòng, chống dịch Covid-19.</p><p>Thời điểm này, công tác chuẩn bị cho Kỳ thi đang được các địa phương, cơ sở giáo dục chuẩn bị tích cực, với phương châm không để bị động trong mọi tình huống. Các khách mời tham gia giao lưu sẽ chia sẻ những thông tin đáng chú ý xung quanh công tác này.</p><p>Để giao lưu cùng các khách mời, độc giả có thể gửi câu hỏi tới khách mời tại đây, hoặc qua email của Báo Giáo dục và Thời đại: gdtddientu@gmail.com hoặc tương tác qua Fanpage của Báo.</p>', '2022-10-25 08:57:00', '2022-11-30 08:57:00', ',1,2,', ',4,5,', '', '{\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 'active', 1, 1, '2022-10-25 01:58:28', '2022-11-09 04:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `tb_online_exchange_detail`
--

CREATE TABLE `tb_online_exchange_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exchange_id` bigint(20) UNSIGNED DEFAULT NULL,
  `experts_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL COMMENT 'Trả lời bình luận',
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Tác giả câu hỏi',
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'waiting',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_online_exchange_detail`
--

INSERT INTO `tb_online_exchange_detail` (`id`, `exchange_id`, `experts_id`, `parent_id`, `author`, `content`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, 'Phùng Văn Hà', 'Bình luận giao lưu trực tuyến', 'active', 1, 1, '2022-10-24 08:09:14', '2022-10-24 08:09:14'),
(2, 1, 3, 1, NULL, '<p>Đang bình luận….</p>', 'active', 1, 1, '2022-10-24 10:23:30', '2022-10-25 02:55:44'),
(3, 1, 4, 1, NULL, '<p>Tôi đồng ý quan điểm với ông Vũ Văn Kiên</p>', 'active', 1, 1, '2022-10-24 11:03:10', '2022-10-25 02:55:36'),
(4, 1, NULL, NULL, 'Văn Thanh', 'Công tác phối hợp trong tổ chức thi tốt nghiệp THPT năm 2022 tại Phú Thọ được triển khai như thế nào?', 'active', NULL, NULL, '2022-10-25 03:01:00', '2022-10-25 03:09:48'),
(5, 1, 4, 4, NULL, '<p>Trước hết, Sở GD&amp;ĐT xây dựng văn bản phối hợp với các sở, ban, ngành, đoàn thể liên quan và ủy ban nhân dân các huyện, thành, thị triển khai những nội dung liên quan đến tổ chức Kỳ thi; đặc biệt quan tâm đến nội dung đảm bảo an ninh, trật tự, an toàn giao thông, vệ sinh, an toàn thực phẩm, phòng, chống dịch bệnh và xây dựng phương án trong tình huống mưa, bão, lũ, lụt, thời tiết bất thường xảy ra,...</p><p>Sở GD&amp;ĐT đồng thời có văn bản phối hợp Công an tỉnh rà soát, xây dựng phương án đảm bảo an toàn, an ninh; phối hợp cử lực lượng tham gia các khâu tổ chức Kỳ thi. Cùng với đó, phối hợp với trường Đại học Hùng Vương kiểm tra, rà soát, chuẩn bị cơ sở vật chất, trang thiết bị và các điều kiện phục vụ các khâu tổ chức Kỳ thi.</p>', 'active', 1, 1, '2022-10-25 08:19:35', '2022-10-25 08:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `tb_options`
--

CREATE TABLE `tb_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_system_param` tinyint(1) DEFAULT '1',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_options`
--

INSERT INTO `tb_options` (`id`, `option_name`, `option_value`, `description`, `is_system_param`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(2, 'information', '{\"site_name\":\"TH\\u1ebe GI\\u1edaI TH\\u1edcI TRANG BABY\",\"hotline\":\"0902.993.286\",\"phone\":\"0902.993.286\",\"email\":\"THEGIOITHOITRANGBABY@GMAIL.COM\",\"address\":null,\"brief\":\"TH\\u1ebe GI\\u1edaI TH\\u1edcI TRANG BABY - N\\u01a0I THI\\u00caN TH\\u1ea6N T\\u1eceA S\\u00c1NG, THI\\u00caN \\u0110\\u01af\\u1edcNG QU\\u1ea6N \\u00c1O TR\\u1eba EM CAO C\\u1ea4P\",\"copyright\":\"B\\u1ea3n quy\\u1ec1n \\u00a9 2021 Th\\u1ebf gi\\u1edbi th\\u1eddi trang Baby\",\"seo_title\":\"TH\\u1ebe GI\\u1edaI TH\\u1edcI TRANG BABY\",\"seo_keyword\":null,\"seo_description\":\"TH\\u1ebe GI\\u1edaI TH\\u1edcI TRANG BABY\",\"contacts\":null}', 'Các dữ liệu cấu trúc liên quan đến thông tin liên hệ của hệ thống website', 0, 1, 2, '2021-10-01 22:06:00', '2023-05-10 01:55:25'),
(5, 'image', '{\"logo_header\":\"\\/public\\/upload\\/admin\\/logo.png\",\"logo_footer\":\"\\/public\\/upload\\/admin\\/logo.png\",\"favicon\":\"\\/public\\/upload\\/admin\\/favicon.png\",\"seo_og_image\":\"\\/public\\/upload\\/admin\\/logo.png\"}', 'Danh sách các hình ảnh cấu hình trên hệ thống tại các vị trí', 0, 1, 2, '2021-10-11 02:22:56', '2023-05-09 14:38:26'),
(6, 'social', '{\"facebook\":\"https:\\/\\/www.facebook.com\\/\",\"youtube\":\"https:\\/\\/www.youtube.com\\/\",\"zalo\":\"https:\\/\\/zalo.me\\/\",\"messenger\":\"https:\\/\\/m.me\\/\"}', 'Danh sách các Social network của hệ thống', 0, 1, 2, '2022-02-14 03:35:40', '2023-05-04 04:04:17'),
(7, 'page', '{\r\n\"frontend.home\":  1\r\n}', NULL, 0, 1, 1, '2022-05-26 04:03:52', '2022-06-08 21:03:39'),
(8, 'source_code', '{\"css\":null,\"javascript\":null,\"map\":\"<iframe src=\\\"https:\\/\\/www.google.com\\/maps\\/embed?pb=!1m18!1m12!1m3!1d3109.5914043665716!2d105.8276159664243!3d21.002854330161327!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac7dc5bab827%3A0xc076d880a1dc5828!2zQuG7h25oIHZp4buHbiDEkOG6oWkgaOG7jWMgWSBIw6AgTuG7mWk!5e0!3m2!1svi!2s!4v1683169690480!5m2!1svi!2s\\\" width=\\\"600\\\" height=\\\"450\\\" style=\\\"border:0;\\\" allowfullscreen=\\\"\\\" loading=\\\"lazy\\\" referrerpolicy=\\\"no-referrer-when-downgrade\\\"><\\/iframe>\",\"fanpage\":null}', NULL, 0, 1, 2, '2022-06-06 19:24:11', '2023-05-04 03:08:23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_orders`
--

CREATE TABLE `tb_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'product',
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_note` text COLLATE utf8mb4_unicode_ci,
  `admin_note` text COLLATE utf8mb4_unicode_ci,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_orders`
--

INSERT INTO `tb_orders` (`id`, `is_type`, `customer_id`, `name`, `email`, `phone`, `address`, `customer_note`, `admin_note`, `json_params`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'product', NULL, 'Tung', 'Tungẻt', 'Tung2ewrasdtyuk', 'rthjgvetrh', 'reTGRZhxyju', NULL, NULL, 'new', NULL, NULL, '2023-06-03 01:52:31', '2023-06-03 01:52:31'),
(2, 'product', NULL, 'Test3t4ar', 'Test', 'Test', 'rưqrqEGRZ', 'ẻt', NULL, NULL, 'new', NULL, NULL, '2023-06-03 01:54:29', '2023-06-03 01:54:29'),
(3, 'product', NULL, 'Test', 'Test', 'Test', 'Số 1, Tôn Thất Tùng, Đống Đa, Hà Nội', NULL, NULL, NULL, 'new', NULL, NULL, '2023-06-03 01:56:16', '2023-06-03 01:56:16'),
(4, 'product', NULL, 'Test', 'Test', 'Test', NULL, NULL, NULL, NULL, 'new', NULL, NULL, '2023-06-03 01:57:02', '2023-06-03 01:57:02'),
(5, 'product', NULL, 'Test', 'Test', 'Test', NULL, NULL, NULL, NULL, 'new', NULL, NULL, '2023-06-03 01:57:57', '2023-06-03 01:57:57'),
(7, 'product', NULL, 'Tung456456', 'Tung', 'e2retyuetwe5y563', 'QEhtr', 'rztdhgj', NULL, NULL, 'new', NULL, NULL, '2023-06-03 02:44:39', '2023-06-03 02:44:39'),
(8, 'product', NULL, 'Liênetr', 'Liên', 'Liên', '4F28 XRC, Unnamed Road, Thanh Mỹ, Sơn Tây, Hà Nội, Việt Nam', 'qeargftdhfng', NULL, NULL, 'new', NULL, NULL, '2023-06-03 02:53:08', '2023-06-03 02:53:08'),
(9, 'product', NULL, 'Trường', 'Trường', 'Trường', 'retyuio', 'srdtf', NULL, NULL, 'new', NULL, NULL, '2023-06-03 02:55:50', '2023-06-03 02:55:50'),
(10, 'product', NULL, 'Quản', 'Quản', 'Quản', 'ưedfsb', '', NULL, NULL, 'new', NULL, NULL, '2023-06-03 02:58:27', '2023-06-03 02:58:27'),
(11, 'product', NULL, 'Trườngretryui', 'Trường', 'Trường', 'Yên Bình, Thạch Thất, Hà Nội', 'tyuki', NULL, NULL, 'new', NULL, NULL, '2023-06-03 03:01:15', '2023-06-03 03:01:15'),
(12, 'product', NULL, 'Quản', 'Quản', 'Quản', '4F28 XRC, Unnamed Road, Thanh Mỹ, Sơn Tây, Hà Nội, Việt Nam', 'etryu', NULL, NULL, 'new', NULL, NULL, '2023-06-03 03:02:42', '2023-06-03 03:02:42'),
(13, 'product', NULL, 'Nhânưqrewtry', 'Nhân', 'Nhân', 'sgrdhtf', 'qeagrstdfh', NULL, NULL, 'new', NULL, NULL, '2023-06-03 03:04:37', '2023-06-03 03:04:37'),
(14, 'product', NULL, 'Nguyễn Hữu123', 'Nguyễn Hữu', 'Nguyễn Hữu6986', 'Yên Bình, Thạch Thất, Hà Nội', 'fxhgchvjbn', NULL, NULL, 'new', NULL, NULL, '2023-06-03 03:07:16', '2023-06-03 03:07:16'),
(15, 'product', NULL, 'Nhân', 'Nhân', 'Nhân', 'qeaFszgrthg', '', NULL, NULL, 'new', NULL, NULL, '2023-06-03 03:10:34', '2023-06-03 03:10:34');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order_details`
--

CREATE TABLE `tb_order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double(20,2) DEFAULT NULL,
  `discount` double(20,2) DEFAULT NULL,
  `customer_note` text COLLATE utf8mb4_unicode_ci,
  `admin_note` text COLLATE utf8mb4_unicode_ci,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_order_details`
--

INSERT INTO `tb_order_details` (`id`, `order_id`, `item_id`, `quantity`, `price`, `discount`, `customer_note`, `admin_note`, `json_params`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(10, 8, 21, 3, 160000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 9, 21, 2, 160000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 10, 21, 1, 160000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 10, 20, 1, 89000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 11, 21, 2, 160000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 12, 21, 1, 160000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 1, 21, 1, 160000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 2, 21, 2, 160000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 3, 20, 2, 89000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 4, 20, 2, 89000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 5, 20, 2, 89000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 7, 20, 1, 89000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 8, 21, 2, 160000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 9, 21, 3, 160000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 10, 20, 1, 89000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 11, 21, 1, 160000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 12, 20, 1, 89000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 13, 20, 1, 89000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 14, 21, 2, 160000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 15, 21, 1, 160000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pages`
--

CREATE TABLE `tb_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `route_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_pages`
--

INSERT INTO `tb_pages` (`id`, `name`, `title`, `keyword`, `description`, `content`, `route_name`, `alias`, `json_params`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'Trang chủ', NULL, 'Keyword for Home Category Page', 'Description for Home Category Page', 'Content for Home Category Page', 'frontend.home', 'trang-chu', '{\"og_image\":\"\\/data\\/cms-image\\/demo\\/3.jpg\",\"template\":\"home.primary\",\"block_content\":[\"75\",\"74\",\"19\",\"79\",\"80\",\"81\",\"82\",\"83\",\"84\",\"85\",\"93\"]}', 1, 'active', 1, 1, '2022-03-23 02:35:33', '2022-06-06 21:04:55'),
(3, 'Bài viết', NULL, NULL, NULL, NULL, 'frontend.cms.post_category', 'bai-viet', '{\"template\":\"post.category.default\",\"block_content\":[\"75\",\"94\",\"93\"]}', 2, 'active', 1, 1, '2022-06-02 04:20:50', '2022-06-02 04:27:43'),
(4, 'Chi tiết bài viết', NULL, NULL, NULL, NULL, 'frontend.cms.post', 'chi-tiet-bai-viet', '{\"template\":\"post.default\",\"block_content\":[\"75\",\"94\",\"93\"]}', 3, 'active', 1, 1, '2022-06-02 19:52:10', '2022-06-02 19:52:21'),
(5, 'Gói dịch vụ', NULL, NULL, NULL, NULL, 'frontend.cms.service_category', 'dich-vu', '{\"template\":\"service.category.default\",\"block_content\":[\"75\",\"94\",\"93\"]}', 4, 'delete', 1, 1, '2022-06-02 20:48:58', '2022-10-26 07:33:50'),
(6, 'Chi tiết dịch vụ', NULL, NULL, NULL, NULL, 'frontend.cms.service', 'chi-tiet-dich-vu', '{\"template\":\"service.default\",\"block_content\":[\"75\",\"94\",\"93\"]}', 5, 'delete', 1, 1, '2022-06-02 20:50:17', '2022-10-26 07:33:05'),
(7, 'Chuyên khoa', 'Chuyên khoa', NULL, NULL, NULL, 'frontend.cms.department', 'chuyen-khoa', '{\"og_image\":null,\"template\":\"department.default\",\"block_content\":[\"75\",\"94\",\"93\"]}', 6, 'delete', 1, 1, '2022-06-02 21:55:21', '2022-10-26 07:33:02'),
(8, 'Tìm kiếm tin tức', 'Tìm kiếm tin tức', NULL, NULL, NULL, 'frontend.cms.post', 'search', '{\"og_image\":null,\"template\":\"post.default\"}', 7, 'active', 1, 1, '2022-06-03 00:37:09', '2022-09-24 04:09:34'),
(9, 'Thông tin cá nhân', NULL, NULL, NULL, NULL, 'frontend.cms.user', 'profile', '{\"og_image\":null,\"template\":\"doctor.detail\"}', 8, 'active', 1, 1, '2022-06-03 00:37:30', '2022-09-10 04:06:17'),
(10, 'Thư viện', NULL, NULL, NULL, NULL, 'frontend.cms.resource_category', 'thu-vien', '{\"template\":\"resource.category.default\",\"block_content\":[\"75\",\"94\",\"93\"]}', 9, 'delete', 1, 1, '2022-06-03 01:26:47', '2022-10-26 07:32:49'),
(11, 'Chi tiết video', NULL, NULL, NULL, NULL, 'frontend.cms.resource', 'chi-tiet-video', '{\"template\":\"resource.default\",\"block_content\":[\"75\",\"94\",\"93\"]}', 10, 'delete', 1, 1, '2022-06-03 01:27:09', '2022-10-26 07:32:43'),
(13, 'Liên hệ', 'Liên hệ với chúng tôi', NULL, NULL, NULL, 'frontend.contact', 'lien-he', '{\"og_image\":null,\"template\":\"contact.default\",\"block_content\":[\"75\",\"94\",\"93\"]}', 11, 'active', 1, 1, '2022-06-07 00:35:49', '2022-06-07 01:10:18'),
(14, 'Sản phẩm', NULL, NULL, NULL, NULL, 'frontend.cms.product_category', 'san-pham', '{\"og_image\":null,\"template\":\"product.category.default\",\"block_content\":[\"75\",\"94\",\"93\"]}', 12, 'delete', 1, 1, '2022-06-10 02:26:56', '2022-10-26 07:32:39'),
(15, 'Chi tiết sản phẩm', NULL, NULL, NULL, NULL, 'frontend.cms.product', 'chi-tiet-san-pham', '{\"og_image\":null,\"template\":\"product.default\",\"block_content\":[\"75\",\"94\",\"93\"]}', 13, 'delete', 1, 1, '2022-06-10 02:27:42', '2022-10-26 07:32:36'),
(16, 'Giỏ hàng', 'Giỏ hàng', NULL, NULL, NULL, 'frontend.order.cart', 'gio-hang', '{\"og_image\":null,\"template\":\"cart.default\",\"block_content\":[\"75\",\"94\",\"93\"]}', 14, 'delete', 1, 1, '2022-06-16 20:53:32', '2022-10-26 07:32:31');

-- --------------------------------------------------------

--
-- Table structure for table `tb_post_comment`
--

CREATE TABLE `tb_post_comment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `member_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) DEFAULT '1' COMMENT '1: chờ duyệt',
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_post_document`
--

CREATE TABLE `tb_post_document` (
  `id` bigint(22) NOT NULL,
  `post_id` bigint(22) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_post_history`
--

CREATE TABLE `tb_post_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `taxonomy_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brief` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `is_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'post',
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_coppy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_part` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `torder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_like` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_view` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nhuanbut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aproved_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment_count` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cms_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_aproved` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_post_image`
--

CREATE TABLE `tb_post_image` (
  `id` bigint(22) NOT NULL,
  `post_id` bigint(22) DEFAULT NULL,
  `link_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_post_image`
--

INSERT INTO `tb_post_image` (`id`, `post_id`, `link_image`, `created_at`, `updated_at`, `status`) VALUES
(13, 20, '/public/upload/admin/aothunnam/ao-thun-chu-he-xam-AT40.jpg', '2023-05-11 02:19:26', '2023-05-11 02:19:26', 'active'),
(20, 21, '/public/upload/admin/aothunnam/bo-be-trai-khung-long-ao-ke-B80-6.jpg', '2023-06-03 03:22:48', '2023-06-03 03:22:48', 'active'),
(21, 21, '/public/upload/admin/aothunnam/bo-be-trai-khung-long-ao-ke-B80-7-768x768.jpg', '2023-06-03 03:22:48', '2023-06-03 03:22:48', 'active'),
(22, 21, '/public/upload/admin/aothunnam/bo-be-trai-khung-long-ao-ke-B80-8-768x576.jpg', '2023-06-03 03:22:48', '2023-06-03 03:22:48', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tb_products`
--

CREATE TABLE `tb_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `taxonomy_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `giakm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Mô tả',
  `chitiet` longtext COLLATE utf8mb4_unicode_ci COMMENT 'Nội dung',
  `diemban` longtext COLLATE utf8mb4_unicode_ci COMMENT 'Điểm bán',
  `giayto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Giấy tờ sản phẩm',
  `hienthi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Vị trí hiển thị sản phẩm',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT '0' COMMENT 'Lượt xem',
  `iorder` int(11) DEFAULT NULL,
  `tinhtrang` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1',
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `soluong` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soluongconlai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_products`
--

INSERT INTO `tb_products` (`id`, `taxonomy_id`, `title`, `alias`, `gia`, `giakm`, `mota`, `chitiet`, `diemban`, `giayto`, `hienthi`, `image`, `image_thumb`, `view`, `iorder`, `tinhtrang`, `status`, `meta_title`, `meta_keyword`, `meta_description`, `admin_created_id`, `admin_updated_id`, `json_params`, `created_at`, `updated_at`, `soluong`, `soluongconlai`) VALUES
(20, 103, 'Áo Thun Chú Hề – Xám AT40', 'ao-thun-chu-he-–-xam-at40', '89000', NULL, 'Áo Thun Chú Hề – Xám AT40 là sản phẩm được thiết kế cực kỳ dễ thương với họa tiết chú hề ngộ nghĩnh đáng yêu, tạo điểm nhấn thu hút cho bé. Với chất liệu cotton cao cấp sẽ giúp cho bé thoải mái nhất khi mặc.', '<figure class=\"table\"><table><tbody><tr><td><strong>Tên Sản Phẩm</strong></td><td>Áo Thun Chú Hề – Xám AT40</td></tr><tr><td><strong>Xuất Xứ</strong></td><td>Quảng Châu</td></tr><tr><td><strong>Giới Tính</strong></td><td>Nam</td></tr><tr><td><strong>Số Ký</strong></td><td>8kg -25kg</td></tr><tr><td><strong>Chất Liệu</strong></td><td>Cotton</td></tr><tr><td><strong>Màu Sắc</strong></td><td>Xám</td></tr></tbody></table></figure><p><br>&nbsp;</p>', NULL, NULL, ';0;1;', '/public/upload/admin/aothunnam/ao-thun-chu-he-xam-AT40.jpg', NULL, 0, NULL, 1, 1, NULL, NULL, NULL, 2, 2, NULL, '2023-05-10 10:02:55', '2023-06-03 03:04:37', '19', '19'),
(21, 103, 'Bộ Bé Trai Khủng Long Áo Kẻ B80', 'bo-be-trai-khung-long-ao-ke-b80', '175000', '160000', 'Bộ Bé Trai Khủng Long Áo Kẻ B80 là mẫu đồ bộ hè mặc ở nhà đi chơi hay đi học cho bé trai từ 10-22kg. Được thiết kế năng động với chất liệu vải cotton 4 chiều, chất mềm mịn thấm hút mồ hôi tốt, giúp trẻ thoái mái trong những hoạt động hằng ngày. Màu sắc và', '<figure class=\"table\"><table><tbody><tr><td><strong>Tên Sản Phẩm</strong></td><td>Bộ Bé Trai Khủng Long Áo Kẻ B80</td></tr><tr><td><strong>Xuất Xứ</strong></td><td>Quảng Châu</td></tr><tr><td><strong>Giới Tính</strong></td><td>Nam</td></tr><tr><td><strong>Số Ký</strong></td><td>10kg – 22kg</td></tr><tr><td><strong>Chất Liệu</strong></td><td>Cotton</td></tr><tr><td><strong>Màu Sắc</strong></td><td>Xanh</td></tr></tbody></table></figure>', NULL, NULL, ';0;', '/public/upload/admin/aothunnam/bo-be-trai-khung-long-ao-ke-B80-6.jpg', NULL, 0, NULL, 1, 1, NULL, NULL, NULL, 2, 2, NULL, '2023-05-10 10:05:34', '2023-06-03 03:22:26', '10', '10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_roles`
--

CREATE TABLE `tb_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `json_access` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_roles`
--

INSERT INTO `tb_roles` (`id`, `name`, `description`, `json_access`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'Quyền quản trị hệ thống', 'Dành cho nhân viên thiết kế và cập nhật nội dung', '{\"menu_id\":[\"51\",\"87\",\"86\",\"53\",\"69\",\"52\",\"80\",\"13\",\"58\",\"46\",\"45\",\"44\",\"10\",\"85\",\"3\",\"5\",\"6\",\"43\"]}', 1, 'active', 1, 2, '2021-10-02 03:59:48', '2023-04-28 09:19:46'),
(2, 'Quản trị nội dung', 'Quyền dành cho người quản trị hệ thống', '{\"menu_id\":[\"51\",\"53\",\"55\",\"69\",\"84\",\"52\",\"80\",\"13\",\"58\",\"46\",\"45\",\"44\",\"10\"]}', 2, 'active', 1, 1, '2021-10-02 04:28:09', '2023-02-11 04:25:54'),
(3, 'Phóng viên - Cộng tác viên', 'Phóng viên', '{\"menu_id\":[\"51\",\"84\",\"53\",\"55\"]}', 3, 'active', 1, 1, '2022-10-26 07:41:22', '2023-02-02 10:44:46'),
(4, 'Phóng viên cấp cao', NULL, '{\"menu_id\":[\"51\",\"56\",\"53\",\"70\",\"71\",\"72\",\"73\",\"74\",\"78\",\"79\",\"69\",\"75\",\"76\",\"77\",\"52\",\"66\",\"55\"]}', 4, 'active', 1, 1, '2022-10-26 08:04:29', '2022-10-26 08:04:29');

-- --------------------------------------------------------

--
-- Table structure for table `tb_royaltie`
--

CREATE TABLE `tb_royaltie` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_role`
--

CREATE TABLE `tb_user_role` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `json_action` longtext COLLATE utf8mb4_unicode_ci,
  `admin_created_id` int(11) NOT NULL,
  `admin_updated_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_user_role`
--

INSERT INTO `tb_user_role` (`id`, `role_id`, `json_action`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 1, '{\"51\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"87\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"86\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"53\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"69\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"52\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"80\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"13\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"58\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"46\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"45\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"44\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"10\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"85\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"3\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"5\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"6\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"43\":[\"index\",\"create\",\"update\",\"delete\",\"show\"]}', 1, 2, '2022-10-19 08:36:53', '2023-04-28 09:19:46'),
(2, 2, '{\"51\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"53\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"55\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"69\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"84\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"52\":[\"index\",\"create\",\"delete\",\"show\"],\"80\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"13\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"58\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"46\":[\"index\",\"create\",\"delete\",\"show\"],\"45\":[\"index\",\"create\",\"delete\",\"show\"],\"44\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"10\":[\"index\",\"create\",\"update\",\"delete\",\"show\"]}', 1, 1, '2022-10-19 08:37:38', '2023-02-11 04:25:54'),
(3, 3, '{\"51\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"84\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"53\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"55\":[\"index\",\"create\",\"update\",\"delete\",\"show\"]}', 1, 1, '2022-10-26 08:00:01', '2023-02-02 10:44:46'),
(4, 4, '{\"51\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"56\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"53\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"70\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"71\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"72\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"73\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"74\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"78\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"79\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"69\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"75\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"76\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"77\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"52\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"66\":[\"index\",\"create\",\"update\",\"delete\",\"show\"],\"55\":[\"index\",\"create\",\"update\",\"delete\",\"show\"]}', 1, 1, '2022-10-26 08:04:29', '2022-10-26 08:04:29');

-- --------------------------------------------------------

--
-- Table structure for table `tb_views`
--

CREATE TABLE `tb_views` (
  `id` int(11) NOT NULL,
  `ngay` int(11) NOT NULL,
  `mobile` int(11) NOT NULL,
  `web` int(11) NOT NULL,
  `toantrang` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_views`
--

INSERT INTO `tb_views` (`id`, `ngay`, `mobile`, `web`, `toantrang`, `created_at`, `updated_at`) VALUES
(2, 1621184400, 14, 70, 84, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(3, 1621270800, 70, 162, 232, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(4, 1621357200, 69, 247, 316, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(5, 1621443600, 218, 551, 769, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(6, 1621530000, 141, 667, 808, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(7, 1621616400, 80, 387, 467, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(8, 1621702800, 31, 44, 75, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(9, 1621789200, 109, 357, 466, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(10, 1621875600, 20, 234, 254, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(11, 1621962000, 67, 158, 225, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(12, 1622048400, 24, 28, 52, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(13, 1622134800, 14, 88, 102, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(14, 1622221200, 7, 18, 25, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(15, 1622307600, 3, 1, 4, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(16, 1622394000, 0, 80, 80, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(17, 1622480400, 16, 145, 161, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(18, 1622566800, 5, 178, 183, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(19, 1622653200, 17, 46, 63, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(20, 1622739600, 65, 174, 239, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(21, 1622826000, 3, 65, 68, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(22, 1622912400, 0, 13, 13, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(23, 1622998800, 71, 242, 313, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(24, 1623085200, 72, 205, 277, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(25, 1623171600, 6, 54, 60, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(26, 1623258000, 2, 37, 39, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(27, 1623430800, 0, 44, 44, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(28, 1623517200, 0, 9, 9, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(29, 1623603600, 1, 32, 33, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(30, 1623690000, 1, 6, 7, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(31, 1623776400, 3, 8, 11, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(32, 1623862800, 0, 27, 27, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(33, 1623949200, 2, 2, 4, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(34, 1624035600, 2, 1, 3, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(35, 1624122000, 1, 1, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(36, 1624294800, 1, 1, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(37, 1624381200, 1, 0, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(38, 1624554000, 0, 3, 3, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(39, 1624813200, 0, 4, 4, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(40, 1624899600, 0, 3, 3, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(41, 1625331600, 3, 0, 3, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(42, 1625418000, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(43, 1625504400, 1, 0, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(44, 1625590800, 2, 2, 4, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(45, 1625677200, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(46, 1625763600, 0, 4, 4, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(47, 1625850000, 0, 5, 5, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(48, 1625850000, 0, 5, 5, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(49, 1626022800, 2, 0, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(50, 1626109200, 3, 27, 30, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(51, 1626195600, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(52, 1626368400, 1, 0, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(53, 1626541200, 0, 5, 5, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(54, 1626800400, 0, 8, 8, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(55, 1626886800, 1, 0, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(56, 1626973200, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(57, 1627059600, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(58, 1627146000, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(59, 1627232400, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(60, 1627318800, 0, 3, 3, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(61, 1627578000, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(62, 1627664400, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(63, 1627750800, 0, 5, 5, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(64, 1627750800, 0, 5, 5, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(65, 1627837200, 0, 4, 4, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(66, 1627923600, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(67, 1628010000, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(68, 1628096400, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(69, 1628182800, 0, 5, 5, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(70, 1628442000, 0, 4, 4, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(71, 1628528400, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(72, 1629219600, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(73, 1629824400, 0, 3, 3, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(74, 1629997200, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(75, 1630083600, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(76, 1630342800, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(77, 1630429200, 0, 3, 3, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(78, 1630688400, 0, 9, 9, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(79, 1630774800, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(80, 1631034000, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(81, 1631293200, 0, 3, 3, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(82, 1631379600, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(83, 1631466000, 0, 4, 4, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(84, 1631638800, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(85, 1631811600, 6, 4, 10, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(86, 1631811600, 6, 4, 10, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(87, 1631811600, 6, 4, 10, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(88, 1632070800, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(89, 1632070800, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(90, 1632157200, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(91, 1632243600, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(92, 1632330000, 0, 5, 5, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(93, 1632416400, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(94, 1632502800, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(95, 1632589200, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(96, 1632675600, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(97, 1632762000, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(98, 1633021200, 0, 4, 4, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(99, 1633107600, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(100, 1633194000, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(101, 1633280400, 0, 3, 3, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(102, 1633366800, 0, 5, 5, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(103, 1633453200, 1, 1, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(104, 1633539600, 0, 5, 5, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(105, 1633626000, 0, 5, 5, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(106, 1633712400, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(107, 1633885200, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(108, 1633971600, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(109, 1634144400, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(110, 1634230800, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(111, 1634403600, 0, 6, 6, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(112, 1634749200, 0, 4, 4, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(113, 1634922000, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(114, 1635008400, 0, 5, 5, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(115, 1635181200, 0, 9, 9, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(116, 1635267600, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(117, 1635526800, 0, 10, 10, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(118, 1635613200, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(119, 1635699600, 0, 5, 5, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(120, 1635786000, 0, 17, 17, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(121, 1635872400, 0, 9, 9, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(122, 1635958800, 0, 7, 7, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(123, 1636218000, 0, 4, 4, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(124, 1636304400, 0, 4, 4, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(125, 1636390800, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(126, 1636736400, 0, 10, 10, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(127, 1636822800, 0, 4, 4, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(128, 1636909200, 0, 10, 10, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(129, 1636995600, 5, 11, 16, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(130, 1637082000, 0, 4, 4, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(131, 1637168400, 0, 5, 5, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(132, 1637254800, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(133, 1637514000, 0, 20, 20, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(134, 1637600400, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(135, 1637686800, 0, 9, 9, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(136, 1637773200, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(137, 1637859600, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(138, 1637946000, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(139, 1638032400, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(140, 1638118800, 0, 3, 3, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(141, 1638205200, 0, 11, 11, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(142, 1638291600, 0, 24, 24, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(143, 1638378000, 8, 9, 17, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(144, 1638464400, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(145, 1638550800, 0, 4, 4, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(146, 1638637200, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(147, 1638723600, 0, 11, 11, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(148, 1638810000, 0, 3, 3, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(149, 1639328400, 0, 5, 5, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(150, 1639414800, 0, 22, 22, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(151, 1639501200, 0, 5, 5, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(152, 1639674000, 0, 3, 3, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(153, 1640106000, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(154, 1640192400, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(155, 1640278800, 0, 11, 11, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(156, 1640365200, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(157, 1640451600, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(158, 1640538000, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(159, 1640624400, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(160, 1640710800, 6, 2, 8, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(161, 1640797200, 9, 0, 9, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(162, 1640883600, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(163, 1640970000, 0, 3, 3, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(164, 1641056400, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(165, 1641142800, 0, 3, 3, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(166, 1641488400, 0, 3, 3, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(167, 1641574800, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(168, 1641661200, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(169, 1641747600, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(170, 1641920400, 0, 3, 3, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(171, 1642006800, 0, 11, 11, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(172, 1642093200, 0, 6, 6, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(173, 1642179600, 0, 4, 4, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(174, 1642266000, 3, 7, 10, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(175, 1642352400, 0, 4, 4, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(176, 1642438800, 0, 6, 6, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(177, 1642611600, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(178, 1642698000, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(179, 1642784400, 0, 5, 5, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(180, 1642870800, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(181, 1642957200, 0, 15, 15, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(182, 1643130000, 0, 4, 4, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(183, 1643216400, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(184, 1643475600, 0, 13, 13, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(185, 1643562000, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(186, 1643648400, 0, 4, 4, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(187, 1643734800, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(188, 1643821200, 7, 4, 11, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(189, 1643994000, 0, 4, 4, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(190, 1644080400, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(191, 1644166800, 0, 5, 5, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(192, 1644253200, 0, 4, 4, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(193, 1644339600, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(194, 1644512400, 2, 0, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(195, 1644598800, 2, 0, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(196, 1644685200, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(197, 1644771600, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(198, 1644858000, 0, 13, 13, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(199, 1644944400, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(200, 1645030800, 0, 4, 4, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(201, 1645117200, 0, 4, 4, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(202, 1645203600, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(203, 1645376400, 0, 6, 6, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(204, 1645462800, 0, 8, 8, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(205, 1645549200, 3, 0, 3, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(206, 1645635600, 2, 0, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(207, 1645894800, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(208, 1645981200, 0, 4, 4, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(209, 1646067600, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(210, 1646154000, 0, 3, 3, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(211, 1646240400, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(212, 1646326800, 0, 3, 3, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(213, 1646499600, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(214, 1646586000, 0, 3, 3, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(215, 1646672400, 0, 9, 9, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(216, 1646758800, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(217, 1646845200, 0, 3, 3, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(218, 1647190800, 0, 4, 4, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(219, 1647277200, 4, 0, 4, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(220, 1647450000, 5, 8, 13, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(221, 1647536400, 3, 2, 5, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(222, 1647622800, 2, 2, 4, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(223, 1647795600, 3, 58, 61, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(224, 1647882000, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(225, 1647968400, 0, 12, 12, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(226, 1648054800, 0, 12, 12, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(227, 1648141200, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(228, 1648227600, 0, 1, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(229, 1648400400, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(230, 1648486800, 8, 113, 121, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(231, 1648573200, 20, 78, 98, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(232, 1648659600, 35, 45, 80, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(233, 1648746000, 7, 19, 26, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(234, 1649005200, 11, 29, 40, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(235, 1649178000, 11, 8, 19, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(236, 1649264400, 0, 6, 6, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(237, 1649350800, 3, 1, 4, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(238, 1649523600, 0, 2, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(239, 1649610000, 1, 0, 1, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(240, 1649782800, 0, 26, 26, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(241, 1649869200, 0, 29, 29, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(242, 1649955600, 2, 0, 2, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(243, 1650042000, 4, 1, 5, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(244, 1650301200, 13, 47, 60, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(245, 1650387600, 0, 8, 8, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(246, 1650474000, 8, 4, 12, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(247, 1650560400, 2, 5, 7, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(248, 1650819600, 1, 44, 45, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(249, 1650906000, 25, 19, 44, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(250, 1650992400, 32, 99, 131, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(251, 1651078800, 27, 44, 71, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(252, 1651165200, 15, 32, 47, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(253, 1651251600, 7, 32, 39, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(254, 1651338000, 18, 112, 130, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(255, 1651424400, 11, 128, 139, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(256, 1651510800, 21, 2, 23, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(257, 1651597200, 11, 19, 30, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(258, 1651683600, 4, 62, 66, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(259, 1651770000, 13, 31, 44, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(260, 1651856400, 3, 3, 6, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(261, 1651942800, 1, 15, 16, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(262, 1652029200, 8, 9, 17, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(263, 1652115600, 142, 108, 250, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(264, 1652202000, 355, 262, 617, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(265, 1652288400, 693, 566, 1259, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(266, 1652374800, 1775, 1327, 3102, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(267, 1652461200, 739, 264, 1003, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(268, 1652547600, 125, 64, 189, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(269, 1652634000, 109, 233, 342, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(270, 1652720400, 1446, 1457, 2903, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(271, 1652806800, 721, 699, 1418, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(272, 1652893200, 133, 191, 324, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(273, 1652979600, 217, 300, 516, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(274, 1653066000, 76, 36, 112, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(275, 1653152400, 13, 45, 58, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(276, 1653238800, 113, 285, 398, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(277, 1653325200, 102, 183, 285, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(278, 1653411600, 72, 116, 188, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(279, 1653498000, 1390, 1764, 3152, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(280, 1653584400, 2875, 4141, 7007, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(281, 1653670800, 2723, 4177, 6896, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(282, 1653757200, 2700, 3648, 6345, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(283, 1653843600, 1366, 1871, 3237, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(284, 1653930000, 514, 230, 744, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(285, 1654016400, 283, 179, 462, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(286, 1654102800, 236, 89, 324, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(287, 1654189200, 205, 265, 470, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(288, 1654275600, 209, 426, 635, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(289, 1654362000, 96, 90, 186, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(290, 1654448400, 145, 424, 569, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(291, 1654534800, 242, 292, 534, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(292, 1654621200, 48, 160, 208, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(293, 1654707600, 65, 187, 252, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(294, 1654794000, 57, 77, 134, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(295, 1654880400, 113, 205, 318, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(296, 1654966800, 80, 92, 172, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(297, 1655053200, 169, 278, 447, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(298, 1655139600, 132, 169, 301, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(299, 1655226000, 265, 332, 597, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(300, 1655312400, 292, 273, 565, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(301, 1655398800, 173, 154, 327, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(302, 1655485200, 115, 106, 221, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(303, 1655571600, 61, 46, 107, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(304, 1655658000, 59, 86, 145, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(305, 1655744400, 36, 51, 87, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(306, 1655830800, 37, 39, 76, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(307, 1655917200, 52, 89, 141, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(308, 1656003600, 60, 73, 133, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(309, 1656090000, 91, 140, 231, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(310, 1656176400, 46, 38, 84, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(311, 1656262800, 98, 203, 301, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(312, 1656349200, 201, 141, 342, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(313, 1656435600, 173, 235, 408, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(314, 1656522000, 141, 228, 369, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(315, 1656608400, 256, 310, 566, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(316, 1656694800, 328, 242, 570, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(317, 1656781200, 270, 145, 415, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(318, 1656867600, 131, 104, 235, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(319, 1656954000, 263, 152, 415, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(320, 1657040400, 527, 228, 755, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(321, 1657126800, 258, 92, 350, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(322, 1657213200, 170, 137, 307, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(323, 1657299600, 128, 80, 208, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(324, 1657386000, 99, 49, 148, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(325, 1657472400, 438, 159, 597, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(326, 1657558800, 108, 96, 204, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(327, 1657645200, 60, 102, 162, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(328, 1657731600, 212, 172, 384, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(329, 1657818000, 96, 101, 197, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(330, 1657904400, 98, 79, 177, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(331, 1657990800, 62, 78, 140, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(332, 1658077200, 70, 112, 182, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(333, 1658163600, 88, 50, 138, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(334, 1658250000, 144, 84, 228, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(335, 1658336400, 327, 148, 475, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(336, 1658422800, 92, 101, 193, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(337, 1658509200, 51, 67, 118, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(338, 1658595600, 61, 107, 168, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(339, 1658682000, 44, 95, 139, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(340, 1658768400, 52, 69, 121, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(341, 1658854800, 59, 80, 139, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(342, 1658941200, 68, 114, 182, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(343, 1659027600, 57, 177, 234, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(344, 1659114000, 56, 81, 137, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(345, 1659200400, 74, 79, 153, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(346, 1659286800, 403, 146, 549, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(347, 1659373200, 124, 108, 232, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(348, 1659459600, 73, 95, 168, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(349, 1659546000, 48, 82, 130, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(350, 1659632400, 48, 60, 108, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(351, 1659718800, 56, 107, 163, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(352, 1659805200, 49, 78, 127, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(353, 1659891600, 84, 107, 191, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(354, 1659978000, 43, 74, 117, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(355, 1660064400, 37, 55, 92, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(356, 1660150800, 149, 99, 248, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(357, 1660237200, 60, 56, 116, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(358, 1660323600, 38, 113, 151, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(359, 1660410000, 69, 72, 141, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(360, 1660496400, 81, 103, 184, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(361, 1660582800, 68, 92, 160, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(362, 1660669200, 49, 68, 117, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(363, 1660755600, 51, 91, 142, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(364, 1660842000, 62, 105, 167, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(365, 1660928400, 55, 83, 138, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(366, 1661014800, 43, 81, 124, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(367, 1661101200, 50, 135, 185, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(368, 1661187600, 65, 237, 302, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(369, 1661274000, 49, 111, 160, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(370, 1661360400, 37, 68, 105, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(371, 1661446800, 62, 99, 161, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(372, 1661533200, 60, 112, 172, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(373, 1661619600, 67, 83, 150, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(374, 1661706000, 64, 100, 164, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(375, 1661792400, 47, 182, 229, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(376, 1661878800, 55, 145, 200, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(377, 1661965200, 37, 67, 104, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(378, 1662051600, 52, 55, 107, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(379, 1662138000, 33, 74, 107, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(380, 1662224400, 45, 109, 154, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(381, 1662310800, 49, 161, 210, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(382, 1662397200, 39, 120, 159, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(383, 1662483600, 33, 157, 190, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(384, 1662570000, 72, 88, 160, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(385, 1662656400, 85, 76, 161, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(386, 1662742800, 47, 85, 132, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(387, 1662829200, 64, 67, 131, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(388, 1662915600, 73, 88, 161, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(389, 1663002000, 46, 78, 124, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(390, 1663088400, 55, 100, 155, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(391, 1663174800, 52, 62, 114, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(392, 1663261200, 70, 59, 129, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(393, 1663347600, 63, 38, 101, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(394, 1663434000, 58, 45, 103, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(395, 1663520400, 71, 68, 139, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(396, 1663606800, 35, 68, 103, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(397, 1663693200, 6, 126, 132, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(398, 1663779600, 9, 37, 46, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(399, 1663866000, 34, 68, 102, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(400, 1663952400, 76, 61, 137, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(401, 1664038800, 44, 74, 118, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(402, 1664125200, 40, 103, 143, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(403, 1664211600, 47, 91, 138, '2022-09-28 10:43:52', '2022-09-28 10:43:52'),
(404, 1664298000, 4, 575, 579, '2022-09-28 10:43:52', '2022-09-28 18:35:42'),
(405, 1664384400, 0, 32, 32, '2022-09-29 09:50:15', '2022-09-29 17:45:36'),
(406, 1666890000, 20, 29, 49, '2022-10-28 15:54:29', '2022-10-28 15:58:50'),
(407, 1667149200, 0, 1, 1, '2022-10-31 08:43:08', '2022-10-31 08:43:08'),
(408, 1669222800, 0, 11, 11, '2022-11-24 09:18:36', '2022-11-24 11:38:22'),
(409, 1669222800, 0, 1, 1, '2022-11-24 09:18:36', '2022-11-24 09:18:36'),
(410, 1669309200, 0, 3, 3, '2022-11-25 09:19:51', '2022-11-25 11:20:44'),
(411, 1669568400, 0, 2, 2, '2022-11-28 08:45:08', '2022-11-28 10:48:50'),
(412, 1669654800, 0, 1, 1, '2022-11-29 08:55:10', '2022-11-29 08:55:10'),
(413, 1670173200, 0, 23, 23, '2022-12-05 17:32:21', '2022-12-05 18:20:23'),
(414, 1670346000, 0, 1, 1, '2022-12-07 09:15:09', '2022-12-07 09:15:09'),
(415, 1673456400, 0, 2, 2, '2023-01-12 21:35:00', '2023-01-12 21:41:45'),
(416, 1673802000, 0, 23, 23, '2023-01-16 17:40:55', '2023-01-16 22:57:53'),
(417, 1673888400, 0, 30, 30, '2023-01-17 14:26:51', '2023-01-17 15:22:47'),
(418, 1680714000, 0, 1, 1, '2023-04-06 08:57:55', '2023-04-06 08:57:55'),
(419, 1683046800, 0, 1, 1, '2023-05-03 08:33:15', '2023-05-03 08:33:15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_widgets`
--

CREATE TABLE `tb_widgets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `widget_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brief` text COLLATE utf8mb4_unicode_ci,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_widgets`
--

INSERT INTO `tb_widgets` (`id`, `widget_code`, `title`, `brief`, `json_params`, `image`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'header', 'Header Style 1', 'Header 1 brief content', '{\"layout\":null,\"style\":null,\"component\":[\"1\",\"2\"]}', NULL, 10, 'active', 1, 1, '2022-05-04 07:59:07', '2022-05-10 00:29:20'),
(2, 'footer', 'Footer Style 1', NULL, '{\"layout\":null,\"style\":null,\"component\":[\"2\",\"1\"]}', NULL, 20, 'active', 1, 1, '2022-05-10 00:29:03', '2022-05-10 00:29:03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_widget_configs`
--

CREATE TABLE `tb_widget_configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `widget_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `is_config` tinyint(1) NOT NULL DEFAULT '1',
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_widget_configs`
--

INSERT INTO `tb_widget_configs` (`id`, `name`, `description`, `widget_code`, `json_params`, `is_config`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'Header', NULL, 'header', NULL, 1, 1, 'active', 1, 1, '2022-04-26 02:40:39', '2022-08-23 04:02:09'),
(2, 'Footer', NULL, 'footer', NULL, 1, 2, 'active', 1, 1, '2022-04-26 02:42:09', '2022-04-26 02:42:09'),
(3, 'Left Sidebar', NULL, 'left_sidebar', NULL, 1, 3, 'active', 1, 1, '2022-04-26 02:42:46', '2022-04-26 02:42:46'),
(4, 'Right Sidebar', NULL, 'right_sidebar', NULL, 1, 4, 'active', 1, 1, '2022-04-26 02:43:02', '2022-04-26 02:43:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified` tinyint(1) NOT NULL DEFAULT '0',
  `email_verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `is_super_user` tinyint(1) NOT NULL DEFAULT '0',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count_view_info` int(11) NOT NULL DEFAULT '0',
  `country_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `json_profiles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `user_type`, `email_verified`, `email_verification_code`, `status`, `is_super_user`, `avatar`, `birthday`, `sex`, `phone`, `count_view_info`, `country_id`, `city_id`, `district_id`, `json_params`, `json_profiles`, `admin_updated_id`) VALUES
(1, 'Thành Phùng', 'thangnh@gmail.com', 'thangnh', NULL, '$2y$10$T7U7Yj45WwVHYs2i./Qs.OCmQbLqlVvTzDRd3Szm5oQ5exjNLK8xG', NULL, NULL, '2022-09-16 03:12:43', NULL, 0, NULL, 'active', 0, '/member/hinhanh1/1663297963.jpg', '1999-09-14', '0', '0969584998', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Hữu Thắng', 'huuthangb2k50@gmail.com', 'huuthangb2k50', NULL, '$2y$10$T7U7Yj45WwVHYs2i./Qs.OCmQbLqlVvTzDRd3Szm5oQ5exjNLK8xG', NULL, '2022-09-28 04:26:26', '2022-09-28 04:32:34', NULL, 0, NULL, 'active', 0, '/member/hinhanh2/1664339554.png', '2000-09-12', '0', '102381234', 0, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admins_department_id_foreign` (`department_id`),
  ADD KEY `admins_function_id_foreign` (`function_id`),
  ADD KEY `admins_degree_id_foreign` (`degree_id`);

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
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `tb_admin_menus`
--
ALTER TABLE `tb_admin_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_admin_menus_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_admin_menus_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_blocks`
--
ALTER TABLE `tb_blocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_blocks_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_blocks_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_block_contents`
--
ALTER TABLE `tb_block_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_cms_posts`
--
ALTER TABLE `tb_cms_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_cms_posts_taxonomy_id_foreign` (`taxonomy_id`),
  ADD KEY `tb_cms_posts_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_cms_posts_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_cms_taxonomys`
--
ALTER TABLE `tb_cms_taxonomys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_cms_taxonomys_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_cms_taxonomys_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_components`
--
ALTER TABLE `tb_components`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_components_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_components_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_component_configs`
--
ALTER TABLE `tb_component_configs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_component_configs_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_component_configs_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_contacts`
--
ALTER TABLE `tb_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_contacts_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_contacts_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_experts`
--
ALTER TABLE `tb_experts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_experts_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_experts_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_function`
--
ALTER TABLE `tb_function`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_function_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_function_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_logs`
--
ALTER TABLE `tb_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_logs_user_created_id_foreign` (`user_created_id`),
  ADD KEY `tb_logs_admin_created_id_foreign` (`admin_created_id`);

--
-- Indexes for table `tb_menus`
--
ALTER TABLE `tb_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_menus_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_menus_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_modules`
--
ALTER TABLE `tb_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_module_functions`
--
ALTER TABLE `tb_module_functions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_online_exchange`
--
ALTER TABLE `tb_online_exchange`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_online_exchange_taxonomy_id_foreign` (`taxonomy_id`),
  ADD KEY `tb_online_exchange_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_online_exchange_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_online_exchange_detail`
--
ALTER TABLE `tb_online_exchange_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_online_exchange_detail_exchange_id_foreign` (`exchange_id`),
  ADD KEY `tb_online_exchange_detail_experts_id_foreign` (`experts_id`),
  ADD KEY `tb_online_exchange_detail_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_online_exchange_detail_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_options`
--
ALTER TABLE `tb_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_orders`
--
ALTER TABLE `tb_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_orders_customer_id_foreign` (`customer_id`),
  ADD KEY `tb_orders_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_orders_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_order_details`
--
ALTER TABLE `tb_order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_order_details_order_id_foreign` (`order_id`),
  ADD KEY `tb_order_details_item_id_foreign` (`item_id`),
  ADD KEY `tb_order_details_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_order_details_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_pages`
--
ALTER TABLE `tb_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_pages_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_pages_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_post_comment`
--
ALTER TABLE `tb_post_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_post_document`
--
ALTER TABLE `tb_post_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_post_history`
--
ALTER TABLE `tb_post_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_post_image`
--
ALTER TABLE `tb_post_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_products`
--
ALTER TABLE `tb_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_products_taxonomy_id_foreign` (`taxonomy_id`),
  ADD KEY `tb_products_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_products_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_roles_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_roles_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_royaltie`
--
ALTER TABLE `tb_royaltie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_royaltie_post_id_foreign` (`post_id`),
  ADD KEY `tb_royaltie_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_royaltie_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_views`
--
ALTER TABLE `tb_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_widgets`
--
ALTER TABLE `tb_widgets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_widgets_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_widgets_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_widget_configs`
--
ALTER TABLE `tb_widget_configs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_widget_configs_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_widget_configs_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tb_admin_menus`
--
ALTER TABLE `tb_admin_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `tb_blocks`
--
ALTER TABLE `tb_blocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_block_contents`
--
ALTER TABLE `tb_block_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `tb_cms_posts`
--
ALTER TABLE `tb_cms_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=700;

--
-- AUTO_INCREMENT for table `tb_cms_taxonomys`
--
ALTER TABLE `tb_cms_taxonomys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `tb_components`
--
ALTER TABLE `tb_components`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_component_configs`
--
ALTER TABLE `tb_component_configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_contacts`
--
ALTER TABLE `tb_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_experts`
--
ALTER TABLE `tb_experts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_function`
--
ALTER TABLE `tb_function`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_logs`
--
ALTER TABLE `tb_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_menus`
--
ALTER TABLE `tb_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tb_modules`
--
ALTER TABLE `tb_modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_module_functions`
--
ALTER TABLE `tb_module_functions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_online_exchange`
--
ALTER TABLE `tb_online_exchange`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_online_exchange_detail`
--
ALTER TABLE `tb_online_exchange_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_options`
--
ALTER TABLE `tb_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_orders`
--
ALTER TABLE `tb_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_order_details`
--
ALTER TABLE `tb_order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_pages`
--
ALTER TABLE `tb_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_post_comment`
--
ALTER TABLE `tb_post_comment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_post_document`
--
ALTER TABLE `tb_post_document`
  MODIFY `id` bigint(22) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_post_history`
--
ALTER TABLE `tb_post_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_post_image`
--
ALTER TABLE `tb_post_image`
  MODIFY `id` bigint(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_products`
--
ALTER TABLE `tb_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_roles`
--
ALTER TABLE `tb_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_royaltie`
--
ALTER TABLE `tb_royaltie`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_views`
--
ALTER TABLE `tb_views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=420;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_degree_id_foreign` FOREIGN KEY (`degree_id`) REFERENCES `tb_degree` (`id`),
  ADD CONSTRAINT `admins_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `tb_department` (`id`),
  ADD CONSTRAINT `admins_function_id_foreign` FOREIGN KEY (`function_id`) REFERENCES `tb_function` (`id`);

--
-- Constraints for table `tb_experts`
--
ALTER TABLE `tb_experts`
  ADD CONSTRAINT `tb_experts_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_experts_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `tb_function`
--
ALTER TABLE `tb_function`
  ADD CONSTRAINT `tb_function_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_function_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `tb_online_exchange`
--
ALTER TABLE `tb_online_exchange`
  ADD CONSTRAINT `tb_online_exchange_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_online_exchange_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_online_exchange_taxonomy_id_foreign` FOREIGN KEY (`taxonomy_id`) REFERENCES `tb_cms_taxonomys` (`id`);

--
-- Constraints for table `tb_online_exchange_detail`
--
ALTER TABLE `tb_online_exchange_detail`
  ADD CONSTRAINT `tb_online_exchange_detail_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_online_exchange_detail_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_online_exchange_detail_exchange_id_foreign` FOREIGN KEY (`exchange_id`) REFERENCES `tb_online_exchange` (`id`),
  ADD CONSTRAINT `tb_online_exchange_detail_experts_id_foreign` FOREIGN KEY (`experts_id`) REFERENCES `tb_experts` (`id`);

--
-- Constraints for table `tb_products`
--
ALTER TABLE `tb_products`
  ADD CONSTRAINT `tb_products_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_products_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_products_taxonomy_id_foreign` FOREIGN KEY (`taxonomy_id`) REFERENCES `tb_cms_taxonomys` (`id`);

--
-- Constraints for table `tb_royaltie`
--
ALTER TABLE `tb_royaltie`
  ADD CONSTRAINT `tb_royaltie_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_royaltie_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_royaltie_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `tb_cms_media` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
