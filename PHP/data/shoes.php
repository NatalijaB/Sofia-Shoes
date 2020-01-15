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

    //L I S T I N G


    public static function GetAllShoes()
    {
        $db = Database::getInstance()->getConnection();

        $query = "SELECT sh.*, c.CatName as CategoryName, c.CatId as CatId, u.Username as cUsername, s.Username as uUsername,
        DATE_FORMAT(DATE(sh.CreatedAt), '%d/%m/%Y') as cDate,
        DATE_FORMAT(DATE(sh.UpdatedAt), '%d/%m/%Y') as uDate
        FROM shoes as sh
        JOIN categories as c
        ON c.CatId = sh.Category
        LEFT JOIN users as u
        ON sh.CreatedBy = u.UsersId
        LEFT JOIN users as s
        ON sh.UpdatedBy = s.UsersId
        WHERE sh.isDeleted='0'";

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

    // L I S T   O N E 
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


    //A D D I N G

    public static function AddShoes($newShoes)
    {
        $db = Database::getInstance()->getConnection();
        
        $passcode = mysqli_real_escape_string($db, $newShoes->Passcode);
        $name = mysqli_real_escape_string($db, $newShoes->ShoesName);
        $description = mysqli_real_escape_string($db, $newShoes->Description);
        $price = mysqli_real_escape_string($db, $newShoes->Price);
        $size = mysqli_real_escape_string($db, $newShoes->Size);
        $imgUrl = mysqli_real_escape_string($db, $newShoes->ImgUrl);
        $category = mysqli_real_escape_string($db, $newShoes->Category);
        $usersid = mysqli_real_escape_string($db, $newShoes->CreatedBy);

        $query = "INSERT INTO shoes (`ShoesId`, `Passcode`, `ShoesName`, `Description`, `Price`, `Size`, `ImgUrl`, `Category`, `CreatedAt`, `CreatedBy`) 
        VALUES (DEFAULT , '$passcode', '$name', '$description', '$price', '$size', '$imgUrl', '$category', CURRENT_TIMESTAMP, '$usersid')";

        $result = mysqli_query($db, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    // U P D A T I N G

    public static function UpdateShoes($data)
    {
        $db = Database::getInstance()->getConnection();

        $id = mysqli_real_escape_string($db, $data->ShoesId);
        $passcode = mysqli_real_escape_string($db, $data->Passcode);
        $name = mysqli_real_escape_string($db, $data->ShoesName);
        $price = mysqli_real_escape_string($db, $data->Price);
        $description = mysqli_real_escape_string($db, $data->Description);
        $size = mysqli_real_escape_string($db, $data->Size);
        $imgUrl = mysqli_real_escape_string($db, $data->ImgUrl);
        $category = mysqli_real_escape_string($db, $data->Category);
        $usersid = mysqli_real_escape_string($db, $data->UpdatedBy);
 	
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

        $id = mysqli_real_escape_string($db, $data->Id);
        $usersid = mysqli_real_escape_string($db, $data->DeletedBy);

        $query = "UPDATE shoes SET isDeleted='1', DeletedAt=CURRENT_TIMESTAMP, DeletedBy='$usersid' WHERE ShoesId='$id'";

        $result = mysqli_query($db, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

     // O R D E R I N G

    // public static function OrderShoes($criteria)
    // {
    //     $db = Database::getInstance()->getConnection();

    //     $criteria = $criteria->Criteria;

    //     $query = "SELECT * FROM shoes ORDER BY '$criteria'";

    //     $result = mysqli_query($db, $query);
    //     if ($result) {
    //         $data = [];
    //         while ($row = mysqli_fetch_assoc($result)) {
    //             $data[] = $row;
    //         }
    //         return $data;
    //     } else {
    //         return [];
    //     }
    // }
}
