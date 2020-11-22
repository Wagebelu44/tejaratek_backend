<div class="modal fade in" id="add_page" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"

     aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content">

            <form class="addNewpageForm" id="addNewpageForm" action="" method="post" enctype="multipart/form-data">

                @csrf

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">إضافة سلايدر جديد</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                                <div class="form-group m-form__group row">

                                        <div class="col-md-12">

                                            <label>العنوان<span class="required">*</span></label>

                                            <div class="form-valid">

                                                <input type="text" name="title" class="form-control title" placeholder="العنوان">

                                            </div>

                                        </div>

                                </div>



                                <div class="form-group m-form__group row">

                                    <div class="col-md-12">

                                        <label for="recipient-name" class="form-control-label">التفاصيل<span

                                                    class="required">*</span></label>

                                        <div class="form-valid">

                                            <textarea  name="details" class="form-control details ckeditor" placeholder="التفاصيل" cols="30" rows="5"></textarea>

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

                    <div class="form-group m-form__group row">
                        
                        <div class="col-md-6">

                            <label> الحالة <span class="required">*</span></label>

                            <div class="form-valid">

                                <input type="checkbox" name="status" id="activeValue"

                                 data-on-color="success" class="make-switch status"

                                 value="1"

                                 data-size="normal" data-on-text="مفعل"

                                 data-off-text="غير مفعل">

                            </div>

                        </div>
                     

                    </div> 

                

                    

                </div>

                <div class="modal-footer">

                    <button onClick="CKupdate();" type="submit" class="btn btn-primary btn_save_page">حفظ</button>

                    <button type="button" class="btn btn-secondary  " data-dismiss="modal">إلغاء</button>

                </div>

                <input type="hidden" name="hidden" class="rowIdUpdate" value="0">

                <div id="loading">

                    <img id="loading-image" src="/admin/assets/ajax-loader.gif" alt="Loading..."/>

                </div>

            </form>

        </div>

    </div>

</div>