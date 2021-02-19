<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="shortcut icon" href="../Forum/favicon/download.png" type="image/x-icon">


        <title>Code Project - coding forum</title>
</head>

<body>
    <!-- <h1>Hello, world!</h1> -->

    <?php
    include '../Forum/partials/dbconnect.php';
    include '../Forum/partials/header.php';

    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE `thread_id` = $id; ";
    $fetch = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($fetch)) {
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];

        // query the users table 
        $thread_user_id = $row['thread_user_id'];
        $sql = "SELECT `user_email` FROM `users` WHERE sno = '$thread_user_id'";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $posted_by = $row['user_email'];


        echo ' <div class="container my-4" style="font-family:cursive;">
        <div class="jumbotron">
        <h1 class="display-4">' . $title . ' </h1>
        <hr class="my-4">
        <p>' . $desc . '</p>
        <p class="lead">
        <!-- <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a> -->
        <p class="text"> Posted By:<em><b> ' .$posted_by. '</b> </em></p>
        </p>
        </div>
        </div>';
    }
    // if ($noResult) {
    //     echo '<div class="jumbotron jumbotron-fluid">
    //         <div class="container">
    //           <p class="display-4">No Threads Found</p>
    //           <p class="lead"><b>Be the first person to comments.</b></p>
    //         </div>
    //       </div>';
    // }
    ?>

    <?php
    $showAlert = false;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // insert thread into comment db
        $comment = $_POST['comment'];
        // $comment = str_replace("<", "&alt;" ,$comment);
        // $comment = str_replace(">", "&gt;" ,$comment);
        $comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
        $sno = $_POST["sno"];
        if (!empty($comment) && !empty($sno)) {

            $sql = "INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`) VALUES ('$comment', '$id', '$sno' )";
            $result = mysqli_query($conn, $sql);
            $showAlert = true;
            if ($showAlert) {

                echo '<script></script>';
            }
        }
    }

    ?>

    <?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
 
    echo
    '<div class="container" style="font-family:cursive;">

        <h2 class="py-2">Post a Comment</h2>

        <div class="container">

            <form action="'. $_SERVER['REQUEST_URI'].'" method="POST">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Type your Comment</label>
                    <textarea class="form-control" id="desc" name="comment" rows="3"></textarea>
                    <input type="hidden" name="sno" value='.$_SESSION["sno"].'>
                </div>
                <button type="submit" class="btn btn-outline-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-right-dots" viewBox="0 0 16 16">
                        <path d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1H2zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z" />
                        <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                    </svg> Post Comment</button>
            </form>
        </div>
        </div>';
}
else{

    echo
    '<div class="container" style="font-family:cursive;">

        <h2 class="py-2">Post a Comment</h2>

        <div class="container">

            <form action="" method="POST">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Type your Comment</label>
                    <textarea class="form-control" id="desc" name="comment" rows="3" placeholder="Please login to comment" disabled></textarea>
                </div>
                <button type="submit" class="btn btn-outline-success" disabled>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-right-dots" viewBox="0 0 16 16">
                        <path d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1H2zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z" />
                        <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                    </svg> Post Comment</button>
            </form>
        </div>
        </div>';

}
?>


    <div class="container">


        <h2 class="py-2">Comments</h2>

        <?php

            $id = $_GET['threadid'];
            $sql = "SELECT * FROM `comments` WHERE `thread_id` = $id";
            // echo $sql;
            $fetch = mysqli_query($conn, $sql);
            $noResult = true;
            while ($row = mysqli_fetch_assoc($fetch)) {
                $id = $row['thread_id'];
                $content = $row['comment_content'];
                $comment_time = $row['comment_time'];
                $comment_by = $row['comment_by'];


                $sqlnew = "SELECT  user_email FROM `users` WHERE `sno` = '$comment_by' ";
                $ano_user = mysqli_query($conn, $sqlnew);
                $row2 = mysqli_fetch_assoc($ano_user);
                $noResult = false;

                echo '<div class="media my3" style="font-family:cursive;">
                   <img src="../Forum/jumbo_tron/users.png" class="mr-3" alt="..." width="54px">
                   <div class="media-body my-2">
                         <p class="font-weight-bold my-0">'.$row2['user_email'].' at ' . $comment_time . '</p>
                     <p>' . $content . '</p>
                     </div>
                 </div>';
            }
            if ($noResult) {
                echo '<div class="jumbotron jumbotron-fluid" style="font-family:cursive;">
                <div class="container">
                  <p class="display-4">No Comments Found.</p>
                  <p class="lead"><b>Be the first person to comments.</b></p>
                </div>
              </div>';
            }
            ?>

    </div>



    </div>




    <?php include '../Forum/partials/footer.php'; ?>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>