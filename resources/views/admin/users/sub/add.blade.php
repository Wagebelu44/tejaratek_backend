<div class="modal fade in" id="add_page" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="addNewpageForm" id="addNewpageForm" action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">اضافة مستخدم جديد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group m-form__group row">
                    <div class="col-md-12 mb-3">
                            <label>اسم بالكامل<span class="required">*</span></label>
                            <div class="form-valid">
                                <input type="text" name="fullname" class="form-control fullname" placeholder="اسم بالكامل">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>اسم المستخدم<span class="required">*</span></label>
                            <div class="form-valid">
                                <input type="text" name="name" class="form-control name" placeholder="اسم المستخدم">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>البريد الالكتروني</label>
                            <div class="form-valid">
                                <input type="email" name="email" class="form-control email" placeholder="البريد الالكتروني">
                            </div>
                        </div>
                   
                        <div class="col-md-12 mb-3">
                            <label>كلمة المرور<span class="required">*</span></label>
                            <div class="form-valid">
                                <input type="password" name="password" class="form-control password" placeholder="كلمة المرور">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>رقم الجوال<span class="required"></span></label>
                            <div class="form-valid">
                                <input type="text" name="mobile" class="form-control mobile" placeholder="رقم الجوال">
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <div class="col-md-12 mb-3">
                            <label> الحالة <span class="required"></span></label>
                            <div class="form-valid">
                                <input type="checkbox" value="on" name="activeValue" id="activeValue"
                                 data-on-color="success" class="make-switch status activeValue"
                                 data-size="normal" data-on-text="مفعل"
                                 data-off-text="معطل">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn_save_page">حفظ</button>
                    <button type="button" class="btn btn-secondary  " data-dismiss="modal">إخفاء</button>
                </div>
                <div id="loading">
                    <img id="loading-image" src="/admin/assets/ajax-loader.gif" alt="Loading..."/>
                </div>
                <input type="hidden" name="hidden" class="rowIdUpdate" value="0">
            </form>
        </div>
    </div>
</div>

<div class="modal fade in" id="changepassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="changepasswordform" id="changepasswordform" action="" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تغيير كلمة المرور</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group m-form__group row">
                        <div class="col-md-12">
                            <label>اسم المستخدم<span class="required"></span></label>
                            <div class="form-valid">
                                <input type="text" disabled class="form-control name" placeholder="اسم المستخدم">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>كلمة المرور<span class="required">*</span></label>
                            <div class="form-valid">
                                <input type="password" required name="password" class="form-control password" placeholder="كلمة المرور">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>تاكيد كلمة المرور<span class="required">*</span></label>
                            <div class="form-valid">
                                <input type="password" required name="confirmation_password" class="form-control confirm_password" placeholder="كلمة المرور">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn_save_password">حفظ</button>
                    <button type="button" class="btn btn-secondary  " data-dismiss="modal">إخفاء</button>
                </div>
                <div id="loading">
                    <img id="loading-image" src="/admin/assets/ajax-loader.gif" alt="Loading..."/>
                </div>
                <input type="hidden" name="hidden" class="userIdUpdate" value="0">
            </form>
        </div>
    </div>
</div>

<div class="modal fade in" id="permission_users" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="permission_users_form" id="permission_users_form" action="" method="post">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"> الصلاحيات </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group m-form__group row" id="permission-body">
                    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn_save_password">حفظ</button>
                    <button type="button" class="btn btn-secondary  " data-dismiss="modal">إخفاء</button>
                </div>
                <div id="loading">
                    <img id="loading-image" src="/admin/assets/ajax-loader.gif" alt="Loading..."/>
                </div>
                <input type="hidden" name="hidden" class="user_id" value="0">
            </form>
        </div>
    </div>
</div>