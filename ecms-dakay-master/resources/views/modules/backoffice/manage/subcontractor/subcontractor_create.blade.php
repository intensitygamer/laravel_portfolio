{{ Form::open(['class'=>'subcontractor-form form form-horizontal']) }}
    <div class="row">
        <div class="col-md-12">
            {{ Form::bsInput('text', 'name', old('name'), 'Name') }}
            {{ Form::bsInput('text', 'address', old('address'), 'Address') }}
            {{ Form::bsInput('text', 'contact_1', old('contact_1'), 'Contact #1') }}
            {{ Form::bsInput('text', 'contact_2', old('contact_2'), 'Contact #2') }}
            {{ Form::bsInput('text', 'website', old('website'), 'Website') }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button type="submit" class="btn btn-success text-uppercase">Add Sub Contractor <i class="fa fa-paper-plane"></i></button>
            </div>
        </div>
    </div>
{{ Form::close() }}

<script>
    CodeJquery(function () {

        $('.subcontractor-form').submit(function (event) {
            event.preventDefault();

            sendAjax('axios', {
                url: '{{ url('manage/subcontractor') }}',
                type: 'post',
                data: $(this).serialize(),
                element: $(this)
            });

        });

    });
</script>