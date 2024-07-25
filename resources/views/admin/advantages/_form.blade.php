<!-- Start Card Content -->
<div class="card-content">
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">الميزة الجديدة </label>
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
            <label class="label required">صورة </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <uploader label="صورة" name="icon" @if (isset($team))
                        file="{{ asset('images/advantages/' . $advantage->icon) }}" @endif></uploader>
                </div>
            </div>
        </div>
    </div>

</div><!-- End Card Content -->
<!-- Start Card Footer -->
<div class="card-footer">
  <div class="buttons has-addons">
    <a class="button is-info" href="{{ route('admin.advantages.index') }}"> الغاء </a>
    <button type="submit" class="button is-success">حفظ</button>
  </div>
</div><!-- End Card Footer -->
