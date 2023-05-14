-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 14 2023 г., 20:35
-- Версия сервера: 10.4.26-MariaDB
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kinotalk_1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `love_reactant_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `order`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Новинки кино', 'novinki-kino', '2023-05-12 21:00:00', '2023-05-12 21:00:00', NULL),
(2, 1, 'Сериалы', 'serialy', '2023-05-12 21:00:00', '2023-05-12 21:00:00', NULL),
(3, 1, 'Комиксы', 'komiksy', '2023-05-12 21:00:00', '2023-05-12 21:00:00', NULL),
(4, 1, 'Франшизы', 'franshizy', '2023-05-12 21:00:00', '2023-05-12 21:00:00', NULL),
(5, 1, 'Новости кино', 'novosti-kino', '2023-05-12 21:00:00', '2023-05-12 21:00:00', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
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
-- Структура таблицы `love_reactants`
--

CREATE TABLE `love_reactants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `love_reactant_reaction_counters`
--

CREATE TABLE `love_reactant_reaction_counters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reactant_id` bigint(20) UNSIGNED NOT NULL,
  `reaction_type_id` bigint(20) UNSIGNED NOT NULL,
  `count` bigint(20) UNSIGNED NOT NULL,
  `weight` decimal(13,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `love_reactant_reaction_totals`
--

CREATE TABLE `love_reactant_reaction_totals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reactant_id` bigint(20) UNSIGNED NOT NULL,
  `count` bigint(20) UNSIGNED NOT NULL,
  `weight` decimal(13,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `love_reacters`
--

CREATE TABLE `love_reacters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `love_reacters`
--

INSERT INTO `love_reacters` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', '2023-05-13 11:18:14', '2023-05-13 11:18:14'),
(2, 'App\\Models\\User', '2023-05-13 11:18:15', '2023-05-13 11:18:15'),
(3, 'App\\Models\\User', '2023-05-13 11:18:15', '2023-05-13 11:18:15'),
(4, 'App\\Models\\User', '2023-05-13 11:18:16', '2023-05-13 11:18:16'),
(5, 'App\\Models\\User', '2023-05-13 11:18:16', '2023-05-13 11:18:16'),
(6, 'App\\Models\\User', '2023-05-13 14:35:41', '2023-05-13 14:35:41'),
(7, 'App\\Models\\User', '2023-05-13 14:37:04', '2023-05-13 14:37:04'),
(8, 'App\\Models\\User', '2023-05-13 14:38:33', '2023-05-13 14:38:33'),
(9, 'App\\Models\\User', '2023-05-13 14:39:48', '2023-05-13 14:39:48'),
(10, 'App\\Models\\User', '2023-05-13 14:41:05', '2023-05-13 14:41:05'),
(11, 'App\\Models\\User', '2023-05-13 14:42:34', '2023-05-13 14:42:34'),
(12, 'App\\Models\\User', '2023-05-13 14:43:50', '2023-05-13 14:43:50'),
(13, 'App\\Models\\User', '2023-05-13 14:45:01', '2023-05-13 14:45:01'),
(14, 'App\\Models\\User', '2023-05-13 14:46:22', '2023-05-13 14:46:22');

-- --------------------------------------------------------

--
-- Структура таблицы `love_reactions`
--

CREATE TABLE `love_reactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reactant_id` bigint(20) UNSIGNED NOT NULL,
  `reacter_id` bigint(20) UNSIGNED NOT NULL,
  `reaction_type_id` bigint(20) UNSIGNED NOT NULL,
  `rate` decimal(4,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `love_reaction_types`
--

CREATE TABLE `love_reaction_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mass` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `love_reaction_types`
--

INSERT INTO `love_reaction_types` (`id`, `name`, `mass`, `created_at`, `updated_at`) VALUES
(1, 'Like', 1, '2023-05-13 11:18:09', '2023-05-13 11:18:09'),
(2, 'Dislike', -1, '2023-05-13 11:18:09', '2023-05-13 11:18:09');

-- --------------------------------------------------------

--
-- Структура таблицы `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Category', 1, '475e57af-ee28-4de3-a749-038cc6713a28', 'cover', 'Mira', 'Mira.png', 'image/png', 'public', 'public', 223332, '[]', '[]', '{\"preview\":true,\"thumb\":true}', '[]', 1, '2023-05-13 11:26:25', '2023-05-13 11:26:26'),
(2, 'App\\Models\\Category', 2, '15208719-990c-494f-8a00-227b185da9e3', 'cover', 'Sansara', 'Sansara.png', 'image/png', 'public', 'public', 2477726, '[]', '[]', '{\"preview\":true,\"thumb\":true}', '[]', 1, '2023-05-13 11:35:05', '2023-05-13 11:35:07'),
(3, 'App\\Models\\Category', 3, 'cec97a40-8e7d-46e1-8204-3229db9d0b02', 'cover', 'GuardiansOfTheGalaxy', 'GuardiansOfTheGalaxy.png', 'image/png', 'public', 'public', 1464983, '[]', '[]', '{\"preview\":true,\"thumb\":true}', '[]', 1, '2023-05-13 11:35:55', '2023-05-13 11:35:56'),
(4, 'App\\Models\\Category', 4, '84ab708f-b011-4cd4-858d-8e5344bdf508', 'cover', 'HarryPotter', 'HarryPotter.png', 'image/png', 'public', 'public', 2044388, '[]', '[]', '{\"preview\":true,\"thumb\":true}', '[]', 1, '2023-05-13 11:36:49', '2023-05-13 11:36:50'),
(5, 'App\\Models\\User', 6, 'b2765dcd-155b-4f2b-a23d-32cb5319aadb', 'avatars', 'People1', 'People1.png', 'image/png', 'public', 'public', 347353, '[]', '[]', '{\"preview\":true,\"avatars\":true}', '[]', 1, '2023-05-13 14:35:42', '2023-05-13 14:35:45'),
(6, 'App\\Models\\User', 7, '48a5c7a8-e7b5-4107-b330-f11491dc5e5a', 'avatars', 'People2', 'People2.png', 'image/png', 'public', 'public', 325079, '[]', '[]', '{\"preview\":true,\"avatars\":true}', '[]', 1, '2023-05-13 14:37:04', '2023-05-13 14:37:06'),
(7, 'App\\Models\\User', 8, 'f15d71de-f07b-4163-b3d2-a098f5023d4f', 'avatars', 'People26', 'People26.png', 'image/png', 'public', 'public', 1983278, '[]', '[]', '{\"preview\":true,\"avatars\":true}', '[]', 1, '2023-05-13 14:38:34', '2023-05-13 14:38:35'),
(8, 'App\\Models\\User', 9, '2d546515-8f5e-464d-b81e-02d4737aba72', 'avatars', 'People4', 'People4.png', 'image/png', 'public', 'public', 427870, '[]', '[]', '{\"preview\":true,\"avatars\":true}', '[]', 1, '2023-05-13 14:39:48', '2023-05-13 14:39:50'),
(9, 'App\\Models\\User', 10, 'b14d2841-d915-47aa-b1a3-2c4499881383', 'avatars', 'People5', 'People5.png', 'image/png', 'public', 'public', 184232, '[]', '[]', '{\"preview\":true,\"avatars\":true}', '[]', 1, '2023-05-13 14:41:05', '2023-05-13 14:41:06'),
(10, 'App\\Models\\User', 11, '364edf82-392b-4cfa-92ba-0e0f0adf43c2', 'avatars', 'People6', 'People6.png', 'image/png', 'public', 'public', 156029, '[]', '[]', '{\"preview\":true,\"avatars\":true}', '[]', 1, '2023-05-13 14:42:34', '2023-05-13 14:42:36'),
(11, 'App\\Models\\User', 12, 'ed4fa76a-b35d-491a-af78-a82638c42b28', 'avatars', 'People25', 'People25.png', 'image/png', 'public', 'public', 1767926, '[]', '[]', '{\"preview\":true,\"avatars\":true}', '[]', 1, '2023-05-13 14:43:51', '2023-05-13 14:43:52'),
(12, 'App\\Models\\User', 13, '3849f07f-94f3-41ec-bdc1-f75b00923c9d', 'avatars', 'People13', 'People13.png', 'image/png', 'public', 'public', 1479330, '[]', '[]', '{\"preview\":true,\"avatars\":true}', '[]', 1, '2023-05-13 14:45:01', '2023-05-13 14:45:03'),
(13, 'App\\Models\\User', 14, '702ff01a-d185-496a-9081-42bb6e0cce54', 'avatars', 'People21', 'People21.png', 'image/png', 'public', 'public', 1230450, '[]', '[]', '{\"preview\":true,\"avatars\":true}', '[]', 1, '2023-05-13 14:46:22', '2023-05-13 14:46:23');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2018_07_22_000100_create_love_reacters_table', 1),
(4, '2018_07_22_001000_create_love_reactants_table', 1),
(5, '2018_07_22_001500_create_love_reaction_types_table', 1),
(6, '2018_07_22_002000_create_love_reactions_table', 1),
(7, '2018_07_25_000000_create_love_reactant_reaction_counters_table', 1),
(8, '2018_07_25_001000_create_love_reactant_reaction_totals_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2020_10_04_115514_create_moonshine_roles_table', 1),
(12, '2020_10_05_173148_create_moonshine_tables', 1),
(13, '2022_04_14_115549_create_moonshine_change_logs_table', 1),
(14, '2022_12_19_115549_create_moonshine_socialites_table', 1),
(15, '2023_01_20_173629_create_moonshine_user_permissions_table', 1),
(16, '2023_04_21_092406_create_profiles_table', 1),
(17, '2023_05_04_063700_create_categories_table', 1),
(18, '2023_05_04_063724_create_articles_table', 1),
(19, '2023_05_04_063730_create_sources_table', 1),
(20, '2023_05_04_063750_create_news_table', 1),
(21, '2023_05_04_064043_create_comments_table', 1),
(22, '2023_05_04_085412_create_permission_tables', 1),
(23, '2023_05_04_090542_create_taggable_table', 1),
(24, '2023_05_04_100565_add_love_reacter_id_to_users_table', 1),
(25, '2023_05_04_110758_add_love_reactant_id_to_articles_table', 1),
(26, '2023_05_04_203753_add_love_reactant_id_to_comments_table', 1),
(27, '2023_05_04_211083_add_deleted_at_to_users_table', 1),
(28, '2023_05_10_152548_create_media_table', 1),
(29, '9999_12_20_173629_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4),
(4, 'App\\Models\\User', 5),
(4, 'App\\Models\\User', 6),
(4, 'App\\Models\\User', 7),
(4, 'App\\Models\\User', 8),
(4, 'App\\Models\\User', 9),
(4, 'App\\Models\\User', 10),
(4, 'App\\Models\\User', 11),
(4, 'App\\Models\\User', 12),
(4, 'App\\Models\\User', 13),
(4, 'App\\Models\\User', 14);

-- --------------------------------------------------------

--
-- Структура таблицы `moonshine_change_logs`
--

CREATE TABLE `moonshine_change_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `moonshine_user_id` bigint(20) UNSIGNED NOT NULL,
  `changelogable_id` int(11) NOT NULL,
  `changelogable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `states_before` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `states_after` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `moonshine_socialites`
--

CREATE TABLE `moonshine_socialites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `moonshine_user_id` bigint(20) UNSIGNED NOT NULL,
  `driver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `moonshine_users`
--

CREATE TABLE `moonshine_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `moonshine_user_role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `moonshine_user_permissions`
--

CREATE TABLE `moonshine_user_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `moonshine_user_id` bigint(20) UNSIGNED NOT NULL,
  `permissions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`permissions`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `moonshine_user_roles`
--

CREATE TABLE `moonshine_user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `moonshine_user_roles`
--

INSERT INTO `moonshine_user_roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2023-05-13 11:17:21', '2023-05-13 11:17:21');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `source_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'block-users', 'web', '2023-05-13 11:18:10', '2023-05-13 11:18:10'),
(2, 'unblock-users', 'web', '2023-05-13 11:18:10', '2023-05-13 11:18:10'),
(3, 'show-all pending articles', 'web', '2023-05-13 11:18:10', '2023-05-13 11:18:10'),
(4, 'publish-all pending articles', 'web', '2023-05-13 11:18:10', '2023-05-13 11:18:10'),
(5, 'delete-all pending articles', 'web', '2023-05-13 11:18:10', '2023-05-13 11:18:10'),
(6, 'block-all published articles', 'web', '2023-05-13 11:18:10', '2023-05-13 11:18:10'),
(7, 'show-all published news', 'web', '2023-05-13 11:18:10', '2023-05-13 11:18:10'),
(8, 'create-all published news', 'web', '2023-05-13 11:18:11', '2023-05-13 11:18:11'),
(9, 'edit-all published news', 'web', '2023-05-13 11:18:11', '2023-05-13 11:18:11'),
(10, 'delete-all published news', 'web', '2023-05-13 11:18:11', '2023-05-13 11:18:11'),
(11, 'show-all comments', 'web', '2023-05-13 11:18:11', '2023-05-13 11:18:11'),
(12, 'block-all comments', 'web', '2023-05-13 11:18:11', '2023-05-13 11:18:11'),
(13, 'delete-all comments', 'web', '2023-05-13 11:18:11', '2023-05-13 11:18:11'),
(14, 'show-own draft articles', 'web', '2023-05-13 11:18:11', '2023-05-13 11:18:11'),
(15, 'create-own draft articles', 'web', '2023-05-13 11:18:12', '2023-05-13 11:18:12'),
(16, 'edit-own draft articles', 'web', '2023-05-13 11:18:12', '2023-05-13 11:18:12'),
(17, 'delete-own draft articles', 'web', '2023-05-13 11:18:12', '2023-05-13 11:18:12'),
(18, 'show-own published articles', 'web', '2023-05-13 11:18:12', '2023-05-13 11:18:12'),
(19, 'create-own published articles', 'web', '2023-05-13 11:18:12', '2023-05-13 11:18:12'),
(20, 'edit-own published articles', 'web', '2023-05-13 11:18:12', '2023-05-13 11:18:12'),
(21, 'delete-own published articles', 'web', '2023-05-13 11:18:12', '2023-05-13 11:18:12'),
(22, 'show-own profile', 'web', '2023-05-13 11:18:13', '2023-05-13 11:18:13'),
(23, 'create-own profile', 'web', '2023-05-13 11:18:13', '2023-05-13 11:18:13'),
(24, 'edit-own profile', 'web', '2023-05-13 11:18:13', '2023-05-13 11:18:13'),
(25, 'delete-own profile', 'web', '2023-05-13 11:18:13', '2023-05-13 11:18:13'),
(26, 'show-all published articles', 'web', '2023-05-13 11:18:13', '2023-05-13 11:18:13'),
(27, 'show-own comments', 'web', '2023-05-13 11:18:13', '2023-05-13 11:18:13'),
(28, 'create-own comments', 'web', '2023-05-13 11:18:14', '2023-05-13 11:18:14'),
(29, 'edit-own comments', 'web', '2023-05-13 11:18:14', '2023-05-13 11:18:14'),
(30, 'delete-own comments', 'web', '2023-05-13 11:18:14', '2023-05-13 11:18:14');

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
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
-- Структура таблицы `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_me` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'web', '2023-05-13 11:18:09', '2023-05-13 11:18:09'),
(2, 'moderator', 'web', '2023-05-13 11:18:09', '2023-05-13 11:18:09'),
(3, 'author', 'web', '2023-05-13 11:18:11', '2023-05-13 11:18:11'),
(4, 'user', 'web', '2023-05-13 11:18:12', '2023-05-13 11:18:12');

-- --------------------------------------------------------

--
-- Структура таблицы `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(7, 4),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(11, 4),
(12, 2),
(13, 2),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 4),
(23, 4),
(24, 4),
(25, 4),
(26, 4),
(27, 4),
(28, 4),
(29, 4),
(30, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `sources`
--

CREATE TABLE `sources` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ACTIVE','INACTIVE','BLOCKED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sources`
--

INSERT INTO `sources` (`id`, `name`, `url`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Киноновости со всего мира', 'https://www.kinonews.ru/rss', 'ACTIVE', '2023-05-13 11:18:16', '2023-05-13 11:18:16');

-- --------------------------------------------------------

--
-- Структура таблицы `taggable_taggables`
--

CREATE TABLE `taggable_taggables` (
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `taggable_id` bigint(20) UNSIGNED NOT NULL,
  `taggable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `taggable_tags`
--

CREATE TABLE `taggable_tags` (
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `normalized` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `love_reacter_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `love_reacter_id`, `deleted_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$G5dn0a3GgRgJ8do9PcY1vO6DXp//8COt1y5dDQ8ImecizoTJah9Su', 'KShZoPojEDwJQQYdYCsWriA0rut0KBhlzkRNqkId3aPgpTSByiXV1SWUeVLO', '2023-05-13 11:18:14', '2023-05-13 11:18:14', 1, NULL),
(2, 'Moderator', 'moderator@admin.com', NULL, '$2y$10$4oy5lB0zzA6AsknZwKFEEuhGinGmoVDYjzxlobtivMrRNEXMmnJT2', 'DzqCftMET8u8g9idTpeQgS4I7bsq765NyHh4I0bXcO9HGXSPFEoV96rtGWm1', '2023-05-13 11:18:15', '2023-05-13 11:18:15', 2, NULL),
(3, 'Author1', 'author1@admin.com', NULL, '$2y$10$XTRvCflPd2ty7PllfNRuEeGLiWTH5WoVEEH9oeDSXC1eR5dJKEKfS', 'DrOo5gePxbbo8ZiPJZVpYuke6O2liW1SVu8Sp1Ztk33ykWimVJKYfXEqtMtp', '2023-05-13 11:18:15', '2023-05-13 11:18:15', 3, NULL),
(4, 'Author2', 'author2@admin.com', NULL, '$2y$10$s/pI9aAvqMhw6F1TEXkwp.jASfR/lvT9L/gUf1Jqhz7hkc134Gazm', 'wKdM88Pp7e5KNbHX1Luzp1BQ27o5NaS1EVRGqobHh2TdjNTdHXHVzKuj4EKw', '2023-05-13 11:18:15', '2023-05-13 11:18:15', 4, NULL),
(5, 'User', 'user@admin.com', NULL, '$2y$10$Bhw5G48noprbtQZZKh61V.4JQo3xjLj2WXI55BwdDHc9vijWQdKUC', 'rKA57qOBMRS1fnVTsTYHz0Nfrmi7cFlwgodNC9wCsh7zu5jW9H5HLBI3w0jJ', '2023-05-13 11:18:16', '2023-05-13 11:18:16', 5, NULL),
(6, 'Тесс', 'tess@author.com', NULL, '$2y$10$zSmGmmt.g1ZWINW37hBj/ecinyKINvYf5Yj2jgnbALPBhJQk/kONu', NULL, '2023-05-13 14:35:41', '2023-05-13 14:35:41', 6, NULL),
(7, 'Леди Кошка', 'lady@author.com', NULL, '$2y$10$SrCXE1TsYNKz6/d47MiDSuVHraaN8k5zfzBoIHqIm6DFvjBnxl4uu', NULL, '2023-05-13 14:37:04', '2023-05-13 14:37:04', 7, NULL),
(8, 'Джозефина', 'josefine@author.com', NULL, '$2y$10$uDv55h8kH1s.GHFGOPSj5eSuMfmIMT5fqkSyuB8Bs2nVEHMQkAfSi', NULL, '2023-05-13 14:38:33', '2023-05-13 14:38:33', 8, NULL),
(9, 'Grogu', 'grogu@author.com', NULL, '$2y$10$Xl.srdr1ghJOcCVBCNUNseqLKf0WuVAdrsp8T4ZndJ6uxjaNKap4i', NULL, '2023-05-13 14:39:48', '2023-05-13 14:39:48', 9, NULL),
(10, 'Gandalf', 'gendalf@author.com', NULL, '$2y$10$Ji3Hpi4ZKxziL6pO37NX0.0bTOFvQyQKxvG9wzO21U8ft8md.SED2', NULL, '2023-05-13 14:41:05', '2023-05-13 14:41:05', 10, NULL),
(11, 'Любовь и сериалы', 'lubov@author.com', NULL, '$2y$10$mvMfJ4l/GGnxjHDI4hyXreNoeX4erya4jf9zEtkm0dEixHlnef9dS', NULL, '2023-05-13 14:42:34', '2023-05-13 14:42:34', 11, NULL),
(12, 'Киноман', 'kinoman@author.com', NULL, '$2y$10$W6.RKVSNd2hdz6e5w8pXsurn/LeNFhp6gawbeRqgp2.hThyvoFZFq', NULL, '2023-05-13 14:43:50', '2023-05-13 14:43:50', 12, NULL),
(13, 'Дзера', 'dzera@author.com', NULL, '$2y$10$Wfpt3yKWI1PG4DuihSG.E.TeaTPUbo4fzUbHfm76u1G.xDaFV917m', NULL, '2023-05-13 14:45:01', '2023-05-13 14:45:01', 13, NULL),
(14, 'Ms.Detective', 'detective@author.com', NULL, '$2y$10$UHog5C/ENcrR1GnlBW2gpetivSzcrTzzMBgbWhmuCicDil/s3v5QS', NULL, '2023-05-13 14:46:22', '2023-05-13 14:46:22', 14, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_user_id_index` (`user_id`),
  ADD KEY `articles_category_id_index` (`category_id`),
  ADD KEY `articles_love_reactant_id_foreign` (`love_reactant_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `love_reactants`
--
ALTER TABLE `love_reactants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `love_reactants_type_index` (`type`);

--
-- Индексы таблицы `love_reactant_reaction_counters`
--
ALTER TABLE `love_reactant_reaction_counters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `love_reactant_reaction_counters_reactant_reaction_type_index` (`reactant_id`,`reaction_type_id`),
  ADD KEY `love_reactant_reaction_counters_reaction_type_id_foreign` (`reaction_type_id`);

--
-- Индексы таблицы `love_reactant_reaction_totals`
--
ALTER TABLE `love_reactant_reaction_totals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `love_reactant_reaction_totals_reactant_id_foreign` (`reactant_id`);

--
-- Индексы таблицы `love_reacters`
--
ALTER TABLE `love_reacters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `love_reacters_type_index` (`type`);

--
-- Индексы таблицы `love_reactions`
--
ALTER TABLE `love_reactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `love_reactions_reactant_id_reaction_type_id_index` (`reactant_id`,`reaction_type_id`),
  ADD KEY `love_reactions_reactant_id_reacter_id_reaction_type_id_index` (`reactant_id`,`reacter_id`,`reaction_type_id`),
  ADD KEY `love_reactions_reactant_id_reacter_id_index` (`reactant_id`,`reacter_id`),
  ADD KEY `love_reactions_reacter_id_reaction_type_id_index` (`reacter_id`,`reaction_type_id`),
  ADD KEY `love_reactions_reaction_type_id_foreign` (`reaction_type_id`);

--
-- Индексы таблицы `love_reaction_types`
--
ALTER TABLE `love_reaction_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `love_reaction_types_name_index` (`name`);

--
-- Индексы таблицы `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Индексы таблицы `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Индексы таблицы `moonshine_change_logs`
--
ALTER TABLE `moonshine_change_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `moonshine_change_logs_moonshine_user_id_foreign` (`moonshine_user_id`);

--
-- Индексы таблицы `moonshine_socialites`
--
ALTER TABLE `moonshine_socialites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `moonshine_socialites_driver_identity_unique` (`driver`,`identity`),
  ADD KEY `moonshine_socialites_moonshine_user_id_foreign` (`moonshine_user_id`);

--
-- Индексы таблицы `moonshine_users`
--
ALTER TABLE `moonshine_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `moonshine_users_email_unique` (`email`),
  ADD KEY `moonshine_users_moonshine_user_role_id_foreign` (`moonshine_user_role_id`);

--
-- Индексы таблицы `moonshine_user_permissions`
--
ALTER TABLE `moonshine_user_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `moonshine_user_permissions_moonshine_user_id_foreign` (`moonshine_user_id`);

--
-- Индексы таблицы `moonshine_user_roles`
--
ALTER TABLE `moonshine_user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_category_id_index` (`category_id`),
  ADD KEY `news_source_id_index` (`source_id`);

--
-- Индексы таблицы `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profiles_user_id_unique` (`user_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Индексы таблицы `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `sources`
--
ALTER TABLE `sources`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `taggable_taggables`
--
ALTER TABLE `taggable_taggables`
  ADD UNIQUE KEY `taggable_taggables_tag_id_taggable_id_taggable_type_unique` (`tag_id`,`taggable_id`,`taggable_type`),
  ADD KEY `i_taggable_fwd` (`tag_id`,`taggable_id`),
  ADD KEY `i_taggable_rev` (`taggable_id`,`tag_id`),
  ADD KEY `i_taggable_type` (`taggable_type`);

--
-- Индексы таблицы `taggable_tags`
--
ALTER TABLE `taggable_tags`
  ADD PRIMARY KEY (`tag_id`),
  ADD UNIQUE KEY `taggable_tags_slug_unique` (`slug`),
  ADD UNIQUE KEY `taggable_tags_normalized_unique` (`normalized`),
  ADD KEY `taggable_tags_normalized_index` (`normalized`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_love_reacter_id_foreign` (`love_reacter_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `love_reactants`
--
ALTER TABLE `love_reactants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `love_reactant_reaction_counters`
--
ALTER TABLE `love_reactant_reaction_counters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `love_reactant_reaction_totals`
--
ALTER TABLE `love_reactant_reaction_totals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `love_reacters`
--
ALTER TABLE `love_reacters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `love_reactions`
--
ALTER TABLE `love_reactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `love_reaction_types`
--
ALTER TABLE `love_reaction_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `moonshine_change_logs`
--
ALTER TABLE `moonshine_change_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `moonshine_socialites`
--
ALTER TABLE `moonshine_socialites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `moonshine_users`
--
ALTER TABLE `moonshine_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `moonshine_user_permissions`
--
ALTER TABLE `moonshine_user_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `moonshine_user_roles`
--
ALTER TABLE `moonshine_user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `sources`
--
ALTER TABLE `sources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `taggable_tags`
--
ALTER TABLE `taggable_tags`
  MODIFY `tag_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `articles_love_reactant_id_foreign` FOREIGN KEY (`love_reactant_id`) REFERENCES `love_reactants` (`id`),
  ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `love_reactant_reaction_counters`
--
ALTER TABLE `love_reactant_reaction_counters`
  ADD CONSTRAINT `love_reactant_reaction_counters_reactant_id_foreign` FOREIGN KEY (`reactant_id`) REFERENCES `love_reactants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `love_reactant_reaction_counters_reaction_type_id_foreign` FOREIGN KEY (`reaction_type_id`) REFERENCES `love_reaction_types` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `love_reactant_reaction_totals`
--
ALTER TABLE `love_reactant_reaction_totals`
  ADD CONSTRAINT `love_reactant_reaction_totals_reactant_id_foreign` FOREIGN KEY (`reactant_id`) REFERENCES `love_reactants` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `love_reactions`
--
ALTER TABLE `love_reactions`
  ADD CONSTRAINT `love_reactions_reactant_id_foreign` FOREIGN KEY (`reactant_id`) REFERENCES `love_reactants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `love_reactions_reacter_id_foreign` FOREIGN KEY (`reacter_id`) REFERENCES `love_reacters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `love_reactions_reaction_type_id_foreign` FOREIGN KEY (`reaction_type_id`) REFERENCES `love_reaction_types` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `moonshine_change_logs`
--
ALTER TABLE `moonshine_change_logs`
  ADD CONSTRAINT `moonshine_change_logs_moonshine_user_id_foreign` FOREIGN KEY (`moonshine_user_id`) REFERENCES `moonshine_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `moonshine_socialites`
--
ALTER TABLE `moonshine_socialites`
  ADD CONSTRAINT `moonshine_socialites_moonshine_user_id_foreign` FOREIGN KEY (`moonshine_user_id`) REFERENCES `moonshine_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `moonshine_users`
--
ALTER TABLE `moonshine_users`
  ADD CONSTRAINT `moonshine_users_moonshine_user_role_id_foreign` FOREIGN KEY (`moonshine_user_role_id`) REFERENCES `moonshine_user_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `moonshine_user_permissions`
--
ALTER TABLE `moonshine_user_permissions`
  ADD CONSTRAINT `moonshine_user_permissions_moonshine_user_id_foreign` FOREIGN KEY (`moonshine_user_id`) REFERENCES `moonshine_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `news_source_id_foreign` FOREIGN KEY (`source_id`) REFERENCES `sources` (`id`);

--
-- Ограничения внешнего ключа таблицы `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_love_reacter_id_foreign` FOREIGN KEY (`love_reacter_id`) REFERENCES `love_reacters` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
