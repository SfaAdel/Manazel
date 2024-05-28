<!-- Start Card Content -->
<div class="card-content">

    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">الاسم </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('name', null, ['class' => 'input' , 'required'] )!!}
                </div>
            </div>
        </div>
    </div>
    <hr />
      <div class="field is-horizontal">
          <div class="field-label is-normal">
              <label class="label required">رقم الهاتف  </label>
          </div>
          <div class="field-body">
              <div class="field">
                  <div class="control">
                      {!! Form::tel('phone', null, ['class' => 'input' , 'required'] )!!}
                  </div>
              </div>
          </div>
      </div>
    <hr />
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">التصنيف التابع له</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <single-select :inputs="{{ $categories }}" forname="category_id"
                                   @if(isset($provider) && $provider->category) :oldvalues="{{ $provider->category()->get(['id', 'name']) }}" @endif>
                    </single-select>
                </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">الحالة</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="status" value="1" @if(isset($department) && $department->active) checked @else checked @endif>
متاح
                    </label>
                    <label class="radio">
                        <input type="radio" name="active" value="0" @if(isset($department) && !$department->active) checked  @endif>
                        غير متاح
                    </label>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Card Content -->
<!-- Start Card Footer -->
<div class="card-footer">
  <div class="buttons has-addons">
    <a class="button is-info" href="{{ route('admin.services.index') }}"> الغاء </a>
    <button type="submit" class="button is-success">حفظ</button>
  </div>
</div><!-- End Card Footer -->
