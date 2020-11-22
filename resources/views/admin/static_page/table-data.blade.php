<div class="table-responsive">

<table class="table table-bordered" id="html_table" width="100%">

			<thead class="m-datatable__head">

				<tr>

						<th class="text-center">#</th>

						<th class="text-center">العنوان</th>

						<th class="text-center">الصورة</th>

						<th class="text-center">الرابط</th>

						@can('status_page')

						<th class="text-center">الحالة</th>

						@endcan

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

				@if(count($data['static']) > 0)

					@foreach($data['static'] as $static)

					@php 

						if($static->status==1)

								{

								$class='btn btn-success m-btn m-btn--icon m-btn--pill';

								$color='green'; 

								$icon='check';

								$text = __('lang.active');

							}else{

								$class='btn btn-danger m-btn m-btn--icon m-btn--pill';

								$color='red';

								$icon='check';

								$text = __('lang.inactive');

							}

					@endphp

					<tr class="m-datatable__row">

						<td class="text-center">

							{{$i++}}

						</td>

						<td class="text-center">

							{{$static['title']}}

						</td>

						<td class="text-center">

							<img src="/uploads/{{$static->photo}}" width="150px" alt="">

						</td>

						<td class="text-center">

							{{$static->slug}}

						</td>

						@can('status_page')

						<td class="text-center">

						<a  color="{{$color}}" data-id="{{$static->id}}" class="{{$class}} UpdateStats "  href="javaScript:;">  <span>{{$text}}</span> </a>

						</td>

						@endcan

						@can('edit_page')

						<td class="text-center">

						<a href="#" data-id="{{$static->id}}" class="btn btn-warning m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air

                     	updateDetails"> <i class="fa fa-edit"></i> </a>

						</td>

						@endcan

						@can('delete_page')

						<td class="text-center"><a href="#" data-id="{{$static->id}}" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill m-btn--air

							delete"> <i class="fa fa-trash"></i> </a>

						</td>

						@endcan

					</tr>

					@endforeach

				@else

				<tr  class="m-datatable__row"><td colspan="10" class="text-center">لا يوجد  بيانات </td></tr>

				@endif

			</tbody>

			<tbody class="m-datatable__body DataUsers">

		</tbody>

	</table>

	<div style="text-align: center;">

			{!! $data['static']->render() !!}

	</div>

</div>