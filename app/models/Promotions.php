<?php
namespace app\models;

use PDO;

class Promotions extends \app\core\Model
{
    public $promotionID;
    public $description;
    public $code;
    public $discountRate;
    public $validFrom;
    public $validTo;

    public function insert() {
        $SQL = 'INSERT INTO Promotions (description,code, discountRate, validFrom, validTo) VALUES (:description, :code, :discountRate, :validFrom, :validTo)';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'description' => $this->description,
            'code'=> $this->code,
            'discountRate' => $this->discountRate,
            'validFrom' => $this->validFrom,
            'validTo' => $this->validTo
        ]);
        
        $this->promotionID = self::$_conn->lastInsertId();
    }

    public function delete() {
        $SQL = 'DELETE FROM Promotions WHERE promotionID = :promotionID';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['promotionID' => $this->promotionID]);
    }

    public function getAllPromos()
    {
        $SQL = 'SELECT * FROM Promotions';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        $STMT->setFetchMode(PDO::FETCH_ASSOC); // Using FETCH_ASSOC for easier column access
        return $STMT->fetchAll();
    }

    public function getPromo($promotionID)
    {
        $SQL = 'SELECT *
                FROM Promotions
                WHERE promotionID = :promotionID';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['promotionID' => $promotionID]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Promotions');
        return $STMT->fetch();
    }

    public function getByCode($code)
    {
        $SQL = 'SELECT *
                FROM Promotions 
                WHERE code = :code';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['code' => $code]);
        $STMT->setFetchMode(PDO::FETCH_ASSOC);  // Adjust to your needs
        return $STMT->fetch();
    }

    public function update()
    {
        $SQL = 'UPDATE Promotions SET description=:description,code=:code discountRate=:discountRate, validFrom=:validFrom, validTo=:validTo WHERE promotionID = :promotionID';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'promotionID' => $this->promotionID,
            'description' => $this->description,
            'discountRate' => $this->discountRate,
            'validFrom' => $this->validFrom,
            'validTo' => $this->validTo,
            

        ]);
    }
}
?>
