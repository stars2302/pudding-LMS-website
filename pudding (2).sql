-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 23-09-01 10:48
-- 서버 버전: 10.4.28-MariaDB
-- PHP 버전: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `pudding`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `admin`
--

CREATE TABLE `admin` (
  `idx` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `regdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `admin`
--

INSERT INTO `admin` (`idx`, `userid`, `email`, `username`, `password`, `regdate`) VALUES
(3, 'admin', 'admin@pudding.com', '프바오', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2023-09-01 12:41:58');

-- --------------------------------------------------------

--
-- 테이블 구조 `category`
--

CREATE TABLE `category` (
  `cateid` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `pcode` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `step` int(4) NOT NULL,
  `cid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `coupons`
--

CREATE TABLE `coupons` (
  `cpid` int(4) NOT NULL,
  `cp_name` varchar(100) NOT NULL,
  `cp_image` varchar(100) NOT NULL,
  `cp_type` int(4) NOT NULL,
  `cp_price` double DEFAULT NULL,
  `cp_limit` int(4) DEFAULT NULL,
  `cp_ratio` double DEFAULT NULL,
  `cp_status` int(4) DEFAULT NULL,
  `cp_date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `courses`
--

CREATE TABLE `courses` (
  `cid` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `cate` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `ismain` int(4) DEFAULT NULL,
  `isnew` int(4) DEFAULT NULL,
  `isbest` int(4) DEFAULT NULL,
  `isrecom` int(4) DEFAULT NULL,
  `userid` varchar(100) DEFAULT NULL,
  `reg_date` datetime NOT NULL,
  `due_status` int(4) NOT NULL,
  `price_status` int(4) NOT NULL,
  `c_total_cnt` int(4) NOT NULL,
  `courselist` varchar(20) DEFAULT NULL,
  `rate` int(5) DEFAULT NULL,
  `rid` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `course_image_table`
--

CREATE TABLE `course_image_table` (
  `imgid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `userid` varchar(100) DEFAULT NULL,
  `filename` varchar(100) NOT NULL,
  `regdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `course_option`
--

CREATE TABLE `course_option` (
  `coid` int(11) NOT NULL,
  `course_user_cnt` int(4) DEFAULT NULL,
  `cid` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `lecture`
--

CREATE TABLE `lecture` (
  `lid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `link` varchar(400) NOT NULL,
  `add_image` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `notice`
--

CREATE TABLE `notice` (
  `ntid` int(4) NOT NULL,
  `nt_title` varchar(100) NOT NULL,
  `nt_filename` varchar(100) DEFAULT NULL,
  `nt_read_cnt` int(4) NOT NULL,
  `nt_content` text NOT NULL,
  `nt_regdate` datetime DEFAULT NULL,
  `userid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `notice`
--

INSERT INTO `notice` (`ntid`, `nt_title`, `nt_filename`, `nt_read_cnt`, `nt_content`, `nt_regdate`, `userid`) VALUES
(30, 'sdfa', 'v2osk-1Z2niiBPg5A-unsplash (1).jpg', 155, '', '0000-00-00 00:00:00', ''),
(31, 'ㅁㄴㄹㄹㄴㅇ', 'ㄴㅁㄹㅇ', 88, 'ㄴㅇㄹ', NULL, ''),
(32, 'sdfa', 'v2osk-1Z2niiBPg5A-unsplash (1).jpg', 141, '', '0000-00-00 00:00:00', ''),
(33, 'ㅁㄴㄹㄹㄴㅇ', 'ㄴㅁㄹㅇ', 87, 'ㄴㅇㄹ', NULL, ''),
(34, 'sdfa', 'v2osk-1Z2niiBPg5A-unsplash (1).jpg', 141, '', '0000-00-00 00:00:00', ''),
(35, 'ㅁㄴㄹㄹㄴㅇ', 'ㄴㅁㄹㅇ', 86, 'ㄴㅇㄹ', NULL, ''),
(36, 'sdfa', 'v2osk-1Z2niiBPg5A-unsplash (1).jpg', 141, '', '0000-00-00 00:00:00', ''),
(37, 'ㅁㄴㄹㄹㄴㅇ', 'ㄴㅁㄹㅇ', 86, 'ㄴㅇㄹ', NULL, ''),
(38, 'sdfa', 'v2osk-1Z2niiBPg5A-unsplash (1).jpg', 141, '', '0000-00-00 00:00:00', ''),
(39, 'ㅁㄴㄹㄹㄴㅇ', 'ㄴㅁㄹㅇ', 86, 'ㄴㅇㄹ', NULL, ''),
(40, 'sdfa', 'v2osk-1Z2niiBPg5A-unsplash (1).jpg', 141, '', '0000-00-00 00:00:00', ''),
(41, 'ㅁㄴㄹㄹㄴㅇ', 'ㄴㅁㄹㅇ', 86, 'ㄴㅇㄹ', NULL, ''),
(42, 'sdfa', 'v2osk-1Z2niiBPg5A-unsplash (1).jpg', 141, '', '0000-00-00 00:00:00', ''),
(43, 'ㅁㄴㄹㄹㄴㅇ', 'ㄴㅁㄹㅇ', 86, 'ㄴㅇㄹ', NULL, ''),
(44, 'sdfa', 'v2osk-1Z2niiBPg5A-unsplash (1).jpg', 141, '', '0000-00-00 00:00:00', ''),
(45, 'ㅁㄴㄹㄹㄴㅇ', 'ㄴㅁㄹㅇ', 86, 'ㄴㅇㄹ', NULL, ''),
(46, 'sdfa', 'v2osk-1Z2niiBPg5A-unsplash (1).jpg', 141, '', '0000-00-00 00:00:00', ''),
(47, 'ㅁㄴㄹㄹㄴㅇ', 'ㄴㅁㄹㅇ', 86, 'ㄴㅇㄹ', NULL, ''),
(48, 'sdfa', 'v2osk-1Z2niiBPg5A-unsplash (1).jpg', 141, '', '0000-00-00 00:00:00', ''),
(49, 'ㅁㄴㄹㄹㄴㅇ', 'ㄴㅁㄹㅇ', 86, 'ㄴㅇㄹ', NULL, ''),
(50, 'sdfa', 'v2osk-1Z2niiBPg5A-unsplash (1).jpg', 141, '', '0000-00-00 00:00:00', ''),
(51, 'ㅁㄴㄹㄹㄴㅇ', 'ㄴㅁㄹㅇ', 86, 'ㄴㅇㄹ', NULL, ''),
(52, 'sdfa', 'v2osk-1Z2niiBPg5A-unsplash (1).jpg', 141, '', '0000-00-00 00:00:00', ''),
(53, 'ㅁㄴㄹㄹㄴㅇ', 'ㄴㅁㄹㅇ', 86, 'ㄴㅇㄹ', NULL, ''),
(54, 'sdfa', 'v2osk-1Z2niiBPg5A-unsplash (1).jpg', 141, '', '0000-00-00 00:00:00', ''),
(55, 'ㅁㄴㄹㄹㄴㅇ', 'ㄴㅁㄹㅇ', 86, 'ㄴㅇㄹ', NULL, ''),
(56, 'sdfa', 'v2osk-1Z2niiBPg5A-unsplash (1).jpg', 141, '', '0000-00-00 00:00:00', ''),
(57, 'ㅁㄴㄹㄹㄴㅇ', 'ㄴㅁㄹㅇ', 86, 'ㄴㅇㄹ', NULL, ''),
(58, 'sdfa', 'v2osk-1Z2niiBPg5A-unsplash (1).jpg', 141, '', '0000-00-00 00:00:00', ''),
(59, 'ㅁㄴㄹㄹㄴㅇ', 'ㄴㅁㄹㅇ', 86, 'ㄴㅇㄹ', NULL, ''),
(60, 'sdfa', 'v2osk-1Z2niiBPg5A-unsplash (1).jpg', 141, '', '0000-00-00 00:00:00', ''),
(61, 'ㅁㄴㄹㄹㄴㅇ', 'ㄴㅁㄹㅇ', 86, 'ㄴㅇㄹ', NULL, ''),
(62, 'fas', 'Sub_cabi_04.png', 19, '', '2023-09-01 00:00:00', ''),
(63, '무ㅠ야호', 'tim-swaan-eOpewngf68w-unsplash.jpg', 1, '', '2023-09-01 00:00:00', ''),
(64, 'ㄻㄴㅇㄹㅇㄴㅁ', 'Sub_cabi_01.png', 1, '', '2023-09-01 00:00:00', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `payments`
--

CREATE TABLE `payments` (
  `payid` int(4) NOT NULL,
  `cid` int(4) NOT NULL,
  `username` varchar(150) NOT NULL,
  `lecture_cnt` int(4) NOT NULL,
  `total_price` double NOT NULL,
  `regdate` datetime NOT NULL,
  `buy_date` datetime NOT NULL,
  `buy_month` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `qna`
--

CREATE TABLE `qna` (
  `qid` int(4) NOT NULL,
  `q_title` varchar(100) NOT NULL,
  `q_content` text NOT NULL,
  `q_regdate` datetime NOT NULL,
  `uid` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `review`
--

CREATE TABLE `review` (
  `rid` int(4) NOT NULL,
  `uid` int(4) NOT NULL,
  `content` text NOT NULL,
  `regdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `users`
--

CREATE TABLE `users` (
  `uid` int(4) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(150) NOT NULL,
  `passwd` varchar(200) NOT NULL,
  `regdate` datetime NOT NULL,
  `userimg` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cateid`),
  ADD KEY `cid` (`cid`);

--
-- 테이블의 인덱스 `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`cpid`);

--
-- 테이블의 인덱스 `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`cid`);

--
-- 테이블의 인덱스 `course_image_table`
--
ALTER TABLE `course_image_table`
  ADD PRIMARY KEY (`imgid`),
  ADD KEY `cid` (`cid`);

--
-- 테이블의 인덱스 `course_option`
--
ALTER TABLE `course_option`
  ADD PRIMARY KEY (`coid`),
  ADD KEY `cid` (`cid`);

--
-- 테이블의 인덱스 `lecture`
--
ALTER TABLE `lecture`
  ADD PRIMARY KEY (`lid`),
  ADD KEY `cid` (`cid`);

--
-- 테이블의 인덱스 `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`ntid`);

--
-- 테이블의 인덱스 `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payid`),
  ADD KEY `cid` (`cid`);

--
-- 테이블의 인덱스 `qna`
--
ALTER TABLE `qna`
  ADD PRIMARY KEY (`qid`);

--
-- 테이블의 인덱스 `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `uid` (`uid`);

--
-- 테이블의 인덱스 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 테이블의 AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `cateid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `coupons`
--
ALTER TABLE `coupons`
  MODIFY `cpid` int(4) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `courses`
--
ALTER TABLE `courses`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `course_image_table`
--
ALTER TABLE `course_image_table`
  MODIFY `imgid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `course_option`
--
ALTER TABLE `course_option`
  MODIFY `coid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `lecture`
--
ALTER TABLE `lecture`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `notice`
--
ALTER TABLE `notice`
  MODIFY `ntid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- 테이블의 AUTO_INCREMENT `payments`
--
ALTER TABLE `payments`
  MODIFY `payid` int(4) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `qna`
--
ALTER TABLE `qna`
  MODIFY `qid` int(4) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `review`
--
ALTER TABLE `review`
  MODIFY `rid` int(4) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(4) NOT NULL AUTO_INCREMENT;

--
-- 덤프된 테이블의 제약사항
--

--
-- 테이블의 제약사항 `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `courses` (`cid`);

--
-- 테이블의 제약사항 `course_image_table`
--
ALTER TABLE `course_image_table`
  ADD CONSTRAINT `course_image_table_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `courses` (`cid`);

--
-- 테이블의 제약사항 `course_option`
--
ALTER TABLE `course_option`
  ADD CONSTRAINT `course_option_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `courses` (`cid`);

--
-- 테이블의 제약사항 `lecture`
--
ALTER TABLE `lecture`
  ADD CONSTRAINT `lecture_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `courses` (`cid`);

--
-- 테이블의 제약사항 `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `courses` (`cid`);

--
-- 테이블의 제약사항 `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
