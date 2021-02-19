<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="shortcut icon" href="../Forum/favicon/download.png" type="image/x-icon">

    <title>Code Project - coding forum</title>
</head>

<body>

    <!-- <h1>Hello, world!</h1> -->

    <?php
    include '../Forum/partials/dbconnect.php';
    include '../Forum/partials/header.php';
    ?>


    <!-- slider -->

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="../Forum/jumbo_tron/1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../Forum/jumbo_tron/2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../Forum/jumbo_tron/3.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <!-- category container start here -->
    <h2 class="text-center my-3" style="font-family:cursive;">Categories</h2>

    <?php
    echo'<form action="search.php" method="GET">
        <div class="container float-sm-right" style=" width:20rem;">
            <div class="input-group ">
                <input type="text" class="form-control" id="search" name="search" placeholder="Search from threads" style="font-family:cursive;">
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>

        </div>
    </form>';
    ?>


    <div class="container row my-5 mt-4 d-flex flex-row" style=" margin-left: 13rem; margin-top:4rem!important;">

        <!-- fetch all the categories  -->
        <!-- use a for loop to iterate  -->
        <?php


        $sql = "SELECT * FROM `categories`";

        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {

            // echo $row ['category_id'];
            // echo $row ['category_id'];

            $id = $row['category_id'];
            $cat = $row['category_name'];
            $desc = $row['category_description'];
            // $cat = $row['category_name'];

            echo  '<div class="col-md-4 my-2" style="font-family:cursive;">
                <div class="card" style="width: 18rem;">
                    <img src="../forum/card_img/1.jpg" class="card-img-top" alt="...">
                    <div class="card-body  p-3 mb-0 bg-white rounded">
                        <h5 class="card-title text-success">' . $cat . '</h5>
                        <p class="card-text">' . substr($desc, 0, 90) . '....</p>
                        <a href="../forum/threads.php?catid=' . $id . '" class="btn btn-outline-success">View Threads</a>
                    </div>
                </div>
                </div>';
        }
        ?>
    </div>

    <?php include '../Forum/partials/footer.php'; ?>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>