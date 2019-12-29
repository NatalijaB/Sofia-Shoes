<?php

class UsersData
{

    public $fname;
    public $lname;

    public function __construct($fname, $lname)
    {
        $this->fname = $fname;
        $this->lname = $lname;
    }

    //listing 

    public static function GetAllUsers()
    {
        $db = Database::getInstance()->getConnection();

        $query = "SELECT * FROM users";

        $result = mysqli_query($db, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $fname = $row['FirstName'];
                $lname = $row['LastName'];
                echo '
                <tr>
                <td>' . $fname .'</td>
                <td>' . $lname .'</td>
                </tr>
                ';
            }
        } else{
            echo 'No result.';
        }
    }

    //adding

    public static function AddUser($newUser)
    {
        $db = Database::getInstance()->getConnection();

        $fname = $newUser['FirstName'];
        $lname = $newUser['LastName'];
        $email = $newUser['email'];
        // pass??
        $password = $newUser['password'];

        $query = "INSERT INTO users (`FirstName`, `LastName`, `email`, `password`) 
        VALUES (DEFAULT,'$fname', '$lname', '$email', '$password')";

        $result = mysqli_query($db, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    //updating

    public static function UpdateUser($id, $fname, $lname, $email, $password)
    {
        $db = Database::getInstance()->getConnection();
 	
        $query = "UPDATE users SET FirstName='$fname', LastName='$lname', email='$email', password='$password', WHERE Id='$id'";

        $result = mysqli_query($db, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
