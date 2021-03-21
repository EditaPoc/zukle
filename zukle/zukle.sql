-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2021 m. Kov 21 d. 19:19
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zukle`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `failed_jobs`
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
-- Sukurta duomenų struktūra lentelei `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `live` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experiency` tinyint(4) NOT NULL,
  `registered` tinyint(4) NOT NULL,
  `reservoir_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `members`
--

INSERT INTO `members` (`id`, `name`, `surname`, `live`, `experiency`, `registered`, `reservoir_id`, `created_at`, `updated_at`) VALUES
(13, 'Rokas', 'Rokaitis', 'Klaipėda', 2, 1, 17, '2021-03-16 10:47:30', '2021-03-16 10:47:30'),
(17, 'Tomas', 'Tomauskas', 'Klaipėda', 2, 1, 2, '2021-03-21 16:16:32', '2021-03-21 16:16:32'),
(18, 'Tomas', 'Špokauskas', 'Klaipėda', 7, 1, 2, '2021-03-21 16:18:27', '2021-03-21 16:18:27');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_10_105753_create_reservoirs_table', 2),
(5, '2021_03_10_105814_create_members_table', 2),
(6, '2021_03_17_164040_add_user_type', 3);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `reservoirs`
--

CREATE TABLE `reservoirs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` char(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` decimal(11,3) NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `reservoirs`
--

INSERT INTO `reservoirs` (`id`, `title`, `area`, `about`, `created_at`, `updated_at`) VALUES
(2, 'Minija', '2942.000', 'Minija, graži upė, verta ten pažvejoti.', NULL, NULL),
(17, 'Upė', '1245.000', 'sdgfasrgarga', '2021-03-16 10:46:12', '2021-03-16 10:46:12');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `users`
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
  `type` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `type`) VALUES
(1, 'Edita', 'editapociene@gmail.com', NULL, '$2y$10$jTYuDeg0TWQNr7Zw/p/oae4iwj.j3OEICL4NEgzeva2qIsMPitawW', NULL, '2021-03-10 09:28:23', '2021-03-10 09:28:23', 1),
(2, 'Janina', 'janina@degutyte.com', NULL, '$2y$10$mxCM0r5I5jITRhijVNGlN.F82AcqcJ3aMv4ujgAa39dQoCFKyNEom', NULL, '2021-03-17 15:47:48', '2021-03-17 15:47:48', 0);

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
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_reservoir_id_foreign` (`reservoir_id`);

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
-- Indexes for table `reservoirs`
--
ALTER TABLE `reservoirs`
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
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reservoirs`
--
ALTER TABLE `reservoirs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Apribojimai eksportuotom lentelėm
--

--
-- Apribojimai lentelei `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_reservoir_id_foreign` FOREIGN KEY (`reservoir_id`) REFERENCES `reservoirs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
