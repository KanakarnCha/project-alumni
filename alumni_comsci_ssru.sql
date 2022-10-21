-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2022 at 07:11 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni_comsci_ssru`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_firstname` varchar(20) NOT NULL,
  `admin_lastname` varchar(20) NOT NULL,
  `admin_username` varchar(20) NOT NULL,
  `admin_password` varchar(20) NOT NULL,
  `admin_status` int(1) NOT NULL,
  `admin_created_by` int(11) NOT NULL,
  `admin_created_at` date NOT NULL,
  `admin_update_by` int(11) NOT NULL,
  `admin_update_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_firstname`, `admin_lastname`, `admin_username`, `admin_password`, `admin_status`, `admin_created_by`, `admin_created_at`, `admin_update_by`, `admin_update_at`) VALUES
(3, 'kanaka', 'dddiem', 'admin', 'admin1', 0, 1152, '2022-10-10', 21, '2022-10-12'),
(5, 'Test', 'TesKKS', 'test', '12344', 0, 0, '2022-10-19', 0, '2022-10-21'),
(6, '', '', '', '', 0, 0, '0000-00-00', 0, '2022-10-22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_alomni_education`
--

CREATE TABLE `tb_alomni_education` (
  `education_id` int(11) NOT NULL,
  `education_year` varchar(4) NOT NULL,
  `education_level` varchar(10) NOT NULL,
  `education_faculty` varchar(15) NOT NULL,
  `education_branch` varchar(15) NOT NULL,
  `education_university` varchar(15) NOT NULL,
  `alumni_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_alomni_education`
--

INSERT INTO `tb_alomni_education` (`education_id`, `education_year`, `education_level`, `education_faculty`, `education_branch`, `education_university`, `alumni_id`) VALUES
(9, '2544', 'ปริญญาตรี', '8v,', 'วิทม', 'ssru', '62122201011'),
(10, '2544', 'ปริญญาตรี', 'วิทเทค', 'คอม', 'ssru', '62122201017'),
(11, '2444', 'ปริญญาตรี', '8v,', 'วิทม', 'ssru', '62122201044'),
(12, '4444', 'ปริญญาตรี', 'll', 'คอม', 'ssru', '62122201021'),
(13, '4444', 'ปริญญาตรี', 'll', '555', 'ssru', '62122201022'),
(14, '555', 'ปริญญาตรี', 'll', '555', 'ssru', '62122201022'),
(15, '8', 'ปริญญาตรี', '8v,', 'คอม', 'ssru', '62122201077'),
(16, '44', 'ปริญญาตรี', '8v,', 'คอม', 'ssru', '62122201075'),
(17, '2544', 'ปริญญาตรี', '8v,', '555', 'ssru', '62122201051'),
(18, '55', 'ปริญญาตรี', 'll', 'คอม', 'ssru', '62122201010'),
(19, '4777', 'ปริญญาตรี', 'll', 'คอม', 'ssru', '62122201073'),
(20, '5', 'ปริญญาตรี', '5', '5', '5', '62122201088'),
(21, '5', 'ปริญญาตรี', '5', '5', '5', '62122201099'),
(22, '5', 'ปริญญาตรี', '5', '5', '5', '62122201076'),
(23, '4', 'ปริญญาตรี', '4', '4', '4', '62122201085'),
(24, '5', 'ปริญญาตรี', '4', '4', '4', '4'),
(25, '2454', 'ปริญญาตรี', 'k', 'k', 'k', '555'),
(26, '4', 'ปริญญาตรี', '4', '4', '4', '8'),
(27, '55', 'ปริญญาตรี', 'sda', 'sad', 'asd', '44444'),
(28, '5', 'ปริญญาตรี', '4', '5', '4', '45454');

-- --------------------------------------------------------

--
-- Table structure for table `tb_alumni`
--

CREATE TABLE `tb_alumni` (
  `alumni_id` varchar(11) NOT NULL,
  `alumni_prefix` varchar(20) NOT NULL,
  `alumni_firstname` varchar(20) DEFAULT NULL,
  `alumni_lastname` varchar(20) DEFAULT NULL,
  `alumni_birthday` date DEFAULT NULL,
  `alumni_email` varchar(100) DEFAULT NULL,
  `alumni_phone` varchar(10) DEFAULT NULL,
  `alumni_address` varchar(255) DEFAULT NULL,
  `alumni_idcard` varchar(13) DEFAULT NULL,
  `alumni_comment` text DEFAULT NULL,
  `alumni_status` int(1) DEFAULT 0,
  `alumni_sex` varchar(6) NOT NULL,
  `alumni_year_in` text NOT NULL,
  `alumni_year_out` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_alumni`
--

INSERT INTO `tb_alumni` (`alumni_id`, `alumni_prefix`, `alumni_firstname`, `alumni_lastname`, `alumni_birthday`, `alumni_email`, `alumni_phone`, `alumni_address`, `alumni_idcard`, `alumni_comment`, `alumni_status`, `alumni_sex`, `alumni_year_in`, `alumni_year_out`) VALUES
('62122201011', 'นาย', 'คณากานต์', 'เจริญเรืองสกุล', '2022-10-13', 'kanakarn.cha@gmail.com', '0825426928', '                  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corrupti distinctio alias quas error ducimus atque laudantium minus corporis quae nemo voluptatibus eius doloremque nihil, sint omnis aspernatur repellat voluptatem non libero vel', '0825426928', 'q  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corrupti distinctio alias quas error ducimus atque laudantium minus corporis quae nemo voluptatibus eius doloremque nihil, sint omnis aspernatur repellat voluptatem non libero velit! Eius libero quasi laboriosam iste voluptatem. Quidem ipsa ipsam quaerat ea nostrum dolorem dolores laborum repudiandae recusandae reiciendis?', 1, 'ชาย', '2454', '588'),
('62122201015', 'นาย', 'คณากานต์5', 'กกก', '2022-10-06', 'kanakarn.cha@gmail.com', '0825426928', 'd', '1100703190633', '', 0, 'ชาย', '2454', '8559'),
('62122201017', 'นาย', 'คณากานต์', 'เจริญเรืองสกุล', '2022-10-18', 'kanakarn.cha@gmail.com', '0825426928', '95 เจริญ', '1100703190622', 'ดีมาก', 1, 'ชาย', '2454', '8559'),
('62122201073', 'นาย', 'คณากานต์4kkk', 'เจริญเรืองสกุล', '2022-10-06', 'kanakarn.cha@gmail.com', '0825426928', '  ยยlll', '0825426928', '1', 1, 'ชาย', '2454', '8559'),
('62122201085', 'นางสาว', 'คณากานต์', 'เจริญเรืองสกุล', '2022-09-30', 'kanakarn.cha@gmail.com', '0825426928', '4', '1100703190688', '4', 0, 'หญิง', '2454', '8559');

-- --------------------------------------------------------

--
-- Table structure for table `tb_alumni_school`
--

CREATE TABLE `tb_alumni_school` (
  `school_id` int(20) NOT NULL,
  `alumni_id` varchar(20) NOT NULL,
  `school_name` varchar(30) NOT NULL,
  `school_province` varchar(30) NOT NULL,
  `school_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_alumni_school`
--

INSERT INTO `tb_alumni_school` (`school_id`, `alumni_id`, `school_name`, `school_province`, `school_url`) VALUES
(15, '62122201011', 'วัด', 'Bangkok', '55หก'),
(16, '62122201017', 'วัด', 'Bangkok', 'เป๋น'),
(17, '62122201010', '', 'Bangkok', ''),
(18, '62122201020', '', 'Bangkok', ''),
(19, '62122201020', '', 'Bangkok', ''),
(20, '62122201055', '', 'Bangkok', ''),
(21, '62122201055', '', 'Bangkok', ''),
(22, '62122212011', '', 'Bangkok', ''),
(23, '62122201054', '', 'Bangkok', ''),
(24, '62122201044', '', 'Bangkok', ''),
(25, '62122201055', '', 'Bangkok', ''),
(26, '62122201077', '', 'Bangkok', ''),
(27, '62122201044', '', 'Bangkok', ''),
(28, '62122201015', 'วัด', 'Bangkok', 'aaa'),
(29, '62122201044', 'วัด', 'Bangkok', 'เป๋น'),
(30, '62122201021', 'วัด', 'Bangkok', '4'),
(31, '62122201022', 'วัด', 'Bangkok', '55หก'),
(32, '62122201077', 'วัด', 'Bangkok', '55หก'),
(33, '62122201075', 'วัด', 'Bangkok', 'เป๋น'),
(34, '62122201051', 'วัด', 'Bangkok', 'เป๋น'),
(35, '62122201010', 'วัด', 'Bangkok', 'เป๋น'),
(36, '62122201073', 'วัด', 'Bangkok', 'aaa'),
(37, '62122201088', '55', 'Bangkok', '55'),
(38, '62122201099', '5', '5', '5'),
(39, '62122201076', '5', 'Bangkok', '5'),
(40, '62122201085', '4', 'Bangkok', '444'),
(41, '4', '4', 'Bangkok', '5'),
(42, '555', '7', 'k', '7'),
(43, '8', '4', 'Bangkok', '4'),
(44, '44444', 's', 'Bangkok', 'a'),
(45, '45454', '55', 'Bangkok', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tb_alumni_work`
--

CREATE TABLE `tb_alumni_work` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(20) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `company_start` int(4) NOT NULL,
  `company_end` int(4) NOT NULL,
  `company_performance` varchar(255) NOT NULL,
  `alumni_id` varchar(11) NOT NULL,
  `company_position` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_alumni_work`
--

INSERT INTO `tb_alumni_work` (`company_id`, `company_name`, `company_address`, `company_start`, `company_end`, `company_performance`, `alumni_id`, `company_position`) VALUES
(10, 'Home', 'ัััsd', 15, 155, 'หหห', '62122201011', 'dd'),
(11, 'tex', 'กรุงเทพ', 5444, 2555, 'ไม่มี', '62122201017', 'วิทคอม'),
(12, 'Home', 'Home', 0, 0, '', '62122201010', 'Home'),
(13, 'Home', 'Home', 0, 0, '', '62122201010', 'Home'),
(14, 'Home', 'Home', 0, 0, '', '62122201020', 'Home'),
(15, 'Home', 'Home', 0, 0, '', '62122201020', 'Home'),
(16, 'Home', 'Home', 0, 0, '', '62122201055', 'Home'),
(17, 'Home', 'Home', 0, 0, '', '62122201055', 'Home'),
(18, 'Home', 'Home', 0, 0, '', '62122212011', 'Home'),
(19, 'Home', 'Home', 0, 0, '', '62122201054', 'Home'),
(20, 'Home', 'Home', 0, 0, '', '62122201044', 'Home'),
(21, 'Home', 'Home', 0, 0, '', '62122201055', 'Home'),
(22, 'Home', 'Home', 0, 0, '', '62122201077', 'Home'),
(23, 'Home', 'Home', 0, 0, '', '62122201044', 'Home'),
(24, 'Home', 'Home', 0, 0, '', '62122201015', 'Home'),
(25, 'Home', 'Home', 0, 0, 'yy', '62122201044', 'Home'),
(26, 'Home', 'Home', 0, 0, '44', '62122201021', 'Home'),
(27, 'Home', 'Home', 0, 0, '444', '62122201022', 'Home'),
(28, 'Home', 'Home', 0, 0, '111', '62122201022', 'Home'),
(29, 'Home', 'Home', 0, 0, 'i', '62122201077', 'Home'),
(30, 'Home', 'Home', 0, 0, '111', '62122201075', 'Home'),
(31, 'Home', 'Home', 0, 0, '5858', '62122201051', 'Home'),
(32, 'Home', 'Home', 0, 0, '8', '62122201010', 'Home'),
(33, 'Home', 'Home', 0, 0, '111', '62122201073', 'Home'),
(34, 'Home', 'Home', 0, 0, '5', '62122201088', 'Home'),
(35, 'Home', 'Home', 0, 0, '5', '62122201099', 'Home'),
(36, 'Home', 'Home', 0, 0, '5', '62122201076', 'Home'),
(37, 'Home', 'Home', 0, 0, '4', '62122201085', 'Home'),
(38, 'Home', 'Home', 0, 0, '5', '4', 'Home'),
(39, 'k', 'k', 0, 0, 'k', '555', 'Home'),
(40, 'Home', 'Home', 0, 0, '4', '8', 'Home'),
(41, 'Home', 'Home', 0, 0, '4', '44444', 'Home'),
(42, 'Home', 'Home', 0, 0, '4', '45454', 'Home');

-- --------------------------------------------------------

--
-- Table structure for table `tb_log`
--

CREATE TABLE `tb_log` (
  `log_id` int(11) NOT NULL,
  `log_table` varchar(20) NOT NULL,
  `log_time` date NOT NULL,
  `log_action` varchar(20) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `alumni_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_alomni_education`
--
ALTER TABLE `tb_alomni_education`
  ADD PRIMARY KEY (`education_id`);

--
-- Indexes for table `tb_alumni`
--
ALTER TABLE `tb_alumni`
  ADD PRIMARY KEY (`alumni_id`);

--
-- Indexes for table `tb_alumni_school`
--
ALTER TABLE `tb_alumni_school`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `tb_alumni_work`
--
ALTER TABLE `tb_alumni_work`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_alomni_education`
--
ALTER TABLE `tb_alomni_education`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_alumni_school`
--
ALTER TABLE `tb_alumni_school`
  MODIFY `school_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tb_alumni_work`
--
ALTER TABLE `tb_alumni_work`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
