
@if(isset($search))
@if($data->isEmpty())
    <div class="alert alert-warning mx-3">لا توجد نتائج بحث لـ"{{ $search }}"</div>
@else
    <div class="alert alert-primary mx-3">نتائج بحث عن : "{{ $search }}"</div>
@endif
@elseif($data->isEmpty())
<div class="alert alert-secondary mx-3">لا يوجد بيانات متاحة بعد</div>
@endif
