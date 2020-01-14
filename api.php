<?php

require_once 'php/config.php';
require_once 'php/data/categories.php';
require_once 'php/data/shoes.php';
require_once 'php/data/users.php';
require_once 'php/data/sales.php';
require_once 'php/data/shoesonsale.php';


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
                            if ($url_parts_counter == 1 and $url_parts[1] == "sales") {

                                $response->data = SalesData::GetAllSales();
                                $response->status = 200;
                            } else {
                                if ($url_parts_counter == 1 and $url_parts[1] == "shoesonsale") {

                                    $response->data = ShoesOnSaleData::GetAllShoesOnSale();
                                    $response->status = 200;
                                } else {

                                    if ($url_parts_counter == 2 and $url_parts[1] == "categories") {

                                        $id = intval($url_parts[2]);

                                        if ($id > 0) {

                                            $category = CategoriesData::GetCategory($id);

                                            if ($category == NULL) {
                                                $response->status = 404;
                                                $response->data = NULL;
                                            } else {
                                                $response->data = $category;
                                                $response->status = 200;
                                            }
                                        } else {
                                            $response->status = 400;
                                            $response->data = NULL;
                                        }
                                    } else {
                                        if ($url_parts_counter == 2 and $url_parts[1] == "shoes") {

                                            $id = intval($url_parts[2]);

                                            if ($id > 0) {

                                                $shoes = ShoesData::GetShoes($id);

                                                if ($shoes == NULL) {
                                                    $response->status = 404;
                                                    $response->data = NULL;
                                                } else {
                                                    $response->data = $shoes;
                                                    $response->status = 200;
                                                }
                                            } else {
                                                $response->status = 400;
                                                $response->data = NULL;
                                            }
                                        } else {
                                            if ($url_parts_counter == 2 and $url_parts[1] == "users") {

                                                $id = intval($url_parts[2]);

                                                if ($id > 0) {
                                                    $user = USersData::GetUser($id);
                                                    if ($user == NULL) {
                                                        $response->status = 404;
                                                        $response->data = NULL;
                                                    } else {
                                                        $response->data = $user;
                                                        $response->status = 200;
                                                    }
                                                } else {
                                                    $response->status = 400;
                                                    $response->data = NULL;
                                                }
                                            } else {
                                                if ($url_parts_counter == 2 and $url_parts[1] == "sales") {

                                                    $id = intval($url_parts[2]);

                                                    if ($id > 0) {
                                                        $sale = SalesData::GetSale($id);
                                                        if ($sale == NULL) {
                                                            $response->status = 404;
                                                            $response->data = NULL;
                                                        } else {
                                                            $response->data = $sale;
                                                            $response->status = 200;
                                                        }
                                                    } else {
                                                        $response->status = 400;
                                                        $response->data = NULL;
                                                    }
                                                } else {
                                                    if ($url_parts_counter == 2 and $url_parts[1] == "shoesonsale") {

                                                        $id = intval($url_parts[2]);

                                                        if ($id > 0) {
                                                            $shoesonsale = ShoesOnSaleData::GetShoesOnSale($id);
                                                            if ($shoesonsale == NULL) {
                                                                $response->status = 404;
                                                                $response->data = NULL;
                                                            } else {
                                                                $response->data = $shoesonsale;
                                                                $response->status = 200;
                                                            }
                                                        } else {
                                                            $response->status = 400;
                                                            $response->data = NULL;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                break;

            case "POST":
                if ($url_parts_counter == 1 and $url_parts[1] == "categories") {

                    $data = json_decode(file_get_contents("php://input"));

                    if (!isset($data->CatName)) {
                        $response->status = 400;
                        $response->data = NULL;
                    } else {
                        $id = CategoriesData::AddCategory($data);

                        if ($id === 0) {
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

                        if (!isset($data->ShoesName) or !isset($data->Passcode) or !isset($data->Description) or !isset($data->Price) or !isset($data->Size) or !isset($data->ImgUrl) or !isset($data->Category)) {

                            $response->status = 400;
                            $response->data = NULL;
                        } else {
                            $id = ShoesData::AddShoes($data);

                            if ($id === 0) {
                                $response->status = 400;
                                $response->data = NULL;
                            } else {
                                $response->data = $id;
                                $response->status = 201;
                            }
                        }
                    } else {
                        if ($url_parts_counter == 1 and $url_parts[1] == "users") {

                            $data = json_decode(file_get_contents("php://input"));

                            if (!isset($data->FirstName) and !isset($data->LastName) and !isset($data->Email) and !isset($data->Password) and !isset($data->Username) and !isset($data->CreatedBy)) {
                                $response->status = 400;
                                $response->data = NULL;
                            } else {
                                $id = UsersData::AddUser($data);

                                if ($id === 0) {
                                    $response->status = 400;
                                    $response->data = NULL;
                                } else {
                                    $response->data = $id;
                                    $response->status = 201;
                                }
                            }
                        } else {
                            if ($url_parts_counter == 1 and $url_parts[1] == "sales") {

                                $data = json_decode(file_get_contents("php://input"));

                                if (!isset($data->SalesName) and !isset($data->Date) and !isset($data->CreatedBy)) {
                                    $response->status = 400;
                                    $response->data = NULL;
                                } else {
                                    $id = SalesData::AddSale($data);

                                    if ($id === 0) {
                                        $response->status = 400;
                                        $response->data = NULL;
                                    } else {
                                        $response->data = $id;
                                        $response->status = 201;
                                    }
                                }
                            } else {
                                if ($url_parts_counter == 1 and $url_parts[1] == "shoesonsale") {

                                    $data = json_decode(file_get_contents("php://input"));

                                    if (!isset($data)) {
                                        $response->status = 400;
                                        $response->data = NULL;
                                    } else {
                                        $id = ShoesOnSaleData::AddShoesOnSale($data);

                                        if ($id === 0) {
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

                                        if (!isset($data->CatId) or !isset($data->CatName) or !isset($data->UpdatedBy)) {
                                            $response->status = 400;
                                            $response->data = NULL;
                                        } else {
                                            $id = CategoriesData::UpdateCategory($data);

                                            if ($id === 0) {
                                                $response->status = 400;
                                                $response->data = NULL;
                                            } else {
                                                $response->data = $id;
                                                $response->status = 201;
                                            }
                                        }
                                    } else {
                                        if ($url_parts_counter == 2 and $url_parts[1] == "shoes") {

                                            $data = json_decode(file_get_contents("php://input"));

                                            if (!isset($data->ShoesId) or !isset($data->ShoesName) or !isset($data->Price) or !isset($data->Description) or !isset($data->Size) or !isset($data->Passcode) or !isset($data->ImgUrl) or !isset($data->Category) or !isset($data->UpdatedBy)) {
                                                $response->status = 400;
                                                $response->data = NULL;
                                            } else {
                                                $id = ShoesData::UpdateShoes($data);

                                                if ($id === 0) {
                                                    $response->status = 400;
                                                    $response->data = NULL;
                                                } else {
                                                    $response->data = $id;
                                                    $response->status = 201;
                                                }
                                            }
                                        } else {
                                            if ($url_parts_counter == 2 and $url_parts[1] == "users") {

                                                $data = json_decode(file_get_contents("php://input"));

                                                if (!isset($data->UsersId) or !isset($data->FirstName) or !isset($data->LastName) or !isset($data->Username) or !isset($data->Email) or !isset($data->Password) or !isset($data->UpdatedBy)) {
                                                    $response->status = 400;
                                                    $response->data = NULL;
                                                } else {
                                                    $id = UsersData::UpdateUser($data);

                                                    if ($id === 0) {
                                                        $response->status = 400;
                                                        $response->data = NULL;
                                                    } else {
                                                        $response->data = $id;
                                                        $response->status = 201;
                                                    }
                                                }
                                            } else {
                                                if ($url_parts_counter == 2 and $url_parts[1] == "sales") {

                                                    $data = json_decode(file_get_contents("php://input"));

                                                    if (!isset($data->SalesId) or !isset($data->Date) and !isset($data->UpdatedBy)) {
                                                        $response->status = 400;
                                                        $response->data = NULL;
                                                    } else {
                                                        $id = SalesData::UpdateSale($data);

                                                        if ($id === 0) {
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
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                break;

            case "DELETE":
                if ($url_parts_counter == 2 and $url_parts[1] == "categories") {


                    $id = intval($url_parts[2]);

                    $data = json_decode(file_get_contents("php://input"));

                    $isDeleted = CategoriesData::DeleteCategory($data);

                    if ($id == 0) {
                        $response->status = 400;
                        $response->data = NULL;
                    } else {
                        $response->data = $isDeleted;
                        $response->status = 201;
                    }
                } else {
                    if ($url_parts_counter == 2 and $url_parts[1] == "shoes") {


                        $id = intval($url_parts[2]);

                        $data = json_decode(file_get_contents("php://input"));

                        $isDeleted = ShoesData::DeleteShoes($data);

                        if ($id == 0) {
                            $response->status = 400;
                            $response->data = NULL;
                        } else {
                            $response->data = $isDeleted;
                            $response->status = 201;
                        }
                    } else {
                        if ($url_parts_counter == 2 and $url_parts[1] == "users") {


                            $id = intval($url_parts[2]);


                            $data = json_decode(file_get_contents("php://input"));

                            $isDeleted = UsersData::DeleteUser($data);

                            if ($id == 0) {
                                $response->status = 400;
                                $response->data = NULL;
                            } else {
                                $response->data = $isDeleted;
                                $response->status = 201;
                            }
                        } else {
                            if ($url_parts_counter == 2 and $url_parts[1] == "sales") {


                                $id = intval($url_parts[2]);


                                $data = json_decode(file_get_contents("php://input"));

                                $isDeleted = SalesData::DeleteSale($data);

                                if ($id == 0) {
                                    $response->status = 400;
                                    $response->data = NULL;
                                } else {
                                    $response->data = $isDeleted;
                                    $response->status = 201;
                                }
                            }
                        }
                    }
                }
                break;
        }
    } catch (PDOException $e) {
        $response->status = 500;
        $response->data = NULL;
        $response->error = true;
    }

    $response->message = $response_messages[$response->status];
    header("HTTP/1.1 " . $response->status . " " . $response->message);


    header("Content-Type: application/json; charset=utf-8");

    if ($response->data != NULL) {

        echo json_encode($response->data);
    }
}
