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
        $SQL = 'INSERT INTO Customer(firstName, lastName, Email, contactNumber, passwordHash, Address) VALUES (:firstName, :lastName, :Email, :contactNumber, :passwordHash, :Address)';
        $STMT = self::$_conn->prepare($SQL);
        $data = [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'Email' => $this->Email,
            'contactNumber' => $this->contactNumber,
            'passwordHash' => $this->passwordHash,
            'Address' => $this->Address
        ];
        $STMT->execute($data);
    }

    public function getAll()
    {
        $SQL = 'SELECT * FROM Customer';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        return $STMT->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($customerID)
    {
        $SQL = 'SELECT * FROM Customer WHERE customerID = :customerID';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['customerID' => $customerID]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Customer');//choose the type of return from fetch
        return $STMT->fetch();//fetch
    }

    public function get($Email)
    {
        $SQL = 'SELECT * FROM Customer WHERE Email = :Email';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['Email' => $Email]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Customer');//choose the type of return from fetch
        return $STMT->fetch();
    }

    // Update
    public function update()
    {
        $SQL = 'UPDATE Customer SET firstName = :firstName, lastName = :lastName, Email = :Email, 
                contactNumber = :contactNumber, passwordHash = :passwordHash, Address = :Address 
                WHERE customerID = :customerID';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'customerID' => $this->customerID,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'Email' => $this->Email,
            'contactNumber' => $this->contactNumber,
            'passwordHash' => $this->passwordHash,
            'Address' => $this->Address
        ]);
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
