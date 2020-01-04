<?php
require_once 'PHP/config.php';
require_once 'PHP/data/categories.php';
require_once 'PHP/data/shoes.php';
require_once 'PHP/data/users.php';
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


    <!-- NAV -->
    <nav class="navbar navbar-dark navbar-expand-md py-2" id="main-nav">
        <div class="container">
            <a href="#" class="navbar-brand mr-auto">
                <img src="./assets/Logo.png" width="250" height="100" alt="brandLogo" class="img-fluid">
            </a>
            <button role="button" class="navbar-toggler" data-toggle="collapse" data-target="#idcollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="idcollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Shop Now</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- tables -->

    <!-- categories -->

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
            <div class="center addCat hideForm">
                <button id="closeAddCat" style="float: right;">X</button>
                <form>
                    Category Name:<br>
                    <input type="text" id="Name" name="Name" placeholder="Write a name..">
                    <br>
                    <button id='addBtn' type="button" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="center updateCat hideForm">
                <button id="closeUpdateCat" style="float: right;">X</button>
                <form>
                    Category Name:<br>
                    <input type="text" id="updateName" name="updateName" placeholder="Update name...">
                    <br>
                    <button id='updateBtn' type="button" class="btn btn-primary">Submit</button>
                </form>
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
            <div class="center addShoes hideForm">
                <button id="closeAddShoes" style="float: right;">X</button>
                <form>
                    Name:<br>
                    <input type="text" id="shoesName" name="Name" placeholder="Write a name..">
                    <br>
                    <input type="text" id="description" name="Description" placeholder="Write a description..">
                    <br>
                    <input type="number" id="price" name="Price" placeholder="Price">
                    <br>
                    <input type="number" id="size" name="Size" placeholder="Size">
                    <br>
                    <input type="text" id="passcode" name="Passcode" placeholder="Passcode">
                    <br>
                    <input type="text" id="imgUrl" name="ImgUrl" placeholder="Image Url">
                    <br>
                    <button id='addShoesBtn' type="button" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="center updateShoes hideForm">
                <button id="closeUpdateShoes" style="float: right;">X</button>
                <form>
                    Name:<br>
                    <input type="text" id="updateShoesName" name="updateName" placeholder="Update name...">
                    <br>
                    <input type="text" id="updateDescription" name="Description" placeholder="Update description..">
                    <br>
                    <input type="number" id="updatePrice" name="Price" placeholder="Price">
                    <br>
                    <input type="number" id="updateSize" name="Size" placeholder="Size">
                    <br>
                    <button id='updateShoesBtn' type="button" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>







    



    <script src="JS/categories.js"></script>
    <script src="JS/shoes.js"></script>
</body>

</html>