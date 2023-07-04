-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2023 at 03:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easy-manage`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_actionscheduler_actions`
--

CREATE TABLE `wp_actionscheduler_actions` (
  `action_id` bigint(20) UNSIGNED NOT NULL,
  `hook` varchar(191) NOT NULL,
  `status` varchar(20) NOT NULL,
  `scheduled_date_gmt` datetime DEFAULT '0000-00-00 00:00:00',
  `scheduled_date_local` datetime DEFAULT '0000-00-00 00:00:00',
  `args` varchar(191) DEFAULT NULL,
  `schedule` longtext DEFAULT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `attempts` int(11) NOT NULL DEFAULT 0,
  `last_attempt_gmt` datetime DEFAULT '0000-00-00 00:00:00',
  `last_attempt_local` datetime DEFAULT '0000-00-00 00:00:00',
  `claim_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `extended_args` varchar(8000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_actionscheduler_actions`
--

INSERT INTO `wp_actionscheduler_actions` (`action_id`, `hook`, `status`, `scheduled_date_gmt`, `scheduled_date_local`, `args`, `schedule`, `group_id`, `attempts`, `last_attempt_gmt`, `last_attempt_local`, `claim_id`, `extended_args`) VALUES
(261, 'action_scheduler/migration_hook', 'complete', '2023-06-19 14:10:46', '2023-06-19 14:10:46', '[]', 'O:30:\"ActionScheduler_SimpleSchedule\":2:{s:22:\"\0*\0scheduled_timestamp\";i:1687183846;s:41:\"\0ActionScheduler_SimpleSchedule\0timestamp\";i:1687183846;}', 1, 1, '2023-06-19 14:11:02', '2023-06-19 14:11:02', 0, NULL),
(262, 'wp_mail_smtp_summary_report_email', 'complete', '2023-06-26 14:00:00', '2023-06-26 14:00:00', '[null]', 'O:32:\"ActionScheduler_IntervalSchedule\":5:{s:22:\"\0*\0scheduled_timestamp\";i:1687788000;s:18:\"\0*\0first_timestamp\";i:1687788000;s:13:\"\0*\0recurrence\";i:604800;s:49:\"\0ActionScheduler_IntervalSchedule\0start_timestamp\";i:1687788000;s:53:\"\0ActionScheduler_IntervalSchedule\0interval_in_seconds\";i:604800;}', 2, 1, '2023-06-26 14:00:53', '2023-06-26 14:00:53', 0, NULL),
(263, 'wp_mail_smtp_admin_notifications_update', 'complete', '2023-06-19 14:11:07', '2023-06-19 14:11:07', '[1]', 'O:28:\"ActionScheduler_NullSchedule\":0:{}', 2, 1, '2023-06-19 14:12:07', '2023-06-19 14:12:07', 0, NULL),
(264, 'action_scheduler/migration_hook', 'complete', '2023-06-20 14:06:44', '2023-06-20 14:06:44', '[]', 'O:30:\"ActionScheduler_SimpleSchedule\":2:{s:22:\"\0*\0scheduled_timestamp\";i:1687270004;s:41:\"\0ActionScheduler_SimpleSchedule\0timestamp\";i:1687270004;}', 1, 1, '2023-06-20 14:06:52', '2023-06-20 14:06:52', 0, NULL),
(265, 'action_scheduler/migration_hook', 'complete', '2023-06-26 07:38:16', '2023-06-26 07:38:16', '[]', 'O:30:\"ActionScheduler_SimpleSchedule\":2:{s:22:\"\0*\0scheduled_timestamp\";i:1687765096;s:41:\"\0ActionScheduler_SimpleSchedule\0timestamp\";i:1687765096;}', 1, 1, '2023-06-26 07:38:21', '2023-06-26 07:38:21', 0, NULL),
(266, 'wp_mail_smtp_summary_report_email', 'complete', '2023-07-03 14:00:53', '2023-07-03 14:00:53', '[null]', 'O:32:\"ActionScheduler_IntervalSchedule\":5:{s:22:\"\0*\0scheduled_timestamp\";i:1688392853;s:18:\"\0*\0first_timestamp\";i:1687788000;s:13:\"\0*\0recurrence\";i:604800;s:49:\"\0ActionScheduler_IntervalSchedule\0start_timestamp\";i:1688392853;s:53:\"\0ActionScheduler_IntervalSchedule\0interval_in_seconds\";i:604800;}', 2, 1, '2023-07-04 12:42:57', '2023-07-04 12:42:57', 0, NULL),
(267, 'wp_mail_smtp_summary_report_email', 'pending', '2023-07-11 12:42:57', '2023-07-11 12:42:57', '[null]', 'O:32:\"ActionScheduler_IntervalSchedule\":5:{s:22:\"\0*\0scheduled_timestamp\";i:1689079377;s:18:\"\0*\0first_timestamp\";i:1687788000;s:13:\"\0*\0recurrence\";i:604800;s:49:\"\0ActionScheduler_IntervalSchedule\0start_timestamp\";i:1689079377;s:53:\"\0ActionScheduler_IntervalSchedule\0interval_in_seconds\";i:604800;}', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wp_actionscheduler_claims`
--

CREATE TABLE `wp_actionscheduler_claims` (
  `claim_id` bigint(20) UNSIGNED NOT NULL,
  `date_created_gmt` datetime DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_actionscheduler_groups`
--

CREATE TABLE `wp_actionscheduler_groups` (
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_actionscheduler_groups`
--

INSERT INTO `wp_actionscheduler_groups` (`group_id`, `slug`) VALUES
(1, 'action-scheduler-migration'),
(2, 'wp_mail_smtp');

-- --------------------------------------------------------

--
-- Table structure for table `wp_actionscheduler_logs`
--

CREATE TABLE `wp_actionscheduler_logs` (
  `log_id` bigint(20) UNSIGNED NOT NULL,
  `action_id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `log_date_gmt` datetime DEFAULT '0000-00-00 00:00:00',
  `log_date_local` datetime DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_actionscheduler_logs`
--

INSERT INTO `wp_actionscheduler_logs` (`log_id`, `action_id`, `message`, `log_date_gmt`, `log_date_local`) VALUES
(1, 261, 'action created', '2023-06-19 14:09:47', '2023-06-19 14:09:47'),
(2, 261, 'action started via WP Cron', '2023-06-19 14:11:01', '2023-06-19 14:11:01'),
(3, 261, 'action complete via WP Cron', '2023-06-19 14:11:02', '2023-06-19 14:11:02'),
(4, 262, 'action created', '2023-06-19 14:11:05', '2023-06-19 14:11:05'),
(5, 263, 'action created', '2023-06-19 14:11:07', '2023-06-19 14:11:07'),
(6, 263, 'action started via WP Cron', '2023-06-19 14:12:07', '2023-06-19 14:12:07'),
(7, 263, 'action complete via WP Cron', '2023-06-19 14:12:07', '2023-06-19 14:12:07'),
(8, 264, 'action created', '2023-06-20 14:05:44', '2023-06-20 14:05:44'),
(9, 264, 'action started via WP Cron', '2023-06-20 14:06:52', '2023-06-20 14:06:52'),
(10, 264, 'action complete via WP Cron', '2023-06-20 14:06:52', '2023-06-20 14:06:52'),
(11, 265, 'action created', '2023-06-26 07:37:16', '2023-06-26 07:37:16'),
(12, 265, 'action started via Async Request', '2023-06-26 07:38:21', '2023-06-26 07:38:21'),
(13, 265, 'action complete via Async Request', '2023-06-26 07:38:21', '2023-06-26 07:38:21'),
(14, 262, 'action started via WP Cron', '2023-06-26 14:00:49', '2023-06-26 14:00:49'),
(15, 262, 'action complete via WP Cron', '2023-06-26 14:00:53', '2023-06-26 14:00:53'),
(16, 266, 'action created', '2023-06-26 14:00:53', '2023-06-26 14:00:53'),
(17, 266, 'action started via WP Cron', '2023-07-04 12:42:47', '2023-07-04 12:42:47'),
(18, 266, 'action complete via WP Cron', '2023-07-04 12:42:57', '2023-07-04 12:42:57'),
(19, 267, 'action created', '2023-07-04 12:42:57', '2023-07-04 12:42:57');

-- --------------------------------------------------------

--
-- Table structure for table `wp_cohorts`
--

CREATE TABLE `wp_cohorts` (
  `cohort_id` int(20) NOT NULL,
  `cohort` text NOT NULL,
  `cohort_info` text NOT NULL,
  `trainer` text NOT NULL,
  `starting_date` date NOT NULL,
  `ending_date` date NOT NULL,
  `cohort_status` int(11) NOT NULL DEFAULT 0,
  `cohort_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wp_cohorts`
--

INSERT INTO `wp_cohorts` (`cohort_id`, `cohort`, `cohort_info`, `trainer`, `starting_date`, `ending_date`, `cohort_status`, `cohort_deleted`) VALUES
(1, 'WordPress', 'Advance WordPress', 'Jonathan', '2023-06-29', '2023-07-06', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_commentmeta`
--

CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_comments`
--

CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) UNSIGNED NOT NULL,
  `comment_post_ID` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `comment_author` tinytext NOT NULL,
  `comment_author_email` varchar(100) NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT 0,
  `comment_approved` varchar(20) NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) NOT NULL DEFAULT '',
  `comment_type` varchar(20) NOT NULL DEFAULT 'comment',
  `comment_parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_comments`
--

INSERT INTO `wp_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'A WordPress Commenter', 'wapuu@wordpress.example', 'https://wordpress.org/', '', '2023-06-07 11:05:19', '2023-06-07 11:05:19', 'Hi, this is a comment.\nTo get started with moderating, editing, and deleting comments, please visit the Comments screen in the dashboard.\nCommenter avatars come from <a href=\"https://en.gravatar.com/\">Gravatar</a>.', 0, '1', '', 'comment', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_group_projects`
--

CREATE TABLE `wp_group_projects` (
  `group_id` int(20) NOT NULL,
  `assigned_members` text NOT NULL,
  `project_name` text NOT NULL,
  `project_task` text NOT NULL,
  `due_date` date NOT NULL,
  `group_status` int(11) NOT NULL DEFAULT 0,
  `group_activate` int(11) NOT NULL DEFAULT 0,
  `group_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wp_group_projects`
--

INSERT INTO `wp_group_projects` (`group_id`, `assigned_members`, `project_name`, `project_task`, `due_date`, `group_status`, `group_activate`, `group_deleted`) VALUES
(1, 'Brian, Joy, Kim', 'REST API', 'Get the IPv4 and IPv6 of laptops', '2023-06-30', 1, 0, 0),
(2, 'Brian, Kores, Kim', 'REST API', 'Get the IPv4 and IPv6 of laptops', '2023-06-30', 1, 0, 0),
(4, 'Joy, Kores', 'REST API', 'Get the IPv4 and IPv6 of laptops', '2023-08-30', 0, 0, 0),
(5, 'Joy, Kores', 'ShopIT', 'full stack', '2023-07-07', 0, 0, 0),
(6, 'Brian, Kim', 'PMS', 'full stack', '2023-07-08', 1, 0, 0),
(7, 'mercy, milly', 'PMS', 'e-commerce site using custom WP', '2023-07-05', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_individual_projects`
--

CREATE TABLE `wp_individual_projects` (
  `project_id` int(20) NOT NULL,
  `project_name` text NOT NULL,
  `project_task` text NOT NULL,
  `assignee` text NOT NULL,
  `due_date` date NOT NULL,
  `project_status` int(11) NOT NULL DEFAULT 0,
  `project_activate` int(11) NOT NULL DEFAULT 0,
  `project_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wp_individual_projects`
--

INSERT INTO `wp_individual_projects` (`project_id`, `project_name`, `project_task`, `assignee`, `due_date`, `project_status`, `project_activate`, `project_deleted`) VALUES
(4, 'Security WordPress', 'Network configurations', 'Brian', '2023-06-30', 1, 0, 0),
(5, 'Easy Manage', 'A project management system using custom WordPress', 'Brian', '2023-07-07', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_links`
--

CREATE TABLE `wp_links` (
  `link_id` bigint(20) UNSIGNED NOT NULL,
  `link_url` varchar(255) NOT NULL DEFAULT '',
  `link_name` varchar(255) NOT NULL DEFAULT '',
  `link_image` varchar(255) NOT NULL DEFAULT '',
  `link_target` varchar(25) NOT NULL DEFAULT '',
  `link_description` varchar(255) NOT NULL DEFAULT '',
  `link_visible` varchar(20) NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `link_rating` int(11) NOT NULL DEFAULT 0,
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) NOT NULL DEFAULT '',
  `link_notes` mediumtext NOT NULL,
  `link_rss` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_options`
--

CREATE TABLE `wp_options` (
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` varchar(20) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'http://localhost/easy-manage', 'yes'),
(2, 'home', 'http://localhost/easy-manage', 'yes'),
(3, 'blogname', 'easy-manage', 'yes'),
(4, 'blogdescription', '', 'yes'),
(5, 'users_can_register', '0', 'yes'),
(6, 'admin_email', 'wakemanja007@gmail.com', 'yes'),
(7, 'start_of_week', '1', 'yes'),
(8, 'use_balanceTags', '0', 'yes'),
(9, 'use_smilies', '1', 'yes'),
(10, 'require_name_email', '1', 'yes'),
(11, 'comments_notify', '1', 'yes'),
(12, 'posts_per_rss', '10', 'yes'),
(13, 'rss_use_excerpt', '0', 'yes'),
(14, 'mailserver_url', 'mail.example.com', 'yes'),
(15, 'mailserver_login', 'login@example.com', 'yes'),
(16, 'mailserver_pass', 'password', 'yes'),
(17, 'mailserver_port', '110', 'yes'),
(18, 'default_category', '1', 'yes'),
(19, 'default_comment_status', 'open', 'yes'),
(20, 'default_ping_status', 'open', 'yes'),
(21, 'default_pingback_flag', '0', 'yes'),
(22, 'posts_per_page', '10', 'yes'),
(23, 'date_format', 'F j, Y', 'yes'),
(24, 'time_format', 'g:i a', 'yes'),
(25, 'links_updated_date_format', 'F j, Y g:i a', 'yes'),
(26, 'comment_moderation', '0', 'yes'),
(27, 'moderation_notify', '1', 'yes'),
(28, 'permalink_structure', '/%postname%/', 'yes'),
(29, 'rewrite_rules', 'a:115:{s:11:\"^wp-json/?$\";s:22:\"index.php?rest_route=/\";s:14:\"^wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:21:\"^index.php/wp-json/?$\";s:22:\"index.php?rest_route=/\";s:24:\"^index.php/wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:17:\"^wp-sitemap\\.xml$\";s:23:\"index.php?sitemap=index\";s:17:\"^wp-sitemap\\.xsl$\";s:36:\"index.php?sitemap-stylesheet=sitemap\";s:23:\"^wp-sitemap-index\\.xsl$\";s:34:\"index.php?sitemap-stylesheet=index\";s:48:\"^wp-sitemap-([a-z]+?)-([a-z\\d_-]+?)-(\\d+?)\\.xml$\";s:75:\"index.php?sitemap=$matches[1]&sitemap-subtype=$matches[2]&paged=$matches[3]\";s:34:\"^wp-sitemap-([a-z]+?)-(\\d+?)\\.xml$\";s:47:\"index.php?sitemap=$matches[1]&paged=$matches[2]\";s:11:\"projects/?$\";s:27:\"index.php?post_type=project\";s:41:\"projects/feed/(feed|rdf|rss|rss2|atom)/?$\";s:44:\"index.php?post_type=project&feed=$matches[1]\";s:36:\"projects/(feed|rdf|rss|rss2|atom)/?$\";s:44:\"index.php?post_type=project&feed=$matches[1]\";s:28:\"projects/page/([0-9]{1,})/?$\";s:45:\"index.php?post_type=project&paged=$matches[1]\";s:47:\"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:42:\"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:23:\"category/(.+?)/embed/?$\";s:46:\"index.php?category_name=$matches[1]&embed=true\";s:35:\"category/(.+?)/page/?([0-9]{1,})/?$\";s:53:\"index.php?category_name=$matches[1]&paged=$matches[2]\";s:17:\"category/(.+?)/?$\";s:35:\"index.php?category_name=$matches[1]\";s:44:\"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:39:\"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:20:\"tag/([^/]+)/embed/?$\";s:36:\"index.php?tag=$matches[1]&embed=true\";s:32:\"tag/([^/]+)/page/?([0-9]{1,})/?$\";s:43:\"index.php?tag=$matches[1]&paged=$matches[2]\";s:14:\"tag/([^/]+)/?$\";s:25:\"index.php?tag=$matches[1]\";s:45:\"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:40:\"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:21:\"type/([^/]+)/embed/?$\";s:44:\"index.php?post_format=$matches[1]&embed=true\";s:33:\"type/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?post_format=$matches[1]&paged=$matches[2]\";s:15:\"type/([^/]+)/?$\";s:33:\"index.php?post_format=$matches[1]\";s:36:\"projects/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:46:\"projects/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:66:\"projects/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:61:\"projects/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:61:\"projects/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:42:\"projects/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:25:\"projects/([^/]+)/embed/?$\";s:40:\"index.php?project=$matches[1]&embed=true\";s:29:\"projects/([^/]+)/trackback/?$\";s:34:\"index.php?project=$matches[1]&tb=1\";s:49:\"projects/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:46:\"index.php?project=$matches[1]&feed=$matches[2]\";s:44:\"projects/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:46:\"index.php?project=$matches[1]&feed=$matches[2]\";s:37:\"projects/([^/]+)/page/?([0-9]{1,})/?$\";s:47:\"index.php?project=$matches[1]&paged=$matches[2]\";s:44:\"projects/([^/]+)/comment-page-([0-9]{1,})/?$\";s:47:\"index.php?project=$matches[1]&cpage=$matches[2]\";s:33:\"projects/([^/]+)(?:/([0-9]+))?/?$\";s:46:\"index.php?project=$matches[1]&page=$matches[2]\";s:25:\"projects/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:35:\"projects/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:55:\"projects/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:50:\"projects/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:50:\"projects/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:31:\"projects/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:48:\".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$\";s:18:\"index.php?feed=old\";s:20:\".*wp-app\\.php(/.*)?$\";s:19:\"index.php?error=403\";s:18:\".*wp-register.php$\";s:23:\"index.php?register=true\";s:32:\"feed/(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:27:\"(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:8:\"embed/?$\";s:21:\"index.php?&embed=true\";s:20:\"page/?([0-9]{1,})/?$\";s:28:\"index.php?&paged=$matches[1]\";s:27:\"comment-page-([0-9]{1,})/?$\";s:39:\"index.php?&page_id=13&cpage=$matches[1]\";s:41:\"comments/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:36:\"comments/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:17:\"comments/embed/?$\";s:21:\"index.php?&embed=true\";s:44:\"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:39:\"search/(.+)/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:20:\"search/(.+)/embed/?$\";s:34:\"index.php?s=$matches[1]&embed=true\";s:32:\"search/(.+)/page/?([0-9]{1,})/?$\";s:41:\"index.php?s=$matches[1]&paged=$matches[2]\";s:14:\"search/(.+)/?$\";s:23:\"index.php?s=$matches[1]\";s:47:\"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:42:\"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:23:\"author/([^/]+)/embed/?$\";s:44:\"index.php?author_name=$matches[1]&embed=true\";s:35:\"author/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?author_name=$matches[1]&paged=$matches[2]\";s:17:\"author/([^/]+)/?$\";s:33:\"index.php?author_name=$matches[1]\";s:69:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:45:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$\";s:74:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]\";s:39:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$\";s:63:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]\";s:56:\"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:51:\"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:32:\"([0-9]{4})/([0-9]{1,2})/embed/?$\";s:58:\"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true\";s:44:\"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]\";s:26:\"([0-9]{4})/([0-9]{1,2})/?$\";s:47:\"index.php?year=$matches[1]&monthnum=$matches[2]\";s:43:\"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:38:\"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:19:\"([0-9]{4})/embed/?$\";s:37:\"index.php?year=$matches[1]&embed=true\";s:31:\"([0-9]{4})/page/?([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&paged=$matches[2]\";s:13:\"([0-9]{4})/?$\";s:26:\"index.php?year=$matches[1]\";s:27:\".?.+?/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\".?.+?/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\".?.+?/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:16:\"(.?.+?)/embed/?$\";s:41:\"index.php?pagename=$matches[1]&embed=true\";s:20:\"(.?.+?)/trackback/?$\";s:35:\"index.php?pagename=$matches[1]&tb=1\";s:40:\"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:35:\"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:28:\"(.?.+?)/page/?([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&paged=$matches[2]\";s:35:\"(.?.+?)/comment-page-([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&cpage=$matches[2]\";s:24:\"(.?.+?)(?:/([0-9]+))?/?$\";s:47:\"index.php?pagename=$matches[1]&page=$matches[2]\";s:27:\"[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\"[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\"[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\"[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\"[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\"[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:16:\"([^/]+)/embed/?$\";s:37:\"index.php?name=$matches[1]&embed=true\";s:20:\"([^/]+)/trackback/?$\";s:31:\"index.php?name=$matches[1]&tb=1\";s:40:\"([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?name=$matches[1]&feed=$matches[2]\";s:35:\"([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?name=$matches[1]&feed=$matches[2]\";s:28:\"([^/]+)/page/?([0-9]{1,})/?$\";s:44:\"index.php?name=$matches[1]&paged=$matches[2]\";s:35:\"([^/]+)/comment-page-([0-9]{1,})/?$\";s:44:\"index.php?name=$matches[1]&cpage=$matches[2]\";s:24:\"([^/]+)(?:/([0-9]+))?/?$\";s:43:\"index.php?name=$matches[1]&page=$matches[2]\";s:16:\"[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:26:\"[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:46:\"[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:41:\"[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:41:\"[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:22:\"[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";}', 'yes'),
(30, 'hack_file', '0', 'yes'),
(31, 'blog_charset', 'UTF-8', 'yes'),
(32, 'moderation_keys', '', 'no'),
(33, 'active_plugins', 'a:5:{i:0;s:27:\"easy-manage/easy-manage.php\";i:1;s:9:\"hello.php\";i:2;s:47:\"jwt-authentication-for-wp-rest-api/jwt-auth.php\";i:3;s:29:\"wp-mail-smtp/wp_mail_smtp.php\";i:4;s:33:\"wps-hide-login/wps-hide-login.php\";}', 'yes'),
(34, 'category_base', '', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(36, 'comment_max_links', '2', 'yes'),
(37, 'gmt_offset', '0', 'yes'),
(38, 'default_email_category', '1', 'yes'),
(39, 'recently_edited', '', 'no'),
(40, 'template', 'easy-manage', 'yes'),
(41, 'stylesheet', 'easy-manage', 'yes'),
(42, 'comment_registration', '0', 'yes'),
(43, 'html_type', 'text/html', 'yes'),
(44, 'use_trackback', '0', 'yes'),
(45, 'default_role', 'subscriber', 'yes'),
(46, 'db_version', '53496', 'yes'),
(47, 'uploads_use_yearmonth_folders', '1', 'yes'),
(48, 'upload_path', '', 'yes'),
(49, 'blog_public', '0', 'yes'),
(50, 'default_link_category', '2', 'yes'),
(51, 'show_on_front', 'page', 'yes'),
(52, 'tag_base', '', 'yes'),
(53, 'show_avatars', '1', 'yes'),
(54, 'avatar_rating', 'G', 'yes'),
(55, 'upload_url_path', '', 'yes'),
(56, 'thumbnail_size_w', '150', 'yes'),
(57, 'thumbnail_size_h', '150', 'yes'),
(58, 'thumbnail_crop', '1', 'yes'),
(59, 'medium_size_w', '300', 'yes'),
(60, 'medium_size_h', '300', 'yes'),
(61, 'avatar_default', 'mystery', 'yes'),
(62, 'large_size_w', '1024', 'yes'),
(63, 'large_size_h', '1024', 'yes'),
(64, 'image_default_link_type', 'none', 'yes'),
(65, 'image_default_size', '', 'yes'),
(66, 'image_default_align', '', 'yes'),
(67, 'close_comments_for_old_posts', '0', 'yes'),
(68, 'close_comments_days_old', '14', 'yes'),
(69, 'thread_comments', '1', 'yes'),
(70, 'thread_comments_depth', '5', 'yes'),
(71, 'page_comments', '0', 'yes'),
(72, 'comments_per_page', '50', 'yes'),
(73, 'default_comments_page', 'newest', 'yes'),
(74, 'comment_order', 'asc', 'yes'),
(75, 'sticky_posts', 'a:0:{}', 'yes'),
(76, 'widget_categories', 'a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}', 'yes'),
(77, 'widget_text', 'a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}', 'yes'),
(78, 'widget_rss', 'a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}', 'yes'),
(79, 'uninstall_plugins', 'a:0:{}', 'no'),
(80, 'timezone_string', '', 'yes'),
(81, 'page_for_posts', '0', 'yes'),
(82, 'page_on_front', '13', 'yes'),
(83, 'default_post_format', '0', 'yes'),
(84, 'link_manager_enabled', '0', 'yes'),
(85, 'finished_splitting_shared_terms', '1', 'yes'),
(86, 'site_icon', '0', 'yes'),
(87, 'medium_large_size_w', '768', 'yes'),
(88, 'medium_large_size_h', '0', 'yes'),
(89, 'wp_page_for_privacy_policy', '3', 'yes'),
(90, 'show_comments_cookies_opt_in', '1', 'yes'),
(91, 'admin_email_lifespan', '1701687918', 'yes'),
(92, 'disallowed_keys', '', 'no'),
(93, 'comment_previously_approved', '1', 'yes'),
(94, 'auto_plugin_theme_update_emails', 'a:0:{}', 'no'),
(95, 'auto_update_core_dev', 'enabled', 'yes'),
(96, 'auto_update_core_minor', 'enabled', 'yes'),
(97, 'auto_update_core_major', 'enabled', 'yes'),
(98, 'wp_force_deactivated_plugins', 'a:0:{}', 'yes'),
(99, 'initial_db_version', '53496', 'yes'),
(100, 'wp_user_roles', 'a:9:{s:13:\"administrator\";a:2:{s:4:\"name\";s:13:\"Administrator\";s:12:\"capabilities\";a:61:{s:13:\"switch_themes\";b:1;s:11:\"edit_themes\";b:1;s:16:\"activate_plugins\";b:1;s:12:\"edit_plugins\";b:1;s:10:\"edit_users\";b:1;s:10:\"edit_files\";b:1;s:14:\"manage_options\";b:1;s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:6:\"import\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:8:\"level_10\";b:1;s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:12:\"delete_users\";b:1;s:12:\"create_users\";b:1;s:17:\"unfiltered_upload\";b:1;s:14:\"edit_dashboard\";b:1;s:14:\"update_plugins\";b:1;s:14:\"delete_plugins\";b:1;s:15:\"install_plugins\";b:1;s:13:\"update_themes\";b:1;s:14:\"install_themes\";b:1;s:11:\"update_core\";b:1;s:10:\"list_users\";b:1;s:12:\"remove_users\";b:1;s:13:\"promote_users\";b:1;s:18:\"edit_theme_options\";b:1;s:13:\"delete_themes\";b:1;s:6:\"export\";b:1;}}s:6:\"editor\";a:2:{s:4:\"name\";s:6:\"Editor\";s:12:\"capabilities\";a:34:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;}}s:6:\"author\";a:2:{s:4:\"name\";s:6:\"Author\";s:12:\"capabilities\";a:10:{s:12:\"upload_files\";b:1;s:10:\"edit_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;s:22:\"delete_published_posts\";b:1;}}s:11:\"contributor\";a:2:{s:4:\"name\";s:11:\"Contributor\";s:12:\"capabilities\";a:5:{s:10:\"edit_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;}}s:10:\"subscriber\";a:2:{s:4:\"name\";s:10:\"Subscriber\";s:12:\"capabilities\";a:2:{s:4:\"read\";b:1;s:7:\"level_0\";b:1;}}s:5:\"admin\";a:2:{s:4:\"name\";s:5:\"Admin\";s:12:\"capabilities\";a:5:{s:29:\"admin_create_program_managers\";b:1;s:22:\"admin_deactivate_users\";b:1;s:18:\"admin_search_users\";b:1;s:21:\"admin_create_projects\";b:1;s:30:\"admin_allocate_training_stacks\";b:1;}}s:15:\"program_manager\";a:2:{s:4:\"name\";s:15:\"Program Manager\";s:12:\"capabilities\";a:4:{s:31:\"program_manager_create_trainers\";b:1;s:28:\"program_manager_search_users\";b:1;s:31:\"program_manager_create_projects\";b:1;s:40:\"program_manager_allocate_training_stacks\";b:1;}}s:7:\"trainer\";a:2:{s:4:\"name\";s:7:\"Trainer\";s:12:\"capabilities\";a:5:{s:23:\"trainer_create_trainees\";b:1;s:28:\"trainer_soft_delete_trainees\";b:1;s:20:\"trainer_search_users\";b:1;s:23:\"trainer_create_projects\";b:1;s:32:\"trainer_allocate_training_stacks\";b:1;}}s:7:\"trainee\";a:2:{s:4:\"name\";s:7:\"Trainee\";s:12:\"capabilities\";a:1:{s:30:\"trainee_view_assigned_projects\";b:1;}}}', 'yes'),
(101, 'fresh_site', '0', 'yes'),
(102, 'user_count', '12', 'no'),
(103, 'widget_block', 'a:6:{i:2;a:1:{s:7:\"content\";s:19:\"<!-- wp:search /-->\";}i:3;a:1:{s:7:\"content\";s:154:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Recent Posts</h2><!-- /wp:heading --><!-- wp:latest-posts /--></div><!-- /wp:group -->\";}i:4;a:1:{s:7:\"content\";s:227:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Recent Comments</h2><!-- /wp:heading --><!-- wp:latest-comments {\"displayAvatar\":false,\"displayDate\":false,\"displayExcerpt\":false} /--></div><!-- /wp:group -->\";}i:5;a:1:{s:7:\"content\";s:146:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Archives</h2><!-- /wp:heading --><!-- wp:archives /--></div><!-- /wp:group -->\";}i:6;a:1:{s:7:\"content\";s:150:\"<!-- wp:group --><div class=\"wp-block-group\"><!-- wp:heading --><h2>Categories</h2><!-- /wp:heading --><!-- wp:categories /--></div><!-- /wp:group -->\";}s:12:\"_multiwidget\";i:1;}', 'yes'),
(104, 'sidebars_widgets', 'a:2:{s:19:\"wp_inactive_widgets\";a:5:{i:0;s:7:\"block-2\";i:1;s:7:\"block-3\";i:2;s:7:\"block-4\";i:3;s:7:\"block-5\";i:4;s:7:\"block-6\";}s:13:\"array_version\";i:3;}', 'yes'),
(105, 'cron', 'a:9:{i:1688475465;a:1:{s:26:\"action_scheduler_run_queue\";a:1:{s:32:\"0d04ed39571b55704c122d726248bbac\";a:3:{s:8:\"schedule\";s:12:\"every_minute\";s:4:\"args\";a:1:{i:0;s:7:\"WP Cron\";}s:8:\"interval\";i:60;}}}i:1688475920;a:1:{s:34:\"wp_privacy_delete_old_export_files\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"hourly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:3600;}}}i:1688511920;a:4:{s:18:\"wp_https_detection\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1688511932;a:1:{s:21:\"wp_update_user_counts\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1688555120;a:1:{s:32:\"recovery_mode_clean_expired_keys\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1688555132;a:2:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}s:25:\"delete_expired_transients\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1688555134;a:1:{s:30:\"wp_scheduled_auto_draft_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1688641520;a:1:{s:30:\"wp_site_health_scheduled_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"weekly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:604800;}}}s:7:\"version\";i:2;}', 'yes'),
(106, 'widget_pages', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(107, 'widget_calendar', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(108, 'widget_archives', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(109, 'widget_media_audio', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(110, 'widget_media_image', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(111, 'widget_media_gallery', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(112, 'widget_media_video', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(113, 'widget_meta', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(114, 'widget_search', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(115, 'widget_recent-posts', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(116, 'widget_recent-comments', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(117, 'widget_tag_cloud', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(118, 'widget_nav_menu', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(119, 'widget_custom_html', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(121, 'recovery_keys', 'a:0:{}', 'yes'),
(122, 'theme_mods_twentytwentythree', 'a:2:{s:18:\"custom_css_post_id\";i:-1;s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1686140000;s:4:\"data\";a:3:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:3:{i:0;s:7:\"block-2\";i:1;s:7:\"block-3\";i:2;s:7:\"block-4\";}s:9:\"sidebar-2\";a:2:{i:0;s:7:\"block-5\";i:1;s:7:\"block-6\";}}}}', 'yes'),
(123, 'https_detection_errors', 'a:2:{s:23:\"ssl_verification_failed\";a:1:{i:0;s:24:\"SSL verification failed.\";}s:19:\"bad_response_source\";a:1:{i:0;s:55:\"It looks like the response did not come from this site.\";}}', 'yes'),
(129, '_site_transient_update_themes', 'O:8:\"stdClass\":5:{s:12:\"last_checked\";i:1688474582;s:7:\"checked\";a:4:{s:11:\"easy-manage\";s:5:\"1.0.0\";s:15:\"twentytwentyone\";s:3:\"1.8\";s:17:\"twentytwentythree\";s:3:\"1.1\";s:15:\"twentytwentytwo\";s:3:\"1.4\";}s:8:\"response\";a:0:{}s:9:\"no_update\";a:3:{s:15:\"twentytwentyone\";a:6:{s:5:\"theme\";s:15:\"twentytwentyone\";s:11:\"new_version\";s:3:\"1.8\";s:3:\"url\";s:45:\"https://wordpress.org/themes/twentytwentyone/\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/theme/twentytwentyone.1.8.zip\";s:8:\"requires\";s:3:\"5.3\";s:12:\"requires_php\";s:3:\"5.6\";}s:17:\"twentytwentythree\";a:6:{s:5:\"theme\";s:17:\"twentytwentythree\";s:11:\"new_version\";s:3:\"1.1\";s:3:\"url\";s:47:\"https://wordpress.org/themes/twentytwentythree/\";s:7:\"package\";s:63:\"https://downloads.wordpress.org/theme/twentytwentythree.1.1.zip\";s:8:\"requires\";s:3:\"6.1\";s:12:\"requires_php\";s:3:\"5.6\";}s:15:\"twentytwentytwo\";a:6:{s:5:\"theme\";s:15:\"twentytwentytwo\";s:11:\"new_version\";s:3:\"1.4\";s:3:\"url\";s:45:\"https://wordpress.org/themes/twentytwentytwo/\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/theme/twentytwentytwo.1.4.zip\";s:8:\"requires\";s:3:\"5.9\";s:12:\"requires_php\";s:3:\"5.6\";}}s:12:\"translations\";a:0:{}}', 'no'),
(141, '_site_transient_update_core', 'O:8:\"stdClass\":4:{s:7:\"updates\";a:1:{i:0;O:8:\"stdClass\":10:{s:8:\"response\";s:6:\"latest\";s:8:\"download\";s:59:\"https://downloads.wordpress.org/release/wordpress-6.2.2.zip\";s:6:\"locale\";s:5:\"en_US\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:59:\"https://downloads.wordpress.org/release/wordpress-6.2.2.zip\";s:10:\"no_content\";s:70:\"https://downloads.wordpress.org/release/wordpress-6.2.2-no-content.zip\";s:11:\"new_bundled\";s:71:\"https://downloads.wordpress.org/release/wordpress-6.2.2-new-bundled.zip\";s:7:\"partial\";s:0:\"\";s:8:\"rollback\";s:0:\"\";}s:7:\"current\";s:5:\"6.2.2\";s:7:\"version\";s:5:\"6.2.2\";s:11:\"php_version\";s:6:\"5.6.20\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"6.1\";s:15:\"partial_version\";s:0:\"\";}}s:12:\"last_checked\";i:1688474579;s:15:\"version_checked\";s:5:\"6.2.2\";s:12:\"translations\";a:0:{}}', 'no'),
(148, 'auto_core_update_notified', 'a:4:{s:4:\"type\";s:7:\"success\";s:5:\"email\";s:22:\"wakemanja007@gmail.com\";s:7:\"version\";s:5:\"6.2.2\";s:9:\"timestamp\";i:1686135941;}', 'no'),
(151, 'finished_updating_comment_type', '1', 'yes'),
(153, 'can_compress_scripts', '1', 'no'),
(156, 'current_theme', 'Easy-Manage', 'yes'),
(157, 'theme_mods_easy-manage', 'a:3:{i:0;b:0;s:18:\"nav_menu_locations\";a:1:{s:7:\"primary\";i:4;}s:18:\"custom_css_post_id\";i:196;}', 'yes'),
(158, 'theme_switched', '', 'yes'),
(163, 'nav_menu_options', 'a:2:{i:0;b:0;s:8:\"auto_add\";a:0:{}}', 'yes'),
(184, 'recently_activated', 'a:0:{}', 'yes'),
(216, '_transient_health-check-site-status-result', '{\"good\":13,\"recommended\":6,\"critical\":1}', 'yes'),
(437, 'WPLANG', '', 'yes'),
(438, 'new_admin_email', 'wakemanja007@gmail.com', 'yes'),
(439, 'whl_page', 'waks', 'yes'),
(440, 'whl_redirect_admin', '404', 'yes'),
(512, 'recovery_mode_email_last_sent', '1687976912', 'yes'),
(633, 'action_scheduler_hybrid_store_demarkation', '260', 'yes'),
(634, 'schema-ActionScheduler_StoreSchema', '6.0.1687183785', 'yes'),
(635, 'schema-ActionScheduler_LoggerSchema', '3.0.1687183785', 'yes'),
(636, 'wp_mail_smtp_initial_version', '3.8.0', 'no'),
(637, 'wp_mail_smtp_version', '3.8.0', 'no'),
(638, 'wp_mail_smtp', 'a:3:{s:4:\"mail\";a:6:{s:10:\"from_email\";s:22:\"wakemanja007@gmail.com\";s:9:\"from_name\";s:11:\"easy-manage\";s:6:\"mailer\";s:5:\"gmail\";s:11:\"return_path\";b:0;s:16:\"from_email_force\";b:1;s:15:\"from_name_force\";b:0;}s:4:\"smtp\";a:2:{s:7:\"autotls\";b:1;s:4:\"auth\";b:1;}s:7:\"general\";a:1:{s:29:\"summary_report_email_disabled\";b:0;}}', 'no'),
(639, 'wp_mail_smtp_activated_time', '1687183785', 'no'),
(640, 'wp_mail_smtp_activated', 'a:1:{s:4:\"lite\";i:1687183785;}', 'yes'),
(643, 'action_scheduler_lock_async-request-runner', '1688024072', 'yes'),
(647, 'wp_mail_smtp_migration_version', '5', 'yes'),
(648, 'wp_mail_smtp_debug_events_db_version', '1', 'yes'),
(649, 'wp_mail_smtp_activation_prevent_redirect', '1', 'yes'),
(650, 'wp_mail_smtp_setup_wizard_stats', 'a:3:{s:13:\"launched_time\";i:1687183794;s:14:\"completed_time\";i:0;s:14:\"was_successful\";b:0;}', 'no'),
(655, 'wp_mail_smtp_review_notice', 'a:2:{s:4:\"time\";i:1687183864;s:9:\"dismissed\";b:0;}', 'yes'),
(657, 'wp_mail_smtp_notifications', 'a:4:{s:6:\"update\";i:1687183927;s:4:\"feed\";a:0:{}s:6:\"events\";a:0:{}s:9:\"dismissed\";a:0:{}}', 'yes'),
(739, 'wp_mail_smtp_debug', 'a:30:{i:0;i:1;i:1;i:2;i:2;i:3;i:3;i:4;i:4;i:5;i:5;i:6;i:6;i:7;i:7;i:8;i:8;i:9;i:9;i:10;i:10;i:11;i:11;i:12;i:12;i:13;i:13;i:14;i:14;i:15;i:15;i:16;i:16;i:17;i:17;i:18;i:18;i:19;i:19;i:20;i:20;i:21;i:21;i:22;i:22;i:23;i:23;i:24;i:24;i:25;i:25;i:26;i:26;i:27;i:27;i:28;i:28;i:29;i:29;i:30;}', 'no'),
(740, 'wp_mail_smtp_lite_sent_email_counter', '30', 'yes'),
(741, 'wp_mail_smtp_lite_weekly_sent_email_counter', 'a:3:{i:25;i:26;i:26;i:3;i:27;i:1;}', 'yes'),
(2658, 'action_scheduler_migration_status', 'complete', 'yes'),
(3642, 'category_children', 'a:0:{}', 'yes'),
(4043, '_site_transient_timeout_php_check_3fde9d06ba9e4fd20d08658e6f30b792', '1688707060', 'no'),
(4044, '_site_transient_php_check_3fde9d06ba9e4fd20d08658e6f30b792', 'a:5:{s:19:\"recommended_version\";s:3:\"7.4\";s:15:\"minimum_version\";s:6:\"5.6.20\";s:12:\"is_supported\";b:1;s:9:\"is_secure\";b:1;s:13:\"is_acceptable\";b:1;}', 'no'),
(4063, '_site_transient_timeout_theme_roots', '1688476381', 'no'),
(4064, '_site_transient_theme_roots', 'a:4:{s:11:\"easy-manage\";s:7:\"/themes\";s:15:\"twentytwentyone\";s:7:\"/themes\";s:17:\"twentytwentythree\";s:7:\"/themes\";s:15:\"twentytwentytwo\";s:7:\"/themes\";}', 'no'),
(4065, '_site_transient_update_plugins', 'O:8:\"stdClass\":5:{s:12:\"last_checked\";i:1688474583;s:8:\"response\";a:1:{s:19:\"akismet/akismet.php\";O:8:\"stdClass\":12:{s:2:\"id\";s:21:\"w.org/plugins/akismet\";s:4:\"slug\";s:7:\"akismet\";s:6:\"plugin\";s:19:\"akismet/akismet.php\";s:11:\"new_version\";s:3:\"5.2\";s:3:\"url\";s:38:\"https://wordpress.org/plugins/akismet/\";s:7:\"package\";s:54:\"https://downloads.wordpress.org/plugin/akismet.5.2.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:60:\"https://ps.w.org/akismet/assets/icon-256x256.png?rev=2818463\";s:2:\"1x\";s:60:\"https://ps.w.org/akismet/assets/icon-128x128.png?rev=2818463\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:63:\"https://ps.w.org/akismet/assets/banner-1544x500.png?rev=2900731\";s:2:\"1x\";s:62:\"https://ps.w.org/akismet/assets/banner-772x250.png?rev=2900731\";}s:11:\"banners_rtl\";a:0:{}s:8:\"requires\";s:3:\"5.8\";s:6:\"tested\";s:5:\"6.2.2\";s:12:\"requires_php\";s:6:\"5.6.20\";}}s:12:\"translations\";a:0:{}s:9:\"no_update\";a:4:{s:9:\"hello.php\";O:8:\"stdClass\":10:{s:2:\"id\";s:25:\"w.org/plugins/hello-dolly\";s:4:\"slug\";s:11:\"hello-dolly\";s:6:\"plugin\";s:9:\"hello.php\";s:11:\"new_version\";s:5:\"1.7.2\";s:3:\"url\";s:42:\"https://wordpress.org/plugins/hello-dolly/\";s:7:\"package\";s:60:\"https://downloads.wordpress.org/plugin/hello-dolly.1.7.2.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:64:\"https://ps.w.org/hello-dolly/assets/icon-256x256.jpg?rev=2052855\";s:2:\"1x\";s:64:\"https://ps.w.org/hello-dolly/assets/icon-128x128.jpg?rev=2052855\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:67:\"https://ps.w.org/hello-dolly/assets/banner-1544x500.jpg?rev=2645582\";s:2:\"1x\";s:66:\"https://ps.w.org/hello-dolly/assets/banner-772x250.jpg?rev=2052855\";}s:11:\"banners_rtl\";a:0:{}s:8:\"requires\";s:3:\"4.6\";}s:47:\"jwt-authentication-for-wp-rest-api/jwt-auth.php\";O:8:\"stdClass\":10:{s:2:\"id\";s:48:\"w.org/plugins/jwt-authentication-for-wp-rest-api\";s:4:\"slug\";s:34:\"jwt-authentication-for-wp-rest-api\";s:6:\"plugin\";s:47:\"jwt-authentication-for-wp-rest-api/jwt-auth.php\";s:11:\"new_version\";s:5:\"1.3.2\";s:3:\"url\";s:65:\"https://wordpress.org/plugins/jwt-authentication-for-wp-rest-api/\";s:7:\"package\";s:83:\"https://downloads.wordpress.org/plugin/jwt-authentication-for-wp-rest-api.1.3.2.zip\";s:5:\"icons\";a:2:{s:2:\"1x\";s:79:\"https://ps.w.org/jwt-authentication-for-wp-rest-api/assets/icon.svg?rev=2787935\";s:3:\"svg\";s:79:\"https://ps.w.org/jwt-authentication-for-wp-rest-api/assets/icon.svg?rev=2787935\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:89:\"https://ps.w.org/jwt-authentication-for-wp-rest-api/assets/banner-772x250.jpg?rev=2787935\";}s:11:\"banners_rtl\";a:0:{}s:8:\"requires\";s:3:\"4.2\";}s:29:\"wp-mail-smtp/wp_mail_smtp.php\";O:8:\"stdClass\":10:{s:2:\"id\";s:26:\"w.org/plugins/wp-mail-smtp\";s:4:\"slug\";s:12:\"wp-mail-smtp\";s:6:\"plugin\";s:29:\"wp-mail-smtp/wp_mail_smtp.php\";s:11:\"new_version\";s:5:\"3.8.0\";s:3:\"url\";s:43:\"https://wordpress.org/plugins/wp-mail-smtp/\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/plugin/wp-mail-smtp.3.8.0.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:65:\"https://ps.w.org/wp-mail-smtp/assets/icon-256x256.png?rev=1755440\";s:2:\"1x\";s:65:\"https://ps.w.org/wp-mail-smtp/assets/icon-128x128.png?rev=1755440\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:68:\"https://ps.w.org/wp-mail-smtp/assets/banner-1544x500.jpg?rev=2811094\";s:2:\"1x\";s:67:\"https://ps.w.org/wp-mail-smtp/assets/banner-772x250.jpg?rev=2811094\";}s:11:\"banners_rtl\";a:0:{}s:8:\"requires\";s:3:\"5.2\";}s:33:\"wps-hide-login/wps-hide-login.php\";O:8:\"stdClass\":10:{s:2:\"id\";s:28:\"w.org/plugins/wps-hide-login\";s:4:\"slug\";s:14:\"wps-hide-login\";s:6:\"plugin\";s:33:\"wps-hide-login/wps-hide-login.php\";s:11:\"new_version\";s:5:\"1.9.8\";s:3:\"url\";s:45:\"https://wordpress.org/plugins/wps-hide-login/\";s:7:\"package\";s:63:\"https://downloads.wordpress.org/plugin/wps-hide-login.1.9.8.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:67:\"https://ps.w.org/wps-hide-login/assets/icon-256x256.png?rev=1820667\";s:2:\"1x\";s:67:\"https://ps.w.org/wps-hide-login/assets/icon-128x128.png?rev=1820667\";}s:7:\"banners\";a:2:{s:2:\"2x\";s:70:\"https://ps.w.org/wps-hide-login/assets/banner-1544x500.jpg?rev=1820667\";s:2:\"1x\";s:69:\"https://ps.w.org/wps-hide-login/assets/banner-772x250.jpg?rev=1820667\";}s:11:\"banners_rtl\";a:0:{}s:8:\"requires\";s:3:\"4.1\";}}s:7:\"checked\";a:6:{s:19:\"akismet/akismet.php\";s:3:\"5.1\";s:27:\"easy-manage/easy-manage.php\";s:5:\"1.0.0\";s:9:\"hello.php\";s:5:\"1.7.2\";s:47:\"jwt-authentication-for-wp-rest-api/jwt-auth.php\";s:5:\"1.3.2\";s:29:\"wp-mail-smtp/wp_mail_smtp.php\";s:5:\"3.8.0\";s:33:\"wps-hide-login/wps-hide-login.php\";s:5:\"1.9.8\";}}', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `wp_postmeta`
--

CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(2, 3, '_wp_page_template', 'default'),
(3, 5, '_edit_lock', '1686290172:1'),
(5, 5, '_wp_page_template', 'page-admin-createpm.php'),
(6, 8, '_edit_lock', '1686577110:1'),
(8, 8, '_wp_page_template', 'default'),
(11, 13, '_edit_lock', '1687007265:1'),
(13, 13, '_wp_page_template', 'page-login.php'),
(14, 16, '_edit_lock', '1686140056:1'),
(16, 16, '_wp_page_template', 'page-admin-trainees.php'),
(17, 19, '_edit_lock', '1686293321:1'),
(19, 19, '_wp_page_template', 'page-admin-trainers.php'),
(20, 22, '_edit_lock', '1686287863:1'),
(22, 22, '_wp_page_template', 'page-admin-update.php'),
(23, 25, '_edit_lock', '1686290223:1'),
(25, 25, '_wp_page_template', 'page-deactivated.php'),
(26, 28, '_edit_lock', '1686420950:1'),
(28, 28, '_wp_page_template', 'page-pm-create-trainer.php'),
(29, 31, '_edit_lock', '1686380889:1'),
(31, 31, '_wp_page_template', 'page-pm-dashboard.php'),
(32, 34, '_edit_lock', '1687604080:1'),
(34, 34, '_wp_page_template', 'page-trainee-completed-projects.php'),
(35, 37, '_edit_lock', '1686140301:1'),
(37, 37, '_wp_page_template', 'page-trainee-dashboard.php'),
(38, 40, '_edit_lock', '1686140330:1'),
(40, 40, '_wp_page_template', 'page-trainer-cohort.php'),
(41, 43, '_edit_lock', '1686256521:1'),
(43, 43, '_wp_page_template', 'page-trainer-dashboard.php'),
(44, 46, '_edit_lock', '1686423282:1'),
(46, 46, '_wp_page_template', 'page-trainer-create-group-project.php'),
(47, 49, '_edit_lock', '1686288273:1'),
(49, 49, '_wp_page_template', 'page-trainer-create-project.php'),
(50, 52, '_edit_lock', '1686228508:1'),
(52, 52, '_wp_page_template', 'page-trainer-trainees.php'),
(53, 55, '_edit_lock', '1686140468:1'),
(55, 55, '_wp_page_template', 'page-trainer-trash.php'),
(56, 58, '_edit_lock', '1688016005:1'),
(58, 58, '_wp_page_template', 'page-pm-trainer-update.php'),
(61, 63, '_edit_lock', '1687771845:1'),
(63, 63, '_wp_page_template', 'page-trainer-create-trainee.php'),
(64, 19, '_edit_last', '1'),
(65, 16, '_wp_trash_meta_status', 'publish'),
(66, 16, '_wp_trash_meta_time', '1686140807'),
(67, 16, '_wp_desired_post_slug', 'admin-trainees-table'),
(68, 3, '_wp_trash_meta_status', 'draft'),
(69, 3, '_wp_trash_meta_time', '1686140812'),
(70, 3, '_wp_desired_post_slug', 'privacy-policy'),
(71, 2, '_wp_trash_meta_status', 'publish'),
(72, 2, '_wp_trash_meta_time', '1686140825'),
(73, 2, '_wp_desired_post_slug', 'sample-page'),
(74, 69, '_menu_item_type', 'custom'),
(75, 69, '_menu_item_menu_item_parent', '0'),
(76, 69, '_menu_item_object_id', '69'),
(77, 69, '_menu_item_object', 'custom'),
(78, 69, '_menu_item_target', ''),
(79, 69, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(80, 69, '_menu_item_xfn', ''),
(81, 69, '_menu_item_url', 'http://localhost/easy-manage/'),
(83, 70, '_menu_item_type', 'post_type'),
(84, 70, '_menu_item_menu_item_parent', '0'),
(85, 70, '_menu_item_object_id', '8'),
(86, 70, '_menu_item_object', 'page'),
(87, 70, '_menu_item_target', ''),
(88, 70, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(89, 70, '_menu_item_xfn', ''),
(90, 70, '_menu_item_url', ''),
(92, 71, '_menu_item_type', 'post_type'),
(93, 71, '_menu_item_menu_item_parent', '0'),
(94, 71, '_menu_item_object_id', '25'),
(95, 71, '_menu_item_object', 'page'),
(96, 71, '_menu_item_target', ''),
(97, 71, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(98, 71, '_menu_item_xfn', ''),
(99, 71, '_menu_item_url', ''),
(101, 72, '_menu_item_type', 'post_type'),
(102, 72, '_menu_item_menu_item_parent', '0'),
(103, 72, '_menu_item_object_id', '22'),
(104, 72, '_menu_item_object', 'page'),
(105, 72, '_menu_item_target', ''),
(106, 72, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(107, 72, '_menu_item_xfn', ''),
(108, 72, '_menu_item_url', ''),
(110, 73, '_menu_item_type', 'post_type'),
(111, 73, '_menu_item_menu_item_parent', '0'),
(112, 73, '_menu_item_object_id', '34'),
(113, 73, '_menu_item_object', 'page'),
(114, 73, '_menu_item_target', ''),
(115, 73, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(116, 73, '_menu_item_xfn', ''),
(117, 73, '_menu_item_url', ''),
(128, 75, '_menu_item_type', 'post_type'),
(129, 75, '_menu_item_menu_item_parent', '0'),
(130, 75, '_menu_item_object_id', '5'),
(131, 75, '_menu_item_object', 'page'),
(132, 75, '_menu_item_target', ''),
(133, 75, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(134, 75, '_menu_item_xfn', ''),
(135, 75, '_menu_item_url', ''),
(247, 90, '_wp_attached_file', '2023/06/check.png'),
(248, 90, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:17:\"2023/06/check.png\";s:8:\"filesize\";i:26431;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(249, 91, '_wp_attached_file', '2023/06/cohort.png'),
(250, 91, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:18:\"2023/06/cohort.png\";s:8:\"filesize\";i:29860;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(251, 92, '_wp_attached_file', '2023/06/dashboard.png'),
(252, 92, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:21:\"2023/06/dashboard.png\";s:8:\"filesize\";i:45189;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(253, 93, '_wp_attached_file', '2023/06/delete.png'),
(254, 93, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:18:\"2023/06/delete.png\";s:8:\"filesize\";i:7842;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(255, 94, '_wp_attached_file', '2023/06/dustbin.png'),
(256, 94, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:19:\"2023/06/dustbin.png\";s:8:\"filesize\";i:27233;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(257, 95, '_wp_attached_file', '2023/06/edit.png'),
(258, 95, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:16:\"2023/06/edit.png\";s:8:\"filesize\";i:12932;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(259, 96, '_wp_attached_file', '2023/06/logout.png'),
(260, 96, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:18:\"2023/06/logout.png\";s:8:\"filesize\";i:11076;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(261, 97, '_wp_attached_file', '2023/06/profile.png'),
(262, 97, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:19:\"2023/06/profile.png\";s:8:\"filesize\";i:32174;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(263, 98, '_wp_attached_file', '2023/06/search.png'),
(264, 98, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:18:\"2023/06/search.png\";s:8:\"filesize\";i:25771;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(265, 99, '_wp_attached_file', '2023/06/team.png'),
(266, 99, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:16:\"2023/06/team.png\";s:8:\"filesize\";i:27016;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(267, 100, '_wp_attached_file', '2023/06/create.png'),
(268, 100, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:18:\"2023/06/create.png\";s:8:\"filesize\";i:28748;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(285, 109, '_wp_attached_file', '2023/06/off.png'),
(286, 109, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:15:\"2023/06/off.png\";s:8:\"filesize\";i:19033;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(293, 113, '_wp_attached_file', '2023/06/turn-off.png'),
(294, 113, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:20:\"2023/06/turn-off.png\";s:8:\"filesize\";i:18890;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(295, 114, '_wp_attached_file', '2023/06/completed.png'),
(296, 114, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:21:\"2023/06/completed.png\";s:8:\"filesize\";i:24415;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(297, 115, '_menu_item_type', 'post_type'),
(298, 115, '_menu_item_menu_item_parent', '0'),
(299, 115, '_menu_item_object_id', '31'),
(300, 115, '_menu_item_object', 'page'),
(301, 115, '_menu_item_target', ''),
(302, 115, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(303, 115, '_menu_item_xfn', ''),
(304, 115, '_menu_item_url', ''),
(306, 116, '_menu_item_type', 'post_type'),
(307, 116, '_menu_item_menu_item_parent', '0'),
(308, 116, '_menu_item_object_id', '19'),
(309, 116, '_menu_item_object', 'page'),
(310, 116, '_menu_item_target', ''),
(311, 116, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(312, 116, '_menu_item_xfn', ''),
(313, 116, '_menu_item_url', ''),
(315, 117, '_menu_item_type', 'post_type'),
(316, 117, '_menu_item_menu_item_parent', '0'),
(317, 117, '_menu_item_object_id', '63'),
(318, 117, '_menu_item_object', 'page'),
(319, 117, '_menu_item_target', ''),
(320, 117, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(321, 117, '_menu_item_xfn', ''),
(322, 117, '_menu_item_url', ''),
(324, 118, '_menu_item_type', 'post_type'),
(325, 118, '_menu_item_menu_item_parent', '0'),
(326, 118, '_menu_item_object_id', '52'),
(327, 118, '_menu_item_object', 'page'),
(328, 118, '_menu_item_target', ''),
(329, 118, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(330, 118, '_menu_item_xfn', ''),
(331, 118, '_menu_item_url', ''),
(333, 119, '_menu_item_type', 'post_type'),
(334, 119, '_menu_item_menu_item_parent', '0'),
(335, 119, '_menu_item_object_id', '49'),
(336, 119, '_menu_item_object', 'page'),
(337, 119, '_menu_item_target', ''),
(338, 119, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(339, 119, '_menu_item_xfn', ''),
(340, 119, '_menu_item_url', ''),
(342, 120, '_menu_item_type', 'post_type'),
(343, 120, '_menu_item_menu_item_parent', '0'),
(344, 120, '_menu_item_object_id', '46'),
(345, 120, '_menu_item_object', 'page'),
(346, 120, '_menu_item_target', ''),
(347, 120, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(348, 120, '_menu_item_xfn', ''),
(349, 120, '_menu_item_url', ''),
(351, 121, '_menu_item_type', 'post_type'),
(352, 121, '_menu_item_menu_item_parent', '0'),
(353, 121, '_menu_item_object_id', '43'),
(354, 121, '_menu_item_object', 'page'),
(355, 121, '_menu_item_target', ''),
(356, 121, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(357, 121, '_menu_item_xfn', ''),
(358, 121, '_menu_item_url', ''),
(360, 122, '_menu_item_type', 'post_type'),
(361, 122, '_menu_item_menu_item_parent', '0'),
(362, 122, '_menu_item_object_id', '40'),
(363, 122, '_menu_item_object', 'page'),
(364, 122, '_menu_item_target', ''),
(365, 122, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(366, 122, '_menu_item_xfn', ''),
(367, 122, '_menu_item_url', ''),
(369, 123, '_menu_item_type', 'post_type'),
(370, 123, '_menu_item_menu_item_parent', '0'),
(371, 123, '_menu_item_object_id', '37'),
(372, 123, '_menu_item_object', 'page'),
(373, 123, '_menu_item_target', ''),
(374, 123, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(375, 123, '_menu_item_xfn', ''),
(376, 123, '_menu_item_url', ''),
(382, 140, '_edit_lock', '1686287727:1'),
(384, 140, '_wp_page_template', 'page-admin-trainees.php'),
(391, 157, '_wp_attached_file', '2023/06/pause.png'),
(392, 157, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:17:\"2023/06/pause.png\";s:8:\"filesize\";i:24884;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(393, 158, '_wp_attached_file', '2023/06/play-button.png'),
(394, 158, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:23:\"2023/06/play-button.png\";s:8:\"filesize\";i:26052;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(395, 159, '_wp_attached_file', '2023/06/power-on.png'),
(396, 159, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:20:\"2023/06/power-on.png\";s:8:\"filesize\";i:13898;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(397, 160, '_wp_attached_file', '2023/06/pause-button.png'),
(398, 160, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:24:\"2023/06/pause-button.png\";s:8:\"filesize\";i:25882;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(399, 161, '_wp_attached_file', '2023/06/pause-1.png'),
(400, 161, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:19:\"2023/06/pause-1.png\";s:8:\"filesize\";i:24004;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(401, 162, '_wp_attached_file', '2023/06/pause-2.png'),
(402, 162, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:19:\"2023/06/pause-2.png\";s:8:\"filesize\";i:23221;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(415, 175, '_edit_lock', '1686500190:1'),
(417, 177, '_wp_attached_file', '2023/06/checked.png'),
(418, 177, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:19:\"2023/06/checked.png\";s:8:\"filesize\";i:12435;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(419, 178, '_wp_attached_file', '2023/06/complete1.png'),
(420, 178, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:21:\"2023/06/complete1.png\";s:8:\"filesize\";i:12340;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(421, 179, '_wp_attached_file', '2023/06/project-management.png'),
(422, 179, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:30:\"2023/06/project-management.png\";s:8:\"filesize\";i:32432;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(423, 180, '_wp_attached_file', '2023/06/project-management-1.png'),
(424, 180, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:32:\"2023/06/project-management-1.png\";s:8:\"filesize\";i:31853;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(427, 183, '_edit_lock', '1686502659:1'),
(429, 183, '_wp_page_template', 'page-trainee-group-projects.php'),
(430, 186, '_edit_lock', '1686505904:1'),
(432, 186, '_wp_page_template', 'page-trainer-create-group-project.php'),
(433, 189, '_edit_lock', '1686506102:1'),
(435, 189, '_wp_page_template', 'page-trainer-update.php'),
(438, 194, '_wp_attached_file', '2023/06/reuse.png'),
(439, 194, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:17:\"2023/06/reuse.png\";s:8:\"filesize\";i:14863;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(440, 195, '_wp_trash_meta_status', 'publish'),
(441, 195, '_wp_trash_meta_time', '1686553308'),
(442, 198, '_edit_lock', '1686561098:1'),
(444, 198, '_wp_page_template', 'page-example.php'),
(445, 201, '_wp_attached_file', '2023/06/trainer.png'),
(446, 201, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:19:\"2023/06/trainer.png\";s:8:\"filesize\";i:25553;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(447, 202, '_wp_attached_file', '2023/06/teacher.png'),
(448, 202, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:19:\"2023/06/teacher.png\";s:8:\"filesize\";i:37124;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(451, 205, '_edit_lock', '1686572271:1'),
(453, 205, '_wp_page_template', 'page-pm-cohorts.php'),
(468, 222, '_edit_lock', '1686574667:1'),
(470, 222, '_wp_page_template', 'page-pm-create-cohort.php'),
(471, 225, '_edit_lock', '1688014822:1'),
(473, 225, '_wp_page_template', 'page-pm-trainers.php'),
(476, 230, '_wp_attached_file', '2023/06/customer.png'),
(477, 230, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:20:\"2023/06/customer.png\";s:8:\"filesize\";i:18819;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(478, 231, '_edit_lock', '1686578044:1'),
(480, 231, '_wp_page_template', 'page-admin-pm.php'),
(483, 236, '_edit_lock', '1686578951:1'),
(485, 236, '_wp_trash_meta_status', 'publish'),
(486, 236, '_wp_trash_meta_time', '1686582270'),
(487, 236, '_wp_desired_post_slug', 'short-code'),
(488, 239, '_wp_attached_file', '2023/06/project.png'),
(489, 239, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:19:\"2023/06/project.png\";s:8:\"filesize\";i:24503;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(490, 240, '_edit_lock', '1686583574:1'),
(492, 240, '_wp_page_template', 'page-trainer-projects.php'),
(495, 245, '_edit_lock', '1686591309:1'),
(497, 245, '_wp_page_template', 'default'),
(498, 8, '_wp_trash_meta_status', 'publish'),
(499, 8, '_wp_trash_meta_time', '1686635225'),
(500, 8, '_wp_desired_post_slug', 'admin-dashboard'),
(501, 248, '_wp_attached_file', '2023/06/Navy-Blue-Modern-Business-Logo.png'),
(502, 248, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:500;s:6:\"height\";i:500;s:4:\"file\";s:42:\"2023/06/Navy-Blue-Modern-Business-Logo.png\";s:8:\"filesize\";i:9529;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(503, 250, '_edit_lock', '1686752194:1'),
(505, 250, '_wp_page_template', 'page-pm-single-cohort.php'),
(506, 253, '_wp_attached_file', '2023/06/right-arrow.png'),
(507, 253, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:23:\"2023/06/right-arrow.png\";s:8:\"filesize\";i:11760;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(508, 254, '_wp_attached_file', '2023/06/arrow-right.png'),
(509, 254, '_wp_attachment_metadata', 'a:6:{s:5:\"width\";i:512;s:6:\"height\";i:512;s:4:\"file\";s:23:\"2023/06/arrow-right.png\";s:8:\"filesize\";i:3011;s:5:\"sizes\";a:0:{}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(510, 255, '_edit_lock', '1686752227:1'),
(518, 267, '_edit_lock', '1687526957:1'),
(520, 267, '_wp_page_template', 'page-trainer-group_projects.php'),
(521, 270, '_edit_lock', '1687526440:1'),
(523, 270, '_wp_page_template', 'page-trainer-individual_projects.php'),
(524, 274, '_edit_lock', '1687983522:1'),
(526, 274, '_wp_page_template', 'page-search-results.php'),
(527, 277, '_edit_lock', '1687847206:1'),
(529, 277, '_wp_page_template', 'page-search-results.php'),
(530, 277, '_wp_trash_meta_status', 'publish'),
(531, 277, '_wp_trash_meta_time', '1687847219'),
(532, 277, '_wp_desired_post_slug', 'search-results-2'),
(533, 282, '_edit_lock', '1687860573:1'),
(535, 282, '_wp_page_template', 'page-trainer-deactivated-projects.php'),
(536, 245, '_wp_trash_meta_status', 'publish'),
(537, 245, '_wp_trash_meta_time', '1687900075'),
(538, 245, '_wp_desired_post_slug', 'dummy'),
(539, 285, '_edit_lock', '1687902348:1'),
(540, 286, '_edit_lock', '1687902458:1'),
(541, 285, '_wp_page_template', 'page-pm-deactivated-trainers.php');

-- --------------------------------------------------------

--
-- Table structure for table `wp_posts`
--

CREATE TABLE `wp_posts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext NOT NULL,
  `post_title` text NOT NULL,
  `post_excerpt` text NOT NULL,
  `post_status` varchar(20) NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) NOT NULL DEFAULT 'open',
  `post_password` varchar(255) NOT NULL DEFAULT '',
  `post_name` varchar(200) NOT NULL DEFAULT '',
  `to_ping` text NOT NULL,
  `pinged` text NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext NOT NULL,
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `guid` varchar(255) NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT 0,
  `post_type` varchar(20) NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2023-06-07 11:05:19', '2023-06-07 11:05:19', '<!-- wp:paragraph -->\n<p>Welcome to WordPress. This is your first post. Edit or delete it, then start writing!</p>\n<!-- /wp:paragraph -->', 'Hello world!', '', 'publish', 'open', 'open', '', 'hello-world', '', '', '2023-06-07 11:05:19', '2023-06-07 11:05:19', '', 0, 'http://localhost/easy-manage/?p=1', 0, 'post', '', 1),
(2, 1, '2023-06-07 11:05:19', '2023-06-07 11:05:19', '<!-- wp:paragraph -->\n<p>This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>Hi there! I\'m a bike messenger by day, aspiring actor by night, and this is my website. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin\' caught in the rain.)</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>...or something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>As a new WordPress user, you should go to <a href=\"http://localhost/easy-manage/wp-admin/\">your dashboard</a> to delete this page and create new pages for your content. Have fun!</p>\n<!-- /wp:paragraph -->', 'Sample Page', '', 'trash', 'closed', 'open', '', 'sample-page__trashed', '', '', '2023-06-07 12:27:05', '2023-06-07 12:27:05', '', 0, 'http://localhost/easy-manage/?page_id=2', 0, 'page', '', 0),
(3, 1, '2023-06-07 11:05:19', '2023-06-07 11:05:19', '<!-- wp:heading --><h2>Who we are</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>Our website address is: http://localhost/easy-manage.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Comments</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>When visitors leave comments on the site we collect the data shown in the comments form, and also the visitor&#8217;s IP address and browser user agent string to help spam detection.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>An anonymized string created from your email address (also called a hash) may be provided to the Gravatar service to see if you are using it. The Gravatar service privacy policy is available here: https://automattic.com/privacy/. After approval of your comment, your profile picture is visible to the public in the context of your comment.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Media</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>If you upload images to the website, you should avoid uploading images with embedded location data (EXIF GPS) included. Visitors to the website can download and extract any location data from images on the website.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Cookies</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>If you leave a comment on our site you may opt-in to saving your name, email address and website in cookies. These are for your convenience so that you do not have to fill in your details again when you leave another comment. These cookies will last for one year.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>If you visit our login page, we will set a temporary cookie to determine if your browser accepts cookies. This cookie contains no personal data and is discarded when you close your browser.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>When you log in, we will also set up several cookies to save your login information and your screen display choices. Login cookies last for two days, and screen options cookies last for a year. If you select &quot;Remember Me&quot;, your login will persist for two weeks. If you log out of your account, the login cookies will be removed.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>If you edit or publish an article, an additional cookie will be saved in your browser. This cookie includes no personal data and simply indicates the post ID of the article you just edited. It expires after 1 day.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Embedded content from other websites</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>Articles on this site may include embedded content (e.g. videos, images, articles, etc.). Embedded content from other websites behaves in the exact same way as if the visitor has visited the other website.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracking your interaction with the embedded content if you have an account and are logged in to that website.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Who we share your data with</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>If you request a password reset, your IP address will be included in the reset email.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>How long we retain your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>If you leave a comment, the comment and its metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding them in a moderation queue.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>For users that register on our website (if any), we also store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change their username). Website administrators can also see and edit that information.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>What rights you have over your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>If you have an account on this site, or have left comments, you can request to receive an exported file of the personal data we hold about you, including any data you have provided to us. You can also request that we erase any personal data we hold about you. This does not include any data we are obliged to keep for administrative, legal, or security purposes.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Where your data is sent</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>Visitor comments may be checked through an automated spam detection service.</p><!-- /wp:paragraph -->', 'Privacy Policy', '', 'trash', 'closed', 'open', '', 'privacy-policy__trashed', '', '', '2023-06-07 12:26:52', '2023-06-07 12:26:52', '', 0, 'http://localhost/easy-manage/?page_id=3', 0, 'page', '', 0),
(5, 1, '2023-06-07 12:14:45', '2023-06-07 12:14:45', '', 'Create Program Manager', '', 'publish', 'closed', 'closed', '', 'create-program-manager', '', '', '2023-06-07 12:14:45', '2023-06-07 12:14:45', '', 0, 'http://localhost/easy-manage/?page_id=5', 0, 'page', '', 0),
(7, 1, '2023-06-07 12:14:45', '2023-06-07 12:14:45', '', 'Create Program Manager', '', 'inherit', 'closed', 'closed', '', '5-revision-v1', '', '', '2023-06-07 12:14:45', '2023-06-07 12:14:45', '', 5, 'http://localhost/easy-manage/?p=7', 0, 'revision', '', 0),
(8, 1, '2023-06-07 12:15:08', '2023-06-07 12:15:08', '', 'Admin Dashboard', '', 'trash', 'closed', 'closed', '', 'admin-dashboard__trashed', '', '', '2023-06-13 05:47:05', '2023-06-13 05:47:05', '', 0, 'http://localhost/easy-manage/?page_id=8', 0, 'page', '', 0),
(10, 1, '2023-06-07 12:15:08', '2023-06-07 12:15:08', '', 'Admin Dashboard', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2023-06-07 12:15:08', '2023-06-07 12:15:08', '', 8, 'http://localhost/easy-manage/?p=10', 0, 'revision', '', 0),
(13, 1, '2023-06-07 12:16:13', '2023-06-07 12:16:13', '', 'Login form', '', 'publish', 'closed', 'closed', '', 'login-form', '', '', '2023-06-17 13:07:52', '2023-06-17 13:07:52', '', 0, 'http://localhost/easy-manage/?page_id=13', 0, 'page', '', 0),
(15, 1, '2023-06-07 12:16:13', '2023-06-07 12:16:13', '', 'Login form', '', 'inherit', 'closed', 'closed', '', '13-revision-v1', '', '', '2023-06-07 12:16:13', '2023-06-07 12:16:13', '', 13, 'http://localhost/easy-manage/?p=15', 0, 'revision', '', 0),
(16, 1, '2023-06-07 12:16:39', '2023-06-07 12:16:39', '', 'Admin Trainees table', '', 'trash', 'closed', 'closed', '', 'admin-trainees-table__trashed', '', '', '2023-06-07 12:26:47', '2023-06-07 12:26:47', '', 0, 'http://localhost/easy-manage/?page_id=16', 0, 'page', '', 0),
(18, 1, '2023-06-07 12:16:39', '2023-06-07 12:16:39', '', 'Admin Trainees table', '', 'inherit', 'closed', 'closed', '', '16-revision-v1', '', '', '2023-06-07 12:16:39', '2023-06-07 12:16:39', '', 16, 'http://localhost/easy-manage/?p=18', 0, 'revision', '', 0),
(19, 1, '2023-06-07 12:17:01', '2023-06-07 12:17:01', '', 'admin trainers table', '', 'publish', 'closed', 'closed', '', 'admin-trainers-table', '', '', '2023-06-08 12:49:23', '2023-06-08 12:49:23', '', 0, 'http://localhost/easy-manage/?page_id=19', 0, 'page', '', 0),
(21, 1, '2023-06-07 12:17:01', '2023-06-07 12:17:01', '', 'Admin Trainers table', '', 'inherit', 'closed', 'closed', '', '19-revision-v1', '', '', '2023-06-07 12:17:01', '2023-06-07 12:17:01', '', 19, 'http://localhost/easy-manage/?p=21', 0, 'revision', '', 0),
(22, 1, '2023-06-07 12:17:24', '2023-06-07 12:17:24', '', 'Admin Update Form', '', 'publish', 'closed', 'closed', '', 'admin-update-form', '', '', '2023-06-07 12:17:24', '2023-06-07 12:17:24', '', 0, 'http://localhost/easy-manage/?page_id=22', 0, 'page', '', 0),
(24, 1, '2023-06-07 12:17:24', '2023-06-07 12:17:24', '', 'Admin Update Form', '', 'inherit', 'closed', 'closed', '', '22-revision-v1', '', '', '2023-06-07 12:17:24', '2023-06-07 12:17:24', '', 22, 'http://localhost/easy-manage/?p=24', 0, 'revision', '', 0),
(25, 1, '2023-06-07 12:18:09', '2023-06-07 12:18:09', '', 'Admin deactivate table', '', 'publish', 'closed', 'closed', '', 'admin-deactivate-table', '', '', '2023-06-07 12:18:09', '2023-06-07 12:18:09', '', 0, 'http://localhost/easy-manage/?page_id=25', 0, 'page', '', 0),
(27, 1, '2023-06-07 12:18:09', '2023-06-07 12:18:09', '', 'Admin deactivate table', '', 'inherit', 'closed', 'closed', '', '25-revision-v1', '', '', '2023-06-07 12:18:09', '2023-06-07 12:18:09', '', 25, 'http://localhost/easy-manage/?p=27', 0, 'revision', '', 0),
(28, 1, '2023-06-07 12:18:45', '2023-06-07 12:18:45', '', 'Create Trainer', '', 'publish', 'closed', 'closed', '', 'create-trainer', '', '', '2023-06-07 12:18:45', '2023-06-07 12:18:45', '', 0, 'http://localhost/easy-manage/?page_id=28', 0, 'page', '', 0),
(30, 1, '2023-06-07 12:18:45', '2023-06-07 12:18:45', '', 'Create Trainer', '', 'inherit', 'closed', 'closed', '', '28-revision-v1', '', '', '2023-06-07 12:18:45', '2023-06-07 12:18:45', '', 28, 'http://localhost/easy-manage/?p=30', 0, 'revision', '', 0),
(31, 1, '2023-06-07 12:19:29', '2023-06-07 12:19:29', '', 'pm dashboard', '', 'publish', 'closed', 'closed', '', 'pm-dashboard', '', '', '2023-06-07 12:19:29', '2023-06-07 12:19:29', '', 0, 'http://localhost/easy-manage/?page_id=31', 0, 'page', '', 0),
(33, 1, '2023-06-07 12:19:29', '2023-06-07 12:19:29', '', 'pm dashboard', '', 'inherit', 'closed', 'closed', '', '31-revision-v1', '', '', '2023-06-07 12:19:29', '2023-06-07 12:19:29', '', 31, 'http://localhost/easy-manage/?p=33', 0, 'revision', '', 0),
(34, 1, '2023-06-07 12:20:20', '2023-06-07 12:20:20', '', 'completed project', '', 'publish', 'closed', 'closed', '', 'completed-projects', '', '', '2023-06-24 10:37:46', '2023-06-24 10:37:46', '', 0, 'http://localhost/easy-manage/?page_id=34', 0, 'page', '', 0),
(36, 1, '2023-06-07 12:20:20', '2023-06-07 12:20:20', '', 'completed projects', '', 'inherit', 'closed', 'closed', '', '34-revision-v1', '', '', '2023-06-07 12:20:20', '2023-06-07 12:20:20', '', 34, 'http://localhost/easy-manage/?p=36', 0, 'revision', '', 0),
(37, 1, '2023-06-07 12:20:44', '2023-06-07 12:20:44', '', 'trainee dashboard', '', 'publish', 'closed', 'closed', '', 'trainee-dashboard', '', '', '2023-06-07 12:20:44', '2023-06-07 12:20:44', '', 0, 'http://localhost/easy-manage/?page_id=37', 0, 'page', '', 0),
(39, 1, '2023-06-07 12:20:44', '2023-06-07 12:20:44', '', 'trainee dashboard', '', 'inherit', 'closed', 'closed', '', '37-revision-v1', '', '', '2023-06-07 12:20:44', '2023-06-07 12:20:44', '', 37, 'http://localhost/easy-manage/?p=39', 0, 'revision', '', 0),
(40, 1, '2023-06-07 12:21:13', '2023-06-07 12:21:13', '', 'trainer cohort', '', 'publish', 'closed', 'closed', '', 'trainer-cohort', '', '', '2023-06-07 12:21:13', '2023-06-07 12:21:13', '', 0, 'http://localhost/easy-manage/?page_id=40', 0, 'page', '', 0),
(42, 1, '2023-06-07 12:21:13', '2023-06-07 12:21:13', '', 'trainer cohort', '', 'inherit', 'closed', 'closed', '', '40-revision-v1', '', '', '2023-06-07 12:21:13', '2023-06-07 12:21:13', '', 40, 'http://localhost/easy-manage/?p=42', 0, 'revision', '', 0),
(43, 1, '2023-06-07 12:21:53', '2023-06-07 12:21:53', '', 'trainer dashboard', '', 'publish', 'closed', 'closed', '', 'trainer-dashboard', '', '', '2023-06-08 20:34:01', '2023-06-08 20:34:01', '', 0, 'http://localhost/easy-manage/?page_id=43', 0, 'page', '', 0),
(45, 1, '2023-06-07 12:21:53', '2023-06-07 12:21:53', '', 'trainer dashboard', '', 'inherit', 'closed', 'closed', '', '43-revision-v1', '', '', '2023-06-07 12:21:53', '2023-06-07 12:21:53', '', 43, 'http://localhost/easy-manage/?p=45', 0, 'revision', '', 0),
(46, 1, '2023-06-07 12:22:23', '2023-06-07 12:22:23', '', 'create groups', '', 'publish', 'closed', 'closed', '', 'create-groups', '', '', '2023-06-07 12:22:23', '2023-06-07 12:22:23', '', 0, 'http://localhost/easy-manage/?page_id=46', 0, 'page', '', 0),
(48, 1, '2023-06-07 12:22:23', '2023-06-07 12:22:23', '', 'create groups', '', 'inherit', 'closed', 'closed', '', '46-revision-v1', '', '', '2023-06-07 12:22:23', '2023-06-07 12:22:23', '', 46, 'http://localhost/easy-manage/?p=48', 0, 'revision', '', 0),
(49, 1, '2023-06-07 12:22:46', '2023-06-07 12:22:46', '', 'create project', '', 'publish', 'closed', 'closed', '', 'create-project', '', '', '2023-06-07 12:22:46', '2023-06-07 12:22:46', '', 0, 'http://localhost/easy-manage/?page_id=49', 0, 'page', '', 0),
(51, 1, '2023-06-07 12:22:46', '2023-06-07 12:22:46', '', 'create project', '', 'inherit', 'closed', 'closed', '', '49-revision-v1', '', '', '2023-06-07 12:22:46', '2023-06-07 12:22:46', '', 49, 'http://localhost/easy-manage/?p=51', 0, 'revision', '', 0),
(52, 1, '2023-06-07 12:23:16', '2023-06-07 12:23:16', '', 'trainer-trainees-table', '', 'publish', 'closed', 'closed', '', 'trainees-list', '', '', '2023-06-08 12:48:51', '2023-06-08 12:48:51', '', 0, 'http://localhost/easy-manage/?page_id=52', 0, 'page', '', 0),
(54, 1, '2023-06-07 12:23:16', '2023-06-07 12:23:16', '', 'trainees list', '', 'inherit', 'closed', 'closed', '', '52-revision-v1', '', '', '2023-06-07 12:23:16', '2023-06-07 12:23:16', '', 52, 'http://localhost/easy-manage/?p=54', 0, 'revision', '', 0),
(55, 1, '2023-06-07 12:23:31', '2023-06-07 12:23:31', '', 'trash', '', 'publish', 'closed', 'closed', '', 'trash', '', '', '2023-06-07 12:23:31', '2023-06-07 12:23:31', '', 0, 'http://localhost/easy-manage/?page_id=55', 0, 'page', '', 0),
(57, 1, '2023-06-07 12:23:31', '2023-06-07 12:23:31', '', 'trash', '', 'inherit', 'closed', 'closed', '', '55-revision-v1', '', '', '2023-06-07 12:23:31', '2023-06-07 12:23:31', '', 55, 'http://localhost/easy-manage/?p=57', 0, 'revision', '', 0),
(58, 1, '2023-06-07 12:24:07', '2023-06-07 12:24:07', '', 'update form', '', 'publish', 'closed', 'closed', '', 'update-form', '', '', '2023-06-29 05:03:57', '2023-06-29 05:03:57', '', 0, 'http://localhost/easy-manage/?page_id=58', 0, 'page', '', 0),
(60, 1, '2023-06-07 12:24:07', '2023-06-07 12:24:07', '', 'update form', '', 'inherit', 'closed', 'closed', '', '58-revision-v1', '', '', '2023-06-07 12:24:07', '2023-06-07 12:24:07', '', 58, 'http://localhost/easy-manage/?p=60', 0, 'revision', '', 0),
(63, 1, '2023-06-07 12:25:35', '2023-06-07 12:25:35', '', 'create trainee', '', 'publish', 'closed', 'closed', '', 'create-trainee', '', '', '2023-06-15 12:52:56', '2023-06-15 12:52:56', '', 0, 'http://localhost/easy-manage/?page_id=63', 0, 'page', '', 0),
(65, 1, '2023-06-07 12:25:35', '2023-06-07 12:25:35', '', 'create trainee', '', 'inherit', 'closed', 'closed', '', '63-revision-v1', '', '', '2023-06-07 12:25:35', '2023-06-07 12:25:35', '', 63, 'http://localhost/easy-manage/?p=65', 0, 'revision', '', 0),
(66, 1, '2023-06-07 12:26:07', '2023-06-07 12:26:07', '', 'trainers table', '', 'inherit', 'closed', 'closed', '', '19-revision-v1', '', '', '2023-06-07 12:26:07', '2023-06-07 12:26:07', '', 19, 'http://localhost/easy-manage/?p=66', 0, 'revision', '', 0),
(67, 1, '2023-06-07 12:26:52', '2023-06-07 12:26:52', '<!-- wp:heading --><h2>Who we are</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>Our website address is: http://localhost/easy-manage.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Comments</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>When visitors leave comments on the site we collect the data shown in the comments form, and also the visitor&#8217;s IP address and browser user agent string to help spam detection.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>An anonymized string created from your email address (also called a hash) may be provided to the Gravatar service to see if you are using it. The Gravatar service privacy policy is available here: https://automattic.com/privacy/. After approval of your comment, your profile picture is visible to the public in the context of your comment.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Media</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>If you upload images to the website, you should avoid uploading images with embedded location data (EXIF GPS) included. Visitors to the website can download and extract any location data from images on the website.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Cookies</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>If you leave a comment on our site you may opt-in to saving your name, email address and website in cookies. These are for your convenience so that you do not have to fill in your details again when you leave another comment. These cookies will last for one year.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>If you visit our login page, we will set a temporary cookie to determine if your browser accepts cookies. This cookie contains no personal data and is discarded when you close your browser.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>When you log in, we will also set up several cookies to save your login information and your screen display choices. Login cookies last for two days, and screen options cookies last for a year. If you select &quot;Remember Me&quot;, your login will persist for two weeks. If you log out of your account, the login cookies will be removed.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>If you edit or publish an article, an additional cookie will be saved in your browser. This cookie includes no personal data and simply indicates the post ID of the article you just edited. It expires after 1 day.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Embedded content from other websites</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>Articles on this site may include embedded content (e.g. videos, images, articles, etc.). Embedded content from other websites behaves in the exact same way as if the visitor has visited the other website.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracking your interaction with the embedded content if you have an account and are logged in to that website.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Who we share your data with</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>If you request a password reset, your IP address will be included in the reset email.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>How long we retain your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>If you leave a comment, the comment and its metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding them in a moderation queue.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>For users that register on our website (if any), we also store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change their username). Website administrators can also see and edit that information.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>What rights you have over your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>If you have an account on this site, or have left comments, you can request to receive an exported file of the personal data we hold about you, including any data you have provided to us. You can also request that we erase any personal data we hold about you. This does not include any data we are obliged to keep for administrative, legal, or security purposes.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Where your data is sent</h2><!-- /wp:heading --><!-- wp:paragraph --><p><strong class=\"privacy-policy-tutorial\">Suggested text: </strong>Visitor comments may be checked through an automated spam detection service.</p><!-- /wp:paragraph -->', 'Privacy Policy', '', 'inherit', 'closed', 'closed', '', '3-revision-v1', '', '', '2023-06-07 12:26:52', '2023-06-07 12:26:52', '', 3, 'http://localhost/easy-manage/?p=67', 0, 'revision', '', 0),
(68, 1, '2023-06-07 12:27:05', '2023-06-07 12:27:05', '<!-- wp:paragraph -->\n<p>This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>Hi there! I\'m a bike messenger by day, aspiring actor by night, and this is my website. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin\' caught in the rain.)</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>...or something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>As a new WordPress user, you should go to <a href=\"http://localhost/easy-manage/wp-admin/\">your dashboard</a> to delete this page and create new pages for your content. Have fun!</p>\n<!-- /wp:paragraph -->', 'Sample Page', '', 'inherit', 'closed', 'closed', '', '2-revision-v1', '', '', '2023-06-07 12:27:05', '2023-06-07 12:27:05', '', 2, 'http://localhost/easy-manage/?p=68', 0, 'revision', '', 0),
(69, 1, '2023-06-07 18:35:10', '2023-06-07 12:29:52', '', 'Home', '', 'publish', 'closed', 'closed', '', 'home', '', '', '2023-06-07 18:35:10', '2023-06-07 18:35:10', '', 0, 'http://localhost/easy-manage/?p=69', 1, 'nav_menu_item', '', 0),
(70, 1, '2023-06-07 18:35:10', '2023-06-07 12:29:52', ' ', '', '', 'publish', 'closed', 'closed', '', '70', '', '', '2023-06-07 18:35:10', '2023-06-07 18:35:10', '', 0, 'http://localhost/easy-manage/?p=70', 2, 'nav_menu_item', '', 0),
(71, 1, '2023-06-07 18:35:10', '2023-06-07 12:29:52', ' ', '', '', 'publish', 'closed', 'closed', '', '71', '', '', '2023-06-07 18:35:10', '2023-06-07 18:35:10', '', 0, 'http://localhost/easy-manage/?p=71', 3, 'nav_menu_item', '', 0),
(72, 1, '2023-06-07 18:35:10', '2023-06-07 12:29:52', ' ', '', '', 'publish', 'closed', 'closed', '', '72', '', '', '2023-06-07 18:35:10', '2023-06-07 18:35:10', '', 0, 'http://localhost/easy-manage/?p=72', 4, 'nav_menu_item', '', 0),
(73, 1, '2023-06-07 18:35:10', '2023-06-07 12:29:52', ' ', '', '', 'publish', 'closed', 'closed', '', '73', '', '', '2023-06-07 18:35:10', '2023-06-07 18:35:10', '', 0, 'http://localhost/easy-manage/?p=73', 5, 'nav_menu_item', '', 0),
(75, 1, '2023-06-07 18:35:10', '2023-06-07 12:29:52', ' ', '', '', 'publish', 'closed', 'closed', '', '75', '', '', '2023-06-07 18:35:10', '2023-06-07 18:35:10', '', 0, 'http://localhost/easy-manage/?p=75', 6, 'nav_menu_item', '', 0),
(90, 1, '2023-06-07 15:24:55', '2023-06-07 15:24:55', '', 'check', '', 'inherit', 'open', 'closed', '', 'check', '', '', '2023-06-07 15:24:55', '2023-06-07 15:24:55', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/check.png', 0, 'attachment', 'image/png', 0),
(91, 1, '2023-06-07 15:24:56', '2023-06-07 15:24:56', '', 'cohort', '', 'inherit', 'open', 'closed', '', 'cohort', '', '', '2023-06-07 15:24:56', '2023-06-07 15:24:56', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/cohort.png', 0, 'attachment', 'image/png', 0),
(92, 1, '2023-06-07 15:24:56', '2023-06-07 15:24:56', '', 'dashboard', '', 'inherit', 'open', 'closed', '', 'dashboard', '', '', '2023-06-07 15:24:56', '2023-06-07 15:24:56', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/dashboard.png', 0, 'attachment', 'image/png', 0),
(93, 1, '2023-06-07 15:24:57', '2023-06-07 15:24:57', '', 'delete', '', 'inherit', 'open', 'closed', '', 'delete', '', '', '2023-06-07 15:24:57', '2023-06-07 15:24:57', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/delete.png', 0, 'attachment', 'image/png', 0),
(94, 1, '2023-06-07 15:24:58', '2023-06-07 15:24:58', '', 'dustbin', '', 'inherit', 'open', 'closed', '', 'dustbin', '', '', '2023-06-07 15:24:58', '2023-06-07 15:24:58', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/dustbin.png', 0, 'attachment', 'image/png', 0),
(95, 1, '2023-06-07 15:24:58', '2023-06-07 15:24:58', '', 'edit', '', 'inherit', 'open', 'closed', '', 'edit', '', '', '2023-06-07 15:24:58', '2023-06-07 15:24:58', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/edit.png', 0, 'attachment', 'image/png', 0),
(96, 1, '2023-06-07 15:24:59', '2023-06-07 15:24:59', '', 'logout', '', 'inherit', 'open', 'closed', '', 'logout', '', '', '2023-06-07 15:24:59', '2023-06-07 15:24:59', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/logout.png', 0, 'attachment', 'image/png', 0),
(97, 1, '2023-06-07 15:24:59', '2023-06-07 15:24:59', '', 'profile', '', 'inherit', 'open', 'closed', '', 'profile', '', '', '2023-06-07 15:24:59', '2023-06-07 15:24:59', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/profile.png', 0, 'attachment', 'image/png', 0),
(98, 1, '2023-06-07 15:25:00', '2023-06-07 15:25:00', '', 'search', '', 'inherit', 'open', 'closed', '', 'search', '', '', '2023-06-07 15:25:00', '2023-06-07 15:25:00', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/search.png', 0, 'attachment', 'image/png', 0),
(99, 1, '2023-06-07 15:25:01', '2023-06-07 15:25:01', '', 'team', '', 'inherit', 'open', 'closed', '', 'team', '', '', '2023-06-07 15:25:01', '2023-06-07 15:25:01', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/team.png', 0, 'attachment', 'image/png', 0),
(100, 1, '2023-06-07 15:55:43', '2023-06-07 15:55:43', '', 'create', '', 'inherit', 'open', 'closed', '', 'create', '', '', '2023-06-07 15:55:43', '2023-06-07 15:55:43', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/create.png', 0, 'attachment', 'image/png', 0),
(109, 1, '2023-06-07 15:59:43', '2023-06-07 15:59:43', '', 'off', '', 'inherit', 'open', 'closed', '', 'off', '', '', '2023-06-07 15:59:43', '2023-06-07 15:59:43', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/off.png', 0, 'attachment', 'image/png', 0),
(113, 1, '2023-06-07 15:59:45', '2023-06-07 15:59:45', '', 'turn-off', '', 'inherit', 'open', 'closed', '', 'turn-off', '', '', '2023-06-07 15:59:45', '2023-06-07 15:59:45', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/turn-off.png', 0, 'attachment', 'image/png', 0),
(114, 1, '2023-06-07 17:05:00', '2023-06-07 17:05:00', '', 'completed', '', 'inherit', 'open', 'closed', '', 'completed', '', '', '2023-06-07 17:05:00', '2023-06-07 17:05:00', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/completed.png', 0, 'attachment', 'image/png', 0),
(115, 1, '2023-06-07 18:36:12', '2023-06-07 18:36:12', ' ', '', '', 'publish', 'closed', 'closed', '', '115', '', '', '2023-06-07 18:36:12', '2023-06-07 18:36:12', '', 0, 'http://localhost/easy-manage/?p=115', 1, 'nav_menu_item', '', 0),
(116, 1, '2023-06-07 18:36:12', '2023-06-07 18:36:12', ' ', '', '', 'publish', 'closed', 'closed', '', '116', '', '', '2023-06-07 18:36:12', '2023-06-07 18:36:12', '', 0, 'http://localhost/easy-manage/?p=116', 2, 'nav_menu_item', '', 0),
(117, 1, '2023-06-07 18:41:48', '2023-06-07 18:41:48', ' ', '', '', 'publish', 'closed', 'closed', '', '117', '', '', '2023-06-07 18:41:48', '2023-06-07 18:41:48', '', 0, 'http://localhost/easy-manage/?p=117', 1, 'nav_menu_item', '', 0),
(118, 1, '2023-06-07 18:41:48', '2023-06-07 18:41:48', ' ', '', '', 'publish', 'closed', 'closed', '', '118', '', '', '2023-06-07 18:41:48', '2023-06-07 18:41:48', '', 0, 'http://localhost/easy-manage/?p=118', 2, 'nav_menu_item', '', 0),
(119, 1, '2023-06-07 18:41:48', '2023-06-07 18:41:48', ' ', '', '', 'publish', 'closed', 'closed', '', '119', '', '', '2023-06-07 18:41:48', '2023-06-07 18:41:48', '', 0, 'http://localhost/easy-manage/?p=119', 3, 'nav_menu_item', '', 0),
(120, 1, '2023-06-07 18:41:48', '2023-06-07 18:41:48', ' ', '', '', 'publish', 'closed', 'closed', '', '120', '', '', '2023-06-07 18:41:48', '2023-06-07 18:41:48', '', 0, 'http://localhost/easy-manage/?p=120', 4, 'nav_menu_item', '', 0),
(121, 1, '2023-06-07 18:41:48', '2023-06-07 18:41:48', ' ', '', '', 'publish', 'closed', 'closed', '', '121', '', '', '2023-06-07 18:41:48', '2023-06-07 18:41:48', '', 0, 'http://localhost/easy-manage/?p=121', 5, 'nav_menu_item', '', 0),
(122, 1, '2023-06-07 18:41:48', '2023-06-07 18:41:48', ' ', '', '', 'publish', 'closed', 'closed', '', '122', '', '', '2023-06-07 18:41:48', '2023-06-07 18:41:48', '', 0, 'http://localhost/easy-manage/?p=122', 6, 'nav_menu_item', '', 0),
(123, 1, '2023-06-07 18:41:48', '2023-06-07 18:41:48', ' ', '', '', 'publish', 'closed', 'closed', '', '123', '', '', '2023-06-07 18:41:48', '2023-06-07 18:41:48', '', 0, 'http://localhost/easy-manage/?p=123', 7, 'nav_menu_item', '', 0),
(125, 1, '2023-06-08 07:27:03', '2023-06-08 07:27:03', '<!-- wp:paragraph -->\n<p>[easy_manage type=\"type1\"]</p>\n<!-- /wp:paragraph -->', 'Admin Dashboard', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2023-06-08 07:27:03', '2023-06-08 07:27:03', '', 8, 'http://localhost/easy-manage/?p=125', 0, 'revision', '', 0),
(126, 1, '2023-06-08 08:14:36', '2023-06-08 08:14:36', '<!-- wp:paragraph -->\n<p>[easy_manage ]</p>\n<!-- /wp:paragraph -->', 'Admin Dashboard', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2023-06-08 08:14:36', '2023-06-08 08:14:36', '', 8, 'http://localhost/easy-manage/?p=126', 0, 'revision', '', 0),
(127, 1, '2023-06-08 08:16:52', '2023-06-08 08:16:52', '<!-- wp:paragraph -->\n<p>[easy_manage]</p>\n<!-- /wp:paragraph -->', 'Admin Dashboard', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2023-06-08 08:16:52', '2023-06-08 08:16:52', '', 8, 'http://localhost/easy-manage/?p=127', 0, 'revision', '', 0),
(129, 1, '2023-06-08 08:23:31', '2023-06-08 08:23:31', '<!-- wp:paragraph -->\n<p>[easymanage]</p>\n<!-- /wp:paragraph -->', 'Admin Dashboard', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2023-06-08 08:23:31', '2023-06-08 08:23:31', '', 8, 'http://localhost/easy-manage/?p=129', 0, 'revision', '', 0),
(134, 1, '2023-06-08 11:58:14', '2023-06-08 11:58:14', '', 'Admin Dashboard', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2023-06-08 11:58:14', '2023-06-08 11:58:14', '', 8, 'http://localhost/easy-manage/?p=134', 0, 'revision', '', 0),
(135, 1, '2023-06-08 11:58:34', '2023-06-08 11:58:34', '<!-- wp:paragraph -->\n<p>[easymanage]</p>\n<!-- /wp:paragraph -->', 'Admin Dashboard', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2023-06-08 11:58:34', '2023-06-08 11:58:34', '', 8, 'http://localhost/easy-manage/?p=135', 0, 'revision', '', 0),
(137, 1, '2023-06-08 12:21:42', '2023-06-08 12:21:42', '', 'Admin Dashboard', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2023-06-08 12:21:42', '2023-06-08 12:21:42', '', 8, 'http://localhost/easy-manage/?p=137', 0, 'revision', '', 0),
(138, 1, '2023-06-08 12:48:51', '2023-06-08 12:48:51', '', 'trainer-trainees-table', '', 'inherit', 'closed', 'closed', '', '52-revision-v1', '', '', '2023-06-08 12:48:51', '2023-06-08 12:48:51', '', 52, 'http://localhost/easy-manage/?p=138', 0, 'revision', '', 0),
(139, 1, '2023-06-08 12:49:23', '2023-06-08 12:49:23', '', 'admin trainers table', '', 'inherit', 'closed', 'closed', '', '19-revision-v1', '', '', '2023-06-08 12:49:23', '2023-06-08 12:49:23', '', 19, 'http://localhost/easy-manage/?p=139', 0, 'revision', '', 0),
(140, 1, '2023-06-08 12:50:16', '2023-06-08 12:50:16', '', 'admin trainees table', '', 'publish', 'closed', 'closed', '', 'admin-trainees-table', '', '', '2023-06-08 20:26:27', '2023-06-08 20:26:27', '', 0, 'http://localhost/easy-manage/?page_id=140', 0, 'page', '', 0),
(142, 1, '2023-06-08 12:50:16', '2023-06-08 12:50:16', '', 'admin trainees table', '', 'inherit', 'closed', 'closed', '', '140-revision-v1', '', '', '2023-06-08 12:50:16', '2023-06-08 12:50:16', '', 140, 'http://localhost/easy-manage/?p=142', 0, 'revision', '', 0),
(147, 1, '2023-06-08 18:07:32', '2023-06-08 18:07:32', '<!-- wp:paragraph -->\n<p>[easymanage type=\"default\"]</p>\n<!-- /wp:paragraph -->', 'Admin Dashboard', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2023-06-08 18:07:32', '2023-06-08 18:07:32', '', 8, 'http://localhost/easy-manage/?p=147', 0, 'revision', '', 0),
(148, 1, '2023-06-08 18:10:59', '2023-06-08 18:10:59', '', 'Admin Dashboard', '', 'inherit', 'closed', 'closed', '', '8-revision-v1', '', '', '2023-06-08 18:10:59', '2023-06-08 18:10:59', '', 8, 'http://localhost/easy-manage/?p=148', 0, 'revision', '', 0),
(150, 1, '2023-06-08 18:15:45', '2023-06-08 18:15:45', '<!-- wp:paragraph -->\n<p>[easymanage type=\"admin-trainees\"]</p>\n<!-- /wp:paragraph -->', 'admin trainees table', '', 'inherit', 'closed', 'closed', '', '140-revision-v1', '', '', '2023-06-08 18:15:45', '2023-06-08 18:15:45', '', 140, 'http://localhost/easy-manage/?p=150', 0, 'revision', '', 0),
(152, 1, '2023-06-08 20:26:27', '2023-06-08 20:26:27', '', 'admin trainees table', '', 'inherit', 'closed', 'closed', '', '140-revision-v1', '', '', '2023-06-08 20:26:27', '2023-06-08 20:26:27', '', 140, 'http://localhost/easy-manage/?p=152', 0, 'revision', '', 0),
(153, 1, '2023-06-08 20:30:07', '2023-06-08 20:30:07', '<!-- wp:paragraph -->\n<p>[easymanage type=\"default\"]</p>\n<!-- /wp:paragraph -->', 'trainer dashboard', '', 'inherit', 'closed', 'closed', '', '43-revision-v1', '', '', '2023-06-08 20:30:07', '2023-06-08 20:30:07', '', 43, 'http://localhost/easy-manage/?p=153', 0, 'revision', '', 0),
(154, 1, '2023-06-08 20:34:01', '2023-06-08 20:34:01', '', 'trainer dashboard', '', 'inherit', 'closed', 'closed', '', '43-revision-v1', '', '', '2023-06-08 20:34:01', '2023-06-08 20:34:01', '', 43, 'http://localhost/easy-manage/?p=154', 0, 'revision', '', 0),
(157, 1, '2023-06-09 07:14:52', '2023-06-09 07:14:52', '', 'pause', '', 'inherit', 'open', 'closed', '', 'pause', '', '', '2023-06-09 07:14:52', '2023-06-09 07:14:52', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/pause.png', 0, 'attachment', 'image/png', 0),
(158, 1, '2023-06-09 07:21:48', '2023-06-09 07:21:48', '', 'play-button', '', 'inherit', 'open', 'closed', '', 'play-button', '', '', '2023-06-09 07:21:48', '2023-06-09 07:21:48', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/play-button.png', 0, 'attachment', 'image/png', 0),
(159, 1, '2023-06-09 07:21:49', '2023-06-09 07:21:49', '', 'power-on', '', 'inherit', 'open', 'closed', '', 'power-on', '', '', '2023-06-09 07:21:49', '2023-06-09 07:21:49', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/power-on.png', 0, 'attachment', 'image/png', 0),
(160, 1, '2023-06-09 07:27:48', '2023-06-09 07:27:48', '', 'pause-button', '', 'inherit', 'open', 'closed', '', 'pause-button', '', '', '2023-06-09 07:27:48', '2023-06-09 07:27:48', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/pause-button.png', 0, 'attachment', 'image/png', 0),
(161, 1, '2023-06-09 07:29:47', '2023-06-09 07:29:47', '', 'pause (1)', '', 'inherit', 'open', 'closed', '', 'pause-1', '', '', '2023-06-09 07:29:47', '2023-06-09 07:29:47', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/pause-1.png', 0, 'attachment', 'image/png', 0),
(162, 1, '2023-06-09 07:31:42', '2023-06-09 07:31:42', '', 'pause (2)', '', 'inherit', 'open', 'closed', '', 'pause-2', '', '', '2023-06-09 07:31:42', '2023-06-09 07:31:42', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/pause-2.png', 0, 'attachment', 'image/png', 0),
(175, 1, '2023-06-11 16:15:30', '0000-00-00 00:00:00', '', 'program-managers', '', 'draft', 'closed', 'closed', '', '', '', '', '2023-06-11 16:15:30', '2023-06-11 16:15:30', '', 0, 'http://localhost/easy-manage/?page_id=175', 0, 'page', '', 0),
(177, 1, '2023-06-11 16:34:04', '2023-06-11 16:34:04', '', 'checked', '', 'inherit', 'open', 'closed', '', 'checked', '', '', '2023-06-11 16:34:04', '2023-06-11 16:34:04', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/checked.png', 0, 'attachment', 'image/png', 0),
(178, 1, '2023-06-11 16:34:05', '2023-06-11 16:34:05', '', 'complete1', '', 'inherit', 'open', 'closed', '', 'complete1', '', '', '2023-06-11 16:34:05', '2023-06-11 16:34:05', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/complete1.png', 0, 'attachment', 'image/png', 0),
(179, 1, '2023-06-11 16:44:18', '2023-06-11 16:44:18', '', 'project-management', '', 'inherit', 'open', 'closed', '', 'project-management', '', '', '2023-06-11 16:44:18', '2023-06-11 16:44:18', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/project-management.png', 0, 'attachment', 'image/png', 0),
(180, 1, '2023-06-11 16:46:46', '2023-06-11 16:46:46', '', 'project-management (1)', '', 'inherit', 'open', 'closed', '', 'project-management-1', '', '', '2023-06-11 16:46:46', '2023-06-11 16:46:46', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/project-management-1.png', 0, 'attachment', 'image/png', 0),
(183, 1, '2023-06-11 16:49:14', '2023-06-11 16:49:14', '', 'trainee group projects', '', 'publish', 'closed', 'closed', '', 'trainee-group-projects', '', '', '2023-06-11 16:49:14', '2023-06-11 16:49:14', '', 0, 'http://localhost/easy-manage/?page_id=183', 0, 'page', '', 0),
(185, 1, '2023-06-11 16:49:14', '2023-06-11 16:49:14', '', 'trainee group projects', '', 'inherit', 'closed', 'closed', '', '183-revision-v1', '', '', '2023-06-11 16:49:14', '2023-06-11 16:49:14', '', 183, 'http://localhost/easy-manage/?p=185', 0, 'revision', '', 0),
(186, 1, '2023-06-11 17:40:34', '2023-06-11 17:40:34', '', 'trainer-group-projects', '', 'publish', 'closed', 'closed', '', 'trainer-group-projects', '', '', '2023-06-11 17:40:34', '2023-06-11 17:40:34', '', 0, 'http://localhost/easy-manage/?page_id=186', 0, 'page', '', 0),
(188, 1, '2023-06-11 17:40:34', '2023-06-11 17:40:34', '', 'trainer-group-projects', '', 'inherit', 'closed', 'closed', '', '186-revision-v1', '', '', '2023-06-11 17:40:34', '2023-06-11 17:40:34', '', 186, 'http://localhost/easy-manage/?p=188', 0, 'revision', '', 0),
(189, 1, '2023-06-11 17:52:48', '2023-06-11 17:52:48', '', 'update-trainee', '', 'publish', 'closed', 'closed', '', 'update-trainee', '', '', '2023-06-11 17:52:48', '2023-06-11 17:52:48', '', 0, 'http://localhost/easy-manage/?page_id=189', 0, 'page', '', 0),
(191, 1, '2023-06-11 17:52:48', '2023-06-11 17:52:48', '', 'update-trainee', '', 'inherit', 'closed', 'closed', '', '189-revision-v1', '', '', '2023-06-11 17:52:48', '2023-06-11 17:52:48', '', 189, 'http://localhost/easy-manage/?p=191', 0, 'revision', '', 0),
(194, 1, '2023-06-12 06:53:49', '2023-06-12 06:53:49', '', 'reuse', '', 'inherit', 'open', 'closed', '', 'reuse', '', '', '2023-06-12 06:53:49', '2023-06-12 06:53:49', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/reuse.png', 0, 'attachment', 'image/png', 0),
(195, 1, '2023-06-12 07:01:48', '2023-06-12 07:01:48', '{\n    \"custom_css[easy-manage]\": {\n        \"value\": \"html{\\n\\tmargin-top: 0px !important;\\n}\",\n        \"type\": \"custom_css\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2023-06-12 07:01:48\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', '8d7bd081-d3cd-43bb-9001-69b1f3db3baf', '', '', '2023-06-12 07:01:48', '2023-06-12 07:01:48', '', 0, 'http://localhost/easy-manage/2023/06/12/8d7bd081-d3cd-43bb-9001-69b1f3db3baf/', 0, 'customize_changeset', '', 0),
(196, 1, '2023-06-12 07:01:48', '2023-06-12 07:01:48', 'html{\n	margin-top: 0px !important;\n}', 'easy-manage', '', 'publish', 'closed', 'closed', '', 'easy-manage', '', '', '2023-06-12 07:01:48', '2023-06-12 07:01:48', '', 0, 'http://localhost/easy-manage/2023/06/12/easy-manage/', 0, 'custom_css', '', 0),
(197, 1, '2023-06-12 07:01:48', '2023-06-12 07:01:48', 'html{\n	margin-top: 0px !important;\n}', 'easy-manage', '', 'inherit', 'closed', 'closed', '', '196-revision-v1', '', '', '2023-06-12 07:01:48', '2023-06-12 07:01:48', '', 196, 'http://localhost/easy-manage/?p=197', 0, 'revision', '', 0),
(198, 1, '2023-06-12 07:56:51', '2023-06-12 07:56:51', '', 'dashboard', '', 'publish', 'closed', 'closed', '', 'dashboard-2', '', '', '2023-06-12 07:56:51', '2023-06-12 07:56:51', '', 0, 'http://localhost/easy-manage/?page_id=198', 0, 'page', '', 0),
(200, 1, '2023-06-12 07:56:51', '2023-06-12 07:56:51', '', 'dashboard', '', 'inherit', 'closed', 'closed', '', '198-revision-v1', '', '', '2023-06-12 07:56:51', '2023-06-12 07:56:51', '', 198, 'http://localhost/easy-manage/?p=200', 0, 'revision', '', 0),
(201, 1, '2023-06-12 11:37:53', '2023-06-12 11:37:53', '', 'trainer', '', 'inherit', 'open', 'closed', '', 'trainer', '', '', '2023-06-12 11:37:53', '2023-06-12 11:37:53', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/trainer.png', 0, 'attachment', 'image/png', 0),
(202, 1, '2023-06-12 11:43:42', '2023-06-12 11:43:42', '', 'teacher', '', 'inherit', 'open', 'closed', '', 'teacher', '', '', '2023-06-12 11:43:42', '2023-06-12 11:43:42', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/teacher.png', 0, 'attachment', 'image/png', 0),
(205, 1, '2023-06-12 11:48:45', '2023-06-12 11:48:45', '', 'Cohorts', '', 'publish', 'closed', 'closed', '', 'cohorts', '', '', '2023-06-12 11:48:45', '2023-06-12 11:48:45', '', 0, 'http://localhost/easy-manage/?page_id=205', 0, 'page', '', 0),
(207, 1, '2023-06-12 11:48:45', '2023-06-12 11:48:45', '', 'Cohorts', '', 'inherit', 'closed', 'closed', '', '205-revision-v1', '', '', '2023-06-12 11:48:45', '2023-06-12 11:48:45', '', 205, 'http://localhost/easy-manage/?p=207', 0, 'revision', '', 0),
(222, 1, '2023-06-12 12:26:13', '2023-06-12 12:26:13', '', 'create cohort', '', 'publish', 'closed', 'closed', '', 'create-cohort', '', '', '2023-06-12 12:26:13', '2023-06-12 12:26:13', '', 0, 'http://localhost/easy-manage/?page_id=222', 0, 'page', '', 0),
(224, 1, '2023-06-12 12:26:13', '2023-06-12 12:26:13', '', 'create cohort', '', 'inherit', 'closed', 'closed', '', '222-revision-v1', '', '', '2023-06-12 12:26:13', '2023-06-12 12:26:13', '', 222, 'http://localhost/easy-manage/?p=224', 0, 'revision', '', 0),
(225, 1, '2023-06-12 13:02:18', '2023-06-12 13:02:18', '', 'pm-trainers-list', '', 'publish', 'closed', 'closed', '', 'pm-trainers-list', '', '', '2023-06-12 13:02:18', '2023-06-12 13:02:18', '', 0, 'http://localhost/easy-manage/?page_id=225', 0, 'page', '', 0),
(227, 1, '2023-06-12 13:02:18', '2023-06-12 13:02:18', '', 'pm-trainers-list', '', 'inherit', 'closed', 'closed', '', '225-revision-v1', '', '', '2023-06-12 13:02:18', '2023-06-12 13:02:18', '', 225, 'http://localhost/easy-manage/?p=227', 0, 'revision', '', 0),
(230, 1, '2023-06-12 13:05:53', '2023-06-12 13:05:53', '', 'customer', '', 'inherit', 'open', 'closed', '', 'customer', '', '', '2023-06-12 13:05:53', '2023-06-12 13:05:53', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/customer.png', 0, 'attachment', 'image/png', 0),
(231, 1, '2023-06-12 13:39:17', '2023-06-12 13:39:17', '', 'admin pm list', '', 'publish', 'closed', 'closed', '', 'admin-pm-list', '', '', '2023-06-12 13:39:17', '2023-06-12 13:39:17', '', 0, 'http://localhost/easy-manage/?page_id=231', 0, 'page', '', 0),
(233, 1, '2023-06-12 13:39:17', '2023-06-12 13:39:17', '', 'admin pm list', '', 'inherit', 'closed', 'closed', '', '231-revision-v1', '', '', '2023-06-12 13:39:17', '2023-06-12 13:39:17', '', 231, 'http://localhost/easy-manage/?p=233', 0, 'revision', '', 0),
(236, 1, '2023-06-12 13:54:49', '2023-06-12 13:54:49', '<!-- wp:paragraph -->\n<p>[search_bar]</p>\n<!-- /wp:paragraph -->', 'short code', '', 'trash', 'closed', 'closed', '', 'short-code__trashed', '', '', '2023-06-12 15:04:30', '2023-06-12 15:04:30', '', 0, 'http://localhost/easy-manage/?page_id=236', 0, 'page', '', 0),
(238, 1, '2023-06-12 13:54:49', '2023-06-12 13:54:49', '<!-- wp:paragraph -->\n<p>[search_bar]</p>\n<!-- /wp:paragraph -->', 'short code', '', 'inherit', 'closed', 'closed', '', '236-revision-v1', '', '', '2023-06-12 13:54:49', '2023-06-12 13:54:49', '', 236, 'http://localhost/easy-manage/?p=238', 0, 'revision', '', 0),
(239, 1, '2023-06-12 15:06:23', '2023-06-12 15:06:23', '', 'project', '', 'inherit', 'open', 'closed', '', 'project', '', '', '2023-06-12 15:06:23', '2023-06-12 15:06:23', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/project.png', 0, 'attachment', 'image/png', 0),
(240, 1, '2023-06-12 15:08:42', '2023-06-12 15:08:42', '', 'trainer-projects', '', 'publish', 'closed', 'closed', '', 'trainer-projects', '', '', '2023-06-12 15:08:42', '2023-06-12 15:08:42', '', 0, 'http://localhost/easy-manage/?page_id=240', 0, 'page', '', 0),
(242, 1, '2023-06-12 15:08:42', '2023-06-12 15:08:42', '', 'trainer-projects', '', 'inherit', 'closed', 'closed', '', '240-revision-v1', '', '', '2023-06-12 15:08:42', '2023-06-12 15:08:42', '', 240, 'http://localhost/easy-manage/?p=242', 0, 'revision', '', 0),
(245, 1, '2023-06-12 15:27:36', '2023-06-12 15:27:36', '', 'dummy', '', 'trash', 'closed', 'closed', '', 'dummy__trashed', '', '', '2023-06-27 21:07:55', '2023-06-27 21:07:55', '', 0, 'http://localhost/easy-manage/?page_id=245', 0, 'page', '', 0),
(247, 1, '2023-06-12 15:27:36', '2023-06-12 15:27:36', '', 'dummy', '', 'inherit', 'closed', 'closed', '', '245-revision-v1', '', '', '2023-06-12 15:27:36', '2023-06-12 15:27:36', '', 245, 'http://localhost/easy-manage/?p=247', 0, 'revision', '', 0),
(248, 1, '2023-06-13 08:19:55', '2023-06-13 08:19:55', '', 'Navy Blue Modern Business Logo', '', 'inherit', 'open', 'closed', '', 'navy-blue-modern-business-logo', '', '', '2023-06-13 08:19:55', '2023-06-13 08:19:55', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/Navy-Blue-Modern-Business-Logo.png', 0, 'attachment', 'image/png', 0),
(250, 1, '2023-06-14 11:54:44', '2023-06-14 11:54:44', '', 'single-page', '', 'publish', 'closed', 'closed', '', 'single-page', '', '', '2023-06-14 11:54:44', '2023-06-14 11:54:44', '', 0, 'http://localhost/easy-manage/?page_id=250', 0, 'page', '', 0),
(252, 1, '2023-06-14 11:54:44', '2023-06-14 11:54:44', '', 'single-page', '', 'inherit', 'closed', 'closed', '', '250-revision-v1', '', '', '2023-06-14 11:54:44', '2023-06-14 11:54:44', '', 250, 'http://localhost/easy-manage/?p=252', 0, 'revision', '', 0),
(253, 1, '2023-06-14 12:20:35', '2023-06-14 12:20:35', '', 'right-arrow', '', 'inherit', 'open', 'closed', '', 'right-arrow', '', '', '2023-06-14 12:20:35', '2023-06-14 12:20:35', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/right-arrow.png', 0, 'attachment', 'image/png', 0);
INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(254, 1, '2023-06-14 12:32:57', '2023-06-14 12:32:57', '', 'arrow-right', '', 'inherit', 'open', 'closed', '', 'arrow-right', '', '', '2023-06-14 12:32:57', '2023-06-14 12:32:57', '', 0, 'http://localhost/easy-manage/wp-content/uploads/2023/06/arrow-right.png', 0, 'attachment', 'image/png', 0),
(255, 1, '2023-06-14 14:08:48', '2023-06-14 14:08:48', '<!-- wp:paragraph -->\n<p>[search_bar]</p>\n<!-- /wp:paragraph -->', 'shortcode', '', 'publish', 'closed', 'closed', '', 'shortcode', '', '', '2023-06-14 14:12:57', '2023-06-14 14:12:57', '', 0, 'http://localhost/easy-manage/?page_id=255', 0, 'page', '', 0),
(257, 1, '2023-06-14 14:08:48', '2023-06-14 14:08:48', '<!-- wp:paragraph -->\n<p>[search_bar]</p>\n<!-- /wp:paragraph -->', 'shortcode', '', 'inherit', 'closed', 'closed', '', '255-revision-v1', '', '', '2023-06-14 14:08:48', '2023-06-14 14:08:48', '', 255, 'http://localhost/easy-manage/?p=257', 0, 'revision', '', 0),
(258, 1, '2023-06-14 14:12:34', '2023-06-14 14:12:34', '<!-- wp:paragraph -->\n<p>[search]</p>\n<!-- /wp:paragraph -->', 'shortcode', '', 'inherit', 'closed', 'closed', '', '255-revision-v1', '', '', '2023-06-14 14:12:34', '2023-06-14 14:12:34', '', 255, 'http://localhost/easy-manage/?p=258', 0, 'revision', '', 0),
(259, 1, '2023-06-14 14:12:57', '2023-06-14 14:12:57', '<!-- wp:paragraph -->\n<p>[search_bar]</p>\n<!-- /wp:paragraph -->', 'shortcode', '', 'inherit', 'closed', 'closed', '', '255-revision-v1', '', '', '2023-06-14 14:12:57', '2023-06-14 14:12:57', '', 255, 'http://localhost/easy-manage/?p=259', 0, 'revision', '', 0),
(267, 1, '2023-06-23 13:19:36', '2023-06-23 13:19:36', '', 'Group projects', '', 'publish', 'closed', 'closed', '', 'group-projects', '', '', '2023-06-23 13:19:36', '2023-06-23 13:19:36', '', 0, 'http://localhost/easy-manage/?page_id=267', 0, 'page', '', 0),
(269, 1, '2023-06-23 13:19:36', '2023-06-23 13:19:36', '', 'Group projects', '', 'inherit', 'closed', 'closed', '', '267-revision-v1', '', '', '2023-06-23 13:19:36', '2023-06-23 13:19:36', '', 267, 'http://localhost/easy-manage/?p=269', 0, 'revision', '', 0),
(270, 1, '2023-06-23 13:19:57', '2023-06-23 13:19:57', '', 'Individual projects', '', 'publish', 'closed', 'closed', '', 'individual-projects', '', '', '2023-06-23 13:19:57', '2023-06-23 13:19:57', '', 0, 'http://localhost/easy-manage/?page_id=270', 0, 'page', '', 0),
(272, 1, '2023-06-23 13:19:57', '2023-06-23 13:19:57', '', 'Individual projects', '', 'inherit', 'closed', 'closed', '', '270-revision-v1', '', '', '2023-06-23 13:19:57', '2023-06-23 13:19:57', '', 270, 'http://localhost/easy-manage/?p=272', 0, 'revision', '', 0),
(273, 1, '2023-06-24 10:37:46', '2023-06-24 10:37:46', '', 'completed project', '', 'inherit', 'closed', 'closed', '', '34-revision-v1', '', '', '2023-06-24 10:37:46', '2023-06-24 10:37:46', '', 34, 'http://localhost/easy-manage/?p=273', 0, 'revision', '', 0),
(274, 1, '2023-06-27 05:35:10', '2023-06-27 05:35:10', '', 'search results', '', 'publish', 'closed', 'closed', '', 'search-results', '', '', '2023-06-28 13:59:59', '2023-06-28 13:59:59', '', 0, 'http://localhost/easy-manage/?page_id=274', 0, 'page', '', 0),
(276, 1, '2023-06-27 05:35:10', '2023-06-27 05:35:10', '<!-- wp:paragraph -->\n<p>[search_results]</p>\n<!-- /wp:paragraph -->', 'search results', '', 'inherit', 'closed', 'closed', '', '274-revision-v1', '', '', '2023-06-27 05:35:10', '2023-06-27 05:35:10', '', 274, 'http://localhost/easy-manage/?p=276', 0, 'revision', '', 0),
(277, 1, '2023-06-27 05:47:24', '2023-06-27 05:47:24', '<!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:group {\"layout\":{\"type\":\"flex\",\"flexWrap\":\"nowrap\"}} -->\n<div class=\"wp-block-group\"><!-- wp:shortcode -->\n[search_results]\n<!-- /wp:shortcode --></div>\n<!-- /wp:group -->', 'search results', '', 'trash', 'closed', 'closed', '', 'search-results-2__trashed', '', '', '2023-06-27 06:26:59', '2023-06-27 06:26:59', '', 0, 'http://localhost/easy-manage/?page_id=277', 0, 'page', '', 0),
(279, 1, '2023-06-27 05:47:24', '2023-06-27 05:47:24', '<!-- wp:paragraph -->\n<p>[search_results]</p>\n<!-- /wp:paragraph -->', 'search results', '', 'inherit', 'closed', 'closed', '', '277-revision-v1', '', '', '2023-06-27 05:47:24', '2023-06-27 05:47:24', '', 277, 'http://localhost/easy-manage/?p=279', 0, 'revision', '', 0),
(281, 1, '2023-06-27 05:53:01', '2023-06-27 05:53:01', '<!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:group {\"layout\":{\"type\":\"flex\",\"flexWrap\":\"nowrap\"}} -->\n<div class=\"wp-block-group\"><!-- wp:shortcode -->\n[search_results]\n<!-- /wp:shortcode --></div>\n<!-- /wp:group -->', 'search results', '', 'inherit', 'closed', 'closed', '', '277-revision-v1', '', '', '2023-06-27 05:53:01', '2023-06-27 05:53:01', '', 277, 'http://localhost/easy-manage/?p=281', 0, 'revision', '', 0),
(282, 1, '2023-06-27 10:11:55', '2023-06-27 10:11:55', '', 'deactivated projects', '', 'publish', 'closed', 'closed', '', 'deactivated-projects', '', '', '2023-06-27 10:11:55', '2023-06-27 10:11:55', '', 0, 'http://localhost/easy-manage/?page_id=282', 0, 'page', '', 0),
(284, 1, '2023-06-27 10:11:55', '2023-06-27 10:11:55', '', 'deactivated projects', '', 'inherit', 'closed', 'closed', '', '282-revision-v1', '', '', '2023-06-27 10:11:55', '2023-06-27 10:11:55', '', 282, 'http://localhost/easy-manage/?p=284', 0, 'revision', '', 0),
(285, 1, '2023-06-27 21:48:10', '2023-06-27 21:48:10', '', 'deleted trainers', '', 'publish', 'closed', 'closed', '', 'deleted-trainers', '', '', '2023-06-27 21:48:10', '2023-06-27 21:48:10', '', 0, 'http://localhost/easy-manage/?page_id=285', 0, 'page', '', 0),
(286, 1, '2023-06-27 21:47:38', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'closed', 'closed', '', '', '', '', '2023-06-27 21:47:38', '0000-00-00 00:00:00', '', 0, 'http://localhost/easy-manage/?page_id=286', 0, 'page', '', 0),
(287, 1, '2023-06-27 21:48:10', '2023-06-27 21:48:10', '', 'deleted trainers', '', 'inherit', 'closed', 'closed', '', '285-revision-v1', '', '', '2023-06-27 21:48:10', '2023-06-27 21:48:10', '', 285, 'http://localhost/easy-manage/?p=287', 0, 'revision', '', 0),
(288, 1, '2023-06-28 13:59:59', '2023-06-28 13:59:59', '', 'search results', '', 'inherit', 'closed', 'closed', '', '274-revision-v1', '', '', '2023-06-28 13:59:59', '2023-06-28 13:59:59', '', 274, 'http://localhost/easy-manage/?p=288', 0, 'revision', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_termmeta`
--

CREATE TABLE `wp_termmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_terms`
--

CREATE TABLE `wp_terms` (
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL DEFAULT '',
  `slug` varchar(200) NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Uncategorized', 'uncategorized', 0),
(2, 'Admin Menu', 'admin-menu', 0),
(3, 'PM Menu', 'pm-menu', 0),
(4, 'Trainer Menu', 'trainer-menu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_relationships`
--

CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `term_order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_term_relationships`
--

INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 1, 0),
(69, 2, 0),
(70, 2, 0),
(71, 2, 0),
(72, 2, 0),
(73, 2, 0),
(75, 2, 0),
(115, 3, 0),
(116, 3, 0),
(117, 4, 0),
(118, 4, 0),
(119, 4, 0),
(120, 4, 0),
(121, 4, 0),
(122, 4, 0),
(123, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_taxonomy`
--

CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `taxonomy` varchar(32) NOT NULL DEFAULT '',
  `description` longtext NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `count` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 1),
(2, 2, 'nav_menu', '', 0, 6),
(3, 3, 'nav_menu', '', 0, 2),
(4, 4, 'nav_menu', '', 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `wp_usermeta`
--

CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_usermeta`
--

INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'easy-manage'),
(2, 1, 'first_name', ''),
(3, 1, 'last_name', ''),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'syntax_highlighting', 'true'),
(7, 1, 'comment_shortcuts', 'false'),
(8, 1, 'admin_color', 'fresh'),
(9, 1, 'use_ssl', '0'),
(10, 1, 'show_admin_bar_front', 'true'),
(11, 1, 'locale', ''),
(12, 1, 'wp_capabilities', 'a:1:{s:13:\"administrator\";b:1;}'),
(13, 1, 'wp_user_level', '10'),
(14, 1, 'dismissed_wp_pointers', ''),
(15, 1, 'show_welcome_panel', '1'),
(17, 1, 'wp_dashboard_quick_press_last_post_id', '264'),
(18, 1, 'managenav-menuscolumnshidden', 'a:5:{i:0;s:11:\"link-target\";i:1;s:11:\"css-classes\";i:2;s:3:\"xfn\";i:3;s:11:\"description\";i:4;s:15:\"title-attribute\";}'),
(19, 1, 'metaboxhidden_nav-menus', 'a:1:{i:0;s:12:\"add-post_tag\";}'),
(20, 1, 'nav_menu_recently_edited', '4'),
(21, 1, 'wp_persisted_preferences', 'a:2:{s:14:\"core/edit-post\";a:2:{s:26:\"isComplementaryAreaVisible\";b:1;s:12:\"welcomeGuide\";b:0;}s:9:\"_modified\";s:24:\"2023-06-27T05:53:15.947Z\";}'),
(1004, 67, 'nickname', 'Daniel'),
(1005, 67, 'first_name', ''),
(1006, 67, 'last_name', ''),
(1007, 67, 'description', ''),
(1008, 67, 'rich_editing', 'true'),
(1009, 67, 'syntax_highlighting', 'true'),
(1010, 67, 'comment_shortcuts', 'false'),
(1011, 67, 'admin_color', 'fresh'),
(1012, 67, 'use_ssl', '0'),
(1013, 67, 'show_admin_bar_front', 'true'),
(1014, 67, 'locale', ''),
(1015, 67, 'wp_capabilities', 'a:1:{s:15:\"program_manager\";b:1;}'),
(1016, 67, 'wp_user_level', '0'),
(1017, 67, 'dismissed_wp_pointers', ''),
(1018, 67, 'activate', '0'),
(1019, 68, 'nickname', 'Jonathan'),
(1020, 68, 'first_name', ''),
(1021, 68, 'last_name', ''),
(1022, 68, 'description', ''),
(1023, 68, 'rich_editing', 'true'),
(1024, 68, 'syntax_highlighting', 'true'),
(1025, 68, 'comment_shortcuts', 'false'),
(1026, 68, 'admin_color', 'fresh'),
(1027, 68, 'use_ssl', '0'),
(1028, 68, 'show_admin_bar_front', 'true'),
(1029, 68, 'locale', ''),
(1030, 68, 'wp_capabilities', 'a:1:{s:7:\"trainer\";b:1;}'),
(1031, 68, 'wp_user_level', '0'),
(1032, 68, 'dismissed_wp_pointers', ''),
(1033, 68, 'activate', '0'),
(1038, 69, 'nickname', 'Brian'),
(1039, 69, 'first_name', ''),
(1040, 69, 'last_name', ''),
(1041, 69, 'description', ''),
(1042, 69, 'rich_editing', 'true'),
(1043, 69, 'syntax_highlighting', 'true'),
(1044, 69, 'comment_shortcuts', 'false'),
(1045, 69, 'admin_color', 'fresh'),
(1046, 69, 'use_ssl', '0'),
(1047, 69, 'show_admin_bar_front', 'true'),
(1048, 69, 'locale', ''),
(1049, 69, 'wp_capabilities', 'a:1:{s:7:\"trainee\";b:1;}'),
(1050, 69, 'wp_user_level', '0'),
(1051, 69, 'dismissed_wp_pointers', ''),
(1052, 69, 'activate', '0'),
(1054, 70, 'nickname', 'Joy'),
(1055, 70, 'first_name', ''),
(1056, 70, 'last_name', ''),
(1057, 70, 'description', ''),
(1058, 70, 'rich_editing', 'true'),
(1059, 70, 'syntax_highlighting', 'true'),
(1060, 70, 'comment_shortcuts', 'false'),
(1061, 70, 'admin_color', 'fresh'),
(1062, 70, 'use_ssl', '0'),
(1063, 70, 'show_admin_bar_front', 'true'),
(1064, 70, 'locale', ''),
(1065, 70, 'wp_capabilities', 'a:1:{s:7:\"trainee\";b:1;}'),
(1066, 70, 'wp_user_level', '0'),
(1067, 70, 'dismissed_wp_pointers', ''),
(1068, 70, 'activate', '0'),
(1069, 71, 'nickname', 'Kores'),
(1070, 71, 'first_name', ''),
(1071, 71, 'last_name', ''),
(1072, 71, 'description', ''),
(1073, 71, 'rich_editing', 'true'),
(1074, 71, 'syntax_highlighting', 'true'),
(1075, 71, 'comment_shortcuts', 'false'),
(1076, 71, 'admin_color', 'fresh'),
(1077, 71, 'use_ssl', '0'),
(1078, 71, 'show_admin_bar_front', 'true'),
(1079, 71, 'locale', ''),
(1080, 71, 'wp_capabilities', 'a:1:{s:7:\"trainee\";b:1;}'),
(1081, 71, 'wp_user_level', '0'),
(1082, 71, 'dismissed_wp_pointers', ''),
(1083, 71, 'activate', '0'),
(1084, 72, 'nickname', 'Kim'),
(1085, 72, 'first_name', ''),
(1086, 72, 'last_name', ''),
(1087, 72, 'description', ''),
(1088, 72, 'rich_editing', 'true'),
(1089, 72, 'syntax_highlighting', 'true'),
(1090, 72, 'comment_shortcuts', 'false'),
(1091, 72, 'admin_color', 'fresh'),
(1092, 72, 'use_ssl', '0'),
(1093, 72, 'show_admin_bar_front', 'true'),
(1094, 72, 'locale', ''),
(1095, 72, 'wp_capabilities', 'a:1:{s:7:\"trainee\";b:1;}'),
(1096, 72, 'wp_user_level', '0'),
(1097, 72, 'dismissed_wp_pointers', ''),
(1098, 72, 'activate', '0'),
(1101, 1, 'session_tokens', 'a:3:{s:64:\"57e319bfdfc611d05450314dce40b1cff3e52f8b6ebb4c2c38210ae096289417\";a:4:{s:10:\"expiration\";i:1688033487;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36\";s:5:\"login\";i:1687860687;}s:64:\"da38bd6a107ff347be9166bf17e8fc575220ea96d6130014c6c4faccc6df2ca6\";a:4:{s:10:\"expiration\";i:1688075249;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36\";s:5:\"login\";i:1687902449;}s:64:\"ec8067f99b3af77ba1f2dbb85138da3d5a7ca8287b2993244612f0a90d7b0217\";a:4:{s:10:\"expiration\";i:1688132224;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:111:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36\";s:5:\"login\";i:1687959424;}}'),
(1102, 68, 'trainer_role', 'trainer'),
(1103, 67, 'trainer_role', 'trainer'),
(1104, 73, 'nickname', 'Hope'),
(1105, 73, 'first_name', ''),
(1106, 73, 'last_name', ''),
(1107, 73, 'description', ''),
(1108, 73, 'rich_editing', 'true'),
(1109, 73, 'syntax_highlighting', 'true'),
(1110, 73, 'comment_shortcuts', 'false'),
(1111, 73, 'admin_color', 'fresh'),
(1112, 73, 'use_ssl', '0'),
(1113, 73, 'show_admin_bar_front', 'true'),
(1114, 73, 'locale', ''),
(1115, 73, 'wp_capabilities', 'a:1:{s:15:\"program_manager\";b:1;}'),
(1116, 73, 'wp_user_level', '0'),
(1117, 73, 'dismissed_wp_pointers', ''),
(1118, 73, 'activate', '0'),
(1119, 74, 'nickname', 'sam'),
(1120, 74, 'first_name', ''),
(1121, 74, 'last_name', ''),
(1122, 74, 'description', ''),
(1123, 74, 'rich_editing', 'true'),
(1124, 74, 'syntax_highlighting', 'true'),
(1125, 74, 'comment_shortcuts', 'false'),
(1126, 74, 'admin_color', 'fresh'),
(1127, 74, 'use_ssl', '0'),
(1128, 74, 'show_admin_bar_front', 'true'),
(1129, 74, 'locale', ''),
(1130, 74, 'wp_capabilities', 'a:1:{s:7:\"trainer\";b:1;}'),
(1131, 74, 'wp_user_level', '0'),
(1132, 74, 'dismissed_wp_pointers', ''),
(1133, 74, 'activate', '0'),
(1134, 75, 'nickname', 'mercy'),
(1135, 75, 'first_name', ''),
(1136, 75, 'last_name', ''),
(1137, 75, 'description', ''),
(1138, 75, 'rich_editing', 'true'),
(1139, 75, 'syntax_highlighting', 'true'),
(1140, 75, 'comment_shortcuts', 'false'),
(1141, 75, 'admin_color', 'fresh'),
(1142, 75, 'use_ssl', '0'),
(1143, 75, 'show_admin_bar_front', 'true'),
(1144, 75, 'locale', ''),
(1145, 75, 'wp_capabilities', 'a:1:{s:7:\"trainee\";b:1;}'),
(1146, 75, 'wp_user_level', '0'),
(1147, 75, 'dismissed_wp_pointers', ''),
(1148, 75, 'activate', '0'),
(1149, 76, 'nickname', 'milly'),
(1150, 76, 'first_name', ''),
(1151, 76, 'last_name', ''),
(1152, 76, 'description', ''),
(1153, 76, 'rich_editing', 'true'),
(1154, 76, 'syntax_highlighting', 'true'),
(1155, 76, 'comment_shortcuts', 'false'),
(1156, 76, 'admin_color', 'fresh'),
(1157, 76, 'use_ssl', '0'),
(1158, 76, 'show_admin_bar_front', 'true'),
(1159, 76, 'locale', ''),
(1160, 76, 'wp_capabilities', 'a:1:{s:7:\"trainee\";b:1;}'),
(1161, 76, 'wp_user_level', '0'),
(1162, 76, 'dismissed_wp_pointers', ''),
(1163, 76, 'activate', '0'),
(1164, 77, 'nickname', 'Allan'),
(1165, 77, 'first_name', ''),
(1166, 77, 'last_name', ''),
(1167, 77, 'description', ''),
(1168, 77, 'rich_editing', 'true'),
(1169, 77, 'syntax_highlighting', 'true'),
(1170, 77, 'comment_shortcuts', 'false'),
(1171, 77, 'admin_color', 'fresh'),
(1172, 77, 'use_ssl', '0'),
(1173, 77, 'show_admin_bar_front', 'true'),
(1174, 77, 'locale', ''),
(1175, 77, 'wp_capabilities', 'a:1:{s:15:\"program_manager\";b:1;}'),
(1176, 77, 'wp_user_level', '0'),
(1177, 77, 'dismissed_wp_pointers', ''),
(1178, 77, 'activate', '0');

-- --------------------------------------------------------

--
-- Table structure for table `wp_users`
--

CREATE TABLE `wp_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(255) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT 0,
  `display_name` varchar(250) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'easy-manage', '$P$BGrrvsetLb65.j6woyy/FA7xcJQTR61', 'easy-manage', 'wakemanja007@gmail.com', 'http://localhost/easy-manage', '2023-06-07 11:05:19', '', 0, 'easy-manage'),
(67, 'Daniel', '$P$BxWgJHd0sbvhPxE.K5dC7ADKSfK0D00', 'daniel', 'mark@gmail.com', '', '2023-06-26 07:38:32', '', 0, 'Mark'),
(68, 'Jonathan', '$P$BXCJPe6XEqw2YJdghUXdnElz9TKHnc/', 'joel-2', 'joel@gmail.com', '', '2023-06-26 07:47:54', '', 0, 'Joel'),
(69, 'Brian', '$P$B2GdUcXPgvcWnfiNlWC8pI8/Q.uweF0', 'brian', 'brian@gmail.com', '', '2023-06-26 09:30:45', '', 0, 'Brian'),
(70, 'Joy', '$P$BX77VsO2IKhG5Zm3b99e0HuXkmig7x1', 'joy', 'joy@gmail.com', '', '2023-06-26 09:45:20', '', 0, 'Joy'),
(71, 'Kores', '$P$BanZ.XSkMnUdl1MOG.uhwwppVQ7JcS/', 'kores', 'kores@gmail.com', '', '2023-06-26 09:45:56', '', 0, 'Kores'),
(72, 'Kim', '$P$B7vtFWWuDKyp1B5Yliy0rtGL0w4wa00', 'kim', 'kim@gmail.com', '', '2023-06-26 09:46:35', '', 0, 'Kim'),
(73, 'Hope', '$P$ByG5yG3VDV.7llo6cLsiLfRuNFS60z.', 'hope', 'hope@gmail.com', '', '2023-06-29 07:36:07', '', 0, 'Hope'),
(74, 'sam', '$P$B/mojStxfmE9ZiIp4xkslJLPdXR3WL1', 'sam', 'sam@gmail.com', '', '2023-06-29 07:44:05', '', 0, 'sam'),
(75, 'mercy', '$P$BbSXC8L09fa6A7NysUJasHZDltvsNB1', 'mercy', 'mercy@gmail.com', '', '2023-06-29 07:48:10', '', 0, 'mercy'),
(76, 'milly', '$P$B52rPwrtQKoBIY3q9rMzXt1.V8Ybuo.', 'milly', 'milly@gmail.com', '', '2023-06-29 07:51:18', '', 0, 'milly'),
(77, 'Allan', '$P$BBeEs8QmrYLI2HWzNm4afvQ0goRTI4/', 'allan', 'allan@gmail.com', '', '2023-07-04 12:56:51', '', 0, 'Allan');

-- --------------------------------------------------------

--
-- Table structure for table `wp_wpmailsmtp_debug_events`
--

CREATE TABLE `wp_wpmailsmtp_debug_events` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text DEFAULT NULL,
  `initiator` text DEFAULT NULL,
  `event_type` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_wpmailsmtp_debug_events`
--

INSERT INTO `wp_wpmailsmtp_debug_events` (`id`, `content`, `initiator`, `event_type`, `created_at`) VALUES
(1, 'Mailer: Google / Gmail\r\n{\n  \"error\": {\n    \"code\": 401,\n    \"message\": \"Request is missing required authentication credential. Expected OAuth 2 access token, login cookie or other valid authentication credential. See https://developers.google.com/identity/sign-in/web/devconsole-project.\",\n    \"errors\": [\n      {\n        \"message\": \"Login Required.\",\n        \"domain\": \"global\",\n        \"reason\": \"required\",\n        \"location\": \"Authorization\",\n        \"locationType\": \"header\"\n      }\n    ],\n    \"status\": \"UNAUTHENTICATED\",\n    \"details\": [\n      {\n        \"@type\": \"type.googleapis.com/google.rpc.ErrorInfo\",\n        \"reason\": \"CREDENTIALS_MISSING\",\n        \"domain\": \"googleapis.com\",\n        \"metadata\": {\n          \"service\": \"gmail.googleapis.com\",\n          \"method\": \"caribou.api.proto.MailboxService.SendMessage\"\n        }\n      }\n    ]\n  }\n}', '{\"file\":\"C:\\\\xampp\\\\htdocs\\\\easy-manage\\\\wp-includes\\\\user.php\",\"line\":2650}', 0, '2023-06-20 04:33:34'),
(2, 'Mailer: Google / Gmail\r\n{\n  \"error\": {\n    \"code\": 401,\n    \"message\": \"Request is missing required authentication credential. Expected OAuth 2 access token, login cookie or other valid authentication credential. See https://developers.google.com/identity/sign-in/web/devconsole-project.\",\n    \"errors\": [\n      {\n        \"message\": \"Login Required.\",\n        \"domain\": \"global\",\n        \"reason\": \"required\",\n        \"location\": \"Authorization\",\n        \"locationType\": \"header\"\n      }\n    ],\n    \"status\": \"UNAUTHENTICATED\",\n    \"details\": [\n      {\n        \"@type\": \"type.googleapis.com/google.rpc.ErrorInfo\",\n        \"reason\": \"CREDENTIALS_MISSING\",\n        \"domain\": \"googleapis.com\",\n        \"metadata\": {\n          \"service\": \"gmail.googleapis.com\",\n          \"method\": \"caribou.api.proto.MailboxService.SendMessage\"\n        }\n      }\n    ]\n  }\n}', '{\"file\":\"C:\\\\xampp\\\\htdocs\\\\easy-manage\\\\wp-includes\\\\user.php\",\"line\":2650}', 0, '2023-06-20 04:37:30'),
(3, 'Mailer: Google / Gmail\r\n{\n  \"error\": {\n    \"code\": 401,\n    \"message\": \"Request is missing required authentication credential. Expected OAuth 2 access token, login cookie or other valid authentication credential. See https://developers.google.com/identity/sign-in/web/devconsole-project.\",\n    \"errors\": [\n      {\n        \"message\": \"Login Required.\",\n        \"domain\": \"global\",\n        \"reason\": \"required\",\n        \"location\": \"Authorization\",\n        \"locationType\": \"header\"\n      }\n    ],\n    \"status\": \"UNAUTHENTICATED\",\n    \"details\": [\n      {\n        \"@type\": \"type.googleapis.com/google.rpc.ErrorInfo\",\n        \"reason\": \"CREDENTIALS_MISSING\",\n        \"domain\": \"googleapis.com\",\n        \"metadata\": {\n          \"service\": \"gmail.googleapis.com\",\n          \"method\": \"caribou.api.proto.MailboxService.SendMessage\"\n        }\n      }\n    ]\n  }\n}', '{\"file\":\"C:\\\\xampp\\\\htdocs\\\\easy-manage\\\\wp-includes\\\\user.php\",\"line\":2710}', 0, '2023-06-20 04:37:31'),
(4, 'Mailer: Google / Gmail\r\n{\n  \"error\": {\n    \"code\": 401,\n    \"message\": \"Request is missing required authentication credential. Expected OAuth 2 access token, login cookie or other valid authentication credential. See https://developers.google.com/identity/sign-in/web/devconsole-project.\",\n    \"errors\": [\n      {\n        \"message\": \"Login Required.\",\n        \"domain\": \"global\",\n        \"reason\": \"required\",\n        \"location\": \"Authorization\",\n        \"locationType\": \"header\"\n      }\n    ],\n    \"status\": \"UNAUTHENTICATED\",\n    \"details\": [\n      {\n        \"@type\": \"type.googleapis.com/google.rpc.ErrorInfo\",\n        \"reason\": \"CREDENTIALS_MISSING\",\n        \"domain\": \"googleapis.com\",\n        \"metadata\": {\n          \"method\": \"caribou.api.proto.MailboxService.SendMessage\",\n          \"service\": \"gmail.googleapis.com\"\n        }\n      }\n    ]\n  }\n}', '{\"file\":\"C:\\\\xampp\\\\htdocs\\\\easy-manage\\\\wp-includes\\\\user.php\",\"line\":2650}', 0, '2023-06-20 04:38:11'),
(5, 'Mailer: Google / Gmail\r\n{\n  \"error\": {\n    \"code\": 401,\n    \"message\": \"Request is missing required authentication credential. Expected OAuth 2 access token, login cookie or other valid authentication credential. See https://developers.google.com/identity/sign-in/web/devconsole-project.\",\n    \"errors\": [\n      {\n        \"message\": \"Login Required.\",\n        \"domain\": \"global\",\n        \"reason\": \"required\",\n        \"location\": \"Authorization\",\n        \"locationType\": \"header\"\n      }\n    ],\n    \"status\": \"UNAUTHENTICATED\",\n    \"details\": [\n      {\n        \"@type\": \"type.googleapis.com/google.rpc.ErrorInfo\",\n        \"reason\": \"CREDENTIALS_MISSING\",\n        \"domain\": \"googleapis.com\",\n        \"metadata\": {\n          \"method\": \"caribou.api.proto.MailboxService.SendMessage\",\n          \"service\": \"gmail.googleapis.com\"\n        }\n      }\n    ]\n  }\n}', '{\"file\":\"C:\\\\xampp\\\\htdocs\\\\easy-manage\\\\wp-includes\\\\user.php\",\"line\":2710}', 0, '2023-06-20 09:45:42'),
(6, 'Mailer: Google / Gmail\r\n{\n  \"error\": {\n    \"code\": 401,\n    \"message\": \"Request is missing required authentication credential. Expected OAuth 2 access token, login cookie or other valid authentication credential. See https://developers.google.com/identity/sign-in/web/devconsole-project.\",\n    \"errors\": [\n      {\n        \"message\": \"Login Required.\",\n        \"domain\": \"global\",\n        \"reason\": \"required\",\n        \"location\": \"Authorization\",\n        \"locationType\": \"header\"\n      }\n    ],\n    \"status\": \"UNAUTHENTICATED\",\n    \"details\": [\n      {\n        \"@type\": \"type.googleapis.com/google.rpc.ErrorInfo\",\n        \"reason\": \"CREDENTIALS_MISSING\",\n        \"domain\": \"googleapis.com\",\n        \"metadata\": {\n          \"method\": \"caribou.api.proto.MailboxService.SendMessage\",\n          \"service\": \"gmail.googleapis.com\"\n        }\n      }\n    ]\n  }\n}', '{\"file\":\"C:\\\\xampp\\\\htdocs\\\\easy-manage\\\\wp-includes\\\\user.php\",\"line\":2650}', 0, '2023-06-21 02:47:46'),
(7, 'Mailer: Google / Gmail\r\n{\n  \"error\": {\n    \"code\": 401,\n    \"message\": \"Request is missing required authentication credential. Expected OAuth 2 access token, login cookie or other valid authentication credential. See https://developers.google.com/identity/sign-in/web/devconsole-project.\",\n    \"errors\": [\n      {\n        \"message\": \"Login Required.\",\n        \"domain\": \"global\",\n        \"reason\": \"required\",\n        \"location\": \"Authorization\",\n        \"locationType\": \"header\"\n      }\n    ],\n    \"status\": \"UNAUTHENTICATED\",\n    \"details\": [\n      {\n        \"@type\": \"type.googleapis.com/google.rpc.ErrorInfo\",\n        \"reason\": \"CREDENTIALS_MISSING\",\n        \"domain\": \"googleapis.com\",\n        \"metadata\": {\n          \"service\": \"gmail.googleapis.com\",\n          \"method\": \"caribou.api.proto.MailboxService.SendMessage\"\n        }\n      }\n    ]\n  }\n}', '{\"file\":\"C:\\\\xampp\\\\htdocs\\\\easy-manage\\\\wp-includes\\\\user.php\",\"line\":2710}', 0, '2023-06-21 02:47:47'),
(8, 'Mailer: Google / Gmail\r\n{\n  \"error\": {\n    \"code\": 401,\n    \"message\": \"Request is missing required authentication credential. Expected OAuth 2 access token, login cookie or other valid authentication credential. See https://developers.google.com/identity/sign-in/web/devconsole-project.\",\n    \"errors\": [\n      {\n        \"message\": \"Login Required.\",\n        \"domain\": \"global\",\n        \"reason\": \"required\",\n        \"location\": \"Authorization\",\n        \"locationType\": \"header\"\n      }\n    ],\n    \"status\": \"UNAUTHENTICATED\",\n    \"details\": [\n      {\n        \"@type\": \"type.googleapis.com/google.rpc.ErrorInfo\",\n        \"reason\": \"CREDENTIALS_MISSING\",\n        \"domain\": \"googleapis.com\",\n        \"metadata\": {\n          \"service\": \"gmail.googleapis.com\",\n          \"method\": \"caribou.api.proto.MailboxService.SendMessage\"\n        }\n      }\n    ]\n  }\n}', '{\"file\":\"C:\\\\xampp\\\\htdocs\\\\easy-manage\\\\wp-includes\\\\user.php\",\"line\":2710}', 0, '2023-06-21 02:57:36'),
(9, 'Mailer: Google / Gmail\r\n{\n  \"error\": {\n    \"code\": 401,\n    \"message\": \"Request is missing required authentication credential. Expected OAuth 2 access token, login cookie or other valid authentication credential. See https://developers.google.com/identity/sign-in/web/devconsole-project.\",\n    \"errors\": [\n      {\n        \"message\": \"Login Required.\",\n        \"domain\": \"global\",\n        \"reason\": \"required\",\n        \"location\": \"Authorization\",\n        \"locationType\": \"header\"\n      }\n    ],\n    \"status\": \"UNAUTHENTICATED\",\n    \"details\": [\n      {\n        \"@type\": \"type.googleapis.com/google.rpc.ErrorInfo\",\n        \"reason\": \"CREDENTIALS_MISSING\",\n        \"domain\": \"googleapis.com\",\n        \"metadata\": {\n          \"service\": \"gmail.googleapis.com\",\n          \"method\": \"caribou.api.proto.MailboxService.SendMessage\"\n        }\n      }\n    ]\n  }\n}', '{\"file\":\"C:\\\\xampp\\\\htdocs\\\\easy-manage\\\\wp-includes\\\\user.php\",\"line\":2650}', 0, '2023-06-21 08:13:32'),
(10, 'Mailer: Google / Gmail\r\n{\n  \"error\": {\n    \"code\": 401,\n    \"message\": \"Request is missing required authentication credential. Expected OAuth 2 access token, login cookie or other valid authentication credential. See https://developers.google.com/identity/sign-in/web/devconsole-project.\",\n    \"errors\": [\n      {\n        \"message\": \"Login Required.\",\n        \"domain\": \"global\",\n        \"reason\": \"required\",\n        \"location\": \"Authorization\",\n        \"locationType\": \"header\"\n      }\n    ],\n    \"status\": \"UNAUTHENTICATED\",\n    \"details\": [\n      {\n        \"@type\": \"type.googleapis.com/google.rpc.ErrorInfo\",\n        \"reason\": \"CREDENTIALS_MISSING\",\n        \"domain\": \"googleapis.com\",\n        \"metadata\": {\n          \"method\": \"caribou.api.proto.MailboxService.SendMessage\",\n          \"service\": \"gmail.googleapis.com\"\n        }\n      }\n    ]\n  }\n}', '{\"file\":\"C:\\\\xampp\\\\htdocs\\\\easy-manage\\\\wp-includes\\\\user.php\",\"line\":2710}', 0, '2023-06-21 08:13:33'),
(11, 'Mailer: Google / Gmail\r\n{\n  \"error\": {\n    \"code\": 401,\n    \"message\": \"Request is missing required authentication credential. Expected OAuth 2 access token, login cookie or other valid authentication credential. See https://developers.google.com/identity/sign-in/web/devconsole-project.\",\n    \"errors\": [\n      {\n        \"message\": \"Login Required.\",\n        \"domain\": \"global\",\n        \"reason\": \"required\",\n        \"location\": \"Authorization\",\n        \"locationType\": \"header\"\n      }\n    ],\n    \"status\": \"UNAUTHENTICATED\",\n    \"details\": [\n      {\n        \"@type\": \"type.googleapis.com/google.rpc.ErrorInfo\",\n        \"reason\": \"CREDENTIALS_MISSING\",\n        \"domain\": \"googleapis.com\",\n        \"metadata\": {\n          \"service\": \"gmail.googleapis.com\",\n          \"method\": \"caribou.api.proto.MailboxService.SendMessage\"\n        }\n      }\n    ]\n  }\n}', '{\"file\":\"C:\\\\xampp\\\\htdocs\\\\easy-manage\\\\wp-includes\\\\user.php\",\"line\":2710}', 0, '2023-06-21 08:16:51'),
(12, 'Mailer: Google / Gmail\r\n{\n  \"error\": {\n    \"code\": 401,\n    \"message\": \"Request is missing required authentication credential. Expected OAuth 2 access token, login cookie or other valid authentication credential. See https://developers.google.com/identity/sign-in/web/devconsole-project.\",\n    \"errors\": [\n      {\n        \"message\": \"Login Required.\",\n        \"domain\": \"global\",\n        \"reason\": \"required\",\n        \"location\": \"Authorization\",\n        \"locationType\": \"header\"\n      }\n    ],\n    \"status\": \"UNAUTHENTICATED\",\n    \"details\": [\n      {\n        \"@type\": \"type.googleapis.com/google.rpc.ErrorInfo\",\n        \"reason\": \"CREDENTIALS_MISSING\",\n        \"domain\": \"googleapis.com\",\n        \"metadata\": {\n          \"service\": \"gmail.googleapis.com\",\n          \"method\": \"caribou.api.proto.MailboxService.SendMessage\"\n        }\n      }\n    ]\n  }\n}', '{\"file\":\"C:\\\\xampp\\\\htdocs\\\\easy-manage\\\\wp-includes\\\\user.php\",\"line\":2650}', 0, '2023-06-21 16:36:36'),
(13, 'Mailer: Google / Gmail\r\n{\n  \"error\": {\n    \"code\": 401,\n    \"message\": \"Request is missing required authentication credential. Expected OAuth 2 access token, login cookie or other valid authentication credential. See https://developers.google.com/identity/sign-in/web/devconsole-project.\",\n    \"errors\": [\n      {\n        \"message\": \"Login Required.\",\n        \"domain\": \"global\",\n        \"reason\": \"required\",\n        \"location\": \"Authorization\",\n        \"locationType\": \"header\"\n      }\n    ],\n    \"status\": \"UNAUTHENTICATED\",\n    \"details\": [\n      {\n        \"@type\": \"type.googleapis.com/google.rpc.ErrorInfo\",\n        \"reason\": \"CREDENTIALS_MISSING\",\n        \"domain\": \"googleapis.com\",\n        \"metadata\": {\n          \"service\": \"gmail.googleapis.com\",\n          \"method\": \"caribou.api.proto.MailboxService.SendMessage\"\n        }\n      }\n    ]\n  }\n}', '{\"file\":\"C:\\\\xampp\\\\htdocs\\\\easy-manage\\\\wp-includes\\\\user.php\",\"line\":2710}', 0, '2023-06-21 16:36:38'),
(14, 'Mailer: Google / Gmail\r\n{\n  \"error\": {\n    \"code\": 401,\n    \"message\": \"Request is missing required authentication credential. Expected OAuth 2 access token, login cookie or other valid authentication credential. See https://developers.google.com/identity/sign-in/web/devconsole-project.\",\n    \"errors\": [\n      {\n        \"message\": \"Login Required.\",\n        \"domain\": \"global\",\n        \"reason\": \"required\",\n        \"location\": \"Authorization\",\n        \"locationType\": \"header\"\n      }\n    ],\n    \"status\": \"UNAUTHENTICATED\",\n    \"details\": [\n      {\n        \"@type\": \"type.googleapis.com/google.rpc.ErrorInfo\",\n        \"reason\": \"CREDENTIALS_MISSING\",\n        \"domain\": \"googleapis.com\",\n        \"metadata\": {\n          \"method\": \"caribou.api.proto.MailboxService.SendMessage\",\n          \"service\": \"gmail.googleapis.com\"\n        }\n      }\n    ]\n  }\n}', '{\"file\":\"C:\\\\xampp\\\\htdocs\\\\easy-manage\\\\wp-includes\\\\user.php\",\"line\":2650}', 0, '2023-06-21 16:36:46'),
(15, 'Mailer: Google / Gmail\r\n{\n  \"error\": {\n    \"code\": 401,\n    \"message\": \"Request is missing required authentication credential. Expected OAuth 2 access token, login cookie or other valid authentication credential. See https://developers.google.com/identity/sign-in/web/devconsole-project.\",\n    \"errors\": [\n      {\n        \"message\": \"Login Required.\",\n        \"domain\": \"global\",\n        \"reason\": \"required\",\n        \"location\": \"Authorization\",\n        \"locationType\": \"header\"\n      }\n    ],\n    \"status\": \"UNAUTHENTICATED\",\n    \"details\": [\n      {\n        \"@type\": \"type.googleapis.com/google.rpc.ErrorInfo\",\n        \"reason\": \"CREDENTIALS_MISSING\",\n        \"domain\": \"googleapis.com\",\n        \"metadata\": {\n          \"service\": \"gmail.googleapis.com\",\n          \"method\": \"caribou.api.proto.MailboxService.SendMessage\"\n        }\n      }\n    ]\n  }\n}', '{\"file\":\"C:\\\\xampp\\\\htdocs\\\\easy-manage\\\\wp-includes\\\\user.php\",\"line\":2650}', 0, '2023-06-21 16:56:07'),
(16, 'Mailer: Google / Gmail\r\n{\n  \"error\": {\n    \"code\": 401,\n    \"message\": \"Request is missing required authentication credential. Expected OAuth 2 access token, login cookie or other valid authentication credential. See https://developers.google.com/identity/sign-in/web/devconsole-project.\",\n    \"errors\": [\n      {\n        \"message\": \"Login Required.\",\n        \"domain\": \"global\",\n        \"reason\": \"required\",\n        \"location\": \"Authorization\",\n        \"locationType\": \"header\"\n      }\n    ],\n    \"status\": \"UNAUTHENTICATED\",\n    \"details\": [\n      {\n        \"@type\": \"type.googleapis.com/google.rpc.ErrorInfo\",\n        \"reason\": \"CREDENTIALS_MISSING\",\n        \"domain\": \"googleapis.com\",\n        \"metadata\": {\n          \"service\": \"gmail.googleapis.com\",\n          \"method\": \"caribou.api.proto.MailboxService.SendMessage\"\n        }\n      }\n    ]\n  }\n}', '{\"file\":\"C:\\\\xampp\\\\htdocs\\\\easy-manage\\\\wp-includes\\\\user.php\",\"line\":2710}', 0, '2023-06-21 16:56:14'),
(17, 'Mailer: Google / Gmail\r\n{\n  \"error\": {\n    \"code\": 401,\n    \"message\": \"Request is missing required authentication credential. Expected OAuth 2 access token, login cookie or other valid authentication credential. See https://developers.google.com/identity/sign-in/web/devconsole-project.\",\n    \"errors\": [\n      {\n        \"message\": \"Login Required.\",\n        \"domain\": \"global\",\n        \"reason\": \"required\",\n        \"location\": \"Authorization\",\n        \"locationType\": \"header\"\n      }\n    ],\n    \"status\": \"UNAUTHENTICATED\",\n    \"details\": [\n      {\n        \"@type\": \"type.googleapis.com/google.rpc.ErrorInfo\",\n        \"reason\": \"CREDENTIALS_MISSING\",\n        \"domain\": \"googleapis.com\",\n        \"metadata\": {\n          \"service\": \"gmail.googleapis.com\",\n          \"method\": \"caribou.api.proto.MailboxService.SendMessage\"\n        }\n      }\n    ]\n  }\n}', '{\"file\":\"C:\\\\xampp\\\\htdocs\\\\easy-manage\\\\wp-includes\\\\user.php\",\"line\":2650}', 0, '2023-06-22 02:30:12'),
(18, 'Mailer: Google / Gmail\r\n{\n  \"error\": {\n    \"code\": 401,\n    \"message\": \"Request is missing required authentication credential. Expected OAuth 2 access token, login cookie or other valid authentication credential. See https://developers.google.com/identity/sign-in/web/devconsole-project.\",\n    \"errors\": [\n      {\n        \"message\": \"Login Required.\",\n        \"domain\": \"global\",\n        \"reason\": \"required\",\n        \"location\": \"Authorization\",\n        \"locationType\": \"header\"\n      }\n    ],\n    \"status\": \"UNAUTHENTICATED\",\n    \"details\": [\n      {\n        \"@type\": \"type.googleapis.com/google.rpc.ErrorInfo\",\n        \"reason\": \"CREDENTIALS_MISSING\",\n        \"domain\": \"googleapis.com\",\n        \"metadata\": {\n          \"service\": \"gmail.googleapis.com\",\n          \"method\": \"caribou.api.proto.MailboxService.SendMessage\"\n        }\n      }\n    ]\n  }\n}', '{\"file\":\"C:\\\\xampp\\\\htdocs\\\\easy-manage\\\\wp-includes\\\\user.php\",\"line\":2710}', 0, '2023-06-22 02:30:13'),
(19, 'Mailer: Google / Gmail\r\n{\n  \"error\": {\n    \"code\": 401,\n    \"message\": \"Request is missing required authentication credential. Expected OAuth 2 access token, login cookie or other valid authentication credential. See https://developers.google.com/identity/sign-in/web/devconsole-project.\",\n    \"errors\": [\n      {\n        \"message\": \"Login Required.\",\n        \"domain\": \"global\",\n        \"reason\": \"required\",\n        \"location\": \"Authorization\",\n        \"locationType\": \"header\"\n      }\n    ],\n    \"status\": \"UNAUTHENTICATED\",\n    \"details\": [\n      {\n        \"@type\": \"type.googleapis.com/google.rpc.ErrorInfo\",\n        \"reason\": \"CREDENTIALS_MISSING\",\n        \"domain\": \"googleapis.com\",\n        \"metadata\": {\n          \"method\": \"caribou.api.proto.MailboxService.SendMessage\",\n          \"service\": \"gmail.googleapis.com\"\n        }\n      }\n    ]\n  }\n}', '{\"file\":\"C:\\\\xampp\\\\htdocs\\\\easy-manage\\\\wp-includes\\\\user.php\",\"line\":2650}', 0, '2023-06-22 02:30:17'),
(20, 'Mailer: Google / Gmail\r\n{\n  \"error\": {\n    \"code\": 401,\n    \"message\": \"Request is missing required authentication credential. Expected OAuth 2 access token, login cookie or other valid authentication credential. See https://developers.google.com/identity/sign-in/web/devconsole-project.\",\n    \"errors\": [\n      {\n        \"message\": \"Login Required.\",\n        \"domain\": \"global\",\n        \"reason\": \"required\",\n        \"location\": \"Authorization\",\n        \"locationType\": \"header\"\n      }\n    ],\n    \"status\": \"UNAUTHENTICATED\",\n    \"details\": [\n      {\n        \"@type\": \"type.googleapis.com/google.rpc.ErrorInfo\",\n        \"reason\": \"CREDENTIALS_MISSING\",\n        \"domain\": \"googleapis.com\",\n        \"metadata\": {\n          \"service\": \"gmail.googleapis.com\",\n          \"method\": \"caribou.api.proto.MailboxService.SendMessage\"\n        }\n      }\n    ]\n  }\n}', '{\"file\":\"C:\\\\xampp\\\\htdocs\\\\easy-manage\\\\wp-includes\\\\user.php\",\"line\":2650}', 0, '2023-06-22 02:33:33'),
(21, 'Mailer: Google / Gmail\r\n{\n  \"error\": {\n    \"code\": 401,\n    \"message\": \"Request is missing required authentication credential. Expected OAuth 2 access token, login cookie or other valid authentication credential. See https://developers.google.com/identity/sign-in/web/devconsole-project.\",\n    \"errors\": [\n      {\n        \"message\": \"Login Required.\",\n        \"domain\": \"global\",\n        \"reason\": \"required\",\n        \"location\": \"Authorization\",\n        \"locationType\": \"header\"\n      }\n    ],\n    \"status\": \"UNAUTHENTICATED\",\n    \"details\": [\n      {\n        \"@type\": \"type.googleapis.com/google.rpc.ErrorInfo\",\n        \"reason\": \"CREDENTIALS_MISSING\",\n        \"domain\": \"googleapis.com\",\n        \"metadata\": {\n          \"method\": \"caribou.api.proto.MailboxService.SendMessage\",\n          \"service\": \"gmail.googleapis.com\"\n        }\n      }\n    ]\n  }\n}', '{\"file\":\"C:\\\\xampp\\\\htdocs\\\\easy-manage\\\\wp-includes\\\\user.php\",\"line\":2650}', 0, '2023-06-22 02:33:39'),
(22, 'Mailer: Google / Gmail\r\n{\n  \"error\": {\n    \"code\": 401,\n    \"message\": \"Request is missing required authentication credential. Expected OAuth 2 access token, login cookie or other valid authentication credential. See https://developers.google.com/identity/sign-in/web/devconsole-project.\",\n    \"errors\": [\n      {\n        \"message\": \"Login Required.\",\n        \"domain\": \"global\",\n        \"reason\": \"required\",\n        \"location\": \"Authorization\",\n        \"locationType\": \"header\"\n      }\n    ],\n    \"status\": \"UNAUTHENTICATED\",\n    \"details\": [\n      {\n        \"@type\": \"type.googleapis.com/google.rpc.ErrorInfo\",\n        \"reason\": \"CREDENTIALS_MISSING\",\n        \"domain\": \"googleapis.com\",\n        \"metadata\": {\n          \"service\": \"gmail.googleapis.com\",\n          \"method\": \"caribou.api.proto.MailboxService.SendMessage\"\n        }\n      }\n    ]\n  }\n}', '{\"file\":\"C:\\\\xampp\\\\htdocs\\\\easy-manage\\\\wp-includes\\\\user.php\",\"line\":2650}', 0, '2023-06-22 02:34:00'),
(23, 'Mailer: Google / Gmail\r\n{\n  \"error\": {\n    \"code\": 401,\n    \"message\": \"Request is missing required authentication credential. Expected OAuth 2 access token, login cookie or other valid authentication credential. See https://developers.google.com/identity/sign-in/web/devconsole-project.\",\n    \"errors\": [\n      {\n        \"message\": \"Login Required.\",\n        \"domain\": \"global\",\n        \"reason\": \"required\",\n        \"location\": \"Authorization\",\n        \"locationType\": \"header\"\n      }\n    ],\n    \"status\": \"UNAUTHENTICATED\",\n    \"details\": [\n      {\n        \"@type\": \"type.googleapis.com/google.rpc.ErrorInfo\",\n        \"reason\": \"CREDENTIALS_MISSING\",\n        \"domain\": \"googleapis.com\",\n        \"metadata\": {\n          \"method\": \"caribou.api.proto.MailboxService.SendMessage\",\n          \"service\": \"gmail.googleapis.com\"\n        }\n      }\n    ]\n  }\n}', '{\"file\":\"C:\\\\xampp\\\\htdocs\\\\easy-manage\\\\wp-includes\\\\user.php\",\"line\":2650}', 0, '2023-06-22 02:35:28'),
(24, 'Mailer: Google / Gmail\r\n{\n  \"error\": {\n    \"code\": 401,\n    \"message\": \"Request is missing required authentication credential. Expected OAuth 2 access token, login cookie or other valid authentication credential. See https://developers.google.com/identity/sign-in/web/devconsole-project.\",\n    \"errors\": [\n      {\n        \"message\": \"Login Required.\",\n        \"domain\": \"global\",\n        \"reason\": \"required\",\n        \"location\": \"Authorization\",\n        \"locationType\": \"header\"\n      }\n    ],\n    \"status\": \"UNAUTHENTICATED\",\n    \"details\": [\n      {\n        \"@type\": \"type.googleapis.com/google.rpc.ErrorInfo\",\n        \"reason\": \"CREDENTIALS_MISSING\",\n        \"domain\": \"googleapis.com\",\n        \"metadata\": {\n          \"service\": \"gmail.googleapis.com\",\n          \"method\": \"caribou.api.proto.MailboxService.SendMessage\"\n        }\n      }\n    ]\n  }\n}', '{\"file\":\"C:\\\\xampp\\\\htdocs\\\\easy-manage\\\\wp-includes\\\\user.php\",\"line\":2650}', 0, '2023-06-22 02:35:32'),
(25, 'Mailer: Google / Gmail\r\n{\n  \"error\": {\n    \"code\": 401,\n    \"message\": \"Request is missing required authentication credential. Expected OAuth 2 access token, login cookie or other valid authentication credential. See https://developers.google.com/identity/sign-in/web/devconsole-project.\",\n    \"errors\": [\n      {\n        \"message\": \"Login Required.\",\n        \"domain\": \"global\",\n        \"reason\": \"required\",\n        \"location\": \"Authorization\",\n        \"locationType\": \"header\"\n      }\n    ],\n    \"status\": \"UNAUTHENTICATED\",\n    \"details\": [\n      {\n        \"@type\": \"type.googleapis.com/google.rpc.ErrorInfo\",\n        \"reason\": \"CREDENTIALS_MISSING\",\n        \"domain\": \"googleapis.com\",\n        \"metadata\": {\n          \"method\": \"caribou.api.proto.MailboxService.SendMessage\",\n          \"service\": \"gmail.googleapis.com\"\n        }\n      }\n    ]\n  }\n}', '{\"file\":\"C:\\\\xampp\\\\htdocs\\\\easy-manage\\\\wp-includes\\\\user.php\",\"line\":2650}', 0, '2023-06-22 02:35:36'),
(26, 'Mailer: Google / Gmail\r\n{\n  \"error\": {\n    \"code\": 401,\n    \"message\": \"Request is missing required authentication credential. Expected OAuth 2 access token, login cookie or other valid authentication credential. See https://developers.google.com/identity/sign-in/web/devconsole-project.\",\n    \"errors\": [\n      {\n        \"message\": \"Login Required.\",\n        \"domain\": \"global\",\n        \"reason\": \"required\",\n        \"location\": \"Authorization\",\n        \"locationType\": \"header\"\n      }\n    ],\n    \"status\": \"UNAUTHENTICATED\",\n    \"details\": [\n      {\n        \"@type\": \"type.googleapis.com/google.rpc.ErrorInfo\",\n        \"reason\": \"CREDENTIALS_MISSING\",\n        \"domain\": \"googleapis.com\",\n        \"metadata\": {\n          \"method\": \"caribou.api.proto.MailboxService.SendMessage\",\n          \"service\": \"gmail.googleapis.com\"\n        }\n      }\n    ]\n  }\n}', '{\"file\":\"C:\\\\xampp\\\\htdocs\\\\easy-manage\\\\wp-includes\\\\user.php\",\"line\":2710}', 0, '2023-06-22 02:39:49'),
(27, 'Mailer: Google / Gmail\r\n{\n  \"error\": {\n    \"code\": 401,\n    \"message\": \"Request is missing required authentication credential. Expected OAuth 2 access token, login cookie or other valid authentication credential. See https://developers.google.com/identity/sign-in/web/devconsole-project.\",\n    \"errors\": [\n      {\n        \"message\": \"Login Required.\",\n        \"domain\": \"global\",\n        \"reason\": \"required\",\n        \"location\": \"Authorization\",\n        \"locationType\": \"header\"\n      }\n    ],\n    \"status\": \"UNAUTHENTICATED\",\n    \"details\": [\n      {\n        \"@type\": \"type.googleapis.com/google.rpc.ErrorInfo\",\n        \"reason\": \"CREDENTIALS_MISSING\",\n        \"domain\": \"googleapis.com\",\n        \"metadata\": {\n          \"method\": \"caribou.api.proto.MailboxService.SendMessage\",\n          \"service\": \"gmail.googleapis.com\"\n        }\n      }\n    ]\n  }\n}', '{\"file\":\"C:\\\\xampp\\\\htdocs\\\\easy-manage\\\\wp-content\\\\plugins\\\\wp-mail-smtp\\\\src\\\\Reports\\\\Emails\\\\Summary.php\",\"line\":112}', 0, '2023-06-26 11:00:53'),
(28, 'Mailer: Google / Gmail\r\n{\n  \"error\": {\n    \"code\": 401,\n    \"message\": \"Request is missing required authentication credential. Expected OAuth 2 access token, login cookie or other valid authentication credential. See https://developers.google.com/identity/sign-in/web/devconsole-project.\",\n    \"errors\": [\n      {\n        \"message\": \"Login Required.\",\n        \"domain\": \"global\",\n        \"reason\": \"required\",\n        \"location\": \"Authorization\",\n        \"locationType\": \"header\"\n      }\n    ],\n    \"status\": \"UNAUTHENTICATED\",\n    \"details\": [\n      {\n        \"@type\": \"type.googleapis.com/google.rpc.ErrorInfo\",\n        \"reason\": \"CREDENTIALS_MISSING\",\n        \"domain\": \"googleapis.com\",\n        \"metadata\": {\n          \"method\": \"caribou.api.proto.MailboxService.SendMessage\",\n          \"service\": \"gmail.googleapis.com\"\n        }\n      }\n    ]\n  }\n}', '{\"file\":\"C:\\\\xampp\\\\htdocs\\\\easy-manage\\\\wp-includes\\\\user.php\",\"line\":2710}', 0, '2023-06-29 02:51:35'),
(29, 'Mailer: Google / Gmail\r\n{\n  \"error\": {\n    \"code\": 401,\n    \"message\": \"Request is missing required authentication credential. Expected OAuth 2 access token, login cookie or other valid authentication credential. See https://developers.google.com/identity/sign-in/web/devconsole-project.\",\n    \"errors\": [\n      {\n        \"message\": \"Login Required.\",\n        \"domain\": \"global\",\n        \"reason\": \"required\",\n        \"location\": \"Authorization\",\n        \"locationType\": \"header\"\n      }\n    ],\n    \"status\": \"UNAUTHENTICATED\",\n    \"details\": [\n      {\n        \"@type\": \"type.googleapis.com/google.rpc.ErrorInfo\",\n        \"reason\": \"CREDENTIALS_MISSING\",\n        \"domain\": \"googleapis.com\",\n        \"metadata\": {\n          \"method\": \"caribou.api.proto.MailboxService.SendMessage\",\n          \"service\": \"gmail.googleapis.com\"\n        }\n      }\n    ]\n  }\n}', '{\"file\":\"C:\\\\xampp\\\\htdocs\\\\easy-manage\\\\wp-includes\\\\user.php\",\"line\":2710}', 0, '2023-06-29 02:52:42'),
(30, 'Mailer: Google / Gmail\r\n{\n  \"error\": {\n    \"code\": 401,\n    \"message\": \"Request is missing required authentication credential. Expected OAuth 2 access token, login cookie or other valid authentication credential. See https://developers.google.com/identity/sign-in/web/devconsole-project.\",\n    \"errors\": [\n      {\n        \"message\": \"Login Required.\",\n        \"domain\": \"global\",\n        \"reason\": \"required\",\n        \"location\": \"Authorization\",\n        \"locationType\": \"header\"\n      }\n    ],\n    \"status\": \"UNAUTHENTICATED\",\n    \"details\": [\n      {\n        \"@type\": \"type.googleapis.com/google.rpc.ErrorInfo\",\n        \"reason\": \"CREDENTIALS_MISSING\",\n        \"domain\": \"googleapis.com\",\n        \"metadata\": {\n          \"method\": \"caribou.api.proto.MailboxService.SendMessage\",\n          \"service\": \"gmail.googleapis.com\"\n        }\n      }\n    ]\n  }\n}', '{\"file\":\"C:\\\\xampp\\\\htdocs\\\\easy-manage\\\\wp-content\\\\plugins\\\\wp-mail-smtp\\\\src\\\\Reports\\\\Emails\\\\Summary.php\",\"line\":112}', 0, '2023-07-04 09:42:57');

-- --------------------------------------------------------

--
-- Table structure for table `wp_wpmailsmtp_tasks_meta`
--

CREATE TABLE `wp_wpmailsmtp_tasks_meta` (
  `id` bigint(20) NOT NULL,
  `action` varchar(255) NOT NULL,
  `data` longtext NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_actionscheduler_actions`
--
ALTER TABLE `wp_actionscheduler_actions`
  ADD PRIMARY KEY (`action_id`),
  ADD KEY `hook` (`hook`),
  ADD KEY `status` (`status`),
  ADD KEY `scheduled_date_gmt` (`scheduled_date_gmt`),
  ADD KEY `args` (`args`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `last_attempt_gmt` (`last_attempt_gmt`),
  ADD KEY `claim_id_status_scheduled_date_gmt` (`claim_id`,`status`,`scheduled_date_gmt`);

--
-- Indexes for table `wp_actionscheduler_claims`
--
ALTER TABLE `wp_actionscheduler_claims`
  ADD PRIMARY KEY (`claim_id`),
  ADD KEY `date_created_gmt` (`date_created_gmt`);

--
-- Indexes for table `wp_actionscheduler_groups`
--
ALTER TABLE `wp_actionscheduler_groups`
  ADD PRIMARY KEY (`group_id`),
  ADD KEY `slug` (`slug`(191));

--
-- Indexes for table `wp_actionscheduler_logs`
--
ALTER TABLE `wp_actionscheduler_logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `action_id` (`action_id`),
  ADD KEY `log_date_gmt` (`log_date_gmt`);

--
-- Indexes for table `wp_cohorts`
--
ALTER TABLE `wp_cohorts`
  ADD PRIMARY KEY (`cohort_id`);

--
-- Indexes for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_comments`
--
ALTER TABLE `wp_comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `comment_post_ID` (`comment_post_ID`),
  ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  ADD KEY `comment_date_gmt` (`comment_date_gmt`),
  ADD KEY `comment_parent` (`comment_parent`),
  ADD KEY `comment_author_email` (`comment_author_email`(10));

--
-- Indexes for table `wp_group_projects`
--
ALTER TABLE `wp_group_projects`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `wp_individual_projects`
--
ALTER TABLE `wp_individual_projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `wp_links`
--
ALTER TABLE `wp_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `link_visible` (`link_visible`);

--
-- Indexes for table `wp_options`
--
ALTER TABLE `wp_options`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `option_name` (`option_name`),
  ADD KEY `autoload` (`autoload`);

--
-- Indexes for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_posts`
--
ALTER TABLE `wp_posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`);

--
-- Indexes for table `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_terms`
--
ALTER TABLE `wp_terms`
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `slug` (`slug`(191)),
  ADD KEY `name` (`name`(191));

--
-- Indexes for table `wp_term_relationships`
--
ALTER TABLE `wp_term_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Indexes for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  ADD PRIMARY KEY (`term_taxonomy_id`),
  ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  ADD KEY `taxonomy` (`taxonomy`);

--
-- Indexes for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  ADD PRIMARY KEY (`umeta_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_users`
--
ALTER TABLE `wp_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- Indexes for table `wp_wpmailsmtp_debug_events`
--
ALTER TABLE `wp_wpmailsmtp_debug_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_wpmailsmtp_tasks_meta`
--
ALTER TABLE `wp_wpmailsmtp_tasks_meta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_actionscheduler_actions`
--
ALTER TABLE `wp_actionscheduler_actions`
  MODIFY `action_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- AUTO_INCREMENT for table `wp_actionscheduler_claims`
--
ALTER TABLE `wp_actionscheduler_claims`
  MODIFY `claim_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2996;

--
-- AUTO_INCREMENT for table `wp_actionscheduler_groups`
--
ALTER TABLE `wp_actionscheduler_groups`
  MODIFY `group_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wp_actionscheduler_logs`
--
ALTER TABLE `wp_actionscheduler_logs`
  MODIFY `log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `wp_cohorts`
--
ALTER TABLE `wp_cohorts`
  MODIFY `cohort_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_comments`
--
ALTER TABLE `wp_comments`
  MODIFY `comment_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wp_group_projects`
--
ALTER TABLE `wp_group_projects`
  MODIFY `group_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wp_individual_projects`
--
ALTER TABLE `wp_individual_projects`
  MODIFY `project_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `wp_links`
--
ALTER TABLE `wp_links`
  MODIFY `link_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_options`
--
ALTER TABLE `wp_options`
  MODIFY `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4068;

--
-- AUTO_INCREMENT for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=542;

--
-- AUTO_INCREMENT for table `wp_posts`
--
ALTER TABLE `wp_posts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=289;

--
-- AUTO_INCREMENT for table `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_terms`
--
ALTER TABLE `wp_terms`
  MODIFY `term_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  MODIFY `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  MODIFY `umeta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1179;

--
-- AUTO_INCREMENT for table `wp_users`
--
ALTER TABLE `wp_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `wp_wpmailsmtp_debug_events`
--
ALTER TABLE `wp_wpmailsmtp_debug_events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `wp_wpmailsmtp_tasks_meta`
--
ALTER TABLE `wp_wpmailsmtp_tasks_meta`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
