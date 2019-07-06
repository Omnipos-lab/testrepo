

<?php $__env->startSection('content'); ?>
    
    <?php echo $__env->make('layouts.backendPageHero', [
    	'title' => 'Store groups',
    	'btns' => [
    		[
                'class' => 'btn btn-primary',
                'caption' => 'Add store group',
                'url' => route('storeGroups.form', 0)
            ]
    	]
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Page Content -->
    <div class="content">
        <div class="block">
        	<div class="block-content">
        	
		        <table class="table table-bordered table-hover table-vcenter js-dataTable">
		        	<thead>
		        		<tr>
		        			<th><?php echo e(__('Name')); ?></th>
		        			<th><?php echo e(__('iPos settings')); ?></th>
		        			<th><?php echo e(__('Action')); ?></th>
		        		</tr>
		        	</thead>
		        	<tbody>
			        	<?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			        		<tr>
			        			<td><?php echo e($group->name); ?></td>
			        			<td>
			        				<ul class="text-small compact">
									<?php $__currentLoopData = $iposFeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $iposFeature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<li>
											<span class=""><?php echo e(__($iposFeature->name)); ?></span>:
											<?php echo $__env->make('helpers.viewBool', ['value' => $group->ipos_settings[$iposFeature->id]], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
										</li>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</ul>
								</td>
			        			<td class="text-center">
									<div class="btn-group">
										<?php echo $__env->make('helpers.btnEdit', [
											'url' => route('storeGroups.form', $group->id), 
											'title' => 'Edit group'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
										<?php echo $__env->make('helpers.btnDelete', [
											'url' => route('storeGroups.delete', $group->id), 
											'title' => 'Remove group',
											'confirm' => 'Remove group?'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
									</div>
								</td>
			        		</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			        </tbody>
		        </table>
        
        	</div>
        </div>
        
    </div>
    <!-- END Page Content -->
<?php $__env->stopSection(); ?>




<?php $__env->startSection('css_after'); ?>
	<link rel="stylesheet" href="<?php echo e(asset('js/plugins/datatables/dataTables.bootstrap4.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js_after'); ?>
	<script src="<?php echo e(asset('js/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/plugins/datatables/dataTables.bootstrap4.min.js')); ?>"></script>

    
    <script>
        jQuery(function(){

        	// Init full DataTable
            jQuery('.js-dataTable').dataTable({
            	'columnDefs': [
					{ "width": "80px", targets: [ 2 ] }
				]
            });

        });
    </script>
    
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>