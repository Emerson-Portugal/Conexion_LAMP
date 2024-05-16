<?php
$servername = "db";
$username = "pc";
$password = "pc";
$dbname = "petclinic";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consultas simples
$sql_pets = "SELECT * FROM pets";
$sql_owners = "SELECT * FROM owners";

$result_pets = $conn->query($sql_pets);
$result_owners = $conn->query($sql_owners);

if ($result_pets->num_rows > 0) {
    echo "<h2>Pets</h2><ul>";
    while($row = $result_pets->fetch_assoc()) {
        echo "<li>" . $row["name"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "0 results for pets";
}

if ($result_owners->num_rows > 0) {
    echo "<h2>Owners</h2><ul>";
    while($row = $result_owners->fetch_assoc()) {
        echo "<li>" . $row["first_name"] . " " . $row["last_name"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "0 results for owners";
}

$conn->close();
?>
