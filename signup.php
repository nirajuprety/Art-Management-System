<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "art";
//  create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// check connection
if (!$conn) {
    die("connection failed" . mysqli_connect_error());
}
mysqli_select_db($conn, 'art');
$email = $password = $cpassword = '';
//$errMail = $errPassword=$errcPassword=""; 

if (isset($_POST["submit"])) {
    $email = $_POST["exampleInputEmail1"];
    $password = $_POST["exampleInputPassword1"];
    $cpassword = $_POST["cexampleInputPassword1"];
}
if ($password == $cpassword) {
    $sql = "INSERT INTO customerlogon( UserName, Pass 	)
VALUES ('$email','$password')";
    // 
    if (mysqli_query($conn, $sql)) {
        //    echo "new record created successfully";
      //  include('contact');
      
        header("Location: Userindex.php");

    } else {
        echo "Error :" . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
} else {
    echo "Password does not match";
}
?>