<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
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
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <img class="card-img-top" src="./assets/PseudoProduct1.jpg" alt="cardImg">
                    <div class="card-body">
                        <h5 class="card-title">Fendi</h5>
                        <p class="card-text">Black heels with pearls</p>
                        <p id="price">$99</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img class="card-img-top" src="./assets/PseudoProduct2.jpg" alt="cardImg">
                    <div class="card-body">
                        <h5 class="card-title">Prada</h5>
                        <p class="card-text">Black heels with pearls</p>
                        <p id="price">$99</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img class="card-img-top" src="./assets/PseudoProduct3.jpg" alt="cardImg">
                    <div class="card-body">
                        <h5 class="card-title">Dior</h5>
                        <p class="card-text">Black heels with pearls</p>
                        <p id="price">$99</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img class="card-img-top" src="./assets/PseudoProduct4.jpg" alt="cardImg">
                    <div class="card-body">
                        <h5 class="card-title">Manolo Blahnik</h5>
                        <p class="card-text">Black heels with pearls</p>
                        <p id="price">$99</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


</body>

</html>