<?php
$cambio=$_REQUEST["actualiza"];
if($cambio=="tabla"){
  ?>
<table id="datatable-fixed-header" class="table table-striped table-bordered imprimir" >
                          <thead>
                            <tr>
                              <th>Cod</th>
                              <th>Visitante</th>
                              <th>Estación</th>
                              <th>Fecha</th>
                              <th>Acciones</th>
                            </tr>
                          </thead>


                          <tbody >
                            <?php
                                 include("../../ProcesoSubir/conexion.php");

                                $result=$mysqli->query("SELECT hs.idhojavisitaestaciones, hs.fechavisita, hs.observacion, est.codiogestacion, vis.nombre from hojavisitasestaciones hs
                                    inner join estacionmet est on hs.id_estacion = est.id_estacion
                                    inner join visitantes vis on hs.id_visitante = vis.id_visitante order by idhojavisitaestaciones");

                                  while($fila = $result->fetch_object()){
                                  ?>
                                    <tr>
                                      <td><?php echo $fila->idhojavisitaestaciones; ?></td>
                                      <td><?php echo $fila->nombre; ?></td>
                                      <td><?php echo $fila->codiogestacion; ?></td>
                                      <td><?php echo date('d/m/Y', strtotime($fila->fechavisita));  ?></td>

                                      <td class="text-center">
                                        <button class="btn btn-success btn-icon left-icon" data-toggle="modal"  data-target="#detalle" onclick="verMas('', '<?php echo $fila->idhojavisitaestaciones; ?>')">
                                          <i class="fa fa-search"></i>
                                          <span></span>
                                        </button>
                                        <!--<button class="btn btn-info btn-icon left-icon"  onClick="">
                                          <i class="fa fa-pencil"></i>
                                          <span></span>
                                        </button> -->
                                        <button class="btn btn-info btn-icon left-icon"  onClick="">
                                          <i class="fa fa-check"></i> <span></span>
                                        </button>
                                      </td>
                                    </tr>
                                  <?php
                                  }
                                ?>
                          </tbody>
                        </table>
                     <?php }?>