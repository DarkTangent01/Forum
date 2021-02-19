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

    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE `category_id` = $id; ";
    $fetch = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($fetch)) {
        $catname = $row['category_name'];
        $catdesc = $row['category_description'];
    }

    echo ' <div class="container-fluid my-1" style="font-family:cursive;">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to ' . $catname . ' </h1>
    <hr class="my-4">
    <p>' . $catdesc . '</p>
    <p class="lead">
        <a class="btn btn-outline-success btn-lg" href="#" role="button">Learn more</a>
    </p>
    </div>
    </div>';
    ?>

    <?php
    $showAlert = false;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // insert thread into db
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];
        $sno = $_POST['sno'];

        // $th_title = str_replace("<", "&alt;" ,$th_title);
        // $th_title = str_replace(">", "&gt;" ,$th_title);
        $th_title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
        $th_desc = filter_var($_POST['desc'], FILTER_SANITIZE_STRING);

        // $th_desc = str_replace("<", "&alt;" ,$th_desc);
        // $th_desc = str_replace(">", "&gt;" ,$th_desc);


        if (!empty($th_title) && !empty($th_desc)) {
            $sql = "INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`) VALUES ('$th_title', '$th_desc', '$id', '$sno')";
            $result = mysqli_query($conn, $sql);
            $showAlert = true;
            if ($showAlert) {
                echo '';
            }
        }
    }

    ?>

    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
 
        echo '<div class="container" style="font-family:cursive;">
        
        <h2 class="py-2">Start a Discussion</h2>
        
        <div class="container">
        
        <form action="' . $_SERVER["REQUEST_URI"]. '" method="POST">
    <div class="form-group">
        <label for="exampleInputEmail1">Thread Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
        <small id="title" class="form-text text-muted">Keep your title as crisp and short as
            possible.</small>
            <input type="hidden" name="sno" value='.$_SESSION["sno"].'>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Elaborate Your Problem</label>
        <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-outline-success">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-right-dots"
            viewBox="0 0 16 16">
            <path
                d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1H2zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z" />
            <path
                d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
        </svg> Post</button>
    </form>
    </div>
    </div>';
    }
    else{
    echo '<div class="container" style="font-family:cursive;">
        
    <h2 class="py-2">Start a Discussion</h2>
    
    <div class="container">
    
    <form action="" method="POST">
<div class="form-group">
    <label for="exampleInputEmail1">Thread Title</label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Please login to start discussion" disabled>
    <small id="title" class="form-text text-muted">Keep your title as crisp and short as
        possible.</small>
</div>
<div class="form-group">
    <label for="exampleFormControlTextarea1">Elaborate Your Problem</label>
    <textarea class="form-control" id="desc" name="desc" rows="3" placeholder="Please login to start discussion" disabled></textarea>
</div>
<button type="submit" class="btn btn-outline-success" disabled>
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-right-dots"
        viewBox="0 0 16 16">
        <path
            d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1H2zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z" />
        <path
            d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
    </svg> Post</button>
</form>
</div>
</div>';
    }

    ?>

    <div class="container" style="font-family:cursive;">


        <h2 class="py-2">Browse Questions</h2>

        <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `threads` WHERE `thread_cat_id` = $id; ";
        $fetch = mysqli_query($conn, $sql);
        $noResult = true;

        while ($row = mysqli_fetch_assoc($fetch)) {

            $noResult = false;
            $id = $row['thread_id'];
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $thread_time = $row['timestamp'];
            $thread_user_id = $row['thread_user_id'];
            $sqlnew = "SELECT  user_email FROM `users` WHERE `sno` = '$thread_user_id' ";
            $ano_user = mysqli_query($conn, $sqlnew);
            $row2=mysqli_fetch_assoc($ano_user);
            

            echo '<div class="media my3 mb-0" >
                <img src="../Forum/jumbo_tron/users.png" class="mr-3" alt="..." width="54px">
                <div class="media-body">
                <p class="font-weight-bold my-0">'.$row2['user_email'].' at ' . $thread_time . '</p>
                
                <h5 class="mt-0"><a href="thread.php?threadid=' . $id . '">' . $title . '</a></h5>
                <p>' . $desc . '</p>
                </div>
                </div>';
        }
        if ($noResult) {
            echo '<div class="jumbotron jumbotron-fluid" style="font-family:cursive;">
                <div class="container">
                  <p class="display-4">No Threads Found</p>
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