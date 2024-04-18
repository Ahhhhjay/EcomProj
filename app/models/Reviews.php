<?php
namespace app\models;

use PDO;

class Reviews extends \app\core\Model
{
    public $reviewID;
    public $bookingID;
    public $customerID;
    public $rating;
    public $text;
    public $datePosted;

    public function insert() {
        $SQL = 'INSERT INTO Reviews (reviewID, bookingID, customerID, rating, text, datePosted) VALUES (:reviewID, :bookingID, :customerID, :rating, :text, :datePosted)';
        $STMT = self::$_conn->prepare($SQL);
        $data = [
            'reviewID' => $this->reviewID,
            'bookingID' => $this->bookingID,
            'customerID' => $this->customerID,
            'rating' => $this->rating,
            'text' => $this->text,
            'datePosted' => $this->datePosted
        ];
        $STMT->execute($data);
    }
    public function getAllReviews()
    {
        $SQL = 'SELECT * FROM Reviews';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        return $STMT->fetchAll(PDO::FETCH_ASSOC);
    }

    // Read (Retrieve a specific review by reviewID)
    public function getReview($reviewID)
    {
        $SQL = 'SELECT * FROM Reviews WHERE reviewID = :reviewID';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['reviewID' => $reviewID]);
        return $STMT->fetch(PDO::FETCH_ASSOC);
    }

    // Update
    public function update()
    {
        $SQL = 'UPDATE Reviews SET rating = :rating, text = :text, datePosted = :datePosted 
                WHERE reviewID = :reviewID';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'reviewID' => $this->reviewID,
           'rating' => $this->rating,
            'text' => $this->text,
            'datePosted' => $this->datePosted
        ]);
    }

    public function delete() {
        $SQL = 'DELETE FROM Reviews WHERE reviewID = :reviewID';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['reviewID' => $this->reviewID]);
    }
}
?>
