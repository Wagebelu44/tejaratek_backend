@extends('admin.layout.master_layout')

@section('title')

   لوحة التحكم

@stop



@section('page-content')


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

										<a href="/admin/dashborad" class="m-nav__link">

											<span class="m-nav__link-text">الرئيسية</span>

										</a>

									</li>

									

									<li class="m-nav__separator">-</li>

									<li class="m-nav__item">

										<a href="/admin/slider" class="m-nav__link">

											<span class="m-nav__link-text">سلايدر</span>

										</a>

									</li>

								</ul>

							</div>



		<div class="m-demo__preview  m-demo__preview--btn">

                @can('add_slider')

				<button type="button"  data-toggle="modal" data-target="#add_page" class="btn btn-danger m-btn m-btn--custom btnAddCustomer" style="line-height: 15px;

    			padding-bottom: 15px;"><i class="fa fa-plus"></i> إضافة سلايدر جديد</button>

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

سلايدر

</h3>

</div>

</div>

</div>

	<div class="m-portlet__body">

	<div id="table-container">

        @include('admin.slider.table-data')

	</div>



	</div>

</div>

</div>

</div>

</div>

</div>



@include('admin.slider.sub.add')

@stop



@section('js')

<script type="text/javascript">



$('#activeValue').bootstrapSwitch('state', false, true);



function CKupdate(){

	for ( instance in CKEDITOR.instances )

		CKEDITOR.instances[instance].updateElement();

}





$(document).on('click',".m_blockui_2_3",function() {

    mApp.block("#m_blockui_2_portlet", {

        overlayColor: "#000000",

        type: "loader",

        state: "success",

        size: "lg"

    }), setTimeout(function() {

        mApp.unblock("#m_blockui_2_portlet")

    }, 2e3);

});

