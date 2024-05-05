<?php
namespace app\models;

use PDO;

class Reviews extends \app\core\Model {
    public $reviewID;
    public $customerID;
    public $rating;
    public $text;
    public $datePosted;

    public function insert() {
        $SQL = 'INSERT INTO Reviews (customerID, rating, text) VALUES (:customerID, :rating, :text)';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'customerID' => $this->customerID,
            'rating' => $this->rating,
            'text' => $this->text
        ]);
        $this->reviewID = self::$_conn->lastInsertId();
    }

    public function getAllWithCustomerDetails() {
        $SQL = 'SELECT Reviews.*, Customer.firstName, Customer.lastName FROM Reviews 
                INNER JOIN Customer ON Reviews.customerID = Customer.customerID 
                ORDER BY Reviews.datePosted DESC';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        return $STMT->fetchAll(PDO::FETCH_CLASS, 'app\models\Reviews');
    }

    public function getById($reviewID) {
        $SQL = 'SELECT * FROM Reviews WHERE reviewID = :reviewID LIMIT 1';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['reviewID' => $reviewID]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Reviews');
        return $STMT->fetch();
    }

    public function update() {
        $SQL = 'UPDATE Reviews SET rating = :rating, text = :text WHERE reviewID = :reviewID';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'reviewID' => $this->reviewID,
            'rating' => $this->rating,
            'text' => $this->text
        ]);
    }

    public function delete($reviewID) {
        $SQL = 'DELETE FROM Reviews WHERE reviewID = :reviewID';
        $STMT = self::$_conn->prepare($SQL);
        return $STMT->execute(['reviewID' => $reviewID]);
    }
}
