@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de directores <a href="/inicio/director/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('inicio.director.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Cargo</th>
					<th>Celular</th>
					<th>Email</th>
					<th>Foto</th>
					<th>Institucion</th>
					<th>Opciones</th>
				</thead>
               @foreach ($directores as $dir)
				<tr>
					<td>{{ $dir->iddirector}}</td>
					<td>{{ $dir->nombre}}</td>
					<td>{{ $dir->apellido}}</td>
					<td>{{ $dir->cargo}}</td>
					<td>{{ $dir->celular}}</td>
					<td>{{ $dir->email}}</td>
					<td><img src="{{asset('imagenes/directores/'.$dir->foto)}}" alt="{{ $dir->nombre}}" height="100px" width="100px" class="img-thumbnail"></td>
					<td>{{ $dir->institucion}}</td>
					<td>
						<a href="{{URL::action('DirectorController@edit',$dir->iddirector)}}"><button class="btn btn-info">Editar</button></a>
                         
					</td>
				</tr>
				@include('inicio.director.modal')
				@endforeach
			</table>
		</div>
		{{$directores->render()}}
	</div>
</div>



@endsection