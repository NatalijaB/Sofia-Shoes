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

            <div class="modal addCat">
                <div class="modal-content">
                    <button type="button" class="close" aria-label="Close" id="closeAddCat">
                        <span aria-hidden="true">&#10006;</span>
                    </button>
                    <form>
                        <h2>Add Category:</h2>
                        <div class="form-group">
                            <label for="name">Category name:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Write a name..." required>
                        </div>
                        <button id='addBtn' type="button" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>


            <!-- popup update form -->

            <div class="modal updateCat">
                <div class="modal-content">
                    <button type="button" class="close" aria-label="Close" id="closeUpdateCat">
                        <span aria-hidden="true">&#10006;</span>
                    </button>
                    <form>
                        <h2>Update Category:</h2>
                        <div class="form-group">
                            <label for="updateName">Category name:</label>
                            <input type="text" class="form-control" id="updateName" name="updateName" required>
                        </div>
                        <button id='updateBtn' type="button" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>

            <!-- popup delete -->

            <div class="modal delCat">
                <div class="modal-content">
                    <button type="button" class="close" aria-label="Close" id="closeDelCat">
                        <span aria-hidden="true">&#10006;</span>
                    </button>
                    <h4>Are you sure you want to delete this category?</h4>
                    <br><br><br>
                    <button id="delBtn" type="button" class="btn btn-info">Delete</button>
                </div>
            </div>
        </div>
    </section>



    <!-- shoes table-->


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
                        <th>Category</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="shoesTableBody">
                </tbody>
            </table>
            <button role="button" class="btn btn-info shoesBtn" id="addShoes">Add Shoes</button>

            <!-- popup add form -->
            <div class="modal addShoes hideForm">
                <div class="modal-content">
                    <button type="button" class="close" aria-label="Close" id="closeAddShoes">
                        <span aria-hidden="true">&#10006;</span>
                    </button>
                    <form>
                        <h2>Add Shoes:</h2>
                        <div class="form-group">
                            <label for="shoesName">Name:</label>
                            <input class="form-control" type="text" id="shoesName" name="Name" placeholder="Write a name.." required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input class="form-control" type="text" id="description" name="Description" placeholder="Write a description.." required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price:</label>
                            <input class="form-control" type="number" id="price" name="Price" placeholder="Price" required>
                        </div>
                        <div class="form-group">
                            <label for="size">Size:</label>
                            <input class="form-control" type="number" id="size" name="Size" placeholder="Size" required>
                        </div>
                        <div class="form-group">
                            <label for="catOptions">Choose Category:</label>
                            <select name="categories" class="form-control" id="catOptions">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="passcode">Passcode</label>
                            <input class="form-control" type="password" id="passcode" name="Passcode" placeholder="Passcode" required>
                        </div>
                        <div class="form-group">
                            <label for="imgUrl">Image Url:</label>
                            <input class="form-control" type="text" id="imgUrl" name="ImgUrl" placeholder="Image Url" required>
                        </div>
                        <button id='addShoesBtn' type="button" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>

            <!-- popup update form -->
            <div class="modal updateShoes hideForm">
                <div class="modal-content">
                    <button type="button" class="close" aria-label="Close" id="closeUpdateShoes">
                        <span aria-hidden="true">&#10006;</span>
                    </button>
                    <form>
                        <h2>Update Shoes:</h2>
                        <div class="form-group">
                            <label for="updateShoesName">Name:</label>
                            <input class="form-control" type="text" id="updateShoesName" name="updateShoesName" required>
                        </div>
                        <div class="form-group">
                            <label for="updateDescription">Description:</label>
                            <input class="form-control" type="text" id="updateDescription" name="updateDescription" required>
                        </div>
                        <div class="form-group">
                            <label for="updatePrice">Price:</label>
                            <input class="form-control" type="number" id="updatePrice" name="updatePrice" required>
                        </div>
                        <div class="form-group">
                            <label for="updateSize">Size:</label>
                            <input class="form-control" type="number" id="updateSize" name="updateSize" required>
                        </div>
                        <div class="form-group">
                        <label for="catOptions">Choose Category:</label>
                            <select name="categories" class="form-control" id="updateCatOptions">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="updatePasscode">Passcode:</label>
                            <input class="form-control" type="password" id="updatePasscode" name="updatePasscode" required>
                        </div>
                        <div class="form-group">
                            <label for="updateImgUrl">Image Url:</label>
                            <input class="form-control" type="text" id="updateImgUrl" name="updateImgUrl" required>
                        </div>
                        <button id='updateShoesBtn' type="button" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>

            <!-- popup delete -->
            <div class="modal delShoes">
                <div class="modal-content">
                    <button type="button" class="close" aria-label="Close" id="closeDelShoes">
                        <span aria-hidden="true">&#10006;</span>
                    </button>
                    <h4>Are you sure you want to delete these shoes?</h4>
                    <br><br><br>
                    <button id="delShoesBtn" type="button" class="btn btn-info">Delete</button>
                </div>
            </div>
        </div>
    </section>


    <!-- users table -->



    <section id="users">
        <div class="container m-auto p-5 myTable">
            <h1>Users:</h1>
            <table id="usersTable">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="usersTableBody">
                </tbody>
            </table>
            <button role="button" class="btn btn-info usersBtn" id="addUsers">Add A User</button>

            <!-- popup add form -->

            <div class="modal addUsers hideForm">
                <div class="modal-content">
                    <button type="button" class="close" aria-label="Close" id="closeAddUsers">
                        <span aria-hidden="true">&#10006;</span>
                    </button>
                    <form>
                        <h2>Add User:</h2>
                        <div class="form-group">
                            <label for="fname">First name:</label>
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="First name" required>
                        </div>
                        <div class="form-group">
                            <label for="lname">Last name:</label>
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                        <button id='addUsersBtn' type="button" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>


            <!-- popup update form -->

            <div class="modal updateUsers hideForm">
                <div class="modal-content">
                    <button type="button" class="close" aria-label="Close" id="closeUpdateUsers">
                        <span aria-hidden="true">&#10006;</span>
                    </button>
                    <form>
                        <h2>Update User:</h2>
                        <div class="form-group">
                            <label for="updatefName">First name:</label>
                            <input type="text" class="form-control" id="updatefName" name="updatefName" required>
                        </div>
                        <div class="form-group">
                            <label for="updatelName">Last name:</label>
                            <input type="text" class="form-control" id="updatelName" name="updatelName" required>
                        </div>
                        <div class="form-group">
                            <label for="updateUsername">Username:</label>
                            <input type="text" class="form-control" id="updateUsername" name="updateUserName" required>
                        </div>
                        <div class="form-group">
                            <label for="updateEmail">Email:</label>
                            <input type="email" class="form-control" id="updateEmail" name="updateEmail" required>
                        </div>
                        <div class="form-group">
                            <label for="updatePassword">Password:</label>
                            <input type="password" class="form-control" id="updatePassword" name="updatePassword" required>
                        </div>
                        <button id='updateUsersBtn' type="button" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </div>

            <!-- popup delete -->
            <div class="modal delUsers">
                <div class="modal-content">
                    <button type="button" class="close" aria-label="Close" id="closeDelUsers">
                        <span aria-hidden="true">&#10006;</span>
                    </button>
                    <h4>Are you sure you want to delete this user?</h4>
                    <br><br><br>
                    <button id="delUsersBtn" type="button" class="btn btn-info">Delete</button>
                </div>
            </div>
        </div>
    </section>




    <script src="JS/categories.js"></script>
    <script src="JS/shoes.js"></script>
    <script src="JS/users.js"></script>
</body>

</html>