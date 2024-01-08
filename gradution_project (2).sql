-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2023 at 06:02 PM
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
-- Database: `gradution_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_problems`
--

CREATE TABLE `admin_problems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appartments`
--

CREATE TABLE `appartments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_num` int(11) NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appartments`
--

INSERT INTO `appartments` (`id`, `contact`, `type`, `room_num`, `location`, `price`, `status`, `region_id`, `branch_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '01122255588', 'طلاب', 4, NULL, '600', 'لم تسكن', 1, 1, 5, '2023-07-03 13:34:04', '2023-07-03 13:34:04'),
(2, '01122255599', 'طلاب', 5, NULL, '255', 'لم تسكن', 2, 1, 5, '2023-07-03 13:35:15', '2023-07-03 13:35:15'),
(3, '01122255588', 'طالبات', 6, NULL, '560', 'لم تسكن', 2, 1, 5, '2023-07-03 13:37:12', '2023-07-03 13:37:12'),
(4, '01122255588', 'طالبات', 2, NULL, '700', 'لم تسكن', 1, 1, 5, '2023-07-03 13:38:21', '2023-07-03 13:38:21'),
(5, '01122255599', 'طالبات', 3, NULL, '750', 'لم تسكن', 5, 2, 6, '2023-07-03 13:40:33', '2023-07-03 13:40:33'),
(6, '01122255599', 'طالبات', 4, NULL, '800', 'لم تسكن', 6, 2, 6, '2023-07-03 13:41:22', '2023-07-03 13:41:22'),
(7, '01122255599', 'طلاب', 5, NULL, '555', 'لم تسكن', 5, 2, 6, '2023-07-03 13:43:06', '2023-07-03 13:43:06'),
(8, '01122255599', 'طلاب', 4, NULL, '300', 'لم تسكن', 5, 2, 6, '2023-07-03 13:43:55', '2023-07-03 13:43:55'),
(9, '01122255590', 'طالبات', 2, NULL, '780', 'لم تسكن', 3, 3, 7, '2023-07-03 13:46:21', '2023-07-03 13:46:42'),
(10, '01122255590', 'طالبات', 3, NULL, '600', 'لم تسكن', 4, 3, 7, '2023-07-03 13:47:24', '2023-07-03 13:47:24'),
(11, '01122255590', 'طلاب', 3, NULL, '400', 'لم تسكن', 3, 3, 7, '2023-07-03 13:48:21', '2023-07-03 13:48:21'),
(12, '01122255590', 'طلاب', 4, NULL, '500', 'لم تسكن', 4, 3, 7, '2023-07-03 13:48:50', '2023-07-03 13:48:50'),
(13, '01122255599', 'طالبات', 6, NULL, '560', 'لم تسكن', 6, 2, 7, '2023-07-03 13:53:16', '2023-07-03 13:53:16');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 2, 'جامعة اسيوط', '2023-07-03 16:17:32', '2023-07-03 16:17:32'),
(2, 3, 'جامعة اسيوط القديمة', '2023-07-01 16:17:32', '2023-07-02 16:17:32'),
(3, 4, 'جامعة اسيوط الجديدة', '2023-07-01 16:20:21', '2023-07-02 16:20:21');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `reciver_id` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `sender_id`, `reciver_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 10, 6, 'اهلاااااا', '2023-07-03 14:00:48', '2023-07-03 14:00:48'),
(2, 10, 6, '  سلام عليكم', '2023-07-03 14:01:26', '2023-07-03 14:01:26');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manager_problems`
--

CREATE TABLE `manager_problems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manager_problems`
--

