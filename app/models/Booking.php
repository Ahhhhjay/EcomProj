<?php
namespace app\models;

use PDO;

class Booking extends \app\core\Model
{
    public $booking_id;
    public $user_id;


    //insert
    public function insert()
    {
        //define the SQL query
        $SQL = 'INSERT INTO booking (booking_id, user_id) VALUES (:booking_id, :user_id)';
        //prepare the statement
        $STMT = self::$_conn->prepare($SQL);
        //execute
        $data = [
            'booking_id' => $this->booking_id,
            'user_id' => $this->user_id
        ];
        $STMT->execute($data);
    }

    //delete
    public function delete()
    {
        $SQL = 'DELETE FROM profile WHERE booking_id = :booking_id';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(
            ['booking_id' => $this->booking_id]
        );
    }

}