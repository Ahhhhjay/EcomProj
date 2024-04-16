<?php
namespace app\models;

use PDO;

class Customer extends \app\core\Model
{
    public $customerID;
    public $firstName;
    public $lastName;
    public $Email;
    public $contactNumber;
    public $passwordHash;
    public $Address;

    // Insert
    public function insert()
    {
        $SQL = 'INSERT INTO Customer (customerID, firstName, lastName, Email, contactNumber, passwordHash, Address) VALUES (:customerID, :firstName, :lastName, :Email, :contactNumber, :passwordHash, :Address)';
        $STMT = self::$_conn->prepare($SQL);
        $data = [
            'customerID' => $this->customerID,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'Email' => $this->Email,
            'contactNumber' => $this->contactNumber,
            'passwordHash' => $this->passwordHash,
            'Address' => $this->Address
        ];
        $STMT->execute($data);
    }

    // Delete
    public function delete()
    {
        $SQL = 'DELETE FROM Customer WHERE customerID = :customerID';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'customerID' => $this->customerID
        ]);
    }
}
?>
