{{ Form::open(['class'=>'operator-form form form-horizontal']) }}
    <div class="row">
        <div class="col-md-12">
            {{ Form::bsInput('text', 'name', old('name'), 'Operator Name') }}
            {{ Form::bsDatePicker('operator_date', old('operator_date'), 'Date') }}
            {{ Form::bsInput('text', 'license_no', old('license_no'), 'License No.') }}
            {{ Form::bsInput('text', 'address', old('address'), 'Address') }}
            {{ Form::bsInput('text', 'phone_no', old('phone_no'), 'Phone No') }}
            {{ Form::bsInput('text', 'alias', old('alias'), 'Alias') }}
            {{ Form::bsInput('text', 'driver_code', old('driver_code'), 'Driver Code') }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button type="submit" class="btn btn-success text-uppercase">Add Operator <i class="fa fa-paper-plane"></i></button>
            </div>
        </div>
    </div>
{{ Form::close() }}

<script>
    CodeJquery(function () {

        $('.operator-form').submit(function (event) {
            event.preventDefault();

            sendAjax('axios', {
                url: '{{ url('manage/operator') }}',
                type: 'post',
                data: $(this).serialize(),
                element: $(this)
            });

        });

        createDatePicker('dateInline', { tag: '#operator_date', format: 'MMMM DD, YYYY', default_date: '{{ Carbon\Carbon::now()  }}' });

    });
</script>