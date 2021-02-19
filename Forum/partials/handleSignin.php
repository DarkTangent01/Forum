<?php
$showError = "false";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'dbconnect.php';

    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];
    $email = filter_var($_POST['loginEmail'], FILTER_SANITIZE_EMAIL);

    $sql = "SELECT * FROM `users` WHERE `user_email` = '$email'";
    $result = mysqli_query($conn, $sql);

    $numRows = mysqli_num_rows($result);

    if ($numRows == 1) {

        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['user_password'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['sno'] = $row['sno'];
            $_SESSION['useremail'] = $email;
            // echo "logged in". $email ;
            header("location: ../index.php");
            exit();
        }
        header("location: ../index.php");
    }
    header("location: ../index.php");
}
?>
