<?php

require_once 'php/config.php';
require_once 'php/data/categories.php';
require_once 'php/data/shoes.php';
require_once 'php/data/users.php';


$response_messages = array(
    405 => "Method Not Allowed",
    200 => "OK",
    400 => "Bad Request",
    404 => "File Not Found",
    500 => "Internal Server Error"
);

$response = new stdClass();
$response->status = 0;
$response->message = "";
$response->data = NULL;
$response->error = false;



$supported_methods = array("POST", "GET", "DELETE");
$method = strtoupper($_SERVER['REQUEST_METHOD']);



if (!in_array($method, $supported_methods)) {
    $response->status = 405;
    $response->data = NULL;
} else {
    $url_parts_counter = 0;
    $url_parts = array();

    if (isset($_SERVER['PATH_INFO'])) {

        $path_info = $_SERVER['PATH_INFO'];

        $url_parts = explode("/", $path_info);

        $url_parts_counter = count($url_parts) - 1;
    }

    try {


        switch ($method) {
            case "GET":

                if ($url_parts_counter == 1 and $url_parts[1] == "categories") {

                    $response->data = CategoriesData::GetAllCategories();

                    $response->status = 200;
                } else {
                    if ($url_parts_counter == 1 and $url_parts[1] == "shoes") {

                        $response->data = ShoesData::GetAllShoes();
                        $response->status = 200;
                    } else {
                        if ($url_parts_counter == 1 and $url_parts[1] == "users") {

                            $response->data = UsersData::GetAllUsers();
                            $response->status = 200;
                        } else {

                            // if ($url_parts_counter == 2 and $url_parts[1] == "categories") {

                            //     $id = intval($url_parts[2]);

                            //     if ($id > 0) {
                            //         $category = CategoriesData::GetCategory($id);
                            //         if ($category == NULL) {
                            //             $response->status = 404;
                            //             $response->data = NULL;
                            //         } else {
                            //             $response->data = $category;
                            //             $response->status = 200;
                            //         }
                            //     } else {
                            //         $response->status = 400;
                            //         $response->data = NULL;
                            //     }
                            // }
                            //  else {
                            //         if ($url_parts_counter == 2 and $url_parts[1] == "watchlist") {

                            //             $id = intval($url_parts[2]);
                            //             if ($id > 0) {
                            //                 $userWatchlist = WatchlistData::CreateWatchlist($id);

                            //                 if ($userWatchlist == NULL) {
                            //                     $response->status = 404;
                            //                     $response->data = NULL;
                            //                 } else {
                            //                     $response->data = $userWatchlist;
                            //                     $response->status = 200;
                            //                 }
                            //             } else {
                            //                 $response->status = 400;
                            //                 $response->data = NULL;
                            //             }
                            //         } else {
                            //             $response->status = 400;
                            //             $response->data = NULL;
                            //         }
                            //     }
                        }
                    }
                }
                break;

            case "POST":
                if ($url_parts_counter == 1 and $url_parts[1] == "categories") {

                    $data = json_decode(file_get_contents("php://input"));

                    if (!isset($data->Name)) {
                        $response->status = 400;
                        $response->data = NULL;
                    } else {
                        $id = CategoriesData::AddCategory($data);

                        if ($id == -1) {
                            $response->status = 400;
                            $response->data = NULL;
                        } else {
                            $response->data = $id;
                            $response->status = 201;
                        }
                    }
                } else {
                    if ($url_parts_counter == 1 and $url_parts[1] == "shoes") {

                        $data = json_decode(file_get_contents("php://input"));

                        if (!isset($data->Name) and !isset($data->Passcode) and !isset($data->Description) and !isset($data->Price) and !isset($data->Size) and !isset($data->ImgUrl)) {
                            $response->status = 400;
                            $response->data = NULL;
                        } else {
                            $id = ShoesData::AddShoes($data);

                            if ($id == -1) {
                                $response->status = 400;
                                $response->data = NULL;
                            } else {
                                $response->data = $id;
                                $response->status = 201;
                            }
                        }
                    } else {
                        if ($url_parts_counter == 2 and $url_parts[1] == "categories") {

                            $data = json_decode(file_get_contents("php://input"));

                            if (!isset($data->Id) and !isset($data->Name)) {
                                $response->status = 400;
                                $response->data = NULL;
                            } else {
                                $id = CategoriesData::UpdateCategory($data);

                                if ($id == -1) {
                                    $response->status = 400;
                                    $response->data = NULL;
                                } else {
                                    $response->data = $id;
                                    $response->status = 201;
                                }
                            }
                        } else {
                            $response->status = 400;
                            $response->data = NULL;
                        }
                    }

                    break;
                }
        }
    } catch (PDOException $e) {
        $response->status = 500;
        $response->data = NULL;
        $response->error = true;
    }

    $response->message = $response_messages[$response->status];
    header("HTTP/1.1 " . $response->status . " " . $response->message);


    header("Content-Type: application/json");

    if ($response->data != NULL) {

        echo json_encode($response->data);
    }
}