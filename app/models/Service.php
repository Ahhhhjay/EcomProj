<?php
namespace app\models;

use PDO;

class Service extends \app\core\Model {
    public $serviceID;
    public $description;
    public $basePrice;
    public $ratePerSquareFoot;
    public $category;

    public function insert() {
        $SQL = 'INSERT INTO Service (description, basePrice, ratePerSquareFoot, category) 
                VALUES (:description, :basePrice, :ratePerSquareFoot, :category)';
        $STMT = self::$_conn->prepare($SQL);
        $data = [
            'description' => $this->description,
            'basePrice' => $this->basePrice,
            'ratePerSquareFoot' => $this->ratePerSquareFoot,
            'category' => $this->category
        ];
        $STMT->execute($data);
        $this->serviceID = self::$_conn->lastInsertId();
    }

    public function getAllService() {
        $SQL = 'SELECT * FROM Service';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        return $STMT->fetchAll(PDO::FETCH_ASSOC);
    }

    // Read (Retrieve a specific service by serviceID)
    public function getService($serviceID) {
        $SQL = 'SELECT * FROM Service WHERE serviceID = :serviceID';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['serviceID' => $serviceID]);
        return $STMT->fetch(PDO::FETCH_ASSOC);
    }

    // Update
    public function update() {
        $SQL = 'UPDATE Service SET description = :description, basePrice = :basePrice, 
                ratePerSquareFoot = :ratePerSquareFoot, category = :category 
                WHERE serviceID = :serviceID';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'serviceID' => $this->serviceID,
            'description' => $this->description,
            'basePrice' => $this->basePrice,
            'ratePerSquareFoot' => $this->ratePerSquareFoot,
            'category' => $this->category
        ]);
    }

    public function delete() {
        $SQL = 'DELETE FROM Service WHERE serviceID = :serviceID';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['serviceID' => $this->serviceID]);
    }
}
?>
