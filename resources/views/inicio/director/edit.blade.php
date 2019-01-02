@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Director: {{ $director->nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($director,['method'=>'PATCH','route'=>['director.update',$director->iddirector],'files'=>'true'])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" required value="{{$director->nombre}}" class="form-control" value="{{$director->nombre}}">
            </div>
            <div class="form-group">
            	<label for="apellido">Apellido</label>
            	<input type="text" name="apellido" required value="{{$director->apellido}}" class="form-control" value="{{$director->apellido}}">
            </div>
            <div class="form-group">
            	<label for="cargo">Cargo</label>
            	<input type="text" name="cargo" required value="{{$director->cargo}}" class="form-control" value="{{$director->cargo}}">
            </div>
            <div class="form-group">
            	<label for="celular">Celular</label>
            	<input type="text" name="celular" required value="{{$director->celular}}" class="form-control" value="{{$director->celular}}">
            </div>
            <div class="form-group">
            	<label for="email">Email</label>
            	<input type="text" name="email" required value="{{$director->email}}" class="form-control" value="{{$director->email}}">
            </div>
            <div class="form-group">
            	<label for="foto">Foto</label>
                  <input type="file" name="foto"  class="form-control">
                  @if (($director->foto)!="")                  
                        <img src="{{asset('imagenes/directores/'.$director->foto)}}" height="300px" width="300px">
                  @endif
            </div>   
            <div class="form-group">
                  <label>Institucion</label>
                  <select name="idinstitucion" class="form-control">
                        @foreach($instituciones as $inst)
                              @if($inst->idinstitucion==$director->idinstitucion)
                        <option value="{{$inst->idinstitucion}}" selected>{{$inst->nombre}}</option>
                              @else
                        <option value="{{$inst->idinstitucion}}">{{$inst->nombre}}</option>
                        @endif
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