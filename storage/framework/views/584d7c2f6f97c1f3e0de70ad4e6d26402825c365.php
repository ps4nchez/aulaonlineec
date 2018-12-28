<?php $__env->startSection('contenido'); ?>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de directores <a href="/inicio/director/create"><button class="btn btn-success">Nuevo</button></a></h3>
		<?php echo $__env->make('inicio.director.search', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
               <?php $__currentLoopData = $directores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dir): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($dir->iddirector); ?></td>
					<td><?php echo e($dir->nombre); ?></td>
					<td><?php echo e($dir->apellido); ?></td>
					<td><?php echo e($dir->cargo); ?></td>
					<td><?php echo e($dir->celular); ?></td>
					<td><?php echo e($dir->email); ?></td>
					<td><img src="<?php echo e(asset('imagenes/directores/'.$dir->foto)); ?>" alt="<?php echo e($dir->nombre); ?>" height="100px" width="100px" class="img-thumbnail"></td>
					<td><?php echo e($dir->institucion); ?></td>
					<td>
						<a href="<?php echo e(URL::action('DirectorController@edit',$dir->iddirector)); ?>"><button class="btn btn-info">Editar</button></a>
                         
					</td>
				</tr>
				<?php echo $__env->make('inicio.director.modal', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</table>
		</div>
		<?php echo e($directores->render()); ?>

	</div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>