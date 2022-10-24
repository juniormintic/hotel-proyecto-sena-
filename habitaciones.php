<?php
include 'conexion.php';

?>
    <!--primero que todo cambiamos el idioma a español lang="es" -->
    <!DOCTYPE html>
    <html lang="es">

        <head>
            <meta charset="UTF-8">
           <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">      
        <!--css los iconos y menu desplegable -->
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
        <!--libreria de iconos-->
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <!--js para la paginacion-->
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>        
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
            
            <!--menu -->
            
            <title>HABITACIONES</title>       
        </head>
        <body>
            
            
         
          <header>
              <h4>HABITACIONES</h4>
              <div ><span class="icon-menu"></span></div>
        </header>
            <nav>
          <ul class="menu">
                <li class="line"><a href="index.html"><label><font>INICIO</font></label></a></li>
                <li class="line"><a href="agencia.php"><label ><font >AGENCIA</font></label></a></li>
                <li class="line"><a href="persona.php"><label ><font>PERSONA</font></label></a></li>
                <li class="line"><a href="reserva.php"><label ><font>RESERVA</font></label></a></li>
                <li class="line"><a href="hoteles.php"><label ><font>HOTELES</font></label></a></li>
                <li class="line"><a href="habitaciones.php"><label ><font>HABITACIONES</font></label></a></li>
                <li class="line"><a href="tipohab.php"><label><font>TIPO HAB</font></label></a></li>               
                
            </ul>
        </nav>
            <br>
	<!--Menu-->
     
   <div class="container">
	<div class="row">
             
		 <button  type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal">
                        Registrar cliente
                    </button>
            <br>
            <br>
            
                <!--tabla responsive para mostrar los datos-->
                <div class="table-responsive-xl" >
                    <table id="example" class="table table-hover">
                        <thead class='thead-light'>
                            <!--campos fijos de la tabla-->
                            <tr>
                                 <td><input type="checkbox" class="checkthis" /></td>
                                 <th>idhabitacion</th>
                                <th>tipohabitacion</th>
                                <th>minibar</th>
                                <th>jacuzzi</th>
                                <th>idhotel</th>
                                <th>idtipo</th>
                                <th></th>
                                <th></th>

                            </tr>
                        </thead>			
                        <tbody>

                            <?php
                    $sql="SELECT * FROM habitaciones";
                    $result=$conn->query($sql);
                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                            ?>
                                    <tr>
                                         <td><input type="checkbox" class="checkthis" /></td>
                                        <td><?php echo $row['idhabitacion']; ?></td>
                                       <td><?php echo $row['tipohabitacion']; ?></td>
                                       <td><?php echo $row['minibar']; ?></td>
                                       <td><?php echo $row['jacuzzi']; ?></td>
                                       <td><?php echo $row['idhotel']; ?></td>
                                       <td><?php echo $row['idtipo']; ?></td>
                                        <!--agregamos los botones para sus respectivas acciones modificar y borrar datos-->
                                        <td><button class="btn btn-primary btn-xs edit_data" data-toggle='modal' data-target='#editUsu' data-id='<?php echo $row["idhabitacion"]?>' data-nombre='<?php echo $row["tipohabitacion"]; ?>' data-apellido='<?php echo $row["minibar"]; ?>' data-direccion='<?php echo $row["jacuzzi"]; ?>'data-fecha_nacimiento='<?php echo $row["idhotel"]; ?>'data-telefono='<?php echo $row["idtipo"]; ?>' class='btn btn-info'><span class="glyphicon glyphicon-pencil" data-placement="top" data-toggle="tooltip" title="Edit"></span></button></td> 
                                        <td><button class="btn btn-danger btn-xs delete_data"  data-toggle='modal' data-target='#confirm-delete'data-id='<?php echo $row["idhabitacion"]?>' data-nombre='<?php echo $row["tipohabitacion"]; ?>' data-apellido='<?php echo $row["minibar"]; ?>' data-direccion='<?php echo $row["jacuzzi"]; ?>'data-fecha_nacimiento='<?php echo $row["idhotel"]; ?>'data-telefono='<?php echo $row["idtipo"]; ?>'class='btn btn-info'><span class="glyphicon glyphicon-trash" data-placement="top" data-toggle="tooltip" title="Edit"></span></button></td>
                                    </tr>

                               <?php
                        }
                    }else{
                        echo "0 result";
                    }
                    
                    ?>

                        </tbody>
                    </table>
                </div>
                 
            </div>
                    <!--paginacion-->
                    
            
                     <!-- registro cliente -->
                     <form class="modal fade" id="myModal" method="POST" action="habitaciones_sql_registro.php">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="myModalLabel">REGISTRAR HABITACION</h5>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                
                                <table class="table table-hover">
                                    <tbody>
                                    <div class="form-vertical"  autocomplete="off">
                                        
                                        
                                        
                                        <div class="form-group"> 
                                             <div class="col-sm-10">
                                            <label for="id" class="col-sm-2 control-label">ID_HABITACION</label>
                                            <input  id="idhabitacion" name="idhabitacion" type="text"  class="form-control" placeholder="idhabitacion" required >  
                                         </div>
                                            </div>
                                        <div class="form-group">                                            
                                            
                                            <div class="col-sm-10">
                                                <label for="nombre" class="col-sm-2 control-label">tipo habitacion</label>
                                                <input type="text" class="form-control" id="tipohabitacion" name="tipohabitacion" placeholder="tipohabitacion" required>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="apellido" class="col-sm-2 control-label">minibar:</label>
                                                <input type="text" class="form-control" id="minibar" name="minibar" placeholder="minibar" required>
                                            </div>
                                        </div>			
                                        <div class="form-group">
                                           
                                            <div class="col-sm-10">
                                                 <label for="direccion" class="col-sm-2 control-label">direccion:</label>
                                                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="fecha_nacimiento" class="col-sm-2 control-label">jacuzzi:</label>
                                                <input type="test" class="form-control" id="jacuzzi" name="jacuzzi" placeholder="jacuzzi">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                           
                                            <div class="col-sm-10">
                                                 <label for="telefono" class="col-sm-2 control-label">idhotel:</label>
                                               <select class="form-control col-md-9"  name="idhotel" id="idhotel"  required>
                                                <option></option>                                   
                                                    <?php
                                                      $sql4="SELECT * FROM hoteles";
                                                      $result4=$conn->query($sql4);
                                                      while($row4=$result4->fetch_assoc()){
                                                          echo "<option value=\"".$row4['idhotel']."\">".$row4["idhotel"]." - ".$row4['nombrehotel'].'</option>';
                                                      }
                                                    ?>
                                                </select>
                                               
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="correo" class="col-sm-2 control-label">idtipo:</label>
                                               <select class="form-control col-md-9"  name="idtipo" id="idtipo"  required>
                                                <option></option>                                   
                                                    <?php
                                                      $sql5="SELECT * FROM tipohab";
                                                      $result5=$conn->query($sql5);
                                                      while($row5=$result5->fetch_assoc()){
                                                          echo "<option value=\"".$row5['idtipo']."\">".$row5["idtipo"]." - ".$row5['nombre'].'</option>';
                                                      }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <td> <input name="limpiar" type="reset" class="btn btn-primary" value="Limpiar"></td>
                                                <td><input name="actualizar"type="submit" class="btn btn-primary" value="Guardar datos"></td>
                                            </div>
                                        </div>
                                    </div>
                                </tbody>
                                </table>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">cancelar</button>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </form>
                </div>                              
                <!-- The Modal editar -->
                <form class="modal fade" id="editUsu" method="POST" action="habitaciones_sql_actualizar.php">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="myModalLabel">ACTUALIZAR HABITACION</h5>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                
                                <table class="table table-hover">
                                    <tbody>
                                    <div class="form-vertical"  autocomplete="off">
                                        
                                        <input  id="id" name="id" type="hidden" >  
                                        </div>
                                        <div class="form-group">                                            
                                            
                                            <div class="col-sm-10">
                                                <label for="nombre" class="col-sm-2 control-label">tipohabitacion:</label>
                                                <input type="text" class="form-control" id="nombre" name="tipohabitacion" placeholder="tipohabitacion" required>
                                            </div>
                                        </div>
                                        
                                        
                                         <div class="form-group">
                                              <div class="col-sm-10">
                                                <label for="apellido" class="col-sm-2 control-label">minibar:</label>
                                               
                                                    <input type="text" class="form-control" id="apellido" name="minibar" placeholder="minibar" required>
                                                </div>
                                            </div> 		
                                        <div class="form-group">
                                           
                                            <div class="col-sm-10">
                                                 <label for="direccion" class="col-sm-2 control-label">jacuzzi:</label>
                                                <input type="text" class="form-control" id="direccion" name="jacuzzi" placeholder="jacuzzi">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="fecha_nacimiento" class="col-sm-2 control-label">idhotel:</label>
                                                <select class="form-control col-md-9"  name="idhotel" id="fecha_nacimiento"  required>
                                                <option></option>                                   
                                                    <?php
                                                      $sql2="SELECT * FROM hoteles";
                                                      $result2=$conn->query($sql2);
                                                      while($row2=$result2->fetch_assoc()){
                                                          echo "<option value=\"".$row2['idhotel']."\">".$row2["idhotel"]." - ".$row2['nombrehotel'].'</option>';
                                                      }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                           
                                            <div class="col-sm-10">
                                                 <label for="telefono" class="col-sm-2 control-label">idtipo:</label>
                                                <select class="form-control col-md-9"  name="idtipo" id="telefono"  required>
                                                <option></option>                                   
                                                    <?php
                                                      $sql3="SELECT * FROM tipohab";
                                                      $result3=$conn->query($sql3);
                                                      while($row3=$result3->fetch_assoc()){
                                                          echo "<option value=\"".$row3['idtipo']."\">".$row3["idtipo"]." - ".$row3['nombre'].'</option>';
                                                      }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <td> <input name="limpiar" type="reset" class="btn btn-primary" value="Limpiar"></td>
                                                <td><input name="actualizar"type="submit" class="btn btn-primary" value="Guardar datos"></td>
                                            </div>
                                        </div>
                                    </div>
                                </tbody>
                                </table>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">cancelar</button>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </form>
                
                
                
                
                
                <!-- Modal eliminar -->
               <form class="modal fade" id="confirm-delete" method="POST" action="habitaciones_sql_eliminar.php">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="myModalLabel">ELIMINAR HABITACION</h5>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                
                                <table class="table table-hover">
                                    <tbody>
                                    <div class="form-vertical"  autocomplete="off">
                                        
                                        <input  id="id" name="id" type="hidden" >  
                                        
                                        <div class="form-group">                                            
                                            
                                            <div class="col-sm-10">
                                                <label for="nombre" class="col-sm-2 control-label">tipo habitacion:</label>
                                                <input type="text" class="form-control" id="nombre" name="tipohabitacion" placeholder="tipohabitacion" required readonly >
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="apellido" class="col-sm-2 control-label">minibar:</label>
                                                <input type="text" class="form-control" id="apellido" name="minibar" placeholder="minibar" required readonly>
                                            </div>
                                        </div>			
                                        <div class="form-group">
                                           
                                            <div class="col-sm-10">
                                                 <label for="direccion" class="col-sm-2 control-label">jacuzzi:</label>
                                                <input type="text" class="form-control" id="direccion" name="jacuzzi" placeholder="jacuzzi" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="fecha_nacimiento" class="col-sm-2 control-label">fecha_nacimiento:</label>
                                                <input type="text" class="form-control" id="fecha_nacimiento" name="idhotel" placeholder="idhotel" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                           
                                            <div class="col-sm-10">
                                                 <label for="telefono" class="col-sm-2 control-label">idtipo:</label>
                                                <input type="text" class="form-control" id="telefono" name="idtipo" placeholder="idtipo" readonly>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                               
                                                <td><input name="eliminar"type="submit" class="btn btn-primary" value="Eliminar datos"></td>
                                            </div>
                                        </div>
                                    </div>
                                </tbody>
                                </table>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">cancelar</button>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </form>
	


            
            
         
            <script src="js/index.js" type="text/javascript"></script>
            <script src="js/jquery.min.js" type="text/javascript"></script>
            <script src="js/bootstrap.min.js" type="text/javascript"></script>
            <script>
                //script que elabora el pie de paginas de nuestra tabla y el buscador en tiempo real
                $(document).ready(function () {
                    $('#example').DataTable();
                });
                //script que  extrae los datos y los almanena para así poder modificarlos
                $('#confirm-delete').on('show.bs.modal',function  (event)  {
                    
                    var button = $(event.relatedTarget);
                    var recipient0 = button.data('id');
                    var recipient1 = button.data('nombre');
                    var recipient2 = button.data('apellido');
                    var recipient3 = button.data('direccion');
                    var recipient4 = button.data('fecha_nacimiento');
                    var recipient5 = button.data('telefono');
                   
                    var modal = $(this);
                    modal.find('.modal-body #id').val(recipient0);
                    modal.find('.modal-body #nombre').val(recipient1);
                    modal.find('.modal-body #apellido').val(recipient2);
                    modal.find('.modal-body #direccion').val(recipient3);
                    modal.find('.modal-body #fecha_nacimiento').val(recipient4);
                    modal.find('.modal-body #telefono').val(recipient5);
                   
                    
                 });
                $('#editUsu').on('show.bs.modal', function  (event)  {
                    
                    var button = $(event.relatedTarget);
                    var recipient0 = button.data('id');
                    var recipient1 = button.data('nombre');
                    var recipient2 = button.data('apellido');
                    var recipient3 = button.data('direccion');
                    var recipient4 = button.data('fecha_nacimiento');
                    var recipient5 = button.data('telefono');
                  
                    var modal = $(this);
                    modal.find('.modal-body #id').val(recipient0);
                    modal.find('.modal-body #nombre').val(recipient1);
                    modal.find('.modal-body #apellido').val(recipient2);
                    modal.find('.modal-body #direccion').val(recipient3);
                    modal.find('.modal-body #fecha_nacimiento').val(recipient4);
                    modal.find('.modal-body #telefono').val(recipient5);
                   
                    
                });
                
                
                //script que nos sirve para confirmar las eliminacion del dato de la tabla
                    //$('#confirm-delete').on('show.bs.modal', function (e) {
                    //$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

                    //$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
                //});


            </script>
           
            <script src="../js/jquery-1.12.4.js" type="text/javascript"></script>
            <script src="../js/jquery.dataTables.min.js" type="text/javascript"></script>
            <script src="../js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
            <!--menu-->
             <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
            <script src="js/script.js"></script>
            <?php 
            $conn->close();
            
            ?>
        </body>
    </html>

