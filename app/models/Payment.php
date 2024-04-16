<?php
namespace app\models;

use PDO;

class Payment extends \app\core\Model
{
    public $paymentID;
    public $customerID;
    public $cardNumber;
    public $expirationDate;
    public $billingAddress;

    // Insert
    public function insert()
    {
        $SQL = 'INSERT INTO Payment (paymentID, customerID, cardNumber, expirationDate, billingAddress) VALUES (:paymentID, :customerID, :cardNumber, :expirationDate, :billingAddress)';
        $STMT = self::$_conn->prepare($SQL);
        $data = [
            'paymentID' => $this->paymentID,
            'customerID' => $this->customerID,
            'cardNumber' => $this->cardNumber,
            'expirationDate' => $this->expirationDate,
            'billingAddress' => $this->billingAddress
        ];
        $STMT->execute($data);
    }

    // Delete
    public function delete()
    {
        $SQL = 'DELETE FROM Payment WHERE paymentID = :paymentID';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'paymentID' => $this->paymentID
        ]);
    }
}
?>
