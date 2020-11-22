<div class="modal fade in" id="add_page" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form class="addNewpageForm" id="addNewpageForm" action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">اضافة صفحة جديدة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group m-form__group row">
                        <div class="col-md-12">
                            <label>العنوان<span class="required">*</span></label>
                            <div class="form-valid">
                                <input type="text" name="name" class="form-control name" placeholder="العنوان">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label>الرقم<span class="required">*</span></label>
                            <div class="form-valid">
                                <input type="text" name="number" class="form-control number" placeholder="الرقم">
                            </div>
                        </div>
                      
                    </div>
                </div>
                <div class="modal-footer">
                    <button  type="submit" class="btn btn-primary btn_save_page">حفظ</button>
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