@php
    $dateHelper = new \App\Helpers\DateHelper;
@endphp

{!! Form::model($model, ['class' => 'form-horizontal location-form']) !!}
<div class="row">
    <div class="col-md-12">
        {{ Form::bsInput('text', 'name', $model->name, 'Operator Name') }}
        {{ Form::bsDatePicker('operator_date', $dateHelper->human_date($model->operator_date, true), 'Date') }}
        {{ Form::bsInput('text', 'license_no', $model->license_no, 'License No.') }}
        {{ Form::bsInput('text', 'address', $model->address, 'Address') }}
        {{ Form::bsInput('text', 'phone_no', $model->phone_no, 'Phone No') }}
        {{ Form::bsInput('text', 'alias', $model->alias, 'Alias') }}
        {{ Form::bsInput('text', 'driver_code', $model->driver_code, 'Driver Code') }}
        {{ Form::input('hidden', 'id', $model->id) }}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="pull-left"><span class="tmx"></span></div>
        <div class="pull-right">
            <button type="submit" class="btn btn-success text-uppercase">Edit Operator <i class="fa fa-paper-plane"></i></button>
        </div>
    </div>
</div>
{{ Form::close() }}

<script>
    CodeJquery(function () {

        $('.location-form').submit(function (event) {
            event.preventDefault();

            sendAjax('axios', {
                url: '{{ url('manage/operator/'.$model->id) }}',
                type: 'post',
                data: $(this).serialize(),
                element: $(this)
            });

        });

        createDatePicker('dateInline', { tag: '#operator_date', format: 'MMMM DD, YYYY', default_date: '{{ Carbon\Carbon::now()  }}' });
    });
</script>