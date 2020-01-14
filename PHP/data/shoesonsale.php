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

    // L I S T I N G

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

        $query = "SELECT s.*, h.ShoesName as ShoesName, h.Price as Price, h.Description as Description, h.ImgUrl as ImgUrl, h.Size as Size,
        DATE_FORMAT(DATE(l.StartDate), '%d/%d/%Y') as StartDate,
        DATE_FORMAT(DATE(l.EndDate), '%d/%m/%Y') as EndDate
        FROM shoesonsale as s
        JOIN shoes as h
        ON s.ShoesId = h.ShoesId
        JOIN sales as l
        on l.SalesId = s.SalesId
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




    // A D D I N G

    public static function AddShoesOnSale($data)
    {
        $db = Database::getInstance()->getConnection();

        foreach ($data as $value) {

            $salesId = mysqli_real_escape_string($db, $value->SalesId);
            $shoesId = mysqli_real_escape_string($db, $value->ShoesId);
            
            $query = "INSERT INTO shoesonsale (`SalesId`, `ShoesId`) 
            VALUES ('$salesId', '$shoesId')";

            mysqli_query($db, $query);
        }
    }
}
