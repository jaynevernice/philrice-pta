-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2024 at 04:49 AM
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
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `station_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `division`, `station_id`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', 1, NULL, NULL),
(2, 'ASPPD', 1, NULL, NULL),
(3, 'BDD', 1, NULL, NULL),
(4, 'ADMIN', 2, NULL, NULL),
(5, 'BDD', 2, NULL, NULL);

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
(7, '2024_02_19_035406_create_provinces_table', 4),
(8, '2024_03_15_085124_create_branches_table', 5),
(9, '2024_03_15_141555_create_stations_table', 6),
(10, '2024_03_15_141712_create_divisions_table', 6),
(11, '2024_03_15_141954_create_positions_table', 6),
(12, '2024_03_18_074049_create_participants_table', 7),
(13, '2024_03_18_085748_create_trainings_forms_table', 8),
(14, '2024_03_19_024250_create_trainings_forms_table', 9);

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
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `classification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `classification`, `created_at`, `updated_at`) VALUES
(1, 'Farmer or Seed grower', NULL, NULL),
(2, 'Extension workers or other intermediaries (e.g LFT, trainer, extension worker)', NULL, NULL),
(3, 'Researcher', NULL, NULL),
(4, 'Educator (elementary/high school/college teachers)', NULL, NULL),
(5, 'Student (e.g college student, post-graduate student)', NULL, NULL),
(6, 'Policy maker (e.g local chief executive)', NULL, NULL),
(7, 'Media (e.g broadcaster, vlogger, etc)', NULL, NULL),
(8, 'Industry Player (e.g trader, miller, wholesaler, retailer)', NULL, NULL),
(9, 'other (e.g OFW, job seeker, freelancer, consultant)', NULL, NULL);

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
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `position`, `division_id`, `created_at`, `updated_at`) VALUES
(1, 'Accountant 2', 1, NULL, NULL),
(2, 'Administrative Aide 1', 1, NULL, NULL),
(3, 'Administrative Aide 6', 1, NULL, NULL),
(4, 'Utility Foreman', 4, NULL, NULL),
(5, 'Admin Aide (Driver)', 5, NULL, NULL);

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
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `station` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`id`, `station`, `created_at`, `updated_at`) VALUES
(1, 'CES', NULL, NULL),
(2, 'Agusan', NULL, NULL),
(3, 'Batac', NULL, NULL),
(4, 'Bicol', NULL, NULL),
(5, 'CMU', NULL, NULL),
(6, 'Isabela', NULL, NULL),
(7, 'Los Baños', NULL, NULL),
(8, 'Midsayap', NULL, NULL),
(9, 'Negros', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trainings_forms`
--

CREATE TABLE `trainings_forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `encoder_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `encoder_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `training_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `training_style` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `venue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sponsor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fund` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `average_gik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `evaluation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participants` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_of_participants` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_of_farmers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_of_extworkers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_of_scientific` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_of_other_sectors` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_of_male` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_of_female` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_of_indigenous` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_of_pwd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainings_forms`
--

INSERT INTO `trainings_forms` (`id`, `encoder_name`, `encoder_email`, `division`, `title`, `training_type`, `training_style`, `start_date`, `end_date`, `venue`, `province`, `municipality`, `country`, `state`, `sponsor`, `fund`, `average_gik`, `evaluation`, `participants`, `num_of_participants`, `num_of_farmers`, `num_of_extworkers`, `num_of_scientific`, `num_of_other_sectors`, `num_of_male`, `num_of_female`, `num_of_indigenous`, `num_of_pwd`, `image`, `file`, `created_at`, `updated_at`) VALUES
(1, 'Ivan Aldrich D Iñigo', 'onlyfins14@gmail.com', 'ADMIN', 'Title of Training', 'Specialized Course', 'Online', '2024-03-19', '2024-03-21', 'Local (but outside PhilRice station)', 'Batanes', 'City/Municipality', '', '', 'sponsor', 'RCEF', '1', '4.8', 'Educator (elementary/high school/college teachers),Media (e.g broadcaster, vlogger, etc)', '50', '10', '20', '30', '40', '60', '70', '80', '90', 'public/images/a425170bf40e8d6ee473b271d96dae18.jpg', 'public/files/ucd-ojt.pptx.pptx', '2024-03-18 19:02:47', '2024-03-18 19:02:47'),
(2, 'Ivan Aldrich D Iñigo', 'onlyfins14@gmail.com', 'ADMIN', 'Title of Training', 'Training of Trainers (TOT)', 'Face-to-Face', '2024-03-10', '2024-03-18', 'Within PhilRice station', 'Nueva Ecija', 'Science City of Muñoz', '', '', 'sponsor', 'RCEF', '65456', '4.8', 'Educator (elementary/high school/college teachers),Farmer or Seed grower', '3', '4', '40', '30', '20', '60', '70', '80', '55', 'public/images/84562f4374b74baa0907563bccdf1492.jpg', 'public/files/ucd-ojt.pptx.pptx', '2024-03-18 19:07:00', '2024-03-18 19:07:00'),
(3, 'Ivan Aldrich D Iñigo', 'onlyfins14@gmail.com', 'BDD', 'Title of Training', 'Farmer\'s Field School (FFS)', 'Face-to-Face', '2024-03-18', '2024-03-21', 'Within PhilRice station', 'Nueva Ecija', 'Science City of Muñoz', '', '', 'sponsor', 'RCEF', '3', '4.8', 'Media (e.g broadcaster, vlogger, etc),Policy maker (e.g local chief executive)', '3', '7', '50', '60', '70', '80', '904', '100', '200', 'public/images/e80ba3de4e2f156e3bdf5b3596b36ca4.jpg', 'public/files/tmsd ojt.xlsx.xlsx', '2024-03-18 19:16:43', '2024-03-18 19:16:43'),
(4, 'Ivan Aldrich D Iñigo', 'onlyfins14@gmail.com', 'ADMIN', 'Title of Training', 'Training of Trainers (TOT)', 'Face-to-Face', '2024-03-10', '2024-03-12', 'International', '', '', 'Country', 'State/City/Province', 'sponsor', 'RCEF', '10', '20', 'Educator (elementary/high school/college teachers)', '10', '20', '20', '5', '5', '50', '5', '50', '5', 'public/images/07fc15c9d169ee48573edd749d25945d.jpg|public/images/02b5b45ce743bc3f285ec4d39b5968c3.jpg', 'public/files/copy of waiver.docx.docx', '2024-03-18 19:26:03', '2024-03-18 19:26:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `philrice_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `station` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sq1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sq2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sq3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `philrice_id`, `name`, `first_name`, `mi`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `user_type`, `station`, `division`, `position`, `sq1`, `sq2`, `sq3`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Super Admin', 'Super', 'D.', 'Admin', 'superadmin@gmail.com', NULL, '$2y$12$xGbaF21.s6l5UJ9zcjRSKeL7Kt.sF2QQnnwfhaXAZgq91yUycZWQO', NULL, 'super_admin', '', '', '', '', '', '', '2024-02-21 00:35:04', '2024-02-21 00:35:04'),
(2, NULL, 'Admin', 'Admin', 'D.', 'Admin', 'admin@gmail.com', NULL, '$2y$12$xGbaF21.s6l5UJ9zcjRSKeL7Kt.sF2QQnnwfhaXAZgq91yUycZWQO', NULL, 'admin', '', '', '', '', '', '', '2024-02-21 00:35:04', '2024-02-21 00:35:04'),
(3, NULL, 'Encoder', 'Encoder', 'D.', 'Encoder', 'encoder@gmail.com', NULL, '$2y$12$xGbaF21.s6l5UJ9zcjRSKeL7Kt.sF2QQnnwfhaXAZgq91yUycZWQO', NULL, 'encoder', '', '', '', '', '', '', '2024-02-21 00:35:04', '2024-02-21 00:35:04'),
(4, NULL, 'Viewer', 'Viewer', 'D.', 'Viewer', 'inigoaldrich24@gmail.com', NULL, '$2y$12$drCUCf7a/P/T74byyu8uO.z7/WuHPQjKSqfNZHWRSEQ5LMegDZRxu', 'z1IqHGwzVyhfYidKNkEpWgqDbGSJbc9iKFLkAf1Neuo6zBbV3wVZZnAy68wl', 'viewer', '', '', '', '', '', '', '2024-02-21 00:35:04', '2024-03-10 17:19:58'),
(8, '2222gwsf', 'Ivan Aldrich D Iñigo', 'Ivan Aldrich', 'D', 'Iñigo', 'onlyfins14@gmail.com', '2024-03-17 21:52:22', '$2y$12$dNvkKdVxXsUQl5eQDNQ67.rRtt8KOHftbw4FWXouh7/Eew2TGT2pG', 'xb0rOgw3CTaJtGY38WbWriWR4EFh3M7BUWoPaZwnd9TG9g06CkDe006MhB7S', 'encoder', 'CES', 'ADMIN', 'Administrative Aide 6', 'dog', 'city', 'school', '2024-03-17 21:51:59', '2024-03-17 21:52:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `participants`
--
ALTER TABLE `participants`
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
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainings_forms`
--
ALTER TABLE `trainings_forms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainings_forms_start_date_index` (`start_date`),
  ADD KEY `trainings_forms_end_date_index` (`end_date`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `philrice_id` (`philrice_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `offices_divisions`
--
ALTER TABLE `offices_divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `trainings_forms`
--
ALTER TABLE `trainings_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
