{{ Form::open(['class'=>'location-form form form-horizontal']) }}
    <div class="row">
        <div class="col-md-12">
              {{ Form::bsInput('text', 'name', old('name'), 'Enter Location / Project') }}
              {{ Form::bsDatePicker('location_date', old('location_date'), 'Date') }}
              {{ Form::bsInput('text', 'address', old('address'), 'Address') }}
              {{ Form::bsInput('text', 'contact_person', old('contact_person'), 'Contact Person') }}
              {{ Form::bsInput('text', 'phone_no', old('phone_no'), 'Phone No.') }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button type="submit" class="btn btn-success text-uppercase">Add Location <i class="fa fa-paper-plane"></i></button>
            </div>
        </div>
    </div>
{{ Form::close() }}

<script>
    CodeJquery(function () {

        $('.location-form').submit(function (event) {
            event.preventDefault();

            sendAjax('axios', {
                url: '{{ url('manage/location') }}',
                type: 'post',
                data: $(this).serialize(),
                element: $(this)
            });

        });

        createDatePicker('dateInline', { tag: '#location_date', format: 'MMMM DD, YYYY', default_date: '{{ Carbon\Carbon::now()  }}' });

    });
</script>