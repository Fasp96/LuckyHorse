-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Jan-2020 às 14:01
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luckyhorse_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bets`
--

CREATE TABLE `bets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `race_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tournament_id` bigint(20) UNSIGNED DEFAULT NULL,
  `horse_id` bigint(20) UNSIGNED NOT NULL,
  `jockey_id` bigint(20) UNSIGNED NOT NULL,
  `value` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `bets`
--

INSERT INTO `bets` (`id`, `user_id`, `race_id`, `tournament_id`, `horse_id`, `jockey_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 2, 8, NULL, 3, 16, 2.00, '2020-01-03 21:26:49', '2020-01-03 21:26:49'),
(2, 3, 1, NULL, 1, 1, 2.00, '2020-01-04 11:55:43', '2020-01-04 11:55:43'),
(3, 3, 2, NULL, 1, 2, 2.00, '2020-01-04 11:56:24', '2020-01-04 11:56:24'),
(4, 3, 17, NULL, 6, 5, 3.00, '2020-01-04 11:57:59', '2020-01-04 11:57:59'),
(5, 4, 16, NULL, 9, 3, 2.00, '2020-01-04 12:04:45', '2020-01-04 12:04:45'),
(6, 4, 33, NULL, 12, 26, 5.00, '2020-01-04 12:05:22', '2020-01-04 12:05:22');

-- --------------------------------------------------------

--
-- Estrutura da tabela `horses`
--

CREATE TABLE `horses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `breed` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_races` int(11) NOT NULL,
  `num_victories` int(11) NOT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `horses`
--

INSERT INTO `horses` (`id`, `name`, `breed`, `birth_date`, `gender`, `num_races`, `num_victories`, `file_path`, `created_at`, `updated_at`) VALUES
(1, 'Challenger', 'Warmblood', '2001-03-05', 'male', 130, 100, '/img/horse_photo/1-Challenger-Horse_1.jpg', '2020-01-03 09:59:15', '2020-01-03 09:59:15'),
(2, 'Cash', 'Crioulo', '1999-02-03', 'male', 249, 180, '/img/horse_photo/2-Cash-Horse_2.jpg', '2020-01-03 10:03:19', '2020-01-03 10:03:19'),
(3, 'Trigger', 'Konik', '2002-04-15', 'male', 140, 96, '/img/horse_photo/3-Trigger-Horse_3.jpg', '2020-01-03 10:06:42', '2020-01-03 10:06:42'),
(4, 'Fargo', 'Paint Horse', '2004-05-26', 'male', 153, 64, '/img/horse_photo/4-Fargo-Horse_4.jpg', '2020-01-03 10:16:42', '2020-01-03 10:16:42'),
(5, 'Barkley', 'Frísio', '2002-09-13', 'male', 236, 198, '/img/horse_photo/5-Barkley-Horse_5.jpg', '2020-01-03 10:22:15', '2020-01-03 10:22:15'),
(6, 'Jaguar', 'Morgan', '2005-12-08', 'male', 367, 304, '/img/horse_photo/6-Jaguar-horse_6.jpg', '2020-01-03 13:36:22', '2020-01-03 13:36:22'),
(7, 'Russel', 'Morgan', '2001-02-13', 'male', 298, 230, '/img/horse_photo/7-Russel-Horse_7.jpg', '2020-01-03 13:37:43', '2020-01-03 13:37:43'),
(8, 'Spirit', 'Morgan', '1998-05-04', 'male', 678, 480, '/img/horse_photo/8-Spirit-Horse_8.jpg', '2020-01-03 13:38:46', '2020-01-03 13:38:47'),
(9, 'Fred', 'Warmblood', '2003-01-04', 'male', 467, 432, '/img/horse_photo/9-Fred-Horse_9.jpg', '2020-01-03 13:43:35', '2020-01-03 13:43:35'),
(10, 'Barney', 'Warmblood', '2001-06-12', 'male', 432, 345, '/img/horse_photo/10-Barney-Horse_10.jpg', '2020-01-03 13:45:00', '2020-01-03 13:45:00'),
(11, 'Odie', 'Warmblood', '2003-03-02', 'male', 297, 213, '/img/horse_photo/11-Odie-Horse_11.jpeg', '2020-01-03 13:46:01', '2020-01-03 13:46:01'),
(12, 'Winston', 'Crioulo', '2003-12-04', 'male', 437, 345, '/img/horse_photo/12-Winston-Horse_12.jpg', '2020-01-03 13:51:52', '2020-01-03 13:51:52'),
(13, 'Frank', 'Crioulo', '2006-05-06', 'male', 231, 198, '/img/horse_photo/13-Frank-Horse_13.jpg', '2020-01-03 13:53:12', '2020-01-03 13:53:12'),
(14, 'Champ', 'Crioulo', '2000-12-21', 'male', 387, 287, '/img/horse_photo/14-Champ-Horse_14.jpg', '2020-01-03 13:54:58', '2020-01-03 13:54:58'),
(15, 'Randolph', 'Crioulo', '2000-06-29', 'male', 346, 289, '/img/horse_photo/15-Randolph-Horse_15.jpg', '2020-01-03 13:59:59', '2020-01-03 13:59:59'),
(16, 'Utah', 'Crioulo', '1997-09-24', 'male', 487, 326, '/img/horse_photo/16-Utah-Horse_16.jpg', '2020-01-03 14:01:49', '2020-01-03 14:01:49'),
(17, 'Jackson', 'Crioulo', '1998-08-06', 'male', 678, 567, '/img/horse_photo/17-Jackson-Horse_17.jpg', '2020-01-03 14:03:47', '2020-01-03 14:03:47'),
(18, 'Marquis', 'Paint Horse', '2006-04-05', 'male', 597, 548, '/img/horse_photo/18-Marquis-Horse_18.jpg', '2020-01-03 14:08:42', '2020-01-03 14:08:42'),
(19, 'Vanderbilt', 'Paint Horse', '2007-04-08', 'male', 386, 301, '/img/horse_photo/19-Vanderbilt-Horse_19.jpg', '2020-01-03 14:10:29', '2020-01-03 14:10:29'),
(20, 'Queen', 'Paint Horse', '2005-02-06', 'female', 386, 315, '/img/horse_photo/20-Queen-Horse_20.jpg', '2020-01-03 14:11:25', '2020-01-03 14:11:25'),
(21, 'Chisholm', 'Paint Horse', '2003-02-06', 'male', 365, 328, '/img/horse_photo/21-Chisholm-Horse_21.jpg', '2020-01-03 14:13:05', '2020-01-03 14:13:05'),
(22, 'Jet', 'Paint Horse', '2001-10-17', 'male', 534, 482, '/img/horse_photo/22-Jet-Horse_22.jpg', '2020-01-03 14:15:41', '2020-01-03 14:15:41'),
(23, 'Oakley', 'Paint Horse', '2004-04-08', 'male', 487, 205, '/img/horse_photo/23-Oakley-Horse_23.jpg', '2020-01-03 14:17:00', '2020-01-03 14:17:00'),
(24, 'Rio', 'Konik', '2001-07-06', 'male', 654, 257, '/img/horse_photo/24-Rio-Horse_24.jpg', '2020-01-03 14:20:11', '2020-01-03 14:20:11'),
(25, 'Gene', 'Konik', '2008-11-16', 'male', 439, 107, '/img/horse_photo/25-Gene-Horse_25.jpg', '2020-01-03 14:21:55', '2020-01-03 14:21:55'),
(26, 'Kokomo', 'Konik', '2004-05-06', 'male', 543, 395, '/img/horse_photo/26-Kokomo-Horse_26.jpg', '2020-01-03 14:22:54', '2020-01-03 14:22:54'),
(27, 'Adobe', 'Frísio', '2009-02-13', 'male', 463, 298, '/img/horse_photo/27-Adobe-Horse_27.jpg', '2020-01-03 14:26:09', '2020-01-03 14:26:09'),
(28, 'Fiona', 'Frísio', '2007-04-06', 'female', 764, 457, '/img/horse_photo/28-Fiona-Horse_28.jpg', '2020-01-03 14:27:28', '2020-01-03 14:27:28'),
(29, 'Brandy', 'Frísio', '2003-12-08', 'female', 753, 573, '/img/horse_photo/29-Brandy-Horse_29.jpg', '2020-01-03 14:28:51', '2020-01-03 14:28:51'),
(30, 'Trapper', 'Frísio', '2001-08-24', 'male', 563, 398, '/img/horse_photo/30-Trapper-Horse_30.jpg', '2020-01-03 14:29:44', '2020-01-03 14:29:45');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jockeys`
--

CREATE TABLE `jockeys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_races` int(11) NOT NULL,
  `num_victories` int(11) NOT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `jockeys`
--

INSERT INTO `jockeys` (`id`, `name`, `birth_date`, `gender`, `num_races`, `num_victories`, `file_path`, `created_at`, `updated_at`) VALUES
(1, 'Adrian Fletcher', '1980-01-08', 'male', 540, 269, '/img/jockey_photo/1-Adrian Fletcher-jockey.png', '2020-01-03 10:10:03', '2020-01-03 10:10:03'),
(2, 'Michael Fox', '1979-07-15', 'male', 580, 390, '/img/jockey_photo/2-Michael Fox-jockey2.jpg', '2020-01-03 10:11:18', '2020-01-03 10:11:18'),
(3, 'Richard Lewis', '1985-11-18', 'male', 394, 187, '/img/jockey_photo/3-Richard Lewis-jockey3.jpg', '2020-01-03 10:13:26', '2020-01-03 10:13:26'),
(4, 'Ryan Jonhson', '1984-05-31', 'male', 461, 256, '/img/jockey_photo/4-Ryan Jonhson-Jockey4.jpg', '2020-01-03 10:28:17', '2020-01-03 10:28:17'),
(5, 'Thomas Wills', '1993-02-07', 'male', 453, 345, '/img/jockey_photo/5-Thomas Wills-jockey5.jpg', '2020-01-03 14:48:17', '2020-01-03 14:48:17'),
(6, 'Wayne Hutchinson', '1987-07-02', 'male', 683, 373, '/img/jockey_photo/6-Wayne Hutchinson-Jockey6.jpg', '2020-01-03 14:53:34', '2020-01-03 14:53:34'),
(7, 'Joshua Moore', '1984-03-05', 'male', 467, 263, '/img/jockey_photo/7-Joshua Moore-Jockey7.jpg', '2020-01-03 14:54:27', '2020-01-03 14:54:28'),
(8, 'Daryl Jacob', '1978-11-18', 'male', 683, 485, '/img/jockey_photo/8-Daryl Jacob-Jockey8.jpg', '2020-01-03 14:55:58', '2020-01-03 14:55:58'),
(9, 'Dave Crosse', '1983-02-06', 'male', 753, 482, '/img/jockey_photo/9-Dave Crosse-Jockey9.jpg', '2020-01-03 14:56:40', '2020-01-03 14:56:41'),
(10, 'Marc Goldstein', '1983-02-06', 'male', 472, 295, '/img/jockey_photo/10-Marc Goldstein-Jockey10.jpg', '2020-01-03 14:57:44', '2020-01-03 14:57:44'),
(11, 'Noel Fehily', '1995-08-05', 'male', 593, 285, '/img/jockey_photo/11-Noel Fehily-Jockey11.jpg', '2020-01-03 14:58:35', '2020-01-03 14:58:35'),
(12, 'Mr Z Baker', '1990-02-04', 'male', 375, 295, '/img/jockey_photo/12-Mr Z Baker-Jockey12.jpg', '2020-01-03 14:59:33', '2020-01-03 14:59:33'),
(13, 'Mr David Maxwell', '1992-06-05', 'male', 583, 285, '/img/jockey_photo/13-Mr David Maxwell-Jockey13.jpg', '2020-01-03 15:00:27', '2020-01-03 15:00:27'),
(14, 'Mr N George', '1990-06-07', 'male', 521, 375, '/img/jockey_photo/14-Mr N George-Jockey14.jpg', '2020-01-03 15:01:15', '2020-01-03 15:01:15'),
(15, 'Mr Alex Ferguson', '1996-08-02', 'male', 638, 428, '/img/jockey_photo/15-Mr Alex Ferguson-Jockey15.jpg', '2020-01-03 15:02:09', '2020-01-03 15:02:09'),
(16, 'Mr H F Nugent', '2001-06-18', 'male', 215, 105, '/img/jockey_photo/16-Mr H F Nugent-Jockey16.jpg', '2020-01-03 15:03:17', '2020-01-03 15:03:17'),
(17, 'Noel Fehily', '1995-02-07', 'male', 643, 295, '/img/jockey_photo/17-Noel Fehily-Jockey17.jpg', '2020-01-03 15:04:21', '2020-01-03 15:04:21'),
(18, 'Aidan Coleman', '1996-02-05', 'male', 748, 592, '/img/jockey_photo/18-Aidan Coleman-Jockey18.jpg', '2020-01-03 15:06:22', '2020-01-03 15:06:22'),
(19, 'Sean Bowen', '1997-06-05', 'male', 385, 175, '/img/jockey_photo/19-Sean Bowen-Jockey19.jpg', '2020-01-03 15:07:42', '2020-01-03 15:07:42'),
(20, 'Leighton Aspell', '1995-12-07', 'male', 629, 484, '/img/jockey_photo/20-Leighton Aspell-Jockey20.jpg', '2020-01-03 15:10:22', '2020-01-03 15:10:22'),
(21, 'Andrew Tinkler', '1987-10-04', 'male', 743, 621, '/img/jockey_photo/21-Andrew Tinkler-Jockey21.jpg', '2020-01-03 15:12:56', '2020-01-03 15:12:57'),
(22, 'Richard Patrick', '1985-06-02', 'male', 342, 185, '/img/jockey_photo/22-Richard Patrick-Jockey22.jpg', '2020-01-03 15:13:58', '2020-01-03 15:13:58'),
(23, 'Mitchell Bastyan', '1983-03-16', 'male', 742, 698, '/img/jockey_photo/23-Mitchell Bastyan-Jockey23.jpg', '2020-01-03 15:14:55', '2020-01-03 15:14:56'),
(24, 'James Bowen', '1988-09-16', 'male', 326, 156, '/img/jockey_photo/24-James Bowen-Jockey24.jpg', '2020-01-03 15:16:02', '2020-01-03 15:16:02'),
(25, 'Tom Humphries', '1994-09-16', 'male', 842, 682, '/img/jockey_photo/25-Tom Humphries-Jockey25.jpg', '2020-01-03 15:16:58', '2020-01-03 15:16:58'),
(26, 'Noel Fehily', '1980-06-17', 'male', 621, 429, '/img/jockey_photo/26-Noel Fehily-Jockey26.jpg', '2020-01-03 15:17:56', '2020-01-03 15:17:56'),
(27, 'Jeremiah McGrath', '1990-12-05', 'male', 682, 392, '/img/jockey_photo/27-Jeremiah McGrath-Horse_27.jpg', '2020-01-03 15:19:40', '2020-01-03 15:19:40'),
(28, 'Paul Townend', '1987-07-03', 'male', 509, 386, '/img/jockey_photo/28-Paul Townend-Jockey28.jpg', '2020-01-03 15:20:42', '2020-01-03 15:20:42'),
(29, 'Kielan Woods', '1995-12-08', 'male', 573, 396, '/img/jockey_photo/29-Kielan Woods-Jockey29.jpg', '2020-01-03 15:21:34', '2020-01-03 15:21:34'),
(30, 'Paul O Brien', '1995-02-06', 'male', 728, 582, '/img/jockey_photo/30-Paul O Brien-Jockey30.jpg', '2020-01-03 15:22:37', '2020-01-03 15:22:37');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_11_18_151622_create_horses_table', 1),
(4, '2019_11_18_160244_create_jockeys_table', 1),
(5, '2019_11_19_151550_create_tournaments_table', 1),
(6, '2019_11_19_151642_create_races_table', 1),
(7, '2019_11_19_151712_create_results_table', 1),
(8, '2019_11_19_151728_create_bets_table', 1),
(9, '2019_12_27_111106_create_news_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minute_info` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `file_path`, `minute_info`, `created_at`, `updated_at`) VALUES
(1, 'Cheltenham Race In Stewards Room', 'Connections of Protektorat are to appeal the decision of the stewards at Cheltenham on New Year’s Day to demote the Dan Skelton-trained gelding from first place in the Listed Ballymore Novices’ Hurdle.\r\n\r\nThe 15-2 chance passed the post a head in front of Imperial Alcazar in the race that opened the card, but the stewards reversed the placings, judging interference had taken place at a ‘critical point in the race’.\r\n\r\nProtektorat was ridden by Harry Skelton, who told Grosvenorsport.com: “On the day I was very surprised to lose the race, as were quite a lot of other people who I spoke to.\r\n\r\n“We jumped the last a neck up and he then stayed on really well up the hill which was good on his first start over this trip.\r\n\r\n\r\n“He is owned by the Hales family, my sponsor Ged Mason and Sir Alex Ferguson who are all great supporters of ours. They want to appeal the result, which I think is totally understandable, so we’re going down to the BHA next week.”\r\n\r\nHe added: “Ultimately this horse is a three-mile staying chaser in the making, but we’ll have a look at the other Ballymore Novices’ Hurdle Trial on Trials Day at the end of the month.\r\n\r\n“The Ballymore itself now looks a realistic target in March (Cheltenham Festival).”', '/img/news_photo/1--News1.jpeg', 'Protektorat team to appeal after losingg Cheltenham race in stewards\' room', '2020-01-03 15:31:28', '2020-01-03 15:31:28'),
(2, 'Lostintranslation On Course', 'A trip to Newbury for the Denman Chase remains the most likely next objective for Lostintranslation, after undergoing a minor wind operation this week.\r\n\r\nThe Colin Tizzard-trained eight-year-old leapt to the head of ante-post lists for the Magners Cheltenham Gold Cup when getting the better of Haydock specialist Bristol De Mai in the Chase in November.\r\n\r\nHowever, those claims took a knock after he was pulled in the King George VI Chase at Kempton on Boxing Day, after which connections reported he was suffering from a breathing problem.\r\n\r\n LostInTranslation had wind surgery on Monday (Focusonracing)\r\nLostInTranslation had wind surgery on Monday (Focusonracing)\r\nAssistant trainer Joe Tizzard hopes that issue has now been rectified – and Lostintranslation could now head to Newbury on February 8 for a race the Dorset team won with subsequent Gold Cup hero Native River in both 2017 and 2018.\r\n\r\nTizzard said: “He had his palate cauterised on Monday and seems absolutely fine.\r\n\r\n\r\n“He’ll have a week on the walker now and we’ll probably step him up again after that.\r\n\r\n“We’ll probably give him a spin in the Denman before the Gold Cup.”\r\n\r\nLostintranslation is a general 8-1 shot for the Gold Cup, with last year’s winner Al Boum Photo now favourite with most bookmakers at 5-1 following his winning return at Tramore on New Year’s Day.', '/img/news_photo/2--New_2.jpg', 'Lostintranslation on course for Newbury after having wind surgery', '2020-01-03 15:34:19', '2020-01-03 15:34:19'),
(3, 'Brassil Takes Aim At Envoi Allen', 'Cheltenham Festival winning trainer Martin Brassil will be hoping to unearth another potential leading novice hurdler as Longhouse Poet features in a field of seven for the Grade One Lawlor\'s Of Naas Novice Hurdle on Sunday.\r\n\r\nBrassil landed the Ballymore Novices\' Hurdle at Cheltenham last season with City Island and carrying the same colours of Sean and Bernardine Mulryan, the Curragh-based trainer appears to have another smart prospect on his hands in the shape of Longhouse Poet.\r\n\r\nLonghouse Poet will be aiming to lower the colours of the unbeaten Envoi Allen in what looks a stellar renewal of the Lawlor\'s Of Naas Novice Hurdle and Brassil is hopeful of a good showing from the six-year-old.\r\n\r\n\r\nWatch how Longhouse Poet beat a big field on his latest start\r\n\"Longhouse Poet won his maiden nicely and he is probably going into the deep-end a little in a Grade 1 against experienced horses,\" Brassil said. \"The trip will suit him and we\'ll find out his level on Sunday.\r\n\r\n\"Naas is a good honest staying track and he seems to be that type of horse that wants two and a half miles and a track like Naas.\"\r\n\r\n\r\nEnvoi Allen will once again be ridden by three-time champion jockey Davy Russell and the Cork native spoke of his fondness for the Champion Bumper winner earlier this week.\r\n\r\n\"Envoi Allen is a big strong horse with a lot of ability. Gordon has done a fantastic job with the horse and everyone seems happy with him at home,” Russell said.\r\n\r\n“His form is rock solid and we are really happy with him. It’s a pleasure to be around him.', '/img/news_photo/3--New3.jpg', 'Brassil takes aim at Envoi Allen in Naas showpiece with Longhouse Poet', '2020-01-03 15:37:21', '2020-01-03 15:37:21'),
(4, 'Unibet Tolworth Novices Hurdlem', 'Fiddlerontheroof will bid to provide Colin Tizzard with a third victory in the past four renewals of the Unibet Tolworth Novices’ Hurdle at Sandown on Saturday.\r\n\r\nThe Dorset handler first landed the prize with the impressive Finian’s Oscar in 2017, while Elixir De Nutz made every yard of the running 12 months ago.\r\n\r\nFiddlerontheroof certainly appears to hold outstanding claims, having made it third time lucky over hurdles with a dominant display over the course and distance four weeks ago.\r\n\r\n\r\nWatch how Fiddlerontheroof won at Sandown on his latest start\r\nThe £200,000 purchase had previously chased home the high-class Thyme Hill in the Persian War at Chepstow, before being touched off by the also-promising Edwardstone on a sounder surface at Wincanton.\r\n\r\n\r\nJoe Tizzard, assistant to his father, said: “He’s in good form and has some good form in the book through the season.\r\n\r\n“He proved last time he handles the soft ground at Sandown and the track. I do think that’s quite important as Sandown can catch some horses out when the ground is soft. We don’t have that to worry about and we’re looking forward to running him.\r\n\r\n“I think this race will tell us a bit more about where we’re going. This has been the target for a while and we’ll see whether we step him up in trip when the ground dries out or not.”\r\n\r\n\r\nAdam Wedge told us more about Hang In There after his Cheltenham win\r\n\r\nEmma Lavelle’s Hang In There is officially rated 5lb superior to Fiddlerontheroof, having bounced back from unseating his rider in unfortunate circumstances on his hurdling bow with back-to-back wins at Exeter and Cheltenham.\r\n\r\nLavelle said: “It looks a competitive little race, but that’s only what you’d expect in a Grade One.\r\n\r\n“He seems in very good order. He’s a lovely horse who loves his racing – he pricks his ears and gets on with the job.\r\n\r\n“The ground is going to be very testing on Saturday. He did handle it at Cheltenham, but I’m fairly sure he’ll be better on better ground, purely because he’s such a lovely-actioned horse. He’s just a typical Yeats in that he’s really tough.\r\n\r\n“I think the ground will turn it into a real test of stamina, which will be in his favour as he’s a horse who will get further in time.”\r\n\r\nThe Fergal O’Brien-trained Silver Hallmark faces a step up in class, but there was a lot to like about his successful hurdling debut at Chepstow in early November.\r\n\r\nNicky Henderson has a fine record in the Tolworth Hurdle\r\nNicky Henderson has a fine record in the Tolworth Hurdle\r\n“The form of the Chepstow race hasn’t really worked out, with McFabulous (runner-up) being beaten again since, but we’re looking forward to running on Saturday,” said O’Brien.\r\n\r\n“He’ll love the soft ground and the track will suit him. It’s a good race and whatever he does will not define his career as we hope he’s a two-and-a-half/three-mile chaser in the making.”\r\n\r\nIrish hopes are carried by Gavin Cromwell’s Jeremys Flame, who was last seen chasing home Nicky Henderson’s exciting mare Floressa in a Listed mares only race at Newbury.\r\n\r\n“I don’t know if she’s good enough, but she’s run well to finish second in good mares races the last twice and I think she should be okay on the ground,” said Cromwell.\r\n\r\nNicky Henderson relies on the hat-trick seeking Son Of Camas in his bid for a sixth Tolworth success.\r\n\r\nThe field is completed by the Paul Nicholls-trained Calva D’Auge and Amy Murphy’s outsider Logan Rocks.', '/img/news_photo/4--New4.jpg', 'Unibet Tolworth Novices Hurdle: Fiddlerontheroof tuned up for Tizzard team', '2020-01-03 15:39:51', '2020-01-03 15:39:51'),
(5, 'Peter Fahey Eyes Leopardstown With Soviet Pimpernel', 'Soviet Pimpernel is set for a return to the top level on his next appearance following last week’s impressive victory at Limerick.\r\n\r\nThe winner of a Listowel bumper and a Gowran maiden hurdle earlier in the season, Peter Fahey’s charge was then narrowly denied by Quel Destin at Cheltenham – before finishing sixth behind star novice Envoi Allen in the Royal Bond at Fairyhouse.\r\n\r\nDropped to Grade Three level for his latest assignment, the son of Elusive Pimpernel returned to winning ways in some style – and he may test the water in Grade One company for a second time at Leopardstown’s Dublin Racing Festival in early February.\r\n\r\nFahey said: “I was thrilled with him. I thought it was a very good performance, and he did it nicely.\r\n\r\n\r\n“We’ll keep tipping away with him. I’d imagine we’ll give him entries at the Dublin Racing Festival and hope he can go for something in Cheltenham after that.\r\n\r\n“We’ll see how it goes. I know he was well beaten in the Grade One in Fairyhouse, but he definitely wasn’t right that day.\r\n\r\n“We’ll definitely be sticking to two miles for the time being. I think you’ll see a better horse when the ground dries out in the spring – because one thing this horse isn’t short of is speed.”', '/img/news_photo/5--News5.jpg', 'Peter Fahey Eyes Leopardstown with Soviet Pimpernel', '2020-01-03 15:42:42', '2020-01-03 15:42:42'),
(6, 'Lydia Hislop Road To Cheltenham', 'Happy new year, folks – the appellation, American politicos will advise you, that’s essential when trying to appear relatable, empathetic and trustworthy. So, folks, I have been working my socks off this Christmas to unleash a pent-up tidal wave of analysis about this sport that will, along with the Tokyo Olympics and Euro 2020, distract you from social and environmental Armageddon. Enjoy.', '/img/news_photo/6--News6.jpg', 'Lydia Hislop Road To Cheltenham: Epatante On Course To Reach The Top', '2020-01-03 15:46:31', '2020-01-03 15:46:31'),
(7, 'Godolphin Final Song Impresses In UAE', 'Final Song finished with a flourish to run out an impressive winner of the UAE 1000 Guineas Trial on the opening night of the Dubai Carnival at Meydan.\r\n\r\nDominant on her Ascot debut last May, Saeed bin Suroor’s filly went on to be placed in the Queen Mary at Royal Ascot and the Duchess of Cambridge at Newmarket, but disappointed on her most recent outing in the Oh So Sharp Stakes in October.\r\n\r\nMaking her first start on dirt, the 11-4 chance had plenty of ground to make up rounding the home turn, but displayed a smart change of gear in the hands of Christophe Soumillon to run down the leaders and pass the post with just under two lengths in hand.', '/img/news_photo/7--News7.jpg', 'Godolphin Final Song Impresses In UAE 1000 Guineas Trial At Meydan', '2020-01-03 15:49:59', '2020-01-03 15:49:59'),
(8, 'Davy Russell Ankle Injury', 'Davy Russell hopes to be back in action at the weekend after hurting his ankle in a fall at Fairyhouse on Wednesday.\r\n\r\nRussell, who has the incentive of riding the exciting Envoi Allen in the Lawlor’s Of Naas Novice Hurdle on Sunday, took a fall from Column Of Fire at the second-last flight when about to challenge for the lead in the opening maiden hurdle.\r\n\r\nHe was sent for precautionary X-rays which showed nothing was broken.\r\n\r\n“I twisted my ankle when I fell. It must have caught in something,” he said.\r\n\r\n“We have a few days off now, so hopefully I’ll be back for the weekend.”', '/img/news_photo/8--News8.jpg', 'Davy Russell aiming to return this weekend following ankle injury', '2020-01-03 15:53:10', '2020-01-03 15:53:10'),
(9, 'Warren Greatrex Has Irish Gold Cup', 'Warren Greatrex could send La Bague Au Roi back to Leopardstown for next month’s Irish Gold Cup, as long as conditions are suitable.\r\nThe nine-year-old mare claimed Grade One glory in the Flogas Novice Chase at the Dublin track 12 months ago, but she has failed to strike in four subsequent starts.\r\n\r\nShe was beaten a length and a half in a mares’ Listed event at Doncaster on Sunday and Greatrex is now mulling a return to the top level in open company.\r\n\r\n\r\nLa Bague Au Roi landed the Grade One Flogas Novice Chase in Ireland last season\r\n\r\nGreatrex said: “I will probably give her an entry in the three-mile Grade One at Leopardstown, but she would only go if the ground dried up sufficiently.\r\n\r\n\r\n“She won there last year and I sometimes think we are too shy with these mares to keep them to their own sex – she proved it against the boys over there last year.”\r\n\r\nAlthough Greatrex felt La Bague Au Roi should have won on her most recent start, he believes it was another step in the right direction.\r\n\r\nHe added: “I think the mares that finished in the first three at Doncaster were high class. Richard (Johnson) admitted he should have kicked on with her, but when a champion jockey comes in and says sorry, what can you do?\r\n\r\n“What he did say was that she felt fantastic and as good as she has for a long time, which was good to hear.”\r\n\r\nStablemate Emitom could be stepped up to three miles in the galliardhomes.com Cleeve Hurdle at Cheltenham later this month after failing to beat a rival on his seasonal return in the Relkeel Hurdle at Prestbury Park on New Year’s Day.', '/img/news_photo/9--News9.jpg', 'Warren Greatrex has Irish Gold Cup in mind for star mare La Bague Au Roi', '2020-01-03 15:55:18', '2020-01-03 15:55:18'),
(10, 'Slate House Team Eyeing Ahead Of Festival', 'Slate House could warm up for his planned Cheltenham Festival date in the Sodexo Reynoldstown Novices’ Chase at Ascot on February 15.\r\n\r\nThe three-mile contest is one of two Grade Two races, along with the Cotswold Chase at Cheltenham, under consideration for the Colin Tizzard-trained eight-year-old ahead of the RSA Insurance Novices’ Chase in March.\r\n\r\nSlate House took his form to new heights as he registered a first Grade One triumph in the Kauto Star Novices’ Chase at Kempton on Boxing Day.\r\n\r\n\r\nOur experts analyse Slate House\'s victory in the Kauto Star Novices\' Chase\r\n\r\nJoe Tizzard, the trainer’s son and assistant, said: “The Reynoldstown is the obvious race for him. It’s a Grade Two around Ascot and it would be ideal for him.\r\n\r\n\r\n“We won it last year with Mister Malarky so that is the race we initially thought of. He has come out of his race at Kempton well.\r\n\r\n“We were looking at races for him on Trials Day and he could go for the Cotswold Chase as he is good around Cheltenham and the owners are open to having a crack at anything.  He will almost certainly end up in the RSA though.”\r\n\r\nGrade One-winning stablemate Kilbricken Storm will be aimed at a Pertemps qualifier after finishing third in a handicap at Cheltenham on New Year’s Day.', '/img/news_photo/10--News10.jpg', 'Slate House team eyeing tilt at Reynoldstown Novices\' Chase ahead of Festival', '2020-01-03 15:57:14', '2020-01-03 15:57:14'),
(11, 'France On The Agenda', 'Richard Hobson has the Grand Steeple-Chase de Paris as a possible option for Lord Du Mesnil, after the in-form chaser completed a hat-trick inside a month at Haydock.\r\n\r\nHobson did not initially plan to run Lord Du Mesnil on Monday, but the horse was so well after winning the Tommy Whittle Handicap Chase just nine days earlier he sent him back to Merseyside for the Last Fling Handicap Chase.\r\n\r\nMaking most of the running, Lord Du Mesnil ran out a convincing winner and has been transformed following a summer holiday, with his first success of three having come at Newcastle.\r\n\r\nThe in-form Cotswolds trainer’s Defi Sacre also racked up a quick hat-trick in handicap chases last month, and he said of Lord Du Mesnil: “It’s fantastic, really good.\r\n\r\n\r\n“He’s come back from a summer break – and since he got his head in front, he’s been a different horse.\r\n\r\n“He’s A1. He’s been out in the field with Defi Sacre. Both are entitled to a little break, after winning three each in the last four weeks.”\r\n\r\nLord Du Mesnil has been mentioned in dispatches for this season’s Grand National, and Hobson confirmed he will be entered but is more likely to wait another year.\r\n\r\n“He’s open to options,” he said.\r\n\r\n“I re-scheduled him – he only went to The Last Fling because he was in such good order after the Tommy Whittle, so I thought we’d go again.\r\n\r\n“The biggest option for me this year is the Grand Steeple-Chase de Paris in May.\r\n\r\n“As regards the Aintree fences, I’d rather run him in the Becher in December next season for him to get a feel of the fences over a shorter trip and on ground that will be appealing to him.\r\n\r\n“He’s horse who’s progressing now.”\r\n\r\nConditions would need to be unusually testing at Aintree this spring to tempt Hobson into this year’s National with Lord Du Mesnil.\r\n\r\nHe added of the seven-year-old: “He’ll have an entry in the Grand National, but unless it was really bottomless ground I think we’d probably avoid it.\r\n\r\n“But never say never.\r\n\r\n“He’ll get all those entries – we’ll see how the horse is and go from there.\r\n\r\n“One step at a time – he’s over-achieved already this season. He’s a very good horse, and we need to respect that.\r\n\r\n“He’s got so many options. We just need to ensure his well-being and he gets his ground wherever he goes. That is key. There’s no point going racing unless he gets his ground.”\r\n\r\nDefi Sacre’s hat-trick came in a slightly shorter timespan, with two wins at Newbury and one at Musselburgh. He is set to return to the Edinburgh track for Scottish Trials Day on February 1.\r\n\r\n“It was a great performance at Newbury on Saturday,” said Hobson.\r\n\r\n“I hope he can step up again, with a bit of luck.\r\n\r\n“He will probably head to Musselburgh, all being well, for one of the races there – probably a two-miler.”\r\n\r\nChic Name could be bound for the Edinburgh National on the same card, having finished third and fourth in two cross-country chases at Cheltenham.\r\n\r\nHobson said: “He’s been placed in two cross-country chases and been the best of the British on ground he absolutely hates, so he’ll go nice and fresh for the Edinburgh National.”', '/img/news_photo/11--News11.jpg', 'France on the agenda for the Richard Hobson-trained Lord Du Mesnil', '2020-01-03 15:59:15', '2020-01-03 15:59:16'),
(12, 'Repeat Victory At Tramore', 'Cheltenham Gold Cup victor Al Boum Photo oozed class in making a winning reappearance in the Savills New Year’s Day Chase at Tramore.\r\n\r\nClaiming the race for the second successive year, Willie Mullins’ charge had drawn a big crowd to the track.\r\n\r\nOnly four went to post, including two stablemates in Acapella Bourgeois and Voix Du Reve, with Gordon Elliott’s Shattered Love preventing a Mullins monopoly.\r\n\r\nRachael Blackmore set the pace on Acapella Bourgeois with Paul Townend forced three wide for much of the race as Shattered Love split the Mullins pair.', '/img/news_photo/12--News12.jpg', 'He\'s back! Gold Cup winner Al Boum Photo returns with repeat victory at Tramore', '2020-01-03 16:01:02', '2020-01-03 16:01:02'),
(13, 'Oldgrangewood Prevails By A Nose', 'Oldgrangewood prevailed by the narrowest of margins in an exciting three-way finish with Saint Calvados and Lalor in the Paddy Power Handicap Chase at Cheltenham.\r\n\r\nLalor, ridden by Aidan Coleman for the first time, had led his rivals a merry dance for much of the race, showing all his old enthusiasm, but he looked in trouble running down to the last.\r\n\r\nDan Skelton’s Oldgrangewood, down the middle of the track, jumped to the lead while Saint Calvados was produced with a late run by Gavin Sheehan.\r\n\r\nThe famous Cheltenham hill looked like claiming another victim as Oldgrangewood’s stride began to shorten while Lalor, who was almost a length down at one stage, began to rally on the inside of Saint Calvados.\r\n\r\n\r\nThe three flashed across the line together and it was Oldgrangewood (12-1) and Harry Skelton who eventually got the verdict after a lengthy wait.\r\n\r\nTop weight and 3-1 favourite Kalashnikov came home eighth of 10 finishers. The Skelton team had earlier lost a race in the stewards\' room when Protektorat was demoted to second in favour of Imperial Alcazar.\r\n\r\n\"It has been a funny old hour, but that is jump racing,\" said Harry Skelton.\r\n\r\n\r\n\"He is a talented horse. Today I couldn\'t believe it, he travelled around and jumped like a buck. The whole way round I thought I was too handy and got too good a run.\r\n\r\n\"You want plenty to aim at and Aidan (Coleman) kicked turning in and then I had something to go at. He jumped two out and took off.\r\n\r\n\"I thought when I raced on my own it would go against me in the finish. He probably saw the other horses and thankfully he has stuck his head out well.\r\n\r\n\"I\'ve been in the game long enough and you take the rough with the smooth - you win some and lose some, so I suppose a Graded race is better than a Listed race.\"\r\n\r\nDan Skelton\'s assistant Tom Messenger added: \"We lost a Listed race, but we have got a Graded handicap which is brilliant for the horse.', '/img/news_photo/13--News13.jpg', 'Oldgrangewood prevails by a nose in thrilling three-way Cheltenham finish', '2020-01-03 16:29:09', '2020-01-03 16:29:09'),
(14, 'Step Up In Trip In Relkeel Hurdle', 'Summerville Boy returned to the scene of his finest hour to win the Dornan Engineering Relkeel Hurdle at Cheltenham.\r\n\r\nSince winning the 2018 Supreme Novices’ Hurdle, not much has gone right for Tom George’s charge and he was sent off a 10-1 chance moving back to the smaller obstacles from fences.\r\n\r\nHowever, under new forceful tactics, Summerville Boy showed all his old dash to stake his claim for the Stayers’ Hurdle at the Festival in March.\r\n\r\nHe looked a sitting duck turning into the straight with Janika, William Henry and Roksana all seemingly travelling better, but Summerville Boy just kept on pulling out more for Jonathan Burke.', '/img/news_photo/14--News14.jpg', 'Step up in trip sees Summerville Boy bounce back to best in Relkeel Hurdle', '2020-01-03 16:30:38', '2020-01-03 16:30:38'),
(15, 'Tom Queally Rides First Winner Over Jumps', 'Tom Queally teamed up with his father, Declan, to score over hurdles at Tramore with Owenacurra Lass.\r\n\r\nQueally, who will forever be linked with Flat superstar Frankel, was having his third spin over obstacles since taking out a National Hunt licence.\r\n\r\nWith rides thin on the ground on the level through the winter, Quelly returned home and rewarded punters at 9-1.\r\n\r\nHe brought his mount wide into the straight in the Knockenduff Stud Maiden Hurdle and won by a length and three-quarters.', '/img/news_photo/15--News15.jpg', 'Tom Queally rides first winner over jumps since taking out National Hunt license', '2020-01-03 16:32:20', '2020-01-03 16:32:21'),
(16, 'Lydia Hislop Said Chacun Worth Another Investment', 'Many of you will be relieved to hear that my new year’s resolution is to drop the political comment from these introductions. I can imagine people’s fingers have, in the past, hovered over the link and wavered before coming down on it. You may even have been breaking the reading habits of generations by doing so. I will therefore repay the trust all of you have placed in both me and in The Road To Cheltenham, the people’s column.\r\n\r\nIt has been a busy fortnight for those of us who haven’t favoured a £20,000-a-week Mustique holiday villa with our presence or had our chard flattened by unseemly goings-on in the East Finchley Allotments.\r\n\r\nThe Cabinet Office, for example, has been busy handing out not only handy burgling hacks but also gongs – to the likes of Iain Duncan Smith, for services to undertaking, and even among our own parish, to Nicky Henderson and Paul Nicholls identically, thereby saving the Queen from any sulky silences around the lunch table at Ascot.\r\n\r\n\r\nMeanwhile on the track, the action has also been fast and furious. Given the scale of excitements, this edition of The Road To Cheltenham concentrates solely on the open graded-chasing action of the holiday period. The hurdlers will have my undivided attention in the next volume, published later this week, and the novices in a third edition at the weekend.', '/img/news_photo/16--News16.jpg', 'Lydia Hislop\'s Road To Cheltenham: Chacun worth another investment', '2020-01-03 16:34:26', '2020-01-03 16:34:26'),
(17, 'Doing Fine Gains Compensation With Cheltenham Victory', 'Doing Fine gained compensation for the victory he was denied at Sandown last time – by demonstrating that stamina is his forte in the Markel Insurance Handicap Chase at Cheltenham.\r\n\r\nThe Neil Mulholland-trained 12-year-old was first past the post in last month’s London National, but the race was declared void because the seven finishing riders failed to heed the yellow stop flag that was being waved because of a stricken horse.\r\n\r\nAlthough turning into the home straight in third, the 11-2 shot saw his stamina reserves kick in to defeat course winner Cogry by four and a half lengths.', '/img/news_photo/17--News17.jpg', 'Doing Fine gains compensation following void race with Cheltenham victory', '2020-01-03 16:35:58', '2020-01-03 16:35:58'),
(18, 'Harry Allwood Selects His Top Ten Moments', 'The past 12 months in the racing world have not disappointed and we were once again treated to some tremendous performances and moments on the Flat and over jumps.\r\n\r\nFrom one of the greatest jump jockeys of all time retiring to Khadijah Mellah creating history.\r\n\r\nBryony Frost hit the headlines when she became the first woman to ride a Grade One winner over jumps at the Cheltenham Festival aboard Frodon in the Ryanair Chase.\r\n\r\nPaul Nicholls was going to run his seven-year-old in the Cheltenham Gold Cup, but instead opted for this extended 2m4f contest in which Frodon and Frost got into a great rhythm out in front and battled bravely to score by a length and a quarter.\r\n\r\n\r\nThere were great scenes in the winner’s enclosure afterwards as Frost, a real crowd pleaser, returned to a rapturous applause from the racegoers at Prestbury Park.\r\n\r\nAs ever, Frost was full of praise for Frodon. She said: \"We had to be brave. Every time he\'s won, he\'s won by being the bravest. He grabs a hold and he tells you to give it to him. Down to the last we were beat.\r\n\r\n\"It was just incredible. I can\'t explain how much I love that horse.\"', '/img/news_photo/18--News18.jpg', 'From Tiger Roll to the Magnolia Cup: Harry Allwood selects his top ten moments of 2019', '2020-01-03 16:38:27', '2020-01-03 16:38:27'),
(19, 'Hoping Dashel Drasher Is Not On Sidelines For Long', 'Jeremy Scott hopes exciting novice chaser Dashel Drasher can recover from a recent setback and be back action in the spring.\r\n\r\nHaving chased home Grade One scorer Champ on his debut over fences at Newbury, before unseating behind the same opponent back at the Berkshire track, Scott’s charge made it third time lucky over fences with a taking success at Haydock.\r\n\r\nThough not setting any targets for Dashel Drasher’s return, the Devon handler remains optimistic he will get him back on track before the end of the campaign.\r\n\r\nScott said: “Dashel Drasher has unfortunately picked up a niggling injury. Although it is not bad, it just means we are likely going to have to wait until the spring before getting him back out.\r\n\r\n“I hope it is not a season-ending injury, but we will just take it as it comes.\r\n\r\n“It’s a real shame, as I wanted to run him this weekend.”', '/img/news_photo/19--News19.jpg', 'Jeremy Scott hoping Dashel Drasher is not on sidelines for long', '2020-01-03 16:40:12', '2020-01-03 16:40:12'),
(20, 'Warwick Said Paul Nicholls Ends Year In Style As Cill Anna Opens Account', 'There has been plenty to celebrate in 2019 for trainer Paul Nicholls – and Cill Anna ensured he signed off for the year on a winning note after opening her account under rules at Warwick.\r\n\r\nHaving received an OBE in the New Year Honours list, the Ditcheat handler – who claimed his 11th trainers’ title in April and his 3,000th British winner in February – was given more to cheer with victory in the LPS British Stallion Studs EBF Mares “National Hunt” Novices’ Hurdle.\r\n\r\nSent off at 7-2, Cill Anna showed stamina is her forte when picking off long-time leader Emmas Joy late on in the two-mile-five-furlong prize before scoring by half a length.\r\n\r\nFresh from winning the King George on Boxing Day with Clan Des Obeaux, Nicholls said: “We’ve had an amazing year and now we’ve got to try to do it all again. We’ve got to keep looking forward and building our string.\r\n\r\n“Winning my 11th King George with Clan was amazing and getting the OBE is a fantastic honour. There have been plenty of positives to take from the year.\r\n\r\n“We will have a bit of a quiet month now and give the horses their flu jabs and just keep 15 to 20 on the go, then it will be manic from the end of January to the end of the season.”', '/img/news_photo/20--News20.jpg', 'Warwick report: Paul Nicholls ends year in style as Cill Anna opens account', '2020-01-03 16:42:26', '2020-01-03 16:42:27'),
(21, 'Salsaretta Maintains Unbeaten Record', 'Salsaretta made it two from two over fences with an assured victory in the Tote Proud Sponsors Of Punchestown Mares Chase at Punchestown.\r\n\r\nThe Willie Mullins-trained six-year-old had a tall reputation after arriving from France a couple of years ago.\r\n\r\nHowever, although she managed to win a couple of minor events at Sligo and Limerick, her hurdling career was a little underwhelming as she failed to make her presence felt in a string of Grade One events.\r\n\r\nSalsaretta made it two from two over fences at Punchestown\r\n\r\nShe caused a minor surprise when making an impressive chasing debut at Punchestown in late November and was the 8-11 favourite to follow up on her return, getting the job done well under champion jockey Paul Townend.\r\n\r\n\r\nMullins said: “She’s a very slick jumper and did it nicely. I think she would prefer softer ground.\r\n\r\n“It’s a nice jump up in class for her and we’ll try and go back to novice races if we can.”\r\n\r\nSmoking Gun (7-2) saw off his better-fancied stablemate Early Doors in the Tote Supporting Irish Racing Since 1930 Beginners Chase.', '/img/news_photo/21--News21.jpg', 'Salsaretta maintains unbeaten record over fences with Punchestown success', '2020-01-03 16:44:13', '2020-01-03 16:44:14'),
(22, 'Kalashnikov Faces Weighty Rask Against Oldgrangewood', 'Amy Murphy is under no illusions about the task facing Kalashnikov in a fascinating Handicap Chase at Cheltenham.\r\n\r\nWith a total prize fund of £70,000 up for grabs, a strong field of 12 runners have assembled for the most valuable event of the afternoon at Prestbury Park on New Year’s Day.\r\n\r\nKalashnikov is bidding to open his account for the campaign, having filled the runner-up spot on each of his two starts so far this season, most recently going down by just a nose to the reopposing Oldgrangewood at Newbury.\r\n\r\nKalashnikov was narrowly denied by Oldgrangewood at Newbury last time out\r\nHe faces no easy task under the welter burden of 11st 12lb, however, conceding weight to Dan Skelton’s Oldgrangewood, Harry Whittington’s Saint Calvados and Mick Channon’s three-times course winner Mister Whitaker, among others.\r\n\r\nMurphy said: “It’s a proper race and it’s a big ask under that weight, but we’re looking forward to it.\r\n\r\n\r\n“He’s in super form and it’s a chance to give him some more course experience ahead of the Festival in March.\r\n\r\n“To be honest, I’d sooner be running in a level-weights graded race, but there just isn’t a suitable one for him left-handed, so we’ll give it a go and we’ll learn a bit more.”\r\n\r\nOldgrangewood is only a pound worse off for the rematch with Kalashnikov.\r\n\r\nSkelton’s assistant, Tom Messenger, said: “It’s never been his ground when he has been to Cheltenham, so he has probably not got the best of form round there, but that is mainly ground related.\r\n\r\n“He went up 7lb for winning the last day and is off 142, but he has won off 145 so he is still handicapped to win.\r\n\r\n“He has got a good chance and he will stay on well up the hill, as long as the ground is not too soft.”\r\n\r\nSaint Calvados made a successful start to his season at this venue in October before finishing last of four – but not beaten far – behind Defi Du Seuil in November’s Shloer Chase.\r\n\r\nHe steps up to two and a half miles for the first time in his career in the Cotswolds.', '/img/news_photo/22--News22.jpg', 'Kalashnikov faces weighty task against Oldgrangewood at Cheltenham', '2020-01-03 16:46:40', '2020-01-03 16:46:40'),
(23, 'Buster Edwards Stuns Racing Fans', 'Deep inside the final furlong of 2019, Haydock racegoers witnessed arguably one of the most unlikely finishes of the decade on Monday, as Buster Edwards came from the clouds to win the Bryn Gates Conditional Jockeys’ Handicap Hurdle.\r\n\r\nDavid Pipe’s charge was a winner last time out in first-time blinkers at Hereford, and was sent off the 7-2 favourite to follow up on Merseyside, under Welsh Grand National-winning jockey Jack Tudor.\r\n\r\nHowever, from an early stage Tudor, 17, was niggling his mount along –  and turning into the straight for the final time, it looked a lost cause for his supporters, with Passam, Donnie Brasco and Strike West beginning to battle out the finish.', '/img/news_photo/23--News23.jpg', 'Buster Edwards stuns racing fans by pulling off daring Haydock heist', '2020-01-03 16:48:53', '2020-01-03 16:48:53'),
(24, 'Fiddlerontheroof Among Eight Entries', 'Fiddlerontheroof is among eight entries for the Grade One Unibet Tolworth Hurdle at Sandown on Saturday.\r\n\r\nColin Tizzard’s Irish import got off the mark over timber at the third attempt last time out, over the same course and distance he will face this weekend.\r\n\r\nOn his first outing for new connections he chased home subsequent Challow Hurdle winner Thyme Hill at Chepstow, and was then narrowly denied by Alan King’s Edwardstone on good ground at Wincanton.\r\n\r\nAssistant trainer Joe Tizzard said: “He goes to the Tolworth. He was impressive last time and he proved he handled the track and the ground. He has got form around there, which is good, especially around a track like Sandown, as if it gets really heavy it can take a lot of getting.\r\n\r\n\r\n“His form looks rock solid and I think those novice hurdles he was beaten in look particularly strong. That Wincanton race we tried be clever, but it backfired as he came up against a really quite good one in Edwardstone.\r\n\r\n“He would have a great chance as he is a big, strong horse and can handle Sandown and the soft ground there.”\r\n\r\nNicky Henderson’s Son Of Camas and Fergal O’Brien’s Silver Hallmark are defending unbeaten records over hurdles.\r\n\r\nEmma Lavelle’s Grade Two winner Hang In There and Paul Nicholls’ Calva D’Auge are other interesting possibles.\r\n\r\nGavin Cromwell may send mare Jeremys Flame from his Irish base, while Amy Murphy has entered Logan Rocks and Gary Moore has put in Ballycloven Beat.', '/img/news_photo/24--News24.jpg', 'Fiddlerontheroof among eight entries for the Tolworth at Sandown', '2020-01-03 16:50:53', '2020-01-03 16:50:53'),
(25, 'Leading Cheltenham Festival Hope Envoi Allen On Course For Weekend Test', 'Winner of the Champion Bumper at Cheltenham in March, Gordon Elliott’s rising star has made a seamless transition to hurdling, already winning at the highest level in the Royal Bond at Fairyhouse.\r\n\r\nThat was over two miles and he is due to step up in trip this weekend, but the Cheveley Park Stud-owned five-year-old is likely to be a short price to confirm his place at the head of the ante-post markets.', '/img/news_photo/25--News25.jpg', 'Envoi Allen is among eight confirmations for the Lawlor’s of Naas Novice.', '2020-01-03 16:54:12', '2020-01-03 16:54:13'),
(26, 'Willie Mullins Satisfied With Chase Performance', 'Kemboy satisfied Willie Mullins with his return to action in the Savills Chase at Leopardstown.\r\n\r\nThe seven-year-old finished a close fourth on his first outing since beating stablemate and Cheltenham Gold Cup winner Al Boum Photo at Punchestown almost eight months ago.\r\n\r\nKemboy lost his position as outright favourite for this season’s Gold Cup – but Mullins expects him to improve for Saturday’s run when he next appears, which is likely to be in the Unibet Irish Gold Cup in February.', '/img/news_photo/26--News26.jpg', 'Willie Mullins satisfied with Kemboy’s Savills Chase performance', '2020-01-03 16:56:31', '2020-01-03 16:56:31'),
(27, 'Allmankind To Have One More Run Before Triumph Hurdle', 'The exciting Allmankind is likely to have one more race before the JCB Triumph Hurdle at the Cheltenham Festival.\r\n\r\nConnections report the free-going front-runner to be A1 following his impressive all-the-way victory by nine lengths in the Finale Hurdle at Chepstow over Christmas.\r\n\r\nWith 10 weeks to Allmankind’s main objective in March, another prep run is schemed in for the Dan Skelton-trained juvenile.\r\n\r\nSkelton’s assistant Tom Messenger said: “He’s fine, as good as gold.\r\n\r\n\r\n“I think we’ll give him one more run before Cheltenham.\r\n\r\n“Obviously a horse that runs like that, you wouldn’t want to go there too fresh, and you have to get as much experience into them as you can.\r\n\r\n“We’ll just keep him ticking over at home, because he’s quite headstrong. Every time he runs you think he won’t keep going – but he does.”\r\n\r\nAllmankind is a top-priced 8-1 for the Triumph.', '/img/news_photo/27--News27.jpg', 'Allmankind to have one more run before taking chance in Triumph Hurdle', '2020-01-03 16:58:22', '2020-01-03 16:58:22'),
(28, 'Davies Confident Al Dancer Is Still Arkle Material', 'Nigel Twiston-Davies still has faith that Al Dancer can develop into a genuine Arkle contender – despite another defeat at Kempton.\r\n\r\nThe grey could finish only fourth to Global Citizen in the Wayward Lad Chase, albeit beaten only four lengths.\r\n\r\nWhere he runs next is undecided, with the availability of jockey Sam Twiston-Davies central to plans.', '/img/news_photo/28--News28.jpg', 'Nigel Twiston-Davies confident Al Dancer is still Arkle material', '2020-01-03 17:03:42', '2020-01-03 17:03:42'),
(29, 'Sharjah Retains Matheson Hurdle Crown', 'Sharjah ran out an impressive winner of the Matheson Hurdle for the second successive year at Leopardstown.\r\n\r\nThe victory means Willie Mullins has now won the Grade One seven times in the last 10 years - but the champion trainer will have been left scratching his head after his apparent first string Klassical Dream finished last of the five runners.\r\n\r\nLast season\'s Supreme Novices\' Hurdle hero was bounding along merrily at the head of affairs with Petit Mouchoir, winner of the race in 2016, when he made a jolting error at halfway - almost coming down.\r\n\r\nPaul Townend allowed him time to regain composure before trying to get involved in the race once more - but soon after turning into the straight, it was obvious his race was run and he was eased heavily.\r\n\r\n\r\nPetit Mouchoir kept up the gallop, but Patrick Mullins loomed up cruising on his outside - and as soon as the button was pressed, the race was over.\r\n\r\nThe 9-2 chance sprinted three and three-quarter lengths clear and saw his Champion Hurdle odds slashed to 14-1 from 25s by , who also shortened up impressive Christmas Hurdle winner Epatante to 5-2 from 7-2.\r\n\r\n\"He was good. Klassical Dream and Petit Mouchoir went at it, and I think Klassical Dream probably just couldn\'t go the pace,\" said the winning trainer.\r\n\r\n\"When he took off at that hurdle down the back I just took down my binoculars, because I thought he wouldn\'t even make the hurdle.', '/img/news_photo/29--News29.jpg', 'Sharjah retains Matheson Hurdle crown as Klassical Dream trails home last', '2020-01-03 17:05:40', '2020-01-03 17:05:40'),
(30, 'Lostintranslation Take Denman Chase En Route To Cheltenham', 'If Lostintranslation runs again before the Cheltenham Gold Cup it is more than likely to be in the Denman Chase at Newbury.\r\n\r\nColin Tizzard’s Chase hero saw his winning run come to an abrupt end in the King George VI Chase on Boxing Day when he was pulled up.\r\n\r\nJockey Robbie Power felt he was caught out by his wind on the testing ground, and it will now be checked out to see if a procedure is required.', '/img/news_photo/30--News30.jpg', 'Lostintranslation may take in Denman Chase en route to Cheltenham', '2020-01-03 17:09:06', '2020-01-03 17:09:06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `races`
--

CREATE TABLE `races` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tournament_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `races`
--

INSERT INTO `races` (`id`, `name`, `date`, `description`, `location`, `file_path`, `tournament_id`, `created_at`, `updated_at`) VALUES
(1, 'Race A', '2019-12-26 14:00:00', 'This is the first Race of the tournament in Madeira, involving professional 4 horses and 4 Jockeys.\r\nWhich will be the best team?', 'Camacha, Madeira, Portugal', '/img/race_photo/1-Race A-Race_1.jpg', 1, '2020-01-03 10:39:28', '2020-01-03 10:39:28'),
(2, 'Race B', '2019-12-27 11:00:00', 'This is the second Race of this tournament. This time with different horses.\r\nCan they do a better result?', 'Santana, Madeira, Portugal', '/img/race_photo/2-Race B-Race2.jpg', 1, '2020-01-03 10:49:13', '2020-01-03 10:49:13'),
(3, 'Race C', '2019-12-28 18:00:00', 'This is the Third race of this tournament.\r\nWhich will be the best?', 'Camacha, Madeira, Portugal', '/img/race_photo/3-Race C-Race_1.jpg', 1, '2020-01-03 10:53:25', '2020-01-03 10:53:25'),
(4, 'Texas A', '2020-02-01 08:00:00', 'This is the first race of Horse Championship\r\nIt\'s a very competitive for the winners\r\nWhich can do a better time?', 'Texas City, Texas, Estados Unidos', '/img/race_photo/4-Texas A-Race_T1.jpg', 2, '2020-01-03 17:38:47', '2020-01-03 17:38:47'),
(5, 'Texas B', '2020-02-02 18:00:00', 'This is the second race of Horse Championship It\'s a very competitive for the winners Which can do a better time?', 'Texas A&M University, Bizzell Street, College Station, Texas, Estados Unidos', '/img/race_photo/5-Texas B-Race_T2.jpg', 2, '2020-01-03 17:44:28', '2020-01-03 17:44:28'),
(6, 'Texas C', '2020-02-03 18:00:00', 'This is the third race of Horse Championship.\r\nIt\'s a very competitive for the winners.\r\nWhich can do a better time?', 'Texas Children\'s Hospital West Campus, Katy Freeway, Houston, Texas, Estados Unidos', '/img/race_photo/6-Texas C-Race_T3.jpg', 2, '2020-01-03 17:47:56', '2020-01-03 17:47:56'),
(7, 'Texas D', '2020-02-05 17:00:00', 'This is the fourth race of Horse Championship.\r\nIt\'s a very competitive for the winners.\r\nWhich can do a better time?', 'Texas City, Texas, Estados Unidos', '/img/race_photo/7-Texas D-Race_T1.jpg', 2, '2020-01-03 17:53:55', '2020-01-03 17:53:55'),
(8, 'Race E', '2020-02-06 16:30:00', 'This is the fifth race of Horse Championship.\r\nIt\'s a very competitive for the winners.\r\nWhich can do a better time?', 'Texas A&M University, Bizzell Street, College Station, Texas, Estados Unidos', '/img/race_photo/8-Race E-Race_T2.jpg', 2, '2020-01-03 17:57:18', '2020-01-03 17:57:18'),
(9, 'TourR A', '2020-02-04 00:00:00', 'This is the firse race of Tour A. \r\nIt\'s a very competitive for the winners. \r\nWhich can do a better time?', 'Saint-Etiénne, França', '/img/race_photo/9-TourR A-TourA-Race_1.jpg', 3, '2020-01-03 22:03:04', '2020-01-03 22:03:04'),
(10, 'TourRB', '2020-02-05 14:30:00', 'This is the second race of Tour A. \r\nIt\'s a very competitive for the winners. \r\nWhich can do a better time?', 'Paris, França', '/img/race_photo/10-TourRB-TourA_2.jpg', 3, '2020-01-03 22:14:03', '2020-01-03 22:14:03'),
(11, 'TourR C', '2020-02-06 18:30:00', 'This is the thirtd race of Tour A. \r\nIt\'s a very competitive for the winners. \r\nWhich can do a better time?', 'Lyon, França', '/img/race_photo/11-TourR C-TourA_3.jpg', 3, '2020-01-03 22:17:16', '2020-01-03 22:17:17'),
(12, 'TourR D', '2020-02-07 12:30:00', 'This is the fourth race of Tour A. \r\nIt\'s a very competitive for the winners. \r\nWhich can do a better time?', 'Saint-Denis, França', '/img/race_photo/12-TourR D-TourA-Race_1.jpg', 3, '2020-01-03 22:21:21', '2020-01-03 22:21:21'),
(13, 'TourR E', '2020-02-09 15:30:00', 'This is the fifth race of Tour A. \r\nIt\'s a very competitive for the winners. \r\nWhich can do a better time?', 'Paris, França', '/img/race_photo/13-TourR E-TourA_2.jpg', 3, '2020-01-03 22:24:49', '2020-01-03 22:24:49'),
(14, 'TourR F', '2020-02-10 15:30:00', 'This is the sixth race of Tour A. \r\nIt\'s a very competitive for the winners. \r\nWhich can do a better time?', 'Saint-Etiénne, França', '/img/race_photo/14-TourR F-TourA_3.jpg', 3, '2020-01-03 22:31:39', '2020-01-03 22:31:39'),
(15, 'TorneoR A', '2020-02-11 17:30:00', 'This is the firse race of Torneo A. \r\nIt\'s a very competitive for the winners. \r\nWhich can do a better time?', 'Madrid, Espanha', '/img/race_photo/15-TorneoR A-TorneoA_1.jpg', 4, '2020-01-03 22:53:39', '2020-01-03 22:53:39'),
(16, 'TorneoR B', '2020-02-12 10:00:00', 'This is the second race of Tour A. \r\nIt\'s a very competitive for the winners. \r\nWhich can do a better time?', 'Barcelona, Espanha', '/img/race_photo/16-TorneoR B-TorneoA_2.jpg', 4, '2020-01-03 22:57:23', '2020-01-03 22:57:23'),
(17, 'TorneoR C', '2020-02-12 18:30:00', 'This is the third race of Tour A. \r\nIt\'s a very competitive for the winners. \r\nWhich can do a better time?', 'Valência, Espanha', '/img/race_photo/17-TorneoR C-TorneoA_3.jpg', 4, '2020-01-03 23:02:08', '2020-01-03 23:02:08'),
(18, 'TorneoR D', '2020-02-14 10:30:00', 'This is the fourth race of Torneo A. \r\nIt\'s a very competitive for the winners. \r\nWhich can do a better time?', 'Madrid, Espanha', '/img/race_photo/18-TorneoR D-TorneoA_1.jpg', 4, '2020-01-03 23:05:35', '2020-01-03 23:16:09'),
(19, 'TorneoR E', '2020-02-14 18:30:00', 'This is the fifth race of Torneo A. \r\nIt\'s a very competitive for the winners. \r\nWhich can do a better time?', 'Barcelona, Espanha', '/img/race_photo/19-TorneoR E-TorneoA_2.jpg', 4, '2020-01-03 23:08:02', '2020-01-03 23:13:54'),
(20, 'TorneoR F', '2020-02-15 14:30:00', 'This is the sixth race of Torneo A. \r\nIt\'s a very competitive for the winners. \r\nWhich can do a better time?', 'Valência, Espanha', '/img/race_photo/20-TorneoR F-TorneoA_3.jpg', 4, '2020-01-03 23:11:02', '2020-01-03 23:11:02'),
(21, 'TurnierR A', '2020-02-20 13:30:00', 'This is the first race of Turnier A.\r\nIt\'s a very competitive for the winners.\r\nWhich can do a better time?', 'Munich, Alemanha', '/img/race_photo/21-TurnierR A-TurnierA_1.jpg', 5, '2020-01-03 23:25:52', '2020-01-03 23:25:52'),
(22, 'TurnierR B', '2020-02-21 15:30:00', 'This is the second race of Turnier A.\r\nIt\'s a very competitive for the winners.\r\nWhich can do a better time?', 'Berlin, Alemanha', '/img/race_photo/22-TurnierR B-TurnierA_2.jpg', 5, '2020-01-03 23:28:17', '2020-01-03 23:29:31'),
(23, 'TurnierR C', '2020-02-22 17:30:00', 'This is the third race of Turnier A.\r\nIt\'s a very competitive for the winners.\r\nWhich can do a better time?', 'Frankfurt, Alemanha', '/img/race_photo/23-TurnierR C-TurnierA_3.jpg', 5, '2020-01-03 23:31:58', '2020-01-03 23:31:58'),
(24, 'TurnierR D', '2020-02-23 18:30:00', 'This is the fourth race of Turnier A.\r\nIt\'s a very competitive for the winners. \r\nWhich can do a better time?', 'Munich, Alemanha', '/img/race_photo/24-TurnierR D-TurnierA_1.jpg', 5, '2020-01-03 23:35:29', '2020-01-03 23:35:29'),
(25, 'TurnierR E', '2020-02-24 19:00:00', 'This is the fifth race of Turnier A.\r\nIt\'s a very competitive for the winners. \r\nWhich can do a better time?', 'Berlin, Alemanha', '/img/race_photo/25-TurnierR E-TurnierA_2.jpg', 5, '2020-01-03 23:37:28', '2020-01-03 23:37:28'),
(26, 'TurnierR F', '2020-02-28 15:00:00', 'This is the sixth race of Turnier A.\r\nIt\'s a very competitive for the winners. \r\nWhich can do a better time?', 'Frankfurt, Alemanha', '/img/race_photo/26-Turnier F-TurnierA_3.jpg', 5, '2020-01-03 23:39:42', '2020-01-03 23:39:42'),
(27, 'TournamentR A', '2020-02-12 13:30:00', 'This is the first race of Tournament A.\r\nIt\'s a very competitive for the winners.\r\nWhich can do a better time?', 'London, Reino Unido', '/img/race_photo/27-TournamentR A-TournamentA_1.jpg', 6, '2020-01-04 10:51:53', '2020-01-04 10:51:53'),
(28, 'TournamentR B', '2020-02-13 14:30:00', 'This is the second race of Tournament A.\r\nIt\'s a very competitive for the winners.\r\nWhich can do a better time?', 'Manchester, Reino Unido', '/img/race_photo/28-TournamentR B-TournamentA_2.png', 6, '2020-01-04 10:55:18', '2020-01-04 10:55:18'),
(29, 'TournamentR C', '2020-02-14 14:30:00', 'This is the third race of Tournament A.\r\nIt\'s a very competitive for the winners.\r\nWhich can do a better time?', 'Liverpool, Reino Unido', '/img/race_photo/29-TournamentR C-TournamentA_3.jpg', 6, '2020-01-04 10:57:06', '2020-01-04 10:57:06'),
(30, 'TournamentR D', '2020-02-14 15:00:00', 'This is the fourth race of Tournament A.\r\nIt\'s a very competitive for the winners.\r\nWhich can do a better time?', 'Edinburgh, Reino Unido', '/img/race_photo/30-TournamentR D-TournamentA_4.jpg', 6, '2020-01-04 11:00:52', '2020-01-04 11:00:52'),
(31, 'TournamentR E', '2020-02-14 15:00:00', 'This is the fifth race of Tournament A.\r\nIt\'s a very competitive for the winners.\r\nWhich can do a better time?', 'Edinburgh, Reino Unido', '/img/race_photo/31-TournamentR D-TournamentA_4.jpg', 6, '2020-01-04 11:00:52', '2020-01-04 11:00:52'),
(32, 'TournamentR F', '2020-02-14 20:00:00', 'This is the sixth race of Tournament A.\r\nIt\'s a very competitive for the winners.\r\nWhich can do a better time?', 'Manchester, Reino Unido', '/img/race_photo/32-TournamentR F-TournamentA_1.jpg', 6, '2020-01-04 11:05:59', '2020-01-04 11:05:59'),
(33, 'TournamentR G', '2020-02-15 11:00:00', 'This is the seventh race of Tournament A.\r\nIt\'s a very competitive for the winners.\r\nWhich can do a better time?', 'Liverpool, Reino Unido', '/img/race_photo/33-TournamentR G-TournamentA_2.png', 6, '2020-01-04 11:07:40', '2020-01-04 11:07:41'),
(34, 'TournamentR H', '2020-02-15 18:30:00', 'This is the eigth race of Tournament A.\r\nIt\'s a very competitive for the winners.\r\nWhich can do a better time?', 'Edinburgh, Reino Unido', '/img/race_photo/34-TournamentR H-TournamentA_4.jpg', 6, '2020-01-04 11:09:52', '2020-01-04 11:09:52');

-- --------------------------------------------------------

--
-- Estrutura da tabela `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `race_id` bigint(20) UNSIGNED NOT NULL,
  `horse_id` bigint(20) UNSIGNED NOT NULL,
  `jockey_id` bigint(20) UNSIGNED NOT NULL,
  `time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `results`
--

INSERT INTO `results` (`id`, `race_id`, `horse_id`, `jockey_id`, `time`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '18:03:00', '2020-01-03 10:39:28', '2020-01-04 12:30:48'),
(2, 1, 2, 2, '23:50:00', '2020-01-03 10:39:28', '2020-01-04 12:31:17'),
(3, 1, 3, 3, '21:50:00', '2020-01-03 10:39:29', '2020-01-04 12:31:07'),
(4, 1, 4, 4, '20:16:00', '2020-01-03 10:39:29', '2020-01-04 12:30:57'),
(5, 2, 1, 2, '21:02:00', '2020-01-03 10:49:14', '2020-01-04 12:32:14'),
(6, 2, 2, 1, '23:25:00', '2020-01-03 10:49:14', '2020-01-04 12:32:51'),
(7, 2, 4, 3, '22:49:00', '2020-01-03 10:49:14', '2020-01-04 12:32:37'),
(8, 2, 3, 4, '21:37:00', '2020-01-03 10:49:14', '2020-01-04 12:32:25'),
(9, 3, 1, 1, '12:59:00', '2020-01-03 10:53:25', '2020-01-04 12:33:53'),
(10, 3, 2, 2, '10:43:00', '2020-01-03 10:53:25', '2020-01-04 12:33:47'),
(11, 3, 3, 3, '08:31:00', '2020-01-03 10:53:25', '2020-01-04 12:33:39'),
(12, 3, 4, 4, '06:26:00', '2020-01-03 10:53:25', '2020-01-04 12:33:30'),
(13, 4, 6, 11, NULL, '2020-01-03 17:38:47', '2020-01-03 17:38:47'),
(14, 4, 11, 7, NULL, '2020-01-03 17:38:48', '2020-01-03 17:38:48'),
(15, 4, 27, 30, NULL, '2020-01-03 17:38:48', '2020-01-03 17:38:48'),
(16, 4, 22, 15, NULL, '2020-01-03 17:38:48', '2020-01-03 17:38:48'),
(17, 4, 30, 8, NULL, '2020-01-03 17:38:48', '2020-01-03 17:38:48'),
(18, 4, 5, 18, NULL, '2020-01-03 17:38:48', '2020-01-03 17:38:48'),
(19, 4, 14, 28, NULL, '2020-01-03 17:38:48', '2020-01-03 17:38:48'),
(20, 4, 12, 1, NULL, '2020-01-03 17:38:48', '2020-01-03 17:38:48'),
(21, 5, 1, 1, NULL, '2020-01-03 17:44:28', '2020-01-03 17:44:28'),
(22, 5, 2, 2, NULL, '2020-01-03 17:44:28', '2020-01-03 17:44:28'),
(23, 5, 5, 8, NULL, '2020-01-03 17:44:28', '2020-01-03 17:44:28'),
(24, 5, 6, 9, NULL, '2020-01-03 17:44:28', '2020-01-03 17:44:28'),
(25, 5, 14, 5, NULL, '2020-01-03 17:44:28', '2020-01-03 17:44:28'),
(26, 5, 17, 14, NULL, '2020-01-03 17:44:28', '2020-01-03 17:44:28'),
(27, 5, 22, 23, NULL, '2020-01-03 17:44:28', '2020-01-03 17:44:28'),
(28, 5, 26, 29, NULL, '2020-01-03 17:44:28', '2020-01-03 17:44:28'),
(29, 6, 6, 12, NULL, '2020-01-03 17:47:56', '2020-01-03 17:47:56'),
(30, 6, 8, 18, NULL, '2020-01-03 17:47:56', '2020-01-03 17:47:56'),
(31, 6, 7, 21, NULL, '2020-01-03 17:47:57', '2020-01-03 17:47:57'),
(32, 6, 4, 3, NULL, '2020-01-03 17:47:57', '2020-01-03 17:47:57'),
(33, 6, 14, 14, NULL, '2020-01-03 17:47:57', '2020-01-03 17:47:57'),
(34, 6, 29, 25, NULL, '2020-01-03 17:47:57', '2020-01-03 17:47:57'),
(35, 6, 16, 7, NULL, '2020-01-03 17:47:57', '2020-01-03 17:47:57'),
(36, 6, 20, 30, NULL, '2020-01-03 17:47:57', '2020-01-03 17:47:57'),
(37, 7, 6, 10, NULL, '2020-01-03 17:53:56', '2020-01-03 17:53:56'),
(38, 7, 15, 3, NULL, '2020-01-03 17:53:56', '2020-01-03 17:53:56'),
(39, 7, 13, 19, NULL, '2020-01-03 17:53:56', '2020-01-03 17:53:56'),
(40, 7, 2, 6, NULL, '2020-01-03 17:53:56', '2020-01-03 17:53:56'),
(41, 7, 4, 4, NULL, '2020-01-03 17:53:56', '2020-01-03 17:53:56'),
(42, 7, 1, 2, NULL, '2020-01-03 17:53:56', '2020-01-03 17:53:56'),
(43, 7, 14, 12, NULL, '2020-01-03 17:53:56', '2020-01-03 17:53:56'),
(44, 7, 9, 22, NULL, '2020-01-03 17:53:56', '2020-01-03 17:53:56'),
(45, 8, 3, 16, NULL, '2020-01-03 17:57:18', '2020-01-03 22:03:25'),
(46, 8, 5, 15, NULL, '2020-01-03 17:57:18', '2020-01-03 22:05:44'),
(47, 8, 25, 27, NULL, '2020-01-03 17:57:18', '2020-01-03 22:05:38'),
(48, 8, 28, 30, NULL, '2020-01-03 17:57:18', '2020-01-03 22:05:32'),
(49, 8, 27, 25, NULL, '2020-01-03 17:57:18', '2020-01-03 22:03:49'),
(50, 8, 16, 8, NULL, '2020-01-03 17:57:18', '2020-01-03 22:03:44'),
(51, 8, 8, 7, NULL, '2020-01-03 17:57:18', '2020-01-03 22:03:37'),
(52, 8, 11, 3, NULL, '2020-01-03 17:57:18', '2020-01-03 22:03:31'),
(53, 9, 1, 1, NULL, '2020-01-03 22:03:04', '2020-01-03 22:03:04'),
(54, 9, 6, 9, NULL, '2020-01-03 22:03:05', '2020-01-03 22:03:05'),
(55, 9, 17, 20, NULL, '2020-01-03 22:03:05', '2020-01-03 22:03:05'),
(56, 9, 16, 26, NULL, '2020-01-03 22:03:05', '2020-01-03 22:03:05'),
(57, 9, 29, 29, NULL, '2020-01-03 22:03:05', '2020-01-03 22:03:05'),
(58, 9, 20, 19, NULL, '2020-01-03 22:03:05', '2020-01-03 22:03:05'),
(59, 9, 2, 2, NULL, '2020-01-03 22:03:05', '2020-01-03 22:03:05'),
(60, 9, 4, 3, NULL, '2020-01-03 22:03:05', '2020-01-03 22:03:05'),
(61, 10, 14, 2, NULL, '2020-01-03 22:14:03', '2020-01-03 22:14:03'),
(62, 10, 10, 4, NULL, '2020-01-03 22:14:03', '2020-01-03 22:14:03'),
(63, 10, 16, 5, NULL, '2020-01-03 22:14:03', '2020-01-03 22:14:03'),
(64, 10, 3, 19, NULL, '2020-01-03 22:14:03', '2020-01-03 22:14:03'),
(65, 10, 30, 27, NULL, '2020-01-03 22:14:03', '2020-01-03 22:14:03'),
(66, 10, 19, 26, NULL, '2020-01-03 22:14:03', '2020-01-03 22:14:03'),
(67, 10, 8, 29, NULL, '2020-01-03 22:14:03', '2020-01-03 22:14:03'),
(68, 10, 22, 30, NULL, '2020-01-03 22:14:03', '2020-01-03 22:14:03'),
(69, 11, 11, 13, NULL, '2020-01-03 22:17:17', '2020-01-03 22:17:17'),
(70, 11, 15, 29, NULL, '2020-01-03 22:17:17', '2020-01-03 22:17:17'),
(71, 11, 12, 15, NULL, '2020-01-03 22:17:17', '2020-01-03 22:17:17'),
(72, 11, 21, 28, NULL, '2020-01-03 22:17:17', '2020-01-03 22:17:17'),
(73, 11, 23, 30, NULL, '2020-01-03 22:17:17', '2020-01-03 22:17:17'),
(74, 11, 8, 2, NULL, '2020-01-03 22:17:17', '2020-01-03 22:17:17'),
(75, 11, 3, 3, NULL, '2020-01-03 22:17:17', '2020-01-03 22:17:17'),
(76, 11, 6, 6, NULL, '2020-01-03 22:17:17', '2020-01-03 22:17:17'),
(77, 12, 7, 11, NULL, '2020-01-03 22:21:21', '2020-01-03 22:21:21'),
(78, 12, 13, 18, NULL, '2020-01-03 22:21:21', '2020-01-03 22:21:21'),
(79, 12, 12, 2, NULL, '2020-01-03 22:21:21', '2020-01-03 22:21:21'),
(80, 12, 28, 12, NULL, '2020-01-03 22:21:21', '2020-01-03 22:21:21'),
(81, 12, 30, 4, NULL, '2020-01-03 22:21:21', '2020-01-03 22:21:21'),
(82, 12, 27, 7, NULL, '2020-01-03 22:21:22', '2020-01-03 22:21:22'),
(83, 12, 2, 1, NULL, '2020-01-03 22:21:22', '2020-01-03 22:21:22'),
(84, 12, 14, 19, NULL, '2020-01-03 22:21:22', '2020-01-03 22:21:22'),
(85, 13, 18, 15, NULL, '2020-01-03 22:24:49', '2020-01-03 22:24:49'),
(86, 13, 19, 16, NULL, '2020-01-03 22:24:49', '2020-01-03 22:24:49'),
(87, 13, 15, 21, NULL, '2020-01-03 22:24:49', '2020-01-03 22:24:49'),
(88, 13, 2, 27, NULL, '2020-01-03 22:24:49', '2020-01-03 22:24:49'),
(89, 13, 14, 28, NULL, '2020-01-03 22:24:49', '2020-01-03 22:24:49'),
(90, 13, 21, 11, NULL, '2020-01-03 22:24:49', '2020-01-03 22:24:49'),
(91, 13, 1, 30, NULL, '2020-01-03 22:24:49', '2020-01-03 22:24:49'),
(92, 13, 3, 3, NULL, '2020-01-03 22:24:49', '2020-01-03 22:24:49'),
(93, 14, 7, 5, NULL, '2020-01-03 22:31:39', '2020-01-03 22:31:39'),
(94, 14, 13, 7, NULL, '2020-01-03 22:31:39', '2020-01-03 22:31:39'),
(95, 14, 26, 21, NULL, '2020-01-03 22:31:39', '2020-01-03 22:31:39'),
(96, 14, 28, 26, NULL, '2020-01-03 22:31:39', '2020-01-03 22:31:39'),
(97, 14, 30, 9, NULL, '2020-01-03 22:31:39', '2020-01-03 22:31:39'),
(98, 14, 3, 18, NULL, '2020-01-03 22:31:39', '2020-01-03 22:31:39'),
(99, 14, 2, 15, NULL, '2020-01-03 22:31:39', '2020-01-03 22:31:39'),
(100, 14, 18, 28, NULL, '2020-01-03 22:31:39', '2020-01-03 22:31:39'),
(101, 15, 6, 9, NULL, '2020-01-03 22:53:39', '2020-01-03 22:53:39'),
(102, 15, 2, 5, NULL, '2020-01-03 22:53:39', '2020-01-03 22:53:39'),
(103, 15, 4, 14, NULL, '2020-01-03 22:53:39', '2020-01-03 22:53:39'),
(104, 15, 8, 27, NULL, '2020-01-03 22:53:39', '2020-01-03 22:53:39'),
(105, 15, 19, 28, NULL, '2020-01-03 22:53:39', '2020-01-03 22:53:39'),
(106, 15, 10, 30, NULL, '2020-01-03 22:53:39', '2020-01-03 22:53:39'),
(107, 15, 30, 8, NULL, '2020-01-03 22:53:39', '2020-01-03 22:53:39'),
(108, 15, 7, 7, NULL, '2020-01-03 22:53:39', '2020-01-03 22:53:39'),
(109, 16, 9, 3, NULL, '2020-01-03 22:57:23', '2020-01-03 22:57:23'),
(110, 16, 1, 2, NULL, '2020-01-03 22:57:23', '2020-01-03 22:57:23'),
(111, 16, 5, 24, NULL, '2020-01-03 22:57:23', '2020-01-03 22:57:23'),
(112, 16, 24, 23, NULL, '2020-01-03 22:57:24', '2020-01-03 22:57:24'),
(113, 16, 26, 14, NULL, '2020-01-03 22:57:24', '2020-01-03 22:57:24'),
(114, 16, 29, 29, NULL, '2020-01-03 22:57:24', '2020-01-03 22:57:24'),
(115, 16, 25, 26, NULL, '2020-01-03 22:57:24', '2020-01-03 22:57:24'),
(116, 16, 20, 30, NULL, '2020-01-03 22:57:24', '2020-01-03 22:57:24'),
(117, 17, 6, 5, NULL, '2020-01-03 23:02:08', '2020-01-03 23:02:08'),
(118, 17, 3, 26, NULL, '2020-01-03 23:02:08', '2020-01-03 23:02:08'),
(119, 17, 27, 30, NULL, '2020-01-03 23:02:08', '2020-01-03 23:02:08'),
(120, 17, 1, 1, NULL, '2020-01-03 23:02:08', '2020-01-03 23:02:08'),
(121, 17, 12, 14, NULL, '2020-01-03 23:02:08', '2020-01-03 23:02:08'),
(122, 17, 16, 23, NULL, '2020-01-03 23:02:08', '2020-01-03 23:02:08'),
(123, 17, 28, 13, NULL, '2020-01-03 23:02:08', '2020-01-03 23:02:08'),
(124, 17, 30, 27, NULL, '2020-01-03 23:02:08', '2020-01-03 23:02:08'),
(141, 20, 6, 2, NULL, '2020-01-03 23:11:02', '2020-01-03 23:11:02'),
(142, 20, 10, 21, NULL, '2020-01-03 23:11:02', '2020-01-03 23:11:02'),
(143, 20, 2, 23, NULL, '2020-01-03 23:11:02', '2020-01-03 23:11:02'),
(144, 20, 8, 26, NULL, '2020-01-03 23:11:02', '2020-01-03 23:11:02'),
(145, 20, 11, 28, NULL, '2020-01-03 23:11:02', '2020-01-03 23:11:02'),
(146, 20, 26, 9, NULL, '2020-01-03 23:11:02', '2020-01-03 23:11:02'),
(147, 20, 19, 19, NULL, '2020-01-03 23:11:02', '2020-01-03 23:11:02'),
(148, 20, 22, 22, NULL, '2020-01-03 23:11:03', '2020-01-03 23:11:03'),
(149, 19, 4, 11, NULL, '2020-01-03 23:13:55', '2020-01-03 23:13:55'),
(150, 19, 3, 27, NULL, '2020-01-03 23:13:55', '2020-01-03 23:13:55'),
(151, 19, 1, 25, NULL, '2020-01-03 23:13:55', '2020-01-03 23:13:55'),
(152, 19, 13, 7, NULL, '2020-01-03 23:13:55', '2020-01-03 23:13:55'),
(153, 19, 5, 16, NULL, '2020-01-03 23:13:55', '2020-01-03 23:13:55'),
(154, 19, 6, 29, NULL, '2020-01-03 23:13:55', '2020-01-03 23:13:55'),
(155, 19, 25, 4, NULL, '2020-01-03 23:13:55', '2020-01-03 23:13:55'),
(156, 19, 27, 13, NULL, '2020-01-03 23:13:55', '2020-01-03 23:13:55'),
(157, 18, 2, 9, NULL, '2020-01-03 23:16:09', '2020-01-03 23:16:09'),
(158, 18, 6, 16, NULL, '2020-01-03 23:16:09', '2020-01-03 23:16:09'),
(159, 18, 1, 1, NULL, '2020-01-03 23:16:10', '2020-01-03 23:16:10'),
(160, 18, 3, 3, NULL, '2020-01-03 23:16:10', '2020-01-03 23:16:10'),
(161, 18, 8, 12, NULL, '2020-01-03 23:16:10', '2020-01-03 23:16:10'),
(162, 18, 11, 10, NULL, '2020-01-03 23:16:10', '2020-01-03 23:16:10'),
(163, 18, 9, 20, NULL, '2020-01-03 23:16:10', '2020-01-03 23:16:10'),
(164, 18, 24, 30, NULL, '2020-01-03 23:16:10', '2020-01-03 23:16:10'),
(165, 21, 2, 3, NULL, '2020-01-03 23:25:52', '2020-01-03 23:25:52'),
(166, 21, 11, 9, NULL, '2020-01-03 23:25:52', '2020-01-03 23:25:52'),
(167, 21, 12, 16, NULL, '2020-01-03 23:25:52', '2020-01-03 23:25:52'),
(168, 21, 22, 20, NULL, '2020-01-03 23:25:52', '2020-01-03 23:25:52'),
(169, 21, 15, 14, NULL, '2020-01-03 23:25:52', '2020-01-03 23:25:52'),
(170, 21, 6, 27, NULL, '2020-01-03 23:25:52', '2020-01-03 23:25:52'),
(171, 21, 29, 28, NULL, '2020-01-03 23:25:52', '2020-01-03 23:25:52'),
(172, 21, 30, 30, NULL, '2020-01-03 23:25:52', '2020-01-03 23:25:52'),
(181, 22, 7, 3, NULL, '2020-01-03 23:29:31', '2020-01-03 23:29:31'),
(182, 22, 3, 8, NULL, '2020-01-03 23:29:31', '2020-01-03 23:29:31'),
(183, 22, 11, 15, NULL, '2020-01-03 23:29:31', '2020-01-03 23:29:31'),
(184, 22, 8, 12, NULL, '2020-01-03 23:29:31', '2020-01-03 23:29:31'),
(185, 22, 15, 23, NULL, '2020-01-03 23:29:31', '2020-01-03 23:29:31'),
(186, 22, 18, 19, NULL, '2020-01-03 23:29:32', '2020-01-03 23:29:32'),
(187, 22, 21, 11, NULL, '2020-01-03 23:29:32', '2020-01-03 23:29:32'),
(188, 22, 25, 18, NULL, '2020-01-03 23:29:32', '2020-01-03 23:29:32'),
(189, 23, 3, 2, NULL, '2020-01-03 23:31:58', '2020-01-03 23:31:58'),
(190, 23, 14, 17, NULL, '2020-01-03 23:31:58', '2020-01-03 23:31:58'),
(191, 23, 9, 16, NULL, '2020-01-03 23:31:58', '2020-01-03 23:31:58'),
(192, 23, 19, 25, NULL, '2020-01-03 23:31:58', '2020-01-03 23:31:58'),
(193, 23, 27, 30, NULL, '2020-01-03 23:31:58', '2020-01-03 23:31:58'),
(194, 23, 20, 29, NULL, '2020-01-03 23:31:58', '2020-01-03 23:31:58'),
(195, 23, 8, 11, NULL, '2020-01-03 23:31:58', '2020-01-03 23:31:58'),
(196, 23, 17, 21, NULL, '2020-01-03 23:31:58', '2020-01-03 23:31:58'),
(197, 24, 15, 10, NULL, '2020-01-03 23:35:29', '2020-01-03 23:35:29'),
(198, 24, 4, 4, NULL, '2020-01-03 23:35:29', '2020-01-03 23:35:29'),
(199, 24, 2, 26, NULL, '2020-01-03 23:35:29', '2020-01-03 23:35:29'),
(200, 24, 1, 24, NULL, '2020-01-03 23:35:29', '2020-01-03 23:35:29'),
(201, 24, 8, 30, NULL, '2020-01-03 23:35:29', '2020-01-03 23:35:29'),
(202, 24, 21, 25, NULL, '2020-01-03 23:35:29', '2020-01-03 23:35:29'),
(203, 24, 30, 21, NULL, '2020-01-03 23:35:29', '2020-01-03 23:35:29'),
(204, 24, 20, 27, NULL, '2020-01-03 23:35:29', '2020-01-03 23:35:29'),
(205, 25, 1, 1, NULL, '2020-01-03 23:37:29', '2020-01-03 23:37:29'),
(206, 25, 2, 13, NULL, '2020-01-03 23:37:29', '2020-01-03 23:37:29'),
(207, 25, 6, 7, NULL, '2020-01-03 23:37:29', '2020-01-03 23:37:29'),
(208, 25, 8, 20, NULL, '2020-01-03 23:37:29', '2020-01-03 23:37:29'),
(209, 25, 12, 27, NULL, '2020-01-03 23:37:29', '2020-01-03 23:37:29'),
(210, 25, 24, 19, NULL, '2020-01-03 23:37:29', '2020-01-03 23:37:29'),
(211, 25, 14, 30, NULL, '2020-01-03 23:37:29', '2020-01-03 23:37:29'),
(212, 25, 28, 29, NULL, '2020-01-03 23:37:29', '2020-01-03 23:37:29'),
(213, 26, 7, 4, NULL, '2020-01-03 23:39:42', '2020-01-03 23:39:42'),
(214, 26, 1, 8, NULL, '2020-01-03 23:39:42', '2020-01-03 23:39:42'),
(215, 26, 2, 12, NULL, '2020-01-03 23:39:42', '2020-01-03 23:39:42'),
(216, 26, 23, 25, NULL, '2020-01-03 23:39:42', '2020-01-03 23:39:42'),
(217, 26, 26, 29, NULL, '2020-01-03 23:39:42', '2020-01-03 23:39:42'),
(218, 26, 18, 11, NULL, '2020-01-03 23:39:42', '2020-01-03 23:39:42'),
(219, 26, 10, 5, NULL, '2020-01-03 23:39:42', '2020-01-03 23:39:42'),
(220, 26, 6, 30, NULL, '2020-01-03 23:39:42', '2020-01-03 23:39:42'),
(221, 27, 14, 13, NULL, '2020-01-04 10:51:53', '2020-01-04 10:51:53'),
(222, 27, 5, 26, NULL, '2020-01-04 10:51:53', '2020-01-04 10:51:53'),
(223, 27, 2, 21, NULL, '2020-01-04 10:51:53', '2020-01-04 10:51:53'),
(224, 27, 18, 15, NULL, '2020-01-04 10:51:53', '2020-01-04 10:51:53'),
(225, 27, 27, 30, NULL, '2020-01-04 10:51:53', '2020-01-04 10:51:53'),
(226, 28, 3, 11, NULL, '2020-01-04 10:55:18', '2020-01-04 10:55:18'),
(227, 28, 2, 23, NULL, '2020-01-04 10:55:18', '2020-01-04 10:55:18'),
(228, 28, 28, 30, NULL, '2020-01-04 10:55:18', '2020-01-04 10:55:18'),
(229, 28, 29, 25, NULL, '2020-01-04 10:55:18', '2020-01-04 10:55:18'),
(230, 28, 13, 26, NULL, '2020-01-04 10:55:18', '2020-01-04 10:55:18'),
(231, 29, 1, 10, NULL, '2020-01-04 10:57:06', '2020-01-04 10:57:06'),
(232, 29, 5, 13, NULL, '2020-01-04 10:57:06', '2020-01-04 10:57:06'),
(233, 29, 3, 2, NULL, '2020-01-04 10:57:07', '2020-01-04 10:57:07'),
(234, 29, 15, 18, NULL, '2020-01-04 10:57:07', '2020-01-04 10:57:07'),
(235, 29, 8, 29, NULL, '2020-01-04 10:57:07', '2020-01-04 10:57:07'),
(236, 30, 1, 4, NULL, '2020-01-04 11:00:52', '2020-01-04 11:00:52'),
(237, 30, 19, 25, NULL, '2020-01-04 11:00:52', '2020-01-04 11:00:52'),
(238, 30, 18, 2, NULL, '2020-01-04 11:00:52', '2020-01-04 11:00:52'),
(239, 30, 3, 5, NULL, '2020-01-04 11:00:52', '2020-01-04 11:00:52'),
(240, 30, 11, 17, NULL, '2020-01-04 11:00:52', '2020-01-04 11:00:52'),
(241, 31, 1, 4, NULL, '2020-01-04 11:00:53', '2020-01-04 11:00:53'),
(242, 31, 19, 25, NULL, '2020-01-04 11:00:53', '2020-01-04 11:00:53'),
(243, 31, 18, 2, NULL, '2020-01-04 11:00:53', '2020-01-04 11:00:53'),
(244, 31, 3, 5, NULL, '2020-01-04 11:00:53', '2020-01-04 11:00:53'),
(245, 31, 11, 17, NULL, '2020-01-04 11:00:53', '2020-01-04 11:00:53'),
(246, 32, 9, 23, NULL, '2020-01-04 11:05:59', '2020-01-04 11:05:59'),
(247, 32, 28, 13, NULL, '2020-01-04 11:05:59', '2020-01-04 11:05:59'),
(248, 32, 15, 26, NULL, '2020-01-04 11:05:59', '2020-01-04 11:05:59'),
(249, 32, 5, 24, NULL, '2020-01-04 11:05:59', '2020-01-04 11:05:59'),
(250, 32, 19, 3, NULL, '2020-01-04 11:05:59', '2020-01-04 11:05:59'),
(251, 33, 5, 2, NULL, '2020-01-04 11:07:41', '2020-01-04 11:07:41'),
(252, 33, 9, 13, NULL, '2020-01-04 11:07:41', '2020-01-04 11:07:41'),
(253, 33, 11, 16, NULL, '2020-01-04 11:07:41', '2020-01-04 11:07:41'),
(254, 33, 12, 26, NULL, '2020-01-04 11:07:41', '2020-01-04 11:07:41'),
(255, 33, 26, 27, NULL, '2020-01-04 11:07:41', '2020-01-04 11:07:41'),
(256, 34, 13, 9, NULL, '2020-01-04 11:09:52', '2020-01-04 11:09:52'),
(257, 34, 8, 7, NULL, '2020-01-04 11:09:52', '2020-01-04 11:09:52'),
(258, 34, 14, 15, NULL, '2020-01-04 11:09:52', '2020-01-04 11:09:52'),
(259, 34, 2, 18, NULL, '2020-01-04 11:09:52', '2020-01-04 11:09:52'),
(260, 34, 26, 28, NULL, '2020-01-04 11:09:52', '2020-01-04 11:09:52');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tournaments`
--

CREATE TABLE `tournaments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tournaments`
--

INSERT INTO `tournaments` (`id`, `name`, `date`, `description`, `location`, `file_path`, `created_at`, `updated_at`) VALUES
(1, 'Madeirense', '2019-12-26 14:00:00', 'This tournament is a competition involving professional competitors, all participating in a horse racing game.', 'Funchal, Portugal', '/img/tournament_photo/1-Madeirense-funchal.jpg', '2020-01-03 09:50:11', '2020-01-03 09:50:11'),
(2, 'Horse Championship', '2020-02-01 08:00:00', 'This is the Principal tournament of Horse Races in América.\r\nWe can see all winners of horse racing in this tournament.', 'Texas, Estados Unidos', '/img/tournament_photo/2-Horse Championship-Tournament2.jpg', '2020-01-03 17:29:10', '2020-01-03 17:29:10'),
(3, 'TourA', '2020-02-03 17:00:00', 'This is tournament of France', 'França', '/img/tournament_photo/3-TourA-TourA_1.jpg', '2020-01-03 21:56:28', '2020-01-03 21:56:28'),
(4, 'Torneo A', '2020-02-11 17:30:00', 'This is the tournament of champions of racing horses in Spain.', 'Espanha', '/img/tournament_photo/4-Torneo A-Torneo A.jpg', '2020-01-03 22:40:57', '2020-01-03 22:40:57'),
(5, 'Turnier A', '2020-02-20 13:30:00', 'This is the tournament of champions of racing horses in Germany.', 'Alemanha', '/img/tournament_photo/5-Turnier A-Tornier A.png', '2020-01-03 23:20:20', '2020-01-03 23:20:20'),
(6, 'TournamentA', '2020-02-12 13:30:00', 'This is the tournament of champions of racing horses in England.', 'England, Reino Unido', '/img/tournament_photo/6-TournamentA-Tournament_A.jpg', '2020-01-04 10:43:51', '2020-01-04 10:43:51'),
(7, 'ChinaA', '2020-03-05 20:00:00', 'This is the tournament of champions of racing horses in China.', 'China', '/img/tournament_photo/7-ChinaA-ChinaA.jpg', '2020-01-04 12:53:10', '2020-01-04 12:53:10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` int(11) NOT NULL,
  `balance` double(8,2) NOT NULL,
  `iban` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `birth_date`, `gender`, `phone_number`, `balance`, `iban`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'André', 'admin', 'andre_t3lo@hotmail.com', NULL, '$2y$10$GrltwjvRei2Buj/UPM2Q0epEyzOntZ.5YsRFpY92LUab8fllCNtrO', '1998-06-15', 'male', 123456789, 2.00, 123456789, NULL, '2020-01-03 09:43:13', '2020-01-03 09:43:13'),
(2, 'At', 'user', 'andre-t3lo@hotmail.com', NULL, '$2y$10$34TUgDFicvJhcJ3SCtGuSu4HWfLIGMhWRisgqR8kc151n/qGPq9RO', '1998-06-03', 'male', 112233456, 15.52, 153578964, NULL, '2020-01-03 21:25:16', '2020-01-03 21:46:38'),
(3, 'João', 'user', 'joao_@exemplo.com', NULL, '$2y$10$wy3hqbH6..zvq7umRyy4QelWTW9FfU25SDmPbGnuH7rdOn8FdI25.', '1990-02-15', 'male', 123123123, 8.00, 123123123, NULL, '2020-01-04 11:36:04', '2020-01-04 11:57:59'),
(4, 'Manuel', 'user', 'manuel@exemplo.com', NULL, '$2y$10$.Xpi9BOBLJHGD6LO34WTbeqvDiVbWSm8MzOvVOZEojX4x3bdHNDle', '1990-12-05', 'male', 123412345, 1.00, 123412345, NULL, '2020-01-04 12:03:02', '2020-01-04 12:05:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bets`
--
ALTER TABLE `bets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bets_user_id_foreign` (`user_id`),
  ADD KEY `bets_race_id_foreign` (`race_id`),
  ADD KEY `bets_tournament_id_foreign` (`tournament_id`),
  ADD KEY `bets_horse_id_foreign` (`horse_id`),
  ADD KEY `bets_jockey_id_foreign` (`jockey_id`);

--
-- Indexes for table `horses`
--
ALTER TABLE `horses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jockeys`
--
ALTER TABLE `jockeys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `races`
--
ALTER TABLE `races`
  ADD PRIMARY KEY (`id`),
  ADD KEY `races_tournament_id_foreign` (`tournament_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `results_race_id_foreign` (`race_id`),
  ADD KEY `results_horse_id_foreign` (`horse_id`),
  ADD KEY `results_jockey_id_foreign` (`jockey_id`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
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
-- AUTO_INCREMENT for table `bets`
--
ALTER TABLE `bets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `horses`
--
ALTER TABLE `horses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `jockeys`
--
ALTER TABLE `jockeys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `races`
--
ALTER TABLE `races`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `bets`
--
ALTER TABLE `bets`
  ADD CONSTRAINT `bets_horse_id_foreign` FOREIGN KEY (`horse_id`) REFERENCES `horses` (`id`),
  ADD CONSTRAINT `bets_jockey_id_foreign` FOREIGN KEY (`jockey_id`) REFERENCES `jockeys` (`id`),
  ADD CONSTRAINT `bets_race_id_foreign` FOREIGN KEY (`race_id`) REFERENCES `races` (`id`),
  ADD CONSTRAINT `bets_tournament_id_foreign` FOREIGN KEY (`tournament_id`) REFERENCES `tournaments` (`id`),
  ADD CONSTRAINT `bets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `races`
--
ALTER TABLE `races`
  ADD CONSTRAINT `races_tournament_id_foreign` FOREIGN KEY (`tournament_id`) REFERENCES `tournaments` (`id`);

--
-- Limitadores para a tabela `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_horse_id_foreign` FOREIGN KEY (`horse_id`) REFERENCES `horses` (`id`),
  ADD CONSTRAINT `results_jockey_id_foreign` FOREIGN KEY (`jockey_id`) REFERENCES `jockeys` (`id`),
  ADD CONSTRAINT `results_race_id_foreign` FOREIGN KEY (`race_id`) REFERENCES `races` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
