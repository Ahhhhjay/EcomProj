<?php
namespace app\models;

use PDO;

class Promotions extends \app\core\Model
{
    public $promotionID;
    public $description;
    public $discountRate;
    public $validFrom;
    public $validTo;

    public function insert() {
        $SQL = 'INSERT INTO Promotions (promotionID, description, discountRate, validFrom, validTo) VALUES (:promotionID, :description, :discountRate, :validFrom, :validTo)';
        $STMT = self::$_connection->prepare($SQL);
        $data = [
            'promotionID' => $this->promotionID,
            'description' => $this->description,
            'discountRate' => $this->discountRate,
            'validFrom' => $this->validFrom,
            'validTo' => $this->validTo
        ];
        $STMT->execute($data);
    }

    public function delete() {
        $SQL = 'DELETE FROM Promotions WHERE promotionID = :promotionID';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['promotionID' => $this->promotionID]);
    }
}
?>
