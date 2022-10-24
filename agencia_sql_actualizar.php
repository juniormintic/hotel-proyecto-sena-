<?php
include 'conexion.php';
$idagencia = $_POST['id'];
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];


//procedemos a actualizar los datos de nuestra base de datos con sql
$sql = "UPDATE agencia SET nombre='$nombre',direccion='$direccion',telefono='$telefono'     WHERE idagencia=$idagencia";

if ($conn->query($sql) === TRUE) {
    echo '<script languaje=javascritp>
        alert("La informacion se modifico")
    self.location="agencia.php"</script>';
} else {
     echo '<script languaje=javascritp>
        alert("La informacion NO se elimino.")
    windows.history.back()
    </script>';
}
$conn->close();
?>