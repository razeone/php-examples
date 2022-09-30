<?php
require_once("database.php");

$db = new Database(
        "localhost",
        "libreria",
        "root",
        "15raze12"
);



$id = $db->executeStatement("INSERT INTO tb_libros VALUES(:id, :autor, :estado, :fecha_anadido, :fecha_finalizacion, :nota, :titulo)", [
                        ':id' => 295,
                        ':autor' => 'Yo mero',
                        ':estado' => 'nuevo',
                        ':fecha_anadido' => 'hoy',
                        ':fecha_finalizacion' => 'mañana',
                        ':nota' => 10,
                        ':titulo' => 'this is new'
                ]);
echo $id;


$data = $db->executeStatement("SELECT * FROM tb_libros");
while($row = $data->fetch())
	print_r($row);

?>
