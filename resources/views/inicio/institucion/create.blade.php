@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Institucion</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'inicio/institucion','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" placeholder="Nombre...">
            </div>
            <div class="form-group">
            	<label for="provincia">Provincia</label>
            	<input type="text" name="provincia" class="form-control" placeholder="Provincia...">
            </div>
            <div class="form-group">
            	<label for="canton">Canton</label>
            	<input type="text" name="canton" class="form-control" placeholder="Canton...">
            </div>            
            <div class="form-group">
            	<label for="parroquia">Parroquia</label>
            	<input type="text" name="parroquia" class="form-control" placeholder="Parroquia...">
            </div>
            <div class="form-group">
            	<label for="direccion">Direccion</label>
            	<input type="text" name="direccion" class="form-control" placeholder="Direccion...">
            </div>
            <div class="form-group">
            	<label for="codigo_postal">Codigo postal</label>
            	<input type="text" name="codigo_postal" class="form-control" placeholder="Codigo postal...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection