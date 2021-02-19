<?php

include '../Forum/partials/dbconnect.php';
session_start();

echo '
<nav class="navbar navbar-expand-lg navbar-dark bg-dark position-relative" style="font-family:cursive;">
<div class="container-fluid">
<a class="navbar-brand" href="/forum" style="font-family:cursive;" >iDiscuss</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
<li class="nav-item">
<a class="nav-link active" aria-current="page" href="/forum">Home</a>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
Top Categories
</a>


    
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';

    $sql = "SELECT `category_name`, `category_id` FROM `categories` LIMIT 3";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        echo'<a class="dropdown-item" href="threads.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a>';
    }
    
   echo '</ul>
    </li></li>
    <li class="nav-item">
    <a class="nav-link active" href="about.php">About</a>
    </li>


<li class="nav-item">
<a class="nav-link active" href="contact.php">Contact</a>
</li>
</ul>';



if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
  echo '
 <p class="text-light my-0"> welcome ' . $_SESSION['useremail'] . '</p>  <a href="../forum/partials/logout.php" class="btn btn-outline-success">Logout</a>';
}
else{
    

 echo '<div class="mx-2">
 <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
 <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#signupModal ">Signup</button>
 </div>';
}


echo '</div>
</div>
</nav>';


include("..\Forum\partials\loginModal.php");
include("..\Forum\partials\signupModal.php");

if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
 echo' <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
 <strong>Success!</strong> You can now Login.
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="false"){
 echo' <div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
 <strong>Error!:</strong> Please fill the form.
 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>