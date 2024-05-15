-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2024 at 08:48 AM
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
(1, 'Java is the most popular languages', 'java-is-the-most-popular-languages', 1, 'Java is among one of the most popular languages out there mainly because of its versatility and compatibility. It is used in a number of things including software development, mobile applications and large system development.', 'images/blog/1715752809.png', '2024-05-15', 1, NULL, '2024-05-15 00:00:09', '2024-05-15 00:00:09'),
(2, 'The Java programming imparts', 'the-java-programming-imparts', 1, 'The Java programming imparts the fundamental knowledge of developing code using Java programming language. Learn the Java programming language with no prior programming language, only the desire to learn the language', 'images/blog/1715752894.jpg', '2024-05-15', 1, NULL, '2024-05-15 00:01:34', '2024-05-15 00:01:34'),
(3, 'The Java Programming the complete length', 'the-java-programming-the-complete-length', 1, 'It has emerged to be the most preferred language for programmers. The Java Programming cover covers the complete length and breadth of this platform that one can learn and implement easily for', 'images/blog/1715753004.webp', '2024-05-15', 1, NULL, '2024-05-15 00:03:24', '2024-05-15 00:03:24'),
(4, 'JavaScript is one of the most programming languages', 'javascript-is-one-of-the-most-programming-languages', 2, 'JavaScript is known for being a naturally very fast programming language that speeds up websites and applications. It enables developers to carry out maintenance and upgrades easily and it makes the debugging process simple', 'images/blog/1715753178.webp', '2024-05-15 00:00:00', 1, 1, '2024-05-15 00:05:03', '2024-05-15 00:06:18'),
(5, 'it more often than any other programming language', 'it-more-often-than-any-other-programming-language', 2, 'The fact that it can be used alongside other programming languages makes it a catch-all choice for front-end web development.', 'images/blog/1715753142.png', '2024-05-15', 1, NULL, '2024-05-15 00:05:42', '2024-05-15 00:05:42'),
(6, 'JavaScript is known for being a naturally very fast programming', 'javascript-is-known-for-being-a-naturally-very-fast-programming', 2, 'The fact that it can be used alongside other programming languages makes it a catch-all choice for front-end web development.', 'images/blog/1715753249.jpeg', '2024-05-15', 1, NULL, '2024-05-15 00:07:29', '2024-05-15 00:07:29'),
(7, 'With so many programming languages to choose from', 'with-so-many-programming-languages-to-choose-from', 3, 'With so many programming languages to choose from, each with its own unique syntax, features and uses, choosing your first programming language to learn can be daunting. Python is an excellent choice if you’re new to coding and looking for a beginner-friendly language. This powerful programming language is both versatile and easy to use.', 'images/blog/1715753352.webp', '2024-05-15', 1, NULL, '2024-05-15 00:09:12', '2024-05-15 00:09:12'),
(8, 'Python’s various applications include web development', 'pythons-various-applications-include-web-development', 3, 'Python’s various applications include web development, machine learning, system scripting and software testing. Web platforms you may know and love, such as Google, YouTube, Spotify, Pinterest, Dropbox and Netflix, use Python in some capacity.', 'images/blog/1715753390.jpeg', '2024-05-15', 1, NULL, '2024-05-15 00:09:50', '2024-05-15 00:09:50'),
(9, 'Programs execute in a software environment called CLR', 'programs-execute-in-a-software-environment-called-clr', 5, 'DOT NET runs on Microsoft windows. Programs execute in a software environment called CLR, which has services like exceptional handling, security and memory management. It focuses on the Visual Studio', 'images/blog/1715753493.jpg', '2024-05-15', 1, NULL, '2024-05-15 00:11:33', '2024-05-15 00:11:33'),
(10, 'It is simple and easy to understand with such elaborated', 'it-is-simple-and-easy-to-understand-with-such-elaborated', 5, 'It has various benefits like best platform for delivering Windows software, stable, scalable, more reliable and lower costs by speeding development.', 'images/blog/1715753538.jpg', '2024-05-15', 1, NULL, '2024-05-15 00:12:18', '2024-05-15 00:12:18'),
(11, 'The fact that PHP was not originally designed', 'the-fact-that-php-was-not-originally-designed', 4, 'During 2014 and 2015, a new major PHP version was developed, PHP 7. The numbering of this version involved some debate among internal developers.[49] While the PHP 6 Unicode experiments had never been released, several articles and book titles referenced the PHP 6 names, which', 'images/blog/1715753636.jpg', '2024-05-15', 1, NULL, '2024-05-15 00:13:56', '2024-05-15 00:13:56'),
(12, 'The foundation of PHP 7 is a PHP branch that was originally', 'the-foundation-of-php-7-is-a-php-branch-that-was-originally', 4, 'Nikita Popov,[52] and aimed to optimize PHP performance by refactoring the Zend Engine while retaining near-complete language compatibility.[53] By 14 July 2014, WordPress-based benchmarks', 'images/blog/1715753675.jpg', '2024-05-15', 1, NULL, '2024-05-15 00:14:35', '2024-05-15 00:14:35'),
(13, 'The numbering of this version involved some debate among internal', 'the-numbering-of-this-version-involved-some-debate-among-internal', 4, 'the PHP 6 Unicode experiments had never been released, several articles and book titles referenced the PHP 6 names, which might have caused confusion if a new release were to reuse the name.[50] After a vote, the name PHP 7 was chosen', 'images/blog/1715753708.webp', '2024-05-15', 1, NULL, '2024-05-15 00:15:08', '2024-05-15 00:15:08'),
(15, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit', 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis molestie leo vel sapien porttitor, at bibendum mi tincidunt', 'images/blog/1715755016.png', '2024-05-15', 2, NULL, '2024-05-15 00:36:56', '2024-05-15 00:36:56');

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
(1, 'JAVA', 'java', '1', 1, NULL, '2024-05-14 23:52:44', '2024-05-14 23:52:44'),
(2, 'JavaScript', 'javascript', '2', 1, NULL, '2024-05-14 23:53:05', '2024-05-14 23:53:05'),
(3, 'Python', 'python', '3', 1, NULL, '2024-05-14 23:53:25', '2024-05-14 23:53:25'),
(4, 'PHP', 'php', '4', 1, NULL, '2024-05-14 23:53:40', '2024-05-14 23:53:40'),
(5, 'Dot Net', 'dot-net', '3', 1, NULL, '2024-05-14 23:54:00', '2024-05-14 23:54:00'),
(7, 'jQUEREY', 'jquerey', '5', 2, 2, '2024-05-15 00:35:10', '2024-05-15 00:35:21');

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
(5, '2024_05_14_054747_create_categories_table', 1),
(6, '2024_05_14_091159_create_blogs_table', 1);

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
(1, 'Admin', 'admin@gmail.com', 'admin', 1, NULL, '$2y$12$NamXukS7GrISnYW1ItFAA.ZmkREgAiAKsyqV9C6p.geZbAJDLZEJK', NULL, '2024-05-14 23:49:22', '2024-05-14 23:49:22'),
(2, 'Moshiur Rahman', 'moshiur@gmail.com', 'moshiur', 2, NULL, '$2y$12$P8QkqeAjmQEyPa15u1X0DO0qvevuB0tyxqRe3RA/f3G.qiJ3XB35a', NULL, '2024-05-15 00:33:31', '2024-05-15 00:33:31'),
(3, 'Md Manik', 'manik@gmail.com', 'manik', 2, NULL, '$2y$12$uxJqMhhChlLncCe6g//Lpey9rTIbzjtAILnHb/qM27kFkM28s.0Qm', NULL, '2024-05-15 00:43:59', '2024-05-15 00:47:46');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
