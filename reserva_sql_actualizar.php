<?php
include 'conexion.php';
$idreserva = $_POST['idreserva'];
$preciohab = $_POST['preciohab'];
$fechainicio = $_POST['fechainicio'];
$fechatermino = $_POST['fechatermino'];
$idpersona = $_POST['idpersona'];
$idagencia = $_POST['idagencia'];
$idhab = $_POST['idhab'];

$sql = "UPDATE reserva SET   preciohab='$preciohab', fechainicio='$fechainicio', fechatermino='$fechatermino', idpersona='$idpersona', idagencia='$idagencia',idhab='$idhab' where idreserva=$idreserva";
if ($conn->query($sql) === TRUE) {
    echo '<script languaje=javascritp>
        alert("La informacion se guardo")
    self.location="reserva.php"</script>';
} else {
     echo '<script languaje=javascritp>
        alert("La informacion NO se elimino.")
    windows.history.back()
    </script>';
}
 

$conn->close();
?>