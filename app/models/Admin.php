<?php
namespace app\models;

use PDO;

class Admin extends \app\core\Model
{
    public $adminID;
    public $Email;
    public $passwordHash;

    // Insert
    public function insert()
    {
        $SQL = 'INSERT INTO Admin(Email, passwordHash) 
                VALUES (:Email, :password_Hash)';
        $STMT = self::$_conn->prepare($SQL);
        $data = [
            'Email' => $this->Email,
            'password_Hash' => $this->passwordHash
        ];
        $STMT->execute($data);
    }

    public function getAll()
    {
        $SQL = 'SELECT * FROM Admin';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute();
        return $STMT->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($adminID)
    {
        $SQL = 'SELECT * FROM Admin WHERE adminID = :adminID';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['adminID' => $adminID]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Admin'); // choose the type of return from fetch
        return $STMT->fetch(); // fetch
    }

    public function get($Email)
    {
        $SQL = 'SELECT * FROM Admin WHERE Email = :Email';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute(['Email' => $Email]);
        $STMT->setFetchMode(PDO::FETCH_CLASS, 'app\models\Admin'); // choose the type of return from fetch
        return $STMT->fetch();
    }

    // Update
    public function update()
    {
        $SQL = 'UPDATE Admin SET Email = :Email, passwordHash = :passwordHash 
                WHERE adminID = :adminID';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'adminID' => $this->adminID,
            'Email' => $this->Email,
            'passwordHash' => $this->passwordHash
        ]);
    }

    // Delete
    public function delete()
    {
        $SQL = 'DELETE FROM Admin WHERE adminID = :adminID';
        $STMT = self::$_conn->prepare($SQL);
        $STMT->execute([
            'adminID' => $this->adminID
        ]);
    }
}

