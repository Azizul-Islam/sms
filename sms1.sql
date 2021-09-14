-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2021 at 02:11 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
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
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@mail.com', '2021-09-11 09:13:37', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ets0K6u7jLW7ObDsEt5j5JFvYgpfyzapSJ7M6FQyWHUTA23OdNyY3ZYaCTI9', '2021-09-11 09:13:38', '2021-09-11 09:13:38');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `code`, `credit`, `semester_id`, `created_at`, `updated_at`) VALUES
(1, 'C Programming', 'CSE-001', '3', 1, '2021-09-11 09:25:09', '2021-09-11 09:25:09'),
(2, 'Computer Fundamental', 'CSE-002', '2', 1, '2021-09-11 10:59:59', '2021-09-11 10:59:59'),
(3, 'C++', 'CSE-0201', '3', 1, '2021-09-12 02:38:13', '2021-09-12 03:52:43');

-- --------------------------------------------------------

--
-- Table structure for table `course_teachers`
--

CREATE TABLE `course_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_teachers`
--

INSERT INTO `course_teachers` (`id`, `course_id`, `teacher_id`, `session_id`, `semester_id`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4, 1, 1, '2021-09-11 09:29:51', '2021-09-11 09:29:51'),
(2, 2, 5, 4, 1, 1, '2021-09-11 11:00:22', '2021-09-11 11:00:22');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'CSE', '2021-09-11 09:13:41', '2021-09-11 09:13:41'),
(2, 'EEE', '2021-09-11 09:13:42', '2021-09-11 09:13:42'),
(3, 'BBA', '2021-09-11 09:13:42', '2021-09-11 09:13:42'),
(4, 'MBA', '2021-09-11 09:13:42', '2021-09-11 09:13:42'),
(5, 'LAW', '2021-09-11 09:13:42', '2021-09-11 09:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `department_admins`
--

CREATE TABLE `department_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_admins`
--

INSERT INTO `department_admins` (`id`, `department_id`, `admin_id`, `name`, `slug`, `email`, `password`, `phone`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'dept one', 'dept-one', 'dept@mail.com', '$2y$10$srRHEJemDsAcqgziVTRWeO.wabbJlxLd3UgdRtG/Vp9YNJPaPTVMu', '123456789', 0, NULL, NULL, NULL),
(2, 2, 1, 'dept two', 'dept-two', 'dept2@mail.com', '$2y$10$pMAocbGmBefcoWIhwoXIeuLQH4yHfMMwKJ/sJAYNDPNJiidvyIMpu', '123456789', 0, NULL, NULL, NULL),
(3, 3, 1, 'dept three', 'dept-three', 'dept3@mail.com', '$2y$10$X9XS9wMNjfgp0ZvEpWrNjudkgeYfr4O/siQ.VbaEu8G2jzVXitZue', '123456789', 0, NULL, NULL, NULL),
(4, 4, 1, 'dept four', 'dept-onwwe', 'dept4@mail.com', '$2y$10$e72rtvQliwFR5Ajxvlz00eSRknL7Mdub/9JkCUkSgS6k0aGl0MRg6', '123456789', 0, NULL, NULL, NULL),
(5, 5, 1, 'dept five', 'dept-five', 'dept5@mail.com', '$2y$10$KHvw/Whan6O2As6Ni/IQTO5DKudkMPjbiBL3h9S1PedvETF4GBq0q', '123456789', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enroll_courses`
--

CREATE TABLE `enroll_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enroll_courses`
--

INSERT INTO `enroll_courses` (`id`, `course_id`, `teacher_id`, `student_id`, `session_id`, `semester_id`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 11, 4, 1, '2021-09-11 10:57:46', '2021-09-11 10:57:46'),
(3, 2, 5, 11, 4, 1, '2021-09-11 11:01:06', '2021-09-11 11:01:06'),
(4, 1, 1, 6, 4, 1, '2021-09-11 11:03:33', '2021-09-11 11:03:33'),
(5, 2, 5, 6, 4, 1, '2021-09-11 11:03:35', '2021-09-11 11:03:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, '2014_10_12_000000_create_admins_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_06_151512_create_departments_table', 1),
(5, '2021_07_06_162002_create_courses_table', 1),
(6, '2021_07_06_162905_create_department_admins_table', 1),
(7, '2021_07_06_162917_create_teachers_table', 1),
(8, '2021_07_06_162926_create_students_table', 1),
(9, '2021_07_09_070001_create_semesters_table', 1),
(10, '2021_07_09_070016_create_sessions_table', 1),
(11, '2021_07_09_142818_create_course_teachers_table', 1),
(12, '2021_07_15_140109_create_enroll_courses_table', 1),
(13, '2021_07_16_135738_create_student_marks_table', 1),
(14, '2021_07_16_162529_create_settings_table', 1),
(15, '2021_07_17_044244_create_pivot_table_table', 1);

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
-- Table structure for table `pivot_table`
--

CREATE TABLE `pivot_table` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '1st - 1st Sem', '2021-09-11 09:13:42', '2021-09-11 09:25:29'),
(2, '1st - 2nd Sem', '2021-09-11 09:13:42', '2021-09-11 09:25:53'),
(3, '2nd - 1st Sem', '2021-09-11 09:13:42', '2021-09-11 09:26:13');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '2018', '2021-09-11 09:13:42', '2021-09-11 09:13:42'),
(2, '2019', '2021-09-11 09:13:42', '2021-09-11 09:13:42'),
(3, '2020', '2021-09-11 09:13:43', '2021-09-11 09:13:43'),
(4, '2021', '2021-09-11 09:13:43', '2021-09-11 09:13:43');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_enroll` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `is_enroll`, `created_at`, `updated_at`) VALUES
(1, 0, '2021-09-11 09:13:43', '2021-09-11 10:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `session_id` bigint(20) UNSIGNED DEFAULT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `roll` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `department_id`, `session_id`, `semester_id`, `roll`, `name`, `slug`, `registration`, `email`, `password`, `phone`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 1, '1', 'Missouri Harber I', 'Lionel Gorczany', '51005', 'bradtke.davin@example.org', '$2y$10$YI4/RzCRNlXTtffgGpRgGO2p521pF.YD1Xl7kjN4CQqpZubNVKfne', '458966666666', 0, NULL, '2021-09-11 09:13:41', '2021-09-11 09:13:41'),
(2, 2, 1, 1, '2', 'Mr. Reagan Spencer', 'Scotty Ernser', '77600', 'wintheiser.marquis@example.com', '$2y$10$vn87vfkxpN5UQACNmABVCe.VAyIVAu4cnJqrzrEafEVKIL4aL4COu', '458966666666', 0, NULL, '2021-09-11 09:13:41', '2021-09-11 09:13:41'),
(3, 5, 1, 1, '3', 'Archibald Gusikowski', 'Rodger Weber', '64744', 'zrice@example.com', '$2y$10$d6tlbKjMi4BkYXvFKW/go.uuhv3MrZc8UeGFA43CJ5IDQWrPqzIS2', '458966666666', 0, NULL, '2021-09-11 09:13:41', '2021-09-11 09:13:41'),
(4, 4, 1, 1, '4', 'Winifred Gerhold', 'Idella Hayes', '70688', 'tromp.deron@example.net', '$2y$10$TSSVePbIKDzPMeHZeJGVjOuru6RzRnHJAreOeacX5qbN4RTjxQAkO', '458966666666', 0, NULL, '2021-09-11 09:13:41', '2021-09-11 09:13:41'),
(5, 3, 1, 1, '5', 'Mr. Ubaldo Hettinger', 'Heloise Bayer', '60681', 'royal.predovic@example.com', '$2y$10$VhO53r/IE4ESAxD.cbBsn.F9FgEg7O/UNekoa4a8x9VKF..3OQu92', '458966666666', 0, NULL, '2021-09-11 09:13:41', '2021-09-11 09:13:41'),
(6, 1, 1, 1, '6', 'Joshua Skiles', 'Mr. Bradly Schimmel', '68872', 'kkuhlman@example.org', '$2y$10$HyDUypLdSIfdede6qbK5yu3k5vuSIZSfOLJyUq8lMpH77VjW0K5JO', '458966666666', 0, NULL, '2021-09-11 09:13:41', '2021-09-11 09:13:41'),
(7, 2, 1, 1, '7', 'Marilie Dickens II', 'Prof. Darrell Emmerich IV', '63611', 'bailee.lang@example.net', '$2y$10$QNWlT8gy7VKeTkLODy9ZzugVHgpOKeaJMd811NGwxniPSj3D15hJC', '458966666666', 0, NULL, '2021-09-11 09:13:41', '2021-09-11 09:13:41'),
(8, 2, 1, 1, '8', 'Jeffrey Rempel', 'Dr. Gillian Keebler', '49413', 'haag.kristofer@example.net', '$2y$10$8Z752Cxdo62KUX87X3L49.fizgSEPPTOkvc6YnwBy5NyU6EtnKxuu', '458966666666', 0, NULL, '2021-09-11 09:13:41', '2021-09-11 09:13:41'),
(9, 5, 1, 1, '9', 'Krystel Price PhD', 'Dr. Adelia Hermiston', '36433', 'demond52@example.com', '$2y$10$bHoMXVYYzb.CMv49tM3fFeN4p/Upbdjj0P4IXeRWOpMuO/QlkhKKy', '458966666666', 0, NULL, '2021-09-11 09:13:41', '2021-09-11 09:13:41'),
(10, 2, 1, 1, '10', 'Werner Turner', 'Deontae Kessler Jr.', '24472', 'janelle.jast@example.net', '$2y$10$3hUcv3XL5rEUrOG3Ibm3KOmAiu8oz1smoeLVvGfmgafnxKVnqgR3u', '458966666666', 0, NULL, '2021-09-11 09:13:41', '2021-09-11 09:13:41'),
(11, 1, 4, 1, '11', 'Azizul Islam', 'azizul-islam', '201921054119', 'cseazizul@gmail.com', '$2y$10$MZG5hhV8hLERdhU4B6OLmeBhUaghovOP/QdgucNUfd6lHChj4K/r.', '01738040305', 0, NULL, '2021-09-11 10:01:01', '2021-09-11 10:01:01');

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

CREATE TABLE `student_marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `marks` double(8,2) NOT NULL,
  `gpa` double(8,2) NOT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`id`, `course_id`, `teacher_id`, `student_id`, `session_id`, `semester_id`, `marks`, `gpa`, `grade`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 6, 4, 1, 50.00, 2.50, 'C+', '2021-09-11 11:11:14', '2021-09-12 04:34:23'),
(2, 1, 1, 11, 4, 1, 79.00, 3.75, 'A', '2021-09-11 11:11:36', '2021-09-12 04:33:34'),
(3, 2, 5, 11, 4, 1, 55.00, 2.75, 'B-', '2021-09-12 01:10:18', '2021-09-12 04:35:35');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `department_id`, `admin_id`, `name`, `slug`, `email`, `password`, `phone`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Maud Renner', 'Renee Medhurst', 'candida24@example.com', '$2y$10$yFgj4XJhKe8tQqNTb2/SPeei87eIfyfFs1yRkeO/TB7OjaWMQD0Ri', '458966666666', 0, NULL, '2021-09-11 09:13:39', '2021-09-11 09:13:39'),
(2, 3, 1, 'Isac Bashirian', 'Prof. Javier O\'Connell DVM', 'aubrey.champlin@example.net', '$2y$10$uHfeRY9o73bpLYnjevaIV.gm2w1PLquh9bMWVJF9/NTOY7nlV6Wri', '458966666666', 0, NULL, '2021-09-11 09:13:39', '2021-09-11 09:13:39'),
(3, 4, 1, 'Annalise Jacobs I', 'Miss Lue Jakubowski II', 'lauretta55@example.com', '$2y$10$1GCP0lHbvREVdXUY8ekojua2b2zRTsZhLmGRusnziffUzDKlD8sYa', '458966666666', 0, NULL, '2021-09-11 09:13:39', '2021-09-11 09:13:39'),
(4, 4, 1, 'Mr. Zander Yundt', 'Berry Ritchie', 'natalie97@example.com', '$2y$10$Nxad9L/I8HOB0aMvIilFOOMyk.N31LHrYjE1ICT/q145DufwRlSYu', '458966666666', 0, NULL, '2021-09-11 09:13:39', '2021-09-11 09:13:39'),
(5, 1, 1, 'Princess Hand', 'Mellie Hansen', 'ole07@example.org', '$2y$10$XFdT613MbvpNxoIJ2wt2aue1lu9yShMjNL.qIvpzdfNJUS.PabyG.', '458966666666', 0, NULL, '2021-09-11 09:13:39', '2021-09-11 09:13:39'),
(6, 2, 1, 'Chet Witting', 'Tatyana Boyle', 'zmoore@example.net', '$2y$10$NTkSvZmPdaVGT0h7f9H3T.Tl1G8Wqj7eHG2j/GrFJkR2GLeDxpSmq', '458966666666', 0, NULL, '2021-09-11 09:13:39', '2021-09-11 09:13:39'),
(7, 1, 1, 'Alexandrea Feeney', 'Rex Stoltenberg', 'lhuels@example.com', '$2y$10$ognHDtUBW/IpPoNfiyRbK.EpyxFP2n3I9ibEX2rM0wIA.EeZaRH.W', '458966666666', 0, NULL, '2021-09-11 09:13:39', '2021-09-11 09:13:39'),
(8, 2, 1, 'Jacynthe Reynolds', 'Alize Nolan', 'urban.goodwin@example.com', '$2y$10$ql0worFG1Hw/8rNoINN1leE6ALPfNkswSwOj0aO2bWBqgUTCIpfX6', '458966666666', 0, NULL, '2021-09-11 09:13:39', '2021-09-11 09:13:39'),
(9, 4, 1, 'Harley Kub', 'Rudolph Hickle', 'vbins@example.com', '$2y$10$ncWP0.YdmXi/qWb.KpNuOuK5gFFCjsOf/K4fyBzHpEFHlXFDDtuHq', '458966666666', 0, NULL, '2021-09-11 09:13:40', '2021-09-11 09:13:40'),
(10, 2, 1, 'Dr. Alexandrine Greenholt DVM', 'Ezekiel Morar MD', 'arno38@example.net', '$2y$10$O7jxZ/KWa.Y.8PKJOeEd8.5nCvRXEaDp7DYdVjuaUKnlgpx.5Hx8y', '458966666666', 0, NULL, '2021-09-11 09:13:40', '2021-09-11 09:13:40');

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
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_teachers`
--
ALTER TABLE `course_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_admins`
--
ALTER TABLE `department_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department_admins_email_unique` (`email`);

--
-- Indexes for table `enroll_courses`
--
ALTER TABLE `enroll_courses`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pivot_table`
--
ALTER TABLE `pivot_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

--
-- Indexes for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_teachers`
--
ALTER TABLE `course_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `department_admins`
--
ALTER TABLE `department_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `enroll_courses`
--
ALTER TABLE `enroll_courses`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pivot_table`
--
ALTER TABLE `pivot_table`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student_marks`
--
ALTER TABLE `student_marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
