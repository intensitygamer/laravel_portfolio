@php
    // refactor magic numbers
    $permission = (new \Permission);
    $dateHelper = new \App\Helpers\DateHelper;
    $equipment_list = \App\Helpers\InputHelper::equipment_list();
    $location_list = \App\Helpers\InputHelper::location_list();
    $operator_list = \App\Helpers\InputHelper::operator_list();
    $oils = \App\Helpers\InputHelper::lubricant_type_of_oil_list();
@endphp

{{ Form::open(['class'=>'lubricant-edit-form form form-horizontal']) }}
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                {{ Form::bsInput('text', 'transaction_no', $lubricant['transaction_no'], 'Transaction ID', ['readonly']) }}
            </div>
            <div class="col-md-6">
                {{ Form::bsDatePicker('transaction_date', $dateHelper->human_date($lubricant['transaction_date'], true), 'Date') }}
            </div>
        </div>
    @if($lubricant['type'] == 'use')
            <div class="row">
                <div class="col-md-6">
                    {{ Form::bsSelect('equipment', $lubricant['equipment_id'], 'Equipment', $equipment_list) }}
                </div>
                <div class="col-md-6">
                    {{ Form::bsSelect('operator', $lubricant['operator_id'], 'Operator', $operator_list) }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    {{ Form::bsInput('text', 'project', $lubricant['project'], 'Project Name') }}
                </div>
                <div class="col-md-6">
                    {{ Form::bsSelect('location', $lubricant['location_id'], 'Location', $location_list) }}
                </div>
            </div>
            {{ Form::bsTextarea('remarks', $lubricant['remarks'], 'Remarks', ['rows'=>5]) }}
    @endif

    {{ Form::bsRadio('type_of_oil_id', $lubricant['type_of_oil_id'],'Type of Lube', $oils, ['hide_rest'=>true]) }}
    <!-- this intended for error output on radio button-->
    <div class="error-class-for-radio-button"><span id="type_of_oil_id"></span></div>

    @if($lubricant['type'] == 'use')
        {{ Form::bsInput('text', 'out', $lubricant['out'], 'Lube Usage') }}
    @endif

    @if($lubricant['type'] == 'stock')
        {{ Form::bsInput('text', 'in', $lubricant['in'], 'Lube to Stock') }}
        {{ Form::bsInput('text', 'vendor', $lubricant['vendor'], 'Vendor') }}
        {{ Form::bsInput('text', 'reference_no', $lubricant['reference_no'], 'Reference No') }}
    @endif
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="pull-left"><span class="tmx"></span></div>
        <div class="pull-right">
            <button type="submit" class="btn btn-success text-uppercase">Edit - [{{ $lubricant['transaction_no'] }}] <i class="fa fa-paper-plane"></i></button>
        </div>
    </div>
</div>
{{ Form::close() }}


<script>
    CodeJquery(function () {

        $('.lubricant-edit-form').submit(function (event) {
            event.preventDefault();

            sendAjax('axios', {
                url: '{{ url('lubricant/edit/'.$lubricant['id'].'/'.$lubricant['type']) }}',
                type: 'post',
                data: $(this).serialize(),
                element: $(this)
            });

        });

        createDatePicker('dateInline', { tag: '#transaction_date', format: 'MMMM DD, YYYY' });

    });
</script>