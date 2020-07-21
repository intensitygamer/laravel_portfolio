@php
    $dateHelper = new \App\Helpers\DateHelper;
@endphp

{!! Form::model($model, ['class' => 'form-horizontal equipment-form']) !!}
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                {{ Form::bsInput('text', 'equipment_code', $model->equipment_code, 'Equipment Code') }}
                {{ Form::bsDatePicker('equipment_date', $dateHelper->human_date($model->equipment_date, true), 'Date Acquired') }}
                {{ Form::bsInput('text', 'equipment_description', $model->equipment_description, 'Equipment Description') }}
                {{ Form::bsInput('text', 'equipment_make', $model->equipment_make, 'Equipment Make') }}
                {{ Form::bsInput('text', 'equipment_model', $model->equipment_model, 'Equipment Model') }}
                {{ Form::bsInput('text', 'equipment_type', $model->equipment_type, 'Type') }}
                {{ Form::bsInput('text', 'capacity', $model->capacity, 'Capacity') }}
                {{ Form::bsSelect('for_hauling', $model->hauling, 'For Hauling', ['yes'=>'Yes', 'no'=>'No']) }}
                {{ Form::bsInput('text', 'fuel', $model->fuel, 'Fuel') }}
            </div>
            <div class="col-md-6 text-area-uniform-height">
                {{ Form::bsInput('text', 'engine_displacement', $model->engine_displacement, 'Engine Displacement') }}
                {{ Form::bsInput('text', 'engine_code', $model->engine_code, 'Engine Code') }}
                {{ Form::bsInput('text', 'engine_no', $model->engine_no, 'Engine No.') }}
                {{ Form::bsInput('text', 'chassis_no', $model->chassis_no, 'Chassis No') }}
                {{ Form::bsInput('text', 'body_no', $model->body_no, 'Body No') }}
                {{ Form::bsInput('text', 'color', $model->color, 'Color') }}


                <div class="images-wrapper row">
                    <span class="note"><strong>Important!</strong> Remove image will be deleted in storage. (Cannot be undone)</span>
                    @foreach($images as $image)
                        <div class="pull-left image-item">
                            <a class="block" href="{{ url('uploads/use/'.$image['file_url']) }}" target="_blank"><img src="{{ asset('uploads/use/'.$image['file_url']) }}" width="100" height="100"/></a>
                            <a href="{{ url('/manage/equipment/remove/image/storage/data/'.$image['file_url']) }}" class="btn btn-remove block remove-current-image">Remove</a>
                        </div>
                    @endforeach
                </div>

                <div class="file-list"></div>
                <div class="margin-bottom-20">
                    <div id="fileUpload" class="dropzone">
                        <div class="dz-message" data-dz-message><span>Drop new files here <br />or Click to Upload new files</span></div>
                    </div>
                </div>
            </div>
        </div>

        {{ Form::input('hidden', 'id', $model->id) }}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="pull-left"><span class="tmx"></span></div>
        <div class="pull-right">
            <button type="submit" class="btn btn-success text-uppercase">Edit Equipment <i class="fa fa-paper-plane"></i></button>
        </div>
    </div>
</div>
{{ Form::close() }}

<script type="text/javascript" src="{{ asset('js/uploads.js') }}"></script>
<script>
    CodeJquery(function () {

        $('.equipment-form').submit(function (event) {
            event.preventDefault();

            sendAjax('axios', {
                url: '{{ url('manage/equipment/'.$model->id) }}',
                type: 'post',
                data: $(this).serialize(),
                element: $(this)
            });
        });

        $('.remove-current-image').click(function(event){
            event.preventDefault();
            $(this).parent().remove();

            axios.get($(this).attr('href'))

                .then(function (response) {
                    var data = response.data;

                    CreateNoty({type:data.status, text: data.message})
                })
                .catch(function (error) {

                    CreateNoty({type:'error', text: error.response.data.message})
                });

        });

        createDatePicker('dateInline', { tag: '#equipment_date', format: 'MMMM DD, YYYY', default_date: '{{ Carbon\Carbon::now()  }}' });

    });

    createMultiUpload('dropzone', { idTag: 'div#fileUpload', postURL: '/manage/equipment/store/image', removeURL: '/manage/equipment/remove/image/' });
</script>