<div id="mod_title" class="mod_add_finanzas">
	Reportes
</div>
                      
<div id="mod_content">
	<div class="row">
    	<div id="venta_factura" class="span5">
		    Reporte de Hoy
	    </div>
	    <div id="venta_fecha" class="span5">
    		<?php echo "$dia de $mes de $anio"; ?>
	    </div>
	</div>
	<div id="detsep"></div>
    <div class="row">
    	<div class="span4">
        	Cantidad de Ventas
       	</div>
        <div class="span4">
        	<?php echo $cantidad_hoy; ?>
        </div>
   	</div>
    <div class="row">
    	<div class="span4">
        	Total vendido
       	</div>
        <div class="span4">
        	<?php echo $total_hoy; ?>
        </div>
   	</div>
    
    	<div class="row">
    	<div id="venta_factura" class="span5">
		    Reporte del Mes actual
	    </div>
	    <div id="venta_fecha" class="span5">
    		<?php echo "$mes de $anio"; ?>
	    </div>
	</div>
	<div id="detsep"></div>
    <div class="row">
    	<div class="span4">
        	Cantidad de Ventas
       	</div>
        <div class="span4">
        	<?php echo $cantidad_mes; ?>
        </div>
   	</div>
    <div class="row">
    	<div class="span4">
        	Total vendido
       	</div>
        <div class="span4">
        	<?php echo $total_mes; ?>
        </div>
   	</div>
</div>
