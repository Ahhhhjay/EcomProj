<?php

namespace app\models;

use PDO;

class Booking extends \app\core\Model
{
    public $bookingID;
    public $customerID;
    public $serviceID;
    public $bookingDate;
    public $bookingTime;
    public $status;
    public $frequency;

    // Insert new booking
    public function insert()
    {
        $SQL = 'INSERT INTO Booking (bookingID, customerID, serviceID, bookingDate, bookingTime, Status, Frequency)
                VALUE (:bookingID, :customerID, :serviceID, :bookingDate, :bookingTime, :status, :frequency)';
        
        $STMT = self::$_conn->prepare($SQL);
        
        $data = [
            'bookingID' => $this->bookingID,
            'customerID' => $this->customerID,
            'serviceID' => $this->serviceID,
            'bookingDate' => $this->bookingDate,
            'bookingTime' => $this->bookingTime,
            'status' => $this->status,
            'frequency' => $this->frequency
        ];
        
        $STMT->execute($data);
    }
    //READ
    public function getAllBookings()
    {
        $SQL = 'SELECT * FROM Booking';

        $STMT = self::$_conn->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(PDO::FETCH_CLASS,'app\models\Profile');//set the type of data returned by fetches
		return $STMT->fetchAll();//return all records
    }

    public function getForBooking($bookingID){
		$SQL = 'SELECT * FROM Booking WHERE bookingID = :bookingID';
		$STMT = self::$_conn->prepare($SQL);
		$STMT->execute(
			['bookingID'=>$bookingID]
		);
		//there is a mistake in the next line
		$STMT->setFetchMode(PDO::FETCH_CLASS,'app\models\booking');//set the type of data returned by fetches
		return $STMT->fetch();//return (what should be) the only record
	}
//Update
// Update booking
public function update()
{
    $SQL = 'UPDATE Booking SET bookingDate=:bookingDate, bookingTime=:bookingTime, Status=:status, Frequency=:frequency WHERE bookingID = :bookingID';
    $STMT = self::$_conn->prepare($SQL);
    $STMT->execute([
        'bookingID' => $this->bookingID,
        'bookingDate' => $this->bookingDate,
        'bookingTime' => $this->bookingTime,
        'status' => $this->status,
        'frequency' => $this->frequency
    ]);
}



    // Delete booking
    public function delete()
    {
        $SQL = 'DELETE FROM Booking WHERE bookingID = :bookingID';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['bookingID' => $this->bookingID]);
    }


   
}




?>
