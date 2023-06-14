<?php
$insert = false;
if(isset($_POST['name'])){
    
    $server = 'localhost:3307';
    $username = 'root';
    $password = '';

    $con = mysqli_connect($server,$username,$password);
 
    if(!$con){
        die("Connection to database fail due to " .
        mysqli_connect_error());
    }


    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    

    if($con->query($sql) == true ){
        // echo "Successfully inserted";
        $insert = true;
    }else{
        echo "Error : $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to my first Php page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class = "bg" src = "1.jpg" alt = "Jai Shree Mahakal">
    <div class="container">
        <h1> Welcome to ujjain </h1>
        <p>Enter your details to have a tour</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for your holy trip</p>";
        }
    ?>
        <form action="index.php" method="post">
            <input type="text" name = "name" id = "name" placeholder = "Enter your name">
            <input type="text" name = "age" id = "age" placeholder = "Enter your age">
            <input type="text" name = "gender" id = "gender" placeholder = "Enter your gender">
            <input type="email" name = "email" id = "email" placeholder = "Enter your email">
            <input type="phone" name = "phone" id = "phone" placeholder = "Enter your phone">
            <textarea name = "desc" id = "desc" cols = "30" rows = "10" placeholder="Enter any other information here"></textarea>
            <button class = "btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>