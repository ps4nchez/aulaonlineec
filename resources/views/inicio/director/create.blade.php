@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Director</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'inicio/director','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre...">
            </div>
            <div class="form-group">
            	<label for="apellido">Apellido</label>
            	<input type="text" name="apellido" required value="{{old('apellido')}}" class="form-control" placeholder="Apellido...">
            </div>
            <div class="form-group">
            	<label for="cargo">Cargo</label>
            	<input type="text" name="cargo" required value="{{old('cargo')}}" class="form-control" placeholder="Cargo...">
            </div>  
            
            <div class="form-group">
            	<label for="celular">Celular</label>
            	<input type="text" name="celular" required value="{{old('celular')}}" class="form-control" placeholder="Celular...">
            </div>
            <div class="form-group">
            	<label for="email">Email</label>
            	<input type="text" name="email" required value="{{old('email')}}" class="form-control" placeholder="Email...">
            </div>
            <div class="form-group">
                  <label for="foto">Foto</label>
                  <input type="file" name="foto" class="form-control">
            </div>
            <div class="form-group">
                  <label>Institucion</label>
                  <select name="idinstitucion" class="form-control">
                        @foreach($instituciones as $inst)
                        <option value="{{$inst->idinstitucion}}">{{$inst->nombre}}</option>
                        @endforeach
                  </select>                   
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection