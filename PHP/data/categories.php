<?php

class CategoriesData
{

    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

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
}
