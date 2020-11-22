<div class="table-responsive">
<table class="table table-bordered" id="html_table" width="100%">
			<thead class="m-datatable__head">
				<tr>
						<th class="text-center">#</th>
						<th class="text-center">الاسم</th>
						<th class="text-center">البريد الالكتروني</th>
						<th class="text-center">الجوال</th>
						<th class="text-center">التاريخ</th>

						<th class="text-center">الرد</th>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('addexcel_contact')): ?>

                        <th class="text-center">تصدير إكسل</th>
						<?php endif; ?>		

						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_contact')): ?>
                        <th class="text-center">مشاهدة</th>
						<?php endif; ?>		
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reply_contact')): ?>
                        <th class="text-center">ارسال رد</th>
						<?php endif; ?>	
                        <th class="text-center"> حذف  </th>
						
				</tr>
			</thead>
			<tbody class="m-datatable__body load">
				<?php 
					$i =1;
				?>
				<?php if(count($data['message']) > 0): ?>
					<?php $__currentLoopData = $data['message']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php 
						$color = '';
						if( $message->status ==1)
								{
								$class='btn btn-success m-btn m-btn--icon m-btn--pill';
								$color='green'; 
								$icon='check';
								$text = "مقبول";
							}else{
								$class='btn btn-danger m-btn m-btn--icon m-btn--pill';
								$color='red';
								$icon='check';
								$text = "غير مقبول";
							}

							if($message->admin_view == 1){
								$color = 'success';
							}else{
								$color = 'danger';
							}
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
							<?php echo e($message->mobile); ?>

						</td>
						<td class="text-center">
							<?php echo e($message->created_at); ?>

						</td>
						<td class="text-center">
                            <?php echo e($title =  $message->response ?? '-'); ?>

						</td>
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('addexcel_contact')): ?>

						<td class="text-center">
							<a href="javascript:void(0);" style="color:#fff" class="addexcel btn btn-warning  m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air" data-id="<?php echo e($message->id); ?>"><i class="fas fa-file-excel"></i></a>
						</td>
						<?php endif; ?>		

						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_contact')): ?>
						<td class="text-center">
                            <a href="javascript:void(0);" class="show_message btn btn-success  m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air" data-id="<?php echo e($message->id); ?>"><i class="far fa-eye"></i></a>
                        </td>	
						<?php endif; ?>		
						<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reply_contact')): ?>
                        <td class="text-center">
                            <a href="javascript:void(0);" class="send_message  btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air" data-id="<?php echo e($message->id); ?>"><i class="fas fa-reply"></i></a>
                        </td>	
						<?php endif; ?>	

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
</div><?php /**PATH E:\tejartek\resources\views/admin/contact/table-data.blade.php ENDPATH**/ ?>