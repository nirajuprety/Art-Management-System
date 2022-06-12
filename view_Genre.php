<!doctype html>
<html class="no-js" lang="en">

<!-- login.html  03:24:52 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Drophut - Single Product eCommerce Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">



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
    <?php
			include_once("DatabaseConnect.php");
            $EraID= $_GET['EraID'];
            ?>


    <div class="container my-4">
        <?php
        
          $sql = "SELECT * FROM genres WHERE EraID = $EraID";
          $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
          while( $record = mysqli_fetch_assoc($resultset) ) 
          {
           
              ?>


        <div class="col-sm-6">
            <div class="row-md-2">
                <div
                    class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <!-- <strong class="d-inline-block mb-2 text-primary">World</strong> -->
                        <h3>
                            <?php echo $record['GenreName']; ?>
                        </h3>
                        <!-- <div class="mb-1 text-muted"></div> -->
                        <p class="card-text mb-auto">
                            <?php echo $record['Description']; ?>

                        </p>
                        <a href="paintings_genre.php?GenreID=<?php echo  $record['GenreID'];;  ?>">Open</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="200" height="250" src="img/artist/100.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <?php
          }
              ?>
    </div>

</body>

</html>