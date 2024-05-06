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
        $SQL = 'SELECT * FROM Reviews WHERE reviewID = :reviewID';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->bindParam(':reviewID', $reviewID, PDO::PARAM_INT);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_CLASS, get_class($this));
        return $STMT->fetch();
    }

    public function update() {
        $SQL = 'UPDATE Reviews SET rating = :rating, text = :text WHERE reviewID = :reviewID';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->bindParam(':reviewID', $this->reviewID, PDO::PARAM_INT);
        $STMT->bindParam(':rating', $this->rating, PDO::PARAM_INT);
        $STMT->bindParam(':text', $this->text, PDO::PARAM_STR);
        return $STMT->execute();
    }

    public function delete($reviewID) {
        $SQL = 'DELETE FROM Reviews WHERE reviewID = :reviewID';
        $STMT = self::$_conn->prepare($SQL);
        return $STMT->execute(['reviewID' => $reviewID]);
    }

    public function getLatestReviews($limit = 3) {
        $SQL = 'SELECT Reviews.*, Customer.firstName, Customer.lastName FROM Reviews 
                JOIN Customer ON Reviews.customerID = Customer.customerID 
                ORDER BY Reviews.datePosted DESC LIMIT :limit';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->bindParam(':limit', $limit, PDO::PARAM_INT);
        $STMT->execute();
        return $STMT->fetchAll(PDO::FETCH_OBJ);
    }    
}
