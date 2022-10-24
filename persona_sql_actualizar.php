<?php
include 'conexion.php';

$idpersona = $_POST['idpersona'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];


$sql = "UPDATE persona SET  nombre='$nombre', apellido='$apellido', direccion='$direccion', telefono='$telefono' where idpersona=$idpersona";

if ($conn->query($sql) === TRUE) {
    echo '<script languaje=javascritp>
        alert("La informacion se modifico")
    self.location="persona.php"</script>';
} else {
     echo '<script languaje=javascritp>
        alert("La informacion NO se guardo.")
    windows.history.back()
    </script>';
}
$conn->close();
?>