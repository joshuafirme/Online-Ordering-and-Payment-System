-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2021 at 08:38 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ordering-and-payment`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_22_103716_create_tblmenu', 1),
(5, '2021_01_22_103740_create_tblgallery', 1),
(6, '2021_01_27_134915_create_tblcategory', 2),
(7, '2021_01_28_041918_create_tblcashiering', 3),
(8, '2021_01_28_075238_create_tblgross_sale', 4),
(9, '2021_02_01_004807_create_tbluser', 5),
(10, '2021_02_01_100441_create_tblgallery', 6),
(11, '2021_02_01_113911_create_tblcustomer', 7),
(12, '2021_02_05_064556_create_tblaudit_trail', 8),
(13, '2021_02_10_043718_create_tblcomment_and_suggestion', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblaudit_trail`
--

CREATE TABLE `tblaudit_trail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblaudit_trail`
--

INSERT INTO `tblaudit_trail` (`id`, `username`, `module`, `action`, `created_at`, `updated_at`) VALUES
(4, 'johndoe', 'Maintenance', 'Delete Category', '2021-02-05 02:02:07', NULL),
(5, 'johndoe', 'Maintenance', 'Update Menu', '2021-02-09 21:02:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcashiering`
--

CREATE TABLE `tblcashiering` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `category`, `created_at`, `updated_at`) VALUES
(2, 'Noodles', '2021-01-27 06:13:24', '2021-01-27 18:58:39'),
(3, 'Pork', '2021-01-27 06:13:28', '2021-01-27 06:13:28'),
(4, 'Sea Foods', '2021-02-01 03:00:38', '2021-02-01 03:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `tblcomment_and_suggestion`
--

CREATE TABLE `tblcomment_and_suggestion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suggestion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblcomment_and_suggestion`
--

INSERT INTO `tblcomment_and_suggestion` (`id`, `fullname`, `comment`, `suggestion`, `created_at`, `updated_at`) VALUES
(2, 'Joshua Firme', 'test comment', 'test suggestion', '2021-02-09 20:02:18', '2021-02-09 20:02:18'),
(3, 'Joshua Firme', 'sdasd', 'asdasd', '2021-02-09 20:02:38', '2021-02-09 20:02:38'),
(4, 'Joshua Firme', 'sdasd', 'asdasd', '2021-02-09 20:02:42', '2021-02-09 20:02:42'),
(5, 'Joshua Firme', 'sdasd', 'asdasd', '2021-02-09 20:02:01', '2021-02-09 20:02:01'),
(6, 'Joshua Firme', 'dasdadsa', 'asdasd', '2021-02-09 20:02:09', '2021-02-09 20:02:09'),
(7, 'Joshua Firme', 'sdsf', 'sdfsd', '2021-02-09 22:02:56', '2021-02-09 22:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE `tblcustomer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblcustomer`
--

INSERT INTO `tblcustomer` (`id`, `fullname`, `phone_no`, `email`, `password`, `created_at`, `updated_at`) VALUES
(3, 'Joshua Firme', NULL, 'joshuafirme1@gmail.com', NULL, '2021-02-03 16:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblgallery`
--

CREATE TABLE `tblgallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblgallery`
--

INSERT INTO `tblgallery` (`id`, `image`, `created_at`, `updated_at`) VALUES
(2, 'gallery/djwPe9G3xLoVxEd7ObdyxSxNNpmeznW4Yv0o7MP3.jpg', NULL, NULL),
(3, 'gallery/hP1FOp45XwPTaxHQDKxSrVV0HmzUq0OVASXezg7n.jpg', NULL, NULL),
(4, 'gallery/reSLQsz7qaSF3AyYxYMK7lRUVZxzHgXsezi6E92O.jpg', NULL, NULL),
(5, 'gallery/gLHUfMt7M0FaRzEcMCRV1d98eSYBlFgISzaF5ltG.jpg', NULL, NULL),
(6, 'gallery/1NwxKejRMSoapNagF8BjcIRkNIamgXKwYCNPRmax.jpg', NULL, NULL),
(7, 'gallery/qIWTJ2iIsN5br9ZXRgRr01Tt6O1A5GeTgzQ2sNGQ.jpg', NULL, NULL),
(8, 'gallery/BS8npQqNbIscsd2fNiWS7moO83svWmY6EQgtxKDq.jpg', NULL, NULL),
(9, 'gallery/HNgznRAe0BtZ77EUfKy0ixcKGfSLxLJpFQAUD3uP.jpg', NULL, NULL),
(10, 'gallery/JiYFI5haA43ickrt0vFhCEwLkcmbaybZRYDy03wN.jpg', NULL, NULL),
(11, 'gallery/gdFsvZBrgLsmTl29Lmpzgt7c8u04gfCHcUeFckYo.jpg', NULL, NULL),
(12, 'gallery/yy2lPYchNrGdfYg550lybc9h9iY6bFHg33Z2Y90m.jpg', NULL, NULL),
(13, 'gallery/a3563SDnmD8rivuet4XxpXqCbxhIUIn7uH9FGwRG.jpg', NULL, NULL),
(14, 'gallery/AZXK2myKhGsxqxnVurFMTUkH68uh7JRcskYOK4Nx.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblgross_sale`
--

CREATE TABLE `tblgross_sale` (
  `id` bigint(8) UNSIGNED ZEROFILL NOT NULL,
  `menu_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `order_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblgross_sale`
--

INSERT INTO `tblgross_sale` (`id`, `menu_id`, `qty`, `amount`, `order_type`, `created_at`, `updated_at`) VALUES
(10000003, 18, 1, '95.00', 'Walk in', '2021-01-28 00:01:49', NULL),
(10000005, 11, 1, '495.00', 'Walk in', '2021-02-01 03:02:09', NULL),
(10000006, 14, 1, '299.00', 'Walk in', '2021-02-01 03:02:09', NULL),
(10000007, 19, 3, '240.00', 'Walk in', '2021-02-03 19:02:52', NULL),
(10000008, 15, 3, '675.00', 'Walk in', '2021-02-03 19:02:52', NULL),
(10000009, 13, 3, '750.00', 'Walk in', '2021-02-03 19:02:52', NULL),
(10000010, 11, 4, '1980.00', 'Walk in', '2021-02-03 20:02:46', NULL),
(10000011, 14, 2, '598.00', 'Walk in', '2021-02-04 19:02:40', NULL),
(10000012, 11, 3, '1485.00', 'Walk in', '2021-02-09 22:02:02', NULL),
(10000013, 12, 2, '190.00', 'Walk in', '2021-02-09 22:02:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblmenu`
--

CREATE TABLE `tblmenu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(3) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `preparation_time` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblmenu`
--

INSERT INTO `tblmenu` (`id`, `category_id`, `description`, `price`, `preparation_time`, `image`, `status`, `created_at`, `updated_at`) VALUES
(11, 3, 'Crispy Pata', '495.00', '30mins', 'uploads/dqpYctUnGXpTjczQqz6p9hMMThUptuPYDKKLeDqU.jpg', 'Available', '2021-01-23 05:29:49', '2021-02-01 03:00:52'),
(12, 2, 'Pancit Canton', '95.00', '8mins', 'uploads/yqZV1VuQc1XRxVqng2oepjM6vHP0pO6r31b3S4us.jpg', 'Available', '2021-01-23 05:29:54', '2021-02-09 21:44:09'),
(13, 4, 'Fish Fillet', '250.00', '20mins', 'uploads/jAvKFFgtxhH0BbqyBrLq2NsD1AbFYfS77M3vdjND.jpg', 'Available', '2021-01-27 23:39:55', '2021-02-01 03:00:58'),
(14, 4, 'Sizzling Seafood', '299.00', '15mins', 'uploads/U4Qw2TqQA03DkSOBSlN5bXfr3PLklDKPukqVKpRz.jpg', 'Available', '2021-01-27 23:41:05', '2021-02-01 03:01:21'),
(15, 3, 'Grilled Liempo', '225.00', '15mins', 'uploads/qysnUC3TwhRV5A913Cz4mqht9nDnUw0hrQ3OhAPD.jpg', 'Available', '2021-01-27 23:42:20', '2021-01-27 23:42:21'),
(16, 3, 'Sizzling Pork Sisig', '195.00', '18mins', 'uploads/p17T6rtErx1r2vjMkWnpIKa3rFMxXqqQ5ZPs4BrC.jpg', 'Available', '2021-01-27 23:43:42', '2021-02-01 03:01:09'),
(17, 3, 'Bicol Express', '195.00', '22mins', 'uploads/KmSoOgUxaHWyMshRLtieXJhvMhcfu5QhxBdEwpz3.jpg', 'Available', '2021-01-27 23:44:53', '2021-01-27 23:44:53'),
(18, 2, 'Pancit Bihon', '95.00', '10mins', NULL, 'Available', '2021-01-27 23:45:32', '2021-01-27 23:45:32'),
(19, 2, 'Lomi Special', '80.00', '12mins', NULL, 'Available', '2021-01-27 23:46:07', '2021-01-27 23:46:07'),
(20, 2, 'Lomi Regular', '50.00', '12mins', NULL, 'Available', '2021-01-27 23:46:28', '2021-01-27 23:46:28'),
(21, 2, 'Chami', '85.00', '15mins', NULL, 'Available', '2021-01-27 23:47:01', '2021-01-27 23:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` bigint(5) UNSIGNED ZEROFILL NOT NULL,
  `_prefix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `_prefix`, `fullname`, `username`, `password`, `contact_no`, `role`, `created_at`, `updated_at`) VALUES
(00001, 'E202101', 'John Doe', 'johndoe', '123', '09827878277', 'Admin', '2021-01-31 16:58:04', '2021-02-04 06:15:27'),
(00002, 'E202101', 'Jane Doe', 'janedoe', '123', '09278782748', 'Cashier', '2021-01-31 17:59:00', '2021-01-31 17:59:00'),
(00012, 'E202104', 'Juan Dela Cruz', 'juan', '123', '09483787487', 'Receptionist', '2021-02-04 06:29:49', '2021-02-04 06:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tblaudit_trail`
--
ALTER TABLE `tblaudit_trail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcashiering`
--
ALTER TABLE `tblcashiering`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomment_and_suggestion`
--
ALTER TABLE `tblcomment_and_suggestion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblgallery`
--
ALTER TABLE `tblgallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblgross_sale`
--
ALTER TABLE `tblgross_sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmenu`
--
ALTER TABLE `tblmenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblaudit_trail`
--
ALTER TABLE `tblaudit_trail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblcashiering`
--
ALTER TABLE `tblcashiering`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblcomment_and_suggestion`
--
ALTER TABLE `tblcomment_and_suggestion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblgallery`
--
ALTER TABLE `tblgallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblgross_sale`
--
ALTER TABLE `tblgross_sale`
  MODIFY `id` bigint(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000014;

--
-- AUTO_INCREMENT for table `tblmenu`
--
ALTER TABLE `tblmenu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` bigint(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
