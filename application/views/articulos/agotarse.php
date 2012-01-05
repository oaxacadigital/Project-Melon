<div id="mod_title" class="mod_list_proveedor">
                     Articulos por debajo del stock m&iacute;nimo
                      </div>
                      
                      <div id="mod_content">

						 <div id="detalle_articulo">
                            <strong>Detalle del articulo</strong> <span class="pull-right"> <a id="det_close" href="#">Cerrar</a></span>
                            
                            	<div id="panel" class="detalle_content">
                                	
                           	  </div>
                        	</div>
                     <br>
                     
                         
                       
                      <table class="zebra-striped" id="tabla_articulo">
                        <thead>
                
                          <tr>
                            <th class="blue header">Clave</th>
                            <th class="blue header systab">Nombre</th>
                            <th class="green header systab">Proovedor</th>
                            <th class="red header">Stock</th>                            
                            <th class="red header">Precio</th>
							
                            <th class="">Acciones</th>
                          </tr>
                        </thead>
                
                        <tbody>
                        
						 <?php 

								foreach ($info['data'] as $row)
									{
						?> 
						
                        <tr>
                            <td><?php echo $row['codigo_art'];?></td>
                            <td><?php echo $row['nombre'];?> </td>
                            <td><?php echo $row['razonsocial'];?> </td>
                            <td><?php echo $row['existencia'];?> </td>
                            <td><?php echo $row['p_venta'];?> </td>
                            <td><a   href="<?php echo base_url(); ?>articulo/consulta/<?php echo $row['idarticulo'];?> " class=" pull-left ui-silk ui-silk-application-edit">Editar</a> <a onclick="detalle_articulo(<?php echo $row['idarticulo'] ?>);"  href="#" class=" pull-left ui-silk ui-silk-zoom">Detalle</a></td>
                          </tr>
                            <?php
						}	                
						?>   
                        </tbody>
                      </table>
                      <div id="paginacion">
					  
                      </div>
                      </div>
                      
                      