<?php
require_once("database.php");

$db = new Database(
        "localhost",
        "libreria",
        "root",
        "15raze12"
);



header("Content-Type: application/json");
$data = $db->Select("SELECT * FROM tb_libros WHERE autor = :autor", [':autor' => 'Jorge Raze']);
echo json_encode($data);

?>
