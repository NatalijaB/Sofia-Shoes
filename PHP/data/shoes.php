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
            while ($row = mysqli_fetch_assoc($result)) {
                $name = $row['Name'];
                $description = $row['Description'];
                $price = $row['Price'];
                $size = $row['Size'];
                echo '
                <tr>
                <td>' . $name .'</td>
                <td>' . $description .'</td>
                <td>' . $price .'</td>
                <td>' . $size .'</td>
                </tr>
                ';
            }
        } else{
            echo 'No result.';
        }
    }

    //adding

    public static function AddShoes($newShoes)
    {
        $db = Database::getInstance()->getConnection();
        $passcode = $newShoes['Passcode'];
        $name = $newShoes['Name'];
        $description = $newShoes['Description'];
        $price = $newShoes['Price'];
        $size = $newShoes['Size'];
        $imgUrl = $newShoes['ImgUrl'];
        $category = $newShoes['Category'];

        $query = "INSERT INTO shoes (`Passcode`, `Name`, `Description`, `Price`, `Size`, `ImgUrl`, `Category`) 
        VALUES (DEFAULT,'$passcode', '$name', '$description', '$price', '$size', '$imgUrl', '$category')";

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
