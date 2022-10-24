<?php
include 'conexion.php';

$idpersona = $_POST['idpersona'];
	
	$sql = "DELETE FROM persona WHERE idpersona = '$idpersona'";

if ($conn->query($sql) === TRUE) {
    echo '<script languaje=javascritp>
        alert("La informacion se elimino")
    self.location="persona.php"</script>';
} else {
     echo '<script languaje=javascritp>
        alert("La informacion NO se elimino.")
    windows.history.back()
    </script>';
}
$conn->close();
?>


