-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 27, 2023 at 06:17 PM
-- Server version: 5.7.42
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xomurwcink_campus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` varchar(30) NOT NULL,
  `user_type` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `status`, `user_type`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$cxVlmd1YZcwNZfHYO5K8EOe6QbRX3Bg/mE4GFCSUPbHZ67N8GzqOO', 'APPROVED', 'ADMIN', '2023-02-13 12:10:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE `club` (
  `id` int(11) NOT NULL,
  `name` text,
  `advisor` text,
  `email` text,
  `time` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `longitude` text,
  `latitude` text,
  `description` longtext,
  `logo` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `club`
--

INSERT INTO `club` (`id`, `name`, `advisor`, `email`, `time`, `date`, `longitude`, `latitude`, `description`, `logo`, `created_at`, `updated_at`) VALUES
(2, 'Ahmadabad', 'advisor name', 'sohaliyaharshil@gmail.com', '17:48:00', '2023-04-07', '72.40', '23.03', 'qweqwe', '5855409972896.jpg', '2023-04-24 17:46:59', '2023-04-25 16:02:17'),
(4, 'Amreli', 'advisor name', 'sohaliyaharshil@gmail.com', '17:48:00', '2023-04-07', '71.15', '21.36', 'qweqwe', '5855409972896.jpg', '2023-04-24 17:46:59', '2023-04-25 16:03:22'),
(5, 'Rajkot', 'advisor name', 'sohaliyaharshil@gmail.com', '17:48:00', '2023-04-07', '70.56', '22.18', 'qweqwe', '5855409972896.jpg', '2023-04-24 17:46:59', '2023-04-25 16:04:35');

-- --------------------------------------------------------

--
-- Table structure for table `club_register`
--

CREATE TABLE `club_register` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL DEFAULT '0',
  `club_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `club_register`
--

INSERT INTO `club_register` (`id`, `student_id`, `club_id`, `created_at`) VALUES
(1, 4, 4, '2023-04-24 18:09:46'),
(2, 5, 2, '2023-04-25 15:17:30'),
(3, 6, 2, '2023-04-25 18:31:50'),
(4, 8, 2, '2023-04-27 11:20:53'),
(5, 9, 4, '2023-04-27 16:14:01'),
(6, 9, 5, '2023-04-27 16:15:20'),
(7, 9, 2, '2023-04-27 16:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` text,
  `time` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `longitude` text,
  `latitude` text,
  `description` longtext,
  `img` text,
  `is_world` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `link` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `time`, `date`, `longitude`, `latitude`, `description`, `img`, `is_world`, `created_at`, `updated_at`, `link`) VALUES
(3, 'Gondal', '04:00:00', '2023-04-19', '70.52', '21.55', 'It needs to be clear, concise, and have a strong CTA to drive attendees to purchase a ticket or secure an RSVP. Don’t forget to make sure it’s written well, free of typos and grammar mistakes. Even though writing a few sentences may seem easy, it can still be a tricky task for less experienced writers. If you need a hand, you can always employ the writing help of writing services like EssaysOnTime or Fiverr.', '5930603442697.jpg', 1, '2023-04-24 14:01:01', '2023-04-27 11:55:25', 'https://www.google.com/'),
(4, 'Social media links', '02:04:00', '2023-04-08', '21.31', '70.36', 'Don’t forget the social media preferences of your event attendees. Facebook alone has more than two billion active users, while millions of people prefer networks like Twitter or Instagram. But just remember that your attendees won’t necessarily be on every social network. But keep the links handy: it’s a practical way to keep your audience informed and engaged before the event happens. So be sure to keep those social media links handy on the website.', '5821411763263.jpg', 1, '2023-04-24 14:01:32', '2023-04-25 16:05:44', NULL),
(5, 'Jamnagar', '14:04:00', '2023-04-21', '70.07', '22.27', 'Any event should have a clear agenda with timetables and locations. Let it be visible on the website so that potential attendees can think about planning their day around sessions, breaks, and networking opportunities.', '5820482933157.jpg', 1, '2023-04-24 14:01:50', '2023-04-25 16:06:40', NULL),
(6, 'testing Event', '11:41:00', '2023-04-28', '72.653595', '23.068586', 'test des', '5930355019257.png', 1, '2023-04-26 21:42:36', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_register`
--

CREATE TABLE `event_register` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL DEFAULT '0',
  `event_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_register`
--

INSERT INTO `event_register` (`id`, `student_id`, `event_id`, `created_at`) VALUES
(1, 5, 3, '2023-04-25 15:11:21'),
(2, 6, 3, '2023-04-25 18:32:00'),
(3, 7, 4, '2023-04-26 21:37:24'),
(4, 7, 3, '2023-04-26 21:37:38'),
(5, 7, 5, '2023-04-26 21:39:09'),
(6, 6, 6, '2023-04-27 11:01:32'),
(7, 8, 6, '2023-04-27 11:02:21'),
(8, 8, 3, '2023-04-27 11:02:32'),
(9, 9, 4, '2023-04-27 16:14:35'),
(10, 9, 3, '2023-04-27 16:14:54'),
(11, 9, 5, '2023-04-27 16:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `rsvp_no` varchar(200) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `rsvp_no`, `name`, `email`, `created_at`, `updated_at`) VALUES
(4, '132156445564', 'Surface Water', '7572808522', '2023-04-24 17:00:11', NULL),
(5, '13215644556', 'admin', 'superadmin2@sardardham.org', '2023-04-25 15:11:21', NULL),
(6, '123123', 'test', 'admin@admin.com', '2023-04-25 18:31:50', NULL),
(7, '111', 'bvb', 'admin@gmail.com', '2023-04-26 21:37:24', NULL),
(8, '456456', 'test', 'ravip21662@gmail.com', '2023-04-27 11:02:21', NULL),
(9, '913123456', 'Deep Patel HD', 'Deep@gmail.com', '2023-04-27 16:14:01', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `club_register`
--
ALTER TABLE `club_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_register`
--
ALTER TABLE `event_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `club`
--
ALTER TABLE `club`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `club_register`
--
ALTER TABLE `club_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event_register`
--
ALTER TABLE `event_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
