<?php
include 'conexion.php';
$idreserva = $_POST['idreserva'];
	
	$sql = "DELETE FROM reserva WHERE idreserva =$idreserva";
	

if ($conn->query($sql) === TRUE) {
    echo '<script languaje=javascritp>
        alert("La informacion se elimino")
    self.location="reserva.php"</script>';
} else {
     echo '<script languaje=javascritp>
        alert("La informacion NO se elimino.")
    windows.history.back()
    </script>';
}
$conn->close();
?>
