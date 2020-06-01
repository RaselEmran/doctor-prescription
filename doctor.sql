-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2019 at 12:33 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutuses`
--

CREATE TABLE `aboutuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `doc_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Full_Name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `special` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aboutuses`
--

INSERT INTO `aboutuses` (`id`, `doc_id`, `Full_Name`, `special`, `degree`, `experience`, `about`, `image`, `created_at`, `updated_at`) VALUES
(1, '1', 'ড: মাহমুদ', 'স্কিন, এলার্জি ও ভিডি বিশেষজ্ঞ', 'এমবিবিএস, ডিডিবি, আরএসএসএইচ', 'কনসালটেন্ট গনিয়া ও ওবিএস ওটিএস এমবিএস বিএসএমএমইউ (পিজি হাসপাতাল) ঢাকা বিশ্ববিদ্যালয়ের লে।', 'অ্যাডমিন কাস্টমাইজড করা যাবে, অপটিক পর্যবেক্ষণ সরবরাহকারী, কিন্তু tempor এবং জীবনীশক্তি, যাতে শ্রম ও দুঃখ, কিছু গুরুত্বপূর্ণ বিষয় eiusmod না। বছর ধরে, আমি আসব, যে তার বাইরে aliquip nostrud হবে ব্যায়াম সুবিধা, যাতে উদ্দীপক প্রচেষ্টা স্কুল জেলা ও দীর্ঘায়ুর পারেন। ফিল্ম আর্কাইভ নিন্দা অবশ্য ব্যথা cupidatat ব্যথা কাস্টমাইজড করা যাবে, অপটিক পর্যবেক্ষণ সরবরাহকারী, কিন্তু tempor এবং জীবনীশক্তি, যাতে শ্রম ও দুঃখ, কিছু গুরুত্বপূর্ণ বিষয় eiusmod করতে হয়।\"', 'backend/about/H1wGYDX9P6Wmfx0Ahcpl.png', '2019-03-30 11:49:29', '2019-03-30 11:52:43');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(10) UNSIGNED NOT NULL,
  `pa_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pat_f_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ap_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ap_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ap_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ap_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ap_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointed_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ap_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `problem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogposts`
--

CREATE TABLE `blogposts` (
  `id` int(10) UNSIGNED NOT NULL,
  `doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogposts`
--

INSERT INTO `blogposts` (`id`, `doctor_id`, `doctor_name`, `title`, `body`, `image`, `view_count`, `status`, `date`, `created_at`, `updated_at`) VALUES
(1, '1', 'Mr:Doctor', 'পোস্ট শিরোনাম', '<p>Lorem ipsum dolor sit amet, id nec conceptam conclusionemque. Et eam tation option. Utinam salutatus ex eum. Ne mea dicit tibique facilisi, ea mei omittam explicari conclusionemque, ad nobis propriae quaerendum sea. Lorem ipsum dolor sit amet, id nec conceptam conclusionemque. Et eam tation option. Utinam salutatus ex eum. Ne mea dicit tibique facilisi, ea mei omittam explicari conclusionemque, ad nobis propriae quaerendum sea.&nbsp;Lorem ipsum dolor sit amet, id nec conceptam conclusionemque. Et eam tation option. Utinam salutatus ex eum. Ne mea dicit tibique facilisi, ea mei omittam explicari conclusionemque, ad nobis propriae quaerendum sea. Lorem ipsum dolor sit amet, id nec conceptam conclusionemque. Et eam tation option. Utinam salutatus ex eum. Ne mea dicit tibique facilisi, ea mei omittam explicari conclusionemque, ad nobis propriae quaerendum sea.&nbsp;Lorem ipsum dolor sit amet, id nec conceptam conclusionemque. Et eam tation option. Utinam salutatus ex eum. Ne mea dicit tibique facilisi, ea mei omittam explicari conclusionemque, ad nobis propriae quaerendum sea. Lorem ipsum dolor sit amet, id nec conceptam conclusionemque. Et eam tation option. Utinam salutatus ex eum. Ne mea dicit tibique facilisi, ea mei omittam explicari conclusionemque, ad nobis propriae quaerendum sea.</p>', 'backend/post/4xA1GjcLOIDCY5co0Vyf.jpg', '18', 'active', 'Sunday, 31 March 2019, 01:12:55 PM', '2019-03-31 06:26:13', '2019-03-31 07:12:55'),
(2, '1', 'Mr:Doctor', 'পোস্ট শিরোনাম', '<p>অ্যাডমিন কাস্টমাইজড করা যাবে, এই ছিল তন্ন তন্ন গর্ভবতী syllogistic হয়। এবং এটা স্বাভাবিক বিকল্প। আমি তাকে দ্বারা greeted ছিল। আমার শব্দ, তোমাকে তিনি facilisi বললেন, তাদেরকে আমার উদ্দেশে ব্যাখ্যা করার কিছুই বলতে না, এক নিজস্ব আমাদের সমুদ্র দিতে বলা হবে, syllogistic হয়। &nbsp;অ্যাডমিন কাস্টমাইজড করা যাবে, এই ছিল তন্ন তন্ন গর্ভবতী syllogistic হয়। এবং এটা স্বাভাবিক বিকল্প। আমি তাকে দ্বারা greeted ছিল। আমার শব্দ, তোমাকে তিনি facilisi বললেন, তাদেরকে আমার উদ্দেশে ব্যাখ্যা করার কিছুই বলতে না, এক নিজস্ব আমাদের সমুদ্র দিতে বলা হবে, syllogistic হয়।</p>\r\n\r\n<p>অ্যাডমিন কাস্টমাইজড করা যাবে, এই ছিল তন্ন তন্ন গর্ভবতী syllogistic হয়। এবং এটা স্বাভাবিক বিকল্প। আমি তাকে দ্বারা greeted ছিল। আমার শব্দ, তোমাকে তিনি facilisi বললেন, তাদেরকে আমার উদ্দেশে ব্যাখ্যা করার কিছুই বলতে না, এক নিজস্ব আমাদের সমুদ্র দিতে বলা হবে, syllogistic হয়। &nbsp;অ্যাডমিন কাস্টমাইজড করা যাবে, এই ছিল তন্ন তন্ন গর্ভবতী syllogistic হয়। এবং এটা স্বাভাবিক বিকল্প। আমি তাকে দ্বারা greeted ছিল। আমার শব্দ, তোমাকে তিনি facilisi বললেন, তাদেরকে আমার উদ্দেশে ব্যাখ্যা করার কিছুই বলতে না, এক নিজস্ব আমাদের সমুদ্র দিতে বলা হবে, syllogistic হয়।&nbsp;অ্যাডমিন কাস্টমাইজড করা যাবে, এই ছিল তন্ন তন্ন গর্ভবতী syllogistic হয়। এবং এটা স্বাভাবিক বিকল্প। আমি তাকে দ্বারা greeted ছিল। আমার শব্দ, তোমাকে তিনি facilisi বললেন, তাদেরকে আমার উদ্দেশে ব্যাখ্যা করার কিছুই বলতে না, এক নিজস্ব আমাদের সমুদ্র দিতে বলা হবে, syllogistic হয়। &nbsp;অ্যাডমিন কাস্টমাইজড করা যাবে, এই ছিল তন্ন তন্ন গর্ভবতী syllogistic হয়। এবং এটা স্বাভাবিক বিকল্প। আমি তাকে দ্বারা greeted ছিল। আমার শব্দ, তোমাকে তিনি facilisi বললেন, তাদেরকে আমার উদ্দেশে ব্যাখ্যা করার কিছুই বলতে না, এক নিজস্ব আমাদের সমুদ্র দিতে বলা হবে, syllogistic হয়।</p>', 'backend/post/1l1FaanmrHy72BPbMewN.jpg', '2', 'active', 'Sunday, 31 March 2019, 02:35:09 PM', '2019-03-31 08:35:09', '2019-03-31 08:35:09');

-- --------------------------------------------------------

--
-- Table structure for table `case_medis`
--

CREATE TABLE `case_medis` (
  `id` int(10) UNSIGNED NOT NULL,
  `pa_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instruction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `days` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `case_studies`
