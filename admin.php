<?php
require_once 'PHP/config.php';
require_once 'PHP/data/categories.php';
require_once 'PHP/data/shoes.php';
require_once 'PHP/data/users.php';

if (!isset($_SESSION['username'])) {
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/admin.css">
    <link href="https://fonts.googleapis.com/css?family=Megrim&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>


    <!-- nav -->
    <?php

    require 'php/partials/header.php'

    ?>

    <!-- tables -->

    <!-- categories table -->

    <section id="categories">
        <div class="container m-auto p-5 myTable">
            <h1>Categories:</h1>
            <table id="catTable">
                <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="catTableBody">
                </tbody>
            </table>
            <button role="button" class="btn btn-info catBtn" id="addCat">Add A Category</button>

            <!-- popup add form -->

            <div class="modal addCat hideForm">
                <div class="modal-content">
                    <button type="button" class="close" aria-label="Close" id="closeAddCat">
                        <span aria-hidden="true">&#10006;</span>
                    </button>
                    <form>
                        <h2>Add Category:</h2>
                        <div class="form-group">
                            <label for="name">Category name:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Write a name...">
                        </div>
                        <button id='addBtn' type="button" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>


            <!-- popup update form -->

            <div class="modal updateCat hideForm">
                <div class="modal-content">
                    <button type="button" class="close" aria-label="Close" id="closeUpdateCat">
                        <span aria-hidden="true">&#10006;</span>
                    </button>
                    <form>
                        <h2>Update Category:</h2>
                        <div class="form-group">
                            <label for="updateName">Category name:</label>
                            <input type="text" class="form-control" id="updateName" name="updateName">
                        </div>
                        <button id='updateBtn' type="button" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>



    <!-- shoes -->


    <section id="shoes">
        <div class="container m-auto p-5 myTable">
            <h1>Shoes:</h1>
            <table id="shoesTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Size</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="shoesTableBody">
                </tbody>
            </table>
            <button role="button" class="btn btn-info shoesBtn" id="addShoes">Add Shoes</button>
            <div class="modal addShoes hideForm">
                <div class="modal-content">

                    <button type="button" class="close" aria-label="Close" id="closeAddShoes">
                        <span aria-hidden="true">&#10006;</span>
                    </button>
                    <form>
                        <h2>Add Shoes:</h2>
                        <div class="form-group">
                            <label for="shoesName">Name:</label>
                            <input class="form-control" type="text" id="shoesName" name="Name" placeholder="Write a name..">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input class="form-control" type="text" id="description" name="Description" placeholder="Write a description..">
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input class="form-control" type="number" id="price" name="Price" placeholder="Price">
                        </div>
                        <div class="form-group">
                            <label for="size">Size:</label>
                            <input class="form-control" type="number" id="size" name="Size" placeholder="Size">
                        </div>
                        <div class="form-group">
                            <label for="passcode">Passcode</label>
                            <input class="form-control" type="password" id="passcode" name="Passcode" placeholder="Passcode">
                        </div>
                        <div class="form-group">
                            <label for="imgUrl">Image Url:</label>
                            <input class="form-control" type="text" id="imgUrl" name="ImgUrl" placeholder="Image Url">
                        </div>
                        <button id='addShoesBtn' type="button" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>
            <div class="modal updateShoes hideForm">
                <div class="modal-content">
                    <button type="button" class="close" aria-label="Close" id="closeUpdateShoes">
                        <span aria-hidden="true">&#10006;</span>
                    </button>
                    <form>
                        <h2>Update Shoes:</h2>
                        <div class="form-group">
                            <label for="updateShoesName">Name:</label>
                            <input class="form-control" type="text" id="updateShoesName" name="updateShoesName">
                        </div>
                        <div class="form-group">
                            <label for="updateDescription">Description:</label>
                            <input class="form-control" type="text" id="updateDescription" name="updateDescription">
                        </div>
                        <div class="form-group">
                            <label for="updatePrice">Price:</label>
                            <input class="form-control" type="number" id="updatePrice" name="updatePrice">
                        </div>
                        <div class="form-group">
                            <label for="updateSize">Size:</label>
                            <input class="form-control" type="number" id="updateSize" name="updateSize">
                        </div>
                        <div class="form-group">
                            <label for="updatePasscode">Passcode:</label>
                            <input class="form-control" type="password" id="updatePasscode" name="updatePasscode">
                        </div>
                        <div class="form-group">
                            <label for="updateImgUrl">Image Url:</label>
                            <input class="form-control" type="text" id="updateImgUrl" name="updateImgUrl">
                        </div>
                        <button id='updateShoesBtn' type="button" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>




    <script src="JS/categories.js"></script>
    <script src="JS/shoes.js"></script>
</body>

</html>