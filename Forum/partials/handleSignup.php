<?php
$showError = "false";
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'dbconnect.php';

    $user_email = $_POST['signupEmail'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $user_email = filter_var($_POST['signupEmail'], FILTER_SANITIZE_EMAIL);

    // check wether  email exists

    $existSql = "SELECT * FROM `users` WHERE `user_email` = '$user_email'";

    $result = mysqli_query($conn, $existSql);

    $numRows = mysqli_num_rows($result);
    if ($numRows > 0){

        $showError = "Email already in use";
    }
    else{
        // if user send empty data
        if (!empty($user_email) && !empty($password) && !empty($cpassword)){
                    if ($password == $cpassword){
                        $hash = password_hash($password, PASSWORD_BCRYPT);
                        $sql = "INSERT INTO `users` (`user_email`, `user_password`) VALUES ('$user_email', '$hash')";
                        $result = mysqli_query($conn, $sql);
                        if ($result){
                            $showAlert = true;
                            header("location: ../index.php?signupsuccess=true");
                            exit();
                        }
                    }
                    else{
                        $showError = "passwords do not match";
                        
                    }
                
            }
            header("location: ../index.php?signupsuccess=false&error= $showError");
}

}
?>
