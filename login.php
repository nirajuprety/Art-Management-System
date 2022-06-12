<?php
session_start();
?>

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

if (isset($_POST['submit'])) {

    if (!empty($_POST['exampleInputEmail1']) && !empty($_POST['exampleInputPassword1'])) {
        $email = $_POST['exampleInputEmail1'];
        $password = $_POST['exampleInputPassword1'];
       
        $sql = "SELECT * FROM customerlogon where UserName = '$email'";
        if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $_SESSION['UserName'] = $row['UserName'];
                    if ($row['UserName'] == $email && $row['Pass'] == $password) {
                        $_SESSION['UserName'] = $email;
                        if (isset($_SESSION['UserName'])) {
                            header('location:Userindex.php');
                        }
                    } else {
                        echo "Password or UserName is not correct  " . mysqli_error($conn);
                        echo ' <a href="index.php" >Click here</a>';
                    }
                }
                // Free result set
                mysqli_free_result($result);
            } else {
                echo "No records matching your query were found.";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
    } else {
       header('location:index.php');
    }
}

?>