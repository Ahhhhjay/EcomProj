-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 22, 2024 at 08:52 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `Booking`
--

CREATE TABLE `Booking` (
  `bookingID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `serviceID` int(11) NOT NULL,
  `bookingDate` date NOT NULL,
  `bookingTime` time NOT NULL,
  `Status` enum('Scheduled','Completed','Cancelled') NOT NULL,
  `Frequency` enum('One-time','Weekly','Bi-Weekly','Monthly') DEFAULT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `paymentID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `cardNumber` varchar(255) NOT NULL,
  `expirationDate` date NOT NULL,
  `billingAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Promotions`
--

CREATE TABLE `Promotions` (
  `promotionID` int(11) NOT NULL,
  `description` text NOT NULL,
  `discountRate` decimal(5,2) NOT NULL,
  `validFrom` date NOT NULL,
  `validTo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Reviews`
--

CREATE TABLE `Reviews` (
  `reviewID` int(11) NOT NULL,
  `bookingID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `text` text NOT NULL,
  `datePosted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Service`
--

CREATE TABLE `Service` (
  `serviceID` int(11) NOT NULL,
  `description` text NOT NULL,
  `basePrice` decimal(10,2) NOT NULL,
  `ratePerSquareFoot` decimal(10,4) DEFAULT NULL,
  `travelSurcharge` decimal(10,2) DEFAULT NULL,
  `Category` enum('Residential','Commercial') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Booking`
--
ALTER TABLE `Booking`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `bookingCustomerIDKey` (`customerID`),
  ADD KEY `bookingServiceIDKey` (`serviceID`);

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
  ADD KEY `paymentCustomerIDKey` (`customerID`);

--
-- Indexes for table `Promotions`
--
ALTER TABLE `Promotions`
  ADD PRIMARY KEY (`promotionID`);

--
-- Indexes for table `Reviews`
--
ALTER TABLE `Reviews`
  ADD PRIMARY KEY (`reviewID`);

--
-- Indexes for table `Service`
--
ALTER TABLE `Service`
  ADD PRIMARY KEY (`serviceID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Booking`
--
ALTER TABLE `Booking`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Payment`
--
ALTER TABLE `Payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Promotions`
--
ALTER TABLE `Promotions`
  MODIFY `promotionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Reviews`
--
ALTER TABLE `Reviews`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Service`
--
ALTER TABLE `Service`
  MODIFY `serviceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Booking`
--
ALTER TABLE `Booking`
  ADD CONSTRAINT `bookingCustomerIDKey` FOREIGN KEY (`customerID`) REFERENCES `Customer` (`customerID`),
  ADD CONSTRAINT `bookingServiceIDKey` FOREIGN KEY (`serviceID`) REFERENCES `Service` (`serviceID`);

--
-- Constraints for table `Payment`
--
ALTER TABLE `Payment`
  ADD CONSTRAINT `paymentCustomerIDKey` FOREIGN KEY (`customerID`) REFERENCES `Customer` (`customerID`);

--
-- Constraints for table `Reviews`
--
ALTER TABLE `Reviews`
  ADD CONSTRAINT `reviewsBookingIDKey` FOREIGN KEY (`reviewID`) REFERENCES `Booking` (`bookingID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
