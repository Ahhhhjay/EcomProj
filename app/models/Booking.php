<?php

namespace app\models;

use PDO;

class Booking extends \app\core\Model
{
    public $bookingID;
    public $customerID;
    public $bookingDate;
    public $bookingTime;
    public $status;
    public $frequency;
    public $description;
    public $basePrice;
    public $ratePerSquareFoot;
    public $category;

<<<<<<< HEAD
    public function insert()
    {
        $SQL = 'INSERT INTO Booking (customerID, bookingDate, bookingTime, status, frequency, description, basePrice, ratePerSquareFoot, category)
                VALUES (:customerID, :bookingDate, :bookingTime, :status, :frequency, :description, :basePrice, :ratePerSquareFoot, :category)';
=======
    public $message;

    // Insert new booking
    public function insert()
    {
        $SQL = 'INSERT INTO Booking (customerID, bookingDate, bookingTime, Status, Frequency, description, basePrice, ratePerSquareFoot, category, message)
                VALUE (:customerID, :bookingDate, :bookingTime, :Status, :Frequency, :description, :basePrice, :ratePerSquareFoot, :category, :message)';

>>>>>>> 1be2952de32e5663c3274ed67ec1fcb41ce55296
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'customerID' => $this->customerID,
            'bookingDate' => $this->bookingDate,
            'bookingTime' => $this->bookingTime,
            'status' => $this->status,
            'frequency' => $this->frequency,
            'description' => $this->description,
            'basePrice' => $this->basePrice,
            'ratePerSquareFoot' => $this->ratePerSquareFoot,
<<<<<<< HEAD
            'category' => $this->category
        ]);
=======
            'category' => $this->category,
            'message' => $this->message
        ];
        $STMT->execute($data);
>>>>>>> 1be2952de32e5663c3274ed67ec1fcb41ce55296
        $this->bookingID = self::$_conn->lastInsertId();
    }

    public function getAllBookings()
    {
        $SQL = 'SELECT bookingID, customerID, bookingDate, bookingTime, status, frequency, description, basePrice, ratePerSquareFoot, category, message, (basePrice + ratePerSquareFoot) AS totalPrice
        FROM Booking
        ORDER BY bookingDate DESC';

        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Booking');//set the type of data returned by fetches
        return $STMT->fetchAll();//return all records

    }
    public function getAllBookingsAndCustomer()
    {
        $SQL = 'SELECT Booking.*, Customer.*
                FROM Booking
                INNER JOIN Customer ON Booking.customerID = Customer.customerID 
                ORDER BY Booking.bookingDate DESC';

        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_ASSOC); // Using FETCH_ASSOC for easier column access
        return $STMT->fetchAll(); // return all records
    }

    public function getAllBookingsAndEmail()
    {
        $SQL = 'SELECT Booking.*, Customer.Email
            FROM Booking
            INNER JOIN Customer ON Booking.customerID = Customer.customerID 
            ORDER BY Booking.bookingDate DESC';

        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_ASSOC); // Using FETCH_ASSOC for easier column access
        return $STMT->fetchAll();
    }

    public function getForBooking($bookingID)
    {
        $SQL = 'SELECT Booking.*, Customer.Address
                FROM Booking
                INNER JOIN Customer ON Booking.customerID = Customer.customerID 
                WHERE Booking.bookingID = :bookingID';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['bookingID' => $bookingID]);
        $STMT->setFetchMode(PDO::FETCH_OBJ);
        return $STMT->fetch();
    }

    // In app/models/Booking.php
    public function getAllForCustomer($customerID)
    {
        $SQL = 'SELECT bookingID, customerID, bookingDate, bookingTime, status, frequency, description, basePrice, ratePerSquareFoot, category, (basePrice + ratePerSquareFoot) AS totalPrice
            FROM Booking 
            WHERE customerID = :customerID 
            ORDER BY bookingDate DESC';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['customerID' => $customerID]);
        return $STMT->fetchAll(PDO::FETCH_CLASS, 'app\models\Booking');
    }

    //Update
    public function update()
    {
        $SQL = 'UPDATE Booking SET bookingDate=:bookingDate, bookingTime=:bookingTime, Status=:Status, Frequency=:Frequency, message=:message WHERE bookingID = :bookingID';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'bookingID' => $this->bookingID,
            'bookingDate' => $this->bookingDate,
            'bookingTime' => $this->bookingTime,
            'Status' => $this->status,
            'Frequency' => $this->frequency,
            'message' => $this->message,

        ]);
    }

    public function delete($bookingID)
    {
        $SQL = 'DELETE FROM Booking WHERE bookingID = :bookingID';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['bookingID' => $bookingID]);
    }
}
