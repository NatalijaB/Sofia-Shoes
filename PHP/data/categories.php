<?php

class CategoriesData
{

    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    //L I S T I N G

    public static function GetAllCategories()
    {
        $db = Database::getInstance()->getConnection();

        $query = "SELECT * FROM categories";

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

    // L I S T   O N E   C A T E G O R Y 

    public static function GetCategory($id)
    {
        $db = Database::getInstance()->getConnection();

        $query = "SELECT * FROM categories WHERE Id='$id'";

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

    public static function AddCategory($newCategory)
    {
        $db = Database::getInstance()->getConnection();

        $name = $newCategory->Name;

        $query = "INSERT INTO categories (`Id`, `Name`) 
        VALUES (DEFAULT,'$name')";

        $result = mysqli_query($db, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // U P D A T I N G

    public static function UpdateCategory($category)
    {
        $db = Database::getInstance()->getConnection();
        $id = $category->Id;
        $name = $category->Name;

        $query = "UPDATE categories SET Name='$name' WHERE Id='$id'";

        $result = mysqli_query($db, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }



}
