<!-- Start Card Content -->
<div class="card-content">

    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">الخدمة الرئيسية التابع لها</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
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
            <label class="label required">اسم الخدمة</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('name', null, ['class' => 'input', 'required']) !!}
                </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">وصف قصير</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::text('short_description', null, ['class' => 'input', 'required']) !!}
                </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">وصف طويل</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <ck-editor id="long_description" name="long_description" @if (isset($subService))
                        old-data="{{ $subService->long_description }}" @endif></ck-editor>
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
                        <input type="radio" name="active" value="1"
                            @if (isset($subService) && $subService->active) checked @else checked @endif> مفعل
                    </label>
                    <label class="radio">
                        <input type="radio" name="active" value="0"
                            @if (isset($subService) && !$subService->active) checked @endif> غير مفعل
                    </label>
                </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">نوع سعر الخدمة </label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="price_on_serve" value="0"
                            @if (isset($subService) && !$subService->price_on_serve) checked @endif
                            onclick="togglePriceInput(false)">
                        سوف يتم تحديد سعر
                    </label>
                    <label class="radio">
                        <input type="radio" name="price_on_serve" value="1"
                            @if (isset($subService) && $subService->price_on_serve) checked @endif
                            onclick="togglePriceInput(true)">
                        تسعر عند الزيارة
                    </label>
                </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">سعر الخدمة</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::number('price', null, [
                        'class' => 'input',
                        'min' => 0,
                        'id' => 'price',
                        'oninput' => 'calculateFinalPrice()',
                        'disabled' => isset($subService) && !$subService->price_on_serve ? 'disabled' : ''
                    ]) !!}
                </div>
            </div>
        </div>
    </div>
    <hr />



    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">يوجد خصم</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="offer" value="1"
                            @if (isset($subService) && $subService->offer) checked @endif onclick="toggleDiscount(true)"> نعم
                    </label>
                    <label class="radio">
                        <input type="radio" name="offer" value="0"
                            @if (isset($subService) && !$subService->offer) checked @endif onclick="toggleDiscount(false)"> لا
                    </label>
                </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">نسبة الخصم</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::number('discount_percentage', null, [
                        'class' => 'input',
                        'required',
                        'min' => 0,
                        'id' => 'discount_percentage',
                        'oninput' => 'calculateFinalPrice()',
                        'disabled' => 'disabled',
                    ]) !!}
                </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">السعر النهائي</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::number('final_price', null, [
                        'class' => 'input',
                        'required',
                        'min' => 0,
                        'id' => 'final_price',
                        'readonly' => 'readonly',

                    ]) !!}
                </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">صورة</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <uploader label="صورة" name="icon"
                        @if (isset($subService)) file="{{ asset('images/sub_services/' . $subService->icon) }}" @endif
                        ></uploader>
                </div>
            </div>
        </div>
    </div>
    <hr />
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label required">صورة بانر العرض</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <uploader label="bannar" name="bannar"
                        @if (isset($subService)) file="{{ asset('images/sub_service_bannars/' . $subService->bannar) }}" @endif
                        id ="bannar"
                        required
                        disabled
                        ></uploader>
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

<script>
    function toggleDiscount(isEnabled) {
        document.getElementById('discount_percentage').disabled = !isEnabled;
        document.getElementById('bannar').disabled = !isEnabled;
        document.getElementById('bannar').required = isEnabled;
        calculateFinalPrice();
    }

    function calculateFinalPrice() {
        let price = parseFloat(document.getElementById('price').value) || 0;
        let discountPercentage = parseFloat(document.getElementById('discount_percentage').value) || 0;
        let finalPrice = price;

        if (!document.getElementById('discount_percentage').disabled && discountPercentage > 0) {
            finalPrice = price - (price * discountPercentage / 100);
        }

        document.getElementById('final_price').value = finalPrice.toFixed(2);
    }

    // Initial check to enable/disable the discount field based on the offer status
    document.addEventListener('DOMContentLoaded', function() {
        let offerRadioButtons = document.getElementsByName('offer');
        for (let i = 0; i < offerRadioButtons.length; i++) {
            if (offerRadioButtons[i].checked) {
                toggleDiscount(offerRadioButtons[i].value === '1');
            }
        }
    });
</script>

<!-- Include jQuery and Select2 initialization -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#service-select').select2({
            placeholder: 'اختر خدمة',
            allowClear: true
        });
    });
</script>

<script>
    function togglePriceInput(disable) {
        document.getElementById('price').disabled = disable;
    }

    // Initialize the state on page load based on the current value
    window.onload = function() {
        var priceOnServe = document.querySelector('input[name="price_on_serve"]:checked').value;
        togglePriceInput(priceOnServe == '1');
    };
</script>
