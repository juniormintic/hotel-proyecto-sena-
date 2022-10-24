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
        
        <title>RESERVA</title>
    </head>
    <body>
        <header>
              <h4>RESERVA</h4>
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
        <div class="container">
	<div class="row">
        
            <br>
        <button  type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal">
                        Registrar reserva
                    </button>
            <table id="mytable" class="table table-bordred table-striped">
                <thead>
                    <tr>
                       <th>idreserva</th>
                            <th>preciohab</th>
                            <th>fechainicio</th>
                            <th>fechatermino</th>
                            <th>idpersona</th>
                            <th>idagencia</th>
                            <th>idhab</th>                     
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql="SELECT * FROM reserva";
                    $result=$conn->query($sql);
                    if($result->num_rows >0){
                        while($row=$result->fetch_assoc()){
                            ?>
                    <tr>
                        <td><?php echo $row['idreserva']; ?></td>
                        <td><?php echo $row['preciohab']; ?></td>
                        <td><?php echo $row['fechainicio']; ?></td>
                        <td><?php echo $row['fechatermino']; ?></td>
                        <td><?php echo $row['idpersona']; ?></td>
                        <td><?php echo $row['idagencia']; ?></td>
                        <td><?php echo $row['idhab']; ?></td>
                        <td><button class="btn btn-primary btn-xs edit_data" data-toggle='modal' data-target='#editUsu' data-idreserva='<?php echo $row["idreserva"]?>' data-preciohab='<?php echo $row["preciohab"]; ?>' data-fechainicio='<?php echo $row["fechainicio"]; ?>' data-fechatermino='<?php echo $row["fechatermino"]; ?>'data-idpersona='<?php echo $row["idpersona"]; ?>'data-idagencia='<?php echo $row["idagencia"]; ?>'data-idhab='<?php echo $row["idhab"]; ?>' class='btn btn-info'><span class="glyphicon glyphicon-pencil" data-placement="top" data-toggle="tooltip" title="Edit"></span></button></td> 
                        <td><button class="btn btn-danger btn-xs delete_data"  data-toggle='modal' data-target='#confirm-delete'data-idreserva='<?php echo $row["idreserva"]?>' data-preciohab='<?php echo $row["preciohab"]; ?>' data-fechainicio='<?php echo $row["fechainicio"]; ?>' data-fechatermino='<?php echo $row["fechatermino"]; ?>'data-idpersona='<?php echo $row["idpersona"]; ?>'data-idagencia='<?php echo $row["idagencia"]; ?>' data-idhab='<?php echo $row["idhab"]; ?>' class='btn btn-info'><span class="glyphicon glyphicon-trash" data-placement="top" data-toggle="tooltip" title="Edit"></span></button></td>
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
                     <form class="modal fade" id="myModal" method="POST" action="reserva_sql_registro.php">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="myModalLabel">REGISTRAR AGENCIA</h5>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                
                                <table class="table table-hover">
                                    <tbody>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                                <label for="idreserva" class="col-sm-2 control-label">idreserva:</label>
                                                
                                                    <input type="text" class="form-control" id="idreserva" name="idreserva" placeholder="idreserva" required>
                                                </div>
                                            </div>                 
                                            <div class="form-group">
                                                  <div class="col-sm-10">
                                                <label for="preciohab" class="col-sm-2 control-label">preciohab:</label>
                                              
                                                    <input type="text" class="form-control" id="preciohab" name="preciohab" placeholder="preciohab" required>
                                                </div>
                                            </div> 		
                                            <div class="form-group">
                                                <div class="col-sm-10">
                                                <label for="fechainicio" class="col-sm-2 control-label">fechainicio:</label>
                                                
                                                    <input type="date" class="form-control" id="fechainicio" name="fechainicio" placeholder="fechainicio" required>
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                 <div class="col-sm-10">
                                                <label for="fechatermino" class="col-sm-2 control-label">fechatermino:</label>
                                               
                                                    <input type="date" class="form-control" id="fechatermino" name="fechatermino" placeholder="fechatermino" required>
                                                </div>
                                            </div> 
                                        <div class="form-group">
                                             <div class="col-sm-10">
                                            <label for="idpersona" class="col-sm-2 control-label">idpersona:</label>
                                            <select  type="text" class="form-control"  name="idpersona" id="idpersona"  required>
                                                <option></option>
                                                <?php
                                                      $sql4="SELECT * FROM persona";
                                                      $result4=$conn->query($sql4);
                                                      while($row4=$result4->fetch_assoc()){
                                                          echo "<option value=\"".$row4['idpersona']."\">".$row4["idpersona"]." - ".$row4['nombre'].'</option>';
                                                      }
                                                    ?>
                                            </select>   
                                              </div>
                                            </div>
                                        <div class="form-group">
                                            <div class="col-sm-10">
                                            <label for="idagencia" class="col-sm-2 control-label">idagencia:</label>
                                            <select class="form-control"  name="idagencia" id="idagencia"  required>
                                                <option></option>
                                                 <?php
                                                      $sql3="SELECT * FROM agencia";
                                                      $result3=$conn->query($sql3);
                                                      while($row3=$result3->fetch_assoc()){
                                                          echo "<option value=\"".$row3['idagencia']."\">".$row3["idagencia"]." - ".$row3['nombre'].'</option>';
                                                      }
                                                    ?>
                                            </select>   
                                              </div>
                                            </div>
                                            
                                        <div class="form-group">
                                             <div class="col-sm-10">
                                            <label for="idhab" class="col-sm-2 control-label">idhab:</label>
                                            <select class="form-control"  name="idhab" id="idhab" required>
                                                <option></option>
                                                <?php
                                                      $sql2="SELECT * FROM habitaciones";
                                                      $result2=$conn->query($sql2);
                                                      while($row2=$result2->fetch_assoc()){
                                                          echo "<option value=\"".$row2['idhabitacion']."\">".$row2["idhabitacion"]." - ".$row2['tipohabitacion'].'</option>';
                                                      }
                                                    ?>
                                            </select>   
                                              </div>
                                            </div>
                                                        
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
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
                <form class="modal fade" id="editUsu" method="POST" action="reserva_sql_actualizar.php">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="myModalLabel">ACTUALIZAR AGENCIA</h5>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                
                                <table class="table table-hover">
                                   <tbody>
                                    
                                
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                                
                                                 <input  id="idreserva" name="idreserva" type="hidden" >  
                                                  
                                                </div>
                                            </div>                 
                                            <div class="form-group">
                                                <div class="col-sm-10">
                                                <label for="preciohab" class="col-sm-2 control-label">preciohab:</label>
                                                
                                                    <input type="text" class="form-control" id="preciohab" name="preciohab" placeholder="preciohab" required>
                                                </div>
                                            </div> 		
                                            <div class="form-group">
                                                 <div class="col-sm-10">
                                                <label for="fechainicio" class="col-sm-2 control-label">fechainicio:</label>
                                               
                                                    <input type="date" class="form-control" id="fechainicio" name="fechainicio" placeholder="fechainicio" required>
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <div class="col-sm-10">
                                                <label for="fechatermino" class="col-sm-2 control-label">fechatermino:</label>
                                                
                                                    <input type="date" class="form-control" id="fechatermino" name="fechatermino" placeholder="fechatermino" required>
                                                </div>
                                            </div> 
                                        <div class="form-group">
                                            <div class="col-sm-10">
                                            <label for="idpersona" class="col-sm-2 control-label">idpersona:</label>
                                             <select  type="text" class="form-control"  name="idpersona" id="idpersona"  required>
                                                <option></option>
                                                <?php
                                                      $sql5="SELECT * FROM persona";
                                                      $result5=$conn->query($sql5);
                                                      while($row5=$result5->fetch_assoc()){
                                                          echo "<option value=\"".$row5['idpersona']."\">".$row5["idpersona"]." - ".$row5['nombre'].'</option>';
                                                      }
                                                    ?>
                                            </select>   
                                               </div>
                                              </div>
                                        <div class="form-group">
                                            <div class="col-sm-10">
                                            <label for="idagencia" class="col-sm-2 control-label">idagencia:</label>
                                            <select class="form-control"  name="idagencia" id="idagencia"  required>
                                                <option></option>
                                                 <?php
                                                      $sql6="SELECT * FROM agencia";
                                                      $result6=$conn->query($sql6);
                                                      while($row6=$result6->fetch_assoc()){
                                                          echo "<option value=\"".$row6['idagencia']."\">".$row6["idagencia"]." - ".$row6['nombre'].'</option>';
                                                      }
                                                    ?>
                                            </select>   
                                                </div>
                                              </div>
                                        <div class="form-group">
                                            <div class="col-sm-10">
                                            <label for="idhab" class="col-sm-2 control-label">idhab:</label>
                                            <select class="form-control"  name="idhab" id="idhab" required>
                                                <option></option>
                                                <?php
                                                      $sql7="SELECT * FROM habitaciones";
                                                      $result7=$conn->query($sql7);
                                                      while($row7=$result7->fetch_assoc()){
                                                          echo "<option value=\"".$row7['idhabitacion']."\">".$row7["idhabitacion"]." - ".$row7['tipohabitacion'].'</option>';
                                                      }
                                                    ?>
                                            </select>   
                                               
                                              </div>
                                              </div>
                                                        
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
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
               <form class="modal fade" id="confirm-delete" method="POST" action="reserva_sql_eliminar.php">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h5 class="modal-title" id="myModalLabel">ELIMINAR CATEGORIA</h5>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                
                                <table class="table table-hover">
                                    <tbody>
                                  
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                                <label for="idreserva" class="col-sm-2 control-label">idreserva:</label>
                                                
                                                    <input type="text" class="form-control" id="idreserva" name="idreserva" placeholder="idreserva" required>
                                                </div>
                                            </div>                 
                                            <div class="form-group">
                                                <div class="col-sm-10">
                                                <label for="preciohab" class="col-sm-2 control-label">preciohab:</label>
                                                
                                                    <input type="text" class="form-control" id="preciohab" name="preciohab" placeholder="preciohab" required>
                                                </div>
                                            </div> 		
                                            <div class="form-group">
                                                <div class="col-sm-10">
                                                <label for="fechainicio" class="col-sm-2 control-label">fechainicio:</label>
                                                
                                                    <input type="date" class="form-control" id="fechainicio" name="fechainicio" placeholder="fechainicio" required>
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                 <div class="col-sm-10">
                                                <label for="fechatermino" class="col-sm-2 control-label">fechatermino:</label>
                                               
                                                    <input type="date" class="form-control" id="fechatermino" name="fechatermino" placeholder="fechatermino" required>
                                                </div>
                                            </div> 
                                        <div class="form-group">
                                             <div class="col-sm-10">
                                            <label for="idpersona" class="col-sm-2 control-label">idpersona:</label>
                                            <input  type="text" class="form-control"  name="idpersona" id="idpersona"  required>
                                                  </div>
                                              </div>
                                        <div class="form-group">
                                             <div class="col-sm-10">
                                            <label for="idagencia" class="col-sm-2 control-label">idagencia:</label>
                                            <input class="form-control"  name="idagencia" id="idagencia"  required>
                                                </div>
                                              </div>
                                        <div class="form-group">
                                             <div class="col-sm-10">
                                            <label for="idhab" class="col-sm-2 control-label">idhab:</label>
                                            <input class="form-control"  name="idhab" id="idhab" required>
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
                    $('#example').DataTable();
                });
                //script que  extrae los datos y los almanena para así poder modificarlos
                $('#confirm-delete').on('show.bs.modal',function  (event)  {
                    
                     var button = $(event.relatedTarget);
                    var recipient0 = button.data('idreserva');
                    var recipient1 = button.data('preciohab');
                    var recipient2 = button.data('fechainicio');
                    var recipient3 = button.data('fechatermino');
                    var recipient4 = button.data('idpersona');
                    var recipient5 = button.data('idagencia');
                    var recipient6 = button.data('idhab');
                    var modal = $(this);
                    modal.find('.modal-body #idreserva').val(recipient0);
                    modal.find('.modal-body #preciohab').val(recipient1);
                    modal.find('.modal-body #fechainicio').val(recipient2);
                    modal.find('.modal-body #fechatermino').val(recipient3);
                    modal.find('.modal-body #idpersona').val(recipient4);
                    modal.find('.modal-body #idagencia').val(recipient5);
                    modal.find('.modal-body #idhab').val(recipient6);
                    
                    
                 });
                $('#editUsu').on('show.bs.modal', function  (event)  {
                    
                     var button = $(event.relatedTarget);
                    var recipient0 = button.data('idreserva');
                    var recipient1 = button.data('preciohab');
                    var recipient2 = button.data('fechainicio');
                    var recipient3 = button.data('fechatermino');
                    var recipient4 = button.data('idpersona');
                    var recipient5 = button.data('idagencia');
                    var recipient6 = button.data('idhab');
                    var modal = $(this);
                    modal.find('.modal-body #idreserva').val(recipient0);
                    modal.find('.modal-body #preciohab').val(recipient1);
                    modal.find('.modal-body #fechainicio').val(recipient2);
                    modal.find('.modal-body #fechatermino').val(recipient3);
                    modal.find('.modal-body #idpersona').val(recipient4);
                    modal.find('.modal-body #idagencia').val(recipient5);
                    modal.find('.modal-body #idhab').val(recipient6);
                    
                });
                
                
                //script que nos sirve para confirmar las eliminacion del dato de la tabla
                    //$('#confirm-delete').on('show.bs.modal', function (e) {
                    //$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

                    //$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
                //});


            </script>

            <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
        <!--js_menu-->
        <script src="js/script.js" type="text/javascript"></script>
            <?php 
            $conn->close();
            
            ?>
    </body>
</html>
