@extends('admin.layout.master_layout')
@section('title')
   لوحة التحكم
@stop
@section('css')
    <style>
            .hide{
                display:none;
            }
            .img-profile,#img-selected{
                width: 140px;
                background: #ddd;
                height: 140px;
                border-radius: 50%;
            }
            .input-file{
                visibility: hidden;
            }
            .input-file-trigger{
                position: absolute;
                top: 45%;
            }
            .form-submit{
                position: absolute;
                top: 45%;
            }
            .photo{
                text-align:center;
            }
    </style>
@endsection
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
										<a href="{{ route('admin.dashboard.view') }}" class="m-nav__link">
											<span class="m-nav__link-text">الرئيسية</span>
										</a>
									</li>
									
									<li class="m-nav__separator">-</li>
									<li class="m-nav__item">
										<a href="/admin/setting" class="m-nav__link">
											<span class="m-nav__link-text">الإعدادات العامة</span>
										</a>
									</li>
								</ul>
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
الإعدادات العامة
</h3>
</div>
</div>
</div>
	<div class="m-portlet__body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
            @can('setting')
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">إعدادات العامة</a>
            </li>
            @endcan
     
            </ul>
            <div class="tab-content" id="myTabContent">
            @can('setting')
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                <form class="settingForm" id="settingForm" action="" method="post">
                    @csrf
            
                    <div class="form-group m-form__group row">
                            <div class="col-md-4">
                                <label>أسم الموقع <span class="required">*</span></label>
                                <div class="form-valid">
                                    <input type="text" name="title_ar" value="{{$title = $data['setting']->name_ar ?? ''}}" class="form-control name_ar" placeholder="عنوان الموقع">
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <label>البريد الالكتروني<span class="required">*</span></label>
                                <div class="form-valid">
                                    <input type="email" name="email" value="{{$title = $data['setting']->email ?? ''}}" class="form-control email" placeholder="البريد الالكتروني">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label>الجوال <span class="required">*</span></label>
                                <div class="form-valid">
                                    <input type="text" value="{{$title = $data['setting']->mobile ?? ''}}" name="mobile" class="form-control mobile" placeholder="الجوال ">
                                </div>
                            </div>
                          
                            <div class="col-md-4">
                                <label>الموقع<span class="required">*</span></label>
                                <div class="form-valid">
                                    <input type="text" name="locationn" value="{{$title = $data['setting']->location ?? ''}}" class="form-control locationn" placeholder=" الموقع ">
                                </div>
                            </div>
                           
                    </div>
                    <div class="form-group m-form__group row">
                        <div class="col-md-12 col-lg-12">
                          <label for="">وصف الموقع</label>

                            <textarea name="description" class="description form-control" id="" cols="30" rows="5">{{$title = $data['setting']->description ?? ''}}</textarea>
                        </div>
                      
                    </div>
                   
                    <div class="modal-footer">
                        @can('update_setting')
                        <button type="submit" class="btn btn-primary btn_save_page">حفظ</button>
                        @endcan
                    </div>
                </form>
            
            </div>
            @endcan
            <!-- ////////////////////////////////// END TAB ////////////////////////////////// -->
        </div>
      
	</div>
</div>
</div>
</div>
</div>
</div>
@stop
@section('js')

<script>
            $('#settingForm').on('submit', function(e){
            e.preventDefault();
            var formData = new FormData(this);
                $.ajax({
                    url: '/admin/setting/update',
                    dataType:'json',
                    type: 'POST',
                    delay:250,
                    data: formData,
                    async: false,
                    success: function (data) {
                        if (data["status"] == true) {
                                Swal.fire(
                                data['message'],
                                '',
                                'success'
                                );
                        }else {
                            Swal.fire({
                                type: 'error',
                                title: 'عذرا',
                                text: data['message']
                            })
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            });
</script>

@stop