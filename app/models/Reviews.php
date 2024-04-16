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
        $STMT = self::$_connection->prepare($SQL);
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

    public function delete() {
        $SQL = 'DELETE FROM Reviews WHERE reviewID = :reviewID';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['reviewID' => $this->reviewID]);
    }
}
?>
