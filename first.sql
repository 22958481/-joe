-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生日期: 2020 年 05 月 12 日 05:22
-- 伺服器版本: 5.5.27
-- PHP 版本: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `im3`
--

-- --------------------------------------------------------

--
-- 表的結構 `first`
--

CREATE TABLE IF NOT EXISTS `first` (
  `公司名稱` char(8) COLLATE utf8_unicode_ci NOT NULL,
  `負責人` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `公司成立日期` date NOT NULL,
  `行業` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `資產` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `業務品項` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `地址` char(40) COLLATE utf8_unicode_ci NOT NULL,
  `信箱` char(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
