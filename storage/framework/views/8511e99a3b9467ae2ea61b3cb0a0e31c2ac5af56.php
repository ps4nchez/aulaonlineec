<?php $__env->startSection('contenido'); ?>
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Instituciones <a href="../Institucion/create"><button class="btn btn-success">Nuevo</button></a></h3>
		<?php echo $__env->make('inicio.Institucion.search', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
					<th>Codigo</th>
				</thead>
               <?php $__currentLoopData = $instituciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inst): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($inst->idinstitucion); ?></td>
					<td><?php echo e($inst->nombre); ?></td>
					<td><?php echo e($inst->provincia); ?></td>
					<td><?php echo e($inst->canton); ?></td>
					<td><?php echo e($inst->parroquia); ?></td>
					<td><?php echo e($inst->direccion); ?></td>
					<td><?php echo e($inst->codigo_postal); ?></td>
					<td>
						<a href="<?php echo e(URL::action('InstitucionController@edit',$inst->idInstitucion)); ?>"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-<?php echo e($inst->idinstitucion); ?>" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				<?php echo $__env->make('inicio.Institucion.modal', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</table>
		</div>
		<?php echo e($instituciones->render()); ?>

	</div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>