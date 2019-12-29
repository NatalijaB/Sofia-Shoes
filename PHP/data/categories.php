<?php

class CategoriesData
{

    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    //listing

    public static function GetAllCategories()
    {
        $db = Database::getInstance()->getConnection();

        $query = "SELECT * FROM categories";

        $result = mysqli_query($db, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $name = $row['Name'];
                echo '
                <tr>
                <td>' . $name .'</td>
                </tr>
                ';
            }
        } else{
            echo 'No result.';
        }
    }

    //adding

    public static function AddCategory($newCategory)
    {
        $db = Database::getInstance()->getConnection();

        $name = $newCategory['Name'];

        $query = "INSERT INTO categories (`Name`) 
        VALUES (DEFAULT,'$name')";

        $result = mysqli_query($db, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    //updating

    public static function UpdateCategory($id, $name)
    {
        $db = Database::getInstance()->getConnection();
 	
        $query = "UPDATE categories SET Name='$name' WHERE Id='$id'";

        $result = mysqli_query($db, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
