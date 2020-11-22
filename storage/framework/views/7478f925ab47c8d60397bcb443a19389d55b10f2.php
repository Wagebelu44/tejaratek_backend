<div class="table-responsive">

<table class="table table-bordered" id="html_table" width="100%">

			<thead class="m-datatable__head">

				<tr>

						<th class="text-center">#</th>

						<th class="text-center">اسم العميل</th>

						<th class="text-center">الصورة</th>

						

						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('change_status_slider')): ?>

						<th class="text-center">الحالة</th>

						<?php endif; ?>

						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update_slider')): ?>

						<th class="text-center">تعديل</th>

						<?php endif; ?>

						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_slider')): ?>

						<th class="text-center">حذف</th>

						<?php endif; ?>

				</tr>

			</thead>

			<tbody class="m-datatable__body load">

				<?php 

					$i =1;

				?>

				<?php if(count($data['our_clients']) > 0): ?>

					<?php $__currentLoopData = $data['our_clients']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

					<?php 

					if($slider->status==1)

								{

								$class='btn btn-success m-btn m-btn--icon m-btn--pill';

								$color='green'; 

								$icon='check';

								$text = 'مفعل';

							}else{

								$class='btn btn-danger m-btn m-btn--icon m-btn--pill';

								$color='red';

								$icon='check';

								$text = 'غير مفعل';

							}

					?>

					<tr class="m-datatable__row">

						<td class="text-center">

							<?php echo e($i++); ?>


						</td>

						<td class="text-center">

							<?php echo e($slider->title); ?>


						</td>

						<td class="text-center">

							<img src="/uploads/<?php echo e($slider->image); ?>" width="150px" alt="">

						</td>

						

						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('change_status_slider')): ?>

						<td class="text-center">

						<a  color="<?php echo e($color); ?>" data-id="<?php echo e($slider->id); ?>" class="<?php echo e($class); ?> UpdateStats "  href="javaScript:;">  <span><?php echo e($text); ?></span> </a>

						</td>

						<?php endif; ?>

						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update_slider')): ?>

						<td class="text-center">

						<a href="#" data-id="<?php echo e($slider->id); ?>" class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air

                     	updateDetails"> <i class="fa fa-edit"></i> </a>

						</td>

						<?php endif; ?>

						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_slider')): ?>

						<td class="text-center">

							<a href="#" data-id="<?php echo e($slider->id); ?>" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air	delete"> <i class="fa fa-trash"></i> </a>

						</td>

						<?php endif; ?>

					</tr>

					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				<?php else: ?>

				<tr class="m-datatable__row text-center"><td colspan="8">لا يوجد بيانات </td></tr>

				<?php endif; ?>

			</tbody>

			<tbody class="m-datatable__body DataUsers">

		</tbody>

	</table>

	<div style="text-align: center;">

			<?php echo $data['our_clients']->render(); ?>


	</div>

</div><?php /**PATH E:\tejartek\resources\views/admin/ourclients/table-data.blade.php ENDPATH**/ ?>