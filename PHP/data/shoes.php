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

        $query = "SELECT s.*, c.CatName as CategoryName, c.CatId as CatId
        FROM shoes as s
        join categories as c
        ON c.CatId = s.Category
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

        $query = "INSERT INTO shoes (`ShoesId`, `Passcode`, `ShoesName`, `Description`, `Price`, `Size`, `ImgUrl`, `Category`) 
        VALUES (DEFAULT,'$passcode', '$name', '$description', '$price', '$size', '$imgUrl', '$category')";

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
 	
        $query = "UPDATE shoes SET Passcode='$passcode', ShoesName='$name', Description='$description', Price='$price', Size='$size', ImgUrl='$imgUrl', Category='$category' WHERE ShoesId='$id'";

        $result = mysqli_query($db, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    //D E L E T I N G

    public static function DeleteShoes($id)
    {
        $db = Database::getInstance()->getConnection();

        $query = "UPDATE shoes SET isDeleted='1' WHERE ShoesId='$id'";

        $result = mysqli_query($db, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
