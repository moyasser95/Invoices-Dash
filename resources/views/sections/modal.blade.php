   {{-- add --}}
   <div class="modal" id="modaldemo8">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">اضافة قسم</h6><button aria-label="Close" class="close" data-dismiss="modal"
                    type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('sections.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputEmail1">اسم القسم</label>
                        <input type="text" class="form-control" id="section_name" name="section_name">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">ملاحظات</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">تاكيد</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Basic modal -->


</div>
<!-- edit -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">تعديل القسم</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="sections/update" method="post" autocomplete="off">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" value="">
                        <label for="recipient-name" class="col-form-label">اسم القسم:</label>
                        <input class="form-control" name="section_name" id="section_name" type="text">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">ملاحظات:</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">تاكيد</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- delete -->
<div class="modal" id="modaldemo9">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">حذف القسم</h6><button aria-label="Close" class="close" data-dismiss="modal"
                    type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="sections/destroy" method="post">
                @method( 'DELETE' )
                @csrf
                <div class="modal-body">
                    <p>هل انت متاكد من عملية الحذف ؟</p><br>
                    <input type="hidden" name="id" id="id" value="">
                    <input class="form-control" name="section_name" id="section_name" type="text" readonly>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                    <button type="submit" class="btn btn-danger">تاكيد</button>
                </div>
        </div>
        </form>
    </div>
</div>