INSERT INTO `manager_problems` (`id`, `content`, `user_id`, `branch_id`, `created_at`, `updated_at`) VALUES
(1, 'موقع بطى جدا', 8, 1, '2023-07-03 13:55:50', '2023-07-03 13:55:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_02_26_093820_create_branches_table', 1),
(7, '2023_02_26_124631_create_regions_table', 1),
(8, '2023_02_26_125221_create_appartments_table', 1),
(9, '2023_02_26_130119_create_posts_table', 1),
(10, '2023_03_24_194427_create_permission_tables', 1),
(11, '2023_03_29_123641_create_problems', 1),
(12, '2023_04_05_053626_create_pictures_table', 1),
(13, '2023_04_15_020954_create_review_ratings_table', 1),
(14, '2023_05_04_014134_create_notifications_table', 1),
(15, '2023_05_07_040751_create_admin_problems_table', 1),
(16, '2023_06_20_001202_create_manager_problems_table', 1),
(17, '2023_06_29_015540_create_chats_table', 1),
(18, '2023_06_30_011007_create_owner__feedback_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 8),
(3, 'App\\Models\\User', 9),
(3, 'App\\Models\\User', 10),
(4, 'App\\Models\\User', 5),
(4, 'App\\Models\\User', 6),
(4, 'App\\Models\\User', 7);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('2f6e71b0-ee06-45ae-86b3-5f6b71791bcb', 'App\\Notifications\\NewPost', 'App\\Models\\User', 8, '{\"user_id\":7,\"post_id\":13}', NULL, '2023-07-03 13:53:16', '2023-07-03 13:53:16'),
('2f9cee21-be70-46b7-87f3-e51c693d62e3', 'App\\Notifications\\MangerProblems', 'App\\Models\\User', 2, '{\"user_id\":8,\"content\":\"\\u0645\\u0648\\u0642\\u0639 \\u0628\\u0637\\u0649 \\u062c\\u062f\\u0627\",\"problem_id\":1}', NULL, '2023-07-03 13:55:50', '2023-07-03 13:55:50'),
('572d7f7d-1a3e-4055-8721-32ea1701d643', 'App\\Notifications\\newMessage', 'App\\Models\\User', 6, '{\"message_id\":2,\"sender_id\":10,\"message\":\"  \\u0633\\u0644\\u0627\\u0645 \\u0639\\u0644\\u064a\\u0643\\u0645\",\"type\":\"message\"}', NULL, '2023-07-03 14:01:26', '2023-07-03 14:01:26'),
('f5fe3553-6a59-4f8e-9265-67529eba79e0', 'App\\Notifications\\newMessage', 'App\\Models\\User', 6, '{\"message_id\":1,\"sender_id\":10,\"message\":\"\\u0627\\u0647\\u0644\\u0627\\u0627\\u0627\\u0627\\u0627\\u0627\",\"type\":\"message\"}', NULL, '2023-07-03 14:00:48', '2023-07-03 14:00:48');

-- --------------------------------------------------------

--
-- Table structure for table `owner__feedback`
--

CREATE TABLE `owner__feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `star_rating` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owner__feedback`
--

INSERT INTO `owner__feedback` (`id`, `star_rating`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 7, '2023-07-03 13:57:47', '2023-07-03 13:57:47'),
(2, 4, 6, '2023-07-03 14:00:03', '2023-07-03 14:00:03');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'انشاء بوست', 'web', '2023-07-03 12:36:06', '2023-07-03 12:36:06'),
(2, 'التحكم فى البوست', 'web', '2023-07-03 12:36:06', '2023-07-03 12:36:06'),
(3, 'المستخدمين', 'web', '2023-07-03 12:36:06', '2023-07-03 12:36:06'),
(4, 'الفروع', 'web', '2023-07-03 12:36:06', '2023-07-03 12:36:06'),
(5, 'المناطق', 'web', '2023-07-03 12:36:06', '2023-07-03 12:36:06'),
(6, 'الاراء', 'web', '2023-07-03 12:36:06', '2023-07-03 12:36:06'),
(7, 'عرض الأراء', 'web', '2023-07-03 12:36:06', '2023-07-03 12:36:06'),
(8, 'مشكلات المدير', 'web', '2023-07-03 12:36:06', '2023-07-03 12:36:06'),
(9, 'مشكلات الأدمن', 'web', '2023-07-03 12:36:06', '2023-07-03 12:36:06'),
(10, 'تقارير المدير', 'web', '2023-07-03 12:36:06', '2023-07-03 12:36:06'),
(11, 'تقارير الأدمن', 'web', '2023-07-03 12:36:06', '2023-07-03 12:36:06'),
(12, 'اصحاب السكن', 'web', '2023-07-03 12:36:06', '2023-07-03 12:36:06'),
(13, 'التواصل مع المدير', 'web', '2023-07-03 12:36:06', '2023-07-03 12:36:06'),
(14, 'لوحة التحكم', 'web', '2023-07-03 12:36:06', '2023-07-03 12:36:06'),
(15, 'تعديل البيانات', 'web', '2023-07-03 12:36:06', '2023-07-03 12:36:06'),
(16, 'مستخدم', 'web', '2023-07-03 12:36:06', '2023-07-03 12:36:06');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `picture_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `picture_path`, `post_id`, `created_at`, `updated_at`) VALUES
(4, '1/3.jfif', 1, '2023-07-03 13:35:50', '2023-07-03 13:35:50'),
(5, '2/18.jpg', 2, '2023-07-03 13:36:24', '2023-07-03 13:36:24'),
(7, '3/14.jfif', 3, '2023-07-03 13:37:28', '2023-07-03 13:37:28'),
(8, '4/7.jfif', 4, '2023-07-03 13:38:21', '2023-07-03 13:38:21'),
(9, '5/6.jfif', 5, '2023-07-03 13:40:33', '2023-07-03 13:40:33'),
(11, '6/4.jfif', 6, '2023-07-03 13:41:41', '2023-07-03 13:41:41'),
(12, '7/13.jfif', 7, '2023-07-03 13:43:06', '2023-07-03 13:43:06'),
(13, '8/12.jfif', 8, '2023-07-03 13:43:55', '2023-07-03 13:43:55'),
(14, '9/5.jfif', 9, '2023-07-03 13:46:21', '2023-07-03 13:46:21'),
(15, '10/1.jpg', 10, '2023-07-03 13:47:24', '2023-07-03 13:47:24'),
(16, '11/16.jfif', 11, '2023-07-03 13:48:21', '2023-07-03 13:48:21'),
(17, '12/17.jpg', 12, '2023-07-03 13:48:50', '2023-07-03 13:48:50'),
(18, '13/16.jfif', 13, '2023-07-03 13:53:16', '2023-07-03 13:53:16');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `appartment_id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `description`, `user_id`, `appartment_id`, `region_id`, `branch_id`, `type`, `created_at`, `updated_at`) VALUES
(1, NULL, 5, 1, 1, 1, 'طلاب', '2023-07-03 13:34:04', '2023-07-03 13:34:04'),
(2, NULL, 5, 2, 2, 1, 'طلاب', '2023-07-03 13:35:15', '2023-07-03 13:35:15'),
(3, NULL, 5, 3, 2, 1, 'طالبات', '2023-07-03 13:37:12', '2023-07-03 13:37:12'),
(4, NULL, 5, 4, 1, 1, 'طالبات', '2023-07-03 13:38:21', '2023-07-03 13:38:21'),
(5, NULL, 6, 5, 5, 2, 'طالبات', '2023-07-03 13:40:33', '2023-07-03 13:40:33'),
(6, NULL, 6, 6, 6, 2, 'طالبات', '2023-07-03 13:41:22', '2023-07-03 13:41:22'),
(7, NULL, 6, 7, 5, 2, 'طلاب', '2023-07-03 13:43:06', '2023-07-03 13:43:06'),
(8, NULL, 6, 8, 5, 2, 'طلاب', '2023-07-03 13:43:55', '2023-07-03 13:43:55'),
(9, NULL, 7, 9, 3, 3, 'طالبات', '2023-07-03 13:46:21', '2023-07-03 13:46:21'),
(10, NULL, 7, 10, 4, 3, 'طالبات', '2023-07-03 13:47:24', '2023-07-03 13:47:24'),
(11, NULL, 7, 11, 3, 3, 'طلاب', '2023-07-03 13:48:21', '2023-07-03 13:48:21'),
(12, NULL, 7, 12, 4, 3, 'طلاب', '2023-07-03 13:48:50', '2023-07-03 13:48:50'),
(13, NULL, 7, 13, 6, 2, 'طالبات', '2023-07-03 13:53:16', '2023-07-03 13:53:16');

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

