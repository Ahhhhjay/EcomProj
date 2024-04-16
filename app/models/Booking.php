<?php

namespace app\models;

use PDO;

class Booking extends \app\core\Model
{
    public $bookingID;
    public $customerID;
    public $serviceID;
    public $bookingDate;
    public $bookingTime;
    public $status;
    public $frequency;

    // Insert new booking
    public function insert()
    {
        $SQL = 'INSERT INTO Booking (bookingID, customerID, serviceID, bookingDate, bookingTime, Status, Frequency)
                VALUES (:bookingID, :customerID, :serviceID, :bookingDate, :bookingTime, :status, :frequency)';
        
        $STMT = self::$_conn->prepare($SQL);
        
        $data = [
            'bookingID' => $this->bookingID,
            'customerID' => $this->customerID,
            'serviceID' => $this->serviceID,
            'bookingDate' => $this->bookingDate,
            'bookingTime' => $this->bookingTime,
            'status' => $this->status,
            'frequency' => $this->frequency
        ];
        
        $STMT->execute($data);
    }

    // Delete booking
    public function delete()
    {
        $SQL = 'DELETE FROM Booking WHERE bookingID = :bookingID';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['bookingID' => $this->bookingID]);
    }

    // Additional methods can be added here for other CRUD operations
}

?>
