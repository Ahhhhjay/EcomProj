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
    public function getAllPayments()
    {
        $SQL = 'SELECT * FROM Payment';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        return $STMT->fetchAll(PDO::FETCH_ASSOC);
    }

    // Read (Retrieve a specific payment by paymentID)
    public function getPayment($paymentID)
    {
        $SQL = 'SELECT * FROM Payment WHERE paymentID = :paymentID';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['paymentID' => $paymentID]);
        return $STMT->fetch(PDO::FETCH_ASSOC);
    }

    // Update
    public function update()
    {
        $SQL = 'UPDATE Payment SET  cardNumber = :cardNumber, 
                expirationDate = :expirationDate, billingAddress = :billingAddress 
                WHERE paymentID = :paymentID';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'paymentID' => $this->paymentID,
            'cardNumber' => $this->cardNumber,
            'expirationDate' => $this->expirationDate,
            'billingAddress' => $this->billingAddress
        ]);
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
