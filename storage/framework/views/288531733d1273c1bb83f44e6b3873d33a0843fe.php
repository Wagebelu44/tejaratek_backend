<div class="table-responsive">
<table class="table table-bordered" id="html_table" width="100%">
			<thead class="m-datatable__head">
				<tr>
						<th class="text-center">#</th>
						<th class="text-center">الاسم</th>
						<th class="text-center">البريد الالكتروني</th>
						<th class="text-center">اسم المشروع</th>
						<th class="text-center">تفاصيل المشروع</th>
						<th class="text-center">ميزانية المشروع</th>
						<th class="text-center">العملة</th>
						<th class="text-center">التاريخ</th>
						<th class="text-center">حذف</th>
				</tr>
			</thead>
			<tbody class="m-datatable__body load">
				<?php 
					$i =1;
				?>
				<?php if(count($data['message']) > 0): ?>
					<?php $__currentLoopData = $data['message']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php 
						
					?>
					<tr class="m-datatable__row" <?php if($message->read_at == ""): ?> style="background-color: #ed335a40;" <?php endif; ?>>
						<td class="text-center">
							<?php echo e($i++); ?>

						</td>
						<td class="text-center">
							<?php echo e($message->name); ?>

						</td>
						<td class="text-center">
							<?php echo e($message->email); ?>

						</td>
						<td class="text-center">
							<?php echo e($message->name_project); ?>

						</td>
						<td class="text-center">
							<?php echo e($message->details); ?>

						</td>
						<td class="text-center">
							<?php echo e($message->amount); ?>

						</td>
						<td class="text-center">
							<?php if($message->curr): ?>
							<?php echo e($message->curr->name_ar); ?>

							<?php endif; ?>
						</td>
						<td class="text-center">
							<?php echo e($message->created_at); ?>

						</td>
						

						<td class="text-center">
							<a href="#" data-id="<?php echo e($message->id); ?>" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air	delete"> <i class="fa fa-trash"></i> </a>
						</td>
	
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php else: ?>
				<tr class="m-datatable__row"><td class="text-center" colspan="10">لا يوجد بيانات </td></tr>
				<?php endif; ?>
			</tbody>
			<tbody class="m-datatable__body DataUsers">
		</tbody>
	</table>
	<div style="text-align: center;">
			<?php echo $data['message']->render(); ?>

	</div>
</div><?php /**PATH E:\tejartek\resources\views/admin/project_request/table-data.blade.php ENDPATH**/ ?>