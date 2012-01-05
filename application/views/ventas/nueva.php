<script type="text/javascript">         

function verifica_art(id) {
	status = false;
	if (articulos) {
	  for (i in articulos) {		
		if(articulos[i] == id){ status = true; }
	  }
	}
	
	return status;
}


function print_totales(total_producto){
subtotal=subtotal+total_producto;
iva=subtotal*0.16;
total= subtotal+iva;	
$('#print_subtotal').html(subtotal);
$('#print_iva').html(iva);
$('#print_total').html(total);
$("#subtotal").get(0).value =subtotal;
$("#iva").get(0).value = iva;
$("#total").get(0).value = total;
	}
	
function agregar_a_cesta(){
	id = $("#loadproducto_id").get(0).value;
	nombre = $("#loadproducto_nombre").get(0).value;
	clave = $("#loadproducto_clave").get(0).value;
	precio = $("#loadproducto_precio").get(0).value;
	existencia = parseInt($("#loadproducto_existencia").get(0).value);
	cantidad = parseInt($("#venta_cantidad").get(0).value);
	
	
	if(verifica_art(id)==true)
	{
	alert("Ya ingresaste este articulo!");
	$("#loadproducto_id").get(0).value = "";
	$("#loadproducto_nombre").get(0).value = "";
	$("#loadproducto_clave").get(0).value = "";
	$("#loadproducto_precio").get(0).value = "";
	$("#loadproducto_existencia").get(0).value = "";
	$("#venta_cantidad").get(0).value = "";	
	$(".as-selection-item").remove();
	$(".as-values").get(0).value = "undefined,";
	$('.as-input').focus();		
	}
	else
	{
	if(!((id=="") && (nombre=="") && (clave=="") && (precio=="") && (existencia=="") && (cantidad=="")))
		{		
			
		if((existencia>=0) && (cantidad>=0))
			{			
			if(existencia >= cantidad)
				{
				articulos.push(id);
				genera_item_venta(id,clave,nombre,precio,cantidad);				
				$("#loadproducto_id").get(0).value = "";
				$("#loadproducto_nombre").get(0).value = "";
				$("#loadproducto_clave").get(0).value = "";
				$("#loadproducto_precio").get(0).value = "";
				$("#loadproducto_existencia").get(0).value = "";
				$("#venta_cantidad").get(0).value = "";	
				$(".as-selection-item").remove();
				$(".as-values").get(0).value = "undefined,";
				$('.as-input').focus();							
				}
				else
					{
					alert("La cantidad ingresada excede las existencias!");
					$('#venta_cantidad').focus();
					}
			}
		}
	}
	}


function elimina_articulo(id,total_producto){
	alert(id+" - "+total_producto);
	subtotal=subtotal-total_producto;
	iva=subtotal*0.16;
	total= subtotal+iva;	
	$('#print_subtotal').html(subtotal);
	$('#print_iva').html(iva);
	$('#print_total').html(total);
	$("#subtotal").get(0).value =subtotal;
	$("#iva").get(0).value = iva;
	$("#total").get(0).value = total;
	}
	
function genera_item_venta(id,clave,nombre,precio,cantidad){
	var total_producto = precio*cantidad;
	$('#venta_detalle_content').append('<div id="venta_articulo" class="row"><div class="span4">'+clave+' - '+nombre+'<input name="id_producto[]" type="hidden" id="id_producto" value="'+id+'" /></div><div class="span2" >'+cantidad+'<input name="cantidad[]" type="hidden" id="cantidad" value="'+cantidad+'" /></div><div class="span2">$'+precio+'</div><div class="span2"><input name="total_producto[]" type="hidden" id="total_producto" value="'+total_producto+'" />$'+total_producto+' <a onclick="elimina_articulo('+id+','+total_producto+');" style="float:right;" id="elimina_elemento" href="#" class="ui-silk ui-silk-delete">Eliminar</a></div><div class="clearfix"></div><div id="venta_prod_sep" class="span10"></div></div>');
	$('#elimina_elemento').bind('click', function() {		
 		$(this).parents("#venta_articulo").remove();    
		});
	print_totales(total_producto);
	}

$(function(){
	
	$("#venta_buscaproducto").autoSuggest("<?php echo base_url(); ?>json/autosuggest", {
		neverSubmit:true,
		emptyText:'No se encontraron resultados de su consulta.',
		selectedItemProp: "nombre", 
		searchObjProps: "nombre",
		startText:'Seleccione Producto',
		minChars: 2,
		selectionLimit:1,
		resultClick: function(data){
			$("#loadproducto_id").get(0).value=data.attributes.idarticulo;
			$("#loadproducto_nombre").get(0).value=data.attributes.nombre;
			$("#loadproducto_clave").get(0).value=data.attributes.codigo_art;
			$("#loadproducto_precio").get(0).value=data.attributes.p_venta;
			$("#loadproducto_existencia").get(0).value=data.attributes.existencia;
			$('#venta_cantidad').focus();			
			return false;
			},
		selectionAdded: function(data) {
			alert(data.attributes.idarticulo);
			return false;
			},
		selectionRemoved: function(elem) {
			elem.remove();
			},
		limitText: 'Ya haz seleccionado un producto',
		selectionAdded: function(elem){  }}
		);
});



