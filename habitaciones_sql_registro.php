<?php
include 'conexion.php';
$id_cliente=$_POST['idhabitacion'];
$nom=$_POST['tipohabitacion'];
$apell= $_POST['minibar'];
$direc= $_POST['jacuzzi'];
$fecha= $_POST['idhotel'];
$tel= $_POST['idtipo'];




$sql = "INSERT INTO habitaciones (idhabitacion, tipohabitacion, minibar,jacuzzi,idhotel,idtipo) "
        . "VALUES ('$id_cliente', '$nom', '$apell','$direc','$fecha','$tel')";

if ($conn->query($sql) === TRUE) {
    echo '<script languaje=javascritp>
        alert("La informacion se guardo")
    self.location="habitaciones.php"</script>';
} else {
     echo '<script languaje=javascritp>
        alert("La informacion NO se guardo.")
    windows.history.back()
    </script>';
}
$conn->close();
?>

