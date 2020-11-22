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
						@can('addexcel_contact')

                        <th class="text-center">تصدير إكسل</th>
						@endcan		

						@can('view_contact')
                        <th class="text-center">مشاهدة</th>
						@endcan		
						@can('reply_contact')
                        <th class="text-center">ارسال رد</th>
						@endcan	
                        <th class="text-center"> حذف  </th>
						
				</tr>
			</thead>
			<tbody class="m-datatable__body load">
				@php 
					$i =1;
				@endphp
				@if(count($data['message']) > 0)
					@foreach($data['message'] as $message)
					@php 
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
							{{$message->mobile}}
						</td>
						<td class="text-center">
							{{$message->created_at}}
						</td>
						<td class="text-center">
                            {{$title =  $message->response ?? '-'}}
						</td>
						@can('addexcel_contact')

						<td class="text-center">
							<a href="javascript:void(0);" style="color:#fff" class="addexcel btn btn-warning  m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air" data-id="{{ $message->id}}"><i class="fas fa-file-excel"></i></a>
						</td>
						@endcan		

						@can('view_contact')
						<td class="text-center">
                            <a href="javascript:void(0);" class="show_message btn btn-success  m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air" data-id="{{ $message->id}}"><i class="far fa-eye"></i></a>
                        </td>	
						@endcan		
						@can('reply_contact')
                        <td class="text-center">
                            <a href="javascript:void(0);" class="send_message  btn btn-accent m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air" data-id="{{ $message->id}}"><i class="fas fa-reply"></i></a>
                        </td>	
						@endcan	

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