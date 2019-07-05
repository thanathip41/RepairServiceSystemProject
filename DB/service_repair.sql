-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2019 at 11:25 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE service_repair;
ALTER DATABASE service_repair CHARACTER SET utf8 COLLATE utf8_unicode_ci;

-- USE repair;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `service_repair`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_repair`
--

CREATE TABLE `data_repair` (
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `productCode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `problem` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `device_id` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `repairman` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1',
  `method` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remark` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `idM` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_return` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `data_repair`
--

INSERT INTO `data_repair` (`id`, `productCode`, `problem`, `updated_at`, `created_at`, `device_id`, `repairman`, `status_id`, `method`, `remark`, `deleted`, `idM`, `img`, `date_return`) VALUES
('MT-0603173549', 'NPC-sdsdsd', 'เปิดไม่ติด', '2019-06-05 10:56:47', '2019-04-03 10:35:49', '1', 'MN-11135800', 4, '7878', NULL, 1, 'MN-03165533', NULL, '2019-06-07'),
('MT-0603231118', 'NPC-454545', 'อินเทอร์เน็ต', '2019-06-30 16:51:59', '2019-02-03 16:11:18', '3', 'MN-11135800', 4, 'ส่งเคลม', NULL, 0, 'MN-02030817', NULL, NULL),
('MT-0603231139', 'NPC-454545', 'เปิดไม่ติด', '2019-06-06 17:29:37', '2019-06-03 16:11:39', '1', 'MN-11135800', 4, '7787874545', NULL, 1, 'MN-02030817', NULL, '2019-06-13'),
('MT-0603231324', 'NPC-452177', 'เครื่องค้าง', '2019-06-30 16:52:04', '2019-06-01 16:13:24', '1', 'MN-11135800', 4, 'ซื้ออุปกรณ์ใหม่', NULL, 0, 'MN-02030817', NULL, '2019-06-07'),
('MT-0603231419', 'NPC-szqwqw', 'ปริ้นเตอร์ไม่ทำงาน', '2019-06-30 16:51:47', '2019-06-03 16:14:19', '2', 'MN-11135800', 4, 'ซื้ออุปกรณ์ใหม่', NULL, 0, 'MN-02030817', NULL, '2019-06-06'),
('MT-0603231504', 'NPC-457784', 'จอฟ้า/จอดำ', '2019-07-01 08:15:41', '2019-01-03 16:15:04', '1', 'MN-11135800', 3, 'ซื้ออุปกรณ์ใหม่', NULL, 0, 'MN-02030817', NULL, NULL),
('MT-0603231750', 'NPC-787878', 'ระบบ Wi-Fi', '2019-06-05 10:43:55', '2019-03-03 16:17:50', '3', 'MN-11135800', 4, '787878', NULL, 0, 'MN-02030817', NULL, '2019-06-07'),
('MT-0603231819', 'NPC-545454', 'เปิดไม่ติด', '2019-06-20 20:34:30', '2019-06-03 16:18:19', '1', 'MN-11135800', 4, '78', 'รอของ', 0, 'MN-02030817', NULL, '2019-06-06'),
('MT-0603235228', 'NPC-545454', 'สแกนเนอร์ไม่ทำงาน', '2019-06-29 19:41:30', '2019-02-03 16:52:28', '2', 'MN-11135800', 3, '54545', NULL, 0, 'MN-02030817', 'image/SA1MupnEde9dOAy1CnTGQ4hGP09Yge89V8J33mgE.jpeg', '2019-06-21'),
('MT-0603235314', 'NPC-454545', 'ระบบ LAN', '2019-06-29 19:44:08', '2019-01-03 16:53:14', '3', 'MN-11135800', 4, '45454', NULL, 0, 'MN-02030817', NULL, '2019-06-11'),
('MT-0603235318', 'NPC-787878', 'เปิดไม่ติด', '2019-06-30 09:03:16', '2019-01-03 16:53:18', '1', 'MN-30025929', 3, 'heeesd', NULL, 0, 'MN-02030817', NULL, NULL),
('MT-0603235325', 'NPC-457666', 'เครื่องค้าง', '2019-06-07 14:08:53', '2019-06-03 16:53:25', '1', 'MN-11135800', 4, '7878', 'รออะไหล่', 0, 'MN-02030817', NULL, '2019-06-06'),
('MT-0603235332', 'NPC-454547', 'ปริ้นเตอร์ไม่ทำงาน', '2019-06-30 04:42:13', '2019-02-03 16:53:32', '2', 'MN-11135800', 4, '7474', NULL, 0, 'MN-02030817', NULL, '2019-06-05'),
('MT-0604000048', 'NPC-787878', 'ปริ้นเตอร์ไม่ทำงาน', '2019-06-30 04:40:59', '2019-06-03 17:00:48', '2', 'MN-30025929', 5, 'yuyuyu', NULL, 0, 'MN-02030817', NULL, '2019-06-29'),
('MT-0604100921', 'NPC-654512', 'ปริ้นไม่ได้', '2019-06-04 03:11:31', '2019-06-04 03:09:21', '2', 'MN-11135800', 4, 'สายเสีย', 'รอ', 0, 'MN-02030817', 'image/TsKBx0tYUkUqiqqVLcPE3RRCHlJ6aJwSl5Q2SmVL.jpeg', '2019-06-05'),
('MT-0605020323', 'NPC-sdsd', 'เครื่องค้าง', '2019-06-29 19:40:13', '2019-06-04 19:03:23', '1', 'MN-11135800', 4, '78787', NULL, 0, 'MN-02030817', NULL, '2019-06-08'),
('MT-0605020338', 'NPC-565656', 'เครื่องค้าง', '2019-06-22 15:49:22', '2019-06-04 19:03:38', '1', 'MN-11135800', 4, '7', NULL, 0, 'MN-02030817', NULL, NULL),
('MT-0605184922', 'NPC-754545', 'เปิดไม่ติด', '2019-06-05 17:28:30', '2019-06-05 11:49:22', '1', 'MN-11135800', 4, 'สายเสียบมีปัญหา', NULL, 0, 'MN-03165533', 'image/gcLGHoMpNOeBLmVd1APFav6CrG2LyJMYvfG8oXY5.jpeg', '2019-06-07'),
('MT-0630184948', 'NPC-454121', 'เมาส์/คีย์บอร์ด', '2019-07-03 11:45:43', '2019-06-30 11:49:48', '1', 'MN-11135800', 4, 'ddd', NULL, 0, 'MN-21032651', 'image/i68254zoCuVapiJjyZ7RtXPGJRfSQo5e4QTw6RAF.png', '2019-07-01'),
('MT-0630185309', 'NPC-sdsdsd', 'อินเทอร์เน็ต', '2019-06-30 11:53:09', '2019-06-30 11:53:09', '3', NULL, 1, NULL, NULL, 0, 'MN-21032651', 'image/GP78zECzdr20UCNvvWbUmgOFK0NQMOEa8FGpkQOF.jpeg', NULL),
('MT-0630234012', 'NPC-951878', 'เครื่องค้าง', '2019-06-30 16:40:12', '2019-06-30 16:40:12', '1', NULL, 1, NULL, NULL, 0, 'MN-02030817', 'image/GLXsQR9x73GbeVt4MVBR2FC7GVVf1rZixEvy7z4x.jpeg', NULL),
('MT-0701151149', 'NPC-114444', 'ปริ้นเตอร์ไม่ทำงาน', '2019-07-01 08:16:17', '2019-07-01 08:11:50', '2', 'MN-11135800', 4, 'ss', NULL, 0, 'MN-02030817', 'image/WoQX7Fm60jYRXWLj8Vaqr9NJzhq2JRNCpNmdfB0K.jpeg', '2019-07-02'),
('MT-0703231438', 'NPC-tttyty', 'รีสตาร์ท/ดับเอง', '2019-07-03 16:14:38', '2019-07-03 16:14:38', '1', NULL, 1, NULL, NULL, 0, 'MN-02030817', NULL, NULL),
('MT-0704153704', 'NPC-457889', 'จอฟ้า/จอดำ', '2019-07-04 08:38:58', '2019-07-04 08:37:05', '1', 'MN-11135800', 3, 'test', NULL, 0, 'MN-04153614', 'image/svA0zgIDx4H0AHhEs8fbH6P8tdfSKLh5cw9n4O7x.png', '2019-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `department_name`
--

CREATE TABLE `department_name` (
  `id` int(11) NOT NULL,
  `department_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department_name`
--

INSERT INTO `department_name` (`id`, `department_id`) VALUES
(1, 'ฝ่ายขาย'),
(2, 'ฝ่ายไอที'),
(3, 'ฝ่ายบุคคล'),
(4, 'ฝ่ายการตลาด'),
(5, 'ฝ่ายบริหาร'),
(6, 'ฝ่ายบัญชี'),
(7, 'ฝ่ายซ่อมบำรุง'),
(8, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `device_type`
--

CREATE TABLE `device_type` (
  `id` int(11) NOT NULL,
  `device_id` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `device_type`
--

INSERT INTO `device_type` (`id`, `device_id`) VALUES
(1, 'คอมพิวเตอร์'),
(2, 'ปริ้นเตอร์/สแกนเนอร์'),
(3, 'ระบบเครือข่าย');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `ID` int(11) NOT NULL,
  `role_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`ID`, `role_id`) VALUES
(0, 'ผู้ใช้งานทั่วไป'),
(1, 'ช่างซ่อมบำรุง'),
(2, 'ผู้ดูแลระบบ'),
(3, 'ลาออก');

-- --------------------------------------------------------

--
-- Table structure for table `status_type`
--

CREATE TABLE `status_type` (
  `id` int(11) NOT NULL,
  `status_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status_type`
--

INSERT INTO `status_type` (`id`, `status_id`) VALUES
(1, 'อยู่ระหว่างรอคิว'),
(2, 'อยู๋ระหว่างดำเนินการ'),
(3, 'รอยืนยันจากผู้แจ้งซ่อม'),
(4, 'ดำเนินการเสร็จสิ้น'),
(5, 'รอดำเนินการใหม่'),
(6, 'รอเคลมอุปกรณ์'),
(7, 'รอซื้ออุปกรณ์ใหม่');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` int(2) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(3) NOT NULL DEFAULT '0',
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `department_id`, `email`, `username`, `password`, `created_at`, `updated_at`, `role_id`, `activated`, `img`) VALUES
('MN-02030817', 'ผู้ใข้งาน ทดสอบระบบ', 3, 'thanathip.louis@gmail.com', 'user', '$2y$10$DdzHzNn7Tta3.yTU6Iy4iOVwLRP0S1DF7QbJxoCFXnzC6nioqDNhq', '2019-06-01 20:08:18', '2019-07-04 08:40:57', 3, 0, 'profile/SdErlq4njH7SSWfirouNIrIWXOBHjGTcKfN6q72b.jpeg'),
('MN-03165533', 'ผู้ใข้งาน2 ทดสอบระบบ', 5, 'user11@gmail.com', 'user411', '$2y$10$Ki/N/3665fxVZ6mTL02bqOQ/hOalJSLC2vFMdiB.mmrzbBr8CziN6', '2019-06-03 09:55:33', '2019-07-03 08:56:15', 0, 1, 'profile/eekk5xpGz7iolUEBzghdbzQhvghcbeL3TZoDny2D.png'),
('MN-04153614', 'ทดสอบ', 1, 'user111@gmail.com', 'user444', '$2y$10$epkh9xZ6rX9dkvVz2YK8SuoA5xjtSdsGjVuwlhW6zI7BhwHWKJh42', '2019-07-04 08:36:15', '2019-07-04 08:36:15', 0, 1, 'profile/q4xq1CXu7DXLrmMcx6kzzS2wdZQdaylOkn5p4ItU.png'),
('MN-06202600', 'usertest', 3, 'thanathipdd.louis@gmail.com', 'user11', '$2y$10$fQIRDbVuOXVYUe1NbuU7XOCNZWbXiEDKuyO47NOSXSAzJDWB7MPxW', '2019-06-06 13:26:00', '2019-06-06 13:26:00', 0, 1, 'profile/5ejWeikg5cJkSm4AH4JDUUJRzmM9OPfV9n7iNXU4.png'),
('MN-11135800', 'ผู้ซ่อมบำรุง ทดสอบ', 7, 'thanathip.luis@gmail.com', 'main', '$2y$10$7GIKiKMsef0VXOI3Ep63k.ZXzEf5rwz1KJRsbRmZ7mOU1IkiL6iAy', '2019-04-11 06:58:00', '2019-07-03 16:16:17', 1, 1, 'profile/YvP9CkXFL1YnT4zGFP7VWrKNcsxUHiKd5l4KnNeB.png'),
('MN-11140004', 'admin ทดสอบ', 8, 'admin@gmail.com', 'admin', '$2y$10$3NcymCVURBx1mIatjWW1Bu/..DcOdyRhyBzx2DuhQkQOhATC29OHy', '2019-04-11 07:00:04', '2019-06-05 17:02:55', 2, 1, 'profile/KORc0poZk6vcj0ZNQhYHHrdhc77vqPD88sNbc4uO.png'),
('MN-21032651', 'ผู้ใช้งาน4 ทดสอบ', 1, 'sdsdsdswwss@gmail.com', '411', '$2y$10$M/dfRvcGkNO2CcosvCvMye06g2YXqjC4EPHqoDG64OrGwZSz6ySoO', '2019-06-20 20:26:52', '2019-07-03 08:56:11', 0, 1, 'profile/hVs12RPPMbjzwZ82RbXaD9Tq2bmg8YHfVLcCc2JD.png'),
('MN-30025929', 'ผู้ซ่อมบำรุง2 ทดสอบ', 7, 'main2@gmail.com', 'main2', '$2y$10$.TIJo4NIqxiNl1t6obcEHOwyOaJ8ZDMH7uzjhXeEEtX2Yfw6yP8E.', '2019-06-29 19:59:29', '2019-07-03 11:55:12', 3, 1, 'profile/a0ilV8VH2x0Lypwz537W79WKqr50unvUndky5rsU.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_repair`
--
ALTER TABLE `data_repair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_name`
--
ALTER TABLE `department_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device_type`
--
ALTER TABLE `device_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `status_type`
--
ALTER TABLE `status_type`
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
-- AUTO_INCREMENT for table `department_name`
--
ALTER TABLE `department_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `device_type`
--
ALTER TABLE `device_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
