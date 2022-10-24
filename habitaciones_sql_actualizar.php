<?php
include 'conexion.php';
$id= $_POST['id'];
$nombre=$_POST['tipohabitacion'];
$apellido=$_POST['minibar'];
$direccion=$_POST['jacuzzi'];
$fecha=$_POST['idhotel'];
$tel=$_POST['idtipo'];


$sql = "UPDATE habitaciones SET  tipohabitacion='$nombre', minibar='$apellido', jacuzzi='$direccion', idhotel='$fecha', idtipo='$tel' WHERE idhabitacion= '$id'";
       

if ($conn->query($sql) === TRUE) {
    echo '<script languaje=javascritp>
        alert("La informacion se guardo")
        self.location="habitaciones.php"</script>';
} else {
     echo '<script languaje=javascritp>
        alert("La informacion NO se actualizo.")
        windows.history.back()
        </script>';
}
$conn->close();
?>




