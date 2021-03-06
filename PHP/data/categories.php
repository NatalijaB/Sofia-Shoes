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

        $query = "SELECT c.*, u.Username as cUsername, s.Username as uUsername,
        DATE_FORMAT(DATE(c.CreatedAt), '%d/%m/%Y') as cDate,
        DATE_FORMAT(DATE(c.UpdatedAt), '%d/%m/%Y') as uDate
        FROM categories as c
        JOIN users as u
        ON c.CreatedBy = u.UsersId
        LEFT JOIN users as s
        ON c.UpdatedBy = s.UsersId
        WHERE c.isDeleted='0'";

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

        $name = mysqli_real_escape_string($db, $newCategory->CatName);
        $userid =mysqli_real_escape_string($db, $newCategory->CreatedBy);

        $query = "INSERT INTO categories (`CatId`, `CatName`, `CreatedAt`, `CreatedBy`) 
        VALUES (DEFAULT,'$name', CURRENT_TIMESTAMP , '$userid')";

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
        $id = mysqli_real_escape_string($db, $category->CatId);
        $name = mysqli_real_escape_string($db, $category->CatName);
        $userid = mysqli_real_escape_string($db, $category->UpdatedBy);

        $query = "UPDATE categories SET CatName='$name', UpdatedBy='$userid', UpdatedAt=CURRENT_TIMESTAMP  WHERE CatId='$id'";

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

        $userid = mysqli_real_escape_string($db, $category->DeletedBy);
        $id = mysqli_real_escape_string($db, $category->CatId);
        $query = "UPDATE categories SET isDeleted='1', DeletedBy='$userid', DeletedAt=CURRENT_TIMESTAMP WHERE CatId='$id'";

        $result = mysqli_query($db, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

}
