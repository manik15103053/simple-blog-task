-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2024 at 04:30 AM
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
-- Database: `simple_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `text_content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `publication_date` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `category_id`, `text_content`, `image`, `publication_date`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(6, 'asfasd', 'asfasd', 2, 'asdfasdfsad', 'images/blog/1715689124.webp', '2024-05-14 00:00:00', 1, 1, '2024-05-14 06:18:44', '2024-05-14 20:21:16'),
(7, 'New PHP', 'new-php', 1, 'New PHP', 'images/blog/1715690585.jpg', '2024-05-14 00:00:00', 2, 1, '2024-05-14 06:43:05', '2024-05-14 20:20:57'),
(8, 'New Days Title', 'new-days-title', 3, 'asdfsdf', 'images/blog/1715692198.png', '2024-05-14 00:00:00', 1, 1, '2024-05-14 07:09:58', '2024-05-14 20:21:07'),
(9, 'New title', 'new-title', 1, 'asdfasdsda', 'images/blog/1715692224.jpg', '2024-05-14', 1, NULL, '2024-05-14 07:10:24', '2024-05-14 07:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `priority` varchar(255) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `priority`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'PHP', 'php', '2', 1, NULL, '2024-05-14 05:05:03', '2024-05-14 05:05:03'),
(2, 'JAVA', 'java', '1', 1, NULL, '2024-05-14 05:05:18', '2024-05-14 05:05:18'),
(3, 'JS', 'js', '2', 1, NULL, '2024-05-14 05:05:50', '2024-05-14 05:05:50'),
(4, 'Python', 'python', '3', 1, NULL, '2024-05-14 05:06:03', '2024-05-14 05:06:03');

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
(7, '2024_05_14_054747_create_categories_table', 2),
(9, '2024_05_14_091159_create_blogs_table', 3);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_role` tinyint(4) NOT NULL DEFAULT 2 COMMENT '1: admin, 2: user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `user_role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', 1, NULL, '$2y$12$098hj/Whub4OPK2UGmZcjusEMZiz0pbTEA8SMMl3tu/Es8dmOtFau', NULL, '2024-05-13 18:53:55', '2024-05-13 18:53:55'),
(2, 'Md manik', 'manik@gmail.com', 'manik', 2, NULL, '$2y$12$9T5PiWcMw5gRa.i9m7MIMOykZhr/O1tBDR79aeoTqxB4102U/WvRq', NULL, '2024-05-13 20:15:09', '2024-05-14 19:54:36'),
(3, 'Md Manik', 'mo15103053@gmail.com', 'mothersprayerbd', 2, NULL, '$2y$12$xGcyNb78v2pyNKENeCX9T.p6uquSHVu17IrYfdnSU37GueE7.J0se', NULL, '2024-05-13 23:15:15', '2024-05-13 23:15:15'),
(4, 'sdfsadf', 'sales@gmail.com', 'cods', 2, NULL, '$2y$12$CrOYsu4zSag0KPPWexUItu/kiDyMLuKyv02A6cJHgjPEkbe1Wjsqu', NULL, '2024-05-13 23:19:47', '2024-05-13 23:19:47'),
(5, 'Account', 'account@gmail.com', 'SUPERCONTROL', 2, NULL, '$2y$12$Bjye7g6NrC2H12BxJPlEHeXz67kLEpUjZVHKOwt6yHBeUnbD5FgWC', NULL, '2024-05-14 01:15:37', '2024-05-14 01:15:37'),
(6, 'asfa', 'dd@gmail.com', 'dd', 2, NULL, '$2y$12$PKLqDzc7R6sOUxtFI7lTG.5NJs5WgmeOfINJe0Y1bwr./ZwfQbXnq', NULL, '2024-05-14 01:16:32', '2024-05-14 01:16:32'),
(7, 'ff', 'ff@gmail.com', 'fff', 2, NULL, '$2y$12$QT0Y.TnhCN0C0YMNfM9MlewuoSEirhea3V2jcpqYsCpnSvj7XW.Fq', NULL, '2024-05-14 01:25:23', '2024-05-14 01:25:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
