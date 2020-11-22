<div class="table-responsive">
<table class="table table-bordered" id="html_table" width="100%">
			<thead class="m-datatable__head">
				<tr>
						<th class="text-center">#</th>
						<th class="text-center">العنوان</th>
						<th class="text-center">الرقم</th>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_page')): ?>
						<th class="text-center">تعديل</th>
						<?php endif; ?>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_page')): ?>
						<th class="text-center">حذف</th>
						<?php endif; ?>
				</tr>
			</thead>
			<tbody class="m-datatable__body load">
				<?php 
					$i =1;
				?>
				<?php if(count($data['statistics']) > 0): ?>
					<?php $__currentLoopData = $data['statistics']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statistics): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr class="m-datatable__row">
						<td class="text-center">
							<?php echo e($i++); ?>

						</td>
						<td class="text-center">
							<?php echo e($statistics->name); ?>

						</td>
					
						<td class="text-center">
							<?php echo e($statistics->number); ?>

						</td>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_page')): ?>
						<td class="text-center">
						<a href="#" data-id="<?php echo e($statistics->id); ?>" class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air
                     	updateDetails"> <i class="fa fa-edit"></i> </a>
						</td>
						<?php endif; ?>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_page')): ?>
						<td class="text-center"><a href="#" data-id="<?php echo e($statistics->id); ?>" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air
							delete"> <i class="fa fa-trash"></i> </a>
						</td>
						<?php endif; ?>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php else: ?>
				<tr  class="m-datatable__row"><td colspan="10" class="text-center">لا يوجد بيانات </td></tr>
				<?php endif; ?>
			</tbody>
			<tbody class="m-datatable__body DataUsers">
		</tbody>
	</table>
	<div style="text-align: center;">
			<?php echo $data['statistics']->render(); ?>

	</div>
</div><?php /**PATH E:\tejartek\resources\views/admin/statistics/table-data.blade.php ENDPATH**/ ?>