<div class="modal fade in" id="add_page" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="addNewpageForm" id="addNewpageForm" action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">اضافة رابط تواصل</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="form-group m-form__group row">
                    <div class="col-md-12">
                            <label>الرابط<span class="required"></span></label>
                            <div class="form-valid">
                                <input type="url" name="url" autocomplete="off" class="form-control url" id="url" placeholder="الرابط">
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                    <div class="col-md-12">
                            <label>نوع رابط التواصل<span class="required"></span></label>
                            <div class="form-valid">
                                <select name="social" class="form-control social input-sm ">
                                     <option value="fa-facebook-f" data-icon="fa-facebook icon-success">فيسبوك</option>
                                     <option value="fa-twitter" data-icon="fa-twitter icon-success">تويتر</option>
                                     <option value="fa-telegram" data-icon=" fa-telegram icon-success">تيلجرام</option>
                                    <option value="fa-skype" data-icon="fa-skype icon-success">سكايب</option>
                                    <option value="fa-linkedin-in" data-icon="fa-linkedin-in icon-success">لينكد ان</option>
                                     <option value="fa-youtube" data-icon="fa-youtube icon-success">يوتيوب</option>
                                     <option value="fa-instagram" data-icon="fa-instagram icon-instagram">انستغرام</option>
                                     <option value="fa-whatsapp" data-icon="fa-whatsapp icon-instagram">واتس آب</option>
                                     <option value="fa-rss" data-icon="fa-whatsapp icon-instagram">آر أس أس</option>
                                     <option value="fa-behance" data-icon="fa-behance icon-success">بي هانس</option>
                                     <option value="fa-snapchat-ghost" data-icon="fa-snapchat-ghost icon-success">سناب شات</option>

                                     
                                     
                                 </select> 
                            </div>
                        </div>
                    </div>

                    <div class="form-group m-form__group row">
                        <div class="col-md-12">
                            <label> الحالة <span class="required">*</span></label>
                            <div class="form-valid">
                                <input type="checkbox" name="activeValue" id="activeValue"
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
                <input type="hidden" name="hidden" class="rowIdUpdate" value="0">
                <div id="loading">
                    <img id="loading-image" src="/admin/assets/ajax-loader.gif" alt="Loading..."/>
                </div>
            </form>
        </div>
    </div>
</div>