<?php

class ShoesData
{   
    public $id;
    public $passcode;
    public $name;
    public $description;
    public $price;
    public $size;
    public $imgUrl;
    public $category;

    public function __construct($id, $passcode, $name, $description, $price, $size, $imgUrl, $category)
    {   
        $this->id=$id;
        $this->passcode=$passcode;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->size = $size;
        $this->imgUrl = $imgUrl;
        $this->category = $category;
    }

    //listing


    public static function GetAllShoes()
    {
        $db = Database::getInstance()->getConnection();

        $query = "SELECT h.*, c.CatName as CategoryName, c.CatId as CatId, u.Username as cUsername, s.Username as uUsername,
        DATE_FORMAT(DATE(s.CreatedAt), '%D %M %Y') as cDate,
        DATE_FORMAT(DATE(s.UpdatedAt), '%D %M %Y') as uDate
        FROM shoes as h
        JOIN categories as c
        ON c.CatId = h.Category
        JOIN users as u
        ON h.CreatedBy = u.UsersId
        LEFT JOIN users as s
        ON h.UpdatedBy = s.UsersId
        WHERE s.isDeleted='0'";

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

    // list one 
    public static function GetShoes($id)
    {
        $db = Database::getInstance()->getConnection();

        $query = "SELECT * FROM shoes WHERE ShoesId='$id'";

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


    //adding

    public static function AddShoes($newShoes)
    {
        $db = Database::getInstance()->getConnection();
        $passcode = $newShoes->Passcode;
        $name = $newShoes->Name;
        $description = $newShoes->Description;
        $price = $newShoes->Price;
        $size = $newShoes->Size;
        $imgUrl = $newShoes->ImgUrl;
        $category = $newShoes->Category;
        $usersid = $newShoes->CreatedBy;

        $query = "INSERT INTO shoes (`ShoesId`, `Passcode`, `ShoesName`, `Description`, `Price`, `Size`, `ImgUrl`, `Category`, `CreatedAt`, `CreatedBy`) 
        VALUES (DEFAULT,'$passcode', '$name', '$description', '$price', '$size', '$imgUrl', '$category', CURRENT_TIMESTAMP, '$usersid')";

        $result = mysqli_query($db, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    // updating

    public static function UpdateShoes($data)
    {
        $db = Database::getInstance()->getConnection();

        $id = $data->ShoesId;
        $passcode = $data->Passcode;
        $name = $data->ShoesName;
        $price = $data->Price;
        $description = $data->Description;
        $size = $data->Size;
        $imgUrl = $data->ImgUrl;
        $category = $data->Category;
        $usersid = $data->UpdatedBy;
 	
        $query = "UPDATE shoes SET Passcode='$passcode', ShoesName='$name', Description='$description', Price='$price', Size='$size', ImgUrl='$imgUrl', Category='$category', UpdatedAt=CURRENT_TIMESTAMP, UpdatedBy='$usersid' WHERE ShoesId='$id'";

        $result = mysqli_query($db, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    //D E L E T I N G

    public static function DeleteShoes($data)
    {
        $db = Database::getInstance()->getConnection();

        $id = $data->Id;
        $usersid = $data->DeletedBy;

        $query = "UPDATE shoes SET isDeleted='1', DeletedAt=CURRENT_TIMESTAMP, DeletedBy='$usersid' WHERE ShoesId='$id'";

        $result = mysqli_query($db, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // O R D E R I N G

    public static function OrderShoes($criteria)
    {
        $db = Database::getInstance()->getConnection();

        $criteria = $criteria->Criteria;

        $query = "SELECT * FROM shoes ORDER BY '$criteria'";

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
}
