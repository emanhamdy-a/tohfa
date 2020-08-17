-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2020 at 09:48 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tohfa_db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `aply`
--

CREATE TABLE `aply` (
  `id` int(14) NOT NULL,
  `drsmkr_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `byer_id` int(11) NOT NULL,
  `atlnm` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dtls` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `pric` int(6) NOT NULL,
  `cal` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aply`
--

INSERT INTO `aply` (`id`, `drsmkr_id`, `order_id`, `byer_id`, `atlnm`, `dtls`, `pric`, `cal`) VALUES
(10, 68, 22, 66, 'dddd', 'Ù…Ù†ØªØª Ø§Ù„Ø¨Ø§Ù„Ø¨ Ø¨ÙŠØ¨ÙŠØ³ Ø§Ù„ÙØºÙÙ†Øª ØªØ§Ø©Ù‰Ù„Ø§Ù„Ø§Ø¡ Ø¨ÙÙ‚Ø«ÙŠ Ù‡ Ø®98Ø®Ù‡Ø¹Ù‡Ø¹ ÙƒÙ† Ø§Ù‰Ù†ØªØ§ØªØ§Ù„ØºÙÙ‚ÙØ¨Ù„Ø§ Ø®88Ø®Ù‡  Ø«Øµ5 ÙƒØ­0 Ø¹Ù‚ØµØ« Ø­Ø®ÙƒØ·Ù…Ù†ØªØª Ø§Ù„Ø¨Ø§Ù„Ø¨ Ø¨ÙŠØ¨ÙŠØ³ Ø§Ù„ÙØºÙÙ†Øª ØªØ§Ø©Ù‰Ù„Ø§Ù„Ø§Ø¡ Ø¨ÙÙ‚Ø«ÙŠ Ù‡ Ø®98Ø®Ù‡Ø¹Ù‡Ø¹ ÙƒÙ† Ø§Ù‰Ù†ØªØ§ØªØ§Ù„ØºÙÙ‚ÙØ¨Ù„Ø§ Ø®88Ø®Ù‡  Ø«Øµ5 ÙƒØ­0 Ø¹Ù‚ØµØ« Ø­Ø®ÙƒØ·Ù…Ù†ØªØª Ø§Ù„Ø¨Ø§Ù„Ø¨ Ø¨ÙŠØ¨ÙŠØ³ Ø§Ù„ÙØºÙÙ†Øª ØªØ§Ø©Ù‰Ù„Ø§Ù„Ø§Ø¡ Ø¨ÙÙ‚Ø«ÙŠ Ù‡ Ø®98Ø®Ù‡Ø¹Ù‡Ø¹ ÙƒÙ† Ø§Ù‰Ù†ØªØ§ØªØ§Ù„ØºÙÙ‚ÙØ¨Ù„Ø§ Ø®88Ø®Ù‡  Ø«Øµ5 ÙƒØ­0 Ø¹Ù‚ØµØ« Ø­Ø®ÙƒØ·Ù…Ù†ØªØª Ø§Ù„Ø¨Ø§Ù„Ø¨ Ø¨ÙŠØ¨ÙŠØ³ Ø§Ù„ÙØºÙÙ†Øª ØªØ§Ø©Ù‰Ù„Ø§Ù„Ø§Ø¡ Ø¨ÙÙ‚Ø«ÙŠ Ù‡ Ø®98Ø®Ù‡Ø¹Ù‡Ø¹ ÙƒÙ† Ø§Ù‰Ù†ØªØ§ØªØ§Ù„ØºÙÙ‚ÙØ¨Ù„Ø§ Ø®88Ø®Ù‡  Ø«Øµ5 ÙƒØ­0 Ø¹Ù‚ØµØ« Ø­Ø®ÙƒØ·', 212, '344444444444444432'),
(11, 68, 22, 66, 'ddddoooo', 'Ù…Ù†ØªØª Ø§Ù„Ø¨Ø§Ù„Ø¨ Ø¨ÙŠØ¨ÙŠØ³ Ø§Ù„ÙØºÙÙ†Øª ØªØ§Ø©Ù‰Ù„Ø§Ù„Ø§Ø¡ Ø¨ÙÙ‚Ø«ÙŠ Ù‡ Ø®98Ø®Ù‡Ø¹Ù‡Ø¹ ÙƒÙ† Ø§Ù‰Ù†ØªØ§ØªØ§Ù„ØºÙÙ‚ÙØ¨Ù„Ø§ Ø®88Ø®Ù‡  Ø«Øµ5 ÙƒØ­0 Ø¹Ù‚ØµØ« Ø­Ø®ÙƒØ·Ù…Ù†ØªØª Ø§Ù„Ø¨Ø§Ù„Ø¨ Ø¨ÙŠØ¨ÙŠØ³ Ø§Ù„ÙØºÙÙ†Øª ØªØ§Ø©Ù‰Ù„Ø§Ù„Ø§Ø¡ Ø¨ÙÙ‚Ø«ÙŠ Ù‡ Ø®98Ø®Ù‡Ø¹Ù‡Ø¹ ÙƒÙ† Ø§Ù‰Ù†ØªØ§ØªØ§Ù„ØºÙÙ‚ÙØ¨Ù„Ø§ Ø®88Ø®Ù‡  Ø«Øµ5 ÙƒØ­0 Ø¹Ù‚ØµØ« Ø­Ø®ÙƒØ·Ù…Ù†ØªØª Ø§Ù„Ø¨Ø§Ù„Ø¨ Ø¨ÙŠØ¨ÙŠØ³ Ø§Ù„ÙØºÙÙ†Øª ØªØ§Ø©Ù‰Ù„Ø§Ù„Ø§Ø¡ Ø¨ÙÙ‚Ø«ÙŠ Ù‡ Ø®98Ø®Ù‡Ø¹Ù‡Ø¹ ÙƒÙ† Ø§Ù‰Ù†ØªØ§ØªØ§Ù„ØºÙÙ‚ÙØ¨Ù„Ø§ Ø®88Ø®Ù‡  Ø«Øµ5 ÙƒØ­0 Ø¹Ù‚ØµØ« Ø­Ø®ÙƒØ·Ù…Ù†ØªØª Ø§Ù„Ø¨Ø§Ù„Ø¨ Ø¨ÙŠØ¨ÙŠØ³ Ø§Ù„ÙØºÙÙ†Øª ØªØ§Ø©Ù‰Ù„Ø§Ù„Ø§Ø¡ Ø¨ÙÙ‚Ø«ÙŠ Ù‡ Ø®98Ø®Ù‡Ø¹Ù‡Ø¹ ÙƒÙ† Ø§Ù‰Ù†ØªØ§ØªØ§Ù„ØºÙÙ‚ÙØ¨Ù„Ø§ Ø®88Ø®Ù‡  Ø«Øµ5 ÙƒØ­0 Ø¹Ù‚ØµØ« Ø­Ø®ÙƒØ·v', 32121, '87876756'),
(12, 67, 52, 66, 'koko', 'usr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_id', 1212, '10190723765'),
(13, 67, 49, 66, 'koko', 'usr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idusr_idus', 111111, '10190723765'),
(14, 67, 31, 66, 'koko', 'regovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovern', 3242, '10190723765'),
(15, 67, 29, 66, 'fashion', 'regovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovern', 5434554, '43243222222'),
(17, 67, 27, 66, 'koko', 'regovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovernts goyrgovernts goyrgovernts goyrregovern', 1212, '545634'),
(18, 67, 18, 66, 'koko', 'ee@tretr/.iuiuyiuee@tretr/.iuiuyiuee@tretr/.iuiuyiuee@tretr/.iuiuyiuee@tretr/.iuiuyiuee@tretr/.iuiuyiuee@tretr/.iuiuyiuee@tretr/.iuiuyiuee@tretr/.iuiuyiuee@tretr/.iuiuyiuee@tretr/.iuiuyiuee@tretr/.iuiuyiuee@tretr/.iuiuyiuee@tretr/.iuiuyiuee@tretr/.iuiuyiuee@tretr/.iuiuyiuee@tretr/.iuiuyiuee@tretr/.iuiuyiuee@tretr/.iuiuyiuee@tretr/.iuiuyiuee@tretr/.iuiuyiuee@tretr/.iuiuyiu', 45434, 'ee@tretr/.iuiuyiu'),
(19, 67, 16, 66, 'eeeere', 'ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²ÙØ³ØªØ§Ù†', 323232, '22122222221'),
(20, 67, 5, 66, 'koko', 'ÙØ³ØªØ§Ù† Ù‚Ø·Ù† Ø³Ø§Ø¯Ù‡ Ù„Ø§Ø²Ù… ÙŠÙƒÙˆÙ† Ø¬Ø§Ù‡Ø² Ø®Ù„Ø§Ù„ Ø§Ø³Ø¨ÙˆØ¹ÙŠÙ† Ø§Ù„ØªØ³Ù„ÙŠÙ… ÙˆØ§Ø®Ø° Ø§Ù„Ù‚Ø§Ø³Ø§Øª ÙˆØ§Ù„Ø¨Ø±ÙˆÙØ§Øª Ø¹Ù† Ø·Ø±ÙŠÙ‚ Ù…Ù†Ø¯ÙˆØ¨ ÙŠØ­Ø¶Ø± Ø§Ù„ÙŠ Ø¨ÙŠØª Ø§Ù„Ø¹Ù…ÙŠÙ„\r\nÙØ³ØªØ§Ù† Ù‚Ø·Ù† Ø³Ø§Ø¯Ù‡ Ù„Ø§Ø²Ù… ÙŠÙƒÙˆÙ† Ø¬Ø§Ù‡Ø² Ø®Ù„Ø§Ù„ Ø§Ø³Ø¨ÙˆØ¹ÙŠÙ† Ø§Ù„ØªØ³Ù„ÙŠÙ… ÙˆØ§Ø®Ø° Ø§Ù„Ù‚Ø§Ø³Ø§Øª ÙˆØ§Ù„Ø¨Ø±ÙˆÙØ§Øª Ø¹Ù† Ø·Ø±ÙŠÙ‚ Ù…Ù†Ø¯ÙˆØ¨ ÙŠØ­Ø¶Ø± Ø§Ù„ÙŠ Ø¨ÙŠØª Ø§Ù„Ø¹Ù…ÙŠÙ„\r\nÙØ³ØªØ§Ù† Ù‚Ø·Ù† Ø³Ø§Ø¯Ù‡ Ù„Ø§Ø²Ù… ÙŠÙƒÙˆÙ† Ø¬Ø§Ù‡Ø² Ø®Ù„Ø§Ù„ Ø§Ø³Ø¨ÙˆØ¹ÙŠÙ† Ø§Ù„ØªØ³Ù„ÙŠÙ… ÙˆØ§Ø®Ø° Ø§Ù„Ù‚Ø§Ø³Ø§Øª ÙˆØ§Ù„Ø¨Ø±ÙˆÙØ§Øª Ø¹Ù† Ø·Ø±ÙŠÙ‚ Ù…Ù†Ø¯ÙˆØ¨ ÙŠØ­Ø¶Ø± Ø§Ù„ÙŠ Ø¨ÙŠØª Ø§Ù„Ø¹Ù…ÙŠÙ„\r\nÙØ³ØªØ§Ù† Ù‚Ø·Ù† Ø³Ø§Ø¯Ù‡ Ù„Ø§Ø²Ù… ÙŠÙƒÙˆÙ† Ø¬Ø§Ù‡Ø² Ø®Ù„Ø§Ù„ Ø§Ø³Ø¨ÙˆØ¹ÙŠÙ† Ø§Ù„ØªØ³Ù„ÙŠÙ… ÙˆØ§Ø®Ø° Ø§Ù„Ù‚Ø§Ø³Ø§Øª ÙˆØ§Ù„Ø¨Ø±ÙˆÙØ§Øª Ø¹Ù† Ø·Ø±ÙŠÙ‚ Ù…Ù†Ø¯ÙˆØ¨ ÙŠØ­Ø¶Ø± Ø§Ù„ÙŠ Ø¨ÙŠØª Ø§Ù„Ø¹Ù…ÙŠÙ„\r\nÙØ³ØªØ§Ù† Ù‚Ø·Ù† Ø³Ø§Ø¯Ù‡ Ù„Ø§Ø²Ù… ÙŠÙƒÙˆÙ† Ø¬Ø§Ù‡Ø² Ø®Ù„Ø§Ù„ Ø§Ø³Ø¨ÙˆØ¹ÙŠÙ† Ø§Ù„ØªØ³Ù„ÙŠÙ… ÙˆØ§Ø®Ø° Ø§Ù„Ù‚Ø§Ø³Ø§Øª ', 323, '8888888888888'),
(21, 67, 5, 66, 'lkoooooo', 'ÙØ³ØªØ§Ù† Ù‚Ø·Ù† Ø³Ø§Ø¯Ù‡ Ù„Ø§Ø²Ù… ÙŠÙƒÙˆÙ† Ø¬Ø§Ù‡Ø² Ø®Ù„Ø§Ù„ Ø§Ø³Ø¨ÙˆØ¹ÙŠÙ† Ø§Ù„ØªØ³Ù„ÙŠÙ… ÙˆØ§Ø®Ø° Ø§Ù„Ù‚Ø§Ø³Ø§Øª ÙˆØ§Ù„Ø¨Ø±ÙˆÙØ§Øª Ø¹Ù† Ø·Ø±ÙŠÙ‚ Ù…Ù†Ø¯ÙˆØ¨ ÙŠØ­Ø¶Ø± Ø§Ù„ÙŠ Ø¨ÙŠØª Ø§Ù„Ø¹Ù…ÙŠÙ„\r\n\r\nÙØ³ØªØ§Ù† Ù‚Ø·Ù† Ø³Ø§Ø¯Ù‡ Ù„Ø§Ø²Ù… ÙŠÙƒÙˆÙ† Ø¬Ø§Ù‡Ø² Ø®Ù„Ø§Ù„ Ø§Ø³Ø¨ÙˆØ¹ÙŠÙ† Ø§Ù„ØªØ³Ù„ÙŠÙ… ÙˆØ§Ø®Ø° Ø§Ù„Ù‚Ø§Ø³Ø§Øª ÙˆØ§Ù„Ø¨Ø±ÙˆÙØ§Øª Ø¹Ù† Ø·Ø±ÙŠÙ‚ Ù…Ù†Ø¯ÙˆØ¨ ÙŠØ­Ø¶Ø± Ø§Ù„ÙŠ Ø¨ÙŠØª Ø§Ù„Ø¹Ù…ÙŠÙ„\r\n\r\nÙØ³ØªØ§Ù† Ù‚Ø·Ù† Ø³Ø§Ø¯Ù‡ Ù„Ø§Ø²Ù… ÙŠÙƒÙˆÙ† Ø¬Ø§Ù‡Ø² Ø®Ù„Ø§Ù„ Ø§Ø³Ø¨ÙˆØ¹ÙŠÙ† Ø§Ù„ØªØ³Ù„ÙŠÙ… ÙˆØ§Ø®Ø° Ø§Ù„Ù‚Ø§Ø³Ø§Øª ÙˆØ§Ù„Ø¨Ø±ÙˆÙØ§Øª Ø¹Ù† Ø·Ø±ÙŠÙ‚ Ù…Ù†Ø¯ÙˆØ¨ ÙŠØ­Ø¶Ø± Ø§Ù„ÙŠ Ø¨ÙŠØª Ø§Ù„Ø¹Ù…ÙŠÙ„\r\n\r\nÙØ³ØªØ§Ù† Ù‚Ø·Ù† Ø³Ø§Ø¯Ù‡ Ù„Ø§Ø²Ù… ÙŠÙƒÙˆÙ† Ø¬Ø§Ù‡Ø² Ø®Ù„Ø§Ù„ Ø§Ø³Ø¨ÙˆØ¹ÙŠÙ† Ø§Ù„ØªØ³Ù„ÙŠÙ… ÙˆØ§Ø®Ø° Ø§Ù„Ù‚Ø§Ø³Ø§Øª ÙˆØ§Ù„Ø¨Ø±ÙˆÙØ§Øª Ø¹Ù† Ø·Ø±ÙŠÙ‚ Ù…Ù†Ø¯ÙˆØ¨ ÙŠØ­Ø¶Ø± Ø§Ù„ÙŠ Ø¨ÙŠØª Ø§Ù„Ø¹Ù…ÙŠÙ„\r\n\r\nÙØ³ØªØ§Ù† Ù‚Ø·Ù† Ø³Ø§Ø¯Ù‡ Ù„Ø§Ø²Ù… ÙŠÙƒÙˆÙ† Ø¬Ø§Ù‡Ø² Ø®Ù„Ø§Ù„ Ø§Ø³Ø¨ÙˆØ¹ÙŠÙ† Ø§Ù„ØªØ³Ù„ÙŠÙ… ÙˆØ§Ø®Ø° Ø§Ù„Ù‚Ø§Ø³Ø§Øª ', 3333, '0000000000000000000'),
(26, 67, 5, 66, 'fashion', '$byer_id$byer_id$byer_id$byer_id$byer_id$byer_id$byer_id$byer_id$byer_id$byer_id$byer_id$byer_id$byer_id$byer_id$byer_id$byer_id$byer_id$byer_id$byer_id$byer_id$byer_id$byer_id$byer_id$byer_id$byer_id$byer_id$byer_id$byer_id$byer_id$byer_id$byer_id$byer_id$byer_id$byer_id', 1321, '87876756'),
(27, 67, 52, 66, 'lkoooooo', 'mysqli_querymysqli_querymysqli_querymysqli_querymysqli_querymysqli_querymysqli_querymysqli_querymysqli_querymysqli_querymysqli_querymysqli_querymysqli_querymysqli_querymysqli_querymysqli_querymysqli_querymysqli_querymysqli_querymysqli_querymysqli_querymysqli_query', 32176, '32132432'),
(28, 67, 53, 66, 'omar', 'respons respons respons respons respons respons respons respons respons respons respons respons respons respons ', 112, '10190723765'),
(29, 67, 53, 66, 'fashion', 'respons respons respons respons respons respons respons respons respons respons respons respons respons ', 1265, '10190723765'),
(30, 67, 53, 66, 'omar', 'dfestfset', 2365, '10190723765'),
(31, 67, 7, 66, 'mmiiiiiiiiiiiiiimm', 'respons respons respons respons respons ', 5454, '545634'),
(33, 112, 57, 66, 'uuum', 'hghldvhgsud]1Uhghldvhgsud]1Uhghldvhgsud]1Uhghldvhgsud]1Uhghldvhgsud]1Uhghldvhgsud]1Uhghldvhgsud]1Uhghldvhgsud]1Uhghldvhgsud]1Uhghldvhgsud]1Uhghldvhgsud]1Uhghldvhgsud]1Uhghldvhgsud]1Uhghldvhgsud]1Uhghldvhgsud]1Uhghldvhgsud]1Uhghldvhgsud]1Uhghldvhgsud]1U', 324, '453654364');

-- --------------------------------------------------------

--
-- Table structure for table `category3`
--

CREATE TABLE `category3` (
  `id` smallint(3) NOT NULL,
  `catnm` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `parnt_id` smallint(3) NOT NULL,
  `imgct` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category3`
--

INSERT INTO `category3` (`id`, `catnm`, `parnt_id`, `imgct`) VALUES
(1, 'Ø§ÙƒØ³Ø³ÙˆØ§Ø±Ø§Øª', 0, 'img/catimg/108442188.jpg'),
(2, 'Ù…ØµÙ†ÙˆØ¹Ø§Øª Ø¬Ù„Ø¯ÙŠÙ‡', 0, 'img/catimg/67078540.jpg'),
(3, 'Ù…Ù„Ø§Ø¨Ø³', 0, 'img/catimg/1331561163.jpg'),
(4, 'Ø±Ø³Ù…', 0, 'img/catimg/886687603.jpg'),
(5, 'Ø§Ø¹Ù…Ø§Ù„ Ù†Ø­Øª', 0, 'img/catimg/353110525.jpg'),
(6, 'ØªØ­Ù Ù‚Ø¯ÙŠÙ…Ù‡', 0, 'img/catimg/661319581.jpg'),
(7, 'Ø´ØºÙ„ Ø®Ø´Ø¨', 0, 'img/catimg/268580509.jpg'),
(8, 'Ø´ØºÙ„ Ù†Ø­Ø§Ø³', 0, 'img/catimg/627118771.jpg'),
(9, 'Ø®Ø²Ù Ùˆ ÙØ®Ø§Ø±', 0, 'img/catimg/780540185.jpg'),
(10, 'Ø´ØºÙ„ Ø²Ø¬Ø§Ø¬', 0, 'img/catimg/1292927452.jpg'),
(11, 'Ø¨Ø§Ù…Ø¨Ùˆ', 0, 'img/catimg/477944329.jpg'),
(13, 'Ù†Ø­Ø§Ø³', 1, 'img/catimg/785442032.jpg'),
(14, 'ÙƒØ±ÙŠØ³ØªØ§Ù„', 1, 'img/catimg/326476108.jpg'),
(16, 'Ù…Ø¹Ø¯Ù†', 1, 'img/catimg/829962469.jpg'),
(17, 'Ø®Ø±Ø²', 1, 'img/catimg/828901737.jpg'),
(18, 'Ù…Ø·Ø¹Ù… Ø¨Ø§Ù„Ø§Ø­Ø¬Ø§Ø±', 1, 'img/catimg/606928802.jpg'),
(19, 'Ø§Ø­Ø°ÙŠÙ‡', 2, 'img/catimg/757849958.jpg'),
(20, 'Ø´Ù†Ø·', 2, 'img/catimg/1068156625.jpg'),
(22, 'Ø§ÙˆØ§Ù†ÙŠ Ø®Ø²ÙÙŠÙ‡', 9, 'img/catimg/1269629897.jpg'),
(23, 'Ø®Ø²Ù Ù…Ø¹Ù…Ø§Ø±Ù‰', 9, 'img/catimg/759765486.jpg'),
(24, 'ØªØ­Ù Ø®Ø²ÙÙŠÙ‡', 9, 'img/catimg/917354131.jpg'),
(25, 'Ù„ÙˆØ­Ø§Øª', 4, 'img/catimg/1539833014.jpg'),
(26, 'Ø¬Ø±Ø§ÙÙŠØªÙŠ', 4, 'img/catimg/206066690.jpg'),
(27, 'Ø±Ø³Ù… Ø¹Ù„ÙŠ Ø§Ù„Ù‚Ù…Ø§Ø´', 4, 'img/catimg/599137317.jpg'),
(28, 'Ø²Ø®Ø±ÙÙ‡', 4, 'img/catimg/5221415.jpg'),
(29, 'Ù„ÙˆØ­Ø§Øª ÙÙ†ÙŠÙ‡', 6, 'img/catimg/1540200346.jpg'),
(30, 'Ù…Ù†Ø­ÙˆØªØ§Øª', 6, 'img/catimg/1077923581.jpg'),
(31, 'Ø§Ø«Ø§Ø«', 6, 'img/catimg/14595022.jpg'),
(32, 'Ø¯ÙŠÙƒÙˆØ±Ø§Øª', 6, 'img/catimg/1080599096.jpg'),
(33, 'Ø§Ø±ÙƒÙŠØª Ø®Ø´Ø¨', 7, 'img/catimg/1531590223.JPG'),
(34, 'Ù‚Ø´Ø±Ø© Ø®Ø´Ø¨', 7, 'img/catimg/470849757.jpg'),
(35, 'Ø­ÙØ± Ø¹Ù„ÙŠ Ø§Ù„Ø®Ø´Ø¨', 7, 'img/catimg/429058468.jpg'),
(36, 'Ø§Ø±Ø§Ø¨ÙŠØ³Ùƒ', 7, 'img/catimg/593420440.jpg'),
(37, 'Ø¯ÙŠÙƒÙˆØ±Ø§Øª Ø®Ø´Ø¨', 7, 'img/catimg/462039608.jpg'),
(38, 'Ø®Ø´Ø¨ Ù…Ø·Ø¹Ù… Ø¨Ø§Ù„Ø²Ø¬Ø§Ø¬', 7, 'img/catimg/1490637512.jpg'),
(39, 'Ø§Ø±ÙƒÙŠØª Ù†Ø­Ø§Ø³ÙŠ', 8, 'img/catimg/340856072.jpg'),
(40, 'Ø¯ÙŠÙƒÙˆØ±Ø§Øª', 8, 'img/catimg/974424122.jpg'),
(41, 'Ù†Ø­Ø§Ø³ Ù…Ù†Ù‚ÙˆØ´', 8, 'img/catimg/236984287.jpg'),
(43, 'Ø´ØºÙ„ Ø§Ø¨Ø±Ù‡', 3, 'img/catimg/1447366603.jpg'),
(44, 'Ù…Ù„Ø§Ø¨Ø³ Ø­Ø±ÙŠÙ…ÙŠ', 3, 'img/catimg/422333912.jpeg'),
(46, 'Ø²Ø¬Ø§Ø¬ Ù…Ø¹Ø´Ù‚', 10, 'img/catimg/230216170.jpg'),
(47, 'Ø²Ø¬Ø§Ø¬ Ù…Ø±Ø³ÙˆÙ…', 10, 'img/catimg/1159865636.jpg'),
(48, 'Ø²Ø¬Ø§Ø¬ Ù…ØµÙ†ÙØ±', 10, 'img/catimg/315493152.jpg'),
(49, 'Ø¯ÙŠÙƒÙˆØ±Ø§Øª  Ø²Ø¬Ø§Ø¬', 10, 'img/catimg/864921357.jpg'),
(50, 'Ø§ÙˆØ§Ù†ÙŠ Ø²Ø¬Ø§Ø¬ÙŠÙ‡', 10, 'img/catimg/126065023.jpg'),
(51, 'ØªØ­Ù Ø²Ø¬Ø§Ø¬', 10, 'img/catimg/1358407663.jpg'),
(61, 'Ù…ÙØ±ÙˆØ´Ø§Øª', 2, 'img/catimg/976624915.jpg'),
(62, 'Ù†Ø­Øª Ø¨Ø§Ø±Ø²', 5, 'img/catimg/752065212.jpg'),
(63, 'Ù†Ø­Øª ØºØ§Ø¦Ø±', 5, 'img/catimg/470872759.jpg'),
(64, 'Ù†Ø­Øª Ù…Ø¬Ø³Ù…', 5, 'img/catimg/1561071657.jpg'),
(65, 'ØªÙ…Ø§Ø«ÙŠÙ„', 5, 'img/catimg/1228107283.jpg'),
(66, 'Ø§Ø«Ø§Ø«', 8, 'img/catimg/99821966.jpg'),
(67, 'Ø±Ø³Ù… Ø¹Ù„ÙŠ Ø§Ù„Ø³ÙŠØ±Ø§Ù…ÙŠÙƒ', 9, 'img/catimg/1012013641.jpg'),
(68, 'Ø§Ø«Ø§Ø«', 11, 'img/catimg/1323008237.jpg'),
(69, 'Ù†Ø¨Ø§ØªØ§Øª Ø²ÙŠÙ†Ù‡', 11, 'img/catimg/1233324534.jpg'),
(70, 'Ø¯ÙŠÙƒÙˆØ±Ø§Øª', 11, 'img/catimg/1526968565.jpg'),
(71, 'Ù…Ù†ØªØ¬Ø§Øª Ù…Ù†ÙˆØ¹Ù‡', 11, 'img/catimg/999003242.jpg'),
(72, 'Ù…Ù†Ù…Ù†Ù…Ø§Øª', 4, 'img/catimg/754291679.jpg'),
(75, 'Ø¬Ø§Ù‡Ø²', 73, 'img/catimg/1453810395.jpg'),
(76, 'ØªÙØµÙŠÙ„', 73, 'img/catimg/1497636680.jpeg'),
(77, 'ØªØµÙ…ÙŠÙ…Ø§Øª', 73, 'img/catimg/630838114.jpg'),
(78, 'Ø§Ø±Ø³Ù„ Ø·Ù„Ø¨Ùƒ Ø§Ù„Ø§Ù†', 73, 'img/catimg/247105329.jpg'),
(79, 'Ù…Ù„Ø§Ø¨Ø³', 2, 'img/catimg/117935099.jpg'),
(80, 'Ù…Ù„Ø§Ø¨Ø³ Ø±Ø¬Ø§Ù„ÙŠ', 3, 'img/catimg/716131777.jpg'),
(82, 'Ù…Ù„Ø§Ø¨Ø³ Ø§Ø·ÙØ§Ù„', 3, 'img/catimg/1246956594.jpg'),
(83, 'Ù…Ù„Ø§Ø¨Ø³ Ø³Ù‡Ø±Ù‡', 3, 'img/catimg/1282109991.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `clths_knd`
--

CREATE TABLE `clths_knd` (
  `id` tinyint(2) NOT NULL,
  `kind` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ctys`
--

CREATE TABLE `ctys` (
  `id` tinyint(2) NOT NULL,
  `parnt_id` tinyint(2) NOT NULL,
  `cty_nm` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ctys`
--

INSERT INTO `ctys` (`id`, `parnt_id`, `cty_nm`) VALUES
(1, 0, 'Cairo'),
(2, 0, 'Giza'),
(3, 0, 'Alexandria'),
(4, 0, 'kaliobia'),
(5, 0, 'Garbia'),
(14, 1, 'Ø´Ù…Ø§Ù„ Ø§Ù„Ù‚Ø§Ù‡Ø±Ù‡'),
(15, 1, 'Ø´Ø±Ù‚ Ø§Ù„Ù‚Ø§Ù‡Ø±Ù‡'),
(16, 1, 'ØºØ±Ø¨ Ø§Ù„Ù‚Ø§Ù‡Ø±Ù‡'),
(17, 1, 'Ø¬Ù†ÙˆØ¨ Ø§Ù„Ù‚Ø§Ù‡Ø±Ù‡'),
(18, 1, 'Ù…Ø¯Ù† Ø¬Ø¯ÙŠØ¯Ù‡'),
(19, 2, 'Ø­ÙŠ Ø´Ù…Ø§Ù„'),
(20, 2, 'Ø§Ù„ÙˆØ±Ø§Ù‚'),
(21, 2, 'Ø¨ÙˆÙ„Ø§Ù‚ Ø§Ù„Ø¯ÙƒØ±ÙˆØ±'),
(22, 2, 'Ø§Ù„Ø¯Ù‚ÙŠ'),
(23, 2, 'Ø§Ù„Ø¹Ø¬ÙˆØ²Ù‡'),
(24, 2, 'Ø§Ù„Ø¹Ù…Ø±Ø§Ù†ÙŠÙ‡'),
(25, 2, 'Ø§Ù„Ù‡Ø±Ù…'),
(26, 2, 'Ø­ÙŠ Ø¬Ù†ÙˆØ¨'),
(27, 2, 'Ø§Ù„Ø³Ø§Ø¯Ø³ Ù…Ù† Ø§ÙƒØªÙˆØ¨Ø±'),
(28, 2, 'Ø§Ù„Ø´ÙŠØ® Ø²Ø§ÙŠØ¯'),
(29, 2, 'Ø§Ù„Ø­ÙˆØ§Ù…Ø¯ÙŠÙ‡'),
(30, 2, 'Ø§Ù„Ø¨Ø¯Ø±Ø´ÙŠÙ†'),
(31, 2, 'Ø§Ù„ØµÙ'),
(32, 2, 'Ø§Ø·ÙÙŠØ­'),
(33, 2, 'Ø§Ù„Ø¹ÙŠØ§Ø·'),
(34, 2, 'Ø§Ù„Ø¨Ø§ÙˆÙŠØ·ÙŠ'),
(35, 2, 'Ù…Ù†Ø´Ø£Ø© Ø§Ù„Ù‚Ù†Ø§Ø·Ø±'),
(36, 2, 'Ø§ÙˆØ³ÙŠÙ…'),
(37, 2, 'ÙƒØ±Ø¯Ø§Ø³Ø©'),
(38, 2, 'Ø§Ø¨Ùˆ Ø§Ù„Ù†Ù…Ø±Ø³'),
(39, 3, 'Ø­ÙŠ Ø§ÙˆÙ„ Ø§Ù„Ù…Ù†ØªØ²Ù‡'),
(40, 3, 'Ø­ÙŠ Ø«Ø§Ù† Ø§Ù„Ù…Ù†ØªØ²Ù‡'),
(41, 3, 'Ø­ÙŠ Ø´Ø±Ù‚'),
(42, 3, 'Ø­ÙŠ ÙˆØ³Ø·'),
(43, 3, 'Ø­ÙŠ Ø§Ù„Ø¬Ù…Ø±Ùƒ'),
(44, 3, 'Ø­ÙŠ ØºØ±Ø¨'),
(45, 3, 'Ø­ÙŠ Ø§Ù„Ø¹Ø¬Ù…ÙŠ'),
(46, 3, 'Ø­ÙŠ Ø§Ù„Ø¹Ø§Ù…Ø±ÙŠÙ‡ Ø§ÙˆÙ„'),
(47, 3, 'Ø­ÙŠ Ø§Ù„Ø¹Ø§Ù…Ø±ÙŠÙ‡ Ø«Ø§Ù†'),
(48, 3, 'Ø¨Ø±Ø¬ Ø§Ù„Ø¹Ø±Ø¨'),
(49, 3, 'Ø¨Ø±Ø¬ Ø§Ù„Ø¹Ø±Ø¨ Ø§Ù„Ø¬Ø¯ÙŠØ¯Ù‡'),
(50, 4, 'Ø¨Ù†Ù‡Ø§'),
(51, 4, 'Ù‚Ù„ÙŠÙˆØ¨'),
(52, 4, 'Ø´Ø¨Ø±Ø§ Ø§Ù„Ø®ÙŠÙ…Ù‡'),
(53, 4, 'Ø§Ù„Ù‚Ù…Ø§Ø·Ø± Ø§Ù„Ø®ÙŠØ±ÙŠÙ‡'),
(54, 4, 'Ø§Ù„Ø®Ø§Ù†ÙƒØ©'),
(55, 4, 'ÙƒÙØ± Ø´ÙƒØ±'),
(56, 4, 'Ø·ÙˆØ®'),
(57, 4, 'Ù‚Ù‡Ø§'),
(58, 4, 'Ø§Ù„Ø¹Ø¨ÙˆØ±'),
(59, 4, 'Ø§Ù„Ø®ØµÙˆØµ'),
(60, 4, 'Ø´Ø¨ÙŠÙ† Ø§Ù„Ù‚Ù†Ø§Ø·Ø±'),
(61, 5, 'Ø§Ù„Ù…Ù†ØµÙˆØ±Ù‡'),
(62, 5, 'Ø·Ù„Ø®Ø§'),
(63, 5, 'Ù…ÙŠØª ØºÙ…Ø±'),
(64, 5, 'Ø¯ÙƒØ±Ù†Ø³'),
(65, 5, 'Ø§Ø¬Ø§'),
(66, 5, 'Ù…Ù†ÙŠØ© Ø§Ù„Ù†ØµØ±'),
(67, 5, 'Ø§Ù„Ø³Ù†Ø¨Ù„Ø§ÙˆÙŠÙ†'),
(68, 5, 'Ø§Ù„ÙƒØ±Ø¯ÙŠ'),
(69, 5, 'Ø¨Ù†ÙŠ Ø¹Ø¨ÙŠØ¯'),
(70, 5, 'Ø§Ù„Ù…Ù†Ø²Ù„Ù‡'),
(71, 5, 'ØªÙ…ÙŠ Ø§Ù„Ø§Ù…Ø¯ÙŠØ¯'),
(72, 5, 'Ø§Ù„Ø¬Ù…Ø§Ù„ÙŠÙ‡'),
(73, 5, 'Ø´Ø±Ø¨ÙŠÙ†'),
(74, 5, 'Ø§Ù„Ù…Ø·Ø±ÙŠØ©'),
(75, 5, 'Ø¨Ù„Ù‚Ø§Ø³'),
(76, 5, 'Ù…ÙŠØª Ø³Ù„Ø³ÙŠÙ„'),
(77, 5, 'Ø¬Ù…ØµØ©'),
(78, 5, 'Ù…Ø­Ù„Ø© Ø¯Ù…Ù†Ù‡'),
(79, 5, 'Ù†Ø¨Ø±ÙˆÙ‡');

-- --------------------------------------------------------

--
-- Table structure for table `favorit`
--

CREATE TABLE `favorit` (
  `id` int(9) NOT NULL,
  `prdct_id` int(9) NOT NULL,
  `userid` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favorit`
--

INSERT INTO `favorit` (`id`, `prdct_id`, `userid`) VALUES
(12, 22, 30),
(14, 19, 31),
(32, 36, 26),
(101, 30, 59),
(102, 33, 59),
(131, 19, 59),
(135, 144, 59),
(137, 66, 59),
(144, 20, 68),
(145, 22, 68),
(147, 33, 68),
(148, 85, 68),
(149, 144, 68),
(150, 20, 66),
(154, 85, 66),
(156, 19, 66),
(158, 153, 66),
(161, 22, 66),
(163, 22, 106),
(164, 22, 109),
(165, 33, 109),
(166, 20, 109);

-- --------------------------------------------------------

--
-- Table structure for table `gvrnts`
--

CREATE TABLE `gvrnts` (
  `id` tinyint(2) NOT NULL,
  `gvrn_nm` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gvrnts`
--

INSERT INTO `gvrnts` (`id`, `gvrn_nm`) VALUES
(1, 'Ø§Ù„Ù‚Ø§Ù‡Ø±Ù‡'),
(2, 'Ø§Ù„Ø¬ÙŠØ²Ù‡'),
(3, 'Ø§Ù„Ø§Ø³ÙƒÙ†Ø¯Ø±ÙŠÙ‡'),
(4, 'Ø§Ù„Ù‚Ù„ÙŠÙˆØ¨ÙŠÙ‡'),
(5, 'Ø§Ù„Ø¯Ù‚Ù‡Ù„ÙŠÙ‡');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `titl` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gvrn_id` smallint(3) NOT NULL,
  `cty_id` smallint(3) NOT NULL,
  `img` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `pric` mediumint(6) NOT NULL,
  `ad_dat` int(11) NOT NULL,
  `end` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `detls` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `titl`, `gvrn_id`, `cty_id`, `img`, `pric`, `ad_dat`, `end`, `detls`) VALUES
(5, 66, 'ÙØ³ØªØ§Ù† Ø®Ø±ÙˆØ¬ Ø§Ø¨ÙŠØ¶', 2, 21, 'img/ordr_img/1028661506.jpg', 1500, 1582834278, '12', 'ÙØ³ØªØ§Ù† Ù‚Ø·Ù† Ø³Ø§Ø¯Ù‡ Ù„Ø§Ø²Ù… ÙŠÙƒÙˆÙ† Ø¬Ø§Ù‡Ø² Ø®Ù„Ø§Ù„ Ø§Ø³Ø¨ÙˆØ¹ÙŠÙ† Ø§Ù„ØªØ³Ù„ÙŠÙ… ÙˆØ§Ø®Ø° Ø§Ù„Ù‚Ø§Ø³Ø§Øª ÙˆØ§Ù„Ø¨Ø±ÙˆÙØ§Øª Ø¹Ù† Ø·Ø±ÙŠÙ‚ Ù…Ù†Ø¯ÙˆØ¨ ÙŠØ­Ø¶Ø± Ø§Ù„ÙŠ Ø¨ÙŠØª Ø§Ù„Ø¹Ù…ÙŠÙ„'),
(6, 66, 'Ø³Ø«Ù‚Øµ', 3, 44, 'img/ordr_img/1361447284.jpg', 233, 1582834278, '32', 'ØµØ³Ø«Ù‚Ø´ØµÙ‚'),
(7, 66, 'Ø³Ø´Ø«Ø´Ø«', 4, 50, 'img/ordr_img/2959609862.jpg', 2222, 1582834278, '12', 'ØµØ´Ø«Ø´Ø«'),
(16, 66, 'ÙØ³ØªØ§Ù† Ø§Ø¨ÙŠØ¶ Ù…Ø·Ø±Ø²', 1, 14, 'img/ordr_img/1297921612.jpeg', 2354, 1582849827, '7', 'ØªØ·Ø±ÙŠØ² ÙŠØ¯ÙˆÙŠ ÙˆÙ‚Ù…Ø§Ø´ Ù…Ù† Ø®Ø§Ù…Ø§Øª Ø¬ÙŠØ¯Ù‡ Ù…Ø·Ù„ÙˆØ¨ Ø§Ù„ØªØ²Ø§Ù… Ø¨Ø§Ù„Ù…ÙˆØ§Ø¹ÙŠØ¯ Ù„Ù„Ø¶Ø±ÙˆØ±Ù‡'),
(17, 66, 'uiytuytr', 1, 14, 'img/ordr_img/2637686488.jpg', 43, 1582910194, '43543', 'trewtrewtrew'),
(18, 66, 'uiytuytr', 1, 14, 'img/ordr_img/1571220072.jpg', 43, 1582910287, '43543', 'trewtrewtrew'),
(19, 66, 'fdgfdgfdfdfd', 1, 14, 'img/ordr_img/2821165852.jpeg', 323, 1582910386, '21', '$(\"#ad_order_cntnr\").on(\"submit\",\"#add_order\",function(event){\r\n                event.preventDefault(); //prevent default action \r\n                var post_url = $(this).attr(\"action\"); //get form action url\r\n                var request_method = $(this)'),
(20, 66, 'tytutuytiuytuy', 3, 39, 'img/ordr_img/445533170.jpg', 32, 1582911152, '12', 'ytiyutiuyt iuti uyt iuuty ORDER BY id descORDER BY id descORDER BY id descORDER BY id descORDER BY id descORDER BY id descORDER BY id descORDER BY id descORDER BY id descORDER BY id descORDER BY id descORDER BY id descORDER BY id descORDER BY id desc'),
(21, 66, 'ÙØ³ØªØ§Ù† Ø§Ø­Ù…Ø± Ù‚ØµÙŠØ±ufhfddfsfdsa', 1, 14, 'img/ordr_img/1683477664.jpeg', 1212, 1582911275, '21', 'get form action url var requestget form action url var requestget form action url var requestget form action url var requestget form action url var requestget form action url var requestget form action url var requestget form action url var requestge'),
(22, 66, 'rteyt', 1, 14, 'img/ordr_img/1101088348.jpeg', 2121, 1582911661, '12', 'DER BY id descORDEDER BY id descORDEDER BY id descORDEDER BY id descORDEDER BY id descORDEDER BY id descORDEDER BY id descORDEDER BY id descORDEDER BY id descORDEDER BY id descORDEDER BY id descORDE'),
(26, 66, 'fdthrdjtrd', 3, 42, 'img/ordr_img/2252026462.jpg', 433, 1583006020, '4343', 'governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts gover'),
(27, 66, 'fdthrdjtrd', 3, 42, 'img/ordr_img/2906281330.jpg', 433, 1583006021, '4343', 'governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts gover'),
(28, 66, 'ytrtr', 1, 14, 'img/ordr_img/1287741278.jpg', 3243, 1583006084, '232', 'governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts governts '),
(29, 66, 'ÙØ³ØªØ§Ù† Ø§Ø­Ù…Ø± Ù‚ØµÙŠØ±', 1, 14, 'img/ordr_img/341207784.jpg', 2121, 1583006179, '232', 'governts goyrgovernts goyrgovernts goyrgovernts goyrgovernts goyrgovernts goyrgovernts goyrgovernts goyrgovernts goyrgovernts goyrgovernts goyrgovernts goyrgovernts goyrgovernts goyrgovernts goyrgovernts goyrgovernts goyrgovernts goyrgovernts goyrgovernts goyrgovernts goyrgovernts goyrgovernts goyrgovernts goyrgovernts goyrgovernts goyrgovernts goyrgovernts goyrgovernts goyrgovernts goyr'),
(30, 66, 'uyte', 1, 14, 'img/ordr_img/502569254.jpeg', 5454, 1583006343, '4354', 'tregovernts goyrgovernts goyrgovernts goyr'),
(31, 66, 'uyte', 1, 14, 'img/ordr_img/537546358.jpeg', 5454, 1583006344, '4354', 'tregovernts goyrgovernts goyrgovernts goyr'),
(49, 66, 'tttttttttt', 4, 50, 'img/ordr_img/85923814.jpg', 1212, 1583009005, '121', '2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr'),
(52, 66, 'sdse', 5, 61, 'img/ordr_img/3065475832.jpg', 1212, 1583009362, '12', 'saa2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img2ordr_img'),
(53, 66, 'wwww', 2, 21, 'img/ordr_img/2615328096.jpeg', 2131, 1583114840, '121', 'respons respons respons respons respons respons respons respons respons respons respons respons respons respons respons respons respons respons respons respons respons respons respons respons respons respons respons respons respons respons respons respons respons '),
(55, 66, 'tretre', 1, 14, 'img/ordr_img/268438254.jpg', 3232, 1583117774, '4343', 'retretretretr'),
(56, 66, 'htrgfw', 1, 14, 'img/ordr_img/1384975098.jpg', 542, 1583118226, '432', 'jytrrjyteØªØºÙØ¨Ù‚ØªØ§ØºÙÙ‚ÙŠØºÙ‚'),
(57, 66, 'hbkh', 2, 19, 'img/ordr_img/2082479414.jpg', 21, 1583187303, '21', 'huy re ddfdfdhuy re ddfdfdhuy re ddfdfdhuy re ddfdfdhuy re ddfdfdhuy re ddfdfdhuy re ddfdfdhuy re ddfdfdhuy re ddfdfdhuy re ddfdfdhuy re ddfdfdhuy re ddfdfdhuy re ddfdfd'),
(60, 66, 'vvvvvvvvv', 1, 14, 'img/ordr_img/751814678.jpg', 2121, 1583212269, '2121', 'vcgf ghcbvc bvcvbc vbcvcxcv ');

-- --------------------------------------------------------

--
-- Table structure for table `prdct`
--

CREATE TABLE `prdct` (
  `id` int(11) NOT NULL,
  `prdctnm` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `dscrptn` text COLLATE utf8_unicode_ci NOT NULL,
  `pric` int(8) NOT NULL,
  `stock` mediumint(6) NOT NULL,
  `cat_id` smallint(3) NOT NULL,
  `sub_cat` smallint(3) NOT NULL,
  `image` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(9) NOT NULL,
  `adrss` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phonn` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cmpny` varchar(55) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prdct`
--

INSERT INTO `prdct` (`id`, `prdctnm`, `dscrptn`, `pric`, `stock`, `cat_id`, `sub_cat`, `image`, `userid`, `adrss`, `phonn`, `cmpny`) VALUES
(19, 'chair and choose', 'eeeeeeeeeeeeeeeee', 2323, 23, 10, 46, 'img/userimg/1225148359pro-big-1.jpg', 30, 'qwer', '01090925922', 'no'),
(20, 'ooo', 'ooooooooooooooo', 231, 32423, 10, 46, 'img/userimg/1992158438.jpg', 30, 'qwer', '01090925922', 'no'),
(22, 'vbcvbcvb', 'vcbcvbcvbcvb', 4343, 23, 10, 46, 'img/userimg/6482066567.jpg', 30, 'qwer', '01090925922', 'no'),
(30, 'qwAwqweqw', 'waresaerAWE', 333, 23, 8, 39, 'img/userimg/323376492images (24).jpg', 31, 'qwerghg', '01090925923', 'rg'),
(33, 'ngfa', 'Ù†Ø¬ÙÙ‡ Ù…ØªØ¹Ù„Ù‚Ù‡ ÙÙˆÙ‚', 1239, 43, 10, 49, 'img/userimg/218590518product6.jpg', 30, 'madint-al-sadat--kfr-dawood', '01090925920', 'mfeesh'),
(35, 'ÙØ§Ù†ÙˆØ³ Ø²Ø¬Ø§Ø¬ÙŠ', 'ÙØ§Ù†ÙˆØ³ Ù…Ù† Ø§Ù„Ø²Ø¬Ø§Ø¬ Ø§Ù„Ù…Ù„ÙˆÙ† ÙˆØ§Ù„Ù†Ø­Ø§Ø³', 342, 3, 10, 46, 'img/userimg/420531591images (44).jpg', 31, 'qwerghg', '01090925923', 'rg'),
(36, 'ÙƒØ±Ø³ÙŠ Ù‡Ø²Ø§Ø²', 'ÙƒØ±Ø³ÙŠ Ù‡Ø²Ø§Ø² Ù…Ù† Ø§Ù„Ø¨Ø§Ù…Ø¨Ùˆ', 545, 43, 10, 46, 'img/userimg/336508877images (14).jpg', 31, 'qwerghg', '01090925923', 'rg'),
(39, 'ØµÙˆØ±Ù‡ Ø­Ù„ÙˆÙ‡', 'ÙˆØ©Ù…Ø§Ø¹Ù Ù‡Ø¹Øº Ø¹Ù‡Ù ØºÙ„Ø¨ØºÙ„', 5441, 6, 7, 37, 'img/userimg/35131513109585da620db21640e6c11bf6687682--fall-backgrounds-iphone-autumn-iphone-wallpaper.jpg', 31, 'qwerghg', '01090925923', 'rgkjhg'),
(66, 'ÙØ§Ù†ÙˆØ³ Ø­Ù„Ùˆ', 'Ù‡ÙÙ‚ØºÙÙ‚Ø¹ØºÙ‚Ø«', 434, 432543, 1, 13, 'img/userimg/1181588768.jpg', 59, 'ghfyhgrf', '12121212643', 'YTYTRYTRYT'),
(67, 'ÙØ§Ù†ÙˆØ³ Ù†Ø­Ø§Ø³', 'Ù‡ÙÙ‚ØºÙÙ‚Ø¹ØºÙ‚Ø«', 43, 878, 1, 13, 'img/userimg/1557347042.jpg', 59, 'ghfyhgrf', '12121212643', 'YTYTRYTRYT'),
(68, 'Ù…Ø±Ø§ÙŠØ§', 'Ù…Ø±Ø§ÙŠØ§Øª Ø¬Ù…ÙŠÙ„Ù‡', 43, 432543, 1, 13, 'img/userimg/1339016421.jpg', 59, 'ghfyhgrf', '12121212643', 'YTYTRYTRYT'),
(85, 'Ø±Ø³Ù… ÙˆÙ†Ø­Øª', 'Ø©ØªØ§Ù„Øª', 342, 45, 8, 40, 'img/userimg/380072535.jpg', 59, 'ghfyhgrf', '12121212643', 'YTYTRYTRYT'),
(136, 'Ø­ÙŠÙˆØ§Ù† Ù…ÙØªØ±Ø³ Ø¨ÙŠØ§ÙƒÙ„ ØºØ²Ø§Ù„Ù‡', 'oooooooooooooooooo', 656, 43, 9, 24, 'img/userimg/115768043.jpg', 59, 'ghfyhgrf', '12121212643', 'YTYTRYTRYT'),
(144, 'Ø±Ø³Ù… ÙˆÙ†Ø­Øª', 'Ù‡Ù‡Ù‡Ù‡Ù‡Ù‡', 43, 345, 5, 65, 'img/userimg/82436460.jpg', 59, 'ghfyhgrf', '12121212643', 'YTYTRYTRYT'),
(153, 'sssssssssssss', 'ÙÙ‚Ø¨Ø¹ÙØ¹', 4532, 45, 4, 72, 'img/userimg/285870297.jpg', 59, 'ghfyhgrf', '12121212643', 'YTYTRYTRYT'),
(154, 'Ø¬Ø§ÙƒØª', 'Ø¬Ø§ÙƒØª ÙˆØ­Ø´ Ø¨Ù„Ø§Ø´ Ø­Ø¯ ÙŠØ´ØªØ±ÙŠÙ‡', 5, 4, 3, 80, 'img/userimg/914780726.jpg', 59, 'madint-al-sadat--kfr-dawood', '01090925920', 'mfeesh'),
(155, 'kkjj', 'Ø´Ø³Ù‚Ø«ÙÙ„Ø´', 34, 324, 5, 62, 'img/userimg/1431107732.jpg', 59, 'madint-al-sadat--kfr-dawood', '01090925920', 'mfeesh'),
(156, 'tyre', 'ytreoluyfg', 432, 54, 1, 13, 'img/userimg/1183602487.jpg', 107, '', '65465465465', ''),
(159, 'wwww', 'id_userid_userid_userid_userid_userid_user', 121, 1212, 1, 13, 'img/userimg/1378215670.png', 30, 'madint-al-sadat--kfr-dawood', '01090925920', 'mfeesh');

-- --------------------------------------------------------

--
-- Table structure for table `prdct_imgs`
--

CREATE TABLE `prdct_imgs` (
  `id` int(12) NOT NULL,
  `userid` int(11) NOT NULL,
  `prdct_id` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prdct_imgs`
--

INSERT INTO `prdct_imgs` (`id`, `userid`, `prdct_id`, `img`) VALUES
(3, 59, 67, 'img/other_img_prdct/656187575.jpg'),
(8, 59, 67, 'img/other_img_prdct/915972619.jpg'),
(16, 59, 66, 'img/other_img_prdct/1243475340.jpg'),
(20, 59, 68, 'img/other_img_prdct/809360517.jpg'),
(21, 59, 68, 'img/other_img_prdct/1410895639.jpg'),
(23, 59, 66, 'img/other_img_prdct/1238502217.jpg'),
(24, 59, 66, 'img/other_img_prdct/1060179048.jpg'),
(26, 59, 67, 'img/other_img_prdct/963520907.jpg'),
(28, 59, 154, 'img/other_img_prdct/1337998359.jpg'),
(29, 59, 154, 'img/other_img_prdct/1487676503.jpg'),
(30, 59, 154, 'img/other_img_prdct/992334014.jpg'),
(32, 59, 154, 'img/other_img_prdct/1259665048.jpg'),
(33, 59, 153, 'img/other_img_prdct/725129483.jpg'),
(35, 30, 159, 'img/other_img_prdct/1128679722.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sub_cty`
--

CREATE TABLE `sub_cty` (
  `id` tinyint(2) NOT NULL,
  `sub_ctynm` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gvrn_id` tinyint(2) NOT NULL,
  `cty_id` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_cty`
--

INSERT INTO `sub_cty` (`id`, `sub_ctynm`, `gvrn_id`, `cty_id`) VALUES
(1, 'Ø§Ù„Ø²ÙŠØªÙˆÙ†', 1, 14),
(2, 'Ø§Ù„Ø²Ø§ÙˆÙŠÙ‡ Ø§Ù„Ø­Ù…Ø±Ø§Ø¡', 1, 14),
(3, 'Ø­Ø¯Ø§Ø¦Ù‚ Ø§Ù„Ù‚Ø¨Ù‡', 1, 14),
(4, 'Ø§Ù„Ø´Ø±Ø§Ø¨ÙŠÙ‡', 1, 14),
(5, 'Ø§Ù„Ø³Ø§Ø­Ù„', 1, 14),
(6, 'Ø´Ø¨Ø±Ø§', 1, 14),
(7, 'Ø±ÙˆØ¶ Ø§Ù„ÙØ±Ø¬', 1, 14),
(8, 'Ø§Ù„Ø§Ù…ÙŠØ±ÙŠÙ‡', 1, 14),
(9, 'Ø§Ù„Ø³Ù„Ø§Ù… Ø§ÙˆÙ„', 1, 15),
(10, 'Ø§Ù„Ø³Ù„Ø§Ù… Ø«Ø§Ù†', 1, 15),
(11, 'Ø§Ù„Ù…Ø±Ø¬', 1, 15),
(12, 'Ø§Ù„Ù…Ø·Ø±ÙŠÙ‡', 1, 15),
(13, 'Ø¹ÙŠÙ† Ø´Ù…Ø³', 1, 15),
(14, 'Ø§Ù„Ù†Ø²Ù‡Ù‡', 1, 15),
(15, 'Ù…ØµØ± Ø§Ù„Ø¬Ø¯ÙŠØ¯Ù‡', 1, 15),
(16, 'Ø´Ø±Ù‚ Ù…Ø¯ÙŠÙ†Ø© Ù†ØµØ±', 1, 15),
(17, 'ØºØ±Ø¨ Ù…Ø¯ÙŠÙ†Ø© Ù†ØµØ±', 1, 15),
(18, 'Ø§Ù„ÙˆØ§ÙŠÙ„ÙŠ', 1, 16),
(19, 'Ù…Ù†Ø´Ø£Ø© Ù†Ø§ØµØ±', 1, 16),
(20, 'Ø­ÙŠ ÙˆØ³Ø·', 1, 16),
(21, 'Ø¨Ø§Ø¨ Ø§Ù„Ø´Ø¹Ø±ÙŠÙ‡', 1, 16),
(22, 'Ø§Ù„Ø§Ø²Ø¨ÙƒÙŠÙ‡', 1, 16),
(23, 'Ø¨ÙˆÙ„Ø§Ù‚ Ø§Ø¨Ùˆ Ø§Ù„Ø¹Ù„Ø§', 1, 16),
(24, 'Ø§Ù„Ù…ÙˆØ³ÙƒÙŠ', 1, 16),
(25, 'Ø¹Ø§Ø¨Ø¯ÙŠÙ†', 1, 16),
(26, 'Ø­ÙŠ ØºØ±Ø¨', 1, 16),
(27, 'Ø§Ù„Ù…Ù‚Ø·Ù…', 1, 17),
(28, 'Ø§Ù„Ø®Ù„ÙŠÙÙ‡', 1, 17),
(29, 'Ø§Ù„Ø³ÙŠØ¯Ù‡ Ø²ÙŠÙ†Ø¨', 1, 17),
(30, 'Ù…ØµØ± Ø§Ù„Ù‚Ø¯ÙŠÙ…Ù‡', 1, 17),
(31, 'Ø¯Ø§Ø± Ø§Ù„Ø³Ù„Ø§Ù…', 1, 17),
(32, 'Ø§Ù„Ø¨Ø³Ø§ØªÙŠÙ†', 1, 17),
(33, 'Ø§Ù„Ù…Ø¹Ø§Ø¯ÙŠ', 1, 17),
(34, 'Ø·Ø±Ù‡', 1, 17),
(35, 'Ø§Ù„Ù…Ø¹ØµØ±Ù‡', 1, 17),
(36, '15 Ù…Ø§ÙŠÙˆ', 1, 17),
(37, 'Ø­Ù„ÙˆØ§Ù†', 1, 17),
(38, 'Ø§Ù„ØªØ¨ÙŠÙ†', 1, 17),
(39, 'Ù…Ø¯ÙŠÙ†Ø© Ø¨Ø¯Ø±', 1, 18),
(40, 'Ø§Ù„Ø´Ø±ÙˆÙ‚', 1, 18);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usernm` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `fulnm` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `pasword` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phonnu` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `companam` text COLLATE utf8_unicode_ci,
  `adrs` text COLLATE utf8_unicode_ci,
  `gvrn_id` tinyint(2) DEFAULT NULL,
  `cty_id` tinyint(2) DEFAULT NULL,
  `usr_typ` enum('seler','byer','admin','manager','data entry','dress_maker') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'byer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usernm`, `fulnm`, `pasword`, `phonnu`, `email`, `companam`, `adrs`, `gvrn_id`, `cty_id`, `usr_typ`) VALUES
(26, 'eman', 'eman hamdy ali', 'hghldvhgsud]1A', '01090925920', 'eman@gmail.com', 'mfeesh', 'madint-al-sadat--kfr-dawood', 0, 0, 'admin'),
(30, 'ali', 'aa hamdy ali', 'hghldvhgsud]QW123', '01090925922', 'ali@gmail.com', 'no', 'qwer', 0, 0, 'seler'),
(31, 'shoro', 'shorokk hmdy ali', 'hghldvhgsud]QW1233', '01090925923', 'shorok@gmail.com', 'rgkjhg', 'qwerghg', 0, 0, 'seler'),
(35, 'manar', 'manar h al', 'hghldvhgsud]M12', '09090909096', 'manar@gmail.com', 'ttttttttttttttt', '', 0, 0, 'manager'),
(58, 'shorok', 'shorok hamdy ali', 'hghldvQW12', '01090925990', 'shorok@gmail.com', 'Ø´ØºÙ„ Ø§Ø¨Ø±Ù‡', 'lkummmmmmmmmmmmmmj', 0, 0, 'seler'),
(59, 'asmaa', 'asmaa hamdy ali', 'hghldvhgsud]12QW', '12121212643', 'asmaa@gmail.com', 'YTYTRYTRYT', 'ghfyhgrf', 0, 0, 'seler'),
(63, 'lili', 'dg erf er', 'TFGRD21ewqew', '23232323235', 'lili@lili.lkl', 'dfg', 'dfg', 0, 0, 'dress_maker'),
(64, 'lolo', 'dtrgy ert ret', 'hghldvhgsud]NSS12', '34678956342', 'lolo@gmail.com', '', '', 0, 0, 'data entry'),
(66, 'noor', 'noor hh ali', 'hghldvhgsud]1N', '09090909090', 'noor@gmail.com', '', '', 0, 0, 'byer'),
(67, 'koko', 'koko koko', 'hghldvhgsud]1K', '65432187543', 'koko@gmail.com', '', '', 0, 0, 'dress_maker'),
(68, 'ddd', 'dddd', 'hghldvhgsud]1D', '43217654239', 'ddd@gmail.com', '', '', 0, 0, 'data entry'),
(69, 'hhh', 'hhh', 'hghldvhgsud]1H', '87878787875', 'hhh@gmail.com', '', '', 0, 0, 'data entry'),
(81, 'esrt', 'wer', 'aaaaaaAA11c', '56565678789', 'esrt@gmail.com', '', '', 0, 0, 'byer'),
(82, 'eryqe', 'aery', 'aaaaaaAA11cv', '34343434346', 'eryqe@gmail.com', '', '', 0, 0, 'byer'),
(84, 'yyy', 'lpujh', 'aaaaaaAA11cn', '23765435698', 'yyy@gmail.com', '', '', 0, 0, 'byer'),
(98, 'dfgdf', 'sss', 'sdrytf1Acvc', '45677890564', 'sss@gmail.com', 'sss', '', 0, 0, 'seler'),
(100, 'xdgf', 'sdfgdsf', 'sdsdsdsdSD1', '34343434344', 'xdgf@gmail.com', '', '', 0, 0, 'dress_maker'),
(102, 'ppppppp', 'ooooooooooo', 'ytyt6yt23QW', '87878787549', 'iiiiii@tre.juyt', 'wwwwwwwww', 'fjydktrfjytf', 2, 21, 'data entry'),
(104, 'erweru', 'wqeru', 'oioiOIOI98u', '23232323266', 'wer@fdgh.ygj', 'oioiOIOI98', 'oioiOIOI98', NULL, NULL, 'manager'),
(105, 'jytd', 'ikutdf', 'htgrfseGRFDS12', '65656587095', 'jytd@htrd.yre', 'htgrfseGRFDS12', 'htgrfseGRFDS12', NULL, NULL, 'dress_maker'),
(106, 'mmmm', 'mmmm', 'hghldvhgsud]1M', '43876512659', 'mmmm@gmail.com', 'qwqewqewq', 'ewqewqewq', NULL, NULL, 'byer'),
(107, 'mnmn', 'truyrt', 'hghldvhgsud]1Mn', '65465465465', 'ytre@uyte.ut4r', 'uiyhhiluy', 'hytre', NULL, NULL, 'seler'),
(108, 'ggg', 'ggg', 'hghldvhgsud]1G', '09876543216', 'ggg@gmail.com', NULL, NULL, NULL, NULL, 'byer'),
(109, 'gggg', 'gggg', 'hghldvhgsud]1Gg', '09876543211', 'gggg@gmail.com', NULL, NULL, NULL, NULL, 'byer'),
(112, 'uuu', 'uuu', 'hghldvhgsud]1U', '12342165348', 'uuu@uuu.uuu', 'hghldvhgsud]1L', 'reyeryererererretrtyererrey', 5, 74, 'dress_maker');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aply`
--
ALTER TABLE `aply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `drsmkr_id` (`drsmkr_id`),
  ADD KEY `aply_ibfk_2` (`byer_id`);

--
-- Indexes for table `category3`
--
ALTER TABLE `category3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clths_knd`
--
ALTER TABLE `clths_knd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ctys`
--
ALTER TABLE `ctys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gvrn_id` (`parnt_id`);

--
-- Indexes for table `favorit`
--
ALTER TABLE `favorit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `prdct_id` (`prdct_id`);

--
-- Indexes for table `gvrnts`
--
ALTER TABLE `gvrnts`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `gvrnts` ADD FULLTEXT KEY `gvrn_nm` (`gvrn_nm`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `prdct`
--
ALTER TABLE `prdct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prdct_ibfk_1` (`userid`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `prdct_ibfk_2` (`sub_cat`);

--
-- Indexes for table `prdct_imgs`
--
ALTER TABLE `prdct_imgs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prdct_id` (`prdct_id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `sub_cty`
--
ALTER TABLE `sub_cty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gvrn_id` (`gvrn_id`),
  ADD KEY `cty_id` (`cty_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phonnu` (`phonnu`),
  ADD UNIQUE KEY `pasword` (`pasword`),
  ADD UNIQUE KEY `usernm` (`usernm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aply`
--
ALTER TABLE `aply`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `category3`
--
ALTER TABLE `category3`
  MODIFY `id` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `clths_knd`
--
ALTER TABLE `clths_knd`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ctys`
--
ALTER TABLE `ctys`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `favorit`
--
ALTER TABLE `favorit`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `gvrnts`
--
ALTER TABLE `gvrnts`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `prdct`
--
ALTER TABLE `prdct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `prdct_imgs`
--
ALTER TABLE `prdct_imgs`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sub_cty`
--
ALTER TABLE `sub_cty`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aply`
--
ALTER TABLE `aply`
  ADD CONSTRAINT `aply_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aply_ibfk_2` FOREIGN KEY (`byer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aply_ibfk_3` FOREIGN KEY (`drsmkr_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorit`
--
ALTER TABLE `favorit`
  ADD CONSTRAINT `favorit_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorit_ibfk_2` FOREIGN KEY (`prdct_id`) REFERENCES `prdct` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prdct`
--
ALTER TABLE `prdct`
  ADD CONSTRAINT `prdct_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category3` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prdct_ibfk_2` FOREIGN KEY (`sub_cat`) REFERENCES `category3` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prdct_ibfk_3` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prdct_imgs`
--
ALTER TABLE `prdct_imgs`
  ADD CONSTRAINT `prdct_imgs_ibfk_1` FOREIGN KEY (`prdct_id`) REFERENCES `prdct` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prdct_imgs_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_cty`
--
ALTER TABLE `sub_cty`
  ADD CONSTRAINT `sub_cty_ibfk_1` FOREIGN KEY (`gvrn_id`) REFERENCES `gvrnts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_cty_ibfk_2` FOREIGN KEY (`cty_id`) REFERENCES `ctys` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
