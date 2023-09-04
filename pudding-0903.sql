-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- 생성 시간: 23-09-03 06:50
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
  `regdate` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `admin`
--

INSERT INTO `admin` (`idx`, `userid`, `email`, `username`, `password`, `regdate`) VALUES
(3, 'admin', 'admin@pudding.com', '프바오', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e', '2023-08-30 15:59:42');

-- --------------------------------------------------------

--
-- 테이블 구조 `category`
--

CREATE TABLE `category` (
  `cateid` int(11) NOT NULL,
  `pcode` varchar(10) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `step` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 테이블의 덤프 데이터 `category`
--

INSERT INTO `category` (`cateid`, `pcode`, `name`, `step`) VALUES
(1, '1', '프로그래밍', 1),
(2, '1', '프론트엔드', 2),
(3, '3', 'HTML', 3),
(4, '3', 'CSS', 3),
(6, '', 'UI/UX', 1),
(10, '1', '백엔드', 2),
(11, '2', 'HTML', 3),
(12, '2', 'CSS', 3),
(13, '2', 'Javascript', 3),
(14, '2', 'React', 3),
(15, '10', 'PHP', 3),
(16, '10', 'Java', 3),
(17, '', '기타', 1),
(18, '', '유림유림', 1),
(19, '18', '살려주세요', 2),
(20, '19', '살려줘', 3),
(21, '', '이도령', 1),
(22, '1', '도령도령', 2),
(23, '22', '도도도도령', 3),
(24, '', '고양이', 1),
(25, '24', '뚱냥이', 2),
(26, '25', '뚠뚜니', 3),
(27, '', '곰', 1),
(28, '27', '판다', 2),
(29, '28', '아이바오', 3),
(30, '28', '러바오', 3),
(31, '28', '푸바오', 3),
(32, '', '이씨', 1),
(33, '32', '도령', 2),
(34, '33', '님', 3),
(35, '', '서울', 1),
(36, '35', '종로구', 2),
(37, '36', '그린컴퓨터학원', 3),
(38, '35', '마포구', 2),
(39, '36', '익선동', 3);

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
  `thumbnail` varchar(10000) NOT NULL,
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

--
-- 테이블의 덤프 데이터 `courses`
--

INSERT INTO `courses` (`cid`, `name`, `cate`, `content`, `thumbnail`, `price`, `ismain`, `isnew`, `isbest`, `isrecom`, `userid`, `reg_date`, `due_status`, `price_status`, `c_total_cnt`, `courselist`, `rate`, `rid`) VALUES
(1, 'HTML/CSS로 웹사이트 만들기', '프로그래밍/프론트엔드/HTML', '웹사이트를 만들어 보면서 웹 퍼블리싱 기초 쌓기\r\nHTML과 CSS의 핵심 개념에 대해 배우고, 상상하는 아이디어를 직접 웹 사이트로 구현할 수 있어요.', 'https://img1.daumcdn.net/thumb/R1280x0/?scode=mtistory2&fname=https%3A%2F%2Fblog.kakaocdn.net%2Fdn%2Fm4tOD%2FbtssNmaVJCj%2FXWGPyqVZKVkgU3oz2ZFKq0%2Fimg.png', 100000, 1, NULL, 1, NULL, NULL, '2023-08-31 13:28:53', 1, 1, 1, NULL, 5, NULL),
(2, 'JavaScript 기초', '프로그래밍/프론트엔드/자바스크립트', '웹 개발에 필수! 자바스크립트 기본기 다지기\r\n웹 개발 분야에서 폭넓게 사용되는 언어, 자바스크립트로 프로그래밍 기본기를 다집시다.', 'https://img1.daumcdn.net/thumb/R1280x0/?scode=mtistory2&fname=https%3A%2F%2Fblog.kakaocdn.net%2Fdn%2FbtoJV3%2FbtssMGgpujd%2FveOFqEhETr8AG2xsZyHUVk%2Fimg.png', 250000, 1, 1, NULL, NULL, NULL, '2023-09-01 12:00:21', 1, 1, 2, NULL, 5, NULL),
(3, 'Figma로 시작하는 UI 디자인', 'UI/UX', 'UI 디자인 원칙을 바탕으로 좋은 인터페이스 만들기\r\nUI 디자인을 시작하기 위해 필요한 지식과 스킬을 배우고,\r\n예쁘고 효율적인 디자인을 위한 여러 가지 기능들을 익혀 봅시다.', 'https://img1.daumcdn.net/thumb/R1280x0/?scode=mtistory2&fname=https%3A%2F%2Fblog.kakaocdn.net%2Fdn%2FcUq6tT%2FbtssT7wzGyo%2FK17mXJ48qhvgAYMM7NvaIK%2Fimg.png', 130000, 1, 1, NULL, 1, NULL, '2023-09-03 02:52:09', 1, 1, 3, NULL, 4, NULL);

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

--
-- 테이블의 덤프 데이터 `lecture`
--

INSERT INTO `lecture` (`lid`, `cid`, `name`, `content`, `thumbnail`, `link`, `add_image`) VALUES
(1, 2, '1강 - 자바스크립트 실행 방법', '식별자\r\n06:23 변수\r\n08:17 javascript 실행방법1\r\n11:17 javascript 실행방법2\r\n12:30 javascript 실행방법3\r\n16:12 javascript 실행방법4\r\n17:35 식별자 주의사항', 'https://tecoble.techcourse.co.kr/static/348a6c1ea3a4fa8b6990e3e3bf4e8490/8ac6f/sample2.png', 'https://youtu.be/UALtgO5aI8Y?si=EDp4UTWFsCLzubL_', ''),
(2, 2, '2강 - javascript 변수생성방법', '00:00 시작\r\n00:06 식별자\r\n00:53 변수 생성 var\r\n16:02 변수 생성 let\r\n20:14 변수 생성 const', 'https://www.waveon.io/_ipx/f_webp/static/img/blog/_posting/ilya-pavlov-OqtafYT5kTw-unsplash.jpg', 'https://youtu.be/zxhA_272NxE?si=uhBbcClXKD4uS234', ''),
(3, 2, '3강 - javascript 변수타입, 산술 연산자', '00:00 시작\r\n00:06 변수 타입\r\n01:43 기본 타입\r\n07:22 참조 타입\r\n08:28 산술 연산자\r\n15:10 자료형\r\n22:43 복합대입연산자', 'https://cdn.snunews.com/news/photo/201609/16240_9455_4715.jpg', 'https://youtu.be/QKoqf0VnAYg?si=KrfxizsYMZquYyz8', '');

-- --------------------------------------------------------

--
-- 테이블 구조 `notice`
--

CREATE TABLE `notice` (
  `ntid` int(4) NOT NULL,
  `nt_title` varchar(100) NOT NULL,
  `nt_filename` varchar(100) DEFAULT NULL,
  `nt_read_cnt` int(4) NOT NULL,
  `nt_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  ADD PRIMARY KEY (`cateid`);

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
  MODIFY `cateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- 테이블의 AUTO_INCREMENT `coupons`
--
ALTER TABLE `coupons`
  MODIFY `cpid` int(4) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `courses`
--
ALTER TABLE `courses`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 테이블의 AUTO_INCREMENT `notice`
--
ALTER TABLE `notice`
  MODIFY `ntid` int(4) NOT NULL AUTO_INCREMENT;

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
