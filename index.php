<?php
$insert = false;
if(isset($_POST['Name']))
// Set connection variables
{      
    $server ="localhost";
    $username = "root";
    $password= "";
    $database= "karandb";
 // Create a database connection
 // $con = mysqli_connect($server , $username, $password, $database);
 $conn = mysqli_connect($servername , $username , $password , $database);
// Check for connections success
if(!$con){
    die("Connectiom to this database failed due to" .mysqli_connect_error());
}

// Collect post variables
$Name = $_POST['Name'];
$Age = $_POST['Age'];
$Gender = $_POST['Gender'];
$Email = $_POST['Email'];
$Phone = $_POST['Phone'];
$desc = $_POST['desc'];
$sql ="INSERT INTO `trip` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `Desc`, `dt`) VALUES ('$Name', '$Age', '$Gender', '$Email', '$Phone', '$desc ',  current_timestamp())";
//echo $sql;

// Execute the querry
if($con->query($sql) == true){
//echo "Successfully inserted";

// Flag for successful insertion
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}

// Close the database connection
    $con->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Welcome to Travel form</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet"href="style.css">
</head>
<body>
    <img class="bgg" src="back.jpg" alt="Chandigarh University">
    <div class= "container">
    <h1>Welcome to Chandigarh University US Trip Form</h1>
    <p>Enter your details and submit your form to confirm your participation in the trip</p>
    <?php
    if($insert == true){
    echo "<p class='p1'>Thanks for submitting your form. We are happy to see you joining for the US trip</p>";
    }
    ?>
    <form action="index.php" method="post">
        <input type="text" name = "Name" id="Name" placeholder="Enter your name">
        <input type="text" name = "Age" id="Age" placeholder="Enter your age">
        <input type="text" name = "Gender" id="Gender" placeholder="Enter your gender">
        <input type="email" name= "Email" id = "Email" placeholder="Enter your Email">
        <input type="phone" name= "Phone" id="Phone" placeholder="Enter your phone">
        <textarea name="desc" id ="desc" cols="30" rows="10" placeholder="Enter any other information"></textarea>
        <button class="button">Submit</button>
    </form>

</div>
    <script src="index.js">

    </script>
</body>
</html>