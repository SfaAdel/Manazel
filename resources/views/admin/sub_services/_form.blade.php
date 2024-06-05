<!-- Start Card Content -->
<div class="card-content">

    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">الخدمة الرئيسية التابع لها</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="form-control">
                    <select id="service-select" name="service_id" class="form-control input">
                        <option value="" disabled selected>اختر خدمة</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}" {{ isset($subService) && $subService->service_id == $service->id ? 'selected' : '' }}>
                                {{ $service->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>


    <hr />


    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">اسم الخدمة  </label>
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
      <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">وصف طويل  </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('long_description', null, ['class' => 'input' , 'required'] )!!}
                </div>
            </div>
        </div>
    </div>
    <hr />
      <div class="field is-horizontal">
          <div class="field-label is-normal">
              <label class="label required">سعر الخدمة  </label>
          </div>
          <div class="field-body">
              <div class="field">
                  <div class="control">
                      {!! Form::number('price', null, ['class' => 'input' , 'required' , 'min' => 0] )!!}
                  </div>
              </div>
          </div>
      </div>
      <hr />
      {{-- <div class="field is-horizontal">
          <div class="field-label is-normal">
              <label class="label required">عدد مقدمين الخدمة  </label>
          </div>
          <div class="field-body">
              <div class="field">
                  <div class="control">
                      {!! Form::number('providers', null, ['class' => 'input' , 'required'] )!!}
                  </div>
              </div>
          </div>
      </div>
    <hr /> --}}
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">صورة </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <uploader label="صورة" name="icon" @if (isset($subService))
                        file="{{ asset('images/sub_services/' . $subService->icon) }}" @endif required></uploader>
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
                        <input type="radio" name="active" value="1" @if(isset($subService) && $subService->active) checked @else checked @endif>
                        مفعل
                    </label>
                    <label class="radio">
                        <input type="radio" name="active" value="0" @if(isset($subService) && !$subService->active) checked  @endif>
                        غير مفعل
                    </label>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Card Content -->
<!-- Start Card Footer -->
<div class="card-footer">
  <div class="buttons has-addons">
    <a class="button is-info" href="{{ route('admin.sub_services.index') }}"> الغاء </a>
    <button type="submit" class="button is-success">حفظ</button>
  </div>
</div><!-- End Card Footer -->


<!-- Include jQuery and Select2 initialization -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#service-select').select2({
            placeholder: 'ابحث عن خدمة',
            allowClear: true
        });
    });
</script>
