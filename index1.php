<?php
include_once "header.php";
?>
 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE chaussure(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
modele VARCHAR(30) NOT NULL,
prix smallint(4) NOT NULL,
pointure smallint(4) NOT NULL,
descriptio VARCHAR (250),
)";

if ($conn->query($sql) === true) {
    echo "Table chaussure created successfully";
    $requete = "INSERT INTO `test` . `chaussure` (modele, prix, pointure, descriptio)
    VALUES
    ('charentaise', 35, 45, 'pantoufle confortable'),
    ('pantoufle de verre', 95, 35, 'chaussure de cendrillon'),
    ('dr martens', 120, 43, 'chaussure de securité'),
    ('nike air max', 125, 43, 'basket confortable'),
    ('ranger', 135, 44, 'chaussure militaire');";
    if ($conn->query($requete) === true) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $requete . "<br>" . $conn->error;
    }

} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
</body>
</html>
