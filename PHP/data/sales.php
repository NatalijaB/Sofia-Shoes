<?php

class SalesData
{

    public $name;
    public $date;

    public function __construct($name, $date)
    {
        $this->name = $name;
        $this->date = $date;
    }

    // L I S T I N G

    public static function GetAllSales()
    {
        $db = Database::getInstance()->getConnection();

        $query = "SELECT sl.*, u.Username as cUsername, s.Username as uUsername,
        DATE_FORMAT(DATE(sl.CreatedAt), '%D %M %Y') as cDate,
        DATE_FORMAT(DATE(sl.UpdatedAt), '%D %M %Y') as uDate
        FROM sales as sl
        JOIN users as u
        ON sl.CreatedBy = u.UsersId
        LEFT JOIN users as s
        ON sl.UpdatedBy = s.UsersId
        WHERE sl.isDeleted='0'";

        $result = mysqli_query($db, $query);
        if ($result) {
            $data = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        } else {
            return [];
        }
    }

    // L I S T I N G  O N E   S A L E 

    public static function GetSale($id)
    {
        $db = Database::getInstance()->getConnection();

        $query = "SELECT * FROM sales WHERE SalesId='$id'";

        $result = mysqli_query($db, $query);
        if ($result) {
            $data = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        } else {
            return [];
        }
    }



    //A D D I N G

    public static function AddSale($newSale)
    {
        $db = Database::getInstance()->getConnection();

        $name = $newSale->SalesName;
        $date = $newSale->Date;
        $userid = $newSale->CreatedBy;

        $query = "INSERT INTO sales (`SalesId`, `SalesName`, `Date`, `CreatedAt`, `CreatedBy`) 
        VALUES (DEFAULT,'$name', '$date', CURRENT_TIMESTAMP , '$userid')";

        $result = mysqli_query($db, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // U P D A T I N G

    public static function UpdateSale($sale)
    {
        $db = Database::getInstance()->getConnection();
        $id = $sale->SalesId;
        $name = $sale->SalesName;
        $date = $sale->Date;
        $userid = $sale->UpdatedBy;

        $query = "UPDATE sales SET SalesName='$name', Date='$date', UpdatedBy='$userid', UpdatedAt=CURRENT_TIMESTAMP  WHERE SalesId='$id'";

        $result = mysqli_query($db, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // D E L E T I N G
    public static function DeleteSale($sale)
    {
        $db = Database::getInstance()->getConnection();

        $userid = $sale->DeletedBy;
        $id = $sale->SalesId;
        $query = "UPDATE sales SET isDeleted='1', DeletedBy='$userid', DeletedAt=CURRENT_TIMESTAMP WHERE SalesId='$id'";

        $result = mysqli_query($db, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

}