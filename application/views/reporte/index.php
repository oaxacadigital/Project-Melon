<script type="text/javascript">
Date.format = 'yyyy-mm-dd';
$(document).ready(function(){
	$("#radio").click(function() {
		if($("#diario").is(':checked')) {
			$("#p_diario").show();
			$("#p_mensual").hide();
			$("#p_periodo").hide();
		}
		if($("#mes").is(':checked')) {
			$("#p_diario").hide();
			$("#p_mensual").show();
			$("#p_periodo").hide();
		} 
		if($("#intervalo").is(':checked')) {
			$("#p_diario").hide();
			$("#p_mensual").hide();
			$("#p_periodo").show();
		}  
	});
	
	$('#por_fecha_cal').datePicker(
				{
					startDate: '2010-11-04',
					endDate: (new Date()).asString(),
					clickInput:true,
					createButton:false,
				}
			);
	
	
	$('.periodo').datePicker({createButton:false,startDate: '2010-11-04',endDate: (new Date()).asString(),})
				$('#por_periodo_cal_1')
				.bind(
					'click',
					function()
					{
						$(this).dpDisplay();
						this.blur();
						return false;
					}
				).bind(
					'dpClosed',
					function(e, selectedDates)
					{
						var d = selectedDates[0];
						if (d) {
							d = new Date(d);
							$('#por_periodo_cal_2').dpSetStartDate(d.addDays(1).asString());
						}
					}
				);
				$('#por_periodo_cal_2')
				.bind(
					'click',
					function()
					{
						$(this).dpDisplay();
						this.blur();
						return false;
					}
				).bind(
					'dpClosed',
					function(e, selectedDates)
					{
						var d = selectedDates[0];
						if (d) {
							d = new Date(d);
							$('#por_periodo_cal_1').dpSetEndDate(d.addDays(-1).asString());
						}
					}
				);

});
</script>
<div id="mod_title" class="mod_add_finanzas">
	Finanzas
</div>
                      
<div id="mod_content">
	<div class="row">
    	<div id="venta_factura" class="span5">
		   ¿Qué reporte buscas?
	    </div>	    
</div>
	<div id="detsep"></div><br />
   	<form action="<?php echo current_url(); ?>" method="post" id="reporte">
    	<p>
        	Tipo de reporte:
        	<select name="tipo">
            	<option value="credito">Credito</option>
                <option value="venta">Venta</option>
            </select>
        </p>
        <p id="radio">
        	Periodo:
            Diario <input id="diario" type="radio" name="periodo" value="dia" />
             Mensual <input id="mes" type="radio" name="periodo" value="mensual" />
             Intervalo <input id="intervalo" type="radio" name="periodo" value="intervalo" />
        </p>
        <div id="sigueform">
        	<div id="p_diario" style="display:none;">
            	Fecha: <input type='text' id='por_fecha_cal' name='d_diario' class='span3'>
            </div>
            <div id="p_mensual" style="display:none;">
            	Mes: <select name='mes' class='inline span5'><option value='01'>Enero</option>              <option value='02'>Febrero</option>              <option value='03'>Marzo</option>              <option value='04'>Abril</option>              <option value='05'>Mayo</option>              <option value='06'>Junio</option>              <option value='07'>Julio</option>              <option value='08'>Agosto</option>              <option value='09'>Septiembre</option>              <option value='10'>Octubre</option>              <option value='11'>Noviembre</option>              <option value='12'>Diciembre</option>            </select> A&ntilde;o: <input type='text' class='span3 inline' id='anio' name='anio'>
            </div>
            <div id="p_periodo" style="display:none;">
            	Fecha inicial: <input type='text' class="inline span3 periodo" id='por_periodo_cal_1' name='f_inicio'> Fecha final: <input type='text' id='por_periodo_cal_2' name='f_fin' class="inline span3 periodo">
            </div>
        
        	
        </div>
        <input name="envio_reporte" type="submit" id="envio_reporte" value="Enviar" />
    </form>
</div>