/***********************************************************************************************************************/

        $('body').on('click','.UpdateStats',function(){

            $(this).addClass('disabled');

            $('.loadImg').removeClass('hidden');

            $('.loadMSG').html('جاري تحديث الحالة');

            var thisTag = $(this);

            var id = $(this).data('id');

			$.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });

            $('#load').show();

            $.ajax({

            	url: "/admin/slider/UpdateStats",

                type: "POST",

                dataType: "JSON",

                data:{id:id},

                success: function(data) {

                    $('#load').hide();

                    if(data["status"] == true){

						var url = $(this).attr('href');

						getData(url);

						window.history.pushState("", "", url); 

                    }

                }

            });

            $(thisTag).removeClass('disabled');

            $('.loadImg').addClass('hidden');

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

        /*************************************************/

        $(document).on('click', '.btnAddCustomer', function () {

			$('#addNewpageForm').find(".title").val('');

			CKEDITOR.instances['details'].setData('');

			$('#addNewpageForm').find(".status").val('');

            $('#addNewpageForm').find(".photo").val('');

            $('#addNewpageForm').find(".url").val('');

            $('#addNewpageForm').find(".order_no").val('');

            $('#addNewpageForm').find(".name_button").val('');
            
            $('.modal-title').html('إضافة سلايدر جديد');

            $('#addNewpageForm').find('.rowIdUpdate').val(0);

        });

        

        /*************************************************/

        $(document).on('click', '.updateDetails', function () {

			$('#addNewpageForm').find('.rowIdUpdate').val(0);

            var id = $(this).data('id');

            $('.rowIdUpdate').val(id);

            $.ajax({

                url: "/admin/slider/edit",

                type: "get",

                dataType: "JSON",

                data: {

                    id: id

                },

                success: function(data){

					if(data['status'] == true){

						if(data['data']['status'] == 1){

							$('#activeValue').bootstrapSwitch('state', true, true);

						}else{

							$('#activeValue').bootstrapSwitch('state', false, true);

                        }



                        $(".title").val(data['data']['title']);


                        CKEDITOR.instances['details'].setData(data['data']['details']);





					}

                },

                complete: function () {

                    $('#add_page').modal('show');

                },

                error: function (jqXHR, textStatus, errorThrown) {

                    swal({title: 'حدث خطأ غير معروف، الرجاء المحاولة فيما بعد', type: "error"});

                }

            });

            $('.modal-title').html('تعديل البيانات');



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

                    url: "/admin/slider/add",

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

                                text: 'تمت العملية بنجاح',

                                type: "success",

                                showCancelButton: false,

                                confirmButtonColor: "#DD6B55",

                                confirmButtonText: 'حسنا',

                                cancelButtonText: 'إلغاء',

                                closeOnConfirm: true,

                                closeOnCancel: true

                            });

                            $('#addNewpageForm').find(".order_no").val('');

                            $('#addNewpageForm').find(".title").val('');

                            CKEDITOR.instances['details'].setData('');

                            $('#addNewpageForm').find(".status").val('');

                            $('#addNewpageForm').find(".photo").val('');

                            $('#addNewpageForm').find(".url").val('');

                            $('#addNewpageForm').find(".name_button").val('');

                            $('#addNewpageForm').find('.rowIdUpdate').val(0);

                            $('#add_page').modal('hide');

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

                                html: errorMessage,

                                type: "error",

                                showCancelButton: false,

                                confirmButtonColor: "#DD6B55",

                                confirmButtonText: 'حسنا',

                                cancelButtonText: 'إلغاء',

                                closeOnConfirm: true,

                                closeOnCancel: true

                            });

                           
                         

                        }
                        if (data["statuss"] == false) {

                            swal({

                                        title: "",

                                        text: data['data'],

                                        type: "error",

                                        showCancelButton: false,

                                        confirmButtonColor: "#DD6B55",

                                        confirmButtonText: 'حسنا',

                                        cancelButtonText: 'إلغاء',

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

                $('#loading').show();

                $.ajax({

                    url: "/admin/slider/update",

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

                                text: 'تمت العملية بنجاح',

                                type: "success",

                                showCancelButton: false,

                                confirmButtonColor: "#DD6B55",

                                confirmButtonText: 'حسنا',

                                cancelButtonText: 'إلغاء',

                                closeOnConfirm: true,

                                closeOnCancel: true

                            });

                            $('#addNewpageForm').find(".title").val('');

                            CKEDITOR.instances['details'].setData('');

                            $('#addNewpageForm').find(".status").val('');

                            $('#addNewpageForm').find(".photo").val('');
                            $('#addNewpageForm').find('.rowIdUpdate').val(0);

                            $("#add_page").modal('hide');

                            var url = $(this).attr('href');

                            getData(url);

                        } else {

                            var errorMessage = "";

                            for (const error in data["data"]) {

                                if (data["data"].hasOwnProperty(error)) {

                                    errorMessage += '<p>'+data["data"][error]+'</p>';

                                }

                            }

                            swal({

                                title: "",

                                text: errorMessage,

                                type: "error",

                                showCancelButton: false,

                                confirmButtonColor: "#DD6B55",

                                confirmButtonText: 'حسنا',

                                cancelButtonText: 'إلغاء',

                                closeOnConfirm: true,

                                closeOnCancel: true

                            });



                        }

                    }

                });

            }

        });

        /****************************************************/

    });



	$(document).on('click','.delete',function(e){

		var id = $(this).data('id');

		Swal.fire({

				title: 'هل أنت متاكد من ذلك',

				text: "",

				type: 'warning',

				showCancelButton: true,

				confirmButtonColor: '#3085d6',

				cancelButtonColor: '#d33',

				confirmButtonText: "حسنا",

				cancelButtonText: "إلغاء",

			}).then((result) => {

				if (result.value) {

				$.ajaxSetup({

					headers: {

						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

					}

				});

				$.ajax({

                url: "/admin/slider/delete/"+id,

                type: "post",

                dataType: "JSON",

                success: function(data){

					if(data['status'] == true){

						Swal.fire(

                        data["data"],

						'',

						'success'

						)

						var url = $(this).attr('href');

						getData(url);

						window.history.pushState("", "", url); 

					}else{

						swal({

                                title: "",

                                text: "فشلت عملية الحذف ",

                                type: "error",

                                showCancelButton: false,

                                confirmButtonColor: "#DD6B55",

                                confirmButtonText: 'حسنا',

                                cancelButtonText: 'إلغاء',

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