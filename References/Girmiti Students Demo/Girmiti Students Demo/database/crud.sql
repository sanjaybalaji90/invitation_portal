-- phpMyAdmin SQL Dump
-- version 4.6.4
-- Server version: 5.7.14
-- PHP Version: 5.6.25


--
-- Database: `crudphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `country` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_name`, `email_address`, `contact`, `gender`, `country`, `datetime`) VALUES
(1, 'Isabella', 'isabella5345@yahoo.com', '01711000005', 'Female', 'Costa Rica', '2017-08-27 20:11:50'),
(2, 'Sophia', 'sophia345435@gmail.com', '01711000004', 'Female', 'Belgium', '2017-08-27 20:10:55'),
(3, 'William', 'william3453453@gmail.com', '01711000003', 'Male', 'Brazil', '2017-08-27 20:10:08'),
(4, 'Nahid', 'nahid345435@yahoo.com', '01711000002', 'Male', 'Bangladesh', '2017-08-27 19:57:35'),
(5, 'Arif', 'arif353535@gmail.com', '01711000001', 'Male', 'Bangladesh', '2017-08-27 20:04:13'),
(6, 'Md. Rubel', 'rubel3543453@gmail.com', '01712000000', 'Male', 'Bangladesh', '2017-08-27 19:56:20'),
(7, 'Michael', 'michael3543453@gmail.com', '01711000006', 'Male', 'Ecuador', '2017-08-27 20:13:02'),
(8, 'Suman', 'suman3534535@gmail.com', '01711000007', 'Male', 'India', '2017-08-27 20:13:55'),
(9, 'James', 'james35353@gmail.com', '01711000009', 'Male', 'United Kingdom', '2017-08-27 20:16:05'),
(11, 'Asik', 'asik34535@gmail.com', '01712000010', 'Male', 'Bangladesh', '2017-08-27 20:19:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- End -- Girmiti Students Demo
--
