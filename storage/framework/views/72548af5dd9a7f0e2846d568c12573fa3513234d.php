<?php $__env->startSection('contenido'); ?>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Director</h3>
			<?php if(count($errors)>0): ?>
			<div class="alert alert-danger">
				<ul>
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><?php echo e($error); ?></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
			<?php endif; ?>

			<?php echo Form::open(array('url'=>'inicio/director','method'=>'POST','autocomplete'=>'off','files'=>'true')); ?>

            <?php echo e(Form::token()); ?>

            <div class="form-group">
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" required value="<?php echo e(old('nombre')); ?>" class="form-control" placeholder="Nombre...">
            </div>
            <div class="form-group">
            	<label for="apellido">Apellido</label>
            	<input type="text" name="apellido" required value="<?php echo e(old('apellido')); ?>" class="form-control" placeholder="Apellido...">
            </div>
            <div class="form-group">
            	<label for="cargo">Cargo</label>
            	<input type="text" name="cargo" required value="<?php echo e(old('cargo')); ?>" class="form-control" placeholder="Cargo...">
            </div>  
            
            <div class="form-group">
            	<label for="celular">Celular</label>
            	<input type="text" name="celular" required value="<?php echo e(old('celular')); ?>" class="form-control" placeholder="Celular...">
            </div>
            <div class="form-group">
            	<label for="email">Email</label>
            	<input type="text" name="email" required value="<?php echo e(old('email')); ?>" class="form-control" placeholder="Email...">
            </div>
            <div class="form-group">
                  <label for="foto">Foto</label>
                  <input type="file" name="foto" class="form-control">
            </div>
            <div class="form-group">
                  <label>Institucion</label>
                  <select name="idinstitucion" class="form-control">
                        <?php $__currentLoopData = $instituciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inst): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($inst->idinstitucion); ?>"><?php echo e($inst->nombre); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>                   
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