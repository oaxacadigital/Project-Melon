					
                     <?php if($inser=="true"){ ?>
					 
                     <div class="alert-message success">
                     	<a class="close" href="#">×</a>
						
                     	<p><strong>Registro Exitoso!</strong> El producto se ha registrado exitosamente. <a href="<?php echo site_url("articulo/"); ?>">Ver Productos</a></p>
                     </div>	
                    	<?php } ?>		
                    
                      <div id="mod_title" class="mod_add_proveedor">
                      Nuevo Articulo
                      </div>
                      
                      <div id="mod_content">
                      
                      <form id="nuevo_articulo" method="post" action="<?php echo site_url("articulo/nuevo/"); ?>" class="form-stacked">
                      
                      	<div class="row">
                          	<div class="span6">
                            	<div class="clearfix">
                                    <label for="nombre"><strong>Nombre del Producto</strong></label>
                                    <div class="input">
                                      <input class="xlarge span6" id="nombre" name="nombre" size="30" type="text">
                                    </div>                
                                  </div>
                            </div>
                            <div class="span4">
                            	<div class="clearfix">
                                    <label for="clave"><strong>Clave del Producto</strong></label>
                                    <div class="input">
                                      <input class="xlarge span3" id="clave" name="clave" size="30" type="text">
                                    </div>                
                                  </div>
                            </div>
                        </div>

                          
                          
                          <div class="row">
                          	<div class="span5">
                            	<div class="clearfix">
                                    <label for="categoria">Categoria del producto</label>
                                    <div class="input">
                                      <select name="categoria" id="categoria" class="span5">
                                        <?php
										foreach ($cat as $row){
											echo "<option value='".$row['idcategoria']."'>".$row['nombre_c']."</option>";
										}
										?>
                                      </select>
                                    </div>                
                                  </div>
                            </div>
                            
                            <div class="span2">
                            	<div class="clearfix">
                                    <label for="stock_inicial">Stock Inicial</label>
                                    <div class="input">
                                      <input class="xxlarge span2" id="stock_inicial" name="stock_inicial" size="30" type="text">
                                    </div>                
                                  </div>
                            </div>
                            
                            <div class="span2">
                            	<div class="clearfix">
                                    <label for="stock_minimo">Stock Minimo</label>
                                    <div class="input">
                                      <input class="xxlarge span2" id="stock_minimo" name="stock_minimo" size="30" type="text">
                                    </div>                
                                  </div>
                            </div>
                            
                          </div>
                          
                          
                          <div class="clearfix">
                            <label for="direccion">Descripcion del producto</label>
                            <div class="input">
                             <textarea class="xxlarge span9" id="descripcion" name="descripcion" rows="3"></textarea>
                              <span class="help-block">
                                Descripcion del producto
                              </span>
                            </div>                
                          </div>
                          
                          <div class="row">
                          	<div class="span5">
                            	<div class="clearfix">
                            	<label for="precio_compra">Precio de Compra</label>
                                <div class="input">
                                  <input class="xlarge span4" id="p_compra" name="p_compra" size="30" type="text">
                                </div>                
                                </div>
                            </div>
                            <div class="span5">
                            	<div class="clearfix">
                            	<label for="precio_venta">Precio de Venta</label>
                                <div class="input">
                                  <input class="xlarge span4" id="p_venta" name="p_venta" size="30" type="text">
                                </div>                
                                </div>
                            </div>                            
                          </div>
                          <div class="clearfix">
                          <label for="proveedor">Proveedor</label>
                          <div class="input">
                          	<select name="proveedor" id="proveedor" class="span9">
								<?php
                                foreach ($prov as $row){
                                    echo "<option value='".$row['idproveedor']."'>".$row['razonsocial']."</option>";
                                }
                                ?>
                            </select>
                          </div>
                          </div>
                          <div class="actions">
                          	<button type="submit" class="btn primary">Guardar</button>&nbsp;<button type="reset" class="btn">Cancelar</button>
                          </div>
                                                    
                      </form>
                      
                      </div>
                      
                      