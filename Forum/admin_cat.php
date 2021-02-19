<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../Forum/favicon/download.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">


    <title>Code Project - coding forum</title>
</head>

<body>

    <!-- <h1>Hello, world!</h1> -->

    <?php
    include '../Forum/partials/dbconnect.php';
    include '../Forum/partials/header.php';
    ?>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $c_title = $_POST['c_title'];
        $c_description = $_POST['c_description'];
        if (!empty($c_title) && !empty($c_description)) {

            $sql = "INSERT INTO `categories` (`category_name`, `category_description`) VALUES ('$c_title', '$c_description')";
            $result = mysqli_query($conn, $sql);
        }
    }
    echo ' <div class="container my-3">
        <form action=' . $_SERVER["REQUEST_URI"] . ' method="POST">
            <div class="form-group">
                <label for="c_title">Category Title</label>
                <input type="text" class="form-control" id="c_title" name="c_title" placeholder="Category Title">
            </div>
            <div class="form-group">
                <label for="c_description">Category Description</label>
                <textarea class="form-control" id="c_description" name="c_description" rows="3" placeholder="Category Description"></textarea>
            </div>
            <button type="submit" class="btn btn-outline-success col-md-3">Post Category</button>
        </form>
    </div>';
    ?>


    <?php

    echo '<div class="container-fluid" style="font-size:small;">

        <table class="table table-striped table-succcess" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Serial No</th>
                    <th scope="col">Category Title</th>
                    <th scope="col">Category Description</th>
                    <th scope="col">Time</th>
                </tr>
            </thead>
            <tbody>';

    $sql = "SELECT * FROM `categories`";

    $result = mysqli_query($conn, $sql);
    // $nextWeek = time() ;
    $sno = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['category_id'];
        $cat = $row['category_name'];
        $desc = $row['category_description'];
        $time = $row['created'];
        $sno = $sno+1;

        echo '<tr>
                            <th scope="row">' . $sno . '</th>
                            <td>' . $cat . '</td>
                            <td>' . $desc . '</td>
                            <td>'.substr($time, 0, 10).'</td>
                        </tr>';
    }


    echo '</tbody>
        </table>
    </div>';
    ?>

    <div class="container-fluid bg-dark text-light sticky-bottom">

        <p class="text-center  mb-0"> Copyright &#169; iDiscuss coding forums <?php echo date("Y");?> | All Right Reserved &#174; Mayank Srivastava </p>

    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"> -->
    </script>

    <!-- datatable cdn starts -->
    <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <!-- datatable cdn ends -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>