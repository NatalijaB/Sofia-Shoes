<?php

class ShoesData
{

    public $name;
    public $description;
    public $price;
    public $size;

    public function __construct($name, $description, $price, $size)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->size = $size;
    }

    //listing


    public static function GetAllShoes()
    {
        $db = Database::getInstance()->getConnection();

        $query = "SELECT * FROM shoes";

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

        $query = "SELECT * FROM shoes WHERE Id='$id'";

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

        $query = "INSERT INTO shoes (`Id`, `Passcode`, `Name`, `Description`, `Price`, `Size`, `ImgUrl`) 
        VALUES (DEFAULT,'$passcode', '$name', '$description', '$price', '$size', '$imgUrl')";

        $result = mysqli_query($db, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    // updating

    public static function UpdateShoes($id, $passcode, $name, $description, $price, $size, $imgUrl, $category)
    {
        $db = Database::getInstance()->getConnection();
 	
        $query = "UPDATE categories SET Passcode='$passcode', Name='$name', Description='$description', Price='$price', Size='$size', ImgUrl='$imgUrl', Category='$category', WHERE Id='$id'";

        $result = mysqli_query($db, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
