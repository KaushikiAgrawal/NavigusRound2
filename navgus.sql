-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jun 14, 2020 at 02:43 PM
-- Server version: 5.0.27
-- PHP Version: 5.2.1
-- 
-- Database: `navgus`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `login`
-- 

CREATE TABLE `login` (
  `Email` varchar(50) character set armscii8 NOT NULL,
  `Password` varchar(40) character set armscii8 NOT NULL,
  `avatar` varchar(50) character set armscii8 NOT NULL,
  PRIMARY KEY  (`Email`),
  KEY `avatar` (`avatar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `login`
-- 

INSERT INTO `login` (`Email`, `Password`, `avatar`) VALUES 
('adda@gmal.com', 'zxcvbnm', 'ab1.jpg'),
('h@gmal.com', 'zxcvbn', 'ab3.png'),
('kaushiki.agrawal2019@vitstudent.ac.in', 'hello12', 'ab1.jpg'),
('sr@gmal.com', 'hello123', 'ab3.png');

-- --------------------------------------------------------

-- 
-- Table structure for table `reg`
-- 

CREATE TABLE `reg` (
  `Fname` varchar(30) character set ascii NOT NULL,
  `Lname` varchar(30) character set ascii default NULL,
  `Email` varchar(50) character set ascii NOT NULL,
  `Password` varchar(20) character set ascii NOT NULL,
  `Avatar` varchar(50) character set armscii8 NOT NULL,
  PRIMARY KEY  (`Email`),
  KEY `Avatar` (`Avatar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `reg`
-- 

INSERT INTO `reg` (`Fname`, `Lname`, `Email`, `Password`, `Avatar`) VALUES 
('adda', 'asd', 'adda@gmal.com', 'zxcvbnm', 'ab1.jpg'),
('am', 'asd', 'h@gmal.com', 'zxcvbn', 'ab3.png'),
('kaush', 'agrawal', 'kaushiki.agrawal2019@vitstudent.ac.in', 'hello12', 'ab1.jpg'),
('shreyansh', 'narayan', 'sr@gmal.com', 'hello123', 'ab3.png');

-- 
-- Constraints for dumped tables
-- 

-- 
-- Constraints for table `login`
-- 
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`avatar`) REFERENCES `reg` (`Avatar`) ON DELETE CASCADE ON UPDATE CASCADE;
