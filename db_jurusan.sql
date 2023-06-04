-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 04, 2023 at 11:42 AM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jurusan`
--

-- --------------------------------------------------------

--
-- Table structure for table `criterias`
--

CREATE TABLE `criterias` (
  `criteria_id` bigint(20) UNSIGNED NOT NULL,
  `criteria_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `criteria_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criterias`
--

INSERT INTO `criterias` (`criteria_id`, `criteria_name`, `criteria_code`, `weight`, `created_at`, `updated_at`) VALUES
(1, 'Kimia', 'kimia', 20.00, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(2, 'Fisika', 'fisika', 30.00, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(3, 'Biologi', 'biologi', 10.00, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(4, 'Matematika', 'matematika ipa', 40.00, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(5, 'Ekonomi', 'ekonomi', 25.00, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(6, 'Sejarah', 'sejarah', 20.00, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(7, 'Geografi', 'geografi', 15.00, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(8, 'Sosiologi', 'sosiologi', 10.00, '2023-06-04 11:39:24', '2023-06-04 11:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `major_id` bigint(20) UNSIGNED NOT NULL,
  `criteria_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `major` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`major_id`, `criteria_id`, `major`, `created_at`, `updated_at`) VALUES
(1, '[1,2,3,4]', 'IPA', '2023-06-04 11:39:45', '2023-06-04 11:39:45'),
(2, '[5,6,7,8]', 'IPS', '2023-06-04 11:39:57', '2023-06-04 11:39:57');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_04_03_112203_create_roles_table', 1),
(4, '2023_04_03_112203_create_users_table', 1),
(5, '2023_04_03_133713_create_schools_table', 1),
(6, '2023_04_03_141208_create_students_table', 1),
(7, '2023_04_03_153315_create_criterias_table', 1),
(8, '2023_04_03_154316_create_subcriterias_table', 1),
(9, '2023_04_03_154321_create_scores_table', 1),
(10, '2023_04_03_155829_create_results_table', 1),
(11, '2023_05_24_003528_create_rankings_table', 1),
(12, '2023_05_28_152807_create_majors_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rankings`
--

CREATE TABLE `rankings` (
  `ranking_id` bigint(20) UNSIGNED NOT NULL,
  `ranking` bigint(20) NOT NULL,
  `result_id` bigint(20) UNSIGNED NOT NULL,
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npsn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rankings`
--

INSERT INTO `rankings` (`ranking_id`, `ranking`, `result_id`, `nisn`, `npsn`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '0123456792', '20536841', '2023-06-04 11:42:34', '2023-06-04 11:42:34'),
(2, 2, 2, '0123456794', '20536841', '2023-06-04 11:42:34', '2023-06-04 11:42:34');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` bigint(20) UNSIGNED NOT NULL,
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saw_result` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recomendation_result` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `nisn`, `saw_result`, `recomendation_result`, `created_at`, `updated_at`) VALUES
(1, '0123456792', '1.3875', 'IPA', '2023-06-04 11:41:10', '2023-06-04 11:41:10'),
(2, '0123456794', '1.3', 'IPS', '2023-06-04 11:41:10', '2023-06-04 11:41:10');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npsn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_regency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`uuid`, `npsn`, `school_name`, `address`, `city_regency`, `province`, `created_at`, `updated_at`) VALUES
('09d062b4-8f44-4ed0-9e0d-5b03902bb595', '20536841', 'SMP NEGERI 03 BATU', 'Jl. Ir Soekarno No 8 Beji Junrejo', 'Kota Batu', 'Jawa Timur', '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
('1ec292fe-397e-473c-8a26-494a49c4a004', '20533781', 'SMP NEGERI 1 MALANG', 'Jl. Lawu 12 Oro-oro Dowo Klojen', 'Kota Malang', 'Jawa Timur', '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
('e8c5b0e8-86d1-4f0f-8a60-7652c24caecc', '20536839', 'SMP NEGERI 01 BATU', 'Jl. KH Agus Salim No 55 Batu', 'Kota Batu', 'Jawa Timur', '2023-06-04 11:39:24', '2023-06-04 11:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `score_id` bigint(20) UNSIGNED NOT NULL,
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `criteria_id` bigint(20) UNSIGNED NOT NULL,
  `score` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`score_id`, `nisn`, `criteria_id`, `score`, `created_at`, `updated_at`) VALUES
(1, '0123456794', 1, '56', '2023-06-04 11:40:36', '2023-06-04 11:40:36'),
(2, '0123456794', 2, '54', '2023-06-04 11:40:36', '2023-06-04 11:40:36'),
(3, '0123456794', 3, '58', '2023-06-04 11:40:36', '2023-06-04 11:40:36'),
(4, '0123456794', 4, '82', '2023-06-04 11:40:36', '2023-06-04 11:40:36'),
(5, '0123456794', 5, '76', '2023-06-04 11:40:36', '2023-06-04 11:40:36'),
(6, '0123456794', 6, '81', '2023-06-04 11:40:36', '2023-06-04 11:40:36'),
(7, '0123456794', 7, '60', '2023-06-04 11:40:36', '2023-06-04 11:40:36'),
(8, '0123456794', 8, '76', '2023-06-04 11:40:36', '2023-06-04 11:40:36'),
(9, '0123456792', 1, '96', '2023-06-04 11:41:08', '2023-06-04 11:41:08'),
(10, '0123456792', 2, '90', '2023-06-04 11:41:08', '2023-06-04 11:41:08'),
(11, '0123456792', 3, '100', '2023-06-04 11:41:08', '2023-06-04 11:41:08'),
(12, '0123456792', 4, '55', '2023-06-04 11:41:08', '2023-06-04 11:41:08'),
(13, '0123456792', 5, '67', '2023-06-04 11:41:08', '2023-06-04 11:41:08'),
(14, '0123456792', 6, '100', '2023-06-04 11:41:08', '2023-06-04 11:41:08'),
(15, '0123456792', 7, '60', '2023-06-04 11:41:08', '2023-06-04 11:41:08'),
(16, '0123456792', 8, '65', '2023-06-04 11:41:08', '2023-06-04 11:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npsn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`uuid`, `nisn`, `student_name`, `gender`, `birth_place`, `birth_date`, `npsn`, `email`, `phone`, `created_at`, `updated_at`) VALUES
('743ba30b-0680-40bf-a57e-ff92a3524901', '0123456794', 'Fitria Utami', 'Perempuan', 'Makassar', '08 Juni 2004', '20536841', 'fitria.utami@gmail.com', '086789012345', '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
('768ae86d-b356-483d-90c5-5cb9942c92d6', '0123456792', 'Dinda Wulandari', 'Perempuan', 'Yogyakarta', '12 April 2004', '20536841', 'dinda.wulandari@gmail.com', '084567890123', '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
('be6c89b5-07c2-4d9f-ad77-78c51b9efbeb', '0123456797', 'Irfan Kurniawan', 'Laki-laki', 'Bali', '17 September 2003', '20533781', 'irfan.kurniawan@gmail.com', '089012345678', '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
('bffbd415-4583-4282-b5c5-23a0edabe0e3', '0123456790', 'Bunga Indriani', 'Perempuan', 'Surabaya', '15 Februari 2006', '20536841', 'bunga.indriani@gmail.com', '082345678901', '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
('cc0489d1-d8fc-443b-a6e2-6d2b4e9ed3a1', '0123456791', 'Candra Nugraha', 'Laki-laki', 'Bandung', '30 Maret 2005', '20533781', 'candra.nugraha@gmail.com', '083456789012', '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
('f706c1fb-75c2-4416-a2d9-ab3d0cc5319c', '0123456789', 'Ahmad Santoso', 'Laki-laki', 'Jakarta', '01 Januari 2005', '20533781', 'ahmad.santoso@gmail.com', '081234567890', '2023-06-04 11:39:24', '2023-06-04 11:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `subcriterias`
--

CREATE TABLE `subcriterias` (
  `subcriteria_id` bigint(20) UNSIGNED NOT NULL,
  `criteria_id` bigint(20) UNSIGNED NOT NULL,
  `subcriteria_start` bigint(20) NOT NULL,
  `subcriteria_end` bigint(20) NOT NULL,
  `subcriteria_score` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcriterias`
--

INSERT INTO `subcriterias` (`subcriteria_id`, `criteria_id`, `subcriteria_start`, `subcriteria_end`, `subcriteria_score`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 50, 1, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(2, 1, 51, 65, 2, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(3, 1, 66, 75, 3, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(4, 1, 76, 85, 4, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(5, 1, 86, 100, 5, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(6, 2, 0, 50, 1, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(7, 2, 51, 65, 2, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(8, 2, 66, 75, 3, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(9, 2, 76, 85, 4, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(10, 2, 86, 100, 5, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(11, 3, 0, 50, 1, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(12, 3, 51, 65, 2, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(13, 3, 66, 75, 3, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(14, 3, 76, 85, 4, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(15, 3, 86, 100, 5, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(16, 4, 0, 50, 1, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(17, 4, 51, 65, 2, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(18, 4, 66, 75, 3, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(19, 4, 76, 85, 4, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(20, 4, 86, 100, 5, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(21, 5, 0, 50, 1, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(22, 5, 51, 65, 2, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(23, 5, 66, 75, 3, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(24, 5, 76, 85, 4, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(25, 5, 86, 100, 5, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(26, 6, 0, 50, 1, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(27, 6, 51, 65, 2, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(28, 6, 66, 75, 3, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(29, 6, 76, 85, 4, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(30, 6, 86, 100, 5, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(31, 7, 0, 50, 1, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(32, 7, 51, 65, 2, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(33, 7, 66, 75, 3, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(34, 7, 76, 85, 4, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(35, 7, 86, 100, 5, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(36, 8, 0, 50, 1, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(37, 8, 51, 65, 2, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(38, 8, 66, 75, 3, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(39, 8, 76, 85, 4, '2023-06-04 11:39:24', '2023-06-04 11:39:24'),
(40, 8, 86, 100, 5, '2023-06-04 11:39:24', '2023-06-04 11:39:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `criterias`
--
ALTER TABLE `criterias`
  ADD PRIMARY KEY (`criteria_id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`major_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rankings`
--
ALTER TABLE `rankings`
  ADD PRIMARY KEY (`ranking_id`),
  ADD UNIQUE KEY `rankings_result_id_unique` (`result_id`),
  ADD KEY `rankings_npsn_foreign` (`npsn`),
  ADD KEY `rankings_nisn_foreign` (`nisn`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `results_nisn_foreign` (`nisn`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`uuid`),
  ADD UNIQUE KEY `schools_npsn_unique` (`npsn`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`score_id`),
  ADD KEY `scores_nisn_foreign` (`nisn`),
  ADD KEY `scores_criteria_id_foreign` (`criteria_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`uuid`),
  ADD UNIQUE KEY `students_nisn_unique` (`nisn`),
  ADD KEY `students_npsn_foreign` (`npsn`);

--
-- Indexes for table `subcriterias`
--
ALTER TABLE `subcriterias`
  ADD PRIMARY KEY (`subcriteria_id`),
  ADD KEY `subcriterias_criteria_id_foreign` (`criteria_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `criterias`
--
ALTER TABLE `criterias`
  MODIFY `criteria_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `major_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rankings`
--
ALTER TABLE `rankings`
  MODIFY `ranking_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `score_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `subcriterias`
--
ALTER TABLE `subcriterias`
  MODIFY `subcriteria_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rankings`
--
ALTER TABLE `rankings`
  ADD CONSTRAINT `rankings_nisn_foreign` FOREIGN KEY (`nisn`) REFERENCES `students` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rankings_npsn_foreign` FOREIGN KEY (`npsn`) REFERENCES `schools` (`npsn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rankings_result_id_foreign` FOREIGN KEY (`result_id`) REFERENCES `results` (`result_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_nisn_foreign` FOREIGN KEY (`nisn`) REFERENCES `students` (`nisn`) ON DELETE CASCADE;

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`criteria_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `scores_nisn_foreign` FOREIGN KEY (`nisn`) REFERENCES `students` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_npsn_foreign` FOREIGN KEY (`npsn`) REFERENCES `schools` (`npsn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcriterias`
--
ALTER TABLE `subcriterias`
  ADD CONSTRAINT `subcriterias_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`criteria_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
