-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 28, 2024 at 06:07 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_car_rent`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int NOT NULL,
  `car_type` varchar(210) COLLATE utf8mb4_unicode_ci NOT NULL,
  `daily_rent_price` decimal(8,2) NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `image` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `brand`, `model`, `year`, `car_type`, `daily_rent_price`, `availability`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Ocean Morrow', 'MEDX', 'MX-D3', 2020, 'sedan', 3200.00, 1, 'uploads/2024/September/18/1axSHVeni9cvpARc4OJv8tag5J4EBC1ZZ4BA9LQ5.png', '2024-09-18 00:43:55', '2024-09-24 04:36:22'),
(2, 'ZEEP ARC', 'Toyota', 'TX-XA', 2018, 'limousine', 2200.00, 1, 'uploads/2024/September/18/h4K7ORqKAMKltdod8yDd9J6ASQpUufdGR70m1I9X.jpg', '2024-09-18 01:01:24', '2024-09-27 16:11:45'),
(3, 'Mercedes Bench', 'Mercedes', 'MR-B33', 2020, 'suv', 5000.00, 1, 'uploads/2024/September/18/U68jxq7QFjUqlaQxuUpYc48oSSdbGLShsSNc8bcv.jpg', '2024-09-18 08:50:34', '2024-09-26 15:27:16'),
(4, 'Hyundai Primo X', 'Hyundai', 'Primo X', 2018, 'sedan', 3500.00, 1, 'uploads/2024/September/18/UTmfrXR27uFGWXPrHmF2vw3KQacbNGfMludlh09l.jpg', '2024-09-18 08:53:46', '2024-09-27 16:11:49'),
(6, 'Taxis 059X', 'suzuki', 'SZ-059x', 1983, 'sedan', 1500.00, 1, 'uploads/2024/September/25/cFBaFauZQYKTNc27Mm0JzwiBdiKYyCrhK2oWeDKY.jpg', '2024-09-24 22:16:54', '2024-09-24 22:16:54');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rental_history` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`id`, `name`, `email`, `phone`, `address`, `rental_history`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Amanda Lancaster', 'tanuzavi@mailinator.com', '+1 (513) 687-3666', 'Dolor quaerat porro', NULL, 6, '2024-09-20 05:49:12', '2024-09-20 05:53:08'),
(7, 'Clark Watts', 'pavuriny@mailinator.com', '+1 (697) 441-6458', 'Aliquip lorem unde a', NULL, 12, '2024-09-25 22:03:53', '2024-09-25 22:03:53'),
(8, 'Fulton Lowery', 'covov@mailinator.com', '+1 (995) 125-5025', 'Ullam qui officia qu', NULL, 13, '2024-09-25 22:04:24', '2024-09-25 22:04:24'),
(9, 'Jakeem Ferguson', 'wicos@mailinator.com', '+1 (559) 168-4351', 'Voluptatem Vero omn', NULL, 14, '2024-09-25 22:04:48', '2024-09-25 22:04:48'),
(10, 'Jesse Roberts', 'sotuhow@mailinator.com', '+1 (532) 921-8609', 'Saepe aspernatur asp', NULL, 15, '2024-09-25 22:06:00', '2024-09-25 22:06:00'),
(11, 'Abdur Rahim Rony', 'abdursoft@gmail.com', '01892311511', 'Mithapukur, Rangpur, Bangladesh', NULL, 16, '2024-09-26 14:29:30', '2024-09-26 14:29:30');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_15_174224_create_cars_table', 1),
(5, '2024_09_15_174239_create_rentals_table', 1),
(8, '2024_09_15_181150_create_customer_details_table', 2);

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
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `days` int DEFAULT '0',
  `total_cost` decimal(8,2) NOT NULL,
  `status` enum('Ongoing','Completed','Canceled','Booked') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Booked',
  `user_id` bigint UNSIGNED NOT NULL,
  `car_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('BgSVQXOORBDlEOq9t1n2iybEPOcslzcFldmmAdCz', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:130.0) Gecko/20100101 Firefox/130.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMGJPb0tabEZaUG1UamF0RU5TWDRRZFJBWU8wZ2pOcmJnS29hcnVkNSI7czo1OiJlcnJvciI7czoyMjoiVW5hdXRoZW50aWNhdGVkIGFjY2VzcyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjE6e2k6MDtzOjU6ImVycm9yIjt9fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vZGFzaGJvYXJkIjt9fQ==', 1727447435),
('ezyeH3eVolIJ52MMq0DfH7fLDN4g74vtYcO1GGAl', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:130.0) Gecko/20100101 Firefox/130.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaUJHVklNZXhUOERHZ0Z5VmVTb2ltdmQ2UjF4b3RVNTRCcjBMNm1ISCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1727474405),
('flcYq4xLMOe6syksZot8E9r83mxHMTiNhr9KqQR5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:130.0) Gecko/20100101 Firefox/130.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMGc3NG0zT1JFSVg5YktHRUtjT2MzWmV1QkxVQXpZTlRzTzJ1TmRSSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL2dldC1yZW50cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1727450777),
('yymdm9YYNbbg2IL2TAMvgTKTzegX7YdjSKforYU7', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:130.0) Gecko/20100101 Firefox/130.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYnF5eG1wVGszWlVuV1ZERzI4OVExTVV6MHUyTFE5Y09ZZ3V6bk5hbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL2dldC1yZW50cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1727474442);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','customer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$12$AuRSwFs6pE4w1b0/fuJjiu8rdgTG3sIwTU.DUnyQFfwQ7bFRxePLm', 'admin', '2024-09-15 23:22:45', '2024-09-15 23:22:45'),
(2, 'Ivana Barr', 'rizyha@mailinator.com', '$2y$10$W.RMITdPLJLu/NpZO0q7PO6LHD0pRxVLoK2qq7FEVOJ9.DPR2MXrC', 'customer', '2024-09-16 00:41:31', '2024-09-16 00:41:31'),
(3, 'Shad Armstrong', 'tewiguho@mailinator.com', '$2y$10$aW5xsL9kDAb38MLWKbeNSeUgu8P18J0fE/8KFbJzwObBoUFX20FJa', 'customer', '2024-09-16 00:43:21', '2024-09-16 00:43:21'),
(4, 'Mason Cotton', 'xycexibos@mailinator.com', '$2y$10$Ejmh84Vlk7pgIlvrUtCZ1enlCapZfNx8JUhT.Hg5f2qEmS7B9G3XW', 'customer', '2024-09-16 00:44:47', '2024-09-16 00:44:47'),
(5, 'Kennan Brown', 'napurum@mailinator.com', '$2y$10$9TO8wKftihdV7591poiP.OyPCGQRiIRxkUQEQyxzwJaDWXDqt0JjG', 'customer', '2024-09-16 00:46:14', '2024-09-16 00:46:14'),
(6, 'Hedda West', 'zeco@mailinator.com', '$2y$10$fJ4CObvMu/GgEB.O0hFFHuPvqhT4rGoDwfwT1D4hYMO1NpusHvqKW', 'customer', '2024-09-16 00:46:22', '2024-09-16 00:46:22'),
(12, 'Clark Watts', 'pavuriny@mailinator.com', '$2y$12$b/Fih3fEBtH0kvvTyPy/OuuzkpwdoUH3nieYTH27Cmy2elaN7qNeu', 'customer', '2024-09-25 22:03:53', '2024-09-25 22:03:53'),
(13, 'Fulton Lowery', 'covov@mailinator.com', '$2y$12$J5YOtbFBTQRnLR1Kdxg4EuR2Hfkw7xjBURn3zcnEsFLf9sXTmbIhm', 'customer', '2024-09-25 22:04:24', '2024-09-25 22:04:24'),
(14, 'Jakeem Ferguson', 'wicos@mailinator.com', '$2y$12$.nDZyF96NJPaZPecoHp4pucSfVziBgZthvrRGte7s0/vxJMrhyMry', 'customer', '2024-09-25 22:04:48', '2024-09-25 22:04:48'),
(15, 'Jesse Roberts', 'sotuhow@mailinator.com', '$2y$12$s2wtkiNds1juwr2048ZDxeULdQkJkzryVPS3q.KcgTG9S8uUt0PKu', 'customer', '2024-09-25 22:06:00', '2024-09-25 22:06:00'),
(16, 'Abdur Rahim', 'abdursoft@gmail.com', '$2y$10$/iWBg5CNYrQTxC5PFjBD/eoDx36Hzt/Wdo.yr/ujOxQvJYvMXlhLm', 'customer', '2024-09-26 14:28:26', '2024-09-26 14:28:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_details_email_unique` (`email`),
  ADD KEY `customer_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rentals_user_id_foreign` (`user_id`),
  ADD KEY `rentals_car_id_foreign` (`car_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD CONSTRAINT `customer_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `rentals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
