-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 29, 2024 at 08:47 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MKCleaning`
--
CREATE DATABASE IF NOT EXISTS `MKCleaning` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `MKCleaning`;
-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `admin_id` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `passwordHash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Booking`
--

CREATE TABLE `Booking` (
  `bookingID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `bookingDate` date NOT NULL,
  `bookingTime` time NOT NULL,
  `Status` enum('Scheduled','Completed','Cancelled') NOT NULL,
  `Frequency` enum('One-time','Weekly','Bi-Weekly','Monthly') DEFAULT NULL,
  `description` text NOT NULL,
  `basePrice` int(4) NOT NULL,
  `ratePerSquareFoot` decimal(10,2) NOT NULL,
  `Category` enum('Residential','Commercial') NOT NULL,
  `dateBooked` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `message` text DEFAULT NULL,
  `promoCode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Booking`
--

INSERT INTO `Booking` (`bookingID`, `customerID`, `bookingDate`, `bookingTime`, `Status`, `Frequency`, `description`, `basePrice`, `ratePerSquareFoot`, `Category`, `dateBooked`, `message`, `promoCode`) VALUES
(1, 1, '2024-05-24', '14:00:00', 'Scheduled', 'Weekly', 'Clean room', 100, 189.00, 'Residential', '2024-05-21 18:14:42', 'Every thursday', 'Sun24'),
(2, 1, '2024-05-25', '14:00:00', 'Scheduled', 'One-time', 'Clean room', 100, 236.25, 'Residential', '2024-05-21 18:15:51', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `BookingPromotions`
--

CREATE TABLE `BookingPromotions` (
  `bookingID` int(11) NOT NULL,
  `promotionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `customerID` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `contactNumber` varchar(20) NOT NULL,
  `passwordHash` varchar(255) NOT NULL,
  `Address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`customerID`, `firstName`, `lastName`, `Email`, `contactNumber`, `passwordHash`, `Address`) VALUES
(1, 'Rolly Jake', 'Gayo', 'rj0gayo@gmail.com', '514-111-1111', '$2y$10$g4r97NfUfHvLsE5ellTrvu49dknjEJbf5PisNZf8qM/wrNObZAmeC', '5899 Av Victoria'),
(2, 'Steve', 'Jobs', 'steve@gmail.com', '514-222-4444', '$2y$10$ZYqeQ6BWGGnYP6g3sK6Q8.H.ssV7qkAmCH/kvV387fpCqOjVsxhwS', '4087 Av Linton');

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `paymentID` int(11) NOT NULL,
  `bookingID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `total_price` decimal(11,2) NOT NULL,
  `cardName` varchar(255) NOT NULL,
  `cardNumber` text NOT NULL,
  `expirationDate` date NOT NULL,
  `postalCode` varchar(32) NOT NULL,
  `billingAddress` varchar(255) NOT NULL,
  `paymentDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Payment`
--

INSERT INTO `Payment` (`paymentID`, `bookingID`, `customerID`, `total_price`, `cardName`, `cardNumber`, `expirationDate`, `postalCode`, `billingAddress`, `paymentDate`) VALUES
(1, 1, 1, 260.10, 'Rolly Jake Gayo', '1111 1111 1111 1111', '2027-11-21', 'H3W 2R6', '5899 Av Victoria', '2024-05-21 18:14:42'),
(2, 2, 1, 336.25, 'Rolly Jake Gayo', '1111 1111 1111 1111', '2025-11-21', 'H3W 2R6', '5899 Av Victoria', '2024-05-21 18:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `Promotions`
--

CREATE TABLE `Promotions` (
  `promotionID` int(11) NOT NULL,
  `description` text NOT NULL,
  `code` varchar(8) NOT NULL,
  `discountRate` decimal(5,2) NOT NULL,
  `validFrom` date NOT NULL,
  `validTo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Promotions`
--

INSERT INTO `Promotions` (`promotionID`, `description`, `code`, `discountRate`, `validFrom`, `validTo`) VALUES
(1, 'Enjoy the summer breeze!!!', 'Sun24', 10.00, '2024-05-01', '2024-05-31'),
(2, 'Make it a worth while to look at your sparkling home!', 'Spark24', 5.00, '2024-05-19', '2024-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `Reviews`
--

CREATE TABLE `Reviews` (
  `reviewID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `text` text NOT NULL,
  `datePosted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Reviews`
--

INSERT INTO `Reviews` (`reviewID`, `customerID`, `rating`, `text`, `datePosted`) VALUES
(1, 1, 5, 'My room is very clean, and the work is very fast!!', '2024-05-21 17:53:47'),
(2, 1, 2, 'Booooooo', '2024-05-21 17:54:01'),
(3, 2, 1, 'Not a good job! :(', '2024-05-21 17:55:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `Booking`
--
ALTER TABLE `Booking`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `bookingCustomerIDKey` (`customerID`);

--
-- Indexes for table `BookingPromotions`
--
ALTER TABLE `BookingPromotions`
  ADD PRIMARY KEY (`bookingID`,`promotionID`),
  ADD KEY `promotionID` (`promotionID`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `Payment`
--
ALTER TABLE `Payment`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `paymentCustomerIDKey` (`customerID`),
  ADD KEY `paymentBookingIDKey` (`bookingID`);

--
-- Indexes for table `Promotions`
--
ALTER TABLE `Promotions`
  ADD PRIMARY KEY (`promotionID`);

--
-- Indexes for table `Reviews`
--
ALTER TABLE `Reviews`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `reviewsCustomerIDKey` (`customerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Booking`
--
ALTER TABLE `Booking`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Payment`
--
ALTER TABLE `Payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Promotions`
--
ALTER TABLE `Promotions`
  MODIFY `promotionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Reviews`
--
ALTER TABLE `Reviews`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Booking`
--
ALTER TABLE `Booking`
  ADD CONSTRAINT `bookingCustomerIDKey` FOREIGN KEY (`customerID`) REFERENCES `Customer` (`customerID`);

--
-- Constraints for table `BookingPromotions`
--
ALTER TABLE `BookingPromotions`
  ADD CONSTRAINT `BookingPromotions_ibfk_1` FOREIGN KEY (`bookingID`) REFERENCES `Booking` (`bookingID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `BookingPromotions_ibfk_2` FOREIGN KEY (`promotionID`) REFERENCES `Promotions` (`promotionID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Payment`
--
ALTER TABLE `Payment`
  ADD CONSTRAINT `paymentBookingIDKey` FOREIGN KEY (`bookingID`) REFERENCES `Booking` (`bookingID`),
  ADD CONSTRAINT `paymentCustomerIDKey` FOREIGN KEY (`customerID`) REFERENCES `Customer` (`customerID`);

--
-- Constraints for table `Reviews`
--
ALTER TABLE `Reviews`
  ADD CONSTRAINT `reviewsCustomerIDKey` FOREIGN KEY (`customerID`) REFERENCES `Customer` (`customerID`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
