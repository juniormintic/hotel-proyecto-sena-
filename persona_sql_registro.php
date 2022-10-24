<?php
include 'conexion.php';

$idpersona = $_POST['idpersona'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];

//procedemos a insertar los datos  a la tabla producto con sql
$sql = "INSERT INTO persona (idpersona, nombre, apellido,direccion,telefono) "
        . "VALUES ('$idpersona', '$nombre', '$apellido','$direccion','$telefono')";

if ($conn->query($sql) === TRUE) {
    echo '<script languaje=javascritp>
        alert("La informacion se guardo")
    self.location="persona.php"</script>';
} else {
     echo '<script languaje=javascritp>
        alert("La informacion NO se guardo.")
    windows.history.back()
    </script>';
}
$conn->close();
?>

