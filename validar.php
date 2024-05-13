<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vinicius";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["usuario"];
    $password = $_POST["contrasena"];

    $sql = "SELECT * FROM cliente WHERE usuario = '$username' AND contrasena = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION["usuario"] = $username;
        header("Location: home.php");
    } else {
        header("Location: iniciar_sesion.php");
    }
}
$conn->close();
?>