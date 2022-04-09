-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 07, 2022 at 04:41 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bidoofgoo.nl`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_08_30_084343_create_projectcategories_table', 1),
(4, '2018_08_30_085119_create_projects_table', 1),
(5, '2018_08_30_090315_create_procatlink_table', 1),
(6, '2018_09_03_155546_create_projectpages_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `procatlink`
--

CREATE TABLE `procatlink` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `procatlink`
--

INSERT INTO `procatlink` (`id`, `project_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 8, NULL, NULL),
(2, 1, 11, NULL, NULL),
(3, 2, 4, NULL, NULL),
(4, 2, 7, NULL, NULL),
(5, 3, 5, NULL, NULL),
(6, 3, 6, NULL, NULL),
(7, 3, 10, NULL, NULL),
(8, 4, 5, NULL, NULL),
(9, 4, 6, NULL, NULL),
(10, 5, 9, NULL, NULL),
(11, 5, 11, NULL, NULL),
(12, 5, 13, NULL, NULL),
(13, 6, 1, NULL, NULL),
(14, 6, 7, NULL, NULL),
(15, 7, 4, NULL, NULL),
(16, 7, 7, NULL, NULL),
(17, 8, 1, NULL, NULL),
(18, 9, 9, NULL, NULL),
(19, 9, 11, NULL, NULL),
(20, 9, 13, NULL, NULL),
(21, 10, 9, NULL, NULL),
(22, 10, 8, NULL, NULL),
(23, 10, 10, NULL, NULL),
(24, 11, 1, NULL, NULL),
(25, 11, 2, NULL, NULL),
(26, 11, 3, NULL, NULL),
(27, 11, 11, NULL, NULL),
(28, 11, 12, NULL, NULL),
(29, 12, 9, NULL, NULL),
(30, 12, 10, NULL, NULL),
(31, 12, 11, NULL, NULL),
(32, 12, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projectcategories`
--

CREATE TABLE `projectcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projectcategories`
--

INSERT INTO `projectcategories` (`id`, `name`, `color`, `created_at`, `updated_at`) VALUES
(1, 'WebVR', '#328AEF', NULL, NULL),
(2, 'Oculus Rift', '#404040', NULL, NULL),
(3, 'Gear Vr', '#505040', NULL, NULL),
(4, 'Art', 'green', NULL, NULL),
(5, 'Video', 'red', NULL, NULL),
(6, 'Animation', '#D82998', NULL, NULL),
(7, 'Spooky', '#68319B', NULL, NULL),
(8, 'Game', '#AD60FF', NULL, NULL),
(9, 'Website', '#E2B64D', NULL, NULL),
(10, 'Misc', 'grey', NULL, NULL),
(11, 'Dutch only', '#FF6A00', NULL, NULL),
(12, 'School', '#0D1D5B', NULL, NULL),
(13, 'Jobs', '#fe98a3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projectpages`
--

CREATE TABLE `projectpages` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clicks` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `url`, `image`, `clicks`, `created_at`, `updated_at`) VALUES
(1, 'Kat & Cavia RPG', '/katcavia', 'katcavia.png', 0, NULL, NULL),
(2, 'Skeleton cave', 'https://bidoofgoo.deviantart.com/art/The-Cave-626435086', 'skelcav.png', 0, NULL, NULL),
(3, 'Why we hate you', '/hate', 'hate.png', 0, NULL, NULL),
(4, 'Eddsworld: Just a bit crazy REMASTERED', 'https://www.youtube.com/watch?v=WnX8mijcaZc', 'edd.png', 0, NULL, NULL),
(5, 'Ont-wikkeling.net', 'www.ont-wikkeling.net', 'ontwikkeling.png', 0, NULL, NULL),
(6, 'Enter psychedelic skeleton VR', 'http://bidoofgoo.nl/oud/', 'skele.png', 1, NULL, '2018-10-23 17:55:45'),
(7, 'One demented <s>hecking</s> boi', 'https://bidoofgoo.deviantart.com/art/Scary-Guy-714356686', 'fuk.png', 0, NULL, NULL),
(8, 'Enter cool computer space', 'https://hot-server.glitch.me/eventList/spindex.html', 'space.png', 0, NULL, NULL),
(9, 'Mijnomi.nl', 'https://www.mijnomi.nl', 'omi.png', 0, NULL, NULL),
(10, 'Wonder mail S generator', 'http://wondermails.bidoofgoo.nl/', 'pkmn.png', 0, NULL, NULL),
(11, 'Soup VR', 'http://soep.bidoofgoo.nl', 'soup.png', 0, NULL, NULL),
(12, 'Project swim safe', 'https://veiligzwemmen.bidoofgoo.nl/', 'zwem.png', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rick', 'Rick@email.com', '$2y$10$9wjOjRlcMIFlZsnCzQa3JuGh4rccirc2NBjyxlSJ4TD1xpLUsloz6', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `procatlink`
--
ALTER TABLE `procatlink`
  ADD PRIMARY KEY (`id`),
  ADD KEY `procatlink_project_id_foreign` (`project_id`),
  ADD KEY `procatlink_category_id_foreign` (`category_id`);

--
-- Indexes for table `projectcategories`
--
ALTER TABLE `projectcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projectpages`
--
ALTER TABLE `projectpages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projectpages_slug_unique` (`slug`),
  ADD KEY `projectpages_project_id_foreign` (`project_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `procatlink`
--
ALTER TABLE `procatlink`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `projectcategories`
--
ALTER TABLE `projectcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `projectpages`
--
ALTER TABLE `projectpages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `procatlink`
--
ALTER TABLE `procatlink`
  ADD CONSTRAINT `procatlink_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `projectcategories` (`id`),
  ADD CONSTRAINT `procatlink_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `projectpages`
--
ALTER TABLE `projectpages`
  ADD CONSTRAINT `projectpages_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
