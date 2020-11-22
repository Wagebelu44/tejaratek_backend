@extends('admin.layout.master_layout')

@section('title')

    {{__('lang.control_panel')}}

@stop



@section('page-content')

<!-- <div class="m-subheader-search">

		<span class="m-subheader-search__desc">

		<div class="mr-auto">

</div>

</span>

					</div> -->

					<div class="m-subheader ">

						<div class="d-flex align-items-center">

							<div class="mr-auto">

								

								<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">

									<li class="m-nav__item m-nav__item--home">

										<a href="#" class="m-nav__link m-nav__link--icon">

											<i class="m-nav__link-icon la la-home"></i>

										</a>

									</li>

									<li class="m-nav__item">

										<a href="/admin/dashboard" class="m-nav__link">

											<span class="m-nav__link-text">الرئيسية</span>

										</a>

									</li>

									

									<li class="m-nav__separator">-</li>

									<li class="m-nav__item">

										<a href="/admin/products" class="m-nav__link">

											<span class="m-nav__link-text">منتجاتنا</span>

										</a>

									</li>

								</ul>

							</div>



		<div class="m-demo__preview  m-demo__preview--btn">

                @can('add_products')

				<button type="button"  data-toggle="modal" data-target="#add_page" class="btn btn-danger m-btn m-btn--custom btnAddCustomer" style="line-height: 15px;

    			padding-bottom: 15px;"><i class="fa fa-plus"></i>إضافة منتج جديد</button>

                @endcan

		</div>

	

	<div>



</div>

</div>

</div>



<div class="m-grid__item m-grid__item--fluid m-wrapper">

<!-- BEGIN: Subheader -->

<!-- END: Subheader -->

<div class="m-content">

<div class="row">

<div class="col-lg-12">

<!--begin::Portlet-->

<div class="m-portlet m-portlet--mobile" id="m_blockui_2_portlet">

	<div class="m-portlet__head">

<div class="m-portlet__head-caption">

<div class="m-portlet__head-title">

<h3 class="m-portlet__head-text">

	منتجاتنا

</h3>

</div>

</div>

</div>

	<div class="m-portlet__body">

	<div id="table-container">

        @include('admin.products.table-data')

	</div>



	</div>

</div>

</div>

</div>

</div>

</div>



@include('admin.products.sub.add')

@stop



@section('js')

<script type="text/javascript">



$('#activeValue').bootstrapSwitch('state', false, true);





function CKupdate(){

	for ( instance in CKEDITOR.instances )

		CKEDITOR.instances[instance].updateElement();

}



/***********************************************************************************************************************/

        $('body').on('click','.UpdateStats',function(){

            $(this).addClass('disabled');

            $('.loadImg').removeClass('hidden');

            // $('.loadMSG').html('جاري تحديث الحالة');

            var thisTag = $(this);

            var id = $(this).data('id');

			$.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });

            $.ajax({

            	url: "/admin/products/UpdateStats",

                type: "POST",

                dataType: "JSON",

                data:{id:id},

                success: function(data) {

                    if(data["status"] == true){

						var url = $(this).attr('href');

						getData(url);

						window.history.pushState("", "", url); 

                    }

                },

                complete:function(){

                    $(thisTag).removeClass('disabled');

                    $('.loadImg').addClass('hidden');

                }

            });

            

        });

</script>



<script>

$(document).on('click', '.pagination a',function(event)

        {

            event.preventDefault();

            $('li').removeClass('active');

            $(this).parent('li').addClass('active');

            var url = $(this).attr('href');

            getData(url);

            window.history.pushState("", "", url);

        });

  

    function getData(url) {

        $.ajax({

            url : url

        }).done(function (data) {

            $("#table-container").empty().html(data);

        });

    }

</script>

