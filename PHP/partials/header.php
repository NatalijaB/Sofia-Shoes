    <!-- NAV -->
    <?php 
    echo
    '<nav class="navbar navbar-dark navbar-expand-md py-2" id="main-nav">
        <div class="container">
            <a href="index.php" class="navbar-brand mr-auto">
                <img src="./assets/Logo.png" width="250" height="100" alt="brandLogo" class="img-fluid">
            </a>
            <button role="button" class="navbar-toggler" data-toggle="collapse" data-target="#idcollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="idcollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="sale.php" class="nav-link">Sale</a>
                    </li>';
                    if(isset($_SESSION['username'])){
                                        echo
                                    '<li class="nav-item">
                                    <a href="admin.php" class="nav-link">Admin</a>
                                </li>
                                    <li class="nav-item">
                                    <a href="logout.php" class="nav-link">Log Out</a>
                                </li>
                 </ul>
            </div>
        </div>
    </nav>';
} else{
        echo '
        <li class="nav-item">
                        <a href="login.php" class="nav-link">Admin</a>
                    </li>
        </ul>
        </div>
    </div>
</nav>';
    };

?>