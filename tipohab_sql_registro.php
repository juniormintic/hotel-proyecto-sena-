<?php
include 'conexion.php';
$idtipo = $_POST['idtipo'];
$nombre = $_POST['nombre'];

//procedemos a insertar los datos  a la tabla producto con sql
$sql = "INSERT INTO tipohab (idtipo, nombre) VALUES ('$idtipo', '$nombre')";
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

