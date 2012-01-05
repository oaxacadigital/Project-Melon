					
                     <?php if($inser=="true"){ ?>
					 
                     <div class="alert-message success fade in" data-alert="alert">
					                 	<a class="close" href="#">×</a>
						
                     	<p><strong>REGISTRO</strong> de Credito Realizado con Exito!!!</p>
                     </div>	
                    	<?php } ?>		
                    
                      <div id="mod_title" class="mod_add_credito">
                      Agregar Compra a Credito 
                      </div>
                      
                      <div id="mod_content">
                      
                      <form id="nuevo_credito" method="post" action="<?php echo site_url("credito/nuevo/"); ?>" class="form-stacked">
                      
                      	                          
                          
                          <div class="row">
                          	<div class="span5">
                            	<div class="clearfix">
                                    <label for="proveedor">Proveedor</label>
                                    <div class="input">
                                      <select name="proveedor" id="proveedor" class="span5">
                                        <?php
										foreach ($prov as $row){
											echo "<option value='".$row['idproveedor']."'>".$row['razonsocial']."</option>";
										}
										?>
                                      </select>
                                    </div>                
                                  </div>
                            </div>
                            
                            <div class="span2">
                            	<div class="clearfix">
                                    <label for="factura">No de Factura</label>
                                    <div class="input">
                                      <input class="xxlarge span2" id="factura" name="factura" size="30" type="text">
                                    </div>                
                                  </div>
                            </div>
                            
                            <div class="span2">
                            	<div class="clearfix">
                                    <label for="cantidad_inicial"> Credito</label>
                                    <div class="input">
                                      <input class="xxlarge span2" id="cantidad_inicial" name="cantidad_inicial" size="30" type="text">
                                    </div>                
                                  </div>
                            </div>
                            
                          </div>
                          
                          
                          <div class="clearfix">
                            <label for="descripcion">Descripcion del Credito</label>
                            <div class="input">
                             <textarea class="xxlarge span9" id="descripcion" name="descripcion" rows="3"></textarea>
                              <span class="help-block">
                                Instrucciones de llenado XD
                              </span>
                            </div>                
                          </div>
                          
                          <div class="row">
                          	<div class="span5">
                            	<div class="clearfix">
                            	<label for="f_incredito">Inicio del Credito</label>
                                <div class="input">
                                  <input class="xlarge span4" id="f_iniciocredito" name="f_incredito" size="30" type="text">
                                </div>                
                                </div>
                            </div>
                            <div class="span5">
                            	<div class="clearfix">
                            	<label for="f_fincredito">Fin del Credito</label>
                                <div class="input">
                                  <input class="xlarge span4" id="f_fincredito" name="f_fincredito" size="30" type="text">
                                </div>                
                                </div>
                            </div>                            
                          </div>
                         
                          </div>
                          <div class="actions">
                          	<button type="submit" class="btn primary">Guardar</button>&nbsp;<button type="reset" class="btn">Cancelar</button>
                          </div>
                                                    
                      </form>
                      
                      </div>
                      
                      