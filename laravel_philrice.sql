-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2024 at 09:44 AM
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
-- Database: `laravel_philrice`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division` varchar(255) NOT NULL,
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
(5, 'BDD', 2, NULL, NULL),
(6, 'CBC', 1, NULL, NULL),
(7, 'COA', 1, NULL, NULL),
(8, 'CPD', 1, NULL, NULL),
(9, 'CSD', 1, NULL, NULL),
(10, 'DEVCOM', 1, NULL, NULL),
(11, 'FINANCE', 1, NULL, NULL),
(12, 'GRD', 1, NULL, NULL),
(13, 'GR-PMO', 1, NULL, NULL),
(14, 'IAU', 1, NULL, NULL),
(15, 'IMSSO', 1, NULL, NULL),
(16, 'ISD', 1, NULL, NULL),
(17, 'LEGAL', 1, NULL, NULL),
(18, 'ODA', 1, NULL, NULL),
(19, 'ODD', 1, NULL, NULL),
(20, 'ODD-GAD', 1, NULL, NULL),
(21, 'ODD-COMREL', 1, NULL, NULL),
(22, 'ODR', 1, NULL, NULL),
(23, 'OED', 1, NULL, NULL),
(24, 'PBBD', 1, NULL, NULL),
(25, 'PPD', 1, NULL, NULL),
(26, 'PMD', 1, NULL, NULL),
(27, 'RCEF', 1, NULL, NULL),
(28, 'RCFSD', 1, NULL, NULL),
(29, 'REMD', 1, NULL, NULL),
(30, 'SED', 1, NULL, NULL),
(31, 'TMSD', 1, NULL, NULL),
(32, 'RCEF', 2, NULL, NULL),
(33, 'Research', 2, NULL, NULL),
(34, 'Branch Director', 2, NULL, NULL),
(35, 'Development', 2, NULL, NULL),
(40, 'ABE', 3, NULL, NULL),
(41, 'R&D', 3, NULL, NULL),
(42, 'BDU', 3, NULL, NULL),
(43, 'Cash', 3, NULL, NULL),
(44, 'Computer and Network', 3, NULL, NULL),
(45, 'Development', 3, NULL, NULL),
(46, 'Finance', 3, NULL, NULL),
(47, 'Golden Rice and Office of the OIC, Branch Director', 3, NULL, NULL),
(48, 'HRMO & Records', 3, NULL, NULL),
(49, 'OIC, Branch Director\'s Office', 3, NULL, NULL),
(50, 'PMU', 3, NULL, NULL),
(51, 'PPU', 3, NULL, NULL),
(52, 'Property', 3, NULL, NULL),
(53, 'Research', 3, NULL, NULL),
(54, 'Seed Inspector of RCEF', 3, NULL, NULL),
(55, 'RCEF', 3, NULL, NULL),
(56, 'ADMIN', 4, NULL, NULL),
(57, 'BDD', 4, NULL, NULL),
(58, 'R&D', 4, NULL, NULL),
(59, 'RCEF', 4, NULL, NULL),
(60, 'Admin', 5, NULL, NULL),
(61, 'BDD', 5, NULL, NULL),
(62, 'GRD', 5, NULL, NULL),
(63, 'Security Services', 5, NULL, NULL),
(64, 'Admin', 6, NULL, NULL),
(65, 'BDD', 6, NULL, NULL),
(66, 'ODD', 6, NULL, NULL),
(67, 'ODR', 6, NULL, NULL),
(68, 'RCEF', 6, NULL, NULL),
(69, 'Admin', 7, NULL, NULL),
(70, 'BDD', 7, NULL, NULL),
(71, 'Development', 7, NULL, NULL),
(72, 'Finance', 7, NULL, NULL),
(73, 'NBSP', 7, NULL, NULL),
(74, 'PhilRice-UPLB', 7, NULL, NULL),
(75, 'RBB Project', 7, NULL, NULL),
(76, 'RCEF', 7, NULL, NULL),
(77, 'RCQL', 7, NULL, NULL),
(78, 'Research', 7, NULL, NULL),
(79, 'TCL', 7, NULL, NULL),
(80, 'TGMS', 7, NULL, NULL),
(81, 'ADMIN', 8, NULL, NULL),
(82, 'BDD', 8, NULL, NULL),
(83, 'R&D', 8, NULL, NULL),
(84, 'RCEF', 8, NULL, NULL),
(85, 'Admin', 9, NULL, NULL),
(86, 'BDU', 9, NULL, NULL),
(87, 'R&D', 9, NULL, NULL),
(88, 'RCEF', 9, NULL, NULL),
(89, 'ABE', 9, NULL, NULL);

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
-- Table structure for table `ksl_form`
--

CREATE TABLE `ksl_form` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `staff_name` varchar(255) DEFAULT NULL,
  `age_group` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `offices_divisions_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mode_of_sharing` varchar(255) DEFAULT NULL,
  `opportunity` varchar(255) DEFAULT NULL,
  `activity` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `event_organizer` varchar(255) DEFAULT NULL,
  `sponsor` varchar(255) DEFAULT NULL,
  `venue` varchar(255) DEFAULT NULL,
  `province_id` bigint(20) UNSIGNED DEFAULT NULL,
  `municipality` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `interview_date` date DEFAULT NULL,
  `agency` varchar(255) DEFAULT NULL,
  `program_title` varchar(255) DEFAULT NULL,
  `scope` varchar(255) DEFAULT NULL,
  `inquiry` varchar(255) DEFAULT NULL,
  `inquiry_date` varchar(255) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `presentation_title` varchar(255) DEFAULT NULL,
  `classification` varchar(255) DEFAULT NULL,
  `total_participants` int(11) DEFAULT NULL,
  `total_farmers` int(11) DEFAULT NULL,
  `total_workers` int(11) DEFAULT NULL,
  `total_sciecom` int(11) DEFAULT NULL,
  `total_others` int(11) DEFAULT NULL,
  `total_male` int(11) DEFAULT NULL,
  `total_female` int(11) DEFAULT NULL,
  `total_indigenous` int(11) DEFAULT NULL,
  `total_pwd` int(11) DEFAULT NULL,
  `photo_docu` varchar(255) DEFAULT NULL,
  `other_docu` varchar(255) DEFAULT NULL
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
(5, '2024_02_14_035142_create_ksl_form_table', 2),
(6, '2024_02_14_070457_create_offices_divisions_table', 3),
(7, '2024_02_19_035406_create_provinces_table', 4),
(8, '2024_03_15_085124_create_branches_table', 5),
(9, '2024_03_15_141555_create_stations_table', 6),
(10, '2024_03_15_141712_create_divisions_table', 6),
(11, '2024_03_15_141954_create_positions_table', 6),
(12, '2024_03_18_074049_create_participants_table', 7),
(13, '2024_03_18_085748_create_trainings_forms_table', 8),
(14, '2024_03_19_024250_create_trainings_forms_table', 9),
(15, '2024_03_19_080846_create_training_types_table', 10),
(16, '2024_03_19_090147_create_source_funds_table', 11),
(17, '2024_03_20_065323_drop_trainings_forms_table', 12),
(18, '2024_03_20_065704_drop_trainings_forms_table', 13),
(19, '2024_03_20_065922_create_trainings_forms_table', 14),
(20, '2024_03_20_071233_drop_trainings_forms_table', 15),
(21, '2024_03_20_071415_create_trainings_forms_table', 16),
(22, '2024_03_20_071802_drop_trainings_forms_table', 17),
(23, '2024_03_20_071831_create_trainings_forms_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `offices_divisions`
--

CREATE TABLE `offices_divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offs_divs` varchar(255) DEFAULT NULL
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
  `classification` varchar(255) NOT NULL,
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
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` varchar(255) NOT NULL,
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
(5, 'Admin Aide (Driver)', 5, NULL, NULL),
(6, 'Administrative Assistant 2', 1, NULL, NULL),
(7, 'Administrative Assistant 3', 1, NULL, NULL),
(8, 'Administrative Assistant 5', 1, NULL, NULL),
(9, 'Administrative Assistant 6', 1, NULL, NULL),
(10, 'Administrative Officer 3', 1, NULL, NULL),
(11, 'Administrative Officer 4', 1, NULL, NULL),
(12, 'Senior Administrative Assistant I', 1, NULL, NULL),
(13, 'Watchman III', 1, NULL, NULL),
(14, 'Administrative Assistant 3', 2, NULL, NULL),
(15, 'Information Systems Researcher 3', 2, NULL, NULL),
(16, 'Administrative Assistant 6', 2, NULL, NULL),
(17, 'Laboratory Aide 2 ', 2, NULL, NULL),
(18, 'Information Systems Analyst 2', 2, NULL, NULL),
(19, 'Senior Remote Sensing Technologist', 2, NULL, NULL),
(20, 'Development Management Officer 3', 2, NULL, NULL),
(21, 'Science Research Assistant ', 2, NULL, NULL),
(22, 'Planning Officer 2', 2, NULL, NULL),
(23, 'Supervising Science Research Specialist', 2, NULL, NULL),
(24, 'Science Research Analyst', 2, NULL, NULL),
(25, 'Science Research Specialist 2', 2, NULL, NULL),
(26, 'Science Research Assistant', 2, NULL, NULL),
(27, 'Laborer 2', 2, NULL, NULL),
(28, 'Laborer 1', 2, NULL, NULL),
(29, 'Science Research Specialist 1', 2, NULL, NULL),
(30, 'Senior Science Research Specialist', 2, NULL, NULL),
(31, 'Farm Worker 2', 3, NULL, NULL),
(32, 'Administrative Assistant 6', 3, NULL, NULL),
(33, 'Clerk III', 3, NULL, NULL),
(34, 'Utility Worker 1', 3, NULL, NULL),
(35, 'Science Research Specialist 2', 3, NULL, NULL),
(36, 'Administrative Aide 5', 3, NULL, NULL),
(37, 'Science Research Specialist 1', 3, NULL, NULL),
(38, 'Computer Programmer 3', 3, NULL, NULL),
(39, 'Administrative Assistant 3', 3, NULL, NULL),
(40, 'Accounting Clerk 3', 3, NULL, NULL),
(41, 'Laborer 2', 3, NULL, NULL),
(42, 'Science Research Analyst', 3, NULL, NULL),
(43, 'Laborer 1', 3, NULL, NULL),
(44, 'Senior Science Research Specialist', 3, NULL, NULL),
(45, 'Dormitory Attendant', 3, NULL, NULL),
(46, 'Project Officer V', 6, NULL, NULL),
(47, 'Science Aide', 6, NULL, NULL),
(48, 'Senior Science Research Specialist', 6, NULL, NULL),
(49, 'Laborer 2', 6, NULL, NULL),
(50, 'Science Research Specialist 1', 6, NULL, NULL),
(51, 'Senior Administrative Assistant I', 6, NULL, NULL),
(52, 'Science Research Specialist 2', 6, NULL, NULL),
(53, 'Laborer 1', 6, NULL, NULL),
(54, 'Utility Worker 2', 6, NULL, NULL),
(55, 'Farm Worker 2', 6, NULL, NULL),
(56, 'Laboratory Aide 1', 6, NULL, NULL),
(57, 'Science Research Analyst', 6, NULL, NULL),
(58, 'Senior Administrative Assistant 4', 7, NULL, NULL),
(59, 'Senior Administrative Assistant I', 7, NULL, NULL),
(60, 'Warehouseman II', 7, NULL, NULL),
(61, 'Administrative Assistant 6', 7, NULL, NULL),
(62, 'Administrative Assistant 5', 7, NULL, NULL),
(63, 'Administrative Assistant 2', 8, NULL, NULL),
(64, 'Administrative Assistant 6', 8, NULL, NULL),
(65, 'Farm Worker 2', 8, NULL, NULL),
(66, 'Computer Operator 2', 8, NULL, NULL),
(67, 'Science Research Analyst', 8, NULL, NULL),
(68, 'Science Research Specialist 2', 8, NULL, NULL),
(69, 'Laborer 2', 8, NULL, NULL),
(70, 'Financial Analyst I', 9, NULL, NULL),
(71, 'Planning Officer 3', 9, NULL, NULL),
(72, 'Senior Science Research Specialist', 9, NULL, NULL),
(73, 'Science Research Analyst', 9, NULL, NULL),
(74, 'Science Research Specialist 1', 9, NULL, NULL),
(75, 'Science Research Assistant', 10, NULL, NULL),
(76, 'Procurement Management Officer II', 10, NULL, NULL),
(77, 'Science Research Specialist 2', 10, NULL, NULL),
(78, 'Clerk III', 10, NULL, NULL),
(79, 'Senior Science Research Specialist', 10, NULL, NULL),
(80, 'Administrative Assistant 3', 10, NULL, NULL),
(81, 'Science Research Analyst', 10, NULL, NULL),
(82, 'Science Research Specialist 1', 10, NULL, NULL),
(83, 'Accounting Clerk 3', 11, NULL, NULL),
(84, 'Administrative Assistant 3', 11, NULL, NULL),
(85, 'Budget Clerk 3', 11, NULL, NULL),
(86, 'Administrative Assistant 4', 11, NULL, NULL),
(87, 'Senior Administrative Assistant I', 11, NULL, NULL),
(88, 'Administrative Officer 3', 11, NULL, NULL),
(89, 'Administrative Assistant 1', 11, NULL, NULL),
(90, 'Financial Analyst I', 11, NULL, NULL),
(91, 'Farm Worker 2', 12, NULL, NULL),
(92, 'Science Aide', 12, NULL, NULL),
(93, 'Administrative Assistant 3', 12, NULL, NULL),
(94, 'Science Research Analyst', 12, NULL, NULL),
(95, 'Science Research Specialist 2', 12, NULL, NULL),
(96, 'Laboratory Aide 2 ', 12, NULL, NULL),
(97, 'Laborer 1', 12, NULL, NULL),
(98, 'Science Research Specialist 1', 12, NULL, NULL),
(99, 'Laborer 2', 12, NULL, NULL),
(100, 'Senior Science Research Specialist', 13, NULL, NULL),
(101, 'Science Research Specialist 2', 13, NULL, NULL),
(102, 'Clerk III', 13, NULL, NULL),
(103, 'Procurement Management Officer II', 13, NULL, NULL),
(108, 'Internal Auditor 1', 14, NULL, NULL),
(109, 'Administrative Assistant 6', 14, NULL, NULL),
(110, 'Internal Auditing Assistant', 14, NULL, NULL),
(111, 'Administrative Officer 2', 15, NULL, NULL),
(112, 'Health and Safety Officer', 15, NULL, NULL),
(113, 'Administrative Assistant 6', 15, NULL, NULL),
(114, 'Environmental Management Specialist 2', 15, NULL, NULL),
(115, 'Utility Worker 2', 15, NULL, NULL),
(116, 'Mechanic 2', 15, NULL, NULL),
(117, 'Administrative Officer 4', 15, NULL, NULL),
(118, 'Administrative Aide 5(Inspector)', 15, NULL, NULL),
(119, 'Utility Foreman', 15, NULL, NULL),
(120, 'Computer Operator 2', 16, NULL, NULL),
(121, 'Science Research Specialist 2', 16, NULL, NULL),
(122, 'Information Technology Officer 2', 16, NULL, NULL),
(123, 'Computer Operator 4', 16, NULL, NULL),
(124, 'Senior Administrative Assistant 2', 16, NULL, NULL),
(125, 'Information Systems Analyst 1', 16, NULL, NULL),
(126, 'Science Research Specialist 1', 16, NULL, NULL),
(127, 'Computer Programmer 1', 16, NULL, NULL),
(128, 'Information Systems Researcher 2', 16, NULL, NULL),
(129, 'Computer Programmer 2', 16, NULL, NULL),
(130, 'Computer Programmer 3', 16, NULL, NULL),
(131, 'Information Systems Analyst 3', 16, NULL, NULL),
(132, 'Information Systems Researcher 3', 16, NULL, NULL),
(133, 'Information Systems Analyst 2', 16, NULL, NULL),
(134, 'Science Research Analyst', 16, NULL, NULL),
(135, 'Administrative Officer 3', 17, NULL, NULL),
(136, 'Administrative Officer 3', 18, NULL, NULL),
(137, 'Administrative Assistant 2', 18, NULL, NULL),
(138, 'Science Research Analyst', 19, NULL, NULL),
(139, 'Science Research Specialist 2', 19, NULL, NULL),
(140, 'Science Research Specialist 1', 19, NULL, NULL),
(141, 'Science Research Specialist 1', 20, NULL, NULL),
(142, 'Senior Science Research Specialist', 20, NULL, NULL),
(143, 'Planning Assistant 2', 20, NULL, NULL),
(144, 'Administrative Assistant 5', 21, NULL, NULL),
(145, 'Science Research Specialist 2', 21, NULL, NULL),
(146, 'Science Research Specialist 1', 21, NULL, NULL),
(147, 'Administrative Assistant 4', 21, NULL, NULL),
(148, 'Artist Illustrator 3', 21, NULL, NULL),
(149, 'Science Research Analyst', 21, NULL, NULL),
(150, 'Clerk 2', 22, NULL, NULL),
(151, 'Science Research Specialist 2', 22, NULL, NULL),
(152, 'Computer Programmer 1', 22, NULL, NULL),
(153, 'Supervising Science Research Specialist', 22, NULL, NULL),
(154, 'Science Research Assistant', 23, NULL, NULL),
(155, 'Computer Operator 2', 24, NULL, NULL),
(156, 'Science Aide', 24, NULL, NULL),
(157, 'Senior Administrative Assistant I', 24, NULL, NULL),
(158, 'Planning Officer 3', 24, NULL, NULL),
(159, 'Administrative Assistant 5', 24, NULL, NULL),
(160, 'Science Research Analyst', 24, NULL, NULL),
(161, 'Farm Worker 2', 24, NULL, NULL),
(162, 'Science Research Specialist 1', 24, NULL, NULL),
(163, 'Science Research Assistant', 24, NULL, NULL),
(164, 'Science Research Specialist 2', 24, NULL, NULL),
(165, 'Laborer 2', 24, NULL, NULL),
(166, 'Laborer 1', 24, NULL, NULL),
(167, 'Draftsman 4', 25, NULL, NULL),
(168, 'Mechanic 3', 25, NULL, NULL),
(169, 'Administrative Assistant 2', 25, NULL, NULL),
(170, 'Planning Officer 1', 25, NULL, NULL),
(171, 'Senior Administrative Assistant 2', 25, NULL, NULL),
(172, 'Carpenter Foreman', 25, NULL, NULL),
(173, 'Driver 1', 25, NULL, NULL),
(174, 'Administrative Assistant 6', 25, NULL, NULL),
(175, 'Engineer 3', 25, NULL, NULL),
(176, 'Administrative Aide 5', 25, NULL, NULL),
(177, 'Utility Worker 1', 25, NULL, NULL),
(178, 'Automotive Air-Con Technician 2', 25, NULL, NULL),
(179, 'Driver 2', 25, NULL, NULL),
(180, 'Administrative Assistant 3', 25, NULL, NULL),
(181, 'Mechanical Plant Operator 3', 25, NULL, NULL),
(182, 'Clerk III', 25, NULL, NULL),
(183, 'Utility Foreman', 25, NULL, NULL),
(184, 'Driver 3', 25, NULL, NULL),
(185, 'Utility Worker 2', 25, NULL, NULL),
(186, 'Air-Con Technician 2', 25, NULL, NULL),
(187, 'Engineering Assistant', 25, NULL, NULL),
(188, 'Administrative Assistant 5', 26, NULL, NULL),
(189, 'Administrative Assistant 4', 26, NULL, NULL),
(190, 'Administrative Assistant 3', 26, NULL, NULL),
(191, 'Administrative Aide 5', 26, NULL, NULL),
(192, 'Administrative Assistant 2', 26, NULL, NULL),
(193, 'Clerk III', 26, NULL, NULL),
(194, 'Senior Administrative Assistant 4', 27, NULL, NULL),
(195, 'Science Research Analyst', 27, NULL, NULL),
(196, 'Information Systems Researcher 2', 27, NULL, NULL),
(197, 'Senior Science Research Specialist', 27, NULL, NULL),
(198, 'Accountant 3', 27, NULL, NULL),
(199, 'Administrative Assistant 3', 27, NULL, NULL),
(200, 'Senior Administrative Assistant I', 27, NULL, NULL),
(201, 'Science Research Specialist 2', 27, NULL, NULL),
(202, 'Planning Officer 1', 27, NULL, NULL),
(203, 'Clerk III', 27, NULL, NULL),
(204, 'Science Research Specialist 1', 27, NULL, NULL),
(205, 'Administrative Assistant 4', 27, NULL, NULL),
(206, 'Administrative Aide 5', 27, NULL, NULL),
(207, 'Computer Programmer 2', 27, NULL, NULL),
(208, 'Planning Assistant', 27, NULL, NULL),
(209, 'Administrative Assistant 2', 27, NULL, NULL),
(210, 'Administrative Assistant 6', 27, NULL, NULL),
(211, 'Procurement Management Officer II', 27, NULL, NULL),
(212, 'Science Research Assistant', 27, NULL, NULL),
(213, 'Science Research Specialist 2', 28, NULL, NULL),
(214, 'Information Systems Researcher 3', 28, NULL, NULL),
(215, 'Laboratory Aide 2 ', 28, NULL, NULL),
(216, 'Administrative Assistant 5', 28, NULL, NULL),
(217, 'Science Research Assistant', 28, NULL, NULL),
(218, 'Laborer 2', 28, NULL, NULL),
(219, 'Laboratory Technician 1', 28, NULL, NULL),
(220, 'Science Research Analyst', 28, NULL, NULL),
(221, 'Science Research Specialist 1', 28, NULL, NULL),
(222, 'Administrative Assistant 3', 29, NULL, NULL),
(223, 'Laboratory Technician 1', 29, NULL, NULL),
(224, 'Utility Foreman', 29, NULL, NULL),
(225, 'Administrative Assistant 2', 29, NULL, NULL),
(226, 'Laborer 1', 29, NULL, NULL),
(227, 'Science Research Analyst', 29, NULL, NULL),
(228, 'Mechanic 1', 29, NULL, NULL),
(229, 'Farm Superintendent 2', 29, NULL, NULL),
(230, 'Mechanic 3', 29, NULL, NULL),
(231, 'Science Research Specialist 2', 29, NULL, NULL),
(232, 'Science Research Assistant', 29, NULL, NULL),
(233, 'Mechanic 2', 29, NULL, NULL),
(234, 'Farm Worker 2', 29, NULL, NULL),
(235, 'Science Research Specialist 1', 29, NULL, NULL),
(236, 'Laborer 2', 29, NULL, NULL),
(237, 'Administrative Assistant 5', 30, NULL, NULL),
(238, 'Clerk III', 30, NULL, NULL),
(239, 'Senior Science Research Specialist', 30, NULL, NULL),
(240, 'Information Systems Researcher 2', 30, NULL, NULL),
(241, 'Science Research Specialist 2', 30, NULL, NULL),
(242, 'Science Research Analyst', 30, NULL, NULL),
(243, 'Science Research Specialist 1', 30, NULL, NULL),
(244, 'Senior Science Research Specialist', 31, NULL, NULL),
(245, 'Science Research Specialist 2', 31, NULL, NULL),
(246, 'Planning Assistant 2', 31, NULL, NULL),
(247, 'Computer Operator 2', 31, NULL, NULL),
(248, 'Computer Programmer 1', 31, NULL, NULL),
(249, 'Laborer 1', 31, NULL, NULL),
(250, 'Laborer 2', 31, NULL, NULL),
(251, 'Clerk III', 31, NULL, NULL),
(252, 'Science Research Analyst', 31, NULL, NULL),
(253, 'Science Research Assistant', 31, NULL, NULL),
(254, 'Science Research Specialist 1', 31, NULL, NULL),
(255, 'Mechanic 1', 31, NULL, NULL),
(256, 'Utility Foreman', 4, NULL, NULL),
(257, 'Admin Aide (Driver)', 5, NULL, NULL),
(258, 'Administrative AideV / Inspector', 5, NULL, NULL),
(259, 'Administrative Asistant I', 5, NULL, NULL),
(260, 'Administrative Asistant II', 5, NULL, NULL),
(261, 'Administrative Asistant III', 5, NULL, NULL),
(262, 'Administrative Asistant IV', 5, NULL, NULL),
(263, 'Administrative Assistant I', 5, NULL, NULL),
(264, 'Administrative Assistant II', 5, NULL, NULL),
(265, 'Administrative Assistant III', 5, NULL, NULL),
(266, 'Administrative Assistant IV', 5, NULL, NULL),
(267, 'Driver I', 5, NULL, NULL),
(268, 'Driver II', 5, NULL, NULL),
(269, 'Driver III', 5, NULL, NULL),
(270, 'Engineer I', 5, NULL, NULL),
(271, 'Mechanic II', 5, NULL, NULL),
(272, 'Security Guard III', 5, NULL, NULL),
(273, 'Utility Worker II', 5, NULL, NULL),
(274, 'Administrative AideV / Inspector', 32, NULL, NULL),
(275, 'Science Research Analyst', 32, NULL, NULL),
(276, 'Information Systems Analyst I', 32, NULL, NULL),
(277, 'Data Report Officer', 32, NULL, NULL),
(278, 'Administrative Assistant III', 32, NULL, NULL),
(279, 'Science Research Specialist I', 32, NULL, NULL),
(280, 'Science Research  Specialist II', 32, NULL, NULL),
(281, 'Science Resarch Analyst', 32, NULL, NULL),
(282, 'Science Research  Analyst', 32, NULL, NULL),
(283, 'Science Research  Specialist I', 32, NULL, NULL),
(284, 'Laborer I', 33, NULL, NULL),
(285, 'Administrative Assistant IV', 33, NULL, NULL),
(286, 'Mechanic I', 33, NULL, NULL),
(287, 'Laborer II', 33, NULL, NULL),
(288, 'Science Research  Specialist I', 33, NULL, NULL),
(289, 'Science Research Analyst', 33, NULL, NULL),
(290, 'Science Research Assistant', 33, NULL, NULL),
(291, 'Administrative Assistant I', 34, NULL, NULL),
(292, 'Science Research Specialist I', 35, NULL, NULL),
(293, 'Science Research  Specialist I', 35, NULL, NULL),
(294, 'Science Research Assistant', 35, NULL, NULL),
(295, 'Science Research Analyst', 35, NULL, NULL),
(296, 'Science Research  Analyst', 35, NULL, NULL),
(297, 'Laborer I', 40, NULL, NULL),
(298, 'Science Research Specialist I', 40, NULL, NULL),
(299, 'Mechanic I', 40, NULL, NULL),
(300, 'Admin Assistant II', 41, NULL, NULL),
(301, 'Mechanic II', 41, NULL, NULL),
(302, 'Science Research Analyst', 41, NULL, NULL),
(303, 'Laborer I', 41, NULL, NULL),
(304, 'Science Research Assistant ', 41, NULL, NULL),
(305, 'Science Research Specialist I', 41, NULL, NULL),
(306, 'Science Aide', 42, NULL, NULL),
(307, 'Admin Assistant I', 42, NULL, NULL),
(308, 'Laborer I', 42, NULL, NULL),
(309, 'Laborer II', 42, NULL, NULL),
(310, 'Cash Clerk III', 43, NULL, NULL),
(311, 'Information System Analyst I', 44, NULL, NULL),
(312, 'Science Research Specialist I', 45, NULL, NULL),
(313, 'Admin Assistant III', 46, NULL, NULL),
(314, 'Financial Analyst', 46, NULL, NULL),
(315, 'Accountant I', 46, NULL, NULL),
(316, 'Admin Assistant II', 47, NULL, NULL),
(317, 'Admin Assistant IV', 48, NULL, NULL),
(318, 'Senior Admin Assistant III', 49, NULL, NULL),
(319, 'Admin Assistant II', 50, NULL, NULL),
(320, 'Admin Assistant IV', 50, NULL, NULL),
(321, 'Driver III', 51, NULL, NULL),
(322, 'Utility Foreman', 51, NULL, NULL),
(323, 'Engineer I', 51, NULL, NULL),
(324, 'Admin Assistant II', 51, NULL, NULL),
(325, 'Utility Worker II', 51, NULL, NULL),
(326, 'Administrative Aide (Driver)', 51, NULL, NULL),
(327, 'Admin Assistant III', 52, NULL, NULL),
(328, 'Admin Assistant III', 53, NULL, NULL),
(329, 'Science Research Analyst', 53, NULL, NULL),
(330, 'Planing Assistant II', 53, NULL, NULL),
(331, 'Computer Maintenance Technologist I', 53, NULL, NULL),
(332, 'Science Research Specialist I', 53, NULL, NULL),
(333, 'Science Research Specialist II', 54, NULL, NULL),
(334, 'Admin Aide V', 55, NULL, NULL),
(335, 'Admin Assistant I', 55, NULL, NULL),
(336, 'Clerk III ', 56, NULL, NULL),
(337, 'Procurement Management Officer I', 56, NULL, NULL),
(338, 'Information Systems Analyst I ', 56, NULL, NULL),
(339, 'Engineer I ', 56, NULL, NULL),
(340, 'Administrative Assistant IV', 56, NULL, NULL),
(341, 'Senior Administrative Assistant IV', 56, NULL, NULL),
(342, 'Utility Worker I', 56, NULL, NULL),
(343, 'Administrative Assistant VI', 56, NULL, NULL),
(344, 'Security Guard I', 56, NULL, NULL),
(345, 'Driver I ', 56, NULL, NULL),
(346, 'Utility Worker II', 56, NULL, NULL),
(347, 'Driver I', 56, NULL, NULL),
(348, 'Administrative Assistant III', 56, NULL, NULL),
(349, 'Administrative Assistant II', 56, NULL, NULL),
(350, 'Administrative Assistant IV', 57, NULL, NULL),
(351, 'Administrative Assistant I', 57, NULL, NULL),
(352, 'Laborer II', 57, NULL, NULL),
(353, 'Mechanic II', 58, NULL, NULL),
(354, 'Science Research Specialist II', 58, NULL, NULL),
(355, 'Supervising Science Research Specialist', 58, NULL, NULL),
(356, 'Senior Science Research Specialist', 58, NULL, NULL),
(357, 'Science Research Analyst', 58, NULL, NULL),
(358, 'Science Research Specialist I ', 58, NULL, NULL),
(359, 'Science Research Assistant', 58, NULL, NULL),
(360, 'Science Research Specialist I', 58, NULL, NULL),
(361, 'Laborer II', 58, NULL, NULL),
(362, 'Computer Maintenance Technologist I', 59, NULL, NULL),
(363, 'Science Research Specialist I ', 59, NULL, NULL),
(364, 'Science Research Analyst', 59, NULL, NULL),
(365, 'Science Research Specialist I', 59, NULL, NULL),
(366, 'Science Research Specialist II', 59, NULL, NULL),
(367, 'Administrative Aide V ( Seed Inspector) ', 59, NULL, NULL),
(368, 'Accounting Analyst', 60, NULL, NULL),
(369, 'Laborer II ', 60, NULL, NULL),
(370, 'Clerk II', 60, NULL, NULL),
(371, 'Laborer II', 60, NULL, NULL),
(372, 'Utility Worker II', 60, NULL, NULL),
(373, 'Science Research Analyst', 61, NULL, NULL),
(374, 'Laborer II', 61, NULL, NULL),
(375, 'Farm Foreman', 61, NULL, NULL),
(376, 'Laborer II', 61, NULL, NULL),
(377, 'Laborer I', 61, NULL, NULL),
(378, 'Science Research Assistant', 62, NULL, NULL),
(379, 'Security Guard', 63, NULL, NULL),
(380, 'Senior Administrative Assistant III', 64, NULL, NULL),
(381, 'Administrative Aide VI', 64, NULL, NULL),
(382, 'Administrative Aide IV', 64, NULL, NULL),
(383, 'Administrative Assistant III', 64, NULL, NULL),
(384, 'Mechanic II', 64, NULL, NULL),
(385, 'Administrative Assistant V', 64, NULL, NULL),
(386, 'Administrative Aide V', 64, NULL, NULL),
(387, 'Administrative Aide III', 64, NULL, NULL),
(388, 'Administrative Assistant IV', 64, NULL, NULL),
(389, 'Engineer II', 64, NULL, NULL),
(390, 'Administrative Assistant II', 64, NULL, NULL),
(391, 'Administrative Assistant II', 65, NULL, NULL),
(392, 'Agricultural Technician I', 65, NULL, NULL),
(393, 'Administrative Aide IV', 65, NULL, NULL),
(394, 'Laborer I', 65, NULL, NULL),
(395, 'Laborer II', 65, NULL, NULL),
(396, 'Administrative Assistant II', 66, NULL, NULL),
(397, 'Science Research Specialist I', 66, NULL, NULL),
(398, 'Science Research Specialist II', 67, NULL, NULL),
(399, 'Science Research Assistant', 67, NULL, NULL),
(400, 'Science Research Analyst', 67, NULL, NULL),
(401, 'Mechanic I', 67, NULL, NULL),
(402, 'Science Research Specialist I', 67, NULL, NULL),
(403, 'Laborer I', 67, NULL, NULL),
(404, 'Administrative Assistant II', 67, NULL, NULL),
(405, 'Laborer II', 67, NULL, NULL),
(406, 'Science Research Specialist II', 68, NULL, NULL),
(407, 'Information Technology Officer', 68, NULL, NULL),
(408, 'Administrative Assistant III', 68, NULL, NULL),
(409, 'Science Research Analyst', 68, NULL, NULL),
(410, 'Planning Assistant II', 68, NULL, NULL),
(411, 'Administrative Aide V', 68, NULL, NULL),
(412, 'Science Research Specialist I', 68, NULL, NULL),
(413, 'Administrative Assistant II', 68, NULL, NULL),
(414, 'Senior Administrative Assistant I', 69, NULL, NULL),
(415, 'Driver II', 69, NULL, NULL),
(416, 'Driver III', 69, NULL, NULL),
(417, 'Utility Worker II', 69, NULL, NULL),
(418, 'Utility Worker I', 69, NULL, NULL),
(419, 'Administrative Assistant IV', 69, NULL, NULL),
(420, 'Finance Analyst I', 69, NULL, NULL),
(421, 'Laborer I', 69, NULL, NULL),
(422, 'Administrative Assistant III', 69, NULL, NULL),
(423, 'Clerk III', 69, NULL, NULL),
(424, 'Administrative Assistant II', 69, NULL, NULL),
(425, 'Security Guard II', 69, NULL, NULL),
(426, 'Administrative Assistant II', 70, NULL, NULL),
(427, 'Security Guard II', 70, NULL, NULL),
(428, 'Farm Superindent I', 70, NULL, NULL),
(429, 'Security Guard I', 70, NULL, NULL),
(430, 'Mechanic I', 70, NULL, NULL),
(431, 'Laborer II', 70, NULL, NULL),
(432, 'Laborer I', 70, NULL, NULL),
(433, 'Senior Science Research Specialist', 71, NULL, NULL),
(434, 'Laborer II', 71, NULL, NULL),
(435, 'Science Research Assistant ', 71, NULL, NULL),
(436, 'Science Research Analyst', 71, NULL, NULL),
(437, 'Science Research Specialist I', 71, NULL, NULL),
(438, 'Finance Analyst I', 72, NULL, NULL),
(439, 'Accountant I', 72, NULL, NULL),
(440, 'Laborer II', 73, NULL, NULL),
(441, 'Laborer II', 74, NULL, NULL),
(442, 'Laborer II', 75, NULL, NULL),
(443, 'Science Research Specialist I', 75, NULL, NULL),
(444, 'Administrative Assistant III', 76, NULL, NULL),
(445, 'Administrative Assistant I', 76, NULL, NULL),
(446, 'Science Research Analyst', 76, NULL, NULL),
(447, 'Computer Maintenance Technologist I', 76, NULL, NULL),
(448, 'Science Research Specialist II', 76, NULL, NULL),
(449, 'Administrative Aide V', 76, NULL, NULL),
(450, 'Laborer II', 77, NULL, NULL),
(451, 'Science Research Specialist II', 78, NULL, NULL),
(452, 'Science Aide', 78, NULL, NULL),
(453, 'Science Research Assistant ', 78, NULL, NULL),
(454, 'Laborer II', 78, NULL, NULL),
(455, 'Science Research Specialist I', 78, NULL, NULL),
(456, 'Laboratory Technician I', 78, NULL, NULL),
(457, 'Laboratory Technician I', 79, NULL, NULL),
(458, 'Science Research Specialist II', 80, NULL, NULL),
(459, 'Laborer I', 80, NULL, NULL),
(460, 'Science Research Analyst', 80, NULL, NULL),
(461, 'Laborer II', 80, NULL, NULL),
(462, 'Mechanic III', 81, NULL, NULL),
(463, 'Driver II', 81, NULL, NULL),
(464, 'Admin Aide IV', 81, NULL, NULL),
(465, 'Utility Worker II', 81, NULL, NULL),
(466, 'Administrative Assistant I', 81, NULL, NULL),
(467, 'Executive Assistant I', 81, NULL, NULL),
(468, 'Clerk II', 81, NULL, NULL),
(469, 'Administrative Assistant III', 81, NULL, NULL),
(470, 'Security Guard', 81, NULL, NULL),
(471, 'Driver I', 81, NULL, NULL),
(472, 'Science Research Assistant', 82, NULL, NULL),
(473, 'Laborer 1', 82, NULL, NULL),
(474, 'Laborer 2', 82, NULL, NULL),
(475, 'Science Research Specialist I', 82, NULL, NULL),
(476, 'Clerk II', 82, NULL, NULL),
(477, 'Utility Worker II', 83, NULL, NULL),
(478, 'Driver I', 83, NULL, NULL),
(479, 'Laborer 2', 83, NULL, NULL),
(480, 'Clerk II', 83, NULL, NULL),
(481, 'Science Research Specialist 1', 83, NULL, NULL),
(482, 'Science Research Assistant ', 83, NULL, NULL),
(483, 'Science Research Specialist I', 83, NULL, NULL),
(484, 'Science Research Analyst', 83, NULL, NULL),
(485, 'Laborer 1', 83, NULL, NULL),
(486, 'Science Research Specialist II', 83, NULL, NULL),
(487, 'Computer Maintenance Technologist 1', 84, NULL, NULL),
(488, 'Administrative Assistant IV', 84, NULL, NULL),
(489, 'Science Research Specialist II', 84, NULL, NULL),
(490, 'Data Controller', 84, NULL, NULL),
(491, 'Administrative Assistant I', 84, NULL, NULL),
(492, 'Administrative Assistant III', 84, NULL, NULL),
(493, 'Administrative Assistant II', 84, NULL, NULL),
(494, 'Science Research Assistant ', 84, NULL, NULL),
(495, 'Science Research Analyst', 84, NULL, NULL),
(496, 'Administrative Aide 5', 84, NULL, NULL),
(497, 'Science Research Specialist I', 84, NULL, NULL),
(498, 'Planning Assistant II', 85, NULL, NULL),
(499, 'Admin Aide IV (Driver)', 85, NULL, NULL),
(500, 'Utility Foreman', 85, NULL, NULL),
(501, 'Administrative Assistant IV', 85, NULL, NULL),
(502, 'Admin Assistant I', 85, NULL, NULL),
(503, 'Administrative Assistant II', 85, NULL, NULL),
(504, 'Admin Aide III (Driver-Mechanic)', 85, NULL, NULL),
(505, 'Clerk III', 85, NULL, NULL),
(506, 'Utility Worker II', 85, NULL, NULL),
(507, 'Administrative Assistant II', 86, NULL, NULL),
(508, 'Science Research Assistant', 86, NULL, NULL),
(509, 'Utility Worker II', 86, NULL, NULL),
(510, 'Farm Worker II (Mechanic I)', 86, NULL, NULL),
(511, 'Laborer I', 86, NULL, NULL),
(512, 'Laborer II', 86, NULL, NULL),
(513, 'SR Assistant', 87, NULL, NULL),
(514, 'Science Aide', 87, NULL, NULL),
(515, 'Science Research Analyst', 87, NULL, NULL),
(516, 'Administrative Assistant II', 87, NULL, NULL),
(517, 'Science Research Assistant', 87, NULL, NULL),
(518, 'Science Research Specialist II', 87, NULL, NULL),
(519, 'SR Analyst', 87, NULL, NULL),
(520, 'Science Research Specialist I', 87, NULL, NULL),
(521, 'Laborer II', 87, NULL, NULL),
(522, 'Laborer I', 87, NULL, NULL),
(523, 'Computer Maintenance Technologist I', 88, NULL, NULL),
(524, 'Administrative Assistant III', 88, NULL, NULL),
(525, 'Administrative Assistant II', 88, NULL, NULL),
(526, 'Admin Aide III (Driver)', 88, NULL, NULL),
(527, 'Clerk III', 88, NULL, NULL),
(528, 'Admin Aide V (Driver)', 88, NULL, NULL),
(529, 'Admin Assistant III', 88, NULL, NULL),
(530, 'Administrative Assistant I (Supplies Inspector)', 88, NULL, NULL),
(531, 'Administrative Assistant IV', 88, NULL, NULL),
(532, 'Admin Aide V (Seed Inspector)', 88, NULL, NULL),
(533, 'Science Researrch Assistant', 88, NULL, NULL),
(534, 'Science Research Analyst', 88, NULL, NULL),
(535, 'Science Research Assistant', 88, NULL, NULL),
(536, 'Science Research Specialist I', 88, NULL, NULL),
(537, 'Science Research Specialist II', 88, NULL, NULL),
(538, 'Laborer I', 89, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province_name` varchar(255) DEFAULT NULL
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
-- Table structure for table `source_funds`
--

CREATE TABLE `source_funds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fund` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `source_funds`
--

INSERT INTO `source_funds` (`id`, `fund`, `created_at`, `updated_at`) VALUES
(1, 'Core Fund', NULL, NULL),
(2, 'RCEF', NULL, NULL),
(3, 'Other: Extra-core Fund', NULL, NULL),
(4, 'Other: External Fund', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `station` varchar(255) NOT NULL,
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
  `encoder_id` bigint(20) NOT NULL,
  `division` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `training_type` varchar(255) NOT NULL,
  `training_style` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `venue` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `sponsor` varchar(255) NOT NULL,
  `fund` varchar(255) NOT NULL,
  `average_gik` varchar(255) NOT NULL,
  `evaluation` varchar(255) NOT NULL,
  `participants` varchar(255) NOT NULL,
  `num_of_participants` varchar(255) NOT NULL,
  `num_of_farmers` varchar(255) NOT NULL,
  `num_of_extworkers` varchar(255) NOT NULL,
  `num_of_scientific` varchar(255) NOT NULL,
  `num_of_other_sectors` varchar(255) NOT NULL,
  `num_of_male` varchar(255) NOT NULL,
  `num_of_female` varchar(255) NOT NULL,
  `num_of_indigenous` varchar(255) NOT NULL,
  `num_of_pwd` varchar(255) NOT NULL,
  `image` varchar(700) DEFAULT NULL,
  `file` varchar(700) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainings_forms`
--

INSERT INTO `trainings_forms` (`id`, `encoder_id`, `division`, `title`, `training_type`, `training_style`, `start_date`, `end_date`, `venue`, `province`, `municipality`, `country`, `state`, `sponsor`, `fund`, `average_gik`, `evaluation`, `participants`, `num_of_participants`, `num_of_farmers`, `num_of_extworkers`, `num_of_scientific`, `num_of_other_sectors`, `num_of_male`, `num_of_female`, `num_of_indigenous`, `num_of_pwd`, `image`, `file`, `created_at`, `updated_at`) VALUES
(13, 8, 'ISD', 'Notthing', 'Farmer\'s Field School (FFS)', 'Blended (Online + Face-to-Face)', '2023-02-13', '2023-03-09', 'International', '', '', 'Country', 'State/City/Province', 'sponsor', 'Other: Extra-core Fund', '12', '23', 'Extension workers or other intermediaries (e.g LFT, trainer, extension worker)', '23', '23', '3', '23', '23', '23', '23', '23', '223', 'img_2268.jpg', 'philrice ces - summary of trainings (2024).xlsx', '2024-03-22', '2024-03-21 18:59:14'),
(16, 8, 'ISD', 'Title 3', 'Farmer\'s Field School (FFS)', 'Blended (Online + Face-to-Face)', '2024-02-13', '2024-03-09', 'International', '', '', 'Country', 'State/City/Province', 'sponsor', 'Other: Extra-core Fund', '12', '23', 'Extension workers or other intermediaries (e.g LFT, trainer, extension worker)', '23', '23', '3', '23', '23', '23', '23', '23', '223', 'img_2268.jpg', 'philrice ces - summary of trainings (2024).xlsx', '2024-03-22', '2024-03-21 20:30:18'),
(17, 8, 'ADMIN', 'Title 2', 'Farmer\'s Field School (FFS)', 'Blended (Online + Face-to-Face)', '2024-02-13', '2024-03-09', 'International', '', '', 'Country', 'State/City/Province', 'sponsor', 'Other: Extra-core Fund', '12', '23', 'Extension workers or other intermediaries (e.g LFT, trainer, extension worker)', '23', '23', '3', '23', '23', '23', '23', '23', '223', 'img_2268.jpg', 'philrice ces - summary of trainings (2024).xlsx', '2024-03-22', '2024-03-21 20:30:25'),
(18, 8, 'ISD', 'Title 5', 'Farmer\'s Field School (FFS)', 'Blended (Online + Face-to-Face)', '2024-02-13', '2024-03-09', 'International', '', '', 'Country', 'State/City/Province', 'sponsor', 'Other: Extra-core Fund', '12', '23', 'Extension workers or other intermediaries (e.g LFT, trainer, extension worker)', '23', '23', '3', '23', '23', '23', '23', '23', '223', 'img_2268.jpg', 'philrice ces - summary of trainings (2024).xlsx', '2024-03-22', '2024-03-21 20:30:32'),
(19, 8, 'ADMIN', 'Title 6', 'Farmer\'s Field School (FFS)', 'Blended (Online + Face-to-Face)', '2024-02-13', '2024-03-09', 'International', '', '', 'Country', 'State/City/Province', 'sponsor', 'Other: Extra-core Fund', '12', '23', 'Extension workers or other intermediaries (e.g LFT, trainer, extension worker)', '23', '23', '3', '23', '23', '23', '23', '23', '223', 'img_2268.jpg', 'philrice ces - summary of trainings (2024).xlsx', '2024-03-22', '2024-03-21 20:30:43'),
(20, 8, 'ISD', 'Diff title', 'Farmer\'s Field School (FFS)', 'Blended (Online + Face-to-Face)', '2024-02-13', '2024-03-09', 'International', '', '', 'Country', 'State/City/Province', 'sponsor', 'Other: Extra-core Fund', '12', '23', 'Extension workers or other intermediaries (e.g LFT, trainer, extension worker)', '23', '23', '3', '23', '23', '23', '23', '23', '223', 'img_2268.jpg', 'philrice ces - summary of trainings (2024).xlsx', '2024-03-22', '2024-03-21 20:30:18'),
(21, 8, 'ISD', 'ok na title', 'Farmer\'s Field School (FFS)', 'Blended (Online + Face-to-Face)', '2024-02-13', '2024-03-09', 'International', '', '', 'Country', 'State/City/Province', 'sponsor', 'Other: Extra-core Fund', '12', '23', 'Extension workers or other intermediaries (e.g LFT, trainer, extension worker)', '23', '23', '3', '23', '23', '23', '23', '23', '223', 'img_2268.jpg', 'philrice ces - summary of trainings (2024).xlsx', '2024-03-22', '2024-03-21 18:59:14');

-- --------------------------------------------------------

--
-- Table structure for table `training_types`
--

CREATE TABLE `training_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `training_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `training_types`
--

INSERT INTO `training_types` (`id`, `training_type`, `created_at`, `updated_at`) VALUES
(1, 'Rice Specialists\' Training Course (RSTC)', NULL, NULL),
(2, 'Farmer\'s Field School (FFS)', NULL, NULL),
(3, 'Training of Trainers (TOT)', NULL, NULL),
(4, 'Specialized Course', NULL, NULL),
(5, 'Customized/Short Course', NULL, NULL),
(6, 'Refresher Course', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `philrice_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `station` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `sq1` varchar(255) NOT NULL,
  `sq2` varchar(255) NOT NULL,
  `sq3` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `philrice_id`, `name`, `first_name`, `mi`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `user_type`, `station`, `division`, `position`, `sq1`, `sq2`, `sq3`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Super Admin', 'Super', 'D.', 'Admin', 'superadmin@gmail.com', '2024-03-17 21:52:22', '$2y$12$xGbaF21.s6l5UJ9zcjRSKeL7Kt.sF2QQnnwfhaXAZgq91yUycZWQO', NULL, 'super_admin', '', '', '', '', '', '', '2024-02-21 00:35:04', '2024-02-21 00:35:04'),
(2, NULL, 'Admin', 'Admin', 'D.', 'Admin', 'admin@gmail.com', '2024-03-17 21:52:22', '$2y$12$xGbaF21.s6l5UJ9zcjRSKeL7Kt.sF2QQnnwfhaXAZgq91yUycZWQO', NULL, 'admin', '', '', '', '', '', '', '2024-02-21 00:35:04', '2024-02-21 00:35:04'),
(3, NULL, 'Encoder', 'Encoder', 'D.', 'Encoder', 'encoder@gmail.com', NULL, '$2y$12$xGbaF21.s6l5UJ9zcjRSKeL7Kt.sF2QQnnwfhaXAZgq91yUycZWQO', NULL, 'encoder', '', '', '', '', '', '', '2024-02-21 00:35:04', '2024-02-21 00:35:04'),
(4, NULL, 'Viewer', 'Viewer', 'D.', 'Viewer', 'inigoaldrich24@gmail.com', NULL, '$2y$12$drCUCf7a/P/T74byyu8uO.z7/WuHPQjKSqfNZHWRSEQ5LMegDZRxu', 'z1IqHGwzVyhfYidKNkEpWgqDbGSJbc9iKFLkAf1Neuo6zBbV3wVZZnAy68wl', 'viewer', '', '', '', '', '', '', '2024-02-21 00:35:04', '2024-03-10 17:19:58'),
(8, '2222gwsf', 'Ivan Aldrich D Iñigo', 'Ivan Aldrich', 'D', 'Iñigo', 'onlyfins14@gmail.com', '2024-03-17 21:52:22', '$2y$12$dNvkKdVxXsUQl5eQDNQ67.rRtt8KOHftbw4FWXouh7/Eew2TGT2pG', 'YNLOq0Es5ks24Vjus9IryM8EC5JzUnZYBNRiLQCEdwKwkg4ThY6gF5Ap4VnY', 'encoder', 'CES', 'ADMIN', 'Administrative Aide 6', 'dog', 'city', 'school', '2024-03-17 21:51:59', '2024-03-17 21:52:22');

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
-- Indexes for table `source_funds`
--
ALTER TABLE `source_funds`
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
-- Indexes for table `training_types`
--
ALTER TABLE `training_types`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=539;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `source_funds`
--
ALTER TABLE `source_funds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `trainings_forms`
--
ALTER TABLE `trainings_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `training_types`
--
ALTER TABLE `training_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
