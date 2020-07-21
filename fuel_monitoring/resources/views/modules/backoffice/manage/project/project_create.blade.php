@php
    $location_list = \App\Helpers\InputHelper::location_list();
@endphp

{{ Form::open(['class'=>'project-form form form-horizontal']) }}
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    {{ Form::bsInput('text', 'name', old('name'), 'Project Name') }}
                    <!-- {{ Form::bsDatePicker('equipment_date', old('equipment_date'), 'Date Acquired') }} -->
                    <!-- {{ Form::bsInput('text', 'equipment_description', old('equipment_description'), 'Short Description') }}
                    {{ Form::bsInput('text', 'equipment_make', old('equipment_make'), 'Make') }}
                    {{ Form::bsInput('text', 'equipment_model', old('equipment_model'), 'Model') }}
                    {{ Form::bsInput('text', 'equipment_type', old('equipment_type'), 'Type') }}
                    {{ Form::bsInput('text', 'capacity', old('capacity'), 'Capacity') }}
                    {{ Form::bsSelect('for_hauling', old('for_hauling'), 'For Hauling', ['yes'=>'Yes', 'no'=>'No']) }}
                    {{ Form::bsInput('text', 'fuel', old('fuel'), 'Fuel') }} -->
                </div>
                <div class="col-md-6 text-area-uniform-height">
                    <!-- {{ Form::bsInput('text', 'engine_displacement', old('engine_displacement'), 'Engine Displacement') }}
                    {{ Form::bsInput('text', 'engine_code', old('engine_code'), 'Engine Code') }}
                    {{ Form::bsInput('text', 'engine_no', old('engine_no'), 'Engine No.') }}
                    {{ Form::bsInput('text', 'chassis_no', old('chassis_no'), 'Chassis No') }}
                    {{ Form::bsInput('text', 'body_no', old('body_no'), 'Body No') }}
                    {{ Form::bsInput('text', 'color', old('color'), 'Color') }}
                     <div class="file-list"></div>
                    <div class="margin-bottom-20">
                        <div id="fileUpload" class="dropzone">
                            <div class="dz-message" data-dz-message><span>Drop files here <br />or Click to Upload</span></div>
                        </div>
                    </div> -->
                    {{ Form::bsSelect('location', request('location'), 'Location', $location_list, ['placeholder' => 'Select Location',  'class'=> 'form-control location-hidden-filter' ] ) }}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="pull-left"><span class="tmx"></span></div>
            <div class="pull-right">
                <button type="submit" class="btn btn-success text-uppercase">Add Project <i class="fa fa-paper-plane"></i></button>
            </div>
        </div>
    </div>
{{ Form::close() }}

<script type="text/javascript" src="{{ asset('js/uploads.js') }}"></script>
<script type="text/javascript">
    CodeJquery(function () {

        $('.project-form').submit(function (event) {
            event.preventDefault();

            sendAjax('axios', {
                url: '{{ url('manage/projects') }}',
                type: 'post',
                data: $(this).serialize(),
                element: $(this)
            });
        });

        // createDatePicker('dateInline', { tag: '#equipment_date', format: 'MMMM DD, YYYY', default_date: '{{ Carbon\Carbon::now()  }}' });
    });

    
</script>