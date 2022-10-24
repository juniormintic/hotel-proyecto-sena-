<?php
include 'conexion.php';


$idagencia = $_POST['idagencia'];
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];


//procedemos a insertar los datos  a la tabla producto con sql
$sql = "INSERT INTO agencia (idagencia, nombre, direccion,telefono) VALUES ('$idagencia', '$nombre', '$direccion','$telefono')";


if ($conn->query($sql) === TRUE) {
    echo '<script languaje=javascritp>
        alert("La informacion se guardo")
    self.location="agencia.php"</script>';
} else {
     echo '<script languaje=javascritp>
        alert("La informacion NO se guardo.")
    windows.history.back()
    </script>';
}
$conn->close();
?>

