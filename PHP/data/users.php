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
        $query = "SELECT u.*, c.Username as cUsername, s.Username as uUsername,
        DATE_FORMAT(DATE(u.CreatedAt), '%D %M %Y') as cDate,
        DATE_FORMAT(DATE(u.UpdatedAt), '%D %M %Y') as uDate
        FROM users as u
        JOIN users as c
        ON u.CreatedBy = c.UsersId
        LEFT JOIN users as s
        ON u.UpdatedBy = s.UsersId
        WHERE u.isDeleted='0'";

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
        $password = $newUser->Password;
        $userid = $newUser->CreatedBy;

        $query = "INSERT INTO users (`UsersId`, `FirstName`, `LastName`, `email`, `Username`, `password`, `CreatedAt`, `CreatedBy`) 
        VALUES (DEFAULT,'$fname', '$lname', '$email', '$username', '$password', CURRENT_TIMESTAMP, '$userid')";

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

        $id = $updateUser->UsersId;
        $fname = $updateUser->FirstName;
        $lname = $updateUser->LastName;
        $email = $updateUser->email;
        $password = $updateUser->Password;
        $username = $updateUser->Username;
        $userid = $updateUser->UpdatedBy;

        $query = "UPDATE users SET FirstName='$fname', LastName='$lname', email='$email', Username='$username', Password='$password', UpdatedAt= CURRENT_TIMESTAMP, UpdatedBy='$userid' WHERE UsersId='$id'";

        $result = mysqli_query($db, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }



    // deleting


    public static function DeleteUser($data)
    {
        $db = Database::getInstance()->getConnection();

        $id=$data->Id;
        $userid=$data->DeletedBy;

        $query = "UPDATE users SET isDeleted='1', DeletedAt=CURRENT_TIMESTAMP, DeletedBy='$userid', WHERE UsersId='$id'";

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
