<?php
include 'conexion.php';

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

        <title>HOTEL</title>
    </head>
    <body>
        <header>
              <h4>HOTEL</h4>
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
		<button  type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal">
                        Registrar hotel
                    </button>
        
            <br>
       
         
            <table id="mytable" class="table table-bordred table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>idhotel</th>
                            <th>nombrehotel</th>
                            <th>direccionhotel</th>
                            <th>cantidadpiezas</th>
                            <th>telefono</th>
                            <th>aconstru</th>
                            <th>categoria</th>
                            <th>ciudad</th>
                            <th></th>
                            <th></th>
                    </tr>
                    
                </thead>
                <tbody>
                    <?php
                   $sql = "SELECT * FROM hoteles ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                   while($row=$result->fetch_assoc()){
                ?>     
                    <tr>
                        <td><input type="checkbox" class="checkthis" /></td>
                        <td><?php echo $row['idhotel']; ?></td>
                        <td><?php echo $row['nombrehotel']; ?></td>
                        <td><?php echo $row['direccionhotel']; ?></td>
                        <td><?php echo $row['cantidadpiezas']; ?></td>
                        <td><?php echo $row['telefono']; ?></td>
                        <td><?php echo $row['aconstru']; ?></td>
                        <td><?php echo $row['categoria']; ?></td>
                        <td><?php echo $row['ciudad']; ?></td>
                        <td><button class="btn btn-primary btn-xs edit_data" data-toggle='modal' data-target='#editUsu' data-id='<?php echo $row["idhotel"]?>' data-id_facturas='<?php echo $row["nombrehotel"]; ?>' data-id_producto='<?php echo $row["direccionhotel"]; ?>' data-cantidad='<?php echo $row["cantidadpiezas"]; ?>'data-precio='<?php echo $row["telefono"]; ?>'data-aconstru='<?php echo $row["aconstru"]; ?>'data-categoria='<?php echo $row["categoria"]; ?>'data-ciudad='<?php echo $row["ciudad"]; ?>' class='btn btn-info'><span class="glyphicon glyphicon-pencil" data-placement="top" data-toggle="tooltip" title="Edit"></span></button></td> 
                        <td><button class="btn btn-danger btn-xs delete_data"  data-toggle='modal' data-target='#confirm-delete'data-id='<?php echo $row["idhotel"]?>' data-id_facturas='<?php echo $row["nombrehotel"]; ?>' data-id_producto='<?php echo $row["direccionhotel"]; ?>' data-cantidad='<?php echo $row["cantidadpiezas"]; ?>'data-precio='<?php echo $row["telefono"]; ?>'data-aconstru='<?php echo $row["aconstru"]; ?>'data-categoria='<?php echo $row["categoria"]; ?>'data-ciudad='<?php echo $row["ciudad"]; ?>' class='btn btn-info'><span class="glyphicon glyphicon-trash" data-placement="top" data-toggle="tooltip" title="Edit"></span></button></td>
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
          <form class="modal fade" id="myModal" method="POST" action="hoteles_sql_registro.php">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="myModalLabel">REGISTRO HOTEL</h5>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                
                                <table class="table table-hover">
                                    <tbody>
                                    <div class="form-vertical"  >
                                        <div class="col-sm-10">
                                        <label for="idhotel" class="col-sm-2 control-label">id hotel:</label>
                                        <input  class="form-control col-md-9" id="idhotel" name="idhotel" type="text" size="20" required>  
                                        </div>
                                        </div>
                                        <div class="form-group">                                            
                                            
                                            <div class="col-sm-10">
                                                <label for="nombrehotel" class="col-sm-2 control-label">nombre hotel:</label>
                                                <input type="text" class="form-control col-md-9" name="nombrehotel" id="nombrehotel" size="20" required>
                                                
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="direccionhotel" class="col-sm-2 control-label">direccion :</label>
                                                <input class="form-control col-md-9"  name="direccionhotel" id="nombrehotel"  required>
                                               
                                            </div>
                                        </div>			
                                        <div class="form-group">
                                           
                                            <div class="col-sm-10">
                                                 <label for="cantidadpiezas" class="col-sm-2 control-label">cantidad pieza:</label>
                                                <input type="text" class="form-control" id="cantidadpiezas" name="cantidadpiezas" placeholder="cantidadpiezas"required >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="telefono" class="col-sm-2 control-label">telefono:</label>
                                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="telefono" required>
                                            </div>
                                        </div>
                                    <div class="form-group">                                            
                                            <div class="col-sm-10">
                                                <label for="aconstru" class="col-sm-2 control-label">construcion</label>
                                                <input type="date" class="form-control" id="aconstru" name="aconstru" placeholder="aconstru" required>
                                            </div>
                                        </div>
                                    <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="categoria" class="col-sm-2 control-label">categoria:</label>
                                                <input type="text" class="form-control" id="categoria" name="categoria" placeholder="categoria" required>
                                            </div>
                                        </div>
                                    <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="ciudad" class="col-sm-2 control-label">ciudad</label>
                                                <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="ciudad" required>
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

        </form>
                </div>                              
                <!-- The Modal editar -->
                <form class="modal fade" id="editUsu" method="POST" action="hoteles_sql_actualizar.php">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="myModalLabel">ACTUALIZAR HOTEL</h5>
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
                                                <label for="id_facturas" class="col-sm-2 control-label">nombre hotel:</label>
                                                <input type="text" class="form-control col-md-9" name="nombrehotel" id="id_facturas" size="20"  >
                                                
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="id_producto" class="col-sm-2 control-label">direccion :</label>
                                                <input class="form-control col-md-9"  name="direccionhotel" id="id_producto"  required>
                                               
                                            </div>
                                        </div>			
                                        <div class="form-group">
                                           
                                            <div class="col-sm-10">
                                                 <label for="cantidad" class="col-sm-2 control-label">cantidad pieza:</label>
                                                <input type="text" class="form-control" id="cantidad" name="cantidadpiezas" placeholder="cantidadpiezas"required >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="precio" class="col-sm-2 control-label">telefono:</label>
                                                <input type="text" class="form-control" id="precio" name="telefono" placeholder="telefono" required>
                                            </div>
                                        </div>
                                   <div class="form-group">
                                       <div class="col-sm-10">
                                            <label for="aconstru" class="col-sm-2 control-label">aconstru:</label>
                                           
                                                <input type="date" class="form-control" id="aconstru" name="aconstru" placeholder="aconstru" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-10">
                                            <label for="categoria" class="col-sm-2 control-label">categoria:</label>
                                            
                                                <input type="text" class="form-control" id="categoria" name="categoria" placeholder="categoria" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-10">
                                            <label for="ciudad" class="col-sm-2 control-label">ciudad:</label>
                                           
                                                <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="ciudad" required>
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
               <form class="modal fade" id="confirm-delete" method="POST" action="hoteles_sql_eliminar.php">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="myModalLabel">ELIMINAR HOTEL</h5>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                
                                <table class="table table-hover">
                                    <tbody>
                                    <div class="form-vertical"  autocomplete="off">
                                        
                                        <input  id="id" name="id" type="hidden" >  
                                        
                                        <div class="form-group">                                            
                                            
                                            <div class="col-sm-10">
                                                <label for="id_facturas" class="col-sm-2 control-label">nombre hotel:</label>
                                                <input type="text" class="form-control col-md-9" name="nombrehotel" id="id_factura"  readonly >
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="id_producto" class="col-sm-2 control-label">direccion:</label>
                                                <input type="text" class="form-control" id="id_producto" name="direccionhotel" placeholder="direccionhotel" readonly>
                                            </div>
                                        </div>			
                                        <div class="form-group">
                                           
                                            <div class="col-sm-10">
                                                 <label for="cantidad" class="col-sm-2 control-label">cantidad pieza:</label>
                                                <input type="text" class="form-control" id="cantidad" name="cantidadpiezas" placeholder="cantidadpiezas" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="precio" class="col-sm-2 control-label">precio:</label>
                                                <input type="text" class="form-control" id="precio" name="precio" placeholder="precio" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            
                                            <div class="col-sm-10">
                                                <label for="precio" class="col-sm-2 control-label">telefono:</label>
                                                <input type="text" class="form-control" id="precio" name="telefono" placeholder="telefono" readonly>
                                            </div>
                                        </div>
                                       <div class="form-group">
                                           <div class="col-sm-10">
                                            <label for="aconstru" class="col-sm-2 control-label">aconstru:</label>
                                            
                                                <input type="date" class="form-control" id="aconstru" name="aconstru" placeholder="aconstru" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-10">
                                            <label for="categoria" class="col-sm-2 control-label">categoria:</label>
                                            
                                                <input type="text" class="form-control" id="categoria" name="categoria" placeholder="categoria" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-10">
                                            <label for="ciudad" class="col-sm-2 control-label">ciudad:</label>
                                            
                                                <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="ciudad" readonly>
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
                    var recipient1 = button.data('id_facturas');
                    var recipient2 = button.data('id_producto');
                    var recipient3 = button.data('cantidad');
                    var recipient4 = button.data('precio');
                    var recipient5 = button.data('aconstru');
                    var recipient6 = button.data('categoria');
                    var recipient7 = button.data('ciudad');
                   
                    var modal = $(this);
                    modal.find('.modal-body #id').val(recipient0);
                    modal.find('.modal-body #id_facturas').val(recipient1);
                    modal.find('.modal-body #id_producto').val(recipient2);
                    modal.find('.modal-body #cantidad').val(recipient3);
                    modal.find('.modal-body #precio').val(recipient4);
                    modal.find('.modal-body #aconstru').val(recipient5);
                    modal.find('.modal-body #categoria').val(recipient6);
                    modal.find('.modal-body #ciudad').val(recipient7);
                    
                    
                 });
                $('#editUsu').on('show.bs.modal', function  (event)  {
                    
                    var button = $(event.relatedTarget);
                    var recipient0 = button.data('id');
                    var recipient1 = button.data('id_facturas');
                    var recipient2 = button.data('id_producto');
                    var recipient3 = button.data('cantidad');
                    var recipient4 = button.data('precio');
                    var recipient5 = button.data('aconstru');
                    var recipient6 = button.data('categoria');
                    var recipient7 = button.data('ciudad');
                  
                    var modal = $(this);
                    modal.find('.modal-body #id').val(recipient0);
                    modal.find('.modal-body #id_facturas').val(recipient1);
                    modal.find('.modal-body #id_producto').val(recipient2);
                    modal.find('.modal-body #cantidad').val(recipient3);
                    modal.find('.modal-body #precio').val(recipient4);
                     modal.find('.modal-body #aconstru').val(recipient5);
                      modal.find('.modal-body #categoria').val(recipient6);
                       modal.find('.modal-body #ciudad').val(recipient7);
                   
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
