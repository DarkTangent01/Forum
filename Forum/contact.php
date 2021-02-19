<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shortcut icon" href="../Forum/favicon/download.png" type="image/x-icon">
    <title>Code Project - coding forum</title>
</head>

<body>
    <!-- <h1>Hello, world!</h1> -->

    <?php  include '../Forum/partials/header.php';  ?>


    <?php

    // echo $_SERVER["REQUEST_METHOD"];

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        include '../Forum/partials/dbconnect.php';

        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $mnumber=$_POST['mobile_number'];
        $address=$_POST['address'];
        $city=$_POST['city'];
        $state=$_POST['state'];
        $zip=$_POST['zip_code'];
        $issue=$_POST['issue'];

        $fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
        $lname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
        $mnumber = filter_var($_POST['mobile_number'], FILTER_SANITIZE_STRING);
        $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
        $city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
        $state = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
        $zip = filter_var($_POST['zip_code'], FILTER_SANITIZE_STRING);
        $issue = filter_var($_POST['issue'], FILTER_SANITIZE_STRING);

        if (!empty($fname) && !empty($lname) && !empty($mnumber) && !empty($address) && !empty($city) && !empty($state) && !empty($zip) && !empty($issue)){
            $sql = "INSERT INTO `contact_us` (`first_name`, `last_name`, `mobile_number`, `address`, `city_name`, `state_name`, `zip_code`, `issue`) VALUES ('$fname', '$lname', '$mnumber', '$address', '$city', '$state', '$zip', '$issue')";
            $result = mysqli_query($conn, $sql);
        }


    }


    echo '<div class="container my-3" style="font-family:cursive;">
        <style>


            .container{
                min-height: 90vh;
                
            }
        </style>
        <form action='.$_SERVER['REQUEST_URI'].' method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="firstname">First name</label>
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="Password">Last name</label>
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required>
                </div>
            </div>
            <div class="form-group">
                <label for="mobilenumber">Mobile number</label>
                <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Mobile number" required>
            </div>
            <div class="form-group">
                <label for="Address">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Apartment, studio, or floor" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">States</label>
                    <select id="State" name="state" class="form-control" required>';

                    $sql = "SELECT * FROM `states`";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        echo'<option selected>'. $row['name'] .'</option>';
                    }

                        echo'
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" id="zip_code" name="zip_code" required>
                </div>
                <div class="form-group col-md-12">
                <label for="issue">Problem</label>
                <textarea class="form-control" id="issue" name="issue" rows="3" required></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-success col-md-3" required>Send</button>
        </form>
    </div>';
    ?>






    <?php include '../Forum/partials/footer.php'; ?>

























    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
</body>

</html>