<script type="text/javascript">

    $(document).ready(function () {

        

CKEDITOR.replace('details');

        /*************************************************/

        $(document).on('click', '.btnAddCustomer', function () {

            $('.modal-title').html('إضافة منتج جديد');

			$('#addNewpageForm').find(".title").val('');

			CKEDITOR.instances['details'].setData('');

			$('#addNewpageForm').find(".title").val('');

			// $('#addNewpageForm').find(".slug").val('');

			$('#addNewpageForm').find(".image").val('');

            // $('#addNewpageForm').find('.partner_id').val('');

            $('#addNewpageForm').find('.rowIdUpdate').val(0);

            $('.terms_all').prop('checked',false);


        });

        

        /*************************************************/

        $(document).on('click', '.updateDetails', function () {

			$('#addNewpageForm').find('.rowIdUpdate').val(0);

            var id = $(this).data('id');

            $('.rowIdUpdate').val(id);

            $.ajax({

                url: "/admin/products/edit",

                type: "get",

                dataType: "JSON",

                data: {

                    id: id

                },

                success: function(data){

					if(data['status'] == true){

						$(".title").val(data['data']['title']);
                        // all_terms
                        // $('#addNewpageForm').find('.partner_id').val(data['data']['partner_id']);

						CKEDITOR.instances['details'].setData(data['data']['details']);

						if(data['data']['status'] == 1){

							$('#activeValue').bootstrapSwitch('state', true, true);

						}else{

							$('#activeValue').bootstrapSwitch('state', false, true);

						}

					}

                },

                complete: function () {

                    $('#add_page').modal('show');

                },

                error: function (jqXHR, textStatus, errorThrown) {

                    swal({title: '{{__('lang.update_fail')}}', type: "error"});

                }

            });



            $('.modal-title').html('{{__('lang.edit_data')}}');

            $('.btn_save_user').html('{{__('lang.edit')}}');



        });

        /*************************************************/

        $('.addNewpageForm').on('submit', function(e){

            e.preventDefault();

            $('#loading').show();

			var formData = new FormData(this);

            $('.loader_add_user').css('display', 'initial');

            setTimeout(function () {

                $('.btn_save_customer').removeClass('disabled');

                $('.loader_add_user').css('display', 'none');

            }, 30000);

            var id = $(".rowIdUpdate").val();

            if (id == 0) {

                $.ajax({

                    url: "/admin/products/add",

                    type: "post",

					cache:false,

					contentType: false,

					processData: false,

                    data: formData,

                    success: function (data) {

                        $('#loading').hide();

                        if (data["status"] == true) {

                            swal({

                                title: "",

                                text: "{{__('lang.save_success')}}",

                                type: "success",

                                showCancelButton: false,

                                confirmButtonColor: "#DD6B55",

                                confirmButtonText: "{{__('lang.ok')}}",

                                cancelButtonText: "{{__('lang.cancel')}}",

                                closeOnConfirm: true,

                                closeOnCancel: true

                            });

                            var url = $(this).attr('href');

                            getData(url);

                            // window.history.pushState("", "", url); 

                            $('#addNewpageForm').find(".title").val('');

                            $('#addNewpageForm').find(".details").val('');

                            $('#addNewpageForm').find(".status").val('');

							// $('#addNewpageForm').find(".slug").val('');

                            $('#addNewpageForm').find(".image").val('');

                            // $('#addNewpageForm').find('.partner_id').val('');

                            $("#add_page").modal("hide");

                        } else {

                            var errorMessage = "";

                            for (const error in data["data"]) {

                                if (data["data"].hasOwnProperty(error)) {

                                    errorMessage += '<p>'+data["data"][error]+'</p>';

                                }

                            }

                            swal({

                                title: "",

                                html: errorMessage,

                                type: "error",

                                showCancelButton: false,

                                confirmButtonColor: "#DD6B55",

                                confirmButtonText: "{{__('lang.ok')}}",

                                cancelButtonText: "{{__('lang.cancel')}}",

                                closeOnConfirm: true,

                                closeOnCancel: true

                            });



                        }

                    }

                });

            } else {

				$.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

					}

				});

                $.ajax({

                    url: "/admin/products/update",

                    type: "POST",

                    dataType: "JSON",

					cache:false,

					contentType: false,

					processData: false,

                    data: formData,

                    success: function (data) {

                        $('#loading').hide();

                        if (data["status"] == true) {

                            swal({

                                title: "",

                                text: "{{__('lang.update_success')}}",

                                type: "success",

                                showCancelButton: false,

                                confirmButtonColor: "#DD6B55",

                                confirmButtonText: "{{__('lang.ok')}}",

                                cancelButtonText: "{{__('lang.cancel')}}",

                                closeOnConfirm: true,

                                closeOnCancel: true

                            });

                            $('#addNewpageForm').find(".title").val('');

							$('#addNewpageForm').find(".details").val('');

                            $('#addNewpageForm').find(".status").val('');

                            $('#addNewpageForm').find(".image").val('');

							// $('#addNewpageForm').find(".slug").val('');

                            // $('#addNewpageForm').find('.partner_id').val('');

							$('#addNewpageForm').find('.rowIdUpdate').val(0);

                            $("#add_page").modal("hide");

                            var url = $(this).attr('href');

                            getData(url);

                            // window.history.pushState("", "", url); 

                        } else {

                            var errorMessage = "";

                            

                            for (const error in data["data"]) {

                                if (data["data"].hasOwnProperty(error)) {

                                    errorMessage += '<p>'+data["data"][error]+'</p>';

                                }

                            }

                            swal({

                                title: "",

                                html:errorMessage ,

                                type: "error",

                                showCancelButton: false,

                                confirmButtonColor: "#DD6B55",

                                confirmButtonText: "{{__('lang.ok')}}",

                                cancelButtonText: "{{__('lang.cancel')}}",

                                closeOnConfirm: true,

                                closeOnCancel: true

                            });



                        }

                    }

                });

            }

//	}

        });

        /****************************************************/

    });



	$(document).on('click','.delete',function(e){

		var id = $(this).data('id');

		Swal.fire({

				title: "{{__('lang.are_you_sure')}}",

				text: "",

				type: 'warning',

				showCancelButton: true,

				confirmButtonColor: '#3085d6',

				cancelButtonColor: '#d33',

				confirmButtonText: '{{__('lang.ok')}}',

				cancelButtonText: "{{__('lang.cancel')}}",

			}).then((result) => {

				if (result.value) {

				$.ajaxSetup({

					headers: {

						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

					}

				});

				$.ajax({

                url: "/admin/products/delete",

                type: "post",

                dataType: "JSON",

                data: {

                    id: id

                },

                success: function(data){

					if(data['status'] == true){

						Swal.fire(

                            "{{__('lang.delete_success')}}",

						'',

						'success'

						)

						var url = $(this).attr('href');

						getData(url);

						window.history.pushState("", "", url); 

					}else{

						swal({

                                title: "",

                                text: "{{__('lang.delete_fail')}}",

                                type: "error",

                                showCancelButton: false,

                                confirmButtonColor: "#DD6B55",

                                confirmButtonText: "{{__('lang.ok')}}",

                                cancelButtonText: "{{__('lang.cancel')}}",

                                closeOnConfirm: true,

                                closeOnCancel: true

                            });

					}

                },

            });

				}

			})

	});

</script>

@stop