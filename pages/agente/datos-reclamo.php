<?php
require("../../bin/Sistema.php");
?>
<div class="box box-default">
  <div class="box-header with-border">
    <h1 class="box-title">Ingrese los datos de reclamo...</h1>
  </div>
  <div class="box-body">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <p style="color:#777">
          En esta seccion usted puede iniciar un reclamo pertinente. Seleccione el reclamo correspondiente e ingrese los datos para llevar a cabo el mismo.
          Cuando el reclamo este en manos del operador, usted sera notificado, a si mismo cuando el mismo se lleve a cabo. Usted puede consultar el estado
          de un reclamo desde la seccion "Estado de Reclamo".
        </p>
      </div>
    </div>
    <div class="row">
	<form id="formGeneraReclamo" action="javascript:submitGeneraReclamo()">
	<input type="hidden" name="Funcion" value="generaIncidencia" /> 
      <div class="col-md-10 col-md-offset-1">
        <p class="lead" style="margin-top:20px">
          Datos de Reclamo:
        </p>
      </div>
      <div class="col-md-10 col-md-offset-1">
        <div class="form-group col-md-6">
          <label>Apertura:</label>
			<?php
				imprimirSelect('apertura', 'SELECT * FROM aperturas WHERE isActivo=TRUE', 'descripcion', 'codigo');
			?>
        </div>
        <div class="form-group col-md-6">
          <label>Beneficiario:</label>
          <input type="text" name="beneficiario" class="form-control" placeholder="Beneficiario ...">
        </div>
        <div class="form-group col-md-6">
          <label>MTCN:</label>
          <input type="text" name="mtcn" class="form-control" placeholder="MTCN ...">
        </div>
        <div class="form-group col-md-6">
          <label>Monto principal:</label>
          <input type="text" name="monto" class="form-control" placeholder="Monto principal ...">
        </div>
        <div class="form-group col-md-6">
          <label>Destino:</label>
          <input type="text" name="destino" class="form-control" placeholder="Destino ...">
        </div>
        <div class="form-group col-md-12">
          <label>Observaciones:</label>
          <textarea class="form-control" name="txtObservaciones" id="txtObservaciones" rows="3" placeholder="Enter ...">								
          </textarea>
        </div>
        <div class="col-md-3 pull-right">
          <button class="btn btn-block btn-warning" style="margin-top:15px;" >
			Realizar Reclamo
          </button>							
        </div>
      </div>
    </div>
    <div class="box-footer" style="margin-top:25px">
    </div>
  </div>
  </form>
</div>
<script type="text/javascript">

	//Funciones para cuando carga el DOM
	$( document ).ready(function() {
		
	setTimeout(function()
	{
		CKEDITOR.replace('txtObservaciones');
	},100);
		
	});  
	
</script>	
