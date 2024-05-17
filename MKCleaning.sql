-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 17, 2024 at 11:29 AM
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
(30, 3, '2024-05-18', '12:00:00', 'Scheduled', 'One-time', 'clean house', 100, 315.00, 'Residential', '2024-05-17 07:45:54', '', NULL),
(31, 3, '2024-05-18', '22:00:00', 'Scheduled', 'One-time', 'deep clean', 100, 393.75, 'Residential', '2024-05-17 08:52:39', '', NULL),
(32, 3, '2024-05-18', '06:00:00', 'Scheduled', 'One-time', 'clean house', 100, 315.00, 'Residential', '2024-05-17 09:18:36', '', NULL);

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
(2, 'adryan', 'De Vera', 'adryannayrda2319@gmail.com', '514-111-1111', '$2y$10$Bqn0vrT/Q7jmLWiG9r.P4OaFbwW7JuHA7/C9lxF99Zrnbg7IWRxh6', '2000 Van Horne'),
(3, 'Ralph', 'Bantillo', 'ralphbantillo@gmail.com', '438-922-1772', '$2y$10$EYlkX3g8izaIKS2Dl.zu2OfnHREFPSWiIrDEZQjBE4Gvz/AgBHXjC', '4A Rue Hadley');

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `paymentID` int(11) NOT NULL,
  `bookingID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
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

INSERT INTO `Payment` (`paymentID`, `bookingID`, `customerID`, `cardName`, `cardNumber`, `expirationDate`, `postalCode`, `billingAddress`, `paymentDate`) VALUES
(12, 30, 3, 'Ralph', '1234123412341234', '2025-05-17', 'H9B 2B7', '4A Rue Hadley', '2024-05-17 07:45:54'),
(13, 31, 3, 'Ralph', '1234123412341234', '2025-05-17', 'H9B 2B7', '4A Rue Hadley', '2024-05-17 08:52:39'),
(14, 32, 3, 'Ralph', '1234123412341234', '2025-05-17', 'H9B 2B7', '4A Rue Hadley', '2024-05-17 09:18:36');

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
(313, 'Summer2024', 'Sun24', 25.00, '2024-05-21', '2024-08-31');

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
(11, 3, 5, 'very nice', '2024-05-17 08:44:53');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `Booking`
--
ALTER TABLE `Booking`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Payment`
--
ALTER TABLE `Payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `Promotions`
--
ALTER TABLE `Promotions`
  MODIFY `promotionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314;

--
-- AUTO_INCREMENT for table `Reviews`
--
ALTER TABLE `Reviews`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
