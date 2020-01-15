<?php
require_once 'PHP/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shoes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
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
    <!-- 
    <section class="container">
        <div id="mainPhoto">
        </div>
    </section> -->


    <!-- Products -->

    <section class="container">
        <h1>Featured:</h1>
        <h3>Filter by:</h3>
        <div class="row">
            <div class="col-lg-4">
                <form>
                    <div class="form-group">
                        <label for="catF" class="text-muted">Category:</label>
                        <select class="form-control" name="Category" id="catF">
                            <option value=""></option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                <form>
                    <div class="form-group">
                        <label for="nameF" class="text-muted">Name:</label>
                        <select class="form-control" name="Name" id="nameF">
                            <option value=""></option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                <!-- <h3>Price</h3>
                <input type="hidden" id="hidden_minimum_price" value="0" />
                <input type="hidden" id="hidden_maximum_price" value="65000" />
                <p id="priceShow">1000 - 65000</p>
                <div id="priceRange"></div> -->
            </div>
        </div>
        <div class="row" id="shoes">
        </div>
    </section>


    <script src="JS/helpers.js" type="text/javascript"></script>
    <script src="JS/index.js" type="text/javascript"></script>
    <script src="JS/categories.js" type="text/javascript"></script>
</body>

</html>