@extends('admin.layout.master_layout')
@section('title')
   لوحة التحكم
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
										<a href="/admin/dashborad" class="m-nav__link">
											<span class="m-nav__link-text">الصفحة الرئيسية</span>
										</a>
									</li>
									
									<li class="m-nav__separator">-</li>
									<li class="m-nav__item">
										<a href="/admin/contact" class="m-nav__link">
											<span class="m-nav__link-text"> طلبات المشاريع</span>
										</a>
									</li>
								</ul>
							</div>

		<div class="m-demo__preview  m-demo__preview--btn">
              
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
    طلبات المشاريع</h3>
</div>
</div>
</div>
	<div class="m-portlet__body">
    <div class="form-group m-form__group row">
			<div class="col-md-3">
				<input type="text" name="user_name_seach"  class="form-control user_name_seach" placeholder="اسم المرسل">
            </div>
	</div>
	<div id="table-container">
        @include('admin.project_request.table-data')
	</div>

	</div>
</div>
</div>
</div>
</div>


@stop

@section('js')
<script type="text/javascript">
/****************************************************************************** */

$('.addexcel').on('click',function(e){
        var id = $(this).data('id');
        window.open('contact/export2/'+id,'_blank');
});
$('.btn_addexcel').on('click',function(e){
        window.open('contact/export','_blank');
});

$('.user_name_seach').on('input',function(e){
    name =  $('.user_name_seach').val();
    var url = $(this).attr('href');
    getData(url,name);
});

/***********************************************************************************************************************/
 
</script>

<script>
$(document).on('click', '.pagination a',function(event)
        {
            event.preventDefault();
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
            var url = $(this).attr('href');
            getData(url);
        });
  
    function getData(url,name) {
        $.ajax({
            url : url,
            data:{name:name}
        }).done(function (data) {
            $("#table-container").empty().html(data);
        });
    }
</script>
<script>


            

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

        url: "/admin/contact/delete/"+id,

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