-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2017 at 08:33 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `urls`
--

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hash` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `url`, `hash`, `user_id`) VALUES
(1, 'https://codexample.org/questions/8620', '4cbMqq', 1),
(3, 'https://stackoverflow.com/questions/43651446/general-error-1364-field-user-id-doesnt-have-a-default-value', 'TcH3PB', 2),
(4, 'https://www.google.com.ph', 'dfUapc', 1),
(5, 'https://laravel.com/docs/5.4/queries#deletes', 'vLPKys', 2),
(8, 'https://laravel.com/docs/5.4/queries#deletes', 'QXtx61', 1),
(9, 'https://scotch.io/tutorials/simple-laravel-crud-with-resource-controllers', 'mw305Z', 1),
(10, 'https://laravel.io/', '0gRyR2', 1);

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
(3, '2017_08_24_010744_create_links_table', 1),
(4, '2017_08_25_150140_add_user_links_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'alex', 'a@gmail.com', '$2y$10$I9s75LyFmocOdimFAsjkUOvJAX7Z12VbER8H2rSY8Kl4OdCKpaBhu', 'Pxspix57gI0xciqYD9iZIR7OPZyd6AhuMMyDAqpfTVvzki6JW4YTf6SH06hs', '2017-08-27 21:09:35', '2017-08-27 21:09:35'),
(2, 'xavier', 'b@gmail.com', '$2y$10$QCvhzfUm0csLJJTDUblbaeFg5wWJ0tTv906yH.8Ch.IkHCacEQb3O', '1A2XB8g0Ek8yFKOnFQkhRbjUIVqj3o2bV2E0dWoTQpOiElYlqdQT0R5itwyK', '2017-08-27 22:14:18', '2017-08-27 22:14:18'),
(4, 'q', 'q@gmail.com', '$2y$10$oo9TdVJl1cfvyYUVEpiuJOuVdjFGYTHw4rRaj8PH9yegTfgQi75xO', 'ycKq0mPGaT9ixNzMvFD9nsxwULjIHZpCgC03mnvMrtxhNklOz6K4wGgjtT3H', '2017-08-28 02:13:31', '2017-08-28 02:13:31'),
(5, 'c', 'c@gmail.com', '$2y$10$3Azu4qnl436jB9iU4KAILenLtPuBiioyAAfVHQpIi3HA.fEl3hh0S', 'HfC2h7Dbf68Ru0xQDBtHJjbFYpH3Jp6AR9lgu1Xq3HzdVxFVLbLQQXq1gw8b', '2017-08-28 02:14:39', '2017-08-28 02:14:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
