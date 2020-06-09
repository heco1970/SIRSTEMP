-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 09, 2019 at 05:40 PM
-- Server version: 10.1.40-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c3acl`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesses`
--

DROP TABLE IF EXISTS `accesses`;
CREATE TABLE `accesses` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `browser` varchar(50) DEFAULT NULL,
  `browser_version` varchar(10) DEFAULT NULL,
  `os` varchar(20) DEFAULT NULL,
  `os_version` varchar(10) DEFAULT NULL,
  `device` varchar(50) DEFAULT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `acl_phinxlog`
--

DROP TABLE IF EXISTS `acl_phinxlog`;
CREATE TABLE `acl_phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acl_phinxlog`
--

INSERT INTO `acl_phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20141229162641, 'CakePhpDbAcl', '2019-06-06 17:14:45', '2019-06-06 17:14:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

DROP TABLE IF EXISTS `acos`;
CREATE TABLE `acos` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 98),
(2, 1, NULL, NULL, 'Types', 2, 13),
(3, 2, NULL, NULL, 'index', 3, 4),
(4, 2, NULL, NULL, 'view', 5, 6),
(5, 2, NULL, NULL, 'add', 7, 8),
(6, 2, NULL, NULL, 'edit', 9, 10),
(7, 2, NULL, NULL, 'delete', 11, 12),
(8, 1, NULL, NULL, 'Users', 14, 31),
(9, 8, NULL, NULL, 'index', 15, 16),
(10, 8, NULL, NULL, 'view', 17, 18),
(11, 8, NULL, NULL, 'add', 19, 20),
(12, 8, NULL, NULL, 'edit', 21, 22),
(13, 8, NULL, NULL, 'delete', 23, 24),
(14, 8, NULL, NULL, 'login', 25, 26),
(15, 8, NULL, NULL, 'logout', 27, 28),
(16, 1, NULL, NULL, 'Dummy', 32, 37),
(17, 16, NULL, NULL, 'index', 33, 34),
(18, 16, NULL, NULL, 'login', 35, 36),
(19, 1, NULL, NULL, 'AclManager', 38, 55),
(20, 19, NULL, NULL, 'Acl', 39, 54),
(21, 20, NULL, NULL, 'index', 40, 41),
(22, 20, NULL, NULL, 'permissions', 42, 43),
(23, 20, NULL, NULL, 'updateAcos', 44, 45),
(24, 20, NULL, NULL, 'updateAros', 46, 47),
(25, 20, NULL, NULL, 'revokePerms', 48, 49),
(26, 20, NULL, NULL, 'drop', 50, 51),
(27, 20, NULL, NULL, 'defaults', 52, 53),
(28, 1, NULL, NULL, 'DebugKit', 56, 83),
(29, 28, NULL, NULL, 'MailPreview', 57, 64),
(30, 29, NULL, NULL, 'index', 58, 59),
(31, 29, NULL, NULL, 'sent', 60, 61),
(32, 29, NULL, NULL, 'email', 62, 63),
(33, 28, NULL, NULL, 'Toolbar', 65, 68),
(34, 33, NULL, NULL, 'clearCache', 66, 67),
(35, 28, NULL, NULL, 'Requests', 69, 72),
(36, 35, NULL, NULL, 'view', 70, 71),
(37, 28, NULL, NULL, 'Composer', 73, 76),
(38, 37, NULL, NULL, 'checkDependencies', 74, 75),
(39, 28, NULL, NULL, 'Panels', 77, 82),
(40, 39, NULL, NULL, 'index', 78, 79),
(41, 39, NULL, NULL, 'view', 80, 81),
(42, 1, NULL, NULL, 'Accesses', 84, 97),
(43, 42, NULL, NULL, 'index', 85, 86),
(44, 42, NULL, NULL, 'view', 87, 88),
(45, 42, NULL, NULL, 'add', 89, 90),
(46, 42, NULL, NULL, 'edit', 91, 92),
(47, 42, NULL, NULL, 'delete', 93, 94),
(48, 42, NULL, NULL, 'admin', 95, 96),
(49, 8, NULL, NULL, 'profile', 29, 30);

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

DROP TABLE IF EXISTS `aros`;
CREATE TABLE `aros` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Types', 1, 'Administrator', 1, 4),
(2, 1, 'Users', 1, 'administrator', 2, 3),
(3, NULL, 'Types', 2, NULL, 5, 8),
(4, 3, 'Users', 2, 'user', 6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

DROP TABLE IF EXISTS `aros_acos`;
CREATE TABLE `aros_acos` (
  `id` int(11) NOT NULL,
  `aro_id` int(11) NOT NULL,
  `aco_id` int(11) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 2, 1, '1', '1', '1', '1'),
(2, 3, 16, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE `types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Administrator', '2019-06-06 18:28:01', '2019-06-06 18:28:01'),
(2, 'User', '2019-06-17 10:10:19', '2019-06-17 10:10:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type_id`, `username`, `password`, `name`, `email`, `photo`, `created`, `modified`) VALUES
(1, 1, 'administrator', '$2y$10$lk2NUyjB72MCmFNcTyavj.Q5ryGERYmy8stlXL1G9wNauOyDzlrdC', 'System Administrator', 'email@test.com', '', '2019-06-06 19:49:10', '2019-06-06 19:49:10'),
(2, 2, 'user', '$2y$10$2Sg2VTDeIoelnVfR.8Xt8uHTMCGHYWW5z58PPJHeM1IqQ0GgfX1re', 'Normal User', 'normal@test.com', '', '2019-06-17 10:10:30', '2019-06-17 10:10:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesses`
--
ALTER TABLE `accesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acl_phinxlog`
--
ALTER TABLE `acl_phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `acos`
--
ALTER TABLE `acos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lft` (`lft`,`rght`),
  ADD KEY `alias` (`alias`);

--
-- Indexes for table `aros`
--
ALTER TABLE `aros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lft` (`lft`,`rght`),
  ADD KEY `alias` (`alias`);

--
-- Indexes for table `aros_acos`
--
ALTER TABLE `aros_acos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `aro_id` (`aro_id`,`aco_id`),
  ADD KEY `aco_id` (`aco_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
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
-- AUTO_INCREMENT for table `accesses`
--
ALTER TABLE `accesses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `acos`
--
ALTER TABLE `acos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `aros`
--
ALTER TABLE `aros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `aros_acos`
--
ALTER TABLE `aros_acos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