CREATE TABLE `problems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `branch_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'سيد', '2023-07-01 16:22:49', '2023-07-02 16:22:49'),
(2, 1, 'فريال', '2023-07-01 16:22:49', '2023-07-02 16:22:49'),
(3, 3, 'حي الزهور', '2023-07-02 16:23:43', '2023-07-03 16:23:43'),
(4, 3, 'مدينة الرحاب', '2023-06-04 16:23:43', '2023-06-05 16:23:43'),
(5, 2, 'الوليدية', '2023-06-05 16:25:51', '2023-06-07 16:25:51'),
(6, 2, 'الجمهورية', '2023-06-04 16:25:51', '2023-06-07 16:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `review_ratings`
--

CREATE TABLE `review_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comments` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `star_rating` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `review_ratings`
--

INSERT INTO `review_ratings` (`id`, `comments`, `star_rating`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'موقع جميل يساعد الطلاب على ايجاد السكن المناسب', 3, 8, '2023-07-03 13:54:43', '2023-07-03 13:54:43'),
(2, 'موقع سهل الاستخدام', 4, 9, '2023-07-03 13:57:32', '2023-07-03 13:57:32');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'ادمن', 'web', '2023-07-03 12:36:15', '2023-07-03 12:36:15'),
(2, 'مدير', 'web', '2023-07-03 12:47:19', '2023-07-03 12:47:19'),
(3, 'مستخدم', 'web', '2023-07-03 12:47:42', '2023-07-03 12:47:42'),
(4, 'صاحب السكن', 'web', '2023-07-03 12:48:35', '2023-07-03 12:48:35');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 4),
(2, 4),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 2),
(9, 1),
(10, 2),
(11, 1),
(12, 2),
(13, 4),
(14, 1),
(14, 2),
(15, 4),
(16, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `address`, `gender`, `roles_name`, `email`, `email_verified_at`, `password`, `image_path`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'أحمد علي', NULL, NULL, 'انثى', 'ادمن', 'admin@rscoder.com', NULL, '$2y$10$RG3nX./eD9fHs26dBOg9T.JKR2Au2N3LPqPVH.Cu7.DmO3sfvciWK', 'd/avtar_5.png', NULL, '2023-07-03 12:36:15', '2023-07-03 12:41:51'),
(2, 'محمود عبد السميع', NULL, NULL, 'ذكر', 'مدير', 'Mahmoud123@gmail.com', NULL, '$2y$10$XbxpS3NnhjZ2/9NWZkKqtew7gHKf.0Uj6G87EaVNOeasCZLuZLZZi', 'd/avtar_5.png', NULL, '2023-07-03 12:51:04', '2023-07-03 12:51:04'),
(3, 'إبراهيم أحمد', NULL, NULL, 'ذكر', 'مدير', 'Ibrahim123@gmail.com', NULL, '$2y$10$MuE3IzQ8C76DC2qoWYDSp.r6nZvvoWBNZVWRVtzohXrEcN1L1L5Ga', 'd/avtar_5.png', NULL, '2023-07-03 12:54:01', '2023-07-03 12:54:01'),
(4, 'خالد مصطفى', NULL, NULL, 'ذكر', 'مدير', 'Khaled1234@gmail.com', NULL, '$2y$10$Np6xqQx1G/A.AWnHK8Opb.yH34VgQV8O9A.e7cCb9reKEvj6Nf1Ka', 'd/avtar_5.png', NULL, '2023-07-03 12:56:58', '2023-07-03 12:56:58'),
(5, 'أيمن مصطفى', NULL, NULL, 'ذكر', 'صاحب السكن', 'Ayman123@gamil.com', NULL, '$2y$10$utr4U.9PyALpTSD7ZN5PXevAZGBCQkJxNDPnNdDC1khjnWvNiNi32', 'd/avtar_5.png', NULL, '2023-07-03 13:32:36', '2023-07-03 13:32:36'),
(6, 'يوسف محمد', NULL, NULL, 'ذكر', 'صاحب السكن', 'Youssef123@gamil.com', NULL, '$2y$10$RhJEoArunQN/rcUpPUDQFen.sDVQ58SosS6WQO1Fqs3ipGbzeACfG', 'd/avtar_5.png', NULL, '2023-07-03 13:39:32', '2023-07-03 13:39:32'),
(7, 'حامد علي', NULL, NULL, 'ذكر', 'صاحب السكن', 'Hamed123@gamil.com', NULL, '$2y$10$rVsuLlIf/yvy3qmMW1fA1Of/mltJu.zLTNheuVV0nPf4Hr8Go56MS', 'd/avtar_5.png', NULL, '2023-07-03 13:45:37', '2023-07-03 13:45:37'),
(8, 'أماني سيد', NULL, NULL, 'انثى', 'مستخدم', 'Amany234@gamil.com', NULL, '$2y$10$n9YDOtAdjkCoG0fAnFm/1OcR4PC7k1ItjviHu.vK5s2.uCjXgYDWa', 'd/avtar_5.png', NULL, '2023-07-03 13:50:57', '2023-07-03 13:50:57'),
(9, 'مريم صلاح', NULL, NULL, 'انثى', 'مستخدم', 'Maryam897@gamil.com', NULL, '$2y$10$Rk/938A0fvoMHOqmlBmZVetz.cn76jHOcrhyO484S0iCTa0twV9se', 'd/avtar_5.png', NULL, '2023-07-03 13:56:49', '2023-07-03 13:56:49'),
(10, 'طه جمال', NULL, NULL, 'ذكر', 'مستخدم', 'Taha2345@gamil.com', NULL, '$2y$10$NUp/N2mtUUulsW85lIZ45uGeHhXk9yP3sAZYOMBWWqnh/OBOIJEiu', 'd/avtar_5.png', NULL, '2023-07-03 13:59:42', '2023-07-03 13:59:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_problems`
--
ALTER TABLE `admin_problems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appartments`
--
ALTER TABLE `appartments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appartments_region_id_foreign` (`region_id`),
  ADD KEY `appartments_branch_id_foreign` (`branch_id`),
  ADD KEY `appartments_user_id_foreign` (`user_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branches_user_id_foreign` (`user_id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chats_sender_id_foreign` (`sender_id`),
  ADD KEY `chats_reciver_id_foreign` (`reciver_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `manager_problems`
--
ALTER TABLE `manager_problems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manager_problems_user_id_foreign` (`user_id`),
  ADD KEY `manager_problems_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `owner__feedback`
--
ALTER TABLE `owner__feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner__feedback_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pictures_post_id_foreign` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_appartment_id_foreign` (`appartment_id`),
  ADD KEY `posts_region_id_foreign` (`region_id`),
  ADD KEY `posts_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regions_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `review_ratings`
--
ALTER TABLE `review_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `review_ratings_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `admin_problems`
--
ALTER TABLE `admin_problems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appartments`
--
ALTER TABLE `appartments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manager_problems`
--
ALTER TABLE `manager_problems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `owner__feedback`
--
ALTER TABLE `owner__feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `review_ratings`
--
ALTER TABLE `review_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appartments`
--
ALTER TABLE `appartments`
  ADD CONSTRAINT `appartments_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appartments_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appartments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branches_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_reciver_id_foreign` FOREIGN KEY (`reciver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chats_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `manager_problems`
--
ALTER TABLE `manager_problems`
  ADD CONSTRAINT `manager_problems_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `manager_problems_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `owner__feedback`
--
ALTER TABLE `owner__feedback`
  ADD CONSTRAINT `owner__feedback_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `pictures_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_appartment_id_foreign` FOREIGN KEY (`appartment_id`) REFERENCES `appartments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `regions_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review_ratings`
--
ALTER TABLE `review_ratings`
  ADD CONSTRAINT `review_ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
