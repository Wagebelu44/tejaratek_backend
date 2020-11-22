<div class="table-responsive">
<table class="table table-bordered" id="html_table" width="100%">
			<thead class="m-datatable__head">
				<tr>
						<th class="text-center">#</th>
						<th class="text-center">اسم بالكامل</th>
						<th class="text-center">اسم المستخدم</th>
						<th class="text-center">البريد الالكتروني</th>
						<th class="text-center">الجوال</th>
						@can('change_status_users')
						<th class="text-center">الحالة</th>
						@endcan
						@can('update_users')
						<th class="text-center">التعديل</th>
						@endcan
						@can('change_password_user')
						<th class="text-center">تغيير كلمة السر</th>
						@endcan
						@can('permission_users')
						<th class="text-center">الصلاحيات</th>
						@endcan
						@can('delete_users')
						<th class="text-center">حذف</th>
						@endcan
				</tr>
			</thead>
			<tbody class="m-datatable__body load">
				@php 
					$i =1;
				@endphp
				@if(count($data['users']) > 0)
					@foreach($data['users'] as $users)
					@php 
						if($users->status==1)
								{
								$class='btn btn-success m-btn m-btn--icon m-btn--pill';
								$color='green'; 
								$icon='check';
								$text = "مفعل";
							}else{
								$class='btn btn-danger m-btn m-btn--icon m-btn--pill';
								$color='red';
								$icon='check';
								$text = "غير مفعل";
							}
					@endphp
					<tr class="m-datatable__row">
						<td  class="text-center">
							{{$i++}}
						</td>
						<td class="text-center">
							{{$users->fullname}}
						</td>
						<td class="text-center">
							{{$users->username}}
						</td>
						<td class="text-center">
							{{$users->email}}
						</td>
						<td class="text-center">
							{{$users->mobile}}
						</td>
						@can('change_status_users')
						<td class="text-center">
							<a  color="{{$color}}" data-id="{{$users->id}}" class="{{$class}} UpdateStats "  href="javaScript:;">  <span>{{$text}}</span> </a>
						</td>
						@endcan
						@can('update_users')
						<td class="text-center">
							<a href="#" data-id="{{$users->id}}" class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air
							updateDetails"> <i class="fa fa-edit"></i> </a>
						</td>
						@endcan
						@can('change_password_user')
						<td class="text-center">
							<a href="#"  data-id="{{$users->id}}" class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air
							password-modal"> <i class="fa fa-lock"></i> </a>
						</td>
						@endcan
						@can('permission_users')
						<td class="text-center">
							<a href="#" data-id="{{$users->id}}" class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air
							permission"> <i class="fas fa-user"></i></a>
						</td>
						@endcan	
						@can('delete_users')
						<td class="text-center"><a href="#" data-id="{{$users->id}}" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air
							delete"> <i class="fa fa-trash"></i> </a>
						</td>
						@endcan
					</tr>
					@endforeach
				@else
				<tr class="m-datatable__row text-center"><td colspan="9">لا يوجد بيانات </td></tr>
				@endif
			</tbody>
			<tbody class="m-datatable__body DataUsers">
		</tbody>
	</table>
	<div style="text-align: center;">
			{!! $data['users']->render() !!}
	</div>
</div>