<!-- Start Card Content -->
<div class="card-content">
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">التصنيف التابع لها</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <single-select :inputs="{{ $categories }}" forname="category_id"
                                   @if(isset($blog) && $blog->category) :oldvalues="{{ $blog->category()->get(['id', 'name']) }}" @endif>
                    </single-select>
                </div>
            </div>
        </div>
    </div>
    <hr />

    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">الوسوم</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <select-all :inputs="{{ $tags }}" forname="tags[]"
                        @if(isset($blog) && $blog->tags->isNotEmpty())
                            :oldvalues="{{ $blog->tags }}"
                        @endif>
                    </select-all>
                </div>
            </div>
        </div>
    </div>


<hr/>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">العنوان الرئيسي </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('main_title', null, ['class' => 'input' , 'required'] )!!}
                </div>
            </div>
        </div>
    </div>
    <hr />
      <div class="field is-horizontal">
          <div class="field-label is-normal">
              <label class="label required">وصف قصير  </label>
          </div>
          <div class="field-body">
              <div class="field">
                  <div class="control">
                      {!! Form::text('short_description', null, ['class' => 'input' , 'required'] )!!}
                  </div>
              </div>
          </div>
      </div>
      <hr />
      {{-- <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">العنوان الثانوي </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('second_title', null, ['class' => 'input' , 'required'] )!!}
                </div>
            </div>
        </div>
    </div>

    <hr /> --}}
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">وصف طويل  </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <ck-editor id="long_description" name="long_description" @if (isset($blog))
                        old-data="{{ $blog->long_description }}" @endif></ck-editor>
                </div>
            </div>
        </div>

    </div>

    <hr>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">صورة </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <uploader label="صورة" name="icon" @if (isset($blog))
                        file="{{ asset('images/blogs/' . $blog->icon) }}" @endif></uploader>
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
                    <uploader label="banner" name="banner"
                        @if (isset($blog)) file="{{ asset('images/blogs_banners/' . $blog->banner) }}" @endif
                        required
                        ></uploader>
                </div>
            </div>
        </div>
    </div>
    {{-- <hr />
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">الحالة</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="active" value="1" @if(isset($department) && $department->active) checked @else checked @endif>
                        مفعل
                    </label>
                    <label class="radio">
                        <input type="radio" name="active" value="0" @if(isset($department) && !$department->active) checked  @endif>
                        غير مفعل
                    </label>
                </div>
            </div>
        </div>
    </div> --}}
</div><!-- End Card Content -->
<!-- Start Card Footer -->
<div class="card-footer">
  <div class="buttons has-addons">
    <a class="button is-info" href="{{ route('admin.services.index') }}"> الغاء </a>
    <button type="submit" class="button is-success">حفظ</button>
  </div>
</div><!-- End Card Footer -->

