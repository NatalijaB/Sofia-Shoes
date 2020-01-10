<?php
require_once 'PHP/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/index.css">
    <link href="https://fonts.googleapis.com/css?family=Megrim&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">

</head>

<body>


    <!-- NAV -->
    <?php
    require 'php/partials/header.php'

    ?>


    <!-- Main Photo -->

    <section class="container">
        <div id="mainPhoto">
        </div>
    </section>


    <!-- Products -->

    <section class="container">
        <h1>Featured:</h1>
        <!-- <div class="form-group">
            <label for="order">Order shoes by:</label>
            <select name="order" id="order" class="form-control">
                <option value=""></option>
                <option value="Name">Name</option>
                <option value="Price">Price</option>
                <option value="Category">Category</option>
            </select> -->
        </div>


        <div class="row">
        </div>
    </section>


    <script src="JS/index.js" type="text/javascript"></script>
</body>

</html>