-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-06-25 17:17:09
-- 服务器版本： 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `management`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin_core`
--

CREATE TABLE `admin_core` (
  `id` int(4) NOT NULL COMMENT '管理员编码',
  `password` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `statement` int(10) DEFAULT NULL COMMENT '0 超级管理员，1招生人员'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin_core`
--

INSERT INTO `admin_core` (`id`, `password`, `name`, `statement`) VALUES
(1000, '14e1b600b1fd579f47433b88e8d85291', '简敏勇', 0),
(1001, '14e1b600b1fd579f47433b88e8d85291', '招生人员', 1);

-- --------------------------------------------------------

--
-- 表的结构 `exam`
--

CREATE TABLE `exam` (
  `id` int(8) NOT NULL COMMENT '考试编号',
  `subject` varchar(50) DEFAULT NULL COMMENT '科目',
  `start_time` varchar(50) DEFAULT NULL COMMENT '起始时间',
  `deadline` varchar(50) DEFAULT NULL COMMENT '终止时间',
  `location` varchar(200) DEFAULT NULL COMMENT '地点',
  `capacity` int(8) DEFAULT NULL COMMENT '人数容量',
  `number` int(8) DEFAULT NULL COMMENT '已选人数'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `exam`
--

INSERT INTO `exam` (`id`, `subject`, `start_time`, `deadline`, `location`, `capacity`, `number`) VALUES
(20170001, '英语四级', '2017.03.21', '2017.06.05', '地大', 5000, 1),
(20170002, '英语六级', '2017.03.21', '2017.06.05', '地大', 5000, 1);

-- --------------------------------------------------------

--
-- 表的结构 `info`
--

CREATE TABLE `info` (
  `id` int(5) NOT NULL,
  `info` text CHARACTER SET utf8 COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `info`
--

INSERT INTO `info` (`id`, `info`) VALUES
(0, '1.请点击左侧的添加考生来填写并提交\n\n2.最近考试安排如下\n\n\n英语四六级考试：2017年6月17日'),
(1, '1.最近考试安排如下\n\n英语四六级考试：2017年6月17日');

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE `student` (
  `id` bigint(32) NOT NULL COMMENT '考生号',
  `password` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `credit_card` varchar(200) DEFAULT NULL COMMENT '身份证号',
  `sex` varchar(5) NOT NULL COMMENT '性别',
  `phone` bigint(32) DEFAULT NULL COMMENT '手机号',
  `local` varchar(200) DEFAULT NULL COMMENT '所在地'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`id`, `password`, `name`, `credit_card`, `sex`, `phone`, `local`) VALUES
(20171003152, '14e1b600b1fd579f47433b88e8d85291', 'Xuan', '326515199420158951', '男', 13526552651, '湖北'),
(20151003188, '14e1b600b1fd579f47433b88e8d85291', 'Henry', '151131864789645161458456', '男', 1552625626, '湖北');

-- --------------------------------------------------------

--
-- 表的结构 `student_exam`
--

CREATE TABLE `student_exam` (
  `id` bigint(32) NOT NULL COMMENT '考生号',
  `exam_id` int(8) DEFAULT NULL COMMENT '考试编号'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `student_exam`
--

INSERT INTO `student_exam` (`id`, `exam_id`) VALUES
(20171003152, 20170001),
(20151003188, 20170002);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_core`
--
ALTER TABLE `admin_core`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
