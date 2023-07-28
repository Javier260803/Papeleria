<?php
$dbuser = "system";
$dbpassword = "oracle";
$db = "21c";
$conn = oci_connect($dbuser,$dbpassword,$db);

if (!$conn){
    echo "Connection error";
    exit;
}

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$mensaje = $_POST['mensaje'];


$sql = "INSERT INTO formulario(nombre, correo, mensaje) VALUES ('$nombre', '$correo', '$mensaje')";

$stmt = oci_parse($conn, $sql);
if (!$stmt) {
    echo "Error in preparing the statement";
    exit;
}

oci_execute($stmt, OCI_DEFAULT);
print "Record Inserted";
oci_commit($conn);
oci_close($conn);
?>
