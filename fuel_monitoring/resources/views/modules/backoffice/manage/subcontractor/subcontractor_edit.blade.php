{!! Form::model($model, ['class' => 'form-horizontal subcontractor-form']) !!}
<div class="row">
    <div class="col-md-12">
        {{ Form::bsInput('text', 'name', $model->name, 'Name') }}
        {{ Form::bsInput('text', 'address', $model->address, 'Address') }}
        {{ Form::bsInput('text', 'contact_1', $model->contact_1, 'Contact #1') }}
        {{ Form::bsInput('text', 'contact_2', $model->contact_2, 'Contact #2') }}
        {{ Form::bsInput('text', 'website', $model->website, 'Website') }}

        {{ Form::input('hidden', 'id', $model->id) }}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="pull-left"><span class="tmx"></span></div>
        <div class="pull-right">
            <button type="submit" class="btn btn-success text-uppercase">Edit Sub Contractor <i class="fa fa-paper-plane"></i></button>
        </div>
    </div>
</div>
{{ Form::close() }}

<script>
    CodeJquery(function () {

        $('.subcontractor-form').submit(function (event) {
            event.preventDefault();

            sendAjax('axios', {
                url: '{{ url('manage/subcontractor/'.$model->id) }}',
                type: 'post',
                data: $(this).serialize(),
                element: $(this)
            });

        });

    });
</script>