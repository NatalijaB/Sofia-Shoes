<?php

class UsersData
{
    public $userid;
    public $fname;
    public $lname;
    public $username;
    public $email;
    public $password;

    public function __construct($userid, $fname, $lname, $username, $email, $password)
    {
        $this->userid = $userid;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    //listing 
    public static function GetAllUsers()
    {
        $db = Database::getInstance()->getConnection();
        $query = "SELECT * FROM users WHERE isDeleted='0'";

        $result = mysqli_query($db, $query);
        if ($result) {
            $userData = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $userData[] = $row;
            }
            return $userData;
        } else {
            return [];
        }
    }

    // list one
    public static function GetUser($id)
    {
        $db = Database::getInstance()->getConnection();
        $query = "SELECT * FROM users WHERE UsersId='$id'";

        $result = mysqli_query($db, $query);
        if ($result) {
            $userData = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $userData[] = $row;
            }
            return $userData;
        } else {
            return [];
        }
    }



    //adding

    public static function AddUser($newUser)
    {
        $db = Database::getInstance()->getConnection();

        $fname = $newUser->FirstName;
        $lname = $newUser->LastName;
        $email = $newUser->Email;
        $username = $newUser->Username;
        $password = $newUser->password;

        $query = "INSERT INTO users (`UsersId`, `FirstName`, `LastName`, `email`, `Username`, `password`) 
        VALUES (DEFAULT,'$fname', '$lname', '$email', '$username' '$password')";

        $result = mysqli_query($db, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    //updating

    public static function UpdateUser($updateUser)
    {
        $db = Database::getInstance()->getConnection();

        $id = $updateUser->Id;
        $fname = $updateUser->FirstName;
        $lname = $updateUser->LastName;
        $email = $updateUser->email;
        $password = $updateUser->Password;
        $username = $updateUser->Username;

        $query = "UPDATE users SET FirstName='$fname', LastName='$lname', email='$email', Username='$username', Password='$password', WHERE UsersId='$id'";

        $result = mysqli_query($db, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }



    // deleting


    public static function DeleteUser($id)
    {
        $db = Database::getInstance()->getConnection();

        $query = "UPDATE users SET isDeleted='1' WHERE UsersId='$id'";

        $result = mysqli_query($db, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


// sanit
    public static function sanit($x){

        $y = htmlspecialchars(strip_tags($x)); 
        $y = str_replace(' ', '', $y);
        return $y;

    }
}
