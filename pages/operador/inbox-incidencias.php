<?php
require('../../bin/Sistema.php');
?>
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Inbox de Reclamos y Consultas</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="row menu-botones">
      <div class="col-md-12">
        <div class="mailbox-controls">
          <button class="btn btn-primary" onclick="javascript:cargarPantalla('operador/inbox-incidencias.php')">
          <i class="fa fa-refresh"></i>
          <span>Actualizar</span>
          </button>							
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <table id="example2" class="table table-striped">
          <thead>
            <tr>
              <th>Tipo</th>
              <th>Descripcion</th>
              <th>MTCN</th>
              <th>Agente</th>
              <th>Fecha</th>
              <th>Accion</th>
            </tr>
          </thead>
          <tbody>
		  <?php		  
			$query = 'SELECT * FROM incidencias WHERE id_operador = 0';			
			$consulta = new Consulta(getConexion(), $query);
			foreach($consulta->getFilas() as $var)
			{
				echo '
					<tr>
					  <td class="inbox-tipo">
						'.$var['id_tipo'].'
					  </td>
					  <td class="inbox-texto">
						<b>Demoras en Devolucion</b>
						'.$var['id_apertura'].'
					  </td>
					  <td>
						<a href="#">
						0	
						</a> 
					  </td>
					  <td>
						<a href="#">
						'.$var['id_agente'].'
						</a>
					  </td>
					  <td class="inbox-texto">
						'.$var['fecha_alta'].'
					  </td>
					  <td>
						<button class="btn btn-primary btn-sm">
						<i class="glyphicon glyphicon-ok"></i>
						<span></span>
						</button>
					  </td>
					</tr>
					';
			}
			?>
          </tbody>
          <tfoot>
            <tr>
              <th>Tipo</th>
              <th>Descripcion</th>
              <th>MTCN</th>
              <th>Agente</th>
              <th>Accion</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    Footer
  </div>
</div>
<script type="text/javascript">	
						
	$('#example2').dataTable();	

</script>	