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
        </head>
        <body>
            
            
         <header>
              <h4>TIPO HABITACION</h4>
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
            <br>
            <div class="container">
	<div class="row">
           
		 <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal">
                        Registrar vendedor
                    </button>
                <br>
                <!--tabla responsive para mostrar los datos-->
                <div class="table-responsive-xl" >
                    <table id="example" class="table table-hover">
                        <thead>
                            <!--campos fijos de la tabla-->
                            <tr>
                                 <td><input type="checkbox" class="checkthis" /></td>
                                 <th>idtipo</th>
                                <th>nombre</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>			
                        <tbody>

                            <?php
                    $sql="SELECT * FROM tipohab";
                    $result=$conn->query($sql);
                    if($result->num_rows>0){
                        while($row=$result->fetch_assoc()){
                            ?>
                                    <tr>
                                         <td><input type="checkbox" class="checkthis" /></td>
                                        <td><?php echo $row['idtipo']; ?></td>
                                        <td><?php echo $row['nombre']; ?></td>
                                        <!--agregamos los botones para sus respectivas acciones modificar y borrar datos-->
                                        <td><button class="btn btn-primary btn-xs edit_data" data-toggle='modal' data-target='#editUsu' data-idtipo='<?php echo $row["idtipo"]?>' data-nombre='<?php echo $row["nombre"]; ?>'  class='btn btn-info'><span class="glyphicon glyphicon-pencil" data-placement="top" data-toggle="tooltip" title="Edit"></span></button></td> 
                                        <td><button class="btn btn-danger btn-xs delete_data"  data-toggle='modal' data-target='#confirm-delete'data-idtipo='<?php echo $row["idtipo"]?>' data-nombre='<?php echo $row["nombre"]; ?>' class='btn btn-info'><span class="glyphicon glyphicon-trash" data-placement="top" data-toggle="tooltip" title="Edit"></span></button></td>
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
                 
                     <!-- registro cliente -->
                     <form class="modal fade" id="myModal" method="POST" action="tipohab_sql_registro.php">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="myModalLabel">REGISTRAR TIPO HABITACION </h5>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                
                                <table class="table table-hover">
                                    <tbody>
                                      <div class="form-group">
                                           <div class="col-sm-10">
                                                <label for="idtipo" class="col-sm-2 control-label">idtipo:</label>
                                               
                                                    <input type="text" class="form-control" id="idtipo" name="idtipo" placeholder="idtipo" required>
                                                </div>
                                            </div>              
                                            <div class="form-group">
                                                <div class="col-sm-10">
                                                <label for="nombre" class="col-sm-2 control-label">nombre:</label>
                                                
                                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" required>
                                                </div>
                                            </div>
                                         </tbody>
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
                <form class="modal fade" id="editUsu" method="POST" action="tipohab_sql_actualizar.php">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="myModalLabel">ACTUALIZAR TIPO HABITACION</h5>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                
                                <table class="table table-hover">
                                   <tbody>
                                    <div class="form-group">
                                            <label for="idtipo" class="col-sm-2 control-label">idtipo:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="idtipo" name="idtipo" placeholder="idtipo" readonly="">
                                            </div>
                                        </div>             
                                            <div class="form-group">
                                            <label for="nombre" class="col-sm-2 control-label">nombre:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" required>
                                            </div>
                                        </div>				
                                            
                                </tbody> 
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
               <form class="modal fade" id="confirm-delete" method="POST" action="tipohab_sql_eliminar.php">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="myModalLabel">ELIMINAR TIPO HABITACION</h5>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                
                                <table class="table table-hover">
                                   <tbody>
                                    <div class="form-group">
                                         <div class="col-sm-9">
                                            <label for="idtipo" class="col-sm-2 control-label">idtipo:</label>                                           
                                                <input type="text" class="form-control" id="idtipo" name="idtipo" placeholder="idtipo" readonly="">
                                            </div>
                                        </div>             
                                            <div class="form-group">
                                            <label for="nombre" class="col-sm-2 control-label">nombre:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" readonly="">
                                            </div>
                                        </div>				
                                            
                                    </tbody> 
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
	


            </div>
            
         
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
                    var recipient0 = button.data('idtipo');
                    var recipient1 = button.data('nombre');
                    var modal = $(this);
                    modal.find('.modal-body #idtipo').val(recipient0);
                    modal.find('.modal-body #nombre').val(recipient1);
                    
                 });
                $('#editUsu').on('show.bs.modal', function  (event)  {
                    
                     var button = $(event.relatedTarget);
                    var recipient0 = button.data('idtipo');
                    var recipient1 = button.data('nombre');
                    var modal = $(this);
                    modal.find('.modal-body #idtipo').val(recipient0);
                    modal.find('.modal-body #nombre').val(recipient1);
                    
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






