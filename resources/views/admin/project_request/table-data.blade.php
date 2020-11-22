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
				@php 
					$i =1;
				@endphp
				@if(count($data['message']) > 0)
					@foreach($data['message'] as $message)
					@php 
						
					@endphp
					<tr class="m-datatable__row" @if($message->read_at == "") style="background-color: #ed335a40;" @endif>
						<td class="text-center">
							{{$i++}}
						</td>
						<td class="text-center">
							{{ $message->name}}
						</td>
						<td class="text-center">
							{{ $message->email}}
						</td>
						<td class="text-center">
							{{$message->name_project}}
						</td>
						<td class="text-center">
							{{$message->details}}
						</td>
						<td class="text-center">
							{{$message->amount}}
						</td>
						<td class="text-center">
							@if($message->curr)
							{{$message->curr->name_ar}}
							@endif
						</td>
						<td class="text-center">
							{{$message->created_at}}
						</td>
						

						<td class="text-center">
							<a href="#" data-id="{{$message->id}}" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air	delete"> <i class="fa fa-trash"></i> </a>
						</td>
	
					</tr>
					@endforeach
				@else
				<tr class="m-datatable__row"><td class="text-center" colspan="10">لا يوجد بيانات </td></tr>
				@endif
			</tbody>
			<tbody class="m-datatable__body DataUsers">
		</tbody>
	</table>
	<div style="text-align: center;">
			{!! $data['message']->render() !!}
	</div>
</div>