
//Funcion para cargar las pantallas que vienen de PHP con AJAX
function cargarPantalla(pantalla, parametros)
{
	$.ajax({
		data:  parametros,
		url:   pantalla,
		type:  'POST',
		beforeSend: function () 
		{
			$('.box').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
		},
		success:	function (response) 
		{
			var accion = function() {$("#contenedorPrincipal").html(response);};
			setTimeout(accion, 500);
		}
	});
}

function submitIniciarReclamo()
{
	//Agregar las validaciones para la pantalla
	//{...}
	
	cargarPantalla('agente/datos-reclamo.php','');
}

function submitGeneraReclamo()
{
	//Agregar las validaciones para la pantalla
	//{...}
	
	$.ajax({
		data:  $("#formGeneraReclamo").serialize(),
		url:   "../bin/AJAX.php",
		type:  'POST',
		beforeSend: function () 
		{
			$('.box').append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
		},
		success:  function (response) 
		{
			cargarPantalla('agente/enviado-reclamo.php','');
		},
		error: function(xhr, status, error) 
		{
		}
	});
}

function countIncidencias()	
{
	$.ajax({
		data:  {Funcion : 'countIncidencias'},
		url:   '../bin/AJAX.php',
		type:  'POST',
		success:	function (response) 
		{
			$("#count-incidencias").html(response);
		}
	});
}