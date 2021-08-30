-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2021-02-20 09:28:25
-- 服务器版本： 10.4.17-MariaDB
-- PHP 版本： 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `secure_development`
--
CREATE DATABASE IF NOT EXISTS `secure_development` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_nopad_ci;
USE `secure_development`;

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE `news` (
  `id` int(1) NOT NULL,
  `username` mediumtext COLLATE utf8mb4_general_nopad_ci NOT NULL,
  `password` mediumtext COLLATE utf8mb4_general_nopad_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_nopad_ci;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`id`, `username`, `password`) VALUES
(1, 'admin', '0f359740bd1cda994f8b55330c86d845'),
(2, 'guest', '084e0343a0486ff05530df6c705c8bb4');

-- --------------------------------------------------------

--
-- 表的结构 `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `username` mediumtext COLLATE utf8mb4_general_nopad_ci NOT NULL,
  `password` mediumtext COLLATE utf8mb4_general_nopad_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_nopad_ci;

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` mediumtext COLLATE utf8mb4_general_nopad_ci NOT NULL,
  `password` mediumtext COLLATE utf8mb4_general_nopad_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_nopad_ci;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Admin1', 'p@ssw0rd'),
(2, 'guest', 'guest');

-- --------------------------------------------------------

--
-- 表的结构 `xssblind`
--

CREATE TABLE `xssblind` (
  `id` int(11) UNSIGNED NOT NULL,
  `time` datetime NOT NULL,
  `content` mediumtext COLLATE utf8mb4_general_nopad_ci NOT NULL,
  `name` mediumtext COLLATE utf8mb4_general_nopad_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_nopad_ci;

--
-- 转储表的索引
--

--
-- 表的索引 `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- 表的索引 `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `xssblind`
--
ALTER TABLE `xssblind`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
