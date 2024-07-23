<!-- Start Card Content -->
<div class="card-content">

      <div class="field is-horizontal">
          <div class="field-label is-normal">
              <label class="label required">اسم التصنيف </label>
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
              <label class="label required">الوصف  </label>
          </div>
          <div class="field-body">
              <div class="field">
                  <div class="control">
                      {!! Form::text('description', null, ['class' => 'input' , 'required'] )!!}
                  </div>
              </div>
          </div>
      </div>
    <hr />
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">صورة </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <uploader label="صورة" name="icon" @if (isset($category))
                        file="{{ asset('images/categories/' . $category->icon) }}" @endif></uploader>
                </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">صورة البانر</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <uploader label="bannar" name="bannar"
                        @if (isset($category)) file="{{ asset('images/categories_bannars/' . $category->bannar) }}" @endif
                        required
                        ></uploader>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Card Content -->
<!-- Start Card Footer -->
<div class="card-footer">
  <div class="buttons has-addons">
    <a class="button is-info" href="{{ route('admin.categories.index') }}"> الغاء </a>
    <button type="submit" class="button is-success">حفظ</button>
  </div>
</div><!-- End Card Footer -->
