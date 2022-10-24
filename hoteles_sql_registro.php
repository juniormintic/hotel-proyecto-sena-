<?php
include 'conexion.php';
$idhotel = $_POST['idhotel'];
$nombrehotel = $_POST['nombrehotel'];
$direccionhotel = $_POST['direccionhotel'];
$cantidadpiezas = $_POST['cantidadpiezas'];
$telefono = $_POST['telefono'];
$aconstru = $_POST['aconstru'];
$categoria = $_POST['categoria'];
$ciudad = $_POST['ciudad'];


$sql = "INSERT INTO hoteles (idhotel, nombrehotel, direccionhotel, cantidadpiezas, telefono, aconstru, categoria, ciudad) "
        . "VALUES ('$idhotel', '$nombrehotel', '$direccionhotel','$cantidadpiezas','$telefono','$aconstru','$categoria'$ciudad')";

if ($conn->query($sql) === TRUE) {
    echo '<script languaje=javascritp>
        alert("La informacion se guardo")
   self.location="hoteles.php"</script>';
} else {
     echo '<script languaje=javascritp>
        alert("La informacion NO se guardo.")
    windows.history.back()
    </script>';
}
$conn->close();
?>

