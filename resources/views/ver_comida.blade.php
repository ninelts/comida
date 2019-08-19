@extends('layouts.app')
@section('comida')


<table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>name</th>
			<th>cantidad</th>
			<th>descripcion</th>
		</tr>
	</thead>

</table>
<div class="center" style="margin-left: 45%">





	<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Registrar Comida</button>
	<button id="btn-editar" type="button" class="btn btn-primary" data-toggle="modal">Editar</button>

	<div class="modal fade bd-example-modal-lg" id="modal-r"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content ">
				<div class="container" style="margin-top: 2%">
					<form>
						<div class="row">
							<div class="col">
								<label for="">Nombre Producto</label>
								<input name="name" type="text" class="form-control" placeholder="producto" >
							</div>
							<div class="col">
								<label for="">Cantidad</label>
								<select id="cantidad" name="cantidad" class="custom-select" id="inputGroupSelect01" >
									<option selected>1</option>
									<option value="1">2</option>
									<option value="2">3</option>
									<option value="3">4</option>
								</select>
							</div>
						</div>
						<br> <br>
						<div class="col">
							<label for="" class="center">Descripcion</label>
							<textarea id="descripcion" class="form-control" id="exampleFormControlTextarea5" rows="3"></textarea>
						</div>
						<div class="center" style="margin-left: 45%;margin-top: 2%;" >
							<input id="Guardar" type="submit"   class="btn btn-primary " name="Guardar Comida" value="Guardar Comida">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<div class="modal fade bd-example-modal-lg-editar" id="modal-e"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div  class="modal-content ">
				<h1 class="text-center mt-5">EDITAR</h1>
				<div id="prueba" class="container" style="margin-top: 2%">
					<div class="row">
						<div class="col">
							<label for="">Nombre Producto</label>
							<input id="name-e" name="name-e" type="text" class="form-control" placeholder="producto" >
						</div>
						<div class="col">
							<label>Cantidad Actual:</label> <label id="cantidad-e"></label>
							<input  type="number" name="cantidad" class="custom-select" id="inputGroupSelect01" >

						</div>
					</div>
					<br> <br>
					<div class="col">
						<label for="" class="center">Descripcion</label>
						<textarea id="descripcion-e" class="form-control" id="exampleFormControlTextarea5" rows="3">

						</textarea>
					</div>
					<div class="center" style="margin-left: 45%;margin-top: 2%;" >
						<input id="Guardar" type="submit"   class="btn btn-primary " name="Guardar Comida" value="Editar">
						<input id="Guardar"  class="btn btn-danger " name="cancelar" value="Editar">
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Small modal -->
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm">Small modal</button>

	<div class="modal fade bd-example-modal-sm mt-5" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div  class="modal-content">
				
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	var editor;
	var table;
	$( document ).ready(function() {
		tabla();

	});

	// Obtener datos Atraves de ajax
	var tabla = function(){

		$.ajax({
			type:'GET',
			url: 'comida/ver',
			dataType: 'JSON',
			success: function(data) {



				var table = $('#myTable').dataTable({
					select: true,
					data : data,
					select: {
						info: true
					},
					columns: [
					{"data" : "name"},
					{"data" : "cantidad"},
					{"data" : "descripcion"}

					],

				});
			}});

// Registrar Atraves de ajax
$( document ).ready(function(){

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$("#Guardar").click(function(e){
		e.preventDefault();
		var name = $("input[name=name]").val();
		var cantidad = $("#cantidad").val();
		var descripcion = $("#descripcion").val();
		$.ajax({
			type:'POST',
			url:'comida/register',
			data:{name:name, cantidad:cantidad, descripcion:descripcion},
			success:function(data){
					$('#myTable').DataTable().destroy(); // Se destruye la tabla
					tabla(); // Se vuelve a realizar la peticion ajax
					$('#modal-r').modal('hide');

				}
			})
	})
});
}
$( document ).ready(function() {
	// Funcion para obtener el valor seleccionado
	$('#myTable').on( 'click', 'tr', function () {
		$(this).toggleClass('selected');
	} );

	$('#btn-editar').click( function () {
          var json_tabla =$('#myTable').DataTable().rows('.selected').data()[0];  //Capturamos Todos los datos seleccionados
          $("#name-e").attr("value",json_tabla.name);
          document.getElementById('cantidad-e').innerHTML=json_tabla.descripcion;
          document.getElementById('descripcion-e').innerHTML=json_tabla.descripcion;
          $('#modal-e').modal('show');
      });
});

var editar = function(){
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}});
	
	$("#editar").click(function(e){
		var id = json_tabla.id;
		e.preventDefault();

		$.ajax({
			type:'POST',
			url:'comida/editar'
			data:{id:id},
			success:function(response){
				console.log(response);
			}
		})
	});
}
</script>






<script src = "https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js" defer></script>
<script src = "https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js" defer></script>
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>


@endsection  
