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

        $query = "SELECT * FROM categories WHERE isDeleted='0'";

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

    // L I S T I N G  O N E   C A T E G O R Y 

    public static function GetCategory($id)
    {
        $db = Database::getInstance()->getConnection();

        $query = "SELECT * FROM categories WHERE CatId='$id'";

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
        $userid = $newCategory->UserId;

        $query = "INSERT INTO categories (`CatId`, `CatName`, `CreatedAt`, `CreatedBy`) 
        VALUES (DEFAULT,'$name', DEFAULT, '$userid')";

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
        $id = $category->CatId;
        $name = $category->CatName;
        $userid = $category->UserId;

        $query = "UPDATE categories SET CatName='$name', CreatedBy='$userid', CreatedAt=DEFAULT  WHERE CatId='$id'";

        $result = mysqli_query($db, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // D E L E T I N G
    public static function DeleteCategory($category)
    {
        $db = Database::getInstance()->getConnection();

        $userid = $category->UserId;
        $id = $category->id;
        $query = "UPDATE categories SET isDeleted='1', DeletedBy='$userid', DeletedAt=DEFAULT WHERE CatId='$id'";

        $result = mysqli_query($db, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

}
