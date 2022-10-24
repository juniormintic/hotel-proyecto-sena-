<?php
include'conexion.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
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
        
        <title>PERSONA</title>
    </head>
    <body>
        
	 <header>
              <h4>PERSONA</h4>
              <div ><span class="icon-menu"></span></div>
        </header>

          <ul class="menu">
                <li class="line"><a href="index.html"><label><font>INICIO</font></label></a></li>
                <li class="line"><a href="agencia.php"><label ><font >AGENCIA</font></label></a></li>
                <li class="line"><a href="persona.php"><label ><font>PERSONA</font></label></a></li>
                <li class="line"><a href="reserva.php"><label ><font>RESERVA</font></label></a></li>
                <li class="line"><a href="hoteles.php"><label ><font>HOTELES</font></label></a></li>
                <li class="line"><a href="habitaciones.php"><label ><font>HABITACIONES</font></label></a></li>
                <li class="line"><a href="tipohab.php"><label><font>TIPO HAB</font></label></a></li>               
                
            </ul>
        <div class="container">
	<div class="row">
        
            <br>
        <button  type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal">
                        Registrar modo pago
                    </button>
            <table id="mytable" class="table table-bordred table-striped">
                <thead>
                    <tr>
                        
                         <th>idpersona</th>
                         <th>nombre</th>
                         <th>apellido</th>
                         <th>direccion</th>
                         <th>telefono</th>                      
                         <th></th>
                         <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql="SELECT * FROM persona";
                    $result=$conn->query($sql);
                    if($result->num_rows >0){
                        while($row=$result->fetch_assoc()){
                            ?>
                    <tr>
                        <td><?php echo $row['idpersona']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['apellido']; ?></td>
                        <td><?php echo $row['direccion']; ?></td>
                        <td><?php echo $row['telefono']; ?></td>                 
                        <td><button class="btn btn-primary btn-xs edit_data" data-toggle='modal' data-target='#editUsu' data-idpersona='<?php echo $row["idpersona"]?>' data-nombre='<?php echo $row["nombre"]; ?>'  data-apellido='<?php echo $row["apellido"]; ?>'  data-direccion='<?php echo $row["direccion"]; ?>' data-telefono='<?php echo $row["telefono"]; ?>' class='btn btn-info'><span class="glyphicon glyphicon-pencil" data-placement="top" data-toggle="tooltip" title="Edit"></span></button></td> 
                        <td><button class="btn btn-danger btn-xs delete_data"  data-toggle='modal' data-target='#confirm-delete'data-idpersona='<?php echo $row["idpersona"]?>' data-nombre='<?php echo $row["nombre"]; ?>' data-apellido='<?php echo $row["apellido"]; ?>' data-direccion='<?php echo $row["direccion"]; ?>'  data-telefono='<?php echo $row["telefono"]; ?>'class='btn btn-info'><span class="glyphicon glyphicon-trash" data-placement="top" data-toggle="tooltip" title="Edit"></span></button></td>
                    </tr>
                    <?php
                        }
                    }else{
                        echo "0 results";
                    }
                    
                    ?>
                </tbody>
            </table>
             
       
             </div>
        </div>
        
       <!-- registro categoria -->
                     <form class="modal fade" id="myModal" method="POST" action="persona_sql_registro.php">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="myModalLabel">REGISTRAR PERSONA</h5>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                
                                <table class="table table-hover">
                                    <tbody>
                                    <div class="form-group">
                                                <label for="idpersona" class="col-sm-2 control-label">idpersona:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="idpersona" name="idpersona" placeholder="idpersona" required>
                                                </div>
                                            </div>                
                                     <div class="form-group">
                                                <label for="nombre" class="col-sm-2 control-label">nombre:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" required>
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label for="apellido" class="col-sm-2 control-label">apellido:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="apellido" required>
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label for="direccion" class="col-sm-2 control-label">direccion:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="telefono" class="col-sm-2 control-label">telefono:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="telefono" required>
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
                <form class="modal fade" id="editUsu" method="POST" action="persona_sql_actualizar.php">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="myModalLabel">ACTUALIZAR PERSONA</h5>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                
                                <table class="table table-hover">
                                    <tbody>
                                    <input  id="idpersona" name="idpersona" type="hidden" ></input>   		
                                        
                                       <div class="form-group">
                                            <label for="nombre" class="col-sm-2 control-label">nombre:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" required>
                                            </div>
                                        </div>		
                                        <div class="form-group">
                                            <label for="apellido" class="col-sm-2 control-label">apellido:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="apellido" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="direccion" class="col-sm-2 control-label">direccion:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="telefono" class="col-sm-2 control-label">telefono:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="telefono" required>
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
               <form class="modal fade" id="confirm-delete" method="POST" action="persona_sql_eliminar.php">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="myModalLabel">ELIMINAR PERSONA</h5>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                
                                <table class="table table-hover">
                                    <tbody>
                                     <input  id="id" name="id" type="hidden" ></input>   		
                                        <div class="form-group">
                                            <label for="idpersona" class="col-sm-2 control-label">idpersona:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="idpersona" name="idpersona" readonly>
                                            </div>
                                        </div>  
                                       <div class="form-group">
                                            <label for="nombre" class="col-sm-2 control-label">nombre:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nombre" name="nombre"  readonly>
                                            </div>
                                        </div>		
                                        <div class="form-group">
                                            <label for="apellido" class="col-sm-2 control-label">apellido:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="apellido" name="apellido" p readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="direccion" class="col-sm-2 control-label">direccion:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="direccion" name="direccion"  readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="telefono" class="col-sm-2 control-label">telefono:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="telefono" name="telefono"  readonly>
                                            </div>
                                        </div>
                                     <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                               
                                                <td><input name="eliminar"type="submit" class="btn btn-primary" value="Eliminar datos"></td>
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
                    $('#mytable').DataTable();
                });
                //script que  extrae los datos y los almanena para así poder modificarlos
                $('#confirm-delete').on('show.bs.modal',function  (event)  {
                    
                    var button = $(event.relatedTarget);
                    var recipient0 = button.data('idpersona');
                    var recipient1 = button.data('nombre');
                    var recipient2 = button.data('apellido');
                     var recipient3 = button.data('direccion');
                    var recipient4 = button.data('telefono');
          
                    
                    var modal = $(this);
                    modal.find('.modal-body #idpersona').val(recipient0);
                    modal.find('.modal-body #nombre').val(recipient1);
                    modal.find('.modal-body #apellido').val(recipient2);
                     modal.find('.modal-body #direccion').val(recipient3);
                    modal.find('.modal-body #telefono').val(recipient4);
                   
                    
                    
                 });
                $('#editUsu').on('show.bs.modal', function  (event)  {
                    
                    var button = $(event.relatedTarget);
                    var recipient0 = button.data('idpersona');
                    var recipient1 = button.data('nombre');
                    var recipient2 = button.data('apellido');
                     var recipient3 = button.data('direccion');
                    var recipient4 = button.data('telefono');
          
                    
                    var modal = $(this);
                    modal.find('.modal-body #idpersona').val(recipient0);
                    modal.find('.modal-body #nombre').val(recipient1);
                    modal.find('.modal-body #apellido').val(recipient2);
                     modal.find('.modal-body #direccion').val(recipient3);
                    modal.find('.modal-body #telefono').val(recipient4);
                    
                    
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
