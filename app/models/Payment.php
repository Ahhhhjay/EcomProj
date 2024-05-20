<?php

namespace app\models;

use app\core\Model;

class Payment extends Model
{
    public $paymentID;
    public $bookingID;
    public $customerID;
    
    public $total_price;
    public $cardName;
    public $cardNumber;
    public $expirationDate;
    public $postalCode;
    public $billingAddress;
    public $paymentDate;

    public function insert()
    {
        $parts = explode('/', $this->expirationDate);
        if (count($parts) === 2) {
            $month = $parts[0];
            $year = '20' . $parts[1];
            $expirationDate = \DateTime::createFromFormat('Y-m', $year . '-' . $month);
            if (!$expirationDate) {
                throw new \Exception("Invalid expiration date format.");
            }
            $formattedExpirationDate = $expirationDate->format('Y-m-d');
        } else {
            throw new \Exception("Expiration date must be in MM/YY format.");
        }

        if (!is_string($this->cardNumber) || strlen($this->cardNumber) > 19) {
            throw new \Exception("Invalid card number.");
        }

        $SQL = "INSERT INTO Payment (bookingID, customerID, total_price, cardName, cardNumber, expirationDate, postalCode, billingAddress)
                VALUES (:bookingID, :customerID, :total_price, :cardName, :cardNumber, :expirationDate, :postalCode, :billingAddress)";
        $stmt = self::$_conn->prepare($SQL);
        $stmt->execute([
            'bookingID' => $this->bookingID,
            'customerID' => $this->customerID,
            'total_price' => $this->total_price,
            'cardName' => $this->cardName,
            'cardNumber' => $this->cardNumber,
            'expirationDate' => $formattedExpirationDate,
            'postalCode' => $this->postalCode,
            'billingAddress' => $this->billingAddress,
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
}
