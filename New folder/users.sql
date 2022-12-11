-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 06:52 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apii`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `user_type` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `dob`, `name`, `gender`, `address`, `password`, `email`, `contact`, `email_verified_at`, `user_type`, `remember_token`, `created_at`, `updated_at`, `course_id`, `status`) VALUES
(9, '2023-01-05', 'Ayush kumar', 'M', 'panchayat bhawan line basti', '123456789', 'ayush9334kumar@gmail.com', '9334308921', NULL, 'admin', NULL, '2022-12-04 08:42:40', '2022-12-04 08:42:40', 1, 1),
(15, '01\\11\\2001', 'Smriti', 'F', 'purnea', '$2y$10$L7AoZasQitInTVM4JjtbYO2ZoI.Q/lWooMHtQB5TeKR.3R0XEYf7a', 'smriti@gmail.com', '9117685337', NULL, 'user', NULL, '2022-12-01 13:17:48', '2022-12-10 23:07:14', 2, 1),
(16, '24/08/2003', 'Anish', 'Female', 'AWS', '1234567899', 'anish@gmail.com', '9632587410', NULL, 'user', NULL, '2022-12-10 23:13:02', '2022-12-11 00:14:05', 4, 1),
(17, '2001-11-01', 'Ayush kumar', 'M', 'panchayat bhawan line basti', '$2y$10$k2kVubtGMIUYxuuijF3BUeTWqGjEH0e1qVWcnFUvQ5h29vVkBjgGW', 'aush9334kumar@gmail.com', '9632587410', NULL, 'user', NULL, '2022-12-11 08:43:31', '2022-12-11 08:43:31', NULL, 0),
(21, '01\\11\\2001', 'admin', 'F', 'purnea', '$2y$10$5H0wXoR.eEtCUWw/56Nx5.dbbSQP.bS9aF5htVW2CKCqcj0bBz/yG', 'admin@gmail.com', '9874563210', NULL, 'user', NULL, '2022-12-11 09:59:58', '2022-12-11 12:03:20', NULL, 2);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
