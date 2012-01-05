<div id="mod_title" class="mod_list_proveedor">
                      Proveedores
                      </div>
                      
                      <div id="mod_content">
                      
                      <div class="row clearfix">
	                      <div class="span8 ">
                         <form id="buscar" method="GET" action="<?php echo site_url("proveedor"); ?>">
                          		<input name="q" type="text" placeholder="proveedor" />
                                <input type="submit" value="Buscar"/>
                          </form>
                          </div>
                          <div class="pull-right" align="right"> 
                          	<a href="<?php echo base_url(); ?>proveedor/nuevo"><img src="<?php echo base_url(); ?>site_media/images/icon_add.png" width="26" height="26" /></a>
                          </div>

                      </div>
									  <div id="eliminar_proveedor">
								<div class="elimina_proveedor">
								
								</div>
							</div> 
                         
                       
                      <table class="zebra-striped" id="tabla_proveedores">
                        <thead>
                
                          <tr>
                            <th class="header">#</th>                            
                            <th class="blue header systab">Razon Social</th>
                            <th class="green header systab">Direccion</th>
                            <th class="green header systab">Telefono</th>
                            <th class="">Acciones</th>
                          </tr>
                        </thead>
                
                        <tbody>
                        <?php 
							
								foreach ($info as $row)
									{
						?> 
						
                        <tr>
                            <td><?php echo $row->idproveedor;?> </td>
                            <td><?php echo $row->razonsocial;?></td>
                            <td><?php echo $row->direccion;?></td>
                            <td><?php echo $row->telefono;?></td>
                            <td><a href="<?php echo base_url(); ?>proveedor/consulta/<?php echo $row->idproveedor;?>" class=" pull-left ui-silk ui-silk-application-edit">Editar</a> <a  onclick="elimina_proveedor(<?php echo $row->idproveedor; ?>);" href="#" class="ui-silk ui-silk-delete">Eliminar</a></td>
                          </tr>
                            <?php
						}	                       
						?>   
                          
                        </tbody>
                      </table>
                      
                      </div>
                      
                      