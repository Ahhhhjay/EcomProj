-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 13, 2024 at 11:41 PM
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
  `Category` enum('Residential','Commercial') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Booking`
--

INSERT INTO `Booking` (`bookingID`, `customerID`, `bookingDate`, `bookingTime`, `Status`, `Frequency`, `description`, `basePrice`, `ratePerSquareFoot`, `Category`) VALUES
(7, 4, '2024-05-25', '18:45:00', 'Scheduled', 'One-time', 'clean house', 100, 378.00, 'Residential'),
(8, 4, '2024-05-16', '17:50:00', 'Scheduled', 'One-time', 'clean house', 100, 378.00, 'Residential'),
(9, 4, '2024-05-18', '17:48:00', 'Scheduled', 'One-time', 'clean house', 100, 362.25, 'Residential'),
(10, 4, '2024-05-17', '16:49:00', 'Scheduled', 'One-time', 'clean house', 100, 315.00, 'Residential'),
(11, 4, '2024-05-16', '17:50:00', 'Scheduled', 'One-time', 'clean house', 100, 378.00, 'Residential'),
(12, 4, '2024-05-25', '19:03:00', 'Scheduled', 'One-time', 'clean house', 100, 346.50, 'Residential');

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
(3, 'Adryan', 'Vera', 'adryannayrda2319@email.com', '514-123-1111', '$2y$10$S6.i9oV7gKOYadkCLHvXl.lEGYgZiAZ7w9KIr2Cz8h7/u6j8Jyu9S', '2000 Van Horne'),
(4, 'Ralph', 'Bantillo', 'ralphbantillo@gmail.com', '438-922-1772', '$2y$10$wO1m4nxnCB53fEa7ptvVLOmv0Q6iIToIiIyUqUjPTn0k4z9XPbhwe', '4A Rue Hadley');

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `paymentID` int(11) NOT NULL,
  `bookingID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `cardName` varchar(255) NOT NULL,
  `cardNumber` int(255) NOT NULL,
  `expirationDate` date NOT NULL,
  `postalCode` varchar(32) NOT NULL,
  `billingAddress` varchar(255) NOT NULL,
  `paymentDate` date NOT NULL
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
  `customerID` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `text` text NOT NULL,
  `datePosted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Reviews`
--

INSERT INTO `Reviews` (`reviewID`, `customerID`, `rating`, `text`, `datePosted`) VALUES
(22, 4, 5, 'nice', '2024-05-06 03:42:15'),
(23, 4, 1, 'ew', '2024-05-06 03:42:17'),
(25, 4, 1, 'alright', '2024-05-06 04:27:25');

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
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Booking`
--
ALTER TABLE `Booking`
  ADD CONSTRAINT `bookingCustomerIDKey` FOREIGN KEY (`customerID`) REFERENCES `Customer` (`customerID`);

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
  ADD CONSTRAINT `reviewsCustomerIDKey` FOREIGN KEY (`customerID`) REFERENCES `Customer` (`customerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
