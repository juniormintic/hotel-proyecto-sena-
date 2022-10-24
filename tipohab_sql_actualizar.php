<?php
include 'conexion.php';
$idtipo= $_POST['idtipo'];
$nombre = $_POST['nombre'];

//procedemos a actualizar los datos de nuestra base de datos con sql
$sql = "UPDATE tipohab SET nombre='$nombre' where idtipo = $idtipo";

if ($conn->query($sql) === TRUE) {
    echo '<script languaje=javascritp>
        alert("La informacion se guardo")
        self.location="tipohab.php"</script>';
} else {
     echo '<script languaje=javascritp>
        alert("La informacion NO se guardo.")
        windows.history.back()
        </script>';
}
$conn->close();
?>
