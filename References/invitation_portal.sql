-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2019 at 06:30 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invitation_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups_table`
--

CREATE TABLE `groups_table` (
  `id` int(11) NOT NULL,
  `groupId` int(11) DEFAULT NULL,
  `name` varchar(256) DEFAULT NULL,
  `discription` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups_table`
--

INSERT INTO `groups_table` (`id`, `groupId`, `name`, `discription`, `status`) VALUES
(1, 1, 'staff', 'Only staff', 0),
(2, 2, 'Engineer', 'Only Engineer', 0),
(3, 3, 'Managers', 'Only Managers', 0),
(4, 4, 'Admins', 'Only Admins', 0);

-- --------------------------------------------------------

--
-- Table structure for table `invitations_request_table`
--

CREATE TABLE `invitations_request_table` (
  `Invitation_id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `from_name` varchar(256) DEFAULT NULL,
  `place` varchar(256) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `date` varchar(200) DEFAULT NULL,
  `time` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `invitation_members` varchar(255) DEFAULT NULL,
  `members` varchar(255) DEFAULT NULL,
  `Event_Id` int(200) NOT NULL DEFAULT '0',
  `template_id` int(10) DEFAULT '0',
  `status` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invitations_response_table`
--

CREATE TABLE `invitations_response_table` (
  `Invitation_id` int(11) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `from_name` varchar(256) DEFAULT NULL,
  `place` varchar(256) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `date` varchar(200) DEFAULT NULL,
  `time` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `invitation_members` varchar(255) DEFAULT NULL,
  `members` varchar(255) DEFAULT NULL,
  `Event_Id` int(200) DEFAULT '0',
  `template_id` int(10) DEFAULT '0',
  `alone` varchar(50) DEFAULT NULL,
  `spouse` varchar(200) DEFAULT NULL,
  `childs` int(100) DEFAULT NULL,
  `others` int(200) DEFAULT NULL,
  `total` int(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members_table`
--

CREATE TABLE `members_table` (
  `Id` int(11) NOT NULL,
  `salutation` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `groupId` varchar(256) NOT NULL,
  `emailId` varchar(256) NOT NULL,
  `alone` varchar(20) DEFAULT '1',
  `spose` varchar(20) DEFAULT '1',
  `Child` varchar(20) DEFAULT '1',
  `others` varchar(20) DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members_table`
--

INSERT INTO `members_table` (`Id`, `salutation`, `name`, `groupId`, `emailId`, `alone`, `spose`, `Child`, `others`, `status`) VALUES
(1, 'Miss.', 'Bhimappa', '2', 'bhimappa.odeyar@girmiti.com', '1', '1', '1', '1', 0),
(2, 'Mr.', 'Ravi', '2', 'ravi.pidatala@girmiti.com', '1', '1', '1', '1', 0),
(3, 'Mr.', 'Murali', '3', 'murali.krishna@girmiti.com', '1', '1', '1', '1', 0),
(4, 'Mr', 'Joyjeet', '3', 'joyjeet.paul@girmiti.com', '1', '1', '1', '1', 0),
(5, 'Mr', 'Vivek', '1', 'vivekanand.kattimath@girmiti.com', '1', '1', '1', '1', 0),
(6, 'Mr.', 'Vamsi', '2', 'vamsi.krishna@girmiti.com', '1', '1', '1', '1', 0),
(7, 'Mr.', 'Vamsi', '1', 'vamsi.krishna@girmiti.com', '1', '1', '1', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role_table`
--

CREATE TABLE `role_table` (
  `roleId` varchar(3) NOT NULL,
  `role_name` varchar(256) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `EmpId` int(11) NOT NULL,
  `emailId` varchar(256) NOT NULL,
  `password` varchar(20) NOT NULL,
  `roleId` int(3) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`EmpId`, `emailId`, `password`, `roleId`, `status`) VALUES
(1, 'admin', 'girmiti01', 0, 1),
(2, 'bhimappa.odeyar@girmiti.com', 'girmiti01', 1, 0),
(3, 'joyjeet.paul@girmiti.com', 'girmiit01', 1, 1),
(4, 'ravi.pidatala@girmiti.com', 'girmiti01', 1, 1),
(5, 'pradeep.rao@girmiti.com', 'Ganesha@1982', 1, 1),
(6, 'vamsi.krishna@girmiti.com', 'girmiti01', 1, 0),
(7, 'mohan.rathod@girmiti.com', 'girmiti01', 1, 0),
(8, 'sushma.bankolli@girmiti.com', 'girmiti01', 1, 0),
(9, 'pravallika.vatyam@girmiti.com', 'girmiti01', 1, 0),
(10, 'murali.krishna@girmiti.com', 'girmiti01', 1, 0),
(11, 'srinivasulu.polireddy@girmiti.com', 'girmiti01', 1, 0),
(12, ' akesh.kannaiyan@girmiti.com', 'girmiti01', 1, 0),
(13, 'sanjeev@girmiti.com', 'girmiti01', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups_table`
--
ALTER TABLE `groups_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invitations_request_table`
--
ALTER TABLE `invitations_request_table`
  ADD PRIMARY KEY (`Invitation_id`);

--
-- Indexes for table `invitations_response_table`
--
ALTER TABLE `invitations_response_table`
  ADD PRIMARY KEY (`Invitation_id`);

--
-- Indexes for table `members_table`
--
ALTER TABLE `members_table`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `role_table`
--
ALTER TABLE `role_table`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`EmpId`),
  ADD UNIQUE KEY `emailId` (`emailId`(255));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups_table`
--
ALTER TABLE `groups_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `invitations_request_table`
--
ALTER TABLE `invitations_request_table`
  MODIFY `Invitation_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invitations_response_table`
--
ALTER TABLE `invitations_response_table`
  MODIFY `Invitation_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `members_table`
--
ALTER TABLE `members_table`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `EmpId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
