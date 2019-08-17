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

	<div class="modal fade bd-example-modal-lg"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content ">
				<div class="container" style="margin-top: 2%">
					<form method="POST" action="{{route('registro_comida')}}">
						@csrf
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
							<label for="" class="center">Cantidad</label>
							<select id="descripcion" name="descripcion" class="custom-select" id="inputGroupSelect01" >
								<option selected>Seleccion</option>
								<option value="1">One</option>
								<option value="2">Two</option>
								<option value="3">Three</option>
							</select>
						</div>
						<div class="center" style="margin-left: 45%;margin-top: 2%;" >
							<button id="Guardar" onclick="Guardar()"  class="btn btn-primary ">Guardar Comida</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Small modal -->
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm">Small modal</button>

	<div class="modal fade bd-example-modal-sm mt-5" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				...
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	var editor;
	$( document ).ready(function() {
		tabla();
	});
	var tabla = function(){

		$.ajax({
			type:'GET',
			url: 'comida/ver',
			dataType: 'JSON',
			success: function(data) {

				
				$('#myTable').dataTable({

					responsive: true,
					data : data,
					columns: [
					{"data" : "name"},
					{"data" : "cantidad"},
					{"data" : "descripcion"}

					],

				});
			}});
	}

	var Guardar = function(){

		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$("#Guardar").click(function(e){
			e.preventDefault();
			var name = $("input[name=name]").val();
			var cantidad = ("#cantidad").val();;
			var descripcion = $("#descripcion").val();
			$.ajax({
				type:'POST',
				url:'/comida/register',
				data:{name:name, cantidad:cantidad, descripcion:descripcion},
				success:function(data){
					$('#myTable').DataTable().ajax.reload();
					console.log(data.success);
				}
			});
		});
	
}
</script>








<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>


@endsection  
