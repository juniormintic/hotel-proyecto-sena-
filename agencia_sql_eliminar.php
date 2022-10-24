<?php
include 'conexion.php';
$idagencia=$_POST['id'];


$sql = "DELETE FROM agencia WHERE idagencia = '$idagencia'";

if ($conn->query($sql) === TRUE) {
    echo '<script languaje=javascritp>
        alert("La informacion se elimino")
    self.location="agencia.php"</script>';
} else {
     echo '<script languaje=javascritp>
        alert("La informacion NO se elimino.")
    windows.history.back()
    </script>';
}
$conn->close();
?>