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


    <!-- Main Photo -->

    <section class="container">
        <div id="mainPhoto">
        </div>
    </section>


    <!-- Products -->

    <section class="container">
        <a href="admin.php">Admin</a>
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