<?php

namespace app\models;

use app\core\Model;

class Payment extends Model
{
    public $paymentID;
    public $bookingID;
    public $customerID;
    public $cardName;
    public $cardNumber;
    public $expirationDate;
    public $postalCode;
    public $billingAddress;
    public $paymentDate;

    public function insert()
    {

        $expirationDate = \DateTime::createFromFormat('m/y', $this->expirationDate);
        $formattedExpirationDate = $expirationDate->format('Y-m-01');

        $SQL = "INSERT INTO Payment (bookingID, customerID, cardName, cardNumber, expirationDate, postalCode, billingAddress, paymentDate)
                VALUES (:bookingID, :customerID, :cardName, :cardNumber, :expirationDate, :postalCode, :billingAddress, :paymentDate)";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute([
            'bookingID' => $this->bookingID,
            'customerID' => $this->customerID,
            'cardName' => $this->cardName,
            'cardNumber' => $this->cardNumber,
            'expirationDate' => $this->expirationDate,
            'postalCode' => $this->postalCode,
            'billingAddress' => $this->billingAddress,
            'paymentDate' => $this->paymentDate
        ]);
        $this->paymentID = self::$_conn->lastInsertId();
    }

    public function delete()
    {
        $SQL = "DELETE FROM Payment WHERE paymentID = :paymentID";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute(['paymentID' => $this->paymentID]);
    }
    
    public function deleteByBookingID($bookingID)
    {
        $SQL = "DELETE FROM Payment WHERE bookingID = :bookingID";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute(['bookingID' => $bookingID]);
    }

    public function getForBooking($bookingID)
    {
        $SQL = "SELECT * FROM Payment WHERE bookingID = :bookingID";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute(['bookingID' => $bookingID]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Payment');
        return $stmt->fetch();
    }
    // Other methods can be added here
}
