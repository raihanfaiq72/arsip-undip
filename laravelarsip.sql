-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 02:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelarsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id` int(100) NOT NULL,
  `id_users` int(100) NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `status_sekre` int(10) NOT NULL,
  `status_ketua` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id`, `id_users`, `lampiran`, `jenis`, `status_sekre`, `status_ketua`, `created_at`, `updated_at`) VALUES
(1, 4, '9bf316ce-88da-4fa6-8112-37b08f4abb2e-1701420533.pdf', 'surat pengunduran diri', 0, 3, '2023-12-01 01:48:53', '2023-12-01 01:48:53');

-- --------------------------------------------------------

--
-- Table structure for table `template_surat`
--

CREATE TABLE `template_surat` (
  `id` int(10) NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `template_surat`
--

INSERT INTO `template_surat` (`id`, `lampiran`, `keterangan`, `created_at`, `updated_at`) VALUES
(8, '33db7c28-fb6e-4f97-ad2d-95b8d1e44113-1701417500.pdf', 'surat jalan-jalan', '2023-12-01 00:58:20', '2023-12-01 00:58:20'),
(9, 'f8d73c27-dad6-4c6a-8b7b-ba2b563cbc72-1701587723.docx', 'contoh word', '2023-12-03 00:15:23', '2023-12-03 00:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `katasandi` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `role` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `katasandi`, `nama_lengkap`, `role`, `created_at`, `updated_at`) VALUES
(1, 'undipjayaketua', '$2y$10$s9alBEA5X.vPROquD9A.u.6xhfDSh.kc1vnI9.bpE1FLLAtH6lsR2', 'undipjaya', 'admin well', 1, '2023-11-28 15:24:47', '2023-11-28 15:24:47'),
(2, 'undipjayasekre', '$2y$10$s9alBEA5X.vPROquD9A.u.6xhfDSh.kc1vnI9.bpE1FLLAtH6lsR2', 'undipjaya', 'sekretaris', 2, '2023-11-28 15:26:03', '2023-11-28 15:26:03'),
(3, 'undipjayaanggota', '$2y$10$s9alBEA5X.vPROquD9A.u.6xhfDSh.kc1vnI9.bpE1FLLAtH6lsR2', 'undipjaya', 'anggota', 3, '2023-11-28 15:26:39', '2023-11-28 15:26:39'),
(4, 'raihanfaiq', '$2y$12$SF8klUVKd9bOfrj9KE6SW.b1KnsiS1FU34959K2./oyH01pnJD7ry', 'katasandi', 'faiq raihan', 3, '2023-11-28 20:39:27', '2023-11-28 20:39:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template_surat`
--
ALTER TABLE `template_surat`
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
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `template_surat`
--
ALTER TABLE `template_surat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
