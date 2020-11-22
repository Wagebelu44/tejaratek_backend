<div class="table-responsive">
<table class="table table-bordered" id="html_table" width="100%">
			<thead class="m-datatable__head">
				<tr>
						<th class="text-center">#</th>
						<th class="text-center">العنوان</th>
						<th class="text-center">الرقم</th>
						@can('edit_page')
						<th class="text-center">تعديل</th>
						@endcan
						@can('delete_page')
						<th class="text-center">حذف</th>
						@endcan
				</tr>
			</thead>
			<tbody class="m-datatable__body load">
				@php 
					$i =1;
				@endphp
				@if(count($data['statistics']) > 0)
					@foreach($data['statistics'] as $statistics)
					<tr class="m-datatable__row">
						<td class="text-center">
							{{$i++}}
						</td>
						<td class="text-center">
							{{$statistics->name}}
						</td>
					
						<td class="text-center">
							{{$statistics->number}}
						</td>
						@can('edit_page')
						<td class="text-center">
						<a href="#" data-id="{{$statistics->id}}" class="btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air
                     	updateDetails"> <i class="fa fa-edit"></i> </a>
						</td>
						@endcan
						@can('delete_page')
						<td class="text-center"><a href="#" data-id="{{$statistics->id}}" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air
							delete"> <i class="fa fa-trash"></i> </a>
						</td>
						@endcan
					</tr>
					@endforeach
				@else
				<tr  class="m-datatable__row"><td colspan="10" class="text-center">لا يوجد بيانات </td></tr>
				@endif
			</tbody>
			<tbody class="m-datatable__body DataUsers">
		</tbody>
	</table>
	<div style="text-align: center;">
			{!! $data['statistics']->render() !!}
	</div>
</div>