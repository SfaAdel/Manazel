<div class="card-content">
    <div class="mb-3">
        <label for="employee_id" class="form-label">اختر الموظف</label>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    {!! Form::select('provider_id', $providers->pluck('name', 'id'), null, ['class' => 'input', 'required']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="month" class="form-label">الشهر</label>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <select id="month" name="month" class="input" required>
                        <!-- Options will be populated dynamically using JavaScript -->
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="off_days" class="form-label">ايام الاجازة</label>
        <br>
        <select id="off_days" name="off_days[]" class="form-select" multiple required>
            <!-- Days will be populated dynamically using JavaScript -->
        </select>
        <div class="invalid-feedback">
            من فضلك اختر على الاقل يوما واحدا
        </div>
    </div>
</div>
<div class="card-footer">
    <div class="buttons has-addons">
        <a class="button is-info" href="{{ route('admin.provider_availabilities.index') }}">الغاء</a>
        <button type="submit" class="button is-success">حفظ</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const monthSelect = document.getElementById('month');
        const daysOffSelect = document.getElementById('off_days');

        const currentDate = new Date();
        const currentYear = currentDate.getFullYear();
        const currentMonth = currentDate.getMonth();

        // Populate month options
        for (let i = 0; i < 12; i++) {
            const date = new Date(currentYear, currentMonth + i);
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const option = document.createElement('option');
            option.value = `${year}-${month}`;
            option.text = date.toLocaleString('default', { month: 'long', year: 'numeric' });
            monthSelect.appendChild(option);
        }

        // Populate days for the selected month
        monthSelect.addEventListener('change', function() {
            const [year, month] = this.value.split('-');
            const daysInMonth = new Date(year, month, 0).getDate();

            daysOffSelect.innerHTML = ''; // Clear existing options

            for (let day = 1; day <= daysInMonth; day++) {
                const option = document.createElement('option');
                const formattedDay = String(day).padStart(2, '0');
                option.value = `${year}-${month}-${formattedDay}`;
                option.text = `${year}-${month}-${formattedDay}`;
                daysOffSelect.appendChild(option);
            }
        });

        // Trigger change event on page load to populate days for the initially selected month
        monthSelect.dispatchEvent(new Event('change'));
    });
</script>
