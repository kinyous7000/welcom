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

// insert a new user
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New user inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// close the database connection
$conn->close();
?>
<br><br><a href=currentuser.php >please login</a>