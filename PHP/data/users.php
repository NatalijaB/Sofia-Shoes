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

    // L I S T I N G 
    public static function GetAllUsers()
    {
        $db = Database::getInstance()->getConnection();
        $query = "SELECT u.*, c.Username as cUsername, s.Username as uUsername,
        DATE_FORMAT(DATE(u.CreatedAt), '%d/%m/%Y') as cDate,
        DATE_FORMAT(DATE(u.UpdatedAt), '%d/%m/%Y') as uDate
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

    // L I S T   O N E
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



    // A D D I N G

    public static function AddUser($newUser)
    {
        $db = Database::getInstance()->getConnection();

        $fname = mysqli_escape_string($db, $newUser->FirstName);
        $lname = mysqli_escape_string($db, $newUser->LastName);
        $email = mysqli_escape_string($db, $newUser->Email);
        $username = mysqli_escape_string($db, $newUser->Username);
        $password = md5(mysqli_escape_string($db, $newUser->Password)) ;
        $userid = mysqli_escape_string($db, $newUser->CreatedBy);

        $query = "INSERT INTO users (`UsersId`, `FirstName`, `LastName`, `email`, `Username`, `password`, `CreatedAt`, `CreatedBy`) 
        VALUES (DEFAULT,'$fname', '$lname', '$email', '$username', '$password', CURRENT_TIMESTAMP, '$userid')";

        $result = mysqli_query($db, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // U P D A T I N G

    public static function UpdateUser($updateUser)
    {
        $db = Database::getInstance()->getConnection();

        $id = mysqli_escape_string($db, $updateUser->UsersId);
        $fname = mysqli_escape_string($db, $updateUser->FirstName);
        $lname = mysqli_escape_string($db, $updateUser->LastName);
        $email = mysqli_escape_string($db, $updateUser->Email);
        $password = md5(mysqli_escape_string($db, $updateUser->Password));
        $username = mysqli_escape_string($db, mysqli_escape_string($db, $updateUser->Username));
        $userid = mysqli_escape_string($db, $updateUser->UpdatedBy);

        $query = "UPDATE users SET FirstName='$fname', LastName='$lname', Email='$email', Username='$username', Password='$password', UpdatedAt= CURRENT_TIMESTAMP, UpdatedBy='$userid' WHERE UsersId='$id'";

        $result = mysqli_query($db, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }



    // D E L E T I N G


    public static function DeleteUser($data)
    {
        $db = Database::getInstance()->getConnection();

        $id = mysqli_escape_string($db, $data->Id);
        $userid = mysqli_escape_string($db, $data->DeletedBy);

        $query = "UPDATE users SET isDeleted='1', DeletedAt=CURRENT_TIMESTAMP, DeletedBy='$userid', WHERE UsersId='$id'";

        $result = mysqli_query($db, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // C H E C K I N G   U S E R N A M E

    public static function CheckUsername($username)
    {
        $db = Database::getInstance()->getConnection();

        $query = "SELECT Username FROM users WHERE UserName = '$username'";

        $usernameCheck = mysqli_query($db, $query);
        return $usernameCheck;
    }

     // C H E C K I N G   E M A I L

    public static function CheckEmail($em)
    {
        $db = Database::getInstance()->getConnection();

        $query = "SELECT Email FROM users WHERE Email ='$em'";

        $emCheck = mysqli_query($db, $query);
        $num_rows = mysqli_num_rows($emCheck);

        if ($num_rows > 0) {
            return true;
        } else{
            return false;
        }
    }

    // S A N I T 

    public static function sanit($x){

        $y = htmlspecialchars(strip_tags($x));
        $y = str_replace(' ', '', $y);
        return $y;

    }
}
