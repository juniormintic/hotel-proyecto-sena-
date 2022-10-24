<?php
include 'conexion.php';
$idreserva = $_POST['idreserva'];
$preciohab = $_POST['preciohab'];
$fechainicio = $_POST['fechainicio'];
$fechatermino = $_POST['fechatermino'];
$idpersona = $_POST['idpersona'];
$idagencia = $_POST['idagencia'];
$idhab = $_POST['idhab'];

//procedemos a insertar los datos  a la tabla producto con sql
$sql = "INSERT INTO reserva (idreserva, preciohab, fechainicio,fechatermino,idpersona,idagencia,idhab) "
        . "VALUES ('$idreserva', '$preciohab', '$fechainicio','$fechatermino','$idpersona','$idagencia','$idhab')";

if ($conn->query($sql) === TRUE) {
    echo '<script languaje=javascritp>
        alert("La informacion se guardo")
    self.location="reserva.php"</script>';
} else {
     echo '<script languaje=javascritp>
        alert("La informacion NO se guardo.")
    windows.history.back()
    </script>';
}
$conn->close();
?>

