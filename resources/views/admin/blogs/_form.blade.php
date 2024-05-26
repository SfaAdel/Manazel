<!-- Start Card Content -->
<div class="card-content">
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">اختيار الكلية</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <select-all :inputs="{{ $collages }}" forname="collages[]"
                                   @if(isset($service) && $service->collages) :oldvalues="{{ $service->collages() }}" @endif>
                    </select-all>
                </div>
            </div>
        </div>
    </div>
    <hr />
      <div class="field is-horizontal">
          <div class="field-label is-normal">
              <label class="label required">اسم الخدمة </label>
          </div>
          <div class="field-body">
              <div class="field">
                  <div class="control">
                      {!! Form::text('name', null, ['class' => 'input' , 'required'] )!!}
                  </div>
              </div>
          </div>
      </div>
<!--        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">اختيار الخدمة الرئيسية </label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <div class="select is-fullwidth">
                            {!! Form::select('parent_id', $services, null, ['placeholder' => 'اختيار الخدمة الرئيسية']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
    <hr />
    <service-type @if(isset($service)) old-type="{{ $service->type }}" @endif
    @if(isset($service) && $service->type == 'link') old-link="{{ $service->link }}" @endif></service-type>
    <hr />
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">الترتيب</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::number('priority', isset($service) ? $service->priority : \App\Models\Service::count()+1, ['class' => 'input', 'min' => 1] )!!}
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
                        <input type="radio" name="active" value="1" @if(isset($service) && $service->active) checked @else checked @endif>
                        مفعلة
                    </label>
                    <label class="radio">
                        <input type="radio" name="active" value="0" @if(isset($service) && !$service->active) checked  @endif>
                        غير مفعلة
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