--

CREATE TABLE `case_studies` (
  `id` int(10) UNSIGNED NOT NULL,
  `casename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pa_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `case_tests`
--

CREATE TABLE `case_tests` (
  `id` int(10) UNSIGNED NOT NULL,
  `pa_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(7, 'Python', '10mls', '2019-03-27 01:13:52', '2019-03-27 01:13:52'),
(8, 'Doctor', 'test mode', '2019-03-27 02:42:15', '2019-03-27 02:42:15');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(10) UNSIGNED NOT NULL,
  `roll_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `servicing` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `old_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `roll_id`, `name`, `email`, `password`, `company`, `type`, `contact`, `fee`, `servicing`, `old_fee`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mr:Doctor', 'doctor@gmail.com', 'd8510ca6999aa29e68c9331797bc8a9a', NULL, 'doctor\r\n', NULL, '600', '20', '400', NULL, NULL),
(2, 2, 'Assistant', 'as@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-27 22:48:25', '2019-03-27 22:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `extras`
--

CREATE TABLE `extras` (
  `id` int(10) UNSIGNED NOT NULL,
  `fb_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twiter_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_plus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `extras`
--

INSERT INTO `extras` (`id`, `fb_link`, `twiter_link`, `google_plus`, `email`, `mobile`, `contact`, `created_at`, `updated_at`) VALUES
(1, 'https://www.facebook.com', 'https://www.twiter.com', 'https://www.googleplus.com', 'info@sattit.com', '+88 01850054500', '524 manik Mia Road, Talimari, Rajshahi', '2019-03-31 04:06:02', '2019-03-31 04:11:39');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medi_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genaric_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `category_id`, `category_name`, `medi_name`, `genaric_name`, `created_at`, `updated_at`) VALUES
(1, '7', 'Python', 'H+', 'j', '2019-03-27 03:11:59', '2019-03-27 03:11:59');

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
(1, '2019_03_19_070226_create_doctors_table', 1),
(2, '2019_03_20_050304_create_scheduales_table', 1),
(3, '2019_03_20_091015_create_appointments_table', 1),
(4, '2019_03_20_182905_create_perday_patients_table', 1),
(5, '2019_03_22_181044_create_old_apoints_table', 1),
(6, '2019_03_23_072126_create_case_studies_table', 2),
(7, '2019_03_23_072507_create_case_medis_table', 2),
(8, '2019_03_23_072655_create_case_tests_table', 2),
(9, '2019_03_25_050304_create_patients_table', 3),
(10, '2019_03_27_051827_create_categories_table', 4),
(11, '2019_03_27_072056_create_medicines_table', 5),
(12, '2019_03_28_042747_create_roles_table', 6),
(13, '2019_03_30_110708_create_sliders_table', 7),
(14, '2019_03_30_170748_create_aboutuses_table', 8),
(15, '2019_03_31_045805_create_blogposts_table', 9),
(16, '2019_03_31_053055_create_tags_table', 10),
(17, '2019_03_31_054856_create_posttags_table', 11),
(18, '2019_03_31_093450_create_extras_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `old_apoints`
--

CREATE TABLE `old_apoints` (
  `id` int(10) UNSIGNED NOT NULL,
  `pa_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pat_f_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ap_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ap_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ap_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ap_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ap_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointed_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ap_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `problem` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(10) UNSIGNED NOT NULL,
  `doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pat_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `problem` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perday_patients`
--

CREATE TABLE `perday_patients` (
  `id` int(10) UNSIGNED NOT NULL,
  `doc_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strat_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cancel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perday_patients`
--

INSERT INTO `perday_patients` (`id`, `doc_id`, `place`, `address`, `strat_time`, `end_time`, `total`, `date`, `day`, `cancel`, `status`, `created_at`, `updated_at`) VALUES
(3, '1', 'রাজশাহী মেডিকেল কলেজ', 'রাজশাহী', '10:00', '21:00', '20', '2019-04-01', 'Mon', 'not', 'active', NULL, '2019-04-01 04:05:04'),
(4, '1', 'রাজশাহী মেডিকেল কলেজ', 'রাজশাহী', '09:00', '16:00', '10', '2019-04-07', 'Sun', 'not', 'active', NULL, NULL),
(5, '1', 'রাজশাহী মেডিকেল কলেজ', 'কোর্ট স্টেশন', '09:00', '17:00', '10', '2019-04-02', 'Tue', 'not', 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posttags`
--

CREATE TABLE `posttags` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posttags`
--

INSERT INTO `posttags` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(9, 1, 2, '2019-03-31 07:12:55', '2019-03-31 07:12:55'),
(10, 1, 1, '2019-03-31 07:12:55', '2019-03-31 07:12:55'),
(11, 2, 3, '2019-03-31 08:35:09', '2019-03-31 08:35:09'),
(12, 2, 1, '2019-03-31 08:35:09', '2019-03-31 08:35:09');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scheduales`
--

CREATE TABLE `scheduales` (
  `id` int(10) UNSIGNED NOT NULL,
  `doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `se_day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strat_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scheduales`
--

INSERT INTO `scheduales` (`id`, `doctor_id`, `se_day`, `strat_time`, `end_time`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'Sun', '09:00', '16:00', 'active', '2019-03-22 12:20:08', '2019-03-31 11:03:43'),
(2, '1', 'Mon', '10:00', '21:00', 'active', '2019-03-25 03:07:31', '2019-03-31 22:27:28'),
(3, '1', 'Tue', '09:00', '17:00', 'active', '2019-04-01 04:07:48', '2019-04-01 04:07:48');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `sub_title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'The Best Business Information', 'We\'re In The Business Of Helping You Start Your Business', 'backend/slider/RVMi1XvoIsUC3QlkW3Ae.jpg', 'yes', '2019-03-30 05:58:14', '2019-03-30 05:58:14'),
(2, 'MEDICLE    DOCTORSS Two', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi', 'backend/slider/Ix9HIlprBuKuvbyexiAN.jpg', 'yes', '2019-03-30 06:00:05', '2019-03-30 06:00:05'),
(3, 'MEDICLE  DOCTORSS THREE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis', 'backend/slider/RlU7udjipknSqJQUTiGW.jpg', 'yes', '2019-03-30 06:00:54', '2019-03-30 06:00:54');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Python', '2019-03-30 23:40:08', '2019-03-30 23:40:08'),
(2, 'kkk', '2019-03-30 23:44:58', '2019-03-30 23:44:58'),
(3, 'Genaral', '2019-03-31 02:34:12', '2019-03-31 02:34:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutuses`
--
ALTER TABLE `aboutuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogposts`
--
ALTER TABLE `blogposts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_medis`
--
ALTER TABLE `case_medis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_studies`
--
ALTER TABLE `case_studies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_tests`
--
ALTER TABLE `case_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extras`
--
ALTER TABLE `extras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `old_apoints`
--
ALTER TABLE `old_apoints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perday_patients`
--
ALTER TABLE `perday_patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posttags`
--
ALTER TABLE `posttags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scheduales`
--
ALTER TABLE `scheduales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutuses`
--
ALTER TABLE `aboutuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `blogposts`
--
ALTER TABLE `blogposts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `case_medis`
--
ALTER TABLE `case_medis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `case_studies`
--
ALTER TABLE `case_studies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `case_tests`
--
ALTER TABLE `case_tests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `extras`
--
ALTER TABLE `extras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `old_apoints`
--
ALTER TABLE `old_apoints`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `perday_patients`
--
ALTER TABLE `perday_patients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posttags`
--
ALTER TABLE `posttags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scheduales`
--
ALTER TABLE `scheduales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
