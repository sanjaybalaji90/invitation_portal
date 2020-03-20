-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 20, 2020 at 07:28 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `groupId` int(11) DEFAULT 0,
  `name` varchar(256) DEFAULT NULL,
  `discription` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups_table`
--

INSERT INTO `groups_table` (`id`, `groupId`, `name`, `discription`, `status`) VALUES
(49, 0, 'Directors', 'Girmiti Directors', 0),
(50, 0, 'HR', 'Girmiti HR', 0),
(51, 0, 'Womens', 'Girmiti Womens', 0),
(52, 0, 'Managers', 'Girmiti Managers', 0);

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
  `Event_Id` int(200) DEFAULT 0,
  `template_id` varchar(10) DEFAULT '0',
  `template_path` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invitations_request_table`
--

INSERT INTO `invitations_request_table` (`Invitation_id`, `name`, `from_name`, `place`, `subject`, `date`, `time`, `address`, `message`, `invitation_members`, `members`, `Event_Id`, `template_id`, `template_path`, `status`) VALUES
(31, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'ravikumar.k@girmiti.com', '', 1, 'default', '1582206857.jpg', 1),
(32, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'prithvi.prasad@girmiti.com', '', 1, 'default', '1582206857.jpg', 1),
(33, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'sajesh.babu@girmiti.com', '', 1, 'default', '1582206857.jpg', 1),
(34, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'nazeer.saheb@girmiti.com', '', 1, 'default', '1582206857.jpg', 1),
(35, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'rajesh.bs@girmiti.com', '', 1, 'default', '1582206857.jpg', 1),
(36, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'suresh.patel@girmiti.com', '', 1, 'default', '1582206857.jpg', 1),
(37, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'rajesh.somasela@girmiti.com', '', 1, 'default', '1582206857.jpg', 1),
(38, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'raj.k@girmiti.com', '', 1, 'default', '1582206857.jpg', 1),
(39, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'mallanna.kannur@girmiti.com', '', 1, 'default', '1582206857.jpg', 1),
(40, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'jana@girmiti.com', '', 1, 'default', '1582206857.jpg', 1),
(41, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'stanley@girmiti.com', '', 1, 'default', '1582206857.jpg', 1),
(42, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'sreekanth.kunnathur@girmiti.com', '', 1, 'default', '1582206857.jpg', 1),
(43, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'kumar.s@girmiti.com', '', 1, 'default', '1582206857.jpg', 1),
(44, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'veerendra.diggavi@girmiti.com', '', 1, 'default', '1582206857.jpg', 1),
(45, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'jagannath.desai@girmiti.com', '', 1, 'default', '1582206857.jpg', 1),
(46, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'vasanth.upadhya@girmiti.com', '', 1, 'default', '1582206857.jpg', 1),
(47, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'jom.george@girmiti.com', '', 1, 'default', '1582206857.jpg', 1),
(48, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'rudra.hatti@girmiti.com', '', 1, 'default', '1582206857.jpg', 1),
(49, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'gireesh.desai@girmiti.com', '', 1, 'default', '1582206857.jpg', 1),
(50, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'prasad@girmiti.com', '', 1, 'default', '1582206857.jpg', 1),
(51, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'raghavendra.ramesh@girmiti.com', '', 1, 'default', '1582206857.jpg', 1),
(52, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'sibin.issac@girmiti.com', '', 1, 'default', '1582206857.jpg', 1),
(53, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'imtiyaz.ahmad@girmiti.com', '', 1, 'default', '1582206857.jpg', 1),
(54, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'pradeep.rao@girmiti.com', '', 1, 'default', '1582206857.jpg', 1),
(55, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'prakash@girmiti.com', '', 1, 'default', '1582206857.jpg', 1),
(56, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'anand.b@girmiti.com', '', 1, 'default', '1582206857.jpg', 1),
(57, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'tony@girmiti.com', '', 1, 'default', '1582206857.jpg', 1),
(58, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'vasuki.raghavan@girmiti.com', '', 1, 'default', '1582206857.jpg', 1),
(59, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'girish.padki@girmiti.com', '', 1, 'default', '1582206857.jpg', 1),
(60, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'reddy@girmiti.com', '', 1, 'default', '1582206857.jpg', 1),
(61, 'WomensDay', 'Girmiti', 'Office', '', '2020-03-08', '09:32', 'Girmiti, AECS Road', 'Womens day celebration', 'prabha@girmiti.com', '', 2, 'default', '1582264732.jpg', 1),
(62, 'WomensDay', 'Girmiti', 'Office', '', '2020-03-08', '09:32', 'Girmiti, AECS Road', 'Womens day celebration', 'reshma@girmiti.com', '', 2, 'default', '1582264732.jpg', 1),
(63, 'WomensDay', 'Girmiti', 'Office', '', '2020-03-08', '09:32', 'Girmiti, AECS Road', 'Womens day celebration', 'chira@girmiti.com', '', 2, 'default', '1582264732.jpg', 1),
(64, 'WomensDay', 'Girmiti', 'Office', '', '2020-03-08', '09:32', 'Girmiti, AECS Road', 'Womens day celebration', 'sruthisree.utti@girmiti.com', '', 2, 'default', '1582264732.jpg', 1),
(65, 'WomensDay', 'Girmiti', 'Office', '', '2020-03-08', '09:32', 'Girmiti, AECS Road', 'Womens day celebration', 'asha.acharya@girmiti.com', '', 2, 'default', '1582264732.jpg', 1),
(66, 'WomensDay', 'Girmiti', 'Office', '', '2020-03-08', '09:32', 'Girmiti, AECS Road', 'Womens day celebration', 'juliet@girmiti.com', '', 2, 'default', '1582264732.jpg', 1),
(67, 'WomensDay', 'Girmiti', 'Office', '', '2020-03-08', '09:32', 'Girmiti, AECS Road', 'Womens day celebration', 'bindu.v@girmiti.com', '', 2, 'default', '1582264732.jpg', 1),
(68, 'WomensDay', 'Girmiti', 'Office', '', '2020-03-08', '09:32', 'Girmiti, AECS Road', 'Womens day celebration', 'jom.george@girmiti.com', '', 2, 'default', '1582264732.jpg', 1),
(69, 'WomensDay', 'Girmiti', 'Office', '', '2020-03-08', '09:32', 'Girmiti, AECS Road', 'Womens day celebration', 'jom.george@girmiti.com', '', 2, 'default', '1582265128.jpg', 1),
(70, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'deepmala.mishra@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(71, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'sima.kumari@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(72, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'naga.saathvika@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(73, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'reshma.itagi@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(75, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'neel.prabha@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(76, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'ashwini.murthy@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(77, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'shwetha.karnamadakala@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(78, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'vidyashree.gowda@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(79, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'swathi.revansiddappa@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(80, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'neethu.jojo@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(81, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'prasanna.bandi@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(82, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'subrata.bose@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(83, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'kavyashree.mohan@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(84, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'aswini.magesh@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(85, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'poornima.shet@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(86, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'sabanta.kumari@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(87, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'sushma.bankolli@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(88, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'jeeshna.jijesh@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(89, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'sonam.priya@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(90, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'madhavi.perekala@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(91, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'arbeen.taj@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(92, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'divya.seetharam@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(93, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'sravanthi.ranga@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(94, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'shubham.upadhyay@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(95, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'suraksha.rao@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(96, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'anushree.swamy@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(97, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'amara.ganga@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(98, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'smitha.holla@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(99, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'nirusha.chebiyyam@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(100, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'palla.rekha@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(101, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'deekshitha.lokesh@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(102, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'kavya.gautham@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(103, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'anita.gowda@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(104, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'priyamvada.chamarthy@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(105, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'gajula.padmaja@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(106, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'bindu.v@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(107, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'prabha@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(108, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'reshma@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(109, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'chira@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(110, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'sruthisree.utti@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(111, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'asha.acharya@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(112, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'juliet@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(113, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'pavan.shetty@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(114, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'naresh.yadav@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(115, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'girish.kumar@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(116, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'amith.sharavathi@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(117, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'ajinkya.jadhav@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(118, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'abhilash.aswath@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(119, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'manish.chandra@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(120, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'karimullah.syed@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(121, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'vasudeva.rao@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(122, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'nageswara.rao@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(123, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'sunil.seetharam@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(124, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'vijaya.kumar@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(125, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'vikram.devara@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(127, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'shivakumar.borkar@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(128, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'satyabrata.panda@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(129, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'gyanendra.kumar@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(130, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'shrinivas.godabole@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(131, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'robin.dias@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(132, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'kopresh.desai@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(134, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'revanna.shekar@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(135, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'vinay.shankar@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(136, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'chandrappa.raju@girmiti.com', '', 1, 'default', '1582880241.jpg', 1),
(137, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'pragati.jawale@girmiti.com', '', 1, 'default', '1582895246.jpg', 1),
(138, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'vikram.kumar@girmiti.com', '', 1, 'default', '1582895246.jpg', 1),
(139, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'jayesh.dewangan@girmiti.com', '', 1, 'default', '1582895246.jpg', 1),
(140, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'ajaykumar.a@girmiti.com', '', 1, 'default', '1582898028.jpg', 1);

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
  `Event_Id` int(200) DEFAULT 0,
  `template_id` varchar(10) DEFAULT '0',
  `template_path` varchar(50) DEFAULT NULL,
  `fontcolor` varchar(25) DEFAULT NULL,
  `fontsize` varchar(25) DEFAULT NULL,
  `alone` varchar(50) DEFAULT NULL,
  `spouse` varchar(200) DEFAULT NULL,
  `childs` int(100) DEFAULT 0,
  `others` int(200) DEFAULT NULL,
  `total` int(20) DEFAULT 0,
  `comments` varchar(200) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `date_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invitations_response_table`
--

INSERT INTO `invitations_response_table` (`Invitation_id`, `name`, `from_name`, `place`, `subject`, `date`, `time`, `address`, `message`, `invitation_members`, `members`, `Event_Id`, `template_id`, `template_path`, `fontcolor`, `fontsize`, `alone`, `spouse`, `childs`, `others`, `total`, `comments`, `status`, `date_time`) VALUES
(31, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'ravikumar.k@girmiti.com', '', 1, 'default', '1582206857.jpg', '', '', 'with spouse', NULL, 1, NULL, 3, NULL, 'Accepted', '2020-02-21 11:46:47'),
(32, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'prithvi.prasad@girmiti.com', '', 1, 'default', '1582206857.jpg', '', '', 'alone', NULL, 0, NULL, 1, NULL, 'Accepted', '2020-02-20 19:27:37'),
(33, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'sajesh.babu@girmiti.com', '', 1, 'default', '1582206857.jpg', '', '', 'with spouse', NULL, 2, NULL, 4, NULL, 'Accepted', '2020-02-25 13:29:37'),
(34, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'nazeer.saheb@girmiti.com', '', 1, 'default', '1582206857.jpg', '', '', 'alone', NULL, 1, NULL, 2, NULL, 'Accepted', '2020-02-21 15:53:26'),
(35, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'rajesh.bs@girmiti.com', '', 1, 'default', '1582206857.jpg', '', '', 'with spouse', NULL, 1, NULL, 3, NULL, 'Accepted', '2020-02-24 18:58:09'),
(36, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'suresh.patel@girmiti.com', '', 1, 'default', '1582206857.jpg', '', '', 'alone', NULL, 0, NULL, 1, NULL, 'Accepted', '2020-02-21 10:46:53'),
(37, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'rajesh.somasela@girmiti.com', '', 1, 'default', '1582206857.jpg', '', '', 'with spouse', NULL, 1, NULL, 3, NULL, 'Accepted', '2020-02-24 14:43:05'),
(38, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'raj.k@girmiti.com', '', 1, 'default', '1582206857.jpg', '', '', ' ', NULL, 0, NULL, 0, NULL, 'Rejected', '2020-02-29 14:56:39'),
(39, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'mallanna.kannur@girmiti.com', '', 1, 'default', '1582206857.jpg', '', '', 'alone', NULL, 0, NULL, 1, NULL, 'Accepted', '2020-02-27 13:20:09'),
(40, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'jana@girmiti.com', '', 1, 'default', '1582206857.jpg', '', '', 'alone', NULL, 0, NULL, 1, NULL, 'Accepted', '2020-02-20 19:24:29'),
(41, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'stanley@girmiti.com', '', 1, 'default', '1582206857.jpg', '', '', NULL, NULL, 0, NULL, 0, NULL, NULL, '2020-02-20 19:24:29'),
(42, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'sreekanth.kunnathur@girmiti.com', '', 1, 'default', '1582206857.jpg', '', '', ' ', NULL, 0, NULL, 0, NULL, 'Rejected', '2020-02-24 12:55:56'),
(43, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'kumar.s@girmiti.com', '', 1, 'default', '1582206857.jpg', '', '', 'with spouse', NULL, 1, NULL, 3, NULL, 'Accepted', '2020-02-24 13:09:09'),
(44, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'veerendra.diggavi@girmiti.com', '', 1, 'default', '1582206857.jpg', '', '', 'with spouse', NULL, 1, NULL, 3, NULL, 'Accepted', '2020-02-20 20:34:32'),
(45, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'jagannath.desai@girmiti.com', '', 1, 'default', '1582206857.jpg', '', '', ' ', NULL, 0, NULL, 0, NULL, 'Rejected', '2020-02-28 12:07:10'),
(46, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'vasanth.upadhya@girmiti.com', '', 1, 'default', '1582206857.jpg', '', '', 'with spouse', NULL, 1, NULL, 3, NULL, 'Accepted', '2020-02-24 18:18:35'),
(47, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'jom.george@girmiti.com', '', 1, 'default', '1582206857.jpg', '', '', 'alone', NULL, 0, NULL, 1, NULL, 'Accepted', '2020-02-24 12:57:38'),
(48, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'rudra.hatti@girmiti.com', '', 1, 'default', '1582206857.jpg', '', '', 'with spouse', NULL, 2, NULL, 4, NULL, 'Accepted', '2020-02-24 14:42:36'),
(49, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'gireesh.desai@girmiti.com', '', 1, 'default', '1582206857.jpg', '', '', 'with spouse', NULL, 1, NULL, 3, NULL, 'Accepted', '2020-02-24 12:52:48'),
(50, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'prasad@girmiti.com', '', 1, 'default', '1582206857.jpg', '', '', 'with spouse', NULL, 2, NULL, 4, NULL, 'Accepted', '2020-02-20 19:28:17'),
(51, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'raghavendra.ramesh@girmiti.com', '', 1, 'default', '1582206857.jpg', '', '', ' ', NULL, 0, NULL, 0, NULL, 'Rejected', '2020-02-24 12:55:05'),
(52, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'sibin.issac@girmiti.com', '', 1, 'default', '1582206857.jpg', '', '', 'alone', NULL, 0, NULL, 1, NULL, 'Accepted', '2020-02-20 20:21:11'),
(53, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'imtiyaz.ahmad@girmiti.com', '', 1, 'default', '1582206857.jpg', '', '', 'with spouse', NULL, 2, NULL, 4, NULL, 'Accepted', '2020-02-25 15:28:31'),
(54, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'pradeep.rao@girmiti.com', '', 1, 'default', '1582206857.jpg', '', '', 'with spouse', NULL, 0, NULL, 2, NULL, 'Accepted', '2020-02-24 12:51:07'),
(55, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'prakash@girmiti.com', '', 1, 'default', '1582206857.jpg', '', '', 'with spouse', NULL, 1, NULL, 3, NULL, 'Accepted', '2020-02-28 10:45:55'),
(56, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'anand.b@girmiti.com', '', 1, 'default', '1582206857.jpg', '', '', 'alone', NULL, 0, NULL, 1, NULL, 'Accepted', '2020-02-20 19:26:53'),
(57, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'tony@girmiti.com', '', 1, 'default', '1582206857.jpg', '', '', 'alone', NULL, 0, NULL, 1, NULL, 'Accepted', '2020-02-20 19:35:17'),
(58, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'vasuki.raghavan@girmiti.com', '', 1, 'default', '1582206857.jpg', '', '', 'with spouse', NULL, 2, NULL, 4, NULL, 'Accepted', '2020-02-20 20:27:41'),
(59, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'girish.padki@girmiti.com', '', 1, 'default', '1582206857.jpg', '', '', 'alone', NULL, 0, NULL, 1, NULL, 'Accepted', '2020-02-21 10:13:52'),
(60, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'reddy@girmiti.com', '', 1, 'default', '1582206857.jpg', '', '', 'alone', NULL, 0, NULL, 1, NULL, 'Accepted', '2020-02-20 20:23:05'),
(61, 'WomensDay', 'Girmiti', 'Office', '', '2020-03-08', '09:32', 'Girmiti, AECS Road', 'Womens day celebration', 'prabha@girmiti.com', '', 2, 'default', '1582264732.jpg', '', '', NULL, NULL, 0, NULL, 0, NULL, NULL, '2020-02-21 11:28:56'),
(62, 'WomensDay', 'Girmiti', 'Office', '', '2020-03-08', '09:32', 'Girmiti, AECS Road', 'Womens day celebration', 'reshma@girmiti.com', '', 2, 'default', '1582264732.jpg', '', '', NULL, NULL, 0, NULL, 0, NULL, NULL, '2020-02-21 11:28:56'),
(63, 'WomensDay', 'Girmiti', 'Office', '', '2020-03-08', '09:32', 'Girmiti, AECS Road', 'Womens day celebration', 'chira@girmiti.com', '', 2, 'default', '1582264732.jpg', '', '', NULL, NULL, 0, NULL, 0, NULL, NULL, '2020-02-21 11:28:56'),
(64, 'WomensDay', 'Girmiti', 'Office', '', '2020-03-08', '09:32', 'Girmiti, AECS Road', 'Womens day celebration', 'sruthisree.utti@girmiti.com', '', 2, 'default', '1582264732.jpg', '', '', NULL, NULL, 0, NULL, 0, NULL, NULL, '2020-02-21 11:28:56'),
(65, 'WomensDay', 'Girmiti', 'Office', '', '2020-03-08', '09:32', 'Girmiti, AECS Road', 'Womens day celebration', 'asha.acharya@girmiti.com', '', 2, 'default', '1582264732.jpg', '', '', 'with spouse', NULL, 1, NULL, 3, NULL, 'Accepted', '2020-02-21 11:28:56'),
(66, 'WomensDay', 'Girmiti', 'Office', '', '2020-03-08', '09:32', 'Girmiti, AECS Road', 'Womens day celebration', 'juliet@girmiti.com', '', 2, 'default', '1582264732.jpg', '', '', 'alone', NULL, 1, NULL, 2, NULL, 'Accepted', '2020-02-21 11:46:28'),
(67, 'WomensDay', 'Girmiti', 'Office', '', '2020-03-08', '09:32', 'Girmiti, AECS Road', 'Womens day celebration', 'bindu.v@girmiti.com', '', 2, 'default', '1582264732.jpg', '', '', 'alone', NULL, 0, NULL, 1, NULL, 'Accepted', '2020-02-21 14:13:17'),
(68, 'WomensDay', 'Girmiti', 'Office', '', '2020-03-08', '09:32', 'Girmiti, AECS Road', 'Womens day celebration', 'jom.george@girmiti.com', '', 2, 'default', '1582264732.jpg', '', '', 'with spouse', NULL, 1, NULL, 3, NULL, 'Accepted', '2020-02-21 11:36:59'),
(69, 'WomensDay', 'Girmiti', 'Office', '', '2020-03-08', '09:32', 'Girmiti, AECS Road', 'Womens day celebration', 'jom.george@girmiti.com', '', 2, 'default', '1582265128.jpg', '', '', 'with spouse', NULL, 1, NULL, 3, NULL, 'Accepted', '2020-02-21 11:36:59'),
(70, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'deepmala.mishra@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'with spouse', NULL, 1, NULL, 3, NULL, 'Accepted', '2020-02-29 08:49:17'),
(71, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'sima.kumari@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', ' ', NULL, 0, NULL, 0, NULL, 'Rejected', '2020-03-02 12:01:05'),
(72, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'naga.saathvika@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', NULL, NULL, 0, NULL, 0, NULL, 'Rejected', '2020-02-28 14:28:14'),
(73, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'reshma.itagi@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', ' ', NULL, 0, NULL, 0, NULL, 'Rejected', '2020-03-02 11:55:15'),
(75, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'neel.prabha@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'alone', NULL, 0, NULL, 1, NULL, 'Accepted', '2020-02-29 10:42:03'),
(76, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'ashwini.murthy@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', NULL, NULL, 0, NULL, 0, NULL, NULL, '2020-02-28 14:28:15'),
(77, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'shwetha.karnamadakala@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'alone', NULL, 0, NULL, 1, NULL, 'Accepted', '2020-02-28 17:44:15'),
(78, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'vidyashree.gowda@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'alone', NULL, 0, NULL, 1, NULL, 'Accepted', '2020-03-02 11:40:52'),
(79, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'swathi.revansiddappa@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', ' ', NULL, 0, NULL, 0, NULL, 'Rejected', '2020-03-02 16:39:36'),
(80, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'neethu.jojo@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'alone', NULL, 0, NULL, 1, NULL, 'Accepted', '2020-02-28 16:59:10'),
(81, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'prasanna.bandi@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'alone', NULL, 0, NULL, 1, NULL, 'Accepted', '2020-03-02 12:01:07'),
(82, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'subrata.bose@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', ' ', NULL, 0, NULL, 0, NULL, 'Rejected', '2020-03-02 17:02:09'),
(83, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'kavyashree.mohan@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'alone', NULL, 0, NULL, 1, NULL, 'Accepted', '2020-02-28 15:25:44'),
(84, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'aswini.magesh@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', ' ', NULL, 0, NULL, 0, NULL, 'Rejected', '2020-02-28 15:02:03'),
(85, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'poornima.shet@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', ' ', NULL, 0, NULL, 0, NULL, 'Rejected', '2020-03-03 10:11:49'),
(86, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'sabanta.kumari@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'alone', NULL, 0, NULL, 1, NULL, 'Accepted', '2020-03-02 10:57:13'),
(87, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'sushma.bankolli@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'alone', NULL, 0, NULL, 1, NULL, 'Accepted', '2020-02-28 14:53:50'),
(88, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'jeeshna.jijesh@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', ' ', NULL, 0, NULL, 0, NULL, 'Rejected', '2020-03-03 10:45:45'),
(89, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'sonam.priya@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'alone', NULL, 0, NULL, 1, NULL, 'Accepted', '2020-03-02 17:22:15'),
(90, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'madhavi.perekala@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', ' ', NULL, 0, NULL, 0, NULL, 'Rejected', '2020-02-28 14:36:57'),
(91, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'arbeen.taj@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'with spouse', NULL, 1, NULL, 3, NULL, 'Accepted', '2020-02-28 14:50:13'),
(92, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'divya.seetharam@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'with spouse', NULL, 2, NULL, 4, NULL, 'Accepted', '2020-02-29 10:37:17'),
(93, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'sravanthi.ranga@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', NULL, NULL, 0, NULL, 0, NULL, NULL, '2020-02-28 14:28:17'),
(94, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'shubham.upadhyay@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'alone', NULL, 0, NULL, 1, NULL, 'Accepted', '2020-02-28 14:28:17'),
(95, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'suraksha.rao@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'alone', NULL, 0, NULL, 1, NULL, 'Accepted', '2020-02-28 14:28:17'),
(96, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'anushree.swamy@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'alone', NULL, 0, NULL, 1, NULL, 'Accepted', '2020-02-28 17:50:27'),
(97, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'amara.ganga@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', ' ', NULL, 0, NULL, 0, NULL, 'Rejected', '2020-02-28 14:37:38'),
(98, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'smitha.holla@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'alone', NULL, 0, NULL, 1, NULL, 'Accepted', '2020-03-02 17:25:12'),
(99, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'nirusha.chebiyyam@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'with spouse', NULL, 0, NULL, 2, NULL, 'Accepted', '2020-03-03 10:29:56'),
(100, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'palla.rekha@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'alone', NULL, 0, NULL, 1, NULL, 'Accepted', '2020-02-28 14:28:17'),
(101, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'deekshitha.lokesh@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'alone', NULL, 0, NULL, 1, NULL, 'Accepted', '2020-02-28 14:59:10'),
(102, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'kavya.gautham@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', ' ', NULL, 0, NULL, 0, NULL, 'Rejected', '2020-02-28 14:36:57'),
(103, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'anita.gowda@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', NULL, NULL, 0, NULL, 0, NULL, 'Rejected', '2020-02-28 14:28:18'),
(104, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'priyamvada.chamarthy@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', NULL, NULL, 0, NULL, 0, NULL, 'Rejected', '2020-02-28 14:28:18'),
(105, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'gajula.padmaja@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'alone', NULL, 0, NULL, 1, NULL, 'Accepted', '2020-02-28 17:57:42'),
(106, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'bindu.v@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'alone', NULL, 1, NULL, 2, NULL, 'Accepted', '2020-03-02 14:44:23'),
(107, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'prabha@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'with spouse', NULL, 0, NULL, 2, NULL, 'Accepted', '2020-02-28 14:36:34'),
(108, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'reshma@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'alone', NULL, 1, NULL, 2, NULL, 'Accepted', '2020-03-03 15:32:55'),
(109, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'chira@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'alone', NULL, 0, NULL, 1, NULL, 'Accepted', '2020-03-03 15:34:59'),
(110, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'sruthisree.utti@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', ' ', NULL, 0, NULL, 0, NULL, 'Rejected', '2020-03-02 11:52:27'),
(111, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'asha.acharya@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'with spouse', NULL, 1, NULL, 3, NULL, 'Accepted', '2020-02-28 14:28:19'),
(112, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'juliet@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'alone', NULL, 1, NULL, 2, NULL, 'Accepted', '2020-02-28 14:28:19'),
(113, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'pavan.shetty@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', ' ', NULL, 0, NULL, 0, NULL, 'Rejected', '2020-03-03 15:39:43'),
(114, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'naresh.yadav@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'with spouse', NULL, 0, NULL, 2, NULL, 'Accepted', '2020-03-03 18:02:13'),
(115, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'girish.kumar@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'with spouse', NULL, 2, NULL, 4, NULL, 'Accepted', '2020-03-02 17:53:33'),
(116, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'amith.sharavathi@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', NULL, NULL, 0, NULL, 0, NULL, NULL, '2020-02-28 14:28:19'),
(117, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'ajinkya.jadhav@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'alone', NULL, 0, NULL, 1, NULL, 'Accepted', '2020-03-02 12:21:47'),
(118, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'abhilash.aswath@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', NULL, NULL, 0, NULL, 0, NULL, 'Rejected', '2020-02-28 14:28:19'),
(119, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'manish.chandra@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'alone', NULL, 1, NULL, 2, NULL, 'Accepted', '2020-03-02 19:14:40'),
(120, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'karimullah.syed@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', NULL, NULL, 0, NULL, 0, NULL, NULL, '2020-02-28 14:28:20'),
(121, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'vasudeva.rao@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', NULL, NULL, 0, NULL, 0, NULL, NULL, '2020-02-28 14:28:20'),
(122, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'nageswara.rao@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', NULL, NULL, 0, NULL, 0, NULL, 'Rejected', '2020-02-28 14:28:20'),
(123, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'sunil.seetharam@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', ' ', NULL, 0, NULL, 0, NULL, 'Rejected', '2020-03-02 14:42:19'),
(124, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'vijaya.kumar@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', NULL, NULL, 0, NULL, 0, NULL, 'Rejected', '2020-02-28 14:28:20'),
(125, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'vikram.devara@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', NULL, NULL, 0, NULL, 0, NULL, NULL, '2020-02-28 14:28:20'),
(127, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'shivakumar.borkar@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', ' ', NULL, 0, NULL, 0, NULL, 'Rejected', '2020-03-03 15:24:26'),
(128, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'satyabrata.panda@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'alone', NULL, 0, NULL, 1, NULL, 'Accepted', '2020-03-03 16:27:16'),
(129, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'gyanendra.kumar@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', NULL, NULL, 0, NULL, 0, NULL, NULL, '2020-02-28 14:28:20'),
(130, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'shrinivas.godabole@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'with spouse', NULL, 2, NULL, 0, NULL, 'Accepted', '2020-02-28 14:28:21'),
(131, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'robin.dias@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', NULL, NULL, 0, NULL, 0, NULL, NULL, '2020-02-28 14:28:21'),
(132, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'kopresh.desai@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'with spouse', NULL, 2, NULL, 4, NULL, 'Accepted', '2020-03-03 14:40:21'),
(134, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'revanna.shekar@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'alone', NULL, 0, NULL, 1, NULL, 'Accepted', '2020-02-28 17:42:42'),
(135, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'vinay.shankar@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', 'with spouse', NULL, 2, NULL, 4, NULL, 'Accepted', '2020-03-02 14:08:14'),
(136, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'chandrappa.raju@girmiti.com', '', 1, 'default', '1582880241.jpg', '', '', NULL, NULL, 0, NULL, 0, NULL, NULL, '2020-02-28 14:28:21'),
(137, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'pragati.jawale@girmiti.com', '', 1, 'default', '1582895246.jpg', '', '', ' ', NULL, 0, NULL, 0, NULL, 'Rejected', '2020-03-03 15:21:06'),
(138, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'vikram.kumar@girmiti.com', '', 1, 'default', '1582895246.jpg', '', '', 'with spouse', NULL, 0, NULL, 2, NULL, 'Accepted', '2020-02-28 19:07:16'),
(139, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'jayesh.dewangan@girmiti.com', '', 1, 'default', '1582895246.jpg', '', '', 'with spouse', NULL, 1, NULL, 3, NULL, 'Accepted', '2020-02-29 11:47:32'),
(140, 'Womens Day', 'Girmiti', 'Girmiti', '', '2020-03-08', '09:30', 'Girmiti Office', 'Happy Womens Day', 'ajaykumar.a@girmiti.com', '', 1, 'default', '1582898028.jpg', '', '', 'with spouse', NULL, 1, NULL, 3, NULL, 'Accepted', '2020-02-28 19:24:33');

-- --------------------------------------------------------

--
-- Table structure for table `members_table`
--

CREATE TABLE `members_table` (
  `Id` int(11) NOT NULL,
  `salutation` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `emailId` varchar(256) NOT NULL,
  `phone_num` varchar(25) DEFAULT 'NULL',
  `groupId` varchar(256) DEFAULT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `father_num` varchar(20) DEFAULT NULL,
  `alone` varchar(20) DEFAULT NULL,
  `spose` varchar(20) DEFAULT NULL,
  `Child` varchar(20) DEFAULT NULL,
  `others` varchar(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `groupname` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members_table`
--

INSERT INTO `members_table` (`Id`, `salutation`, `name`, `emailId`, `phone_num`, `groupId`, `father_name`, `father_num`, `alone`, `spose`, `Child`, `others`, `status`, `groupname`) VALUES
(89, 'Mr.', 'Imtiyaz Ahmad', 'imtiyaz.ahmad@girmiti.com', '9880786298', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(88, 'Mr.', 'Rudra Hatti', 'rudra.hatti@girmiti.com', '9876543210', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(86, 'Mr.', 'Kumar Swamy', 'kumar.s@girmiti.com', '9482872725', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(87, 'Mr.', 'Kempa Raj ', 'raj.k@girmiti.com', '9620558999', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(85, 'Mr.', 'Sajesh Babu', 'sajesh.babu@girmiti.com', '9986017324', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(83, 'Mr.', 'Girish Padki', 'girish.padki@girmiti.com', '9845899291', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(84, 'Mr.', 'Prakash Acharya ', 'prakash@girmiti.com', '9845659195', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(82, 'Mr.', 'Prasad Theertha', 'prasad@girmiti.com', '9986027672', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(81, 'Mr.', 'Jagannath Desai', 'jagannath.desai@girmiti.com', '9740096333', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(80, 'Mr.', 'Janardhan', 'jana@girmiti.com', '9876543210', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(77, 'Mr.', 'Rajesh BS', 'rajesh.bs@girmiti.com', '9945598412', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(78, 'Mr.', 'Ravi Kumar K', 'ravikumar.k@girmiti.com', '9876543210', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(79, 'Mr.', 'Tony Leo', 'tony@girmiti.com', '9880164419', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(76, 'Mr.', 'Sibin Issac', 'sibin.issac@girmiti.com', '8123771280', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(75, 'Mr.', 'Jom George', 'jom.george@girmiti.com', '7353731393', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(74, 'Mr.', 'Sreekanth Kunnathur', 'sreekanth.kunnathur@girmiti.com', '9876543210', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(73, 'Mr.', 'Rajesh Somasela', 'rajesh.somasela@girmiti.com', '9845475828', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(72, 'Mr.', 'Prithvi Prasad', 'prithvi.prasad@girmiti.com', '9620601502', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(71, 'Mr.', 'Vasuki Raghavan', 'vasuki.raghavan@girmiti.com', '9901011055', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(70, 'Mr.', 'Pradeep Rao', 'pradeep.rao@girmiti.com', '7090595034', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(69, 'Mr', 'Gireesh Desai', 'gireesh.desai@girmiti.com', '9986035785', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(68, 'Mr', 'Veerendra Diggavi', 'veerendra.diggavi@girmiti.com', '9916904185', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(67, 'Mr.', 'Mallanna Kannur', 'mallanna.kannur@girmiti.com', '9739863050', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(66, 'Mr.', 'Nazeer Saheb', 'nazeer.saheb@girmiti.com', '9986448987', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(65, 'Mr.', 'Reddy', 'reddy@girmiti.com', '8095466688', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(90, 'Mr.', 'Anand B', 'anand.b@girmiti.com', '9845597894', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(91, 'Mr.', 'Raghavendra Ramesh', 'raghavendra.ramesh@girmiti.com', '9945690803', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(92, 'Mr.', 'Vasanth Upadhya', 'vasanth.upadhya@girmiti.com', '9983438484', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(93, 'Mr.', 'Stanley', 'stanley@girmiti.com', '9620278594', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(94, 'Mr.', 'Suresh Patel', 'suresh.patel@girmiti.com', '8889998889', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(95, 'Mr.', 'Venkata Sivaram', 'venkata.sivaram@girmiti.com', '7677776677', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(96, 'Mr.', 'Suresh Kumar', 'suresh.kumar@girmiti.com', '7655654545', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(97, 'Mr.', 'Rajashekhar', 'rajasekhar.kaliki@girmiti.com', '6788788676', '49', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Directors'),
(98, 'Mrs', 'Chira', 'chira@girmiti.com', '8095480190', '50', NULL, NULL, '', '', '', '', 0, 'HR'),
(99, 'Mrs', 'Reshma', 'reshma@girmiti.com', '6778788888', '50', NULL, NULL, '', '', '', '', 0, 'HR'),
(100, 'Mrs', 'Prabha', 'prabha@girmiti.com', '6778888888', '50', NULL, NULL, '', '', '', '', 0, 'HR'),
(101, 'Mrs', 'Bindu', 'bindu.v@girmiti.com', '7877888787', '50', NULL, NULL, '', '', '', '', 0, 'HR'),
(102, 'Mrs', 'Juliet', 'juliet@girmiti.com', '8787878787', '50', NULL, NULL, '', '', '', '', 0, 'HR'),
(103, 'Mrs', 'Asha', 'asha.acharya@girmiti.com', '8787878787', '50', NULL, NULL, '', '', '', '', 0, 'HR'),
(104, 'Mrs', 'Sruthisree', 'sruthisree.utti@girmiti.com', '8788878787', '50', NULL, NULL, '', '', '', '', 0, 'HR'),
(105, 'Miss.', 'Poornima Shet', 'poornima.shet@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(106, 'Miss.', 'Swathi R', 'swathi.revansiddappa@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(107, 'Miss.', 'Reshma F Itagi', 'reshma.itagi@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(108, 'Miss.', 'Anita B', 'anita.gowda@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(109, 'Miss.', 'Smitha H', 'smitha.holla@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(110, 'Miss.', 'R Sravanthi', 'sravanthi.ranga@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(111, 'Miss.', 'Jeeshna Jijesh', 'jeeshna.jijesh@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(112, 'Miss.', 'Subrata Bose', 'subrata.bose@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(113, 'Miss.', 'Ashwini B O', 'ashwini.murthy@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(114, 'Miss.', 'Deepmala Mishra', 'deepmala.mishra@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(115, 'Miss.', 'Palla Rekha', 'palla.rekha@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(116, 'Miss.', 'Suraksha V R', 'suraksha.rao@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(117, 'Miss.', 'Madhavi Perekela', 'madhavi.perekala@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(118, 'Miss.', 'Aswini M', 'aswini.magesh@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(119, 'Miss.', 'Vidyashree D.N', 'vidyashree.gowda@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(120, 'Miss.', 'Naga Saathvika M', 'naga.saathvika@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(121, 'Miss.', 'Kavya V', 'kavya.gautham@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(122, 'Miss.', 'Amaraganga Y', 'amara.ganga@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(123, 'Miss.', 'Divya Seetharam', 'divya.seetharam@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(124, 'Miss.', 'Sushma S Bankolli', 'sushma.bankolli@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(125, 'Miss.', 'Prasanna Bandi', 'prasanna.bandi@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(126, 'Miss.', 'Neel Prabha Yadu', 'neel.prabha@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(127, 'Miss.', 'Gajula Padmaja', 'gajula.padmaja@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(128, 'Miss.', 'Nirusha Chebiyyam', 'nirusha.chebiyyam@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(129, 'Miss.', 'Shubham Upadhyay', 'shubham.upadhyay@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(130, 'Miss.', 'Sonam Priya Padhi', 'sonam.priya@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(131, 'Miss.', 'Kavyashree K M', 'kavyashree.mohan@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(132, 'Miss.', 'Shwetha K', 'shwetha.karnamadakala@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(133, 'Miss.', 'Sima Kumari', 'sima.kumari@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(134, 'Miss.', 'Deekshitha L', 'deekshitha.lokesh@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(135, 'Miss.', 'Anushree H S', 'anushree.swamy@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(136, 'Miss.', 'Arbeen Taj A', 'arbeen.taj@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(137, 'Miss.', 'Sabanta Kumari', 'sabanta.kumari@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(138, 'Miss.', 'Neethu Jojo', 'neethu.jojo@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(139, 'Miss.', 'Pragati Jawale', 'pragati.jawale@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(140, 'Miss.', 'Priyamvada C', 'priyamvada.chamarthy@girmiti.com', '9876543210', '51', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Womens'),
(141, 'Mr.', 'Kopresh N Desai', 'kopresh.desai@girmiti.com', '9876543210', '52', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Managers'),
(142, 'Mr.', 'Satyabrata Panda', 'satyabrata.panda@girmiti.com', '9876543210', '52', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Managers'),
(143, 'Mr.', 'Vijaya Kumar C', 'vijaya.kumar@girmiti.com', '9876543210', '52', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Managers'),
(144, 'Mr.', 'Karimullah Syed', 'karimullah.syed@girmiti.com', '9876543210', '52', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Managers'),
(145, 'Mr.', 'Amith S', 'amith.sharavathi@girmiti.com', '9876543210', '52', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Managers'),
(146, 'Mr.', 'Pavan Shetty A', 'pavan.shetty@girmiti.com', '9876543210', '52', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Managers'),
(147, 'Mr.', 'Revanna B S', 'revanna.shekar@girmiti.com', '9876543210', '52', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Managers'),
(148, 'Mr.', 'Shrinivas K Godabole', 'shrinivas.godabole@girmiti.com', '9876543210', '52', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Managers'),
(149, 'Mr.', 'Vikram Kumar', 'vikram.kumar@girmiti.com', '9876543210', '52', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Managers'),
(150, 'Mr.', 'Gummadi Nageswara Rao', 'nageswara.rao@girmiti.com', '9876543210', '52', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Managers'),
(151, 'Mr.', 'Abhilash A', 'abhilash.aswath@girmiti.com', '9876543210', '52', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Managers'),
(152, 'Mr.', 'V Naresh Yadav ', 'naresh.yadav@girmiti.com', '9876543210', '52', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Managers'),
(153, 'Mr.', 'Vinay Shankar', 'vinay.shankar@girmiti.com', '9876543210', '52', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Managers'),
(154, 'Mr.', 'Robin Dias', 'robin.dias@girmiti.com', '9876543210', '52', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Managers'),
(155, 'Mr.', 'Shiva Kumar B P', 'shivakumar.borkar@girmiti.com', '9876543210', '52', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Managers'),
(156, 'Mr.', 'Sunil A S', 'sunil.seetharam@girmiti.com', '9876543210', '52', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Managers'),
(157, 'Mr.', 'Manish Chandra Singh', 'manish.chandra@girmiti.com', '9876543210', '52', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Managers'),
(158, 'Mr.', 'Girish Kumar B L', 'girish.kumar@girmiti.com', '9876543210', '52', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Managers'),
(159, 'Mr.', 'Chandrappa S R', 'chandrappa.raju@girmiti.com', '9876543210', '52', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Managers'),
(160, 'Mr.', 'Jayesh Dewangan', 'jayesh.dewangan@girmiti.com', '9876543210', '52', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Managers'),
(161, 'Mr.', 'Gyanendra Kumar', 'gyanendra.kumar@girmiti.com', '9876543210', '52', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Managers'),
(162, 'Mr.', 'Vikram Devara', 'vikram.devara@girmiti.com', '9876543210', '52', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Managers'),
(163, 'Mr.', 'Vasudeva Rao Nakarikanti', 'vasudeva.rao@girmiti.com', '9876543210', '52', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Managers'),
(164, 'Mr.', 'Ajinkya Vijay Jadhav ', 'ajinkya.jadhav@girmiti.com', '9876543210', '52', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Managers'),
(165, 'Mr', 'Ajay Kumar', 'ajaykumar.a@girmiti.com', '9876543210', '52', NULL, NULL, '', '', '', '', 0, 'Managers');

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
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`EmpId`, `emailId`, `password`, `roleId`, `status`) VALUES
(1, 'admin', 'girmiti01', 0, 1),
(87, 'reddy@girmiti.com', 'girmiti01', 1, 0),
(88, 'nazeer.saheb@girmiti.com', 'girmiti01', 1, 0),
(89, 'mallanna.kannur@girmiti.com', 'girmiti01', 1, 0),
(90, 'veerendra.diggavi@girmiti.com', 'girmiti01', 1, 0),
(91, 'gireesh.desai@girmiti.com', 'Girmiti@12345', 1, 1),
(92, 'pradeep.rao@girmiti.com', 'girmiti01', 1, 0),
(93, 'vasuki.raghavan@girmiti.com', 'girmiti01', 1, 0),
(94, 'prithvi.prasad@girmiti.com', 'girmiti01', 1, 1),
(95, 'rajesh.somasela@girmiti.com', 'girmiti01', 1, 0),
(96, 'sreekanth.kunnathur@girmiti.com', 'girmiti01', 1, 0),
(97, 'jom.george@girmiti.com', 'girmiti01', 1, 0),
(98, 'sibin.issac@girmiti.com', 'girmiti01', 1, 0),
(99, 'rajesh.bs@girmiti.com', 'girmiti01', 1, 0),
(100, 'ravikumar.k@girmiti.com', 'girmiti01', 1, 0),
(101, 'tony@girmiti.com', 'girmiti01', 1, 0),
(102, 'jana@girmiti.com', 'girmiti01', 1, 0),
(103, 'jagannath.desai@girmiti.com', 'girmiti01', 1, 0),
(104, 'prasad@girmiti.com', 'girmiti01', 1, 0),
(105, 'girish.padki@girmiti.com', 'girmiti01', 1, 0),
(106, 'prakash@girmiti.com', 'girmiti01', 1, 0),
(107, 'sajesh.babu@girmiti.com', 'girmiti01', 1, 0),
(108, 'kumar.s@girmiti.com', 'girmiti01', 1, 0),
(109, 'raj.k@girmiti.com', 'girmiti01', 1, 0),
(110, 'rudra.hatti@girmiti.com', 'girmiti01', 1, 0),
(111, 'imtiyaz.ahmad@girmiti.com', 'girmiti01', 1, 0),
(112, 'anand.b@girmiti.com', 'girmiti01', 1, 0),
(113, 'raghavendra.ramesh@girmiti.com', 'girmiti01', 1, 0),
(114, 'vasanth.upadhya@girmiti.com', 'vasanth103', 1, 1),
(115, 'stanley@girmiti.com', 'girmiti01', 1, 0),
(116, 'suresh.patel@girmiti.com', 'girmiti01', 1, 0),
(117, 'venkata.sivaram@girmiti.com', 'girmiti01', 1, 0),
(118, 'suresh.kumar@girmiti.com', 'girmiti01', 1, 0),
(119, 'rajasekhar.kaliki@girmiti.com', 'girmiti01', 1, 0),
(120, 'chira@girmiti.com', 'girmiti01', 1, 0),
(121, 'reshma@girmiti.com', 'girmiti01', 1, 0),
(122, 'prabha@girmiti.com', 'girmiti01', 1, 0),
(123, 'bindu.v@girmiti.com', 'girmiti01', 1, 0),
(124, 'juliet@girmiti.com', 'girmiti01', 1, 0),
(125, 'asha.acharya@girmiti.com', 'girmiti01', 1, 0),
(126, 'sruthisree.utti@girmiti.com', 'girmiti01', 1, 0),
(127, 'poornima.shet@girmiti.com', 'girmiti01', 1, 0),
(128, 'swathi.revansiddappa@girmiti.com', 'girmiti01', 1, 0),
(129, 'reshma.itagi@girmiti.com', 'girmiti01', 1, 0),
(130, 'anita.gowda@girmiti.com', 'girmiti01', 1, 0),
(131, 'smitha.holla@girmiti.com', 'girmiti01', 1, 1),
(132, 'sravanthi.ranga@girmiti.com', 'girmiti01', 1, 0),
(133, 'jeeshna.jijesh@girmiti.com', 'girmiti01', 1, 0),
(134, 'subrata.bose@girmiti.com', 'girmiti01', 1, 0),
(135, 'ashwini.murthy@girmiti.com', 'girmiti01', 1, 0),
(136, 'deepmala.mishra@girmiti.com', 'girmiti01', 1, 0),
(137, 'palla.rekha@girmiti.com', 'girmiti01', 1, 0),
(138, 'suraksha.rao@girmiti.com', 'girmiti01', 1, 0),
(139, 'madhavi.perekala@girmiti.com', 'girmiti01', 1, 0),
(140, 'aswini.magesh@girmiti.com', 'girmiti01', 1, 0),
(141, 'vidyashree.gowda@girmiti.com', 'girmiti01', 1, 0),
(142, 'naga.saathvika@girmiti.com', 'girmiti01', 1, 0),
(143, 'kavya.gautham@girmiti.com', 'girmiti01', 1, 0),
(144, 'amara.ganga@girmiti.com', 'girmiti01', 1, 0),
(145, 'divya.seetharam@girmiti.com', 'girmiti01', 1, 0),
(146, 'sushma.bankolli@girmiti.com', 'girmiti01', 1, 0),
(147, 'prasanna.bandi@girmiti.com', 'girmiti01', 1, 0),
(148, 'neel.prabha@girmiti.com', 'girmiti01', 1, 0),
(149, 'gajula.padmaja@girmiti.com', 'girmiti01', 1, 1),
(150, 'nirusha.chebiyyam@girmiti.com', 'girmiti01', 1, 0),
(151, 'shubham.upadhyay@girmiti.com', 'girmiti01', 1, 0),
(152, 'sonam.priya@girmiti.com', 'girmiti01', 1, 0),
(153, 'kavyashree.mohan@girmiti.com', 'girmiti01', 1, 0),
(154, 'shwetha.karnamadakala@girmiti.com', 'girmiti01', 1, 0),
(155, 'sima.kumari@girmiti.com', 'girmiti01', 1, 0),
(156, 'deekshitha.lokesh@girmiti.com', 'girmiti01', 1, 0),
(157, 'anushree.swamy@girmiti.com', 'girmiti01', 1, 0),
(158, 'arbeen.taj@girmiti.com', 'girmiti01', 1, 0),
(159, 'sabanta.kumari@girmiti.com', 'girmiti01', 1, 0),
(160, 'neethu.jojo@girmiti.com', 'girmiti01', 1, 0),
(161, 'pragati.jawale@girmiti.com', 'girmiti01', 1, 0),
(162, 'priyamvada.chamarthy@girmiti.com', 'Asd@1234', 1, 1),
(163, 'kopresh.desai@girmiti.com', 'girmiti01', 1, 0),
(164, 'satyabrata.panda@girmiti.com', 'girmiti01', 1, 0),
(165, 'vijaya.kumar@girmiti.com', 'girmiti01', 1, 0),
(166, 'karimullah.syed@girmiti.com', 'girmiti01', 1, 0),
(167, 'amith.sharavathi@girmiti.com', 'girmiti01', 1, 0),
(168, 'pavan.shetty@girmiti.com', 'girmiti01', 1, 0),
(169, 'revanna.shekar@girmiti.com', 'girmiti01', 1, 0),
(170, 'shrinivas.godabole@girmiti.com', 'girmiti01', 1, 0),
(171, 'vikram.kumar@girmiti.com; ', 'girmiti01', 1, 0),
(172, 'nageswara.rao@girmiti.com', 'girmiti01', 1, 0),
(173, 'abhilash.aswath@girmiti.com', 'Abhilash1', 1, 1),
(174, 'naresh.yadav@girmiti.com', 'girmiti01', 1, 0),
(175, 'vinay.shankar@girmiti.com', 'girmiti01', 1, 0),
(176, 'robin.dias@girmiti.com', 'girmiti01', 1, 0),
(177, 'shivakumar.borkar@girmiti.com', 'girmiti01', 1, 0),
(178, 'sunil.seetharam@girmiti.com', 'girmiti01', 1, 0),
(179, 'manish.chandra@girmiti.com', 'girmiti01', 1, 0),
(180, 'girish.kumar@girmiti.com', 'girmiti01', 1, 0),
(181, 'chandrappa.raju@girmiti.com', 'girmiti01', 1, 0),
(182, 'jayesh.dewangan@girmiti.com; ', 'girmiti01', 1, 0),
(183, 'gyanendra.kumar@girmiti.com', 'girmiti01', 1, 0),
(184, 'vikram.devara@girmiti.com', 'girmiti01', 1, 0),
(185, 'vasudeva.rao@girmiti.com', 'girmiti01', 1, 0),
(186, 'ajinkya.jadhav@girmiti.com', 'girmiti01', 1, 0),
(187, 'ajaykumar.a@girmiti.com', 'girmiti01', 1, 1);

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
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `emailId` (`emailId`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `invitations_request_table`
--
ALTER TABLE `invitations_request_table`
  MODIFY `Invitation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `invitations_response_table`
--
ALTER TABLE `invitations_response_table`
  MODIFY `Invitation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `members_table`
--
ALTER TABLE `members_table`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `EmpId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
