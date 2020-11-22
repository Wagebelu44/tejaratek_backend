<div class="modal fade in" id="add_page" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"

     aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content">

            <form class="addNewpageForm" id="addNewpageForm" action="" method="post" enctype="multipart/form-data">

                @csrf

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">إضافة عميل جديد</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                                <div class="form-group m-form__group row">

                                        <div class="col-md-12">

                                            <label>اسم العميل<span class="required">*</span></label>

                                            <div class="form-valid">

                                                <input type="text" name="title" class="form-control title" placeholder="إسم العميل">

                                            </div>

                                        </div>

                                    </div>



                            

                <div class="form-group m-form__group row">

                        <div class="col-md-12">

                            <label>الشعار<span class="required"></span></label>

                            <div class="form-valid">

                                <input type="file" name="image" class="form-control image" id="image">

                            </div>

                        </div>

                    </div>

                    <div class="form-group m-form__group row">

                   
                         <div class="col-md-6">

                            <label>الرابط<span class="required"></span></label>

                            <div class="form-valid">

                                <input type="url" name="url" placeholder="الرابط" class="form-control url slug" id="slug">

                            </div>

                        </div>

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

                    <button  type="submit" class="btn btn-primary btn_save_page">حفظ</button>

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