<div class="modal fade in" id="add_page" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"

     aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content">

            <form class="addNewpageForm" id="addNewpageForm" action="" method="post" enctype="multipart/form-data">

                @csrf

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">إضافة صفحة ثابته</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                      

                           

                                <div class="form-group m-form__group row">

                                    <div class="col-md-12">

                                        <label> العنوان <span class="required">*</span> </label>

                                        <div class="form-valid">

                                            <input type="text" name="title" class="form-control title" placeholder="العنوان">

                                        </div>

                                    </div>

                                </div>

                                <div class="form-group m-form__group row">



                                    <div class="col-md-12">

                                        <label> التفاصيل <span class="required">*</span> </label>

                                        <div class="form-valid">

                                            <textarea name="details" class="form-control details" placeholder="التفاصيل" cols="30" rows="5"></textarea>

                                        </div>

                                    </div>

                                </div>

                    <div class="form-group m-form__group row">

                        

                      

                    </div>

                    <div class="form-group m-form__group row">

                        <div class="col-md-12">

                            <label>الرابط<span class="required">*</span></label>

                            <div class="form-valid">

                                <input type="text" name="slug" class="form-control slug" placeholder="الرابط">

                            </div>

                        </div>

                        <div class="col-md-12">

                            <label> الحالة <span class="required">*</span></label>

                            <div class="form-valid">

                                <input type="checkbox" name="activeValue" id="activeValue"

                                 data-on-color="success" class="make-switch status activeValue"

                                 data-size="normal" data-on-text="مفعل"

                                 data-off-text="غير مفعل">

                            </div>

                        </div>

                    </div>



                    <div class="form-group m-form__group row">

                        <div class="col-md-12">

                            <label>الصورة<span class="required"></span></label>

                            <div class="form-valid">

                                <input type="file" name="image" class="form-control image" id="image">

                            </div>

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button onClick="CKupdate();$('#addNewpageForm').ajaxSubmit();" type="submit" class="btn btn-primary btn_save_page">حفظ</button>

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