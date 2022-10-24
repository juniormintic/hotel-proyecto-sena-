<?php
include 'conexion.php';
$id_cliente=$_POST['id'];


$sql = "DELETE FROM habitaciones WHERE idhabitacion = '$id_cliente'";

if ($conn->query($sql) === TRUE) {
    echo '<script languaje=javascritp>
        alert("La informacion se elimino")
    self.location="habitaciones.php"</script>';
} else {
     echo '<script languaje=javascritp>
        alert("La informacion NO se elimino.")
    windows.history.back()
    </script>';
}
$conn->close();
?>
