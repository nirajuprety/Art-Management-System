<?php
session_start();
?>
<?php
// if(!isset($_SESSION['UserName'])){
//     die(header("location: index.php"));
// }
// else{

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Welcome to iCoder. A blog for coding enthusiasts">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="Userindex.php">ePaintings</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="Userindex.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Browse
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="artist.php">Artist</a>
                        <a class="dropdown-item" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Paintings
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="era.php">Era</a>

                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                </li>


            </ul>
            <form class="form-inline my-2 my-lg-0" action="search.php" method="post">
                <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search" aria-label="Search">
                <button name="submit" class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form>
            <div class="mx-2">
                <button class="btn btn-danger" data-toggle="modal" data-target="#loginModal">Logout</button>
                <button class="btn btn-danger" data-toggle="modal" data-target="#signupModal">My Account</button>
            </div>
        </div>
    </nav>



    <!-- Logout Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Do you really want to logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="logout.php" method="POST">

                        <button name="submit" type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    //
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "art";
    //  create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // check connection
    if (!$conn) {
        die("connection failed" . mysqli_connect_error());
    }

    if (isset($_POST['submit'])) {
        
        if (!empty($_POST['exampleInputEmail1']) && !empty($_POST['exampleInputPassword1'])) {
            session_start();
            $email = $_POST['exampleInputEmail1'];
            $password = $_POST['exampleInputPassword1'];
        
            $sql = "SELECT * FROM customerlogon where UserName  = '$email'";
            if ($result = mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        $_SESSION['UserName'] = $row['UserName'];
                        //$_SESSION['CustomerID'] = $row['CustomerID'];
                        // if($row['UserName'] == $email && $row['Pass'] == $password) {
                        //     $_SESSION['UserName'] = $email;
                            
                        // } else {
                        //     echo "Password or UserName is not correct  " . mysqli_error($conn);
                        //     echo ' <a href="login.html">Click here</a>';
                        // }
                    }
                    // Free result set
                   // mysqli_free_result($result);
                } else {
                    echo "No records matching your query were found.";
                }
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }

            // Close connection
            mysqli_close($conn);
        } else {
        header('location:index.html');
        }
    }
    ?>
    <!-- User Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">User Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="signup.php" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><?php
                                //username
                               echo $_SESSION['UserName'];
                            ?></label>
                        </div>
                        <div class="form-group">
                            <label for="cexampleInputPassword1"><?php 
                            //customer id
                           
                          //  echo $_SESSION['CustomerID'] ;

                            ?>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/carousel/1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Welcome to Epaintings</h2>
                    <p>Explore paintings with us</p>
                    <button class="btn btn-danger">Search Artist</button>
                    <button class="btn btn-primary">Search Paintings</button>
                    <button class="btn btn-success">Buy paintings</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/carousel/2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h2>The Best painting site</h2>
                    <p>Epaintings - Explore paintings with us</p>
                    <button class="btn btn-danger">Search Artist</button>
                    <button class="btn btn-primary">Search Paintings</button>
                    <button class="btn btn-success">Buy paintings</button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/carousel/010020.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Trust of many clients</h2>
                    <p>Epaintings - Explore paintings with us</p>
                    <button class="btn btn-danger">Search Artist</button>
                    <button class="btn btn-primary">Search Paintings</button>
                    <button class="btn btn-success">Buy paintings</button>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container my-4">
        <div class="row mb-2">
            <div class="col-md-6">
                <div
                    class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <!-- <strong class="d-inline-block mb-2 text-primary">World</strong> -->
                        <h3 class="mb-0">Popular Paintings</h3>
                        <!-- <div class="mb-1 text-muted"></div> -->
                        <p class="card-text mb-auto">As "famous" is a subjective term, CNN Style turned to Google to see
                            which paintings topped search results worldwide over the past five years.</p>
                        <a href="latest_paintings.php" class="stretched-link">Open</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="200" height="250" src="img/001090.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div
                    class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <!-- <strong class="d-inline-block mb-2 text-success">Design</strong> -->
                        <h3 class="mb-0">Popular artist</h3>
                        <!-- <div class="mb-1 text-muted">Nov 11</div> -->
                        <p class="card-text mb-auto">As "famous" is a subjective term, CNN Style turned to Google to see
                            which paintings topped search results worldwide over the past five years.</p>
                        <a href="popular_artists.php" class="stretched-link">Open</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="200" height="250" src="img/5.jpg" alt="">

                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-md-6">
                <div
                    class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <!-- <strong class="d-inline-block mb-2 text-danger">FrontEnd</strong> -->
                        <h3 class="mb-0">Latest Paintings</h3>
                        <!-- <div class="mb-1 text-muted">Nov 12</div> -->
                        <p class="card-text mb-auto">As "famous" is a subjective term, CNN Style turned to Google to see
                            which paintings topped search results worldwide over the past five years.</p>
                        <a href="#" class="stretched-link">Open</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="200" height="250" src="img/001180.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div
                    class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <!-- <strong class="d-inline-block mb-2 text-warning">Python</strong> -->
                        <h3 class="mb-0">Recently Buyed Paintings</h3>
                        <!-- <div class="mb-1 text-muted">Nov 11</div> -->
                        <p class="mb-auto">As "famous" is a subjective term, CNN Style turned to Google to see which
                            paintings topped search results worldwide over the past five years.</p>
                        <a href="#" class="stretched-link">Open</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="200" height="250" src="img/008010.jpg" alt="">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>© 2020-2021 Epaintings, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>
<?php
// }
?>