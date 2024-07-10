<!-- Start Card Content -->
<div class="card-content">
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">العنوان </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('title', null, ['class' => 'input' , 'required'] )!!}
                </div>
            </div>
        </div>
    </div>
    <hr />
      <div class="field is-horizontal">
          <div class="field-label is-normal">
              <label class="label required">القيمة  </label>
          </div>
          <div class="field-body">
              <div class="field">
                  <div class="control">
                      {!! Form::number('number', null, ['class' => 'input' , 'required' , 'min'=>0] )!!}
                  </div>
              </div>
          </div>
      </div>
    <hr />
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">الصورة </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <uploader label="صورة" name="icon" @if (isset($counter))
                        file="{{ asset('images/counters/' . $counter->icon) }}" @endif></uploader>
                </div>
            </div>
        </div>
    </div>

</div><!-- End Card Content -->
<!-- Start Card Footer -->
<div class="card-footer">
  <div class="buttons has-addons">
    <a class="button is-info" href="{{ route('admin.counters.index') }}"> الغاء </a>
    <button type="submit" class="button is-success">حفظ</button>
  </div>
</div><!-- End Card Footer -->
