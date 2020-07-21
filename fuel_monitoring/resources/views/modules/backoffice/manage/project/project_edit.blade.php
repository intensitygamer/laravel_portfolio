@php
    $dateHelper = new \App\Helpers\DateHelper;
    $location_list = \App\Helpers\InputHelper::location_list();
@endphp

{!! Form::model($model, ['class' => 'form-horizontal project-form']) !!}
<div class="row">
    <div class="col-md-12">
        {{ Form::bsInput('text', 'name', $model->name, 'Enter Project / Project') }}
         {{ Form::bsSelect('location', request('location'), 'Location', $location_list, ['placeholder' => 'Select Location',  'class'=> 'form-control location-hidden-filter' ] ) }}

        {{ Form::input('hidden', 'id', $model->id) }}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- <div class="pull-left"><span class="tmx"></span></div> -->
        <div class="pull-right">
            <button type="submit" class="btn btn-success text-uppercase">Edit Project <i class="fa fa-paper-plane"></i></button>
        </div>
    </div>
</div>
{{ Form::close() }}

<script>
    CodeJquery(function () {

        $('.project-form').submit(function (event) {
            event.preventDefault();

            sendAjax('axios', {
                url: '{{ url('manage/project/'. $model->id) }}',
                type: 'post',
                data: $(this).serialize(),
                element: $(this)
            });

        });
    });
</script>