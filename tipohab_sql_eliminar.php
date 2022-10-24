<?php
include 'conexion.php';
$idtipo = $_POST['idtipo'];
	
	$sql = "DELETE FROM tipohab WHERE idtipo = '$idtipo'";

if ($conn->query($sql) === TRUE) {
    echo '<script languaje=javascritp>
        alert("La informacion se elimino")
    self.location="tipohab.php"</script>';
} else {
     echo '<script languaje=javascritp>
        alert("La informacion NO se elimino.")
    windows.history.back()
    </script>';
}
$conn->close();
?>

