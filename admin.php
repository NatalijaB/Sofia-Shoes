<?php
require_once 'PHP/config.php';
require_once 'PHP/data/categories.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/admin.css">
    <link href="https://fonts.googleapis.com/css?family=Megrim&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
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


    <!-- table -->

     <div class="container m-auto p-5 myTable">
        <h1>Categories:</h1>
        <table id="myTable">
            <thead>
                <tr>
                    <th>Category name</th>
                </tr>
            </thead>
            <tbody>
            <?php
            CategoriesData::GetAllCategories();
             ?> 
            </tbody>
        </table>
    </div>


    <!-- <div class="container m-auto p-5 myTable">
        <h1>Categories:</h1>
        <table id="myTable">
            <thead>
                <tr>
                    <th>Class name</th>
                    <th>Type</th>
                    <th>Hours</th>
                    <th>Trainer</th>
                    <th>Spots</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Like a butterfly</td>
                    <td>Boxing</td>
                    <td>9:00 AM - 11:00 AM</td>
                    <td>Aaron Chapman</td>
                    <td>10</td>
                </tr>

                <tr>
                    <td>Mind & Body</td>
                    <td>Yoga</td>
                    <td>8:00 AM - 9:00 AM</td>
                    <td>Adam Stewart</td>
                    <td>15</td>
                </tr>

                <tr>
                    <td>Crit Cardio</td>
                    <td>Gym</td>
                    <td>9:00 AM - 10:00 AM</td>
                    <td>Aaron Chapman</td>
                    <td>10</td>
                </tr>

                <tr>
                    <td>Wheel Pose Full Posture</td>
                    <td>Yoga</td>
                    <td>7:00 AM - 8:30 AM</td>
                    <td>Donna Wilson</td>
                    <td>15</td>
                </tr>

                <tr>
                    <td>Playful Dancer's Flow</td>
                    <td>Yoga</td>
                    <td>8:00 AM - 9:00 AM</td>
                    <td>Donna Wilson</td>
                    <td>10</td>
                </tr>

                <tr>
                    <td>Zumba Dance</td>
                    <td>Dance</td>
                    <td>5:00 PM - 7:00 PM</td>
                    <td>Donna Wilson</td>
                    <td>20</td>
                </tr>

                <tr>
                    <td>Cardio Blast</td>
                    <td>Gym</td>
                    <td>5:00 PM - 7:00 PM</td>
                    <td>Randy Porter</td>
                    <td>10</td>
                </tr>

                <tr>
                    <td>Pilates Reformer</td>
                    <td>Gym</td>
                    <td>8:00 AM - 9:00 AM</td>
                    <td>Randy Porter</td>
                    <td>10</td>
                </tr>
            </tbody>
        </table>
    </div>  -->




    <script src="JS/admin.js"></script>
</body>

</html>