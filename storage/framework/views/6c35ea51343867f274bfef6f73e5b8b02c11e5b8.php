<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Institucion: <?php echo e($institucion->nombre); ?></h3>
			<?php if(count($errors)>0): ?>
			<div class="alert alert-danger">
				<ul>
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><?php echo e($error); ?></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
			<?php endif; ?>

			<?php echo Form::model($institucion,['method'=>'PATCH','route'=>['institucion.update',$institucion->idinstitucion]]); ?>

            <?php echo e(Form::token()); ?>

            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" value="<?php echo e($institucion->nombre); ?>" placeholder="Nombre...">
            </div>
            <div class="form-group">
            	<label for="provincia">Provincia</label>
            	<input type="text" name="provincia" class="form-control" value="<?php echo e($institucion->provincia); ?>" placeholder="Provincia...">
            </div>
            <div class="form-group">
            	<label for="canton">Canton</label>
            	<input type="text" name="canton" class="form-control" value="<?php echo e($institucion->canton); ?>" placeholder="Canton...">
            </div>
            <div class="form-group">
            	<label for="parroquia">Parroquia</label>
            	<input type="text" name="parroquia" class="form-control" value="<?php echo e($institucion->parroquia); ?>" placeholder="Parroquia...">
            </div>
            <div class="form-group">
            	<label for="direccion">Direccion</label>
            	<input type="text" name="direccion" class="form-control" value="<?php echo e($institucion->direccion); ?>" placeholder="Direccion...">
            </div>
            <div class="form-group">
            	<label for="codigo_postal">Codigo postal</label>
            	<input type="text" name="codigo_postal" class="form-control" value="<?php echo e($institucion->codigo_postal); ?>" placeholder="Codigo postal...">
            </div>            
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			<?php echo Form::close(); ?>		
            
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>