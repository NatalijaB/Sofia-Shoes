<?php

class ShoesOnSaleData
{

    public $sales;
    public $shoes;

    public function __construct($sales, $shoes)
    {
        $this->sales = $sales;
        $this->shoes = $shoes;
    }

    //L I S T I N G

    public static function GetAllShoesOnSale()
    {
        $db = Database::getInstance()->getConnection();

        $query = "SELECT * FROM shoesonsale";

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


    // L I S T   O N E 

    public static function GetShoesOnSale($id)
    {
        $db = Database::getInstance()->getConnection();

        $query = "SELECT s.*, h.ShoesName as ShoesName, h.Price as Price, h.Description as Description, h.ImgUrl as ImgUrl, h.Size as Size
        FROM shoesonsale as s
        JOIN shoes as h
        ON s.ShoesId = h.ShoesId
        WHERE s.SalesId='$id'";

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

    public static function AddShoesOnSale($data)
    {
        $db = Database::getInstance()->getConnection();

        foreach ($data as $value) {
            $query = "INSERT INTO shoesonsale (`SalesId`, `ShoesId`) 
            VALUES ('$value->SalesId', '$value->ShoesId')";

            mysqli_query($db, $query);
        }
    }
}
