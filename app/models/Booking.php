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

    // Insert new booking
    public function insert()
    {
        $SQL = 'INSERT INTO Booking (customerID, bookingDate, bookingTime, Status, Frequency, description, basePrice, ratePerSquareFoot, category)
                VALUE (:customerID, :bookingDate, :bookingTime, :Status, :Frequency, :description, :basePrice, :ratePerSquareFoot, :category)';

        $STMT = self::$_conn->prepare($SQL);

        $data = [
            'customerID' => $this->customerID,
            'bookingDate' => $this->bookingDate,
            'bookingTime' => $this->bookingTime,
            'Status' => $this->status,
            'Frequency' => $this->frequency,
            'description' => $this->description,
            'basePrice' => $this->basePrice,
            'ratePerSquareFoot' => $this->ratePerSquareFoot,
            'category' => $this->category

        ];
        $STMT->execute($data);
        $this->bookingID = self::$_conn->lastInsertId();
    }

    //READ
    public function getAllBookings()
    {
        $SQL = 'SELECT * FROM Booking';

        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Profile');//set the type of data returned by fetches
        return $STMT->fetchAll();//return all records

    }

    public function getForBooking($bookingID)
    {
        $SQL = 'SELECT Booking.*,Customer.Address
        FROM Booking
        INNER JOIN Customer ON Booking.customerID = Customer.customerID 
        WHERE Booking.bookingID = :bookingID';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(
            ['bookingID' => $bookingID]
        );
        //there is a mistake in the next line
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Booking');//set the type of data returned by fetches
        return $STMT->fetch();//return (what should be) the only record
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
        $SQL = 'UPDATE Booking SET bookingDate=:bookingDate, bookingTime=:bookingTime, Status=:Status, Frequency=:Frequency WHERE bookingID = :bookingID';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'bookingID' => $this->bookingID,
            'bookingDate' => $this->bookingDate,
            'bookingTime' => $this->bookingTime,
            'Status' => $this->status,
            'Frequency' => $this->frequency,

        ]);
    }

    // Delete booking
    public function delete()
    {
        $SQL = 'DELETE FROM Booking WHERE bookingID = :bookingID';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['bookingID' => $this->bookingID]);
    }
}
