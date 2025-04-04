-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 04, 2025 lúc 09:16 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `lab_6`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('BoQtCxA1Qv38x8tKO2xO0cbnw1xI1crgs9qbADIB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib1dWS2ZWS0JrUUY3TXBUcUJ2N2lMVjVaMEs4WkxtR3FZaXlvYVBHMiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kbCI7fX0=', 1743749020);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `diachi` varchar(100) DEFAULT NULL,
  `idgroup` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `diachi`, `idgroup`) VALUES
(1, 'Gonzalo Adams', 'wcarter@example.com', '2025-04-03 21:48:54', '$2y$12$jzZ7xaAONJ3K5q1669a/1O99vLQ4g7Z/NU/oM33U9JEc9PtwApzTi', '3tposow2Yh', '2025-04-03 21:48:54', '2025-04-03 21:48:54', NULL, '0'),
(2, 'Alex Conroy', 'morgan.sanford@example.net', '2025-04-03 21:48:54', '$2y$12$jzZ7xaAONJ3K5q1669a/1O99vLQ4g7Z/NU/oM33U9JEc9PtwApzTi', 'fQscHXxZ24', '2025-04-03 21:48:54', '2025-04-03 21:48:54', NULL, '0'),
(3, 'Jefferey Walter Sr.', 'west.hellen@example.org', '2025-04-03 21:48:54', '$2y$12$jzZ7xaAONJ3K5q1669a/1O99vLQ4g7Z/NU/oM33U9JEc9PtwApzTi', 'Bnw5vQgoWv', '2025-04-03 21:48:54', '2025-04-03 21:48:54', NULL, '0'),
(4, 'Oren Flatley', 'wklocko@example.com', '2025-04-03 21:48:54', '$2y$12$jzZ7xaAONJ3K5q1669a/1O99vLQ4g7Z/NU/oM33U9JEc9PtwApzTi', 'bpLDqwNPFz', '2025-04-03 21:48:54', '2025-04-03 21:48:54', NULL, '0'),
(5, 'Sim Champlin', 'krystal.robel@example.net', '2025-04-03 21:48:54', '$2y$12$jzZ7xaAONJ3K5q1669a/1O99vLQ4g7Z/NU/oM33U9JEc9PtwApzTi', 'bLp9UVT6i9', '2025-04-03 21:48:54', '2025-04-03 21:48:54', NULL, '0'),
(6, 'Deanna Ratke', 'lelah54@example.org', '2025-04-03 21:48:54', '$2y$12$jzZ7xaAONJ3K5q1669a/1O99vLQ4g7Z/NU/oM33U9JEc9PtwApzTi', 'ZJCEHxh8qO', '2025-04-03 21:48:54', '2025-04-03 21:48:54', NULL, '0'),
(7, 'Eladio Gerhold', 'bspinka@example.com', '2025-04-03 21:48:54', '$2y$12$jzZ7xaAONJ3K5q1669a/1O99vLQ4g7Z/NU/oM33U9JEc9PtwApzTi', 'lFOOiHuwzQ', '2025-04-03 21:48:54', '2025-04-03 21:48:54', NULL, '0'),
(8, 'Marianna Hettinger', 'ylang@example.com', '2025-04-03 21:48:54', '$2y$12$jzZ7xaAONJ3K5q1669a/1O99vLQ4g7Z/NU/oM33U9JEc9PtwApzTi', 'j5ubd9zblj', '2025-04-03 21:48:54', '2025-04-03 21:48:54', NULL, '0'),
(9, 'Camryn Murphy V', 'stephon11@example.org', '2025-04-03 21:48:54', '$2y$12$jzZ7xaAONJ3K5q1669a/1O99vLQ4g7Z/NU/oM33U9JEc9PtwApzTi', 'YFm5BKfdr8', '2025-04-03 21:48:54', '2025-04-03 21:48:54', NULL, '0'),
(10, 'Raul Bosco', 'prudence.gottlieb@example.net', '2025-04-03 21:48:54', '$2y$12$jzZ7xaAONJ3K5q1669a/1O99vLQ4g7Z/NU/oM33U9JEc9PtwApzTi', '3dgYP41Icg', '2025-04-03 21:48:54', '2025-04-03 21:48:54', NULL, '0'),
(11, 'Ken Ankunding', 'fae.cummings@example.com', '2025-04-03 21:49:25', '$2y$12$coLqAlC0MLdEjmpvhdu4p.RtsVDiNjh4Zm9GMdBO5eOEpsKthzuhC', '7TiUXEzac3', '2025-04-03 21:49:25', '2025-04-03 21:49:25', NULL, '0'),
(12, 'Prof. Keara Sipes', 'aliya.orn@example.org', '2025-04-03 21:49:25', '$2y$12$coLqAlC0MLdEjmpvhdu4p.RtsVDiNjh4Zm9GMdBO5eOEpsKthzuhC', 'DQHfqj3NMP', '2025-04-03 21:49:25', '2025-04-03 21:49:25', NULL, '0'),
(13, 'Jolie Terry', 'mueller.percival@example.com', '2025-04-03 21:49:25', '$2y$12$coLqAlC0MLdEjmpvhdu4p.RtsVDiNjh4Zm9GMdBO5eOEpsKthzuhC', 'W0FHjH0MLb', '2025-04-03 21:49:25', '2025-04-03 21:49:25', NULL, '0'),
(14, 'Prof. Viola Yundt PhD', 'homenick.owen@example.com', '2025-04-03 21:49:25', '$2y$12$coLqAlC0MLdEjmpvhdu4p.RtsVDiNjh4Zm9GMdBO5eOEpsKthzuhC', 'iVcGG3C3L2', '2025-04-03 21:49:25', '2025-04-03 21:49:25', NULL, '0'),
(15, 'Boris Block II', 'rsawayn@example.net', '2025-04-03 21:49:25', '$2y$12$coLqAlC0MLdEjmpvhdu4p.RtsVDiNjh4Zm9GMdBO5eOEpsKthzuhC', 'wN4pu4uBBE', '2025-04-03 21:49:25', '2025-04-03 21:49:25', NULL, '0'),
(16, 'Jabari Gleason', 'volkman.raina@example.com', '2025-04-03 21:49:25', '$2y$12$coLqAlC0MLdEjmpvhdu4p.RtsVDiNjh4Zm9GMdBO5eOEpsKthzuhC', 'LhHIyW7LBj', '2025-04-03 21:49:25', '2025-04-03 21:49:25', NULL, '0'),
(17, 'Mr. Orlo Rippin', 'abdullah81@example.com', '2025-04-03 21:49:25', '$2y$12$coLqAlC0MLdEjmpvhdu4p.RtsVDiNjh4Zm9GMdBO5eOEpsKthzuhC', '5iciXpJIBq', '2025-04-03 21:49:25', '2025-04-03 21:49:25', NULL, '0'),
(18, 'Lola Von', 'jerde.calista@example.org', '2025-04-03 21:49:25', '$2y$12$coLqAlC0MLdEjmpvhdu4p.RtsVDiNjh4Zm9GMdBO5eOEpsKthzuhC', 'XVzUmJa3zc', '2025-04-03 21:49:25', '2025-04-03 21:49:25', NULL, '0'),
(19, 'Dr. Kallie Kautzer', 'schoen.mylene@example.com', '2025-04-03 21:49:25', '$2y$12$coLqAlC0MLdEjmpvhdu4p.RtsVDiNjh4Zm9GMdBO5eOEpsKthzuhC', 'EuPwFoB5G6', '2025-04-03 21:49:25', '2025-04-03 21:49:25', NULL, '0'),
(20, 'Kamille Grady', 'berge.janice@example.com', '2025-04-03 21:49:25', '$2y$12$coLqAlC0MLdEjmpvhdu4p.RtsVDiNjh4Zm9GMdBO5eOEpsKthzuhC', 'QSmPPPjvAP', '2025-04-03 21:49:25', '2025-04-03 21:49:25', NULL, '0'),
(21, 'Vui Từng Phút Giây', 'vuiqua@gmail.com', NULL, '$2y$12$sQWUH8jMkH.UmsMb4HBcUuZ40Eq.Yxph19Hzcnmkw6.BiCSfdXy86', NULL, NULL, NULL, 'TPHCM', '1'),
(22, 'Buồn Từng Phút Giây', 'buonqua@gmail.com', NULL, '$2y$12$SeBdTSoBNYOUt1Yk8QJiouMZgqELv2yq2zFp8CloOMXpqtj/rMym2', NULL, NULL, NULL, 'TPHCM', '1'),
(23, 'Nguyen Thi Gia Hu', 'giahu@gmail.com', NULL, '$2y$12$N/Act1SyJESkW.0ODhJXqOXiFmQM6jslizi0gOSNkdvAFjoUrI.5e', NULL, NULL, NULL, 'HN', '0'),
(24, 'Tùng Dương', 'duongdtpa00194@gmail.com', NULL, '$2y$12$/GHG5D.UjQoR12E0XTfh4epR5EBBSYrGFJt69DhZXb2K/AMtSNhF.', NULL, '2025-04-03 21:56:52', '2025-04-03 21:56:52', NULL, '1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
