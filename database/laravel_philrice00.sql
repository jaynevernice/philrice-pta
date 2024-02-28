-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2024 at 03:09 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_philrice`
--

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
-- Table structure for table `ksl_form`
--

CREATE TABLE `ksl_form` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offices_divisions_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mode_of_sharing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opportunity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `event_organizer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `venue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province_id` bigint(20) UNSIGNED DEFAULT NULL,
  `municipality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interview_date` date DEFAULT NULL,
  `agency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scope` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inquiry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inquiry_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `presentation_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `classification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_participants` int(11) DEFAULT NULL,
  `total_farmers` int(11) DEFAULT NULL,
  `total_workers` int(11) DEFAULT NULL,
  `total_sciecom` int(11) DEFAULT NULL,
  `total_others` int(11) DEFAULT NULL,
  `total_male` int(11) DEFAULT NULL,
  `total_female` int(11) DEFAULT NULL,
  `total_indigenous` int(11) DEFAULT NULL,
  `total_pwd` int(11) DEFAULT NULL,
  `photo_docu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_docu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_14_035142_create_ksl_form_table', 2),
(6, '2024_02_14_070457_create_offices_divisions_table', 3),
(7, '2024_02_19_035406_create_provinces_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `offices_divisions`
--

CREATE TABLE `offices_divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offs_divs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offices_divisions`
--

INSERT INTO `offices_divisions` (`id`, `offs_divs`) VALUES
(1, 'ASD (Admin)'),
(2, 'ASPPD'),
(3, 'BDD'),
(4, 'CBC'),
(5, 'COA'),
(6, 'ComRel'),
(7, 'CPD'),
(8, 'DevCom'),
(9, 'FMD'),
(10, 'GRD'),
(11, 'IAU'),
(12, 'IMSSO'),
(13, 'ISD'),
(14, 'ODEDASF'),
(15, 'ODEDD'),
(16, 'ODEDR'),
(17, 'OED'),
(18, 'PBBD'),
(19, 'PMD'),
(20, 'PPD'),
(21, 'RCEF'),
(22, 'RCFSD'),
(23, 'REMD'),
(24, 'SED'),
(25, 'TMSD'),
(26, 'CSD');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `province_name`) VALUES
(1, 'Abra'),
(2, 'NCR'),
(3, 'Agusan Del Norte'),
(4, 'Agusan Del Sur'),
(5, 'Aklan'),
(6, 'Albay'),
(7, 'Antique'),
(8, 'Apayao'),
(9, 'Aurora'),
(10, 'Basilan'),
(11, 'Bataan'),
(12, 'Batanes'),
(13, 'Batangas'),
(14, 'Benguet'),
(15, 'Biliran'),
(16, 'Bohol'),
(17, 'Bukidnon'),
(18, 'Bulacan'),
(19, 'Cagayan'),
(20, 'Camarines Norte'),
(21, 'Camarines Sur'),
(22, 'Camiguin'),
(23, 'Capiz'),
(24, 'Catanduanes'),
(25, 'Cavite'),
(26, 'Cebu'),
(27, 'Compostella Valley'),
(28, 'Cotabato'),
(29, 'Davao Del Norte'),
(30, 'Davao Del Sur'),
(31, 'Davao Occidental'),
(32, 'Davao Oriental'),
(33, 'Dinagat Islands'),
(34, 'Eastern Samar'),
(35, 'Guimaras'),
(36, 'Ifugao'),
(37, 'Ilocos Norte'),
(38, 'Ilocos Sur'),
(39, 'Iloilo'),
(40, 'Isabela'),
(41, 'Kalinga'),
(42, 'La Union'),
(43, 'Laguna'),
(44, 'Lanao Del Norte'),
(45, 'Lanao Del Sur'),
(46, 'Leyte'),
(47, 'Maguindanao'),
(48, 'Marinduque'),
(49, 'Masbate'),
(50, 'Misamis Occidental'),
(51, 'Misamis Oriental'),
(52, 'Mountain Province'),
(53, 'Metro Manila'),
(54, 'Negros Occidental'),
(55, 'Negros Oriental'),
(56, 'Northern Samar'),
(57, 'Nueva Ecija'),
(58, 'Nueva Vizcaya'),
(59, 'Occidental Mindoro'),
(60, 'Oriental Mindoro'),
(61, 'Palawan'),
(62, 'Pampanga'),
(63, 'Pangasinan'),
(64, 'Quezon'),
(65, 'Quirino'),
(66, 'Rizal'),
(67, 'Romblon'),
(68, 'Samar'),
(69, 'Sarangani'),
(70, 'Siquijor'),
(71, 'Sorsogon'),
(72, 'South Cotabato'),
(73, 'Southern Leyte'),
(74, 'Sultan Kudarat'),
(75, 'Sulu'),
(76, 'Surigao Del Norte'),
(77, 'Surigao Del Sur'),
(78, 'Tarlac'),
(79, 'Tawi-Tawi'),
(80, 'Zambales'),
(81, 'Zamboanga Del Norte'),
(82, 'Zamboanga Del Sur'),
(83, 'Zamboanga Sibugay');

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
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@gmail.com', NULL, '$2y$12$xGbaF21.s6l5UJ9zcjRSKeL7Kt.sF2QQnnwfhaXAZgq91yUycZWQO', NULL, 'super_admin', '2024-02-21 00:35:04', '2024-02-21 00:35:04'),
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$12$xGbaF21.s6l5UJ9zcjRSKeL7Kt.sF2QQnnwfhaXAZgq91yUycZWQO', NULL, 'admin', '2024-02-21 00:35:04', '2024-02-21 00:35:04'),
(3, 'Encoder', 'encoder@gmail.com', NULL, '$2y$12$xGbaF21.s6l5UJ9zcjRSKeL7Kt.sF2QQnnwfhaXAZgq91yUycZWQO', NULL, 'encoder', '2024-02-21 00:35:04', '2024-02-21 00:35:04'),
(4, 'RCEF User', 'rcef_user@gmail.com', NULL, '$2y$12$xGbaF21.s6l5UJ9zcjRSKeL7Kt.sF2QQnnwfhaXAZgq91yUycZWQO', NULL, 'rcef_user', '2024-02-21 00:35:04', '2024-02-21 00:35:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `ksl_form`
--
ALTER TABLE `ksl_form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offices_divisions_id` (`offices_divisions_id`),
  ADD KEY `province_id` (`province_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offices_divisions`
--
ALTER TABLE `offices_divisions`
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
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ksl_form`
--
ALTER TABLE `ksl_form`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `offices_divisions`
--
ALTER TABLE `offices_divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ksl_form`
--
ALTER TABLE `ksl_form`
  ADD CONSTRAINT `ksl_form_ibfk_1` FOREIGN KEY (`offices_divisions_id`) REFERENCES `ksl_form` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ksl_form_ibfk_2` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
