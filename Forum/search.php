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

    <style>
        #maincontainer {
            min-height: 100vh;
        }
    </style>

    <title>Code Project - coding forum</title>
</head>

<body>

    <!-- <h1>Hello, world!</h1> -->

    <?php
    include '../Forum/partials/dbconnect.php';
    include '../Forum/partials/header.php';
    ?>




    <!-- search results  -->
    <div class="container my-3" id="maincontainer">
        <div class="result">
            <h1 class="py-3">Search results for <em>"<?php
                                                        if (!empty($_GET["search"])) {
                                                            echo $_GET["search"];
                                                        }

                                                        ?>"</em></h1>

            <?php
            $noresult=true;
            if (!empty($_GET["search"])) {
                $query = filter_var($_GET['search'], FILTER_SANITIZE_STRING);
                $sql = "SELECT * FROM threads WHERE MATCH (`thread_title`, `thread_desc`) against ('$query')";
                $fetch = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($fetch)) {
                    $title = $row['thread_title'];
                    $desc = $row['thread_desc'];
                    $thread_id = $row['thread_id'];
                    $noresult=false;
                    $url = "thread.php?threadid=" . $thread_id;
                    echo '<h3><a href="' . $url . '" class="text-dark">' . $title . '</a></h3>
                    <p>' . $desc . '</p> ';
                }
            }

            if($noresult){
                echo '<div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <p class="display-4">No Results Found</p>
                        <p class="lead">Your search - '.$_GET["search"].' ... - did not match any documents.<br>

                        Suggestions:</ul>
                        <li>Make sure that all words are spelled correctly.</li>
                        <li>Try different keywords.</li>
                        <li>Try more general keywords.</p></li></ul>
                    </div>
                </div>';
            }
            ?>

        </div>

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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script> -->




    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>