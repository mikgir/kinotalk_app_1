-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 17 2023 г., 12:44
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
  `love_reactant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`, `deleted_at`, `love_reactant_id`, `active`) VALUES
(1, 11, 5, 'Не все без ума от Мидж: Каким вышел четвертый сезон «Удивительной миссис Мейзел»?', NULL, NULL, '<pre>Одно из главных обстоятельств новых восьми эпизодов, которое может вызвать протест,<br>&mdash; исчезновение центра притяжения.<br>Поначалу им был клуб &laquo;Газлайт&raquo;, во втором сезоне &mdash; курорт Катскилл,&nbsp;окутанный пеленой <br>объяснений с родителями, а в третьем &mdash; турне и навык жизни в дороге.<br>Теперь Мидж отдана самой себе: комикесса находит постоянную работу в нелегальном <br>стриптиз-клубе и отказывается от предложений открывать концерты больших звезд<br>(и даже выступать на разогреве у своей заклятой врагини Софи Леннон).</pre>', NULL, 'ne-vse-bez-uma-ot-midz-kakim-vysel-cetvertyi-sezon-udivitelnoi-missis-meizel', NULL, NULL, 'PENDING', 0, '2023-05-15 21:00:00', '2023-05-15 21:00:00', NULL, 1, 0),
(2, 12, 4, 'В&nbsp;трейлере фильма &laquo;Марвелы&raquo; намекнули на&nbsp;Стражей Галактики?', NULL, NULL, '<pre>Студия Марвел представила первый трейлер экранизации комиксов \"Марвелы\", и в нем содержатся некоторые элементы, намекающие<br>на связь с другими популярным фильмом - \"Стражи Галактики\".</pre>', NULL, 'vnbsptreilere-filma-laquomarvelyraquo-nameknuli-nanbspstrazei-galaktiki', NULL, NULL, 'DRAFT', 0, '2023-05-16 21:00:00', NULL, NULL, 2, 0),
(3, 11, 2, '&laquo;Очень странные дела&raquo; станут анимационным сериалом?', NULL, NULL, '<pre>Netflix объявил о работе над анимационным сериалом по вселенной &laquo;Очень странных дел&raquo;. Автором мультсериала выступит Эрик Роблз,<br>продюсерами станут братья Мэтт и Росс Дафферы, а их компания Upside Down Pictures займется производством, сообщает Variety</pre>', NULL, 'laquoocen-strannye-delaraquo-stanut-animacionnym-serialom', NULL, NULL, 'DRAFT', 0, NULL, NULL, NULL, 3, 0),
(4, 11, 2, 'Фишер, это жуткий сериал, про манька который убивал..', NULL, NULL, '<pre>В названии основанного на реальных событиях сериала скрывается имя маньяка, которого ищут следователи. Фишер &mdash; прозвище Сергея Головкина.<br>Жертвами преступника с 1986-го по 1992 год в Одинцовском районе Московской области стали как минимум 11 мальчиков и юношей.</pre>', NULL, 'fiser-eto-zutkii-serial-pro-manka-kotoryi-ubival', NULL, NULL, 'DRAFT', 0, '2023-05-16 21:00:00', NULL, NULL, 4, 0),
(5, 6, 1, '«Океаны» предлагают зрителю заглянуть в волшебный...', NULL, NULL, '<pre>&laquo;Как можно искупить преступления ловцов, срезающих живым акулам плавники и бросающих их обратно в воду, оставляя погибать от шока и удушья?&raquo; &mdash;<br>сказала в одном интервью вокалистка Dead Can Dance и обладательница чарующего голоса Лайза Джеррард.</pre>', NULL, 'okeany-predlagaiut-zriteliu-zaglianut-v-volsebnyi', NULL, NULL, 'DRAFT', 0, '2023-05-16 21:00:00', NULL, NULL, 5, 0);

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
(5, 1, 'Новости кино', 'novosti-kino', '2023-05-12 21:00:00', '2023-05-12 21:00:00', NULL),
(6, 1, 'Киноновости со всего мира', 'kinonovosti-so-vsego-mira', '2023-05-14 21:00:00', '2023-05-14 21:00:00', NULL);

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

--
-- Дамп данных таблицы `love_reactants`
--

