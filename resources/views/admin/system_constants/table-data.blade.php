<div class="table-responsive">
<table class="table table-bordered" id="html_table" width="100%">
			<thead class="m-datatable__head">
				<tr>
						<th class="text-center">#</th>
						<th class="text-center">الاسم</th>
						<th class="text-center">النوع</th>
						@can('status_system_constants')
						<th class="text-center">الحالة</th>
						@endcan
						@can('update_system_constants')
						<th class="text-center">تعديل</th>
						@endcan
						@can('delete_system_constants')
						<th class="text-center">حذف</th>
						@endcan
				</tr>
			</thead>
			<tbody class="m-datatable__body load">
				@php
					$i =1;
				
				@endphp
				@if(count($data['system_constants']) > 0)
					@foreach($data['system_constants'] as $system_constant)
                    @php
						if($system_constant->status==1)
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
						<td class="text-center">
							{{$i++}}
						</td>
						<td class="text-center">
							{{$system_constant->name_ar}}
						</td>
						<td class="text-center">
							{{$system_constant->type_name}}
						</td>
                        @can('status_system_constants')
						<td class="text-center">
							<a  color="{{$color}}" data-id="{{$system_constant->id}}" class="{{$class}} UpdateStats "  href="javaScript:;"> <span>{{$text}}</span> </a>
						</td>
						@endcan
						@can('update_system_constants')
						<td class="text-center">
							<a href="#" data-id="{{$system_constant->id}}" class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air
							updateDetails"> <i class="fa fa-edit"></i> </a>
						</td>
						@endcan
						@can('delete_system_constants')
						<td class="text-center"><a href="#" data-id="{{$system_constant->id}}" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air
							delete"> <i class="fa fa-trash"></i> </a>
						</td>
						@endcan

					</tr>
					@endforeach
				@else
				<tr class="m-datatable__row text-center"><td colspan="15">لا يوجد بيانات </td></tr>
				@endif
			</tbody>

	</table>
	<div style="text-align: center;">
			{!! $data['system_constants']->render() !!}
	</div>
</div>
