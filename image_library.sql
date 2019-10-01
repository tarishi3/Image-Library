-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 01, 2019 at 01:44 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `image_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_ID`, `name`) VALUES
(1, 'Nature\r\n'),
(2, 'Portrait'),
(3, 'People'),
(4, 'Architecture'),
(5, 'Animals'),
(6, 'Sports'),
(7, 'Travel');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `User_ID` int(11) NOT NULL,
  `Pictures_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `ID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Category` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`ID`, `Title`, `Category`, `Image`) VALUES
(1, 'Blonde', 2, 'hero_bg_1.jpg'),
(2, 'Blonde', 2, 'hero_bg_2.jpg'),
(3, 'Brunette', 2, 'hero_bg_3.jpg'),
(4, 'Black & White', 2, 'img_2.jpg'),
(5, 'Still', 2, 'img_7.jpg'),
(6, 'Teen', 2, 'person_1.jpg'),
(7, 'Happiness', 2, 'person_2.jpg'),
(8, 'Title', 2, 'person_3.jpg'),
(9, 'Title', 2, 'person_4.jpg'),
(10, 'Title', 2, 'person_5.jpg'),
(11, 'Title', 2, 'person_6.jpg'),
(12, 'Palms', 1, 'img_1.jpg'),
(13, 'Fogg', 1, 'nature_small_1.jpg'),
(14, 'Forest', 1, 'nature_small_2.jpg'),
(15, 'Butterfly', 1, 'nature_small_3.jpg'),
(16, 'River', 1, 'nature_small_4.jpg'),
(17, 'Waterfall', 1, 'nature_small_5.jpg'),
(18, 'Waterfall', 1, 'nature_small_6.jpg'),
(19, 'Dew Drops', 1, 'nature_small_7.jpg'),
(20, 'Mirror Effect', 1, 'nature_small_8.jpg'),
(21, 'Railway Tracks', 1, 'nature_small_9.jpg'),
(22, 'Friends', 3, 'img_3.jpg'),
(23, 'Skyline', 4, 'img_4.jpg'),
(24, 'Historic Monument', 4, 'img_7.jpg'),
(25, 'Tiger', 5, 'img_5.jpg'),
(26, 'Butterfly', 5, 'nature_small_3.jpg'),
(27, 'Running', 6, 'img_6.jpg'),
(28, 'Historic Monument', 7, 'img_7.jpg'),
(29, 'Railway Tracks', 7, 'nature_small_9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `User_ID` int(11) NOT NULL,
  `Pictures_ID` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `Role_ID` int(11) NOT NULL,
  `Name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`Role_ID`, `Name`) VALUES
(1, 'Admin'),
(2, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(11) NOT NULL,
  `First_Name` varchar(25) NOT NULL,
  `Last_Name` varchar(25) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Salt` varchar(30) NOT NULL,
  `Role_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `First_Name`, `Last_Name`, `Email`, `Username`, `Password`, `Salt`, `Role_ID`) VALUES
(4, 'sa', 'sa', 'sa@gmail.com', 'sa', '$2x$05$c12e01f2a13ff5587e1e9eEnjJ0Y3b88ZsWqHOO9ynejAnB5c.jQm', '$2x$05$c12e01f2a13ff5587e1e9e$', 2),
(5, 'demo', 'demo', 'demo@gmail.com', 'demo', '$2a$05$fe01ce2a7fbac8fafaed7Ox7.YZOJLWkeffuYjT8Oi6SQKQO0i.7m', '$2a$05$fe01ce2a7fbac8fafaed7c$', 2),
(6, 'Tarishi', 'Pandya', 'taru@gmail.com', 'taru', '$2x$05$1133b2215da6b5d0417e6uO0FfNKjJxiRrG79/l6j2Rfj1dChY6jO', '$2x$05$1133b2215da6b5d0417e62$', 1),
(7, 'Sudip', 'Chitroda', 's@gmail.com', 'Sudip', '$2a$05$896f90dc10147474647f0O/bVvFQ.6VnUH.bsvByXt2FRD7lHO3xS', '$2a$05$896f90dc10147474647f0c$', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_ID`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`User_ID`,`Pictures_ID`),
  ADD KEY `favorites_pictureID_fk` (`Pictures_ID`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Category` (`Category`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`User_ID`,`Pictures_ID`),
  ADD KEY `rating_pictureID_fk` (`Pictures_ID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Role_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD KEY `User_Role_ID_FK` (`Role_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_pictureID_fk` FOREIGN KEY (`Pictures_ID`) REFERENCES `pictures` (`ID`);

--
-- Constraints for table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `pictures_ibfk_1` FOREIGN KEY (`Category`) REFERENCES `categories` (`category_ID`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `rating_pictureID_fk` FOREIGN KEY (`Pictures_ID`) REFERENCES `pictures` (`ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `User_Role_ID_FK` FOREIGN KEY (`Role_ID`) REFERENCES `roles` (`Role_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