INSERT INTO `love_reactants` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Article', '2023-05-16 13:40:53', '2023-05-16 13:40:53'),
(2, 'App\\Models\\Article', '2023-05-17 05:30:32', '2023-05-17 05:30:32'),
(3, 'App\\Models\\Article', '2023-05-17 05:32:57', '2023-05-17 05:32:57'),
(4, 'App\\Models\\Article', '2023-05-17 05:35:16', '2023-05-17 05:35:16'),
(5, 'App\\Models\\Article', '2023-05-17 05:37:31', '2023-05-17 05:37:31');

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
(13, 'App\\Models\\User', 14, '702ff01a-d185-496a-9081-42bb6e0cce54', 'avatars', 'People21', 'People21.png', 'image/png', 'public', 'public', 1230450, '[]', '[]', '{\"preview\":true,\"avatars\":true}', '[]', 1, '2023-05-13 14:46:22', '2023-05-13 14:46:23'),
(14, 'App\\Models\\Article', 1, '7caee38c-aca5-4e32-8b89-5ac39412e95a', 'sm_image', 'MrsMaisel', 'MrsMaisel.png', 'image/png', 'public', 'public', 1739847, '[]', '[]', '{\"preview\":true,\"sm_image\":true}', '[]', 1, '2023-05-16 13:40:56', '2023-05-16 13:41:03'),
(15, 'App\\Models\\Category', 5, 'daf95918-52b1-4046-a537-b4ddd66492bd', 'cover', 'Mira', 'Mira.png', 'image/png', 'public', 'public', 223332, '[]', '[]', '{\"preview\":true,\"thumb\":true}', '[]', 1, '2023-05-16 19:29:30', '2023-05-16 19:29:36'),
(16, 'App\\Models\\Category', 6, '97e19fc1-bf4e-4da2-b346-45b68ba7fcb9', 'cover', 'news6', 'news6.png', 'image/png', 'public', 'public', 2244357, '[]', '[]', '{\"preview\":true,\"thumb\":true}', '[]', 1, '2023-05-16 19:30:50', '2023-05-16 19:30:51'),
(17, 'App\\Models\\Article', 2, '5be1c28a-8f68-4af9-b958-4242e9d0d915', 'sm_image', 'marvel', 'marvel.png', 'image/png', 'public', 'public', 895333, '[]', '[]', '{\"preview\":true,\"sm_image\":true}', '[]', 1, '2023-05-17 05:30:35', '2023-05-17 05:30:42'),
(18, 'App\\Models\\Article', 3, '9efb317b-4fa6-4ebb-80b6-c159b1a851e3', 'sm_image', 'VeryStrangeThings', 'VeryStrangeThings.png', 'image/png', 'public', 'public', 2277721, '[]', '[]', '{\"preview\":true,\"sm_image\":true}', '[]', 1, '2023-05-17 05:32:57', '2023-05-17 05:32:59'),
(19, 'App\\Models\\Article', 4, '646cd1a4-7d9a-47f7-ae8b-f4327d5bc1e5', 'sm_image', 'Fisher', 'Fisher.png', 'image/png', 'public', 'public', 2086496, '[]', '[]', '{\"preview\":true,\"sm_image\":true}', '[]', 1, '2023-05-17 05:35:16', '2023-05-17 05:35:18'),
(20, 'App\\Models\\Article', 5, '56195929-a9fd-4fa8-b275-94f6e027289b', 'sm_image', 'Oceans', 'Oceans.png', 'image/png', 'public', 'public', 1165717, '[]', '[]', '{\"preview\":true,\"sm_image\":true}', '[]', 1, '2023-05-17 05:37:32', '2023-05-17 05:37:33');

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
(29, '9999_12_20_173629_create_notifications_table', 1),
(30, '2023_05_16_155615_add_active_to_articles_table', 2),
(31, '2023_05_16_160001_add_active_to_news_table', 2),
(32, '2023_05_16_160309_add_active_to_users_table', 2);

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
  `deleted_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `category_id`, `source_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`, `deleted_at`, `active`) VALUES
(1, 1, 1, 'Саймон Пегг рассказал о своем алкоголизме на площадке \"Миссия невыполнима\"', NULL, 'Звезда франшизы \"Миссия невыполнима\" Саймон Пегг рассказал о том, как скрывал свой алкоголизм от акт', 'Звезда франшизы \"Миссия невыполнима\" Саймон Пегг рассказал о том, как скрывал свой алкоголизм от актеров и съемочной группы на съемочной площадке серии боевиков, возглавляемой Томом Крузом. Актер, исполняющий роль технического специалиста Бенджи Данна, начиная с фильма \"Миссия невыполнима 3\", признался, что во время съемок фильма в 2006 году у него случился эпизод психического расстройства, и он пристрастился к алкоголю: \"Ты становишься очень скрытным, когда у тебя случается что-то подобное в твоей жизни. Ты учишься делать это так, чтобы никто ничего не заметил, потому что это берет над тобой верх. Алкоголь сделает все, что в его силах, чтобы его продолжали употреблять. Но в конце концов дело доходит до того, что это невозможно скрыть, и именно тогда, к счастью, я смог выйти из этого погружения\", - в частности сказа актер.Саймон Пегг, который сейчас восстанавливает здоровье, также упомянул о своей дружбе с коллегой по франшизе Томом Крузом, признавшись, что иногда подтрунивает над суперзвездой на предмет его небывалой славы и привилегий, которые она приносит. \"Мы шутим по этому поводу. Я имею в виду, я всегда подшучиваю над ним за это, ну, вы знаете, за те вещи, к которым он может получить доступ... иногда он вроде как осознает всю нелепость этого. Мои отношения с ним очень простые и дружелюбные, они всегда были очень легкими. Я думаю, вы понимаете, что когда вы встречаетесь с человеком, а не с зарослями мифологии, которая создана вокруг него, это совсем другой опыт. Я имею в виду, что он любит славу, и он действительно наслаждается ею, это все, что он знает. Это заряжает его энергией и подстегивает\".\r\nЛучшие фильмы и сериалы Саймона Пегга\r\n\"Братья по оружию\" (2001)\"Зомби по имени Шон\" (2004)\"Миссия невыполнима 3\" (2006)\"Как потерять друзей и заставить всех тебя ненавидеть\" (2008)\"Звездный путь\" (2009)\"Пол: Секретный материальчик\" (2011)', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116117.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:42', '2023-05-15 07:17:42', NULL, 1),
(2, 1, 1, 'Фильм \"Гипнотик\" показал худший старт в карьере Бена Аффлека', NULL, 'Новый фильм с участием Бена Аффлека провалился на старте в Северной Америке. Картина под названием \"', 'Новый фильм с участием Бена Аффлека провалился на старте в Северной Америке. Картина под названием \"Гипнотик\", вышедшая на более чем двух тысячах экранах, смогла собрать в свой премьерный уик-энд лишь 2,5 миллиона долларов. И это был худший результат не только для самого Бена Аффлека, но и для режиссера Роберта Родригеса.Производственный бюджет фильма \"Гипнотик\" оценивается в 65 миллионов долларов, поэтому после такого катастрофического старта финансовые потери его создателей составят десятки миллионов долларов.Научно-фантастический триллер прошел через серию неудач на пути к большому экрану, завершившуюся крахом студии Solstice Studios, которая должна была вывести проект на рынок и выпустить его в прокат. Solstice, возглавляемая ветераном инди-индустрии Марком Гиллом, рассчитывала на \"Гипнотик\", который должен был определить ее будущее.Но молодая компания была пущена под откос пандемией, несмотря на скромный успех 2000-х годов. В 2021 году Solstice попыталась заключить стратегическое партнерство со Студией 8 Джеффа Робинова и \"Гипнотик\" стал их первым совместным проектом.Это уже второй крупный провал Бена Аффлека с начала 2023 года. Ранее неудача постигла биографическую драму под названием \"Эйр\", постановщиком которой стал сам актер. Она собрала всего 86 миллионов долларов при бюджете в 90 миллионов.\r\nКакие фильмы с Беном Аффлеком выйдут в 2023 году?\r\nАктер вновь вернется к единственной своей относительно успешной роли Бэтмена в фантастическом боевике \"Флэш\", основанном на комиксах DC. Лента выйдет в прокат в середине июня.', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116116.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:43', '2023-05-15 07:17:43', NULL, 1),
(3, 1, 1, 'Шарлиз Терон пришла в прозрачном платье на премьеру \"Форсаж 10\"', NULL, 'Южноафриканская актриса Шарлиз Терон порадовала зрителей на премьере боевика \"Форсаж 10”, появившись', 'Южноафриканская актриса Шарлиз Терон порадовала зрителей на премьере боевика \"Форсаж 10”, появившись перед публикой в готическом, прозрачном черном платье.Наряд от Versace с глубокими вырезами и прозрачным топом практически не оставляло простора воображению. Платье без рукавов было украшено асимметричным вырезом и серебряными цепочками, свисающими по бокам. Шарлиз дополнила образ туфлями на высоких каблуках и минимумом украшений, что еще больше акцентировало внимание на ее платье.Ее светлые локоны были уложены прямыми и гладкими прядями, а макияж был минимальным. Оскароносная актриса позировала на \"красной дорожке\" вместе со своими коллегами по фильму Вином Дизелем, Лудакрисом и Джоном Синой.Смелое одеяние Шарлиз Терон привлекло много внимания и вызвало бурные обсуждениям в социальных сетях, многие хвалили ее за выбор одежды. Поклонники франшизы не могли не заметить, как актриса стремится превзойти саму себя с каждой премьерой.\r\nВ каком эпизоде \"Форсажа\" появилась Шарлиз Терон?\r\nЗвезда южноафриканского происхождения стала неотъемлемой частью франшизы в фильме “Форсаж 8”, где она сыграла злодейку Сайфер. Она повторила свою роль в восьмой и девятой частях франшизы, ее героиня продолжала доставлять массу неприятностей главным героям франшизы.', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116115.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:43', '2023-05-15 07:17:43', NULL, 1),
(4, 1, 1, 'В фильме \"Супермен: Наследие\" Лекс Лютор может стать черным', NULL, 'Теперь, когда фильм \"Стражи Галактики. Часть 3\" вышел в кинотеатрах, а обязательства Джеймса Ганна п', 'Теперь, когда фильм \"Стражи Галактики. Часть 3\" вышел в кинотеатрах, а обязательства Джеймса Ганна перед Marvel Studios выполнены, все его внимание сосредоточено на подборе актерского состава для предстоящей перезагрузки DC \"Супермен: Наследие\", в связи с чем появилось много противоречивой информации, в том числе касающейся роли главного антагониста - Лекса Лютора. Так, в одном отчете сообщалось, что Джеймс Ганн обсуждал роль с двумя актерами из франшизы \"Стражи Галактики\", затем выдвигалась версия, что на роль суперзлодея рассматривается Николас Холт. Теперь же, по сведениям инсайдеров издания TheWrap, Джеймс Ганн и кастинговая команда фильма \"Супермен: Наследие\" присматриваются к черным актерам на роль, которая описывается как Апекс Лекс, что является версией персонажа, который мог бы сойтись лицом к лицу с Суперменом.В комиксах Апекс Лекс был гибридом человека и марсианина и мог физически сойтись лицом к лицу с Суперменом, хотя неясно, является ли Лекс Лютор в фильме Джеймса Ганна на самом деле Апексом Лексом. В кинокомиксах Зака Снайдера роль Лекса Лютора исполнил Джесси Айзенберг.\r\nКто проходит прослушивание на главные роли в фильме \"Супермен: Наследие\"?\r\nПо сведениям различных источников, среди кандидатов на роль Супермена - Николас Холт (\"Ренфилд\"), Дэвид Коренсвет (\"Перл\"), Джейкоб Элорди (\"Эйфория\") и Эндрю Ричардсон (\"Экстраполяции\"). На роль Лоис Лейн проходят прослушивания Рэйчел Броснахэн (\"Удивительная миссис Майзел\"), Эмма Маккей (\"Половое воспитание\") и Самара Уивинг (\"Я иду искать\").', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116111.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:43', '2023-05-15 07:17:43', NULL, 1),
(5, 2, 1, 'Джуд Лоу и Ана де Армас сыграют в новом триллере Рона Ховарда', NULL, 'Знаменитый голливудский режиссер Рон Ховард приступает к работе надо своим новым фильмом под названи', 'Знаменитый голливудский режиссер Рон Ховард приступает к работе надо своим новым фильмом под названием \"Происхождение видов\", участие в котором примет внушительный актерский состав, в том числе Джуд Лоу, Ана де Армас, Алисия Викандер, Даниэль Брюль и другие.Основанный на двух разных рассказах об одной и той же реальной истории, фильм описывается как “мрачная и одновременно комическая история об убийстве и выживании, действие которой разворачивается вокруг группы эклектичных персонажей, покидающих цивилизацию ради приключений на Галапагосских островах. Все они ищут ответ на вечно актуальный вопрос, который мучает всех нас: в чем смысл жизни”. Продюсерами являются Брайан Грейзер из Imagine и Карен Ландер.Съемки фильма \"Происхождение видов\" должны стартовать в четвертом квартале 2023 года и пройдут преимущественно в Австралии, которая предоставляет голливудским кинематографистам существенные налоговые льготы. Потенциальные покупатели смогут посостязаться за право представлять эту картину на грядущем Каннском кинорынке. Возможная дата релиза пока не обсуждается.\r\nКакие фильмы снял Рон Ховард?\r\nВ активе постановщика такие известные киноленты, как \"Гринч - похититель Рождества\", \"Игры разума\", \"Код да Винчи\" и многие другие. Его работы были отмечены множеством престижных наград, в том числе \"Оскаром\".', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116109.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:43', '2023-05-15 07:17:43', NULL, 1),
(6, 2, 1, '\"Стражи Галактики 3\": Вторые выходные с одним из лучших результатов Марвел', NULL, 'Фильм \"Стражи Галактики. Часть 3\" продемонстрировал отличную выносливость в домашнем прокате. Во вто', 'Фильм \"Стражи Галактики. Часть 3\" продемонстрировал отличную выносливость в домашнем прокате. Во вторые выходные его кассовые сборы в Северной Америке снизились всего на 49 процентов, и это был третий лучший результат всей киновселенной Марвел.В абсолютных величинах сборы третьих \"Стражей Галактики\" увеличились еще на 60,5 миллиона долларов. В предыдущий раз второй уик-энд был примерно таким сильным, когда вышел фильм \"Шан-Чи и Легенда Десяти Колец\" (-54%). С тех пор большинство экранизаций комиксов Марвел  показывали куда худшие результаты, включая стартовавший прошлым летом \"Доктор Стрэндж 2: В мультивселенной безумия\" (-67%) и даже \"Человек-Паук 3: нет пути домой\" (-68%). \"Человек-муравей и Оса: Квантомания\" и вовсе потерял 70% во вторые выходные. Этот рейтинг все еще возглавляет \"Черная пантера\" (45 процентов), за ней следует \"Тор\" (47 процентов) падения сборов.За рубежом фильм \"Стражи Галактики. Часть 3\" получил еще 91,9 миллиона долларов с 52 рынков, что составило 315,6 миллиона долларов, включая весьма внушительные по нынешним меркам 58,4 миллиона долларов из Китая. Совокупные заработки третьей серии превысили 528,8 миллиона долларов по всему миру.\r\nСколько стоил фильм \"Стражи Галактики 3\"?\r\nПроизводственный бюджет третьей части оценивался в 250 миллионов долларов, то есть для окупаемости в прокате ей нужно было собрать не менее 600-650 миллионов долларов. Это вполне достижимый результат с такой динамикой кассовых сборов.', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116108.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:44', '2023-05-15 07:17:44', NULL, 1),
(7, 3, 1, '\"Форсаж 10\": Стал известен главный сюрприз десятой серии', NULL, 'Создателям фильма \"Форсаж 10\" все же удалось удивить зрителей, преподнеся им большой сюрприз, о кото', 'Создателям фильма \"Форсаж 10\" все же удалось удивить зрителей, преподнеся им большой сюрприз, о котором ранее говорила Мишель Родригес.Как утверждает издание The Warp, во франшизу вернулся агент Хоббс в исполнении Дуэйна Джонсона. Его персонаж появился в сцене после титров, ставшей теперь традиционной для многих голливудских блокбастеров.Что делает его возвращение таким шокирующим, так это то, насколько ранее непреклонен был Дуэйн Джонсон в своем решении не возвращаться в \"Форсаж\". В ноябре 2021 года звезда франшизы и продюсер Вин Дизель опубликовал пост на своей странице в социальной сети, в котором попросил Дуэйна Джонсона вернуться к основной серии.Через месяц после обращения Джонсон заявил в интервью: “Я прямо сказал (Дизелю), что не вернусь. Я был тверд, но сердечен в своих словах и сказал, что всегда буду поддерживать актерский состав и всегда буду болеть за успех франшизы, но нет ни единого шанса на возвращение. Недавний публичный пост Вина был примером его манипуляций. Мне не понравилось, что он упоминал своих детей в этом обращении, а также смерть Пола Уокера. Оставь их в покое. Мы говорили об этом несколько месяцев назад и пришли к четкому пониманию”.\r\nКто создал фильм \"Форсаж 10\"?\r\nПостановщиком выступил Луи Летерье. Вин Дизель снимался вместе с Мишель Родригес, Тайризом Гибсоном, Крисом ”Лудакрисом\" Бриджесом, Джейсоном Момоа, Натали Эммануэль, Джоном Синой, Шарлиз Терон, Хелен Миррен, Бри Ларсон и Ритой Морено. Фильм \"Форсаж 10\" выходит в прокат 19 мая.', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116103.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:44', '2023-05-15 07:17:44', NULL, 1),
(8, 3, 1, 'Названы главные претенденты на роли Супермена и Лекса Лютора', NULL, 'Глава студии DC Джеймс Ганн приступил к формированию актерского состава экранизации комиксов под наз', 'Глава студии DC Джеймс Ганн приступил к формированию актерского состава экранизации комиксов под названием \"Супермен: Наследие\". Журналистам стали известны основные претенденты на главные роли, в том числе самого Человека из стали, его возлюбленной Лоис Лейн, а также злодея Лекса Лютора.Источники утверждают, что Дэвид Коренсвет, недавно сыгравший киномеханика в триллере \"Перл\", рассматривается на роль Кларка Кента, (он же Супермен). Процесс его прослушивания уже вышел на стадию кинопроб в костюмах, которые, состоятся состоятся после Дня памяти или в начале июня.Что касается Лоис Лейн, отважного репортера новостной организации Metropolis Daily Planet, претендентками стали Эмма Маккей, одна из звезд сериала Нетфликс \"Половое воспитание\", которая появится в фильме Warner Bros. \"Барби\", Рэйчел Броснахэн, звезда нашумевшего сериала Amazon \"Удивительная миссис Майзел\", получившая премию \"Эмми\"; актриса Фиби Дайневор; и Самара Уивинг, которую зрители видели в фильме \"Крик 6\".В связи с Лексом Лютором упоминается лишь одно имя - Николас Холт. Анонимные информаторы отмечают, что вопрос с его участием практически решенный, так как руководители Warner находятся под большим впечатлением от его талантов еще после выхода боевика \"Безумный Макс 4: Дорога ярости\".\r\nКогда выйдет фильм \"Супермен: Наследие\"?\r\nСтудия Warner Bros. уже назначала дату релиза на 11 июля 2025 года. Ранее сообщалось, что картина представит историю знаменитого криптонца, пытающегося найти баланс между его инопланетным происхождением и человеческим воспитанием, которое он получил как Кларк Кент из Смолвиля,', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116102.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:44', '2023-05-15 07:17:44', NULL, 1),
(9, 3, 1, 'В Каннах запретили протесты во время кинофестиваля', NULL, 'Власти города Канны запретил все акции протеста вдоль набережной Круазетт и ее окрестностей во время', 'Власти города Канны запретил все акции протеста вдоль набережной Круазетт и ее окрестностей во время проведения международного Каннского кинофестиваля.Ранее профсоюзы заявляли, что они готовят большую демонстрацию 21 мая, но теперь она пройдет на бульваре Карно, вдали от набережной Круазетт и штаб-квартиры фестиваля. Также 19 мая с 13:00 до 15:00 состоится митинг работников сферы гостеприимства, включая персонал гостиниц, кафе и ресторанов, перед отелем Carlton, среди знаменитых гостей которого в этом году Мартин Скорсезе. Митинг, в ходе которого протестующие, скорее всего, будут стучать кастрюлями, чтобы выразить свой гнев, технически разрешен, поскольку территория отеля Carlton является частной территорией.Город Канны и региональные власти ввели этот запрет на большей части территории Канн, чтобы предотвратить гражданские беспорядки. С начала марта страну сотрясают массовые протесты из-за непопулярной пенсионной реформы французского правительства, повышающей пенсионный возраст в стране. В последний раз Францию сотрясали протесты такого масштаба в 2004 году, когда сотни тысяч людей вышли на улицы Канн, возмущенные изменениями правил выплаты пособий по безработице,\r\nКогда пройдет Каннский кинофестиваль в 2023 году?\r\nСамый престижный европейский кинофорум пройдет с 16 по 27 мая. Французские энергетики грозились обесточить основные площадки фестиваля в знак протеста против решения президента Макрона увеличить пенсионный возраст.', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116101.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:44', '2023-05-15 07:17:44', NULL, 1),
(10, 3, 1, 'Мел Гибсон снимет Марка Уолберга в драме \"Рискованный полет\"', NULL, 'Мел Гибсон возвращается в режиссерское кресло впервые с 2016 года, когда он получил номинацию на пре', 'Мел Гибсон возвращается в режиссерское кресло впервые с 2016 года, когда он получил номинацию на премию \"Оскар\" за фильм \"По соображениям совести\". Его новый проект получил название \"Рискованный полет\" (Flight Risk), и главную роль сыграет номинант на премию \"Оскар\" Марк Уолберг.Киностудия Lionsgate, с которой Мел Гибсон уже сотрудничал ранее, представит фильм потенциальным покупателям на Каннском кинорынке. Сообщается, что Марк Уолберг сыграет пилота, перевозящего опасного преступника, которого ждет суд. Проводится дополнительный кастинг. Картина основана на сценарии Джареда Розенберга.Фильм ознаменует воссоединение Мела Гибсона и Марка Уолберга после того, как в прошлом году они снялись в кассовом хите \"Отец Стю\".Напомним, что оскараносный постановщик за тридцать лет снял пять фильмов, и каждый из них был успешным в прокате. “Нам нравится внушительная пара - Мел Гибсон и Марк Уолберг, - прокомментировал председатель правления Lionsgate Джо Дрейк. - Это таланты мирового класса, объединившиеся для создания динамичного, наполненного яркими персонажами фильма, сделают ”Рискованный полет\" одним из самых напряженных событий года, которое обязательно нужно посмотреть на большом экране\".\r\nЗа что Мел Гибсон получил \"Оскар\"?\r\nРежиссер был награжден премией Американской Киноакадемии за фильм \"Храброе сердце\", в котором он также сыграл главную роль.', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116097.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:44', '2023-05-15 07:17:44', NULL, 1),
(11, 4, 1, 'Уиллем Дефо сыграет в фильме \"Битлджус 2\"', NULL, 'И без того внушительный актерский состав сиквела \"Битлджус 2\" пополнился еще одним громким именем. З', 'И без того внушительный актерский состав сиквела \"Битлджус 2\" пополнился еще одним громким именем. Знаменитый голливудский актер Уиллем Дефо присоединился к продолжению истории, рассказанной Тимом Бертоном в 1988 году.На момент написания заметки производство полнометражного фильма студии Warner Bros. уже началось, и Тим Бертон вернулся в режиссерское кресло. Создатели \"Уэнсдэй\" Альфред Гоф и Майлз Миллар подготовили сценарий.Возглавляет актерский состав Дженна Ортега \"(Уэнсдэй\"), которая сыграет дочь Лидии из фильма \"Битлджус\". Майкл Китон повторит свою роль несносного призрака Битлджуса, а Вайнона Райдер - звезда оригинальной картины - сыграет мать персонажа Дженны Ортега, Лидии Дитц. Кэтрин О`Хара вновь предстанет в образе мачехи Лидии Дитц, Делии Дитц. Джастин Теру и Моника Беллуччи также появятся в фильме. Последняя сыграет супругу Битлджуса.Хотя детали сюжета предстоящего фильма держатся в секрете, Уиллем Дефо, по сведениям инсайдеров, сыграет сотрудника правоохранительных органов в загробной жизни.Несколькими днями ранее Warner Bros. объявила, что \"Битлджус 2\" выйдет в прокат 6 сентября 2024 года, в день, на который запланирована премьера фильма \"Блэйд\", предпроизводство которого было приостановлено в связи в забастовкой сценаристов.\r\n\r\nНедавние и предстоящие фильмы Уиллема Дефо\r\nНоминированный на четыре \"Оскара\" Уиллем Дефо недавно появился в триллере \"Внутри\", в исторической драме Роберта Эггерса \"Варяг\" и повторил роль любимого фанатами Нормана Осборна/Зеленого гоблина в \"Человеке-пауке 3: нет пути домой\". Среди предстоящих фильмов актера - \"Город астероидов\" Уэса Андерсона, премьера которого состоится в Каннах, \"Бедные и несчастные\" Йоргоса Лантимоса и \"Носферату\" - вампирский триллер, в котором он снова объединяется с Робертом Эггерсом.', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116093.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:44', '2023-05-15 07:17:44', NULL, 1),
(12, 4, 1, 'Дуэйн Джонсон рассказал о своей депрессии', NULL, 'Один из самых высокооплачиваемых актеров современного кино Дуэйн Джонсон откровенно рассказал о прис', 'Один из самых высокооплачиваемых актеров современного кино Дуэйн Джонсон откровенно рассказал о приступах депрессии, которым он подвергался на протяжении всей своей жизни, начиная с того времени, когда он учился в колледже.Во время выступления на подкасте Pivot звезда фильма \"Черный Адам\" объяснил, что впервые почувствовал депрессию, когда учился в Университете Майами, и повредил плечо, из-за чего больше не смог играть в футбольной команде.“Я не хотел ходить на учебу. Я был готов уйти. Я бросил занятия. Я не сдавал никаких промежуточных экзаменов и просто ушел. Но самое интересное, что в то время я просто не осознавал, что со мной происходит. Я не знал, что такое психическое здоровье. Я не знал, что такое депрессия. Мне просто казалось, что я не хочу там быть, не хожу ни на одно из собраний команды, ни в чем не участвую”, - поведал актер.Вторым эпизодом в жизни Дуэйна Джонсона стал развод. \"Но годы спустя, примерно в 2017 году или около того, произошло небольшое изменение. В то время я уже понимал, что такое депрессия, и, к счастью, в то время у меня было несколько друзей, на которых я мог опереться и сказать: \"Знаешь, сейчас я чувствую себя неуверенно. Я вижу немного серого, а не цветного”, - добавил Дуэйн Джонсон.Актер также отметил, что его “спасением” во время приступов депрессии были три дочери и то, что он “был отцом девочек”. \"Это невозможно исправить, если ты будешь держать эту боль внутри. Иметь мужество заговорить с кем-то - это ваша сверхспособность. Я потерял двух друзей из-за самоубийства. Поговорите с кем-нибудь. Независимо от ваших переживаний, вы никогда не бываете абсолютно одиноки\", - посоветовал он.\r\nПровал фильма \"Черный Адам\" скажется на карьере Дуэйна Джонсона?\r\nГрандиозным планам актера, который планировал возглавить киновселенную DC, больше не суждено осуществиться, однако Дуэйн Джонсон продолжает оставаться очень востребованным актером в своем жанре. В 2023 году на экраны выйдет новый фильм с его участием под названием \"Красный\", в котором он сыграл с Крисом Эвансом.', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116096.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:44', '2023-05-15 07:17:44', NULL, 1),
(13, 4, 1, '\"Форсаж 10\": Первые зрители сравнили Джейсона Момоа с Джокером', NULL, 'После мировой премьеры фильма \"Форсаж 10\" в Италии в Сети появились первые отзывы о десятом эпизоде ', 'После мировой премьеры фильма \"Форсаж 10\" в Италии в Сети появились первые отзывы о десятом эпизоде популярной приключенческой франшизы. Зрители отмечали масштаб зрелища и вклад Джейсона Момоа в качестве нового злодея франшизы, Данте Рейеса, сравнивая его с Джокером из комиксов DC.\"Форсаж 10\" совершенно безумен (мне нравилась каждая секунда). От ураганного действия и острот у меня болело лицо из-за того, что я так много улыбался. Джейсон Момоа излучает позитив. Ансамбль - огонь. Сам фильм? Пик летнего блокбастера! Черт возьми, да. Создан для просмотра на большом экране под попкорн\", - отметил рецензент по имени Лайам Кроули.\"Форсаж 10\" возвращает франшизу в нужное русло, и причина №1 - Джейсон Момоа, который играет Данте, в какой-то степени похожего на Джокера. Он жизнерадостный психопат, и это восхитительно. Наряду с историей, которая позволяет избежать того, из-за чего \"Форсаж 9\" казался устаревшими, это несомненная победа\", - написал журналист Эрик Айзенберг.\"Форсаж 10\" буквально принадлежит Джейсону Момоа и его декадентскому плохому парню Данте Рейесу. Свирепый и эпатажный, его яркий, почти павлиний, образ добавляет остроты и освежающего черного юмора. Остальное, как обычно, нелепость, но это глупо забавно. Какой еще рецензии вы ожидали?\", - добавил корреспондент Саймон Томпсон.\r\nВыйдет ли фильм \"Форсаж 10\" в России?\r\nУ российских зрителей появится возможность оценить десятую серию \"Форсажа\" на больших экранах, несмотря на то, что студия Universal официально не выпускает свои кинопроекты на отечественном рынке. Фильм выйдет примерно в то же время, что в других странах - после 19 мая 2023 года.', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116095.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:45', '2023-05-15 07:17:45', NULL, 1),
(14, 4, 1, '\"Форсаж 10\": Шарлиз Терон восхитилась Джейсоном Момоа', NULL, 'Шарлиз Терон оказалась под большим впечатление от работы на съемочной площадке фильма \"Форсаж 10\" Дж', 'Шарлиз Терон оказалась под большим впечатление от работы на съемочной площадке фильма \"Форсаж 10\" Джейсона Момоа. Своим впечатлением звезда поделилась в подкасте Access Hollywood.\"Этот чувак просто берет на себя обязательства, как никто другой, с кем я когда-либо работала. Он бесстрашный в том смысле, что умеет и в боевик, и в драму и готов полностью погружаться. Иногда я восклицала: \"Слушай, ты действительно сделал это! Ты готов пойти до конца!\", - рассказала Шарлиз Терон.\r\nКого сыграл Джейсон Момоа в фильме \"Форсаж 10\"?\r\nЗвезде \"Аквамена\" досталась роль наследника империи бразильского наркобарона, которого команда Доминика Торетто убила в одном из предыдущих эпизодов франшизы \"Форсаж\". Злодей намерен отомстить, ударив Доминика по самому больному месту - его собственной семье, куда, как известно, входят не только его кровные родственники. Для создания образа Джейсон Момоа заручился поддержкой компании Harley Davidson, предоставившей несколько мотоциклов.Ранее стало известно, что сцену поединка между героинями Шарлиз Терон и Мишель Родригес актрисы снимали сами без участия режиссера, то есть в значительной степени она являлась импровизацией.\r\nВин Дизель анонсировал \"Форсаж 12\"\r\nВ одном из интервью актер проговорился, что студия предложила ему завершить франшизу не дилогией, а трилогией. Он не уточнил планы по этому поводу, но, скорее всего, зрителей ждет и двенадцатый эпизод \"Форсажа\".', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116079.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:45', '2023-05-15 07:17:45', NULL, 1),
(15, 4, 1, 'Джонни Депп получит 20 миллионов долларов от Dior', NULL, 'Компания Dior укрепляет свои деловые отношения с популярным голливудским актером Джонни Деппом. Фран', 'Компания Dior укрепляет свои деловые отношения с популярным голливудским актером Джонни Деппом. Французский дом моды класса люкс и косметический гигант, который поддерживал звезду даже тогда, когда он столкнулся с крайне негативным пиаром на фоне судебной тяжбы с бывшей женой Эмбер Херд, подписал с ним самый крупный контракт в истории рекламы мужских ароматов.Источники оценивают трехлетнюю сделку более чем в 20 миллионов долларов, что затмевает условия аналогичного соглашения Роберта Паттинсона на 12 миллионов долларов в качестве представителя Dior Homme и соглашение Брэда Питта на семь миллионов долларов о продвижении Chanel № 5. Источник, знакомый с парфюмерной индустрией, говорит, что большинство звезд, заключающих сделки с производителями ароматов, зарабатывают около 2-4 миллионов долларов в год, например Крис Пайн, контракт которого с Armani оценивается в четыре миллиона долларов.Джонни Депп является лицом Dior Sauvage с 2015 года. Компания столкнулась с давлением и требованием уволить актера после того, как суд Великобритании вынес решение против него по его иску о клевете. Но имидж Джонни Деппа и его конкурентоспособность на рынке резко улучшились в прошлом году после того, как он одержал победу в США на судебном процессе против Эмбер Херд.\r\nДжонни Депп вернется в большое кино?\r\nНовый контракт актера с Dior совпадает с громкой премьерой на предстоящем Каннском кинофестивале, где 16 мая он будет присутствовать на презентации исторической драмы “Жанна Дюбарри”, в которой он сыграл короля Людовика XV. Ожидается, что на следующий день Джонни Депп отправится в Лондон, где выступит вместе с Эриком Клэптоном и Родом Стюартом. Продажи первой режиссерской работы Джонни Деппа за последние 25 лет также начнутся на каннском кинорынке. Фильм под названием “Моди” рассказывает о жизни итальянского художника Амедео Модильяни.', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116094.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:45', '2023-05-15 07:17:45', NULL, 1),
(16, 5, 1, 'Вин Дизель намекнул на финальную трилогию \"Форсажа\"', NULL, 'Поклонников франшизы \"Форсаж\" ожидает сюрприз: у фильма \"Форсаж 10\" может быть не одно, а два продол', 'Поклонников франшизы \"Форсаж\" ожидает сюрприз: у фильма \"Форсаж 10\" может быть не одно, а два продолжения, и следовательно, финал этого грандиозного проекта станет трилогией. С таким неожиданным заявлением выступил исполнитель главной роли и продюсер Вин Дизель.Когда его спросили о будущем франшизы и о том, куда Доминик Торетто отправится после выхода одиннадцатой серии, Вин Дизель ответил: \"Я могу сказать вот что: приступая к съемкам этого фильма, студия спросила, можно ли его сделать двухсерийным. А после того, как увидели первую часть, они такие: \"Не могли бы вы сделать \"Форсаж 10\" трилогией?\" Ну, и, ммм...\".\r\nОн не подтвердил, что таков план, но его коллега Мишель Родригес повторила эти комментарии о том, что финал будет состоять из трех актов, что, по-видимому, добавило больше легитимности тому, на что намекал Вин Дизель.  Актриса добавила многозначительно: \"В любой истории есть три действия\".Фильм \"Форсаж 10\" стартует в международном прокате 17 мая 2023 года. В картине снимались завсегдатаи франшизы, такие как Санг Кенг, Лудакрис, Джордана Брюстер, Тайриз Гибсон и другие.Сколько стоил \"Форсаж 10\"?\r\nПроизводственный бюджет фильма оценивался в 340 миллионов долларов, что сделало его самой дорогой частью серии. Для окупаемости ему потребуется собрать в мировом прокате более 800 миллионов долларов.', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116092.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:45', '2023-05-15 07:17:45', NULL, 1),
(17, 5, 1, 'Тома Круза заподозрили в романе с Шакирой', NULL, 'Исполнителя главной роли в боевике \"Топ Ган: Мэверик\" Тома Круза заподозрили в романе с популярной п', 'Исполнителя главной роли в боевике \"Топ Ган: Мэверик\" Тома Круза заподозрили в романе с популярной певицей Шакирой. Звезды посетили вместе этап гонок Formula 1, проходивший в Майами.Фотокорреспондентам удалось заснять, как Том Круз и Шакира уединились на трибуне и о чем-то долго беседовали, при этом манера общения и расстояние между ними явно свидетельствовали о флирте. \"Между ними явно химия”, - отметил анонимный источник.60-летний Том Круз холост, а 46-летняя Шакира рассталась со своим давним бойфрендом 36-летним Жераром Пике в июне прошлого года из-за обвинений в том, что у него был роман с его нынешней девушкой Кларой Чиа Марти. Шакира и Пике были вместе 12 лет, и у них двое детей, 8-летний Саша и 10-летний Милан. “Шакире сейчас нужна \"мягкая подушка\", на которую можно упасть, и это мог бы быть Том”, - добавил информатор. Утверждается также, что Том Круз был настолько очарован поп-дивой, что якобы прислал ей цветы.В окружении двух звезд пока заявляют лишь, что актер и певица были приглашены на мероприятие пилотом команды Mercedes Льюисом Хэмилтоном, который является одним из самых титулованных представителей этого вида спорта.\r\nСколько раз был женат Том Круз?\r\nОфициально актер был женат три раза, и все три раза на коллегах по цеху. Его первой супругой стала актриса Мими Роджерс, второй - Николь Кидман, и это был самый продолжительный брак, третьей - Кэти Холмс. У нег двое приемных детей и дочь, рожденная в браке с Кэти Холмс.', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116064.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:45', '2023-05-15 07:17:45', NULL, 1),
(18, 5, 1, 'Объявлены названия эпизодов шестого сезона сериала \"Черное зеркало\"', NULL, 'Нетфликс опубликовал официальные названия эпизодов и краткое описание сюжетов шестого сезона антиуто', 'Нетфликс опубликовал официальные названия эпизодов и краткое описание сюжетов шестого сезона антиутопического научно-фантастического сериала \"Черное зеркало\". Сериал, дебют которого намечен на июнь 2023 года, будет состоять из пяти эпизодов: \"Joan Is Awful\" (\"Джоан ужасна\" - здесь и далее перевод \"Новости Кино\"), \"Loch Henry\" (\"Лох Генри\"), \"Beyond the Sea\" (\"За морем\"), \"Mazey Day\" (\"День Мэйзи\") и \"Demon 79\" (\"Демон 79\").\r\nОписания сюжетов и актерский состав для каждого эпизода приведены ниже.\"Joan Is Awful\": Обычная женщина ошеломлена, узнав, что стриминг с глобальным вещанием запустил крупнобюджетную телевизионную драму-адаптацию ее жизни, в которой ее играет голливудская звезда Сальма Хайек. В ролях: Энни Мерфи, Сальма Хайек, Майкл Сера, Химеш Патель, Роб Делани и Бен Барнс.\"Loch Henry\": Молодая пара отправляется в захолустный шотландский городок, чтобы начать работу над изысканным документальным фильмом о природе, но оказывается втянутой в пикантную местную историю, связанную с шокирующими событиями прошлого. В ролях: Сэмюэл Бленкин, Миха’ла Херролд, Дэниэл Портман, Джон Ханна и Моника Долан.\"Beyond the Sea\": В альтернативном 1969 году двое мужчин, выполняющих опасную высокотехнологичную миссию, борются с последствиями невообразимой трагедии. В ролях: Аарон Пол, Джош Хартнетт, Кейт Мара, Оден Торнтон и Рори Калкин.\"Mazey Day\": Обеспокоенную старлетку преследуют назойливые папарацци, пока она разбирается с последствиями инцидента с наездом и побегом. В ролях: Зази Битц, Клара Ругор и Дэнни Рамирес.\"Demon 79\": Северная Англия, 1979 год. Кроткой продавщице говорят, что она должна совершить ужасные поступки, чтобы предотвратить катастрофу. В ролях: Аньяна Васан, Паапа Эссьеду, Кэтерин Роуз Морли и Дэвид Шилдс.О создании шестого сезона сериала \"Черное зеркало\"\r\nСоздатель \"Черного зеркала\" Чарли Брукер подготовил сценарии ко всем пяти эпизодам шестого сезона при участии Биши К. Али в \"Демоне 79\". Чарли Брукер выступает в качестве исполнительного продюсера вместе с давними партнерами по продюсированию Аннабель Джонс и Джессикой Роудс. Это первый сезон \"Черного зеркала\", который произведен новой продюсерской компанией Чарли Брукера и Аннабель Джонс Broke & Bones.', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116068.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:45', '2023-05-15 07:17:45', NULL, 1),
(19, 5, 1, 'Эмма Стоун возродится к жизни в трейлере фильма \"Бедные и несчастные\"', NULL, 'Эмма Стоун оживает в первом трейлере фантастического фильма студии Searchlight Pictures под название', 'Эмма Стоун оживает в первом трейлере фантастического фильма студии Searchlight Pictures под названием \"Бедные и несчастные\", нового режиссерского проекта Йоргоса Лантимоса, который снял такие известные ленты, как \"Лобстер\" и \"Фаворитка\".Ролик начинается с того, что главная героиня Белла Бакстер возрождается и возвращается к жизни, подобно монстру из \"Франкенштейна\". “Режиссер Йоргос Лантимос и продюсер Эмма Стоун рассказывают невероятную историю и показывают  фантастическую эволюцию молодой женщины, возвращенной к жизни блестящим и неортодоксальным ученым доктором Годвином Бакстером (Уиллем Дефо)”, - говорится в официальном синопсисе.Находясь под контролем Бакстера Белла горит желанием заново учиться. Но, изголодавшись по светскости, которой ей так не хватает, она убегает с Дунканом Уэддерберном (Марк Руффало), ловким и развратным адвокатом, и погружается в головокружительное приключения на различных континентах. Свободная от предрассудков своего времени, Белла становится непоколебимой в своем стремлении отстаивать равенство и добиться освобождения.Тизер-трейлер фильма \"Бедные и несчастные\" можно посмотреть, перейдя по этой ссылке https://www.kinonews.ru/movie_335697/poor-things.Кто снял фильм \"Бедные и несчастные\"?\r\nВ проекте задействовано немало известных актеров, в том числе Уиллем Дефо, Марк Руффало, Рами Юсеф, Джеррод Кармайкл, Кристофер Эббот, Маргарет Куэйли и Кэтрин Хантер. Фильм снят режиссером Лантимосом по сценарию Тони Макнамары. Это знаменует воссоединение Лантимоса, Макнамары и Стоун, которые все были номинированы на премию \"Оскар\" за фильм \"Фаворитка\" 2018 года. Макнамара также был соавтором сценария к последнему фильму Эммы Стоун \"Круэлла\".', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116066.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:46', '2023-05-15 07:17:46', NULL, 1),
(20, 5, 1, 'Приквел сериала \"Сверхъестественное\" закрыт после первого сезона', NULL, 'Телеканал The CW решил не продлевать новый сериал \"Винчестеры\" на второй сезон. Приквел знаменитого ', 'Телеканал The CW решил не продлевать новый сериал \"Винчестеры\" на второй сезон. Приквел знаменитого шоу \"Сверхъестественное\" был одним из перспективных для обновленной сети, однако ее новый владелец Nexstar, фокусируется на программировании без сценариев и с более низкой стоимостью производства в погоне за прибыльностью.\r\nТаким образом, на момент написания заметки на следующий сезон были продлены только самые сильные из существующих сценарных сериалов The CW: \"Настоящий американец\" и \"Уокер\". Три наименее рейтинговых - \"Винчестеры\", \"Кунг-фу\" и \"Уокер: Независимость\" - были отменены. В подвешенном состоянии остаются \"Супермен и Лоис\" и \"Настоящий американец: Возвращение домой\", а также новый телекомикс \"Рыцари Готэма\".Студия Warner Bros. Television готовится к поиску для \"Винчестеров\" нового \"дома\" и, по словам инсайдеров, планирует быть агрессивной в своих усилиях. Исполнительный продюсер сериала и звезда оригинального шоу Дженсен Эклс уже инициировал кампанию по спасению сериала в социальных сетях, обратившись за поддержкой к фанатам \"Сверхъестественного\", просуществовавшего 15 сезонов.О чем сериал \"Винчестеры\"?\r\n\"Винчестеры\" по сценарию Робби Томпсона являются приквелом к легендарному сериалу The CW \"Сверхъестественное\", в центре которого находятся будущие родители Дина и Сэма Винчестеров - Джон и Мэри. Рассказанный от лица Дина Винчестера (Дженсен Эклс), сериал \"Винчестеры\" представляет собой эпическую историю любви о том, как Джон (Дрэйк Роджер) и Мэри (Мэг Доннелли) поставили на карту все, чтобы спасти не только свою любовь, но и весь мир.', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116059.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:49', '2023-05-15 07:17:49', NULL, 1),
(21, 6, 1, 'Работы по созданию сиквела сериала \"Одни из нас\" остановлены', NULL, 'Второй сезон ставшего настоящим хитом сериала HBO \"Одни из нас\" ощущает на себе последствия забастов', 'Второй сезон ставшего настоящим хитом сериала HBO \"Одни из нас\" ощущает на себе последствия забастовки сценаристов. По словам инсайдера, близкого к производству, кастинг для второго сезона экранизации одноименной видеоигры шел полным ходом до начала текущей недели, а затем был приостановлен.\r\nДо этого многочисленные источники сообщали, что команда по кастингу просила актеров прочитать отрывки, взятые непосредственно из видеоигры \"Одни из нас: Часть 2\", на которой будет основан второй сезон сериала, поскольку на данный момент нет сценариев для продолжения. По осторожным прогнозам, съемки нового сезона начнутся в начале 2024 года в Ванкувере.Отсутствие сценариев ко второму сезону не удивительно в связи с тем, что в последние дни соавтор сериала и шоураннер Крэйг Мазин принимал участие в пикете со своими коллегами - членами Гильдии сценаристов Америки (WGA). В настоящее время он не занимается никакой писательской или продюсерской работой, включая участие в кастинге для второго сезона, в соответствии с руководящими принципами забастовки WGA. Аналогичным образом, Нил Дракманн, соавтор сериала, его сценарист и креативный директор видеоигр, в настоящее время не работает над вторым сезоном шоу ни в каком качестве.\"Одни из нас\" (\"The Last of Us\"). Дата выхода - 15.01.2023\r\nСериал был быстро продлен на второй сезон после выхода в эфир всего двух эпизодов, а его звезды - Педро Паскаль и Белла Рэмси вернутся в роли Джоэла и Элли. Крэйг Мазин написал большую часть сценариев к первому сезону, состоящему из девяти серий, а сценарии к премьерному и финальному эпизодам он написал в соавторстве с Нилом Дракманном. В свою очередь, Нил Дракманн создал сценарий к седьмому эпизоду \"Оставшиеся позади\". Шоу дебютировало в январе 2023 года на канале HBO, получив восторженные отзывы и высокие рейтинги. Финал сезона собрал 8,2 миллиона зрителей.', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116062.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:49', '2023-05-15 07:17:49', NULL, 1),
(22, 1, 1, 'Ванесса Кирби не нашла страха у Тома Круза', NULL, 'Звезда фильма \"Миссия невыполнима 7\" Ванесса Кирби рассказала о съемках самых опасных трюков, которы', 'Звезда фильма \"Миссия невыполнима 7\" Ванесса Кирби рассказала о съемках самых опасных трюков, которые довелось выполнять ее партнеру Тому Крузу, и отметила, что у него \"совершенно нет страха\".\"Он делал это много раз за один день, - вспоминает актриса съемки сцены прыжка на мотоцикле с утеса. - Он делал это последовательно и неоднократно, чтобы запечатлеть со всех возможных ракурсов. Если Том Круз и нервничал, то никак этого не показывал. Он был абсолютно спокойным. У него не было страха. Он просто находил это волнующим. Такая сильная вера в кино, в то, чего можно достичь, и его страсть к этому так вдохновляют. Он верит, что может сделать невозможное, и делает. Мне очень нравится быть частью франшизы. Я вернулась с большим удовольствием\", - прокомментировала она.Напомним, что \"Миссия невыполнима 7\" разделена на две части. Режиссер Кристофер МакКуорри объяснял это так: \"Когда я придумывал название, я знал, что оно больше относится ко второй серии, чем к первой, вот почему в конечном итоге проект обзавелся первой и второй частями.  И по мере того, как мы действительно начинали углубляться в историю путешествия персонажа Итана Ханта, это приобретало все более глубокий смысл\".Трейлер фильма \"Миссия невыполнима 7. Смертельная расплата. Часть 1\" можно посмотреть по этой ссылке https://www.kinonews.ru/movie_273603/mission-impossible-7.Когда выйдет фильм \"Миссия невыполнима 7. Смертельная расплата. Часть 1\"?\r\nСтудия Paramount планирует выпустить картину в прокат 12 июля 2023 года. Бюджет проекта оценивается в 290 миллионов долларов.', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116063.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:49', '2023-05-15 07:17:49', NULL, 1),
(23, 2, 1, 'Премьера трейлера сериала \"Ходячие мертвецы: Мертвый город\"', NULL, 'Канал AMC представил трейлер сериала \"Ходячие мертвецы: Мертвый город\" - спин-офф знаменитой зомби-д', 'Канал AMC представил трейлер сериала \"Ходячие мертвецы: Мертвый город\" - спин-офф знаменитой зомби-драмы \"Ходячие мертвецы\", - который начинается словами одной из любимых фанатами героини оригинального сериала Мэгги (Лорен Кохэн): \"Мы должны найти выход отсюда\". \"Ты не хочешь сказать мне, куда, черт возьми, мы направляемся?\" - задает ей вопрос другой популярный персонаж телекомикса Ниган (Джеффри Дин Морган), когда они на моторной лодке въезжают в разрушенный Манхэттен.\r\n\"Ходячие мертвец: Мертвый город\" рассказывает о Мэгги и Нигане, путешествующих по постапокалиптическому Манхэттену, давным-давно отрезанному от материка. Разрушающийся город наполнен мертвецами и жителями, которые превратили Нью-Йорк в свой собственный мир, полный анархии, опасности, красоты и ужаса.В ведущих ролях также задействованы Гай Чарльз и Желько Иванек, а также Джонатан Хиггинботэм, Махина Наполеон, Трей Сантьяго-Хадсон и Чарли Солис. Эли Хорн, сценарист и со-исполнительный продюсер \"Ходячих мертвецов\" в течение нескольких сезонов, выступает в качестве шоураннера и исполнительного продюсера сериала, который курирует Скотт М. Гимпл, директор по контенту вселенной \"Ходячих мертвецов\". Лорен Кохэн и Джеффри Дин Морган также выступают в качестве исполнительных продюсеров.Премьера сериала состоится на AMC и AMC+ 18 июня 2023 года. Трейлер сериала \"Ходячие мертвецы: Мертвый город\" можно посмотреть по ссылке https://www.kinonews.ru/serial_350886/the-walking-dead-dead-cityЧто говорит о сериале \"Ходячие мертвецы: Мертвый город\" его шоураннер?\r\n\"Это \"Ходячие мертвецы\", каких мы никогда раньше не видели. На самом деле, мы никогда не жили в таком городе, как этот, - сказал Эли Хорн на мероприятии WonderCon ранее в текущем году. - Это Нью-Йорк; там небоскребы до небес и полтора миллиона пешеходов. А для таких персонажей, как Мэгги и Ниган, которые долгое время бегали по лесу, это просто совершенно новый мир, который вызывает жуткую клаустрофобию, пугает, а также, как вы обнаружите, в нем есть выжившие, вы сможете увидеть все новые странные способы их жизни в апокалипсисе - это определенно не похоже ни на что, что вы видели раньше\".', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116060.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:49', '2023-05-15 07:17:49', NULL, 1),
(24, 3, 1, 'Моника Беллуччи сыграет в сиквеле фильма \"Битлджус\"', NULL, 'В актерском составе сиквела фильма \"Битлджус\" произошло значительное пополнение. К нему присоединила', 'В актерском составе сиквела фильма \"Битлджус\" произошло значительное пополнение. К нему присоединилась популярная итальянская актриса Моника Беллуччи. Утверждается, что ей уготована роль супруги самого Битлджуса.Это интересный поворот, поскольку можно представить, что женщина, которая приручила призрака, сама по себе является сверхъестественным существом или, будучи вполне себе живой, обладает каким-то даром.Ранее стало известно, что Майкл Китон возвращается, чтобы сыграть Битлджуса, а Тим Бертон вновь займет режиссерское кресло. Композитор  оригинальной ленты Дэнни Элфман собирается заняться саундтреком. Актриса Дженна Ортега исполнит роль дочери Лидии Дитц, Вайнона Райдер вернется в роли Лидии, а Кэтрин О`Хара исполнит роль мачехи Лидии Делии.Студия Warner Bros. уже забронировала дату выхода фильма \"Битлджус 2\". Он будет представлен зрителям 5 сентября 2024 года.\r\nО чем фильм \"Битлджус\"?\r\nВ оригинальной ленте пара по имени Адам и Барбара неожиданно умерли и оказались призраками, запертыми в своем живописном доме. Этот дом покупают несколько эксцентричных нью-йоркских яппи, в том числе будущая художница Делия Дитц, падчерица Делии Лидия (угрюмая девушка-гот и единственная, кто может видеть призраков Адама и Барб). Чтобы выгнать Дитц из своего дома, Адам и Барб обращаются к призрачному \"био-экзорцисту\" по имени Битлджус.Лучшие фильмы Моники Беллуччи\r\nАктриса известна во всем мире благодаря итальянским и французским фильмам, таким как \"Малена\" и \"Братство волка\". В США она принимала участие в самых разных постановках - от фантастического фильма \"Матрица\" до \"Страстей Христовых\" и картины о Джеймсе Бонде \"007: Спектр\".', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116061.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:49', '2023-05-15 07:17:49', NULL, 1);
INSERT INTO `news` (`id`, `category_id`, `source_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`, `deleted_at`, `active`) VALUES
(25, 4, 1, '\"Форсаж 10\". Дочь Пола Уокера рассказала о своей роли', NULL, 'Дочь погибшей звезды франшизы \"Форсаж\" Пола Уокера рассказала о своем участии в создании фильма \"Фор', 'Дочь погибшей звезды франшизы \"Форсаж\" Пола Уокера рассказала о своем участии в создании фильма \"Форсаж 10\". Отчет об этом был опубликован на ее странице в социальной сети.\"Первый взгляд на мою эпизодическую роль в \"Форсаже 10\". А первый опыт был, когда мне испрлнился всего один год! Я выросла на съемочной площадке, наблюдая за своим отцом, Вином, Джорданой, Мишель, Крисом и многими другими на мониторах. Благодаря моему отцу я родилась в семье Форсажа. Я не могу поверить, что теперь я тоже буду там, вместе с ними. С теми, кто был рядом и видел, как я росла. Спасибо, Луи Летерье за доброту, терпение и поддержку. Такое чувство, что вы являлись частью семьи с самого начала, я счастлива, что это действительно только начало. Отдельное спасибо лучшему другу моего отца, который теперь и мой лучший друг, без тебя это было бы невозможно. Я так счастлива, что могу чтить наследие моего отца и делиться им с ним вечно. Я так сильно вас всех люблю\", - написала Мидоу Уокер.Напомним, что фильм \"Форсаж 10\" будет выпущен в мировой прокат 17 мая 2023 года. Подробнее о проекте можно узнать по этому адресу https://www.kinonews.ru/movie_228626/fast-i-furious-10.\r\nБудут ли в фильме \"Форсаж 10\" сцены с Полом Уокером?\r\nПосле кончины актера франшиза отдала ему дань уважения различными способами. \"Форсаж 9\" закончился тем, что машина Брайана подъехала, чтобы присоединиться к остальной части его \"семьи\" за ужином. Недавно Вин Дизель заверил фанатов, что в последних двух фильмах запланированы настоящие проводы Брайана. Луи Летерье также намекал на наличие таких сцен. \"Ну, Брайан жив в мире \"Форсажа\". Этот фильм перескакивает взад и вперед между прошлым и настоящим. Вы увидите Брайана в прошлом, но вы не увидите его в настоящем\".', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116058.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:50', '2023-05-15 07:17:50', NULL, 1),
(26, 5, 1, 'Эмма Робертс отправится в космос в научно-фантастическом триллере \"Астронавт\"', NULL, 'Signature Entertainment приобрела права на научно-фантастический триллер \"Астронавт\" с Эммой Робертс', 'Signature Entertainment приобрела права на научно-фантастический триллер \"Астронавт\" с Эммой Робертс (\"Знакомство родителей\") и Лоуренсом Фишборном (\"Матрица\") в главных ролях.\r\nВ полнометражном режиссерском дебюте Джессики Варлей (\"Фобии\") рассказывается об астронавте Сэм Уокер (Эмма Робертс), которая, вернувшись из своего первого космического полета, чудесным образом оказывается живой в пробитой капсуле, плавающей далеко от побережья Атлантического океана. Генерал Уильям Харрис (Лоуренс Фишборн) помещает ее под усиленное наблюдение НАСА в хорошо охраняемое учреждение для реабилитации и медицинского тестирования. Однако, когда в здании начинает происходить нечто странное, Уокер приходит к выводу, что нечто инопланетное последовало за ней на Землю.Продюсерами \"Астронавта\" выступят ветераны жанра: Брэдли Фуллер (\"Тихое место\"), Эрик Б. Флайшмен (\"Не отпускай\") и Камерон Фуллер (\"Девушка в лесу\").\"Мы гордимся тем, что представим зрителям еще один качественный научно-фантастический фильм - на этот раз захватывающий приключенческий триллер с Эммой Робертс, который заставит зрителей затаить дыхание\", - говорится в заявлении руководства Signature Entertainment.Лучшие научно-фантастические космические триллеры\r\n\"Чужой\" (1979)\"Чужие\" (1986)\"Звездный десант\" (1997)\"Живое\" (2017)\"Прометей\" (2012)', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116039.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:50', '2023-05-15 07:17:50', NULL, 1),
(27, 6, 1, 'Киллиан Мерфи назвал сценарий драмы \"Оппенгеймер\" \"лучшим\"', NULL, 'Исполнитель роли одного из самых сложных и противоречивых людей в истории в предстоящем фильме Крист', 'Исполнитель роли одного из самых сложных и противоречивых людей в истории в предстоящем фильме Кристофера Нолана \"Оппенгеймер\" Киллиан Мерфи заявил, что сценарий драмы - \"лучший из тех, которые я когда-либо читал\". История полностью рассказана от первого лица - с точки зрения физика Дж. Роберта Оппенгеймера, что актер оценил по достоинству. \"Я думаю, что фильм сенсационный. Как человек, который любит кино - я говорю это не потому, что я в этой долбаной профессии, я ненавижу смотреть на себя, - но как любитель кино, как киноман, я фанат Криса Нолана\".В то время как Киллиан Мерфи воздержался от слишком подробного рассказа о том, что думает об ученом, он все же сделал небольшой комментарий о своем отношении к Оппенгеймеру. Он объяснил, что, когда играл физика в \"Пекле\" (2007), он провел некоторое время с настоящим физиком Брайаном Коксом и многому у него научился. \"У меня никогда не будет таких интеллектуальных способностей - не у многих из нас они есть, - но мне нравилось слушать. С таким интеллектом, который, я думаю, на самом деле может быть обузой, вы не видите вещи в обычном свете, как видим их мы. Все многогранно и вот-вот рухнет\".Что касается мнения Кристофера Нолана о выборе Киллиана Мерфи на главную роль, он считает, что \"экстраординарные способности актера к сопереживанию\" помогут зрителям, которые придут посмотреть на Оппенгеймера, проникнуть в многослойный мыслительный процесс ученого. Он объяснил, что своей актерской игрой Киллиан Мерфи демонстрирует не только интеллект, но и силу таким образом, что люди по-настоящему прислушиваются к нему.В скольких фильмах Кристофера Нолана снялся Киллиан Мерфи?\r\nКиллиан Мерфи снялся в общей сложности в шести режиссерских и продюсерских проектах Кристофера Нолана: \"Бэтмен: начало\" (2005), \"Темный рыцарь\" (2008), \"Начало\" (2010), \"Превосходство\" (2014), \"Дюнкерк\" (2017), \"Оппенгеймер\" (2023).', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116036.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:50', '2023-05-15 07:17:50', NULL, 1),
(28, 1, 1, 'Сэм Уортингтон получит 100 миллионов за \"Аватар 2: Путь воды\"', NULL, 'Исполнитель главной роли в фильме \"Аватар 2: Путь воды\" Сэм Уортингтон стал одним из самых высокоопл', 'Исполнитель главной роли в фильме \"Аватар 2: Путь воды\" Сэм Уортингтон стал одним из самых высокооплачиваемых актеров в истории кино.Утверждается, что за его совокупный заработок за исполнение роли Джейка Салли в сиквеле составил более 100 миллионов долларов. Такую колоссальную сумму Сэм Уортингтон смог заработать благодаря условиям своего контракта, предполагающего фиксированный гонорар в размере 10 миллионов долларов и пять процентов от кассовых сборов.Так как \"Аватар 2: Путь воды\" смог собрать в мировом прокате более 2,3 миллиарда долларов, то нетрудно подсчитать, что пять процентов от этой суммы и составят указанные выше 100 миллионов долларов.Таким образом, Сэм Уортингтон, присоединился к компании Тома Круза, который претендовал на сравнимую сумму из-за неожиданного успеха военного боевика \"Топ Ган: Мэверик\", собравшего более 1,5 миллиарда долларов. Контракт Тома Круза также предполагал выплату процента от кассовых сборов.Отметим, что Сэм Уортингтон будет загружен работой во франшизе \"Аватар\" еще долгие годы, поэтому его заработки могут существенно вырасти с выходом каждой следующей серии этого проекта.Когда выйдет фильм \"Аватар 3\"?\r\nДжеймс Кэмерон планирует представить третью серию в декабре 2024 года. По словам режиссера, структура фильма будет отличаться от привычной для зрителя. В нем появятся новые рассказчики, от лица которых будет вестись повествование.', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116038.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:50', '2023-05-15 07:17:50', NULL, 1),
(29, 2, 1, '\"Стражи Галактики 3\" вывели Дисней в лидеры мирового проката', NULL, 'Компания Дисней стала первым в 2023 году голливудским мейджором, мировые кассовые сборы кинопроектов', 'Компания Дисней стала первым в 2023 году голливудским мейджором, мировые кассовые сборы кинопроектов которого превысили два миллиарда долларов.Произошло это в значительной степени благодаря успешному старту экранизации комиксов Марвел \"Стражи Галактики. Часть 3\", которая заработала в свои премьерные выходные значительно больше, чем сулили ей ранние прогнозы - 289 миллионов долларов. На момент публикации данной заметки сборы уже составляли около 350 миллионов долларов.Крупнейшими международными рынками для \"Стражей Галактики 3\" стали Китай ($31,4млн), Великобритания ($20 млн), Мексика ($14,8млн), Южная Корея ($14 млн), Франция ($11,9млн), Германия ($7,9млн), Австралия ($7,6млн), Бразилия ($7,4млн), Италия ($5,5 млн), Япония (5,3 млн долл.) и Индонезия (5 млн долл.).Сборы на таком важном для фильмов Марвел рынке как российский пока не поддаются исчислению, но очевидно, что они будут одними из самых внушительных в Европе, несмотря на то, что официально компания Дисней отказалась от дистрибуции своих фильмов в России.Почитать рецензию пользователей портала \"Новости кино\" на фильм \"Стражи Галактики. Часть 3\" можно по этой ссылке https://www.kinonews.ru/article_116020/.Будут ли \"Стражи Галактики 4\"?\r\nДальнейшая судьба команды супергероев пока не определена, хотя отдельные сцены в третьей части намекали на возможное возвращение некоторых персонажей. Известно лишь, что \"Стражи Галактики 3\" стал последим фильмом серии для режиссера Джеймса Ганна.', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116037.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:50', '2023-05-15 07:17:50', NULL, 1),
(30, 3, 1, 'Линдси Лохан и Джеми Ли Кертис возвращаются в \"Чумовую пятницу\"', NULL, 'Студия Disney работает над продолжением комедии 2003 года \"Чумовая пятница\", в которой Джеми Ли Керт', 'Студия Disney работает над продолжением комедии 2003 года \"Чумовая пятница\", в которой Джеми Ли Кертис и Линдси Лохан, как ожидается, вернутся к своим ролям. Элиз Холландер занимается написанием сценария к сиквелу.\r\nНапомним, что в комедии 2003 года Джеми Ли Кертис и Линдси Лохан сыграли мать и дочь, которые однажды, проснувшись в пятницу, понимают, что поменялись телами. Фильм был снят Марком Уотерсом по роману Мэри Роджерс 1972 года \"Причудливая пятница\" и собрал в мировом прокате 160 миллионов долларов.Слухи о возможном продолжении начали просачиваться ранее в текущем году, когда Джеми Ли Кертис, оказавшаяся в центре внимания во время наградного сезона за работу в фантастической комедии \"Все везде и сразу\", неоднократно упоминала, что хотела бы повторить роль и что общается с Disney по этому поводу.\"Это произойдет, - уточнила Джеми Ли Кертис на церемонии вручения премии Гильдии продюсеров США 26 февраля 2023 года. - Не говоря уже о том, что официально что-то происходит, я смотрю на вас в этот момент и говорю: \"Конечно, это произойдет\". Это должно произойти\".Как родилась идея о сиквеле фильма \"Чумовая пятница\"?\r\n\"Пока я колесила по всему миру с фильмом \"Хэллоуин заканчивается\", люди хотели знать, будет ли еще одна \"Чумовая пятница\", - рассказала Джеми Ли Кертис в интервью New York Times. - Меня это действительно задело за живое. Когда я вернулась, я позвонила своим друзьям в Disney и сказала: \"Такое чувство, что нам надо снять новый фильм\".Со своей стороны Линдси Лохан добавила: \"Джеми и я обе открыты для этого, поэтому мы оставляем это на усмотрение студии. Мы бы сделали только то, от чего люди пришли бы в восторг\".', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116033.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:50', '2023-05-15 07:17:50', NULL, 1),
(31, 4, 1, 'Дольф Лундгрен рассказал о борьбе с онкологией', NULL, 'Звезда боевиков 80-х и 90-х годов Дольф Лундгрен впервые признался, что последние восемь лет он врем', 'Звезда боевиков 80-х и 90-х годов Дольф Лундгрен впервые признался, что последние восемь лет он время от времени боролся с раком в частном порядке. По словам актера, врачи впервые обнаружили и удалили раковую опухоль на почке актера в 2015 году.“Затем я делал сканирование каждые шесть месяцев, потом вы делаете это каждый год, и все было нормально, знаете ли, в течение пяти лет. Но в 2020 году я вернулся в Швецию, и у меня было что-то вроде кислотного рефлюкса или… Я не знал, что это было. Поэтому я сделал МРТ, и они обнаружили, что в этой области было еще несколько опухолей”, - рассказал Дольф Лундгрен.Он уточнил, что в то время было обнаружено еще шесть опухолей, одна из которых оказалась слишком большой для удаления, поэтому ему пришлось начать системную терапию. Еще больше новообразований было обнаружено осенью 2021 года, когда Лундгрен прибыл в Лондон для съемок продолжений фильмов \"Аквамен\" и \"Неудержимые\".\r\n\"Мы поняли, что все намного хуже, чем мы думали. Доктор как бы начал говорить обо всех этих различных опухолях, например, в легких, желудке и позвоночнике, за пределами почек. Он начал говорить что-то вроде: \"Тебе, наверное, следует взять перерыв и проводить больше времени со своей семьей’, и так далее. Я спросил его: \"Как ты думаешь, сколько мне осталось?\" Он сказал, что два или три года, но по его голосу я понял, что он, вероятно, думал, что меньше\", - добавил Дольф Лундгрен.Актер отметил, что начал экспериментальное лечение, которое \"уменьшило его опухоли примерно на 20-30 процентов в течение трехмесячного периода\".“2022 год был, по сути, годом наблюдения за тем, как эти лекарства делают свое дело. В конце концов, все сократилось примерно до 90 процентов. Сейчас я нахожусь в процессе удаления оставшейся рубцовой ткани в этих опухолях\", - заключил он.Какие роли играет сейчас Дольф Лундгрен?\r\nАктер повторяет свою роль короля в фильме Warner Bros.’ “Аквамен 2”, премьера в кинотеатрах 20 декабря. Он также в четвертый раз повторяет роль Ганнера Дженсена в “Неудержимых 4”, премьера которого состоится 22 сентября.', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116027.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:51', '2023-05-15 07:17:51', NULL, 1),
(32, 5, 1, 'Аль Пачино сыграет в режиссерском проекте Джонни Деппа', NULL, '.Джонни Депп накануне своего возвращения в мир большого кино, которое состоится на Каннском кинофест', '.Джонни Депп накануне своего возвращения в мир большого кино, которое состоится на Каннском кинофестивале в фильме \"Жанна Дюбарри\", объявил актерский состав своего режиссерского проекта \"Modi\". Биографический фильм об итальянском художнике Амедео Модильяни \"Modi\" возглавят Аль Пачино (\"Запах женщины\"), Риккардо Скамарчио (\"Джон Уик 2\") и лауреат премии \"Сезар\" Пьер Нинэ (\"Маскарад\").Съемки фильма - первой режиссерской работы Джонни Деппа за последние 25 лет - должны начаться в Будапеште осенью текущего года, а сам проект будет представлен потенциальным покупателям на Каннском кинорынке. На момент написания заметки проводится кастинг. Никола Пекорини (\"Человек, который убил Дон Кихота\") назначен оператором.\r\nОснованный на пьесе Денниса Макинтайра и адаптированный Ежи и Мэри Кромоловски, фильм расскажет историю знаменитого художника и скульптора Амедео Модильяни во время его пребывания в Париже в 1916 году.\r\nИтальянец Риккардо Скамарчио исполнит роль титульного персонажа, француз Пьер Нинэ сыграет роль художника Мориса Утрилло, а Аль Пачино предстанет в роли международного коллекционера произведений искусства Гангната.О чем будет фильм Джонни Деппа \"Modi\"?\r\nФильм расскажет о жизни итальянского художника Амедео Модильяни на протяжении бурных и насыщенных событиями 48 часов, в течение которых он скрывается от полиции, петляя по улицам и барам истерзанного войной Парижа. Его желание преждевременно завершить карьеру и уехать из города отвергают его богемные приятели: французский художник Морис Утрилло, уроженец Беларуси художник Хаим Сутин и его английская муза и возлюбленная Беатрис Гастингс. Моди обращается за советом к своему другу - польскому коллекционеру и торговцу произведениями искусства Леопольду Зборовскому, но хаос достигает апогея, когда он сталкивается с коллекционером, который может изменить его жизнь.', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116026.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:51', '2023-05-15 07:17:51', NULL, 1),
(33, 6, 1, 'В Египте снимут \"ответ\" черной Клеопатре', NULL, 'Государственный египетский телеканал ответил на споры вокруг выбора черной актрисы для роли Клеопатр', 'Государственный египетский телеканал ответил на споры вокруг выбора черной актрисы для роли Клеопатры в документально-художественном сериале \"Африканские царицы\" от Нетфликс, который доступен с 10 мая. Он объявил о начале производства собственного фильма о Клеопатре с большим бюджетом и с белой исполнительницей главной роли.Ранее высший совет по античностям Египта, правительственное учреждение, ответственное за древнее наследие, заявило на своей официальной странице в социальной сети, что \"статуи Клеопатры подтверждают, что у нее были очевидные \"греческие черты с типичной светлой кожей, вытянутым носом и тонкими губами\".Теперь же канал Al Wathaeqya, являющийся дочерним предприятием египетской государственной компании United Media Services, объявил о начале производства документального фильма о \"настоящей истории царицы Клеопатры\", который, как утверждается в заявлении, основан на \"самых точных научных исследованиях\".“Почему некоторым людям нужно, чтобы Клеопатра была белой? - написала режиссер шоу \"Африканские царицы\" Тина Гарави в статье, защищающей кастинг. - Возможно, дело не только в том, что я сняла сериал, в котором Клеопатра изображена черной, но и в том, что я предложила египтянам ощутить себя африканцами, и они злятся на меня за это\".\r\nЧто не так с черной Клеопатрой?\r\nВыбор Адель Джеймс, чернокожей британской актрисы, для роли египетской правительницы в оригинальном сериале Нетфликс от продюсера Джады Пинкетт Смит вызвал бурю негодования в Египте. С момента выхода трейлера местные ученые и эксперты отмечали, что Клеопатра, родившаяся в египетском городе Александрия в 69 году до нашей эры и принадлежавшая к греческой династии, была представительнице европеоидной расы, а не черной. Они считают, что создатели сериала занимаются фальсификацией истории Египта.', 'https://www.kinonews.ru/insimgs/2023/newsimg/big/newsimg116022.webp', NULL, NULL, NULL, 'PUBLISHED', 0, '2023-05-15 07:17:51', '2023-05-15 07:17:51', NULL, 1);

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
(1, 'Киноновости со всего мира', 'https://www.kinonews.ru/rss', 'ACTIVE', '2023-05-13 11:18:16', '2023-05-15 07:23:08');

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
  `deleted_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `love_reacter_id`, `deleted_at`, `active`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$G5dn0a3GgRgJ8do9PcY1vO6DXp//8COt1y5dDQ8ImecizoTJah9Su', 'KShZoPojEDwJQQYdYCsWriA0rut0KBhlzkRNqkId3aPgpTSByiXV1SWUeVLO', '2023-05-13 11:18:14', '2023-05-13 11:18:14', 1, NULL, 1),
(2, 'Moderator', 'moderator@admin.com', NULL, '$2y$10$4oy5lB0zzA6AsknZwKFEEuhGinGmoVDYjzxlobtivMrRNEXMmnJT2', 'DzqCftMET8u8g9idTpeQgS4I7bsq765NyHh4I0bXcO9HGXSPFEoV96rtGWm1', '2023-05-13 11:18:15', '2023-05-13 11:18:15', 2, NULL, 1),
(3, 'Author1', 'author1@admin.com', NULL, '$2y$10$XTRvCflPd2ty7PllfNRuEeGLiWTH5WoVEEH9oeDSXC1eR5dJKEKfS', 'DrOo5gePxbbo8ZiPJZVpYuke6O2liW1SVu8Sp1Ztk33ykWimVJKYfXEqtMtp', '2023-05-13 11:18:15', '2023-05-13 11:18:15', 3, NULL, 1),
(4, 'Author2', 'author2@admin.com', NULL, '$2y$10$s/pI9aAvqMhw6F1TEXkwp.jASfR/lvT9L/gUf1Jqhz7hkc134Gazm', 'wKdM88Pp7e5KNbHX1Luzp1BQ27o5NaS1EVRGqobHh2TdjNTdHXHVzKuj4EKw', '2023-05-13 11:18:15', '2023-05-13 11:18:15', 4, NULL, 1),
(5, 'User', 'user@admin.com', NULL, '$2y$10$Bhw5G48noprbtQZZKh61V.4JQo3xjLj2WXI55BwdDHc9vijWQdKUC', 'rKA57qOBMRS1fnVTsTYHz0Nfrmi7cFlwgodNC9wCsh7zu5jW9H5HLBI3w0jJ', '2023-05-13 11:18:16', '2023-05-13 11:18:16', 5, NULL, 1),
(6, 'Тесс', 'tess@author.com', NULL, '$2y$10$zSmGmmt.g1ZWINW37hBj/ecinyKINvYf5Yj2jgnbALPBhJQk/kONu', NULL, '2023-05-13 14:35:41', '2023-05-13 14:35:41', 6, NULL, 1),
(7, 'Леди Кошка', 'lady@author.com', NULL, '$2y$10$SrCXE1TsYNKz6/d47MiDSuVHraaN8k5zfzBoIHqIm6DFvjBnxl4uu', NULL, '2023-05-13 14:37:04', '2023-05-13 14:37:04', 7, NULL, 1),
(8, 'Джозефина', 'josefine@author.com', NULL, '$2y$10$uDv55h8kH1s.GHFGOPSj5eSuMfmIMT5fqkSyuB8Bs2nVEHMQkAfSi', NULL, '2023-05-13 14:38:33', '2023-05-13 14:38:33', 8, NULL, 1),
(9, 'Grogu', 'grogu@author.com', NULL, '$2y$10$Xl.srdr1ghJOcCVBCNUNseqLKf0WuVAdrsp8T4ZndJ6uxjaNKap4i', NULL, '2023-05-13 14:39:48', '2023-05-13 14:39:48', 9, NULL, 1),
(10, 'Gandalf', 'gendalf@author.com', NULL, '$2y$10$Ji3Hpi4ZKxziL6pO37NX0.0bTOFvQyQKxvG9wzO21U8ft8md.SED2', NULL, '2023-05-13 14:41:05', '2023-05-13 14:41:05', 10, NULL, 1),
(11, 'Любовь и сериалы', 'lubov@author.com', NULL, '$2y$10$mvMfJ4l/GGnxjHDI4hyXreNoeX4erya4jf9zEtkm0dEixHlnef9dS', NULL, '2023-05-13 14:42:34', '2023-05-13 14:42:34', 11, NULL, 1),
(12, 'Киноман', 'kinoman@author.com', NULL, '$2y$10$W6.RKVSNd2hdz6e5w8pXsurn/LeNFhp6gawbeRqgp2.hThyvoFZFq', NULL, '2023-05-13 14:43:50', '2023-05-13 14:43:50', 12, NULL, 1),
(13, 'Дзера', 'dzera@author.com', NULL, '$2y$10$Wfpt3yKWI1PG4DuihSG.E.TeaTPUbo4fzUbHfm76u1G.xDaFV917m', NULL, '2023-05-13 14:45:01', '2023-05-13 14:45:01', 13, NULL, 1),
(14, 'Ms.Detective', 'detective@author.com', NULL, '$2y$10$UHog5C/ENcrR1GnlBW2gpetivSzcrTzzMBgbWhmuCicDil/s3v5QS', NULL, '2023-05-13 14:46:22', '2023-05-13 14:46:22', 14, NULL, 1);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `love_reactants`
--
ALTER TABLE `love_reactants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
