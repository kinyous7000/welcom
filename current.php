<?php
// database credentials
$servername = "127.0.0.1";
$username = "root";
$password = "123";
$dbname = "kingyous";

// create a new mysqli connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// check if the login form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get the username and password from the form
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // query the database to check if the username and password are valid
    $sql = "SELECT * FROM user WHERE name='$name' AND email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // the login is successful, store the user's information in a session
        session_start();
        $_SESSION["name"] = $name;
        $_SESSION["loggedin"] = true;

        // redirect the user to the home page
        header("location: home.html");
    } else {
        // the login failed, display an error message
        $error = header("location: err.php");
    }
}

// close the database connection
$conn->close();
?>