</script>
					 <?php if($inser=="true"){ ?>
                    <div class="alert-message success">
                     	<a class="close" href="#">×</a>
                     	<p><strong>La venta se ha registrado Exitosamente!</strong>. <a href="<?php echo site_url("finanzas/venta/hoy"); ?>">Ver Listado de ventas</a></p>
                     </div>	
                     
                     <?php } ?>
                    
                    
                      <div id="mod_title" class="mod_add_venta">
                      Nueva Venta
                      </div>
                      
                      <div id="mod_content">
                      
                      	<div class="row">
                        	<div id="venta_factura" class="span5">
                            Factura No. <span>354</span>
                            </div>
                            <div id="venta_fecha" class="span5">
                            15 de Octubre de 2011
                            </div>
                        </div>
                        <div id="detsep"></div>
                      
                      
						<div id="venta_form">
                          <form action="<?php echo site_url("ventas");  ?>" method="post" class="form-stacked">
    
                              <div class="clearfix">
                                <label for="razon_social">Busca tu producto para agregarlo a la venta:</label>
                                <div class="inline-inputs">
                                  <div class="pull-left">
                                  	<input class="xlarge span5" id="venta_buscaproducto" name="venta_buscaproducto" size="30" type="text">
                                  </div>
                                  <input class="xlarge span2" onKeyDown="if(event.keyCode==13){ $('#loadagrega_producto').focus(); return false;}" id="venta_cantidad" name="venta_cantidad" size="10" type="text">
                                    
                                    
                                  <input id="loadagrega_producto" name="loadagrega_producto" onclick="agregar_a_cesta();" type="button"  class="btn success" value="Agregar Producto" />
                                  
                                  <input name="loadproducto_id" type="hidden" id="loadproducto_id" value="" />
                                  <input name="loadproducto_nombre" type="hidden" id="loadproducto_nombre" value="" />
                                  <input name="loadproducto_precio" type="hidden" id="loadproducto_precio" value="" />
                                  <input name="loadproducto_clave" type="hidden" id="loadproducto_clave" value="" />
                                  <input name="loadproducto_existencia" type="hidden" id="loadproducto_existencia" value="" />
                                  
                                 
                                </div>                
                              </div>
                              <div id="detsep"></div>
                              
                              <div id="venta_detalle_content_title">
                              	<div class="row">
                                	<div class="span4">
                                    Nombre del producto
                                    </div>
                                    <div class="span2">
                                    Cantidad
                                    </div>
                                    <div class="span2">
                                    Precio Unit.
                                    </div>
                                    <div class="span2">
                                    Total Prod.
                                    </div>                                	
                                </div>	
                              </div>
                              <div id="venta_detalle_content">
                              
                              	                              
                               
                                
                              </div>
                              
                              <div id="detsep"></div>
                              <div id="venta_total_content">
                              		<div id="venta_tot" class="row">
                              			<div id="venta_total_mask" class="span5">
                               			 SubTotal
                               			 </div>
                                		<div id="venta_total_cant" class="span5 subtotal">
                               			 $ <span id="print_subtotal">0.00</span>
                                         <input name="subtotal" type="hidden" id="subtotal" />
                                		</div>
                              		</div>
                                    <div id="venta_tot" class="row">
                              			<div id="venta_total_mask" class="span5">
                               			 IVA
                               			 </div>
                                		<div id="venta_total_cant" class="span5 iva">
                               			 $ <span id="print_iva">0.00</span>
                                         <input name="iva" type="hidden" id="iva" />
                                		</div>
                              		</div>
                                    <div id="venta_tot_factura" class="row">
                              			<div id="venta_total_factura" class="span5">
                               			 Total
                               			 </div>
                                		<div id="venta_total_cant_factura" class="span5 total">
                               			 $ <span id="print_total">0.00</span>
                                         <input name="total" type="hidden" id="total" />
                                		</div>
                              		</div>
                              </div>
                        	  
                              
                             
                              <div class="actions">
                                <button type="submit" class="btn primary">Finalizar Venta</button>&nbsp;<button type="reset" class="btn">Cancelar</button>
                              </div>
                                                        
                          </form>
                        </div>
                      
                      </div>
                      
                      
                    </div>
              