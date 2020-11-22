<div class="modal fade in" id="add_page" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="addNewpageForm" id="addNewpageForm" action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">اضافة ثابت جديد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group m-form__group row">
                        <div class="col-md-12">
                            <label>الاسم<span class="required">*</span></label>
                            <div class="form-valid">
                                <input type="text" name="name" class="form-control name" placeholder="الاسم">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>النوع<span class="required">*</span></label>
                            <div class="form-valid">
                                <select name="type" class="form-control type_constant" id="">
                                    <option value="">اختر النوع</option>
                                    @foreach($data['add_constant'] as $constant)
                                        <option value="{{$constant->type}}">{{$constant->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group row status_season">
                        <div class="col-md-12">
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
                <input type="hidden" name="hidden" class="rowIdUpdate" value="0">
            </form>
        </div>
    </div>
</div>