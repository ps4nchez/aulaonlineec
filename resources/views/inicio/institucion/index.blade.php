@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Instituciones <a href="/inicio/institucion/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('inicio.institucion.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Provincia</th>
					<th>Canton</th>
					<th>Parroquia</th>
					<th>Direccion</th>
					<th>Codigo Postal</th>
					<th>Opciones</th>
				</thead>
               @foreach ($instituciones as $inst)
				<tr>
					<td>{{ $inst->idinstitucion}}</td>
					<td>{{ $inst->nombre}}</td>
					<td>{{ $inst->provincia}}</td>
					<td>{{ $inst->canton}}</td>
					<td>{{ $inst->parroquia}}</td>
					<td>{{ $inst->direccion}}</td>
					<td>{{ $inst->codigo_postal}}</td>
					<td>
						<a href="{{URL::action('InstitucionController@edit',$inst->idinstitucion)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$inst->idinstitucion}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('inicio.institucion.modal')
				@endforeach
			</table>
		</div>
		{{$instituciones->render()}}
	</div>
</div>



@endsection